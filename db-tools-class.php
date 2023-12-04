<?php
class MakerDbTools {
const DBTABLE = 'makers';

    private $mysqli;

    function __construct($host = 'localhost', $user = 'root', $password = null, $db = 'cars')
    {
        $this->mysqli = new mysqli($host,$user,$password,$db);
        if ($this->mysqli->connect_errno) {
            throw new Exeption($this->mysqli->connect_errno);
        }
    }
    function __destruct(){
        $this->mysqli->close();
    }
    function insertMakers($maker, $truncate = false){
        if($truncate) {
            $mysqli->query("TRUNCATE TABLE makers");
        }
        $result = $mysqli->query("INSERT INTO makers (name) VALUES ('$maker')");
        if (!$result){
            echo "Hiba történt a $maker beszúrása közben";
        }
        return $result;
    }
}