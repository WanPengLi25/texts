<?php

	namespace Home\Model;

	use Think\Model;

	class PersonalModel extends Model
	{
		//定义表名
		protected $trueTableName = 'mi_user';

		/**
		 * [$_map 字段映射]
		 * @author [ChenXu] <2411233465@163.com>
		 * @var array
		 */
		protected $_map = array( 

		 	'name' =>'name', // 把表单中name映射到用户地址表的name字段         
		 	'tel'  =>'phone', // 把表单中的tel映射到用户地址表的phone字段
		 	'pos'  =>'code', // 把表单中的pos映射到用户地址表的code字段
		 	'tig'  =>'tip', // 把表单中的tig映射到用户地址表的tip字段
		 	'def'  =>'status', // 把表单中的def映射到用户地址表的status字段
		);

		/**
		 * [$_validate 添加地址自动验证]
		 * @author [ChenXu] <2411233465@163.com>
		 * @var array
		 */
		protected $_validate = array( 

			array('name','require','收件人姓名必须填写！'), //默认情况下用正则进行验证 
			array('phone','require','收件人电话必须填写！'), 
			array('code','require','邮编必须填写！'),
			array('tip','require','地址标签必须填写！'),			 
		);


		/**
		 * [findUserInfo 查询用户数据]
		 * @author <2411233465@qq.com>
		 * @return [array] [用户数据]
		 */
		public function findUserInfo()
		{
			$userinfo = D('user');

			//检测session是否有设置email
			if( session('?email') ){

				$info = $_SESSION['email'];
				$where = 'email="'.$info.'"';

			} else {
				
				$info = $_SESSION['phone'];
				$where = 'phone='.$info;
			}
			
			$list = $userinfo->where($where)->select();
			                       
			return $list;	
		}

		/**
		 * [findUserOrder 获取用户订单数据]
		 * @author <2411233465@qq.com>
		 * @return [array] [订单数据]
		 */
		public function findUserOrder()
		{
			// 实例化
			$userinfo = M('Order o');
			$good = M('Goods');
			$version = M('GoodsVersion');
			$color = M('GoodsPicColor');
			if( session('?userInfo') ){		
				$uid = session('userInfo')['uid'];
			}
			$list = $userinfo
			->join('mi_user u ON o.uid = u.uid')
			->where('u.uid='.$uid)
			->limit('0,1')
			->select();

			$count = $userinfo->where('uid='.$uid)->count();

			$gid = explode(',',$list[0]['gid']);
			$vid = explode(',',$list[0]['vid']);
			$cid = explode(',',$list[0]['cid']);
			$num = explode(',',$list[0]['num']);

			for ( $i = 0; $i < count($gid); $i++ ) {
				$gname[] = $good->where('id='.$gid[$i])->field('name,id')->select();
				$res[$i]['gname'] = $gname[$i][0]['name'];
				$res[$i]['gid'] = $gname[$i][0]['id'];

				$vname[] = $version->where('id='.$vid[$i])->field('vname,price')->select();
				$res[$i]['vname'] = $vname[$i][0]['vname'];
				$res[$i]['price'] = $vname[$i][0]['price'];

				$colorname[] = $color->where('id='.$cid[$i])->field('colorname,cover')->select();
				$res[$i]['colorname'] = $colorname[$i][0]['colorname'];
				$res[$i]['cover'] = $colorname[$i][0]['cover'];

				$res[$i]['num'] =$num[$i];
			}
				// dump($res);exit;
			
			return array($res,$list);
		}

		

		/**
		 * [findUserAppraise 获取用户评论数据]
		 * @author <2411233465@qq.com>
		 * @return [array] [用户评论数据]
		 */
		public function findUserAppraise()
		{
			// 实例化
			$userinfo = M('Order o');
			$good = M('Goods');
			$version = M('GoodsVersion');
			$color = M('GoodsPicColor');
			if( session('?uid') ){

				// $uid = session('userinfo')['uid'];
				// $where = 'uid ='.$uid;			

			}
			  

			$uid = 28;
			$list = $userinfo
			->join('mi_user u ON o.uid = u.uid')
			->where('u.uid='.$uid)
			->select();

			$count = $userinfo->where('uid='.$uid)->count();

			$gid = explode(',',$list[0]['gid']);
			$vid = explode(',',$list[0]['vid']);
			$cid = explode(',',$list[0]['cid']);
			$num = explode(',',$list[0]['num']);

			for ( $i = 0; $i < count($gid); $i++ ) {
				$gname[] = $good->where('id='.$gid[$i])->field('name,id')->select();
				$res[$i]['gname'] = $gname[$i][0]['name'];
				$res[$i]['gid'] = $gname[$i][0]['id'];

				$vname[] = $version->where('id='.$vid[$i])->field('vname,price')->select();
				$res[$i]['vname'] = $vname[$i][0]['vname'];
				$res[$i]['price'] = $vname[$i][0]['price'];

				$colorname[] = $color->where('id='.$cid[$i])->field('colorname,cover')->select();
				$res[$i]['colorname'] = $colorname[$i][0]['colorname'];
				$res[$i]['cover'] = $colorname[$i][0]['cover'];

				$res[$i]['num'] =$num[$i];
			}
				// dump($res);exit;
			
			return array($res,$list);
		}


		public function findOrderInfo ()
		{

			// $uid = session('userInfo')['uid'];
			$uid = 28;

			$order = M('Order');
			$model = M('');

			$orders = $order->where('uid='.$uid)->select();
			// dump($orders);

			for( $i = 0; $i < count($orders); $i++ ) {

				$gid = explode(',',$orders[$i]['gid']);
				$vid = explode(',',$orders[$i]['vid']);
				$cid = explode(',',$orders[$i]['cid']);

				for( $k = 0; $k < count($gid); $k++ ) {

					$orders[$i]['goods'][] = $model
											->field('g.id,g.name,v.vname,v.price,c.colorname,c.cover')
					                        ->table(
					                        	array(
					                        		'mi_goods'=>'g',
					                        		'mi_goods_version'=>'v',
					                        		'mi_goods_pic_color'=>'c'
					                        		)
					                        	)
					                        ->where('g.id='.$gid[$k].' and v.id='.$vid[$k].' and c.id='.$cid[$k])
					                        ->limit(1)
					                        ->select()[0];

				}

			}

			// dump($orders);
			return $orders;
		}

		/**
		 * [findUserReviews 获取用户消息通知]
		 * @author <2411233465@qq.com>
		 * @return [array] [用户消息数据]
		 */
		public function findUserReviews()
		{
			//使用M方法实例化 操作mi数据库的mi_goods_evaluate表
			$userinfo = M('mi.Notice','mi_'); 

			if( session('?uid') ){

				$info = $_SESSION['userinfo']['uid'];
				$where = 'uid="'.$info.'"';

			} 
			$list = $userinfo->where($where)->select();
			
			return $list;
		}

		/**
		 * [findUserCommodity 获取用户喜爱的商品]
		 * @author <2411233465@qq.com>
		 * @return [array] [用户喜爱数据]
		 */
		public function findUserCommodity()
		{
			//使用M方法实例化 操作mi数据库的mi_goods_evaluate表
			// $userinfo = M('mi.User_collection','mi_'); 
			$userinfo = M();

			if( session('?uid') ){

				$info = $_SESSION['userinfo']['uid'];

				// $where = 'uid="'.$info.'"';

			} 
			
			 $list = $userinfo->field('g.id,g.name,v.price,v.id,c.cover,u.gid')
			             ->table(
			             	array(
			             		'mi_goods'=>'g',
			             		'mi_goods_version'=>'v',
			             		'mi_goods_pic_color'=>'c',
			             		'mi_user_collection'=>'u'
			             		))
			             ->where('u.uid=23 and g.id=u.gid and v.gid=g.id and c.vid=v.id')
			             ->select();
			            
			return $list;
		}

		/**
		 * [findUserAddress 获取用户收货地址]
		 * @author <2411233465@qq.com>
		 * @return [array] [用户收货地址数据]
		 */
		public function findUserAddress()
		{
			//使用M方法实例化 操作mi数据库的mi_goods_evaluate表
			// $userinfo = M('mi.User_collection','mi_'); 
			$userinfo = M();

			if( session('?uid') ){

				$info = $_SESSION['userinfo']['uid'];

			} 

			 // $list = $userinfo->field('u.name,u.phone,u.code,u.uid,u.proid,u.cityid,u.areid,u.townid,u.address')
			 //             ->table(
			 //             	array(
			 //             		'mi_user_address'=>'u',
			 //             		))
			 //             ->where('u.uid=23 and g.id=u.gid and v.gid=g.id and c.vid=v.id')
			 //             ->select();
			            
			return $list;
		}

		/**
		 * [findUserEdituserinfo 用户编辑信息]
		 * @author <2411233465@qq.com>
		 * @return [array] [用户数据]
		 */
		public function findUserEdituserinfo()
		{
			$userinfo = D('user');

			if( session('?uid') ){

				$uid = session('userinfo')['uid'];
				$where = 'uid ='.$uid;			

			} 
			$list = $userinfo->where($where)->select();
			                       
			return $list;
		}


		public function findDetail()
		{
			$userinfo = D('detail');

			if( session('?uid') ){

				$uid = session('userinfo')['uid'];
				$where = 'uid ='.$uid;			

			} 
			$list = $userinfo->where($where)->select();
			                       
			return $list;
		} 


	}