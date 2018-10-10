<?php

class contact_tag{
        private $db;
	public function __construct() {
		$this->db = pc_base::load_model("tec_support_model"); 
	}
        /**
	 * 分页统计
	 * @param $data
	 */
	public function count($data) {
		if($data['action'] == 'lists') {
			$sql = "is_show = 1 ";
                        if(isset($data['where'])) {
                                $sql .= " and ".$data['where'];
                        }
			return $this->db->count($sql);
		}
	}
        
        public function lists($data) {
            $sql = "is_show = 1 ";
            if(isset($data['where'])) {
                    $sql .= " and ".$data['where'];
            }
            
            $order = $data['order']?$data['order']:'id desc';
            $limit = $data['limit'];
            
            $return = $this->db->select($sql, '*', $limit, $order, '', 'id');
            return $return;
        }
}