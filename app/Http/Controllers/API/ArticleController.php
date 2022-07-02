<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Helpers\ApiFormatter;
use Exception;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Article::all();

        if($data){
            return ApiFormatter::createApi(200, 'Success', $data);
        }else{
            return ApiFormatter::createApi(400,'Failed');
        }
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'title' =>'required',
                'content' =>'required',
                'image' =>'required',
                'user_id' =>'required',
                'category_id' =>'required',
            ]);

            $article = Article::create([
                'title'=>$request->title,
                'content'=>$request->content,
                'image'=>$request->image,
                'user_id'=>$request->user_id,
                'category_id'=>$request->category_id,
            ]);

            $data = Article::where('id','=',$article->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            }else{
                return ApiFormatter::createApi(400,'Failed');
            }
        }catch(Exception $error){
            return ApiFormatter::createApi(400,'Failed');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $request->validate([
                'title' =>'required',
                'content' =>'required',
                'image' =>'required',
                'user_id' =>'required',
                'category_id' =>'required',
            ]);

            $article = Article::findOrFail($id);

            $article->update([
                'title'=>$request->title,
                'content'=>$request->content,
                'image'=>$request->image,
                'user_id'=>$request->user_id,
                'category_id'=>$request->category_id,
            ]);

            $data = Article::where('id','=',$article->id)->get();

            if($data){
                return ApiFormatter::createApi(200, 'Success', $data);
            }else{
                return ApiFormatter::createApi(400,'Failed');
            }
        }catch(Exception $error){
            return ApiFormatter::createApi(400,'Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        $data = $article->delete();

        if($data){
            return ApiFormatter::createApi(200, 'Success Destroy data');
        }else{
            return ApiFormatter::createApi(400,'Failed');
        }
    }

    
    public function show(){

        $data = Article::all();

        return view('article.index', compact(
            'data'
        ));
    }

    public function createarticle()
    {
        return view('article.create');
    }

    public function edit($id)
    {
        $data=Article::find($id);
        $data = Article::where('id','=',$article->id)->get();
        return view('article.edit',compact('data'));
    }

    public function storearticle(Request $request)
    {
        
       $data=Article::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'image'=>$request->image,
            'user_id'=>$request->user_id,
            'category_id'=>$request->category_id,
        ]);
        
       return redirect('/articles');
    }

    public function editarticle(Request $request,$id)
    {
        $data=Latihan::find($id);
       $data->update([
           'title'=>$request->title,
            'content'=>$request->content,
            'image'=>$request->image,
            'user_id'=>$request->user_id,
            'category_id'=>$request->category_id,
        ]);

       return redirect('/articles');
    }

    public function delete($id)
    {
        $data=Article::find($id);
        $data->delete();
        return redirect('/articles');
    }

    public function view()
    {
        $data=Article::all();
        foreach($data as $datas)
        {
            $datas->action='<a href="edit2/'.$datas->id.'" class="btn btn-warning btn-sm" id="update'.$datas->id.'">Edit</a>
            <a href="delete/'.$datas->id.'" class="btn btn-danger btn-sm" id="'.$datas->id.'" >Delete</a>';
        }
        
        return response()->json($data,200);

    }
}
