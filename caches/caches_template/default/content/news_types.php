<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $category = getcache("category_content_$siteid",'commons');?>
<div class="subscribe mtop20">
    <div class="bartit">Categories</div>
    <ul>
        <?php $where = "type=1";?>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=74bc2515d00e2719d0255cc31202646d&action=news_types&where=%24where\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'news_types')) {$data = $content_tag->news_types(array('where'=>$where,'limit'=>'20',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $type) { ?>
            <li style='cursor: pointer;<?php if($type['id'] == $_GET['typesid']) { ?>font-weight: bold;<?php } ?>' onclick='location.href="<?php echo $category['13']['url'];?>/<?php echo $type['id'];?>/"'><?php echo $type['name'];?> (<span><?php echo $type['num'];?></span> )</li>
            <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>
</div>
<div class="subscribe mtop20">
    <div class="bartit">Tags</div>
    <ul class="mtop10 tag">
        <?php $where = "type=2";?>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=74bc2515d00e2719d0255cc31202646d&action=news_types&where=%24where\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'news_types')) {$data = $content_tag->news_types(array('where'=>$where,'limit'=>'20',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $type) { ?>
            <li style='cursor: pointer;<?php if($type['id'] == $_GET['typesid']) { ?>font-weight: bold;<?php } ?>' 
                    onclick='location.href="<?php echo $category['13']['url'];?>/<?php echo $type['id'];?>/"'><?php echo $type['name'];?></li>
            <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>
</div>