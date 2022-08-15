<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Web đọc sách</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">Project cuối kì</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('/') ? 'active' : '' }}"
                                href="{{ url('/') }}">Trang chủ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Danh
                                mục truyện</a>
                            <ul class="dropdown-menu">
                                @foreach ($danhmuc as $dm)
                                    <li><a class="dropdown-item"
                                            href="{{ url('danh-muc/' . $dm->tagdanhmuc) }}">{{ $dm->tendanhmuc }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Thể
                                loại</a>
                            <ul class="dropdown-menu">
                                @foreach ($theloai as $tl)
                                    <li><a class="dropdown-item"
                                            href="{{ url('the-loai/' . $tl->tagtheloai) }}">{{ $tl->tentheloai }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" action="{{ url('tim-kiem') }}">
                        <input class="form-control me-2" type="text" name="tukhoa"
                            placeholder="Tìm kiếm tác giả, truyện">
                        <button class="btn btn-primary" type="button">Tìm</button>
                    </form>
                </div>
            </div>
        </nav>
        @yield('slide')

        @yield('content')

        <footer class="text-muted py-5 bg-light">
            <div class="container">
                <p class="float-end mb-1">
                    <a href="#">Back to top</a>
                </p>
                <p class="mb-1">Project cuối kỳ</p>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            margin: 10,
            dot: true,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })
    </script>
    <script>
        $('.select-chapter').on('change', function() {
            let url = $(this).val();
            if (url) {
                window.location.href = url;
            }
            return false;
        });
    </script>
    <script>
        current_chapter();

        function current_chapter() {
            let url = window.location.href;
            $('.select-chapter').find('option[value="' + url + '"]').attr('selected', true);
        }
    </script>
</body>

</html>
