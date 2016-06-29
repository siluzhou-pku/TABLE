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
- array col ()
- boolean/obj delete ([int $id = null])
- $this field (string/array $in)
- $this group (string $str)
- boolean/obj insert (array $value)
- $this key (string $str)
- int lastId ()
- $this limit (int/string $in1, int $in2)
- array map ()
- int/string one ()
- $this order (string $str)
- times queryCount ()
- $this reset ()
- array row ()
- $this setPrimaryId ([string $str = ""])
- $this table ([string $str = ""])
- boolean/obj update (array $value, [int $id = null])
- current version ()
- $this where (string/array $in)



### Methods



#### all (line 126)

execute SQL statements

   - access: public

array all ([int $id = null])

   - int $id	

#### close (line 26)

close database

  -  access: public

void close ()
#### col (line 138)

execute SQL statements

 -   access: public

array col ()
#### delete (line 119)

delete database

  -  access: public

boolean/obj delete ([int $id = null])

  -  int $id	

#### field (line 81)

identity the field to be operated

 -   access: public

$this field (string/array $in)

  -  string/array $in	

#### group (line 74)

group data

  -  access: public

$this group (string $str)

   - string $str	

#### insert (line 112)

insert database

  -  access: public

boolean/obj insert (array $value)

  -  array $value	

#### key (line 66)

specify an index(only valid for function all())

 -   access: public

$this key (string $str)

  -  string $str	

#### lastId (line 22)

return the last operate ID

  -  access: public

int lastId ()
#### limit (line 89)

specify the number of records

   - access: public

$this limit (int/string $in1, int $in2)

  -  int/string $in1	
  -  int $in2	

#### map (line 148)

execute SQL statements

  -  access: public

array map ()
#### one (line 143)

execute SQL statements

  -  access: public

int/string one ()
#### order (line 59)

specify the sort order or direction

   - access: public

$this order (string $str)

   - string $str	

queryCount (line 17)

  -  return: of accessing database
  -  access: public

times queryCount ()
#### reset (line 95)

reset all conditions

   - access: public

$this reset ()
#### row (line 132)

execute SQL statements

  -  access: public

array row ()
#### setPrimaryId (line 45)

set PrimaryId of table

  -  access: public

$this setPrimaryId ([string $str = ""])

  -  string $str	

#### table (line 38)

set table name

   - access: public

$this table ([string $str = ""])

   - string $str	

#### update (line 104)

update database

  -  access: public

boolean/obj update (array $value, [int $id = null])

  -  array $value	
  -  int $id	

version (line 31)

  -  return: version of class db
  -  access: public

current version ()
#### where (line 52)

set data selection

   - access: public

$this where (string/array $in)

   - string/array $in	
