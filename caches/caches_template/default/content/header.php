<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>banner.css">
<link rel="stylesheet" href="<?php echo CSS_PATH;?>bootstrap.css">
<link rel="stylesheet" href="<?php echo CSS_PATH;?>base.css">
<link rel="stylesheet" href="<?php echo CSS_PATH;?>nav.css">
<link rel="stylesheet" href="<?php echo CSS_PATH;?>style.css">
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.11.3.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>bootstrap.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>nav.js"></script>
<script>$(document).ready(function($){$(".megamenu").megamenu();});</script>
<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
<meta name="description" content="<?php echo $SEO['description'];?>">
</head>

<body>
<!--top-->
<div class="top">  
        <!-- nav -->
        <div class="topnav ">
          <ul class="megamenu skyblue">
            <li class="logo"><a href="/"><img src="<?php echo IMG_PATH;?>image/logo.png" width="124" height="28" srcset="<?php echo IMG_PATH;?>image/logo@2x.png 2x"/></a></li>
            
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <li>
                    <?php $top_parentid = $r['catid'];?>
                    <?php if($top_parentid == 7) { ?>                    
                        <!--# 产品特殊处理 #-->
                        <a href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a>
                        <div class="megapanel">
                            <div class="all_w nav_product">
                            <?php $p_types = getcache(3897,'linkage');?>
                            <?php $p_types = $p_types['data'];?>
                            <div class="tab-content">
                                <?php $i=0;?>
                                <?php $n=1; if(is_array($p_types)) foreach($p_types AS $k => $v) { ?>
                                    <?php $i++;?>
                                    <?php $where = "product_type='$k'";?>
                                    <div role="tabpanel" class="tab-pane <?php if($i==1) { ?>active<?php } ?>" id="a<?php echo $k;?>">
                                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=af5350b337cc974879b7312000aedc2d&action=lists&catid=%24top_parentid&num=14&siteid=%24siteid&where=%24where&order=listorder+desc%2Cid+desc&return=products_arr\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$products_arr = $content_tag->lists(array('catid'=>$top_parentid,'siteid'=>$siteid,'where'=>$where,'order'=>'listorder desc,id desc','limit'=>'14',));}?>
                                            <?php if(!empty($products_arr)) { ?>
                                            <ul>
                                                <?php $n=1;if(is_array($products_arr)) foreach($products_arr AS $p) { ?>
                                                <?php $thumb = $p['thumb']?$p['thumb']:IMG_PATH.'no.jpg';?>
                                                <li onclick='location.href="<?php echo $p['url'];?>"'><img src="<?php echo thumb($thumb,100,100);?>" width="100" height="100" srcset="<?php echo $thumb;?> 2x"/><?php echo $p['title'];?></li>
                                                <?php $n++;}unset($n); ?>
                                            </ul>
                                            <?php } else { ?>
                                                No Products In <?php echo $v['name'];?>
                                            <?php } ?>
                                        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                                    </div>
                                <?php $n++;}unset($n); ?>                              
                            </div>
                                
                            <ul class="nav nav-tabs" role="tablist" id="myTab1">
                                <?php $i = 0;?>
                                <?php $n=1; if(is_array($p_types)) foreach($p_types AS $k => $v) { ?>
                                    <?php $i++;   ?>
                                    <li role="presentation" <?php if($i==1) { ?>class="active"<?php } ?>><a href="#a<?php echo $k;?>" role="tab" data-toggle="tab"><?php echo $v['name'];?></a></li>
                                <?php $n++;}unset($n); ?>
                            </ul>

                            <script>
                              $(function () {  
                                $("#myTab1 a").mousemove(function (e) {  
                                    $(this).tab('show');  
                                }); 
                              });  
                            </script>
                            </div>

                        </div>
                    <?php } else { ?>
                        <!--#二级子菜单#-->
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=a556b681be33547a973a28d326fb7849&action=category&catid=%24top_parentid&num=15&siteid=%24siteid&order=listorder+ASC&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data2 = $content_tag->category(array('catid'=>$top_parentid,'siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'15',));}?>
                            <?php if($data2) { ?>
                                <a <?php if($top_parentid==8) { ?>href="<?php echo $r['url'];?>"<?php } else { ?>href="javascript:void(0);"<?php } ?>><?php echo $r['catname'];?></a>
                                <ul class="dropdown">
                                    <?php $n=1;if(is_array($data2)) foreach($data2 AS $r2) { ?>
                                    <li><a href="<?php echo $r2['url'];?>" <?php if($r2['type'] ==2) { ?>target='_blank'<?php } ?>><?php echo $r2['catname'];?></a></li>
                                    <?php $n++;}unset($n); ?>
                                </ul>
                            <?php } else { ?>
                                <a href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a>
                            <?php } ?>
                        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    <?php } ?>                    
                </li>
                <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>            
            
            <?php $keylink = getcache('keylink', 'commons');?>
            <li class="right"><a href="#"><img src="<?php echo IMG_PATH;?>image/icon3.png" width="19" height="19" srcset="<?php echo IMG_PATH;?>image/icon3@2x.png 2x"/></a>
              <ul class="dropdown" style="position:absolute; right:0px; width:120px; text-align:center">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"link\" data=\"op=link&tag_md5=1234b90b949b0b2efb2f889c48eb427c&action=lists&typeid=64&siteid=%24siteid&linktype=0&order=desc&num=10&return=dat\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$link_tag = pc_base::load_app_class("link_tag", "link");if (method_exists($link_tag, 'lists')) {$dat = $link_tag->lists(array('typeid'=>'64','siteid'=>$siteid,'linktype'=>'0','order'=>'desc','limit'=>'10',));}?>
                <?php $n=1;if(is_array($dat)) foreach($dat AS $d) { ?>
                <li><a href="#" onclick='window.open("<?php echo $d['url'];?>")'><?php echo $d['name'];?></a></li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
              </ul>
            </li>
            <li class="right">
                <a href="javascript:void(0);" onclick='window.open("<?php echo $keylink['partner_login']['1'];?>")'>
                    <img src="<?php echo IMG_PATH;?>image/icon2.png" width="19" height="19" srcset="<?php echo IMG_PATH;?>image/icon2@2x.png 2x"/>
                </a>
            </li>
            <li class="right">
                <a href="javascript:void(0);">
                    <img src="<?php echo IMG_PATH;?>image/icon1.png" width="19" height="19" srcset="<?php echo IMG_PATH;?>image/icon1@2x.png 2x" />
                </a>
                <div class="dropdown input-group" style="position:absolute;right:100px;width:250px;text-align:center; padding:10px;">
                    <div class="input-group">
                    <input type="text" class="form-control" value="" name="search_txt" id="p_search_txt" placeholder="Product Name"/>
                    <span class="input-group-addon" style="padding:0">
                        <button class="btn btn-default" style="border:none; background:none" type="button" data-toggle="modal" data-target="#" id="product_search">Search</button>
                    </span>
                    </div
                    
                </div>
                <script>
                    $(function(){
                        //products search
                        $('#product_search').click(function(){
                            var search_txt = $('#p_search_txt').val();                            
                            if(!search_txt){
                                $('#p_search_txt').focus()
                            }
                            <?php $category = getcache("category_content_$siteid",'commons');?>
                            var p_url = "<?php echo $category['7']['url'];?>";
                            location.href = p_url + '/s-'+search_txt+'/';
                        });
                    });
                </script>
            </li>
          </ul>
        </div>
        <!-- end nav -->
</div>
<!--top end-->