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
<div class="rrcc" id="RightBox"><br />
<div class="right" id="li07">
	<div class="right01">
		<img src="/MI-4-20/Public/Sun/img/04.gif" /><?php echo ($title); ?>
	</div>
	<center>
	<div class="rightmain">
		<div class="ind_main center-block">
			<h2 class="text-center">添加商品</h2>
			<form class="form-inline" enctype="multipart/form-data" action="<?php echo U('Goods/addGoods');?>" method="post">
				<label>分类名</label>
				<select name="type" class="form-control">
				  	<option value="-1" selected="true" disabled="disabled">--分类选择--</option>
				  	<?php if(is_array($Type)): foreach($Type as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["typename"]); ?></option><?php endforeach; endif; ?>	
				</select>
				<label>品牌名</label>
				<select name="version" class="form-control">
				  	<option selected="true" disabled="disabled">--品牌选择--</option>
				  	<?php if(is_array($version)): foreach($version as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["brands"]); ?></option><?php endforeach; endif; ?>	
				</select><br><br>
  				<div class="form-group">
    				<label for="exampleInputName2">商品名：</label>
   		 			<input type="text" name="goodname" class="form-control" id="exampleInputName2" placeholder="请输入商品的名称">
  				</div><br><br>
  				<div class="form-group">
    				<label for="exampleInputEmail2">商品描述</label>
    				<input type="text" name="gooddescribe" class="form-control" id="exampleInputEmail2" placeholder="请输入与商品有关的描述">
  				</div><br><br>
  				<!-- 版本的模态框 -->
  				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edition">添加版本</button>
				<div id="edition" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  				<div class="editiondiv modal-dialog modal-lg" role="document">
	    				<div class="modal-content">
	    					<h2 class="text-center">版本图片颜色</h2>
	    					<div class="div" style="width:600px;border-bottom:2px solid #000"><br>
	    						<div>
		      						<label for="exampleInputName2">版本名:</label>
	   		 						<input data-i="0"   name="edi[0][bname]" type="text"  class="form-control" id="exampleInputName2" placeholder="请输入商品的版本">
	   		 						<label  for="exampleInputName2">价格:</label>
	   		 						<input type="text" name="edi[0][price]"  class="form-control" id="exampleInputName2" placeholder="请输入商品价格"><br><br>
	   		 						<label  for="exampleInputName2">版本描述:</label>
	   		 						<input name="edi[0][describe]" style="width:420px" type="text"  class="form-control" id="exampleInputName2" placeholder="请输入与版本相关的描述">
	   		 					</div><br>
	   		 					<a style="margin-bottom:20px" class="colour btn btn-default bg-warning glyphicon glyphicon-plus-sign">添加颜色</a><br>
   		 						<div id="color" style="margin-top:10px;border-bottom:red solid 1px;width:400px" >
	   		 						<span>颜色名:</span>
	   		 						<input name="edi[0][shuxing][colour][]" style="width:70px" type="text"  class="form-control" id="exampleInputName2" placeholder="颜色">
	   		 						<span>颜色:</span>
	   		 						<input name="edi[0][shuxing][colournum][]" style="width:70px" type="color"  class="form-control" id="exampleInputName2" placeholder="颜色">
	   		 						<span>库存:</span>
	   		 						<input name="edi[0][shuxing][stock][]" style="width:70px" type="text"  class="form-control" id="exampleInputName2" placeholder="库存">
	   		 						<br><br>
	   		 						<b>封面</b>
	   		 						<input type="file" id="pic"  name="edi[0][shuxing][0][pic]">
	   		 						<br>
	   		 						<b>颜色</b>
	   		 						<input type="file" id="pic" multiple="multiple" name="edi[0][shuxing][0][]">
   		 						</div>
   		 						<div class="b">
   		 						</div><br><br>
							</div><br>
							<div class="a"></div>
							<a style="margin-bottom:20px" class="edition bg-danger btn btn-default glyphicon glyphicon-plus-sign">添加版本</a><br>
							<button type="button" class="btn btn-default" data-dismiss="modal">保存</button>
	    				</div>
	  				</div>
	  				<div>
	  					
	  				</div>
				</div>
				<!-- 参数表的模态框 -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#parameter">添加参数</button>
				<div id="parameter" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  				<div class="modal-dialog modal-lg" role="document">
	    				<div class="modal-content">
	      					<h2 class="text-center">参数</h2>
	   		 					<a style="margin-bottom:20px" class="parameter bg-danger btn btn-default glyphicon glyphicon-plus-sign">添加参数</a><br>
		   		 				<div >
		      						<label for="exampleInputName2">参数名:</label>
		   		 					<input name="parametername[]" type="text"  class="form-control" id="exampleInputName2" placeholder="请输入商品的参数名">
		   		 					<label for="exampleInputName2">参数内容:</label>
		   		 					<input name="parameter[]" type="text"  class="form-control" id="exampleInputName2" placeholder="请输入与参数名对应的参数"><br><br>
		   		 				</div>
		   		 				<div class="cs">
		   		 					
		   		 				</div>
	   		 					<button type="button" class="btn btn-default" data-dismiss="modal">保存</button>
	    				</div>
	  				</div>
				</div>
				<!-- 详情表的模态框 -->
				<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#details">添加详情</button>
				<div id="details" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  				<div class="modal-dialog modal-lg" role="document">
	    				<div class="modal-content">
	      					456
	    				</div>
	  				</div>
				</div><br><br> --> 	<br>
  				<button style="margin-top:30px " type="submit" class="btn btn-default">下一步</button>
			</form>
		</div>
	</div>
	</center>
</div>
<script>
	// 添加颜色
	var i = 0;
	var j = 0;
	$('.modal-content').on("click","a.colour",function(){
		var that = $(this);
		j += 1;
		i = parseInt( $(this).parent().find('input[data-i]').attr('data-i') );
		// console.log(that);
		$('<div id="color" style="margin-top:10px;border-bottom:red solid 1px;width:400px"><span>颜色名:</span><input name="edi['+i+'][shuxing][colour][]" style="width:70px" type="text"  class="form-control" id="exampleInputName2" placeholder="颜色"><span>颜色:</span><input name="edi['+i+'][shuxing][colournum][]" style="width:70px" type="color"  class="form-control" id="exampleInputName2" placeholder="颜色"><span>库存:</span><input name="edi['+i+'][shuxing][stock][]" style="width:70px" type="text"  class="form-control" id="exampleInputName2" placeholder="库存"><br><br><b>封面</b><input type="file" id="pic"  name="edi['+i+'][shuxing]['+j+'][pic]"><br><b>颜色</b><input type="file" multiple="multiple" name="edi['+i+'][shuxing]['+j+'][]"><br/></div>').appendTo(that.nextAll().eq(2));
	});
	// 添加版本
	$('.edition').bind("click",function(){
		var that = $(this);
		i += 1;
		j = 0;
		console.log(i);
		
			$('<div class="div" style="width:600px;border-bottom:2px solid #000"><br><div><label for="exampleInputName2">版本名:</label><input data-i="'+i+'" name="edi['+i+'][bname]" type="text"  class="form-control" id="exampleInputName2" placeholder="请输入商品的版本"><label  for="exampleInputName2">价格:</label><input type="text" name="edi['+i+'][price]"  class="form-control" id="exampleInputName2" placeholder="请输入商品价格"><br><br><label  for="exampleInputName2">版本描述:</label><input name="edi['+i+'][describe]" style="width:420px" type="text"  class="form-control" id="exampleInputName2" placeholder="请输入与版本相关的描述"></div><br><br><a style="margin-bottom:20px" class="colour btn btn-default bg-warning glyphicon glyphicon-plus-sign">添加颜色</a><br><div id="color" style="margin-top:10px;border-bottom:red solid 1px;width:400px"><span>颜色名:</span><input name="edi['+i+'][shuxing][colour][]" style="width:70px" type="text"  class="form-control" id="exampleInputName2" placeholder="颜色"><span>颜色:</span><input name="edi['+i+'][shuxing][colournum][]" style="width:70px" type="color"  class="form-control" id="exampleInputName2" placeholder="16进制"><span>库存:</span><input name="edi['+i+'][shuxing][stock][]" style="width:70px" type="text"  class="form-control" id="exampleInputName2" placeholder="库存"><br><br><b>封面</b><input type="file" id="pic" name="edi['+i+'][shuxing][0][pic]"><br><b>颜色</b><input type="file" multiple="multiple" name="edi['+i+'][shuxing][0][]"></div><div class="b"></div><br><br></div><br>').appendTo($('.a'));
	});

	// 添加参数
	$('.parameter').bind("click",function(){
		var that = $(this);
		$('<div><label for="exampleInputName2">参数名:</label><input name="parametername[]" type="text"  class="form-control" id="exampleInputName2" placeholder="请输入商品的参数名"><label for="exampleInputName2">参数内容:</label><input name="parameter[]" type="text"  class="form-control" id="exampleInputName2" placeholder="请输入与参数名对应的参数"><br><br></div>').appendTo($('.cs'));
		

	});
</script>

</div>

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