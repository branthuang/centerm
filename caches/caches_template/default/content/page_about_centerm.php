<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--banner-->
<div class="abanner"></div>
<div class="bannerbtm">
    <div class="banbtm-wrap">
        <div class="banbtm-txt">
            <P><?php echo $title;?></P>
            <span><?php echo $content;?></span>
        </div>
        <div class="banbtm-line"></div>
        <ul class="banbtm-ach">
            <?php $images = string2array(new_html_entity_decode($images));?>
            <?php $i=0;?>
            <?php $n=1;if(is_array($images)) foreach($images AS $img) { ?>
            <?php $i++;?>
            <li <?php if($i%3!=1) { ?>class="mleft60"<?php } ?>>
                <img src="<?php thumb($img['url'],360,220)?>" width="360" height="220" 
                 srcset="<?php echo $img['url'];?> 2x">
            </li>
            <?php $n++;}unset($n); ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<!--banner end-->

<!--快捷入口-->
<div class="all_w">
    <!--TECH ALLIANCES-->
    <div class="h3 tech-tit mtop60">TECH ALLIANCES</div>
    <div class="piclist mtop20" id="piclist" style="clear:both">
        <div class="piclist_m">
            <ul>
                <li>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"link\" data=\"op=link&tag_md5=5b0aaa1a5f309efd897213972653be50&action=lists&typeid=54\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$link_tag = pc_base::load_app_class("link_tag", "link");if (method_exists($link_tag, 'lists')) {$data = $link_tag->lists(array('typeid'=>'54','limit'=>'20',));}?>
                    <table width="1200" border="0" cellspacing="0" cellpadding="0" class="mtop20">
                        <tbody>
                            <tr>
                                <?php $k=0;?>
                                <?php $n=1;if(is_array($data)) foreach($data AS $l) { ?>
                                <?php $k++;?>
                                <td onclick="window.open('<?php echo $l['url'];?>')" style="cursor: pointer;" title="<?php echo $l['name'];?>">
                                    <img src="<?php echo thumb($l['logo'],150,66);?>" width='150' height='66' 
                                         srcset="<?php echo $l['logo'];?> 2x"/></td>
                                <?php $n++;}unset($n); ?>
                                    <?php if($k<8 ) { ?>
                                        <?php for($i=0;$i<8-$k;$i++){ ?>
                                        <td>&nbsp;</td>
                                        <?php } ?>
                                    <?php } ?>
                            </tr>
                            <tr>
                                <?php $k=0;?>
                                <?php $n=1;if(is_array($data)) foreach($data AS $l) { ?>
                                <?php $k++;?>
                                <td  onclick="window.open('<?php echo $l['url'];?>')" style="cursor: pointer;" class="text-uppercase"><?php echo $l['name'];?></td>
                                <?php $n++;}unset($n); ?>
                                <?php if($k<8 ) { ?>
                                    <?php for($i=0;$i<8-$k;$i++){ ?>
                                    <td>&nbsp;</td>
                                    <?php } ?>
                                <?php } ?>
                            </tr>
                        </tbody>
                    </table>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </li>
            </ul>
        </div>
    </div>
    <!--end TECH ALLIANCES-->

</div>
<!--end 快捷入口-->

<div class="wrapper_w1600">
    <!--CUSTOMERS-->
    <div class="all_w">
        <?php $category = getcache("category_content_$siteid",'commons');?>
        <?php $url= $category[21][url]?>
        <div class="h3 tech-tit mtop60">CUSTOMERS<a href="<?php echo $url;?>">Customers Success Stories ></a></div>
        <div class="piclist mtop20" id="piclist" style="clear:both">
            <div id="piclist_m" class="piclist_m">
                <ul>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"link\" data=\"op=link&tag_md5=367d098e8b77978e788ba69d8508ca8a&action=lists&typeid=55\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$link_tag = pc_base::load_app_class("link_tag", "link");if (method_exists($link_tag, 'lists')) {$data = $link_tag->lists(array('typeid'=>'55','limit'=>'20',));}?>
                    <?php $data_d=array(); ?>
                    <?php $i = $j = 0; ?>
                        <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
                            <?php $i++; ?>
                            <?php if($i>7 ) { ?>
                                <?php $j++;?>
                                <?php $i=0;?>
                            <?php } ?>
                            <?php $data_d[$j][] = $d;?>
                        <?php $n++;}unset($n); ?>
                        
                    <?php $n=1;if(is_array($data_d)) foreach($data_d AS $d1) { ?>    
                    <li>
                        <table width="1200" border="0" cellspacing="0" cellpadding="0" class="mtop20" class="abtd">
                            <tbody>
                                <tr>
                                    <?php $k=0; ?>
                                    <?php $n=1;if(is_array($d1)) foreach($d1 AS $d2) { ?>
                                    <?php $k++;?>
                                    <td onclick="window.open('<?php echo $d2['url'];?>')" style="cursor: pointer;" title="<?php echo $d2['name'];?>">
                                        <img src="<?php echo thumb($d2['logo'],150,66)?>" width='150' height='66' 
                                             srcset='<?php echo $d2['logo'];?> 2x'/>
                                        <p><?php echo $d2['name'];?></p>
                                    </td>
                                    <?php $n++;}unset($n); ?>      
                                    <?php if($k<8 ) { ?>
                                        <?php for($i=0;$i<8-$k;$i++){ ?>
                                        <td>&nbsp;</td>
                                        <?php } ?>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
            </div>
        </div> 
    </div>
    <a href="javascript:;" class="piclist_l" id="piclist_l" hidefocus="true" title="PRE"><b></b><span></span></a>
    <a href="javascript:;" class="piclist_r" id="piclist_r" hidefocus="true" title="NEXT"><b></b><span></span></a>
    <script type="text/javascript" src="<?php echo JS_PATH;?>/banner.js"></script>
    <!--end CUSTOMERS-->
</div>
<div class="all_w">
	<table border="0" cellspacing="0" cellpadding="0" width="100%" class="beclink">
      <tbody>
        <tr>
          <td>
          	<img src="<?php echo IMG_PATH;?>pic/Follow.png" width="86" height="86" srcset="<?php echo IMG_PATH;?>pic/Follow@2x.png 2x">
            <p>Become Centerm Partner</p>
            <a href="<?php echo $keylink['partner_login']['1'];?>" target="_blank">Sign up now ></a>
          </td>
          <td>
          	<img src="<?php echo IMG_PATH;?>pic/Openbook.png" width="83" height="84" srcset="<?php echo IMG_PATH;?>pic/Openbook@2x.png 2x">
            <p>Product List</p>
            <?php $category = getcache("category_content_$siteid",'commons');?>
            <a href="<?php echo $category['7']['url'];?>">More here ></a>
          </td>
        </tr>
      </tbody>
    </table>
</div>

<?php include template("content","footer"); ?>
