<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>注册</title>
	<link rel="stylesheet" href="/MI-4-20/Public/Home/css/register.css">
	<link rel="stylesheet" href="/MI-4-20/Public/Home/css/common.css">
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/chenxu.css">
</head>
<body style="background:#f9f9f9">
	<div class="regform" style="width:850px;height: 630px;">
		<div class="reFlogo">
			<img src="/MI-4-20/Public/Home/img/logo.png" width="49">
		</div>
		<div class="reFtitle">
			<span>注册小米账号</span>
		</div>
		<div class="reFmain">
			<form action="<?php echo U(Register/register);?>" method="post" name="regForm" style="height:600px;">
                <div>
                    <select name='area' id="test">
                        <optgroup label="常用">
    				        <option selected> 中国(+86)</option>
                            <option> 中国台湾+886</option>
                            <option> 中国香港+852</option>
                            <option> Brazil+55</option>
                            <option> India+91</option>
                            <option> Indonesia+62</option>
                            <option> Malaysia+60</option>
                        </optgroup>
                        <optgroup label="A">
                            <option>Andorra+376</option>
                            <option>Afghanistan+93</option>
                            <option >Antigua and Barbuda+1</option>
                            <option >Anguilla+1</option>
                            <option >Albania+355</option>
                            <option >Armenia+374</option>
                            <option >Angola+244</option>
                            <option >Argentina+54</option>
                            <option >American Samoa+1</option>
                            <option >Austria+43</option>
                            <option >Australia+61</option>
                            <option >Aruba+297</option>
                            <option >Azerbaijan+994</option>
                            <option >Algeria+213</option>
                        </optgroup>
                        <optgroup label="B">
                            <option>Bosnia and Herzegovina+387</option>
                            <option>Barbados+1</option>
                            <option>Bangladesh+880</option>
                            <option>Belgium+32</option>
                            <option> Burkina Faso+226</option>
                            <option>Bulgaria+359</option>
                            <option>Bahrain+973</option>
                            <option>Burundi+257</option>
                            <option>Benin+229</option>
                            <option>Bermuda+1</option>
                            <option> Brunei+673</option>
                            <option>Bolivia+591</option>
                            <option>Bonaire, Sint Eustatius and Saba+599</option>
                            <option>Brazil+55</option>
                            <option>Bahamas+1</option>
                            <option>Bhutan+975</option>
                            <option>Botswana+267</option>
                            <option>Belarus+375</option>
                            <option>Belize+501</option>
                            <option>British Indian Ocean Territory+246</option>
                            <option>British Virgin Islands+1</option>
                        </optgroup>
                    </select>
                </div>
                <div class="reFtel">
                
                    <input type='text' name='phone' placeholder="请输入电话号码" required class="phone">
                   
                    <span class="phonetips" style="display: block;width: 142px;height: 21px;padding-left: 230px;color: green"></span>
    
                </div> 
                <div class="reFtel">
               
                    <input type='text' name='email' placeholder="请输入邮箱" maxlength="20" required class="email">
                    <span class="emailtips" style="display: block;width: 142px;height: 21px;padding-left: 230px; color: green;"></span>
                    
                </div>
                <div class="reFtel">
                    <input type='password' name='pass' placeholder="请输入密码" maxlength="11" required>
                </div>
                <div class="reFven">
                    <input type="text" name="code" placeholder="图片验证码" required>
                    <div>
                        <img src="<?php echo U('Register/getVerify');?>" id="verify_img" title="点击刷新验证码" class="Reg_img">
                    </div>
                    <input type="submit" value="立即注册" onclick="addaid();">
                </div>
                <div class="reFbottom">
                    <span>点击“立即注册”，即表示您同意并愿意遵守小米 <b>用户协议<b> 和 <b>隐私政策</b></span>
                </div>
			</form>
		</div>
	</div>
    <br/>
    <br/>
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

        //点击下拉框拿到选中的value
        function addaid(){

            var obj = document.getElementByIdx("test");

            var index = obj.selectedIndex;

            var value = obj.options[index].value;

            document.getElementByIdx("test").value = value;
        }
     
        //失去焦点检测电话号码是否可以注册
        $('.phone').blur(function(){
            // alert(1);exit;
            var phone = $('input[name="phone"]').val();

            // alert($('input[name="phone"]').val());
                
            var that = $(this);
          
            $.post(
                '<?php echo U('Register/registerPhoneAjax');?>',

                {phone:phone},

                function(data){
                    // console.log(1);
                    console.log(data);
                    if (data === 1){

                        //账号存在
                        $('.phonetips').html('账号已经存在').css("color","red");

                    } else {

                        //账号可以注册
                        $('.phonetips').html('账号可以注册').css("color","green");
                    }
                }                 
            ),
            'json'
        });

        //失去焦点检测邮箱是否可以注册
        $('.email').blur(function(){
            // alert(1);exit;
            var email = $('input[name="email"]').val();

            // alert($('input[name="phone"]').val());
                
            var that = $(this);
          
            $.post(
                '<?php echo U('Register/registerEmailAjax');?>',

                {email:email},

                function(data){
                    // console.log(1);
                    console.log(data);
                    if (data === 1){

                        //账号存在
                        $('.emailtips').html('邮箱已经存在').css("color","red");

                    } else {

                        //账号可以注册
                        $('.emailtips').html('邮箱可以注册').css("color","green");
                    }
                }                 
            ),
            'json'
        });
    </script>
</body>
</html>