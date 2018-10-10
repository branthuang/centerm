<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><div class="subscribe mtop20">
    <div class="bartit">Centerm Headquarters</div>
    <?php $setting_db = pc_base::load_model("extend_setting_model");?>
    <?php $where = array('key' => 'contact_infos');?>
    <?php $result = $setting_db->get_one($where);?>
    <?php $info = json_decode($result['data'], true);?>
    <ul class="sub-head mtop15">
        <li>
            <div class="head-txt"><img src="<?php echo IMG_PATH;?>pic/Bubbles.png" srcset="<?php echo IMG_PATH;?>pic/Bubbles@2x.png 2x" width="20" height="20">Sales Inquiries</div>
            <p>Call：<?php echo $info['seller_phone'];?></p>
            <p>Email：<a href="mailto:<?php echo $info['seller_email'];?>"><?php echo $info['seller_email'];?></a></p>
        </li>
        <li class="mtop10">
            <div class="head-txt"><img src="<?php echo IMG_PATH;?>pic/Bulb.png" srcset="<?php echo IMG_PATH;?>pic/Bulb@2x.png 2x" width="20" height="20">Technical Support</div>
            <p>Visit&nbsp;<a href="<?php echo $info['support_url'];?>">Centerm Community</a></p>
            <p>Email：<a href="mailto:<?php echo $info['support_email'];?>"><?php echo $info['support_email'];?></a></p>
        </li>
        <li class="mtop10">
            <?php $category = getcache("category_content_$siteid",'commons');?>
            <div class="head-txt"><img src="<?php echo IMG_PATH;?>pic/Friends.png" srcset="<?php echo IMG_PATH;?>pic/Friends@2x.png 2x" width="20" height="20">Partner Inquiries</div>
            <p><a href="<?php echo $category['27']['url'];?>">Leave your message</a> to Become Centerm Partner or Find your local Centerm partners.</p>
        </li>
    </ul>
</div>