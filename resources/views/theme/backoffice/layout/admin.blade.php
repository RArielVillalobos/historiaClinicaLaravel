{{--
YIELD QUE OCUPAREMOS
    title
    head
    content
    foot

--}}

<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @include('theme.backoffice.layout.includes.head')
</head>
<body>
<!-- Start Page Loading -->
@include('theme.backoffice.layout.includes.loader')
<!-- End Page Loading -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START HEADER -->
@include('theme.backoffice.layout.includes.header')
<!-- END HEADER -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
            @include('theme.backoffice.layout.includes.left-sidebar')
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content">

            <div class="container">
                @include('theme.backoffice.layout.includes.breadcrumbs')
                @yield('content')
            </div>
            <!--end container-->
        </section>
        <!-- END CONTENT -->
    </div>
    <!-- END WRAPPER -->
</div>
<!-- END MAIN -->
<!-- START FOOTER -->
<!-- //////////////////////////////////////////////////////////////////////////// -->
@include('theme.backoffice.layout.includes.footer')
<!-- END FOOTER -->
<!-- ================================================
Scripts
================================================ -->
@include('theme.backoffice.layout.includes.foot')



</body>
</html>