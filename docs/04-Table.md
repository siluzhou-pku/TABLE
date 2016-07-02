## Class Table
### Description

Implements interfaces:

- TableInterface

Table

Table Driver

*Located in /Table.php (line 12) *

### Method Summary

	
- Table __construct ([array $config = array()])
- array all ([int $id = 0])
- boolean close ()
- array col ([int $id = 0])
- boolean/obj delete ([int $id = 0])
- $this field ([string/array $field = ""])
- $this group ([string $group = ""])
- boolean/obj insert (array $value)
- $this key ([string $key = ""])
- int lastId ()
- $this limit ([int/string $offset1 = ""], [int $offset2 = 0])
- array map ([int $id = 0])
- int/string one ([int $id = 0])
- $this order ([string $order = ""])
- int queryCount ()
- $this reset ()
- array row ([int $id = 0])
- $this setPrimaryKey ([string $key = ""])
- $this table ([string $tablename = ""])
- boolean/obj update (array $value, [int $id = 0])
- string version ()
- $this where ([string/array $where = ""])




### Methods


#### Constructor __construct (line 72)

constructor $_config

-    access: public

Table __construct ([array $config = array()])

-    array $config	

#### all (line 327)
execute SQL statements

 -   access: public

array all ([int $id = 0])

 -   int $id	


---

*Implementation of:*

TableInterface::all()
  -  execute SQL statements

####  close (line 396)

close database

  -  access: public

boolean close () 

---

*Implementation of:*

TableInterface::close()
  -  close database

####  col (line 356)

execute SQL statements

   - access: public

array col ([int $id = 0])

  -  int $id	


---

*Implementation of:*

TableInterface::col()
 -   execute SQL statements

####  delete (line 310)

delete database

  -  access: public

boolean/obj delete ([int $id = 0])

  -  int $id	


---

*Implementation of:*

TableInterface::delete()
   - delete database

####  field (line 210)

identity the field to be operated

 -   access: public

$this field ([string/array $field = ""])

  -  string/array $field	


---

*Implementation of:*

TableInterface::field()
   - identity the field to be operated

####  group (line 197)

group data

   - access: public

$this group ([string $group = ""])

   - string $group	


Implementation of:

TableInterface::group()
  -  group data

####  insert (line 297)

insert database

  -  access: public

boolean/obj insert (array $value)

  -  array $value	


---

*Implementation of:*

TableInterface::insert()
  -  insert database

#### key (line 160)

specify an index(only valid for function all())

  -  access: public

$this key ([string $key = ""])

  -  string $key	

---

*Implementation of:*

TableInterface::key()
   - specify an index(only valid for function all())

#### lastId (line 91)

return the last operating id

  -  access: public

void lastId ()

---

*Implementation of:*

TableInterface::lastId()
  -  return the last operate ID

 ####  limit (line 245)

specify the number of records

   - access: public

$this limit ([int/string $offset1 = ""], [int $offset2 = 0])

  -  int/string $offset1	
  -  int $offset2	


---

*Implementation of:*

TableInterface::limit()
  -  specify the number of records

####  map (line 383)

execute SQL statements

   - access: public

array map ([int $id = 0])

  -  int $id	


---

*Implementation of:*

TableInterface::map()
  -  execute SQL statements

####  one (line 369)

execute SQL statements

  -  access: public

int/string one ([int $id = 0])

   - int $id	



---

*Implementation of:*

TableInterface::one()
  -  execute SQL statements

####  order (line 166)

specify the sort order or direction

  -  access: public

$this order ([string $order = ""])

   - string $order	

	

---

*Implementation of:*

TableInterface::order()
  -  specify the sort order or direction

####  queryCount (line 83)

return times of accessing database

  -  access: public

int queryCount () 

---

*Implementation of:*

TableInterface::queryCount()

return times of accessing database
####  reset (line 264)

reset all conditions

    access: public

$this reset () 


---

*Implementation of:*

TableInterface::reset()
  -  reset all conditions

####  row (line 343)

execute SQL statements

   - access: public

array row ([int $id = 0])

  -  int $id	




---

*Implementation of:*

TableInterface::row()
   - execute SQL statements

#### 
setPrimaryKey (line 118)

set PrimaryKey of table

    access: public

$this setPrimaryKey ([string $key = ""])

    string $key	

---

*Implementation of:*

TableInterface::setPrimaryKey()
    set PrimaryId of table



####  table (line 103)

set table name

 -   access: public

$this table ([string $tablename = ""])

 -   string $tablename	


---

*Implementation of:*

TableInterface::table()
  -  set table name

####  update (line 280)

update database

 -   access: public

boolean/obj update (array $value, [int $id = 0])

  -  array $value	
  -  int $id	


---

*Implementation of:*

TableInterface::update()
   - update database

#### version (line 407)

return the current version of class db;

   - access: public

string version ()

---

*Implementation of:*

TableInterface::version()

####  where (line 130)

set data selection

 -   access: public

$this where ([string/array $where = ""])

  -  string/array $where	



---

*Implementation of:*

TableInterface::where()
   - set data selection

