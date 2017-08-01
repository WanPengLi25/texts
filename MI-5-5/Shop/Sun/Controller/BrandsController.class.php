<?php

	namespace Sun\Controller;

	use Think\Controller;

	class BrandsController extends CommonController 
	{
		// 添加分类的方法
	    public function addBrands()
	    {
	    	if(IS_POST) {
	    		if ( !D('Brands')->create() ) {
	    			$this->error( D('Brands')->getError() );
	    			exit;
	    		}
	    		D('Brands')->add();
	    		$this->success('添加成功',U('Brands/selectBrands'));
	    	}
		}
		// 分类查询
		public function selectBrands()
		{
			if ( IS_GET ) {
				// dump(I('get.'));
				if ( !empty( I ('get.id') || I('get.brands') ) ) {
					$id = I('get.id');
					if ( !empty($id) ) {
						$where['id'] = array('like',"%$id%");
					}
					$where['_logic'] = 'or';
					$brands = I('get.brands');
					if ( !empty($brands) ) {
						$where['brands'] = array('like',"%$brands%");
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
				} else {
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
				$Brands = M('Brands');
				$ros = $Brands
	    		->where($map)
	    		->count();

				// 实例化分页类 每页8条
				$page = new \Think\Page($ros,8);
				// 分页显示
				$show = $page->show();
				// 进行分页数据查询
				$list = $Brands->
	    			order('id desc')
	    			->limit($page->firstRow.','.$page->listRows)
	    			->where($map)
	    			->select();
	    		// dump(M('Brands')->getLastSql());
				$this->assign('title',' 分类组管理 &gt; 查看分类组');
				$this->assign('Brands',$list);
				$this->assign('show',$show);
				$this->display();
			}
		}
		// ajax删除分类
		public function ajaxDeleteBrands()
		{
			if ( IS_AJAX) {
				$id = I('get.id');
				$res = M('Brands')->delete($id);
				echo json_encode($res);
				exit;
			} else {
				exit('请使用ajax来请求');
			}
		}
		// 状态的AJAX
		public function ajaxStatusBrands()
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
				$res = M('Brands')->where("id=$id")->field('status')->save($data);
				echo json_encode($res);
				exit;
			} else {
				exit('请使用ajax来请求');
			}
		}
		// 编辑分类
		public function saveBrands()
		{
			
			if ( IS_POST ) {
				if ( !D('Brands')->create() ) {
	    			$this->error( D('Brands')->getError() );
	    			exit;
	    		}
	    		$brands = I('post.brands');
	    		$id = I('post.id');
	    		$data['brands'] = $brands;
	    		M('Brands')->where("id=$id")->save($data);
	    		$this->success('编辑成功',U('Brands/selectBrands'));
	    		exit;
			}
		}

	}