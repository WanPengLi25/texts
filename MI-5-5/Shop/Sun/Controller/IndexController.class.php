<?php

	namespace Sun\Controller;

	use Think\Controller;

	class IndexController extends CommonController 
	{
	    public function index(){
	    	
	    	//后台首页显示服务器基本信息
	    	$serverInfo = array(
			//获取服务器信息（操作系统、Apache版本、PHP版本）
			'server_version' => $_SERVER['SERVER_SOFTWARE'],
			//获取服务器时间
			'server_time' => date('Y-m-d H:i:s', time()),
			//获取浏览器类型
			'browser_type'=>$_SERVER['HTTP_USER_AGENT'],
			//上传文件大小限制
			'max_upload' => ini_get('file_uploads') ? ini_get('upload_max_filesize') : '已禁用', 
			//脚本最大执行时间
	        'max_ex_time' => ini_get('max_execution_time').'秒', 
			);
			//视图
			$this->assign('serverInfo',$serverInfo);
			// 用户管理 &gt; 用户添加
	    	$this->assign('title',' 用户管理 &gt; 用户添加');
	        $this->display();

		}

	}