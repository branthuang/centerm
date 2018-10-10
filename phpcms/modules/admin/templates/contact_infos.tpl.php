<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_validator = true;
include $this->admin_tpl('header');
?>
<script type="text/javascript">
</script>
<div class="pad_10">
    <div class="common-form">
        <form name="myform" action="?m=admin&c=contact_infos&a=init" method="post" id="myform">
            <table width="100%" class="table_form contentWrap">
                <tr>
                    <td width="100">销售电话：</td> 
                    <td><input type="text" name="info[seller_phone]"  class="input-text" value="<?php echo $info['seller_phone'];?>" size="30"></input></td>
                </tr>
                <tr>
                    <td>销售邮箱：</td> 
                    <td><input type="text" name="info[seller_email]" class="input-text" value="<?php echo $info['seller_email']; ?>" size="30"></input></td>
                </tr>
                <tr>
                    <td>技术支持-站点：</td> 
                    <td><input type="text" name="info[support_url]" class="input-text" value="<?php echo $info['support_url'];?>" size="30"></input></td>
                </tr>
                <tr>
                    <td>技术支持-邮箱：</td>
                    <td>
                        <input type="text" name="info[support_email]" value="<?php echo $info['support_email'];?>" class="input-text" size="30"></input>
                    </td>
                </tr>
                
            </table>
            <div class="bk15"></div>
            <input name="dosubmit" type="submit" value="<?php echo L('submit') ?>" class="button">
        </form>
    </div>
</div>
</body>
</html>

