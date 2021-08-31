<?php

class DBphp extends SQLite3{
function __construct(){
$this->open('DBUsingPHP.db');
 }
 }
$db = new DBphp();

?>