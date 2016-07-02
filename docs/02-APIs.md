# APIs

本文档将提供DBDriver API 介绍

## Interface DbInterface
### Description

Dbdriver Interface

- author: Silu Zhou <siluzhou_pku@163.com>


*Located in /TableInterface.php (line 11) *

### Method Summary

	
	
- array all ([int $id = null])
- void close ()
- array col ([int $id = null])
- boolean/obj delete ([int $id = null])
- $this field ([string/array $field = null])
- $this group ([string $group = ""])
- boolean/obj insert (array $value)
- $this key ([string $key = ''])
- int lastId ()
- $this limit ([int/string $offset1 = null], [int $offset2 = null])
- array map ([int $id = null])
- int/string one ([int $id = null])
- $this order ([string $order = ""])
- int queryCount ()
- $this reset ()
- array row ([int $id = null])
- $this setPrimaryKey ([string $key = ""])
- $this table ([string $tablename = ""])
- boolean/obj update (array $value, [int $id = null])
- string version ()
- $this where ( $where, string/array $in)





### Methods






#### all (line 128)

execute SQL statements

  -  access: public

array all ([int $id = null])

  -  int $id	

#### close (line 27)

close database

  -  access: public

void close ()
#### col (line 142)

execute SQL statements

 -   access: public

array col ([int $id = null])

   - int $id	

#### delete (line 121)

delete database

  -  access: public

boolean/obj delete ([int $id = null])

  -  int $id	

#### field (line 83)

identity the field to be operated

   - access: public

$this field ([string/array $field = null])

   - string/array $field	

#### group (line 76)

group data

  -  access: public

$this group ([string $group = ""])

  -  string $group	

#### insert (line 114)

insert database

 -   access: public

boolean/obj insert (array $value)

 -   array $value	

#### key (line 68)

specify an index(only valid for function all())

   - access: public

$this key ([string $key = ''])

  -  string $key	

#### lastId (line 23)

return the last operate ID

   - access: public

int lastId ()
#### limit (line 91)

specify the number of records

 -   access: public

$this limit ([int/string $offset1 = null], [int $offset2 = null])

 -   int/string $offset1	
 -   int $offset2	

#### map (line 154)

execute SQL statements

 -   access: public

array map ([int $id = null])

  -  int $id	

#### one (line 148)

execute SQL statements

   - access: public

int/string one ([int $id = null])

 -   int $id	

#### order (line 61)

specify the sort order or direction

  -  access: public

$this order ([string $order = ""])

 -   string $order	

#### queryCount (line 18)

return times of accessing database

   - access: public

int queryCount ()
#### reset (line 97)

reset all conditions

  -  access: public

$this reset ()
#### row (line 135)

execute SQL statements

  -  access: public

array row ([int $id = null])

 -   int $id	

#### setPrimaryKey (line 47)

set PrimaryId of table

 -   access: public

$this setPrimaryKey ([string $key = ""])

 -   string $key	

#### table (line 40)

set table name

 -   access: public

$this table ([string $tablename = ""])

 -   string $tablename	

#### update (line 106)

update database

  -  access: public

boolean/obj update (array $value, [int $id = null])

 -   array $value	
 -   int $id	

#### version (line 33)

return current version

 -   access: public

string version ()
#### where (line 54)

set data selection

  -  access: public

$this where ( $where, string/array $in)

  -  string/array $in	
  -  $where	

