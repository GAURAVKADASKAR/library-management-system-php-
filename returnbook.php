<?php
include("connection.php");
global $server,$username,$password,$dbname;

$conn=mysqli_connect($server,$username,$password,$dbname);
session_start();
if($_SESSION['username']==TRUE)
{
    $book_name=$_POST['book_name'];
$auther_name=$_POST['auther_name'];
$subject=$_POST['subject'];
$student_name=$_POST['student_name'];
$enrollment=$_POST['enrollment'];



    $book_name=stripslashes($book_name);
$auther_name=stripslashes($auther_name);
$subject=stripslashes($subject);
$enrollment=stripslashes($enrollment);
$book_name=mysqli_real_escape_string($conn,$book_name);
$auther_name=mysqli_real_escape_string($conn,$auther_name);
$subject=mysqli_real_escape_string($conn,$subject);
$enrollment=mysqli_real_escape_string($conn,$enrollment);

$sql=mysqli_query($conn,"select * from issue where book_name='$book_name' and enrollment='$enrollment'");
$result=mysqli_num_rows($sql);
echo $result;
if($result==1)
{
       $query=mysqli_query($conn,"select * from books where book_name='$book_name'");
       $count=mysqli_num_rows($query);
       if($count==1)
       {
           $row=mysqli_fetch_assoc($query);
           $row['amount']=$row['amount']+1;
           $final=$row['amount'];
           echo $final;
           $query3="update books set amount='$final' where book_name='$book_name'";
           if($conn->query($query3)==TRUE)
           {
              $query4="delete from issue where book_name='$book_name' and enrollment='$enrollment'";
              if($conn->query($query4)==TRUE)
              {
                  echo "Book retunr successfully";
                  
              }
           }
           else{
            echo $conn->error;
           }
       }
       else
       {
        $amount=1;
        $id=uniqid();
        $query1="insert into books (id,book_name,auther_name,subject,amount) values ('$id','$book_name','$auther_name','$subject','$amount')";
        if($conn->query($query1)==TRUE)
        {
            echo "Book return successfully";
        }
        else{
            echo "error" . $conn->error;
        }
       }
}
else
{
    echo "No data  founded or unable to return a book";
}

}


else
{
    header("Location: login.html");
    exit;
}



?>