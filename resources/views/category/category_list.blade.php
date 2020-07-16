@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
<div class="col-md-12">
 @if (Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Success: </strong> {{Session::get('success_message')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
        @endif
	<div class="card mt-5">
		<div class="card-header">
		<a style="margin-top: 8px;" class="btn btn-nlock btn-success float-sm-right" href="{{url('/add-edit-category')}}">Add
				category</a>
			<h3 class="card-title mt-2">Categories</h3>
			
		</div>
		<!-- /.card-header -->
		<div class="card-body">
			<table id="categories" class="table table-bordered table-striped">
				<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>logo</th>
					<th>sttaus</th>
					<th>Action</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($categories as $category)
					<tr>
						<td>{{$category->id}}</td>
						<td>{{$category->name}}</td>
						<td>
							<img style="width:60px;" src="{{asset('/images/category_images/'.$category->logo)}}"
							     alt="{{$category->name}}">
						</td>
						<td>
							@if($category->status==1)
								<a class="updatecategoryStatus" href="javascript:void(0)" id="category-{{$category->id}}"
								   category_id="{{$category->id}}">Active</a>
							@else
								<a class="updatecategoryStatus" href="javascript:void(0)" id="category-{{$category->id}}"
								   category_id="{{$category->id}}">Inactive</a>
							@endif
						</td>
						<td>
							<ul class="list-inline m-0">
								<li class="list-inline-item">
									<a href="{{url('add-edit-category/'.$category->id)}}"
									   class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
									   data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
								</li>
								
								<li class="list-inline-item">
									<a href="{{url('delete-category/'.$category->id)}}"
									   class="confirmDelete btn btn-danger btn-sm rounded-0" type="button"
									   data-toggle="tooltip" data-placement="top" title="Delete"><i
												class="fa fa-trash"></i></a>
								</li>
							</ul>
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
		<!-- /.card-body -->
	</div>
	</div>
	</div>
	</div>
@endsection