@extends('layouts.app')

@section('content')

<div class="container">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
    @endif
    @if(Request::is('company/create') || Request::is('*/edit'))
    <a href="{{route('company.index')}}" class="btn btn-primary">View</a>

    @include('actions.company.add')

    @elseif(Request::is('company'))
    <a href="{{route('company.create')}}" class="btn btn-primary">Create</a>

    <div id="show" class="company">@include('actions.company.view')</div>
    @endif
</div>


@endsection