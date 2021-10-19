<?php

include("includes/header2.php");

?><br><br><br>
<div class="row">
  <div class="sidebar col-lg-2"  style="margin-top: 1%;margin-left: 2%">
    <h3>Categories</h3>
    
    <?php
              $get_cats="select * from categories";
              $run_cats=mysqli_query($con,$get_cats);
              while($row_cats=mysqli_fetch_array($run_cats))
              {
                $cat_id=$row_cats['cat_id'];
                $cat_title=$row_cats['cat_title'];

                echo "<a href='index.php?cat=$cat_id' class='sidebar-link'>".$cat_title."</a><br>";

              }
    ?>
    <br><br>
    <h3>Brands</h3>
    

    <?php
              $get_brands="select * from brands";
              $run_brands=mysqli_query($con,$get_brands);
              while($row_brands=mysqli_fetch_array($run_brands))
              {
                $brand_id=$row_brands['brand_id'];
                $brand_title=$row_brands['brand_title'];

                echo "<a href='index.php?brand=$brand_id' class='sidebar-link'>".$brand_title."</a><br>";

              }
    ?>
  </div>
  <style>
  #content_area
{
  background: grey;
  width:800px;
  margin-top:40px;
}
#products_box
{
  width:780px;
  text-align: center;
}
#single_product
{
  float:left;
  margin-left:30px;
  padding:10px;
}
#single_product img
{
  border:2px solid black;
}

.noti_cart_number
{
  background-color: red;
  color:#fff;
  position: absolute;
  top:5px;
  left:1100px;
  padding:1px 2px 1px 2px;
}
</style>

<div class="col-lg-9" style="background-color: #e1e2e3;">
  <h1 style="margin-top: 2%;">Checkout</h1>
  <br>
  
  <div class="row">
    <div class="col-6">
      <?php
          $total="select count(cart_id) as total from cart";
          $total_result=mysqli_query($con,$total);
          $total_data=mysqli_fetch_array($total_result);
      ?>

      <h4> Your Item : <?php echo $total_data['total']; ?> </h4><br>
  <table class="table">
          <thead>
            <th>Product Name</th>
            <th>Product price</th>
            <th>Product image</th>

          </thead>
          <tbody>
              <?php 

               $sql="select cart.*,products.product_price,products.product_image
                from cart,products 
                where products.product_id=cart.product_id";
               $result=mysqli_query($con,$sql);
               while($row=mysqli_fetch_array($result)){
                ?><tr>
              <td><?php echo $row['product_title']; ?></td>
              <td><?php echo $row['product_price']; ?></td>
              <td><img src="<?php echo $row['product_image']; ?>" width="150" height="130"></td>
            </tr>

            <?php } ?>
          

          </tbody>
        </table>
    </div>


    <div class="col-6">
      
       <h4>Please choose your preferred method of payment</h4>
       <form method="POST" action="complete_order.php?userid=<?php echo $userdata['userid'];?>">
       <div class="bkash" style="border:1px solid grey; padding: 5px;">
         <input type="radio" id="html" name="fav_language" value="HTML">
         <img src="images/bkash.jpg" height="50" width="90">
         <span id="qrcode" style="width:20px;height:20px;"></span>
          <label for="html">In order to complete your transaction,we will transfer you
 over to paypal’s secure servers.</label><br>
       </div><br>
       <div class="bkash" style="border:1px solid grey; padding: 5px;">
         <input type="radio" id="html" name="fav_language" value="HTML">
         <img src="images/nogod.jpg" height="50" width="90">
          <label for="html">In order to complete your transaction,we will transfer you
 over to paypal’s secure servers.</label><br>
       </div><br>

<div class="bkash" style="border:1px solid grey; padding: 5px;">
         <input type="radio" id="html" name="fav_language" value="HTML">
         <img src="images/paypal.jpg" height="50" width="90">
          <label for="html">In order to complete your transaction,we will transfer you
 over to paypal’s secure servers.</label><br>
       </div><br><br>
       <button type="submit" class="btn btn-primary" name="submit">Complete order</button>


    </div>
  </div>
  </div>
      <script src="qrcode.min.js"></script>
    <script>
  
      var qrcode=new QRCode(document.getElementById('qrcode'));

      
     //qrcode.makeCode("https://sleepy-pasteur-f58ece.netlify.app/");
      qrcode.makeCode("https://ecommerce210.000webhostapp.com/");
        qrcode.style.width="20px";
      
    </script>

  <?php include("includes/footer.php");?>