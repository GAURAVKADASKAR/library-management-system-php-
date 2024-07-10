<?php
include("connection.php");
global $server,$username,$password,$dbname;



$conn=mysqli_connect($server,$username,$password,$dbname);
session_start();
if(isset($_SESSION['username']))
{
    $book_name=$_POST['book_name'];
$auther_name=$_POST['auther_name'];
$subject=$_POST['subject'];

$enrollment=$_POST['enrollment'];
$book_name = stripcslashes($book_name);  
$book_name = mysqli_real_escape_string($conn, $book_name);  
$enrollment = stripcslashes($enrollment);  
$enrollment = mysqli_real_escape_string($conn, $enrollment); 
if($conn)
{  
  
    
  
   
    $result=mysqli_query($conn,"select * from issue where book_name= '$book_name' and enrollment='$enrollment'");
    $count=mysqli_num_rows($result);
    if($count==1)
    {
          echo "you have already issued this book your are unable to issue a same book";
          header("Location: alreadyissue.html");
          exit;
    }
    else
    {
        
        $query5=mysqli_query($conn,"select * from books where book_name='$book_name'");
        $result5=mysqli_num_rows($query5);
        echo $result5;
        if($result5==0)
        {
           
            header("Location: notavailable.html");
            exit;
    
        }

   $sql="insert into issue (book_name , auther_name , subject , enrollment) values ('$book_name','$auther_name','$subject','$enrollment')";
   if($conn->query($sql)===TRUE)
   {    
    $query2=mysqli_query($conn,"select amount from books where book_name='$book_name'");
    $row=mysqli_fetch_assoc($query2);
    if($row['amount']==1)
    {
        $query="delete from books where book_name='$book_name'";
    }
    else
    {    
        $row['amount']=$row['amount']-1;
        $count2=$row['amount'];
        $query="update books set amount='$count2' where book_name='$book_name'";
        echo $conn->error;
    }
    
      if($conn->query($query)==TRUE)
     {    
        header("Location: index.html");
        exit;

     }
    
     else{
        echo "error".$conn->error;;                     
     }
    
    }
    else{
     echo "error".$conn->error;
    }
    }
}
   
   else
   {
       header("Location: login.html");
       exit;
   }
    
}




?>