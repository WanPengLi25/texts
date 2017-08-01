<?php
	
	namespace Sun\Controller;

	use  Think\Controller;

	class UserController extends CommonController
	{

		/**
		 * [userList 用户列表]
		 * @author ChenXu 2411233465@qq.com
 		 */
		public function userList()
		{

			// 实例化User对象
			$userModel = D('User');

			$data = $userModel->showUserList();
			// dump($data);
			
			if (IS_POST) {

				//搜索序号uid
				$uid = I('post.uid');

				// dump($uid);
				if (!empty($uid)) {

					$search['uid'] = array('EQ', "{$uid}");
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

				//搜索时单独的搜索实例化
				// $listAll = M('user');
				// $listAll->where($search)->select();
				
				//echo sql语句之前实例化和连贯操作要分开来写
				// echo  $listAll->getLastSql();
								
			} 

			//查询满足要求的总记录数
			$total = count($data);
			// dump($total);

			//实例化分页类 传入总记录数和每页显示的记录数(5)
			$Page = new \Think\Page($total, 4);
			// echo $Page;
			// exit;
			
			//生成前端分页按钮
			$show = $Page->show();

			$userlist = $userModel
					->order('uid desc')
					->where($search)
					->limit($Page->firstRow.','.$Page->listRows)
					// ->join('LEFT JOIN mi_user_signin_area ON mi_user.aid = mi_user_signin_area.id')
					->select();
			// dump($userlist);

			$this->assign('list', $userlist);
			$this->assign('show', $show);

			$this->display();
		}

		/**
		 * [changeStat 更改状态]
		 * @author ChenXu 2411233465@qq.com
		 */
		public function changeStat()
		{

			$User = D('User');
			$res = $User->changeStat();
			echo json_encode($res);
		}

		/**
		 * [ajaxDeleteUser ajax删除用户]
		 * @author ChenXu 2411233465@qq.com
		 */
		public function ajaxDeleteUser()
		{

			if (IS_AJAX) 
			{
				$uid = I('get.id');
				// $id = I('get.id');

				//$res = 1 || 0
				$res = M('user')->delete($uid);
				// $ressecond = M('user_signin_area')->delete($id);

				
				$this->ajaxReturn($res);// 等同于echo json_encode($res);exit;

				// echo json_encode($ressecond);
				// exit;
				
			} else {
				exit('请使用ajax来请求这个方法');
			}
		}

		/**
		 * [edit 获取用户信息]
		 * @author ChenXu 2411233465@qq.com
		 */
		public function edit()
		{	
			//获取到模板发过来的uid
			// $uid = I('get.uid');
			// dump($uid);

			$userinfo = D('user')->queryUserInfo();

			// dump($userinfo);

			$this->assign('userinfo', $userinfo);

			$this->display();
		}

		/**
		 * [editUserPassword 提交表单重置用户密码]
		 * @author ChenXu 2411233465@qq.com
		 */
		public function editUserPassword()
		{

			if (IS_POST) {

				$UserModel = D('User');
				$res = $UserModel->create();
				// dump($res);
				// exit;
				if (!$res) {

					$this->error( $UserModel->getError() );
					exit;

				} else {

					$UserModel->editUserPassword();

					$this->success('修改成功', U('User/userList'), 3);
				}

				
			} 	
		}
		
	}

