<x-header>


    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="#">Home</a>
                    <a class="breadcrumb-item text-dark" href="#">Shop</a>
                    <span class="breadcrumb-item active">Shopping Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;">
                                Product Name</td>
                            <td class="align-middle"><span id="price">150</span> so'm </td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button onclick="calc()" class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input id="amount" type="text"
                                        class="form-control form-control-sm bg-secondary border-0 text-center"
                                        value="1">
                                    <div class="input-group-btn">
                                        <button onclick="calc()" class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"><span id="total">150</span> so'm</td>
                            <td class="align-middle"><button class="btn btn-sm btn-danger"><i
                                        class="fa fa-times"></i></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-30" action="">
                    <div class="input-group">
                        <input type="text" class="form-control border-0 p-4" placeholder="Coupon Code">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Apply Coupon</button>
                        </div>
                    </div>
                </form>
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart
                        Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5 id="total">150</h5>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To
                            Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

    <script>
        function updateTotal() {
            const priceElement = document.getElementById('price');
            const quantityElement = document.getElementById('amount');
            const totalElement = document.getElementById('total');

            const price = parseInt(priceElement.innerText);
            const quantity = parseInt(quantityElement.value);

            const total = price * quantity;
            totalElement.innerText = total;
        }

        // Sahifa yuklangandan so'ng asosiy funksiyani doimiy ishlashga o'rnatish
        window.onload = function() {
            const quantityElement = document.getElementById('amount');

            // Har safar qiymat o'zgarganda updateTotal ishga tushadi
            quantityElement.addEventListener('input', updateTotal);

            document.querySelector('.btn-minus').addEventListener('click', function() {
                let quantity = parseInt(quantityElement.value);
                updateTotal(); // Jami narxni yangilash
            });

            document.querySelector('.btn-plus').addEventListener('click', function() {
                let quantity = parseInt(quantityElement.value);
                // quantityElement.value = quantity + 1;
                updateTotal(); // Jami narxni yangilash
            });

            // Boshlang'ich jami narxni ko'rsatish uchun chaqirish
            updateTotal();
        };
    </script>


</x-header>
