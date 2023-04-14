<?php
require './library/function.php';
header('content-type:text/html; charset=utf-8');
$user_id = checkLogin();// 用户id
// 定义缩略图存放路径
$photo = "./uploads/thumb_$user_id.jpg";
// 判断是否上传图像
if (isset($_FILES['pic'])){
    // 获取文件的信息
    $pic = $_FILES['pic'];
    // 设置图像文件存储的路径
    $save_path = "./uploads/$user_id.jpg";
    // 判断文件类型是否正确
    // 通过文件的MIME信息进行判断
    if ($pic['type'] !== 'image/jpeg'){
        exit('图像类型不符，只支持jpg格式');
    }
    // 判断文件大小是否小于1M
    if ($pic['size'] >= 1048576){
        exit('图像大小超过1M，上传失败');
    }
    // 将上传的文件从临时目录中复制到指定路径
    if (!move_uploaded_file($pic['tmp_name'], $save_path)){
        exit('上传头像失败');
    }
    // 保存成功，调用函数为头像生成缩略图
    thumb(150, 150, $save_path, $photo);
}
require './view/photo.html';