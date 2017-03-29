<?php
/**
 * Created by PhpStorm.
 * User: 冰封承諾Andy
 * Date: 2017/3/9 0009
 * Time: 17:04
 */

header('content-type:application/json; charset=UTF-8');
// 文件上传变量
//print_r($_FILES);

// $_FILES 获取在HTML中指定的文件名，是个二维的数组
$fileInfo = $_FILES['myFileTest'];
$maxSize = 2097152;
$allowExt = array('jpeg', 'png', 'jpg', 'gif');

if ($fileInfo['error'] == 0) {
    // 判断上传文件的大小
    if ($fileInfo['size'] > $maxSize) {
        exit('上传文件太大');  // 输出一个消息并且退出当前脚本
    }

    // 判断文件类型
    // explode — 使用一个字符串分割另一个字符串 ; end — 将数组的内部指针指向最后一个单元
//    $ext = strtolower(end(explode('.', $fileInfo['name'])));
    $ext = pathinfo($fileInfo['name'],PATHINFO_EXTENSION);
    if (!in_array($ext, $allowExt)) {
        exit('非法的文件类型');
    }

    // 判断文件是否是http post上传的
    // 因为 move_uploaded_file 方法只能移动通过post上传的文件，所以就是自带检测方法了
    if (!is_uploaded_file($fileInfo['tmp_name'])){
        exit('文件上传方式非法');
    }

    // 判断文件是否是图片文件，正确会返回一个数组，否则是false
    if (!getimagesize($fileInfo['tmp_name'])){
        exit('非法文件');
    }

    if (!file_exists('data')){
        mkdir('data',0777,true);
        chmod('data',0777);
    }

    // 移动文件到data目录
    // 可以通过md5加密处理保证文件名的唯一
//    md5(uniqid(microtime(true),true));
    if (move_uploaded_file($fileInfo['tmp_name'],'data/'.$fileInfo['name'])){
        echo '文件上传成功';
    }else {
        echo '文件上传失败';
    }
}else {
    switch ($fileInfo['error']){
        case 1:
            echo '大小超过了配置文件中配置的最大值';
            break;
        case 2:
            echo '超过了表单限制的最大值 MAX_FILE_SIZE';
            break;
        case  3:
            echo '文件部分被上传';
            break;
        case 4:
            echo '没有选择上传文件';
            break;
        case 6:
            echo '没有找到临时目录';
            break;
        default:
            echo '系统错误';
            break;
    }
}


// var_dump  打印变量的相关信息
