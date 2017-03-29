<?php
/**
 * Created by PhpStorm.
 * Date: 2017/3/9 0009
 * Time: 16:06
 */

//phpinfo();

// 二维数组
$cars = array
(
    array("Volvo",22,18),
    array("BMW",15,13),
    array("Saab",5,2),
    array("Land Rover",17,15)
);

$args = array("Volvo",22,18);


foreach ($args as $key=>$var) {
    echo $key;
    echo '<br/>';
    echo $var;
    echo '<br/>';
}

// 面向对象，构造函数
class TestClass{
    protected $bl1;
    protected $bl2;
    protected $bl3;

    public function __construct($name)
    {
        $this->bl1 = $name;
        $this->bl2 = 3;
    }
}