<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header');
?>
<div id="msg" style="padding:15px;">
记录更新中，请稍候！
</div>
<script>
    $(function(){
        $.ajax({
        type: "get",
        url: "<?php echo $url;?>",
        success: function(msg){
            $('#msg').html(msg);
        } 
       }); 
    });
</script>
</body>
</html>