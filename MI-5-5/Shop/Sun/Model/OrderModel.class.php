<?php
	
	//命名目录
	namespace Sun\Model;
	//引入
	use Think\Model;
	//定义一个OrderModel类
	class OrderModel extends Model
	{
		/**
		 * findAddInfo 查找时用到的数据
		 * @author  ChenGuiCai <294142682@qq.com>
		 * @return  array 返回数组
		 */	
		public function Order()
		{	

			//得到一个对象
			$oreder = M('order');
			

			//查询关联表的数据
			$data = $this->alias('o')->join('LEFT JOIN __USER__ u ON o.uid = u.uid')->select();
			
			// dump($data);

			//返回数据
			return $data;
		}
		/**
		 * findAddInfo 修改状态时用到的数据
		 * @author  ChenGuiCai <294142682@qq.com>
		 * @return  array 返回数组
		 */	
		public function delivery()
		{
			$delivery = M('order');

			if (IS_POST){

			}else {

				$id = I('get.id');

				$data = array('ostatus'=3);

				$list = $delivery->where('id='.$id)->setField($data);
				

				
			}
		}		
	}