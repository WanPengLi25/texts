<?php

	namespace Sun\Controller;

	use Think\Controller;

	class GoodsController extends CommonController 
	{
		// 添加分类组
		public function addGoods()
		{

			if ( IS_POST ) {
				$goods = D('Goods')->addGoods();
				if ( $goods[0] == 0 ) {
					$this->error($goods[1]);
				} else {
					$gid = $goods[2]; 
					$this->success($goods[1],U('Goods/goodsDetail',array('gid'=>$gid)));
				}

			} else {
				// 显示分类
				$Type = M('Type')->where('status=1')->select();
				// 显示品牌
				$version = M('Brands')->where('status=1')->select();
				$this->assign('title',' 商品管理 &gt; 添加商品');
				$this->assign('Type',$Type);
				$this->assign('version',$version);
		        $this->display();
			}
		}
		public function goodsDetail()
		{
			if ( IS_POST ) {
				$goods = D('Goods')->goodsDetail();
				if ( $goods[0] == 0 ) {
					$this->error($goods[1]);
				} else {
					$this->success($goods[1],U('Goods/selectGoods'));
				}

			} else {
				$gid = I('get.gid');
				$this->assign('title',' 商品管理 &gt; 添加商品 &gt; 商品详情');
				$this->assign('gid',$gid);
				$this->display();
			}
		}
		public function selectGoods()
		{
			if ( IS_GET ) {
				$goods = D('Goods')->selectGoods();
				$this->assign('goods',$goods['sp']);
				$this->assign('show',$goods['fy']);
				// $this->assign('typess',$goods['typess']);
				$this->assign('title',' 商品管理 &gt; 查看商品');
		        $this->display();
			}
		}
		// 上架状态的AJAX
		public function ajaxStatusGoods()
		{
			if ( IS_AJAX) {
				$id = I('get.id');
				$status = I('get.status');
				if ( $status == '0' ) {
					$data['status'] = 1;
				} else if ( $status == '1' ){
					$data['status'] = 0;
				}
				$res = M('Goods')->where("id=$id")->field('status')->save($data);
				echo json_encode($res);
				exit;
			} else {
				exit('请使用ajax来请求');
			}
		}
		// 推荐的AJAX
		public function ajaxRecommendGoods()
		{
			if ( IS_AJAX) {
				$id = I('get.id');
				$recommend = I('get.recommend');
				if ( $recommend == '0' ) {
					$data['recommend'] = 1;
				} else if ( $recommend == '1' ){
					$data['recommend'] = 0;
				}
				$res = M('Goods')->where("id=$id")->field('recommend')->save($data);
				echo json_encode($res);
				exit;
			} else {
				exit('请使用ajax来请求');
			}
		}
		// 查看版本的AJAX
		public function ajaxVersionGoods()
		{
			if ( IS_AJAX ) {
				$version = D('Goods')->ajaxVersionGoods();
				// dump($version);
				echo json_encode($version);

			}
		}
		// 查看详情的AJAX
		public function ajaxXqingGoods()
		{
			if ( IS_AJAX ) {
				
				$xqing = D('Goods')->ajaxXqingGoods();
				echo json_encode($xqing);

			}
		}
		// 删除的AJAX
		public function ajaxDeleteGoods()
	   {
	   		if ( IS_AJAX ) {
	   			$delete = D('Goods')->ajaxDeleteGoods();
	   			echo json_encode($delete);
	   		}
	   }
	   // 查看参数的AJAX
		public function ajaxParameterGoods()
	   {
	   		if ( IS_AJAX ) {
	   			$Parameter = D('Goods')->ajaxParameterGoods();
	   			echo json_encode($Parameter);
	   		}
	   }
	   // 编辑参数
	   public function ajaxSubmitGoods()
	   {
	   		if ( IS_POST ) {
	   			$canshu = D('Goods')->ajaxSubmitGoods();
	   			echo json_encode($canshu);
	   		}
	   }
	   // 编辑商品的AJAX
		public function ajaxSavaGoods()
	   {
	   		if ( IS_AJAX ) {
	   			$save = D('Goods')->ajaxSavaGoods();
	   			echo json_encode($save);
	   		}
	   }
	   // 编辑商品
		public function saveGoods()
	   {
	   		if ( IS_POST ) {
	   			$saves = D('Goods')->saveGoods();
	   			if ( $saves == 1) {
		   			$this->success('编辑成功',U('Goods/selectGoods'));	
	   			} else {
	   				$this->error('编辑失败');
	   			}
	    		exit;
	   		}
	   }
	}