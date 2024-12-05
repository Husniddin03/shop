<x-menu>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container my-4">
        <h1 class="mb-4">Customer Details</h1>
        
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>First Name</th>
                    <td>{{ $customer->first_name }}</td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>{{ $customer->last_name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $customer->email }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $customer->phone_number }}</td>
                </tr>
                <tr>
                    <th>Created At</th>
                    <td>{{ $customer->created_at }}</td>
                </tr>
                <tr>
                    <th>Updated At</th>
                    <td>{{ $customer->updated_at }}</td>
                </tr>
                <tr>
                    <th>Deleted At</th>
                    <td>{{ $customer->deleted_at ? $customer->deleted_at : 'N/A' }}</td>
                </tr>
            </table>
        </div>
        
        <form action="{{ route('customerdelete', $customer->id) }}" method="POST" class="d-flex justify-content-start mt-3">
            @csrf
            <a href="{{ route('customerlist') }}" class="btn btn-secondary me-2">Back to List</a>
            <button onclick="return confirm('Haqiqatan ham shu mijozni o\'chirmoqchimisiz?');" type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</x-menu>
