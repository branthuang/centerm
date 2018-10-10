<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php $category = getcache("category_content_$siteid",'commons');?>
<?php $url= $category[32][url]?>
<?php $menu_type_search[0] =array('url' => $url, 'name' => 'All');?>
<?php $p_types = getcache(3897,'linkage');?>
<?php $p_types = $p_types['data'];?>
<?php $i=0;?>
<?php $n=1; if(is_array($p_types)) foreach($p_types AS $k => $t) { ?>
    <?php $i++;?>
    <?php $menu_type_search[$i] = array('url'=> $url.'/type-'.$k.'/', 'name' => $t['name'])?>
<?php $n++;}unset($n); ?>
<?php $i++;?>
<?php $menu_type_search[$i] = array('url'=> 'javascript:void(0);', 'name' => '[ Software ]')?>
<?php $i++;?>
<?php $menu_type_search[$i] = array('url'=> $url.'/soft/', 'name' => '&nbsp;&nbsp;&nbsp;-'.'Download')?>
<?php $i++;?>
<?php $menu_type_search[$i] = array('url'=> $url.'/manual/', 'name' => '&nbsp;&nbsp;&nbsp;-'.'User manual')?>

<?php include template("content","header"); ?>
<!--breadcrumb-->
<?php include template("content","breadcrumb"); ?>
<!--breadcrumb end-->

<?php if($_GET['soft']==1) { ?>
    <div class="boxbg mtop10">
        <div class="h5_16 cred">Software</div>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=032f119d8815cf60a4c035cf8f220c88&action=lists&catid=23&num=1000&moreinfo=1&order=listorder+desc%2C+id+desc\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'23','moreinfo'=>'1','order'=>'listorder desc, id desc','limit'=>'1000',));}?>
            <?php if($data) { ?>
                <table width="100%" class="table-three mtop20">
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
                                 <?php $document = json_decode($d['software'],true);?>
                                 <?php $n=1;if(is_array($document)) foreach($document AS $doc) { ?>
                                 <a href="<?php echo $doc['fileurl'];?>" title='<?php echo $doc['filename'];?>' download></a>
                                 <?php $n++;}unset($n); ?>
                             </td>
                         </tr>
                         <?php $n++;}unset($n); ?>
                     </tbody>
                 </table>
            <?php } else { ?>
                No Software here!
            <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </div>  
<?php } elseif ($_GET['manual']==1) { ?>
    <div class="boxbg mtop10">
        <div class="h5_16 cred">User manual</div>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c11c321ac8bfc8dbd3ea3872de49c2e1&action=lists&catid=34&num=1000&moreinfo=1&order=listorder+desc%2C+id+desc\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'34','moreinfo'=>'1','order'=>'listorder desc, id desc','limit'=>'1000',));}?>
            <?php if($data) { ?>
                <table width="100%" class="table-three mtop20">
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
                No User manual here!
            <?php } ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </div> 
<?php } else { ?>
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

                <?php $t_data = array();?>
                <?php $n=1;if(is_array($data)) foreach($data AS $d) { ?>
                <?php $t_data[$d['p_id']][] = $d;?>
                <?php $n++;}unset($n); ?>
                <?php $n=1;if(is_array($t_data)) foreach($t_data AS $data) { ?>
                <div class="boxbg mtop10">            
                    <div class="h5_16 cred">
                        <?php echo $type['name'];?> - 
                        <?php echo $data['0']['p_name'];?>
                    </div>            
                    <table width="100%" class="table-three mtop20">
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
                </div>
                <?php $n++;}unset($n); ?>
            <?php } ?>
           <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>    
        <?php $n++;}unset($n); ?>
<?php } ?>



<!-- content end-->
<?php include template("content","footer"); ?>
