<?php

include("includes/header2.php");

$invoice= rand(100000000,1000000000);
$user=$userdata['userid']; 

$order_sql="insert into orders values(NULL,'$user','$invoice');";
if(mysqli_query($con,$order_sql))
{
  $order_result=mysqli_query($con,"select * from orders where user_id='$user'");
  $order_data=mysqli_fetch_array($order_result);
}




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
  <span style="margin-top: 3%; font-size: 50px;"><img src="https://www.freepnglogos.com/uploads/tick-png/green-tick-png-images-5.png" width="100" height="80">Checkout</span>
  <br>
  <div class="alert alert-success">
            <strong>Thank you. your order has completed successfully! </strong>
          </div>
          <div class="row">
            <div class="col-6">
          <img src="images/cart-logo.png" width="300" height="300" style="border-radius: 50%;">
        </div>
        <div class="col-6">
          <a href="invoice.php?userid=<?php echo $userdata['userid'];?>" class="btn btn-success"><?php echo $order_data['invoice_id'] ;?><img src="images/right.png" width="30" height="20" style="border-radius: 50%;"></a>
          <br><br>
          <table class="table">
          <thead>
            <th>Product Name</th>
            <th>Product Quantity</th>
            

          </thead>
          <tbody>
              <?php 

               $sql="select count(product_title) as count_product, product_title
                from cart
                group by product_title";
               $result=mysqli_query($con,$sql);
               while($row=mysqli_fetch_array($result)){
                ?><tr>
              <td><?php echo $row['product_title']; ?></td>
              <td><?php echo $row['count_product']; ?></td>
             
            </tr>

            <?php } ?>
          

          </tbody>
        </table>
        <p>This is the details of your order.Please go to the invoice for the future purpose</p>
        </div>
      </div>
  </div>

    <?php include("includes/footer.php");?>