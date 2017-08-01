<?php if (!defined('THINK_PATH')) exit();?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>小米商城-确认订单</title>
    <link rel="icon" href="./img/icon.jpg">
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/knoworder.css">
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/list.css">
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/common.css">
    <link rel="stylesheet" href="/MI-4-20/Public/Home/css/index-footer.css">
    <link rel="stylesheet" href="/MI-4-20/Public/Common/font-awesome/css/font-awesome.min.css" />
    <script type="text/JavaScript" src="/MI-4-20/Public/Common/jquery.js"> </script>
</head>
<body>
    <!-- 添加地址 -->
<div id="form2" class="haform1">
    <form method="post" style="width: 366px;height: 500px;">
        <div id="fuck">
            <select name="pro" id="pro" style="height: 42px;width:49%;margin-bottom: 10px;">
            </select>
        </div>
        <textarea name="text" id="" cols="30" rows="5" placeholder="详细地址" ></textarea>
        <br>
        <input class="haform1finp" type="text" name="name" placeholder="姓名">
        <input class="haform1finp" type="text" name="tel" placeholder="手机号">
        <input class="haform1finp" type="text" name="pos" placeholder="邮编">
        <input class="haform1finp" type="text" name="tig" placeholder="地址标签">
        <label><input class="haform1frad" type="radio" name="def" value='1'>默认</label>
        <label><input checked class="haform1frad" type="radio" name="def" value='2'>不默认</label>
        <div class="haf1sub">
        <div class="cs"></div>
            <input id="haf1subinp" type="button" value="提交">
            <span onmousedown="form2.style.display='none';">取消</span>
        </div>
    </form>
</div>
    <header>
        <div class="hmain">
            <div class="hmlogo"><a href="<?php echo U('Index/index');?>"><img src="/MI-4-20/Public/Home/img/logo.png" width="48"></a></div>
            <div class="hmtitle">
                <span>确认订单</span>
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
    <div class="order">
        <form action="<?php echo U('ConfirmOrder/addOrder');?>" method="post">
            <div class="omain">
                <div class="omaddress">
                    <p class="omatitle">收货地址</p><br>
                    <div class="omamain">
                        <input id="in1" type="hidden" value="" name="pid">
                    <?php if(is_array($huo)): foreach($huo as $key=>$ss): ?><div id="p0<?php echo ($ss["id"]); ?>" onmousedown="in1.value='<?php echo ($ss["id"]); ?>';show1(<?php echo ($ss["id"]); ?>);" class="omamnum">
                            <dl>
                                <dt>
                                    <span></span>
                                    <span><?php echo ($ss["name"]); ?></span>
                                </dt>
                                <dd><?php echo ($ss["phone"]); ?></dd>
                                <dd><?php echo ($ss["pro"]); ?>,<?php echo ($ss["city"]); ?>,<?php echo ($ss["are"]); ?>,<?php echo ($ss["town"]); ?></dd>
                                <dd><?php echo ($ss["code"]); ?></dd>
                            </dl>
                        </div><?php endforeach; endif; ?>
                        <div class="omamnum2">
                            <span onmousedown="form2.style.display='block';"><i class="fa fa-plus-circle"></i></span>
                            <br>
                            添加新地址
                        </div>
                    </div>
                </div>
                <div class="ompay">
                    <div class="ompayleft">
                        <h3>支付方式</h3>
                    </div>
                    <div class="ompayright">
                        在线支付 （支持微信支付、支付宝、银联、财付通、小米钱包等）
                    </div>
                </div>
                <div class="ompay">
                    <div class="ompayleft">
                        <h3>配送方式</h3>
                    </div>
                    <div class="ompayright">
                        快递配送（免运费）
                    </div>
                </div>
                <div class="omgoodstitle">
                    <div class="omgoodstitleleft">
                        <h3>商品</h3>
                    </div>
                    <div class="omgoodstitleright">
                        <a href="<?php echo U('ShopCart/showShopCart');?>">返回购物车 > </a>
                    </div>
                </div>
            <?php if(is_array($lasn)): foreach($lasn as $key=>$li): ?><div class="omgoods">
                    <div class="omgoodsmain">
                        <div class="omgm-img"><img width="30" src="/MI-4-20/Public/Home/imgs/<?php echo ($li["cover"]); ?>"></div>
                        <div class="omgm-name">
                            <a href="<?php echo U('Detail/detail', array('gid'=>$li['gid']));?>"><?php echo ($li["name"]); ?>&nbsp;<?php echo ($li["colorname"]); ?></a>
                        </div>
                        <div class="omgm-price">
                            <?php echo ($li["price"]); ?> * <?php echo ($li["num"]); ?>
                        </div>
                        <div class="omgm-total">
                            <?php echo ($li["sum"]); ?>元
                        </div>
                    </div>
                </div><?php endforeach; endif; ?>
                
                <div class="omgcount">
                    <ul>
                        <li><span class="omgcountspan1">商品件数：</span><?php echo ($total); ?>件</li>
                        <li><span class="omgcountspan1">金额总计：</span><?php echo ($tote); ?>元</li>
                        <li><span class="omgcountspan2">应付总额：</span><span class="omgcountspan3"><?php echo ($tote); ?></span>元</li>
                    </ul>
                </div>
                <div class="omgbutton">
                    <input type="submit" value="去结算" />
                </div>
            </div>
        </form>
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
                <?php $__FOR_START_1005715660__=0;$__FOR_END_1005715660__=count($friends)-1;for($i=$__FOR_START_1005715660__;$i < $__FOR_END_1005715660__;$i+=1){ ?><a href="<?php echo ($friends[$i]['url']); ?>"><?php echo ($friends[$i]['name']); ?></a>
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

    $.get(
        '<?php echo U('ConfirmOrder/address');?>',
        {upid:0},
        function(data) {
            console.log(data);
            var option = '';
            option += '<option value="-1">--请选择--</option>';
            for(var i = 0; i<data.length; i++){
                option += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
            }

            $('#pro').append(option);
    }, 'json');

    $('#fuck').on('change', 'select', function () {

        var that = $(this);

        $(this).nextAll('select:visible').remove();

        if(!$('select[data-id='+$(that).val()+']').show().length){
            $.get(
               '<?php echo U('ConfirmOrder/address');?>', 
                { upid:$(this).val() },
                function (data) {
                    if (data.length) {

                    var select = '<select data-id="'+$(that).val()+'" name="city" id="city" style="height: 42px;width:49%;margin-bottom: 10px;">';
                    select += '<option value="-1">--请选择--</option>';
                    for(var i = 0; i<data.length; i++) {
                        select += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    select += '</select>';

                    that.after(select);
                    }

                },
                'json'
            );
        }
    });

    $('#haf1subinp').click(function () {

        var res = [];

        res['name'] = $('input[name=name]').val();
        res['tel'] = $('input[name=tel]').val();
        res['pos'] = $('input[name=pos]').val();
        res['tig'] = $('input[name=tig]').val();
        var def = $('input[name=def]');
        def.each(function () {
            if ( $(this).is(':checked') ) {
                res['def'] = $(this).val();
              
            }
        });

        var address = '';

        $('#fuck').find('select').each(function () {

             address += $(this).val()+',';

        });

        // console.log(address);
        // console.log(def);
        $.post(
            '<?php echo U('ConfirmOrder/adddizhi');?>',
             {
                cateId:address,
                name:$('input[name=name]').val(),
                tel:$('input[name=tel]').val(),
                pos:$('input[name=pos]').val(),
                tig:$('input[name=tig]').val(),
                text:$('input[name=text]').val(),
                // defs:def,


            },
             function (data){
                if ( data == 1 ) {
                    $('#form2').hide();
                } else {
                    $('.cs p').remove();
                    $('.cs').append('<p style="color:red;">添加失败</p>');
                }
             },
             'json'
        );

    });

    function show1(num){
        for(i=0;i<1000;i++){
            if($('#p0'+i).length){
                $('#p0'+i).css('border','1px solid #b0b0b0');
            }
        }
        $('#p0'+num).css('border','1px solid orange');//触发以后信息块
    }



</script>