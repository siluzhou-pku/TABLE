<?php
/**
 * Table Driver Interface
 *
 * @author siluzhou <siluzhou_pku@163.com>
 * @version: dev
 * @Date: 2016/6/26
 * @Time: 10:30
 */
namespace Lulu\Table;
interface TableInterface
{

    /**
     * return times of accessing database
     */
    public function queryCount();
    /**
     * return the last operate ID
     */
    public function lastId();
    /**
     *close database
     */
    public function close();

    /**
     *return current version of class db
     */
    public function version();

    /**
     * set table name
     *@param string $str
     *@return $this
     */
    public function table($str="");

    /**
     * set PrimaryId of table
     *@param string $str
     *@return $this
     */
    public function setPrimaryId($str="");

    /**
     *return $this
     */
    public function where();

    /**
     *return $this
     */
    public function order();

    /**
     *return $this
     */
    public function key();
    /**
     *return $this
     */
    public function group();

    /**
     *return $this
     */
    public function field();

    /**
     *return $this
     */
    public function limit();

    /**
     *return $this
     */
    public function reset();

    /**
     * operate database
     */
    public function query();
    /**
     * update database
     */
    public function update();
    /**
     * insert database
     * @return boolean/obj
     */
    public function insert();

    /**
     * delete database
     *
     * @return boolean/obj
     */
    public function delete();

    /**
     *execute SQL statements
     *
     */
    public function all();
    /**
     *execute SQL statements
     *
     */
    public function row();

    /**
     *execute SQL statements
     *
     */
    public function col();
    /**
     *execute SQL statements
     *
     */
    public function one();
    /**
     *execute SQL statements
     *
     */
    public function map();




}