<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="<?php echo $SEO['keyword'];?>">
        <meta name="description" content="<?php echo $SEO['description'];?>">

        <title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo MOBILE_CSS_PATH;?>bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo MOBILE_CSS_PATH;?>meanmenu.css" rel="stylesheet" />
        <link href="<?php echo MOBILE_CSS_PATH;?>style.css" rel="stylesheet">
        <script src="<?php echo MOBILE_JS_PATH;?>jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo MOBILE_JS_PATH;?>bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo MOBILE_JS_PATH;?>meanmenu/jquery.meanmenu.js" type="text/javascript"></script>
        <script>
            jQuery(document).ready(function () {
		jQuery('.nav1').meanmenu({meanMenuTarget: jQuery('.nav1'),
                meanMenuContainer: '#header_box1',
                meanRevealPosition:"left",
                pwsNavId:"nav1",
                meanMenuOpen: "",
                meanMenuClose: "",
                });

                jQuery('.nav2').meanmenu({meanMenuTarget: jQuery('.nav2'),
                meanMenuContainer: '#header_box2',
                meanRevealPosition:"right",
                pwsNavId:"nav2",
                meanMenuOpen: "",
                meanMenuClose: "",
                });

                });	
        </script>        
    </head>

    <body>
        <div class="logo" onclick="location.href = '/'"><img src="<?php echo MOBILE_IMG_PATH;?>logo.png" width="100"></div>
        <a href="/search.html" class="btn_r <?php if(!isset($menu_type_search)) { ?>menu_r_1<?php } ?>"><img src="<?php echo MOBILE_IMG_PATH;?>icon_ss.png" /></a>
        <!-- top nav-->
        <div class="header_box1" id="header_box1">
            <div class="header">
                <nav class="nav1">
                    <ul>
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
                        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <?php $top_parentid = $r['catid'];?>
                        <li>
                            <?php if($top_parentid == 7) { ?> 
                            <a href="#"><?php echo $r['catname'];?></a>
                            <?php $p_types = getcache(3897,'linkage');?>
                            <?php $p_types = $p_types['data'];?>
                            <?php $category = getcache("category_content_$siteid",'commons');?>
                            <?php $url = $category[7][url]?>
                            <ul>
                                <?php $n=1; if(is_array($p_types)) foreach($p_types AS $k => $v) { ?>
                                <li><a 
                                    <?php if($v['description']) { ?>
                                        href="<?php echo $v['description'];?>" 
                                    <?php } else { ?>
                                        href="<?php echo $url;?>/<?php echo $k;?>/#product_list"
                                    <?php } ?>
                                 ><?php echo $v['name'];?></a></li>
                                <?php $n++;}unset($n); ?>
                            </ul>
                            <?php } else { ?>
                            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=a556b681be33547a973a28d326fb7849&action=category&catid=%24top_parentid&num=15&siteid=%24siteid&order=listorder+ASC&return=data2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data2 = $content_tag->category(array('catid'=>$top_parentid,'siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'15',));}?>
                            <?php if($data2) { ?>
                            <a href="#"><?php echo $r['catname'];?></a>
                            <ul>
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

                        <li><a href="#"><img src="<?php echo MOBILE_IMG_PATH;?>icon3@2x.png" class="nav_icon38" /></a>
                            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"link\" data=\"op=link&tag_md5=1234b90b949b0b2efb2f889c48eb427c&action=lists&typeid=64&siteid=%24siteid&linktype=0&order=desc&num=10&return=dat\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$link_tag = pc_base::load_app_class("link_tag", "link");if (method_exists($link_tag, 'lists')) {$dat = $link_tag->lists(array('typeid'=>'64','siteid'=>$siteid,'linktype'=>'0','order'=>'desc','limit'=>'10',));}?>
                            <ul>
                                <?php $n=1;if(is_array($dat)) foreach($dat AS $d) { ?>
                                <li><a href="#" onclick='window.open("<?php echo $d['url'];?>")'><?php echo $d['name'];?></a></li>
                                <?php $n++;}unset($n); ?>
                            </ul>
                            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        
        <!-- top nav2-->
        <div class="header_box2 <?php if(!isset($menu_type_search)) { ?>menu_r_2<?php } ?>" id="header_box2"><!-- 左侧菜单隐藏加css menu_r_2-->
            <div class="header2" style="position:relative;">

                <nav class="nav2">
                    <ul>
                        <?php $n=1; if(is_array($menu_type_search)) foreach($menu_type_search AS $key => $val) { ?>
                        <li><a href="<?php echo $val['url'];?>"><?php echo $val['name'];?></a>
                            <?php if($key == 0) { ?>
                            <div style="position:absolute; left:0; top:-52px; height:50px; width:52px; display:block; background-color:#fff; z-index:999999"></div>
                            <?php } ?>
                        </li>
                        <?php $n++;}unset($n); ?>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- top nav2 end-->
        
        <?php $keylink = getcache('keylink', 'commons');?>