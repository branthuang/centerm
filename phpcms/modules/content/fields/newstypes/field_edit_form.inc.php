<table cellpadding="2" cellspacing="1" width="98%">
    <tr> 
        <td width="100">相关类型</td>
        <td>
            <select name="setting[news_type]">
                <option value="" >请选择</option>
                <option value="1" <?php if($setting['news_type'] == '1'){echo 'selected';}?>>categories</option>
                <option value="2" <?php if($setting['news_type'] == '2'){echo 'selected';}?>>tags</option>
            </select>
        </td>
    </tr>
</table>
<SCRIPT LANGUAGE="JavaScript">
<!--
//-->
</SCRIPT>