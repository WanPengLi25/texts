<?php

	namespace Sun\Model;

	use Think\Model;

	class AdminModel extends Model
	{

		/**
		 * [$trueTableName 定义表名]
		 * @author ChenXu  2411233465@qq.com
		 * @var think_user
		 */
		protected $trueTableName = 'think_user';

		/**
		 * [$tablePrefix 定义表前缀]
		 * @author ChenXu  2411233465@qq.com
		 * @var think_
		 */
		protected $tablePrefix = 'think_';

		/**
		 * [$_auto 自动完成]
		 * @author ChenXu  2411233465@qq.com
		 * @var array
		 */
		protected $_auto  = array(
			//会自动调用myHash()方法，然后将myHash的返回的结果插入到数据库
			array('pass', 'myHash', 1, 'callback'),	
		);

		/**
		 * [myHash 哈希加密密码函数]
		 * @author ChenXu  2411233465@qq.com
		 * @return [function] [哈希加密密码函数]
		 */
		protected function myHash()
		{

			return password_hash(I('post.pass'), PASSWORD_DEFAULT);
		}

		/**
		 * [$_validate 自动验证]
		 * @author ChenXu  2411233465@qq.com
		 * @var array
		 */
		protected $_validate = array(

			//如果定义了字段映射的话，第一个是参数是数据表的字段名
			array('name', 'require', '姓名不能为空'),
			array('pass', 'require', '密码不能为空'),
			array('phone', 'require', '电话号码不能为空'),
			array('email', 'require', '邮箱不能为空'),
			
			//使用正则来验证用户名是否正确,5-10个字符，可使用字母、数字、下划线，需以字母开头
			array('name', '/[a-zA-Z]\w{3,13}\S/', '用户名不能包含特殊字符'),

			//使用正则来验证电话是否正确
			array('phone', '/^\d{1,12}$/', '请输入正确的电话号码'),
		);

		/**
		 * [showAdminList 获取管理员列表]
		 * @author ChenXu  2411233465@qq.com
		 * @return [array] [返回管理员数据数组]
		 */
		public function showAdminList()
		{

			$admin = new \Sun\Model\AdminModel();

			$adminlist = $admin->query('select * from think_user');

			return $adminlist; 		
		}

		/**
		 * [delAdmin 删除管理员]
		 * @author  ChenXu 2411233465@qq.com
		 * @return [boolean] [true/false]
		 */
		public function delAdmin()
		{
			$res = $this->where('id='.I('get.id'))->delete();

			return $res;
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

			$res['stat'] = $this->where('id='.I('get.id'))->save($data);

			return $res;
		}
   
	}