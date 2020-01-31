<?php

defined('IN_PHPCMS') or exit('No permission resources.');


class index {

    private $db;
    
    function __construct() {        
        
        $this->united_state = 3665;//“美国”在国家联动菜单中的id
    }
    
    /*添加联系我们记录*/
    function add(){
        $this->db = pc_base::load_model('contact_model');
        
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $company = trim($_POST['company']);
        $title = trim($_POST['title']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $country = intval($_POST['country']); //联动菜单
        if(!$first_name || !$company || !$email){
            //必要参数需要输入
            exit;
        }
        if($country == $this->united_state){
            //美国
            $state_select = intval($_POST['state_select']);            
            if($state_select){
                $result = getcache(3654,'linkage');//美国联动菜单 3654
                $state = $result['data'][$state_select]['name'];
            }
            
        }else{
            $state = trim($_POST['state']);
        }
        
        $request = trim($_POST['request']);
        $ip = ip();
        $addtime = time();
        $b_time = $addtime - 10*60;//十分钟
        $where = "ip = '$ip' and addtime > $b_time";
        //防止重复提交。同一个ip，十分钟内禁止重复提交
        $r = $this->db->get_one($where);
        if($r){
           echo 2;exit; 
        }
        $info = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'company' => $company,
            'title' => $title,
            'email' => $email,
            'phone' => $phone,
            'country' => $country,
            'state' => $state,
            'request' => $request,
            'addtime' => $addtime,
            'ip' => $ip
        );
        $id = $this->db->insert($info,true);
        
        //收件人设置
        $where = "`key` = 'mail_setting'";
        $this->setting_db = pc_base::load_model("extend_setting_model");
        $s = $this->setting_db->get_one($where);
        $data = string2array($s['data']);
        $subject = $data[2]['subject'];
        $mail_to = $data[2]['mail_to'];
        $content = $data[2]['content'];
        if ($content){
            foreach ($info as $key=>$val){
                //country
                if($key == 'country'){
                    $c_id = $val;
                    $val = get_country_name($c_id);
                }
        
                $content = str_replace('{'.$key.'}', $val, $content);
            }
            $message = $content;
        }else{
            $message = array2string($info);
        }
        //发送邮件
        if(send_mail($subject, $message, $mail_to)){
            //邮件发送成功
            $data = array(
                'is_email_send' => 1
            );
            $where = array(
                'id' => $id
            );
            $this->db->update($data,$where);
        }
        
        if($id){
            echo 1;exit;
        }
        echo 0;exit;
    }
    
    //添加subscribe邮箱
    public function add_subscribe(){
        $this->db = pc_base::load_model("subscribe_model");
        
        $email = safe_replace(trim($_POST['email']));
        if(!$email){
            exit;
        }
        $ip = ip();
        $addtime = time();
        $b_time = $addtime - 10*60;//十分钟
        $where = "ip = '$ip' and addtime > $b_time";
        //防止重复提交。同一个ip，十分钟内禁止重复提交
        $r = $this->db->get_one($where);
        if($r){
           echo 2;exit; 
        }
        $info = array(
            'email' => $email,
            'addtime' => $addtime,
            'ip' => $ip
        );
        $id = $this->db->insert($info,true);
        
        //收件人设置
        $where = "`key` = 'mail_setting'";
        $this->setting_db = pc_base::load_model("extend_setting_model");
        $s = $this->setting_db->get_one($where);
        $data = string2array($s['data']);
        $subject = $data[1]['subject'];
        $mail_to = $data[1]['mail_to'];
        $content = $data[1]['content'];
        if ($content){
            foreach ($info as $key=>$val){
        
                $content = str_replace('{'.$key.'}', $val, $content);
            }
            $message = $content;
        }else{
            $message = array2string($info);
        }
        //发送邮件
        if(send_mail($subject, $message, $mail_to)){
            //邮件发送成功
            $data = array(
                'is_email_send' => 1
            );
            $where = array(
                'id' => $id
            );
            $this->db->update($data,$where);
        }
        
        if($id){
            echo 1;exit;
        }
        echo 0;exit;
    }
    //添加reseller记录
    function add_reseller(){
        $this->db = pc_base::load_model('reseller_model');
        
        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $company = trim($_POST['company']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $country = intval($_POST['country']); //联动菜单
        if(!$first_name || !$company || !$email){
            //必要参数需要输入
            exit;
        }
        if($country == $this->united_state){
            //美国
            $state_select = intval($_POST['state_select']);            
            if($state_select){
                $result = getcache(3654,'linkage');//美国联动菜单 3654
                $state = $result['data'][$state_select]['name'];
            }
            
        }else{
            $state = trim($_POST['state']);
        }
        $interested = $_POST['interested'];
        $comments = trim($_POST['comments']);
        $ip = ip();
        $addtime = time();
        $b_time = $addtime - 10*60;//十分钟
        $where = "ip = '$ip' and addtime > $b_time";
        //防止重复提交。同一个ip，十分钟内禁止重复提交
        $r = $this->db->get_one($where);
        if($r){
           echo 2;exit; 
        }
        $info = array(
            'first_name' => safe_replace($first_name),
            'last_name' => safe_replace($last_name),
            'company' => safe_replace($company),
            'email' => safe_replace($email),
            'phone' => safe_replace($phone),
            'country' => safe_replace($country),
            'state' => safe_replace($state),
            'interested' => safe_replace($interested),
            'comments' => safe_replace($comments),
            'addtime' => $addtime,
            'ip' => $ip
        );
        $id = $this->db->insert($info,true);
        
        //收件人设置
        $where = "`key` = 'mail_setting'";
        $this->setting_db = pc_base::load_model("extend_setting_model");
        $s = $this->setting_db->get_one($where);
        $data = string2array($s['data']);
        $subject = $data[4]['subject'];
        $mail_to = $data[4]['mail_to'];
        $content = $data[4]['content'];
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
        //发送邮件
        if(send_mail($subject, $message, $mail_to)){
            //邮件发送成功
            $data = array(
                'is_email_send' => 1
            );
            $where = array(
                'id' => $id
            );
            $this->db->update($data,$where);
        }
        
        if($id){
            echo 1;exit;
        }
        echo 0;exit;
    }
    
    //添加comnunity记录 , （技术支持）
    function add_community(){
        $this->db = pc_base::load_model('tec_support_model');
        
        $name = trim($_POST['name']);
        $company = trim($_POST['company']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $country = $_POST['country']; //联动菜单        
        $message = trim($_POST['message']);
        if(!$name || !$company || !$email){
            exit;
        }
        $ip = ip();
        $addtime = time();
        $b_time = $addtime - 10*60;//十分钟
        $where = "ip = '$ip' and addtime > $b_time";
        //防止重复提交。同一个ip，十分钟内禁止重复提交
        $r = $this->db->get_one($where);
        if($r){
           echo 2;exit; 
        }
        $info = array(
            'name' => $name,
            'company' => $company,
            'email' => $email,
            'phone' => $phone,
            'country' => $country,
            'message' => $message,
            'addtime' => $addtime,
            'ip' => $ip
        );
        $id = $this->db->insert($info,true);
        //收件人设置
        $where = "`key` = 'mail_setting'";
        $this->setting_db = pc_base::load_model("extend_setting_model");
        $s = $this->setting_db->get_one($where);
        $data = string2array($s['data']);
        $subject = $data[3]['subject'];
        $mail_to = $data[3]['mail_to'];
        $content = $data[3]['content'];
        if ($content){
            foreach ($info as $key=>$val){
                        
                $content = str_replace('{'.$key.'}', $val, $content);
            }
            $message = $content;
        }else{
            $message = array2string($info);
        }
        //发送邮件
        if(send_mail($subject, $message, $mail_to)){
            //邮件发送成功
            $data = array(
                'is_email_send' => 1
            );
            $where = array(
                'id' => $id
            );
            $this->db->update($data,$where);
        }
        
        if($id){
            echo 1;exit;
        }
        echo 0;exit;
    }
}
