<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>纯js和CSS3分散式宝丽来图片画廊</title>
    <link rel="stylesheet" href="/css/player.css">
    <link rel="stylesheet" type="text/css" href="/css/polaroid-gallery.css"/>
</head>
<body class="fullscreen">
    <div id="gallery" class="fullscreen"></div>
    <div id="nav" class="navbar">
        <button id="preview">&lt; 前一张</button>
        <button id="next">下一张 &gt;</button>
    </div>
    <div id="content" style="z-index: 99999">
        <div id="content__item"> </div>
        <button class="button button--close" id="button--close">
            <span class="text-hidden"> 关闭</span>
        </button>
    </div>

    @include('player.player')
</body>
<script src="http://www.jq22.com/jquery/jquery-2.1.1.js"></script>
<script src="/js/LPlayer/jquery.marquee.min.js"></script>
<script src="/js/LPlayer/player.js"></script>
<script src="/js/polaroid-gallery.js"></script>
<script>
    $(function () {
        new polaroidGallery("data/data.json");
        var playlist = [
        {
            title:"最幸福的事",
            artist:"梁文音",
            mp3:"http://xph.lylja.com/bgsound/bgsound.mp3",
            cover:"http://musicdata.baidu.com/data2/pic/26418b044183959c716ebe1c360eee85/262031072/262031072.jpg@s_0,w_300",
        }
        ];

        LPlayer.start({
            playlist: playlist,
            autoPlay: true,
            type: 'json'
        });
    })
</script>

</html>