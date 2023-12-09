@extends('layouts.app')


@section('content')
<div class="container">
<div class="row">
    <div class="col-md-6">
   <div class="card">

  <div class="card-body">
    <h5 class="card-title">Company</h5>
      <a href="{{ route('company.index') }}" class="btn btn-primary">View</a>
  </div>
  </div>
</div>
 <div class="col-md-6">
 <div class="card" >

  <div class="card-body">
    <h5 class="card-title">Employee</h5>
      <a href="{{ route('employee.index') }}" class="btn btn-primary">View</a>
  </div></div>
  </div>
   </div>
</div>


@endsection
