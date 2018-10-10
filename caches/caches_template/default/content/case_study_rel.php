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
<div class="case mbottom40 mtop60">
    <div class="h3 orange"><a href="<?php echo $category['21']['url'];?>" class="pro-more fr mtop10">more</a>Case Study</div>
    <table width="1200" border="0" cellspacing="0" cellpadding="0" class="mtop40">
        <tbody>
            <tr>
                <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
                <td>
                    <a href="<?php echo $d['url'];?>">
                        <img src="<?php echo thumb($d['thumb'],355,143);?>" width="355" height="143" 
                             srcset="<?php echo $d['thumb'];?> 2x">
                        <p><?php echo $d['title'];?></p>
                    </a>
                    <p><?php echo $d['description'];?></p>
                </td>
                <?php $n++;}unset($n); ?>    
            </tr>
        </tbody>
    </table>
</div>
       <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    <?php } ?>
<?php } ?>    