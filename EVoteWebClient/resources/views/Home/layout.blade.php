<!DOCTYPE html>
<html>

<head>
    @include('Home.partials.header')
</head>

<body>
    {{--@include('Home.partials.navigation')--}}
    @yield('content')

<!-- Footer -->
<footer>
    @include('Home.partials.footer')
</footer>

</body>

@include('Home.partials.script')

</html>