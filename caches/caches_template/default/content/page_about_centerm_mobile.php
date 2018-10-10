<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!-- content -->

<!--banner-->
<div class="abanner"><img src="<?php echo MOBILE_PIC_PATH;?>abanner.png" /></div>
<div class="bannerbtm boxbg">
    <div class="banbtm-wrap">
        <div class="banbtm-txt">
            <P class="h5_18 cred t_c"><?php echo $title;?></P>
            <span><?php echo $content;?></span>
        </div>
        <ul class="ul_list_50 clear">
            <?php $images = string2array(new_html_entity_decode($images));?>
            <?php $n=1;if(is_array($images)) foreach($images AS $img) { ?>
            <li><img src="<?php echo $img['url'];?>"></li>
            <?php $n++;}unset($n); ?>    
        </ul>
        <div class="clear"></div>
    </div>
</div>
<!--banner end-->


<!--TECH ALLIANCES-->
<div class="boxbg mtop10 clear">
    <div class="h5_16 gray">TECH ALLIANCES</div>
    <div class="piclist mtop20" id="piclist" style="clear:both">
        <ul class="ul_list_25 ptop10">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"link\" data=\"op=link&tag_md5=5b0aaa1a5f309efd897213972653be50&action=lists&typeid=54\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$link_tag = pc_base::load_app_class("link_tag", "link");if (method_exists($link_tag, 'lists')) {$data = $link_tag->lists(array('typeid'=>'54','limit'=>'20',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $l) { ?>
            <li onclick="window.open('<?php echo $l['url'];?>')" >
                <img src="<?php echo thumb($l['logo'],150,66);?>">
                <?php echo $l['name'];?></li>
            <?php $n++;}unset($n); ?>
        </ul>
    </div>
</div>
<div class="boxbg mtop10 clear">
    <?php $category = getcache("category_content_$siteid",'commons');?>
    <?php $url= $category[21][url]?>
    <div  class="h5_16 gray">CUSTOMERS<a href="<?php echo $url;?>" style="float:right;">Success Stories ></a></div>
    <div class="piclist mtop20" id="piclist" style="clear:both">
        <ul class="ul_list_25 ptop10">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"link\" data=\"op=link&tag_md5=367d098e8b77978e788ba69d8508ca8a&action=lists&typeid=55\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$link_tag = pc_base::load_app_class("link_tag", "link");if (method_exists($link_tag, 'lists')) {$data = $link_tag->lists(array('typeid'=>'55','limit'=>'20',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>  
            <li>
                <img src="<?php echo thumb($d['logo'],150,66);?>">
                <?php echo $d['name'];?></li>
            <?php $n++;}unset($n); ?>
        </ul>
    </div>
</div>
<!--end TECH ALLIANCES-->
<ul class="ul_list_50 boxbg mtop10 clear">
    <li>
        <img  src="<?php echo MOBILE_PIC_PATH;?>Follow@2x.png" style="width:40px; height:40px">
        <?php $keylink = getcache('keylink', 'commons');?>
        <p class="mtop10">Become Centerm Partner<br><a href="<?php echo $keylink['partner_login']['1'];?>" class="cred mtop10">Sign up now ></a></p>       
    </li>
    <li>
        <img  src="<?php echo MOBILE_PIC_PATH;?>Openbook@2x.png" style="width:40px; height:40px">
        <?php $category = getcache("category_content_$siteid",'commons');?>
        <p class="mtop10">Product List<br><a href="<?php echo $category['7']['url'];?>" class="cred">More here ></a></p>       
    </li>
</ul>

<!-- content end-->
<?php include template("content","footer"); ?>