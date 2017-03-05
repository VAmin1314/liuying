@extends('admin.public.main')

@section('title')
小屁孩的专用管理后台
@endsection

@section('photo') active @endsection
@section('issuePhoto') active @endsection

@section('css')
<!-- Custom styles for this template -->
<link href="/admin/css/style.css" rel="stylesheet">
<link href="/admin/css/style-responsive.css" rel="stylesheet" />
@endsection

@section('js')
<!--script for this page-->
<script src="/admin/js/sparkline-chart.js"></script>
<script src="/admin/js/easy-pie-chart.js"></script>

<script>
    $(function(){
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true
        });

        $('select.styled').customSelect();
    });
</script>
@endsection

@section('main')
<section class="panel">
    <header class="panel-heading">
        图片发布
    </header>
    <div class="panel-body">
        <form class="form-horizontal tasi-form" method="get">
            <div class="form-group">
                <label class="col-sm-2 control-label">标题</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">小标题</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control">
                    <span class="help-block">介绍</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">描述</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control round-input">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Disabled</label>
                <div class="col-sm-10">
                    <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Placeholder</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="placeholder">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-lg-2 control-label">Static control</label>
                <div class="col-lg-10">
                    <p class="form-control-static">email@example.com</p>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection