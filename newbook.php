<?php
 include("connection.php");
 global $server , $username , $password , $dbname;

 $conn=mysqli_connect($server , $username , $password ,$dbname);
session_start();
 $id=uniqid();
 $book_name=$_POST['book_name'];
 $auther_name=$_POST['auther_name'];
 $subject=$_POST['subject'];
 $amount=$_POST['amount'];

 if($_SESSION['username']==TRUE)
 {
    $id = stripcslashes($id);  
 $book_name = stripcslashes($book_name);
 $auther_name = stripcslashes($auther_name);  
 $subject = stripcslashes($subject);  

 $id = mysqli_real_escape_string($conn, $id);  
 $book_name = mysqli_real_escape_string($conn, $book_name);
 $auther_name = mysqli_real_escape_string($conn, $auther_name);
 $subject = mysqli_real_escape_string($conn, $subject);

$sql="insert into books (id , book_name , auther_name , subject,amount) values ('$id','$book_name','$auther_name','$subject','$amount')";


if($conn->query($sql))
{

    header("Location: index.html");
       exit;
}
else{
    echo "something is wrong".$conn->error;
}
 }
 else
 {
    header("Location: login.html");
    exit;
 }

  




?>