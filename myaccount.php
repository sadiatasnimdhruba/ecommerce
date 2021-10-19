<?php
session_start();
include("includes/header2.php");

?>

<body>
    <br><br><br>

    <div class="container"><br><br><br><br><br>
      <div class="row">
        <div class="col-md-3">
          
            <br><br><br><br><br>
          <img src="images/account.jpg" style="float: left; width:280px;height:280px">
        </div>
        <div class="col-md-9">
           <?php if(isset($_SESSION['success'])){?>
          <div class="alert alert-success">
            <strong>Successfully Changed the password!</strong>.
          </div>
        <?php }?>
          <h2 class="mt-5">My account</h2>
          <hr><br><br>
          <table class ="table">
               <tr>
            <th class="text-right" width="150">ID :</th>
            <td><?php echo $userdata['userid'] ;?></td>
          </tr>
            <tr>
            <th class="text-right" width="150">Name :</th>
            <td><?php echo $userdata['name'];?></td>
          </tr>
            <tr>
            <th class="text-right" width="160">Shipping Address :</th>
            <td><?php echo $userdata["address"];?></td>
          </tr>
            <tr>
            <th class="text-right" width="150">Email :</th>
            <td><?php echo $userdata["email"];?></td>
          </tr>
           <tr>
            <th class="text-right" width="250">Password :</th>
            <td><?php echo $userdata["password"];?></td>
          </tr>
                 


          </table>
          <a class="btn btn-info" href="changepassword.php?userid=<?php echo $userdata['userid'];?>">Change password</a>
  
        </div>
      </div>
    </div>
<?php unset($_SESSION['success']); ?>