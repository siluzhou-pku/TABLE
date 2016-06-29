## Class Table
### Description

Implements interfaces:

- TableInterface

Table

Table Driver

*Located in /Table.php (line 12) *

### Method Summary

	
- 	
- Table __construct ([array $config = array()])
- array all ([int $id = null])
- boolean close ()
- array col ([int $id = null])
- boolean/obj delete ([int $id = null])
- $this field ([string/array $in = null])
- $this group ([string $str = ""])
- boolean/obj insert (array $value)
- $this key ([string $str = ""])
- int lastId ()
- $this limit ([int/string $in1 = null], [int $in2 = null])
- array map ([int $id = null])
- int/string one ([int $id = null])
- $this order ([string $in1 = ""], [string $in2 = ""])
- int queryCount ()
- $this reset ()
- array row ([int $id = null])
- $this setPrimaryId ([string $str = ""])
- $this table ([string $str = ""])
- boolean/obj update (array $value, [int $id = null])
- string version ()
- $this where (string/array $in)



### Methods


#### Constructor __construct (line 94)

constructor $_config

-    access: public

Table __construct ([array $config = array()])

-    array $config	

#### all (line 245)

execute SQL statements

-    access: public

array all ([int $id = null])

-    int $id	

---

*Implementation of:*

TableInterface::all()
  -  execute SQL statements

#### close (line 292)

close database

 -   access: public

boolean close ()

---

*Implementation of:*

TableInterface::close()
  -  close database

#### col (line 264)

execute SQL statements

   - access: public

array col ([int $id = null])

   - int $id	

---

*Implementation of:*

TableInterface::col()
 -   execute SQL statements

#### delete (line 235)

delete database

  -  access: public

boolean/obj delete ([int $id = null])

  -  int $id	

---

*Implementation of:*

TableInterface::delete()
   - delete database

#### field (line 184)

identity the field to be operated

   - access: public

$this field (string/array $in)

  -  string/array $in	

---

*Implementation of:*

TableInterface::field()
   - identity the field to be operated

#### group (line 170)

group data

  -  access: public

$this group (string $str)

  -  string $str	

Implementation of:

TableInterface::group()
  -  group data

#### insert (line 221)

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

$this key (string $str)

  -  string $str	

---

*Implementation of:*

TableInterface::key()
   - specify an index(only valid for function all())

#### lastId (line 111)

return the last operating id

  -  access: public

void lastId ()

---

*Implementation of:*

TableInterface::lastId()
  -  return the last operate ID

 #### limit (line 195)

specify the number of records

  -  access: public

$this limit ([int/string $in1 = null], [int $in2 = null])

   - int/string $in1	
   - int $in2	

---

*Implementation of:*

TableInterface::limit()
  -  specify the number of records

#### map (line 283)

execute SQL statements

   - access: public

 array map ([int $id = null])

   - int $id	

---

*Implementation of:*

TableInterface::map()
  -  execute SQL statements

#### one (line 273)

execute SQL statements

  -  access: public



int/string one ([int $id = null])

  -  int $id	


---

*Implementation of:*

TableInterface::one()
  -  execute SQL statements

#### order (line 153)

specify the sort order or direction

  -  access: public

 $this order ([string $in1 = ""], [string $in2 = ""])

   - string $in1	
  -  string $in2	
	

---

*Implementation of:*

TableInterface::order()
  -  specify the sort order or direction

#### queryCount (line 102)

return times of accessing database

 -   access: public

int queryCount ()
Implementation of:

TableInterface::queryCount()

return times of accessing database
#### reset (line 204)

reset all conditions

  -  access: public

$this reset ()


---

*Implementation of:*

TableInterface::reset()
  -  reset all conditions

#### row (line 255)

execute SQL statements

   - access: public

 array row ([int $id = null])

   - int $id	



---

*Implementation of:*

TableInterface::row()
   - execute SQL statements

#### setPrimaryId (line 130)

set PrimaryId of table

   - access: public

$this setPrimaryId ([string $str = ""])

   - string $str	

---

*Implementation of:*

TableInterface::setPrimaryId()
   - set PrimaryId of table

#### table (line 120)

set table name

   - access: public

$this table ([string $str = ""])

   - string $str	

---

*Implementation of:*

TableInterface::table()
  -  set table name

#### update (line 211)

update database

  -  access: public

boolean/obj update (array $value, [int $id = null])

  -  array $value	
  -  int $id	

---

*Implementation of:*

TableInterface::update()
   - update database

#### version (line 295)

return the current version of class db;

   - access: public

string version ()

---

*Implementation of:*

TableInterface::version()

#### where (line 140)

set data selection

  -  access: public

$this where (string/array $in)

  -  string/array $in	

---

*Implementation of:*

TableInterface::where()
   - set data selection

