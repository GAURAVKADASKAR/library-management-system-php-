<?php
include("connection.php");
global $server,$username,$password,$dbname;

$conn=mysqli_connect($server,$username,$password,$dbname);


if(isset($_POST['search']))
    {
      $search=$_POST['search'];
      $search=preg_replace("#[^0-9a-z]#i","",$search);
      $sql=mysqli_query($conn,"select * from books where book_name like '%$search%' OR auther_name like '%$search%' OR subject like '%$search%'");
      $result=mysqli_fetch_assoc($sql);
      echo $result['book_name'];
      echo $result['auther_name'];
      echo $resutl['subject'];  
    }
else
{
    echo "";
}


?>