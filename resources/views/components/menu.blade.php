<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <title>{{ $title ?? 'Admin' }}</title>
</head>

<body>
    @if (session('login'))
        <div class="container mt-4">

            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <a class="mx-2 navbar-brand" href="{{ route('index') }}"><span
                        style="color: #FFD333; background-color: #3D464D">MULTI</span><span
                        style="background-color: #FFD333; color: #3D464D">SHOP</span></a>
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('admins.index') }}">Adminlar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('customerlist') }}">Mijozlar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('productlist') }}">Mahsulotlar</a>
                            </li>
                            <li class="nav-item">
                                <a onclick="return confirm('Haqiqatdan ham chiqmoqchimisiz')"
                                    class="nav-link active text-danger" aria-current="page"
                                    href="{{ route('adminlogout') }}">Chiqish</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="mt-4">
                {{ $slot }}
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    @else
        <script>
            window.location.href = "{{ route('showLoginForm') }}";
        </script>
    @endif
</body>

</html>
