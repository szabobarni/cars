<?php

class DB
{
    protected $mysqli;

    function __construct($host = 'localhost', $user='root',$password = null, $database = 'cars')
    {
        $this->mysqli = mysqli_connect($host,$user,$password.$database);
        if (!$this->mysqli) {
            die("Connection failed: ". mysqli_connect($host,$user,$password.$database));
        }
    }
}