//输出值
function newstypes($field, $value) {
    $types = pc_base::load_model("news_types_model");
    $result = $types->select();
    $r = array();
    foreach($result as $key=>$val){
        $r[$val['id']] = $val['name']; //新闻类型数组
    }
    
    $data_model = pc_base::load_model("news_types_data_model");
    $result = $data_model->select(array('news_key'=>$value));
    foreach($result as $key=>$val){
        $typeid = $val['news_types_id'];
        $v[] = $r[$typeid];
    }
    $string = implode(',',$v); 
    return $string;
}
