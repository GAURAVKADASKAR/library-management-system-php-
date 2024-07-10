<?php
include("connection.php");
global $server,$username,$password,$dbname;

$conn=mysqli_connect($server,$username,$password,$dbname);


$user=$_POST["username"];
$pass=$_POST["password"];
$type=$_POST['type'];
$user = stripcslashes($user);  
$pass = stripcslashes($pass);  
$type=stripcslashes($type);
$user = mysqli_real_escape_string($conn, $user);  
$pass = mysqli_real_escape_string($conn, $pass); 
$type= mysqli_real_escape_string($conn,$type); 


$query=mysqli_query($conn,"select * from register where username= '$user' and password='$pass'");
$count=mysqli_num_rows($query);
if($count==1)
{
    echo "username is already taken please try another name";
}
else{
    
    $query1="insert into register (username , password , type) values ('$user', '$pass', '$type')";
    if($conn->query($query1) === TRUE) 
    {
        echo "you have register successfully";
        echo $user;
        echo $pass;
        echo $type;
    }
    
    else{

        echo "error". $conn->error;

}
}

?>