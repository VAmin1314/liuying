<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/images/ico.png">
    <title>@yield('title')</title>
    <!-- Bootstrap core CSS -->
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="/admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/admin/css/owl.carousel.css" type="text/css">

    <!-- layui -->
    <link rel="stylesheet" href="/layui/css/layui.css" type="text/css">
    @yield('css')
</head>
<body>
    <section id="container" class="">
        <!--header start-->
        @include('admin.public.header')
        <!--header end-->

        <!--sidebar start-->
        @include('admin.public.nav')
        <!--sidebar end-->

        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                @yield('main')
            </section>
        </section>
        <!--main content end-->
    </section>
</body>
<!-- js placed at the end of the document so the pages load faster -->
<script src="/admin/js/jquery.js"></script>
<script src="/admin/js/jquery-1.8.3.min.js"></script>
<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/jquery.scrollTo.min.js"></script>
<script src="/admin/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="/admin/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="/admin/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="/admin/js/owl.carousel.js" ></script>
<script src="/admin/js/jquery.customSelect.min.js" ></script>

<!-- layui -->
<script src="/layui/layui.js" ></script>

<!--common script for all pages-->
<script src="/admin/js/common-scripts.js"></script>
@yield('js')
</html>
