<?php

	namespace Home\Controller;

	use Think\Controller;

	class PersonalController extends CommonController
	{
		/**
		 * [userSession 根据登录的电话或者email查出用户所有数据并保存在session中]
		 * @author ChenXu <2411233465@qq.com>
		 * @return [array] [保存并返回session数据]
		 */
		public function personal()
		{
			$sessioninfo = D('Personal');

			$head = $this->showHead();

			$res = $sessioninfo->findUserInfo();
			// dump($res);
			// 处理得到的一维数组
			$arr = $res[0];
			// dump($arr);
			//开启session
			session('[start]');

			//把数组存进session
			session('userinfo', $arr);
			// dump(session());
			// dump(session('userinfo')['uid']);
			//导航栏点击传值
			$name = 'userinfo';

			$this->assign('topgoods', $head['topgoods']);
            $this->assign('friends', $head['friends']);
            $this->assign('recommend', $head['recommend']);
            $this->assign('shopcar', $head['shopcar']);
            $this->assign('userInfo', $head['userInfo']);
			$this->assign('where', $name); 

			$this->display();
		}

		/**
		 * [index 根据ajax传过来的data-value查出对应的数据]
		 * @author ChenXu <2411233465@qq.com>
		 * @return [array] [返回对应数据]
		 */
		public function index()
		{
			
			$info = $_SESSION;
			// dump($info);
			//实例化
			if (IS_AJAX) {
				
				switch ( I('get.cateId') ) {

					case 'userinfo':
						$res = D('Personal')->findUserInfo();
					// dump($res);exit;
						// exit;
						//分配变量
						$this->assign('list', $res);
						// dump($res);
						//加载模板
						$content = $this->fetch('Personal/userinfo');
						break;

					case 'order':
						$res = D('Personal')->findUserOrder();
						// echo json_encode($res);
						// dump($res);exit;
						// $this->assign('page', $show);
						//分配变量
						$this->assign('list', $res);
						//加载模板
						$content = $this->fetch('Personal/order');
						break;

					case 'appraise':
						$res = D('Personal')->findOrderInfo();
						
						//分配变量
						$this->assign('list', $res);
						//加载模板
						$content = $this->fetch('Personal/appraise');
						break;

					case 'reviews':
						$res = D('Personal')->findUserReviews();
						//分配变量
						$this->assign('list', $res);
						//加载模板
						$content = $this->fetch('Personal/reviews');
						break;

					case 'commodity':
						// $info = $_SESSION['userinfo']['uid'];
						// dump($info);
						$res = D('Personal')->findUserCommodity();
						// dump($res);
						// echo json_encode($res->getLastSql());
						//分配变量
						$this->assign('list', $res);
						//加载模板
						$content = $this->fetch('Personal/commodity');
						break;

					case 'address':
						$res = D('Personal')->findUserAddress();
						//分配变量
						$this->assign('list', $res);
						//加载模板
						$content = $this->fetch('Personal/address');
						break;

					case 'edituserinfo':
						$res = D('Personal')->findUserEdituserinfo();
						$detail = D('Personal')->findDetail();
						// dump($detail);
						// dump($res);
						$sex = $detail[0]['sex'];
						if ($sex === 0){
							$sex = '女';
						} else {
							$sex = '男';
						}
						//分配变量
						// dump($res[0]['uid']);
						$this->assign('list', $res[0]);
						$this->assign('detail',$detail[0]);
						$this->assign('sex',$sex);
						//加载模板
						$content = $this->fetch('Personal/edituserinfo');
						break; 

				}		

					$this->ajaxReturn($content,'json');
					// return json_encode($content,'json');
					// echo 1;
			} 	
		}

		public function address()
		{
			if(IS_GET){

				$upid = I('get.upid');


				$res = M('area')->where('upid='.$upid)->select();

				echo json_encode($res);


			} else {

				$res = I('post.');

				$upids = explode(',', $res['cateId']);

				array_pop($upids);

				$cateRes = $res['cateRes'];

				echo json_encode($upids);
			}
		}

		public function updateuserinfo()
		{
			if(IS_AJAX){

				$res = I('post.cateName');
				dump($res);
				$data['name'] = I('post.cateName');
				$data['phone'] = I('post.catePhone');
				$data['email'] = I('post.cateEmail');

				if( session('?uid') ){

				$uid = session('userinfo')['uid'];
				$where = 'uid ='.$uid;			

				} 
				dump($uid);
				$User = D('user');

				$info = $User->where($where)->save($data);
				// echo $this->ajaxReturn($User->getLastSql());
				// if ($info) {
					// $this->redirect('Personal/edituserinfo', '修改成功');
				$this->ajaxReturn($info);
				// } else {
				// 	$this->error('修改失败');
				// }
			}
		}

		public function updateuserimg()
		{
			if (IS_POST) {
				$img = I('post.');
				dump($img);
			}
		}
		public function uploadfile()
		{
			if (IS_POST) {
				// $img = I('post.');
				$pic = $_FILES['file'];
				// dump($img);
				dump($pic);
				$gid = I('post.gid');
				$did = I('post.did');
				$evaluate = I('post.evaluate');
				$def = I('post.def');
				$uid = I('post.uid');
				// $pic = '';
				$baseName = $did.$gid;
				$dids = $did.$gid.'pl';
				$picss = [];
				// dump(1);
				dump($picss);
				for( $k = 0; $k < count($pic); $k++ ) {

					$pics['pic']['name'] = $pic['name'][$k];
					$pics['pic']['type'] = $pic['type'][$k];
					$pics['pic']['tmp_name'] = $pic['tmp_name'][$k];
					$pics['pic']['error'] = $pic['error'][$k];
					$pics['pic']['size'] = $pic['size'][$k];
					$saveNameC = $baseName.'-'.$k;
					if ( !empty($_FILES) ) {
						$fileInfo = $this->upload($pics, $dids, $saveNameC);
						// dump($fileInfo);exit;
						if ( $fileInfo['code'] ==404 ) {
                    		return array('上传失败');
           				} else {
           					$picss[] = explode('-',$fileInfo['msg'])[1];

           				}
              		} 
				}
				dump($picss);
				$data['basename'] = $did.'pic';
				$data['gid'] = $gid;
				$data['oid'] = $did;
				$data['uid'] = $uid;
				$data['evaluate'] = $evaluate;
				$data['def'] = $def;
				$data['pic'] = implode(',',$picss);
				// $data['basename'] = $gid;
				$res = M('GoodsEvaluate')->add($data);
				if ( $res ) {
					dump(1);
				} else {
					dump(0);
				}
				
			}
		}
		/**
		 * upload 上传方法 用于上传图片
		 * @param  array $files 上传文件数据
		 * @return array  信息(状态号，信息)
		 */
		protected function upload($files, $gid, $saveNameC )
	    {

	    	// dump($files);
	        $upload = new \Think\Upload();

	        $upload->maxSize = 3145728;

	        // 设置附件上传类型
	        $upload->exts   =   array('jpg', 'gif', 'png', 'jpeg');

	        //设置根目录
	        $upload->rootPath = './Public/imgs/';
	        // 开启子目录
			$upload->autoSub = true;
			$upload->subName = $gid;
	        $upload->saveName = $saveNameC;

	        // 设置附件上传目录

	        $info   =   $upload->upload($files);
	        if (!$info) {
	            return array(
	                'msg' => $upload->getError(),
	                'code' => 404
	            );
	        } else {
	            return array(
	                'msg' => $info['pic']['savename'],
	                'code' => 200
	            );
	        }
	    }

		

		
	}

