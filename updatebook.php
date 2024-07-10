<?php
 include("connection.php");
 global $server , $username , $password , $dbname;

 $conn=mysqli_connect($server , $username , $password ,$dbname);
 session_start();
 if($_SESSION['username']==TRUE)
 {
    $id=$_POST["id"];
 $book_name=$_POST['book_name'];
 $auther_name=$_POST['auther_name'];
 $subject=$_POST['subject'];
 $amount=$_POST['amount'];


    $id = stripcslashes($id);  
 $book_name = stripcslashes($book_name);
 $auther_name = stripcslashes($auther_name);  
 $subject = stripcslashes($subject);
 $amount=stripslashes($amount);  

 $id = mysqli_real_escape_string($conn, $id);  
 $book_name = mysqli_real_escape_string($conn, $book_name);
 $auther_name = mysqli_real_escape_string($conn, $auther_name);
 $subject = mysqli_real_escape_string($conn, $subject);
 $amount=mysqli_real_escape_string($conn,$amount);
$sl="select * from books where id='$id'";
$result=mysqli_query($conn,$sl);

$count=mysqli_num_rows($result);


if($count==1)
{
    $query="update books set  book_name='$book_name', auther_name = '$auther_name' ,subject='$subject',amount='$amount' where id='$id'";
    if($conn->query($query))
    {
        echo "The data is stored";
        header("Location: index.html");
    }
    else{
        echo "error";
    }
}
 }


else
{
    header("Location: login.html");
    exit;
}
 




