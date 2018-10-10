<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!-- top nav end-->

<link href="<?php echo MOBILE_CSS_PATH;?>banner.css" rel="stylesheet">
<script src="<?php echo MOBILE_JS_PATH;?>banner.js" type="text/javascript"></script>
<div id="banner_box" class="box_swipe_index">
    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=d4d6eae1ce3f7f329fd260bba855900a&action=lists&catid=31&num=5&order=listorder+desc%2C+id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'31','order'=>'listorder desc, id DESC','limit'=>'5',));}?>
    <ul>        
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <li><img src="<?php echo $r['mobile_banner']?thumb($r['mobile_banner'],412,632):''?>" /></li>
        <?php $n++;}unset($n); ?>
    </ul>
    <ol>
        <?php $i=0;?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php $i++;?>
        <li <?php if($i==1) { ?>class="on"<?php } ?>></li>
        <?php $n++;}unset($n); ?>
    </ol>
    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
</div>
<script>
    $(function () {
    new Swipe($('#banner_box')[0], {
    speed: 500,
            auto: 3000,
            callback: function () {
            var lis = $(this.element).next("ol").children();
                    lis.removeClass("on").eq(this.index).addClass("on");
            }
    });
    });</script>
<?php $category = getcache("category_content_$siteid",'commons');?>
<?php $cat_product = $category['7']?>
<div class="box">
    <div class="imgbox" onclick='location.href = "<?php echo $cat_product['url'];?>"'><img src="<?php echo MOBILE_IMG_PATH;?>pic01.jpg" /></div>
    <div class="cp_name">Product</div>
    <div><?php echo $cat_product['description'];?></div>
</div>
<?php $cat_solution = $category['8']?>
<div class="box">
    <div class="imgbox" onclick='location.href = "<?php echo $cat_product['url'];?>"'><img src="<?php echo MOBILE_IMG_PATH;?>pic02.jpg" /></div>
    <div class="cp_name">Solution</div>
    <div><?php echo $cat_solution['description'];?></div>
</div>
<?php $cat_resellers = $category['27']?>
<div class="box">
    <div class="imgbox" onclick='location.href = "<?php echo $cat_product['url'];?>"'><img src="<?php echo MOBILE_IMG_PATH;?>pic03.jpg" /></div>
    <div class="cp_name">Resellers</div>
    <div><?php echo $cat_resellers['description'];?></div>
</div>

<?php include template("content","footer"); ?>
