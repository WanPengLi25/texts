<?php

	namespace Sun\Controller;

	use Think\Controller;

	class QuizController extends CommonController 
	{
		public function selectQuiz()
		{
			$quiz = M('Quiz q');
			$quizs = $quiz->
			join('mi_user u ON q.uid = u.uid')
			->join('mi_goods g ON q.gid = g.id')
			->field('u.name,g.name g,q.content,q.time,q.id')
			->order('q.time desc')
			->select();
			$ros = count($quizs);
			$page = new \Think\Page($ros,8);
			$show = $page->show();
			$quizss = $quiz->
			join('mi_user u ON q.uid = u.uid')
			->join('mi_goods g ON q.gid = g.id')
			->field('u.name,g.name g,q.content,q.time,q.id,u.uid')
			->limit($page->firstRow.','.$page->listRows)
			->order('q.time desc')
			->select();
			// dump($quizss);
			$this->assign('title',' 消息管理 &gt; 查看提问');
			$this->assign('quzi',$quizss);
			$this->assign('show',$show);
		    $this->display();
		}
		public function ajaxQuiz()
		{
			if ( IS_GET ) {
				$id = I('get.id');
				$uid = I('get.uid');
				// 实例化
				$ros = M('QuizReply');
				$quiz= $ros->where('qid='.$id )->select();
				if ( !empty($quiz) ) {
					echo json_encode($quiz[0]['reply']); 
				} else {
					echo json_encode(0);
				}
			}
		}
		public function ajaxTws()
		{
			$id = I('get.id');
			$uid = I('get.uid');
			$text = I('get.text');
			if ( !empty($text) ) {
				// 实例化
				$reply = M('QuizReply');
				$data['uid'] = $uid;
				$data['qid'] = $id;
				$data['reply'] = $text;
				$quiz = $reply->add($data);
				echo json_encode(1);
			} else {
				echo json_encode(0);
			}


		}
	}