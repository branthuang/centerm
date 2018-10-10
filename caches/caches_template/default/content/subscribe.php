<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><div class="subscribe">
    <div class="bartit">Subscribe to news</div>
    <p>Enter your email address to subscribe to Centerm and receive notification of new posts by email</p>
    <div class=" mtop10">
        <div class="input-group">
            <input type="text" class="form-control" value="Email Address" id='email_subscribe2'>
            <span class="input-group-addon" style="padding:0">
                <button class="btn btn-default" style="border:none; background:none" type="button" data-toggle="modal" data-target="#myModal" id="subscribe_to_email2">Subscribe</button>
            </span>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function(){
    //邮件登记ajax提交
    $('#subscribe_to_email2').click(function(){
        var email = $('#email_subscribe2').val();
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
    $('#email_subscribe2').focus(function(){
        if(this.value == 'Email Address'){
            $('#email_subscribe2').val('');
        }
    }).blur(function(){
        if(this.value == ''){
            $('#email_subscribe2').val('Email Address');
        }
    });
});
</script>