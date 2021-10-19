<?php
session_start();

   $fullname=$_POST['fullname'];
   $mail=$_POST['mail'];
   $phone=$_POST['phone'];
   $text=$_POST['text'];


   include("includes/db.php");
   $sql="INSERT INTO contact values('$fullname','$mail','$phone','$text')";
   if(mysqli_query($con,$sql))
   {
   	  $_SESSION['send']=1;
      header("Location: home.php");
        

   }
  


?>