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

  <div id="content_area">

    <div id="shopping_cart" align="right" style="padding:15px;">
      <?php 
           if(isset($_SESSION['customer_email']))
           {
            echo "<b>Your mail :</b>".$_SESSION['customer_email'];
           }
           else
           {
            echo "";
           }
      ?>

      <b style="color:navy">Your cart - </b> Total Items : <?php echo $count_items; ?> Total price :        <?php

        $total=0;
        $user=$userdata['userid'];
                 $run_cart=mysqli_query($con,"select * from cart where userid='$user'");
                 while($fetch_cart=mysqli_fetch_array($run_cart))
                 {
                  $product_id=$fetch_cart['product_id'];
                  $sql1="select * from products where product_id ='$product_id'";
                  $result_product=mysqli_query($con,$sql1);
                  while($fetch_product=mysqli_fetch_array($result_product))
                  {
                    $product_price=array($fetch_product['product_price']);
                    $product_title=$fetch_product['product_title'];
                    $product_image=$fetch_product['product_image'];

                  //  $sing_price=$fetch_product['product_price'];

                    $values=array_sum($product_price);
                    $total+=$values;
                  }
                 
                 } echo "$".$total;
   
        ?>
      </div>
    </div>
      <div id="products_box">
        <table class="table">
          <thead>
            <th>Product Name</th>
            <th>Product price</th>
            <th>Product image</th>
            <th>Action</th>
          </thead>
          <tbody>
              <?php 

               $sql="select cart.*,products.product_price,products.product_image
                from cart,products 
                where products.product_id=cart.product_id AND userid='$user'";
               $result=mysqli_query($con,$sql);
               while($row=mysqli_fetch_array($result)){
                ?><tr>
              <td><?php echo $row['product_title']; ?></td>
              <td><?php echo $row['product_price']; ?></td>
              <td><img src="<?php echo $row['product_image']; ?>" width="150" height="130"></td>


                <td class="text-center">
                  <a class="btn btn-info mb-2" href="delete_from_cart.php?userid=<?php echo $userdata['userid'];?>&cart_id=<?php echo $row['cart_id'];?>" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i>
                  Delete</a>
                
                </td>
            </tr>

            <?php } ?>
          
          </tbody>
        </table>

       <a class="btn btn-success mb-2" href="index.php?userid=<?php echo $userdata['userid'];?>">
                  Update Cart</a>

                  <a class="btn btn-warning mb-2" href="checkout.php?userid=<?php echo $userdata['userid'];?>">
                  Checkout</a>

  
    

  </div>
  <br><br>
</div>
<?php include("includes/footer.php");?>