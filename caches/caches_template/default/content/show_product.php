<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<?php include template("content","breadcrumb"); ?>

<!--container-->
<div class="all_w mtop20">
    <div class="pro-zhs">
        <!--图片及介绍-->
        <div class="pro-imgs">
            <?php $f = $product_images[0];?>
            <div class="pro-img"><img src="<?php echo thumb($f['url'],500,500);?>" width="500" height="500" 
                                      srcset="<?php echo $f['url'];?> 2x"></div>
            <a href="#" class="pro-imgbox" data-toggle="modal" data-target="#myModal">
                <img src="<?php echo thumb($f['url'],100,100);?>" width="100" height="100" 
                     srcset="<?php echo thumb($f['url'],200,200);?> 2x">
                <p>Image Gallery</p>
            </a>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header head-size">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h3 id="myModalLabel"><?php echo $title;?></h3>
                        </div>
                        <div class="modal-body">
                            <!-- 轮播 -->
                            <div class="ban" id="demo1">
                                <div class="ban2" id="ban_pic1">
                                    <div class="prev1" id="prev1"><img src="<?php echo IMG_PATH;?>image/index_tab_l.png" width="28" height="51"  alt=""></div>
                                    <div class="next1" id="next1"><img src="<?php echo IMG_PATH;?>image/index_tab_r.png" width="28" height="51"  alt=""></div>
                                    <ul>
                                        <?php $n=1;if(is_array($product_images)) foreach($product_images AS $p_img) { ?>
                                        <li><a href="javascript:;"><img src="<?php echo thumb($p_img['url'],500,500)?>" width="500" height="500" 
                                                                        alt="<?php echo $p_img['alt'];?>"
                                                                        srcset="<?php echo $p_img['url'];?> 2x"></a>
                                        </li>
                                        <?php $n++;}unset($n); ?>
                                    </ul>
                                </div>
                                <div class="min_pic">
                                    <div class="prev_btn1" id="prev_btn1"><img src="<?php echo IMG_PATH;?>image/feel3.png" width="9" height="18"  alt=""></div>
                                    <div class="num clearfix" id="ban_num1">
                                        <ul>
                                            <?php $n=1;if(is_array($product_images)) foreach($product_images AS $p_img) { ?>
                                            <li><a href="javascript:;"><img src="<?php echo thumb($p_img['url'],80,80)?>" width="80" height="80" 
                                                                            alt="<?php echo $p_img['alt'];?>"
                                                                            srcset="<?php echo $p_img['url'];?> 2x"></a>
                                            </li>
                                            <?php $n++;}unset($n); ?>
                                        </ul>
                                    </div>
                                    <div class="next_btn1" id="next_btn1"><img src="<?php echo IMG_PATH;?>image/feel4.png" width="9" height="18"  alt=""></div>
                                </div>
                            </div>
                            <div class="mhc"></div>
                            <div class="pop_up" id="demo2">
                                <div class="pop_up_xx"><img src="<?php echo IMG_PATH;?>image/chacha3.png" width="40" height="40"  alt=""></div>
                                <div class="pop_up2" id="ban_pic2">
                                    <div class="prev1" id="prev2"><img src="<?php echo IMG_PATH;?>image/index_tab_l.png" width="28" height="51"  alt=""></div>
                                    <div class="next1" id="next2"><img src="<?php echo IMG_PATH;?>image/index_tab_r.png" width="28" height="51"  alt=""></div>
                                    <ul>
                                        <?php $n=1;if(is_array($product_images)) foreach($product_images AS $p_img) { ?>
                                        <li><a href="javascript:;"><img src="<?php echo thumb($p_img['url'],500,500)?>" width="500" height="500" 
                                                                        alt="<?php echo $p_img['alt'];?>"
                                                                        srcset="<?php echo $p_img['url'];?> 2x"></a>
                                        </li>
                                        <?php $n++;}unset($n); ?>
                                    </ul>
                                </div>
                            </div>
                            <script src="<?php echo JS_PATH;?>pic_tab.js"></script>
                            <script type="text/javascript">
                                $('#demo1').banqh({
                                    box: "#demo1", //总框架
                                    pic: "#ban_pic1", //大图框架
                                    pnum: "#ban_num1", //小图框架
                                    prev_btn: "#prev_btn1", //小图左箭头
                                    next_btn: "#next_btn1", //小图右箭头
                                    pop_prev: "#prev2", //弹出框左箭头
                                    pop_next: "#next2", //弹出框右箭头
                                    prev: "#prev1", //大图左箭头
                                    next: "#next1", //大图右箭头
                                    pop_div: "#demo2", //弹出框框架
                                    pop_pic: "#ban_pic2", //弹出框图片框架
                                    pop_xx: ".pop_up_xx", //关闭弹出框按钮
                                    mhc: ".mhc", //朦灰层
                                    autoplay: true, //是否自动播放
                                    interTime: 5000, //图片自动切换间隔
                                    delayTime: 400, //切换一张图片时间
                                    pop_delayTime: 400, //弹出框切换一张图片时间
                                    order: 0, //当前显示的图片（从0开始）
                                    picdire: true, //大图滚动方向（true为水平方向滚动）
                                    mindire: true, //小图滚动方向（true为水平方向滚动）
                                    min_picnum: 5, //小图显示数量
                                    pop_up: true//大图是否有弹出框
                                })
                            </script>
                            <!-- end 轮播 -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Modal -->
        </div>
        <div class="pro-txt mtop80">
            <div class="h1"><?php echo $title;?></div>
            <p class="mtop80"><?php echo $description;?></p>
            <?php $category = getcache("category_content_$siteid",'commons');?>
            <button type="button" class="btn btn-pro mtop80" onclick='window.open("<?php echo $category['11']['url'];?>")'>Request more info</button>
        </div>
        <!--end 图片及介绍-->
        <div class="clear"></div>
        <!-- 功能区-->
        <!-- Nav tabs -->
        <ul class="nav pro-tab mtop40 mbottom20" role="tablist">
            <li role="presentation" class="active"><a href="#Specifications" role="tab" data-toggle="tab">Specifications</a></li>
            <li role="presentation"><a href="#Features" role="tab" data-toggle="tab">Features</a></li>
            <li role="presentation"><a href="#Download" role="tab" data-toggle="tab">Download</a></li>
        </ul>
        <!-- end Nav tabs -->
        <!-- Tab panes -->
        <div class="tab-content mbottom40">
            <div role="tabpanel" class="tab-pane tab-pane1 active" id="Specifications">
                <?php $spec = explode(PHP_EOL,$specifications);?>
                <?php if(!empty($spec)) { ?>
                <table width="1200" border="0" cellspacing="2" cellpadding="2">
                    <tbody>
                        <?php $n=1;if(is_array($spec)) foreach($spec AS $data) { ?>
                            <?php $data_arr = explode('||',$data);?>
                        <tr>
                            <th><?php echo $data_arr['0'];?></th>
                            <td width="30"><img src="<?php echo IMG_PATH;?>pic/dian.png" srcset="<?php echo IMG_PATH;?>pic/dian@2x.png 2x"></td>
                            <td>
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
                        <p>Document</p>
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
                                    <table width="360" border="0" cellspacing="0" cellpadding="0" class="mtop10" >
                                        <tbody>
                                            <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
                                            <?php $docs = json_decode($d['document'],true);?>
                                            <?php $n=1;if(is_array($docs)) foreach($docs AS $doc) { ?>
                                            <tr>
                                                <td><a href="<?php echo $doc['fileurl'];?>" download><img src="<?php echo IMG_PATH;?>pic/pdf.png" width="30" height="30" srcset="<?php echo IMG_PATH;?>pic/pdf@2x.png 2x" 
                                                                     style="vertical-align:middle;margin-right:20px"><?php echo $d['title'];?></a></td>
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
                    <li class="software">
                        <p>Software</p>
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
                                            <li style="width:100px; text-align: center;" <?php if($i>3) { ?>class='mtop25'<?php } ?>>
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
                    <li>
                        <?php $license = $rs['license'];?>
                        <?php $l_link_arr = getcache('3936','linkage');?>
                        <?php $l_link_arr = $l_link_arr['data'];?>
                        <?php $l_url = $l_link_arr[$license]['description']; ?>
                        <?php if($l_url) { ?>
                        <p>Link</p>
                        <table width="360" border="0" cellspacing="0" cellpadding="0" class="mtop10">
                            <tbody>
                                <tr>
                                    <td><a href="javascript:void(0);" onclick='window.open("<?php echo $l_url;?>")' style="color:#ff5014; font-size:14px">
                                            <img src="<?php echo IMG_PATH;?>pic/link.png" width="22" height="23" srcset="<?php echo IMG_PATH;?>pic/link@2x.png 2x" 
                                                 style="vertical-align:middle;margin:0 15px;">License activate online</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <?php } ?>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>
        <!-- end Tab panes -->
        <!-- end 功能区-->
        
        <!-- Case Study-->
        <?php $rel_field = $rel_case; ?>
        <?php include template("content","case_study_rel"); ?>
        <!-- end Case Study-->
        
        <!-- Related-->
        <?php $rel_field = $rel_product; ?>
        <?php include template("content","related_products_rel"); ?>
        <!-- end Related-->
    </div>

</div>
<!--end container-->
<?php include template("content","partner_login_footer"); ?>

<?php include template("content","footer"); ?>