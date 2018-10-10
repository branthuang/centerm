<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $keylink = getcache('keylink', 'commons');?>
<li style="text-align:center;">
    <img src="<?php echo IMG_PATH;?>pic/ws.png" width="68" height="59"  srcset="<?php echo IMG_PATH;?>pic/ws@2x.png 2x" style="margin-top:20px;">
    <a href="javascript:void(0);" onclick='window.open("<?php echo $keylink['partner_login']['1'];?>")' style="font-size:18px; display:block;">Partner Portal</a>
    <p style="font-size:14px; color:#666; line-height:5px;padding-bottom:25px;">Centerm Authorized Partner Login</p>
</li>