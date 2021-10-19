<?php

include("includes/header.php");

?>
<div class="row">
	<div class="sidebar col-lg-2"  style="margin-top: 5.5%;margin-left: 2%">
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
</style>
	<div class="col-lg-9" style="background-color: #e1e2e3;">

  <div id="content_area">
      <div id="products_box">
        <?php  
              if(isset($_GET['search']))
              {
                 $search_query=$_GET['user_query'];
              $sql="select * from products where product_title like '%$search_query%'";
           $run_query_by_pro_id=mysqli_query($con,$sql);
           while($row_pro=mysqli_fetch_array($run_query_by_pro_id))
           {
               $pro_id=$row_pro['product_id'];
              $pro_cat=$row_pro['product_cat'];
              $pro_brand=$row_pro['product_brand'];
              $pro_title=$row_pro['product_title'];
              $pro_price=$row_pro['product_price'];
              $pro_image=$row_pro['product_image'];


              echo "
                <div id='single_product'>
                
                <h3>$pro_title</h3>
                <img src='admin_area/product_images/$pro_image' width='180' height='180'>
                <p><b>Price : $pro_price</b></p>
                <a href='details.php?pro_id=$pro_id'>Deatils</a>
                <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to cart</button></a>
                </div>

              ";
           }
              } 
        ?>

            <?php

          if(isset($_GET['cat']))
            {
              $cat_id=$_GET['cat'];

              $get_cat_pro="select * from products where product_cat='$cat_id'";
              $run_cat_pro=mysqli_query($con,$get_cat_pro);
              $count_cats=mysqli_num_rows($run_cat_pro);

              if($count_cats==0)
              {
                echo "<h2 style='padding:20px;'>No products available in this category</h2>";
              }
              else
              {
                while($row_cat_pro=mysqli_fetch_array($run_cat_pro))
            {
              $pro_id=$row_cat_pro['product_id'];
              $pro_cat=$row_cat_pro['product_cat'];
              $pro_brand=$row_cat_pro['product_brand'];
              $pro_title=$row_cat_pro['product_title'];
              $pro_price=$row_cat_pro['product_price'];
              $pro_image=$row_cat_pro['product_image'];

              echo "
              <div id='single_product'>
                
                <h3>$pro_title</h3>
                <img src='admin_area/product_images/$pro_image' width='180' height='180'>
                <p><b>Price : $pro_price</b></p>
                <a href='details.php?pro_id=$pro_id'>Deatils</a>
                <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to cart</button></a>
                </div>";
              }
            }

          
            }
        ?>


        <?php

          if(isset($_GET['brand']))
            {
              $brand_id=$_GET['brand'];

              $get_brand_pro="select * from products where product_brand='$brand_id'";
              $run_brand_pro=mysqli_query($con,$get_brand_pro);
              $count_brands=mysqli_num_rows($run_brand_pro);

              if($count_brands==0)
              {
                echo "<h2 style='padding:20px;'>No products available in this brands</h2>";
              }
              else
              {
                while($row_brand_pro=mysqli_fetch_array($run_brand_pro))
            {
              $pro_id=$row_brand_pro['product_id'];
              $pro_cat=$row_brand_pro['product_cat'];
              $pro_brand=$row_brand_pro['product_brand'];
              $pro_title=$row_brand_pro['product_title'];
              $pro_price=$row_brand_pro['product_price'];
              $pro_image=$row_brand_pro['product_image'];

              echo "
              <div id='single_product'>
                
                <h3>$pro_title</h3>
                <img src='admin_area/product_images/$pro_image' width='180' height='180'>
                <p><b>Price : $pro_price</b></p>
                <a href='details.php?pro_id=$pro_id'>Deatils</a>
                <a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to cart</button></a>
                </div>";
              }
            }

          
            }
        ?>


      </div>
    </div>

	</div>
</div>
<?php include("includes/footer.php");?>