<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>小米商城-购物车</title>
    <link rel="icon" href="./img/icon.jpg">
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/shopcart.css">
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/list.css">
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/common.css">
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/index-footer.css">
    <link rel="stylesheet" href="/MI-4-20/Public/Common/font-awesome/css/font-awesome.min.css" />
    <script src="/MI-4-20/Public/Common/jquery-1.10.2.min.js"></script>
</head>
<body>
    <header>
        <div class="hmain">
            <div class="hmlogo"><a href="<?php echo U('Index/index');?>"><img src="/MI-4-20/Public/Home/img/logo.png" width="48"></a></div>
            <div class="hmtitle">
                <span>我的购物车</span>
                <span>温馨提示：产品是否购买成功，以最终下单为准哦，请尽快结算</span>
            </div>
            <div class="hmorder">
                <a href="#">我的订单</a>
            </div>   
            <?php if($userInfo != 0): ?><div class="hmuser">
                     <a style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;display:block;width:80px;float:left;padding-left:5px" class="a" href="<?php echo U('Personal/personal');?>"><?php echo ($userInfo["name"]); ?>
                    </a> 
                    <span style="float:right;line-height:40px;padding-right:5px;" class="fa fa-angle-down"></span>  
                    <div class="hmuserul">
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
                <span class="hm-fg right">|</span>
                <a href="<?php echo U('Register/register');?>" class="hmlogin right">注册</a>
                <span class="hm-fg right">|</span>
                <a href="<?php echo U('Login/login');?>" class="hmlogin right">登录</a><?php endif; ?>   
        </div>
    </header>
    <div class="sclist">
        <div class="sclmain">
            <div class="sclmaintop">
                <ul>
                    <li><a href="<?php echo U('ShopCart/deleseion');?>">清空购物车</a></li>
                    <li style="text-align:center;">商品名称</li>
                    <li>单价</li>
                    <li>数量</li>
                    <li>小计</li>
                    <li>操作</li>
                </ul>
            </div>      
            <form action="<?php echo U('ConfirmOrder/confirmOrder');?>">
                <div style="height:auto" id="tab" class="sclmainlist">
                    <?php if($goods != 0): if(is_array($goods)): foreach($goods as $key=>$vo): ?><ul style="height:auto" class="lioo">
                                <li><img src="/MI-4-20/Public/imgs/<?php echo ($vo["gid"]); ?>/<?php echo ($vo["cover"]); ?>" width="80" height="80"></li>
                                <li style="text-align:center;line-height:86px">
                                    <h3 style="text-align:center;line-height:75px"><a href=""><?php echo ($vo["name"]); ?>&nbsp;<?php echo ($vo["vname"]); ?>&nbsp;<?php echo ($vo["colorname"]); ?></a></h3>
                                    <!-- <p><?php echo ($vo["goodsinfo"]); ?></p> -->
                                </li>
                                <li class='nump'><?php echo ($vo["price"]); ?> 元</li>
                                <li>
                                    <div class="sclml4">
                                        <a class="min" href="javascript:;" data-value="<?php echo ($vo["gid"]); echo ($vo["vid"]); echo ($vo["pid"]); ?>" ><i class="fa fa-minus" style="font-size:16px;color:#888"></i></a>
                                        <input class="text_box" type="text" name="num" value="<?php echo ($vo["num"]); ?>">
                                        <a class="add" href="javascript:;" data-value="<?php echo ($vo["gid"]); echo ($vo["vid"]); echo ($vo["pid"]); ?>"><i class="fa fa-plus" style="font-size:16px;color:#888"></i></a>
                                    </div>
                                </li>
                                <li name="total" class="price"><?php echo ($vo["sum"]); ?>元</li>
                                <li><a href="<?php echo U('Home/ShopCart/delectshop/id/'.$vo[gid].'/vid/'.$vo[vid].'/pid/'.$vo[pid]);?>">×</a></li>      
                            </ul><?php endforeach; endif; ?>
                    <?php else: ?>
                        <p style="text-align:center;color:red;font-size:25px">购物车空空如也TT</p><?php endif; ?>
                </div>
                <div class="scmsubmit">
                    <div class="scmsleft">
                        <a href="<?php echo U('Index/index');?>">继续购物</a>
                        <span>共 <i id="tote" class="gj" style="color:orange"><?php echo ($tote); ?></i> 件商品</span>
                    </div>
                    <input type="submit" value="确认订单">
                    <span  class="scmsmiddle">合计（不含运费）：<span id="total"><?php echo ($total); ?></span>元</span>
                </div>
            </form>
        </div>
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
                                <a class="wntj-list-main-td-a1" href="<?php echo U('Detail/detail', array('gid'=>$vo['id']));?>"><img width="140px" height="140px" src="/MI-4-20/Public/imgs/<?php echo ($vo['id']); ?>/<?php echo ($vo[cover]); ?>" /></a><br>
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
                <?php $__FOR_START_1129087092__=0;$__FOR_END_1129087092__=count($friends)-1;for($i=$__FOR_START_1129087092__;$i < $__FOR_END_1129087092__;$i+=1){ ?><a href="<?php echo ($friends[$i]['url']); ?>"><?php echo ($friends[$i]['name']); ?></a>
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
    //加号的AJAX
    $('a[class=add]').on('click',function(){
        var that = $(this);
        var did = $(this).attr("data-value");
       
        $.get(
            '<?php echo U("ShopCart/goodsPlus");?>',
            {"did":did},
            function(data){    
                // console.log(data);
                    if( data[0] ){

                        that.prev().val(data[1]['num']);
                        that.parent().parent().next().text(data[1]['sum']+'元');
                        $('#tote').text(data[1]['tote']);
                        $('#total').text(data[1]['total']);

                    } else {
                        alert(data[1]);
                    }

                },
            'json'
                        
        )
    });
    //减号的AJAX
    $('a[class=min]').on('click',function(){
        //把自己存起来
        var that = $(this);
        // 获取id
        var didd = $(this).attr("data-value");

        $.get(
                "<?php echo U('ShopCart/goodsMinus');?>",
                {"did":didd},
                function(data){   

                    if( data[0] ){

                        that.next().val(data[1]['num']);
                        that.parent().parent().next().text(data[1]['sum']+'元');
                        $('#tote').text(data[1]['tote']);
                        $('#total').text(data[1]['total']);

                    } else {
                        alert(data[1]);
                    }
                },
                'json'
                )
    });

    // $(function(){

    //     $(".add").click(function(){ 
    //         var id = $(this).val('data-value');
    //         console.log(id);
    //         var t=$(this).parent().find('input[class*=text_box]'); 
    //         t.val(parseInt(t.val())+1) 
    //         setTotal(); 
    //     }) 
    //     $(".min").click(function(){ 
    //         var t=$(this).parent().find('input[class*=text_box]'); 
    //         t.val(parseInt(t.val())-1) 
    //         if(parseInt(t.val())<1){ 
    //         t.val(1); 
    //     } 
    //     setTotal(); 
    // });
    // function setTotal(){ 
    //     var s = 0;
    //     $("#tab .lioo").each(function(){ 
    //         s+=parseInt($(this).find('input[class*=text_box]').val())*parseFloat($(this).find('li[class*=price]').text());
    //     });
            
    //     $("#total").html(s.toFixed(2));
    // } 
    //     setTotal(); 
    // });
</script>