<?php


	namespace Home\Model;

	use Think\Model;


	class ConfirmOrderModel extends Model
	{
		protected $tableName = 'area';

		public function showslesct()
		{


			$showdizhi = M('user_address');

			$liyn = $showdizhi->limit('7')->order('id desc')->select();

			// dump($liyn);
			$liyns = M('Area');

			for ( $i = 0; $i < count($liyn); $i++ ) {
				$proid = $liyn[$i]['proid'];
				$cityid = $liyn[$i]['cityid'];
				$areid = $liyn[$i]['areid'];
				$townid = $liyn[$i]['townid'];

				$proid = $liyns->where('id='.$proid)->field('name')->select();
				$liyn[$i]['pro'] = $proid[0]['name'];

				$cityid = $liyns->where('id='.$cityid)->field('name')->select();
				$liyn[$i]['city'] = $cityid[0]['name'];

				$areid = $liyns->where('id='.$areid)->field('name')->select();
				$liyn[$i]['are'] = $areid[0]['name'];

				$townid = $liyns->where('id='.$townid)->field('name')->select();
				$liyn[$i]['town'] = $townid[0]['name'];

			}
			return $liyn;
		}


	}