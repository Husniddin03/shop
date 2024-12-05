<x-menu>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('productedid', $product->id) }}" method="POST" enctype="multipart/form-data" class="p-4">
        @csrf

        <h2 class="mb-4">Mahsulotni Yangilash</h2>

        <div class="form-group mb-3">
            <label for="product_img" class="form-label">Mahsulot uchun rasm</label>
            <input type="file" name="product_img" id="product_img" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="product_name" class="form-label">Mahsulot nomi</label>
            <input value="{{ $product->product_name }}" type="text" name="product_name" id="product_name" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="product_description" class="form-label">Mahsulot haqida</label>
            <textarea name="product_description" id="product_description" class="form-control" rows="3" required>{{ $product->product_description }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="product_price" class="form-label">Mahsulot narxi</label>
            <input value="{{ $product->product_price }}" type="number" name="product_price" id="product_price" class="form-control" step="0.01" required>
        </div>

        <div class="form-group mb-3">
            <label for="product_category" class="form-label">Mahsulot turi</label>
            <input value="{{ $product->product_category }}" type="text" name="product_category" id="product_category" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="product_paint" class="form-label">Mahsulot rangi</label>
            <input value="{{ $product->product_paint }}" type="text" name="product_paint" id="product_paint" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="product_size" class="form-label">Mahsulot o'lchami</label>
            <input value="{{ $product->product_size }}" type="text" name="product_size" id="product_size" class="form-control" required>
        </div>

        <div class="d-flex justify-content-start">
            <button type="submit" class="btn btn-success me-2">Yangilash</button>
            <a href="{{ route('productlist') }}" class="btn btn-secondary">Bekor qilish</a>
        </div>
    </form>
</x-menu>
