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
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=747e1d13dd1f468c0b332a5e000c0b88&action=lists&catid=7&where=%24where&num=7&order=listorder+desc%2C+id+desc\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'7','where'=>$where,'order'=>'listorder desc, id desc','limit'=>'7',));}?>
<div class="related mbottom40 mtop60">
    <div class="h3 orange mbottom40"><a href="<?php echo $category['7']['url'];?>" class="pro-more fr mtop10">more</a>Related</div>
    <table width="1200" border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
                <?php $i=0;?>
                <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
                <?php $i++;?>
                <td>
                    <a href="<?php echo $d['url'];?>">
                        <img src="<?php echo $d['thumb']?thumb($d['thumb'],100,110):(IMG_PATH.'nopic_small.gif')?>" width="100" height="110" 
                             srcset="<?php echo $d['thumb'];?> 2x">
                        <p><?php echo $d['title'];?></p>
                    </a>
                </td>
                <?php $n++;}unset($n); ?>
                <?php for($k=0;$k < 7-$i;$k++){?>
                <td>&nbsp;</td>
                <?php }?>
            </tr>
        </tbody>
    </table>
</div>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    <?php } ?>
<?php } ?>