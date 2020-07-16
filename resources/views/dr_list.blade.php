@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card mt-5">
        <div class="card-header">
          <h3 class="card-title mt-2">Doctor List </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <ul class="list-group">
            @foreach ($doctorList as $doctor)
            <li class="list-group-item">
              <h2><a href="{{url('service/doctor/'.$doctor->id)}}">{{$doctor->name}}</a></h2>
              <p>{{$doctor->phone}}</p>
            </li>
            @endforeach
          </ul>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
</div>
@endsection