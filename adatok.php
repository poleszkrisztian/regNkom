<?php

require_once 'serv.php';
require_once 'function.php';
require_once 'cont.php';



$sql= "select kategoria from kategoriak";
$table = mysqli_query($dbc, $sql);
$cim=[];
foreach ($table as $key => $value) {
    foreach ($value as $key => $velua) {
        array_push($cim, $velua);
    }
    
}




/*foreach ($cim as $key => $value) {
    echo $value;
}

*/
$sql="select count(kategoria) from kategoriak";
$katdb= mysqli_query($dbc, $sql);
foreach ($katdb as $key => $value) {
    foreach ($value as $key =>$darab) {
        
    }
}

$sql= "select katszov from kategoriak";
$tabl = mysqli_query($dbc, $sql);
$katszov=[];
foreach ($tabl as $key => $value) {
    foreach ($value as $key => $ertek) {
        array_push($katszov, $ertek);
    }
    
}



?>