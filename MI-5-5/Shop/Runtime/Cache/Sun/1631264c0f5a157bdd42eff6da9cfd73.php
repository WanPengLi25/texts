<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>小米商城后台</title>
<link href="/MI-4-20/Public/Sun/css/style.css" rel="stylesheet" type="text/css" />
<link href="/MI-4-20/Public/Sun/css/common.css" rel="stylesheet" type="text/css" />
<link href="/MI-4-20/Public/Common/page.css" rel="stylesheet" type="text/css" />
<link href="/MI-4-20/Public/Common/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="/MI-4-20/Public/Common/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
<link rel="icon" href="/MI-4-20/Public/Sun/img/icon.jpg">
<script src="/MI-4-20/Public/Common/jquery.js"></script>
</head>

<body style="background:#FFF8DC">
<div class="header">
	<div class="header03"></div>
	<div class="header01"></div>
	<div class="header02">小米商城后台</div>
</div>
<div class="left" id="LeftBox">
	<div class="left01">
		<div class="left01_right"></div>
		<div class="left01_left"></div>
		<div class="left01_c">欢迎您：<?php echo ($admin_name); ?></div>
	</div>
	<!-- 用户管理 -->
	<div class="left02">
		<div class="left02top">
			<div class="left02top_right"></div>
			<div class="left02top_left"></div>
			<div class="left02top_c" onmousedown="show_menuD(1)">用户管理</div>
		</div>
	  	<div class="left02down" id="D1" data-stat="1">
		    <div class="left02down01">
				<a href="<?php echo U('User/userList');?>">
					<div id="Bf080" class="left02down01_img"></div>
					查看用户
				</a>
			</div>
			<div class="left02down01">
				<a href="<?php echo U('Admin/adminList');?>">
					<div id="Bf080" class="left02down01_img"></div>
					查看管理员
				</a>
			</div>
		</div>
	</div>
	<!-- 站点管理 -->
	<div class="left02">
		<div class="left02top">
			<div class="left02top_right"></div>
			<div class="left02top_left"></div>
			<div class="left02top_c" onmousedown="show_menuD(2)">站点管理</div>
		</div>
		<div class="left02down" id="D2">
			<div class="left02down01">
		    	<a href="<?php echo U('Board/boardList');?>">
		      		<div id="Bf081" class="left02down01_img"></div>
		      		广告列表
		      	</a>
		  	</div>
			<div class="left02down01">
		    	<a href="<?php echo U('Shuffing/shuffingList');?>">
		      		<div id="Bf081" class="left02down01_img"></div>
		      		轮播图
		      	</a>
		  	</div>
		</div>
	</div>
	<!-- 评论管理 -->
	<div class="left02">
		<div class="left02top">
			<div class="left02top_right"></div>
			<div class="left02top_left"></div>
			<div class="left02top_c" onmousedown="show_menuD(3)">评论管理</div>
		</div>
		<div class="left02down" id="D3">
			<div class="left02down01">
		    	<a href="<?php echo U('Evaluate/evaluateList');?>">
		      		<div id="Bf081" class="left02down01_img"></div>
		      		查看评论
		      	</a>
		  	</div>
		</div>
	</div>
	<!-- 分类管理 -->
	<div class="left02">
		<div class="left02top">
			<div class="left02top_right"></div>
			<div class="left02top_left"></div>
			<div class="left02top_c" onmousedown="show_menuD(4)">分类管理</div>
		</div>
		<div class="left02down" id="D4" data-stat="1">
			<div class="left02down01">
		    	<a href="<?php echo U('Type/selectType');?>">
		      		<div id="Bf081" class="left02down01_img"></div>
		      		查看分类
		      	</a>
		  	</div>
		</div>
	</div>
	<!-- 商品管理 -->
	<div class="left02">
		<div class="left02top">
			<div class="left02top_right"></div>
			<div class="left02top_left"></div>
			<div class="left02top_c" onmousedown="show_menuD(5)">商品管理</div>
		</div>
		<div class="left02down" id="D5">
			<div class="left02down01">
		    	<a href="<?php echo U('Goods/addGoods');?>">
		      		<div id="Bf081" class="left02down01_img"></div>
		      		添加商品
		      	</a>
		  	</div>
			<div class="left02down01">
		    	<a href="<?php echo U('Goods/selectGoods');?>">
		      		<div id="Bf081" class="left02down01_img"></div>
		      		查看商品
		      	</a>
		  	</div>
		</div>
	</div>
	<!-- 订单管理 -->
	<div class="left02">
		<div class="left02top">
			<div class="left02top_right"></div>
			<div class="left02top_left"></div>
			<div class="left02top_c" onmousedown="show_menuD(6)">订单管理</div>
		</div>
		<div class="left02down" id="D6">
			<div class="left02down01">
		    	<a href="<?php echo U('Order/index');?>">
		      		<div id="Bf081" class="left02down01_img"></div>
		      		查看订单
		      	</a>
		  	</div>
		</div>
	</div>
	<!-- 友情链接管理 -->
	<div class="left02">
		<div class="left02top">
			<div class="left02top_right"></div>
			<div class="left02top_left"></div>
			<div class="left02top_c" onmousedown="show_menuD(7)">友情链接管理</div>
		</div>
		<div class="left02down" id="D7">
			<div class="left02down01">
		    	<a href="<?php echo U('Friendlinks/showLink');?>">
		      		<div id="Bf081" class="left02down01_img"></div>
		      		友情链接
		      	</a>
		  	</div>
		</div>
	</div>
	<!-- 消息管理 -->
	<div class="left02">
		<div class="left02top">
			<div class="left02top_right"></div>
			<div class="left02top_left"></div>
			<div class="left02top_c" onmousedown="show_menuD(8)">消息管理</div>
		</div>
		<div class="left02down" id="D8">
		  	<div class="left02down01">
		    	<a href="<?php echo U('Quiz/selectQuiz');?>">
		      		<div id="Bf081" class="left02down01_img"></div>
		      		查看提问
		      	</a>
		  	</div>
		</div>
	</div>
	<!-- 权限管理 -->
	<div class="left02">
		<div class="left02top">
			<div class="left02top_right"></div>
			<div class="left02top_left"></div>
			<div class="left02top_c" onmousedown="show_menuD(9)">权限管理</div>
		</div>
		<div class="left02down" id="D9">
		  	<div class="left02down01">
		    	<a href="<?php echo U('Auth/addAuth');?>">
		      		<div id="Bf081" class="left02down01_img"></div>
		      		添加权限
		      	</a>
		  	</div>
		  	<div class="left02down01">
		    	<a href="<?php echo U('Auth/showAuth');?>">
		      		<div id="Bf081" class="left02down01_img"></div>
		      		查看权限
		      	</a>
		  	</div>
		</div>
	</div>
	<!-- 组管理 -->
	<div class="left02">
		<div class="left02top">
			<div class="left02top_right"></div>
			<div class="left02top_left"></div>
			<div class="left02top_c" onmousedown="show_menuD(10)">组管理</div>
		</div>
		<div class="left02down" id="D10">
		  	<div class="left02down01">
		    	<a targe="" href="<?php echo U('AuthGroup/addAuthGroup');?>">
		      		<div id="Bf081" class="left02down01_img"></div>
		      		添加分组
		      	</a>
		  	</div>
		  	<div class="left02down01">
		    	<a targe="" href="<?php echo U('AuthGroup/showAuthGroup');?>">
		      		<div id="Bf081" class="left02down01_img"></div>
		      		查看分组
		      	</a>
		  	</div>
		</div>
	</div>
	<!-- 分类组管理 -->
	<div class="left02">
		<div class="left02top">
			<div class="left02top_right"></div>
			<div class="left02top_left"></div>
			<div class="left02top_c" onmousedown="show_menuD(11)">分类组管理</div>
		</div>
		<div class="left02down" id="D11">
		  	<div class="left02down01">
		    	<a href="<?php echo U('TypeGroup/addTypeGroup');?>">
		      		<div id="Bf081" class="left02down01_img"></div>
		      		添加分类组
		      	</a>
		  	</div>
		  	<div class="left02down01">
		    	<a href="<?php echo U('TypeGroup/selectTypeGroup');?>">
		      		<div id="Bf081" class="left02down01_img"></div>
		      		查看分类组
		      	</a>
		  	</div>
		</div>
	</div>
	<!-- 品牌管理 -->
	<div class="left02">
		<div class="left02top">
			<div class="left02top_right"></div>
			<div class="left02top_left"></div>
			<div class="left02top_c" onmousedown="show_menuD(12)">品牌管理</div>
		</div>
		<div class="left02down" id="D12">
		  	<div class="left02down01">
		    	<a  onclick="" targe="" href="<?php echo U('Brands/selectBrands');?>">
		      		<div id="Bf081" class="left02down01_img"></div>
		      		查看品牌
		      	</a>
		  	</div>
		</div>
	</div>

	<div class="left01">
		<div class="left03_right"></div>
		<div class="left01_left"></div>
		<div class="left03_c"><a href="<?php echo U('Login/loginOut');?>" style="color:black;">安全退出</a></div>
	</div>
</div>

<!-- 右边内容显示 -->
<div class="center" id="Mobile" onclick="show_menuC()"></div>
<div class="rrcc" id="RightBox"><br>
<div class="right" id="li07">
	<div class="right01">
		<img src="/MI-4-20/Public/Sun/img/04.gif" /><?php echo ($title); ?>
	</div>
	<div class="rightmain">
		<div class="ind_main center-block">
			<h2 class="text-center">查看提问</h2>
			<table class="table table-hover">
				<tr>
					<th>序号</th>
					<th>用户</th>
					<th>商品</th>
					<th>内容</th>
					<th>时间</th>
					<th>操作</th>
				</tr>
				<?php if(is_array($quzi)): foreach($quzi as $key=>$v): ?><tr>
						<td><?php echo ($v["id"]); ?></td>
						<td><?php echo ($v["name"]); ?></td>
						<td><?php echo ($v["g"]); ?></td>
						<td><?php echo ($v["content"]); ?></td>
						<td><?php echo ($v["time"]); ?></td>
						<td>
							<button type="button" data-id="<?php echo ($v["id"]); ?>" data-uid="<?php echo ($v["uid"]); ?>" class="quiz btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">查看回复</button>
						</td>
					</tr><?php endforeach; endif; ?>
				<input class="yid" type="hidden" name="id">
				<input class="yuid" type="hidden" name="uid">
			</table>
			<div  class="manu">
				<?php echo ($show); ?>
			</div>	
		</div>
	</div>
</div>

<!-- Large modal -->


<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<center>	
	    	<p style="font-size:35px;text-align:center;color:#0E6DB0">查看回复</p>
	      	<!-- <input style="margin-bottom:30px" type="text" class="text" readonly="true"> -->
	      	<textarea style="margin-bottom:30px" name="texts" id="" class="reply texts" cols="30" rows="10" readonly="true"></textarea>
	      	<a class="cs" style="visibility:visible;display:block;height:40px; width:18%;text-align:center;line-height:40px;margin-top:20px;margin-bottom:40px; background:darkorange;color:#fff" onclick="tws(this)"  href="javascript:;">回复</a>
	      	 <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
      	</center>
    </div>
  </div>
</div>
<script>
$('.quiz').click( function(){
	var that = $(this);
	$id = that.attr('data-id');
	$uid = that.attr('data-uid');
	$('.yid').attr('value',$id);
	$('.yuid').attr('value',$uid);
	$.get(
		'<?php echo U("Quiz/ajaxQuiz");?>',
		{
			id:that.attr('data-id'),
			uid:that.attr('data-uid'),
		},
		function( data ) {
			if ( data !== 0 ) {

				$('.texts').html(data);
				$('.texts').attr('readonly',true);
				// $('.cs').css('visibility','hidden');
				$('.cs').html('提问已回复');
				$('.cs').attr('onclick','');
				$('.cs').css('background','#04CF3D');

			} else {
				$('.texts').attr('readonly',false);
				$('.texts').html('');
				$('.cs').css('visibility','visible');	
				
			}
		},
		'json'
	);
});
// 回复
function tws(obj)
{
	$.get(
		'<?php echo U("Quiz/ajaxTws");?>',
		{
			id:$('.yid').attr('value'),
			uid:$('.yuid').attr('value'),
			text:$('.reply').val(),
		},
		function( data ) {
			if ( data == 0 ) {
				alert('请输入回复内容');
			} else {
				// $('.cs').css('visibility','hidden');
				$('.texts').html(data);
				$('.texts').attr('readonly',true);
				$('.cs').html('回复成功');
				$('.cs').attr('onclick','');
				$('.cs').css('background','#04CF3D');
			}
		},
		'json'
	);
};
</script></div>

<script type="text/JavaScript"> 
	// var $=function(id) {
	//    return document.getElementById(id);
	// }

	// function show_menu(num){
	// 	for(i=0;i<300;i++){
	// 		if($('li0'+i)){
	// 			$('li0'+i).style.display='none';
	// 	 	}
	// 	}
	// 	$('li0'+num).style.display='block';//触发以后信息块
	// }

	function show_menuB(numB){
		for(j=0;j<100;j++){
			if(j!=numB){
				if($('Bli0'+j)){
			  	$('Bli0'+j).style.display='none';
			  	$('Bf0'+j).style.background='url(/MI-4-20/Public/Sun/img/01.gif)';
				}
			}
		}
		if($('Bli0'+numB)){   
			if($('Bli0'+numB).style.display=='block'){
			 	$('Bli0'+numB).style.display='none';
			 	$('Bf0'+numB).style.background='url(/MI-4-20/Public/Sun/img/01.gif)';
			}else {
			  	$('Bli0'+numB).style.display='block';
			  	$('Bf0'+numB).style.background='url(/MI-4-20/Public/Sun/img/02.gif)';
			}
		}
	}

	var temp=0;
	function show_menuC(){
		if (temp==0){
		 	document.getElementById('LeftBox').style.display='none';
	  	 	document.getElementById('RightBox').style.marginLeft='0';
		 	document.getElementById('Mobile').style.background='url(/MI-4-20/Public/Sun/img/center.gif)';

		temp=1;
		}else{
			document.getElementById('RightBox').style.marginLeft='222px';
	   		document.getElementById('LeftBox').style.display='block';
			document.getElementById('Mobile').style.background='url(/MI-4-20/Public/Sun/img/center0.gif)';
	   		temp=0;
		}
	}

	function show_menuD(numD){
		var img = document.getElementById('D'+numD);
		if( img.getAttribute('dataStat') ){
			$('#D'+numD).attr('style','display:none;');
			$('#D'+numD).attr('dataStat','');
		}
		else{
			$('#D'+numD).attr('style','display:block;');
			$('#D'+numD).attr('dataStat','1');
		}
	}

	// var x = 0;
	var y = 100;
	document.onmouseover=processClick;

	function processClick(evt){
	    evt=evt||window.event;
        y=evt.pageY;
        // console.log(y);
	}
	var stat = <?php echo ($stat); ?>;
	// $(window).bind('unload', function (e) {
	// 	if( y < 50){
	// 		$.ajaxSettings.async = false;//设置为同步加载
	// 		$.get(
	// 				"<?php echo U('Login/loginOut');?>"
	// 			);
	// 	}
	// });
	
	// $(window).bind('beforeunload', function (e) {
	// 	if( stat ) {
	// 		$.get(
	// 			"<?php echo U('Login/loginOut');?>"
	// 		);
	// 	}

	// });
	function checkWin(e){

		var ev = e ? e : window.event;
		// console.log(ev);
		if(ev.type == 'beforeunload') {
			if( stat ) {		
				$.get(
					"<?php echo U('Login/loginOut');?>",
					{},
					function () {},
					'json'
				);
			}

		}

	}
</script>
<script src="/MI-4-20/Public/Common/bootstrap/js/bootstrap.js"></script>
<!-- <script src="/MI-4-20/Public/Sun/js/sun.js"></script> -->
</body>
</html>