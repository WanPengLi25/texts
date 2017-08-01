<?php 

	namespace Home\Model;

	use Think\Model;

	class FriendlinksModel extends Model
	{

		public function friendlinks()
		{
			$links = M('friendlinks');

			$liu = $links->limit(6)->select();

			return $liu;
		}
	}