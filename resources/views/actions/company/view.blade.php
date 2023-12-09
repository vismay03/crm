<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">logo</th>
            <th scope="col">Email</th>
            <th scope="col">Website</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    @php
    $no = ($companies->currentPage() - 1) * $companies->perPage() + 1;
    @endphp
    <tbody >
        @foreach ($companies as $company)

        <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $company->name }}</td>
            <td>  <img src="{{ asset('storage/'.$company->logo) }}" width="50px" height="50px" alt=""> </td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->website }}</td>
            <td>
                <div class="d-flex gap-2">
                <a href="{{ route('company.edit', $company->id) }}" class="btn btn-primary">Edit</a>


                <div  class="remove" ><button data-url="{{ route('company.destroy', $company->id) }}" type="button" class="btn btn-danger">Delete</button></div>
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>

@if (count($companies) == 0)
<div class="text-center">
    Not Data Found
</div>
@endif

{{ $companies->links('pagination::bootstrap-5') }}
