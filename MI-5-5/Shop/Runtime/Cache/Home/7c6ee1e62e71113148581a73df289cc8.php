<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
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
	<!-- <link rel="stylesheet" type="text/css" href="/MI-4-20/Public/Home/css/detail/base.css">
	<link rel="stylesheet" type="text/css" href="/MI-4-20/Public/Home/css/detail/comm.css">
	<link rel="stylesheet" type="text/css" href="/MI-4-20/Public/Home/css/detail/detail.css">
	<link rel="stylesheet" type="text/css" href="/MI-4-20/Public/Home/css/detail/media_detail.css">
	<link rel="stylesheet" type="text/css" href="/MI-4-20/Public/Home/css/detail/b1.min.css">
	<link rel="stylesheet" type="text/css" href="/MI-4-20/Public/Home/css/detail/g1.min.css"> -->
	<link rel="stylesheet" href="/MI-4-20/Public/Home/css/detail/showGoods.css">
	<link rel="stylesheet" href="/MI-4-20/Public/Home/css/list.css">
	<div class="breadcrumbs">
        <div style="width:1226px" class="container">
            <a href="<?php echo U('GoodsList/showGoodsList',array('tid'=>0));?>">首页</a>
            <span class="">&gt;</span>
            <?php echo ($goods[name]); ?>
        </div>
    </div>
	
	<!--主体开始-->
	<main id="main" class="site-main">

		<form action="<?php echo U('Detail/detail');?>" method="post">


			<input type="hidden" id="gids" name="gid" value="<?php echo ($goods[id]); ?>">
			<input id="vids" type="hidden" name="vid" value="<?php echo ($goods[brand][0][id]); ?>">
			<input id="cids" type="hidden" name="cid" value="<?php echo ($goods[color][0][id]); ?>">

			<section id="prod-intro" class="wraper prod-intro">

				<aside class="main-left intro-left" >

					<img id="img" style="width:414px;height:414px; margin-bottom:12px" src="/MI-4-20/Public/imgs/<?php echo ($goods[id]); ?>/<?php echo ($goods[basename]); ?>-<?php echo ($goods[pic][0]); ?>" class="prod-pic">

					<center class="img">	
						<?php if(is_array($goods[pic])): foreach($goods[pic] as $key=>$v): ?><div style="display:inline-block;margin-left:10px; border:1px solid #ccc;width:70px;height:70px;">
								<img width="70px" height="70px" class="pic" onclick="pic(this)" src="/MI-4-20/Public/imgs/<?php echo ($goods[id]); ?>/<?php echo ($goods[basename]); ?>-<?php echo ($v); ?>" alt="">
							</div><?php endforeach; endif; ?>
					</center>
				</aside>
				<section class="main-right intro-right">
					<header style="background:white" class="prod-title">
						<h2 style="font-weight:lighter" class="name"><?php echo ($goods[name]); ?></h2>
						<span style="font-size:20px;margin-top:10px" class="price"><?php echo ($goods[brand][0][price]); ?>元</span>
						<a href="" class="link">深入了解产品</a>
					</header>
					<p class="tip">
						<?php echo ($goods[goodsinfo]); ?>
					</p>
					<section class="options">
						<hgroup class="opt-title">
							<h3>选择版本</h3>
							<h4 class="vinfo desc"><?php echo ($goods[brand][0][vinfo]); ?></h4>	
						</hgroup>
						<ul class="opt-ul">
							<?php if(is_array($goods[brand])): foreach($goods[brand] as $key=>$v): ?><li class="colorli">
									<input  class="option-btns" type="radio" name="version"  hidden>
									<label style="border:1px solid #ccc;" data-id="<?php echo ($v["id"]); ?>" data-vname="<?php echo ($v["vname"]); ?>"  class="a opt-item" ><?php echo ($v["vname"]); ?></label>
								</li><?php endforeach; endif; ?>
						</ul>
					</section>
					<section class="options">
						<hgroup class="opt-title">
							<h3>选择颜色</h3>
						</hgroup>
						<ul class="ul opt-ul" >
							<?php if(is_array($goods[color])): foreach($goods[color] as $key=>$v): ?><li class="colorlis">
									<input  class="option-btns" type="radio" name="color" hidden>
									<label style="border:1px solid #ccc;"  onclick="color(this)"  data-id="<?php echo ($v["id"]); ?>" class="color opt-item" >
										<div style="background:<?php echo ($v["color"]); ?>" class="i_color i_white"></div>
										<span><?php echo ($v["colorname"]); ?></span>
									</label>
								</li><?php endforeach; endif; ?>
						</ul>
					</section>
					<article>
						<h3 class="notice">支持7天无理由退货</h3>
						<p class="desc">一面科技，一面艺术</p>
						<button style="margin-top:20px;color:#FC6402;" type="submit"  class="btn btn-default">加入购物车</button>
							<a id="div1"href=""></a>
					</article>
				</section>
			</section>
		</form>
	</main>
	<div id="nav" style="height:70px;width:100%; background:#fff; text-align:center;z-index:99;">	
	  <span ><a class="
describe" style="font-size:25px;line-height: 70px; color:#ccc;margin:0 30px; display: inline-block;" href="#div1">详情描述</a></span> 
	        <span ><a class="spec" data-gid="<?php echo ($goods[id]); ?>" style="font-size:25px;line-height: 70px; color:#ccc;margin:0 30px; display: inline-block;";  href="#div1">规格参数</a></span> 
	        <span ><a class="thesun" style="font-size:25px;line-height: 70px; color:#ccc;margin:0 30px; display: inline-block;";  href="#div1">评价晒单</a></span>
	        <span ><a class="ask" style="font-size:25px;line-height: 70px; color:#ccc;margin:0 30px; display: inline-block;";  href="#div1">商品提问</a></span> 
	</div>
	<!-- 详情 -->
	<div id="load" name="vnames"></div>
	<!-- 规格 -->
	<div id="speca"></div>
	<!-- 评价 -->
	<div id="thesun" style="width:1226px;margin:0 auto;">

    </div>
    <div class="tw"></div>

    <!-- 提问 -->
    <div id="ask">
   	</div>
   	<!-- 为你推荐开始 -->
    <?php if($recommend != 0): ?><div style="background:#f5f5f5;margin-top:-20px">
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
                    <?php if(is_array($recommend)): foreach($recommend as $k=>$vo): if(in_array(($k), explode(',',"0,5"))): ?><div class="wntj-list-main-td1 left">
                                <a class="wntj-list-main-td-a1" href="<?php echo U('Detail/detail', array('gid'=>$vo['id']));?>"><img width="140px" height="140px" src="/MI-4-20/Public/imgs/<?php echo ($vo[id]); ?>/<?php echo ($vo[cover]); ?>" /></a><br>
                                <a class="wntj-list-main-td-a2" href="<?php echo U('Detail/detail', array('gid'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a>
                                <p style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;padding:0 10px" class="wntj-list-main-td-p1"><?php echo ($vo["goodsinfo"]); ?></p>
                                <p class="wntj-list-main-td-p2"><?php echo ($vo["price"]); ?>元</p>
                            </div>
                        <?php else: ?>
                            <div class="wntj-list-main-td2 left">
                                <a class="wntj-list-main-td-a1" href="<?php echo U('Detail/detail', array('gid'=>$vo['id']));?>"><img width="140px" height="140px" src="/MI-4-20/Public/imgs/<?php echo ($vo[id]); ?>/<?php echo ($vo[cover]); ?>" /></a><br>
                                <a class="wntj-list-main-td-a2" href="<?php echo U('Detail/detail', array('gid'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a>
                                <p style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;padding:0 10px" class="wntj-list-main-td-p1"><?php echo ($vo["goodsinfo"]); ?></p>
                                <p class="wntj-list-main-td-p2"><?php echo ($vo["price"]); ?>元</p>
                            </div><?php endif; endforeach; endif; ?>
            </div>
        </div>
    </div><?php endif; ?>
        <!-- 为你推荐结束 -->
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
                <?php $__FOR_START_908499482__=0;$__FOR_END_908499482__=count($friends)-1;for($i=$__FOR_START_908499482__;$i < $__FOR_END_908499482__;$i+=1){ ?><a href="<?php echo ($friends[$i]['url']); ?>"><?php echo ($friends[$i]['name']); ?></a>
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
<script>
	// 版本选择
	$('.a').click( function(){
		var that = $(this);
		$('.a').attr('style','border:1px solid #ccc');
		that.attr('style','border:1px solid red');
		
		$('#vids').attr('value',that.attr('data-id'));
		// $('#vnames').attr('value',that.attr('data-vname'));

		$.get(
			'<?php echo U("Detail/ajaxVersion");?>',
			{
				vid:that.attr('data-id'),
			},
			function( data ) {
				console.log(data);
				$('.ul li').remove();
				var str = '';
				for ( var i = 0; i < data['color'].length; i++ ) {
					str += '<li>';
					str += '<input class="option-btns" type="radio" name="color" hidden>';
						str += '<label data-id="'+data['color'][i]['id']+'"; style="border:1px solid #ccc"; onclick="color(this)" class="color opt-item">';
					str += '<div style="background:'+data['color'][i]['color']+'" class="i_color i_white"></div>';
					str += '<span>'+data['color'][i]['colorname']+'</span>';
					str += '</label>';
					str += '</li>';
				}

				$('.ul').append(str);
				$('.price').html(data['price'][0]['price']+'元');
				$('.vinfo').html(data['price'][0]['vinfo']);
			},
			'json'
		);
	});
	// 颜色选择
	function color(obj)
	{
		$('.color').attr('style','border:1px solid #ccc');
		$(obj).attr('style','border:1px solid red');
		var cid = $(obj).attr('data-id');
		$('#cids').attr('value',cid);
		$.get(
			'<?php echo U("Detail/ajaxColor");?>',
			{
				cid:$(obj).attr('data-id'),
			},
			function( data ) {
				console.log(data);
				$('.img div').remove();
				var str = '';
				for ( i = 0; i < data['pic'].length; i++ ) {
					str += '<div style="display:inline-block;margin-left:10px;  border:1px solid #ccc;width:70px;height:70px;">';
					str += '<img width="70px" height="70px" class="pic" onclick="pic(this)" src="/MI-4-20/Public/imgs/<?php echo ($goods[id]); ?>/'+data['basename']+'-'+data['pic'][i]+'" alt="">';
					str += '</div>';
				}
				if ( data['invertory'] == 0 ) {
					$(obj).attr('style','border:1px solid #ccc');
					$(obj).find("span").text('暂无商品');
				}
				$('.img').append(str);
				// $('#colors').attr('value',data['color']);
				// $('#colornames').attr('value',data['colorname']);
				// $('#invertorys').attr('value',data['invertory']);
				// $('#covers').attr('value',data['cover']);

			},
			'json'
		);
	}
	// 图片
	function pic(obj) 
	{
		$('.pic').attr('style','border:1px solid #ccc');
		$(obj).attr('style','border:1px solid red');
		var url = $(obj).attr('src');
		$('#img').attr('src',url);
	}
	// 导航
	$.fn.smartFloat = function() { 
	    var position = function(element) { 
	    	// console.log(element);
	        var top = element.position().top; //当前元素对象element距离浏览器上边缘的距离 
	        var pos = element.css("position"); //当前元素距离页面document顶部的距离 
	        $(window).scroll(function() { //侦听滚动时 
	            var scrolls = $(this).scrollTop();
	            // console.log(scrolls); 
	            if (scrolls > top) { //如果滚动到页面超出了当前元素element的相对页面顶部的高度 
	                if (window.XMLHttpRequest) { //如果不是ie6 
	                    element.css({ //设置css 
	                        position: "fixed", //固定定位,即不再跟随滚动 
	                        top: 0 //距离页面顶部为0 
	                    }).addClass("shadow"); //加上阴影样式.shadow 
	                } else { //如果是ie6 
	                    element.css({ 
	                        top: scrolls  //与页面顶部距离 
	                    });     
	                } 
	            }else { 
	                element.css({ //如果当前元素element未滚动到浏览器上边缘，则使用默认样式 
	                    position: pos, 
	                    top: top 
	                }).removeClass("shadow");//移除阴影样式.shadow 
	            } 
	        }); 
	    }; 
	    return $(this).each(function() { 
	        position($(this));                          
	    }); 
	}; 
	$(function(){ 
	    $("#nav").smartFloat(); 
	});
	// 规格参数显示
	$('.spec').click( function()
	{
		var that = $(this);
		$.get(
			'<?php echo U("Detail/ajaxSpec");?>',
			{
				gid:that.attr('data-gid'),
				cid:$('#cids').attr('value'),
			},
			function( data ) {
				if ( data ) {

					$('#speca div').remove();
					var srt = '';
					srt += '<div id="nav" style="background:#F5F5F5;" class="leave">';
					srt += '<div style="width:1226px;height:500px;background:#F5F5F5; opacity:0.9; margin:0 auto;overflow:hidden;">';
					srt += '<p style="font-size:35px;text-align:center;color:#ccc">规格参数</p>';
					srt += '<div style="background:#fff;margin-left:100px;float:left;position:relative;overflow:hidden;">';
					srt += '<img style="width:200px;height:200px; margin-top:55px; float:left;" src="/MI-4-20/Public/imgs/<?php echo ($goods[id]); ?>'+'/'+data['cover'][0]['cover']+'">';

					srt += '<div style="float:left;margin-left:100px;width:760px; height:250px; margin:30px; ">';
					srt += '<ul>';
					for ( var i = 0; i < data['spec'].length; i++ ) {
						srt += '<li style="width:333px;height:50px; font-size:18px;float:left;margin-bottom:8px;margin-right:27px">'+data['spec'][i]['pname']+':'+data['spec'][i]['ptext']+'</li>';
					}
					srt += '</ul></div></div></div></div>';
				} else {
					var srt = '';
					$('#speca p').remove();
					srt += '<p style="font-size:35px;text-align:center;color:red">还没有参数小米人正在努力设置！！！</p>';
				}
				$('#speca').append(srt);
				$('#speca').show();
				$("#thesun").hide();
				$("#ask").hide();
				$("div[name='vnames']").hide();
			},
			'json'
		);
	});
	// 详情显示
	$('.describe').click( function() {
		$('#speca').hide();
		$("#thesun").hide();
		$("#ask").hide();
		$("div[name='vnames']").show();
	});

	// 异步加载
	$(window).on('scroll', function () {

		var browserHeight = $(this).height();

		var documentHeight = $(document).height();

		var scrollTop = $(window).scrollTop();

		if ( scrollTop + browserHeight  >= documentHeight ) {
			$.get(
				'<?php echo U("Detail/ajaxLoads");?>',
				{	
					gid:$('#gids').attr('value'),
				},

				function (data) {
					$('#load center').remove();
					var str = '';
						str += '<center>';
					for ( var i = 0; i < data.length; i++ ) {
						
						str += '<img style="width:95%"; src="/MI-4-20/Public/imgs/'+<?php echo ($goods[id]); ?>+'son/'+<?php echo ($goods[id]); ?>+'-'+data[i]+'">';
					}
						str += '</center>';
					$('#load').append(str);
				},
				'json'
			);
		}
	});
	// 评论
	$('.thesun').click( function()
	{
		var that = $(this);
		$.get(
			'<?php echo U("Detail/ajaxTheSun");?>',
			{
				gid:$('#gids').attr('value'),
			},
			function( data ) {
				if ( !data.length == 0 ) {

					$('#thesun div').remove();
					var str = '';
					for ( var i = 0; i < data.length; i++ ) {
		    			str += '<div style="margin-bottom:30px;" class="goods-detail">';
		        		str += '<div class="goods-detail-comment J_itemBox hasContent" id="goodsCommentContent" style="display: block;">';
		            	str += '<div class="goods-detail-comment-content" id="J_commentDetailBlock">';
		                str += '<div class="container">';
		                str += '<div class="row">';
		                str += '<div class="span14 goods-detail-comment-list">';
		                str += '<ul class="comment-box-list" id="J_supComment">';
		                str += '<li style="background:#F5F5F5"; class="item-rainbow-4">'; 
		                str += '<div class="user-image">'; 
		                str += '<img src="/MI-4-20/Public/imgs/<?php echo ($goods[id]); ?>/<?php echo ($goods[basename]); ?>-<?php echo ($goods[pic][0]); ?>"/>' 
		                str += '</div>';
		                if( data[i]['star'] == 4 || data[i]['star'] == 5 ){
			                str += '<div class="user-emoj"> 超爱<i class="iconfont"></i></div>';	
		                }else if( data[i]['star'] == 2 || data[i]['star'] == 3 ){
		                	str += '<div class="user-emoj"> 喜欢<i class="iconfont"></i></div>';
		                }else{
		                	str += '<div class="user-emoj"> 一般<i class="iconfont"></i></div>';
		                }
		                str += '<div class="user-name-info">'; 
		                str += '<span class="user-name">'+data[i]['name']+'</span>'; 
		                str += '<span class="user-time">'+data[i]['time']+'</span>'; 
		                str += '<span class="pro-info"></span></div>';  
		                str += '<div class="user-hand-block">'; 
		                str += '<a href="javascript:void(0);" class="J_hasHelp "> <i class="fa fa-thumbs-up"></i>赞&nbsp;';
		                str += '<span class="amount"></span></a></div> ';
		                str += '<dl class="user-comment">'; 
		                str += '<dt class="user-comment-content J_commentContent">'; 
		                str += '<p class="content-detail">'; 
		                str += '<a href="javascript:;">'+data[i]['evaluate']+'</a></p>';
		                str += '<div class="content-img format-1">';  
		                str += '<div style="width:600px" class="img-0 img-block J_canZoomImg showimg">';
		                for ( var j = 0; j < data[i]['pic'].length; j++ ) {

			                str += '<img class="commentImg" src="/MI-4-20/Public/imgs/'+data[i]['basename']+'/'+<?php echo ($goods[id]); ?>+'-'+data[i]['pic'][j]+'" style="width: 180px; margin-top: -26.6667px; float:left">'; 
		                }
		                str += '<div class="loader loader-gray"></div></div></div></dt>';   
		                // str += '<dd class="user-comment-self-input">';
		                // str += '<div class="input-block">'; 
		                // str += '<input type="text" placeholder="回复楼主" class="J_commentAnswerInput">'; 
		                // str += '<a href="javascript:void(0);" class="btn  answer-btn J_commentAnswerBtn"></a></div></dd>'; 
		                // str += '<dd class="user-comment-answer">'; 
		                // str += '<img class="self-image" src="/MI-4-20/Public/imgs/<?php echo ($goods[id]); ?>/<?php echo ($goods[basename]); ?>-<?php echo ($goods[pic][0]); ?>">';
		                // str += '<p>回复信息<br />';
		                // str += '<span class="official-name">官方回复 </span>'; 
		                // str += '</p>';
		                // str += '</dd>';
		                str += '</dl></li></ul></div></div></div></div></div></div>';
					}
				} else {
					$('#thesun p').remove();
					var str = '';
					str += '<p style="font-size:35px;text-align:center;color:red">还没有评论，赶紧下单评论哦！！！</p>';
				}
				$('#thesun').append(str);
				$('#thesun').show();
				$("div[name='vnames']").hide();
				$("#speca").hide();
				$("#ask").hide();

			},
			'json'
		);
	});
	$('.ask').click( function(){
		var that = $(this);
		$.get(
			'<?php echo U("Detail/ajaxAsk");?>',
			{
				gid:$('#gids').attr('value'),
			},
			function( data ) {
				$('#ask div').remove();
				var str = '';
				str += '<div  style="background:#f5f5f5;">';
				str += '<p style="font-size:35px;text-align:center;color:#ccc">商品提问</p>';
				str += '<div style="width:50%; margin:0 auto;overflow:hidden;margin-bottom:20px">';
				str += '<input id="input" style="width:60%;float:left; height:40px;" type="text">';
				str += '<a  style=" float:left;  display:block;height:40px; width:18%;margin-left:10px; text-align:center;line-height:40px;background:darkorange;color:#fff" onclick="asks()" href="javascript:;">搜索</a>';
				str += '<a  style=" float:left;  display:block;height:40px; width:18%;margin-left:10px; text-align:center;line-height:40px;background:#337AB7;color:#fff" onclick="tw()" href="javascript:;">提问</a>';
				str += '</div>';
				str += '<div style="width:80%;margin:0 auto; background:#fff">';
				str += '<div class="con"><div>';
				for ( var i = 0; i < data.length; i++ ) {
				str += '<div style="width:48%;height:180px;float:left;margin-left:12px;margin-top:10px;  border:0px solid red">';

				str += '<span  style="font-size:20px;margin:10px; color:red">'+data[i]['content']+'</span>';
				str += '<span class="time" style="font-size:15px;margin:10px; color:#ccc">'+data[i]['time']+'</span>';

				str += '<p class="reply" style="font-size:15px;margin:10px; color:#ccc">'+data[i]['reply']+'</p>';
				str += '</div>';
				}
				str += '</div></div></div></div>';
	   			$('#ask').append(str);
	   			$('#ask').show();
				$('#thesun').hide();
				$("div[name='vnames']").hide();
				$("#speca").hide();
			},
				'json'
			);
	});
	// 搜索
	function asks(){
		$.get(
			'<?php echo U("Detail/ajaxAsks");?>',
			{
				gid:$('#gids').attr('value'),
				input:$('#input').val(),
			},
			function( data ) {
				// console.log(data.length);	
					$('.con div').remove();
					var str = '';
					str += '<div>';

				for( var i = 0; i < data.length; i++ ) {
					str += '<div style="width:48%;height:180px;float:left;margin-left:12px;margin-top:10px;  border:0px solid red">';
					str += '<span  style="font-size:20px;margin:10px; color:red">'+data[i]['content']+'</span>';
					str += '<span class="time" style="font-size:15px;margin:10px; color:#ccc">'+data[i]['time']+'</span>';

					str += '<p class="reply" style="font-size:15px;margin:10px; color:#ccc">'+data[i]['reply']+'</p>';
					str += '</div>';
				}
					str += '</div>';
					$('.con').append(str);
			},
			'json'
		);
	};
	function tw(){
		var str = '';
		str += '<div style="background:#f5f5f5;">';
		str += '<p style="font-size:35px;text-align:center;color:#ccc">商品提问</p>';
		str += '<div style="width:80%;height:400px;margin:0 auto; background:#fff">';
		str += '<div style="width:60%;height:40px;border:0px solid red;margin:0 auto ">';
		str += '<span style="font-size:25px;">用户名:</span>';
		str += '<span style="font-size:20px;color:red"><?php echo ($userInfo["name"]); ?></span>';
		str += '<span style="font-size:20px;margin-left:20px">提问商品:</span>';
		str += '<span style="font-size:20px;margin-left:20px;color:red"><?php echo ($goods[name]); ?></span></div><center>';
		str += '<div style="width:60%;margin:0 auto;margin-top:20px">';
		str += '<textarea  name="text" id="text" cols="90" rows="10"></textarea></div>';
		str += '<a  style=" float:left;  display:block;height:40px; width:18%;margin-left:10px; text-align:center;line-height:40px;margin-left:40%;margin-top:20px; background:darkorange;color:#fff" onclick="tws()" href="javascript:;">提问</a></center></div></div>';
		$('#ask div').remove();
		$('#ask').append(str);
	};
	function tws(){
		var name = '<?php echo ($userInfo["name"]); ?>';
		if( !name ) {
			alert('没有登录！');
		}
		$.post(
			'<?php echo U("Detail/tws");?>',
			{
				gid:$('#gids').attr('value'),
				text:$('#text').val(),
				uid:28,
			},
			function ( data ) {
				$('#ask div').remove();
					var str = '';
				if ( data == 0) {
					str += '<div>';
					str += '<p style="font-size:35px;text-align:center;color:red">提问失败</p>';	
					str += '</div>';
					$('#ask').append(str);
				} else {
					$('#ask div').remove();
					str += '<div>';
					str += '<p style="font-size:35px;text-align:center;color:#008AD4">提问成功</p>';	
					str += '</div>';
					$('#ask').append(str);
				}
			}
		)
	}
$('.colorli label:first()').css('border', '1px solid red');
$('.colorlis label:first()').css('border', '1px solid red');
</script>