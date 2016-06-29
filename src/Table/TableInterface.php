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
     * @return int
     */
    public function queryCount();
    /**
     * return the last operate ID
     * @return int
     */
    public function lastId();
    /**
     *close database
     */
    public function close();

    /**
     * return current version
     * @return string
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
     * @param string $in1
     * @param string $in2
     * @return $this
     */
    public function order($in1="",$in2="");

    /**
     * specify an index(only valid for function all())
     * @param string $str
     * @return $this
     */
    public function key($str='');


    /**
     * group data
     * @param string $str
     * @return $this
     */
    public function group($str="");

    /**
     * identity the field to be operated
     * @param string/array $in
     * @return $this
     */
    public function field($in=null);

    /**
     * specify the number of records
     * @param int/string $in1
     * @param int $in2
     * @return $this
     */
    public function limit($in1=null,$in2=null);

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
     * @param int $id
     * @return array
     */
    public function row($id=null);

    /**
     *execute SQL statements
     * @param int $id
     * @return array
     */
    public function col($id=null);
    /**
     *execute SQL statements
     * @param int $id
     * @return int/string
     */
    public function one($id=null);
    /**
     *execute SQL statements
     * @param int $id
     * @return array
     */
    public function map($id=null);




}