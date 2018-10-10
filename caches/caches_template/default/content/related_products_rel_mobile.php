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
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=7dc0891ee1e8d218f6d2b177dde960ed&action=lists&catid=7&where=%24where&num=6&order=listorder+desc%2C+id+desc\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'7','where'=>$where,'order'=>'listorder desc, id desc','limit'=>'6',));}?>
<div class="boxbg mtop10">
    <div class="h5_16 cred">Related<a href="<?php echo $category['7']['url'];?>" style="float:right">more</a></div>
    <ul class="product_list clear">
        <?php $i=0;?>
        <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
        <?php $i++;?>
        <li onclick="location.href='<?php echo $d['url'];?>'">
            <img src="<?php echo $d['thumb']?thumb($d['thumb'],75,110):(IMG_PATH.'nopic_small.gif')?>" />
            <div class="gray"><?php echo $d['title'];?></div>
        </li>
        <?php $n++;}unset($n); ?>
    </ul>
</div>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    <?php } ?>
<?php } ?>