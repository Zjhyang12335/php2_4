<?php
header('content-type:text/html; charset=utf-8');
$user_id = 1;// 用户id
$file_path = "./$user_id.txt";// 用户信息文件存储路径
$user_data = array();
// 获取表单提交的数据
if (!empty($_POST)){
    $field = array('name', 'sex', 'tel', 'blood', 'hobby', 'description');// 所有表单控件的name属性

    // 将表单提交的数据存储在数组变量$user_data中
    foreach ($field as $v){
        $user_data[$v] = isset($_POST[$v]) ? $_POST[$v] : '';// 获取表单中输入内容
    }
    $user_data['name'] = htmlspecialchars($user_data['name']);
    $user_data['description'] = htmlspecialchars($user_data['description']);

    if ($user_data['sex'] != '男' && $user_data['sex'] != '女') {
        exit('请选择性别');
    }
    if (is_numeric($user_data['tel'])) {
        if (strlen($user_data['tel']) != 11) {
            exit('电话号码格式错误');
        }
    }else{
        exit('联系电话请输入整数');
    }
}


// 文件存储
$data = serialize($user_data);// 将数组序列化
file_put_contents($file_path, $data);// 将序列化数据写入文件中
// 加载showinfo.html页面，显示数据
require './view/showinfo.html';