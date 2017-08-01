<?php

	namespace Sun\Controller;

	use Think\Controller;

	class AdminController extends CommonController
	{

		/**
		 * [adminList 管理员列表]
		 * @author ChenXu 2411233465@qq.com
		 */
		public function adminList()
		{

			//实例化Admin对象
			$adminModel = D('Admin');

			$data = $adminModel->showAdminList();
			// dump($data);

			if (IS_POST) {

				//搜索序号id
				$id = I('post.id');

				// dump($id);
				if (!empty($id)) {

					$search['id'] = array('EQ', "{$id}");
				}

				//将两个搜索条件的关系变成or
				$search['_logic'] = 'or';

    			$map['_complex'] = $search;

    			//搜索用户名name
				$name = I('post.keyword');
				// dump($name);

				if ( !empty($name) ) {

					$search['name'] = array('like', "{$name}");
				}
				
				//echo sql语句之前实例化和连贯操作要分开来写
				// echo  $listAll->getLastSql();
								
			} 

			//查询满足要求的总记录数
			$total = count($data);
			// dump($total);

			//实例化分页类 传入总记录数和每页显示的记录数(5)
			$Page = new \Think\Page($total, 5);
			// echo $Page;
			// exit;
			
			//生成前端分页按钮
			$show = $Page->show();

			$adminlist = $adminModel
					->order('id desc')
					->where($search)
					->limit($Page->firstRow.','.$Page->listRows)
					->select();

			$this->assign('adminlist', $adminlist);

			$this->assign('show', $show);

			$this->display();
		}

		/**
		 * [changeStat 更改状态]
		 * @author ChenXu 2411233465@qq.com
		 */
		public function changeStat()
		{
			$Admin = D('Admin');
			$res = $Admin->changeStat();
			echo json_encode($res);
		}
		
		/**
		 * [ajaxDeleteAdmin 删除管理员]
		 * @author ChenXu 2411233465@qq.com
		 */
		public function ajaxDeleteAdmin()
		{

			if (IS_AJAX)
			{

				$id = I('get.id');

				$adminModel = D('Admin');

				$admindata = $adminModel->delAdmin();
			
				$this->ajaxReturn($admindata);

			} else {

				exit('请使用ajax来请求这个方法');
			}
		} 
		
		/**
		 * [addAdmin 添加管理员]
		 * @author ChenXu 2411233465@qq.com
		 */
		public function addAdmin()
		{
			if (IS_POST) {

				$data = (I('post.'));
				// dump($data);
				// exit;	
				//实例化
				$adminModel = D('Admin');

				$res = $adminModel->create();

				if (!$res) {

					$this->error( $adminModel->getError() );
					exit;
				}

				$adminModel->add();

				$this->success('成功', U('Admin/adminList'), 3);

			} else {

				$this->display();
			}	
		}

	}
