<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!-- content -->
<!--breadcrumb-->
<?php include template("content","breadcrumb"); ?>
<!--breadcrumb end-->
<div class="banner_100"><img src="<?php echo MOBILE_IMG_PATH;?>pro-banner.png" /></div>
<div class="boxbg clear">

    <select class="form-control" style="width:120px; float:right;" id="year_slt">
        <option value="">ALL</option>
        <?php $year = getcache(3921,'linkage');?>
        <?php $n=1; if(is_array($year['data'])) foreach($year['data'] AS $k => $y) { ?>
        <option value="<?php echo $k;?>" 
                <?php if($_GET['year']==$k) { ?>selected<?php } ?>>
                <?php echo $y['name'];?>
        </option>
        <?php $n++;}unset($n); ?>
    </select>
    <script>
        <?php $category = getcache("category_content_$siteid", 'commons'); ?>
        <?php $url = $category[14][url]?>
        $(function () {
        $('#year_slt').change(function(){
        var k = this.value;
                if (k){
        location.href = "<?php echo $url;?>/" + k + "/";
        } else{
        location.href = "<?php echo $url;?>";
        }
        });
        });
    </script>
</div>
<div class="boxbg">
    <ul class="eventslist">
        <?php $where = "1=1 ";?>
        <?php if($_GET['year']) { ?>
        <?php $where .= " and year = ".intval($_GET['year']);?>
        <?php } ?>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=4b55989dfb0054e560d01ac24cc107ea&action=lists&catid=%24catid&where=%24where&num=20&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 20;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'where'=>$where,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$ct_pages = ct_pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'where'=>$where,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <li style="margin-top:0; padding:0">
            <h3 class="newstit"><?php echo $r['title'];?></h3>
            <div class="newscont">
                <div class="newstxt">
                    <div class="newstxt_img"><img src="<?php echo $r['thumb']?thumb($r['thumb'],195,195):(IMG_PATH.'nopic_small.gif')?>"/></div>
                    <?php if($r['events_date']) { ?>
                    <p><span>Date :</span> <?php echo $r['events_date'];?></p>
                    <?php } ?>
                    <?php if($r['address']) { ?>
                    <p><span>Add : </span><?php echo $r['address'];?></p>
                    <?php } ?>
                    <?php if($r['address_detail']) { ?>
                    <p><span>Booth No. : </span><?php echo $r['address_detail'];?></p>
                    <?php } ?>
                    <?php if($r['register_url']) { ?>
                    <a href="<?php echo $r['register_url'];?>" target='_blank'>Read More →</a>
                    <?php } ?>
                </div>
            </div>
        </li>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>    

    </ul>
</div>

<nav class="pagination_box boxbg">
    <ul class="pagination">
        <?php echo $ct_pages;?>
    </ul>
</nav>


<!-- content end-->
<?php include template("content","footer"); ?>