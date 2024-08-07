<header>
    <!-- Header Start -->
    <div class="header-area">
        <div class="main-header ">
            <div class="header-top ">
                <div class="container-fluid">
                    <div class="col-xl-12">
                        <div class="row d-flex justify-content-lg-between align-items-center">
                            <div class="header-info-left">
                                <li class="d-none d-lg-block">
                                    <div class="form-box f-right ">
                                        <form action="{{ route('search') }}" method="GET">
                                            <input type="search" name="query" aria-label="Search"
                                                placeholder="Tìm kiếm ...">
                                            <div class="search-icon">
                                                <button type="submit" class="btn-no-style"><i
                                                        class="ti-search"></i></button>
                                            </div>
                                        </form>

                                    </div>
                                </li>
                            </div>
                            <div class="header-info-mid">
                                <!-- logo -->
                                <div class="logo">
                                    <a href="{{ url('/') }}"><img src="/template/assets/img/logo/ESPN.png"
                                            style="max-width: 300px; height: auto;" alt=""></a>
                                </div>
                            </div>
                            <div class="header-info-right d-flex align-items-center">
                                <ul>
                                    <li><a href="{{ url('/about') }}">Giới thiệu</a></li>
                                    <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                                    @if (Auth::check())
                                        <!-- Hiển thị nút Logout nếu đã đăng nhập -->
                                        <li><a href="">
                                                Tai khoan: <u><b>{{ Auth::user()->name }}</b></u>
                                            </a></li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <li><a><button type="submit" class="btn">
                                                        Logout
                                                    </button></a></li>
                                        </form>
                                    @else
                                        <!-- Hiển thị liên kết Đăng nhập hoặc Đăng ký nếu chưa đăng nhập -->
                                        <li><a href="{{ route('login') }}">Đăng nhập hoặc Đăng ký</a></li>
                                    @endif
                                </ul>
                                <!-- Social -->
                                <div class="header-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="https://bit.ly/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom header-sticky" style="background-color: #2B2C2D;">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <!-- logo 2 -->
                            <div class="logo2">
                                <a href="index.html"><img src="/template/assets/img/logo/logo.png" alt=""></a>
                            </div>
                            <!-- logo 3 -->
                            <div class="logo3 d-block d-sm-none">
                                <a href="index.html"><img src="/template/assets/img/logo/logo-mobile.png"
                                        alt=""></a>
                            </div>
                            <!-- Main-menu -->
                            <div class="main-menu text-center d-none d-lg-block">
                                <nav class="">
                                    <ul>
                                        @foreach ($categories as $category)
                                            <li>
                                                <a class="text-white" href="{{ url('/category_blog', $category->id) }}">
                                                    {{ $category->name }}
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Header End -->
</header>
<style>
    .btn-no-style {
        background-color: transparent;
        border: none;
        padding: 0;
        cursor: pointer;
    }
</style>
