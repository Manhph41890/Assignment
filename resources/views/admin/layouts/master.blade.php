<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @include('admin.layouts.partials.css')

    <title>@yield('title')</title>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    @include('admin.layouts.partials.title')

                    @include('admin.layouts.partials.profile')
                    <br />
                    @include('admin.layouts.partials.menu')
                </div>
            </div>

            @include('admin.layouts.partials.top_nav')
            <!-- page content -->
            <div class="right_col" role="main">
                <!-- top tiles -->
                @yield('content')
            </div>
            <!-- /page content -->
            @include('admin.layouts.partials.footer')
        </div>
    </div>
    @include('admin.layouts.partials.js')

</body>

</html>
