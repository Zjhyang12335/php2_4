<?php
/*
 * 为头像生成缩略图……
 * $max_width,$max_height缩略图的最大宽度和高度
 * $file_path原图存放路径
 * $save_path缩略图存放路径
*/
function thumb($max_width,$max_height,$file_path,$save_path){
    //通过getimagesize()获取图像信息
    //该函数参数接收图片文件的路径，返回值为图像信息数组
    //在图像信息数组中，前两个数组元素保存了图片的宽度和高度
    //为上传头像生成缩略图   
    list($width, $height) = getimagesize($file_path);
    //等比例计算缩略图的宽和高
    if($width/$max_width > $height/$max_height) {
        //宽度大于高度时，将宽度限制为最大宽度，然后计算高度值
        $new_width = $max_width;
        $new_height = round($new_width / $width * $height);
    }else{
        //高度大于宽度时，将高度限制为最大高度，然后计算宽度值
        $new_height = $max_height;
        $new_width = round($new_height / $height * $width);
    }
    //绘制缩略图的画布资源
    $thumb = imagecreatetruecolor($new_width, $new_height);
    //从文件中读取出图像，创建为jpeg格式的图像资源
    $source = imagecreatefromjpeg($file_path);
    //将原图缩放填充到缩略图画布中
    imagecopyresized($thumb,$source,0,0,0,0,$new_width,$new_height,$width,$height);
    //将保存缩略图到指定目录（参数依次为图像资源、保存目录、输出质量0~100）
    imagejpeg($thumb, $save_path, 100);
}

// 读取session，返回登录用户的id
function checkLogin(){
    session_start();
    if (!isset($_SESSION['user'])){
        header('Location: login.php');// 如果session数据不存在，则跳转到登录页面，重新登录
        exit;
    }
    return isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
}