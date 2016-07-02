<?php
/**
 * Created by PhpStorm.
 * User: lulu
 * Date: 2016/6/29
 * Time: 11:13
 */

class TableTest extends PHPUnit_Framework_TestCase
{
    private $config = [
        'user'          => 'userId',            //操作的表与主键
        'hostname'      => '127.0.0.1',         //服务器地址
        'port'          => '3306',              //端口
        'username'      => 'root',              //用户名
        'password'      => 'root',              //密码
        'database'      => 'lut',                //数据库名
        'charset'       => 'utf8',              //字符集设置
        'pconnect'      => 1,                   //1  长连接模式 0  短连接
        'quiet'         => 0,                   //安静模式 生产环境的
        'slowquery'     => 1,                   //对慢查询记录
        'increment'     => 1,                   //对where增量进行记录
        'reflection'    => 1,                   //反射部分信息以供调试
        'queryrecord'   => 1                  //对所有查询进行记录
    ];
    private $user;
    function setUp()
    {
        $this->user=new Lulu\Table\Table($this->config);
        //初始化时需要drop与source user数据库
        //drop掉数据库
        //$sql="Drop  Table user";
        //$this->db->query($sql);
        //$sql="source user.sql";
        //$this->db->query($sql);
        $this->user->table("user")->setPrimaryKey("userId");
    }

    public function testOne()
    {
        $res=$this->user->field('truename')->One(1);
        $this->user->reset();
        $this->assertEquals("4324", $res);
    }
    public function testMap()
    {
        $expectedres=[
            '1ew234' => '12345678',
            '13673764379' => '25F9E794323B453885F5181F1B624D0B',
            '13552099798' => 'E10ADC3949BA59ABBE56E057F20F883E',
            'irones' => '12345678'
        ];
        $res=$this->user->field(['login','password'])->where("userId<10")->Map();
        $this->user->reset();
        $this->assertEquals($expectedres,$res);
    }

    public function testAll()
    {
        $res=$this->user->where("userId<50")->field("userId,login,password,email")->limit("10,20")->order("password,userId desc")->key('userId')->all();
        $this->user->reset();
        $this->assertCount(20, $res);
        //$this->assertArrayHasKey('1ew234', $res);
        $expectedres=[
            'userId' => '39',
            'login'=> '',
            'password'=> '12345678',
            'email' => 'shampeak@sina.com'
        ];
        $this->assertEquals($expectedres,$res[39]);

    }

    public function testRow()
    {
        $res = $this->user->Row();
        $this->user->reset();
        $this->assertContains('http://api.so/U/v/201603/11/0a05b10f77d53c0a6cd36068a19da630.txt', $res);
    }
    public function testCol()
    {
        //$sql = "select login from user ";
        $res = $this->user->field('login')->Col();
        $this->user->reset();
        $this->assertCount(53, $res);
    }

    public function testInsert()
    {
        $res = $this->user->insert([
            'login'     => 'select',
            'nickName'  => 'x7x658',
            'password'  => '12345678',
            'email'     => 'shampeak@sina.com',
            'mobile'    => '13811069199',
        ]);
        $this->user->reset();
        $this->assertNotEquals(false,$res);
    }

    public function testUpdate()
    {
        $res = $this->user->update([
            'login'     => '1234',
            'nickName'  => '1',
            'password'  => '2',
            'email'     => 'shampeak@sina.com',
            'mobile'    => '13811069199',
        ],30);
        $this->user->reset();
        $this->assertNotEquals(false,$res);
    }
    public function testDelete()
    {
        $res=$this->user->where('userId>60')->delete();
        $this->user->reset();
        $this->assertNotEquals(false,$res);
    }
}