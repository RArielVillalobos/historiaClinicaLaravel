<!DOCTYPE html>
<html>
<head>
    @include('theme.frontoffice.layout.includes.head')
</head>
@include('theme.frontoffice.layout.includes.navbar')

<body>

    <main>
        @yield('content')
    </main>
    @include('theme.frontoffice.layout.includes.footer')
    @include('theme.frontoffice.layout.includes.foot')
</body>

</html>
