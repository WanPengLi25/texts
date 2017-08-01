<?php

	namespace Sun\Controller;

	use Think\Controller;

	class ReplyController extends CommonController
	{
		public function addReply()
		{

			$getinfo = I('get.');

			dump($getinfo);

			if(IS_POST)
			{

				$postinfo = I('post.');
				dump($postinfo);
			}

			//实例化
			$replyModel = D('Reply');

			$res = $replyModel->create();

			if(!$res) 
			{

				$this->error( $replyModel->getError() );
				exit;
			} else {

			$replyModel->add();

			$this->success('回复成功', U('Evaluate/evaluateList'), 3);
			
			}
		}
	}