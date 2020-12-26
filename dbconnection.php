<?php

$db_host="localhost";
$db_user="root";
$db_password="";
$db_name="Wall-e";
$db_port=3306;


//db connection
$conn=new mysqli($db_host,$db_user,$db_password,$db_name,$db_port);

//checking connection
if($conn->connect_error){
    die("failed");

}/*else{
    echo "connetced";
}*/

?>