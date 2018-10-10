<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);
/*新闻分类表*/
class news_types_model extends model {
	public function __construct() {
		$this->db_config = pc_base::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'news_types';
		parent::__construct();
	}
        
        public function get_list($type){
            $type = intval($type);
            $where = "type = $type ";
            $order = "listorder desc, id desc";
            return $this->select($where, "*", '', $order);
        }
}
?>