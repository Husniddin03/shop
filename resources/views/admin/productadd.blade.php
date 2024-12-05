<x-menu>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('productstore') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <div class="form-group px-5 my-2">
            <label for="product_img">Mahsulot uchun rasm</label>
            <input type="file" name="product_img" id="product_img" class="form-control" required>
        </div>

        <div class="form-group px-5 my-2">
            <label for="product_name">Mahsulot nomi</label>
            <input type="text" name="product_name" id="product_name" class="form-control" required>
        </div>
    
        <div class="form-group px-5 my-2">
            <label for="product_description">Mahsulot haqida</label>
            <textarea name="product_description" id="product_description" class="form-control" required></textarea>
        </div>
    
        <div class="form-group px-5 my-2">
            <label for="product_price">Mahsulot narxi</label>
            <input type="number" name="product_price" id="product_price" class="form-control" step="0.01" required>
        </div>
    
        <div class="form-group px-5 my-2">
            <label for="product_category">Mahsulot turi</label>
            <select name="product_category" id="product_category" class="form-control" required>
                <option value="" disabled selected>Tanlang...</option>
                <option value="electronics">Elektronika</option>
                <option value="furniture">Mebel</option>
                <option value="clothing">Kiyim-kechak</option>
                <option value="food">Oziq-ovqat</option>
                <option value="education">Ta'lim</option>
                <!-- Qo'shimcha mahsulot turlari qo'shishingiz mumkin -->
            </select>
        </div>
        
    
        <div class="form-group px-5 my-2">
            <label for="product_paint">Mahsulot rangi</label>
            <select name="product_paint" id="product_paint" class="form-control" required>
                <option value="" disabled selected>Tanlang...</option>
                <option value="red">Qizil</option>
                <option value="blue">Ko'k</option>
                <option value="green">Yashil</option>
                <option value="yellow">Sariq</option>
                <option value="black">Qora</option>
                <option value="white">Oq</option>
                <!-- Qo'shimcha ranglar qo'shishingiz mumkin -->
            </select>
        </div>
        
    
        <div class="form-group px-5 my-2">
            <label for="product_size">Mahsulot o'lchami</label>
            <select name="product_size" id="product_size" class="form-control" required>
                <option value="" disabled selected>Tanlang...</option>
                <option value="small">Kichik</option>
                <option value="medium">O'rtacha</option>
                <option value="large">Katta</option>
                <option value="extra_large">Qo'shimcha katta</option>
                <!-- Qo'shimcha o'lchamlar qo'shishingiz mumkin -->
            </select>
        </div>
        
    
        <button type="submit" class="btn btn-success mx-5">Qo'shish</button>
        <a class="btn btn-primary my-3" href="{{route('productlist')}}">Bekor qilish</a>
    </form>
    
</x-menu>