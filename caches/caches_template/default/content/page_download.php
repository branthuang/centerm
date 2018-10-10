<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<?php include template("content","breadcrumb"); ?>
<!--container-->
<div class="all_w mtop20">
    <!--treelist-->
    <div class="treelist">
        <?php $p_types = getcache(3897,'linkage');?>
        <?php $p_types = $p_types['data'];?>

        <?php if($_GET['soft']==1) { ?>
        <!--#soft list #-->
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=032f119d8815cf60a4c035cf8f220c88&action=lists&catid=23&num=1000&moreinfo=1&order=listorder+desc%2C+id+desc\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'23','moreinfo'=>'1','order'=>'listorder desc, id desc','limit'=>'1000',));}?>        
            <div class="listfl">            
                <div class="listit h3">Software</div>            
                <?php if($data) { ?>
                <table width="100%" border="0" cellspacing="5" cellpadding="0" class="table-three mtop10">
                    <tbody>
                        <tr>
                            <th style="width:40%">Software Name</th>
                            <th style="width:30%">Release Date</th>
                            <th>Downloads</th>
                        </tr>
                        <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
                        <tr>
                            <td><?php echo $d['title'];?></td>
                            <td><?php echo date('Y-m-d',$d['inputtime']);?></td>
                            <td>
                                <?php $software = json_decode($d['software'],true);?>
                                <?php $n=1;if(is_array($software)) foreach($software AS $d) { ?>
                                <a href="<?php echo $d['fileurl'];?>" title='<?php echo $d['filename'];?>' download></a>
                                <?php $n++;}unset($n); ?>
                            </td>
                        </tr>
                        <?php $n++;}unset($n); ?>                        
                    </tbody>
                </table>
                <?php } else { ?>
                No Software Here!
                <?php } ?>              
            </div>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        <?php } elseif ($_GET['manual']==1) { ?>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c11c321ac8bfc8dbd3ea3872de49c2e1&action=lists&catid=34&num=1000&moreinfo=1&order=listorder+desc%2C+id+desc\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'34','moreinfo'=>'1','order'=>'listorder desc, id desc','limit'=>'1000',));}?>  
            <div class="listfl">            
                <div class="listit h3">User manual</div>            
                <?php if($data) { ?>
                <table width="100%" border="0" cellspacing="5" cellpadding="0" class="table-three mtop10">
                    <tbody>
                        <tr>
                            <th style="width:40%">Document Name</th>
                            <th style="width:30%">Release Date</th>
                            <th>Downloads</th>
                        </tr>
                        <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
                        <tr>
                            <td><?php echo $d['title'];?></td>
                            <td><?php echo date('Y-m-d',$d['inputtime']);?></td>
                            <td>
                                <?php $document = json_decode($d['document'],true);?>
                                <?php $n=1;if(is_array($document)) foreach($document AS $doc) { ?>
                                <a href="<?php echo $doc['fileurl'];?>" title='<?php echo $doc['filename'];?>' download></a>
                                <?php $n++;}unset($n); ?>
                            </td>
                        </tr>
                        <?php $n++;}unset($n); ?>                        
                    </tbody>
                </table>
                <?php } else { ?>
                No User manual Here!
                <?php } ?>              
            </div>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        <?php } else { ?>
        <!--#document list#-->
        <?php if($_GET['type']) { ?>
        <?php $one[$_GET['type']] = $p_types[$_GET['type']];?>
        <?php $p_types = $one;?>
        <?php } else { ?>
        <?php $p_types = getcache(3897,'linkage');?>
        <?php $p_types = $p_types['data'];?>
        <?php } ?>
        <?php $i=0;?>
        <?php $n=1;if(is_array($p_types)) foreach($p_types AS $type) { ?>            
        <?php $where="type=".$type['linkageid'];?>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=e8cfdb415a01688e4cd78326af125227&action=lists_doc&catid=22&where=%24where&field=relation&num=1000&moreinfo=1\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists_doc')) {$data = $content_tag->lists_doc(array('catid'=>'22','where'=>$where,'field'=>'relation','moreinfo'=>'1','limit'=>'1000',));}?>
        <?php if(empty($data) && $_GET['type']) { ?>
        Sorry. NO Documents Here!
        <?php } ?>
        <?php if(!empty($data)) { ?>
        <?php $i++;?>
        <div class="listfl <?php if($i>1) { ?>mtop40<?php } ?>">            
            <div class="listit h3"><?php echo $type['name'];?></div>
            <?php $t_data = array();?>
            <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
            <?php $t_data[$d['p_id']][] = $d;?>
            <?php $n++;}unset($n); ?>

            <?php $n=1;if(is_array($t_data)) foreach($t_data AS $data) { ?>
            <div class="box-wrap">
                <div class="boxn"><?php echo $data['0']['p_name'];?></div>
            </div>
            <table width="100%" border="0" cellspacing="5" cellpadding="0" class="table-three mtop10">
                <tbody>
                    <tr>
                        <th style="width:40%">Document Name</th>
                        <th style="width:30%">Release Date</th>
                        <th>Downloads</th>
                    </tr>
                    <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
                    <tr>
                        <td><?php echo $d['title'];?></td>
                        <td><?php echo date('Y-m-d',$d['inputtime']);?></td>
                        <td>
                            <?php $document = json_decode($d['document'],true);?>
                            <?php $n=1;if(is_array($document)) foreach($document AS $doc) { ?>
                            <a href="<?php echo $doc['fileurl'];?>" title='<?php echo $doc['filename'];?>' download></a>
                            <?php $n++;}unset($n); ?>
                        </td>
                    </tr>
                    <?php $n++;}unset($n); ?>                        
                </tbody>
            </table>
            <?php $n++;}unset($n); ?>
        </div>
        <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>    
        <?php $n++;}unset($n); ?>
        <?php } ?> 


    </div>
    <!--end treelist-->
    <!--leftree-->
    <?php $category = getcache("category_content_$siteid",'commons');?>
    <?php $url= $category[32][url]?>
    <ul class="leftree">
        <li><a href="<?php echo $url;?>">ALL</a></li>
        <?php $p_types = getcache(3897,'linkage');?>
        <?php $p_types = $p_types['data'];?>
        <?php $n=1; if(is_array($p_types)) foreach($p_types AS $k => $t) { ?>
        <li><a href="<?php echo $url;?>/type-<?php echo $k;?>/" <?php if($k==$_GET['type']) { ?>class="tree-act"<?php } ?>><?php echo $t['name'];?></a></li>
        <?php $n++;}unset($n); ?>

        <li>
            <a href="javascript:volid(0);" class="softhover">Software</a>
            <ul>
                <li><a href="<?php echo $url;?>/soft/">Download</a></li>
                <li><a href="<?php echo $url;?>/manual/">User manual</a></li>
                <li>
                    <?php $keylink = getcache('keylink', 'commons');?>
                    <a href="javascript:void(0);" onclick='window.open("<?php echo $keylink['license_active_online']['1'];?>")' >License activate online</a>
                </li>
            </ul>
        </li>
        <?php include template("content","partner_login"); ?>
    </ul>
    <!--end leftree-->

    <div class="clear"></div>
</div>
<!--end container-->
<?php include template("content","footer"); ?>