<?php if (!defined('THINK_PATH')) exit(); if($recommend != 0): if(is_array($recommend)): foreach($recommend as $k=>$vo): if(in_array(($k), explode(',',"0,5"))): ?><div class="wntj-list-main-td1 left">
                <a class="wntj-list-main-td-a1" href="<?php echo U('Detail/detail',array('gid'=>$vo[id]));?>"><img width="140px" height="140px" src="/MI-4-20/Public/imgs/<?php echo ($vo[id]); ?>/<?php echo ($vo[cover]); ?>" /></a><br>
                <a class="wntj-list-main-td-a2" href=<?php echo U('Detail/detail',array('gid'=>$vo[id]));?>"><?php echo ($vo["name"]); ?></a>
                <p style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;padding:0 10px" class="wntj-list-main-td-p1"><?php echo ($vo["goodsinfo"]); ?></p>
                <p class="wntj-list-main-td-p2"><?php echo ($vo["price"]); ?>元</p>
            </div>
        <?php else: ?>
            <div class="wntj-list-main-td2 left">
                <a class="wntj-list-main-td-a1" href="<?php echo U('Detail/detail',array('gid'=>$vo[id]));?>"><img width="140px" height="140px" src="/MI-4-20/Public/imgs/<?php echo ($vo[id]); ?>/<?php echo ($vo[cover]); ?>" /></a><br>
                <a class="wntj-list-main-td-a2" href="<?php echo U('Detail/detail',array('gid'=>$vo[id]));?>"><?php echo ($vo["name"]); ?></a>
                <p style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;padding:0 10px" class="wntj-list-main-td-p1"><?php echo ($vo["goodsinfo"]); ?></p>
                <p class="wntj-list-main-td-p2"><?php echo ($vo["price"]); ?>元</p>
            </div><?php endif; endforeach; endif; endif; ?>