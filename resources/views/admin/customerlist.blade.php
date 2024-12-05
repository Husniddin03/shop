<x-menu>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-center mb-4">Customers List</h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Ismi</th>
                    <th scope="col">Familyasi</th>
                    <th scope="col">Elektron pochtasi</th>
                    <th scope="col">Telefon nomeri</th>
                    <th scope="col">Amallar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->first_name }}</td>
                        <td>{{ $item->last_name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone_number }}</td>
                        <td>
                            <a href="{{ route('customershow', $item->id) }}" class="btn btn-info btn-sm me-1"><i class="fas fa-eye"></i></a>
                            <form action="{{ route('customerdelete', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button onclick="return confirm('Haqiqatdan ham shu mijozni o\'chirmoqchimisiz?');" type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $customer->links() }}
</x-menu>
