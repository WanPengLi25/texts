<?php

	namespace Sun\Controller;

	class AuthController extends CommonController
	{

		//添加权限
		public function addAuth () 
		{
			if(IS_POST) {
				$Auth = D('Auth');
				//自动验证
				if(!$Auth->create($_POST, 1)) {
					//输出错误信息
					$this->error('添加失败：'.$Auth->getError(), U('Auth/addAuth'), 2);
				} else {
					$res = $Auth->addAuth();
					if($res) {
						$this->success( '添加成功', U('Auth/addAuth', 2) );
					} else {
						$this->error( '添加失败', U('Auth/addAuth', 2));
					}
				}
			} else {
				//显示视图
				$this->display('Auth/addAuth');
			}
			
		}

		//显示权限列表
		public function showAuth () 
		{ 

			//实例化Auth对象
			$Auth = D('Auth');
			//执行分页
			$res = $Auth->showAuth();
			// 赋值查询状态
			$this->assign('status', I('get.status')?I('get.status'):0);
			// 赋值查询内容
			$this->assign('info', I('get.info')?I('get.info'):'');
			// 赋值数据集
			$this->assign('list',!empty($res[1]) ? $res[1] : 0 );
			// 赋值分页输出
			$this->assign('page',$res[0]);
			// 输出模板
			$this->display(); 

		}

		//编辑权限
		public function updataAuth () 
		{
			$Auth = D('Auth');

			if(IS_POST) {
				//实例化数据对象并自动验证
				if(!$Auth->create($_POST, 2)) {
					//输出错误信息
					$this->error('修改失败：'.$Auth->getError(), U('Auth/updataAuth', 'id='.I('get.id')), 2);
				} else {
					//执行跟新
					$res = $Auth->updataAuth();
					//判断结果
					if( $res == -1 ) {
						$this->success('没有任何修改!', U('Auth/showAuth'), 1);
					} else {
						if($res) {
							$this->success('修改成功!', U('Auth/showAuth'), 1);
						} else {
							$this->error('修改失败，已有此规则！', U('Auth/showAuth'), 1);
						}
					}
				}
			} else {
				//根据id查询数据并输出到视图
				$list = $Auth->findOne( I('get.id') );
				$this->assign('list', $list);
				$this->display();
			}

		}

		//删除
		public function delAuth () 
		{

			$Auth = D('Auth');
			$res = $Auth->delAuth( I('get.id') );
			echo $res;

		}

		/**
		 * changeStat 更改权限状态
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  string json格式的更改结果 
		 */
		public function changeStat ()
		{
			$Auth = D('Auth');
			$res = $Auth->changeStat();
			echo json_encode($res);

		}

	}