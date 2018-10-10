<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<?php include template("content","breadcrumb"); ?>

<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.treemenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script>$(function(){$(".leftree").treemenu({delay:300}).openActive();});</script>
<script>$('.collapse').collapse()</script>

<?php $category = getcache("category_content_$siteid",'commons');?>
<?php $url= $category[30][url]?>
<!--container-->
<div class="all_w mtop20">
    <!--treelist-->
    <div class="treelist mtop20">
        <div class="faq-search">
            <div class="input-group mbottom20" style="width:40%; float:right">
                <input type="text" class="form-control" placeholder="search" id="search_txt" value="<?php echo $_GET['search_txt'];?>">
                <span class="input-group-addon" style="padding:0">
                    <button class="btn btn-default" style="border:none; background:none" type="button" onclick="search()">Search</button></span>
            </div>
            <div class="clear"></div>
        </div>
        <script>
           function search(){
               var search_txt = $('#search_txt').val();
               if(search_txt){
                   location.href="<?php echo $url;?>"+"/s-"+search_txt+"/";
               }else{
                   location.href="<?php echo $url;?>";
               }
           }
        </script>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            
            <?php $where="1=1 ";?>
            <?php if($_GET['search_txt']) { ?>
                <?php $where .= " and title like '%".$_GET['search_txt']."%' ";?>
            <?php } ?>
            <?php if($_GET['product_id']) { ?>
                <?php $where .= " and rel_product_id = ". intval($_GET['product_id']);?>
            <?php } ?>
            <?php if($_GET['faq_type']) { ?>
                <?php $where .= " and rel_faq_type = ". intval($_GET['faq_type']);?>
            <?php } ?>
            
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"faq\" data=\"op=faq&tag_md5=f59f11635d7439c207a2082d45642b6a&action=lists&where=%24where&num=20&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$faq_tag = pc_base::load_app_class("faq_tag", "faq");if (method_exists($faq_tag, 'lists')) {$pagesize = 20;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$faq_total = $faq_tag->count(array('where'=>$where,'limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($faq_total, $page, $pagesize, $urlrule);$ct_pages = ct_pages($faq_total, $page, $pagesize, $urlrule);$data = $faq_tag->lists(array('where'=>$where,'limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
            <?php if($data) { ?>
            
            <?php $i=0;?>
            <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
                <?php $i++;?>
                <?php if($i>1) { ?>
                    <div class="faq-line"></div>
                <?php } ?>
            <div class="panel panel-faq">
                <div class="panel-heading" role="tab">
                    <h4 class="panel-title" id="panel-title<?php echo $i;?>">
                        <a role="button" data-toggle="collapse" href="#collapse<?php echo $i;?>">
                            <?php echo $d['title'];?>
                            <div  id="panel-title<?php echo $i;?>-child" class="fx <?php if($i==1) { ?>act_fx<?php } ?>"></div>                   
                        </a>
                    </h4>
                     <div class="clear"></div>
                </div>
                <div id="collapse<?php echo $i;?>" class="panel-collapse collapse <?php if($i==1) { ?>in<?php } ?>">
                    <div class="panel-body">
                        <?php echo ereg_replace("\n", "<BR>\n", $d['content']);?>
                    </div>
                </div>
            </div>
            <?php $n++;}unset($n); ?>            
            <nav class="mtop40" style="margin: 40px auto; text-align:center">
                <ul class="pagination">
                    <?php echo $ct_pages;?>
                </ul>
            </nav>
            <?php } else { ?>
            NO RECORD HERE!
            <?php } ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

        </div>
    </div>
    <!--end treelist-->
    
    <!--leftree-->
    <ul class="leftree mbottom40">
        <li><a href="<?php echo $url;?>" <?php if(!$_GET['product_id'] && !$_GET['faq_type']) { ?>class="tree-act"<?php } ?>>ALL</a></li>
        <?php $p_types = getcache(3897,'linkage');?>
        <?php $p_types = $p_types['data'];?>
        <?php $n=1; if(is_array($p_types)) foreach($p_types AS $k => $t) { ?>                    
        <li class="toggler">
            <a href="#"><?php echo $t['name'];?></a>
            <?php $where = "product_type='$k'";?>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=47ff1a3b2d15c3dc29b1011f323e9950&action=lists&catid=7&where=%24where&order=listorder+desc%2Cid+desc\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'7','where'=>$where,'order'=>'listorder desc,id desc','limit'=>'20',));}?>
            <ul>
                <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
                <li><a href="<?php echo $url;?>/p-<?php echo $d['id'];?>/" <?php if($_GET['product_id']==$d['id']) { ?>class="tree-act active"<?php } ?>><?php echo $d['title'];?></a></li>
                <?php $n++;}unset($n); ?>
            </ul>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </li>
        <?php $n++;}unset($n); ?>
        
        <?php $p_types = getcache(3933,'linkage');?>
        <?php $p_types = $p_types['data'];?>
        <?php $n=1; if(is_array($p_types)) foreach($p_types AS $k => $t) { ?>  
        <li><a href="<?php echo $url;?>/f-<?php echo $t['linkageid'];?>/" <?php if($_GET['faq_type']==$k) { ?>class="tree-act"<?php } ?>><?php echo $t['name'];?></a></li>
        <?php $n++;}unset($n); ?>
        
        <?php include template("content","partner_login"); ?>
    </ul>
    <!--end leftree-->

    <div class="clear"></div>
</div>
<script>
    $(function(){
        $('.panel-title').click(function(){
            $("#"+this.id+"-child").toggleClass("act_fx"); 
        });
    });
</script>
<!--end container-->
<?php include template("content","footer"); ?>