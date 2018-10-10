<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_validator = true;
include $this->admin_tpl('header','admin');
?>

<script type="text/javascript">
<!--
    $(function() {
        $.formValidator.initConfig({autotip: true, formid: "myform", onerror: function(msg) {
            }});
    })
//-->
</script>
<div class="pad_10">
    <div class="common-form">
        <form name="myform" action="?m=faq&c=index&a=add" method="post" id="myform">
            <table width="100%" class="table_form contentWrap">
                <tr>
                    <td width="10%">分类</td>
                    <td>
                        <input type="radio" name="faq_type" id="faq_type_c" value="1" class="faq_type"/>
                        <label for="faq_type_c">产品分类</label>
                        
                        <input type="radio" name="faq_type" id="faq_type_s" value="2" class="faq_type"/>
                        <label for="faq_type_s">独立分类</label>
                    </td>
                </tr>
                
                <tr class="faq faq_type_c" style="display: none;">
                    <td>类型</td> 
                    <td><?php echo form::select_with_func(3897,'info[rel_type]','rel_type','请选择','slt_product')?></td>
                </tr>
                <tr class="faq faq_type_c" style="display: none;">
                    <td>关联产品</td>
                    <td><select name="info[rel_product_id]" id="rel_product_id"><option>请先选择类型</option></select></td>
                </tr>
                
                <tr class="faq faq_type_s" style="display: none;">
                    <td>独立分类</td> 
                    <td><?php echo form::select_with_func(3933,'info[rel_faq_type]','rel_faq_type','请选择')?></td>
                </tr>
                
                <tr>
                    <td>标题</td>
                    <td><input type="text" name="info[title]" id="title" value="" class="input-text" id="title" style="width:300px;"></input></td>
                </tr>
                <tr>
                    <td>内容</td>
                    <td><textarea name="info[content]" id="content" style="width:300px;height:80px;"></textarea></td>
                </tr>
            </table>

            <div class="bk15"></div>
            <input name="dosubmit" type="submit" value="<?php echo L('submit') ?>" class="button">
        </form>
    </div>
</div>
<script>
    $(function(){
        $('.faq_type').click(function(){
            var id = this.id;
            $('.faq').hide();
            $('.'+this.id).show();
        });
    });
function slt_product(val){
    if(val){
        $.ajax({
        type: "POST",
        url: "index.php",
        data:   "m=faq&c=index&a=ajax_slt_product&type="+val+"&pc_hash="+pc_hash,
        success: function(msg){
            if(msg){
                $('#rel_product_id').html(msg);
            }
        } 
       }); 
    }
}
</script>
</body>
</html>


