<?php

	namespace Sun\Controller;

	use Think\Controller;

	class BoardController extends CommonController
	{
		
		//添加广告
		public function addboard()
		{
			if (IS_POST) {
				
				// dump(I('post.'));
				$name = I('post.name');
				$type = I('post.type');
				$status = I('post.status');
				$link = I('post.link');
				
				$arr = I('post.url');
				
				if ($arr == '') {

					$arr = './Uploads/2017-04-09/58e9a90a8b9f7.jpg';

				}
				// dump($arr);exit;

				$num = count($arr);
				// dump($num);exit;

				//循环url
				for ($i=0;$i<$num;++$i) {

					// echo $arr[$i].'<br />'; 
					$arr[$i].'<br />';
				} 

				//把url
				$url = implode(',', $arr);

				if ($url == null) {

					$url = $arr;
				}
				
				$data['name'] = $name;
				$data['url'] = $url;
				$data['type'] = $type;
				$data['status'] = $status;
				$data['link'] = $link;

				//实例化
				$boardModel = D('Board');

				$res = $boardModel->create();

				if (!$res) {

					$this->error( $boardModel->getError() );
					exit;

				}

				$boardModel->data($data)->add();

				// echo $boardModel->getLastSql();

				$this->success('添加成功', U('Board/boardList'), 3);

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

		//显示广告列表
		public function boardList()
		{

			//实例化Board对象
			$boardModel = D('Board');

			$data = $boardModel->showBoardList();
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

			$boardlist = $boardModel
					->order('id desc')
					->where($search)
					->limit($Page->firstRow.','.$Page->listRows)
					->select();

			// dump($boardlist);

			//统计数组中一维数组的值个数
			$num = count($boardlist);
			// dump($num);
			
			//循环数组，对数组里面的url进行切割
			for ($i = 0; $i < $num; ++$i) {

					// echo $boardlist[$i]['url'].'<br />'; 
					$boardlist[$i]['url'] = explode(',', $boardlist[$i]['url']  );
					// dump($boardlist[$i]);
					// exit;
				}
			// dump($boardlist);
			// exit;

			$this->assign('boardlist', $boardlist);

			$this->assign('show', $show);

			$this->display();
		}

		//更改状态
		public function changeStat()
		{
			$Board = D('Board');
			$res = $Board->changeStat();
			echo json_encode($res);
		}

		//查询广告信息
		public function updataBoard () 
		{

			//实例化
			$boardinfo = D('Board');
		
			//根据id查询数据并输出到视图
			$list = $boardinfo->findOne( I('get.id') );
			dump($list);
			
			switch ($list['type']) {
				case 0:
					$list['type'] = 'logo';
					break;
				case 1:
					$list['type'] = '固定广告';
					break;
				case 2:
					$list['type'] = '智能硬件广告';
					break;
				case 3:
					$list['type'] = '搭配';
					break;
				case 4:
					$list['type'] = '配件';
					break;
				case 5:
					$list['type'] = '周边';
					break;

				default:
					break;
			}
			// dump($list['type']);
			$this->assign('list', $list);
			$this->assign('type', $list['type']);
			$this->display();
		}

		//修改广告图片和链接
		public function editBoard()
		{

			if (IS_POST) {

				dump(I('post.'));
				$BoardModel = D('Board');

				$url = I('post.url');

				

			$info = upload('url','./Uploads/2017-04-01/'.$url);
			dump($info);
			exit;
				$res = $BoardModel->create();
				// dump($res);
				
				if (!$res) {

					$this->error( $BoardModel->getError() );
					exit;

				} else {

					$BoardModel->editInfo();

					$this->success('修改成功', U('Board/boardList'), 3);
				}
			}
			
			exit;

		}

		//删除广告
		public function ajaxDeleteBoard()
		{
			if (IS_AJAX)
			{

				$id = I('get.id');

				$boardModel = D('Board');

				$boarddata = $boardModel->delBoard();

				$this->ajaxReturn($boarddata);
			}
		}

		
	}