<?php

class location_tag{
    public function __construct() {
            $this->db = pc_base::load_model('location_model');
    }
    public function lists($data){
        $where = $data['where']?$data['where']:'';
        $slt = $data['slt']?$data['slt']:'*';
        $limit = $data['limit'];
        $order = $data['order']?$data['order']:'listorder desc, id desc ';
        
        return $this->db->select($where, $slt, $limit, $order, '', 'id');
    }
    
    /**
    * 分页统计
    * @param $data
    */
    public function count($data) {
            if($data['action'] == 'lists') {
                    $sql = "1 = 1 ";
                    if(isset($data['where'])) {
                            $sql .= " and ".$data['where'];
                    }
                    return $this->db->count($sql);
            }
    }
}

