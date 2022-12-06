<?php
session_start();
//connect to database
//$db=mysqli_connect("localhost","root","","mysite");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "game";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}

echo "in submit";

if(isset($_POST['register_btn']))
{
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $password2=mysqli_real_escape_string($db,$_POST['password2']);  
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result=mysqli_query($db,$query);
      if($result)
      {
     
        if( mysqli_num_rows($result) > 0)
        {
                
                echo '<script language="javascript">';
                echo 'alert("Username already exists")';
                echo '</script>';
        }
        
          else
          {
            
            if($password==$password2)
            {           //Create User
                $password=md5($password); //hash password before storing for security purposes
                $sql="INSERT INTO users(username, email, password, loyalty, points, balance, winloss, coinin) VALUES('$username','$email','$password', 0, 0, 0, 0, 0)"; 
                mysqli_query($db,$sql);  
                $_SESSION['message']="You are now logged in"; 
                $_SESSION['username']=$username;
                header("location:home.php");  //redirect home page
            }
            else
            {
                $_SESSION['message']="The two password do not match";   
            }
          }
      }
}
?>