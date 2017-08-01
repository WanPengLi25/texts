<?php 
	

	namespace 	Home\Controller;

	use 	Think\Controller;

	class ShopCartController extends CommonController
	{
		//定义个表名
		protected $tableName = 'goods';

		public function showShopCart ()
		{

			$shopCart = D('Shop');
			$res = $shopCart->showShopCart();

			//获取头部相关信息
            $head = $this->showHead();

            $this->assign('shopcar', $head['shopcar']);
            $this->assign('userInfo', $head['userInfo']);
            $this->assign('topgoods', $head['topgoods']);
            $this->assign('friends', $head['friends']);
            $this->assign('recommend', $head['recommend']);
			$this->assign('goods', $res['goods']);
			$this->assign('tote', $res['tote']);
			$this->assign('total', $res['total']);
			// 视图
			$this->display('shopCart');

		}

		// 定义一个购物车的清空
		public function deleseion()
		{

			//清空购物车
			if( session('?shopCart') ) {
				session('shopCart',null);
				$this->showShopCart();
			} else {
				$this->showShopCart();
			}

			

		}
		//定义一个购物车的删
		public function delectshop()
		{

			// dump(I('get.'));exit;

			$lisdel = session('shopCart');
			$id = I('get.id');
			$vid = I('get.vid');
			$pid = I('get.pid');

			$find = implode(I('get.'));
			$val = [];

			if( count($lisdel['goods']) == 1 ) {
				session('shopCart',null);
				$this->success('删除成功');
				exit;
			}

			foreach( $lisdel['goods'] as $k=>$v ) {

				$str = implode($v);
				if( strpos($str, $find) === false ) {
					$val[$k] = $v;
				} else {
					$lisdel['tote'] -= $v['num'];
					$lisdel['total'] -= $v['sum'];
				}

			}
			$lisdel['goods'] = $val;
			session('shopCart',$lisdel);
			if((count($lisdel['goods']) == count($val))){
				$this->success('删除成功');
			}else{
				$this->error('删除失败');
			}
		}
		// 定义一个购物车的加法
		public function goodsPlus()
		{

			//获取商品键
			$did = I('get.did');

			if(!empty($did)){
				$valued = session('shopCart');

				// dump($valued);
				$model = M('goodsPicColor');

				if( !isset($valued['goods'][$did]) ) {

					echo json_encode(array(0, '购物车中没有此商品！'));

				} else {

					$res = $model->field('invertory')->where('id='.$valued['goods'][$did]['pid'])->limit(1)->select();

					if( $valued['goods'][$did]['num'] >= $res[0]['invertory']){
						echo json_encode(array(0, '库存不足'));
					} else {
						$valued['goods'][$did]['num'] += 1;
						$valued['goods'][$did]['sum'] += $valued['goods'][$did]['price'];
						$valued['tote'] += 1;
						$valued['total'] += $valued['goods'][$did]['price'];
						session('shopCart',$valued);
						echo json_encode(array(
							1, 
							array(
								'num'=>$valued['goods'][$did]['num'],
								'sum'=>$valued['goods'][$did]['sum'],
								'tote'=>$valued['tote'],
								'total'=>$valued['total']
							)
							));
					}
				}

			}
		}
		//定义一个购物车减的方法
		public function goodsMinus()
		{

			//获取商品键
			$did = I('get.did');

			if(!empty($did)){
				$valued = session('shopCart');

				$model = M('goodsPicColor');

				if( !isset($valued['goods'][$did]) ) {

					echo json_encode(array(0, '购物车中没有此商品！'));

				} else {

					if( $valued['goods'][$did]['num'] == 1){
						echo json_encode(array(0, '最后一个了！'));
					} else {
						$valued['goods'][$did]['num'] -= 1;
						$valued['goods'][$did]['sum'] -= $valued['goods'][$did]['price'];
						$valued['tote'] -= 1;
						$valued['total'] -= $valued['goods'][$did]['price'];
						session('shopCart',$valued);
						echo json_encode(array(
							1, 
							array(
								'num'=>$valued['goods'][$did]['num'],
								'sum'=>$valued['goods'][$did]['sum'],
								'tote'=>$valued['tote'],
								'total'=>$valued['total']
							)
							));
					}
				}

			}
		}
	} 