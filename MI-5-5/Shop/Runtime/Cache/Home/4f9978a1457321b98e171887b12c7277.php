<?php if (!defined('THINK_PATH')) exit();?>    <!doctype html>
<html>
<head>
    <title>小米商城</title>
    <meta charset="utf-8">
    <link rel="icon" href="/MI-4-20/Public/Home/img/icon.jpg">
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/index-header.css">
<?php if($goods['status'] == 0): ?><link rel="stylesheet" href="/MI-4-20/Public/Home/css/index-list2.css">
<?php else: ?>
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/index-list1.css"><?php endif; ?>
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/index-footer.css">
    <link rel="stylesheet" href="/MI-4-20/Public/Common/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/common.css">
    <link rel="stylesheet" href="/MI-4-20/Public/Common/page.css" />
    <script src="/MI-4-20/Public/Common/jquery.js"></script>
    <script src="/MI-4-20/Public/Common/slider.js"></script>
    <style>
        
        .flexslider {
            margin: 0px auto 20px;
            position: relative;
            width: 100%;
            height: 482px;
            overflow: hidden;
            zoom: 1;
        }

        .flexslider .slides li {
            width: 100%;
            height: 100%;
        }

        .flex-direction-nav a {
            width: 70px;
            height: 70px;
            line-height: 99em;
            overflow: hidden;
            margin: -35px 0 0;
            display: block;
            background: url(/MI-4-20/Public/Common/images/ad_ctr.png) no-repeat;
            position: absolute;
            top: 50%;
            z-index: 10;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
            -webkit-transition: all .3s ease;
            border-radius: 35px;
        }

        .flex-direction-nav .flex-next {
            background-position: 0 -70px;
            right: 0;
        }

        .flex-direction-nav .flex-prev {
            left: 234px;
        }

        .flexslider:hover .flex-next {
            opacity: 0.8;
            filter: alpha(opacity=25);
        }

        .flexslider:hover .flex-prev {
            opacity: 0.8;
            filter: alpha(opacity=25);
        }

        .flexslider:hover .flex-next:hover,
        .flexslider:hover .flex-prev:hover {
            opacity: 1;
            filter: alpha(opacity=50);
        }

        .flex-control-nav {
            width: 100%;
            position: absolute;
            bottom: 10px;
            text-align: center;
        }

        .flex-control-nav li {
            margin: 0 2px;
            display: inline-block;
            zoom: 1;
            *display: inline;
        }

        .flex-control-paging li a {
            background: url(/MI-4-20/Public/Common/images/dot.png) no-repeat 0 -16px;
            display: block;
            height: 16px;
            overflow: hidden;
            text-indent: -99em;
            width: 16px;
            cursor: pointer;
        }

        .flex-control-paging li a.flex-active,
        .flex-control-paging li.active a {
            background-position: 0 0;
        }

        .flexslider .slides a img {
            width: 100%;
            height: 482px;
            display: block;
        }
    
    </style>
</head>
<body>
    <!-- 头部开始 -->
    <header>
        <div class="header-nav">
            <div class="header-a left">
                <ul>
                    <li class="clear-b"><a href="<?php echo U('Index/index');?>">小米商城</a></li>
                    <li><a href="#">MIUI</a></li>
                    <li><a href="#">米聊</a></li>
                    <li><a href="#">游戏</a></li>
                    <li><a href="#">多看阅读</a></li>
                    <li><a href="#">云服务</a></li>
                    <li><a href="#">金融</a></li>
                    <li><a href="#">小米网移动版</a></li>
                    <li><a href="#">问题反馈</a></li>
                    <li><a href="#">Select Region</a></li>
                </ul>
            </div>
            <div class="header-right right">
                <div class="H-right-main">
                    <a <?php echo ($shopcar['stat']); ?> href="<?php echo U('ShopCart/showShopCart');?>" class="H-right-gwc right">
                        <span class="fa fa-shopping-cart"></span>
                        购物车(<?php echo ($shopcar['num']); ?>)
                    </a>
                <?php if($shopcar['val'] != 0): ?><div class="H-right-gwc-scan">
                        <ul>
                        <?php if($shopcar[val] != 0): if(is_array($shopcar[val])): foreach($shopcar[val] as $key=>$vo): ?><li>
                                <div class="H-right-gwc-scan-goods">
                                    <div><img src="/MI-4-20/Public/imgs/<?php echo ($vo["gid"]); ?>/<?php echo ($vo["cover"]); ?>" width="60" height="60"></div>
                                    <div style="width:80px;line-height:40px"><a href="<?php echo U('Detail/detail', array('gid'=>$vo['gid']));?>"><?php echo ($vo["name"]); ?></a></div>
                                    <div style="line-height:40px">
                                        <span><?php echo ($vo["price"]); ?>*<?php echo ($vo["num"]); ?></span>
                                        <a href="<?php echo U('Shopcar/delGoods', array('id'=>$vo['id']));?>"> ×</a>
                                    </div>
                                </div>
                            </li><?php endforeach; endif; endif; ?> 
                        </ul>
                    </div><?php endif; ?>
                </div>
                <a class="H-right-xx right" href="#">消息通知</a>
                <span class="H-right-fg right">|</span>
                <?php if($userInfo != 0): ?><div class="user">
                        <a style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;display:block;width:80px;float:left;padding-left:5px" class="a" href="<?php echo U('Personal/personal');?>"><?php echo ($userInfo["name"]); ?>
                        </a> 
                        <span style="float:right;line-height:40px;padding-right:5px;" class="fa fa-angle-down"></span>  
                        <div class="userul">
                            <ul>
                                <li><a href="<?php echo U('Personal/personal');?>">个人中心</a></li>
                                <li><a href="<?php echo U('Personal/personal',array('where'=>'appraise'));?>">评价晒单</a></li>
                                <li><a href="<?php echo U('Personal/personal',array('where'=>'commodity'));?>">我的喜欢</a></li>
                                <li><a href="<?php echo U('Personal/personal',array('where'=>'edituserinfo'));?>">小米账户</a></li>
                                <li><a href="<?php echo U('Login/loginOut');?>">退出登录</a></li>
                            </ul>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="<?php echo U('Register/register');?>" class="H-right-login right">注册</a>
                    <span class="H-right-fg right">|</span>
                    <a href="<?php echo U('Login/login');?>" class="H-right-login right">登录</a><?php endif; ?>
            </div>
        </div>
    </header>
    <!-- 头部结束 -->
	<!-- 上导航开始 -->
	<div class="topnav-contain">
	    <div class="topnav-main">
	        <a class="topnav-logo left" href="<?php echo U('Index/index');?>"><img src="/MI-4-20/Public/Home/img/logo.png"></a>
	        <div class="topnav-list left">
	            <ul>
	                <li style="font-size:16px" class="topnav-list-li1"><a style="color:block" href="list.php"><?php echo ($top["name"]); ?></a></li>
	            <?php if($top['status'] != 0): ?><div class="buttomnav-contain-list left">
	                    <ul>
	                    <!-- 分类 -->
                	<?php if(count($top['typename']) != 0): if(is_array($top[typename])): foreach($top[typename] as $key=>$vo): ?><li>
	                            <a style="color:block" href="<?php echo U('GoodsList/showGoodsList',array('tid'=>$vo[tids],'typename'=>$vo[groupname]));?>"><?php echo ($vo["groupname"]); ?></a><span class="fa fa-angle-right right"></span>
	                            <div class="buttomnav-list-scond">
	             					<!-- 商品存放处 -->
         				<?php if(($vo[goods]) != "0"): if(is_array($vo[goods])): foreach($vo[goods] as $key=>$vi): ?><div id="BLSli">
                                        <a href="<?php echo U('Detail/detail', array('gid'=>$vi['id']));?>">
                                            <img src="/MI-4-20/Public/imgs/<?php echo ($vi['id']); ?>/<?php echo ($vi['cover']); ?>">
                                            <span style="width:90px;overflow:hidden;display:block;float:right;line-height:30px;font-size:12px;white-space:nowrap;text-overflow:ellipsis;"><?php echo ($vi["name"]); ?></span>
                                        </a>
                                        <a href="<?php echo U('Detail/detail', array('gid'=>$vi['id']));?>">选购</a>
                                    </div><?php endforeach; endif; endif; ?>
	                            </div>
                        	</li><?php endforeach; endif; endif; ?>
	                    </ul>
	                </div><?php endif; ?>
	                <li style="font-size:16px" class="topnav-list-li21">小米手机</li>
	                <div class="topnav-x1">
	                    <ul>
	                <?php if($topgoods[xm] != 0): if(is_array($topgoods[xm])): foreach($topgoods[xm] as $key=>$vo): ?><li class="topnav-xl-l1">
	                            <a class="topnav-xl-a1" href="<?php echo U('Detail/detail',array('gid'=>$vo['id']));?>"><img src="/MI-4-20/Public/imgs/<?php echo ($vo[id]); ?>/<?php echo ($vo['cover']); ?>"></a>
	                            <a class="topnav-xl-a2" href="<?php echo U('Detail/detail',array('gid'=>$vo['id']));?>"><?php echo ($vo['name']); ?></a>
	                            <p class="topnav-xl-p1"><?php echo ($vo['price']); ?>元</p>
	                        </li><?php endforeach; endif; endif; ?>
	                    </ul>
	                </div>
	                <li style="font-size:16px" class="topnav-list-li22">红米</li>
	                <div class="topnav-x2">
	                    <ul>
	                <?php if($topgoods[hm] != 0): if(is_array($$topgoods[hm])): foreach($$topgoods[hm] as $key=>$vo): ?><li class="topnav-xl-l1">
                                <a class="topnav-xl-a1" href="<?php echo U('Detail/detail',array('gid'=>$vo['id']));?>"><img src="/MI-4-20/Public/imgs/<?php echo ($vo[id]); ?>/<?php echo ($vo['cover']); ?>"></a>
                                <a class="topnav-xl-a2" href="<?php echo U('Detail/detail',array('gid'=>$vo['id']));?>"><?php echo ($vo['name']); ?></a>
                                <p class="topnav-xl-p1"><?php echo ($vo['price']); ?>元</p>
                            </li><?php endforeach; endif; endif; ?>
	                    </ul>
	                </div>
	                <li style="font-size:16px" class="topnav-list-li23">平板 · 笔记本</li>
	                <div class="topnav-x3">
	                    <ul>
	                <?php if($topgoods[pb] != 0): if(is_array($topgoods[pb])): foreach($topgoods[pb] as $key=>$vo): ?><li class="topnav-xl-l1">
                                <a class="topnav-xl-a1" href="<?php echo U('Detail/detail',array('gid'=>$vo['id']));?>"><img src="/MI-4-20/Public/imgs/<?php echo ($vo[id]); ?>/<?php echo ($vo['cover']); ?>"></a>
                                <a class="topnav-xl-a2" href="<?php echo U('Detail/detail',array('gid'=>$vo['id']));?>"><?php echo ($vo['name']); ?></a>
                                <p class="topnav-xl-p1"><?php echo ($vo['price']); ?>元</p>
                            </li><?php endforeach; endif; endif; ?>
	                    </ul>
	                </div>
	                <li style="font-size:16px" class="topnav-list-li24">电视</li>
	                <div class="topnav-x4">
	                    <ul>
                    <?php if($topgoods[ds] != 0): if(is_array($topgoods[ds])): foreach($topgoods[ds] as $key=>$vo): ?><li class="topnav-xl-l1">
                                <a class="topnav-xl-a1" href="<?php echo U('Detail/detail',array('gid'=>$vo['id']));?>"><img src="/MI-4-20/Public/imgs/<?php echo ($vo[id]); ?>/<?php echo ($vo['cover']); ?>"></a>
                                <a class="topnav-xl-a2" href="<?php echo U('Detail/detail',array('gid'=>$vo['id']));?>"><?php echo ($vo['name']); ?></a>
                                <p class="topnav-xl-p1"><?php echo ($vo['price']); ?>元</p>
                            </li><?php endforeach; endif; endif; ?>
	                    </ul>
	                </div>
	                <li style="font-size:16px" class="topnav-list-li25">盒子 · 影音</li>
	                <div class="topnav-x5">
	                    <ul>
	                <?php if($topgoods[hz] != 0): if(is_array($topgoods[hz])): foreach($topgoods[hz] as $key=>$vo): ?><li class="topnav-xl-l1">
                                <a class="topnav-xl-a1" href="<?php echo U('Detail/detail',array('gid'=>$vo['id']));?>"><img src="/MI-4-20/Public/imgs/<?php echo ($vo[id]); ?>/<?php echo ($vo['cover']); ?>"></a>
                                <a class="topnav-xl-a2" href="<?php echo U('Detail/detail',array('gid'=>$vo['id']));?>"><?php echo ($vo['name']); ?></a>
                                <p class="topnav-xl-p1"><?php echo ($vo['price']); ?>元</p>
                            </li><?php endforeach; endif; endif; ?>
	                    </ul>
	                </div>
	                <li style="font-size:16px" class="topnav-list-li26">路由器</li>
	                <div class="topnav-x6">
	                    <ul>
                    <?php if($topgoods[ly] != 0): if(is_array($topgoods[ly])): foreach($topgoods[ly] as $key=>$vo): ?><li class="topnav-xl-l1">
                                <a class="topnav-xl-a1" href="<?php echo U('Detail/detail',array('gid'=>$vo['id']));?>"><img src="/MI-4-20/Public/imgs/<?php echo ($vo[id]); ?>/<?php echo ($vo['cover']); ?>"></a>
                                <a class="topnav-xl-a2" href="<?php echo U('Detail/detail',array('gid'=>$vo['id']));?>"><?php echo ($vo['name']); ?></a>
                                <p class="topnav-xl-p1"><?php echo ($vo['price']); ?>元</p>
                            </li><?php endforeach; endif; endif; ?>
	                    </ul>
	                </div>
	                <li style="font-size:16px" class="topnav-list-li27">智能硬件</li>
	                <div class="topnav-x7">
	                    <ul>
                    <?php if($topgoods[zn] != 0): if(is_array($topgoods[zn])): foreach($topgoods[zn] as $key=>$vo): ?><li class="topnav-xl-l1">
                                <a class="topnav-xl-a1" href="<?php echo U('Detail/detail',array('gid'=>$vo['id']));?>"><img src="/MI-4-20/Public/imgs/<?php echo ($vo[id]); ?>/<?php echo ($vo['cover']); ?>"></a>
                                <a class="topnav-xl-a2" href="<?php echo U('Detail/detail',array('gid'=>$vo['id']));?>"><?php echo ($vo['name']); ?></a>
                                <p class="topnav-xl-p1"><?php echo ($vo['price']); ?>元</p>
                            </li><?php endforeach; endif; endif; ?>
	                    </ul>
	                </div>
	                <li style="font-size:16px" class="topnav-list-li28">服务</li>
	                <li style="font-size:16px" class="topnav-list-li29">社区</li>
	            </ul>
	        </div>
	        <div class="topnav-search right">
	            <form class="right" action="<?php echo U('Search/searchshow');?>" method="get">
	                <input type="text right" name="search">
	                <button class="topnav-search-button right"><p class="fa fa-search"></p></button>
	            </form>  
	        </div> 
	    </div>
	</div>
	<!-- 上导航结束 -->
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/index-body.css">
    <!-- <link rel="stylesheet" href="/MI-4-20/Public/Common/bootstrap/css/bootstrap.css" /> -->
    <!-- 下导航开始 -->
    <div class="buttomnav">
        <div class="buttomnav-contain">
            <div class="buttomnav-contain-list left">
                <ul>
            <?php if($goods['typename'] != 0): if(is_array($goods['typename'])): foreach($goods['typename'] as $key=>$vo): ?><li>
                        <a style="color:white" href="<?php echo U('GoodsList/showGoodsList',array('tid'=>$vo[tids],'typename'=>$vo[groupname]));?>"><?php echo ($vo["groupname"]); ?></a><span class="fa fa-angle-right right"></span>
                        <div class="buttomnav-list-scond">
                    <?php if($vo[goods] != 0): $__FOR_START_1629838268__=0;$__FOR_END_1629838268__=ceil(count($vo['goods'])/6);for($i=$__FOR_START_1629838268__;$i < $__FOR_END_1629838268__;$i+=1){ ?><ul class="left">
                            <?php $__FOR_START_123050953__=6*$i;$__FOR_END_123050953__=6*($i+1)-1;for($k=$__FOR_START_123050953__;$k < $__FOR_END_123050953__;$k+=1){ if((isset($vo['goods'][$k])) != "0"): ?><li id="BLSli">
                                        <a href="<?php echo U('Detail/detail', array('gid'=>$vo[goods][$k][id]));?>">
                                            <img src="/MI-4-20/Public/imgs/<?php echo ($vo[goods][$k][id]); ?>/<?php echo ($vo['goods'][$k][cover]); ?>">
                                            <span><?php echo ($vo['goods'][$k]['name']); ?></span>
                                        </a>
                                        <a href="<?php echo U('Detail/detail', array('gid'=>$vo[goods][$k][id]));?>">选购</a>
                                    </li><?php endif; } ?>
                                </ul><?php } endif; ?>
                        </div>
                    </li><?php endforeach; endif; endif; ?>
                </ul>
            </div>
            <!-- 图片轮播开始 -->
            <div class="buttomnav-contain-lunbo">
            <?php if($slide != 0): if(is_array($slide)): foreach($slide as $k=>$vo): ?><div class=""><a href="<?php echo ($vo["link"]); ?>"><img width="1226px" height="460px" src="/MI-4-20/Public/<?php echo ($vo["url"]); ?>"></a></div><?php endforeach; endif; endif; ?>
            <?php if($slide != 0): ?><div id="banner_tabs" class="flexslider">
                    <ul class="slides">
                    <?php if(is_array($slide)): foreach($slide as $k=>$vo): ?><li>
                            <a target="_blank" href="<?php echo ($vo["link"]); ?>">
                                <img width="1226px" height="482px" alt="" src="/MI-4-20/Public/<?php echo ($vo["url"]); ?>">
                            </a>
                        </li><?php endforeach; endif; ?>
                    </ul>
                    <ul class="flex-direction-nav">
                        <li style=""><a class="flex-prev" href="javascript:;">Previous</a></li>
                        <li><a class="flex-next" href="javascript:;">Next</a></li>
                    </ul>
                    <ol id="bannerCtrl" class="flex-control-nav flex-control-paging">
                    <?php $__FOR_START_1694604600__=0;$__FOR_END_1694604600__=count($slide);for($i=$__FOR_START_1694604600__;$i < $__FOR_END_1694604600__;$i+=1){ ?><li><a><?php echo ($i+1); ?></a></li><?php } ?>
                    </ol>
                </div><?php endif; ?>
            </div>
            <!-- 图片轮播结束 -->
        </div>
    </div>
    <!-- 下导航结束 -->

    <!-- 下导航下方那行开始 -->
    <div class="bottomnav-sub">
        <div class="bottomnav-sub-contain">
            <div class="bottomnav-sub1 left">
                <div class="bottomnav-sub1-td">
                    <a href="#">
                        <span class="fa fa-mobile"></span>
                        <p>选购手机</p>
                    </a>
                </div>
                <div class="bottomnav-sub1-td">
                    <a href="#">
                        <span class="fa fa-gift"></span>
                        <p>企业团购</p>
                    </a>
                </div>
                <div class="bottomnav-sub1-td">
                    <a href="#">
                        <span class="fa fa-refresh"></span>
                        <p>官翻产品</p>
                    </a>
                </div>
                <div class="bottomnav-sub1-td">
                    <a href="#">
                        <span class="fa fa-save"></span>
                        <p>小米移动</p>
                    </a>
                </div>
                <div class="bottomnav-sub1-td">
                    <a href="#">
                        <span class="fa fa-exchange"></span>
                        <p>以旧换新</p>
                    </a>
                </div>
                <div class="bottomnav-sub1-td">
                    <a href="#">
                        <span class="fa fa-credit-card-alt"></span>
                        <p>话费充值</p>
                    </a>
                </div>
            </div>
            <?php if($board[1] != 0): if(is_array($board[1])): foreach($board[1] as $key=>$vo): ?><div class="bottomnav-sub2 left">
                        <a href="<?php echo ($vo["link"]); ?>"><img src="/MI-4-20/Public/<?php echo ($vo["url"]); ?>" height="170px" width="316px"></a>
                    </div><?php endforeach; endif; endif; ?>
        </div>
    </div>
    <!-- 下导航下面那行结束 -->

    <!-- 明星单品开始 -->
    <div class="mxdp">
        <span class="left">小米明星单品</span>
        <div class="right">
            <span class="fa fa-angle-left left"></span>  
            <span class="fa fa-angle-right left"></span>
        </div>
    </div>
    <div class="mxdp-list">
        <div class="mxdp-list-main">
        <?php if($star != 0): if(is_array($star)): foreach($star as $k=>$vo): if(in_array(($k), explode(',',"0,5"))): ?><div class="mxdp-list-main-td1 left">
                        <a class="mxdp-list-main-td-a1" href="<?php echo U('Detail/detail',array('gid'=>$vo[id]));?>"><img width="160px" height="160px" src="/MI-4-20/Public/imgs/<?php echo ($vo[id]); ?>/<?php echo ($vo["cover"]); ?>" /></a><br>
                        <a class="mxdp-list-main-td-a2" href="<?php echo U('Detail/detail',array('gid'=>$vo[id]));?>"><?php echo ($vo["name"]); ?></a>
                        <p style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;padding:0 10px" class="mxdp-list-main-td-p1"><?php echo ($vo["goodsinfo"]); ?></p>
                        <p class="mxdp-list-main-td-p2"><?php echo ($vo["price"]); ?>元</p>
                    </div>
                <?php else: ?>
                    <div class="mxdp-list-main-td2 left">
                        <a class="mxdp-list-main-td-a1" href="<?php echo U('Detail/detail',array('gid'=>$vo[id]));?>"><img width="160px" height="160px" src="/MI-4-20/Public/imgs/<?php echo ($vo[id]); ?>/<?php echo ($vo["cover"]); ?>" /></a><br>
                        <a class="mxdp-list-main-td-a2" href="<?php echo U('Detail/detail',array('gid'=>$vo[id]));?>"><?php echo ($vo["name"]); ?></a>
                        <p style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;padding:0 10px" class="mxdp-list-main-td-p1"><?php echo ($vo["goodsinfo"]); ?></p>
                        <p class="mxdp-list-main-td-p2"><?php echo ($vo["price"]); ?>元</p>
                    </div><?php endif; endforeach; endif; endif; ?>
        </div>
    </div>
    <!-- 明星单品结束 -->

    <!-- 页面主体开始 -->
    <div class="main" id="main">

        <!-- 智能硬件头部开始 -->
    <?php if($showGoods1 != 0): ?><div class="znyj-header" id="showGoods1" data-tid="<?php echo ($showGoods1[tids]); ?>" data-id="<?php echo ($showGoods1[id]); ?>">
            <span class="left"><?php echo ($showGoods1['groupname']); ?></span>
            <div class="right">
                <a href="<?php echo U('GoodsList/showGoodsList',array('tid'=>$showGoods1['tids'],'typename'=>$showGoods1['groupname']));?>">
                    <span class="left">查看全部&nbsp;&nbsp;</span>  
                    <span class="fa fa-angle-right left"></span>
                <a>
            </div>
        </div>
        <!-- 智能硬件头部结束 -->

        <!-- 智能硬件主体开始 -->
        <div class="znyj-main">
            <div class="znyj-main-left left">
                <a href=""><img id="showGoods1Board" width="234px" height="614px" src=""></a>
            </div>
            <div name="showGoods1Body" class="znyj-main-right right">

            </div>
        </div><?php endif; ?>
        <!-- 智能硬件主体结束 -->

    <?php if($showGoods2 != 0): if(is_array($showGoods2)): foreach($showGoods2 as $k=>$vi): ?><!-- 头部开始 -->
        <div name="showGoods2" class="dpz-header" data-stat="0" data-tid="<?php echo ($vi[tid]); ?>" data-id="<?php echo ($vi[id]); ?>">
            <span class="left"><?php echo ($vi['typename']); ?></span>
            <div class="right">
                <span name="n1" data-id="<?php echo ($vi['tid']); ?>" style="border-bottom:2px solid #ff6700;color:#ff6700;">热门</span>
            <?php if(is_array($vi['tids'])): foreach($vi['tids'] as $k=>$vo): ?><span name="n1" data-id="<?php echo ($vo['id']); ?>"><?php echo ($vo['typename']); ?></span><?php endforeach; endif; ?>
            </div>
        </div>
        <!-- 头部结束 -->

        <!-- 主体开始 -->
        <div class="dpz-main">
            <div class="dpz-main-left left" name="showGoods2Board">
                <div class="dpz-main-left-li"><a href="#"><img width="234px" height="300px" src=""></a></div>
                <div class="dpz-main-left-li"><a href="#"><img width="234px" height="300px" src=""></a></div>
            </div>
        </div>
        <!-- 主体结束 --><?php endforeach; endif; endif; ?>

        <!-- 为你推荐开始 -->
        <div class="wntj">
            <span class="left">为你推荐</span>
            <div class="right">
                <span id="w1" style="border:1px solid #e0e2e8; color:#e0e2e8" class="fa fa-angle-left left" onmousedown="
                w3.style='transform:translateX(0px);';
                w1.style='border:1px solid #e0e2e8;color:#e0e2e8;';
                w2.style='border:1px solid #000;color:#000;'"></span>  
                <span id="w2" style="border:1px solid black;" class="fa fa-angle-right left" onmousedown="
                w3.style='transform:translateX(-1226px);';
                w2.style='border:1px solid #e0e2e8;color:#e0e2e8;';
                w1.style='border:1px solid #000;color:#000;'"></span>
            </div>
        </div>
        <div class="wntj-list">
            <div id="w3" class="wntj-list-main">
            </div>
        </div>
        <!-- 为你推荐结束 -->
        <!-- 热评商品开始 -->
        <div class="rpsp-header">
            <span class="left">热评商品</span>
        </div>
        <div class="rpsp-main">
            <div class="rpsp-main-list1 left">
                <a href="#"><img src="/MI-4-20/Public/Home/img/rpsp/1.jpg"></a>
                <div class="rpsp-main-list1-d1">
                    <p class="rpsp-main-list1-d1p1"><a href="#" style="display:block;">包装很让人感动，式样也很可爱，做出的饭全家人都爱吃，超爱五星！手机控制还是不太熟练，最主要是没有连接...</a></p>
                    <p class="rpsp-main-list1-d1p2">来自CGC的评价</p>
                    <div class="rpsp-main-list1-d2">
                        <p class="left"><a>米家IH压力电饭煲</a></p>
                        <span class="left">999元</apan>
                    </div>
                </div>
            </div>
            <div class="rpsp-main-list2 left">
                <a href="#"><img src="/MI-4-20/Public/Home/img/rpsp/2.jpg"></a>
                <div class="rpsp-main-list1-d1">
                    <p class="rpsp-main-list1-d1p1"><a href="#" style="display:block;">包装很让人感动，式样也很可爱，做出的饭全家人都爱吃，超爱五星！手机控制还是不太熟练，最主要是没有连接...</a></p>
                    <p class="rpsp-main-list1-d1p2">来自CGC的评价</p>
                    <div class="rpsp-main-list1-d2">
                        <p class="left"><a>米家IH压力电饭煲</a></p>
                        <span class="left">999元</apan>
                    </div>
                </div>
            </div>
            <div class="rpsp-main-list2 left">
                <a href="#"><img src="/MI-4-20/Public/Home/img/rpsp/3.jpg"></a>
                <div class="rpsp-main-list1-d1">
                    <p class="rpsp-main-list1-d1p1"><a href="#" style="display:block;">包装很让人感动，式样也很可爱，做出的饭全家人都爱吃，超爱五星！手机控制还是不太熟练，最主要是没有连接...</a></p>
                    <p class="rpsp-main-list1-d1p2">来自CGC的评价</p>
                    <div class="rpsp-main-list1-d2">
                        <p class="left"><a>米家IH压力电饭煲</a></p>
                        <span class="left">999元</apan>
                    </div>
                </div>
            </div>
            <div class="rpsp-main-list2 left">
                <a href="#"><img src="/MI-4-20/Public/Home/img/rpsp/4.jpg"></a>
                <div class="rpsp-main-list1-d1">
                    <p class="rpsp-main-list1-d1p1"><a href="#" style="display:block;">包装很让人感动，式样也很可爱，做出的饭全家人都爱吃，超爱五星！手机控制还是不太熟练，最主要是没有连接...</a></p>
                    <p class="rpsp-main-list1-d1p2">来自CGC的评价</p>
                    <div class="rpsp-main-list1-d2">
                        <p class="left"><a>米家IH压力电饭煲</a></p>
                        <span class="left">999元</apan>
                    </div>
                </div>
            </div>
        </div>
        <!-- 热评商品结束 -->
    </div>
    <!-- 页面主体结束 -->

    
    <!-- <link rel="stylesheet" href="/MI-4-20/Public/Common/slider.js"> -->
    <script>
        //轮播图
        $(function() {
            var bannerSlider = Slider($('#banner_tabs'), {
                time: 5000,
                delay: 400,
                event: 'hover',
                auto: true,
                mode: 'fade',
                controller: $('#bannerCtrl'),
                activeControllerCls: 'active'
            });
            $('#banner_tabs .flex-prev').click(function() {
                bannerSlider.prev()
            });
            $('#banner_tabs .flex-next').click(function() {
                bannerSlider.next()
            });
        });

        var showGoods2 = $('div[name=showGoods2]');
        //滚动异步加载
        (function () {
            var stat = 0;
            var stat1 = 0;
            var scHeight = screen.height;
            //绑定滚动事件
            $(window).scroll(function () {
                var win = $(this);
                if( ($(this).scrollTop() + scHeight) > ($('#showGoods1').offset().top-100) && stat == 0 ){
                    //showGoods1的滚动异步加载
                    if( $('#showGoods1').length ){
                        var that = $('#showGoods1');
                        // console.log(that.attr('data-id'));
                        $.get(
                            "<?php echo U('Index/showGoodsAjax');?>",
                            {
                                id:that.attr('data-id'),
                                tid:that.attr('data-tid'),
                                mNo:1,
                                boardType:2,
                                boardNum:1
                            },
                            function (data) {
                                if( data ){
                                    if( data[1] != 0 ){
                                        $('#showGoods1Board').attr('src', '/MI-4-20/Public/'+data[1][0]['url']);
                                    }
                                    $('div[name=showGoods1Body]').html(data[0]);
                                }
                            },
                            'json'
                        );
                    }
                    stat = 1;
                }
                //第二类展示商品的滚动加载
                showGoods2.each(function () {
                    if( (win.scrollTop() + scHeight) > ($(this).offset().top-100) && $(this).attr('data-stat') == 0 ){
                    //showGoods1的滚动异步加载
                        var that = $(this);
                        // console.log(that);
                        $.get(
                            "<?php echo U('Index/showGoodsAjax');?>",
                            {
                                id:that.attr('data-id'),
                                tid:that.attr('data-tid'),
                                mNo:2,
                                boardType:3,
                                boardNum:2
                            },
                            function (data) {
                                if( data ){
                                    // console.log(data);
                                    if( data[1] != 0 ) {
                                        if( data[1].length == 1 )
                                            that.next().find('img').first().attr('src', '/MI-4-20/Public/'+data[1][0]['url']);
                                        if( data[1].length == 2 )
                                            that.next().find('img').last().attr('src', '/MI-4-20/Public/'+data[1][1]['url']);
                                    }
                                    
                                    that.next().find('div[name=showGoods2Board]').after(data[0]);
                                }
                            },
                            'json'
                        );
                        $(this).attr('data-stat', 1);
                    }
                });


                //为你推荐的滚动加载
                if( (win.scrollTop() + scHeight) > ($('#w3').offset().top-100) && stat1 == 0 ){
                    $.get(
                        "<?php echo U('Index/showRecommend');?>",
                        {
                            id:1
                        },
                        function (data) {
                            console.log(data);
                            $('#w3').html(data);
                        },
                        'json'
                    );
                    stat1 = 1;
                }

            });
        })();

        //第二类展示商品的滑动异步加载
        showGoods2.each(function () {
            var nav = $(this).find('div[class=right]').find('span[name=n1]');
            nav.mouseover(function () {
                //改变选项的样式
                showStyle(nav, $(this));
                //获取tid
                var tid = $(this).attr('data-id');
                //获取typename
                var typename = $(this).text();
                var that = $(this).parent().parent().next();
                var obj = $(this).parent().parent().next().find('div[data-stat="'+tid+'"]');
                if( obj.length ) {
                    noBlock(that);
                    obj.attr('style', 'display:block');
                } else{
                    $.get(
                        "<?php echo U('Index/slideGoodsAjax');?>",
                        {
                            tid:tid,
                            typename:typename
                        },
                        function (data) {
                            noBlock(that);
                            console.log(data);
                            that.find('div[name=showGoods2Body]').last().after(data);
                        },
                        'json'
                    );
                }
            });
        });

        function showStyle (nav, obj)
        {
            for( var i = 0; i < nav.length; i++ ) {
                $(nav[i]).attr('style','');
            }
            obj.attr('style','border-bottom:2px solid #ff6700;color:#ff6700;');
        } 

        function noBlock (obj) 
        {
            var objs = obj.find('div[name=showGoods2Body]');
            for( var i = 0; i < objs.length; i++ ) {
                $(objs[i]).hide();
            }
        }

    </script>
    <!-- 尾部开始 -->
	<div class="clear"></div>
    <footer>
        <div class="footer-top">
            <ul style="font-size:16px">
                <li class="footer-top-li1">
                    <a href="#"><i class="fa fa-gavel"></i>预约维修服务
                    </a>
                </li>
                <li class="footer-top-li2">
                    <a href="#"><i class="fa fa-check"></i>7天无理由退货
                    </a>
                </li>
                <li class="footer-top-li2">
                    <a href="#"><i class="fa fa-check"></i>15天免费换货
                    </a>
                </li>
                <li class="footer-top-li2">
                    <a href="#"><i class="fa fa-gift"></i>满150元包邮
                    </a>
                </li>
                <li class="footer-top-li2">
                    <a href="#"><i class="fa fa-map-marker"></i>520余家售后网点
                    </a>
                </li>
            </ul>
        </div>
        <div class="footer-middle">
            <dl>
                <dt>帮助中心</dt>
                    <dd><a href="#">账号管理</a></dd>
                    <dd><a href="#">购物指南</a></dd>
                    <dd><a href="#">订单操作</a></dd>
            </dl>
            <dl>
                <dt>服务支持</dt>
                    <dd><a href="#">售后政策</a></dd>
                    <dd><a href="#">自助服务</a></dd>
                    <dd><a href="#">相关下载</a></dd>
            </dl>
            <dl>
                <dt>线下门店</dt>
                    <dd><a href="#">小米之家</a></dd>
                    <dd><a href="#">服务网点</a></dd>
                    <dd><a href="#">零售网点</a></dd>
            </dl>
            <dl>
                <dt>关于小米</dt>
                    <dd><a href="#">了解小米</a></dd>
                    <dd><a href="#">加入小米</a></dd>
                    <dd><a href="#">联系我们</a></dd>
            </dl>
            <dl>
                <dt>关注我们</dt>
                    <dd><a href="#">新浪微博</a></dd>
                    <dd><a href="#">小米部落</a></dd>
                    <dd><a href="#">官方微信</a></dd>
            </dl>
            <dl>
                <dt>特色服务</dt>
                    <dd><a href="#">F码通道</a></dd>
                    <dd><a href="#">小米移动</a></dd>
                    <dd><a href="#">防伪查询</a></dd>
            </dl>
            <div>
                <p>400-100-5678</p>
                <p>周一至周五 8:00~18:00</p>
                <p>(仅收市话费)</p>
                <a><i class="fa fa-commenting"></i>24小时在线客服</a>
            </div>
        </div>
    </footer>
    <div class="clear"></div>
    <div class="site-info" style="height:100px">
	    <div style="width:1266px" class="container">
	        <div class="logo ir">小米官网</div>
	        <div class="info-text">
	            <p class="sites">
                <?php $__FOR_START_832481400__=0;$__FOR_END_832481400__=count($friends)-1;for($i=$__FOR_START_832481400__;$i < $__FOR_END_832481400__;$i+=1){ ?><a href="<?php echo ($friends[$i]['url']); ?>"><?php echo ($friends[$i]['name']); ?></a>
	                <span>|</span><?php } ?>
	                <a href="<?php echo ($friends[$i]['url']); ?>"><?php echo ($friends[$i]['name']); ?></a>
	            </p>
	            <p>©<a href="http://www.mi.com/" target="_blank" title="mi.com">mi.com</a> 京ICP证110507号 <a href="http://www.miitbeian.gov.cn/" target="_blank">京ICP备10046444号</a> <a rel="nofollow" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134" target="_blank">京公网安备11010802020134号 </a><a rel="nofollow" href="http://c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg" target="_blank">京网文[2014]0059-0009号</a>
	            <br> 违法和不良信息举报电话：185-0130-1238，本网站所列数据，除特殊说明，所有数据均出自我司实验室测试
	            </p>
	        </div>
	        <div class="info-links">
	                    <a rel="nofollow" href="http://privacy.truste.com/privacy-seal/validation?rid=4fc28a8c-6822-4980-9c4b-9fdc69b94eb8&lang=zh-cn" target="_blank"><img rel="nofollow" src="/MI-4-20/Public/Home/img/truste.png" alt="TRUSTe Privacy Certification"></a>
	                    <a rel="nofollow" href="http://search.szfw.org/cert/l/CX20120926001783002010" target="_blank""><img rel="nofollow" src="/MI-4-20/Public/Home/img/v-logo-2.png" alt="诚信网站"></a>
	                    <a rel="nofollow" href="https://ss.knet.cn/verifyseal.dll?sn=e12033011010015771301369&ct=df&pa=461082" target="_blank""><img rel="nofollow" src="/MI-4-20/Public/Home/img/v-logo-1.png" alt="可信网站"></a>
	                    <a rel="nofollow" href="http://www.315online.com.cn/member/315140007.html" target="_blank"><img rel="nofollow" src="/MI-4-20/Public/Home/img/v-logo-3.png" alt="网上交易保障中心"></a>
	        </div>
	    </div>
    	<!-- <div class="slogan ir">探索黑科技，小米为发烧而生</div> -->
	</div>

	<!-- 尾部结束 -->