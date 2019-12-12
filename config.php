<?php
define("HOST","localhost");
define("USER","admin");
define("PASSWORD","12345");
define("DB","database");

$db = mysql_connect(HOST,USER,PASSWORD);
if (!$db) {
 exit('WRONG CONNECTION');
}
if(!mysql_select_db('database',$db)) {
 exit(DB);
}
mysql_query('SET NAMES utf8');

?>