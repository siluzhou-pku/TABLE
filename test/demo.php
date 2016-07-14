<?php
/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 2016/6/29
 * Time: 11:14
 */

header("Content-type: text/html; charset=utf-8");//解决中文显示乱码问题
include("../vendor/autoload.php");

echo "<pre>";
$config = [
    'keymap'        =>
        ['user'     => 'userId'],           //操作的表与主键],//存放表名与主键的函数
    'increment'     => 1,                   //对where增量进行记录
    'quiet'         => 0,                   //安静模式 生产环境的
];


$user = new Lulu\Table\Table($config);
$res=$user->table('user')->where("userId<50")->field("userId,login,password,email")->limit("10,20")->order("password,userId desc")->key('userId')->all();
print_r($res);

$user->table('user')->delete(60);
$user->reset();
$user->where("userId=59")->delete();
$user->reset();
$value=
[
    'login'     => 'select',
    'nickName'  => 'x7x658',
    'password'  => '12345678',
    'email'     => 'shampeak@sina.com',
    'mobile'    => '13811069199',
];
$user->insert($value);
$user->reset();
$value=
    [
        'login'     => '111',
        'nickName'  => 'x7x658',
        'password'  => '12345678',
        'email'     => 'shampeak@sina.com',
        'mobile'    => '13811069199',
    ];
$user->update($value,1);
$value=
    [
        'login'     => '222',
        'nickName'  => 'x7x658',
        'password'  => '12345678',
        'email'     => 'shampeak@sina.com',
        'mobile'    => '13811069199',
    ];

$user->where("userId=1")->update($value);
$user->reset();


$res=$user->where("userId<50")->field("login,password,email")->limit("10,20")->order("password")->all();
$user->reset();
print_r($res);

$res=$user->where("userId<50")->limit("10,20")->order("password")->all();
$user->reset();
print_r($res);