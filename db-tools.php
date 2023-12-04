<?php
function insertMakers($mysqli, $makers, $truncate = false){
    if($truncate) {
        $mysqli->query("TRUNCATE TABLE makers");
    }
    foreach ($makers as $maker) {
        $result = $mysqli->query("INSERT INTO makers (name) VALUES ('$maker')");
    }
    if (!$result){
        echo "Hiba történt a $maker beszúrása közben";
    }
    return $result;
}

function updateMaker($mysqli, $data){
    $result = $mysqli->query("UPDATE makers SET {$data['name']}");

    if (!$result){
        echo "Hiba történt a $maker beszúrása közben";
    }
    return $result;
}