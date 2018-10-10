<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><div class="partnerlog">
    <div class="all_w">
        <span>Centerm Authorized Partner</span>
        <?php $keylink = getcache('keylink', 'commons');?>
        <a href="javascript:void(0);" onclick='window.open("<?php echo $keylink['partner_login']['1'];?>")'></a>
    </div>
</div>