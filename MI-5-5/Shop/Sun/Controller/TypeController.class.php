<?php

	namespace Sun\Controller;

	use Think\Controller;

	class TypeController extends CommonController 
	{
		// 添加分类的方法
	    public function addType()
	    {
	    	if(IS_POST) {
	    		if ( !D('Type')->create() ) {
	    			$this->error( D('Type')->getError() );
	    			exit;
	    		}
	    		D('Type')->add();
	    		$this->success('添加成功',U('Type/selectType'));
	    	} else {
	    		$this->display();
	    	}
		}

		// 分类查询
		public function selectType()
		{

			$map = '1=1';
			if( !empty( I('get.id') ) ) {
				$this->assign('id', I('get.id'));
				$map .= ' and id='.I('get.id');
			}
			if( !empty( I('get.typename') ) ) {
				$this->assign('typename', I('get.typename'));
				$map .= ' and typename like "%'.I('get.typename').'%"';
			}
			// if( count( I('get.status') ) && I('get.status') != -1 ) {
			// 	$this->assign('status', I('get.status'));
			// 	$map .= ' and status='.I('get.status');
			// } else {
			// 	$this->assign('status', -1);
			// }
			if ( !empty(I('get.status')) ) {
				$status = I('get.status');
				$this->assign('status', $status);
				$map .= ' and status='.$status;
			}

			// 实例化Type对象
			$Type = M('Type');
			$ros = $Type
    		->where($map)
    		->count();
			// 实例化分页类 每页8条
			$page = new \Think\Page($ros, 8);
			// 分页显示
			$show = $page->show();
			// 进行分页数据查询
			$list = $Type
				->order('id desc')
    			->where($map)
    			->limit($page->firstRow.','.$page->listRows)
    			->select();
    		if( !count($list) ) $list = 0;
    		// dump($Type->getLastSql());
			$this->assign('title',' 分类组管理 &gt; 查看分类组');
			$this->assign('type',$list);
			$this->assign('show',$show);
			//渲染模板
			$this->display();

		}

		// ajax删除分类
		public function ajaxDeleteType()
		{
			if ( IS_AJAX) {
				$id = I('get.id');
				$res = M('Type')->delete($id);
				echo json_encode($res);
				exit;
			} else {
				exit('请使用ajax来请求');
			}
		}
		// 状态的AJAX
		public function ajaxStatusType()
		{
			if ( IS_AJAX) {
				$id = I('get.id');
				$status = I('get.status');
				// dump($status);
				if ( $status == '0' ) {
					$data['status'] = 1;
				} else if ( $status == '1' ){
					$data['status'] = 0;
				}
				$res = M('Type')->where("id=$id")->field('status')->save($data);
				echo json_encode($res);
				exit;
			} else {
				exit('请使用ajax来请求');
			}
		}
		// 编辑分类
		public function saveType()
		{
			
			if ( IS_POST ) {
				if ( !D('Type')->create() ) {
	    			$this->error( D('Type')->getError() );
	    			exit;
	    		}
	    		$typename = I('post.typename');
	    		$id = I('post.id');
	    		$data['typename'] = $typename;
	    		M('Type')->where("id=$id")->save($data);
	    		$this->success('编辑成功',U('Type/selectType'));
	    		exit;
			}
		}

	}