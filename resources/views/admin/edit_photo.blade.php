@extends('admin.public.main')

@section('title')
小屁孩的专用管理后台
@endsection

@section('photo') active @endsection

@section('css')
<!-- Custom styles for this template -->
<link href="/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="/admin/css/style.css" rel="stylesheet">
<link href="/admin/css/style-responsive.css" rel="stylesheet" />

<!-- 时间选择 -->
<link type="text/css" rel="stylesheet" href="/admin/assets/bootstrap-datepicker/css/datepicker.css" />
<link type="text/css" rel="stylesheet" href="/admin/assets/bootstrap-colorpicker/css/colorpicker.css" />
<link type="text/css" rel="stylesheet" href="/admin/assets/bootstrap-daterangepicker/daterangepicker.css" />
@endsection

@section('js')
<!--script for this page-->
<script src="/admin/js/sparkline-chart.js"></script>
<script src="/admin/js/easy-pie-chart.js"></script>

<script src="/admin/js/jquery-ui-1.9.2.custom.min.js"></script>

<!--custom switch-->
<script src="/admin/js/bootstrap-switch.js"></script>
<!--custom tagsinput-->
<script src="/admin/js/jquery.tagsinput.js"></script>
<script type="text/javascript" src="/admin/js/ga.js"></script>
<script type="text/javascript" src="/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="/admin/assets/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="/admin/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="/admin/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="/admin/assets/ckeditor/ckeditor.js"></script>
<script src="/admin/js/form-component.js"></script>
<script>
    $(function(){
        $("#owl-demo").owlCarousel({
            navigation : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            singleItem : true
        });

        $('select.styled').customSelect();

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
        图片发布
    </header>
    <div class="panel-body">
        <form class="form-horizontal tasi-form" method="post" action="">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 control-label">标题</label>
                <div class="col-sm-4">
                    <input type="text" autocomplete="off" name="title" class="form-control" value="{{ $data->title }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">小标题</label>
                <div class="col-sm-4">
                    <input type="text" autocomplete="off" name="little_title" class="form-control" value="{{ $data->little_title }}">
                    <!-- <span class="help-block">介绍</span> -->
                </div>
            </div>
            <!-- <div class="form-group">
                <label class="col-sm-2 control-label">拍摄时间</label>
                <div class="col-sm-4">
                    <input class="form-control" type="date" placeholder="图片的拍摄时间">
                </div>
            </div> -->
            <div class="form-group">
                <label class="control-label col-sm-2">拍摄时间</label>
                <div class="col-sm-3">
                    <input id="dp1" name="shot_time" type="text" size="16" class="form-control" value="{{ $data->shot_time }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">拍摄地点</label>
                <div class="col-sm-3">
                    <input type="text" autocomplete="off" name="shot_add" class="form-control" value="{{ $data->shot_add }}">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">描述</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="5" placeholder="图片的详细描述，写的少的话，会很难看，所以你看着办吧" name="description">{{ $data->description }}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">图片</label>
                <div class="col-sm-10 photo-area">
                    <img src="{{ $data->path }}" style="max-width: 400px; max-height: 400px">
                    <input type="file" name="photo" class="layui-upload-file">
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