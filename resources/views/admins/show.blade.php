<x-menu>
    <h1>Admin Details</h1>
    <div class="p-3 border rounded bg-light">
        <p><strong>Name:</strong> {{ $admin->name }}</p>
        <p><strong>Email:</strong> {{ $admin->email }}</p>
        <a href="{{ route('admins.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
</x-menu>
