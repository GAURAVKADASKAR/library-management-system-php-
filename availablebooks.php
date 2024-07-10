<?php
include("connection.php");
global $server,$username,$password,$dbname;
session_start();
$conn=mysqli_connect($server,$username,$password,$dbname);

if($conn)
{  if($_SESSION['username']==TRUE)
  {
    if(isset($_POST['search']))
  {
    $search=$_POST['search'];
   
    
    $sql=mysqli_query($conn,"select * from books where book_name like '%$search%' OR auther_name like '%$search%' OR subject like '%$search%'");
  
  }
else
{
  $sql=mysqli_query($conn,"Select * from books");
}
   
  }
  else
  {
    header("Location: login.html");
    exit;
  }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Book's</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<style>
    .table1
    {
        margin-top: 150px;
        font-size: 25px;
        text-align: center;
    }
</style>
 
</head>
<body>
  <form action="availablebooks.php" style="margin-top: 60px; margin-left:800px;" method="post">
  <input type="text" name="search" placeholder="Search for student">
  <input type="submit" value="Submit">
</form>

<table class="table table table-striped" style="width: 1500px; margin-top: 20px; margin-left : 200px; border : 1px solid black;">
  <thead>
    <tr>
      <?php
 
      
      ?>
      <th scope="col">ID</th>
      <th scope="col">Book Name</th>
      <th scope="col">Authers Name</th>
      <th scope="col">Subject</th>
      <th scope="col">Amount</th>
      <th scope="col">Isssue</th>

    </tr>
  </thead>
  <tbody>
    <?php
    $i=1;
   
    while($row=mysqli_fetch_array($sql))
    {
        

    
    ?>
    <tr>
      <th scope="row"><?php echo $i;
      $i=$i+1;?></th>
      <td><?php echo $row["book_name"];?></td>
      <td><?php echo $row["auther_name"];?></td>
      <td><?php echo $row["subject"];?></td>
      <td><?php echo $row["amount"];?></td>
      <td><a href="issuebook.php?id=<?php echo $row['id']?>">click</a></td>
    </tr>
    <?php
    }
    ?>

  </tbody>
</table>   </body>
</html>