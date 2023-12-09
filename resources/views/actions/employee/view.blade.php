<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Company Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    @php
    $no = ($employees->currentPage() - 1) * $employees->perPage() + 1;
    @endphp
    <tbody>
        @foreach ($employees as $employee)

        <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $employee->first_name }}</td>
            <td>{{ $employee->last_name }}</td>
            <td> {{ $employee->company ?  $employee->company->name : '' }}</td>
            <td>{{ $employee->email }}</td>
            <td>{{ $employee->phone }}</td>
            <td>
               <div class="d-flex gap-2">
                   <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-primary">Edit</a>
                   
                   
                    <div class="remove"><button data-url="{{ route('employee.destroy', $employee->id) }}" type="button"
                            class="btn btn-danger">Delete</button></div>    </td>
               </div>
        </tr>
        @endforeach

    </tbody>
</table>

@if (count($employees) == 0)
    <div class="text-center">
        Not Data Found
    </div>
@endif

{{ $employees->links('pagination::bootstrap-5') }}
