<?php
$server="localhost";
$username="id18890006_abyu";
$password="112233445566Ab@";
$db="id18890006_bank_users";                       
$conn=mysqli_connect($server,$username,$password,$db);
if($conn){
  //Connection successfully established
}

else{
 die("connection to this database failed due to " .mysqli_connect_error()); //connection not establised
}
?>