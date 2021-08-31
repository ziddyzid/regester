<?php

use DBphp as GlobalDBphp;

class DBphp1 extends SQLite3{
function __construct(){
        $this->open('casher.db');
    }
}
$db1 = new DBphp1();

?>