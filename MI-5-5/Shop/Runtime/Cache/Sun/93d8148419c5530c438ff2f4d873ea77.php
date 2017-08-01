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
<div class="rrcc" id="RightBox"><br/>
<div class="right" id="li07">
	<div class="right01">
		<img src="/MI-4-20/Public/Sun/img/04.gif" /> 用户组管理 &gt; <span>查看用户组</span>
	</div>
	<div class="rightmain">
		<div class="Aut_addmain">
			<h2 class="text-center">用户组列表</h2>
			<div class="Aut_showform">
				<form class="form-inline" method="get">
				  	<div class="form-group">
				    	<font>查询方式</font>
					  	<select class="form-control" name="status">
						  	<option value="1">序号</option>
						<?php if($status == 0): ?><option selected value="0">组名</option>
						<?php else: ?>
							<option value="0">组名</option><?php endif; ?>
						</select>
				  	</div>
				  	<div class="form-group">
				    	<input type="text" class="form-control" name="info" value="<?php echo ($info); ?>">
				  	</div>
				  	<button type="submit" class="btn btn-success">查询</button>
				</form>
			</div>
			<table style="text-align:center; font-size:14px;" class="table table-condensed table-striped">
				<tr>
					<th style="width:5%" class="text-center">序号</th>
					<th class="text-center">组名</th>
					<th class="text-center">状态</th>
					<th style="width:25%" class="text-center">操作</th>
				</tr>
		<?php if($list['list'] != 0): if(is_array($list["list"])): foreach($list["list"] as $key=>$vo): ?><tr>
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["title"]); ?></td>
				<?php if($vo["status"] == 1): ?><td style="cursor:pointer" data-stat="<?php echo ($vo["status"]); ?>"><font class="text-success">启用</font></td>
				<?php else: ?>
					<td style="cursor:pointer" data-stat="<?php echo ($vo["status"]); ?>"><font class="text-danger">禁用</font></td><?php endif; ?>
					<td>
						<a name="editC" class="btn btn-primary btn-sm btn-success" data-toggle="modal" data-target="#model" data-id="<?php echo ($vo["id"]); ?>">编辑组员</a>
						<a name="editA" class="btn btn-primary btn-sm btn-success" data-toggle="modal" data-target="#model1" data-id="<?php echo ($vo["id"]); ?>">编辑权限</a>
						<a name="editE" class="btn btn-primary btn-sm btn-success" data-toggle="modal" data-target="#model2" data-id="<?php echo ($vo["id"]); ?>">编辑</a>
						<a name="del" data-id="<?php echo ($vo["id"]); ?>" class="btn btn-primary btn-sm btn-danger" href="javascript:;">删除</a>
					</td>
				</tr><?php endforeach; endif; ?>
		<?php else: ?>
				<tr>
					<td colspan='5'><h3 class="text-center text-danger">没有数据！</h3></td>
				</tr><?php endif; ?>
			</table>
			<div class="manu">
				<?php echo ($list[0]); ?>
			</div>
		</div>
		<div id="model" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  	<div class="modal-dialog modal-sm" role="document">
		    	<div class="modal-content">
		    		<div class="panel panel-info">
					  	<div class="panel-heading">编辑组员</div>
					  	<input type="hidden" value="">
					  	<div class="panel-body" name="crewB">
					  	</div>
					  	<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					        <button id="submitC" type="button" class="btn btn-primary">保存修改</button>
					  	</div>
					</div>
		    	</div>
		  	</div>
		</div>
		<div id="model1" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  	<div class="modal-dialog modal-sm" role="document">
		    	<div class="modal-content">
		    		<div class="panel panel-info">
					  	<div class="panel-heading">编辑权限</div>
					  	<!-- <input type="hidden" value=""> -->
					  	<div class="panel-body" name="authB">
					  	</div>
					  	<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					        <button id="submitA" type="button" class="btn btn-primary">保存修改</button>
					  	</div>
					</div>
		    	</div>
		  	</div>
		</div>
		<div id="model2" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
		  	<div class="modal-dialog modal-sm" role="document">
		    	<div class="modal-content">
		    		<div class="panel panel-info">
					  	<div class="panel-heading">编辑</div>
					  	<input type="hidden" value="">
					  	<div class="panel-body">
					  		<div class="form-group">
						    	<label for="title"><h4>组名</h4></label>
						    	<input type="text" class="form-control" id="title" placeholder="组名：中文，1~20" name="title">
						  	</div>
					  	</div>
					  	<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
					        <button id="submitE" type="button" class="btn btn-primary">保存修改</button>
					  	</div>
					</div>
		    	</div>
		  	</div>
		</div>
	</div>
</div>

<script>
	//获取table下所有tr
	var objs = $('table').find('tr');
	for(i = 1 ; i<objs.length; i++) {
		//为删除按钮绑定事件
		$(objs[i]).find('a[name=del]').on('click', function () {
			//储存对象
			var that = $(this);
			//ajax请求
			$.get(
				"<?php echo U('AuthGroup/delAuthGroup');?>",
				{'id': that.attr('data-id')},
				function (data) {
					if( data[0] == 1 ){
						alert(data[1]);
						that.parent().parent().remove();
					} else {
						alert(data[1]);
					}
				},
				'json'
			);
		});

		//为状态绑定事件
		$(objs[i]).children('td').eq(2).on('click', function () {
			//存储对象
			var that = $(this);
			//ajax请求
			$.get(
				"<?php echo U('AuthGroup/changeStat');?>",
				{
					'id':that.prevAll('td').eq(1).html(),
					'status':that.attr('data-stat'),
				},
				function (data) {
					if(data['stat'] > 0) {
						that.html(data['info']);
						that.attr('data-stat', data['res']);
					}
				},
				'json'
			);
		});

		//为编辑组员按钮绑定事件
		$(objs[i]).find('a[name=editC]').on('click', function () {
			//为模态框指定id
			$('input[type=hidden]').val($(this).attr('data-id'));
			//ajax
			$.get(
				"<?php echo U('AuthGroup/findCrew');?>",
				{id:$(this).attr('data-id')},
				function (data) {
					// 初始化变量
					var str = '';
					// 检查返回的数据
					console.log(data);
					if( data[0] == '' && data[1] == ''){
						str += '<p class="text-center text-danger">没有数据</p>';
					} else {
						// 制作内容
						for( var i = 0; i < data[0].length; i++ ) {
							str +='<label class="checkbox-inline"><input type="checkbox" title="rule" value="'+data[0][i]['id']+'" name="crew[]">'+data[0][i]['name']+'</label><br>';
						}
						for( i = 0; i < data[1].length; i++ ) {
							str +='<label class="checkbox-inline"><input checked type="checkbox" title="rule" value="'+data[1][i]['id']+'" name="crew[]">'+data[1][i]['name']+'</label><br>';
						}
					} 
					//写入模态框
					$('.panel-body[name=crewB]').empty().append(str);
				},
				'json'
			);

		});

		//为编辑权限按钮绑定事件
		$(objs[i]).find('a[name=editA]').on('click', function () {
			//为模态框指定id
			$('input[type=hidden]').val($(this).attr('data-id'));
			//ajax
			$.get(
				"<?php echo U('AuthGroup/findAuth');?>",
				{id:$(this).attr('data-id')},
				function (data) {
					// 初始化变量
					var str = '';
					// 检查返回的数据
					if( data[1] == ''){
						str += '<p class="text-center text-danger">没有数据</p>';
					} else {
						// 制作内容
						for( var i = 0; i < data[0].length; i++ ) {
							str +='<label class="checkbox-inline"><input type="checkbox" title="rule" value="'+data[0][i]['id']+'" name="auth[]">'+data[0][i]['name']+' '+data[0][i]['title']+'</label><br>';
						}
						for( i = 0; i < data[1].length; i++ ) {
							str +='<label class="checkbox-inline"><input checked type="checkbox" title="rule" value="'+data[1][i]['id']+'" name="auth[]">'+data[1][i]['name']+' '+data[1][i]['title']+'</label><br>';
						}
					} 
					//写入模态框
					$('.panel-body[name=authB]').empty().append(str);
				},
				'json'
			);

		});
		//为编辑按钮绑定事件
		$(objs[i]).find('a[name=editE]').on('click', function () {
			//为模态框指定id
			$('input[type=hidden]').val($(this).attr('data-id'));
			$('#title').val( $(this).parent().prevAll('td').eq(1).html() );

		});
	}

	//为编辑组员模态框中的保存按钮绑定事件
	$('#submitC').on('click', function () {

		saveUpdate('crewB', "<?php echo U('AuthGroup/updateCrew');?>");

	});
	//为编辑权限模态框中的保存按钮绑定事件
	$('#submitA').on('click', function () {

		saveUpdate('authB', "<?php echo U('AuthGroup/updateAuth');?>");

	});
	$('#submitE').on('click', function () {

		
		var groupname = $('#title').val();
		$.post(
			"<?php echo U('AuthGroup/updateGroup');?>",
			{
				id:$('input[type=hidden]').val(),
				title:groupname
			},
			function (data) {
				if( data[0] == 1 ){
					var id = $('input[type=hidden]').val();
					$('a[data-id='+id+']').eq(0).parent().prevAll('td').eq(1).text(groupname);
					alert(data[1]);
				} else {
					alert(data[1]);
				}
			},
			'json'
		);

	});

	function saveUpdate (find, to) {

		var val = [];
		var i = 0;
		$('div[name='+find+'] input[type=checkbox]').each(function () {
			if( $(this).is(':checked') ) {
				val[i] = $(this).val();
				i++;
			}
		});

		$.post(
			to,
			{
				id:$('input[type=hidden]').val(),
				val:val
			},
			function (data) {
				alert(data[1]);
				// console.log(data);
			},
			'json'
		);


	}

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