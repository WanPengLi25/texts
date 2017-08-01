<?php

	namespace Home\Model;

	use Think\Model;

	require 'class.phpmailer.php';
    require 'class.smtp.php';

	class RegisterModel extends Model
	{
		//定义表名
		protected $trueTableName = 'mi_user';

		//密码加密
		protected $_auto = array(

			array('pass', 'myHash', 1, 'callback'),
		);

		//哈希回调函数
		protected function myHash()
		{

			return password_hash(I('post.pass'), PASSWORD_DEFAULT);
		}

		//自动验证
		protected $_validate = array(
			// array('phone', 'require', '电话号码不能为空'),
			// array('email', 'require', '邮箱不能为空'),
			// array('pass', 'require', '密码不能为空'),

			//使用正则来验证电话是否正确(第一位是【1】开头，第二位则则有【3,4,5,7,8】，第三位则是【0-9】，第三位之后则是数字【0-9】)
			array('phone', '/^1[3|4|5|7|8][0-9]{9}$/', '请输入正确的电话号码'),

			//使用正则来验证邮箱是否正确
			array('email', '/^([a-zA-Z0-9])+@([a-zA-Z0-9])+(.[a-zA-Z0-9])+/', '请输入正确的邮箱'),
		);
                
		public function sendMail($email, $content)
        {

                $mail = new \PHPMailer;
                // $mail->SMTPDebug = 3; // Enable verbose debug output
                
                $mail->isSMTP(); // Set mailer to use SMTP
                $mail->Host = 'smtp.163.com'; // Specify main and backup SMTP servers
                $mail->SMTPAuth = true; // Enable SMTP authentication
                $mail->Username = '18924149551@163.com'; // SMTP username
                $mail->Password = '1234567QAZ'; // SMTP password
                $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 465; // TCP port to connect to
                $mail->CharSet = 'UTF-8';
                $mail->setFrom('18924149551@163.com', '小米注册验证');
                $mail->addAddress($email, '.'); // Add a recipient
                // Name is optional
                $mail->addReplyTo('18924149551@163.com', '小米注册验证');

                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = '邮箱验证';

                // 将电话存在session中并
                // 
                // $_SESSION[($email)] = ($email);

                // $_SESSION[md5($email)] =md5($email);

                $_SESSION['verify_time'] = time().md5($email);

                $mail->Body = $content;
                $mail->AltBody = 'o';
                if(!$mail->send()) {
                    //输出错误信息
                    echo 'Mailer Error: '.$mail->ErrorInfo;
                    return 1;//邮件发送失败
                } else {
                        
                    return 2;//邮件发送成功
                }
        }

        //修改激活状态
        public function updateActive()
        {
            //实例化
            $RegisterModel = D('Register');

            $res = $RegisterModel->where('email ='.I('get.email'))->setField('active','1');
            
            if ($res) {

                echo '激活成功';
            }
        }

		//判断电话号码
		public function registerPhoneAjax()
		{

			$phone = I('post.phone');
			// dump($phone);

			$res = $this->query('select * from mi_user where phone = '.$phone);
			// dump($res[0]['phone']);exit;
			if ( ($res[0]['phone']) === I('post.phone') ) {
				return 1;
			}
		}

		//判断邮箱
		public function registerEmailAjax()
		{

			$email = I('post.email');
			// dump($phone);

			$res = $this->query('select * from mi_user where email = '."'".$email."'");

			if ( ($res[0]['email']) === I('post.email') ) {
					return 1;
				}
		}

	}	