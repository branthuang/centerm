<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo CSS_PATH;?>style.css" rel="stylesheet" type="text/css">
<link href="<?php echo CSS_PATH;?>banner.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo CSS_PATH;?>bootstrap.css">
<link rel="stylesheet" href="<?php echo CSS_PATH;?>base.css">
<link rel="stylesheet" href="<?php echo CSS_PATH;?>nav.css">
<link rel="stylesheet" href="<?php echo CSS_PATH;?>style.css">
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.11.3.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>bootstrap.js"></script>
<script type="text/javascript" src="<?php echo JS_PATH;?>nav.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
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
            <li class="logo"><a href="/"><img src="<?php echo IMG_PATH;?>image/logo.png" /></a></li>
            <li><a href="#">Company</a>
              <ul class="dropdown">
                <li><a href="#">About Centerm</a></li>
                <li><a href="#">Newsroom</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </li>
            <li class="grid"><a href="#">Product</a>
              <div class="megapanel">
              <!--产品列表-->
              <div class="all_w nav_product">
              
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="a1">
                   <ul>
                      <li><img src="<?php echo IMG_PATH;?>pic/img1.jpg" />c91(v2)</li>
                      <li><img src="<?php echo IMG_PATH;?>pic/img1.jpg" />c91(v2)</li>
                      <li><img src="<?php echo IMG_PATH;?>pic/img1.jpg" />c91(v2)</li>
                      <li><img src="<?php echo IMG_PATH;?>pic/img1.jpg" />c91(v2)</li>
                      <li><img src="<?php echo IMG_PATH;?>pic/img1.jpg" />c91(v2)</li>
                      <li><img src="<?php echo IMG_PATH;?>pic/img1.jpg" />c91(v2)</li>
                      <li><img src="<?php echo IMG_PATH;?>pic/img1.jpg" />c91(v2)</li>
                      <li><img src="<?php echo IMG_PATH;?>pic/img1.jpg" />c91(v2)</li>
                      <li><img src="<?php echo IMG_PATH;?>pic/img1.jpg" />c91(v2)</li>
                      <li><img src="<?php echo IMG_PATH;?>pic/img1.jpg" />c91(v2)</li>
                      <li><img src="<?php echo IMG_PATH;?>pic/img1.jpg" />c91(v2)</li>
                      <li><img src="<?php echo IMG_PATH;?>pic/img1.jpg" />c91(v2)</li>
                      <li><img src="<?php echo IMG_PATH;?>pic/img1.jpg" />c91(v2)</li>
                   </ul>
             
                </div>
                <div role="tabpanel" class="tab-pane" id="a3">.3..</div>
                <div role="tabpanel" class="tab-pane" id="a4">..4.</div>
                <div role="tabpanel" class="tab-pane" id="a5">..5.</div>
                <div role="tabpanel" class="tab-pane" id="a6">..6.</div>
              </div>
              
              <ul class="nav nav-tabs" role="tablist" id="myTab1">
                <li role="presentation" class="active"><a href="#a1" role="tab" data-toggle="tab">Zero Client</a></li>
                <li role="presentation"><a href="#a2" role="tab" data-toggle="tab">Cloud Client</a></li>
                <li role="presentation"><a href="#a3" role="tab" data-toggle="tab">High Performance Thin Client</a></li>
                <li role="presentation"><a href="#a4" role="tab" data-toggle="tab">All-in-one Thin Client</a></li>
                <li role="presentation"><a href="#a5" role="tab" data-toggle="tab">Smart Financial Terminal</a></li>
                <li role="presentation"><a href="#a6" role="tab" data-toggle="tab">E-POS Terminal</a></li>
              </ul>
              
              <script>
                $(function () {  
                  $("#myTab1 a").mousemove(function (e) {  
                      $(this).tab('show');  
                  }); 
                });  
              </script>
              </div>
              <!--产品列表 end-->
              </div>
            </li>
            <li><a href="#">Solution</a>
              <ul class="dropdown">
                <li><a href="#">For Financial Institution</a></li>
                <li><a href="#">For Enterprise</a></li>
                <li><a href="#">For SMB</a></li>
                <li><a href="#">For Education</a></li>
                <li><a href="#">For Security</a></li>
                <li><a href="#">Case Study</a></li>
              </ul>
            </li>
            <li><a href="#">Support</a>
              <ul class="dropdown">
                <li><a href="#">Download</a></li>
                <li><a href="#">Centerm Community</a></li>
                <li><a href="#">Partner Login</a></li>
              </ul>
            </li>
            <li><a href="#">partner</a>
              <ul class="dropdown">
                <li><a href="#">Resellers</a></li>
                <li><a href="#">Partner Login</a></li>
              </ul>
            </li>
            <li><a href="#">CONTACT</a></li>
            <li class="right"><a href="#"><img src="<?php echo IMG_PATH;?>image/icon3.png" /></a>
              <ul class="dropdown" style="position:absolute; right:0px; width:120px; text-align:center">
                <li><a href="#">America</a></li>
                <li><a href="#">china</a></li>
                <li><a href="#">Japan</a></li>
              </ul>
            </li>
            <li class="right"><a href="#"><img src="<?php echo IMG_PATH;?>image/icon2.png" /></a></li>
            <li class="right"><a href="#"><img src="<?php echo IMG_PATH;?>image/icon1.png" /></a></li>
          </ul>
        </div>
        <!-- end nav -->
</div>
<!--top end-->