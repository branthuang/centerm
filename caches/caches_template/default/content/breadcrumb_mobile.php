<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><div class="crumb clear">
    <?php $category_arr = getcache('category_content_'.$siteid,'commons');?>
    <?php if(isset($category_arr[$catid]) ) { ?>
        <h1><?php echo $category_arr[$catid]['catname'];?></h1>
    <?php } ?>    
    <ol class="breadcrumb">
        <li><a href="<?php echo siteurl($siteid);?>">Home</a></li>
        <?php echo catpos($catid);?>
    </ol>
</div>