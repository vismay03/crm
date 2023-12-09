@extends('layouts.app')

@section('content')

    <div class="container">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
        @if(Request::is('employee/create') || Request::is('*/edit'))
          <a href="{{route('employee.index')}}" class="btn btn-primary">View</a>

            @include('actions.employee.add')

        @elseif(Request::is('employee'))
          <a href="{{route('employee.create')}}" class="btn btn-primary">Create</a>

          <div id="show" class="employees"> @include('actions.employee.view')</div>
        @endif
    </div>

    @endsection

