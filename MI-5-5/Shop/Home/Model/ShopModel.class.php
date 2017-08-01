<?php

	namespace 	Home\Model;

	use 	Think\Model;

	class ShopModel extends Model
	{

		protected $tableName = 'goods';

		public function shopcart()
		{
			$gid = I('post.gid');
			$vid = I('post.vid');
			$pid = I('post.pid');
			// $gid = 2;
			// $vid = 2;
			// $pid = 4;

			$did = array($gid,$vid,$pid);
			$did = implode($did);
			// session('shopCart',null);

			if( session('?shopCart') ) {
				$shopCart = session('shopCart');
			} else {
				$shopCart['goods'] = [];
				$shopCart['tote'] = 0;
				$shopCart['total'] = 0;
			}

			// 实例化一个对象
			$model = M();

			// 查询数据
			$res = $model->field('g.name,v.price,v.vname,c.cover,c.colorname')->table(array('mi_goods'=>'g','mi_goods_version'=>'v','mi_goods_pic_color'=>'c'))->where('g.id='.$gid.' and v.id='.$vid.' and c.id='.$pid)->limit(1)->select();
			$res[0]['gid'] = $gid;
			$res[0]['vid'] = $vid;
			$res[0]['pid'] = $pid;	
			$res[0]['num'] = 1;			
			$res[0]['sum'] = $res[0]['price'];

			$shopCart['goods'][$did] = $res[0];
			$shopCart['tote'] += 1;
			$shopCart['total'] += $res[0]['price'];

			$val = $shopCart['goods'];
			$total = $shopCart['total'];
			$tote = $shopCart['tote'];
			// 将结果集存入session()
			session('shopCart', $shopCart);

			// 返回数据
			return array('goods'=>$val, 'tote'=>$tote, 'total'=>$total);

		}


		public function showShopCart ()
		{

			if( session('?shopCart') ) {
				$shopCart = session('shopCart');
				return array(
					'goods'=>$shopCart['goods'], 
					'tote'=>$shopCart['tote'], 
					'total'=>$shopCart['total']
					);
			} else {
				return 0;
			}

		}

 	

	}