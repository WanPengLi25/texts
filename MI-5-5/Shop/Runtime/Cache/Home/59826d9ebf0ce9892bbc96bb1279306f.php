<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html lang="zh-CN">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>成功加入购物车 - 小米商城</title>
        <script src="/MI-4-20/Public/Common/jquery.js"></script>
        <link rel="stylesheet" href="/MI-4-20/Public/Home/css/detail/b1.min.css">
    </head>
    <body>
    <center>
        <div class="site-topbar">
            <!-- 加入购物车开始 -->
             <span style="color:red;" mce_style="color:red">加入购物车成功!!!
             </span><br/>页面将在<span id="num">5</span>秒后跳转...<br/>
            <div  style="background:#fff" class="page-main">
                <div class="container">
                    <div class="buy-succ-box clearfix">
                        <div class="goods-content" id="J_goodsBox"> 
                            <div class="goods-img"> 
                                <img src="/MI-4-20/Public/Home/img/logo.jpg" width="200"> 
                            </div> 
                            <div class="goods-info"> 
                                <h3>已成功加入购物车！</h3> 
                            </div>
                        </div>

                        <div style="margin-top:100px" class="actions J_actBox">
                            <a href="<?php echo U('Index/index');?>" class="btn btn-line-gray J_goBack">返回首页</a>
                            <a style="color:white" href="<?php echo U('ShopCart/showShopCart');?>" class="btn btn-primary">去购物车结算</a>
                        </div>
                    </div>
                    <div class="buy-succ-recommend" id="J_userHistory"></div>
                </div>
            </div>
        </div>
    </center>
    </body>
</html>
<script>
    $(document).ready(function() {    
        function jump(count) {    
            window.setTimeout(function(){    
                count--;    
                if(count > 0) {    
                    $('#num').html(count);    
                    jump(count);    
                } else {    
                    location.href="<?php echo U('ShopCart/showShopCart');?>";    
                }    
            }, 1000);    
        }    
        jump(5);    
    });    
</script>