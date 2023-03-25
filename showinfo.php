<?php
$blood = array('未知', 'A', 'B', 'O','AB', '其他');
$hobby = array('跑步', '游泳', '唱歌', '登山', '旅游', '看电影', '读书');
// 获取表单提交的数据
if (!empty($_POST)){
    $fields = array('name', 'gender', 'blood', 'hobby', 'description');
    $user_data = array();
    // 将表单提交的数据存储在数组变量$user_data中
    foreach ($fields as $v){
        $user_data[$v] = isset($_POST[$v]) ? $_POST[$v] : '';
    }
    // 加载showinfo.html页面，显示数据
    require './view/showinfo.html';
}