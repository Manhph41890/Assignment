<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('client.layouts.partials.css')
</head>

<body>
    @include('client.layouts.partials.loadpage')
    @include('client.layouts.partials.header')

    <main>
        <div class="container">
            <div class="d-flex justify-content-center">

                @yield('content')

            </div>
        </div>

    </main>
    @include('client.layouts.partials.footer')
    @include('client.layouts.partials.registeras')
    @include('client.layouts.partials.js')
</body>

</html>
