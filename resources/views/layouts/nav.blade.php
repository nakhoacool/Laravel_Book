<div class="container">
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('home') ? 'active' : '' }}"
                            href="{{ route('home') }}">Admin</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('danhmuc') ? 'active' : '' }} {{ request()->is('danhmuc/create') ? 'active' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown">Quản lý danh mục</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('danhmuc.create') }}">Thêm danh mục</a></li>
                            <li><a class="dropdown-item" href="{{ route('danhmuc.index') }}">Liệt kê danh mục</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('theloai') ? 'active' : '' }} {{ request()->is('theloai/create') ? 'active' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown">Thể loại</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('theloai.create') }}">Thêm thể loại</a></li>
                            <li><a class="dropdown-item" href="{{ route('theloai.index') }}">Liệt kê thể loại</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('truyen') ? 'active' : '' }} {{ request()->is('truyen/create') ? 'active' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown">Truyện - Sách</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('truyen.create') }}">Thêm sách - truyện</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('truyen.index') }}">Liệt kê sách -
                                    truyện</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ request()->is('chapter') ? 'active' : '' }} {{ request()->is('chapter/create') ? 'active' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown">Chapter</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('chapter.create') }}">Thêm chapter</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('chapter.index') }}">Liệt kê chapter</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
