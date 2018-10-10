<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<?php include template("content","breadcrumb"); ?>
<!--container-->
<div class="all_w mtop20">
    <div class="pro-zhs">
        <!-- 功能区-->
        <!-- Tab panes -->
        <div class="tab-content mbottom40">
            <div role="tabpanel" class="tab-pane active solu-ul" id="all">
                <ul class="mtop40">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=d5f36b4a6a404be385e9aa6b01b312ef&action=category_not_menu&catid=8&modelid=19&num=100&siteid=%24siteid&order=listorder+ASC&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category_not_menu')) {$data = $content_tag->category_not_menu(array('catid'=>'8','modelid'=>'19','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'100',));}?>
                        <?php $i=0;?>
                        <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
                            <?php $i++;?>
                            
                            <?php $cid = $d['catid'];?>
                            <?php $news = array(); ?>
                            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=4cd9cbfc2084338180a313de562774fd&action=lists&catid=%24cid&num=30&return=news\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$news = $content_tag->lists(array('catid'=>$cid,'limit'=>'30',));}?>
                                <?php $news_num = count($news); ?>
                            
                        <li class='<?php if($i%3 != 1) { ?>mleft45<?php } ?> 
                            <?php if($i>=4 ) { ?>mtop20<?php } ?> '>
                            <a <?php if($news_num == 0 ) { ?>
                                    href="javascript:void(0);" 
                               <?php } elseif ($news_num == 1) { ?>
                                    <?php $first_news = current($news);?>
                                    href="<?php echo $first_news['url'];?>"
                               <?php } else { ?>
                                    href="###" data-toggle="modal" data-target="#mySolu<?php echo $i;?>"
                               <?php } ?>>
                                <img src="<?php echo $d['image']?thumb($d['image'],370,110):IMG_PATH.'pic/solu1.png';?>" width="370" height="110" 
                                     srcset="<?php echo $d['image']?$d['image']:IMG_PATH.'pic/solu1@2x.png';?> 2x" />
                                <p class="h2"><?php echo $d['catname'];?></p>
                            </a>
                            <p class="h5" style='height:50px;'><?php echo $d['description']?$d['description']:'&nbsp;'?></p>
                        </li>
                            <?php if($news_num>1) { ?>
                                <!-- Modal -->
                                <div class="modal fade" id="mySolu<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header head-size">
                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                        <h3 id="myModalLabel"><?php echo $d['catname'];?></h3>
                                      </div>
                                      <div class="modal-body">
                                        <ul class='solution_news_list'>
                                            <?php $n=1;if(is_array($news)) foreach($news AS $new) { ?>
                                            <li><a href="<?php echo $new['url'];?>"><?php echo $new['title'];?></li>
                                            <?php $n++;}unset($n); ?>
                                        </ul>
                                        <div class="clear"></div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- end Modal -->
                            <?php } ?>
                            
                            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                        <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
                <div class="clear"></div>
            </div>
            
        </div>
        <!-- end Tab panes -->
        <!-- end 功能区-->
    </div>

</div>
<!--end container-->
<?php include template("content","footer"); ?>