# Table v1.0

Table Driver connects and manages table based on application programming interface (**API**) 

## Highlights

- Simple API
- Composer ready, [PSR-2] and [PSR-4] compliant
- Fully documented
- Demo


## System Requirements

You need:

- **PHP >= 5.4** , but the latest stable version of PHP is recommended
- **"lulu/db":"v1.0.1"**,
- **"monolog/monolog":">=1.17.0"**

to use the library.

## Install

Install Lulu\Table using Composer.

    $ composer require lulu/table

## Config
```
$config = [
    'user'          => 'userId',            //操作的表与主键
    'increment'     => 1,                   //对where增量进行记录
    'reflection'    => 1,                   //反射部分信息以供调试
    'queryrecord'   => 1,                  //对所有查询进行记录
    'quiet'         => 0,                   //安静模式 生产环境的
];
```

## Basic Usage
```
    include("../vendor/autoload.php");
    $user = new Lulu\Table\Table($config);
    $user->table('user')->setPrimaryKey('uid')->key('ulogin')->order('id desc')->group('groupid')->limit(1000)->all();           
    $user->reset();
    $user->update($value,1);//对主键为1的数据进行更新
```

## Documentation
- [Usages](https://github.com/siluzhou/TABLE/blob/master/docs/01-usage.md)
- [APIs](https://github.com/siluzhou/TABLE/edit/master/docs/02-APIs.md)
- [Details](https://github.com/siluzhou/TABLE/blob/master/docs/03-Details.md)

## License

Table is licensed under the MIT License
