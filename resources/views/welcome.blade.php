<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
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
</body>
</html>

