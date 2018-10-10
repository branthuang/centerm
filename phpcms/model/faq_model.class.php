<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);
class faq_model extends model {
	public $table_name;
	public function __construct() {
		$this->db_config = pc_base::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'faq';
		parent::__construct();
	}
        
        //关联产品模型表
        public function get_list($where = '', $order = '', $page = 1, $pagesize = 20, $key='', $setpages = 10,$urlrule = '',$array = array()){
            $where = to_sqls($where);
            $this->number = $this->count($where);
            $page = max(intval($page), 1);
            $offset = $pagesize*($page-1);
            $this->pages = pages($this->number, $page, $pagesize, $urlrule, $array, $setpages);
            $array = array();
            if ($this->number > 0) {
                $sql = "select ct_faq.*, ct_products.title as product_name "
                        . "from ct_faq left join ct_products on ct_faq.rel_product_id = ct_products.id "
                        . "where $where "
                        . "order by $order "
                        . "limit $offset, $pagesize";//echo $sql;
                $this->query($sql);
                return $this->fetch_array();
                
            } else {
                    return array();
            }
        }
}
?>