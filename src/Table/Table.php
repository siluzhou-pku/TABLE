<?php
/**
 * Table Driver
 *
 * @author siluzhou <siluzhou_pku@163.com>
 * @version: dev
 * @Date: 2016/6/26
 * @Time: 10:30
 */

namespace Lulu\Table;

class Table implements TableInterface {
    private $table= [
        "table1"=>"",       //设置表名
        "primaryId"=>"",    //手动设定主键
        "field"=>"",        //* || username,groupid || ['username','groupid']
        "where"=>"",        //1 || username==1 || ['username'=>'irones','groupid'=>1]
        "limit"=>"",        // 100 || 10,10
        "order"=>"",        //id desc
        "group"=>"",        //groupid
        "key"=>""           //对all查询有用
    ];




    public function queryCount()
    {
        // TODO: Implement queryCount() method.
    }

    public function lastId()
    {
        // TODO: Implement lastId() method.
    }

    public function close()
    {
        // TODO: Implement close() method.
    }

    public function version()
    {
        // TODO: Implement version() method.
    }

    public function table()
    {
        // TODO: Implement table() method.
    }

    public function setPrimaryId($str = "")
    {
        // TODO: Implement setPrimaryId() method.
    }

    public function limit()
    {
        // TODO: Implement limit() method.
    }
    public function where()
    {
        // TODO: Implement where() method.
    }

    public function order()
    {
        // TODO: Implement order() method.
    }

    public function key()
    {
        // TODO: Implement key() method.
    }

    public function group()
    {
        // TODO: Implement group() method.
    }

    public function field()
    {
        // TODO: Implement field() method.
    }



    public function reset()
    {
        // TODO: Implement reset() method.
    }

    public function query()
    {
        // TODO: Implement query() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function insert()
    {
        // TODO: Implement insert() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function row()
    {
        // TODO: Implement row() method.
    }

    public function col()
    {
        // TODO: Implement col() method.
    }

    public function one()
    {
        // TODO: Implement one() method.
    }

    public function map()
    {
        // TODO: Implement map() method.
    }
}