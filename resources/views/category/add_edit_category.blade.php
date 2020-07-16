@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="row justify-content-center">
	<!-- left column -->
          <div class="col-md-8 mt-5 col-md-offset-2">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$title}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              @if (Session::has('error_message'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!! </strong> {{Session::get('error_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              @endif
               @if (Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success: </strong> {{Session::get('success_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
              @endif

              <form role="form" method="post" @if(!empty($categoryData->id)) action="{{url('/add-edit-category/'.$categoryData->id)}}" @else action="{{url('/add-edit-category')}}" @endif enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                
                  <div class="form-group">
                    <label>Name **</label>
                    <input type="text" class="form-control" name="name" value="@if(!empty($categoryData->name)){{$categoryData->name}}@else{{old('name')}}@endif" placeholder="Category Name">
                  </div>
                  <div class="form-group">
                    <label for="type">Placeholder</label>
                    <input type="text" class="form-control" name="link" value="@if(!empty($categoryData->placeholder)){{$categoryData->placeholder}}@else{{old('placeholder')}}@endif" placeholder="Placeholder">
                  </div>
                  <div class="form-group">
                    <label>Category</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" name="logo" id="logo" accept="image/*">
                        <label class="custom-file-label">Choose file</label>
                      </div>
                    </div>
                    @if(!empty($categoryData->logo))
                    <input type="text" hidden name="prev_img" value="{{$categoryData->logo}}">
                    <div>
                    <img src="{{url('/images/category_images/'.$categoryData->logo)}}" alt="Banner Image" style="width: 80px;margin-top: 5px;">
                          <a href="{{url('delete-banner-image/'.$categoryData->id)}}" class="confirmDelete btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                    </div>
                    @endif
                   
                  </div>
                  <div class="form-group d-flex">
                    <label>Status</label>
                    <input @if(!empty($categoryData->status)==1) checked="checked" @endif style="width: auto;margin: 2px 2px 2px 15px;padding: 0;height: 22px;" type="checkbox" value="1" class="form-control" name="status">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          </div>
</div>

@endsection
