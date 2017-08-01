<?php if (!defined('THINK_PATH')) exit(); if($goods != 0): if(is_array($goods)): foreach($goods as $key=>$vo): ?><div class="znyj-main-right-li left">
            <p class="znyj-main-right-li-tag" style="background:Darkorange;">免邮费</p>
            <a class="znyj-main-right-li-a1" href="<?php echo U('Detail/detail',array('gid'=>$vo[id]));?>"><img src="/MI-4-20/Public/imgs/<?php echo ($vo[id]); ?>/<?php echo ($vo[cover]); ?>" /></a>
            <a class="znyj-main-right-li-a2" href="<?php echo U('Detail/detail',array('gid'=>$vo[id]));?>"><?php echo ($vo["name"]); ?></a>
            <p class="znyj-main-right-li-p1"><?php echo ($vo["goodsinfo"]); ?></p>
            <p class="znyj-main-right-li-p2"><?php echo ($vo["price"]); ?>元</p>
        </div><?php endforeach; endif; endif; ?>