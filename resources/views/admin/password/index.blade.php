@extends('admin.public.main')

@section('title', '修改密码--后台管理')
@section('password', 'active')
@section('setting', 'active')

@section('css')
<!-- Custom styles for this template -->
<link href="/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="/admin/css/style.css" rel="stylesheet">
<link href="/admin/css/style-responsive.css" rel="stylesheet" />
@endsection

@section('main')
<section class="panel">
    <header class="panel-heading">
        图片发布
    </header>
    <div class="panel-body">
        <form class="form-horizontal tasi-form" method="post" action="/backend/password">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-2 control-label">原密码</label>
                <div class="col-sm-4">
                    <input type="password" name="old_password" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">新密码</label>
                <div class="col-sm-4">
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">重复密码</label>
                <div class="col-sm-3">
                    <input id="dp1" name="password_confirmation" type="password" size="16" class="form-control">
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

@section('js')
<!--script for this page-->
<script src="/admin/js/sparkline-chart.js"></script>
<script src="/admin/js/easy-pie-chart.js"></script>
<script type="text/javascript">
    @if (session('password_msg'))
    layui.use('layer', function(){
        var layer = layui.layer;
        layer.msg('{{ session('password_msg') }}');
    });
    @endif
</script>
@endsection