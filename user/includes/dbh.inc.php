<?php

//$servername = "localhost";
//$dbusername = "root";
//$dbPassword = "";
//$dbName = "tender";
//
//$conn = mysqli_connect($servername,$dbusername, $dbPassword , $dbName);
//
//if (!$conn) {
//    die("Connection failed: " . mysqli_connect_error());
//}
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbdatabase = "tender";


//create a connection 

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbdatabase);

if(!$conn){
    die("sorry we failed to connect:". mysqli_connect_error());
}else{
//    echo "connection successful";
}

?>