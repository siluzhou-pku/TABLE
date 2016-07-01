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
     * current version of class Db
     * @access private
     * @var string
     */
    private $version = "1.0";


    /**
     * True means in debug mode; otherwise, false
     * defined in $_config
     * @access private
     * @var boolean
     */
    private $debug=0;



    /**
     * information of table
     * @access private
     * @var array
     */
    private $info= [
        "name"=>"",       //设置表名
        "primaryId"=>"",    //手动设定主键
    ];
    /**
     * condition of table
     * @access private
     * @var array
     */
    private $cond=[//其他所有的字符串在拼接的时候都会加上sql字符串，例如limit,group by,只有where是个例外，考虑到查询与增删改操作的不一致。
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
        $this->debug=$config['debug'];
        $config_db=$this->_config;
        if($this->debug) {
            $config_db['slowquery']=1;
            $config_db['quiet']=0;
        }else {
            $config_db['slowquery']=0;
            $config_db['quiet']=1;
        }
        $this->db = new Db($config_db);
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
     * @param string $str
     * @return $this
     */
    public function table($str = "")
    {
        // TODO: Implement table() method.
        $this->info['name']=$str;
        if(array_key_exists($str,$this->_config)){
            $this->info['primaryId']=$this->_config[$str];
        }
        return $this;
    }

    /**
     * set PrimaryId of table
     * @param string $str
     * @return $this
     */
    public function setPrimaryId($str = "")
    {
        // TODO: Implement setPrimaryId() method.
        $this->info['primaryId']=$str;
        return $this;
    }

    /**
     * set data selection
     * @param  string/array $in
     * @return $this
     */
    public function where($in)
    {
        // TODO: Implement where() method.
        $str="";
        if(is_array($in)) {
            $num=0;
            foreach($in as $key=>$value) {
                if($num==0) {
                    $str.="`".$key."` = '".$value."'";
                }else {
                    $str.=", `".$key."` = '".$value."'";
                }
                    $num++;
            }
        } elseif(is_string($in)) {
            $str=$in;
        } else {
            //待添加，如果输入不满足要求，将where设置为空Or返回错误
        }
        //输入长度不为0才进行下面的操作
        if(strlen($str)!=0) {//如果现在系统记录的where不为空，说明已经调用了一次where函数了，所以只需要在后面再拼上str即可。否则的话需要再加上where
            if(strlen($this->cond['where'])==0) {
                $this->cond['where']=$str;
            } else
                $this->cond['where'].=" , ".$str;
        }
        if($this->debug) {
            //对where自段进行增量记录
            //?增量记录是在使用where函数的地方还是进行一次增删改查记录的地方
        }
        return $this;
    }

    /**
     *specify the sort order or direction
     * @param string $str
     * @return $this
     */
    public function order($str="")
    {
        // TODO: Implement order() method.
        //输入长度不为0才开始下面的操作
        if(strlen($str)!=0) {
            if(strlen($this->cond['order'])!=0) {
                $this->cond['order'].=" , ".$str;
            } else {
                $this->cond['order'].="order by ".$str;
            }
        }
        return $this;
    }

    /**
     * specify an index(only valid for function all())
     * @param string $str
     * @return $this
     */
    public function key($str="")
    {
        // TODO: Implement key() method.
        $this->cond['key']=$str;//先保存结果，调用all的时候再起作用
        return $this;
    }


    /**
     * group data
     * @param string $str
     * @return $this
     */
    public function group($str="")
    {
        if(strlen($str)!=0){
            if(strlen($this->cond['group'])==0){
                $this->cond['group']=" group by ".$str;
            }
            else {
                $this->cond['group'].=" , ".$str;
            }

        }
        return $this;
    }

    /**
     * identity the field to be operated
     * @param string/array $in
     * @return $this
     */
    public function field($in=null)
    {
        // TODO: Implement field() method.
        $str="";
        if (is_null($in)) {//如果field为空，且前面已经用过field函数，此处的field无效
            if(strlen($this->cond['field'])==0)
                $this->cond['field']=" select * ";
        } else {
            if(is_array($in)) {
                $num=0;
                foreach($in as $key=>$value) {
                    if($num==0) {
                        $str.=" `".$value."` ";
                    }else {
                        $str.=" , `".$value."` ";
                    }
                    $num++;
                }
            } elseif(is_string($in)) {
                $str=$in;
            } else {
                //待添加，如果输入不满足要求，将field设置为空Or返回错误
            }
            //输入长度不为0才进行下面的操作
            if(strlen($str)!=0) {//如果现在系统记录的field不为空，说明已经调用了一次field函数了，所以只需要在后面再拼上str即可。否则的话需要再加上select
                if(strlen($this->cond['field'])==0) {
                    $this->cond['field']=" select ".$str;
                } else
                    $this->cond['field'].=" , ".$str;
            }
        }
        return $this;
    }

    /**
     * specify the number of records
     * @param int/string $in1
     * @param int $in2
     * @return $this
     */
    public function limit($in1=null, $in2=null)
    {
        // TODO: Implement limit() method.

        if($in2==null) {//输入只有一个参数
            if(is_string($in1)) {
                $str=" limit ".$in1;
            }else {
                $str=" limit ".(string)($in1);
            }
        } else {
            $str=" limit ".(string)($in1)." , ".(string)($in2);
        }
        $this->cond['limit']=$str;
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
        return $this;
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
        $table=$this->info['name'];
        if($id==null){
            $where=$this->cond['where'];
        } else
            $where=$this->info['primaryId']." = ".$id;
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
    public function delete($id = null)
    {
        // TODO: Implement delete() method.
        $table=$this->info['name'];
        if($id==null){
            $where=$this->cond['where'];
        } else
            $where=$this->info['primaryId']." = ".$id;
        $res=$this->db->delete($table,$where);
        return $res;
    }

    /**
     *execute SQL statements
     * @param int $id
     * @return array
     */
    public function all($id = null)
    {
        $sql=$this->sqlConcat($id);
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
    public function row($id = null)
    {
        // TODO: Implement row() method.
        $sql=$this->sqlConcat($id);
        $res=$this->db->getRow($sql);
        return $res;
    }
    /**
     *execute SQL statements
     * @param int $id
     * @return array
     */
    public function col($id = null)
    {
        // TODO: Implement col() method.
        $sql=$this->sqlConcat($id);
        $res=$this->db->getCol($sql);
        return $res;
    }
    /**
     *execute SQL statements
     * @param int $id
     * @return int/string
     */
    public function one($id = null)
    {
        // TODO: Implement one() method.
        $sql=$this->sqlConcat($id);
        $res=$this->db->getRow($sql);
        return $res;
    }

    /**
     *execute SQL statements
     * @param int $id
     * @return array
     */
    public function map($id = null)
    {
        // TODO: Implement map() method.
        $sql=$this->sqlConcat($id);
        $res=$this->db->getRow($sql);
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
     * return the string concatenation to create SQL queries
     * @param null $id
     * @return string
     */
    private function sqlConcat($id=null){
        if($id!=null){
            $this->cond['where']=" where ".$this->info['primaryId']." = ".(string)($id);
        } else {
            if(strlen($this->cond['field'])==0)
                $this->cond['field']=" select ".$this->info['primaryId'];
        }
        //加 where 是否为空的判断
        $sql=$this->cond['field']." from ".$this->info['name']." where ".$this->cond['where']." ".$this->cond['group']." ".$this->cond['order']." ".$this->cond['limit'];
        if($this->debug==1)
            echo $sql."<br />";
        return $sql;
    }

}