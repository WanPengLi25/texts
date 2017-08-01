<?php
	namespace Home\Model;

	use Think\Model;

	class GoodsListModel  extends Model
	{

		protected $tableName = 'goods';


		/**
		 * findGoods 查找商品
		 * @return mixed  0 or array
		 */
		public function findGoods ()
		{

			// 获取数据
			$tids 	= I('get.tid');
			$bid 	= empty(I('get.bid')) ? 0 : I('get.bid');
			$ord 	= empty(I('get.order'));
			//判断tids的类型
			if( !strpos($tids,",") ) {
				if( $tids == 0 ) {
					//查找分类的模式,条件
					$twhere 		= [2, 'status=1'];
					//前端分类导航是否显示
					$msg['tview'] 	= 1;
					//查找商品的条件
					$gwhere 		= 'g.status=1';
					if( $bid ) {
						$gwhere .= ' and g.bid='.$bid;
					}
				} else {
					//查找分类的模式,条件
					$twhere = [1, 'status=1 and id='.$tids];
					//前端分类导航是否显示
					$msg['tview'] = 0;
					//查找商品的条件
					$gwhere = 'g.status=1 and g.tid='.$tids;
					//分类名
					$tname = $this->findType('id='.$tids, 1);
					if( $tname[1] ) $tname = $tname[1][0]['typename'];
					else $tname = $tname[1];
				}
			} else {
				//查找分类的模式,条件
				$twhere = [1, 'status=1 and id in ('.$tids.') '];
				//前端分类导航是否显示
				$msg['tview'] = 1;
				//查找商品的条件
				$gwhere = 'g.status=1 and g.tid in ('.$tids.') ';
				//分类名
				$tname = M('TypeGroup')->where('tids="'.$tids.'"')->select();
				if($tname) $tname = $tname[0]['groupname'];
			}
			if( !$ord ) {
				$order = 'v.price '.$ord.',';
				if( $ord == 'asc' )
					$msg['order'] = 'desc';
				else
					$msg['order'] = 'asc';
			} else {
				$gwhere 		.= ' and g.recommend=1';
				$order 			= '';
				$msg['order'] 	= 'asc';
			}
			// dump($gwhere);

			//是否显示品牌
			if( !$bid ) {
				$msg['binfo']['bid'] 	= 0;
				$msg['binfo']['bname'] 	= 0;
				$msg['binfo']['bview'] 	= 0;
			} else {
				//品牌名
				$bname = M('brands')->where('id='.$bid)->select();
				if($bname) $bname = $bname[0]['brands'];
				else $bname = 0;
				$msg['binfo']['bid'] 	= $bid;
				$msg['binfo']['bname'] 	= $bname;
				$msg['binfo']['bview'] 	= 1;
			}

			//分类
			$typeList = $this->findType($twhere[1], $twhere[0]);
			$msg['typeList'] = $typeList;

            
			//面包屑
			if($tids != 0){
				$typename = '<a href="'.U( 'GoodsList/showGoodsList', array( 'tid'=>0,'typename'=>'全部商品' ) ).'"> 全部商品 </a><span>&gt;</span>';
				$typename .= '<a> '.$tname.' </a>';
				// $typename = str_replace("+", " ", $tname);
			} else {
				$typename = '<a href="javascript:;"> 全部商品 </a>';
			}
			$msg['typename'] 	= $typename;
			$msg['tid'] 		= $tids;

			//商品、品牌
			$model = M();
			$brand = M('Brands');
			$val = $model->field('g.id,g.bid,g.name,v.price,c.pic,c.basename')
			             ->table(
			             	array(
			             		'mi_goods'=>'g',
			             		'mi_goods_version'=>'v',
			             		'mi_goods_pic_color'=>'c'
			             		))
			             ->where('v.gid=g.id and c.vid=v.id and '.$gwhere)
			             ->order($order.'g.sale desc')
			             ->select();
			//对商品进行去重
			$id = $val[0]['id'];
			for( $i = 0; $i < count($val); $i++ ) {
				$val[$i]['pic'] = explode(',', $val[$i]['pic']);
				if( count($val[$i]['pic']) > 3 ){
					$val[$i]['num'] = 3;
				} else {
					$val[$i]['num'] = count($val[$i]['pic']);
				}
				if( $i == 0 ) {
					$data[] = $val[$i];
					continue;
				}
				if( ($val[$i]['id'] != $id) && ($i != 0) ) {
					$brands[] 	= $brand->where('id='.$val[$i]['bid'])->select()[0];
					$data[] 	= $val[$i];
					$id 		= $val[$i]['id'];
				}
			}
			if(!count($brands)) {
				$brands = 0;
			} else {
				//去重
				$brands = $this->brandsUnique($brands);
			}
			$count      = count($data);// 查询满足要求的总记录数
			$Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show       = $Page->show();// 分页显示输出// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			// dump($Page->listRow);
			$p = empty(I('get.p')) ? 1 : I('get.p');
			if( $count ){
				for( $j = $Page->firstRow; $j < $p*10; $j++ ) {
					if( isset($data[$j]) ) $ndata[] = $data[$j];
				}
			} else {
				$ndata = 0;
			}
			$msg['list'] 	= $ndata;
			$msg['brands'] 	= $brands;

			return array($msg, $show);

		}

		/**
		 * findType 查找分类
		 * @param int pattern 查找模式(1:找分类2:找分类和分类组)
		 * @return array
		 */
		public function findType ( $where='status=1', $pattern=1)
		{

			$type = M('Type');

			//查找
			if( $pattern == 1 ){

				$types = $type->where($where)->select();
				if( $types ) {
					return array(0, $types);
				} else {
					return array(0, 0);
				}

			} else if( $pattern == 2 ) {

				$typeGroup = findTypeGroup(1, $where,'');
				if( $typeGroup ) {
					$TG = $typeGroup;
					$str = '';
					for( $i = 0; $i < count($typeGroup); $i++ ) {
						$str .= $typeGroup[$i]['tids'].',';
					}
					$noIn = explode(',', $str);
					//弹出数组最后一个
					array_pop($noIn);
					//去重
					$noIn = array_unique($noIn);
					//连接
					$noIn = implode(',', $noIn);
				} else {
					$TG = 0;
					$noIn = 0;
				}
				if( $noIn ) {
					$types = $type->where('status=1 and id not in ('.$noIn.')')->select();
				} else {
					$types = $type->select();
				}
				if( count($types) ) return array($TG, $types);
				return array($TG, 0);

			} else {
				$typeGroup = findTypeGroup(1, $where);
				if($typeGroup) {
					return $typeGroup;
				} else {
					return 0;
				}
			}

		}


		/**
		 * brandsUnique 品牌去重
		 * @param  aarray $brands 品牌
		 * @return array  去重后的结果
		 */
		public function brandsUnique($brands)
		{

			foreach ($brands as $k=>$v) 
			{ 
				//降维
				$v 			= join(",",$v);  
				$temp[$k] 	= $v; 
			} 
			//去掉重复的字符串,也就是重复的一维数组 
			$temp = array_unique($temp); 
			foreach ($temp as $k => $v) 
			{ 
				//再将拆开的数组重新组装 
				$array 				 	=explode(",",$v); 
				$temp2[$k]["id"] 	 	=$array[0]; 
				$temp2[$k]["brands"] 	=$array[1]; 
				$temp2[$k]["status"] 	=$array[2]; 
			}
			return $temp2;

		}



	}