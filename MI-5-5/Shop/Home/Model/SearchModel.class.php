<?php 


	namespace Home\Model;

	use Think\Model;

	class SearchModel extends Model
	{
		//表名
		protected $tableName = 'goods';

		/**
		 * [searchGoods description]
		 * @return [type] [description]
		 */
		public function searchGoods($order)
		{
			//实例化一个对象
			$search = M('goods');

			//判断get传值
			if (IS_GET){
				$recommend = I('get.recommend',0);
				if($recommend) $where = 'and g.recommend='.$recommend;
				else $where = '';


			}
			//调用Model的方法
			// 查询满足要求的总记录数
			$res      = $search
				->query("select g.id,g.name,g.recommend,t.typename,b.brands,p.pic,v.price,p.cover from mi_goods g,mi_brands b,mi_type t,mi_goods_version v,mi_goods_pic_color p where g.name like '%$name%' ".$where." and g.tid=t.id and g.bid=b.id and g.id=v.gid and v.id=p.vid ".$order);
			$count = count($res);
			$Page       = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show       = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性

				// 接收GET传值
				$name = I('get.search');
				// 判断传过来的值是否为空
				if (!empty($name)) {
					// 把接收过来的值进行like查询
					
					// 实例化一个空的对象
					$showgoods = new Model();
					// 查询所需要的商品信息
					$goodspin = $showgoods->query("select g.id,g.name,g.recommend,t.typename,b.brands,p.pic,v.price,p.cover,p.basename from mi_goods g,mi_brands b,mi_type t,mi_goods_version v,mi_goods_pic_color p where g.name like '%$name%' ".$where." and g.tid=t.id and g.bid=b.id and g.id=v.gid and v.id=p.vid ".$order.' limit '.$Page->firstRow.','.$Page->listRows);
					echo $showgoods->getLastSql();
					// 进行数据去除处理
					$data[] = $goodspin[0];
					$gid = $goodspin[0]['id'];
					for($i = 1; $i < count($goodspin); $i++) {
						if( $goodspin[$i]['id'] != $gid ) {
							$data[] = $goodspin[$i];
							$gid = $goodspin[$i]['id'];
						}
					}
					for($i = 0; $i < count($data); $i++) {
						$data[$i]['pic'] = explode(',', $data[$i]['pic']);
					}
					// dump($data);
					return array($data, $show);
				}
		}


		public function recommendshow()
		{


		}

		

	}