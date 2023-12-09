<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
        @if(Request::is('company/create'))
            <a href="{{route('company.index')}}" class="btn btn-primary">View</a>

            @include('actions.company.add')
        
        @elseif(Request::is('company'))
          <a href="{{route('company.create')}}" class="btn btn-primary">Create</a>

           @include('actions.company.view')
        @endif
    </div>
</body>
</html>
