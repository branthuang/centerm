<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--main-->
<!--banner-->
<div class="focus" id="focus" style="clear:both">
    <div id="focus_m" class="focus_m">
        <ul>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=d4d6eae1ce3f7f329fd260bba855900a&action=lists&catid=31&num=5&order=listorder+desc%2C+id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'31','order'=>'listorder desc, id DESC','limit'=>'5',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <li class="li_1" style="background:url(<?php echo $r['banner_img'];?>) center 0 no-repeat #f9f9f9;" 
                    <?php if($r['url_link']) { ?>
                    onclick="window.open('<?php echo $r['url_link'];?>')"
                    <?php } ?>>
                    <a href="###" hidefocus="true"></a></li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
    </div>
    <a href="javascript:;" class="focus_l" id="focus_l" hidefocus="true" title="Pre"><b></b><span></span></a>
    <a href="javascript:;" class="focus_r" id="focus_r" hidefocus="true" title="Next"><b></b><span></span></a>
</div>
<script type="text/javascript" src="<?php echo JS_PATH;?>banner.js"></script>
<!--banner end-->

<!--快捷入口-->
<div class="all_w">
    <ul class="text_list clear">
        <?php $category = getcache("category_content_$siteid",'commons');?>
        <?php $cat_product = $category['7']?>
        <li>
            <img src="<?php echo IMG_PATH;?>image/icon-1.png" width="101" height="66" srcset="<?php echo IMG_PATH;?>image/icon-1@2x.png 2x" onclick='location.href="<?php echo $cat_product['url'];?>"' style="cursor:pointer;" />
            <h5>Product</h5><?php echo $cat_product['description'];?>
        </li>
        <?php $cat_solution = $category['8']?>
        <li>
            <img src="<?php echo IMG_PATH;?>image/icon-2.png" width="100" height="64" srcset="<?php echo IMG_PATH;?>image/icon-2@2x.png 2x" onclick='location.href="<?php echo $cat_solution['url'];?>"' style="cursor:pointer;" />
            <h5>Solution</h5><?php echo $cat_solution['description'];?>
        </li>
        <?php $cat_resellers = $category['27']?>
        <li>
            <img src="<?php echo IMG_PATH;?>image/icon-3.png" width="85" height="64" srcset="<?php echo IMG_PATH;?>image/icon-3@2x.png 2x" onclick='location.href="<?php echo $cat_resellers['url'];?>"' style="cursor:pointer;" />
            <h5>Resellers</h5><?php echo $cat_resellers['description'];?>
        </li>
    </ul>
</div>
<!--end 快捷入口-->
<?php include template("content","footer"); ?>