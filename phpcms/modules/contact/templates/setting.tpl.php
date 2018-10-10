<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header', 'admin');
?>
<script type="text/javascript">
<!--
    $(function() {
        SwapTab('setting', 'on', '', 5,<?php echo $_GET['tab'] ? $_GET['tab'] : '1' ?>);
    })
//-->
</script>
<form action="?m=contact&c=contact&a=setting" method="post" id="myform">
    <div class="pad-10">
        <div class="col-tab">
            <ul class="tabBut cu-li">
                <li id="tab_setting_1" class="on" onclick="SwapTab('setting', 'on', '', 5, 1);">客户订阅</li>
                <li id="tab_setting_2" onclick="SwapTab('setting', 'on', '', 5, 2);">Contact Us</li>
                <li id="tab_setting_3" onclick="SwapTab('setting', 'on', '', 5, 3);">Technical Support</li>
                <li id="tab_setting_4" onclick="SwapTab('setting', 'on', '', 5, 4);">Reseller</li>
            </ul>
            <div id="div_setting_1" class="contentList pad-10">
                <table width="100%"  class="table_form">
                    <tr>
                        <th width="120">主题</th>
                        <td class="y-bg"><input type="text" class="input-text" name="setting[1][subject]" size="30" value="<?php echo $setting[1][subject] ?>"/>
                            &nbsp;&nbsp;&nbsp;&nbsp;邮件发送标题
                        </td>
                    </tr>
                    <tr>
                        <th width="120">收件人</th>
                        <td class="y-bg"><input type="text" class="input-text" name="setting[1][mail_to]" size="30" value="<?php echo $setting[1][mail_to] ?>"/></td>
                    </tr> 
                    <tr>
                        <th width="120">内容格式</th>
                        <td class="y-bg">
                            <textarea name="setting[1][content]" style='width:600px;height:150px;'><?php echo $setting[1][content] ?></textarea>
                            <br/>
                            可用字段：{email}{addtime}
                        </td>
                    </tr>
                </table>
            </div>
            <div id="div_setting_2" class="contentList pad-10 hidden">
                <table width="100%"  class="table_form">
                    <tr>
                        <th width="120">主题</th>
                        <td class="y-bg"><input type="text" class="input-text" name="setting[2][subject]" size="30" value="<?php echo $setting[2][subject] ?>"/>
                            &nbsp;&nbsp;&nbsp;&nbsp;邮件发送标题
                        </td>
                    </tr>
                    <tr>
                        <th width="120">收件人</th>
                        <td class="y-bg"><input type="text" class="input-text" name="setting[2][mail_to]" size="30" value="<?php echo $setting[2][mail_to] ?>"/></td>
                    </tr>    
                    <tr>
                        <th width="120">内容格式</th>
                        <td class="y-bg">
                            <textarea name="setting[2][content]" style='width:600px;height:150px;'><?php echo $setting[2][content] ?></textarea>
                            <br/>
                            可用字段：
                            {first_name}
                            {last_name}
                            {company}
                            {title}
                            {email}
                            {phone}
                            {country}
                            {state}
                            {request}
                            {ip}
                            {addtime}
                        </td>
                    </tr>
                </table>
            </div>
            <div id="div_setting_3" class="contentList pad-10 hidden">
                <table width="100%"  class="table_form">
                    <tr>
                        <th width="120">主题</th>
                        <td class="y-bg"><input type="text" class="input-text" name="setting[3][subject]" size="30" value="<?php echo $setting[3][subject] ?>"/>
                            &nbsp;&nbsp;&nbsp;&nbsp;邮件发送标题
                        </td>
                    </tr>
                    <tr>
                        <th width="120">收件人</th>
                        <td class="y-bg"><input type="text" class="input-text" name="setting[3][mail_to]" size="30" value="<?php echo $setting[3][mail_to] ?>"/></td>
                    </tr>      
                    <tr>
                        <th width="120">内容格式</th>
                        <td class="y-bg">
                            <textarea name="setting[3][content]" style='width:600px;height:150px;'><?php echo $setting[3][content] ?></textarea>
                            <br/>
                            可用字段：
                            {first_name}
                            {last_name}
                            {company}
                            {email}
                            {phone}
                            {country}
                            {state}
                            {interested}
                            {comments}
                            {ip}
                            {addtime}
                        </td>
                    </tr>
                </table>
            </div>
            <div id="div_setting_4" class="contentList pad-10 hidden">
                <table width="100%"  class="table_form">
                    <tr>
                        <th width="120">主题</th>
                        <td class="y-bg"><input type="text" class="input-text" name="setting[4][subject]" size="30" value="<?php echo $setting[4][subject] ?>"/>
                            &nbsp;&nbsp;&nbsp;&nbsp;邮件发送标题
                        </td>
                    </tr>
                    <tr>
                        <th width="120">收件人</th>
                        <td class="y-bg"><input type="text" class="input-text" name="setting[4][mail_to]" size="30" value="<?php echo $setting[4][mail_to] ?>"/></td>
                    </tr>     
                    <tr>
                        <th width="120">内容格式</th>
                        <td class="y-bg">
                            <textarea name="setting[4][content]" style='width:600px;height:150px;'><?php echo $setting[4][content] ?></textarea>
                            <br/>
                            可用字段：
                            {first_name}
                            {last_name}
                            {company}
                            {email}
                            {phone}
                            {country}
                            {state}
                            {interested}
                            {comments}
                            {ip}
                            {addtime}
                        </td>
                    </tr>
                </table>
            </div>

            <div class="bk15"></div>
            <input name="dosubmit" type="submit" value="<?php echo L('submit') ?>" class="button">
        </div>
    </div>
</form>
</body>
<script type="text/javascript">

    function SwapTab(name, cls_show, cls_hide, cnt, cur) {
        for (i = 1; i <= cnt; i++) {
            if (i == cur) {
                $('#div_' + name + '_' + i).show();
                $('#tab_' + name + '_' + i).attr('class', cls_show);
            } else {
                $('#div_' + name + '_' + i).hide();
                $('#tab_' + name + '_' + i).attr('class', cls_hide);
            }
        }
    }


</script>
</html>