<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<?php include template("content","breadcrumb"); ?>
<!--container-->
<div class="all_w mtop20">
    <!--treelist-->
    <div class="treelist">
        <div class="case casemore mbottom40">
            <?php $where="1=1";?>
            <?php if($_GET['industry']) { ?>
                <?php $where .= " and by_industry = $_GET[industry]";?>
            <?php } ?>
            <?php if($_GET['case']) { ?>
                <?php $where .= " and by_use_case = $_GET[case]";?>
            <?php } ?>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=0c93fbad052486993c6b2a0f06f8875d&action=lists&catid=%24catid&num=100&where=%24where\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catid,'where'=>$where,'limit'=>'100',));}?>
            <?php if($data) { ?>
            <table width="810" border="0" cellspacing="0" cellpadding="0">
                <tbody>
                    <?php $i=0;?>
                    <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
                        <?php $i++;?>
                        <?php if($i%2 == 0) { ?>
                                <td style="width:405px;height: 280px;">
                                <a href="<?php echo $d['url'];?>">
                                    <img src="<?php echo thumb($d['thumb'],355,143);?>" width="355" height="143" 
                                         srcset="<?php echo $d['thumb'];?> 2x">
                                    <p><?php echo $d['title'];?></p>
                                </a>
                                <p><?php echo $d['description'];?></p>
                            </td>
                        </tr>
                        <?php } else { ?>
                        <tr>
                            <td style="width:405px;height: 280px;">
                                <a href="<?php echo $d['url'];?>">
                                    <img src="<?php echo thumb($d['thumb'],355,143);?>" width="355" height="143" 
                                         srcset="<?php echo $d['thumb'];?> 2x">
                                    <p><?php echo $d['title'];?></p>
                                </a>
                                <p><?php echo $d['description'];?></p>
                            </td>
                        <?php } ?>
                    <?php $n++;}unset($n); ?>
                    
                    <?php if($i%2 != 0) { ?>
                        <td style="width:405px;height: 280px;">&nbsp;</td></tr>
                    <?php } ?>
                </tbody>
            </table>
            <?php } else { ?>
            No Record Here!
            <?php } ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </div>
    </div>
    <!--end treelist-->
    <!--leftree-->
    <ul class="leftree">
        <?php $category = getcache("category_content_$siteid",'commons');?>
        <?php $url = $category[21][url]?>
        <li><a href="<?php echo $url;?>">ALL</a></li>
        <li class="toggler">
            <a href="javascript:void(0);">By Industry</a>
            <ul>
                <?php $industry = getcache(3904,'linkage');?>
                <?php $n=1; if(is_array($industry[data])) foreach($industry[data] AS $k => $v) { ?>
                <li><a href="<?php echo $url;?>/industry-<?php echo $k;?>/" <?php if($k==$_GET['industry']) { ?>class="tree-act active"<?php } ?>><?php echo $v['name'];?></a></li>
                <?php $n++;}unset($n); ?>
            </ul>
        </li>
        <li class="toggler">
            <a href="javascript:void(0);">By Use Case</a>
            <ul>
                <?php $case = getcache(3905,'linkage');?>
                <?php $n=1; if(is_array($case[data])) foreach($case[data] AS $k => $v) { ?>
                <li><a href="<?php echo $url;?>/case-<?php echo $k;?>/"  <?php if($k==$_GET['case']) { ?>class="tree-act active"<?php } ?>><?php echo $v['name'];?></a></li>
                <?php $n++;}unset($n); ?>
            </ul>
        </li>
    </ul>
    <!--end leftree-->
    
    <div class="clear"></div>
</div>
<!--end container-->

<script type="text/javascript" src="<?php echo JS_PATH;?>jquery.treemenu.js"></script>
<script>
    $(function(){
        $(".leftree").treemenu({delay:300}).openActive();
    });
</script>
    
    
<?php include template("content","footer"); ?>
