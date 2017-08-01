<?php if (!defined('THINK_PATH')) exit();?><div data-stat="<?php echo ($stat); ?>" name="showGoods2Body" class="dpz-main-right right">
    <?php if($goods != 0): if(is_array($goods)): foreach($goods as $k=>$vo): if($k != count($goods)-1): ?><div class="dpz-main-right-li left" >
                        <p class="dpz-main-right-li-tag" style="background:Darkorange;">免邮费</p>
                        <a class="dpz-main-right-li-a1" href="<?php echo U('Detail/detail',array('gid'=>$vo[id]));?>"><img src="/MI-4-20/Public/imgs/<?php echo ($vo[id]); ?>/<?php echo ($vo[cover]); ?>" /></a>
                        <a class="dpz-main-right-li-a2" href="<?php echo U('Detail/detail',array('gid'=>$vo[id]));?>"><?php echo ($vo["name"]); ?></a>
                        <p class="dpz-main-right-li-p1"><?php echo ($vo["goodsinfo"]); ?></p>
                        <p class="dpz-main-right-li-p2"><?php echo ($vo["price"]); ?>元</p>
                </div>
            <?php else: ?>
                <div class="dpz-main-right-li2 left">
                    <div class="dpz-main-right-li21 left">
                        <a class="dpz-main-right-li21-a1 left" href="<?php echo U('Detail/detail',array('gid'=>$vo[id]));?>"><?php echo ($vo["name"]); ?></a>
                        <p class="dpz-main-right-li21-p1 left"><?php echo ($vo["price"]); ?>元</p>

                        <a class="dpz-main-right-li21-a2" href="<?php echo U('Detail/detail',array('gid'=>$vo[id]));?>"><img src="/MI-4-20/Public/imgs/<?php echo ($vo[id]); ?>/<?php echo ($vo[cover]); ?>" /></a>
                    </div>
                    <div class="clear"></div>
                    <div class="dpz-main-right-li22 left">
                        <a class="dpz-main-right-li22-a1 left" href="<?php echo U('GoodsList/showGoodsList',array('tid'=>$stat,'typename'=>$typename));?>">浏览更多</a>
                        <a class="dpz-main-right-li22-p1 left" href="<?php echo U('GoodsList/showGoodsList',array('tid'=>$stat,'typename'=>$typename));?>"><?php echo ((isset($typename) && ($typename !== ""))?($typename):'热门'); ?></a>
                        <a class="dpz-main-right-li22-a2" href="<?php echo U('GoodsList/showGoodsList',array('tid'=>$stat,'typename'=>$typename));?>"><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div><?php endif; endforeach; endif; endif; ?>
</div>