<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<?php include template("content","breadcrumb"); ?>
<!--container-->
<div class="container">
    <!--rightbar-->
    <div class="rightbar">
        <?php include template("content","subscribe"); ?>
        <?php include template("content","news_types"); ?>
    </div>

    <!--end rightbar-->
    <!--newslist-->
    <div class="news">
        <h3 class="tit-style"><?php echo $title;?></h3>
        <h5 class="date-style"><?php echo date('F d, Y',strtotime($inputtime));?></h5>
        <div class="cont-style">
            <?php echo $content;?>
        </div>
        <div class="share mtop40">
            <?php include template("content","keylink"); ?>
        </div>
    </div>
    <nav class="mtop40 relate">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=59d3146c936b0bbb61d83c4d89437c20&action=relation&relation=%24relation&id=%24id&catid=%24catid&num=5&keywords=%24rs%5Bkeywords%5D\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'relation')) {$data = $content_tag->relation(array('relation'=>$relation,'id'=>$id,'catid'=>$catid,'keywords'=>$rs[keywords],'limit'=>'5',));}?>
                <?php if($data) { ?>
                    <div class="h3">Related</div>
                    <ul class="rel-cont h5">            
                            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li>
                            <a href="<?php echo $r['url'];?>"><?php echo $r['title'];?></a>
                            <p>(<?php echo date('Y-m-d',$r[inputtime]);?>)</p>
                        </li>
                            <?php $n++;}unset($n); ?>
                    </ul>
                <?php } ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </nav>
    <nav class="mtop40 relate">
        <div class="h3">Additional Information</div>
        <?php $category = getcache("category_content_$siteid",'commons');?>
        <p class="h5"><a href="<?php echo $category['7']['url'];?>">View More</a> about Centerm Product.
            &nbsp;&nbsp;&nbsp;&nbsp; / &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="<?php echo $category['11']['url'];?>">Contact Us</a> to help your business.
        </p>
    </nav>
    <!--end newslist-->
    <div class="clear"></div>
</div>
<!--end container-->

<?php include template("content","footer"); ?>