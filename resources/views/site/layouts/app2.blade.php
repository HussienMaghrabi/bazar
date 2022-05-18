<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Bazar</title>

    @include('site.includes.styles')
    @yield('styles')

</head>

<body>

    @include('site.includes.header')


    <!-- Content Wrapper. Contains page content -->
    @yield('content')
    <!-- /.content-wrapper -->
    @include('site.includes.footer')
    <!-- Go to Top Link -->
    @include('site.includes.top')
    <!-- ./wrapper -->
    @include('site.includes.scripts')
    @yield('scripts')
</body>

</html>
