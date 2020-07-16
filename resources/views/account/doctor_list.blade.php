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
					<th>ID</th>
					<th>Name</th>
					<th>logo</th>
					<th>sttaus</th>
          @if($title =='Doctor List')
					<th>Action</th>
          @endif
				</tr>
				</thead>
				<tbody>
				@foreach ($doctors as $doctor)
					<tr>
						<td>{{$doctor->id}}</td>
						<td>{{$doctor->name}}</td>
						<td>
							<img style="width:60px;" src="{{asset('/images/doctor_images/'.$doctor->logo)}}"
							     alt="{{$doctor->name}}">
						</td>
						<td>
							@if($doctor->status==1)
								<a class="updatedoctorStatus" href="javascript:void(0)" id="doctor-{{$doctor->id}}"
								   doctor_id="{{$doctor->id}}">Active</a>
							@else
								<a class="updatedoctorStatus" href="javascript:void(0)" id="doctor-{{$doctor->id}}"
								   doctor_id="{{$doctor->id}}">Inactive</a>
							@endif
						</td>
            @if($title =='Doctor List')
						<td>
							<ul class="list-inline m-0">
								<li class="list-inline-item">
									<a href="{{url('add-edit-doctor/'.$doctor->id)}}"
									   class="btn btn-success btn-sm rounded-0" type="button" data-toggle="tooltip"
									   data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
								</li>
							</ul>
						</td>
            @endif
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