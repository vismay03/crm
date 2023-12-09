<form action="{{ route('company.store') }}" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="exampleFormControlInput1">
        @error('name')
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
        <label for="exampleFormControlInput1" class="form-label">Logo</label>
        <input type="file" name="image" class="form-control" id="exampleFormControlInput1">
           @error('image')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">website</label>
        <input type="text" class="form-control" name="website" id="exampleFormControlInput1">
    </div>
    <div class="mb-3">
        <input type="submit" value="Submit" class="form-control" name="submit" id="exampleFormControlInput1">
    </div>

</form>