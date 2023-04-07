<?php
header('content-type:text/html; charset=utf-8');
$user_id = 1;
if (isset($_FILES['pic'])){
    // 获取文件的信息
    $pic = $_FILES['pic'];
    // 设置图像文件存储的路径
    $save_path = "./uploads/$user_id.jpg";
    // 将上传的文件从临时目录中复制到指定路径
    if (!move_uploaded_file($pic['tmp_name'], $save_path)){
        exit('上传头像失败');
    }
}
require './view/photo.html';