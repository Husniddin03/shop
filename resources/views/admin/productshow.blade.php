<x-menu>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h1 class="text-center mb-4">Mahsulot</h1>
    <div class="container d-flex flex-column align-items-center">
        <table class="table table-bordered w-75">
            <tbody>
                <tr>
                    <th>Mahsulot nomi</th>
                    <td>{{ $product->product_name }}</td>
                </tr>
                <tr>
                    <th>Mahsulot haqida</th>
                    <td>{{ $product->product_description }}</td>
                </tr>
                <tr>
                    <th>Mahsulot narhi</th>
                    <td>{{ $product->product_price }}</td>
                </tr>
                <tr>
                    <th>Mahsulot turi</th>
                    <td>{{ $product->product_category }}</td>
                </tr>
                <tr>
                    <th>Mahsulot rangi</th>
                    <td>{{ $product->product_paint }}</td>
                </tr>
                <tr>
                    <th>Mahsulot o'lchami</th>
                    <td>{{ $product->product_size }}</td>
                </tr>
                <tr>
                    <th>Yaratilgan sana</th>
                    <td>{{ $product->created_at }}</td>
                </tr>
                <tr>
                    <th>Yangilangan sana</th>
                    <td>{{ $product->updated_at }}</td>
                </tr>
            </tbody>
        </table>

        <!-- Rasm va o'chirish tugmasi -->
        <div class="image-container mb-4">
            @if (isset($img->id))
                <form action="{{ route('productimgdelete', $img->id) }}" method="POST" class="position-relative">
                    @csrf
                    <img src="{{ asset('storage/' . $img->product_img) }}" alt="" class="img-fluid">
                    <button type="submit" class="delete-btn" onclick="return confirm('Haqiqatan ham shu mahsulotni o‘chirmoqchimisiz?');">
                        <span>&times;</span>
                    </button>
                </form>
            @else
                <form action="{{ route('productimgedd', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="product_img" id="product_img" class="form-control">
                    <button type="submit" class="btn btn-primary mt-2">Rasm yuklash</button>
                </form>
            @endif
        </div>
    </div>

    <div class="text-center" style="margin-bottom: 20px;">
        <form action="{{ route('productdelete', $product->id) }}" method="POST">
            @csrf
            <a href="{{ route('productlist') }}" class="btn btn-secondary">Orqaga</a>
            <a href="{{ route('productupdate', $product->id) }}" class="btn btn-primary">Malumotlarni yangilash</a>
            <button onclick="return confirm('Haqoqatdan ham shu mahsulotni o\'chirmoqchimisiz');" type="submit" class="btn btn-danger">O'chirish</button>
        </form>
    </div>
</x-menu>

<style>
    /* Image container styling */
    .image-container {
        position: relative;
        width: 100%;
        max-width: 400px; /* Set max width for the image */
        height: auto;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .image-container img {
        width: 100%;
        height: auto; /* Maintain aspect ratio */
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    /* Delete button styling */
    .delete-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background-color: red;
        color: white;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        opacity: 0;
        transition: opacity 0.3s ease, transform 0.3s ease;
        font-size: 1.5em;
    }

    .image-container:hover .delete-btn {
        opacity: 1;
        transform: scale(1.1);
    }

    .delete-btn:hover {
        box-shadow: 0 4px 12px rgba(255, 95, 109, 0.4);
        transform: scale(1.2);
    }
</style>
