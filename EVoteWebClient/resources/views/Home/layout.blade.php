<!DOCTYPE html>
<html>

<head>
    @include('Home.partials.header')
</head>

<body>
    @include('Home.partials.navigation')
    @yield('content')
</body>

<!-- Footer -->
<footer>
    @include('Home.partials.footer')
</footer>

@include('Home.partials.script')

</html>