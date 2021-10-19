<?php
session_start();
include("includes/header.php");



?>
<body>
    <br><br><br>

    <div class="container"><br><br><br><br><br>
      <div class="row">
        <div class="col-md-3">
          <a class="btn btn-info mb-2" href="myaccount.php?userid=<?php echo $userdata['userid'];?>">Back</a>
          <br><br><br><br><br>
          <img src="images/pass.jpg" style="float: left; width:280px;height:250px">
        </div>
        <div class="col-md-9">
           <?php if(isset($_SESSION['error_msg'])){?>
          <div class="alert alert-warning">
            <strong><?php echo $_SESSION['error_msg']; ?></strong>
          </div>
        <?php }?>

      

          <h2 class="mt-5">Update Password</h2>
          <hr>
          <form action="changed.php?userid=<?php echo $userdata['userid'];?>" method="POST">
         
            <div class="form-group">
              <label>Current Passowrd :</label>
              <input required type="password" class="form-control" name="current" placeholder="Enter current password">
            </div>
            <div class="form-group">
              <label>New Password :</label>
              <input required type="password" id="password" class="form-control" name="new" placeholder="******" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
            </div>
            <div class="form-group">
              <label>confirm password :</label>
              <input required type="password" id="confirm-password" class="form-control" name="confirm" placeholder="******">
              <span id="confirm-password-warning"
                    style="color: red; visibility: hidden; font-weight: bold;font-size: 15px;">**Password doesn't match**</span>
            </div>  
            <br>
           <button type="submit" class="btn btn-primary">Submit</button><br>
             <div class="col-md-5">
                    <span id="password-warning"
                    style="color: red; visibility: hidden; font-weight: bold;font-size: 15px;">**password must be at least 6 characters**</span><br>
                    <span id="password-warning1"
                    style="color: red; visibility: hidden; font-weight: bold;font-size: 15px;">**Must contain at least one uppercase letter**</span><br>
                    <span id="password-warning2"
                    style="color: red; visibility: hidden; font-weight: bold;font-size: 15px;">**Must contain at least one lowercase letter**</span><br>
                    <span id="password-warning3"
                    style="color: red; visibility: hidden; font-weight: bold;font-size: 15px;">**Must contain at least one number**</span><br>
       </div>
          <script>
      let password = document.getElementById("password");
      let confirm_password = document.getElementById("confirm-password");

      password.addEventListener("keyup", (params) => {

    let password_warning = document.getElementById("password-warning");
    let password_warning1 = document.getElementById("password-warning1");
    let password_warning2 = document.getElementById("password-warning2");
    let password_warning3 = document.getElementById("password-warning3");

    var upperCaseLetters = /[A-Z]/g;
    var numbers = /[0-9]/g;
    var lowerCaseLetters = /[a-z]/g;
        
        if(password.value.match(upperCaseLetters))
        {
          password_warning1.style.visibility = 'hidden';

        }
        else
        {
          password_warning1.style.visibility = 'visible';
        }

           if(password.value.match(lowerCaseLetters))
        {
          password_warning2.style.visibility = 'hidden';

        }
        else
        {
          password_warning2.style.visibility = 'visible';
        }


           if(password.value.match(numbers))
        {
          password_warning3.style.visibility = 'hidden';

        }
        else
        {
          password_warning3.style.visibility = 'visible';
        }

    let pass=password.value;

    if (pass.length > 5){
        password_warning.style.visibility = 'hidden';
    }
    else{
        password_warning.style.visibility = 'visible';
    }
});


confirm_password.addEventListener("keyup", (params) => {

    let confirm_password_warning = document.getElementById("confirm-password-warning");
    if (confirm_password.value == password.value){
        confirm_password_warning.style.visibility = 'hidden';
    }
    else{
        confirm_password_warning.style.visibility = 'visible';
    }
});

    </script>
          </form>

       
        </div>
      </div>
    </div>


<?php unset($_SESSION['error_msg']); ?>
