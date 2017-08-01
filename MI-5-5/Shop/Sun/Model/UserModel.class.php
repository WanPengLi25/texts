<?php

	namespace Sun\Model;

	use Think\Model;

	class UserModel extends Model
	{

		//使用自动完成
		protected $_auto  = array(
			//自动调用myHash()方法，然后将myHash的返回的结果插入到数据库
			array('pass', 'myHash', 3, 'callback'),	
		);

		//自动验证
		protected $_validate = array(

			//如果定义了字段映射的话，第一个是数据表的字段名			
			array('pass', 'require', '密码不能为空'),
		);

		/**
		 * [myHash 哈希加密密码]
		 * @author ChenXu 2411233465@qq.com
		 * @return [pass] [加密密码]
		 */
		protected function myHash()
		{

			return password_hash(I('post.pass'), PASSWORD_DEFAULT);
		}

		/**
		 * [showUserList 获取会员列表]
		 * @author ChenXu 2411233465@qq.com
		 * @return array [返回会员数据数组]
		 */
		public function showUserList()
		{

			$Model = M('user');

			$userlist = $Model
				// ->query("select * from mi_user, mi_user_signin_area where mi_user.aid = mi_user_signin_area.id");
				// ->join('LEFT JOIN mi_user_signin_area ON mi_user.aid = mi_user_signin_area.id')
				->select();
			return $userlist;
		}

		/**
		 * [queryUserInfo 根据id查询用户信息]
		 * @author ChenXu 241233465@qq.com
		 * @return [array] [返回用户信息数组]
		 */
		public function queryUserInfo()
		{
			$uid = I('get.uid');

			$Model = M('user');

			$userlist = $Model->query("select uid, name, pass from mi_user where uid ="."$uid");

			return $userlist; 
		}

		/**
		 * [editUserPassword 修改用户密码]
		 * @author ChenXu 241233465@qq.com
		 * @return [boolean] 
		 */
		public function editUserPassword()
		{
			//实例化
			$UserModel = D('User');

			//接收post传过来的pass
			$data['pass'] = I('post.pass');

			//先把传过来的pass保存起来并且调用create
			$data['pass'] = $UserModel->create(); 

			//更改用户的pass并用hash加密		
			// $UserModel->where('uid ='.I('get.uid'))->setField('pass', I('post.pass'));
			// $UserModel->where('uid ='.I('get.uid'))->data($data)->save();
			$UserModel->where('uid ='.I('get.uid'))->save($data['pass']);
			// echo $Model->getLastSql();
			// exit;
		}

		/**
		 * [changeStat 更改状态]
		 * @author ChenXu 2411233465@qq.com
		 * @return [status] [0 or 1]
		 */
		public function changeStat () 
		{

			if(I('status') == 4) {
				$data['status'] = 3;
				$res['res'] = 3;
				$res['info'] = '<font class="text-danger">禁用</font>';
			} else{
				$data['status'] = 4;
				$res['res'] = 4;
				$res['info'] = '<font class="text-success">启用</font>';
			}

			$res['stat'] = $this->where('uid='.I('get.uid'))->save($data);

			return $res;
		}

	}