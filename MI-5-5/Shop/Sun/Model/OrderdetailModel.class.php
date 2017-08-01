<?php

	namespace Sun\Model;

	use Think\Model;

	//定义一个订单详情表的类
	class OrderdetailModel extends Model
	{	
		//定义一个表名
		protected $tableName = 'order_detail';
		/**
		 * findAddInfo 查找时用到的数据
		 * @author  ChenGuiCai <294142682@qq.com>
		 * @return  array 返回数组
		 */	
		public function Orderdetail()
		{
			//判断传过来的数据类型
			if(IS_POST){

			}else{
				// 接收GET传过来的值
				$id = I('get.id');
				
				// 实例化一个空的对象
				$Model = new Model();
				//执行SQL语句查询操作
				$ordersql = $Model->query("select o.num,o.total,v.price,v.vname,c.colorname,c.cover, de.oid,g.goodsinfo,g.name,g.goodsnumber,g.id from mi_order_detail de,mi_order o,mi_goods_version v,mi_goods_pic_color c, mi_goods as g where de.oid=$id and g.id=o.gid and o.cid=c.id and v.id=o.vid");
				//返回查询到的结果
				return $ordersql;

			}
		}
	}