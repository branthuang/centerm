<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><div class="link mtop10">
    <?php $keylink = getcache('keylink', 'commons');?>
    <a href="<?php echo $keylink['twitter']['1'];?>" class="imgbox" target="_blank"><img src="<?php echo MOBILE_IMG_PATH;?>logo_twitter.png" /></a>
    <a href="<?php echo $keylink['facebook']['1'];?>" class="imgbox" target="_blank"><img src="<?php echo MOBILE_IMG_PATH;?>logo_facebook.png" /></a>
    <a href="<?php echo $keylink['linkedin']['1'];?>" class="imgbox" target="_blank"><img src="<?php echo MOBILE_IMG_PATH;?>logo_in.png" /></a>
    <a href="<?php echo $keylink['youtube']['1'];?>" class="imgbox" target="_blank"><img src="<?php echo MOBILE_IMG_PATH;?>logo_youtube.png" /></a>
    <a href="<?php echo $keylink['google']['1'];?>" class="imgbox" target="_blank"><img src="<?php echo MOBILE_IMG_PATH;?>logo_google.png" /></a>
</div>
<div class="text">
    <h5 class="twitter">Follow @centerm</h5>
    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=537ced041d237d8b81bd7f540e600cd8&action=twitter_news&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'twitter_news')) {$data = $content_tag->twitter_news(array('limit'=>'5',));}?>
    <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
    <p><?php echo urldecode($d['format_text'])?></p>
    <?php $n++;}unset($n); ?>
    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
</div>
<div class="text">
    <h5 class="chat">Recent News Post:</h5>
    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=fb3716f183be91db9a59b118c49ee4d2&action=position&posid=1&order=listorder+DESC&num=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'1','order'=>'listorder DESC','limit'=>'1',));}?>
    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
    <p><span><?php echo $r['title'];?></span></p>
    <p><?php echo date('F d, Y',$r['inputtime']);?> By <span><?php echo $r['username'];?></span></p>
    <p><?php echo $r['description'];?></p>
    <?php $n++;}unset($n); ?>
    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    <p class="gray">Subscribe to e-mail:</p>
    <p>Enter your email address to subscribe to Centerm and receive notification of news posts by email.</p>
</div>
<div class="email">
    <div class="input_box"><input type="text" value="Email Address" onFocus="if (this.value == 'Email Address') {
                this.value = '';
            }"  onblur="if (this.value == '') {
                        this.value = 'Email Address';
                    }" id="email_subscribe"></div>
    <a href="#" class="subbtn" data-toggle="modal" data-target="#myModal" id="subscribe_to_email">Subscibe</a>
</div>
<div class="footer">&copy; 2002-2016 Centerm Information Co., <br />LTD All Rights Reserved <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1261978883'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s13.cnzz.com/z_stat.php%3Fid%3D1261978883%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script></div>
<div class="actGotop"><a href="javascript:;" title="gotop">top</a></div>

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

<script>
    $(function() {
        $(window).scroll(function() {
            if ($(window).scrollTop() >= 100) {
                $('.actGotop').fadeIn(300);
            } else {
                $('.actGotop').fadeOut(300);
            }
        });
        $('.actGotop').click(function() {
            $('html,body').animate({scrollTop: '0px'}, 800);
        });
        //邮件登记ajax提交
        $('#subscribe_to_email').click(function() {
            var email = $('#email_subscribe').val();
            if (email && email != "Email Address") {
            } else {
                alert("Please Enter Email Address!");
                return false;
            }
            $.ajax({
                type: "POST",
                url: "index.php?m=contact&c=index&a=add_subscribe",
                data: "email=" + email,
                async: false,
                success: function(msg) {
                    if (msg == 1) {
                        return true;
                    } else if (msg == 2) {
                        alert('Notice: Has Submitted');
                        return false;
                    } else {
                        alert(msg);
                        return false;
                    }
                }

            });
        });
    });
</script>
<!-- footer end -->
</body>
</html>