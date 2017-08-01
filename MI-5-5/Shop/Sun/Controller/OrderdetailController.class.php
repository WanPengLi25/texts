<?php
	
	namespace Sun\Controller;

	use Think\Controller;

	class OrderdetailController extends CommonController
	{
		public function Orderdetail()
		{
			//找到模型
			$list = D('Orderdetail');
			
			//调用模型里面的方法
			$data = $list->Orderdetail();
			//分配数据
			// $this->assign('list1', $data);

			echo json_encode($data);
			//显示数据到视图
			// $this->display();
		}
	}