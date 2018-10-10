<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);
/*技术支持*/
class tec_support extends admin {
    function __construct() {
        $this->setting_db = pc_base::load_model("extend_setting_model");
        $this->db = pc_base::load_model("tec_support_model"); 
        pc_base::load_sys_class('form');
    }
    
    //列表
    public function init(){
        $is_email_send = $_GET['is_email_send'];
        $is_response = $_GET['is_response'];
        $is_show = $_GET['is_show'];
        
        $total = $this->db->count();
        $page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
        $pagesize = 20;
        $offset = ($page - 1) * $pagesize;
        $orderby = "id desc";
        $where = "1=1 ";
        //邮件是否发送成功
        if($is_email_send=='1' || $is_email_send=='0'){
            $where .= "and is_email_send = $is_email_send ";
        }
        //是否回复
        if($is_response=='1'){
            $where .= "and response is not null ";
        }elseif($is_response == '0'){
            $where .= "and response is null ";
        }
        //是否前台显示
        if($is_show=='1' || $is_show=='0'){
            $where .= "and is_show = $is_show ";
        }
        $list = $this->db->select($where, '*', $offset . ',' . $pagesize,$orderby);
        $pages = pages($total, $page, $pagesize);
        $show_dialog = true;
        include $this->admin_tpl('tec_support_list');
    }
    //查看
    public function view(){
        $id = $_GET['id'];
        if(!$id)exit;
        $where = array('id' => $id);
        $info = $this->db->get_one($where);
        $data = array('is_read'=>1);
        $this->db->update($data,$where);
        
        include $this->admin_tpl('tec_support_view');
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
            $subject = $data[3]['subject'];
            $mail_to = $data[3]['mail_to'];
            $content = $data[3]['content'];
            
        }else{
            showmessage("请先设置收件邮箱！");
        }
        
        //内容格式替换
        if ($content){
            foreach ($info as $key=>$val){
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
    
    //回复设置
    public function response(){
        if(isset($_POST['dosubmit'])) {
            $data = array(
                'response' => $_POST['response'],
                'is_show' => $_POST['is_show'],
                'response_user' => param::get_cookie('admin_username'),
                'response_time' => time()
            );
            $id = $_POST['id'];
            $this->db->update($data,array('id'=>$id));
            showmessage("操作成功！", "index.php?m=contact&c=tec_support&a=init");
        }else{
            $id = $_GET['id'];
            if(!$id)exit;
            $where = array('id' => $id);
            $info = $this->db->get_one($where);

            include $this->admin_tpl('tec_support_response');
        }        
    }
}