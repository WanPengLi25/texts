<?php  


	namespace Home\Controller;

	use Think\Controller;

	class SearchController extends CommonController
	{

		public function searchshow()
		{
			//实例化一个对象
			$sgoods = D('Search');
			//判断是否是POST传值	

			//接收get传过来
			$name = I('get.search');

			
			//把获取到值分配给前台
			$this->assign('search',$name);
			
			$price = I('get.price',0);
			if($price){
				$order = 'order by id '.$price;
				if($price == 'asc') $this->assign('price','desc');
				else $this->assign('price','asc');

			} else {
				$this->assign('price','asc');
				$order = 'order by id desc';
			}
			
			//调用Model的方法
			$searchgoods = $sgoods->searchGoods($order);


			// 判断获取的结果是否为空
			if (empty($searchgoods[0][0])){
				//为空就给输出提示
				$this->error('抱歉，没有搜索到与 “'.$name.'” 相关的商品');
			} else {

				//友情链接 
				//实例化一个模型
				$linkController = D('Friendlinks');

				//调用一个Model方法
				$linklistassign = $linkController->friendlinks();
				 //获取头部相关信息
	            $head = $this->showHead();
			
				//分配数据
				$this->assign('li', $linklistassign);
				//友情链接
				 //赋值
	            $this->assign('shopcar', $head['shopcar']);
	            $this->assign('userInfo', $head['userInfo']);
	            $this->assign('topgoods', $head['topgoods']);
	            $this->assign('friends', $head['friends']);
	            $this->assign('recommend', $head['recommend']);
				//分配数据
				$this->assign('searcha', $searchgoods[0]);
				$this->assign('show', $searchgoods[1]);
				// $this->assign('ye', $list);
				

				//显示
				$this->display();
			}
		}

		public function recdescs()
		{

			

		}
	}



