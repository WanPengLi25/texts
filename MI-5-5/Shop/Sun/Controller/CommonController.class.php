<?php
	
	namespace Sun\Controller;

	use Think\Controller;

	use Think\Auth;

	/**
	 * CommonController 公共类 用于检查用户是否登录
	 * @author  ChenGuiCai <1149951080@qq.com>
	 */
	class CommonController extends Controller
	{
		/**
		 * __contruct 构造方法 自动执行
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  没有返回值
		 */
	    public function __construct() {

	        parent::__construct(); //先执行父类构造方法
			$this->checkUser();    //登录检查

			//已经登录，为模板分配用户名变量
			$this->assign('admin_name',session('userInfo.name'));

			//权限检查
			// $auth = new Auth();
	  //       if(!$auth->check(MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME, session('userInfo.id')))
	  //       {
		 //        $this->error('没有权限');
	  //       }

			//检测浏览器是不是Firefox
			if( strstr($_SERVER['HTTP_USER_AGENT'], 'Firefox') ) {
	    		$stat = 1;
	    		$stat1 = 0;
	    	} else if( strstr($_SERVER['HTTP_USER_AGENT'], 'Chrome') ) {
	    		$stat1 = 1;
	    		$stat = 0;
	    	} else {
	    		$stat1 = 0;
	    		$stat = 0;
	    	}

	    	// dump($stat);
	    	// dump($stat1);

	    	//分配浏览器类型变量
	    	$this->assign('stat', $stat);
	    	$this->assign('stat1', $stat1);
	    	$this->assign('flag', 1);
	    }

	    /**
	     * checkUser 检查用户是否已登录
	     * @author  ChenGuiCai <1149951080@qq.com>
	     * @return  没有返回值
	     */
		private function checkUser(){
			// echo 1;
			if(!session('?userInfo')){
				//未登录，请先登录
				// echo 1;
				$this->redirect('Login/login');
			}
		}

		/**
	     * _empty 提示无效操作
	     * @author  ChenGuiCai <1149951080@qq.com>
	     * @return  没有返回值
	     */
		public function _empty($name){
			$this->error('无效的操作：'.$name);
	    }
	}