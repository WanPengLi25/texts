<?php
	
	namespace Home\Model;

	use Think\Model;

	class LoginModel extends Model
	{
		/**
		 * [$trueTableName 定义表名]
		 * @var mi_user
		 */
		protected $trueTableName = 'mi_user';

		public function loginCheck($info)
		{
			// dump($info);exit;
			$pass = I('post.pass');
			$condition['phone'] = $info;
			$condition['email'] = $info;
			$condition['_logic'] = 'OR';
			$res = $this->where($condition)->find();
			if($res) {

				$select = $this->query('select * from mi_user where phone = '."'".$info."'".' or email = '."'".$info."'");
				
				if (password_verify($pass,$select[0]['pass'])) { 
					session('userInfo', $select[0]);
					return true;

				} else {

					return false;
				} 

			} 

		}

	}