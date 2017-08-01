<?php

	namespace Sun\Model;

	use Think\Model;

	class ReplyModel extends Model
	{
		
		//定义完整表名
		protected $trueTableName = 'mi_reply';

		/**
		 * [showReplyList 获取评论回复列表]
		 * @author ChenXu  2411233465@qq.com
		 * @return [array] [返回评论回复数据数组]
		 */
		public function showReplyList()
		{

			$reply = new \Sun\Model\ReplyModel();

			$replylist = $reply->query('select * from mi_reply');

			return $replylist; 		
		}

		/**
		 * [delReply 删除回复数据]
		 * @author  ChenXu 2411233465@qq.com
		 * @return [boolean] [true/false]
		 */
		public function delReply()
		{
			$res = $this->where('id='.I('get.id'))->delete();

			return $res;
		}
	

	}