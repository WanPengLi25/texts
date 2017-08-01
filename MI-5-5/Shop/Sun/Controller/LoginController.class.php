<?php

	namespace Sun\Controller;

	use Think\Controller;

	/**
	 *  LoginController 登录类 处理登录相关
	 *  @author  ChenGuiCai <1149951080@qq.com>
	 */
	class LoginController extends Controller
	{

		/**
		 * login 显示和检查登录
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return 没有返回值
		 */
		public function login () 
		{

			if( IS_POST ) {
				// dump( I('post.') );
				//检查验证码
				if( false === $this->checkVerify( I('post.code') ) ){
					$this->error('验证码错误', U('Login/login'), 2); //指定跳转地址，防止验证码不刷新
				} else {
					//实例化对象，验证用户名，密码
					$res = D('Login')->loginCheck();
					if($res == 1) $this->error('登录失败,用户已在别的地方登录', U('Login/login'), 2);
					if($res == 3) $this->error('登录失败,用户已被禁用', U('Login/login'), 2);
					if( $res ) {
						session('userInfo', $res[0]);
						$this->redirect('Index/index');
					} else {
						$this->error('登录失败,密码错误', U('Login/login'), 2);
					}
					dump($res);
				}

			} else {
				//显示登陆页面
				$this->display();
			}

		}

		/**
		 * getVerity 生成验证码
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return 没有返回值
		 */
	    public function getVerify() 
	    {

	    	// 清空输出缓冲区
	    	ob_clean();
	    	//验证码配置
	    	$config =    array(    
	    		'fontSize'    =>    35,    // 验证码字体大小    
	    		'length'      =>    4,     // 验证码位数    
	    	);
	        $Verify = new \Think\Verify($config);
			$Verify->entry();

	    }
	    
	    /**
		 * checkVerity 检查验证码
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @param string $code 验证码
		 * @return bool 校验结果
		 */
	    public function checkVerify ($code) 
	    {

	    	$Verify = new \Think\Verify();
        	return $Verify->check($code, $id);

	    }


	    /**
		 * loginOut 退出登录
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return 	没有返回值
		 */
		public function loginOut ()
		{
			if(IS_AJAX) {
				D('Login')->loginOut();
			} else {
				D('Login')->loginOut();
				$this->redirect('Login/login');
			}
			

		}

	}