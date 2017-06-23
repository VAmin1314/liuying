@extends('admin.public.main')

@section('title')
小屁孩的专用管理后台
@endsection

@section('setting') active @endsection
@section('commonSetting') active @endsection

@section('css')
<!-- Custom styles for this template -->
<link href="/admin/css/style.css" rel="stylesheet">
<link href="/admin/css/style-responsive.css" rel="stylesheet" />
@endsection

@section('js')
<!--script for this page-->
<script src="/admin/js/sparkline-chart.js"></script>
<script src="/admin/js/easy-pie-chart.js"></script>

<!--custom switch-->
<script src="/admin/js/bootstrap-switch.js"></script>
<script src="/admin/js/jquery.tagsinput.js"></script>
<script>
    $(function(){
        // 图片上传
        layui.use('upload', function(){
            layui.upload({
                url: '/backend/getPhoto',
                success: function(data){
                    $('.photo-area').html('<img src="'+data.path+'" style="max-width:300px;max-height:400px" /><input type="hidden" name="icon" value="'+ data.path +'" />');
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

        // switch
        $(function() {
            $(".tagsinput").tagsInput();
            $("[data-toggle='switch']").wrap('<div class="switch" />').parent().bootstrapSwitch();
        });
    });
</script>
@endsection

@section('main')
<section class="panel">
    <header class="panel-heading">
        通用设置
    </header>
    <div class="panel-body">
        <form class="form-horizontal tasi-form" method="post" action="">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 control-label">是否允许访问</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="is_allow" id="inlineRadio1" value="1" @if (!empty($data->is_allow) && $data->is_allow == 1) checked @endif> 允许
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="is_allow" id="inlineRadio2" value="0" @if (isset($data->is_allow) && $data->is_allow == 0) checked @endif> 不允许
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">背景音乐自动播放</label>
                <div class="col-sm-10">
                    <label class="radio-inline">
                        <input type="radio" name="autoplay" id="inlineRadio1" value="1" @if (!empty($data->autoplay) && $data->autoplay == 1) checked @endif> 自动
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="autoplay" id="inlineRadio2" value="0" @if (isset($data->autoplay) && $data->autoplay == 0) checked @endif> 手动
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">标签图片</label>
                <div class="col-sm-10 photo-area">
                    @if (!empty($data->icon))
                    <img src="{{ $data->icon }}">
                    <input type="hidden" name="icon" value="{{ $data->icon }}">
                    @endif
                    <input type="file" name="photo" class="layui-upload-file">
                    就是用来替换标签页上面的小丸子的
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