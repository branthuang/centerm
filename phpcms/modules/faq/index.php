<?php

defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin', 'admin', 0);
pc_base::load_sys_class('form', '', 0);

class index extends admin {

    private $db;

    function __construct() {
        parent::__construct();
        $this->db = pc_base::load_model('faq_model');
    }

    /**
     * 列表
     */
    public function init() {
        $page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
        $rel_product_id = intval($_GET['rel_product_id']);
        $rel_type = intval($_GET['rel_type']);
        $faq_type = intval($_GET['faq_type']);
        $title = $_GET['title'];
        
        $where = "1=1 ";
        if($rel_product_id){
            $where .= " and rel_product_id = $rel_product_id";
        }
        if($rel_type){
            $where .= " and rel_type = $rel_type ";
            $pro_option = $this->product_options($rel_type, $rel_product_id);
        }
        if($faq_type){
            $where .= " and rel_faq_type = $faq_type ";
        }
        if($title){
            $where .= " and ct_faq.title like '%$title%' ";
        }
        $infos = $this->db->get_list($where,$order = 'listorder DESC,id DESC',$page, $pages = '9');
	$pages = $this->db->pages;
        
        //产品分类
        $product_type = getcache('3897', 'linkage');
        $product_type = $product_type['data'];
        //独立分类
        $faq_type_arr = getcache('3933', 'linkage');
        $faq_type_arr = $faq_type_arr['data'];
        
        include $this->admin_tpl('faq_list');
    }

    /**
     * 添加
     */
    public function add() {
        if (isset($_POST['dosubmit'])) {
            $faq_type = $_POST['faq_type'];
            if (!is_array($_POST['info'])) {
                showmessage(L('operation_failure'));
            }
            $info = $_POST['info'];
            if($faq_type == 1){
                //产品分类
                $add_info =  array(
                    'title' => $info['title'],
                    'content' => $info['content'],
                    'rel_product_id' => $info['rel_product_id'],
                    'rel_type' => $info['rel_type'],
                    'rel_faq_type' => ''
                );
            }else{
                //独立分类
                $add_info =  array(
                    'title' => $info['title'],
                    'content' => $info['content'],
                    'rel_product_id' => '',
                    'rel_type' => '',
                    'rel_faq_type' => $info['rel_faq_type']
                );
            }
            
            $add_info['addtime'] = time();
            $insert_id = $this->db->insert($add_info, true);
            if ($insert_id) {
                showmessage(L('operation_success'), '?m=faq&c=index&a=init');
            }
        } else {
            include $this->admin_tpl('faq_add');
        }
    }
    //产品选择项
    private function product_options($type, $default=''){
        $model = pc_base::load_model("content_model");
        $modelid = 12;//产品模型
        $model->set_model($modelid);
        $where = "product_type = $type";
        $list = $model->select($where);

        if(!empty($list)){
            $options = "<option value=''>请选择</option>";
            
            foreach($list as $val){
                $selected = '';
                if($default && $default ==$val['id']){
                    $selected = 'selected';
                }
                $options .= "<option value='".$val['id']."' $selected>".$val['title']."</option>";
            }
        }else{
            $options = "<option value=''>无关联产品</option>";
        }
        return $options;
    }
    
    /*选择产品*/
    public function ajax_slt_product(){
        $type = intval($_POST['type']);
        if($type){
            $options = $this->product_options($type);
            echo $options;
            exit;
        }
    }

    /**
     * 编辑
     */
    public function edit() {
        if (isset($_POST['dosubmit'])) {
            $info = $_POST['info'];
            $faq_type = $_POST['faq_type'];
            $id = $_POST['id'];
            
            if (!is_array($info)) {
                showmessage(L('operation_failure'));
            }
            
            if($faq_type == 1){
                //产品分类
                $add_info =  array(
                    'title' => $info['title'],
                    'content' => $info['content'],
                    'rel_product_id' => $info['rel_product_id'],
                    'rel_type' => $info['rel_type'],
                    'rel_faq_type' => ''
                );
            }else{
                //独立分类
                $add_info =  array(
                    'title' => $info['title'],
                    'content' => $info['content'],
                    'rel_product_id' => '',
                    'rel_type' => '',
                    'rel_faq_type' => $info['rel_faq_type']
                );
            }

            $this->db->update($add_info, array('id' => $id));
            showmessage(L('operation_success'), '?m=faq&c=index&a=init');
        } else {
            $id = $_GET['id'];
            $info = $this->db->get_one(array('id' => $id));
            if($info['rel_type']){
                $pro_option = $this->product_options($info['rel_type'], $info['rel_product_id']);
            }
            include $this->admin_tpl('faq_edit');
        }
    }

    /**
     * 删除
     */
    public function delete() {
        $id = intval($_GET['id']);
        $this->db->delete(array('id' => $id));
        showmessage(L('operation_success'));
    }

    /**
     * 更新排序
     */
    public function listorder() {
        if (isset($_POST['dosubmit'])) {
            foreach ($_POST['listorders'] as $key => $listorder) {
                $this->db->update(array('listorder' => $listorder), array('id' => $key));
            }
            showmessage(L('operation_success'));
        } else {
            showmessage(L('operation_failure'));
        }
    }  

}

?>