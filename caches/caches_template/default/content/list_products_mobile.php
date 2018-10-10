<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $p_type = getcache('3897','linkage');?>

<?php $category = getcache("category_content_$siteid",'commons');?>
<?php $url = $category[7][url]?>
<?php $menu_type_search[0] =array('url' => $url, 'name' => 'All');?>
<?php $n=1; if(is_array($p_type[data])) foreach($p_type[data] AS $k => $t) { ?>
    <?php $menu_type_search[$k] = array('url'=> $url.'/'.$k.'/', 'name' => $t['name'])?>
<?php $n++;}unset($n); ?>

<?php include template("content","header"); ?>

<!--breadcrumb-->
<?php include template("content","breadcrumb"); ?>
<!--breadcrumb end-->
<!-- content -->
<?php if($_GET['search_txt']) { ?>
    <?php $where = " title like '%".$_GET['search_txt']."%'";?>
    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=07b694a2a761573820b602949f0366c0&action=lists&catid=%24catid&where=%24where&num=1000&order=id+DESC&page=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 1000;$page = intval(1) ? intval(1) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'where'=>$where,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$ct_pages = ct_pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'where'=>$where,'order'=>'id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
        <?php if(!empty($data)) { ?>
            <div class="boxbg">
                <div class="h5_16 cred">WE FOUND THIS</div>
                <ul class="product_list clear">
                    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <li onclick='location.href="<?php echo $r['url'];?>/<?php echo $r['title'];?>/"'>
                        <img src="<?php echo $r['thumb']?thumb($r['thumb'],270,270):(IMG_PATH.'nopic_small.gif')?>" 
                            srcset="<?php echo $r['thumb']?$r['thumb']:(IMG_PATH.'nopic_small.gif')?> 2x">
                        <h5><?php echo $r['title'];?></h5>
                        <p><?php echo $r['product_des'];?></p>
                        <a href="<?php echo $r['url'];?>/<?php echo $r['title'];?>/">More > </a>
                    </li>                        
                    <?php $n++;}unset($n); ?>
                </ul>
            </div>
        <?php } else { ?>
            Sorry, Not Fount Anything
        <?php } ?>
    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<?php } else { ?>
    <?php if($_GET['product_type']) { ?>
        <?php $type_arr[$_GET['product_type']] = $p_type['data'][$_GET['product_type']];?>
    <?php } else { ?>
        <?php $type_arr = $p_type['data'];?>
    <?php } ?>

    <?php $i=0; ?>
    <?php $n=1; if(is_array($type_arr)) foreach($type_arr AS $k => $t) { ?>
        <?php $where="product_type=".$k ;?>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c366314d6e80999381cb9da8a9eef3e3&action=lists&catid=%24catid&where=%24where&num=1000&order=listorder+desc%2C+id+DESC&page=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 1000;$page = intval(1) ? intval(1) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'where'=>$where,'order'=>'listorder desc, id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$ct_pages = ct_pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'where'=>$where,'order'=>'listorder desc, id DESC','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
            <?php if(!empty($data)) { ?>
            <div class="boxbg <?php if($i!=1 ) { ?> mtop10<?php } ?>" >
                <div class="h5_16 cred"><?php echo $t['name'];?></div>
                <ul class="product_list clear">
                    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <li onclick='location.href="<?php echo $r['url'];?>/<?php echo $r['title'];?>/"'>
                        <img src="<?php echo $r['thumb']?thumb($r['thumb'],270,270):(IMG_PATH.'nopic_small.gif')?>" 
                            srcset="<?php echo $r['thumb']?$r['thumb']:(IMG_PATH.'nopic_small.gif')?> 2x">
                        <h5><?php echo $r['title'];?></h5>
                        <p><?php echo $r['product_des'];?></p>
                        <a href="<?php echo $r['url'];?>/<?php echo $r['title'];?>/">More > </a>
                    </li>                        
                    <?php $n++;}unset($n); ?>
                </ul>
            </div>

            <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        <?php $i++;?>

    <?php $n++;}unset($n); ?>
<?php } ?>


<!-- content end-->
<?php include template("content","footer"); ?>
