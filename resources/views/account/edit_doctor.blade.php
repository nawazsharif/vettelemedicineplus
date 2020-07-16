@extends('layouts.app')
@section('content')
<div class="container-fluid">
  @if (Session::has('success_message'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success: </strong> {{Session::get('success_message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  <div class="row mt-5">

    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Doctor Info</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <table class="table table-sm">
            <tbody>
              <tr>
                <td>Name</td>
                <td>{{$doctor->name}}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>{{$doctor->email}}</td>
              </tr>
              <tr>
                <td>Phone</td>
                <td>{{$doctor->phone}}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <div class="col-md-6">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">Doctor services</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{url('add-edit-doctor/'.$doctor->id)}}" method="post">
          @csrf
          <div class="card-body">

            <div class="form-group">
              @foreach($services as $service)
              <div class="form-check">

                <input class="form-check-input" name="role[]" @foreach($selectedService as $selectService)
                  @if($selectService->category_id == $service->id)
                {{_('checked')}}
                @endif
                @endforeach
                value="{{$service->id}}"
                type="checkbox">
                <label class="form-check-label">{{$service->name}}</label>
              </div>

              @endforeach

            </div>

          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Submit</button>
          </div>
          <!-- /.card-footer -->
        </form>
      </div>


    </div>

  </div>

</div>
@endsection