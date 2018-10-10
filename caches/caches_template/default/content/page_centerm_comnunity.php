<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<?php include template("content","breadcrumb"); ?>
<!--banner-->
<div class="supbg mbottom40">
    <div class="all_w">
        <p>CENTERM COMMUNITY</p>
        <p class="pse">Get support by Centerm Experts</p>
        <span class="h4">Please add new posts for your questions, your feature requests and your use cases here. Centerm Team will review these posts and provide feedback.</span>
        <a href="#" data-toggle="modal" data-target="#supModal"></a>
    </div>
</div>
<!--end banner-->
<!-- Modal -->
<div class="modal fade" id="supModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <div class="form-group wid40 fl mleft40 mtop10">

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
    });
</script>

<!-- container -->
<div class="all_w">
    <div class="sup-sel">
        <div class="input-group mbottom20" style="width:22%; float:right">
            <input type="text" class="form-control" value="<?php echo $_GET['search_txt'];?>" placeholder="search" id="search_txt" />
            <span class="input-group-addon" style="padding:0"><button class="btn btn-default" style="border:none; background:none" type="button" onclick="search()">Search</button></span>
        </div>
        <div class="dropdown sup-btn fl mtop10 mleft20">
            <button id="dLabel_show_type" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if($_GET['show_type']==1) { ?>Show all<?php } else { ?>Show part<?php } ?>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dLabel">
                <li><a href="javascript:void(0);" onclick="show(1)">Show all</a></li>
                <li><a href="javascript:void(0);" onclick="show(2)">Show part</a></li>
            </ul>
            <input type="hidden" id="show_type" name="show_type" value="<?php echo $_GET['show_type']?$_GET['show_type']:2?>"/>
        </div>
        <div class="dropdown sup-btn fl mleft40 mtop10">
            <button id="dLabel_sort_type" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php if($_GET['sort_type']==1) { ?>Sort by newest post<?php } else { ?>Sort by lastest post<?php } ?>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dLabel">
                <li><a href="javascript:void(0);" onclick="sort(1);">Sort by newest post</a></li>
                <li><a href="javascript:void(0);" onclick="sort(2);">Sort by lastest post</a></li>
            </ul>
            <input type="hidden" id="sort_type" name="sort_type" value="<?php echo $_GET['sort_type']?$_GET['sort_type']:1?>"/>
        </div>
        <div class="clear"></div>
    </div>
    <script>
        function search(){
            var search_txt = $('#search_txt').val();
            var show_type = $('#show_type').val();
            var sort_type = $('#sort_type').val();
            <?php $category = getcache("category_content_$siteid",'commons');?>
            var url = '<?php echo $category['25']['url'];?>';
            url += "/"+sort_type+"/"+show_type+"/";
            if(search_txt){
                url += search_txt+"/";
            }
            location.href=url;
        }
        function show(val){
            $('#show_type').val(val);
            
            search();
        }
        function sort(val){
            $('#sort_type').val(val);
            
            search();
        }
    </script>
    
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
    <ul class="userpic">
        <?php $i=0;?>
        <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
        <?php $i++;?>
        <li <?php if($i>1) { ?>class="mtop40"<?php } ?>>
            <table width="1200" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td valign="top" class="user-pic">
                            <img src="<?php echo IMG_PATH;?>pic/userpic.png" width="60" height="60" srcset="<?php echo IMG_PATH;?>pic/userpic@2x.png 2x" />
                            <div class="zz"></div>
                        </td>
                        <td valign="top" class="user-txt">
                            <p class="ques"><?php echo $d['name'];?>: <span><?php echo $d['message'];?></span></p>
                            <?php if($d['response']) { ?>
                             <div class="ans">
                                <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                  <tbody>
                                    <tr>
                                      <td width="23"><img src="<?php echo IMG_PATH;?>pic/Bubble.png" width="14" height="12" srcset="<?php echo IMG_PATH;?>pic/Bubble@2x.png 2x" /></td>
                                      <td><?php echo $d['response'];?></td>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                            <?php } ?>
                            <?php if($d['response_user']) { ?>
                            <p class="user"><?php echo $d['response_user'];?>  -  <?php echo date('M d, Y',$d[response_time]);?> </p>
                            <?php } ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </li>
        <?php $n++;}unset($n); ?>
    </ul>
    <nav class="mtop40" style="margin: 40px auto; text-align:center">
        <ul class="pagination">
            <?php echo $ct_pages;?>
        </ul>
    </nav>
    <?php } else { ?>
    Sorry, Not Found Record Here!
    <?php } ?>
    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
</div>
<!-- end container -->
<?php include template("content","footer"); ?>