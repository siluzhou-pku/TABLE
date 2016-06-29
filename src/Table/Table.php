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

    /**
     * config array
     * @access private
     * @var array
     */
    private $_config  = array();    //入口参数

    /**
     * db object
     * @access private
     * @var object
     */
    private $db = null;
    /**
     * times of accessing database(only write)
     * @access private
     * @var int
     */
    private $querycount=0;

    /**
     * current version of class Db
     * @access private
     * @var string
     */
    private $version = "1.0";

    /**
     * the time threshold to how long the query must run in number of seconds to be considered a "slow query. "
     * defined in $_config
     * @access private
     * @var float
     */
    private $slowquery  = 0;

    /**
     * True to connect database while initialization; otherwise, false
     * defined in $_config
     * @access private
     * @var boolean
     */
    private $pconnect=0;

    /**
     * True to suppress all error or warning messages; otherwise, false
     * defined in $_config
     * @access private
     * @var boolean
     */
    private $quiet=0;



    /**
     * information of table
     * @access private
     * @var array
     */
    private $table= [
        "name"=>"",       //设置表名
        "primaryId"=>"",    //手动设定主键
    ];
    /**
     * condition of table
     * @access private
     * @var array
     */
    private $condition=[
        "field"=>"",        //* || username,group id || ['username','groupid']
        "where"=>"",        //1 || username==1 || ['username'=>'irones','groupid'=>1]
        "limit"=>"",        // 100 || 10,10
        "order"=>"",        //id desc
        "group"=>"",        //group id
        "key"=>""           //对all查询有用
    ];

    /**
     * constructor  {@link $_config}
     * @param array $config
     */
    public function __construct($config = array()){
        $this->_config = $config;
        $this->db=new \Lulu\Db\Db($config);
    }
    /**
     * return times of accessing database
     */
    public function queryCount()
    {
        return $this->querycount;

    }
    /**
     * return the last operating id
     */
    public function lastId()
    {
        // TODO: Implement lastId() method.
    }


    /**
     * set table name
     * @param string $str
     * @return $this
     */
    public function table($str = "")
    {
        // TODO: Implement table() method.
    }

    /**
     * set PrimaryId of table
     * @param string $str
     * @return $this
     */
    public function setPrimaryId($str = "")
    {
        // TODO: Implement setPrimaryId() method.
    }

    /**
     * set data selection
     * @param  string/array $in
     * @return $this
     */
    public function where($in)
    {
        // TODO: Implement where() method.
    }

    /**
     *specify the sort order or direction
     * @param string $str
     * @return $this
     */
    public function order($str)
    {
        // TODO: Implement order() method.
    }

    /**
     * specify an index(only valid for function all())
     * @param string $str
     * @return $this
     */
    public function key($str)
    {
        // TODO: Implement key() method.
    }

    /**
     * group data
     * @param string $str
     * @return $this
     */
    public function group($str)
    {
        // TODO: Implement group() method.
    }

    /**
     * identity the field to be operated
     * @param string/array $in
     * @return $this
     */
    public function field($in)
    {
        // TODO: Implement field() method.
    }

    /**
     * specify the number of records
     * @param int/string $in1
     * @param int $in2
     * @return $this
     */
    public function limit($in1, $in2)
    {
        // TODO: Implement limit() method.
    }

    /**
     * reset all conditions
     * @return $this
     */
    public function reset()
    {
        // TODO: Implement reset() method.
    }

    /**
     * update database
     * @param array $value
     * @param int $id
     * @return boolean/obj
     */
    public function update($value, $id = null)
    {
        // TODO: Implement update() method.
    }

    /**
     * insert database
     * @param array $value
     * @return boolean/obj
     */
    public function insert($value)
    {
        // TODO: Implement insert() method.
    }

    /**
     * delete database
     * @param int $id
     * @return boolean/obj
     */
    public function delete($id = null)
    {
        // TODO: Implement delete() method.
    }

    /**
     *execute SQL statements
     * @param int $id
     * @return array
     */
    public function all($id = null)
    {
        // TODO: Implement all() method.
    }

    /**
     *execute SQL statements
     * @return array
     */
    public function row()
    {
        // TODO: Implement row() method.
    }
    /**
     *execute SQL statements
     * @return array
     */
    public function col()
    {
        // TODO: Implement col() method.
    }
    /**
     *execute SQL statements
     * @return int/string
     */
    public function one()
    {
        // TODO: Implement one() method.
    }

    /**
     *execute SQL statements
     * @return array
     */
    public function map()
    {
        // TODO: Implement map() method.
    }
    /**
     * close database
     * @access public
     * @return boolean
     */
    public function close()
    {
        $this->db->close();
        return true;
    }

    /**
     * return the current version of class db;
     * @access public
     * @return string
     */
    public function version(){
        return $this->version;
    }

}