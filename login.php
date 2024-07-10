    <?php
    include("connection.php");
    session_start();
    global $server,$username,$password,$dbname;

    $conn=mysqli_connect($server,$username,$password,$dbname);


    $user=$_POST["username"];
    $pass=$_POST["password"];
    $user = stripcslashes($user);  
    $pass = stripcslashes($pass);  
    $user = mysqli_real_escape_string($conn, $user);  
    $pass = mysqli_real_escape_string($conn, $pass);  


    $result=mysqli_query($conn,"select * from register where username= '$user' and password='$pass'");
    $row=mysqli_fetch_assoc($result);
    $count=mysqli_num_rows($result);
    if($count == 1)
    {
  $_SESSION['username']=$user;
  $_SESSION['start']=time();
  $_SESSION['expiry']=$_SESSION['start']+120;

  

    if($row['type']=="student")
    {
        header("Location: availablebooks.php");
        exit;
    }
    else{
        header("Location: index.html");
        exit;
    }
       
       
    }
    else
    {
        echo "invalid username and password";
    }
 

    ?>