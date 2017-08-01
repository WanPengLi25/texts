<?php
namespace Home\Controller;

// use Think\Controller;

class IndexController extends CommonController {


    public function index(){
        
        //缓存路径
    	$staticFile = APP_PATH.MODULE_NAME.'/PageCache/'.ACTION_NAME.'.html';
    	if ( !file_exists($staticFile) ) {

            //获取头部相关信息
            $head = $this->showHead();

    		$Home = D('Home');

            //导航
            $goods['name'] = '';
            $goods['typename'] = $Home->navGoods();
            $goods['status'] = 0;

            //轮播图
            $slideshow = $Home->findslideshow();

            //站点相关
            $board[] = $Home->findBoard(0,1);
            $board[] = $Home->findBoard(1,3);

            //明星单品
            $star = $Home->topGoodsfind('sale desc', 'status=1', 10, 'id,name,goodsinfo');

            //商品展示一
            $id = $Home->findShowGoods1(2, 'tids not like "%,%" and status=1 ', '');
            if( $id ){
                $showGoods1 = $id;
            } else {
                $showGoods1 = 0;
            }

            //商品展示二
            $showGoods2 = $Home->findShowGoods2(2, 'tids like "%,%" and status=1 ', '');

            //赋值
            $this->assign('shopcar', $head['shopcar']);
            $this->assign('userInfo', $head['userInfo']);
            $this->assign('topgoods', $head['topgoods']);
            $this->assign('friends', $head['friends']);
            $this->assign('goods', $goods);
            $this->assign('slide', $slideshow);
            $this->assign('board', $board);
            $this->assign('star', $star);
            $this->assign('showGoods1', $showGoods1);
            $this->assign('showGoods2', $showGoods2);
            $data = $this->fetch();
            //缓存
    		// file_put_contents($staticFile, $data);
            //渲染模版
            $this->show($data);

    	} else {

    		$data = file_get_contents($staticFile);
    		$this->show($data);

    	}
        
    }

    /**
     * showGoodsAjax 展示商品触发的ajax
     * @return string 结果
     */
    public function showGoodsAjax ()
    {

        // 第几个模板
        $mNo = I('get.mNo');
        // 查找广告的类型
        $boardType = I('get.boardType');
        // 查找广告的数量
        $boardNum = I('get.boardNum');
        $staticFile = APP_PATH.MODULE_NAME.'/PageCache/showGoods'.I('get.id').'.html';
        if( !file_exists($staticFile) ){
            $Home = D('Home');
            $res = $Home->findGoodsByType(I('get.tid'));
            $this->assign('goods', $res);
            $this->assign('stat', I('get.tid'));
            $this->assign('typename', '热门');
            $val[] = $this->fetch('Common:showGoods'.$mNo);
            $board = $Home->findBoard($boardType,$boardNum);
            $val[] = $board;
            //缓存
            // file_put_contents($staticFile, json_encode($val));
            echo json_encode($val);
        } else {
            $data = file_get_contents($staticFile);
            echo $data;
        }
    }

    public function showRecommend ()
    {

        $Home = D('Home');
        $recommend = $Home->topGoodsfind('sale desc', 'recommend=1', 10, 'id,name,goodsinfo');
        $this->assign('recommend', $recommend);
        $data = $this->fetch('Common:recommend');
        echo json_encode($data);

    }

    public function slideGoodsAjax ()
    {

        $Home = D('Home');
        $res = $Home->findGoodsByType(I('get.tid'));
        $this->assign('goods', $res);
        $this->assign('stat', I('get.tid'));
        $this->assign('typename', I('get.typename'));
        $val = $this->fetch('Common:showGoods2');
        echo json_encode($val);

    }

}