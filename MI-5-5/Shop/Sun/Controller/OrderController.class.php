<?php

	namespace Sun\Controller;

	use Think\Controller;

	class OrderController extends CommonController
	{
		//同步数据表名
		protected $tableNaME ="order";
		// 定义一个方法
		public function index()
		{
			//调用模型里的方法
			$order = M('Order o')->Order();
			
			//==================搜索=======================
			if (IS_POST){

			} else {
				//接收表单传过来的id
				$id = I('get.id') ? I('get.id') : '';
				$this->assign('id', $id);
				// 判断是否为空
				if( !empty($id) ){
					// 不为空则定义一个数组拼接
					$search['oid'] = array('like', "%{$id}%");
				}
				//接收表单传过来的name
				$name = I('get.keyword')? I('get.keyword') : '';
				$this->assign('keyword', $name);
				// 判断是否为空
				if ( !empty($name) ){
					// 不为空则定义一个数组拼接
					$search['u.name'] = array('like', "%{$name}%");
				}

				$list = M('Order o')
				->join('LEFT JOIN mi_user u ON o.uid = u.uid LEFT JOIN mi_order_detail d ON o.id=d.oid')
				->where($search)
				->select();
				
			} 

			
			//==================搜索结束===================
	
			//==================分页======================
			//统计总条数
			$total = count($list);

			

			// 实例化分页类 传入总记录数和每页显示的记录数(2)
			$Page  = new \Think\Page($total,6);



			// 分页显示输出
			$show  = $Page->show();
			// 使用limit进行分页
			$userList = $order->order('o.id desc')
			// 把查询条件传入查询方法
			->where($search)
			//表示查询文章数据
			->limit($Page->firstRow.','.$Page->listRows)
			//用于查询关联表的数据
			->join('LEFT JOIN mi_user u ON o.uid = u.uid LEFT JOIN mi_order_detail d ON o.id=d.oid')
			//查询
			->select();
			//====================分页结束====================
			

			//分配数据到模板
			
			$this->assign('list', $userList);
			// 分配分页样式到模板
			$this->assign('show', $show);

						
			//显示数据
			$this->display();
		}
		// 定义一个方法
		public function delivery()
		{	
			//实例化一个对象
			$status = M('order');


			//判断是否是post传过的值，不是就走假区间
			if (IS_POST){

			}else {
				//接收get传过来的值
				$id = I('get.id');
				
				//使用一个setField方法更改字段值
				$list = $status->where('id='.$id)->setField("ostatus", 3);


				
				//判断$list返回的结果集如果大于0说明更改成功
				if($list > 0 ) {
					//返回1给ajax
					echo 1;

				} else {
					//失败则返回0给ajax
					echo 0;
				}

				
			}
		}

	}

	
