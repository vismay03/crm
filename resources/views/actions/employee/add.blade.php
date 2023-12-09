<form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">First Name</label>
        <input type="text" class="form-control" name="first_name" id="exampleFormControlInput1">
       @error('first_name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Last Name</label>
        <input type="text" class="form-control" name="last_name" id="exampleFormControlInput1">
           @error('last_name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Company</label>
        <select class="form-select" name="company_id" aria-label="Default select example">
            <option value="" selected disabled>Select Company</option>

            @foreach ($companies as $company)
            <option value="{{ $company->id }}">{{ $company->name }}</option>
                
            @endforeach
          
        </select>
       @error('company_id')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>

    @csrf
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput1">
        @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>

   
   
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">phone</label>
        <input type="text" class="form-control" name="phone" id="exampleFormControlInput1">
    </div>
    <div class="mb-3">
        <input type="submit" value="Submit" class="form-control" name="submit" id="exampleFormControlInput1">
    </div>

</form>