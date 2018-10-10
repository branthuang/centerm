<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--breadcrumb-->
<?php include template("content","breadcrumb"); ?>
<!--breadcrumb end-->
<!-- content -->
<div class="supbg">
    <h5>CENTERM COMMUNITY</h5>
    <h4 class="pse">Get support by Centerm Experts</h4>
    <span class="h4">Please add new posts for your questions, your feature requests and your use cases here. Centerm Team will review these posts and provide feedback.</span>
    <div><a href="#" data-toggle="modal" data-target="#supModal"></a></div>
</div>
<div class="boxbg clear">
    <div class="input-group" >
        <input type="text" class="form-control" value="<?php echo $_GET['search_txt'];?>" placeholder="search" id="search_txt">
        <span class="input-group-addon" style="padding:0">
            <button class="btn btn-default" style="border:none; background:none" type="button" onclick="search()">Search</button>
        </span>
    </div>
</div>
<div class="boxbg clear mtop10">
    <select class="form-control" style="width:120px; float:left; margin-right:15px" id='show_type' name='show_type'>
        <option <?php if($_GET['show_type']==1) { ?>selected<?php } ?> value='1'>Show all</option>
        <option <?php if($_GET['show_type']==2) { ?>selected<?php } ?> value='2'>Show part</option>
    </select>
   <select class="form-control" style="width:180px; float:left;" id='sort_type' name='sort_type'>
        <option <?php if($_GET['sort_type']==1) { ?>selected<?php } ?> value='1'>Sort by newest post</option>
        <option <?php if($_GET['sort_type']==2) { ?>selected<?php } ?> value='2'>Sort by lastest post</option>
    </select>
    
    <div class="clear"></div>

    <?php $where ="1=1";?>
    
    <?php if($_GET['search_txt']) { ?>
        <?php $where .= " and message like '%".$_GET['search_txt']."%'";?>
    <?php } ?>
    
    <?php if($_GET['sort_type']==2) { ?>
        <?php $order ="addtime asc";?>
    <?php } else { ?>
        <?php $order = "addtime desc"?>
    <?php } ?>
    
    <?php if($_GET['show_type']==1) { ?>
        <?php $num = "1000";?>
    <?php } else { ?>
        <?php $num = "20";?>
    <?php } ?>
    
    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"contact\" data=\"op=contact&tag_md5=012e87f62384f686e4d561faebd63be3&action=lists&num=%24num&order=%24order&where=%24where&catid=%24catid&page=%24page\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$contact_tag = pc_base::load_app_class("contact_tag", "contact");if (method_exists($contact_tag, 'lists')) {$pagesize = $num;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$contact_total = $contact_tag->count(array('order'=>$order,'where'=>$where,'catid'=>$catid,'limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($contact_total, $page, $pagesize, $urlrule);$ct_pages = ct_pages($contact_total, $page, $pagesize, $urlrule);$data = $contact_tag->lists(array('order'=>$order,'where'=>$where,'catid'=>$catid,'limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
    <?php if($data) { ?>
    <ul class="bbs_list clear">
        <?php $i=0;?>
        <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
        <?php $i++;?>
        <li>
            <div class="user_pic"><img src="<?php echo IMG_PATH;?>pic/userpic.png"  /></div>
            <p><span><?php echo $d['name'];?>:</span><?php echo $d['message'];?></p>
            <?php if($d['response']) { ?>
            <div class="user_c"><?php echo $d['response'];?></div>
            <?php } ?>
            <?php if($d['response_user']) { ?>
            <h5><?php echo $d['response_user'];?>  -  <?php echo date('M d, Y',$d[response_time]);?> </h5>
            <?php } ?>
        </li>
        <?php $n++;}unset($n); ?>        
    </ul>
    <?php } ?>
</div>    


<nav class="pagination_box boxbg">
    <ul class="pagination">
        <?php echo $ct_pages;?>
    </ul>
</nav>

<!-- Modal -->
<div class="modal fade popup1" id="supModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header head-size">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3 id="myModalLabel">Publish</h3>
            </div>
            <form role="form">
                <div class="form-group wid40 fl mleft40 mtop10">
                    <label class="label-font"><font style="color:#ff0000">*</font> Name</label>
                    <input type="text" class="form-control in-form"  placeholder="Name" name="name" id="name" />
                </div>
                <div class="form-group wid40 fl mleft40 mtop40">
                    <label class="label-font"><font style="color:#ff0000">*</font> Company</label>
                    <input type="text" class="form-control in-form"  placeholder="Company" name="company" id="company"/>
                </div>
                <div class="form-group wid40 fl mleft40 mtop40">
                    <label class="label-font"><font style="color:#ff0000">*</font> Email</label>
                    <input type="text" class="form-control in-form"  placeholder="Email" name="email" id="email"/>
                </div>
                <div class="form-group wid40 fl mleft40 mtop40">
                    <label class="label-font"><font style="color:#ff0000">*</font> Tel</label>
                    <input type="text" class="form-control in-form"  placeholder="Telephone" name="phone" id="phone"/>
                </div>
                <div class="form-group wid40 fl mleft40 mtop40">
                    <label class="label-font"> Country</label>
                    <input type="text" class="form-control in-form"  placeholder="Country" name="country" id="country"/>
                </div>
                <div class="form-group wid87 fl mleft40 mtop40">
                    <label class="label-font"> Message</label>
                    <textarea class="form-control" rows="3" name="message" id="message"></textarea>
                </div>
            </form>
            <button type="button" class="btn btn-form mtop80 mleft40 mbottom40" id="dosubmit">Submit</button>
        </div>
    </div>
</div>
<!-- end Modal -->
<script type="text/javascript">
    $(function() {
        $('#dosubmit').click(function() {
            var name = $('#name').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            var company = $('#company').val();
            var country = $('#country').val();
            var message = $('#message').val();
            if (!name || !company || !email || !phone) {
                alert("Please Enter Necessary Infos!");
                return false;
            }
            $.ajax({
                type: "POST",
                url: "index.php?m=contact&c=index&a=add_community",
                data: "name=" + name
                        + "&company=" + company
                        + "&email=" + email
                        + "&phone=" + phone
                        + "&country=" + country
                        + "&message=" + message,
                success: function(msg) {
                    if (msg == 1) {
                        alert("Your Message Has Sended Success. We Will Response You As Soon As Possible!");
                        location.reload();
                    } else if (msg == 2) {
                        alert('Notice: Has Submitted');
                    } else {
                        alert(msg);
                    }
                }

            });
        });
        $('#show_type').select(function(){
            alert(1);
            search();
        });
         $('#sort_type').select(function(){
            search();
        });
    });
    function search() {
        var search_txt = $('#search_txt').val();
        var show_type = $('#show_type').val();
        var sort_type = $('#sort_type').val();
        <?php $category = getcache("category_content_$siteid", 'commons');?>
        var url = '<?php echo $category['25']['url'];?>';
        url += "/" + sort_type + "/" + show_type + "/";
        if (search_txt) {
            url += search_txt + "/";
        }
        location.href = url;
    }
</script>
<!-- content end-->
<?php include template("content","footer"); ?>
