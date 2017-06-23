@extends('admin.public.main')

@section('title', '图片列表--后台管理')
@section('photo', 'active')
@section('list', 'active')

@section('css')
<!-- Custom styles for this template -->
<link href="/admin/css/style.css" rel="stylesheet">
<link href="/admin/css/style-responsive.css" rel="stylesheet" />
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
                            <img src="{{ qiniu_path($v->qiniu_key) }}" style="max-width: 200px;max-height: 100px">
                            <a href="{{ qiniu_path($v->qiniu_key) }}" class="getPhoto" data-key="{{ $v->qiniu_key }}" target="_block">[查看]</a>
                        </td>
                        <td>
                            <!-- <a class="btn btn-primary" href="/backend/editPhoto/{{ $v->id }}"> <i class="icon-pencil"></i> </a>
                            <button class="btn btn-danger del-photo" data-id="{{ $v->id }}">
                                <i class="icon-trash"></i>
                            </button> -->
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>
</div>
@endsection

@section('js')
<script src="/admin/js/sparkline-chart.js"></script>
<script src="/admin/js/easy-pie-chart.js"></script>
<script>
    // $('.getPhoto').click(function () {
    // })
</script>
@endsection