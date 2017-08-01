<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" type="text/css" href="/MI-4-20/Public/Home/css/heart-myaddress.css">
<script type="text/javascript" src="/MI-4-20/Public/Common/jquery.js"></script>
<!-- 收货地址 -->
<div class="uc-content-box">
    <div class="box-hd">
        <!-- <div class="box-bd">
            
            <div class="user-address-list J_addressList clearfix">
                <div class="address-item address-item-new" data-type="" id="J_newAddress">
                    <i class="iconfont"></i>
                    添加新地址
                </div>
                
                        <div class="address-item J_addressItem" data-address_id="10150924124752539" data-consignee="陈旭" data-tel="189****9551" data-province_id="20" data-province_name="广东" data-city_id="233" data-city_name="广州市" data-district_id="2199" data-district_name="天河区" data-area="2199011" data-zipcode="510630" data-address="棠下街道，中山大道西191号学生宿舍区" data-tag_name="学校">
                            <dl>
                                <dt>

                                                                                <span class="tag">学校</span>                                        <em class="uname">陈旭</em>
                                </dt>
                                <dd class="utel">189****9551</dd>
                                <dd class="uaddress">广东 广州市 天河区                                        棠下街道                                        <br>棠下街道，中山大道西191号学生宿舍区 (510630)</dd>
                            </dl>
                            <div class="actions">
                                <a class="modify J_addressModify" data-id="10150924124752539" href="javascript:void(0);" data-stat-id="05bdb261c37afc34" onclick="_msq.push(['trackEvent', '73ce9fb1e71baa17-05bdb261c37afc34', 'javascript:void0', 'pcpid', '']);">修改</a>
                                <a class="modify J_addressDel" data-id="10150924124752539" data-stat-id="2a7ebd088f434839" onclick="_msq.push(['trackEvent', '73ce9fb1e71baa17-2a7ebd088f434839', '', 'pcpid', '']);">删除</a>
                            </div>
                         </div>
                </div>
        </div> -->
        <div id="form3" class="haform1">
    <form method="post" style="width: 366px;height: 400px;">
        <div id="fuck">
            <select name="pro" id="pro" style="height: 42px;width:49%;margin-bottom: 10px;">
            </select>
        </div>
        <input class="haform1finp" type="text" name="name" placeholder="姓名">
        <input class="haform1finp" type="text" name="tel" placeholder="手机号">
        <input class="haform1finp" type="text" name="pos" placeholder="邮编">
        <input class="haform1finp" type="text" name="tig" placeholder="地址标签">
        <label><input class="haform1frad" type="radio" name="def" value='1'>默认</label>
        <label><input checked class="haform1frad" type="radio" name="def" value='2'>不默认</label>
        <div class="haf1sub">
            <input id="haf1subinp" type="button" value="提交">

            <span onmousedown="form3.style.display='none';">取消</span>
        </div>
    </form>
</div>
<div class="haddress">
    <p class="hap">收货地址</p>
    <div class="hamain">
       
        <!-- <div class="hamnum">
            <dl>
                <dt>
                    <span></span>
                    <span></span>
                </dt>
                <dd></dd>
                <dd></dd>
                <dd></dd>
            </dl>
            <div class="hamnope">
                <a href="heart.php?x=3&x1=31&aid=<?=$v['id']?>">修改</a>
                <a href="action.php?a=adel&aid=<?=$v['id']?>">删除</a>
            </div>
        </div> -->

        <div class="hamnum2">
            <span onmousedown="form3.style.display='block';"><i class="fa fa-plus-circle"></i></span>
            <br>
            添加新地址
        </div>
    </div>
</div>
    </div>
</div>
<script>

    $.get(
        '<?php echo U('Personal/address');?>',
        {upid:0},
        function(data) {
            console.log(data);
            var option = '';
            option += '<option value="-1">--请选择--</option>';
            for(var i = 0; i<data.length; i++){
                option += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
            }

            $('#pro').append(option);
    }, 'json');

    $('#fuck').on('change', 'select', function () {

        var that = $(this);

        $(this).nextAll('select:visible').remove();

        if(!$('select[data-id='+$(that).val()+']').show().length){
            $.get(
               '<?php echo U('Personal/address');?>', 
                { upid:$(this).val() },
                function (data) {
                    if (data.length) {

                    var select = '<select data-id="'+$(that).val()+'" name="city" id="city" style="height: 42px;width:49%;margin-bottom: 10px;">';
                    select += '<option value="-1">--请选择--</option>';
                    for(var i = 0; i<data.length; i++) {
                        select += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                    }
                    select += '</select>';

                    that.after(select);
                    }

                },
                'json'
            );
        }
    });

    $('#haf1subinp').click(function () {

        var res = [];

        res['name'] = $('input[name=name]').val();
        res['tel'] = $('input[name=tel]').val();
        res['pos'] = $('input[name=pos]').val();
        res['tig'] = $('input[name=tig]').val();
        var def = $('input[name=def]');
        
        def.each(function () {
            if ( $(this).is(':checked') ) {
                res['def'] = $(this).val();
            }
        });

        var address = '';

        $('#fuck').find('select').each(function () {

             address += $(this).val()+',';

        });

        // console.log(address);
        $.post(
            '<?php echo U('Personal/address');?>',
             {
                cateId:address,
                cateRes:res 
            },
             function (data){

                console.log(data);
             },
             'json'
        );

    });

    </script>