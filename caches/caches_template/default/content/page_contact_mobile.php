<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header_form"); ?>
<!-- content -->

<div><img srcset="<?php echo MOBILE_PIC_PATH;?>contbanner@2x1.png" style="width:100%"></div>
<div class="boxbg formbox">
    <form role="form">
        <div class="form-group">
            <label class="label-font"><font style="color:#ff0000">*</font> First Name</label>
            <input type="text" class="form-control in-form"  name="first_name" id="first_name"  placeholder="First Name">
        </div>
        <div class="form-group">
            <label class="label-font"><font style="color:#ff0000">*</font> Last Name</label>
            <input type="text" class="form-control in-form" name="last_name" id="last_name" placeholder="Last Name">
        </div>
        <div class="form-group">
            <label class="label-font"><font style="color:#ff0000">*</font> Company</label>
            <input type="text" class="form-control in-form" name="company" id="company" placeholder="Company">
        </div>
        <div class="form-group">
            <label class="label-font"><font style="color:#ff0000">*</font> Title</label>
            <input type="text" class="form-control in-form" name="title" id="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label class="label-font"><font style="color:#ff0000">*</font> Email</label>
            <input type="text" class="form-control in-form" name="email" id="email" placeholder="Company">
        </div>
        <div class="form-group">
            <label class="label-font"> Phone</label>
            <input type="text" class="form-control in-form" name="phone" id="phone" placeholder="Phone">
        </div>
        <div class="form-group">
            <label class="label-font"><font style="color:#ff0000">*</font> Country</label>
            <?php pc_base::load_sys_class("form");?>
            <?php echo form::select_with_func(3360, 'country','country','please select your country','state_slt', 'class="form-control in-form"');?>            
        </div>
        <div class="form-group">
            <label class="label-font"> State</label>
            <input type="text" class="form-control in-form" name="state" id="state_text" placeholder="State">
            <?php echo form::select_with_func(3654, 'state_select','state_select','please select your state','','style="display:none;" class="form-control in-form"');?>
        </div>
        <div class="form-group">
            <label class="label-font"> Describe your request</label>
            <textarea class="form-control" rows="3" name="request" id="request"></textarea>
        </div>
    </form>
    <button type="button" class="btn_1 btn_w100" id="dosubmit">Submit</button>
</div>

<?php include template("content","global_office"); ?>  

<!--rightbar-->
<?php include template("content","subscribe"); ?>    
<?php include template("content","headquarters"); ?> 
<!--end rightbar--> 

<!-- content end-->
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
            if(!first_name || !last_name || !company || !title || !email || !country){
                alert("Please Enter Necessary Infos!");
                return false;
            }
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
                        $('#myModal_contact').modal("show")
                    }else if(msg == 2){
                        alert('Notice: Has Submitted');
                    }else{
                        alert(msg);
                    }
                }

            });
        });
    });
</script>
<?php include template("content","footer"); ?>