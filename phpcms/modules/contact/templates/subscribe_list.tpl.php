<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header', 'admin');
?>
<div class="pad_10">
    <form name="searchform" action="" method="get" >
        <Input type="hidden" name="m" value="contact"/>
        <input type="hidden" name="c" value="subscribe"/>
        <input type="hidden" name="a" value="init" />
        <table width="100%" cellspacing="0" class="search-form">
            <tbody>
                <tr>
                    <td><div class="explain-col">
                            是否已经邮件：
                            <select name="is_email_send">
                                <option value="">请选择</option>
                                <option value="1" <?php if($is_email_send=='1'){echo 'selected';}?>>是</option>
                                <option value="0" <?php if($is_email_send=='0'){echo 'selected';}?>>否</option>
                            </select>
                            <input type="submit" value="<?php echo L('search') ?>" class="button" name="dosubmit">
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <div class="table-list">
        <table width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th width="80">id</th>
                    <th>邮箱</th>
                    <th>IP</th>
                    <th>时间</th>
                    <th>是否邮件通知</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (is_array($list)):
                    foreach ($list as $v):
                        ?>
                        <tr>
                            <td width="80" align="center"><?php echo $v['id'] ?></td>
                            <td align="center"><?php echo $v['email'] ?></td>
                            <td align="center"><?php echo $v['ip'] ?></td>
                            <td align="center"><?php echo date('Y-m-d H:i:s', $v['addtime']) ?></td>
                            <td align="center"><?php echo $v['is_email_send'] ? '<span style="color:green">是</span>' : '<span style="color:red">否</span>' ?></td>
                            <td>
                                <a href="index.php?m=contact&c=subscribe&a=mail_send&type=1&id=<?php echo $v['id'] ?>" title="邮件重新发送">邮件重发</a>
                                | 
                                <a href="index.php?m=contact&c=subscribe&a=delete&id=<?php echo $v['id'] ?>" title="删除不可恢复" onclick="if(!confirm('删除不可恢复。确认删除？')){return false;}">删除</a>
                            </td>
                        </tr>
                        <?php
                    endforeach;
                endif;
                ?>
            </tbody>
        </table>
    </div>
</div>
<div id="pages"><?php echo $pages ?></div>
<script type="text/javascript">
    

</script>
</body>
</html>