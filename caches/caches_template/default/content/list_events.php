<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<?php include template("content","breadcrumb"); ?>
<!--pro-banner-->
<div class="pro-banner1 all_w mtop20 mbottom20"><script language="javascript" src="<?php echo APP_PATH;?>index.php?m=poster&c=index&a=show_poster&id=12"></script></div>
<!--pro-banner end-->

<!--container-->
<div class="mtop20 all_w mbottom20">
    <!--treelist-->
    <ul class="newslist fr mtop20 events" id="product_list">
        <!--product list-->  
        <?php $where = "1=1 ";?>
        <?php if($_GET['year']) { ?>
            <?php $where .= " and year = ".intval($_GET['year']);?>
        <?php } ?>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=4b55989dfb0054e560d01ac24cc107ea&action=lists&catid=%24catid&where=%24where&num=20&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 20;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'where'=>$where,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$ct_pages = ct_pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'where'=>$where,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
        <?php $i=0;?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <?php $i++;?>
        <li <?php if($i!=1) { ?>class="mtop40"<?php } ?>>
            <div class="newscont">
                <div class="newstxt event">
                    <?php if($r[title]) { ?>
                    <div class="h4"><?php echo $r['title'];?></div>
                    <?php } ?>
                    <?php if($r['events_date']) { ?>
                    <p>Date : <span><?php echo $r['events_date'];?></span></p>
                    <?php } ?>
                    <?php if($r['address']) { ?>
                    <p>Add : <span><?php echo $r['address'];?></span></p>
                    <?php } ?>
                    <?php if($r['address_detail']) { ?>
                    <p>Booth No.: <span><?php echo $r['address_detail'];?></span></p>
                    <?php } ?>                   
                    <?php if($r['register_url']) { ?>
                    <a href="<?php echo $r['register_url'];?>" class="mtop20" target='_blank'>Register Now</a>
                    <?php } ?>
                </div>
                <img src="<?php echo $r['thumb']?thumb($r['thumb'],195,195):(IMG_PATH.'nopic_small.gif')?>" width="195" height="195" 
                     srcset="<?php echo $r['thumb']?$r['thumb']:(IMG_PATH.'nopic_small.gif')?> 2x">
            </div>
            <div class="clear"></div>
        </li>
        <?php $n++;}unset($n); ?>
        <!--end product list-->
        <nav class="mtop40">
            <ul class="pagination">
                <?php echo $ct_pages;?>
            </ul>
        </nav>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>        
    </ul>
    <!--end treelist-->

    <?php $category = getcache("category_content_$siteid",'commons');?>
    <?php $url = $category[14][url]?>
    <!--leftree-->
    <ul class="leftree">
        <li><a href="<?php echo $url;?>#product_list" <?php if(!$_GET['year']) { ?>class="tree-act"<?php } ?>>ALL</a></li>
        <?php $year = getcache(3921,'linkage');?>
        <?php $n=1; if(is_array($year['data'])) foreach($year['data'] AS $k => $y) { ?>
        <li><a href="<?php echo $url;?>/<?php echo $k;?>/#product_list" <?php if($k==$_GET['year']) { ?>class="tree-act"<?php } ?>><?php echo $y['name'];?></a></li>
        <?php $n++;}unset($n); ?>
    </ul>
    <!--end leftree-->

    <div class="clear"></div>
</div>
<!--end container-->

<?php include template("content","footer"); ?>
