<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" type="text/css" href="/MI-4-20/Public/Common/object/css/heart-myorder.css">

<div class="horder">
    <span>我的订单</span>
    <span>请谨防钓鱼链接或诈骗电话，<a href="#">了解更多 > </a><span>
</div>

<div class="horderfix">
    <div class="horderfixp">
        <a href="#">全部有效订单</a>
        <span>|</span>
        <a href="#">待支付</a>
        <span>|</span>
        <a href="#">待收货</a>
        <span>|</span>
        <a href="#">已关闭</a>
    </div>
    <div class="horderfix-search right">
        <form class="right" action="#">
            <input type="text right" name="osearch" placeholder="订单号">
            <button class="horderfix-search-button right"><p class="fa fa-search"></p></button>
        </form>  
    </div>
    <div style="clear:both"></div>
</div>
<?php if(is_array($list[1])): foreach($list[1] as $key=>$v): if(count($list[0]) != 0): ?><div class="hordermain">
    <div class="homainst">
        <div>
            <span>等待付款</span>
        </div>
    </div>
    <div class="homainmsg">
        <div>
            <span><?php echo ($v["time"]); ?> |<?php echo ($v["name"]); ?>| 订单号：<?php echo ($v["id"]); ?></span>
        </div>
        <div>
            <span>订单金额：<b><?php echo ($v["total"]); ?></b>元</span>
        </div>
    </div>
    <div class="homlist">
        <div class="homlistleft">
            <?php if(is_array($list[0])): foreach($list[0] as $key=>$vo): ?><div class="homlleftl">
                    <div class="homllimg">
                        <a href="#"><img src="/MI-4-20/Public/imgs/<?php echo ($vo["gid"]); ?>/<?php echo ($vo["cover"]); ?>" width="80"></a>
                    </div>
                    <div class="homllmsg">
                        <a href="#"><?php echo ($vo["gname"]); ?> <?php echo ($vo["vname"]); ?> <?php echo ($vo["colorname"]); ?></a><br>
                        <a href="#"><?php echo ($vo["price"]); ?>元×<?php echo ($vo["num"]); ?></a>
                    </div>
                </div><?php endforeach; endif; ?>   
        </div>
        <div class="homlistright">
        <?php if($list[1][0]['ostatus'] == 1): ?><a href="action.php?a=opay&oid=<?=$row['id']?>">立即支付</a><?php endif; ?>
        <?php if($list[1][0]['ostatus'] == 2): ?><a href="action.php?a=opay&oid=<?=$row['id']?>">等待发货</a><?php endif; ?>
        <?php if($list[1][0]['ostatus'] == 3): ?><a href="action.php?a=opay&oid=<?=$row['id']?>">确认收货</a><?php endif; ?>
        <?php if($list[1][0]['ostatus'] == 4): ?><a href="action.php?a=opay&oid=<?=$row['id']?>">已完成</a><?php endif; ?>
        <?php if($list[1][0]['ostatus'] == 5): ?><a href="action.php?a=opay&oid=<?=$row['id']?>">已取消</a><?php endif; ?>
            <a href="heart.php?x=4&oid=<?=$row['id']?>">订单详情</a>
        </div>
    </div>
    <div style="clear:both"></div>
</div>
<?php else: ?>
<div class="hordermain">
    <h1 style="text-align:center;line-height:70px;color:orange;">没有相关订单</h1>
</div><?php endif; endforeach; endif; ?>
<div class="homlistrightbran">
    
     <span style="float:right">
    <a href="heart.php?x=1&p=1<?=$osearch?>">首页</a> |
    <a href="heart.php?x=1&p=<?=($p-1).$osearch?>">上一页</a> |
    <a href="heart.php?x=1&p=<?=($p+1).$osearch?>">下一页</a> |
    <a href="heart.php?x=1&p=<?=$totalPage.$osearch?>">尾页</a>
    </span>
</div>
<div id="page" class="manu">
    <?php echo ($show); ?>
</div>