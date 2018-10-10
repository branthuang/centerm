<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<?php include template("content","breadcrumb"); ?>
<!--container-->
<div class="all_w mtop20">
    <div class="pro-zhs solu-file">
        <div class="solu-tit mtop60 mbottom40">
            <img src="<?php echo IMG_PATH;?>pic/solu_1.png" width="63" height="63" srcset="<?php echo IMG_PATH;?>pic/solu_1@2x.png 2x" class="mtop60">
            <p><?php echo $category_arr[$catid]['catname'];?></p>
        </div>
        <?php echo $content;?>
        <!-- Case Study-->
        <?php $rel_field = $rel_case; ?>
        <?php include template("content","case_study_rel"); ?>
        <!-- end Case Study-->
        <!-- Related-->
        <?php $rel_field = $rel_product; ?>
        <?php include template("content","related_products_rel"); ?>
        <!-- end Related-->
    </div>

</div>
<!--end container-->
<div class="partnerlog">
    <div class="all_w">
        <span>Centerm Authorized Partner</span>
        <a href="#"></a>
    </div>
</div>
<?php include template("content","footer"); ?>