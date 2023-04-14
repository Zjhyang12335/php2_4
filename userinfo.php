<?php
$blood = array('未知', 'A', 'B', 'O','AB', '其他');// 用于下拉列表显示数据
$hobby = array('跑步', '游泳', '唱歌', '登山', '旅游', '看电影', '读书');// 用于多选按钮显示数据
require './library/function.php';
$user_id = checkLogin();// 用户id
$file_path = "./$user_id.txt";// 用户信息文件存储路径
// require './view/userinfo.html';
// header('content-type:text/html; charset=utf-8');
// 判断是否有表单提交
// if (!empty($_POST)){
//     // 接受表单数据
//     echo '姓名：'.$_POST['name'];
//     echo '<br>性别：'.$_POST['gender'];
//     echo '<br>血型：'.$_POST['blood'];
//     echo '<br>爱好：'.implode('、', $_POST['hobby']);
//     echo '<br>个人简介：'.$_POST['description'];
//     echo '<br>联系电话：'.$_POST['tel'];
// }else{
//     // require './view/user_info.html';
// }
if (is_file($file_path)){// 是否已经保存了个人信息
    $data = file_get_contents($file_path);// 从文件中读取数据，并存储到$data中
    $user_data = unserialize($data);// 将数据反序列化为数组$user_data[name']
    require './view/userinfo_edit.html';
}else{// 如果未保存信息，显示空白表单
    require './view/userinfo.html';
}