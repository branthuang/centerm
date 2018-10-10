<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $category = getcache("category_content_$siteid",'commons');?>
<?php $url = $category[21][url]?>
<?php $industry = getcache(3904,'linkage');?>

<?php $menu_type_search[0] =array('url' => 'javascript:void(0);', 'name' => '[ By Industry ]');?>
<?php $i = 0?>
<?php $n=1; if(is_array($industry[data])) foreach($industry[data] AS $k => $v) { ?>
<?php $i++;?>
<?php $menu_type_search[$i] = array('url'=>$url.'/industry-'.$k.'/','name'=>'&nbsp;&nbsp;&nbsp;'.$v['name']);?>
<?php $n++;}unset($n); ?>

<?php $i++;?>
<?php $menu_type_search[$i] =array('url' => 'javascript:void(0);', 'name' => '[ By Use Case ]');?>
<?php $case = getcache(3905,'linkage');?>
<?php $n=1; if(is_array($case[data])) foreach($case[data] AS $k => $v) { ?>
<?php $i++;?>
<?php $menu_type_search[$i] = array('url'=>$url.'/case-'.$k.'/','name'=>'&nbsp;&nbsp;&nbsp;'.$v['name']);?>
<?php $n++;}unset($n); ?>

<?php include template("content","header"); ?>
<!-- content -->
<!--breadcrumb-->
<?php include template("content","breadcrumb"); ?>
<!--breadcrumb end-->
<!-- content -->
<div class="boxbg mtop10">
    <ul class="ul_list_100">
        <?php $where="1=1";?>
        <?php if($_GET['industry']) { ?>
        <?php $where .= " and by_industry = $_GET[industry]";?>
        <?php } ?>
        <?php if($_GET['case']) { ?>
        <?php $where .= " and by_use_case = $_GET[case]";?>
        <?php } ?>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=0c93fbad052486993c6b2a0f06f8875d&action=lists&catid=%24catid&num=100&where=%24where\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catid,'where'=>$where,'limit'=>'100',));}?>
        <?php if($data) { ?>
            <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
            <li onclick="location.href='<?php echo $d['url'];?>'">
                <img src="<?php echo thumb($d['thumb'],355,143);?>" width="355" height="143" 
                                         srcset="<?php echo $d['thumb'];?> 2x" />
                <div class="h5_16 gray"><?php echo $d['title'];?></div>
                <?php echo $d['description'];?>
            </li>
            <?php $n++;}unset($n); ?>
        <?php } else { ?>
        No Record Here!
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>
</div>
<!-- content end-->
<?php include template("content","footer"); ?>
