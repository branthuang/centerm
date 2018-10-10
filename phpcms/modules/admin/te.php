<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin','admin',0);

class te extends admin {
    public function __construct() {
            parent::__construct();
            $this->db = pc_base::load_model('admin_model');
    }
    
    public function init(){
        $sql = "select id from ct_products_data ";
        $this->db->query($sql);
        $result = $this->db->fetch_array();
        foreach($result as $val){
            $id = $val['id'];
            $sql = "select * from centerm_en.dt_article_albums where article_id = $id";
            $this->db->query($sql);
            $attr = $this->db->fetch_array();
            if(!empty($attr)){
                $product_images = array();
                foreach ($attr as $v){
                    $product_images[] = array(
                        'url' => 'http://en.centerm.com/'.$v['original_path'],
                        'alt' => ''
                    );
                }
                $product_images = array2string($product_images);
                
                $sql = "update ct_products_data set product_images = '$product_images' "
                        . "where id = $id";
                $this->db->query($sql);
            }            
        }
        echo 1;exit;
    }
    
    public function t(){
        $sql = "select a.id, b.file_name, b.file_path
from centerm_en.dt_article a left join centerm_en.dt_article_attach b on a.id = b.article_id
where a.category_id = 1090";
         $this->db->query($sql);
        $result = $this->db->fetch_array();
        foreach($result as $val){
            $pdf_file = array();
            $pdf_file[] = array(
                'fileurl' => 'http://en.centerm.com/'.$val['file_path'],
                'filename' => $val['file_name'],
            );
            $pdf_file = array2string($pdf_file);
            $sql = "insert into ct_case_data set id= ".$val['id'].", pdf_file = '".$pdf_file."' ";
            $this->db->query($sql);
        }
        echo 1;exit;
    }
}
