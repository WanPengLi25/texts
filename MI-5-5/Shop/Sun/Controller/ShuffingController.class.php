<?php

	namespace Sun\Controller;

	use Think\Controller;

	class ShuffingController extends CommonController
	{

		//添加轮播图
		public function addShuffing()
		{
			if (IS_POST) {
				
				// dump(I('post.'));
				$name = I('post.name');
				$link = I('post.link');
				$status = I('post.status');
				
				$arr = I('post.url');

				$num = count($arr);

				//循环url
				for ($i=0;$i<$num;++$i) {

					// echo $arr[$i].'<br />'; 
					$arr[$i].'<br />';
				} 

				//把url
				$url = implode(',', $arr);
				// dump($url);
				
				$data['name'] = $name;
				$data['url'] = $url;
				$data['status'] = $status;
				$data['link'] = $link;

				//实例化
				$shuffingModel = D('Shuffing');

				$res = $shuffingModel->create();

				if (!$res) {

					$this->error( $shuffingModel->getError() );
					exit;

				}

				$shuffingModel->data($data)->add();

				// echo $shuffingModel->getLastSql();

				$this->success('添加成功', U('Shuffing/shuffingList'), 3);

			} else {
				
				$this->display();
			} 
		}

		//多文件上传插件
		public function upload()
	    {    

	        // 实例化上传类    
	        $upload = new \Think\Upload();

	        // 设置附件上传大小    
	        $upload->maxSize   =     3145728;//3M

	        // 设置附件上传类型   
	        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');

	        $upload->rootPath  = './Public/';

	        // 设置附件上传目录   
	        $upload->savePath  = './Uploads/';

	        //返回上传信息
	        $info   =   $upload->uploadOne($_FILES['url']);   
	         
	        if( !$info ) {
	            // 上传错误提示错误信息
	            
	            $data['status'] = 404;

	            //错误信息
	            $data['msg']    = $upload->getError();
	              
	            echo  json_encode($data);

	         } else {
	            
	              // 上传成功 (图片路径、图片名字)
	              $data['status']  = 200;
	              $data['msg']     = 'UPLOAD SUCCESS';

	              //图片原始名字
	              $data['details']['originName'] = $info['name'];
	              $data['details']['savename'] = $info['savename'];
	              $data['details']['savepath'] = $info['savepath'];

	              echo json_encode($data);
	        }
	    }

	    //轮播图列表
		public function shuffingList()
		{

			//实例化Board对象
			$shuffingModel = D('Shuffing');

			$data = $shuffingModel->showShuffingList();
			// dump($data);

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
			$Page = new \Think\Page($total, 3);
			// echo $Page;
			// exit;
			
			//生成前端分页按钮
			$show = $Page->show();

			$shuffinglist = $shuffingModel
					->order('id desc')
					->where($search)
					->limit($Page->firstRow.','.$Page->listRows)
					->select();

			// dump($boardlist);

			//统计数组中一维数组的值个数
			$num = count($shuffinglist);
			// dump($num);
			
			//循环数组，对数组里面的url进行切割
			for ($i = 0; $i < $num; ++$i) {

					// echo $boardlist[$i]['url'].'<br />'; 
					$shuffinglist[$i]['url'] = explode(',', $shuffinglist[$i]['url']  );
					// dump($boardlist[$i]);
				}

			$this->assign('shuffinglist', $shuffinglist);

			$this->assign('show', $show);

			$this->display();
		}

		//删除轮播图
		public function ajaxDeleteShuffing()
		{
			if (IS_AJAX)
			{

				$id = I('get.id');

				$shuffingModel = D('Shuffing');

				$shuffingdata = $shuffingModel->delshuffing();

				$this->ajaxReturn($shuffingdata);
			}
		} 

		//更改状态
		public function changeStat()
		{
			$Shuffing = D('Shuffing');
			$res = $Shuffing->changeStat();
			echo json_encode($res);
		}

	}
	