<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>小屁孩</title>
    <meta name="description" content="小屁孩 / 潘凯丽的照片" />
    <meta name="keywords" content="小屁孩, 潘凯丽" />
    <link rel="shortcut icon" href="{{empty($setting->icon)?'/images/ico.png':$setting->icon}}">
    <!-- css -->
    <link rel="stylesheet" type="text/css" href="/home/fonts/feather/style.css">
    <link rel="stylesheet" type="text/css" href="/home/css/demo.css" />
    <link rel="stylesheet" type="text/css" href="/home/css/component.css" />
    <link rel="stylesheet" type="text/css" href="/layui/css/layui.css" />
    <!-- 播放器 -->
    <link rel="stylesheet" href="/home/css/player.css">
</head>
<body>
    <!-- Main container -->
    <div class="container">
        <!-- Blueprint header -->
        <header class="bp-header cf">
            <span>小屁孩的照片 </span>
            <h1>By 刘健</h1>
        </header>
        <!-- Grid -->
        <section class="slider">
            @if (count($photo))
            @foreach($photo as $k => $v)
            <div class="slide @if($k == 0) slide--current @endif" data-content="content-{{ $k+1 }}">
                <div class="slide__mover">
                    <div class="zoomer flex-center">
                        <img class="zoomer__image" src="{{ $v->path }}" alt="{{ $v->title }}" style="max-width: 400px; max-height: 400px" />
                        <div class="preview">
                            <div class="zoomer__area zoomer__area--size-2"></div>
                        </div>
                    </div>
                </div>
                <h2 class="slide__title">
                    <span style="margin-top: 1em;">
                        时间：{{ $v->shot_time .' 地点：'. $v->shot_add }}
                    </span>
                    {{ $v->title }}
                </h2>
            </div>
            @endforeach
            @else
            <div class="slide slide--current" data-content="content-1">
                <div class="slide__mover">
                    <div class="zoomer flex-center">
                        <img class="zoomer__image" src="/images/4.png" alt="默认图片" style="max-width: 400px; max-height: 400px" />
                        <div class="preview">
                            <div class="zoomer__area zoomer__area--size-2"></div>
                        </div>
                    </div>
                </div>
                <h2 class="slide__title">
                    <span style="margin-top: 1em;">
                    </span>
                    <p>暂时不想给你们看别的，记住我绝美的面庞吧！</p>
                </h2>
            </div>
            @endif

            @if (count($photo))
            <nav class="slider__nav">
                <button class="button button--nav-prev">
                    <i class="icon icon--arrow-left"></i>
                    <span class="text-hidden">Previous product</span>
                </button>
                <button class="button button--zoom">
                    <i class="icon icon--zoom"></i>
                    <span class="text-hidden">View details</span>
                </button>
                <button class="button button--nav-next">
                    <i class="icon icon--arrow-right"></i>
                    <span class="text-hidden">Next product</span>
                </button>
            </nav>
            @endif
        </section>
        <!-- /slider-->
        <section class="content">
            @if (count($photo))
            @foreach($photo as $k => $v)
            <div class="content__item" id="content-{{ $k+1 }}">
                <img class="content__item-img rounded-right" src="{{ $v->path }}" />
                <div class="content__item-inner">
                    <h2>{{ $v->title }}</h2>
                    <h3>{{ $v->little_title }}</h3>
                    <p>{{ $v->description }}</p>
                </div>
            </div>
            @endforeach
            @endif
            <button class="button button--close">
                <i class="icon icon--circle-cross"></i>
                <span class="text-hidden"> 关闭</span>
            </button>
        </section>
    </div>

    <!-- 播放器 -->
    @include('home.music.index')
    <!-- 播放器end -->
</body>
<script src="/home/js/jquery.min.js"></script>
<script src="/home/js/modernizr.custom.js"></script>
<script src="/home/js/classie.js"></script>
<script src="/home/js/dynamics.min.js"></script>
<script src="/layui/layui.js"></script>
<script src="/home/js/dynamics.min.js"></script>
<script src="/home/js/main.js"></script>

<!-- 播放器 -->
<script src="/home/js/jquery.marquee.min.js"></script>
<script src="/home/js/musicNew.js"></script>
<script type="text/javascript">
    $(function () {
        // var playlist = [
        // {
        //     title:"最幸福的事",
        //     artist:"梁文音",
        //     mp3:"@if (!empty($setting->bgsound)) {{ $setting->bgsound }} @endif",
        //     cover:"http://musicdata.baidu.com/data2/pic/26418b044183959c716ebe1c360eee85/262031072/262031072.jpg@s_0,w_300",
        // },
        // {
        //     title:"最幸福的事",
        //     artist:"梁文音",
        //     mp3:"@if (!empty($setting->bgsound)) {{ $setting->bgsound }} @endif",
        //     cover:"http://musicdata.baidu.com/data2/pic/26418b044183959c716ebe1c360eee85/262031072/262031072.jpg@s_0,w_300",
        // },
        // ];

        LPlayer.start({
            playlist: 'http://xph.cc/getMusicList',
            autoPlay: true,
            type: 'api'
        });
    })
</script>

</html>