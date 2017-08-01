<?php  

	namespace Home\Controller;

	use Think\Controller;


	class FriendlinksController extends Controller
	{


		public function links()
		{

			$linkController = D('Friendlinks');


			$linklistassign = $linkController->friendlinks();

			// dump($linklistassign);

			$this->assign('li', $linklistassign);

			$this->display('Common/footer');

		}

	}