<?php


	/**
	 * findTypeGroup 查找相关的分类组
	 * @param  int $vs 分类组显示模式
	 * @param  string $where 条件
	 * @param  string $limit 限制(1)
	 * @return mixed true:相关数据 false:空
	 */
	function findTypeGroup ($vs, $where='1=1', $limit = 1) 
	{
		$typeGroup = M('TypeGroup');
		if( !empty($limit) )
			$res = $typeGroup->where($where.' and vs='.$vs)->limit($limit)->select();
		else 
			$res = $typeGroup->where($where.' and vs='.$vs)->select();
		if ( !$res )  {

			return 0;

		} else {

			return $res;

		}
	}

	/**
	 * findShopCar 查找购物车
	 * @return array 相关信息
	 */
	function findShopCar ()
	{

		if( session('?shopCart') ) {
			$res['stat'] = "style='background:darkorange;color:white'";
			$res['num'] = count(session('shopCart')['goods']); 
			$res['val'] = session('shopCart')['goods'];
			return $res;
		} else {
			$res['stat'] = "";
			$res['num'] = 0; 
			$res['val'] = 0;
			return $res;
		}	

	}


	/**
	 * findHeadGoods 查找商品
	 * @param  string $order 排序方式(默认 id降序)
	 * @param  string $where 条件(默认 1=1)
	 * @param  string $limit 限制(默认 空)
	 * @param  string $field 字段 (默认 *)
	 * @return mixed true:相关数据 false:空
	 */
	function findGoods ($order="id desc", $where="1=1", $limit='', $field='*') 
	{
		$goods = M('Goods');
		if( empty($limit) )
			$res = $goods->where($where)->order($order)->select();
		else
			$res = $goods->where($where)->order($order)->limit($limit)->select();
		if( $res ) {
			return $res;
		} else {
			return 0;
		}

	}

	/**
	 * findBrand 查找版本
	 * @param  string $id 商品id
	 * @param  string $field 字段 (默认 *)
	 * @param  string $limit 限制 
	 * @return mixed true:相关数据 false:空
	 */
	function findBrand ($id, $field = '*', $limit = '')
	{

		$brands = M('goodsVersion');
		if( empty($limit) ){
			$res = $brands->where('gid='.$id)->field($field)->select();
		} else {
			$res = $brands->where('gid='.$id)->field($field)->limit($limit)->select();
		}
		if( $res ) {
			return $res;
		} else {
			return 0;
		}

	}

	function findGoodsPicColor ($vid, $field = '*', $limit = '')
	{
		if( empty($limit) ) {
			$res = M('GoodsPicColor')->where('vid='.$vid)->field($field)->select();
		} else {
			$res = M('GoodsPicColor')->where('vid='.$vid)->field($field)->limit()->select();
		}
		if($res) {
			return $res;
		} else {
			return 0;
		}

	}

	/**
	 * findTypeNameByName
	 * @param  string $typename 
	 * @param  string $field 字段 (默认 *)
	 * @return mixed true:相关数据 false:空
	 */
	function findTypeByName ($typename, $field='*') 
	{

		$res = M('Type')->field($field)->where('typename="'.$typename.'"')->select();
		if($res) {
			return $res[0];
		} else {
			return 0;
		}

	}

	function deldir($dir) {
	    $dh=opendir($dir);
	    while ($file=readdir($dh)) {
	        if($file!="." && $file!="..") {
	            $fullpath=$dir."/".$file;
	            if(!is_dir($fullpath)) {
	                unlink($fullpath);
	            } else {
	                deldir($fullpath);
	            }
	        }
	    }
	    closedir($dh);
	    if(rmdir($dir)) {
	        return true;
	    } else {
	        return false;
	    }
	}
	