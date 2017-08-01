<?php

	namespace Sun\Model;

	use Think\Model;

	class BoardModel extends Model
	{

		//定义完整表名
		protected $trueTableName = 'mi_board';

		/**
		 * [$_validate 自动验证]
		 * @author ChenXu  2411233465@qq.com
		 * @var array
		 */
		protected $_validate = array(

			//如果定义了字段映射的话，第一个是参数是数据表的字段名
			array('name', 'require', '站点名称不能为空'),
			array('link', 'require', '链接不能为空'),
			array('type', 'require', '必须选择站点类型'),
			array('status', 'require', '必须选择状态'),					
		);

		/**
		 * [showBoardList 获取广告列表]
		 * @author ChenXu  2411233465@qq.com
		 * @return [array] [返回广告数据数组]
		 */
		public function showBoardList()
		{

			$board = new \Sun\Model\BoardModel();

			$boardlist = $board->query('select * from mi_board');

			return $boardlist; 		
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
		 * [findOne 根据id查广告数据]
		 * @author ChenXu     2411233465@qq.com
		 * @param  [$id]      [点击按钮传过来的广告id]
		 * @return [boolean]  [0 or 1]
		 */
		public function findOne ($id) 
		{

			$res = $this->where('id='.$id)->find();
			return $res;
		}

		public function editInfo()
		{
			//实例化
			$BoardModel = D('Board');

			$url = I('post.url');

			$info = upload('url','./Uploads/2017-04-01/'.$url);
			dump($info);
			//接收post传过来的pass
			$data['url'] = I('post.pass');

			//先把传过来的pass保存起来并且调用create
			$data['pass'] = $UserModel->create(); 

			//更改用户的pass并用hash加密		
			// $UserModel->where('uid ='.I('get.uid'))->setField('pass', I('post.pass'));
			// $UserModel->where('uid ='.I('get.uid'))->data($data)->save();
			$UserModel->where('uid ='.I('get.uid'))->save($data['pass']);
			// echo $Model->getLastSql();
			// exit;
		}

		/**
		 * [delBoard 删除广告]
		 * @author  ChenXu 2411233465@qq.com
		 * @return [boolean] [true or false]
		 */
		public function delBoard()
		{
			$res = $this->where('id='.I('get.id'))->delete();

			return $res;
		}
	}