<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><div class="boxbg mtop10">
    <div class="h5_16 cred">Centerm Headquarters</div>
    <?php $setting_db = pc_base::load_model("extend_setting_model");?>
    <?php $where = array('key' => 'contact_infos');?>
    <?php $result = $setting_db->get_one($where);?>
    <?php $info = json_decode($result['data'], true);?>
    <ul class="ul_f_l_3 mtop10">
        <li>
            <div class="icon_l_1"><img src="<?php echo MOBILE_PIC_PATH;?>Bubbles.png" srcset="<?php echo MOBILE_PIC_PATH;?>Bubbles@2x.png 2x" width="20" height="20"></div>
            <p>Sales Inquiries</p>
            <p>Call：<?php echo $info['seller_phone'];?></p>
            <p>Email：<a href="mailto:<?php echo $info['seller_email'];?>"><?php echo $info['seller_email'];?></a></p>
        </li>
        <li class="mtop10">
            <div class="icon_l_1"><img src="<?php echo MOBILE_PIC_PATH;?>Bulb.png" srcset="<?php echo MOBILE_PIC_PATH;?>Bulb@2x.png 2x" width="20" height="20"></div>
            <p>Technical Support</p>
            <p>Visit&nbsp;<a href="<?php echo $info['support_url'];?>">Centerm Community</a></p>
            <p>Email：<a href="mailto:<?php echo $info['support_email'];?>"><?php echo $info['support_email'];?></a></p>
        </li>
        <li class="mtop10">
            <?php $category = getcache("category_content_$siteid",'commons');?>
            <div class="icon_l_1"><img src="<?php echo MOBILE_PIC_PATH;?>Friends.png" srcset="<?php echo MOBILE_PIC_PATH;?>Friends@2x.png 2x" width="20" height="20"></div>
            <p>Partner Inquiries</p>
            <p><a href="<?php echo $category['27']['url'];?>">Leave your message</a> to Become Centerm Partner or Find your local Centerm partners.</p>
        </li>
    </ul>    
</div>  