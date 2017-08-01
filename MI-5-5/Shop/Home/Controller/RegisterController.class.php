<?php
	
	namespace Home\Controller;

	use Think\Controller;

	/**
	 *  RegisterController 注册类 处理注册相关
	 *  @author  ChenXu <2411233465@qq.com>
	 */
	class RegisterController extends Controller
	{
		
		/**
		 * [register 显示和检查登录]
		 * @author  ChenXu <2411233465@qq.com>
		 * @return 没有返回值
		 */
		public function register()
		{
			if (IS_POST) {

				// dump(I('post.'));
				// exit;
				//检查验证码
				if( false === $this->checkVerify( I('post.code') ) ){
					$this->error('验证码错误', U('Register/register'), 2); //指定跳转地址，防止验证码不刷新

				}
				$email = i('post.email');
				$phone = I('post.phone');

				$registerModel = D('Register');

				$registerModel->sendMail($email, '<a href="http://192.168.42.126/MI/MI-4-20/index.php/Home/Register/updateActive/phone/'.$phone.'">请点击此链接来激活您的小米账号</a>');

				if (!$registerModel->create()) {

					$this->error( $registerModel->getError() );
					exit;
				
				} else {

				//生成唯一的字符串
					$name = uniqid(mt_rand(1,99));				
					
				//将int转换成字符串
					$data['name'] = ((string)($name));

					$data['phone'] = (I('post.phone'));
					$data['email'] = (I('post.email'));
					$data['pass']  = (password_hash(I('post.pass'), PASSWORD_DEFAULT));
					$data['area'] = (I('post.area'));
					$data['token'] = '123456qaz';
					$data['pic'] = './Uploads/2017-04-10/default.png';

					//保存session
					session('email', I('post.email'));
					session('phone',(I('post.phone')));
					session('pass', (password_hash($pass, PASSWORD_DEFAULT)));

					$registerModel->data($data)->add();

					$this->success('注册成功', U('Login/login'), 3);

				} 
				
			}

			$this->display();
		}

		/**
		 * getVerity 生成验证码
		 * @author  ChenXu <2411233465@qq.com>
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
		 * @author  ChenXu <2411233465@qq.com>
		 * @param string $code 验证码
		 * @return bool 校验结果
		 */
	    public function checkVerify ($code) 
	    {

	    	$Verify = new \Think\Verify();
        	return $Verify->check($code, $id);
	    }

	    //修改激活状态
	    public function updateActive()
	    {

			if (IS_GET) {

				$phone = I('get.phone');
				$RegisterModel = D('Register');
				$res = $RegisterModel->where('phone ='.$phone)->setField('active','1');
				// dump($res);
				// exit;
				if (!$res) {

					$this->error('激活失败');
					exit;

				} else {					

					$this->success('激活成功', U('Login/login'), 3);
				}

				
			} 	
		}

	    //判断电话
	    public function registerPhoneAjax()
	    {
	    	if(IS_POST){

	    		//调用registrUser
                $res = D('Register')->registerPhoneAjax();
                // dump($res);exit;
                //判断电话号码是否被注册
                if ( $res === 1 ){

                	$this->ajaxReturn(1);

                } else {

                	$this->ajaxReturn(0);
                }
			}

	    	$this->display();	
	    }

	    //判断邮箱
	    public function registerEmailAjax()
	    {
	    	if(IS_POST){

	    		//调用registrUser
                $res = D('Register')->registerEmailAjax();
                // dump($res);exit;
                //判断电话号码是否被注册
                if ( $res === 1 ){

                	$this->ajaxReturn(1);

                } else {

                	$this->ajaxReturn(0);
                }
			}

	    	$this->display();	
	    }
	}