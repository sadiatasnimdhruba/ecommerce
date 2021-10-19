<?php

include("includes/header2.php");

$user=$userdata['userid']; 
$order_result=mysqli_query($con,"select * from orders where user_id='$user' ");
  $order_data=mysqli_fetch_array($order_result);

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
<div class="col-lg-9" style="background-color: #e1e2e3;padding-top: 2%;">

	<h2>Invoice : <?php echo $order_data['invoice_id'] ;?> </h2>
	<hr>
	<div class="row">
     <div class="col-3">
     	<h5>Sent to</h5>
     	<p><?php echo $userdata['name']; ?><br>
     	<?php echo $userdata['address']; ?></p>
     	<h5>Invoice Date</h5>
     	<p id="demo"></p>
     </div>
      <div class="col-6"></div>
      <div class="col-3">
      	
      	<h5>Pay to</h5>
      	<p>Shopping site</p>
      	<h5>Payment method</h5>
      	<p>Online</p>
      </div>


	</div><hr>

	<table class="table">
          <thead>
            <th>Product Name</th>
            <th>Ordered</th>
            <th>Quantity</th>
            <th>Product price</th>

          </thead>
          <tbody>
              <?php 

               $sql="select cart.*,COUNT(cart.product_title) as count_product, products.product_price from cart,products where products.product_id=cart.product_id group by product_id";
               $result=mysqli_query($con,$sql);
               while($row=mysqli_fetch_array($result)){
                ?><tr>
              <td><?php echo $row['product_title']; ?></td>
              <td class="demo1"></td>
              <td><?php echo $row['count_product']; ?></td>
              <td><?php echo $row['product_price']; ?></td>
              
            </tr>

            <?php } ?>
          

          </tbody>
        </table>
        <a href="cart.php?userid=<?php echo $userdata['userid'];?>" class="text-right">Go back to my order</a>
        <br><br><br>

</div>
<script>
const d = new Date();
document.getElementById("demo").innerHTML = d.getDate()+"/"+d.getMonth()+"/"+d.getFullYear();
var x, i;
  x = document.querySelectorAll(".demo1");
  for (i = 0; i < x.length; i++) {
    x[i].innerHTML = d.getDate()+"/"+d.getMonth()+"/"+d.getFullYear();
  }
</script>
  <?php include("includes/footer.php");?>