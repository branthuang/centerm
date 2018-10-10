<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header_page"); ?>
<div id="content">
    <form action="" method="post" >
        first name:
        <input type="text" name="first_name" id="first_name"/>
        <br/>
        last name:
        <input type="text" name="last_name" id="last_name"/>
        <br/>
        company:
        <input type="text" name="company" id="company"/>
        <br/>
        title:
        <input type="text" name="title" id="title"/>
        <br/>
        email:
        <input type="text" name="email" id="email"/>
        <br/>
        phone
        <input type="text" name="phone" id="phone"/>
        <br/>
        country:
        <?php 
        pc_base::load_sys_class("form");
        echo form::select_with_func(3360, 'country','country','please select your country','state_slt');
        ?>
        <br/>
        state
        <input type="text" name="state" id="state_text"/>
        <?php 
        echo form::select_with_func(3654, 'state_select','state_select','please select your state','','style="display:none;"');
        ?>
        <br/>
        request:
        <textarea name="request" id="request"></textarea>
        <br/>
        <input type="button" name="submit" id="dosubmit" value="Submit"/>
    </form>
</div>
<script type="text/javascript">
    //state选择
    function state_slt(key){
        if(key == 3665){
            //美国
            $('#state_text').hide();
            $('#state_select').show();            
        }else{
            $('#state_text').show();
            $('#state_select').hide();
        }
    }
    
    $(function() {
        $('#dosubmit').click(function() {
            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();
            var company = $('#company').val();
            var title = $('#title').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var country = $('#country').val();
            var state = $('#state_text').val();
            var state_select = $('#state_select').val();
            var request = $('#request').val();
            $.ajax({
                type: "POST",
                url: "index.php?m=contact&c=index&a=add",
                data: "first_name=" + first_name 
                        + "&last_name=" + last_name
                        + "&company=" + company
                        + "&title=" + title
                        + "&email=" + email
                        + "&phone=" + phone
                        + "&country=" + country
                        + "&state=" + state
                        + "&state_select=" + state_select
                        + "&request=" + request ,
                success: function(msg) {
                    if(msg == 1){
                        alert('success');
                    }else if(msg == 2){
                        alert('重复提交');
                    }else{
                        alert(msg);
                    }
                }

            });
        });
    });
</script>
<?php include template("content","footer"); ?>