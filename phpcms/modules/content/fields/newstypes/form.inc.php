//新闻文章类型 的显示
function newstypes($field, $value, $fieldinfo){
    $setting = string2array($fieldinfo['setting']);
    $news_type = $setting['news_type'];//标签分类
    
    $db = pc_base::load_model('news_types_model');
    $result = $db->get_list($news_type);
    foreach($result as $key=>$val){
        $option[$val['id']] = $val['name'];
    }
    
    $db_data = pc_base::load_model('news_types_data_model');
    $result = $db_data->select(array('news_key'=>$value));
    foreach($result as $key=>$val){
        $ids[] = $val['news_types_id'];
    }
    $ids = implode(',',$ids);
    
    $string = form::checkbox($option,$ids,"name='info[$field][]'",'1','125');
    return $string;
}