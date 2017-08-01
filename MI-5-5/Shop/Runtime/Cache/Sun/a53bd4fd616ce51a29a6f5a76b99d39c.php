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
			<h2 class="text-center">查看商品</h2>

		<form style="width:50%;margin:0 auto" class="form-inline" action="<?php echo U('Goods/selectGoods');?>" method="get">
  			<div class="form-group" >
    			<input style="width:190px" name="id" type="text" class="form-control" id="exampleInputEmail3" placeholder="序号">
  			</div>
  			<!-- <div class="form-group">
    			<input style="width:190px" name="typename" type="text" class="form-control" id="exampleInputPassword3" placeholder="分类名">
    		</div> -->
    		<!-- <div class="form-group">
    			<input style="width:190px" name="brands" type="text" class="form-control" id="exampleInputPassword3" placeholder="商品名">
  			</div> -->
  			<select name="status" class="form-control">
  				<option selected="true" disabled="disabled">--状态--</option>
  				<option value="1">上架中</option>
  				<option value="2">已下架</option>
			</select>
			<select name="recommend" class="form-control">
  				<option selected="true" disabled="disabled">--推荐--</option>
  				<option value="1">推荐</option>
  				<option value="2">不推荐</option>
			</select>
			<select name="sale" class="form-control">
  				<option selected="true" disabled="disabled">--销量--</option>
  				<option value="1">正序</option>
  				<option value="2">倒序</option>
			</select>
  			<button type="submit" class="btn btn-success">搜索</button>
		</form>
		<br>
			<table class="table table-hover">
				<tr>
					<th>序号</th>
					<th>商品名</th>
					<!-- <th>封面</th> -->
					<!-- <th>分类名</th> -->
					<!-- <th>品牌名</th> -->
					<th>状态</th>
					<th>推荐</th>
					<th>销量</th>
					<th>版本</th>
					<th>详情</th>
					<th>参数</th>
					<th>操作</th>
					<th> </th>
				</tr>
				<?php if(is_array($goods)): foreach($goods as $key=>$v): ?><tr>
						<td><?php echo ($v["id"]); ?></td>
						<td><?php echo ($v["name"]); ?></td>
					<!-- 	<td>
							<img style="width:40px" src="/MI-4-20/Public/imgs/<?php echo ($v["id"]); ?>/157-0.jpg" />
						</td> -->
						<!-- <td>照片</td> -->
						<!-- <td><?php echo ($v["tid"]); ?></td> -->
						<!-- <td><?php echo ($v["bid"]); ?></td> -->
						<td>
							<?php if($v["status"] == 0): ?><a class="status text-danger" href="javascript:;" data-id="<?php echo ($v["id"]); ?>" data-status="<?php echo ($v["status"]); ?>">已下架</a>
							<?php elseif($v["status"] == 1): ?>
								<a class="status text-success" href="javascript:;" data-id="<?php echo ($v["id"]); ?>" data-status="<?php echo ($v["status"]); ?>">上架中</a><?php endif; ?>
						</td>
						<td>
							<?php if($v["recommend"] == 0): ?><a class="recommend text-danger" href="javascript:;" data-id="<?php echo ($v["id"]); ?>" data-recommend="<?php echo ($v["recommend"]); ?>">不推荐</a>
							<?php elseif($v["recommend"] == 1): ?>
								<a class="recommend text-success" href="javascript:;" data-id="<?php echo ($v["id"]); ?>" data-recommend="<?php echo ($v["recommend"]); ?>">推荐中</a><?php endif; ?>
						</td>
						<td><?php echo ($v["sale"]); ?></td>
						<td>
							<button type="button" data-id="<?php echo ($v["id"]); ?>" class="version btn btn-primary" data-toggle="modal" data-target="#version">查看版本</button>
						</td>
						<td>
							<button type="button" data-id="<?php echo ($v["id"]); ?>" class="xqing btn btn-primary" data-toggle="modal" data-target="#xqing">查看详情</button>
						</td>
						<td>
							<button type="button" data-id="<?php echo ($v["id"]); ?>" class="parameter btn btn-primary" data-toggle="modal" data-target="#parameter">查看参数</button>
						</td>
						<td>
							<button type="button" data-id="<?php echo ($v["id"]); ?>" data-tid="<?php echo ($v["tid"]); ?>" data-bid="<?php echo ($v["bid"]); ?>" data-goodsinfo="<?php echo ($v["goodsinfo"]); ?>" data-name="<?php echo ($v["name"]); ?>" class="savas btn btn-primary" data-toggle="modal" data-target="#savas">编辑</button>
							
							<a  class="delete btn btn-danger"  href="javascript:;"  data-id="<?php echo ($v["id"]); ?>">删除</a>
						</td>
					</tr><?php endforeach; endif; ?>
			</table>
			<div  class="manu">
				<?php echo ($show); ?>
			</div>	
		</div>
	</div>
</div>
<!-- 查看版本的模态框 -->
<div id="version" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
    		<button type="button" style="float:right;" class="btn btn-default" data-dismiss="modal">关闭</button>
    		<center>
    			<h2 class="text-center">查看版本</h2>
				<table class="versions table table-hover">
					<tr>
						<th>版本名</th>
						<th>版本描述</th>
						<th>价格</th>
						<th>颜色名</th>
						<th>颜色</th>
						<th>库存</th>
						<th>图片</th>
					</tr>
					
				</table>
			</center>
   	 	</div>
  	</div>
</div>

<!-- 查看详情 -->
<div id="xqing" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
    	<button type="button" style="float:right;" class="btn btn-default" data-dismiss="modal">关闭</button>
     		<center>
    			<h2 class="text-center">查看详情</h2>
				<div class="pic">

				</div>
			</center>
    	</div>
  	</div>
</div>
<!-- 查看参数 -->
<!-- <div id="parameter" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
    		<button type="button" style="float:right;" class="btn btn-default" data-dismiss="modal">关闭</button>
     		<center>
    			<h2 class="text-center">查看参数</h2>
				<div class="parameter">

					<table class="canshu table table-hover">
					<tr>
						<th>参数</th>
						<th>值</th>
					</tr>	
				</table>
				</div>
			</center>
    	</div>
  	</div>
</div> -->
<!-- 查看参数 -->
<div id="parameter" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
    		<button type="button" style="float:right;" class="btn btn-default" data-dismiss="modal">关闭</button>
    			<h2 class="text-center">查看参数</h2>
					<form action="<?php echo U('Goods/ajaxSubmitGoods');?>" method="post" class="canshu form-inline">
						
					</form>
			</center>
    	</div>
  	</div>
</div>
<!-- 编辑商品 -->
<div id="savas" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  	<div class="modal-dialog modal-lg" role="document">
    	<div class="modal-content">
    		<button type="button" style="float:right;" class="btn btn-default" data-dismiss="modal">关闭</button>
     		<center>
    			<h2 class="text-center">编辑商品</h2>
				<div>
					<form class="form-inline"  action="<?php echo U('Goods/saveGoods');?>" method="post">
					<input class="gids" type="hidden" name="gid" value=""> 
						<label>分类名:</label>
						<select name="tid" class="select form-control">
						
						</select>
						<label>品牌名:</label>
						<select name="bid" class="brands form-control">
							
						</select><br><br>
  						<div class="form-group">
					    <label for="exampleInputName2">商品名:</label>
					    <input type="text" name="gname" class="gname form-control" id="exampleInputName2">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputEmail2">商品描述:</label>
					    <input name="goodsinfo" type="text" class="goodsinfo form-control" id="exampleInputEmail2">
					  </div><br><br>
					  <button type="submit" class="btn btn-default">确认编辑</button><br><br>
					</form>
				</div>
			</center>
    	</div>
  	</div>
</div>
<script>
	// 修改上架状态
	$('.status').click( function() {
		var that = $(this);
		$.get(
			'<?php echo U("Goods/ajaxStatusGoods");?>',
			{
				id:that.attr('data-id'),
				status:that.attr('data-status'),
			},
			function ( data ) {
				if ( data == 1 ) {
					if (that.attr('data-status') == 0 ) {
						// console.log(data);
						that.text('上架中');
						that.attr('data-status', '1');
						that.attr('class','text-success');
					} else if ( that.attr('data-status') == 1 ) {
						that.text('已下架');
						that.attr('data-status', '0');
						that.attr('class','text-danger');
					}
					// console.log('成功');
				} else {
					alert('修改失败');
				}
			},
			'json'
		);
	});
	// 修改推荐状态
	$('.recommend').click( function() {
		var that = $(this);
		$.get(
			'<?php echo U("Goods/ajaxRecommendGoods");?>',
			{
				id:that.attr('data-id'),
				recommend:that.attr('data-recommend'),
			},
			function ( data ) {
				if ( data == 1 ) {
					if (that.attr('data-recommend') == 0 ) {
						// console.log(data);
						that.text('推荐中');
						that.attr('data-recommend', '1');
						that.attr('class','text-success');
					} else if ( that.attr('data-recommend') == 1 ) {
						that.text('不推荐');
						that.attr('data-recommend', '0');
						that.attr('class','text-danger');
					}
					// console.log('成功');
				} else {
					alert('修改失败');
				}
			},
			'json'
		);
	});
	// 查看版本
	$('.version').click( function() {
		var that = $(this);
		$.get(
			'<?php echo U("Goods/ajaxVersionGoods");?>',
			{
				id:that.attr('data-id'),
			},
			function( data ) {
				console.log(data);
				if ( data ) {
					$("center tr").next().remove();
					var str = '';
					for (var i = 0; i < data.vname.length; i++) {
						if( data.color[i].length > 1 ) {
							str += '<tr><td rowspan="'+data.color[i].length+'">'+data.vname[i]+'</td>';
							str += '<td style="width:440px" rowspan="'+data.color[i].length+'">'+data.vinfo[i][0]+'</td>';
							
							
						} else if(data.color[i].length == 1) {
							str += '<tr><td>'+data.vname[i]+'</td>';
							str += '<td style="width:440px">'+data.vinfo[i][0]+'</td>';
							// str += '<td>'+data.price[i][i]+'</td>';
						}
						for( var c = 0; c < data.color[i].length; c++ ){
							if( c > 0 ) {
								str +="</tr><tr>";
							}
							str += '<td>'+data.price[i]+'</td>';
							// console.log(data.invertory[i][c]);
							str += '<td>'+data.colorname[i][c]+'</td>';
							str += '<td><div style="width:40px;height:40px;border:1px solid #000;border-radius:20px;background-color:'+data.color[i][c]+'"></div></td>';
							// str += '<td>'+data.color[i][c]+'</td>';
							str += '<td>'+data.invertory[i][c]+'</td>';
							str += '<td>';
							// console.log(data.basename[i]);
							// for ( var x = 0; x < data.pic[i].length; x++ ) {
							str += '<img style="width:40px" src="/MI-4-20/Public/imgs/'+data.gid+'/'+data.basename[i][c]+'-'+data.pic[0][c]+'"  />';
							// }
							str += '</td></tr>';
						}
					}
				
					$(".versions").append(str);
				} else {
					alert('查看版本失败');
				}
			},
			'json'
		);
	});
	// 查看详情
	$('.xqing').click( function() {
		var that = $(this);
		$.get(
			'<?php echo U("Goods/ajaxXqingGoods");?>',
			{
				id:that.attr('data-id'),
			},
			function( data ) {
				 if ( data ) {
				 	$('.pic img').remove();
				 	var basename = (data['0']);
				 	var str = '';
				 	for ( var i = 0; i < data['pic'].length; i++) {
				 		str += '<img style="width:850px" src="/MI-4-20/Public/imgs/'+basename+'son/'+basename+'-'+data['pic'][i]+'" >';
				 	}
				 	$('.pic').append(str);
				 } else {
				 	alert('详情加载失败');
				 }
			},
			'json'
		);
	});
	// 删除的ajax
	$('.delete').click( function(){
		var that = $(this);
		$.get(
			'<?php echo U("Goods/ajaxDeleteGoods");?>',
			{
				id:that.attr('data-id'),
			},
			function( data ) {
				if ( data ) {
					that.parent().parent().remove();
				} else {
					alert('删除失败');
				}
			},
			'json'
		);
	});
	// 编辑商品
	$('.savas').click( function() {
		var that = $(this);
			$('.goodsinfo').attr('value',that.attr('data-goodsinfo'));
			$('.gname').attr('value',that.attr('data-name'));
			$('.gids').attr('value',that.attr('data-id'));
		$.get(
			'<?php echo U("Goods/ajaxSavaGoods");?>',
			{
				tid:that.attr('data-tid'),
				bid:that.attr('data-bid'),
			},
			function( data ) {
				$(".select>option").remove();
				var str = '';
				str += '<option value="'+data[2]['vid']+'" selected>'+data[2]['vname']+'</option>';
				for ( var i = 0; i < data[3].length; i++ ) {
					str += '<option value="'+data[3][i]['id']+'">'+data[3][i]['typename']+'</option>';
				}
				$('.select').append(str);

				$(".brands>option").remove();
				var strs = '';
				strs += '<option value="'+data[0]['bid']+'" selected>'+data[0]['bname']+'</option>';
				for ( var j = 0; j < data[1].length; j++ ) {
					strs += '<option value="'+data[1][j]['id']+'">'+data[1][j]['brands']+'</option>';
				}
				$('.brands').append(strs);
			},
			'json'
		);
	});
	// 查看参数
	$('.parameter').click( function() {
		var that = $(this);
		$.get(
			'<?php echo U("Goods/ajaxParameterGoods");?>',
			{
				id:that.attr('data-id'),
			},
			function( data ) {
				if ( data ) {
					$(".canshu div").remove();
					$(".canshu button").remove();
					var str = '';
					for ( var i = 0; i < data['parameter'].length; i++) {
						str += '<div class="form-group"><br />';
						str += '<label style="margin:10px" for="exampleInputName2">参数:</label>';
						str += '<input type="text" name="cname" style="width:150px" readOnly="true"  class="form-control" id="exampleInputName2" value="'+data['parameter'][i]+'">';
						str += '</div><div class="form-group"><br />';
						str += '<label style="margin:10px" for="exampleInputEmail2">值:</label>';
						str += '<input readOnly="true" name="zname" data-id="'+data['pid'][i]+'" style="width:550px" type="text" class="form-control" id="exampleInputEmail2" value="'+data['ptext'][i]+'">';
						str += '</div>';
						str += '<button style="margin-top:20px"  type="button" class="savecanshu btn btn-primary" onclick="return editCanShu(this)" >编辑</button>';
					}
					str += '<div style="margin-bottom:50px"></div>';
					$('.canshu').append(str);
				}
			},
			'json'
		);
	});
	// 编辑参数
	// $('.canshu').on('click','.savecanshu',function(){
	// 	var that = $(this);
	// 	$(this).prev().children('input[data-id]').attr('readOnly', '');
	// 	// console.log(that);	
	// 	// alert(1);
	// 	// that.previousSbiling.attr('readOnly').remove();
	// 	// $id = that.attr('data-id');
	// 	// $('.ids').attr('value',$id);
	// 	// $('.brand').attr('value',$ss);
	// });

	function editCanShu(obj){
		$(obj).prev('div').children('input[data-id]').attr('readOnly', false)
		$(obj).prev('div').prev('div').children('.form-control').attr('readOnly', false);
		var str = '';
		str += '<button style="margin-top:20px" type="button" onclick="submit1(this)" class="btn btn-default">提交</button>';
		$(obj).next().before(str);
		$(obj).remove();
	}
	function submit1(obj) {
		$.post('<?php echo U("Goods/ajaxSubmitGoods");?>',
		 { 
		 	cname:$(obj).prevAll().eq(1).children('input').val(),
		 	zname:$(obj).prevAll().eq(0).children('input').val(),
		 	id:$(obj).prevAll().eq(0).children('input').attr('data-id'),
		 },
   		function(data){
     		if( data[0] == 1) {
     			console.log(data);
     			$(obj).prevAll().eq(1).children('input').attr('value',data[1]['pname']);
     			$(obj).prevAll().eq(1).children('input').attr('readOnly',true);
     			$(obj).prevAll().eq(0).children('input').attr('value',data[1]['ptext']);
     			$(obj).prevAll().eq(0).children('input').attr('readOnly',true);
     			var str = '';
				str += '<button style="margin-top:20px"  type="button" class="savecanshu btn btn-primary" onclick="return editCanShu(this)" >编辑</button>';
				$(obj).next().before(str);
				$(obj).remove();
     		} else {
     			alert('您没有更改任何内容');
     		}
   }, "json");
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