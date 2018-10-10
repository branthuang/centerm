<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--container-->
<div class="container">
	<!--rightbar-->
    <div class="rightbar">
    	<?php include template("content" , "subscribe"); ?>
        <?php include template("content" , "headquarters"); ?>
    </div>
    
    <!--end rightbar-->
    <!--newslist-->
    <div class="news pad-bottom form-bottom">
        <img src="<?php echo IMG_PATH;?>pic/contbanner.png" width="820" height="136" srcset="<?php echo IMG_PATH;?>pic/contbanner@2x.png 2x">
        <form role="form">
          <div class="form-group wid35 fl mleft80 mtop20">
            <label class="label-font"><font style="color:#ff0000">*</font> First Name</label>
            <input type="text" class="form-control in-form" name="first_name" id="first_name" placeholder="First Name">
          </div>
          <div class="form-group wid35 fl mleft60 mtop20">
            <label class="label-font"><font style="color:#ff0000">*</font> Last Name</label>
            <input type="text" class="form-control in-form" name="last_name" id="last_name" placeholder="Last Name">
          </div>
          <div class="form-group wid35 fl mleft80 mtop40">
            <label class="label-font"><font style="color:#ff0000">*</font> Company</label>
            <input type="text" class="form-control in-form" name="company" id="company" placeholder="Company">
          </div>
          <div class="form-group wid35 fl mleft60 mtop40">
            <label class="label-font"><font style="color:#ff0000">*</font> Title</label>
            <input type="text" class="form-control in-form" name="title" id="title" placeholder="Title">
          </div>
          <div class="form-group wid35 fl mleft80 mtop40">
            <label class="label-font"><font style="color:#ff0000">*</font> Email</label>
            <input type="text" class="form-control in-form" name="email" id="email" placeholder="Company">
          </div>
          <div class="form-group wid35 fl mleft60 mtop40">
            <label class="label-font"> Phone</label>
            <input type="text" class="form-control in-form" name="phone" id="phone" placeholder="Phone">
          </div>
          <div class="form-group wid35 fl mleft80 mtop40">
            <label class="label-font"><font style="color:#ff0000">*</font> Country</label>
            <?php pc_base::load_sys_class("form");?>
            <?php echo form::select_with_func(3360, 'country','country','please select your country','state_slt', 'class="form-control in-form"');?>
            
          </div>
          <div class="form-group wid35 fl mleft60 mtop40">
            <label class="label-font"> State</label>
            <input type="text" class="form-control in-form" name="state" id="state_text" placeholder="State">
            <?php echo form::select_with_func(3654, 'state_select','state_select','please select your state','','style="display:none;" class="form-control in-form"');?>
          </div>
          <div class="form-group wid77 fl mleft80 mtop40">
            <label class="label-font"> Describe your request</label>
            <textarea class="form-control" rows="3" name="request" id="request"></textarea>
          </div>
        </form>
        <button type="button" class="btn btn-form mtop80 mleft80" id="dosubmit">Submit</button>
    </div>
    <!--end newslist-->
    <div class="clear"></div>
</div>
<!--end container-->
<?php include template("content" , "global_office"); ?>

<!-- Modal -->
<div class="modal fade" id="myModal_contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="margin-top:200px">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"> </h4>
      </div>
      <div class="modal-body">
        <div style="text-align:center;"><img src="<?php echo IMG_PATH;?>image/success.png" style="width:90px; height:90px" />
            <h5 style="line-height:30px; font-size:18px; padding:20px">Your Message Has Sended Success</h5>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
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