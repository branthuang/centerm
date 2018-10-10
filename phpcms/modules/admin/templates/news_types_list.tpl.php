<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_dialog = 1;
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-lr-10">
    <div class="col-tab">
        <ul class="tabBut cu-li">
            <?php foreach($this->types as $k=>$v){ ?>
            <li id="tab_setting_1" <?php if($type==$k){?>class="on"<?php }?> onclick="location.href='<?php echo buildurl('init','news_types','admin',array('type'=>$k));?>'">
                <?php echo $v; ?>
            </li>
            <?php } ?>
            
        </ul>
        <div id="div_setting_1" class="contentList pad-10">
            <form name="myform" id="myform" action="?m=admin&c=news_types&a=listorder" method="post" >
                <div class="table-list">
                    <table width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="35" align="center"><?php echo L('listorder') ?></th>
                                <th>名称</th>
                                <th width="12%" align="center">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (is_array($infos)) {
                                foreach ($infos as $info) {
                                    ?>
                                    <tr>
                                        <td align="center" width="10%">
                                            <input name='listorders[<?php echo $info['id'] ?>]' type='text' size='3' 
                                                                              value='<?php echo $info['listorder'] ?>' class="input-text-c"></td>
                                        
                                        <td align="center" width="30%"><?php echo $info['name']; ?></td>
                                        <td align="center" width="15%">
                                            <a href="###" onclick="edit('<?php echo $info['id']; ?>','<?php echo $info['name']; ?>')">修改</a>
                                            |
                                            <a href="index.php?m=admin&c=news_types&a=delete&id=<?php echo $info['id']; ?>" 
                                               onclick="if (!confirm('删除不可恢复。确认删除？')) {
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
    </div>
</div>
<script type="text/javascript">

    function edit(id, name) {
        window.top.art.dialog({id: 'edit'}).close();
        window.top.art.dialog({title: '<?php echo L('edit') ?> ' + name + ' ', id: 'edit', iframe: '?m=admin&c=news_types&a=edit&id=' + id, width: '700', height: '450'}, function() {
            var d = window.top.art.dialog({id: 'edit'}).data.iframe;
            var form = d.document.getElementById('dosubmit');
            form.click();
            return false;
        }, function() {
            window.top.art.dialog({id: 'edit'}).close()
        });
    }

</script>
</body>
</html>
