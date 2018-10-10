//新闻类型保存
function newstypes($field, $value) {
    $id = $_POST['id'];//文章id
    $result = $this->db->get_one(array('id'=>$id));
    $news_key = $result[$field]?$result[$field]:(time().$field); //不存在，用当前时间新生成
    
    $data_model = pc_base::load_model("news_types_data_model");
    $data_model->delete(array('news_key'=>$news_key)); //删除旧记录
    foreach($value as $v){
        if($v == -99){
            continue;
        }
        $data = array(
            'news_key' => $news_key,
            'news_types_id' => $v
        );
        $data_model->insert($data);
    }
    return $news_key;
}

