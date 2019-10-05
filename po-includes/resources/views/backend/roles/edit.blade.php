@extends('layouts.app')
@section('title', 'Edit Roles')

@section('content')
	<div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-20">
		<div>
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb breadcrumb-style1 mg-b-10">
					<li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
					<li class="breadcrumb-item"><a href="{{ url('/dashboard/users/table') }}">User</a></li>
					<li class="breadcrumb-item"><a href="{{ url('/dashboard/roles/table') }}">Roles</a></li>
					<li class="breadcrumb-item active" aria-current="page">Edit Roles</li>
				</ol>
			</nav>
			<h4 class="mg-b-0 tx-spacing--1">Edit Roles</h4>
		</div>
		
		<div><a href="{{ url('dashboard/roles/table') }}" class="btn btn-sm pd-x-15 btn-white btn-uppercase mg-t-10"><i data-feather="arrow-left" class="wd-10 mg-r-5"></i> Back</a></div>
	</div>
	
	<div class="card">
		{!! Form::model($role, [
			'method' => 'PATCH',
			'url' => ['/dashboard/roles', Hashids::encode($role->id)],
			'class' => 'form-horizontal'
		]) !!}
			<div class="card-body pd-b-0">
				@if ($errors->any())
					<ul class="alert alert-danger">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				@endif
				
				@include ('backend.roles.form', ['formMode' => 'edit'])
			</div>
			<div class="card-footer">
				<button type="submit" class="btn btn-primary"><i data-feather="send" class="wd-10 mg-r-5"></i> Update</button>
			</div>
		{!! Form::close() !!}
	</div>
@endsection

@push('scripts')
<script type="text/javascript">
	$("#checkAll").click(function(){
		$('#checkAllBox input:checkbox').not(this).prop('checked', this.checked);
	});
</script>
@endpush