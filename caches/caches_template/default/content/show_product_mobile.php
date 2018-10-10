<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>

<link rel="stylesheet" href="<?php echo MOBILE_CSS_PATH;?>banner.css"/>
<script src="<?php echo MOBILE_JS_PATH;?>banner.js"></script>
<!--breadcrumb-->
<?php include template("content","breadcrumb"); ?>
<!--breadcrumb end-->
<!-- content -->
<!--banner-->
<div id="banner_box" class="box_swipe">
    <ul>
        <?php $n=1;if(is_array($product_images)) foreach($product_images AS $p_img) { ?>
        <li><img src="<?php echo thumb($p_img['url'],500,500)?>" /></li>
        <?php $n++;}unset($n); ?>
    </ul>
    <ol>
        <?php $i=0;?>
        <?php $n=1;if(is_array($product_images)) foreach($product_images AS $p_img) { ?>
        <?php $i++;?>
        <li <?php if($i==1) { ?>class="on"<?php } ?>></li>
        <?php $n++;}unset($n); ?>
    </ol>
</div>
<script>
    $(function() {
        new Swipe($('#banner_box')[0], {
            speed: 500,
            auto: 3000,
            callback: function() {
                var lis = $(this.element).next("ol").children();
                lis.removeClass("on").eq(this.index).addClass("on");
            }
        });
    });
</script>
<!--end banner-->
<div class="boxbg">
    <h5 class="h5_18 cred"><?php echo $title;?></h5>
    <p><?php echo $description;?></p>
    <button type="button" class="btn_1 btn_w100" onclick='window.open("<?php echo $category['11']['url'];?>")'>Request more info</button>
</div>

<div class="boxbg mtop10">
    <!-- Nav tabs -->
    <ul class="nav pro-tab" role="tablist">
        <li role="presentation" class="active"><a href="#Specifications" role="tab" data-toggle="tab">Specifications</a></li>
        <li role="presentation"><a href="#Features" role="tab" data-toggle="tab">Features</a></li>
        <li role="presentation"><a href="#Download" role="tab" data-toggle="tab">Download</a></li>
    </ul>
    <!-- end Nav tabs -->
    <!-- Tab panes -->
    <div class="tab-content" style="padding:15px 0 10px 0">
        <div role="tabpanel" class="tab-pane tab-pane1 active" id="Specifications">
            <?php $spec = explode(PHP_EOL,$specifications);?>
                <?php if(!empty($spec)) { ?>
            <table class="table_2" style="width:100%">
                <tbody>
                    <?php $n=1;if(is_array($spec)) foreach($spec AS $data) { ?>
                            <?php $data_arr = explode('||',$data);?>
                    <tr>
                        <th width="25%"><?php echo $data_arr['0'];?></th>
                        <td width="75%">
                            <?php $d_val = $data_arr[1];?>
                            <?php $d_val_arr = explode('^#^',$d_val)?>
                            <?php $n=1;if(is_array($d_val_arr)) foreach($d_val_arr AS $v_data) { ?>
                            <?php echo $v_data;?><br/>
                            <?php $n++;}unset($n); ?>
                        </td>
                    </tr>
                    <?php $n++;}unset($n); ?>      
                   
                </tbody>
            </table>
                <?php } else { ?>
                    <?php echo $specifications;?>
                <?php } ?>
        </div>
        <div role="tabpanel" class="tab-pane tab-pane2" id="Features">
            <?php echo $content;?>
        </div>
        <div role="tabpanel" class="tab-pane tab-pane3" id="Download">
            <ul>
                <li>
                    <p class="h5_16 gray999">Document</p>
                    <?php if($relation) { ?>
                    <?php $relation_arr = explode('|',$relation);?>
                    <?php $n=1;if(is_array($relation_arr)) foreach($relation_arr AS $rel) { ?>
                        <?php if($rel) { ?>
                        <?php $tmp[] = $rel;?>
                        <?php } ?>
                    <?php $n++;}unset($n); ?>

                    <?php if(!empty($tmp)) { ?>
                        <?php $tmp = implode(',',$tmp);?>
                        <?php $where = " id in ($tmp) ";?>
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=1fd0d5873816604e8cdc9a1b33ec0cb1&action=lists&catid=22&where=%24where&num=8&moreinfo=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'22','where'=>$where,'moreinfo'=>'1','limit'=>'8',));}?>
                    <table class="table_3">
                        <tbody>
                            <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
                                <?php $docs = json_decode($d['document'],true);?>
                                <?php $n=1;if(is_array($docs)) foreach($docs AS $doc) { ?>
                            <tr>
                                <td><a href="<?php echo $doc['fileurl'];?>" downlod><img src="<?php echo MOBILE_PIC_PATH;?>pdf.png" width="30" height="30" srcset="<?php echo MOBILE_PIC_PATH;?>pdf@2x.png 2x" style="vertical-align:middle;margin-right:20px"><?php echo $d['title'];?></a></td>
                            </tr>
                                <?php $n++;}unset($n); ?>
                            <?php $n++;}unset($n); ?>
                        </tbody>
                    </table>
                        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    <?php } ?>
                <?php } else { ?>
                No Relative Documents Here!
                <?php } ?>
                </li>
                <li class="mtop10">
                    <p class="h5_16 gray999">Software</p>
                    <?php if($rel_software) { ?>
                        <?php $relation_arr = explode('|',$rel_software);?>
                        <?php $tmp = array();?>
                        <?php $n=1;if(is_array($relation_arr)) foreach($relation_arr AS $rel) { ?>
                            <?php if($rel) { ?>
                            <?php $tmp[] = $rel;?>
                            <?php } ?>
                        <?php $n++;}unset($n); ?>

                        <?php if(!empty($tmp)) { ?>
                            <?php $tmp = implode(',',$tmp);?>
                            <?php $where = " id in ($tmp) ";?>
                            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=6eb62a25e5eb327a60bca8ef7654353a&action=lists&catid=23&where=%24where&num=9&moreinfo=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'23','where'=>$where,'moreinfo'=>'1','limit'=>'9',));}?>

                                <ul style='width:360px; float:left; font-weight: normal' class='mtop10'>
                                    <?php $i=0;?>
                                        <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
                                        <?php $software = json_decode($d['software'],true);?>                                            
                                        <?php $n=1;if(is_array($software)) foreach($software AS $s) { ?>
                                            <?php $i++;?>
                                            <li style="width:100px; text-align: center;float:left;" <?php if($i>3) { ?>class='mtop25'<?php } ?>>
                                                <a href="<?php echo $s['fileurl'];?>" download>
                                                    <img src="<?php echo thumb($d['thumb'],50,50);?>" 
                                                                             width="50" height="50" srcset="<?php echo $d['thumb'];?> 2x">
                                                    <p style="font-weight: normal"><?php echo $d['title'];?></p>
                                                </a>
                                            </li>
                                        <?php $n++;}unset($n); ?>
                                        <?php $n++;}unset($n); ?>
                                </ul>
                            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                        <?php } ?>
                    <?php } else { ?>
                    No Relative Documents Here!
                    <?php } ?>                     
                </li>
                <li class="mtop10">
                    <p class="h5_16 gray999">Link</p>
                    <table  border="0" cellspacing="0" cellpadding="0" class="mtop10">
                        <tbody>
                            <tr>
                                <td><a href="javascript:void(0);" onclick='window.open("<?php echo $keylink['license_active_online']['1'];?>")' style="color:#ff5014; font-size:14px"><img src="<?php echo MOBILE_PIC_PATH;?>link.png" width="22" height="23" srcset="<?php echo MOBILE_PIC_PATH;?>link@2x.png 2x" style="vertical-align:middle;margin:0 15px;">License activate online</a></td>
                            </tr>
                        </tbody>
                    </table>
                </li>
            </ul>

        </div>
    </div>
    <!-- end Tab panes -->
</div>    

<?php $rel_field = $rel_case; ?>
<?php include template("content","case_study_rel"); ?>

<?php $rel_field = $rel_product; ?>
<?php include template("content","related_products_rel"); ?>
<!-- content end-->
<?php include template("content","footer"); ?>
