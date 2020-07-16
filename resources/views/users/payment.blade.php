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
          <h3 class="card-title mt-2">{{$title}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="doctors" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Bkash No</th>
                <th>Bkash Tx</th>
                <th>Bkash amount</th>
                <th>sttaus</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($bkashList as $bkash)
              <tr>
                <td>{{$bkash->bkash_no}}</td>
                <td>{{$bkash->bkash_tx_id}}</td>
                <td>
                  <img style="width:60px;" src="{{asset('/images/doctor_images/'.$bkash->logo)}}"
                    alt="{{$bkash->bkash_no}}">
                </td>
                <td>
                  @if($bkash->status==1)
                  Confirm
                  @elseif($bkash->status==0)
                  Pending 
                  @else
                  Reject
                  @endif
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