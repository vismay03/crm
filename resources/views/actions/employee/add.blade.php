@php
$isEdit = Request::is('*/edit');
@endphp

@if(!$isEdit)
<form action="{{ route('employee.store') }}" method="post" enctype="multipart/form-data">
    @else
    <form action="{{ route('employee.update', $edit->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @endif
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">First Name</label>
            <input value="{{ $isEdit ? $edit->first_name : '' }}" type="text" class="form-control" name="first_name"
                id="exampleFormControlInput1">
            @error('first_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Last Name</label>
            <input value="{{ $isEdit ? $edit->last_name : '' }}"  type="text" class="form-control" name="last_name" id="exampleFormControlInput1">
            @error('last_name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Company</label>
            <select class="form-select" name="company_id" aria-label="Default select example">
                <option value="" selected disabled>Select Company</option>

                @foreach ($companies as $company)
                <option @if($isEdit && $edit->company_id == $company->id) selected @endif value="{{ $company->id }}">{{ $company->name }}</option>

                @endforeach

            </select>
            @error('company_id')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email"  value="{{ $isEdit ? $edit->email : ''  }}"  name="email" class="form-control" id="exampleFormControlInput1">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>



        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">phone</label>
            <input type="text" value="{{ $isEdit ? $edit->phone : ''  }}"  class="form-control" name="phone" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <input type="submit" value="{{ $isEdit ? 'Update' : 'Save' }}" class="btn  btn-primary" name="submit" id="exampleFormControlInput1">
        </div>

    </form>