<?php
	namespace Home\Controller;

	use Think\Controller;

	class GoodsListController extends CommonController
	{
		/**
		 * showGoodsList 显示商品列表
		 * @return no return
		 */
		public function showGoodsList ()
		{

			// $this->error('访问出错');

                  $head = $this->showHead();
                  
			$Home = D('Home');
                  //导航
                  $goods['name'] = '全部商品';
                  $goods['typename'] = $Home->navGoods();
                  $goods['status'] = 1;
                  //站点相关
                  $board[] = $Home->findBoard(0,1);
      		$goodsList = D('GoodsList');
      		$res = $goodsList->findGoods();
      		$this->assign('msg', $res[0]);
      		$this->assign('page', $res[1]);
                  $this->assign('goods', $goods);
                  $this->assign('board', $board);
                  $this->assign('topgoods', $head['topgoods']);
                  $this->assign('friends', $head['friends']);
                  $this->assign('recommend', $head['recommend']);
                  $this->assign('shopcar', $head['shopcar']);
                  $this->assign('userInfo', $head['userInfo']);
                  $this->display();
		}

	}