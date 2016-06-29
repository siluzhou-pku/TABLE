# Table dev

Table Driver connects and manages table based on application programming interface (**API**) 

## Highlights

- Simple API
- Composer ready, [PSR-2] and [PSR-4] compliant
- Fully documented
- Demo


## System Requirements

You need:

- **PHP >= 5.4** , but the latest stable version of PHP is recommended

to use the library.

## Install

Install Lulu\db using Composer.

    $ composer require lulu/table

## Config
```



$config = [
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
];
```

## Basic Usage

    include("../vendor/autoload.php");
    $table = new Lulu\db\db($config);

## Documentation
- [Usages](https://github.com/siluzhou/TABLE/blob/master/docs/01-usage.md)
- [APIs](https://github.com/siluzhou/TABLE/edit/master/docs/02-APIs.md)
- [Details](https://github.com/siluzhou/TABLE/blob/master/docs/03-Details.md)

## License

Table is licensed under the MIT License
