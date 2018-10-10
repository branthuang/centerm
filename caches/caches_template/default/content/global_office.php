<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><div class="all_w">
	<div class="case mbottom40 mtop60 loc">
     	<div class="h3 orange">Centerm Global Offices</div>
        <table width="100%" border="0" cellspacing="5" cellpadding="0" class="table-three mtop20">
            <tbody>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"location\" data=\"op=location&tag_md5=717f7e075f3a0f462b8c764025c8294e&action=lists\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$location_tag = pc_base::load_app_class("location_tag", "location");if (method_exists($location_tag, 'lists')) {$data = $location_tag->lists(array('limit'=>'20',));}?> 
                <tr>
                  <th style="width:11%">Region</th>
                  <th>Location</th>
                  <th style="width:13%">Tel</th>
                  <th style="width:19%">Email</th>
                </tr>
                <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
                <tr>
                  <td><?php echo get_linkage($d['region'],3360);?></td>
                  <td><?php echo $d['location'];?></td>
                  <td><?php echo $d['telephone'];?></td>
                  <td><a href="mailto:<?php echo $d['email'];?>"><?php echo $d['email'];?></a></td>
                </tr>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </tbody>
        </table>
    </div>
</div>