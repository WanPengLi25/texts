<?php


	namespace Home\Controller;

	use Think\Controller;


	class ConfirmOrderController extends CommonController
	{
		protected $tableName = 'area';


		public function confirmOrder()
		{
            if( !session('?shopCart') ){
            	$this->error('购物车空空如也');
            }
            $value = session('shopCart');
           
            $liyn = D('ConfirmOrder')->showslesct();
            // dump($liyn);
            //获取头部相关信息
            $head = $this->showHead();

            $this->assign('shopcar', $head['shopcar']);
            $this->assign('userInfo', $head['userInfo']);
            $this->assign('topgoods', $head['topgoods']);
            $this->assign('friends', $head['friends']);
            $this->assign('recommend', $head['recommend']);
			$this->assign('huo',$liyn);
            $this->assign('lasn', $value['goods']);
            $this->assign('total', $value['tote']);
            $this->assign('tote', $value['total']);

			$this->display();

		}

		public function address()
		{

			$upid = I('get.upid');
			
			// dump($cateRes);


			$area = M('area');

			$earas = $area->where('upid='.$upid)->select();

			

			$this->ajaxReturn($earas);



		}

		public function adddizhi()
		{

			$cateId = I('post.cateId'); 
			$name = I('post.name');
			$tel = I('post.tel');
			$pos = I('post.pos');
			$igt = I('post.tig');
			$text= I('post.text');
			$uid = I('post.uid');

			$naha = explode(',',$cateId);
			// dump($naha);
			// $def = I('post.def'),
			
			// dump(I('post.'));exit;
			

			$useraddress = M('user_address');

			$data['proid'] = $naha[0];
			$data['cityid'] = $naha[1];
			$data['areid'] = $naha[2];
			$data['townid'] = $naha[3];
			$data['name'] = $name;
			$data['phone'] = $tel;
			$data['code'] = $pos;
			$data['tip'] = $tig;
			$data['address'] = $text;
			$data['uid'] = $uid;
			$dizhi = $useraddress->add($data);

			if($dizhi){
				echo 1;

			} else {
				echo 0;
			}


		}

		public function addOrder()
		{
			$shopinfo = session('shopCart');

			$goods = $shopinfo['goods'];

			$id = I('post.pid');
			if( !$id ) {
				$this->error('地址不能为空');
				exit;
			}

			$liam = M('user_address');

			$sum = 0;

			foreach($goods as $v) {
				$data['gid'][] = $v['gid'];
				$data['vid'][] = $v['vid'];
				$data['cid'][] = $v['pid'];
				$data['num'][] = $v['num'];
				$sum += $v['num']*$v['price'];
			}

			$data['gid'] = implode(',', $data['gid']);
			$data['vid'] = implode(',', $data['vid']);
			$data['cid'] = implode(',', $data['cid']);
			$data['num'] = implode(',', $data['num']);
			$data['total'] = $sum;

			$lima = $liam->field("name,phone,address,code,uid,proid,cityid,areid,townid")->where('id='.$id)->select();

			// dump($lima);

			$data['uid'] = $lima[0]['uid'];
			$data['oname'] = $lima[0]['name'];
			$data1['phone'] = $lima[0]['phone'];
			$data1['code'] = $lima[0]['code'];
			$data1['tips'] = $lima[0]['tip'];
			$data1['address'] = $lima[0]['address'];

			$addids[] = $lima[0]['proid'];
			$addids[] = $lima[0]['cityid'];
			$addids[] = $lima[0]['areid'];
			$addids[] = $lima[0]['townid'];

			$addre = '';
			for( $i = 0; $i < count($addids); $i++ ) {
				$res = M('Area')->where('id='.$addids[$i])->limit(1)->select();
				$addre .= $res[0]['name'].' ';
			}

			$data1['address'] = $addre.$data1['address'];

			$order = M('order');
			$detail = M('OrderDetail');

			//开启事务
			$order->startTrans();

			$res = $order->add($data);
			if( !$res ){
				$order->rollback();
				return 2;
			}
			echo 'order';
			$data1['oid'] = $res;
			$res = $detail->add($data1);
			if( !$res ) {
				$detail->rollback();
				return 1;
			}
			echo 'detail';


			$order->commit();
			$detail->commit();

			session('shopCart', null);

			$this->redirect('Personal/personal', array('where'=>'order'),2,'页面跳转中····');

		}
	}