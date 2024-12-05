<x-menu>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1>Edit Admin</h1>
    <form action="{{ route('admins.update', $admin->id) }}" method="POST" class="p-3 border rounded">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $admin->name }}" required>
        </div>
        
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $admin->email }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</x-menu>
