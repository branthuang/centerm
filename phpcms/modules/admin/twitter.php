<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);

class twitter extends admin {
    public function __construct() {
            parent::__construct();
    }
    
    public function init () {
        $url = APP_PATH."autorun/get_tweiter_news.php";
        include $this->admin_tpl('twitter');
    }
}