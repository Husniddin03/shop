<x-menu>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-center mb-4">Products List</h1>
    <a href="{{ route('productadd') }}" class="btn btn-primary mb-3">Yangi mahsulot qo'shish</a>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Mahsulot nomi</th>
                    <th scope="col">Mahsulot haqida</th>
                    <th scope="col">Mahsulot narxi</th>
                    <th scope="col">Mahsulot turi</th>
                    <th scope="col">Amallar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->product_description }}</td>
                        <td>{{ $item->product_price }}</td>
                        <td>{{ $item->product_category }}</td>
                        <td>
                            <a href="{{ route('productshow', $item->id) }}" class="btn btn-info btn-sm me-1"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('productupdate', $item->id) }}"
                                class="btn btn-success btn-sm me-1"><i class="fas fa-sync"></i></a>
                            <form action="{{ route('productdelete', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button onclick="return confirm('Haqiqatdan ham shu mahsulotni o\'chirmoqchimisiz?');"
                                    type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $product->links() }}
</x-menu>
