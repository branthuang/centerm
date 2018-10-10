<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);
/*新闻归属分类存储表*/
class news_types_data_model extends model {
	public function __construct() {
		$this->db_config = pc_base::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'news_types_data';
		parent::__construct();
	}
        //获取当前id最大值
        public function get_max_id(){
            $sql = "select max(id) as max_id from ".$this->table_name;
            $this->query($sql);
            $result = $this->fetch_array();
            return $result[0]['max_id']?$result[0]['max_id']:0;
        }
}
?>