<?php
set_time_limit(0);
session_start();

define('PHPCMS_PATH', dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR);
include PHPCMS_PATH . '/phpcms/base.php';

require_once(PHPCMS_PATH."phpcms/libs/classes/twitteroauth/autoload.php");
require_once(PHPCMS_PATH."phpcms/libs/classes/twitteroauth/src/TwitterOAuth.php");

$twitteruser = "Centerm_News"; // teitter帐号
$notweets = 30; //记录数目
//申请的app参数
$consumerkey = "slH7jJDbRMTHNX3i1dj9s53Tv";
$consumersecret = "0IlPGZioi5r6WQVkfD31DWVglJimRH6MdBrsaxcyKBFb4z8kfB";
$accesstoken = "826455908829978625-g9D7ZacNYqzP2XwDLzXGLRljBpCKh3T";
$accesstokensecret = "lQ821DBDh93O9mB99ZLyN7x89FHf80pPiTnGTLJ1jxAiU";

function getConnectionWithAccessToken($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
    $connection = new Abraham\TwitterOAuth\TwitterOAuth($cons_key, $cons_secret, $oauth_token, $oauth_token_secret);
    return$connection;
}

$connection = getConnectionWithAccessToken($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
$tweets = $connection->get("statuses/user_timeline",["screen_name"=>$twitteruser, "count"=> $notweets]);

$n_model = pc_base::load_model("twitter_news_model");

//替换字符串中单词以#， 或者@开头的单词，为一个连接
//替换字符串中单词中以#或者@开头的单词，改换为一个链接
function add_link($str){
    $twitter_url = "https://twitter.com/";
    $str_arr = explode(' ',$str);
    foreach($str_arr as $val){
        $first_letter = substr($val, 0,1);
        if($first_letter == '@'){
            $twitter_id = urlencode(substr($val, 1));
            $a_link = "<a href='".$twitter_url.$twitter_id."' target='_blank'>$val</a>";
            $str = str_replace($val, $a_link, $str);
        }elseif($first_letter == '#'){
            $search_txt = urlencode($val);
            $a_link = "<a href='".$twitter_url."search?q=".$search_txt."' target='_blank'>$val</a>";
            $str = str_replace($val, $a_link, $str);
        }
    }
    return $str;
}

$i = 0;
if (!empty($tweets)){
    foreach($tweets as $v){
        $t_id = $v->id; //twitter 新闻id
        $one = $n_model->get_one("t_id=".$t_id);
        if($one){
            //已有记录，更旧的之前就都更新过一次，不用再进行下去.跳出循环，结束程序
            break;
        }else{
            $data = array(
                't_id' => $t_id,
                'text' => $v->text,
                'created' => strtotime($v->created_at)
            );
            
            $text = add_link($v->text); //替换以#或者@开头的单词
            
            //url地址
            $urls = $v->entities->urls;            
            $url_arr = array();
            if (!empty($urls)){
                foreach($urls as $u){
                    $url_arr[] = $u->url;
                    $link_str = "<a href='".$u->url."' target='_blank'>".$u->url."</a>"; 
                    $text = str_replace($u->url, $link_str, $text);
                }
            }
            $data['urls'] = json_encode($url_arr);
            
            //media地址
            $media = $v->entities->media;
            $media_arr = array();
            if(!empty($media)){
                foreach($media as $m){
                    $media_arr[] = $m->url;
                    $link_str = "<a href='".$m->url."' target='_blank'>".$m->url."</a>"; 
                    $text = str_replace($m->url, $link_str, $text);
                }
            }
            $data['media'] = json_encode($media_arr);
            
            $data['format_text'] = urlencode($text); 
            
            $n_model->insert($data);
            $i++;// 计算增加记录数目
        }
    }
}
if($i>0){
    echo "SUCCESS! 更新记录：".$i."条";
}else{
    echo "SORRY. 无新纪录需要更新！";
}

?>