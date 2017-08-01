<?php

	namespace Sun\Model;

	use Think\Model;

	class AuthModel extends Model
	{
		//自定数据表名
		protected $trueTableName = 'think_auth_rule';

		//自动验证
		protected $_validate = array(     

			// 在新增的时候验证name字段是否存在
			array('name', 'require', '规则不能为空！', self::MUST_VALIDATE, 'regex', 1), 
			//在新增时验证规则是否存在
			array('name', '', '规则已经存在！', self::MUST_VALIDATE, 'unique', 1),
			//在新增时验证规则名格式
			array('name', '/^[a-zA-Z]+\/[a-zA-Z]+\/[a-zA-Z]+$/', '规则名为模块/控制器/方法名！', self::MUST_VALIDATE, 'regex', 1), 
			//在新增时验证权限名不能为空
			array('title', 'require', '权限名不能为空！', self::MUST_VALIDATE, 'regex', 1),
			//在新增时验证权限名是否存在
			array('title', '', '权限名已经存在！', self::MUST_VALIDATE, 'unique', 1),
			//在新增时验证权限名格式
			array('title', '/^[\x{4e00}-\x{9fa5}]{1,10}$/u', '权限名1~10位中文字符！', self::MUST_VALIDATE, 'regex', 1),
			//在编辑时验证规则不能为空
			array('name', 'require', '规则不能为空！', self::MUST_VALIDATE, 'regex', 2),
			//在编辑时验证规则名格式
			array('name', '/^[a-zA-Z]+\/[a-zA-Z]+\/[a-zA-Z]+$/', '规则名为模块/控制器/方法名！', self::MUST_VALIDATE, 'regex', 2),
			//在编辑时验证权限名不能为空
			array('title', 'require', '权限名不能为空！', self::MUST_VALIDATE, 'regex', 2),
			//在编辑时验证权限名格式
			array('title', '/^[\x{4e00}-\x{9fa5}]{1,10}$/u', '权限名1~10位中文字符！', self::MUST_VALIDATE, 'regex', 2),

		);

		//添加权限
		public function addAuth ()
		{

			$res = $this->add($_POST);
			return $res;

		}

		//显示权限列表
		public function showAuth ()
		{

			//初始化查询条件
			$where = '1=1';
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
			$list = $this->where($where)->order('name')->limit($Page->firstRow.','.$Page->listRows)->select();
			//返回分页数据
			return $res = [$show,$list];

		}

		public function findOne ($id) 
		{

			$res = $this->where('id='.$id)->find();
			return $res;

		}

		public function updataAuth () 
		{


				$list = $this->findOne( I('post.id') );
				//获取表单传过来的数据
				$form = I('post.');
				//获取键
				$keys = array_keys( $form );
				$data['id'] = I('post.id');
				
				for($i = 1; $i < count($form); $i++) {
					if( $form[ $keys[$i] ] == $list[ $keys[$i] ] ) {
					} else {
						$data[ $keys[$i] ] = $form[ $keys[$i] ];
					}
				}
				if( count($data) == 1 ) {
					return -1;
					// $this->success('没有任何修改!', U('Auth/showAuth'), 1);
				} else {
					$res = $this->save($data);
					return $res;
				}

		}

		public function delAuth ($id) 
		{

			$res = $this->where('id='.$id)->delete();
			return $res;

		}

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
	}