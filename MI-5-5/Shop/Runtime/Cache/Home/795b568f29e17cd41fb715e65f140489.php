<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript" src="/MI-4-20/Public/Common/jquery.js"></script>
<!-- 商品评价 -->
<div class="uc-content-box">
    <div class="box-hd">
        <div class="box-hd">
            <h1 class="title">商品评价</h1>
            <div class="more clearfix" style="width: 882px;height: 57px;">
            <br/>
            <br/>
            <?php if(is_array($list)): foreach($list as $key=>$vo): if(is_array($vo[goods])): foreach($vo[goods] as $key=>$v): ?><li class="xm-goods-item">
                        <div class="figure figure-img" "><a href=""><img src="/MI-4-20/Public/imgs/<?php echo ($v["gid"]); ?>/<?php echo ($v["cover"]); ?>"></a>
                        </div>
                        <a class="biaot"  ;><?php echo ($v["gname"]); ?> <?php echo ($v["vname"]); ?> <?php echo ($v["colorname"]); ?></a><br/>
                        <p class="price"><?php echo ($v["price"]); ?></p>
                        <button>
                            <span data-gid="<?php echo ($v["id"]); ?>" data-id ="<?php echo ($vo["id"]); ?>" onmousedown="form3.style.display='block';toHidden(this);"><i  class="fa fa-plus-circle"></i>评论</span>
                        </button>
                
            
                        <div class="actions">
                            <a class="">暂不能评价</a>
                        </div>
                    </li><?php endforeach; endif; endforeach; endif; ?>
            </div>

        </div>
    </div>
 </div>
<link rel="stylesheet" type="text/css" href="/MI-4-20/Public/Common/object/css/heart-myaddress.css">
<div style="display:none;" id="form3" class="haform1">
    <form method="post" enctype="multipart/form-data" action="<?php echo U('Personal/uploadfile');?>">
    <input id="gid" type="hidden" name = 'gid'>
    <input id="did" type="hidden" name="did">
    <input id="uid" type="hidden" name="uid" value="28">
        <textarea class="haform1ftex" name="evaluate" placeholder="输入评价" style="margin: 0px -3px 10px 0px; height: 240px; width: 300px;" ></textarea>
        <label><input class="haform1frad" type="radio" name="def" value='1'>一星</label>
        <label><input class="haform1frad" type="radio" name="def" value='2'>二星</label>
        <label><input class="haform1frad" type="radio" name="def" value='3'>三星</label>
        <label><input class="haform1frad" type="radio" name="def" value='4'>四星</label>
        <label><input class="haform1frad" type="radio" name="def" value='5'>五星</label>
        <br/>
        <input type="file" name="file[]" multiple  id="file" />
        <div class="haf1sub">
            <input id="haf1subinp" type="submit" value="提交">
            <span onmousedown="form3.style.display='none';">取消</span>
        </div>
    </form>
</div>
<script type="text/javascript">
    // $('#qq').click(function () {
    //     console.log(1) 
    //     // var res = '';
    //     // $('.biaot').attr('data-id');
    //     // console.log($('.biaot').attr('data-id'));
    //     // res['evaluate'] = $('textarea[name=evaluate]').val();

    //     // var def = $('input[name=def]');

    //     // def.each(function () {
    //     //     if ( $(this).is(':checked') ) {
    //     //         res = $(this).val();
    //     //     }
    //     // });
    //     // console.log(res);
        
    //     // $.post(
    //     //     '<?php echo U('Personal/address');?>',
    //     //      {
    //     //         cateId:address,
    //     //         cateRes:res 
    //     //     },
    //     //      function (data){

    //     //         console.log(data);
    //     //      },
    //     //      'json'
    //     // );

    // });

    function toHidden(obj) {

       // console.log($(obj).attr('data-gid'));
       // console.log($(obj).attr('data-id'));
        $('#gid').attr('value',$(obj).attr('data-gid'));
        $('#did').attr('value',$(obj).attr('data-id'));
      
    }
</script>