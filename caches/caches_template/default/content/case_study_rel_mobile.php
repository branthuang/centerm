<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php if($rel_field) { ?>
    <?php $r_arr = explode('|',$rel_field);?>
    <?php $tmp = array();?>
    <?php $n=1;if(is_array($r_arr)) foreach($r_arr AS $rel) { ?>
        <?php if($rel) { ?>
        <?php $tmp[] = $rel;?>
        <?php } ?>
    <?php $n++;}unset($n); ?>
    <?php if(!empty($tmp)) { ?>
        <?php $tmp = implode(',',$tmp);?>
        <?php $where = " id in ($tmp) ";?>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=72da2c675a5c9d1d00497c3d65b38ff7&action=lists&catid=21&where=%24where&num=3&order=listorder+desc%2C+id+desc\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'21','where'=>$where,'order'=>'listorder desc, id desc','limit'=>'3',));}?>
<div class="boxbg mtop10">
    <div class="h5_16 cred">Case Study<a href="<?php echo $category['21']['url'];?>" style="float:right;">more</a></div>
    <ul class="ul_list_100">
        <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
        <li onclick="location.href='<?php echo $d['url'];?>'">
            <img src="<?php echo thumb($d['thumb'],355,143);?>"  
                 srcset="<?php echo $d['thumb'];?> 2x" width="355" height="143" />
            <div class="h5_16"><?php echo $d['title'];?></div>
            <?php echo $d['description'];?>
        </li>
        <?php $n++;}unset($n); ?>
    </ul>
</div>
       <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    <?php } ?>
<?php } ?>  