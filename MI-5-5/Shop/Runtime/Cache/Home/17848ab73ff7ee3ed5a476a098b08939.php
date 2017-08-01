<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <title>小米商城登录</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/login.css">
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/common.css">
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/chenxu.css">
</head>
<body>
    <header>
        <img src='/MI-4-20/Public/Home/img/login/logo.png'>
    </header>
    <div id='loginbody'>
        <div class='loginform right'>
            <div class='LFheader'>
                <a style="color:orange" href="#" id="lfa1" onmousedown="
                lfa1.style='color:orange;';
                lfa2.style=''">账号登录</a>
                <span>|</span>
                <a href="#" id="lfa2" onmousedown="
                lfa2.style='color:orange;';
                lfa1.style=''">扫码登录</a>
                
            </div>
            <form class="LFmain" action="<?php echo U('Login/login');?>" method="post">
                    <input type="text" name="telemail" placeholder="手机号码/邮箱">
                    <input type="password" name="pass" placeholder="密码">
                    <input type="submit" value="立刻登录">
            </form>
            <div class="LFmainbottom">
                <a href="<?php echo U('Register/register');?>">注册小米账号</a>
                <span>|</span>
                <a href="#">忘记密码 ?</a>
            </div>
            <div class="LFbottom">
                <span>————————其他方式登录————————</span><br>
                <a onmouseover="i1.src='/MI-4-20/Public/Home/img/login/qq-blue.svg'" onmouseout="i1.src='/MI-4-20/Public/Home/img/login/qq-black.svg'"><img id='i1' src="/MI-4-20/Public/Home/img/login/qq-black.svg"></a>
                <a onmouseover="i2.src='/MI-4-20/Public/Home/img/login/xl-red.svg'" onmouseout="i2.src='/MI-4-20/Public/Home/img/login/xl-black.svg'"><img id='i2' src="/MI-4-20/Public/Home/img/login/xl-black.svg"></a>
                <a onmouseover="i3.src='/MI-4-20/Public/Home/img/login/zfb-blue.svg'" onmouseout="i3.src='/MI-4-20/Public/Home/img/login/zfb-black.svg'"><img id='i3' src="/MI-4-20/Public/Home/img/login/zfb-black.svg"></a>
            </div>
        </div>
    </div>
    <footer>
        <p class="Fp1">
            <a href="#">简体</a>
            <span>|</span>
            <a href="#">繁体</a>
            <span>|</span>
            <a href="#">English</a>
            <span>|</span>
            <a href="#">常见问题</a>
        </p>
        <p class="Fp2">
            小米公司版权所有-京ICP备10046444-
            <img src="/MI-4-20/Public/Home/img/login/ghs.png" alt="国家法院图标">
            京公网安备11010802020134号-京ICP证110507号
        </p>
    </footer>
</body>
</html>