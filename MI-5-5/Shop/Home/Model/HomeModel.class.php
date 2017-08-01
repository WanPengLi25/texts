<?php
	namespace Home\Model;

	use Think\Model;

	class HomeModel extends Model
	{

		protected $tableName = 'goods';

		public function topGoods ()
		{

			$id = findTypeByName('手机', 'id');
			if( $id ) {
				//查找小米手机
		    	$topgoods['xm'] = $this->topGoodsfind('sale desc', 'status = 1 and name like "%小米%" and tid='.$id['id'], '6', 'id,name');
		    	//查找红米手机
		    	$topgoods['hm'] = $this->topGoodsfind('sale desc', 'status = 1 and name like "%红米%" and tid='.$id['id'], '6', 'id,name');
			} else {
				$topgoods['xm'] = 0;
				$topgoods['hm'] = 0;
			}

	        //查找平板、笔记本
	        $id1 = findTypeByName('平板', 'id');
	        $id2 = findTypeByName('笔记本', 'id');
	        $id = ($id1 == 0 ? 0 : $id1['id']).','.($id2 == 0 ? 0 : $id2['id']);
	        // dump($id);
	        if( $id !== '0,0' )
	            $topgoods['pb'] = $this->topGoodsfind('sale desc', 'status = 1 and tid in ('.$id.')', '6', 'id,name');
	        else
	            $topgoods['pb'] = 0;

	        //查找电视
	        $topgoods['ds'] = $this->topGoodsfind('sale desc', 'status = 1 and name like "%电视%"', '6', 'id,name');

	        //查找盒子、影音
	        $id1 = findTypeByName('盒子', 'id');
	        $id2 = findTypeByName('音箱', 'id');
	        $id = ($id1 == 0 ? 0 : $id1['id']).','.($id2 == 0 ? 0 : $id2['id']);
	        // $id = findTypeByName('盒子', 'id')['id'].','.findTypeByName('音箱', 'id')['id'];
	        if( $id != '0,0' )
	            $topgoods['hz'] = $this->topGoodsfind('sale desc', 'status = 1 and tid in ('.$id.')', '6', 'id,name');
	        else
	            $topgoods['hz'] = 0;

	        //查找路由器
	        $id = findTypeByName('路由器', 'id');
	        if( $id != 0 )
	            $topgoods['ly'] = $this->topGoodsfind('sale desc', 'status = 1 and tid='.$id['id'], '6', 'id,name');
	        else
	            $topgoods['ly'] = 0;

	        //查找智能硬件
	        $id = findTypeByName('智能硬件', 'id');
	        if( $id != 0 )
	            $topgoods['zn'] = $this->topGoodsfind('sale desc', 'status = 1 and tid='.$id['id'], '6', 'id,name');
	        else
	            $topgoods['zn'] = 0;

	        return $topgoods;

		}

		public function topGoodsfind ($order, $where, $limit, $field)
		{

			$res = findGoods($order, $where, $limit, $field);
			if( $res ) {
				for( $i = 0; $i < count($res); $i++ ) {
					$brand = findBrand($res[$i]['id'], 'id,price', 1)[0];
					if( $brand ) {
						$res[$i]['price'] = $brand['price'];
						$pic = findGoodsPicColor($brand['id'], 'cover', 1);
						if( $pic ) {
							$res[$i]['cover'] = $pic[0]['cover'];
						}
					}
				}
			}
			return $res;

		}

		public function navGoods ()
		{

			$typeGroup = findTypeGroup(0, 'status=1', 10);
			// dump($typeGroup);
			if( $typeGroup ) {
				for($i = 0; $i < count($typeGroup); $i++) {
					$goods = $this->navGoodsFind($typeGroup[$i]['tids']);
					if($goods) {
						$typeGroup[$i]['goods'] = $goods;
					} else {
						$typeGroup[$i]['goods'] = 0;
					}
				}
			}
			return $typeGroup;

		}


		public function navGoodsFind ($tids)
		{

			$res = findGoods('sale desc', 'status = 1 and tid in ('.$tids.')', 18, 'id,name');
			if($res) {
				for($i = 0; $i < count($res); $i++) {
					$brand = findBrand($res[$i]['id'], 'id', 1)[0];
					// dump($brand);
					if( $brand ) {
						$pic = findGoodsPicColor($brand['id'], 'cover', 1);
						if( $pic ) {
							$res[$i]['cover'] = $pic[0]['cover'];
						} else {
							$res = 0;
							break;
						}
					} else {
						$res = 0;
						break;
					}
				}
				return $res;
			}else {
				return 0;
			}

		}

		public function findslideshow ()
		{

			$slideshow = M('Shuffing');
			$res = $slideshow->where('status=1')->limit('6')->select();
			if($res) {
				return $res;
			} else {
				return 0;
			}

		}

		public function findBoard ($type, $limit='')
		{

			$board = M('Board');
			if( empty($limit) )
				$res = $board->where('status=1 and type='.$type)->select();
			else
				$res = $board->where('status=1 and type='.$type)->limit($limit)->select();
			if($res) {
				return $res;
			} else {
				return 0;
			}

		}

		public function findShowGoods1 ($vs, $where, $limit)
		{

			$res = findTypeGroup($vs, $where, $limit);
			if($res) {
				for($i = 0; $i < count($res); $i++) {
					$goods = $this->where('status=1 and tid='.$res[$i]['tids'])->limit(1)->select();
					if($goods) {
						return $res[$i];
					}
				}
				return 0;
			} else {
				return 0;
			}

		}

		public function findShowGoods2 ($vs, $where, $limit)
		{

			$tids = findTypeGroup($vs, $where, $limit);
			// $tids = explode(',', $tids[0]['tids']);
			$num = 0;
			$res = '';
			if( !count($tids) ) {
				return 0;
			} else {
				for($i = 0; $i < count($tids); $i++) {
					$types = [];
					$ids = explode( ',', $tids[$i]['tids'] );
					for( $j = 0; $j < count($ids); $j++ ) {
						if( empty($ids[$j]) ) {
							$stat = 0;
							break;
						}
						$type = M('Type')->where('id='.$ids[$j])->limit(1)->select();
						if( !$type ) {
							$stat = 0;
							break;
						} else {
							$stt = 1;
							$types[] = $type[0];
						}
						if( $this->where('tid='.$ids[$j])->limit(1)->select() ) {
							$stat = 1;
						} else {
							$stat = 0;
						}
					}
					if($stat){
						$res[] = array(
							'id' => $tids[$i]['id'],
							'tid' => $tids[$i]['tids'],
							'typename' => $tids[$i]['groupname'],
							'tids' => $types
						);
						$num += 1;
					}
					if($num == 3)
						break;
				}
				if( empty($res) )
					return 0;
				else

					return $res;
			}

		}


		public function findGoodsByType ($ids = '') 
		{

			if(empty($ids)) return 0;
			$in = '';
			if( !strpos($ids,",") ) {
				$in = '0,'.$ids;
			} else {
				$in = $ids;
			}
			$res = $this->topGoodsfind('sale desc', 'status = 1 and tid in ('.$in.')', 8, 'id,name');
			if($res) {
				return $res;
			} else {
				return 0;
			}


		}


	}