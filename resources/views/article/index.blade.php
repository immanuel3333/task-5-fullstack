@extends('layouts.template')
@section('content')

<div class="container" style="padding-bottom:50px;">
    <table class="table table-striped table-hover" id="article-table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>User_id</th>
                <th>Category_id</th>
                <th>Action</th>
            </tr>
         </thead>
    </table>
</div>

<script src="{{asset('js/jquery-3.5.1.min.js')}}" ></script>
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js" ></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js" ></script>
<script>
    $(document).ready(function(){
		$('#article-table').DataTable({
            "ajax": {
            "url": "{{url('/latihan')}}",
            "dataSrc": ""    
        },
            dom: 'Bfrtip',
            buttons: [
                {
                    text: 'Create',
                    action: function ( e, dt, node, config ) {
                        window.location = "{{url('/create2')}}";
                    }
                }
            ],
			columns: [
				{ data: 'title', name: 'title' },
				{ data: 'content', name: 'content', orderable: false },
				{ data: 'image', name: 'image', orderable: false },
				{ data: 'user_id', name: 'user_id', orderable: false },
				{ data: 'category_id', name: 'category_id', orderable: false },
                { data: 'action', name: 'action', orderable: false }
			]
		});
	});
</script>



@endsection