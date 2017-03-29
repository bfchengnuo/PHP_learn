<?php
/**
 * Created by PhpStorm.
 * User: 冰封承諾Andy
 * Date: 2017/3/10 0010
 * Time: 16:21
 */

$fileName = $_GET['filename'];
header('content-disposition:attachment;filename='.basename($fileName));
header('content-length:'.filesize($fileName));

// 取得文件内容
readfile($fileName);