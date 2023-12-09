<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Company Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
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
        </tr>
        @endforeach
      
    </tbody>
</table>

{{ $employees->links('pagination::bootstrap-5') }}