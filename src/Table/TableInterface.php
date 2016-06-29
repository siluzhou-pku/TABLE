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
     * @return times of accessing database
     */
    public function queryCount();
    /**
     * @return the last operate ID
     */
    public function lastId();
    /**
     *close database
     */
    public function close();

    /**
     * @return current version of class db
     */
    public function version();

    /**
     * set table name
     * @param string $str
     * @return $this
     */
    public function table($str="");

    /**
     * set PrimaryId of table
     * @param string $str
     * @return $this
     */
    public function setPrimaryId($str="");

    /**
     * set data selection
     * @param  string/array $in
     * @return $this
     */
    public function where($in);

    /**
     *specify the sort order or direction
     * @param string $str
     * @return $this
     */
    public function order($str);

    /**
     * specify an index(only valid for function all())
     * @param string $str
     * @return $this
     */
    public function key($str);


    /**
     * group data
     * @param string $str
     * @return $this
     */
    public function group($str);

    /**
     * identity the field to be operated
     * @param string/array $in
     * @return $this
     */
    public function field($in);

    /**
     * specify the number of records
     * @param int/string $in1
     * @param int $in2
     * @return $this
     */
    public function limit($in1,$in2);

    /**
     * reset all conditions
     * @return $this
     */
    public function reset();


    /**
     * update database
     * @param array $value
     * @param int $id
     * @return boolean/obj
     */
    public function update($value,$id=null);


    /**
     * insert database
     * @param array $value
     * @return boolean/obj
     */
    public function insert($value);

    /**
     * delete database
     * @param int $id
     * @return boolean/obj
     */
    public function delete($id=null);

    /**
     *execute SQL statements
     * @param int $id
     * @return array
     */
    public function all($id=null);

    /**
     *execute SQL statements
     * @return array
     */
    public function row();

    /**
     *execute SQL statements
     * @return array
     */
    public function col();
    /**
     *execute SQL statements
     * @return int/string
     */
    public function one();
    /**
     *execute SQL statements
     * @return array
     */
    public function map();




}