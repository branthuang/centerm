<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_dialog = 1;
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-lr-10">
    <form name="searchform" action="" method="get" >
        <input type="hidden" value="faq" name="m">
        <input type="hidden" value="index" name="c">
        <input type="hidden" value="init" name="a">
        <table width="100%" cellspacing="0" class="search-form">
            <tbody>
                <tr>
                    <td><div class="explain-col">
                            类型：<?php echo form::select_with_func(3897,'rel_type','rel_type','请选择','slt_product','',$rel_type)?>
                            关联产品： 
                            <select name="rel_product_id" id="rel_product_id">
                            <?php 
                            if($pro_option){ 
                                echo $pro_option;
                            }else{ 
                            ?>
                                <option>请先选择类型</option>
                            <?php } ?>
                            </select>
                            
                            独立类型：<?php echo form::select_with_func(3933,'faq_type','faq_type','请选择','','',$faq_type)?>
                            标题： <input type="text" name="title" value="<?php echo $title ?>" />
                            <input type="submit" value="<?php echo L('search') ?>" class="button" name="dosubmit">                             
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    
    <form name="myform" id="myform" action="?m=faq&c=index&a=listorder" method="post" >
        <div class="table-list">
            <table width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="35" align="center"><?php echo L('listorder') ?></th>
                        <th>标题</th>
                        <th width="12%" align="center">关联产品</th>
                        <th width="10%" align="center">关联分类</th>
                        <th width="10%" align="center">独立分类</th>
                        <th width="8%" align="center">添加时间</th>
                        <th width="12%" align="center">操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (is_array($infos)) {
                        foreach ($infos as $info) {
                            ?>
                            <tr>
                                <td align="center" width="10%"><input name='listorders[<?php echo $info['id'] ?>]' type='text' size='3' value='<?php echo $info['listorder'] ?>' class="input-text-c"></td>
                                <td align="center" width="10%"><?php echo $info['title']; ?></td>
                                <td align="center" width="30%"><?php echo $info['product_name']; ?></td>
                                <td align="center" width="10%"><?php echo $product_type[$info['rel_type']]['name']; ?></td>
                                <td align="center" width="10%"><?php echo $faq_type_arr[$info['rel_faq_type']]['name']; ?></td>
                                <td width="10%" align="center"><?php echo date('Y-m-d H:i:s', $info['addtime']); ?></td>
                                <td align="center" width="15%">
                                    <a href="index.php?m=faq&c=index&a=edit&id=<?php echo $info['id']; ?>">修改</a>
                                    |
                                    <a href="index.php?m=faq&c=index&a=delete&id=<?php echo $info['id']; ?>" onclick="if (!confirm('删除不可恢复。确认删除？')) {
                                                        return false;
                                                    }">删除</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="btn"> 
            <input name="dosubmit" type="submit" class="button"
                   value="排序">&nbsp;&nbsp;
            <div id="pages"><?php echo $pages ?></div>
    </form>
</div>
<script type="text/javascript">

    function edit(id, name) {
        window.top.art.dialog({id: 'edit'}).close();
        window.top.art.dialog({title: '<?php echo L('edit') ?> ' + name + ' ', id: 'edit', iframe: '?m=link&c=link&a=edit&linkid=' + id, width: '700', height: '450'}, function() {
            var d = window.top.art.dialog({id: 'edit'}).data.iframe;
            var form = d.document.getElementById('dosubmit');
            form.click();
            return false;
        }, function() {
            window.top.art.dialog({id: 'edit'}).close()
        });
    }

function slt_product(val){
    if(val){
        $.ajax({
        type: "POST",
        url: "index.php",
        data:   "m=faq&c=index&a=ajax_slt_product&type="+val+"&pc_hash="+pc_hash,
        success: function(msg){
            if(msg){
                $('#rel_product_id').html(msg);
            }
        } 
       }); 
    }
}
</script>
</body>
</html>
