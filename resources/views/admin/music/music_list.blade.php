@extends('admin.public.main')

@section('title')
小屁孩的专用管理后台
@endsection

@section('photo') active @endsection
@section('photoList') active @endsection

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

        // 删除上传的图片
        $('.del-photo').click(function () {
            var id = $(this).attr('data-id');
            layui.use('layer', function(){
                var layer = layui.layer;
                layer.confirm('真的要把这么美丽的图片删掉？', {
                    btn: ['就是要删', '突然不想删了']
                }, function () {
                    $.post('/backend/delPhoto', {id: id}, function (data) {
                        layer.msg('真尼玛残忍！', {icon: 1});
                        location.href = '';
                    })
                });
            })
        })
    });
</script>
@endsection

@section('main')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h4>图片列表</h4>
            </header>
            <table class="table table-striped table-advance table-hover">
                <thead>
                    <tr>
                        <th> ID</th>
                        <th> 标题</th>
                        <th> 简介</th>
                        <th> 添加时间</th>
                        <th> 图片</th>
                        <th> 操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $k => $v)
                    <tr>
                        <td>{{ $v->id }}</td>
                        <td>{{ $v->title }}</td>
                        <td>{{ $v->little_title }}</td>
                        <td>{{ $v->created_at }}</td>
                        <td>
                            <img src="{{ $v->path }}" style="max-width: 200px;max-height: 100px">
                        </td>
                        <td>
                            <a class="btn btn-primary" href="/backend/editPhoto/{{ $v->id }}">
                                <i class="icon-pencil"></i>
                            </a>
                            <button class="btn btn-danger del-photo" data-id="{{ $v->id }}">
                                <i class="icon-trash"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
</div>
@endsection