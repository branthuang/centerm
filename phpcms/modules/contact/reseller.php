<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);
class reseller extends admin  {
    //put your code here
    function __construct() {
        $this->setting_db = pc_base::load_model("extend_setting_model");
        $this->db = pc_base::load_model("reseller_model"); //联系我们模型
        pc_base::load_sys_class('form');
    }
    //列表
    public function init(){
        $is_read = $_GET['is_read'];
        $is_email_send = $_GET['is_email_send'];
        
        $total = $this->db->count();
        $page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
        $pagesize = 20;
        $offset = ($page - 1) * $pagesize;
        $orderby = "id desc";
        $where = "1=1 ";
        if($is_read=='1' || $is_read=='0'){
            $where .= "and is_read = $is_read ";
        }
        if($is_email_send=='1' || $is_email_send=='0'){
            $where .= "and is_email_send = $is_email_send ";
        }
        $list = $this->db->select($where, '*', $offset . ',' . $pagesize,$orderby);
        $pages = pages($total, $page, $pagesize);
        $show_dialog = true;
        include $this->admin_tpl('reseller_list');
    }
    
    //查看
    public function view(){
        $id = $_GET['id'];
        if(!$id)exit;
        $where = array('id' => $id);
        $info = $this->db->get_one($where);
        $data = array('is_read'=>1);
        $this->db->update($data,$where);
        //country
        $c_id = $info['country'];
        $info['country'] = get_country_name($c_id);
        
        include $this->admin_tpl('reseller_view');
    }
    
    public function delete(){
        $id = $_GET['id'];
        $where = array('id' => $id);
        $this->db->delete($where);
        
        showmessage("删除成功！",HTTP_REFERER);
    }
    
    //重发邮件
    public function mail_send(){
        $id = $_GET['id'];
        $where = array('id' => $id);
        $info = $this->db->get_one($where);
        
        //收件人设置
        $where = "`key` = 'mail_setting'";
        $s = $this->setting_db->get_one($where);
        $data = string2array($s['data']);
        
        if($data){
            //联系我们 格式
            $subject = $data[4]['subject'];
            $mail_to = $data[4]['mail_to'];
            $content = $data[4]['content'];
            
        }else{
            showmessage("请先设置收件邮箱！");
        }
        
        //内容格式替换
        if ($content){
            foreach ($info as $key=>$val){
                //country
                if($key == 'country'){
                    $c_id = $val;
                    $val = get_country_name($c_id);
                }
                //目的
                if($key == 'interested'){
                    $interested_linkage = getcache(3918,'linkage');
                    $val = $interested_linkage['data'][$val]['name'];
                }
        
                $content = str_replace('{'.$key.'}', $val, $content);
            }
            $message = $content;
        }else{
            $message = array2string($info);
        }
        
        $message = safe_replace($message);
        
        //发送邮件
        if(send_mail($subject, $message, $mail_to)){
            $where = array('id' => $id);
            $data = array('is_email_send'=>1);
            $this->db->update($data,$where);
            showmessage("成功！");
        }else{
            showmessage("发送失败");
        }
    }
}
