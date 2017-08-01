<?php if (!defined('THINK_PATH')) exit();?><!-- 编辑用户信息 -->
<link rel="stylesheet" type="text/css" href="/MI-4-20/Public/Common/object/css/heart-mymsg.css" >
<div class="n-frame">
    <div id="form1" class="hmsgform1">
        <form action="<?php echo U('Personal/updateuserimg');?>" method="post" enctype="multipart/form-data">
            <div class="hmsgf1title">
                设置头像
                <div onmousedown="form1.style.display='none';">×</div>
            </div>
            <div class="hmsgfmain">
                <p>请上传图片：</p><br>
                <input type="button" value="上传文件" onClick="t_file.click()">
                <input name="pic" type="file" id="t_file" style="display:none">
                <p class="hmsgfp">jpg 或 png，大小不超过2M</p><br>
                <input id="hmsgfsub" type="submit" value="上传">
            </div>
        </form>
    </div>
    <div id="form2" class="hmsgform2">
        <form>
            <div class="hmsgf2title">
                编辑基础资料
                <div onmousedown="form2.style.display='none';">×</div>
            </div>
            <div class="hmsgf2main" style="width:292px;height: 20px;">

                    姓&nbsp;&nbsp;&nbsp;名：<input type="text" name="name" required placeholder="用户名必须以字母开头" value="" style="width: 200px;height: 20px;">
            </div>
            <div class="hmsgf2main" style="width:292px;height: 20px;">

                    邮&nbsp;&nbsp;&nbsp;箱：<input type="email" name="email" placeholder="邮箱" value="" style="width: 200px;height: 20px;">

            </div>
            <div class="hmsgf2main" style="width:292px;height: 20px;">
      
                    手机号：<input type="text" name="phone" placeholder="手机号" value="" style="width: 200px;height: 20px;">
          
            </div>
            <div class="hmsgf2main2">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="save" type="button" value="保存">
                <input type="button" value="取消">
            </div>
        </form>
    </div>
    <div class="hmsg">
        <div class="hmsgtx">
            <div class="hmsgimg">
                <img src="/MI-4-20/Public/<?php echo ($detail["pic"]); ?>">
            </div>
            <p onmousedown="form1.style.display='block';">设置头像</p>
        </div>
        <div class="hmsgqt">
            <div class="hmsgtitle">
                <p>基础资料</p>
                <span onmousedown="form2.style.display='block';"><i class="fa fa-pencil"></i> 编辑</span>
            </div>
            <div class="hmsgty">
                <div>姓名：</div>
                <div><?php echo ($list["name"]); ?></div>        
            </div>
            <div class="hmsgty">
                <div>邮箱：</div>
                <div><?php echo ($list["email"]); ?></div>
            </div>
            <div class="hmsgty">
                <div>手机号：</div>
                <div><?php echo ($list["phone"]); ?></div>
            </div>
            <div class="hmsgty">
                <div>生日：</div>
                <div><?php echo ($detail["birthday"]); ?></div>
            </div>
            <div class="hmsgty">
                <div>性别：</div>
                <div><?php echo ($sex); ?></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#save').click(function () {
        console.log(1);
        var res = [];

        res['name'] = $('input[name=name]').val();
        res['email'] = $('input[name=email]').val();
        res['phone'] = $('input[name=phone]').val();


        // console.log(res); 
        $.post(
             
            '<?php echo U('Personal/updateuserinfo');?>',
            { 
                cateName:res['name'],
                cateEmail:res['email'],
                catePhone:res['phone']
            },
             function (data){

                console.log(data);
             },
             'json'
        );

    });


</script>