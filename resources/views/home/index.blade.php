<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>小屁孩</title>
    <meta name="description" content="小屁孩 / 潘凯丽的照片" />
    <meta name="keywords" content="小屁孩, 潘凯丽" />
    <!-- <link rel="shortcut icon" href="{empty($setting->bgsound)?'':$setting->bgsound}"> -->
    <!-- Feather Icons -->
    <link rel="stylesheet" type="text/css" href="/home/fonts/feather/style.css">
    <!-- General demo styles & header -->
    <link rel="stylesheet" type="text/css" href="/home/css/demo.css" />
    <!-- Component styles -->
    <link rel="stylesheet" type="text/css" href="/home/css/component.css" />
    <script src="/home/js/modernizr.custom.js"></script>
</head>
<body>
    @if (!empty($setting->bgsound))
    <audio id="bgaudio" src="{{ $setting->bgsound }}" autoplay="autoplay" style="display: none"></audio>
    @endif
    <!-- Main container -->
    <div class="container">
        <!-- Blueprint header -->
        <header class="bp-header cf">
            <span>小屁孩的照片 </span>
            <h1>By 刘健</h1>
        </header>
        <!-- Grid -->
        <section class="slider">
            @if (!empty($setting->is_allow) && count($photo))
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
                    <span>小屁孩</span> {{ $v->title }}
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
                    <span style="margin-top: 1em;">小屁孩</span>
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
                <img class="content__item-img rounded-right" src="{{ $v->path }}" alt="{{ $v->title }}" />
                <div class="content__item-inner">
                    <h2>{{ $v->title }}</h2>
                    <h3>{{ $v->little_title }}</h3>
                    <p>{{ $v->description }}</p>
                    <!-- <p><a href="#"></a></p> -->
                </div>
            </div>
            @endforeach
            @else

            @endif
            <!-- <div class="content__item" id="content-2">
                <img class="content__item-img rounded-right" src="images/1.jpg" alt="Apple Watch Content" />
                <div class="content__item-inner">
                    <h2>The iPhone 6</h2>
                    <h3>Incredible performance for powerful apps</h3>
                    <p>Built on 64-bit desktop-class architecture, the new A8 chip delivers more power, even while driving a larger display. The M8 motion coprocessor efficiently gathers data from advanced sensors and a new barometer. And with increased battery life, iPhone 6 lets you do more, for longer than ever.</p>
                    <p><a href="#">Learn more about this technology &xrarr;</a></p>
                </div>
            </div>
            <div class="content__item" id="content-3">
                <img class="content__item-img rounded-right" src="images/2.jpg" alt="Apple Watch Content" />
                <div class="content__item-inner">
                    <h2>The iPhone 6</h2>
                    <h3>Incredible performance for powerful apps</h3>
                    <p>Built on 64-bit desktop-class architecture, the new A8 chip delivers more power, even while driving a larger display. The M8 motion coprocessor efficiently gathers data from advanced sensors and a new barometer. And with increased battery life, iPhone 6 lets you do more, for longer than ever.</p>
                    <p><a href="#">Learn more about this technology &xrarr;</a></p>
                </div>
            </div>
            <div class="content__item" id="content-4">
                <img class="content__item-img rounded-right" src="images/3.jpg" alt="Apple Watch Content" />
                <div class="content__item-inner">
                    <h2>The iPhone 6</h2>
                    <h3>Incredible performance for powerful apps</h3>
                    <p>Built on 64-bit desktop-class architecture, the new A8 chip delivers more power, even while driving a larger display. The M8 motion coprocessor efficiently gathers data from advanced sensors and a new barometer. And with increased battery life, iPhone 6 lets you do more, for longer than ever.</p>
                    <p><a href="#">Learn more about this technology &xrarr;</a></p>
                </div>
            </div> -->
            <button class="button button--close">
                <i class="icon icon--circle-cross"></i>
                <span class="text-hidden">Close content</span>
            </button>
        </section>
    </div>
    <script src="/home/js/classie.js"></script>
    <script src="/home/js/dynamics.min.js"></script>
    <script src="/home/js/main.js"></script>
</body>
</html>