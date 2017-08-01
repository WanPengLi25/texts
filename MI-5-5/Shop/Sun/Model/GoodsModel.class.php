<?php
	namespace Sun\Model;

	use Think\Model;

	class GoodsModel extends Model
	{
		public function addGoods()
		{

			//实例化对象
			$Goods = M('goods');
			$GoodsVersion = M('goodsVersion');
			$GoodsPicColor = M('goodsPicColor');
			$GoodsParameter = M('goodsParameter');

			//开启事务
			$Goods->startTrans();
			//获取数据
			// 分类的ID
			$type = I('post.type');
			// 品牌的ID
			$version = I('post.version');
			// 商品名
			$goodname = I('post.goodname');
			// 商品描述
			$goodsdescribe = I('post.gooddescribe');

			//判断用户名是否正确
			// if(!preg_match("/^[\x{4e00}-\x{9fa5}]{2,12}$/u",$goodsname)){
			// 		return array(0, "商品名：中文，2~12位!");
			// }

			// //判断商品描述是否为空
			// if(empty($goodsdescribe)){
			// 		return array(0, "商品描述不能为空!");
			// }

			//构造数据
			$data['tid'] = $type;
			$data['name'] = $goodname;
			$data['status'] = 1;
			$data['goodsinfo'] = $goodsdescribe;
			$data['goodsnumber'] = mt_rand(1,99).mt_rand(1,99).mt_rand(1,99).mt_rand(1,99);
			$data['bid'] = $version;
			$data['recommend'] = 0;
			$data['sale'] = 0;

			$gid = $Goods->add($data);
			if( !$gid )
				return array(0, '商品添加失败！');

			// 版本集合数组
			$edi = I('post.edi');
			
			for ( $i = 0; $i < count($edi); $i++ ) {
				// 初始化
				$data = '';

				$data['gid'] = $gid;
				// 价格
				$data['price'] = $edi[$i]['price'];
				// 版本名
				$data['vname'] = $edi[$i]['bname'];
				// 版本描述
				$data['vinfo'] = $edi[$i]['describe'];
				//版本id
				$vid = $GoodsVersion->add($data);
				if( !$vid ) {
					//回滚
					$Goods->rollback();
					return array(0, '第'.($i+1).'个版本写入出错！');
				}

				// 获取颜色的集合
				$colors= $edi[$i]['shuxing']['colour'];
				// 获取颜色进制的集合
				$colournum = $edi[$i]['shuxing']['colournum'];
				
				// 获取库存的集合
				$stock = I('post.edi')[$i]['shuxing']['stock'];

				for( $j = 0; $j < count($colors); $j++ ) {

					//上传封面
					$pic['pic']['name'] = $_FILES['edi']['name'][$i]['shuxing'][$j]['pic'];
					$pic['pic']['type'] = $_FILES['edi']['type'][$i]['shuxing'][$j]['pic'];
					$pic['pic']['tmp_name'] = $_FILES['edi']['tmp_name'][$i]['shuxing'][$j]['pic'];
					$pic['pic']['error'] = $_FILES['edi']['error'][$i]['shuxing'][$j]['pic'];
					$pic['pic']['size'] = $_FILES['edi']['size'][$i]['shuxing'][$j]['pic'];
					$saveNameF = $vid.'-'.$j;
					if ( !empty($_FILES) ) {
						$fileInfo = $this->upload( $pic, $gid, $saveNameF );
						if ( $fileInfo['code'] ==404 ) {
		                    // return $fileInfo['msg'];
		                    return array(0, '第'.($i+1).'个版本的第'.($j+1).'种颜色的封面：'.$fileInfo['msg']);
		                } else {
		                	$cover =$fileInfo['msg'];
		                }
					}
					//初始化			
					$pic = '';
					$baseName = $type.$vid.$j;
					$pics = [];
					for( $k = 0; $k < count($_FILES['edi']['name'][$i]['shuxing'][$j]) - 1; $k++ ) {

						$pic['pic']['name'] = $_FILES['edi']['name'][$i]['shuxing'][$j][$k];
						$pic['pic']['type'] = $_FILES['edi']['type'][$i]['shuxing'][$j][$k];
						$pic['pic']['tmp_name'] = $_FILES['edi']['tmp_name'][$i]['shuxing'][$j][$k];
						$pic['pic']['error'] = $_FILES['edi']['error'][$i]['shuxing'][$j][$k];
						$pic['pic']['size'] = $_FILES['edi']['size'][$i]['shuxing'][$j][$k];
						$saveNameC = $baseName.'-'.$k;
						if ( !empty($_FILES) ) {
							$fileInfo = $this->upload($pic, $gid, $saveNameC);
							if ( $fileInfo['code'] ==404 ) {
	                    		return array(0, '第'.($i+1).'个版本的第'.($j+1).'种颜色的第'.($k+1).'张图片:'.$fileInfo['msg']);
	           				} else {
	           					$pics[] = explode('-',$fileInfo['msg'])[1];
	           				}
	              		} 
					}

					//初始化
					$data = '';
					$data['vid'] = $vid;
					$data['color'] = $colournum[$j];
					$data['colorname'] = $colors[$j];
					$data['invertory'] = $stock[$j];
					$data['pic'] = implode(',',$pics);
					$data['basename'] = $baseName;
					$data['cover'] = $cover;
					$res = $GoodsPicColor->add($data);
					if ( !$res ) {
						// 回滚
						$GoodsPicColor->rollback();
						deleteAll(__ROOT__.'/Public/imgs/'.$gid);
						return array( 0, '第'.($i+1).'个版本的第'.($j+1).'种颜色添加失败!');
					}
				}
	
			}
			// 获取参数名的集合
			$parametername = I('post.parametername');
			// 获取参数值的集合
			$parameter = I('post.parameter');

			for ( $j = 0; $j < count($parametername); $j++ ) {
				// 获取参数名
				$data['gid'] = $gid;
				$data['pname'] = $parametername[$j];
				$data['ptext'] = $parameter[$j];
				$res = $GoodsParameter->add($data);
				if ( !$res ) {
					$GoodsParameter->rollback();
					return array(0, '第'.($j+1).'个参数添加失败!');
				}
			}
			$Goods->commit();
			$GoodsVersion->commit();
			$GoodsPicColor->commit();
			$GoodsParameter->commit();

			return array(1, '添加商品成功，继续添加详情！', $gid);	
		}
		// 添加详情表
		public function goodsDetail()
		{
			$gid = I('post.gid');
			$pic = '';
			$pics = [];
			$son = $gid.'son';
			for ( $i = 0; $i < count($_FILES['basename']['name']); $i++ ) {
				$pic['pic']['name'] = $_FILES['basename']['name'][$i];
				$pic['pic']['type'] = $_FILES['basename']['type'][$i];
				$pic['pic']['tmp_name'] = $_FILES['basename']['tmp_name'][$i];
				$pic['pic']['error'] = $_FILES['basename']['error'][$i];
				$pic['pic']['size'] = $_FILES['basename']['size'][$i];
				$saveNameC = $gid.'-'.$i;

				if ( !empty($_FILES) ) {
					$fileInfo = $this->upload($pic, $son, $saveNameC);

					if ( $fileInfo['code'] ==404 ) {

                		return array(0, '第'.($i+1).'张图片:'.$fileInfo['msg']);
       				} else {

       					$pics[] = explode('-',$fileInfo['msg'])[1];

       				}
          		}

			}
			$data['gid'] = $gid;
			$data['pic'] = implode(',',$pics);
			$data['basename'] = $gid;
			$res = M('GoodsDetail')->add($data);
			if ( !$res ) {

				return array(0, '添加数据库失败');
			} else {
				return array(1, '添加成功');
			}
		}
		/**
		 * upload 上传方法 用于上传图片
		 * @param  array $files 上传文件数据
		 * @return array  信息(状态号，信息)
		 */
		protected function upload($files, $gid, $saveNameC )
	    {

	    	// dump($files);
	        $upload = new \Think\Upload();

	        $upload->maxSize = 3145728;

	        // 设置附件上传类型
	        $upload->exts   =   array('jpg', 'gif', 'png', 'jpeg');

	        //设置根目录
	        $upload->rootPath = './Public/imgs/';
	        // 开启子目录
			$upload->autoSub = true;
			$upload->subName = $gid;
	        $upload->saveName = $saveNameC;

	        // 设置附件上传目录

	        $info   =   $upload->upload($files);
	        if (!$info) {
	            return array(
	                'msg' => $upload->getError(),
	                'code' => 404
	            );
	        } else {
	            return array(
	                'msg' => $info['pic']['savename'],
	                'code' => 200
	            );
	        }
	    }
	    public function selectGoods()
	    {
	    	if ( IS_GET ) {

	    		// 搜索商品ID
	    		if ( !empty(I('get.id') ) ) {

	    			$id = I('get.id');
	    			$where['id'] = array('like',"%$id%");
	    		}
	    		$where['_logic'] = 'or';
	    		// 搜索分类名
	    		if ( !empty(I('get.typename') ) ) {

	    			$typenames = I('get.typename' );

	    			$type['typename'] = array('like',"%$typenames%");

	    			$tid = M('Type')->where($type)->field('id')->select();

	    			if ( !empty(count($tid) ) ) {

		    			for ( $i = 0; $i < count($tid); $i++ ) {
		    				$tids[] = implode(',',$tid[$i]);
		    			}
			    			$where['tid'][] = array('in',$tids);
	    			} else {
	    				$where['tid'][] = array('in','0');
	    			}
	    		} 
	    		// 搜索品牌名
	    		if ( !empty(I('get.brands') ) ) {

	    			$brands = I('get.brands');
	    			$bname['brands'] = array('like',"%$brands%");
	    			$bid = M('brands')->where($bname)->field('id')->select();
	    			if ( !empty(count($bid) ) ) {

		    			for ( $i = 0; $i < count($bid); $i++ ) {
		    				$bids = implode(',',$tid[$i]);
		    			}    			
		    			$where['bid'][] = array('in',$bids);
	    			} else {
	    				$where['bid'][] = array('in','0');
	    			}
	    		}
	    		// 搜索状态
	    		if ( !empty(I('get.status') ) ) {
	    			$status = I('get.status');
	    			if ( $status == 1){

		    			$where['status'] = array('like',1);
	    			} else {
	    				$where['status'] = array('like',0);
	    			}
	    		}
	    		// 搜索推荐
	    		$where['_logic'] = 'or';
	    		if ( !empty(I('get.recommend') ) ) {
	    			$recommend = I('get.recommend');
	    			if ( $recommend == 1 ) {

		    			$where['recommend'] = array('like',1);
	    			} else {
	    				$where['recommend'] = array('like',0);
	    			}
	    		}
	    		// 销量的排序
	    		if ( !empty(I('get.sale') ) ) {
	    			$sale = I('get.sale');
	    			if ( $sale == 1 ) {
		    			$order = 'sale';
		    			$sort = 'asc';
	    			} else {
	    				$order = 'sale';
	    				$sort = 'desc';
	    			}
	    		} else {
	    			$order = 'id';
	    			$sort = 'desc';
	    		}

		    	$goods = M('Goods');
		    	$ros = $goods->where($where)->count();
		    	$page = new \Think\Page($ros,8);
					// 分页显示	
				$show = $page->show();
				// 进行分页数据查询
				$list = $goods->
	    			order("$order $sort")
	    			->limit($page->firstRow.','.$page->listRows)
	    			->where($where)
	    			->select();
				if ( $list ) {
					return array('sp'=>$list,'fy'=>$show);
				}
	    	} 
	    }
	    // 查看版本的AJAX
	   public function ajaxVersionGoods()
	   {
	   		if ( IS_GET ) {
	   			$gid = I('get.id');
	   			$res = M('GoodsVersion v');
	   			$version = $res->query("select v.id,v.gid,v.price,v.vname,group_concat(c.id),group_concat(c.color),group_concat(v.vinfo),group_concat(c.invertory),group_concat(c.colorname),group_concat(c.basename),group_concat(c.pic,'-') from mi_goods_version v  left join mi_goods_pic_color c on  v.id=c.vid where gid = $gid group by v.id");

	   			$num = count( $version );
	   			// dump($num);
	   			for ( $i = 0; $i < $num; $i++ ) {
	   				// dump($version[$i]);
	   				//商品ID
	   				$group['gid'] = $gid;
	   				// 获取版本ID
	   				$group['vid'][] = $version[$i]['id'];
	   				// 获取价格
	   				$group['price'][] = $version[$i]['price'];
	   				// 获取版本名
	   				$group['vname'][] = $version[$i]['vname'];
	   				// 获取图片表ID
	   				$group['pid'][] = explode(',',$version[$i]['group_concat(c.id)']);
	   				// 获取颜色
	   				$group['color'][] = explode(',',$version[$i]['group_concat(c.color)']);
	   				// 获取库存
	   				$group['invertory'][] = explode(',',$version[$i]['group_concat(c.invertory)']);
	   				// 获取颜色名
	   				$group['colorname'][] = explode(',',$version[$i]['group_concat(c.colorname)']);
	   				// 商品图片基本名
	   				$group['basename'][] = explode(',',$version[$i]['group_concat(c.basename)']);
	   				// dump($group);
	   				$group['vinfo'][] = explode(',',$version[$i]['group_concat(v.vinfo)']);
	   				// 图片
	   				$pica = $version[$i]["group_concat(c.pic,'-')"];
	   				// dump($pica);
	   				$picb = substr($pica, 0, -1);
	   				$group['pic'] = explode('-,',$picb);
	   				for ( $j = 0; $j < count($group['pic']); $j++) {

	   					$group['pic'][$j] = explode(',',$group['pic'][$j]);
	   				}

	   			}
	   			return $group;
	   				
	   		}
	   }
	   // 查看详情的AJAX
	   public function ajaxXqingGoods()
	   {
	   		$gid = I('get.id');
	   		$data['gid'] = $gid;
	   		$res = M('GoodsDetail')->where($data)->select();
		   		$pic[] = $res[0]['basename'];
		   		$pic['pic'] = explode(',',$res[0]['pic']);

		   		return $pic;
	   }
	   // 删除的AJAX
	   public function ajaxDeleteGoods()
	   {
	   		if ( IS_GET ) {
				// 实例化
				// 规格参数表
				$GoodsParameter = M('GoodsParameter');
				// 详情表
				$GoodsDetail = M('GoodsDetail');
				// 图片表
				$GoodsPicColor =M('GoodsPicColor');
				// 版本表
				$GoodsVersion = M('GoodsVersion');
				// 商品表
				$Goods = M('goods');
	   			//开启事务
				$Goods->startTrans();
				// 接收商品ID
	   			$gid = I('get.id');
	   			// 通过商品ID删除版本表
	   			$res = $GoodsParameter->where('gid='.$gid)->delete();
	   			if ( !$res ) {
	   	 			// 删除失败，回滚
	   				$GoodsParameter->rollback();
					return array(0, '参数表删除失败');
	   			}
				if ( file_exists('./Public/imgs/'.$gid.'son/') ) {
					$url = './Public/imgs/'.$gid.'son/';
					$urls = deldir($url);
					if( !$urls ){
					    return array(0, "删除详情数据失败");
					}	
				}
				// // 删除详情表
				$dres = $GoodsDetail->where('gid='.$gid)->delete();
				if ( !$dres ) {
	   	 			// 删除失败，回滚
	   				$GoodsDetail->rollback();
					return array(0, '详情表删除失败');
	   			}
	   			// 通过商品ID找到版本表的ID
	   			$vid = $GoodsVersion->where('gid='.$gid)->field('id')->select();
	   			for ( $i = 0; $i < count($vid); $i++ ) {
	   				$vids[] = $vid[$i]['id'];
	   				$vidss = implode(',',$vids);
	   			}
		   		// 通过版本ID找到图片表 获取图片地址删除
	   			$maps['vid'] = array('in',$vidss);
   				// 判断文件夹是否存在
   				if ( file_exists('./Public/imgs/'.$gid) ) {
	   				$urlss = deldir('./Public/imgs/'.$gid);
	   				if( !$urlss ){
						    return array(0,"删除图片数据失败");
						}			
	   			}
	   			// 通过版本ID将图片表删除
	   			$did = $GoodsPicColor->where($maps)->delete();
	   			if ( !$did ) {
	   				// 删除失败，回滚
	   				$GoodsPicColor->rollback();
					return array(0, '图片表删除失败');
	   			}
	   			// 通过商品ID删除版本表
	   			$dvid = $GoodsVersion->where('gid='.$gid)->delete();
	   			if ( !$dvid ) {
	   				// 删除失败，回滚
	   				$GoodsVersion->rollback();
					return array(0, '版本表删除失败');
	   			}
	   			// 通过商品ID删除商品表
	   			$ggid = $Goods->where('id='.$gid)->delete();
	   			if ( !$ggid ) {
	   				$Goods->rollback();
					return array(0, '商品表删除失败');
	   			}
	   			$GoodsParameter->commit();
				$GoodsDetail->commit();
				$GoodsPicColor->commit();
				$GoodsVersion->commit();
				$Goods->commit();
				return array(1, '删除商品成功!');
	   		}
	   }
	   // 查看参数的AJAX
	   public function ajaxParameterGoods()
	   {
	   		$gid = I('get.id');
	   		$data['gid'] = $gid;
	   		$res = M('GoodsParameter')->where($data)->select();
	   		for ( $i = 0; $i < count($res); $i++ ) {
		   		$par['parameter'][] = $res[$i]['pname'];
		   		$par['ptext'][] = $res[$i]['ptext'];
		   		$par['pid'][] = $res[$i]['id'];		
	   		}
		   	return $par;
	   }
	   // 编辑商品的AJAX
	   public function ajaxSavaGoods()
	   {
		   	$tid = I('get.tid');
		   	$bid = I('get.bid');
		   	// 实例化
		   	$type = M('Type');
		   	$brands = M('Brands');
		   	// 查询分类表
		   	$tv = $type->where('id='.$tid)->select();
		   	$types['vname'] = $tv[0]['typename'];
		   	$types['vid'] = $tv[0]['id'];
		   	$where['id'] = array('not in',$tid);
		   	$where['status'] = 1;
		   	$res = $type->where($where)->select();
		   	// 查询品牌表
		   	$bran = $brands->where('id='.$bid)->select();
		   	$typess['bname'] = $bran[0]['brands'];
		   	$typess['bid'] = $bran[0]['id'];
		   	$wheres['id'] = array('not in',$bid);
		   	$wheres['status'] = 1;
		   	$ress = $brands->where($wheres)->select();
		   	return array($typess,$ress,$types,$res);
	   }
	   public function saveGoods()
	   {
	   		$gid = I('post.gid');
	   		$tid = I('post.tid');
	   		$bid = I('post.bid');
	   		$gname = I('post.gname');
	   		$goodsinfo = I('post.goodsinfo');
	   		// 实例化
	   		$goods = M('Goods');
	   		$data['tid'] = $tid;
	   		$data['bid'] = $bid;
	   		$data['name'] = $gname;
	   		$data['goodsinfo'] = $goodsinfo;
	   		$good= $goods->where('id='.$gid)->save($data);
	   		if ( $good ) {
	   			return 1;
	   		} else {
	   			return 0;
	   		}
	   }
	   public function ajaxSubmitGoods()
	   {
		   	// dump( I('post.'));
		   	$cname = I('post.cname');
		   	$zname = I('post.zname');
		   	$id = I('post.id');
		   	$GoodsParameter = M('GoodsParameter');
		   	$data['pname'] = $cname;
		   	$data['ptext'] = $zname;
		   	$res = $GoodsParameter->where('id='.$id)->save($data);
		   	if ( $res ) {
		   		return array(1,$data);
		   	} else {
		   		return 0;
		   	}
	   }

	}	