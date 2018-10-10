<?php
/**
 *  extention.func.php 用户自定义函数库
 *
 * @copyright			(C) 2005-2010 PHPCMS
 * @license				http://www.phpcms.cn/license/
 * @lastmodify			2010-10-27
 */
 
/*发送邮件
 * subject 主题
 * message 邮件内容
 * mail_to 收件人
*/
function send_mail($subject, $message, $mail_to){
    pc_base::load_sys_func('mail');
    $module_db = pc_base::load_model('module_model');
    $setting = $module_db->get_one("module='admin'",'setting');
    $setting = string2array($setting['setting']); //发送邮箱设置    
    
    $mail= Array (
            'mailsend' => 2,
            'maildelimiter' => 1,
            'mailusername' => 1,
            'server' => $setting['mail_server'],
            'port' => $setting['mail_port'],
            'mail_type' => $setting['mail_type'],
            'auth' => $setting['mail_auth'],
            'from' => $setting['mail_from'],
            'auth_username' => $setting['mail_user'],
            'auth_password' => $setting['mail_password']
    );	
    //多发送人情况
    $mail_to = str_replace('；', ';', $mail_to);
    $mail_to_arr = explode(';', $mail_to);
    if(count($mail_to_arr)>1){
        foreach ($mail_to_arr as $mail_to){
            sendmail($mail_to,$subject,$message,$setting['mail_from'],$mail);
        }
        $send = true;
    }else{
        $send = sendmail($mail_to,$subject,$message,$setting['mail_from'],$mail);
    }

    if($send) {
            return true;
    } else {
            return false;
    }	
}

//根据国家id，获得国家名称
function get_country_name($c_id){
    //country
        $linkageid = 3360;
        $country = getcache($linkageid,'linkage');
        
        if($c_id){
            return $country['data'][$c_id]['name'];
        }
}
/**
 * 生成URL地址
 * @param <type> $action
 * @param <type> $controller
 * @param <type> $module
 * @param <type> $params
 * @param <type> $host
 */
function buildurl($action = '', $controller = '', $module = '', $params = array(), $urlpre = '') {

	static $_urlpre;
	static $content_cp, $cpinfos, $content_siteid;
	static $cats;

	if (empty($urlpre) && !isset($_urlpre)) {
		$_urlpre = rtrim(APP_PATH, '/') . '/';
	}

	if (empty($module) && empty($controller) && empty($action)) {
		return empty($urlpre) ? $_urlpre : $urlpre;
	}

	$controller = empty($controller) ? ROUTE_C : $controller;
	$module = empty($module) ? ROUTE_M : $module;


	$url = (empty($urlpre) ? $_urlpre : (rtrim($urlpre, '/') . '/') ) . 'index.php?';

	$params = array_merge(array(
		'm' => $module,
		'c' => $controller,
		'a' => $action
			), $params);
	if (!isset($params['pc_hash']) && $_SESSION['pc_hash']) {
		$params['pc_hash'] = $_SESSION['pc_hash'];
	}

	$url .= http_build_query($params);
	return $url;
}
?>