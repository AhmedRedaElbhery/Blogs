
<!DOCTYPE html>
<html lang="en">
@include('theme.header')

<body>
    @include('theme.bodyhead')
    <!--================Header Menu Area =================-->

    @yield('content')
    @include('theme.footer')
</body>
</html>
