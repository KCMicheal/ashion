<?php
// define('SERVER_NAME',"localhost");
// define('DB_USER',"root");
// define('DB_PASS',"");
// define('DB_NAME',"fashionstore");

/* second method*/

$server = "localhost";
$db_user = "root";
$db_pass="";
$db_name="fashionstore";


$con=mysqli_connect($server,$db_user,$db_pass,$db_name);
if(!$con){
 echo  "<script>alert('I am no longer connected')</script>".mysqli_connect_error();
}
?>