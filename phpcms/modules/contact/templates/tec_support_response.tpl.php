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
        <form name="myform" action="?m=contact&c=tec_support&a=response" method="post" id="myform">
            <input type='hidden' name='id' value='<?php echo $info['id'];?>'/>
            <table width="100%" class="table_form contentWrap">
                <tr>
                    <td>回复</td> 
                    <td>
                        <textarea name='response' style="width:400px;height:80px;"><?php echo $info['response'] ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>前台显示</td>
                    <td>
                        <input type="radio" name="is_show" value="1" id="is_show_yes" <?php if($info['is_show']=='1'){echo 'checked';} ?>/> <label for="is_show_yes">是</label>
                        <input type="radio" name="is_show" value="0" id="is_show_no" <?php if($info['is_show']=='0'){echo 'checked';} ?>/> <label for="is_show_no">否</label>
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


