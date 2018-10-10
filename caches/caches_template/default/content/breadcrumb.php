<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!--breadcrumb-->
<div class="bg-gray">
	<div class="all_w">
    	<div class="crumb">
            <?php $category_arr = getcache('category_content_'.$siteid,'commons');?>
            <?php if(isset($category_arr[$catid]) ) { ?>
        	<h1><?php echo $category_arr[$catid]['catname'];?></h1>
            <?php } ?>    
            <ol class="breadcrumb">
              <li><a href="<?php echo siteurl($siteid);?>">HOME</a></li>
              <?php echo catpos($catid);?>
            </ol>
                
        </div>
    </div>
</div>
<!--breadcrumb end-->