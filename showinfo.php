<?php
// $blood = array('未知', 'A', 'B', 'O','AB', '其他');
// $hobby = array('跑步', '游泳', '唱歌', '登山', '旅游', '看电影', '读书');
$user_data = array();
// 获取表单提交的数据
if (!empty($_POST)){
    $field = array('name', 'sex', 'blood', 'hobby', 'description');// 所有表单控件的name属性
    // $user_data = array();
    // $user_data['name', 'sex', 'blood', 'hobby', 'description']
    // 将表单提交的数据存储在数组变量$user_data中
    foreach ($field as $v){
        $user_data[$v] = isset($_POST[$v]) ? $_POST[$v] : '';// 获取表单中输入内容
    }
    // 加载showinfo.html页面，显示数据
    require './view/showinfo.html';
}