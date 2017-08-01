<?php if (!defined('THINK_PATH')) exit();?>    <!doctype html>
<html>
<head>
    <title>小米商城</title>
    <meta charset="utf-8">
    <link rel="icon" href="/MI-4-20/Public/Home/img/icon.jpg">
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/index-header.css">
<link rel="stylesheet" href="/MI-4-20/Public/Home/css/index-list2.css">
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
                    <li class="clear-b"><a href="/MI-4-20/index.php/Home/Index/index.html">小米商城</a></li>
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
                    <a  href="shopcart.php" class="H-right-gwc right">
                        <span class="fa fa-shopping-cart"></span>
                        购物车(0)
                    </a>
                                </div>
                <a class="H-right-xx right" href="#">消息通知</a>
                <span class="H-right-fg right">|</span>
                                    <a href="/MI-4-20/index.php/Home/Ligon/register.html" class="H-right-login right">注册</a>
                    <span class="H-right-fg right">|</span>
                    <a href="/MI-4-20/index.php/Home/Login/login.html" class="H-right-login right">登录</a>            </div>
        </div>
    </header>
    <!-- 头部结束 -->
	<!-- 上导航开始 -->
	<div class="topnav-contain">
	    <div class="topnav-main">
	        <a class="topnav-logo left" href="#"><img src="/MI-4-20/Public/Home/img/logo.png"></a>
	        <div class="topnav-list left">
	            <ul>
	                <li style="font-size:16px" class="topnav-list-li1"><a style="color:block" href="list.php"></a></li>
	            	                <li style="font-size:16px" class="topnav-list-li21">小米手机</li>
	                <div class="topnav-x1">
	                    <ul>
	                <li class="topnav-xl-l1">
	                            <a class="topnav-xl-a1" href="/MI-4-20/index.php/Home/Detail/detail/gid/2.html"><img src="/MI-4-20/Public/imgs/2/2-0.jpg"></a>
	                            <a class="topnav-xl-a2" href="#">小米5c 64GB 移动版</a>
	                            <p class="topnav-xl-p1">1499.00元</p>
	                        </li>	                    </ul>
	                </div>
	                <li style="font-size:16px" class="topnav-list-li22">红米</li>
	                <div class="topnav-x2">
	                    <ul>
	                	                    </ul>
	                </div>
	                <li style="font-size:16px" class="topnav-list-li23">平板 · 笔记本</li>
	                <div class="topnav-x3">
	                    <ul>
	                	                    </ul>
	                </div>
	                <li style="font-size:16px" class="topnav-list-li24">电视</li>
	                <div class="topnav-x4">
	                    <ul>
                    	                    </ul>
	                </div>
	                <li style="font-size:16px" class="topnav-list-li25">盒子 · 影音</li>
	                <div class="topnav-x5">
	                    <ul>
	                	                    </ul>
	                </div>
	                <li style="font-size:16px" class="topnav-list-li26">路由器</li>
	                <div class="topnav-x6">
	                    <ul>
                    	                    </ul>
	                </div>
	                <li style="font-size:16px" class="topnav-list-li27">智能硬件</li>
	                <div class="topnav-x7">
	                    <ul>
                    	                    </ul>
	                </div>
	                <li style="font-size:16px" class="topnav-list-li28">服务</li>
	                <li style="font-size:16px" class="topnav-list-li29">社区</li>
	            </ul>
	        </div>
	        <div class="topnav-search right">
	            <form class="right" action='action.php?a=gsearch' method="post">
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
                            </ul>
            </div>
            <!-- 图片轮播开始 -->
            <div class="buttomnav-contain-lunbo">
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
        <div class="mxdp-list-main-td1 left">
                        <a class="mxdp-list-main-td-a1" href="#"><img width="160px" height="160px" src="/MI-4-20/Public/imgs/2/2-0.jpg" /></a><br>
                        <a class="mxdp-list-main-td-a2" href="#">小米5c 64GB 移动版</a>
                        <p style="overflow:hidden;white-space:nowrap;text-overflow:ellipsis;padding:0 10px" class="mxdp-list-main-td-p1">搭载澎湃S1 八核高性能处理器 / “暗夜之眼”超感光相机 / 135g 轻薄金属机身 / 5.15&quot;高亮护眼屏</p>
                        <p class="mxdp-list-main-td-p2">1499.00元</p>
                    </div>
                        </div>
    </div>
    <!-- 明星单品结束 -->

    <!-- 页面主体开始 -->
    <div class="main" id="main">

        <!-- 智能硬件头部开始 -->
            <!-- 智能硬件主体结束 -->

    
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
                            "/MI-4-20/index.php/Home/Index/showGoodsAjax.html",
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
                            "/MI-4-20/index.php/Home/Index/showGoodsAjax.html",
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
                        "/MI-4-20/index.php/Home/Index/showRecommend.html",
                        {
                            id:1
                        },
                        function (data) {
                            // console.log(data);
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
                        "/MI-4-20/index.php/Home/Index/slideGoodsAjax.html",
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
    <div class="site-info">
	    <div style="width:1266px" class="container">
	        <div class="logo ir">小米官网</div>
	        <div class="info-text">
	            <p class="sites">
	                <a rel="nofollow" href="./小米商城 - 小米6、红米Note 4X、小米5c、小米笔记本官方网站_files/小米商城 - 小米6、红米Note 4X、小米5c、小米笔记本官方网站.html" target="_blank" data-stat-id="b9017a4e9e9eefe3" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-b9017a4e9e9eefe3&#39;, &#39;//www.mi.com/index.html&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米商城</a>
	                <span class="sep">|</span>
	                <a rel="nofollow" href="http://www.miui.com/" target="_blank" data-stat-id="ed2a0e25c8b0ca2f" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-ed2a0e25c8b0ca2f&#39;, &#39;http://www.miui.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">MIUI</a>
	                <span class="sep">|</span>
	                <a rel="nofollow" href="http://www.miliao.com/" target="_blank" data-stat-id="826b32c1478a98d5" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-826b32c1478a98d5&#39;, &#39;http://www.miliao.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">米聊</a>
	                <span class="sep">|</span>
	                <a rel="nofollow" href="http://www.duokan.com/" target="_blank" data-stat-id="c9d2af1ad828a834" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-c9d2af1ad828a834&#39;, &#39;http://www.duokan.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">多看书城</a>
	                <span class="sep">|</span>
	                <a rel="nofollow" href="http://www.miwifi.com/" target="_blank" data-stat-id="96f1a8cecc909af2" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-96f1a8cecc909af2&#39;, &#39;http://www.miwifi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米路由器</a>
	                <span class="sep">|</span>
	                <a rel="nofollow" href="http://call.mi.com/" target="_blank" data-stat-id="347f6dd0d8d9fda3" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-347f6dd0d8d9fda3&#39;, &#39;http://call.mi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">视频电话</a>
	                <span class="sep">|</span>
	                <a rel="nofollow" href="http://xiaomi.tmall.com/" target="_blank" data-stat-id="dfe0fac59cfb15d9" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-dfe0fac59cfb15d9&#39;, &#39;http://xiaomi.tmall.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米天猫店</a>
	                <span class="sep">|</span>
	                <a rel="nofollow" href="http://shop115048570.taobao.com/" target="_blank" data-stat-id="c2613d0d3b77ddff" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-c2613d0d3b77ddff&#39;, &#39;http://shop115048570.taobao.com&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米淘宝直营店</a>
	                <span class="sep">|</span>
	                <a rel="nofollow" href="http://union.mi.com/" target="_blank" data-stat-id="2f48f953961c637d" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-2f48f953961c637d&#39;, &#39;http://union.mi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米网盟</a>
	                <span class="sep">|</span>
	                <a rel="nofollow" href="http://www.mi.com/mimobile/" target="_blank" data-stat-id="f7ea7880c49b687e" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-f7ea7880c49b687e&#39;, &#39;//www.mi.com/mimobile/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">小米移动</a>
	                <span class="sep">|</span>
	                <a rel="nofollow" href="http://www.miui.com/res/doc/privacy/cn.html" target="_blank" data-stat-id="c7ef95929d60f3f1" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-c7ef95929d60f3f1&#39;, &#39;http://www.miui.com/res/doc/privacy/cn.html&#39;, &#39;pcpid&#39;, &#39;&#39;]);">隐私政策</a>
	                <span class="sep">|</span>
	                <a rel="nofollow" href="http://www.mi.com/index.html#J_modal-globalSites" data-toggle="modal" data-stat-id="9db137a8e0d5b3dd" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-9db137a8e0d5b3dd&#39;, &#39;#J_modal-globalSites&#39;, &#39;pcpid&#39;, &#39;&#39;]);">Select Region</a>
	            </p>
	            <p>©<a href="http://www.mi.com/" target="_blank" title="mi.com" data-stat-id="836cacd9ca5b75dd" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-836cacd9ca5b75dd&#39;, &#39;//www.mi.com/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">mi.com</a> 京ICP证110507号 <a href="http://www.miitbeian.gov.cn/" target="_blank" rel="nofollow" data-stat-id="f96685804376361a" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-f96685804376361a&#39;, &#39;http://www.miitbeian.gov.cn/&#39;, &#39;pcpid&#39;, &#39;&#39;]);">京ICP备10046444号</a> <a rel="nofollow" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=11010802020134" target="_blank" data-stat-id="57efc92272d4336b" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-57efc92272d4336b&#39;, &#39;http://www.beian.gov.cn/portal/registerSystemInforecordcode=11010802020134&#39;, &#39;pcpid&#39;, &#39;&#39;]);">京公网安备11010802020134号 </a><a rel="nofollow" href="http://c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg" target="_blank" data-stat-id="c5f81675b79eb130" onclick="_msq.push([&#39;trackEvent&#39;, &#39;79fe2eae924d2a2e-c5f81675b79eb130&#39;, &#39;//c1.mifile.cn/f/i/2013/cn/jingwangwen.jpg&#39;, &#39;pcpid&#39;, &#39;&#39;]);">京网文[2014]0059-0009号</a>
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