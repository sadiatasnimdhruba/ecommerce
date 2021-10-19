<?php
 
 include("includes/header2.php");
$pay_sql="select cart.*,products.product_price
      from cart,products where products.product_id=cart.product_id AND  userid='$user'";
$pay_result=mysqli_query($con,$pay_sql); 
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>An ecommerce website</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container"><br><br><br><br><br><br>
<h2>Bkash payment</h2>

 <table class="table">
          <thead>
            <th>Product Name</th>
            <th>Product price</th>
            

          </thead>
          <tbody>
            <?php 
             while($pay_row=mysqli_fetch_array($pay_result)){
                ?><tr>
              <td><?php echo $pay_row['product_title']; ?></td>
              <td><?php echo $pay_row['product_price']; ?></td>
              
            </tr>

            <?php } ?>
          

          </tbody>
        </table>
<a href="pay.html" class="btn btn-primary">Payment done</a>



</div>

</body>
</html>