<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>小米后台登录</title>
	<link rel="icon" href="./img/icon.jpg">
	<link rel="stylesheet" href="/MI-4-20/Public/Sun/css/login.css">
	<link rel="stylesheet" href="/MI-4-20/Public/Sun/css/common.css">
</head>
<body style="background:#f9f9f9">
	<div class="regform">
		<div class="reFlogo">
			<img src="/MI-4-20/Public/Sun/img/logo.png" width="49">
		</div>
		<div class="reFtitle">
			<span>后台登录</span>
		</div>
		<div class="reFmain">
			<form id="form" action="" method="post">
                <div class="reFuser">
                    <input type="text" name="adminname" placeholder="请输入账户名" required>
                </div>
                <div class="reFpass">
                    <input type='password' name='password' placeholder="请输入密码" required>
                </div>
                <div class="reFven">
                    <input id="pic" type="text" placeholder="图片验证码" name='code' required>
                    <div>
                        <img src="<?php echo U('Login/getVerify');?>" id="verify_img" title="点击刷新验证码">
                    </div>
                    <input id="submit" type="submit" value="进入后台">
                </div>
			</form>
		</div>
	</div>
	<div id="footer">
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
            <img src="/MI-4-20/Public/Sun/img/ghs.png" alt="国家法院图标">
            京公网安备11010802020134号-京ICP证110507号
        </p>
    </div>
    <script src="/MI-4-20/Public/Common/jquery.js"></script>
    <script>
        //验证码点击刷新
        $(function(){
            var img = $("#verify_img");
            var src = img.attr("src")+"?";
            img.click(function(){
                img.attr("src",src+Math.random());
            });
        });

        //提示
        // $('input')

        
    </script>
</body>
</html>