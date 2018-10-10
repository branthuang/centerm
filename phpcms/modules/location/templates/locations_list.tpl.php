<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_dialog = 1;
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-lr-10">

    <form name="myform" id="myform" action="?m=location&c=index&a=listorder" method="post" >
        <div class="table-list">
            <table width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width="35" align="center"><?php echo L('listorder') ?></th>
                        <th>国家</th>
                        <th width="12%" align="center">地址</th>
                        <th width="10%" align="center">手机</th>
                        <th width='10%' align="center">邮箱</th>
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
                                <td align="center" width="10%"><?php echo get_linkage($info['region'],3360);?></td>
                                <td align="center" width="30%"><?php echo $info['location'];?></td>
                                <td align="center" width="10%"><?php echo $info['telephone']; ?></td>
                                <td align="center" width="10%"><?php echo $info['email'];?></td>
                                <td width="10%" align="center"><?php echo date('Y-m-d H:i:s',$info['addtime']);?></td>
                                <td align="center" width="15%">
                                    <a href="index.php?m=location&c=index&a=edit&id=<?php echo $info['id'];?>">修改</a>
                                    |
                                    <a href="index.php?m=location&c=index&a=delete&id=<?php echo $info['id'];?>" onclick="if(!confirm('删除不可恢复。确认删除？')){return false;}">删除</a>
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
    
</script>
</body>
</html>
