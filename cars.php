<?php
ini_set('memory_limit','-1');
$array = [];
$result = [];
$file = "car-db.csv";
function getCsvData($file){
if(!file_exists($file)){
    echo "$file nem található";
    return false;
}

if(file_exists($file)) {
    $csv = fopen($file, 'r');
    while (!feof($csv)) {
        $line = fgetcsv($csv);
        $array[] = $line;
      }
       fclose($csv);
    }
    return $array ;
}

$csvData = getCsvData($file);
//print_r($csvData);

$sv = count($csvData);
$maker ="";
$model = "";
for ($i=0; $i < $sv; $i++) { 
    if ($maker != $csvData[$i][1]) {
        $maker = $csvData[$i][1];
    }
    if ($model != $csvData[$i][2]) {
        $result[$maker][] = $model;
    }
}
print_r($result);
?>