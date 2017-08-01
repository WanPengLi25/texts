<?php
	namespace Sun\Model;

	use Think\Model;

	class BrandsModel extends Model
	{
		// 分类名限制
		protected $_validate = array(
				array('brands','require','分类名不能为空'),
				array('brands','','分类名称已经存在！',0,'unique',1),
				array('brands','/^[\x{4e00}-\x{9fa5}]{1,6}$/u','只允许输入一到六位的中文字符'),
		);
	}