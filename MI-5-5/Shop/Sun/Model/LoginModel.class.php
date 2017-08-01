<?php

	namespace Sun\Model;

	use Think\Model;

	/**
	 *  LoginModel 登录类 处理登录相关
	 *  @author  ChenGuiCai <1149951080@qq.com>
	 */
	class LoginModel extends Model
	{

		protected $trueTableName = 'think_user';

		/**
		 * loginCheck 验证登录信息
		 * @return bool 信息正确与否
		 */
		public function loginCheck () 
		{

			$res = $this->where(array('name'=>I('post.adminname')))->select();

			//检查管理员是否在线
			if( $res[0]['status'] == 1 ) return 1;
			//检查管理员是否被禁用
			if( $res[0]['status'] == 3 ) return 3;
			//检查密码是否正确
			if( password_verify( I('post.password'), $res[0]['pass'] ) ) {
				$this->where( 'id='.$res[0]['id'] )->save( array('status' => 1) );
				return $res;
			} else {
				return 0;
			}

		}

		/**
		 * loginOut 处理退出登录
		 * @return 没有返回值
		 */
		public function loginOut ()
		{

			$this->where( 'id='.session('userInfo')['id'] )->save( array('status'=>2) );
			session('userInfo', null);

		}

	}