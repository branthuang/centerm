<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!-- content -->
<script>
    $(function() {
        //输入框获得和失去焦点
        $('#search_text').focus(function() {
            if ($('#search_text').val() == 'search') {
                $('#search_text').val('');
            }
        }).blur(function() {
            if ($('#search_text').val() == '') {
                $('#search_text').val('search');
            }
        });
        $('#search_button').click(function() {
            var search_text = $('#search_text').val();
            if(search_text!='' && search_text!='search'){
                $('#myform_pro').submit();
            }else{
                alert('Please enter search content!');
            }
            
        });
    });
</script>
<div class="boxbg clear">
    <form action="" method="post" id="myform_pro">
        <Input type="hidden" name="m"  value="content"/>
        <Input type="hidden" name="c"  value="search"/>
        <Input type="hidden" name="a"  value="m_init"/>
        <div class="input-group">

            <input type="text" class="form-control" value="<?php echo $search_text?$search_text:'search';?>" id="search_text" name="search_text">
            <span class="input-group-addon" style="padding:0">
                <button class="btn btn-default" style="border:none; background:none" type="button" id="search_button">Search</button>
            </span>
        </div>

    </form>
</div>
<?php if($list) { ?>
<?php $n=1;if(is_array($list)) foreach($list AS $val) { ?>
<div class="boxbg clear mtop5">
    <a href="<?php echo $val['url'];?>" class="cred"><?php echo $val['title'];?> <?php echo $val['product_des'];?></a>
</div>
<?php $n++;}unset($n); ?>
<?php } else { ?>
<div class="boxbg clear mtop5">
    Sorry!, We can not find anything!
</div>
<?php } ?>

<!-- content end-->
<?php include template("content","footer"); ?>
