<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!--footer部分-->
<div class="footer">
   <div class="all_w share_right">
     <a href="https://plus.google.com/u/0/b/104156837504977845314/104156837504977845314/posts/p/pub" class="a5" target="_blank"></a>
     <a href="https://www.youtube.com/channel/UCKyohfZLGTnmW-VU8opHeUg?gl=US" class="a4" target="_blank"></a>
     <a href="https://www.facebook.com/CentermInformation/" class="a3" target="_blank"></a>
     <a href="https://twitter.com/Centerm_News" class="a2" target="_blank"></a>
     <a href="https://www.linkedin.com/company/centerm-information-co.-ltd" class="a1" target="_blank"></a>
   </div>
 <div class="all_w clear padding20">
     <div class="rightbox">
       <h5 class="title_h52">Recent News Post:</h5>
       <h4><a href="#">Centerm Showcases Smart Banking Solutions at CIFTEE 2016</a></h4>
       <p>March 3, 2016 By <a href="#">Deb Pfeiffer</a><br />ThinkCentre® M600 Thin Client Raises the Bar in Healthcare Computing with Fanless Design Devon IT, Inc., a leading provider of thin client and virtual desktop software, announced today that Lenovo’s newest thin</p>
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
       <p>Workspot belongs in the second tier of <a href="#">#VDI</a> platforms <a href="#">https://t.co/xRZPfdaxgZ</a> via <a href="#">@virtdesktoptt</a> <a href="#">https://t.co/8x0iUh9NUc,</a></p>
       <p>RT <a href="#">@SimpliVityCorp:</a> SimpliVity can support up to 4,000 office worker desktops in a single building block. Read this RA for more… <a href="#">https://t.co/ml0vy6Cf4g,</a> </p>
       <p>RT <a href="#">@ITChannelTT:</a> State <a href="#">#procurement model</a> <a href="#">#reform</a> a boon for <a href="#">#ITchannel</a> partners <a href="#">https://t.co/vXJIaRQImI</a> HT Spencer Smith <a href="#">#ITprocurement,</a></p>
       <p>ABC’s of <a href="#">#VDI</a> in 2016 <a href="#">https://t.co/u3QGFl9lYT https://t.co/iFa8XaMVZE,</a></p>
       <p><a href="#">#Virtualization</a> in healthcare organizations streamlines <a href="#">#IT management</a> <a href="#">https://t.co/qqTN6PUOvF https://t.co/iZ7UMna7ze,</a></p>
     </div>
   </div>
   <div class="bottombar mtop40">
     <div class="all_w">
     <div class="right"><a href="#">Contact Us</a>  |  <a href="http://www.centerm.com/" target="_blank">中文版</a></div>
     © 2002-2017 Centerm Information Co., LTD All Rights Reserved 
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
$(function(){
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