<?php

include("includes/header.php");

?>
<div class="row">
  <div class="sidebar col-lg-2"  style="margin-top: 4%;">
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
  	hi
  </div>
</div>
<?php include("includes/footer.php");?>