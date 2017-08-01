<?php
	namespace Home\Model;

	use Think\Model;

	class DetailModel extends Model
	{
		// 详情页初始化
		public function detail()
		{
			$gid = I('get.gid');
			// $gid = 16;
			// 实例化
			$goods = M('Goods');
			$goodsversion = M('GoodsVersion');
			$goodspiccolor = M('GoodsPicColor');
			// $goodsdetail = M('GoodsDetail');
			// 通过gid查寻商品
			$res = $goods->where('id='.$gid)->select();
			// 通过gid查找版本
			$version = $goodsversion->where('gid='.$gid)->select();
			// 获取第一个版本ID
			$vid = $version[0]['id'];
			// 通过版本ID查找颜色
			$pic = $goodspiccolor->where('vid='.$vid)->select();
			// 通过商品ID获取详情信息
			// $detail = $goodsdetail->where('gid='.$gid)->select();
			// dump($detail);
			// $res[0]['detail'] = explode(',',$detail[0]['pic']);
			// dump($res);
			$res[0]['brand'] = $version;
			$res[0]['color'] = $pic;
			$res[0]['pic'] = explode( ',', $res[0]['color'][0]['pic'] );
			$res[0]['basename'] = $res[0]['color'][0]['basename'];
			return $res[0];
		}
		// 版本选择
		public function ajaxVersion()
		{
			$vid = I('get.vid');
			// 实例化
			$color = M('GoodsPicColor');
			$version = M('GoodsVersion');
			// 通过Vid得到图片颜色列表
			$res = $color->where('vid='.$vid)->select();
			// 通过Vid查询价格描述
			$price = $version->where('id='.$vid)->select();
			$res[0]['color'] = $res;
			$res[0]['price'] = $price;
			return $res[0];
		}
		// 颜色选择
		public function ajaxColor()
		{
			$cid = I('get.cid');
			// 实例化 
			$color = M('GoodsPicColor');
			$pic = $color->where('id='.$cid)->field('colorname,color,invertory,cover,basename,pic')->select();
			$pic[0]['pic'] = explode(',',$pic[0]['pic']);
			return $pic[0];
		}
		public function ajaxSpec()
		{
			$gid = I('get.gid');
			$cid = I('get.cid');
			// 实例化
			$pic = M('GoodsPicColor');
			$parameter = M('GoodsParameter');
			$cover = $pic->where('id='.$cid)->field('cover')->select();
			$spec = $parameter->where('gid='.$gid)->select();
			$res['cover'] = $cover;
			$res['spec'] = $spec;
			return $res;
		}
		public function ajaxLoads()
		{
			$gid = I('get.gid');
			$goodsdetail = M('GoodsDetail');
			$detail = $goodsdetail->where('gid='.$gid)->select();
			$details = explode(',',$detail[0]['pic']);
			return $details;
		}
		public function ajaxTheSun()
		{
			$gid = I('get.gid');
			// 实例化
			$the = M('GoodsEvaluate g');
			$thesun = $the->
			join('mi_user u ON g.uid = u.uid')->
			join('mi_detail d ON d.uid = u.uid')->
			field('u.name ,d.pic p,g.evaluate,g.star,g.pic,g.basename,g.time,g.fab')->
			where('g.gid='.$gid)->
			select();
			for ( $i = 0; $i < count($thesun); $i ++ ) {
				$thesun[$i]['pic'] = explode(',',$thesun[$i]['pic']);
			}
			return $thesun;

		}
		// 显示提问的ajax
		public function ajaxAsk()
		{
			// 获取商品ID
			$gid = I('get.gid');
			// 实例化
			$quiz = M('');
			$Replys = M('QuizReply');
			 
			$ask = $quiz->where('q.gid='.$gid.' and r.qid=q.id')
						->table(
							array(
								'mi_quiz' => 'q',
								'mi_quiz_reply' => 'r'
								)
							)
						->limit(6)
			            ->order('time desc')
			            ->select();
			return $ask;

		}
		// 搜索提问
		public function ajaxAsks()
		{
			// 获取商品ID
			$gid = I('get.gid');
			$input = I('get.input');
			// 实例化
			$quiz = M('');
			$Replys = M('QuizReply');
			// $map['content'] = array('like','%钱%');
			$ask = $quiz->where('q.gid='.$gid.' and q.content like "%'.$input.'%" and r.qid=q.id' )
						->table(
							array(
								'mi_quiz' => 'q',
								'mi_quiz_reply' => 'r'
								)
							)
						->limit(6)
			            ->order('time desc')
			            ->select();
			            return $ask;
		}
		// 提问
		public function tws()
		{
			$uid = I('post.uid');
			$gid = I('post.gid');
			$text = I('post.text');
			if ( !empty( $text )) {
				// 实例化
				$data['uid'] = $uid;
				$data['gid'] = $gid;
				$data['content'] = $text;
				$quizs = M('Quiz');
				$quiz = $quizs->add($data);
				return $quiz;
				
			} else {
				return 0;
			}
		}
	}