<?php

include("includes/header.php");
$url="http://localhost/ecommerce/";

$proid= $_GET['pro_id'];

$data=mysqli_query($con,"SELECT * FROM products where product_id=$proid");
$std=mysqli_fetch_array($data);

?><br><br><br><br>
<div class="row">
  <div class="sidebar col-lg-2">
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
  <div class="col-lg-10">
    <div class="container">

      <h2>Individual product details</h2>
          <hr>
          <table class ="table">
            <tr>
              <th>Image :</th>
              <td><img src="<?php echo $std['product_image'] ;?>" width="300" height="300"></td>
          </tr>
               <tr>
            <th class="text-right" width="250">ID :</th>
            <td><?php echo $std['product_id'] ;?></td>
          </tr>
            <tr>
            <th class="text-right" width="250">Product Title :</th>
            <td><?php echo $std['product_title'];?></td>
          </tr>
            <tr>
            <th class="text-right" width="250">Product Price :</th>
            <td><?php echo $std["product_price"];?></td>
          </tr>
            <tr>
            <th class="text-right" width="250">Product Description :</th>
            <td><?php echo $std["product_desc"];?></td>
          </tr>
           <tr>
            <th class="text-right" width="250">Product Keywords :</th>
            <td><?php echo $std["product_keywords"];?></td>
          </tr>
                 
          </table>



    </div>
  </div>
</div>  
<?php include("includes/footer.php");?>