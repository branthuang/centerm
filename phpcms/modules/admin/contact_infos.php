<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);

class contact_infos extends admin {
    function __construct() {
        $this->setting_db = pc_base::load_model("extend_setting_model");
        pc_base::load_sys_class('form');
    }
    public function init(){
        if($_POST['dosubmit']){
            $info = json_encode($_POST['info']);
            $data = array(
                'key' => 'contact_infos',
                'data' => $info
            );
            $where = array('key' => 'contact_infos');
            if(!empty($this->setting_db->get_one($where))){
                $this->setting_db->update($data, $where);
            }else{
                $this->setting_db->insert($data);
            }
            showmessage("设置成功！");
        }
        $where = array('key' => 'contact_infos');
        $result = $this->setting_db->get_one($where);
        $info = json_decode($result['data'], true);
        
        include $this->admin_tpl("contact_infos");
    }
}