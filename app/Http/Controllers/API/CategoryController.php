<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();

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
                'name' =>'required',
                'user_id' =>'required',
            ]);

            $category = Category::create([
                'name'=>$request->name,
                'user_id'=>$request->user_id,
            ]);

            $data = Category::where('id','=',$category->id)->get();

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
                'name' =>'required',
                'user_id' =>'required',
            ]);

            $category = Category::findOrFail($id);

            $category->update([
                'name'=>$request->name,
                'user_id'=>$request->user_id,
            ]);

            $data = Category::where('id','=',$category->id)->get();

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
        $category = Category::findOrFail($id);

        $data = $category->delete();

        if($data){
            return ApiFormatter::createApi(200, 'Success Destroy data');
        }else{
            return ApiFormatter::createApi(400,'Failed');
        }
    }

    
    public function show(){

        $data = Category::all();

        return view('category.index', compact(
            'data'
        ));
    }

    public function createcategory()
    {
        return view('category.create');
    }

    public function edit($id)
    {
        $data=Category::find($id);
        $data = Category::where('id','=',$category->id)->get();
        return view('category.edit',compact('data'));
    }

    public function storecategory(Request $request)
    {
        
       $data=Category::create([
        'name'=>$request->name,
        'user_id'=>$request->user_id,
        ]);
        
       return redirect('/categories');
    }

    public function editcategory(Request $request,$id)
    {
        $data=Latihan::find($id);
       $data->update([
        'name'=>$request->name,
        'user_id'=>$request->user_id,
        ]);

       return redirect('/categories');
    }

    public function delete($id)
    {
        $data=Category::find($id);
        $data->delete();
        return redirect('/categories');
    }

    public function view()
    {
        $data=Category::all();
        foreach($data as $datas)
        {
            $datas->action='<a href="edit2/'.$datas->id.'" class="btn btn-warning btn-sm" id="update'.$datas->id.'">Edit</a>
            <a href="delete/'.$datas->id.'" class="btn btn-danger btn-sm" id="'.$datas->id.'" >Delete</a>';
        }
        
        return response()->json($data,200);

    }
}
