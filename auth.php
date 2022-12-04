<?php
session_start();

if(  isset($_SESSION['username']) )
{
  header("location:home.php");
  die();
}
//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "game";

// Create connection
$db = new mysqli($servername, $username, $password, $dbname);
//if ($conn->connect_error) {
//    //die("Connection failed: " . $conn->connect_error);
//}

if($db)
{
  if(isset($_POST['login_btn']))
  {
      $username=mysqli_real_escape_string($db,$_POST['username']);
      $password=mysqli_real_escape_string($db,$_POST['password']);
      $password=md5($password); //Remember we hashed password before storing last time
      $id = "id";
      $sql="SELECT " . $id . " FROM users WHERE  username='$username' AND password='$password'";
      $result=mysqli_query($db,$sql);
      
      if($result)
      {
     
        if( mysqli_num_rows($result)>=1)
        {
            
            $_SESSION['message']="You are now logged in.";
            $_SESSION['username']=$username;
            //$_SESSION['id']= $id;
            header("location:home.php");
        }
       else
       {
              $_SESSION['message']="Username and Password combiation incorrect";
              header("location:login.php");
       }
      }
  }
}
?>