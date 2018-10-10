<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--main-->
<!--banner-->
<div class="focus" id="focus" style="clear:both">
	<div id="focus_m" class="focus_m">
	  <ul>
			<li class="li_1" style="background:url(<?php echo IMG_PATH;?>image/1.jpg) center 0 no-repeat #f9f9f9;"><a href="#" hidefocus="true"></a></li>
			<li class="li_2" style="background:url(<?php echo IMG_PATH;?>image/2.jpg) center 0 no-repeat #f9f9f9;"><a href="#" hidefocus="true"></a></li>
	  </ul>
   </div>
	<a href="javascript:;" class="focus_l" id="focus_l" hidefocus="true" title="上一张"><b></b><span></span></a>
	<a href="javascript:;" class="focus_r" id="focus_r" hidefocus="true" title="下一张"><b></b><span></span></a>
</div>
<script type="text/javascript" src="<?php echo JS_PATH;?>banner.js"></script>
<!--banner end-->

<!--快捷入口-->
<div class="all_w">
  <ul class="text_list clear">
     <li>
     <img src="<?php echo IMG_PATH;?>image/icon-1.png" />
     <h5>Product</h5>Centerm provides intelligent terminal solutions for business of all sizes. We offer the best price-performance point in the industry. The Centerm ProductProductProductProductProductProductProductProductProductProductProductProductProductProductProductProduct
     </li>
     <li>
     <img src="<?php echo IMG_PATH;?>image/icon-2.png" />
     <h5>Solution</h5>Centerm solution for financial industry is based on Centerm high performance thin clients and versatile financial termianls, including solutions for...
     </li>
     <li>
     <img src="<?php echo IMG_PATH;?>image/icon-3.png" />
     <h5>Resellers</h5>Join a Webinar  Register today to discuss the benefits of thin client computing and find your virtual desktop solution.
     </li>
  </ul>
</div>
<!--end 快捷入口-->
<?php include template("content","footer"); ?>