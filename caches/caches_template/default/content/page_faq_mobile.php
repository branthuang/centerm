<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $p_type = getcache('3897','linkage');?>

<?php $category = getcache("category_content_$siteid",'commons');?>
<?php $url = $category[30][url]?>
<?php $menu_type_search[0] =array('url' => $url, 'name' => 'All');?>
<?php $n=1; if(is_array($p_type[data])) foreach($p_type[data] AS $k => $t) { ?>
    <?php $menu_type_search[$k] = array('url'=> $url.'/f-'.$k.'/', 'name' => $t['name'])?>
<?php $n++;}unset($n); ?>
<?php $p_types = getcache(3933,'linkage');?>
<?php $p_types = $p_types['data'];?>
<?php $n=1; if(is_array($p_types)) foreach($p_types AS $k => $t) { ?>  
    <?php $menu_type_search[$k] = array('url'=> $url.'/f-'.$k.'/', 'name' => $t['name'])?>
<?php $n++;}unset($n); ?>

<?php include template("content","header"); ?>
<!--breadcrumb-->
<?php include template("content","breadcrumb"); ?>
<!--breadcrumb end-->
<!-- content -->

<div class="boxbg clear">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="search"  id="search_txt" value="<?php echo $_GET['search_txt'];?>">
        <span class="input-group-addon" style="padding:0">
            <button class="btn btn-default" style="border:none; background:none" type="button" onclick="search()">Search</button></span>
    </div>
    <script>
        function search() {
            var search_txt = $('#search_txt').val();
            if (search_txt) {
                location.href = "<?php echo $url;?>" + "/s-" + search_txt + "/";
            } else {
                location.href = "<?php echo $url;?>";
            }
        }
    </script>
</div>
<div class="boxbg clear">


    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <?php $where="1=1 ";?>
        <?php if($_GET['search_txt']) { ?>
            <?php $where .= " and title like '%".$_GET['search_txt']."%' ";?>
        <?php } ?>
        <?php if($_GET['product_id']) { ?>
            <?php $where .= " and rel_product_id = ". intval($_GET['product_id']);?>
        <?php } ?>
        <?php if($_GET['faq_type']) { ?>
            <?php $where .= " and (rel_faq_type = ". intval($_GET['faq_type']) ." or rel_type= ". intval($_GET['faq_type'])." )";?>
        <?php } ?>

        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"faq\" data=\"op=faq&tag_md5=f59f11635d7439c207a2082d45642b6a&action=lists&where=%24where&num=20&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$faq_tag = pc_base::load_app_class("faq_tag", "faq");if (method_exists($faq_tag, 'lists')) {$pagesize = 20;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$faq_total = $faq_tag->count(array('where'=>$where,'limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($faq_total, $page, $pagesize, $urlrule);$ct_pages = ct_pages($faq_total, $page, $pagesize, $urlrule);$data = $faq_tag->lists(array('where'=>$where,'limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
        <?php if($data) { ?>

        <?php $i=0;?>
        <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
            <?php $i++;?>
        <div class="panel panel-faq">
            <div class="panel-heading" role="tab" id="heading<?php echo $i;?>">
                <h4 class="panel-title" id="panel-title<?php echo $i;?>">
                    <a <?php if($i>1) { ?>class="collapsed" role="button"<?php } ?> role="button" data-toggle="collapse" data-parent="#accordion" 
                        href="#collapse<?php echo $i;?>" aria-expanded="true" aria-controls="collapse<?php echo $i;?>">
                        <?php echo $d['title'];?> 
                        <div  id="panel-title<?php echo $i;?>-child" class="fx <?php if($i==1) { ?>act_fx<?php } ?>"></div>
                    </a>
                </h4>
            </div>
            <div id="collapse<?php echo $i;?>" class="panel-collapse collapse 
                 <?php if($i==1) { ?>in<?php } ?>" role="tabpanel" 
                 aria-labelledby="heading<?php echo $i;?>">
                <div class="panel-body">
                    <?php echo $d['content'];?>
                </div>
            </div>
        </div>
        <?php $n++;}unset($n); ?>
        <?php } ?>
        
    </div>
    <nav class="pagination_box boxbg">
      <ul class="pagination">
        <?php echo $ct_pages;?>
      </ul>
    </nav>


</div>

<script>
    $(function(){
        $('.panel-title').click(function(){
            $(".fx").removeClass("act_fx"); 
            $("#"+this.id+"-child").toggleClass("act_fx"); 
        });
    });
</script>
<!-- content end-->
<?php include template("content","footer"); ?>