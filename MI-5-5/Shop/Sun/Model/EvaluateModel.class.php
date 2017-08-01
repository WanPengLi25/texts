<?php

	namespace Sun\Model;

	use Think\Model;

	class EvaluateModel extends Model
	{

		//定义完整表名
		protected $trueTableName = 'mi_goods_evaluate';

		/**
		 * [showEvaluateList 获取评论列表]
		 * @author ChenXu  2411233465@qq.com
		 * @return [array] [返回评论列表数据数组]
		 */
		public function showEvaluateList()
		{

			$evaluate = new \Sun\Model\EvaluateModel();

			$evaluatelist = $evaluate->query('select * from mi_goods_evaluate');

			return $evaluatelist; 		
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
				$res['info'] = '<font class="text-danger">不显示</font>';
			} else{
				$data['status'] = 1;
				$res['res'] = 1;
				$res['info'] = '<font class="text-success">显示</font>';
			}

			$res['stat'] = $this->where('id='.I('get.id'))->save($data);

			return $res;
		}

	}	