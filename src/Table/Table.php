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
use Lulu\Db\Db;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
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
     * monolog object
     * @access private
     * @var object
     */
    private $log=null;
    /**
     * current version of class Db
     * @access private
     * @var string
     */
    private $version = "1.0";



    /**
     * information of table
     * @access private
     * @var array
     */
    private $info= [
        "name"=>"",       //设置表名
        "primaryKey"=>"",    //手动设定主键
    ];
    /**
     * condition of table
     * @access private
     * @var array
     */
    private $cond=[//其他所有的字符串在拼接的时候都会加上sql字符串，例如limit,group by,只有where是个例外，考虑到查询与增删改操作的不一致。
        "field"=>" select *",        //* || username,group id || ['username','groupid']
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
        $config_db=$this->_config;
        $this->db = new Db($config_db);
        $this->log=new Logger('queryrecord');
        //$this->db=new \Lulu\Db\Db($config);//参考namespace文档，加上'\'相当于绝对路径，而不加\相当于相对路径，在当前路径往下进行寻找
    }
    /**
     * return times of accessing database
     * @return int
     */
    public function queryCount()
    {
        return $this->db->querycount();
    }
    /**
     * return the last operating id
     * @return int
     */
    public function lastId()
    {
        // TODO: Implement lastId() method.
        return $this->db->lastInsert();
    }


    /**
     * set table name
     * @param string $tablename
     * @return $this
     */
    public function table($tablename = "")
    {
        // TODO: Implement table() method.
        $this->info['name']=$tablename;
        if(array_key_exists($tablename,$this->_config)){
            $this->info['primaryKey']=$this->_config[$tablename];
        }
        return $this;
    }

    /**
     * set PrimaryKey of table
     * @param string $key
     * @return $this
     */
    public function setPrimaryKey($key = "")
    {
        // TODO: Implement setPrimaryKey() method.
        $this->info['primaryKey']=$key;
        return $this;
    }

    /**
     * set data selection
     * @param  string/array $where
     * @return $this
     */
    public function where($where="")
    {
        // TODO: Implement where() method.
        $sql="";
        try {
            if (is_array($where)) {
                $num = 0;
                foreach ($where as $key => $value) {
                    if ($num == 0) {
                        $sql .= "`" . $key . "` = '" . $value . "'";
                    } else {
                        $sql .= ", `" . $key . "` = '" . $value . "'";
                    }
                    $num++;
                }
            } elseif (is_string($where)) {
                $sql = $where;
            } else {
                throw new \Exception("Value must be string or array");
            }
        }catch(\Exception $e){
            if(!$this->_config['quiet']){
                echo "error! ".$e->getMessage()."<br />";
                echo "trace: "."<br />".$e->getTraceAsString()."<br />";
            }
        }
        $this->cond['where']=$sql;

        return $this;
    }

    /**
     *specify the sort order or direction
     * @param string $order
     * @return $this
     */
    public function order($order="")
    {
        // TODO: Implement order() method.
        //输入长度不为0才开始下面的操作
        if(!empty($order)) {
            $this->cond['order'].="order by ".$order;
        }
        return $this;
    }

    /**
     * specify an index(only valid for function all())
     * @param string $key
     * @return $this
     */
    public function key($key="")
    {
        // TODO: Implement key() method.
        if(!empty($key)){
            $this->cond['key']=$key;//先保存结果，调用all的时候再起作用
        }

        return $this;
    }


    /**
     * group data
     * @param string $group
     * @return $this
     */
    public function group($group="")
    {
        if(!empty($group)){
            $this->cond['group'].=" , ".$group;
        }
        return $this;
    }

    /**
     * identity the field to be operated
     * @param string/array $field
     * @return $this
     */
    public function field($field="")
    {
        // TODO: Implement field() method.
        $sql="";
        try {
            if (empty($field)) {
                $this->cond['field'] = " select * ";
            } else {
                if (is_array($field)) {
                    foreach ($field as $key => $value) {
                        $field[$key] = "`" . $value . "`";
                    }
                    $sql = implode(",", $field);
                } elseif (is_string($field)) {
                    $sql = $field;
                } else {
                    throw new \Exception("Value must be string or array");
                }
            }
        }catch(\Exception $e) {
            if(!$this->_config['quiet']) {
                echo "error! " . $e->getMessage() . "<br />";
                echo "trace: " . "<br />" . $e->getTraceAsString() . "<br />";
            }
        }
        $this->cond['field']=" select ".$sql;
        return $this;
    }

    /**
     * specify the number of records
     * @param int/string $offset1
     * @param int $offset2
     * @return $this
     */
    public function limit($offset1="", $offset2=0)
    {
        // TODO: Implement limit() method.

        if($offset2==0) {//输入只有一个参数
            $sql=$offset1;
        } else {
            $sql=$offset1." , ".$offset2;
        }
        if(!empty($sql))
            $sql=" limit ".$sql;
        $this->cond['limit']=$sql;
        return $this;
    }

    /**
     * reset all conditions
     * @return $this
     */
    public function reset()
    {
        // TODO: Implement reset() method.
        foreach ($this->cond as $key=>$value) {
            $this->cond[$key]="";
        }
        $this->cond['field']=" select * ";
        return $this;
    }

    /**
     * update database
     * @param array $value
     * @param int $id
     * @return boolean/obj
     */
    public function update($value, $id = 0)
    {
        // TODO: Implement update() method.
        $table=$this->info['name'];
        if(empty($id)){
            $where=$this->cond['where'];
        } else
            $where=$this->info['primaryKey']." = ".$id;
        $res=$this->db->update($table,$value,$where);
        return $res;
    }

    /**
     * insert database
     * @param array $value
     * @return boolean/obj
     */
    public function insert($value)
    {
        // TODO: Implement insert() method.
        $table=$this->info['name'];
        $res=$this->db->insert($table,$value);
        return $res;
    }

    /**
     * delete database
     * @param int $id
     * @return boolean/obj
     */
    public function delete($id = 0)
    {
        // TODO: Implement delete() method.
        $table=$this->info['name'];
        if(empty($id)){
            $where=$this->cond['where'];
        } else
            $where=$this->info['primaryKey']." = ".$id;
        $res=$this->db->delete($table,$where);
        return $res;
    }

    /**
     *execute SQL statements
     * @param int $id
     * @return array
     */
    public function all($id = 0)
    {
        $sql=$this->sqlConcat($id);
        $this->record($sql,"all");
        if(strlen($this->cond['key'])==0)
            $res=$this->db->getAll($sql);
        else
            $res=$this->db->getAll($sql,$this->cond['key']);
        return $res;
    }

    /**
     *execute SQL statements
     * @param int $id
     * @return array
     */
    public function row($id = 0)
    {
        // TODO: Implement row() method.
        $sql=$this->sqlConcat($id);
        $this->record($sql,"row");
        $res=$this->db->getRow($sql);
        return $res;
    }
    /**
     *execute SQL statements
     * @param int $id
     * @return array
     */
    public function col($id = 0)
    {
        // TODO: Implement col() method.
        $sql=$this->sqlConcat($id);
        $this->record($sql,"col");
        $res=$this->db->getCol($sql);
        return $res;
    }
    /**
     *execute SQL statements
     * @param int $id
     * @return int/string
     */
    public function one($id = 0)
    {
        // TODO: Implement one() method.
        $sql=$this->sqlConcat($id);
        $this->record($sql,"one");
        $res=$this->db->getOne($sql);
        return $res;
    }

    /**
     *execute SQL statements
     * @param int $id
     * @return array
     */
    public function map($id = 0)
    {
        // TODO: Implement map() method.
        $sql=$this->sqlConcat($id);
        $this->record($sql,"map");
        $res=$this->db->getMap($sql);
        return $res;
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

    /**
     * monolog and query record
     * @param string $sql
     * @param string $functionname
     */
    private function record($sql="",$functionname="") {
        if($this->_config['queryrecord']){
            $this->log->pushHandler(new StreamHandler( '../log/dblog.log', Logger::INFO));
            $this->log->addInfo("query: ".$functionname."; sql: ".$sql);
        }
        if($this->_config['increment']){

        }
    }
    /**
     * return the string concatenation to create SQL queries
     * @param int $id
     * @return string
     */
    private function sqlConcat($id=0){
        if(!empty($id)){
            $this->cond['where']=$this->info['primaryKey']." = ".(string)($id);
        } else {
            if(strlen($this->cond['field'])==0)
                $this->cond['field']=" select ".$this->info['primaryKey'];
        }
        //加 where 是否为空的判断
        if(!empty($this->cond['where']))
            $this->cond['where']=" where ".$this->cond['where'];
        $sql=$this->cond['field']." from ".$this->info['name'].$this->cond['where']." ".$this->cond['group']." ".$this->cond['order']." ".$this->cond['limit'];
        return $sql;
    }

}