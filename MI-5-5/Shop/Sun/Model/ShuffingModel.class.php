<?php

	namespace Sun\Model;

	use Think\Model;

	class ShuffingModel extends Model
	{

		//定义完整表名
		protected $trueTableName = 'mi_shuffing';

		/**
		 * [showShuffingList 获取广告列表]
		 * @author ChenXu  2411233465@qq.com
		 * @return [array] [返回广告数据数组]
		 */
		public function showShuffingList()
		{

			$shuffing = new \Sun\Model\ShuffingModel();

			$shuffinglist = $shuffing->query('select * from mi_shuffing');

			return $shuffinglist; 		
		}

		/**
		 * [changeStat 更改状态]
		 * @author ChenXu 2411233465@qq.com
		 * @return [status] [0 or 1]
		 */
		public function changeStat () 
		{

			if(I('status') == 1) {
				$data['status'] = 0;
				$res['res'] = 0;
				$res['info'] = '<font class="text-danger">禁用</font>';
			} else{
				$data['status'] = 1;
				$res['res'] = 1;
				$res['info'] = '<font class="text-success">启用</font>';
			}

			$res['stat'] = $this->where('id='.I('get.id'))->save($data);

			return $res;
		}

		/**
		 * [delShuffing 删除轮播图]
		 * @author  ChenXu 2411233465@qq.com
		 * @return [boolean] [true or false]
		 */
		public function delShuffing()
		{
			$res = $this->where('id='.I('get.id'))->delete();

			return $res;
		}
	}