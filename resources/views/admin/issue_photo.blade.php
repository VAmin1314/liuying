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
                    <input type="text" class="form-control" placeholder="图片的大标题">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">小标题</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="图片的小标题，可以不写">
                    <!-- <span class="help-block">介绍</span> -->
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">拍摄时间</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" placeholder="图片的拍摄时间">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">拍摄地点</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="图片的拍摄地点">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">描述</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="5" placeholder="图片的详细描述，写的少的话，会很难看，所以你看着办吧"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">图片</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <button type="button" class="btn btn-info">确认提交</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection