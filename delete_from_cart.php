
<?php

session_start();


$cart_id=$_GET['cart_id'];
$userid=$_GET['userid'];
include("includes/db.php");
if($con)
{
  $sql="DELETE FROM cart where cart_id=$cart_id";
  if(mysqli_query($con,$sql))
    {
      header("Location: cart.php?userid=".$userid);

    }

}

?>