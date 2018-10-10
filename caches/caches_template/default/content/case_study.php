<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><div class="case mbottom40 mtop60">
    <div class="h3 orange"><a href="<?php echo $category['21']['url'];?>" class="pro-more fr mtop10">more</a>Case Study</div>
    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=5232c51f959d966ff91653325b79d345&action=lists&num=3&catid=21&order=listorder+desc%2C+id+desc\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'21','order'=>'listorder desc, id desc','limit'=>'3',));}?>
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
    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

</div>