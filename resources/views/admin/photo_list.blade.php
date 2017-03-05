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
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>
                            <button class="btn btn-primary btn-xs"><i class="icon-pencil"></i></button>
                            <button class="btn btn-danger btn-xs"><i class="icon-trash "></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
</div>
@endsection