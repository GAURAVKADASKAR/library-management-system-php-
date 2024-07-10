<?php  
$server="192.168.1.3";
$username="root";
$password="welcome";
$dbname="dlatl";

$conn=mysqli_connect($server,$username,$password,$dbname);

if($conn)
{
    echo "";
}
else{
    echo "connetion error";
}



?>