<?php

	namespace Sun\Controller;

	/**
	 * AuthGroupController 管理员组相关操作
	 * @author  ChenGuiCai <1149951080@qq.com>
	 */
	class AuthGroupController extends CommonController
	{

		/**
		 * addAuthGroup 添加管理员组
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  没有返回值
		 */			
		public function addAuthGroup ()
		{
			$authGroup = D('AuthGroup');
			
			if(IS_POST) {
				//创建数据模型，执行自动验证
				if(!$authGroup->create()) {
					$this->error('添加失败：'.$authGroup->getError(), U('AuthGroup/addAuthGroup'), 1);
				} else {
					//执行添加
					$res = $authGroup->addAuthGroup();
					//判断结果
					if($res) {
						$this->success( '添加成功', U('AuthGroup/addAuthGroup', 2) );
					} else {
						$this->error( '添加失败', U('AuthGroup/addAuthGroup', 2));
					}
				}

			} else {
				//查询所有规则
				$res = $authGroup->findAddInfo();
				//判断是否满足条件添加一个组
				if( $res == 0 ) {
					$this->error('条件不足，没有规则', U('AuthGroup/showAuthGroup'));
				} 
				//赋值规则数据
				$this->assign('info',$res);
				//输出模板
				$this->display();
			}

		}

		/**
		 * showAuthGroup 显示管理员组列表
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  没有返回值
		 */	
		public function showAuthGroup ()
		{

			//实例化对象
			$authGroup = D('AuthGroup');
			//获取相关数据
			$res = $authGroup->findShowInfo();

			// 赋值查询状态
			$this->assign('status', I('get.status')?I('get.status'):0);
			// 赋值查询内容
			$this->assign('info', I('get.info')?I('get.info'):'');
			// 赋值数据集
			$this->assign('list', $res);

			// dump($res);
			//输出模板
			$this->display();


		}


		/**
		 * findCrew 查找组员和其他没有分组的管理员
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  没有返回值
		 */
		public function findCrew ()
		{

			$res = D('AuthGroup')->findCrew(I('get.id'));

			echo json_encode($res);

		}

		/**
		 * updateCrew 更新组员
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  bool 返回成功或失败 
		 */
		public function updateCrew () 
		{

			$res = D('AuthGroup')->updateCrew();
			echo json_encode($res);

		}

		/**
		 * findAuth 查找组权限和其他权限
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  bool 返回成功或失败 
		 */
		public function findAuth ()
		{

			$res = D('AuthGroup')->findAuth(I('get.id'));
			echo json_encode($res);

		}


		/**
		 * updateAuth 更新权限
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  bool 返回成功或失败 
		 */
		public function updateAuth () 
		{

			$res = D('AuthGroup')->updateAuth();
			echo json_encode($res);
			// echo json_encode(I('post.'));

		}

		/**
		 * changeStat 更改组状态
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  string json格式的更改结果 
		 */
		public function changeStat ()
		{
			$AuthGroup = D('AuthGroup');
			$res = $AuthGroup->changeStat();
			echo json_encode($res);
			// echo json_encode(I('get.'));

		}

		/**
		 * delAuthGroup 删除组
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  string json格式的更改结果 
		 */
		public function delAuthGroup ()
		{

			$AuthGroup = D('AuthGroup');
			$res = $AuthGroup->delAuth( I('get.id') );
			echo json_encode($res);

		}

		/**
		 * updateGroup 修改组名，状态
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  string json格式的更改结果 
		 */
		public function updateGroup () 
		{

			//实例化对象
			$authGroup = D('AuthGroup');

			if(!$authGroup->create($_POST, 2)) {
				//获取错误信息
				$info =  array(0, '修改失败：'.$authGroup->getError());
				//返回结果
				echo json_encode($info);
			} else {
				//执行修改
				$res = $authGroup->updateGroup();
				//返回结果
				echo json_encode($res);
			}

		}

	}	