<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!-- content -->
<!--breadcrumb-->
<?php include template("content","breadcrumb"); ?>
<!--breadcrumb end-->
<div class="boxbg">
    <!--newslist-->
    <?php $where = "1=1";?>
    <!--#搜索#-->
    <?php if($_GET['search_txt']) { ?>
        <?php $where .= " and title like = '%".$_GET['search_txt']."%'";?>
    <?php } ?>
    <!--#新闻分类#-->
    <?php if($_GET['typesid']) { ?>
        <?php $typesid = $_GET['typesid'];?>
    <?php } ?>
    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=f78f1cb6b1774f984c1c9cc786d47421&action=lists&catid=%24catid&typesid=%24typesid&moreinfo=1&num=5&order=id+DESC&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 5;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'typesid'=>$typesid,'moreinfo'=>'1','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$ct_pages = ct_pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'typesid'=>$typesid,'moreinfo'=>'1','order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
    <ul class="newslist">
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <li>
            <h3 class="newstit"><?php echo $r['title'];?></h3>
            <h5 class="newsdate"><?php echo date('F d, Y',$r[inputtime]);?></h5>
            <div class="newscont">
                <div class="newstxt">
                    <div class="newstxt_img"><img src="<?php echo $r['thumb']?thumb($r['thumb'],195,195):(IMG_PATH.'nopic_small.gif')?>"></div>
                    <span><?php $content = str_cut(strip_tags($r['content']),300)?>
                        <?php echo nl2br($content);?><br></span>
                    <a href="<?php echo $r['url'];?>">Read More →</a>
                </div>
            </div>
            <div class="tabar">
                <div class="tabcont mtop10">
                    <div class="tabtit">Categories</div>
                    <?php $str=""; ?>
                    <?php $where="news_key = '".$r['categories']."'";?>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=23e3d00de1d39695d38e51b7a98ce913&action=tags&where=%24where&return=tags\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'tags')) {$tags = $content_tag->tags(array('where'=>$where,'limit'=>'20',));}?>
                    <?php if($tags) { ?>
                    <?php $n=1;if(is_array($tags)) foreach($tags AS $t) { ?>
                    <?php if($str) { ?>
                    <?php $str .= ','."<span>".$t['name']."</span>";?>
                    <?php } else { ?>
                    <?php $str = "<span>".$t['name']."</span>";?>
                    <?php } ?>
                    <?php $n++;}unset($n); ?>
                    <?php } ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    <?php echo $str;?>
                </div>
                <div class="tabcont mtop10">
                    <div class="tabtit">Tags</div>
                    <span>Lenovo</span>,<span>Press Release</span>,<span>Thin Clients</span
                    <?php $str=""; ?>
                    <?php $where="news_key = '".$r['tags']."'";?>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=23e3d00de1d39695d38e51b7a98ce913&action=tags&where=%24where&return=tags\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'tags')) {$tags = $content_tag->tags(array('where'=>$where,'limit'=>'20',));}?>
                    <?php if($tags) { ?>
                    <?php $n=1;if(is_array($tags)) foreach($tags AS $t) { ?>                                
                        <?php if($str) { ?>
                        <?php $str .= ','."<span>".$t['name']."</span>";?>
                        <?php } else { ?>
                        <?php $str = "<span>".$t['name']."</span>";?>
                        <?php } ?>
                    <?php $n++;}unset($n); ?>
                    <?php } ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    <?php echo $str;?>
                </div>
            </div>
        </li>   
        <?php $n++;}unset($n); ?>
    </ul>
    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
</div>

<nav class="pagination_box boxbg">
    <ul class="pagination">
        <?php echo $ct_pages;?>
    </ul>
</nav>

<!--rightbar-->
<?php include template("content","subscribe"); ?>
<?php include template("content","news_types"); ?>
<!--end rightbar-->    

<!-- content end-->
<?php include template("content","footer"); ?>
