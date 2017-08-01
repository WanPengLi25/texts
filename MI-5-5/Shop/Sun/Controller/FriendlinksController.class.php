<?php  


	namespace Sun\Controller;

	use Think\Controller;

	class FriendlinksController extends CommonController
	{
		//定义一个表名
		protected $tableName = "friendlinks"; 

		
		public function addFriendlinks()
		{
			if (IS_POST) {

				$this->display('showLink');
			} else {
				$data = (I('get.'));
				// dump($data);
				// exit;
				
				//实例化
				$linkModel = D('Friendlinks');

				//创建数据
				$res = $linkModel->create($data);
				// dump($res);exit;
				// 判断创建数据是否成功
				if (!$res) {
					// echo 1;
					$this->error( $linkModel->getError() );
					exit;
				}
				// 添加数据
				$linkModel->add();
				// echo $linkModel->getLastSql();exit;
				// 成功返回
				$this->success('成功', U('showLink'), 5);

				
			}	



			
			// //视图显示
			// $this->display();
		}
		//定义一个查看的方法
		public function showLink()
		{	
			// 实例化一个对象
			$linkshow = D('friendlinks');
			// 调用模型的方法
			$showlinkres = $linkshow->showLink();


			
			// 分配数据到视图
			$this->assign('showa', $showlinkres);
			// 显示数据到视图
			$this->display();
		}
		// 定义一个删除的方法
		public function delelink()
		{
			if( IS_AJAX ) {

				$id = I('get.id');
				// 实例化一个对象
				$delelink = D('Friendlinks');
				// 调用一个模型的方法
				
				$delelinky = $delelink->deletelink();
				
				$this->ajaxReturn($delelinky);

							
			} else {
				exit('请使用ajax请求');
			 
			}

		}


		/**
		 * updateAuth 更新友情链接
		 * @author  ChenGuiCai <294142682@qq.com>
		 * @return  array (错误号，提示信息) 
		 */	
		public function updatalink()
		{
			$updatalinky = D('friendlinks');

			$updatalink = $updatalinky->updataLink();

			// dump($updatalink);exit;
			

			$this->ajaxReturn($updatalink);
			// echo json_encode(I('post.'));
			
			
		}
	}