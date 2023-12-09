<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">logo</th>
            <th scope="col">Email</th>
            <th scope="col">Website</th>
        </tr>
    </thead>
    @php
    $no = ($companies->currentPage() - 1) * $companies->perPage() + 1;
    @endphp
    <tbody>
        @foreach ($companies as $company)
            
        <tr>
            <th scope="row">{{ $no++ }}</th>
            <td>{{ $company->name }}</td>
            <td>  <img src="{{ asset('storage/'.$company->logo) }}" width="50px" height="50px" alt=""> </td>
            <td>{{ $company->email }}</td>
            <td>{{ $company->website }}</td>
        </tr>
        @endforeach
      
    </tbody>
</table>
{{ $companies->links('pagination::bootstrap-5') }}