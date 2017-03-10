@extends('admin.public.main')

@section('title')
小屁孩的专用管理后台
@endsection

@section('music') active @endsection
@section('issueMusic') active @endsection

@section('css')
<!-- Custom styles for this template -->
<link href="/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="/admin/css/style.css" rel="stylesheet">
<link href="/admin/css/style-responsive.css" rel="stylesheet" />

<!-- 时间选择 -->
<link type="text/css" rel="stylesheet" href="/admin/assets/bootstrap-datepicker/css/datepicker.css" />
@endsection

@section('js')
<!--script for this page-->
<script src="/admin/js/sparkline-chart.js"></script>
<script src="/admin/js/easy-pie-chart.js"></script>
<!-- 时间选择器 -->
<script src="/admin/js/bootstrap-switch.js"></script>
<script src="/admin/js/jquery.tagsinput.js"></script>
<script type="text/javascript" src="/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/admin/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script>
    $(function(){
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true
        });

        $('select.styled').customSelect();

        $('#dp1').datepicker({
            format: 'yyyy-mm-dd'
        });

        layui.use('upload', function(){
            layui.upload({
                url: '/backend/getPhoto',
                success: function(data){
                    $('.photo-area').html('<img src="'+data.path+'" style="max-width:300px;max-height:400px" /><input type="hidden" name="path" value="'+ data.path +'" />');
                    layui.use('layer', function(){
                        var layer = layui.layer;
                        setTimeout(function () {
                            layer.closeAll();
                        }, 500);
                    });
                },
                before: function(input){
                    layui.use('layer', function(){
                        var layer = layui.layer;
                        layer.msg('文件上传中...', {icon: 16 ,shade: 0.01});
                    });
                }
            })
        });
    });
</script>
@endsection

@section('main')
<section class="panel">
    <header class="panel-heading">
        添加歌曲
    </header>
    <div class="panel-body">
        <form class="form-horizontal tasi-form" method="post" action="">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 control-label">歌曲标题</label>
                <div class="col-sm-10">
                    <input type="text" autocomplete="off" name="title" class="form-control" placeholder="歌曲标题">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">歌曲作者</label>
                <div class="col-sm-10">
                    <input type="text" autocomplete="off" name="artist" class="form-control" placeholder="歌曲作者">
                    <!-- <span class="help-block">介绍</span> -->
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">歌曲的封面图片</label>
                <div class="col-sm-10">
                    <input name="path" type="text" class="form-control" placeholder="歌曲的封面图片(暂时只能链接)">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">歌曲</label>
                <div class="col-sm-10">
                    <input type="text" autocomplete="off" name="cover" class="form-control" placeholder="歌曲链接(暂时只能链接)">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-info">确认提交</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection