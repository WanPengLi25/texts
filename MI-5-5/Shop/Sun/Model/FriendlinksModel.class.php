<?php 

	namespace Sun\Model;

	use Think\Model;

	class FriendlinksModel extends Model
	{
		

		// 字段映射
		protected $_map = array(         
			// 把表单中keyword映射到数据表的name字段         
			'keyword' =>'name', 
		);

		// 正则验证
		protected $_validate = array(
			array('name','require','合作伙伴名不能为空'),
			array('url','/^(http(s?)|ftp):\/\/(?:[\w\-_]+\.)+[A-za-z]{2,4}(?:[\/\?#][\/=\?%\-&~`@\[\]\':+!\.#\w]*)?/','请输入你的链接地址'),
		);

		
		/**
		 * findAddInfo 查找时用到的数据
		 * @author  ChenGuiCai <294142682@qq.com>
		 * @return  array 返回数组
		 */	
		public function showLink()
		{	
			// 接收数据
			$showlink = M('friendlinks');
			//查看所有数据
			$showlinkres = $showlink->select();
			// 返回数据值
			return $showlinkres;




		}

		/**
		 * findAddInfo 删除时用到的数据
		 * @author  ChenGuiCai <294142682@qq.com>
		 * @return  array 返回数组
		 */	
		public function deletelink()
		{
			// 接收数据
			
			$deletelinky = M('Friendlinks')->where('id='.I('get.id'))->delete();	
			
			// 返回数据值
			return $deletelinky;
		}

		/**
		 * findAddInfo 修改时用到的数据
		 * @author  ChenGuiCai <294142682@qq.com>
		 * @return  array 返回数组
		 */	
		public function updataLink()
		{
			// 判断是否是AJAX传过来的数据
			if( IS_AJAX ) {
				// 实例化一个模型
				$updatalink = M('friendlinks');
				// 获取传过来的值
				$id = I('post.id');
				$name = I('post.name');
				$url = I('post.url');
				
					// 将获取过来的值给插入data
					$data['name'] = $name;
					$data['url'] = $url;
					// 将要修改的数据在数据库修改
					$linkupdata = $updatalink->where('id='.$id)->save($data);
				
					//返回修改的数据
					return $linkupdata;


			} else {
				exit('请使用ajax请求这个方法');
			}
			
		}
	}