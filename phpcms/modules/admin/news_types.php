<?php

defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_app_class('admin', 'admin', 0);
pc_base::load_sys_class('form', '', 0);

class news_types extends admin {

    private $db;

    function __construct() {
        parent::__construct();
        $this->db = pc_base::load_model('news_types_model');
        $this->types = array(
            '1' => 'categories',
            '2' => 'tags'
        );
    }

    /**
     * 列表
     */
    public function init() {
        $type = $_GET['type']?$_GET['type']:1;
        $where = array(
            'type' => $type
        );
        $page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
        $infos = $this->db->listinfo($where,$order = 'listorder DESC,id DESC',$page, $pages = '9');
	$pages = $this->db->pages;
        include $this->admin_tpl('news_types_list');
    }

    /**
     * 添加
     */
    public function add() {
        if (isset($_POST['dosubmit'])) {
            if (!is_array($_POST['info'])) {
                showmessage(L('operation_failure'));
            }
            $info =  $_POST['info'];
            $insert_id = $this->db->insert($info, true);
            if ($insert_id) {
                showmessage(L('operation_success'), '?m=admin&c=news_types&a=init');
            }
        } else {
            include $this->admin_tpl('news_types_add');
        }
    }

    /**
     * 编辑
     */
    public function edit() {
        if (isset($_POST['dosubmit'])) {
            $info = $_POST['info'];
            $id = $_POST['id'];
            
            if (!is_array($_POST['info'])) {
                showmessage(L('operation_failure'));
            }
            $this->db->update($info, array('id' => $id));
            showmessage(L('operation_success'), '?m=admin&c=news_types&a=init','','edit');
        } else {
            $info = $this->db->get_one(array('id' => $_GET['id']));
            //print_r($info);
            include $this->admin_tpl('news_types_edit');
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