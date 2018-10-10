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
        <form name="myform" action="?m=admin&c=news_types&a=add" method="post" id="myform">
            <table width="100%" class="table_form contentWrap">
                <tr>
                    <td>类型</td> 
                    <td>
                        <select name="info[type]">
                            <option>请选择</option>
                        <?php                        foreach ($this->types as $k=>$v){ ?>
                            <option value="<?php echo $k?>"><?php echo $v;?></option>
                        <?php } ?>
                            </select>
                    </td>
                </tr>
                <tr>
                    <td>名称</td>
                    <td><input type="text" name="info[name]" value="" style='width:400px;' class="input-text" id="name"></input></td>
                </tr>
                
            </table>

            <div class="bk15"></div>
            <input name="dosubmit" type="submit" value="<?php echo L('submit') ?>" class="button">
        </form>
    </div>
</div>
</body>
</html>


