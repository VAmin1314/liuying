<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>小屁孩的登录界面</title>

    <link rel="stylesheet" type="text/css" href="/admin/css/default.css">
    <link rel="stylesheet" type="text/css" href="/admin/css/styles.css">
    <link rel="stylesheet" href="/layui/css/layui.css" type="text/css">
</head>
<body>
    <div class='login'>
        <div class='login_title'>
            <span>账号登录</span>
        </div>
        <div class='login_fields'>
            <div class='login_fields__user'>
                <div class='icon'>
                    <img src='/admin/img/user_icon_copy.png'>
                </div>
                <input placeholder='用户名' type='text' name="name" autocomplete="off">
                <div class='validation'>
                    <img src='/admin/img/tick.png'>
                </div>
            </div>
            <div class='login_fields__password'>
                <div class='icon'>
                    <img src='/admin/img/lock_icon_copy.png'>
                </div>
                <input placeholder='密码' type='password' name="password" autocomplete="off">
                <div class='validation'>
                    <img src='/admin/img/tick.png'>
                </div>
            </div>
            <div class='login_fields__submit'>
                <input type='submit' value='登录'>
                <div class='forgot'>
                    <a href='javascript:;' class="forgot-password">忘记密码?</a>
                </div>
            </div>
        </div>

        <div class='success'>
            <h2 style="font-size: 30px"></h2>
            <p></p>
        </div>

        <div class='disclaimer'>
            <p>小屁孩的登录界面</p>
        </div>
    </div>

    <div class='authent'>
        <img src='/admin/img/puff.svg'>
        <p>认证中...</p>
    </div>
</body>
<script src="/admin/js/jquery.js"></script>
<script type="text/javascript" src='/admin/js/stopExecutionOnTimeout.js?t=1'></script>
<script type="text/javascript" src="/admin/js/jquery-ui.min.js"></script>
<script src="/layui/layui.js" ></script>
<script>
    $('input[type="submit"]').click(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var name = $('input[name=name]').val();
        var password = $('input[name=password]').val();
        if (name == '' || password == '') {
            layui.use('layer', function(){
                var layer = layui.layer;
                layer.msg('用户名或密码不能为空。');
            });

            return false;
        }

        $('.login').addClass('test');

        setTimeout(function () {
            $('.login').addClass('testtwo');
        }, 300);

        setTimeout(function () {
            $('.authent').show().animate({ right: -320 }, {
                easing: 'easeOutQuint',
                duration: 600,
                queue: false
            });
            $('.authent').animate({ opacity: 1 }, {
                duration: 200,
                queue: false
            }).addClass('visible');
        }, 500);

        // 求情验证之后
        setTimeout(function () {
            $('.authent').show().animate({ right: 90 }, {
                easing: 'easeOutQuint',
                duration: 600,
                queue: false
            });
            $('.authent').animate({ opacity: 0 }, {
                duration: 200,
                queue: false
            }).addClass('visible');
            $('.login').removeClass('testtwo');
        }, 2500);

        // 登录框弹回
        setTimeout(function () {
            $('.login').removeClass('test');
            $('.login div').fadeOut(123);
        }, 2800);

        // 最后成功的状态
        setTimeout(function () {
            $.post('/backend/login', {name: name, password: password}, function (data) {
                if (data.status == 'success') {
                    $('.success h2').html('认证成功');
                    $('.success p').html('页面跳转中  <a href="/backend" style="color: #fff">点击跳转</a>');
                    setTimeout(function () {
                        location.href = '/backend';
                    }, 500);
                } else {
                    $('.success h2').html('认证失败');
                    $('.success p').html(data.message);
                    $('.success').append('<a href="./" style="color:#fff;position: relative;top: 10em;cursor: pointer;">返回重新登录</a>');
                }
                $('.success').fadeIn();
            })
        }, 3200);
    });

    $('input[type="text"],input[type="password"]').focus(function () {
        $(this).prev().animate({ 'opacity': '1' }, 200);
    });

    $('input[type="text"],input[type="password"]').blur(function () {
        $(this).prev().animate({ 'opacity': '.5' }, 200);
    });

    $('input[type="text"],input[type="password"]').keyup(function () {
        if (!$(this).val() == '') {
            $(this).next().animate({
                'opacity': '1',
                'right': '30'
            }, 200);
        } else {
            $(this).next().animate({
                'opacity': '0',
                'right': '20'
            }, 200);
        }
    });

    var open = 0;
    $('.tab').click(function () {
        $(this).fadeOut(200, function () {
            $(this).parent().animate({ 'left': '0' });
        });
    });

    $('.forgot-password').click(function () {
        layui.use('layer', function(){
            var layer = layui.layer;
            layer.msg('是不是傻？？那么简单的密码都忘记！', {icon: 5});
        });
    })
</script>
</html>