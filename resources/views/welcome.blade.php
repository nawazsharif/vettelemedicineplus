@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="row mt-5">
    @foreach ($categories as $category)
    <div class="col-md-4 mb-4">
      <div class="card">
        <img class="card-img-top" style="height:200px;" src="{{asset('/images/category_images/'.$category->logo)}}"
          alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$category->name}}</h5>
          <p class="card-text">{{$category->placeholder}}</p>
          <a href="{{url('/service/'.$category->id)}}" class="btn btn-primary">Visit Now</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@endsection