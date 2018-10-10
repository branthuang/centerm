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
        <form name="myform" action="?m=location&c=index&a=add" method="post" id="myform">
            <table width="100%" class="table_form contentWrap">
                <tr>
                    <td>国家</td> 
                    <td><?php echo form::select_with_func(3360,'info[region]')?></td>
                </tr>
                <tr>
                    <td>详细地址</td>
                    <td><input type="text" name="info[location]" value="" style='width:400px;' class="input-text" id="location"></input></td>
                </tr>
                <tr>
                    <td>联系电话</td>
                    <td><input type="text" name="info[telephone]" value="" class="input-text" id="telephone"></input></td>
                </tr>
                <tr>
                    <td>联系邮箱</td>
                    <td><input type="text" name="info[email]" value="" class="input-text" id="email"></input></td>
                </tr>
            </table>

            <div class="bk15"></div>
            <input name="dosubmit" type="submit" value="<?php echo L('submit') ?>" class="button">
        </form>
    </div>
</div>
</body>
</html>


