<?php

	namespace Sun\Model;

	use Think\Model;

	/**
	 * AuthGroupModel 管理员组相关操作
	 * @author  ChenGuiCai <1149951080@qq.com>
	 */
	class AuthGroupModel extends Model
	{

		//自定义数据表前缀
		protected $tablePrefix = 'think_';
		//是否有规则
		static $stat;

		//自动验证
		protected $_validate = array(     

			// 在新增的时候验证title字段是否存在
			array('title', 'require', '组名不能为空！', self::MUST_VALIDATE, 'regex', 1), 
			//在新增时验证组名是否存在
			array('title', '', '组名已经存在！', self::MUST_VALIDATE, 'unique', 1),
			//在新增时验证组名名格式
			array('title', '/^[\x{4e00}-\x{9fa5}]{1,20}$/u', '组名：中文，1-20位！', self::MUST_VALIDATE, 'regex', 1), 
			//在新增时验证权限
			array('rule', 'checkRule', '选择权限错误！', self::MUST_VALIDATE, 'callback', 1),
			//在修改时验证组名是否唯一
			array('title', '', '组名已经存在！', self::MUST_VALIDATE, 'unique', 2),
			//在修改时验证组名名格式
			array('title', '/^[\x{4e00}-\x{9fa5}]{1,20}$/u', '组名：中文，1-20位！', self::MUST_VALIDATE, 'regex', 2),
			
		);

		/**
		 * findAddInfo 查找添加时用到的数据
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  array 返回数组
		 */	
		public function findAddInfo () 
		{
			
			//获取所有规则
			$auth = M('AuthRule', 'think_')
					->order('name asc')
					->select();
			//判断是否有规则
			if( empty($auth) ) {
				$auth = 0;
				self::$stat = 0;
			} else {
				self::$stat = 1;
			}
			return $auth;

		}

		/**
		 * findShowInfo 查找查看时用到的数据
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  array 返回数组
		 */	
		public function findShowInfo ()
		{

			//初始化查询条件
			$where = '1=1 and status != 7';
			//获取数据
			$status = I('get.status');
			$info = I('get.info');
			//拼接条件
			if( $status == 1 && !empty($info) ) {

				if( is_numeric($info) ) $where .= ' and id='.$info;
				else $where .= ' and id=0';

			}
			if( $status == 0 && !empty($info) ) {
				$where .= " and title like '%".$info."%'";
			}
			// 查询满足要求的总记录数
			$count      = $this->where($where)->count();
			// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$Page       = new \Think\Page($count,9);
			// 分页显示输出
			$show       = $Page->show();
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $this->where($where)->order('status asc')->limit($Page->firstRow.','.$Page->listRows)->select();

			// dump($list);

			if(count($list) == 0) $list = 0;
			//返回分页数据
			return $res = array('show'=>$show,'list'=>$list);

		}

		/**
		 * checkRule 验证添加时权限选择是否正确
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  bool
		 */	
		public function checkRule () 
		{

			//获取数据
			$data = I('post.rule');
			//检查数据是否为空
			if( empty($data) ) return false;
			//检查权限是否存在
			for( $i = 0; $i < count($data); $i++ ) {
				if( M('AuthRule', 'think_')->where('id='.$data[$i])->find() ) {

				} else {
					return false;
				}	
			}

		}

		/**
		 * addAuthGroup 添加管理员组
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  int 添加是否成功，空代表不成功 
		 */	
		public function addAuthGroup ()
		{

			//获取数据
			$data = I('post.');
			//拼接规则
			$rule = implode($data['rule'],',');
			//构造数据
			$val['title'] = $data['title'];
			$val['rules'] = $rule;
			$val['status'] = $data['status'];
			//执行并放回添加结果
			return $this->add($val);

		}


		/**
		 * findCrew 查找组员和其他没有分组的管理员
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @param   $id 管理员组的id
		 * @return  array 返回一个数组，包含所有结果 
		 */	
		public function findCrew ($id = '')
		{

			//实例化model对象
			$model = new Model();

			//验证是否有传入id
			if( empty($id) ) return $res = ['', ''];

			//查询出所有属于当前组的管理员
			$nowGroup = $model->query('select u.id, u.name from think_user u,think_auth_group_access g where u.id = g.uid and g.group_id = '.$id);

			//初始化条件
			$str = '';

			//拼接条件
			for($i = 0; $i < count($nowGroup); $i++) {
				$str .= $nowGroup[$i]['id'].',';
			}
			$str .= '-1';
			$map['id'] = array('not in', $str);

			//查询所有没有分组的管理员
			$noGroup = M('User', 'think_')->field('id,name')->where($map)->select();

			//返回结果
			return $res = [
					empty($noGroup) ? '' : $noGroup, 
					empty($nowGroup) ? '' : $nowGroup
				];
		}

		/**
		 * updateCrew 更新组员
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  array (错误号,提示信息) 
		 */	
		public function updateCrew ()
		{

			//获取数据
			$gid = I('post.id');
			$crew = I('post.val');
			$old = $this->findCrew($gid);

			//实例化对象
			$authGroupAccess = M('authGroupAccess','think_');
			$authGroup = M('authGroup','think_');
			$user = M('User', 'think_');

			//判断组是否存在
			if( !$authGroup->where('id = '.$gid)->select() ) return array(0, '不存在此组');

			//验证组员
			if( !empty($crew) ) {
				for($i = 0; $i < count($crew); $i++) {

					if( !$user->where('id='.$crew[$i])->select() ) 
						return array(0, '第'.($i+1).'个组员不存在');

				}
			}

			//判断组员是否出现重复	
			$crew_count = array_count_values($crew);
			foreach($crew_count as $v) {
				if( $v > 1 ) {
					return array(0, '数据出现重复');
				}
			}
			
			//开启事务
			$authGroupAccess->startTrans();

			//删除原组员
			if( !empty( $authGroupAccess->where('group_id='.$gid)->select() ) ) {
				$res = $authGroupAccess->where('group_id='.$gid)->delete();
				if(!$res) {
					//失败，回滚
					$authGroupAccess->rollback();
					return array(0, '更新出错');
				}
			}

			//更新组员
			if( !empty($crew) ) {
				for($i = 0; $i < count($crew); $i++) {
					$data['uid'] = $crew[$i];
					$data['group_id'] = $gid;
					$res = $authGroupAccess->add($data);
					if( !$res ) {
						//失败，回滚
						$authGroupAccess->rollback();
						return array(0, '更新第'.($i+1).'用户时出错');
					}
				}
			}

			//成功，提交
			$authGroupAccess->commit();
			$user->commit();

			//返回结果
			return array(1, '更改成功');

		}

		/**
		 * findAuth 查找组权限和其他权限
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @param   $id 管理员组的id
		 * @return  array 返回一个数组，包含所有结果 
		 */	
		public function findAuth ($id = '')
		{

			//实例化model对象
			$model = new Model();

			//验证是否有传入id
			if( empty($id) ) return $res = ['', ''];

			//查询出当前组的权限
			$str = $model->query('select rules from think_auth_group where id='.$id);
			$map['id'] = array('in', $str[0]['rules']);
			$nowAuth = M('AuthRule', 'think_')->field('id,name,title')->where($map)->select();

			//查询其他权限
			$map['id'] = array('not in', $str[0]['rules']);
			$noAuth = M('AuthRule', 'think_')->field('id,name,title')->where($map)->select();

			//返回结果
			return $res = [
					empty($noAuth) ? '' : $noAuth, 
					empty($nowAuth) ? '' : $nowAuth
				];

		}

		/**
		 * updateAuth 更新权限
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  array (错误号，提示信息) 
		 */	
		public function updateAuth ()
		{

			//获取数据
			$gid = I('post.id');
			$auth = I('post.val');

			//实例化对象
			$authRule = M('authRule','think_');
			$authGroup = M('authGroup','think_');

			//判断组是否存在
			$ag = $authGroup->where('id = '.$gid)->select();
			if( !$ag ) return array(0, '不存在此组');

			//验证权限
			if( !empty($auth) ) {
				for($i = 0; $i < count($auth); $i++) {

					if( !$authRule->where('id='.$auth[$i])->select() ) 
						return array(0, '第'.($i+1).'个权限不存在');

				}
			} else {
				return array(0, '组不能没有权限');
			}

			//判断权限是否出现重复	
			$auth_count = array_count_values($auth);
			foreach($auth_count as $v) {
				if( $v > 1 ) {
					return array(0, '数据出现重复');
				}
			}

			//要更新的数据
			$data['rules'] = implode(',', $auth);

			//判断数据有没有改变
			if($data['rules'] == $ag[0]['rules'])
				return array(0, '没有任何修改');

			//更新权限
			$res = $authGroup->where('id='.$gid)->save($data);

			//返回结果
			if($res) {
				return array(1, '更改成功');
			} else {
				return array(0, '更改失败');
			}
			
		}

		/**
		 * changeStat 更新组状态
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  array 提示信息
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
		 * changeStat 删除组
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @param   $id 组的id
		 * @return  array 提示信息
		 */
		public function delAuth ($id = '')
		{

			if( empty($id) ) return arraay(0, '删除失败');
			$data['status'] = 7;
			$res = $this->where('id='.$id)->save($data);
			if($res)
				return array(1, '删除成功');
			else
				return array(1, '删除失败');

		}

		/**
		 * updateGroup 修改组名，状态
		 * @author  ChenGuiCai <1149951080@qq.com>
		 * @return  array 提示信息(状态，提示)
		 */
		public function updateGroup () 
		{

			//获取数据
			$data['title'] = I('post.title');
			// $data['status'] = I('post.status');
			//z执行修改
			$res = $this->where('id='.I('post.id'))->save($data);
			//判断修改结果
			if( $res === false ) {
				return array(0, '修改失败！');
			} else if( $res === 0 ) {
				return array(1, '没有任何修改！');
			} else {
				return array(1, '修改成功！');
			} 

		}

	}