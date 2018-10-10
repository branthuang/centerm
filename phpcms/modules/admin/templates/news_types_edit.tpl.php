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
        <form name="myform" action="?m=admin&c=news_types&a=edit" method="post" id="myform">
            <input type='hidden' name='id' value='<?php echo $info['id'];?>'/>
            <table width="100%" class="table_form contentWrap">
                <tr>
                    <td>类型</td> 
                    <td>
                        <?php echo $this->types[$info['type']]; ?>
                    </td>
                </tr>
                <tr>
                    <td>名称</td>
                    <td><input type="text" name="info[name]"style='width:400px;' class="input-text" id="name" value="<?php echo $info['name'];?>"></input></td>
                </tr>
            </table>

            <div class="bk15"></div>
            <input name="dosubmit" type="submit" value="<?php echo L('submit') ?>" id="dosubmit" class="button hidden">
        </form>
    </div>
</div>
</body>
</html>


