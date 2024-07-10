<?php

include("connection.php");
global $server,$username,$password,$dbname;

$conn=mysqli_connect($server,$username,$password,$dbname);

session_start();

$book_name=$_POST['book_name'];

if($conn)
{
   if($_SESSION['username']==TRUE)
   {
    $sql="delete from books where book_name= '$book_name'";
    if($conn->query($sql))
    {
        echo "deleted successfully";
        header("Location: index.html");
        exit;
    }
    else
    {
        echo "something went wrong";
    }
   }
   else
   {
    header("Location: login.html");
   }
}




?>