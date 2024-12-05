<x-menu>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-center mb-4">Admins List</h1>
    <a href="{{ route('admins.create') }}" class="btn btn-primary mb-3">Yangi Admin Qo'shish</a>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td class="text-center">
                            <a href="{{ route('admins.show', $admin->id) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-sync"></i></a>
                            <form action="{{ route('admins.destroy', $admin->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Haqoqatdan ham shu adminni o\'chirmoqchimisiz');" type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $admins->links() }}
</x-menu>
