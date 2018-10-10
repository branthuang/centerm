<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!--footer部分-->
<div class="footer">
   <div class="all_w share_right">
     <?php include template("content","keylink"); ?>
   </div>
 <div class="all_w clear padding20">
     <div class="rightbox">
       <h5 class="title_h52">Recent News Post:</h5>
       <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=fb3716f183be91db9a59b118c49ee4d2&action=position&posid=1&order=listorder+DESC&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'1','order'=>'listorder DESC','limit'=>'1',));}?>
       <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
       <h4><a href="<?php echo $r['url'];?>"><?php echo $r['title'];?></a></h4>
       <p><?php echo date('F d, Y',$r['inputtime']);?> By <a href="###"><?php echo $r['username'];?></a>
           <br /><?php echo $r['description'];?></p>
       <?php $n++;}unset($n); ?>
       <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
       
       <h4>Subscribe to e-mail:</h4>
       <p>Enter your email address to subscribe to Centerm and receive notification of news posts by email.</p>
       <div class=" mtop20">
          <div class="input-group" style="padding-right:120px">
            <input type="text" class="form-control" value="Email Address"  id="email_subscribe">
            <span class="input-group-addon" style="padding:0"><button class="btn btn-default" style="border:none; background:none" type="button" data-toggle="modal" data-target="#myModal" id="subscribe_to_email">Subscribe</button></span>
          </div>
       </div>
     </div>
     <div class="leftbox">
       <h5 class="title_h51">Follow @Centerm</h5>
       <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=537ced041d237d8b81bd7f540e600cd8&action=twitter_news&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'twitter_news')) {$data = $content_tag->twitter_news(array('limit'=>'5',));}?>
       <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
       <p><?php echo urldecode($d['format_text'])?></p>
       <?php $n++;}unset($n); ?>
       <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
     </div>
   </div>
   <div class="bottombar mtop40">
     <div class="all_w">
     <div class="right">
         <?php $category = getcache("category_content_$siteid",'commons');?>
         <a href="<?php echo $category['11']['url'];?>">Contact Us</a>  |  
         <a href="http://www.centerm.com/index.aspx" target="_blank">中文版</a></div>
     © 2002-2017 Centerm Information Co., LTD All Rights Reserved 
     <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1261978883'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s13.cnzz.com/z_stat.php%3Fid%3D1261978883%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>
     </div>
   </div>
</div>
<!--end footer部分-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:200px">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"> </h4>
      </div>
      <div class="modal-body">
        <div style="text-align:center;"><img src="<?php echo IMG_PATH;?>image/success.png" style="width:90px; height:90px" /><h5 style="line-height:30px; font-size:18px; padding:20px">Subscription success</h5></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript">
jQuery(document).ready(function($){
    //邮件登记ajax提交
    $('#subscribe_to_email').click(function(){
        var email = $('#email_subscribe').val();
        if(email && email != "Email Address"){            
        }else{
            alert("Please Enter Email Address!");
            return false;
        }
        $.ajax({
            type: "POST",
            url: "index.php?m=contact&c=index&a=add_subscribe",
            data: "email=" + email ,
            async: false,
            success: function(msg) {
                if(msg == 1){
                    return true;
                }else if(msg == 2){
                    alert('Notice: Has Submitted');
                    return false;
                }else{
                    alert(msg);
                    return false;
                }
            }

        });
    });
    //邮件input框获得和失去焦点事件
    $('#email_subscribe').focus(function(){
        if(this.value == 'Email Address'){
            $('#email_subscribe').val('');
        }
    }).blur(function(){
        if(this.value == ''){
            $('#email_subscribe').val('Email Address');
        }
    });
});
</script>
</html>