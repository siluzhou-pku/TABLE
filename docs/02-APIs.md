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
- $this field ([string/array $in = null])
- $this group ([string $str = ""])
- boolean/obj insert (array $value)
- $this key ([string $str = ''])
- int lastId ()
- $this limit ([int/string $in1 = null], [int $in2 = null])
- array map ([int $id = null])
- int/string one ([int $id = null])
- $this order ([string $in1 = ""])
- int queryCount ()
- $this reset ()
- array row ([int $id = null])
- $this setPrimaryId ([string $str = ""])
- $this table ([string $str = ""])
- boolean/obj update (array $value, [int $id = null])
- string version ()
- $this where (string/array $in)




### Methods




#### all (line 129)

execute SQL statements

  -  access: public

array all ([int $id = null])

  -  int $id	

#### close (line 27)

close database

   - access: public

void close ()
#### col (line 143)

execute SQL statements

 -   access: public

array col ([int $id = null])

 -   int $id	

#### delete (line 122)

delete database

  -  access: public

boolean/obj delete ([int $id = null])

 -   int $id	

#### field (line 84)

identity the field to be operated

  -  access: public

$this field ([string/array $in = null])

  -  string/array $in	

#### group (line 77)

group data

  -  access: public

$this group ([string $str = ""])

  -  string $str	

#### insert (line 115)

insert database

  -  access: public

boolean/obj insert (array $value)

   - array $value	

#### key (line 69)

specify an index(only valid for function all())

  -  access: public

$this key ([string $str = ''])

   - string $str	

#### lastId (line 23)

return the last operate ID

  -  access: public

int lastId ()
#### limit (line 92)

specify the number of records

  -  access: public

$this limit ([int/string $in1 = null], [int $in2 = null])

  -  int/string $in1	
  -  int $in2	

#### map (line 155)

execute SQL statements

  -  access: public

array map ([int $id = null])

  -  int $id	

#### one (line 149)

execute SQL statements

  -  access: public

int/string one ([int $id = null])

  -  int $id	

#### order (line 62)

specify the sort order or direction

   - access: public

$this order ([string $in1 = ""])

   - string $in1	

#### queryCount (line 18)

return times of accessing database

   - access: public

int queryCount ()
reset (line 98)

reset all conditions

  -  access: public

$this reset ()
row (line 136)

execute SQL statements

   - access: public

array row ([int $id = null])

  -  int $id	

#### setPrimaryId (line 47)

set PrimaryId of table

 -   access: public

$this setPrimaryId ([string $str = ""])

  -  string $str	

#### table (line 40)

set table name

  -  access: public

$this table ([string $str = ""])

  -  string $str	

#### update (line 107)

update database

  -  access: public

boolean/obj update (array $value, [int $id = null])

  -  array $value	
 -   int $id	

#### version (line 33)

return current version

  -  access: public

string version ()
#### where (line 54)

set data selection

  -  access: public

$this where (string/array $in)

   - string/array $in	

