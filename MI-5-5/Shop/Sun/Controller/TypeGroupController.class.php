<?php

	namespace Sun\Controller;

	use Think\Controller;

	class TypeGroupController extends CommonController 
	{
		// 添加分类组
		public function addTypeGroup()
		{
			if ( IS_POST ) {
				// 获取传过来的值
				$type = (I('post.type'));
				// 将数组转为字符串用逗号拼接
				$c =implode(',',$type);
				// 判断传过来的数据不为空
				if ( !empty( $c )) {
					// 查询分类表前准备
					$map['id']  = array('in',$c);
					// 查询分类表sql语句
					$typename = M('Type')->where($map)->field('typename')->select();
					// 获取查询出来数据的个数
					$num = count($typename);
					// 定义str为空
					$str = '';
					// 循环出查询的数据
					if( I('post.vs') == 1 ) {
						$vs = '/';
					} else {
						$vs = ' ';
					}
					for ( $i = 0; $i < $num; $i++) {
						// 将数据拼接成字符串，以/隔开
						$str .= $typename[$i]['typename'].$vs;
					}
					// 去掉拼接后字符串后面的/
					$res = substr($str, 0, -1);
					if( !empty(I('post.typename')) ) {
						$res = I('post.typename');
					}
					// 插入分类组表前准备
					$data['tids'] = $c;
					$data['vs'] = I('post.vs');
					$data['groupname'] = $res;
					// 插入分类组表的SQL语句
					M('TypeGroup')->add($data);
					// 添加成功跳转到分类组表
					$this->success('添加成功',U('TypeGroup/selectTypeGroup'));
					exit;
				} else {
					// 添加失败，跳回去原网页
					$this->error('添加失败');
					exit;
				}
			} else if ( IS_GET ){
				// 分类组添加查询分类表
				$TypeGroup = M('Type')->where('status = 1')->select();
				// 分配变量与跳转
				$this->assign('title',' 分类组管理 &gt; 添加分类组');
				$this->assign('TypeGroup',$TypeGroup);
				$this->display();
			} 
		}
		// 添加分类组的AJAX
		public function ajaxAddTypeGroup()
		{
			// 判断是不是ajax访问
			if ( IS_AJAX ) {
				// 接收传过的数据
				$id = I('get.id').'-1';
				// 判断最多只能添加3个
				if ( count(explode(',',$id)) < 4) {
					// 查询分类表前准备
					$map['id'] = array('not in',$id);
					// 判断只查询启用的分类
					$map['status'] = array('eq',1);
					// 查询分类表的sql语句
					$ajaxType = M('Type')->where($map)->select();
					// 返回结果
					echo json_encode($ajaxType);	
				} else {
					// 如果超过三个返回false
					return false;
				}

			} else {
				exit('请使用ajax来请求');
			}
		}
		// 查看分类组
		public function selectTypeGroup()
		{
			if ( IS_GET ) {
				
				// dump(I('get.'));
				if ( !empty( I ('get.id') || I('get.typegroup') ) ) {
					$id = I('get.id');
					if ( !empty($id) ) {
						$where['id'] = array('like',"%$id%");
					}
					$where['_logic'] = 'or';
					$typegroup = I('get.typegroup');
					if ( !empty($typegroup) ) {
						$where['groupname'] = array('like',"%$typegroup%");
					}
					$map['_complex'] = $where;
					$status = I('get.status');
					if ( !empty($status) ) {
						if ( $status == 1 ) {
							$map['status'] = array('like',1);
						} else {
							$map['status'] = array('like',0);
						}
					}
					$vs = I('get.vs');
					if ( !empty($vs) ) {
						if ( $vs == 1 ) {
							$map['vs'] = array('like',1);
						} else {
							$map['vs'] = array('like',0);
						}
					}

				} else {
					$vs = I('get.vs');
					if ( !empty($vs) ) {
						if ( $vs == 1 ) {
							$map['vs'] = array('like',1);
						} else {
							$map['vs'] = array('like',0);
						}
					}
					$status = I('get.status');
					if ( !empty($status) ) {
						if ( $status == 1 ) {
							$map['status'] = array('like',1);
						} else {
							$map['status'] = array('like',0);
						}
					}

				}
				// 实例化TypeGroup对象
				$TypeGroup = M('TypeGroup');
				$ros = $TypeGroup
	    		->where($map)
	    		->count();

				// 实例化分页类 每页8条
				$page = new \Think\Page($ros,8);
				// 分页显示
				$show = $page->show();
				// 进行分页数据查询
				$list = $TypeGroup->
	    			order('id desc')
	    			->limit($page->firstRow.','.$page->listRows)
	    			->where($map)
	    			->select();
				$this->assign('title',' 分类组管理 &gt; 查看分类组');
				$this->assign('TypeGroup',$list);
				$this->assign('show',$show);
				$this->display();
			}
		}
		// 修改分类组状态的AJAX
		public function ajaxStatusType()
		{
			if ( IS_AJAX ) {
				$id = I('get.id');
				$status = I('get.status');
				if ( $status == 0 ) {
					$data['status'] = 1; 
				} else if ( $status == 1) {
					$data['status'] = 0;
				}
				$res = M('TypeGroup')->where("id=$id")->field('status')->save($data);
				if ( $res == 1) {
					if ( $data['status'] == 1) {
						$ros = '启用';

					} else {
						$ros = '禁用';
					}
				} else {
					$ros = false;
				}
				// dump($ros);
				echo json_encode($ros);
				exit;
			} else {
				exit('请使用ajax来请求');
			}
		}
		// 修改分类组的显示方式
		public function ajaxVsType()
		{
			if ( IS_AJAX ) {
				$id = I('get.id');
				$vs = I('get.vs');
				if ( $vs == 0 ) {
					$data['vs'] = 1; 
				} else if ( $vs == 1) {
					$data['vs'] = 0;
				}
				$res = M('TypeGroup')->where("id=$id")->field('vs')->save($data);
				if ( $res == 1) {
					if ( $data['vs'] == 1) {
						$ros = '显示商品';

					} else {
						$ros = '显示分类';
					}
				} else {
					$ros = false;
				}
				// dump($ros);
				echo json_encode($ros);
				exit;
			} else {
				exit('请使用ajax来请求');
			}
		}
		// 删除分类组的AJAX
		public function ajaxDeleteType()
		{
			if ( IS_AJAX) {
				$id = I('get.id');
				$res = M('TypeGroup')->delete($id);
				echo json_encode($res);
				exit;
			} else {
				exit('请使用ajax来请求');
			}
		}
		// 编辑分类组
		public function saveTypeGroup()
		{
			if ( IS_GET ) {
				$id = I('get.id');
				$tids = I('get.tids');
				$tid = explode(',',$tids);
				$where['id'] = array('in',$tid);
				$tidss = M('Type')->where($where)->field('id,typename')->select();
				$map['id']  = array('not in',$tids);
				$map['status'] = array('like',1);
				$save = M('Type')->where($map)->select();
				$vs = M('TypeGroup')->where('id='.$id)->select();
				// dump($vs);
				$this->assign('title',' 分类组管理 &gt; 编辑分类组');
				$this->assign('save',$save);
				$this->assign('vs',$vs[0]);
				$this->assign('ids',$id);
				$this->assign('tid',$tidss);
				$this->display();
			} else {
				// dump(I('post.'));
				$id = I('post.id');
				$type = I('post.type');
				// dump($type);
				$c = implode(',',$type);
				// dump($c);
				$map['id'] = array('in',$c);
				$typename = M('Type')->where($map)->field('typename')->select();
				// dump($typename);
				$num = count($typename);
				// // dump($num);
				$str = '';
				if( I('post.vs') == 0 ) {
					$vs = ' ';
				} else {
					$vs = '/';
				}
				for ( $i = 0; $i < $num; $i++ ) {
					$str .= $typename[$i]['typename'].$vs;
				}
				$res = substr($str, 0, -1);
				if( !empty(I('post.typename')) ) $res = I('post.typename');
				$data['tids'] = $c;
					$data['groupname'] = $res;
					// 插入分类组表的SQL语句
					M('TypeGroup')->where("id=$id")->save($data);
					// 添加成功跳转到分类组表
					$this->success('添加成功',U('TypeGroup/selectTypeGroup'));
					exit;
			}
		}
	}