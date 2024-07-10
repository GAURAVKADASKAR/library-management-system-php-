<?php
include("connection.php");


$conn = mysqli_connect($server, $username, $password, $dbname);
 session_start();



if($conn)
{
  if(isset($_SESSION['username']))
{
  if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
   
    $sql = "SELECT * FROM books WHERE id = '$id'";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0)
    {
          $row=mysqli_fetch_assoc($result);
          $book_name=$row['book_name'];
          $auther_name=$row['auther_name'];
          $subject=$row['subject'];
    }
    else {
        
       
    }
} else {
    echo "ID parameter is missing";
   
}

   }
   else
   {
    header("Location: login.html");
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Issue Books</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>
<body>
<center>
        <form class="col-2 shadow-lg p-3 mb-5 bg-white box2" method="post" action="issue.php" style="margin-top: 20px;">
            <div class="name">
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Book Name</label>
                    <input type="text" class="form-control" name="book_name" value="<?php 
                    
                    $sqll=mysqli_query($conn,"select amount from books where id='$id'");
                    $row=mysqli_fetch_assoc($sqll);
                    
                    if($row['amount']==0)
                    {
                      header("Location: notavailable.html");
                      exit;
                    }
                    else{
                      echo $book_name;
                    }
                     ?>" id="exampleInputPassword1" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Authers Name</label>
                    <input type="text" class="form-control" name="auther_name" value="<?php  
                     $sqll=mysqli_query($conn,"select amount from books where id='$id'");
                     $row=mysqli_fetch_assoc($sqll);
                     if($row['amount']==0)
                     {
                      header("Location: notavailable.html");
                      exit;
                     }
                     else{
                      echo $auther_name;
                      
                     }  ?>" id="exampleInputPassword1" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Subjects</label>
                    <input type="text" class="form-control" name="subject" value="<?php  
                     $sqll=mysqli_query($conn,"select amount from books where id='$id'");
                     $row=mysqli_fetch_assoc($sqll);
                    if($row['amount']==0)
                     {
                      header("Location: notavailable.html");
                      exit;
                     }
                     else{
                      echo $subject;
                     } ?>" id="exampleInputPassword1" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Student Name</label>
                    <input type="text" class="form-control" name="student_name" id="exampleInputPassword1" required>
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Enrollment</label>
                    <input type="text" class="form-control" name="enrollment" id="exampleInputPassword1" required>
                  </div>
                  <button type="submit" class="btn btn-success mb-3 login ">Issue</button> 
                 
                  
            </div>
          </form>
    </center>
</body>
</html>