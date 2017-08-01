<?php

	namespace Sun\Controller;

	use Think\Controller;

	class EvaluateController extends CommonController
	{
		//显示评价列表
		public function evaluateList()
		{

			//实例化Board对象
			$evaluateModel = D('Evaluate');

			$data = $evaluateModel->showEvaluateList();
			// dump($data);
			// exit;

			if (IS_POST) {

				//搜索序号id
				$id = I('post.id');

				// dump($id);
				if (!empty($id)) {

					$search['id'] = array('EQ', "{$id}");
				}

				//将两个搜索条件的关系变成or
				$search['_logic'] = 'or';

    			$map['_complex'] = $search;

    			//搜索用户名name
				$name = I('post.keyword');
				// dump($name);

				if ( !empty($name) ) {

					$search['name'] = array('like', "{$name}");
				}
				
				//echo sql语句之前实例化和连贯操作要分开来写
				// echo  $listAll->getLastSql();
								
			} 

			//查询满足要求的总记录数
			$total = count($data);
			// dump($total);

			//实例化分页类 传入总记录数和每页显示的记录数(2)
			$Page = new \Think\Page($total, 6);
			// echo $Page;
			// exit;
			
			//生成前端分页按钮
			$show = $Page->show();

			$evaluatelist = $evaluateModel
					->order('id desc')
					->where($search)
					->limit($Page->firstRow.','.$Page->listRows)
					->select();

			// dump($evaluatelist);

			//统计数组中一维数组的值个数
			$num = count($evaluatelist);
			// dump($num);
			
			//循环数组，对数组里面的url进行切割
			for ($i = 0; $i < $num; ++$i) {

					// echo $boardlist[$i]['url'].'<br />'; 
					$evaluatelist[$i]['pic'] = explode(',', $evaluatelist[$i]['pic']  );
					// dump($boardlist[$i]);
				}

			$this->assign('evaluatelist', $evaluatelist);

			$this->assign('show', $show);

			$this->display();
		}

		//更改状态
		public function changeStat()
		{
			$Evaluate = D('Evaluate');
			$res = $Evaluate->changeStat();
			echo json_encode($res);
		}



		
	}