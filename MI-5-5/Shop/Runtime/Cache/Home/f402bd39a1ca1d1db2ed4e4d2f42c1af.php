<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" type="text/css" href="/MI-4-20/Public/Common/personal/main.min.css">
<!-- 个人中心首页 -->
<div class="uc-content-box">
        <div class="uc-content-box portal-content-box" style="width: 882px;height: 605px;">
        <div class="box-bd" style="width: 882px;height: 581px;padding-top: 24px;">
            <div class="portal-main clearfix" style="width:882px;height: 200px;">
                <div class="user-card">
                    <h2 class="username"><?php echo ($list[0]["name"]); ?></h2>
                    <a class="link" href="<?php echo U('Account/account','uid='.$list['uid']);?>">修改个人信息 &gt;</a>
                    <img class="avatar" src="/MI-4-20/Public/<?php echo ($list[0][pic]); ?>" width="150" height="150">
                </div>
                <div class="user-actions">
                    <ul class="action-list">
                        <li>账户安全:<span class="level level-3">较高</span></li>
                        <li>绑定手机：<span class="tel"><?php echo ($list[0]["phone"]); ?></span></li>
                        <li>绑定邮箱：<span class="tel"><?php echo ($list[0]["email"]); ?></span></li>
                    </ul>
                </div>
            </div>


            <div class="portal-sub" id="row">
                <ul class="info-list clearfix" style="width:882px;height: 380px;">
                    <li>
                        <h3>待支付的订单</h3>
                        <a href="<?php echo U('Personal/');?>">查看待支付订单</a>
                        <img src="/MI-4-20/Public/Common/personal/portal-icon-1.png" alt="">
                    </li>
                    <li>
                        <h3>待收货的订单</h3>
                        <a href="">查看待收货订单</a>
                        <img src="/MI-4-20/Public/Common/personal/portal-icon-2.png" alt="">
                    </li>
                    <li>
                        <h3>待评价商品</h3>
                        <a href="<?php echo U('Reviews/reviews');?>">查看待评价商品</a>
                        <img src="/MI-4-20/Public/Common/personal/portal-icon-3.png" alt="">
                    </li>
                    <li>
                        <h3>喜欢的商品</h3>
                        <a href="<?php echo U('Commodity/commodity');?>">查看喜欢的商品</a>
                        <img src="/MI-4-20/Public/Common/personal/portal-icon-4.png" alt="">
                    </li>
                </ul>
            </div>
        </div>
        </div>
</div>
<!-- <script type="text/javascript">
$('.row a').click(function () {
// alert(1);
    var that = $(this);

    var cateId = $(this).attr('data-value');
    // console.log($(this).attr('data-value'));

    $.get(
        '<?php echo U('Personal/index');?>',

        {cateId: cateId},

        function(data){
            
            console.log(data);

            //把整个模板内容返回到指定的div中
            $('.uc-main-box').html(data);
    },
    'json'
    );    
});
</script> -->