<?php

namespace Home\Controller;

use Think\Controller;

class DetailController extends CommonController
{     
   
	public function detail()
	{   
		if ( IS_GET ) {

			$res = D('Detail')->detail();
			$Home = D('Home');
			$head = $this->showHead();
			//导航
          	$goods['name'] = '全部商品';
          	$goods['typename'] = $Home->navGoods();
          	$goods['status'] = 1;
			// dump($res);
			$this->assign('top', $goods);
			$this->assign('topgoods', $head['topgoods']);
            $this->assign('friends', $head['friends']);
            $this->assign('recommend', $head['recommend']);
            $this->assign('shopcar', $head['shopcar']);
            $this->assign('userInfo', $head['userInfo']);
			$this->assign('goods',$res);
		    $this->display();

		} else {

			$gid = I('post.gid');
			$vid = I('post.vid');
			$pid = I('post.cid');

			$did = array($gid,$vid,$pid);
			// if( isset() )
			$did = implode($did);

			if( session('?shopCart') ) {
				if( isset( session('shopCart')['goods'][$did] ) ){
					$this->redirect('shopCart/showShopCart', array('did' => $did));
				} else {
					$shopCart = session('shopCart');
				}
			} else {
				$shopCart['goods'] = [];
				$shopCart['tote'] = 0;
				$shopCart['total'] = 0;
			}

			// 实例化一个对象
			$model = M();

			// 查询数据
			$res = $model->field('g.name,v.price,v.vname,c.cover,c.colorname')->table(array('mi_goods'=>'g','mi_goods_version'=>'v','mi_goods_pic_color'=>'c'))->where('g.id='.$gid.' and v.id='.$vid.' and c.id='.$pid)->limit(1)->select();
			$res[0]['gid'] = $gid;
			$res[0]['vid'] = $vid;
			$res[0]['pid'] = $pid;	
			$res[0]['num'] = 1;			
			$res[0]['sum'] = $res[0]['price'];

			$shopCart['goods'][$did] = $res[0];
			$shopCart['tote'] += 1;
			$shopCart['total'] += $res[0]['price'];

			$val = $shopCart['goods'];
			$total = $shopCart['total'];
			$tote = $shopCart['tote'];
			// 将结果集存入session()
			session('shopCart', $shopCart);
			$this->display('Detail/ordercart');

		}
	}
	public function ajaxVersion()
	{
		if ( IS_AJAX) {
			$res = D('Detail')->ajaxVersion();
			// dump($res);
			echo json_encode($res);
			exit;
		}
	}
	public function ajaxColor()
	{
		if ( IS_AJAX) {
			$res = D('Detail')->ajaxColor();
			echo json_encode($res);
			exit;
		}
	}
	public function ajaxSpec()
	{
		if ( IS_AJAX ) {
			$spec = D('Detail')->ajaxSpec();
			echo json_encode($spec);
			exit;
		}
	}
	public function ajaxLoad()
	{	
	}
	public function ajaxLoads()
	{
		if ( IS_AJAX ) {
			$loat = D('Detail')->ajaxLoads();
			echo json_encode($loat);
			exit;
		}
	}
	public function ajaxTheSun()
	{
		if ( IS_AJAX ) {
			$thesun = D('Detail')->ajaxTheSun();
			echo json_encode($thesun);
			exit;
		}
	}
	// 显示提问
	public function ajaxAsk()
	{
		if ( IS_AJAX ) {
			$ask = D('Detail')->ajaxAsk();
			echo json_encode($ask);
			exit;
		}
	}
	// 搜索提问
	public function ajaxAsks()
	{
		if ( IS_AJAX ) {
			$asks = D('Detail')->ajaxAsks();
			echo json_encode($asks);
			exit;
		}
	}
	// 提问
	public function tws()
	{
		if ( IS_AJAX ) {
			$tw = D('Detail')->tws();
			echo json_encode($tw);
			exit;
		}
	}
}