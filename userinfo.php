<?php
$blood = array('未知', 'A', 'B', 'O','AB', '其他');
$hobby = array('跑步', '游泳', '唱歌', '登山', '旅游', '看电影', '读书');
require './view/userinfo.html';
header('content-type:text/html; charset=utf-8');
// 判断是否有表单提交
if (!empty($_POST)){
    // 接受表单数据
    echo '姓名：'.$_POST['name'];
    echo '<br>性别：'.$_POST['gender'];
    echo '<br>血型：'.$_POST['blood'];
    echo '<br>爱好：'.implode('、', $_POST['hobby']);
    echo '<br>个人简介：'.$_POST['description'];
}else{
    require './view/user_info.html';
}