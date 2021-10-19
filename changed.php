<?php 

session_start();
include("includes/db.php");


$id=$_GET['userid'];
$current=$_POST['current'];
$new=$_POST['new'];
$confirm=$_POST['confirm'];

   $res=mysqli_query($con,"SELECT * FROM users where userid=$id");
  $userdata=mysqli_fetch_assoc($res);

      if($current !=$userdata['password'])
   {
    $_SESSION['error_msg']="Your current password is wrong!";
     header("Location: changepassword.php?userid=$id");
    die();
   }


   if(strlen($new)<5)
   {
    $_SESSION['error_msg']="Your password must be at least 5 characters!";
     header("Location: changepassword.php?userid=$id");
    die();
   }

   if($new != $confirm)
   {
  
   	$_SESSION['error_msg']="Password didn't match!";
   	header("Location: changepassword.php?userid=$id");
   }
      if($new == $current)
   {
  
   	$_SESSION['error_msg']="Please enter a new password!";
   	header("Location: changepassword.php?userid=$id");
   }
   else
   {
   	 $sql="UPDATE users SET password='$new'";

   	 if(mysqli_query($con,$sql))
    {
        $_SESSION['success']=1;
    	header("Location: myaccount.php?userid=$id");
        
    }
    else
    {
         $_SESSION['error']=1;
    	header("Location: changepassword.php?userid=$id");
    }
   }



?>