<?php
	namespace Home\Controller;

	use Think\Controller;

	/**
	 * CommonController 公共类 用于检查用户登录
	 * @author ChenXu <2411233465@qq.com>
	 */
	class CommonController extends Controller
	{
		/**
		 * [__construct 构造方法,自动执行]
		 * @author ChenXu <2411233465@qq.com>
		 * @return  没有返回值
		 */
		public function __construct()
		{
			
			parent::__construct();
			// 允许不用登陆的控制器
			$access = array('Index','GoodsList','Detail','Search');
			//检查当前控制器是否允许不用登陆
			if( in_array(CONTROLLER_NAME, $access) === false ) {

				$this->checkUser();   //登录检查
			}

		}

		public function showHead ()
		{

			//用户信息
            if( session('?userInfo') ) {
                $userInfo = session('userInfo');
            } else {
                $userInfo = 0;
            }

            //购物车信息
            $shopcar = findShopCar();
            // dump($shopcar);

            //上导航商品部分
            $Home = D('Home');
            $topgoods = $Home->topGoods();

            //推荐
            $recommend = $Home->topGoodsfind('sale desc', 'recommend=1', 10, 'id,name,goodsinfo');
            //友情链接
            $friend = D('Friendlinks');
            $friends = $friend->friendlinks();

            return array(
            	'userInfo'=>$userInfo, 
            	'shopcar'=>$shopcar, 
            	'topgoods'=>$topgoods,
            	'recommend'=>$recommend,
            	'friends'=>$friends
            );

		}

		/**
	     * checkUser 检查用户是否已登录1
	     * @author  ChenXu <2411233465@qq.com>
	     * @return  没有返回值
	    */
		private function checkUser()
		{

			if(!session('?userInfo')){
				//未登录，调用登录模板
				 $this->redirect('Login/login');
			}
		}

		/**
	     * _empty 提示无效操作
	     * @author  ChenXu <2411233465@qq.com>
	     * @return  没有返回值
	    */
		public function _empty($name)
		{

			$this->error('无效的操作：'.$name);
	    } 

	    
	}