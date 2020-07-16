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
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card mt-5">
        <div class="card-header">
          <h3 class="card-title mt-2">Doctor Info </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <h2>{{$doctor->name}}</h2>
          <p>If you want to caontact with {{$doctor->name}} Please call bellow number,</p>
          <p><b>Contact No: </b><a href="tel:{{$doctor->phone}}">{{$doctor->phone}}</a></p>

        </div>
        <!-- /.card-body -->
      </div>
    </div>
    <div class="col-md-12">
      <div class="card mt-5">
        <div class="card-header">
          <h3 class="card-title mt-2">Payment Info </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body mb-5">
          <h2>Please pay with bKash. Our bKash Number <span style="color:#f30756;">00000000000</span></h2>
          <img src="{{asset('images/bKash_Payment_for_bdshop.jpg')}}" alt="">

          <form action="{{url('bkash-confirmation')}}" method="post">
            @csrf
            <input type="hidden" name="dr_id" value="{{$doctor->id}}">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="type">bKash No</label>
                  <input type="text" required class="form-control" name="bkash_no" placeholder="bKash No">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="type">bKash Tx ID</label>
                  <input type="text" required class="form-control" name="bkash_tx_no" placeholder="bKash TX No">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="type">Amount</label>
                  <input type="text" required class="form-control" name="bkash_amount" placeholder="bKash Amount">
                </div>
              </div>
            </div>
            <div class="row float-right">
              <button class="btn btn-success" type="submit">Submit</button>
            </div>
          </form>
        </div>
        <!-- /.card-body -->
      </div>
    </div>
  </div>
</div>
@endsection