<?php
return array (
  'rel_case' => 
  array (
    'fieldid' => '310',
    'modelid' => '19',
    'siteid' => '1',
    'field' => 'rel_case',
    'name' => '关联案例',
    'tips' => '',
    'css' => '',
    'minlength' => '0',
    'maxlength' => '0',
    'pattern' => '',
    'errortips' => '',
    'formtype' => 'omnipotent',
    'setting' => '{"formtext":"<input type=\'hidden\' name=\'info[rel_case]\' id=\'rel_case\' value=\'{FIELD_VALUE}\' style=\'50\' >\\r\\n<ul class=\\"list-dot\\" id=\\"rel_case_text\\"><\\/ul>\\r\\n<div>\\r\\n<input type=\'button\' value=\\"\\u6dfb\\u52a0\\u76f8\\u5173\\" onclick=\\"omnipotent(\'selectid\',\'?m=content&c=content&a=public_relationlist&modelid=14&field=rel_case\',\'\\u6dfb\\u52a0\\u76f8\\u5173\\u6848\\u4f8b\',1)\\" class=\\"button\\" style=\\"width:66px;\\">\\r\\n<span class=\\"edit_content\\">\\r\\n<input type=\'button\' value=\\"\\u663e\\u793a\\u5df2\\u6709\\" onclick=\\"show_relation_other(14,{MODELID},{ID},\'rel_case\')\\" class=\\"button\\" style=\\"width:66px;\\">\\r\\n<\\/span>\\r\\n<\\/div>","fieldtype":"varchar","minnumber":"1"}',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '0',
    'issystem' => '0',
    'isunique' => '0',
    'isbase' => '0',
    'issearch' => '0',
    'isadd' => '0',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '0',
    'disabled' => '0',
    'isomnipotent' => '0',
    'formtext' => '<input type=\'hidden\' name=\'info[rel_case]\' id=\'rel_case\' value=\'{FIELD_VALUE}\' style=\'50\' >
<ul class="list-dot" id="rel_case_text"></ul>
<div>
<input type=\'button\' value="添加相关" onclick="omnipotent(\'selectid\',\'?m=content&c=content&a=public_relationlist&modelid=14&field=rel_case\',\'添加相关案例\',1)" class="button" style="width:66px;">
<span class="edit_content">
<input type=\'button\' value="显示已有" onclick="show_relation_other(14,{MODELID},{ID},\'rel_case\')" class="button" style="width:66px;">
</span>
</div>',
    'fieldtype' => 'varchar',
    'minnumber' => '1',
  ),
  'rel_product' => 
  array (
    'fieldid' => '311',
    'modelid' => '19',
    'siteid' => '1',
    'field' => 'rel_product',
    'name' => '相关产品',
    'tips' => '',
    'css' => '',
    'minlength' => '0',
    'maxlength' => '0',
    'pattern' => '',
    'errortips' => '',
    'formtype' => 'omnipotent',
    'setting' => '{"formtext":"<input type=\'hidden\' name=\'info[rel_product]\' id=\'rel_product\' value=\'{FIELD_VALUE}\' style=\'50\' >\\r\\n<ul class=\\"list-dot\\" id=\\"rel_product_text\\"><\\/ul>\\r\\n<div>\\r\\n<input type=\'button\' value=\\"\\u6dfb\\u52a0\\u76f8\\u5173\\" onclick=\\"omnipotent(\'selectid\',\'?m=content&c=content&a=public_relationlist&modelid=12&field=rel_product\',\'\\u6dfb\\u52a0\\u76f8\\u5173\\u4ea7\\u54c1\',1)\\" class=\\"button\\" style=\\"width:66px;\\">\\r\\n<span class=\\"edit_content\\">\\r\\n<input type=\'button\' value=\\"\\u663e\\u793a\\u5df2\\u6709\\" onclick=\\"show_relation_other(12,{MODELID},{ID},\'rel_product\')\\" class=\\"button\\" style=\\"width:66px;\\">\\r\\n<\\/span>\\r\\n<\\/div>","fieldtype":"varchar","minnumber":"1"}',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '0',
    'issystem' => '0',
    'isunique' => '0',
    'isbase' => '0',
    'issearch' => '0',
    'isadd' => '0',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '0',
    'disabled' => '0',
    'isomnipotent' => '0',
    'formtext' => '<input type=\'hidden\' name=\'info[rel_product]\' id=\'rel_product\' value=\'{FIELD_VALUE}\' style=\'50\' >
<ul class="list-dot" id="rel_product_text"></ul>
<div>
<input type=\'button\' value="添加相关" onclick="omnipotent(\'selectid\',\'?m=content&c=content&a=public_relationlist&modelid=12&field=rel_product\',\'添加相关产品\',1)" class="button" style="width:66px;">
<span class="edit_content">
<input type=\'button\' value="显示已有" onclick="show_relation_other(12,{MODELID},{ID},\'rel_product\')" class="button" style="width:66px;">
</span>
</div>',
    'fieldtype' => 'varchar',
    'minnumber' => '1',
  ),
  'catid' => 
  array (
    'fieldid' => '281',
    'modelid' => '19',
    'siteid' => '1',
    'field' => 'catid',
    'name' => '栏目',
    'tips' => '',
    'css' => '',
    'minlength' => '1',
    'maxlength' => '6',
    'pattern' => '/^[0-9]{1,6}$/',
    'errortips' => '请选择栏目',
    'formtype' => 'catid',
    'setting' => 'array (
  \'defaultvalue\' => \'\',
)',
    'formattribute' => '',
    'unsetgroupids' => '-99',
    'unsetroleids' => '-99',
    'iscore' => '0',
    'issystem' => '1',
    'isunique' => '0',
    'isbase' => '1',
    'issearch' => '1',
    'isadd' => '1',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '1',
    'disabled' => '0',
    'isomnipotent' => '0',
    'defaultvalue' => '',
  ),
  'title' => 
  array (
    'fieldid' => '283',
    'modelid' => '19',
    'siteid' => '1',
    'field' => 'title',
    'name' => '标题',
    'tips' => '',
    'css' => 'inputtitle',
    'minlength' => '1',
    'maxlength' => '80',
    'pattern' => '',
    'errortips' => '请输入标题',
    'formtype' => 'title',
    'setting' => '',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '0',
    'issystem' => '1',
    'isunique' => '0',
    'isbase' => '1',
    'issearch' => '1',
    'isadd' => '1',
    'isfulltext' => '1',
    'isposition' => '1',
    'listorder' => '4',
    'disabled' => '0',
    'isomnipotent' => '0',
  ),
  'updatetime' => 
  array (
    'fieldid' => '286',
    'modelid' => '19',
    'siteid' => '1',
    'field' => 'updatetime',
    'name' => '更新时间',
    'tips' => '',
    'css' => '',
    'minlength' => '0',
    'maxlength' => '0',
    'pattern' => '',
    'errortips' => '',
    'formtype' => 'datetime',
    'setting' => 'array (
  \'dateformat\' => \'int\',
  \'format\' => \'Y-m-d H:i:s\',
  \'defaulttype\' => \'1\',
  \'defaultvalue\' => \'\',
)',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '1',
    'issystem' => '1',
    'isunique' => '0',
    'isbase' => '1',
    'issearch' => '0',
    'isadd' => '0',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '12',
    'disabled' => '0',
    'isomnipotent' => '0',
    'dateformat' => 'int',
    'format' => 'Y-m-d H:i:s',
    'defaulttype' => '1',
    'defaultvalue' => '',
  ),
  'content' => 
  array (
    'fieldid' => '287',
    'modelid' => '19',
    'siteid' => '1',
    'field' => 'content',
    'name' => '内容',
    'tips' => '<div class="content_attr"><label><input name="add_introduce" type="checkbox"  value="1" checked>是否截取内容</label><input type="text" name="introcude_length" value="200" size="3">字符至内容摘要
<label><input type=\'checkbox\' name=\'auto_thumb\' value="1" checked>是否获取内容第</label><input type="text" name="auto_thumb_no" value="1" size="2" class="">张图片作为标题图片
</div>',
    'css' => '',
    'minlength' => '1',
    'maxlength' => '999999',
    'pattern' => '',
    'errortips' => '内容不能为空',
    'formtype' => 'editor',
    'setting' => 'array (
  \'toolbar\' => \'full\',
  \'defaultvalue\' => \'\',
  \'enablekeylink\' => \'1\',
  \'replacenum\' => \'2\',
  \'link_mode\' => \'0\',
  \'enablesaveimage\' => \'1\',
)',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '0',
    'issystem' => '0',
    'isunique' => '0',
    'isbase' => '1',
    'issearch' => '0',
    'isadd' => '1',
    'isfulltext' => '1',
    'isposition' => '0',
    'listorder' => '13',
    'disabled' => '0',
    'isomnipotent' => '0',
    'toolbar' => 'full',
    'defaultvalue' => '',
    'enablekeylink' => '1',
    'replacenum' => '2',
    'link_mode' => '0',
    'enablesaveimage' => '1',
  ),
  'inputtime' => 
  array (
    'fieldid' => '291',
    'modelid' => '19',
    'siteid' => '1',
    'field' => 'inputtime',
    'name' => '发布时间',
    'tips' => '',
    'css' => '',
    'minlength' => '0',
    'maxlength' => '0',
    'pattern' => '',
    'errortips' => '',
    'formtype' => 'datetime',
    'setting' => 'array (
  \'fieldtype\' => \'int\',
  \'format\' => \'Y-m-d H:i:s\',
  \'defaulttype\' => \'0\',
)',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '0',
    'issystem' => '1',
    'isunique' => '0',
    'isbase' => '0',
    'issearch' => '0',
    'isadd' => '0',
    'isfulltext' => '0',
    'isposition' => '1',
    'listorder' => '17',
    'disabled' => '0',
    'isomnipotent' => '0',
    'fieldtype' => 'int',
    'format' => 'Y-m-d H:i:s',
    'defaulttype' => '0',
  ),
  'url' => 
  array (
    'fieldid' => '294',
    'modelid' => '19',
    'siteid' => '1',
    'field' => 'url',
    'name' => 'URL',
    'tips' => '',
    'css' => '',
    'minlength' => '0',
    'maxlength' => '100',
    'pattern' => '',
    'errortips' => '',
    'formtype' => 'text',
    'setting' => '',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '1',
    'issystem' => '1',
    'isunique' => '0',
    'isbase' => '1',
    'issearch' => '0',
    'isadd' => '0',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '50',
    'disabled' => '0',
    'isomnipotent' => '0',
  ),
  'listorder' => 
  array (
    'fieldid' => '295',
    'modelid' => '19',
    'siteid' => '1',
    'field' => 'listorder',
    'name' => '排序',
    'tips' => '',
    'css' => '',
    'minlength' => '0',
    'maxlength' => '6',
    'pattern' => '',
    'errortips' => '',
    'formtype' => 'number',
    'setting' => '',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '1',
    'issystem' => '1',
    'isunique' => '0',
    'isbase' => '1',
    'issearch' => '0',
    'isadd' => '0',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '51',
    'disabled' => '0',
    'isomnipotent' => '0',
  ),
  'status' => 
  array (
    'fieldid' => '298',
    'modelid' => '19',
    'siteid' => '1',
    'field' => 'status',
    'name' => '状态',
    'tips' => '',
    'css' => '',
    'minlength' => '0',
    'maxlength' => '2',
    'pattern' => '',
    'errortips' => '',
    'formtype' => 'box',
    'setting' => '',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '1',
    'issystem' => '1',
    'isunique' => '0',
    'isbase' => '1',
    'issearch' => '0',
    'isadd' => '0',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '55',
    'disabled' => '0',
    'isomnipotent' => '0',
  ),
  'username' => 
  array (
    'fieldid' => '300',
    'modelid' => '19',
    'siteid' => '1',
    'field' => 'username',
    'name' => '用户名',
    'tips' => '',
    'css' => '',
    'minlength' => '0',
    'maxlength' => '20',
    'pattern' => '',
    'errortips' => '',
    'formtype' => 'text',
    'setting' => '',
    'formattribute' => '',
    'unsetgroupids' => '',
    'unsetroleids' => '',
    'iscore' => '1',
    'issystem' => '1',
    'isunique' => '0',
    'isbase' => '1',
    'issearch' => '0',
    'isadd' => '0',
    'isfulltext' => '0',
    'isposition' => '0',
    'listorder' => '98',
    'disabled' => '0',
    'isomnipotent' => '0',
  ),
);
?>