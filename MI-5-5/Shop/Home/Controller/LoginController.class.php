<?php
	
	namespace Home\Controller;

	use Think\Controller;

	/**
	 *  LoginController 登录类 处理登录相关
	 *  @author  ChenXu <2411233465@qq.com>
	 */
	class LoginController extends Controller
	{
		
		/**
		 * [login 检查登录]
		 * @author  ChenXu <2411233465@qq.com>
		 * @return 没有返回值
		 */
		public function login()
		{
			//开启session
			// session('[start]');

			if(IS_POST){

				//用strpos查找输入的账号是否有@,返回true就是邮箱
				$tmp = strpos(I('post.telemail'),'@');

				if ($tmp === false) {

					//trim格式化用户输入的数据,账号左右不能有特殊字符
					$val = trim(I('post.telemail'));
					session('phone',$val);
				} else {

					//trim格式化用户输入的数据,账号左右不能有特殊字符
					$val = trim(I('post.telemail'));
					session('email',$val);
				}


				//实例化并调用logincheck方法
				$res = D('Login')->loginCheck($val);
				
				if ($res) {

					$this->redirect('Personal/personal');
				
				} else {

					$this->error('用户名或密码错误');
					
				} 


			} else {
				//不是post提交
				$this->display('Login/login');
			}
		}

		/**
	     * [logout 退出登录]
	     * @author ChenXu <2411233465@qq.com>
	     * @return [type] [description]
	     */
	    public function loginOut()
	    {

	    	//销毁session
	    	session(null);
	    	$this->redirect('Index/index');
	    }
	}