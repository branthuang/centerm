<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><div class="boxbg mtop10">
    <div class="h5_16 cred">Centerm Global Offices</div>
    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"location\" data=\"op=location&tag_md5=717f7e075f3a0f462b8c764025c8294e&action=lists\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$location_tag = pc_base::load_app_class("location_tag", "location");if (method_exists($location_tag, 'lists')) {$data = $location_tag->lists(array('limit'=>'20',));}?> 
    <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
    <table class="table_1 mtop10" width="100%">
        <tr>
            <td width="20%">Region</td>
            <td><?php echo get_linkage($d['region'],3360);?></td>
        </tr>
        <tr>
            <td>Location</td>
            <td><?php echo $d['location'];?></td>
        </tr>
        <tr>
            <td>Tel</td>
            <td><?php echo $d['telephone'];?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><a href="mailto:<?php echo $d['email'];?>"><?php echo $d['email'];?></a></td>
        </tr>
    </table>
    <?php $n++;}unset($n); ?>
    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
</div>  