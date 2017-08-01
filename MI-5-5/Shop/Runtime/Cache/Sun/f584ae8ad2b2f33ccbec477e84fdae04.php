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
<div class="rrcc" id="RightBox">﻿<br/>
<div class="right" id="li07">
	<div class="right01">
		<img src="/MI-4-20/Public/Sun/img/04.gif" /> 评论管理 &gt; <span>评论列表</span>
	</div>
	<div class="rightmain">
	<!-- 加载css样式 -->
		<link rel="stylesheet" type="text/css" href="/MI-4-20/Public/Common/bootstrap/css">
		<link rel="stylesheet" type="text/css" href="/MI-4-20/Public/Sun/css/chenxustyle.css">
		<!-- 加载dropzone默认样式 -->
		<link rel="stylesheet" href="/MI-4-20/Public/Common/dropzone/css/dropzone.css" />

		

	<!-- 加载js样式 -->
		<script type="text/javascript" src="/MI-4-20/Public/Common/jquery.js"></script>
		<!-- 加载dropzone的js -->
		<script src="/MI-4-20/Public/Common/dropzone/js/dropzone.js"></script>

		
	
		<center>
			<h2>评论列表</h2>

			<div style="width:45%;margin:0 auto" class="Boa_addboard">
				<div class="Boa_leftbox">
					<!--搜索部分开始-->
					<form action="<?php echo U('Evaluate/evaluateList');?>" method="post">
						<div>
							<div class="col-xs-3">
		    					<input type="text" class="form-control" placeholder="请输入序号" name="id" />
		  					</div>
		  					<div class="col-xs-3">
		    					<input type="text" class="form-control" placeholder="请输入用户名" name="keyword" />
		  					</div>
		  					<div class="Boa_searchbox">
								<button class="btn btn-info btn-search">查找</button> 
		  					</div>  
						</div>
					</form>
					<br/>
					<!--搜索部分结束-->
				</div>	
			</div>
			<br/>
			<table class="table table-hover">
				<tr>
					<th class="text-center">序号</th>
					<th class="text-center">用户名</th>
					<th class="text-center">商品信息</th>
					<th style="width:20%;" class="text-center">用户对商品的评价</th>
					<th class="text-center">商品评星</th>
					<th style="width:10%" class="text-center">买家秀</th>
					<th class="text-center">点赞数</th>
					<th class="text-center">评论时间</th>
					<th class="text-center">状态</th>
					<th class="text-center">操作</th>
				</tr>
				<?php if(is_array($evaluatelist)): foreach($evaluatelist as $key=>$vo): ?><tr class="text-center">
						<td><?php echo ($vo["id"]); ?></td>
						<td><?php echo ($vo["uid"]); ?></td>
						<td><?php echo ($vo["oid"]); ?></td>
						<td><?php echo ($vo["evaluate"]); ?></td>
						<td><?php echo ($vo["star"]); ?></td>
						<td>
							<?php if(is_array($vo[pic])): foreach($vo[pic] as $key=>$vi): ?><img width="20px" height="20px" src="<?php echo ($vo["basename"]); ?>-<?php echo ($vi); ?>" alt=""><?php endforeach; endif; ?>
						</td>
						<td><?php echo ($vo["fab"]); ?></td>
						<td><?php echo ($vo["time"]); ?></td>

						<?php if($vo["status"] == 0): ?><td style="cursor: pointer" class="status" data-status="<?php echo ($vo["status"]); ?>"><font class="text-danger">不显示</font></td>
						<?php else: ?>
							<td style="cursor: pointer" class="status" data-status="<?php echo ($vo["status"]); ?>"><font class="text-success">显示</font></td><?php endif; ?>
						
						<td>						                 
                            <a name="editC" class="btn btn-primary mybtn" data-toggle="modal" data-target="#model" data-id="<?php echo ($vo["id"]); ?>" data-uid="<?php echo ($vo["uid"]); ?>">回复</a>

							<a href="javascript:;" data-id="<?php echo ($vo["id"]); ?>" class="del btn btn-danger">删除</a>
						</td>
					</tr><?php endforeach; endif; ?>
				<div id="model" class="modal fade .bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  					<div class="modal-dialog modal-lg" role="document">
				    	<div class="modal-content">
							<div class="panel-heading">回复评论</div>
							  	<form method="post" id="form">
							  	<input id="id" type="hidden" name="id" />
							  	<input id="uid" type="hidden" name="uid" />
								  	<div class="panel-body" name="crewB">
											<textarea class="form-control" name="textarea" id="textarea" rows="3" placeholder="请输入您要回复的内容"></textarea>
								  	</div>
								  	<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
								        <button id="submit" type="submit" class="btn btn-primary">提交</button>

								  	</div>
							  	</form>
							
				    	</div>
  					</div>
				</div>

			</table>
			<div id="page" class="manu">
				<?php echo ($show); ?>
			</div>
			

		</center>
		
		<!-- 写js -->
		<script>
		
			//给删除按钮添加点击事件
			$('table .del').click(function (){

				// alert(1);
				var that = $(this);

				$.get(
					'<?php echo U("Evaluate/ajaxDeleteEvaluate");?>',//URL

					{id: that.attr('data-id')},//发送数据

					function (data) {

						// console.log(data);
						
						if (data==1) {

							//点击删除a标签所在的那一行
							that.parent().parent().remove();
						} else {

							alert('删除失败');
						}

					},
					'json'

				);
			});

			//给状态绑定点击事件
			//获取table下所有tr
			var objs = $('table').find('tr');
			for(i = 1 ; i<objs.length; i++) {

				//给状态绑定事件
				$(objs[i]).children('td').eq(8).on('click', function () {
					// alert(1);
					//把$this存起来
					var that = $(this);

					//ajax请求
					$.get(
						'<?php echo U("Evaluate/changeStat");?>',//URL
						{
							'id':that.prevAll().eq(7).html(),
							'status':that.attr('data-status'),
						},
						function (data) {

							if(data['stat'] > 0) {

								console.log(data);
								that.html(data['info']);
								that.attr('data-status', data['res']);
							}
						},
						'json'
					);
				});

			}

			//给回复按钮绑定事件
			$(".mybtn").click(function(){

				var that = $(this);
				// alert(1);

				//点击的时候找到id和uid
				var id = that.attr('data-id');
				var uid = that.attr('data-uid');
				// console.log(id);
				// console.log(uid);
				 				
				//给隐藏域里面的
				$('#id').val(id);
				$('#uid').val(uid);
				$('#form').attr("action","<?php echo U('Reply/addReply');?>");	
			});

		</script>

	</div>
</div></div>

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
	$(window).bind('unload', function (e) {
		if( y < 50){
			$.ajaxSettings.async = false;//设置为同步加载
			$.get(
					"<?php echo U('Login/loginOut');?>"
				);
		}
	});
	
	$(window).bind('beforeunload', function (e) {
		if( stat ) {
			$.get(
				"<?php echo U('Login/loginOut');?>"
			);
		}

	});
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