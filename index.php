<?php

session_start();
if(!isset($_SESSION['login']))
{
include("includes/header.php");
}
else
{
include("includes/header2.php");
}

$url="http://localhost/ecommerce/";
?>
<div class="row">
  <div class="sidebar col-lg-2" style="margin-top: 6%;">
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
    .sidebar
{
  height: auto
  background-color:#d7e8f8;
  text-align: center;
}
.h3
{

  margin-top: 1.2rem;
  padding:10px 0;
  border-radius: 5%;
}
  #content_area
{
  background: grey;
  
  margin-top:40px;
}
#products_box
{
  
  text-align: center;
}
#single_product
{
  float:left;
  margin-left:30px;
  padding:10px;
  box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
  margin-top:40px;
  width:280px;
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
  left:1190px;
  padding:1px 2px 1px 2px;
}
</style>
  <div class="col-lg-10" style="background-color: #f7f7f7;">

  <div id="content_area">
      <div id="products_box">
        <?php

        function get_ip(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


        if(isset($_GET['add_cart']))
        {
         $product_id=$_GET['add_cart'];
          $ip=get_ip();
          $fetch_pro=mysqli_query($con,"select * from products where product_id='$product_id'");
            $fetch_pro=mysqli_fetch_array($fetch_pro);

            $pro_title=$fetch_pro['product_title'];
            $user=$userdata['userid'];

          $insert_cart="INSERT INTO cart VALUES (NULL,'$user','$product_id','$pro_title')";
          $run_insert_pro = mysqli_query($con,$insert_cart);

          $insert_cart2="INSERT INTO cart2 VALUES (NULL,'$user','$product_id','$pro_title')";
          $run_insert2_pro = mysqli_query($con,$insert_cart2);


           if($run_insert_pro){
            echo "";
          }
          else
          {
            echo "";
          }
        }
        ?>

        <?php
            if(!isset($_GET['cat'])){
              if(!isset($_GET['brand'])){
            $get_pro="select * from products order by RAND() LIMIT 0,6";

            $run_pro=mysqli_query($con,$get_pro);

            while($row_pro=mysqli_fetch_array($run_pro))
            {
              $pro_id=$row_pro['product_id'];
              $pro_cat=$row_pro['product_cat'];
              $pro_brand=$row_pro['product_brand'];
              $pro_title=$row_pro['product_title'];
              $pro_price=$row_pro['product_price'];
              $pro_image=$row_pro['product_image'];

       if(!isset($_SESSION['login'])){

        $_SESSION['pleaselogin']=true;
              echo "
                <div id='single_product'>
                
                <img src='$pro_image' width='180' height='180'>
                <h4>$pro_title</h4>
                <p><b>Price : $pro_price</b></p>
                <a class='btn btn-outline-info' href='details.php?pro_id=$pro_id'>Deatils </a>
                <a class='btn btn-primary' href='login&registration/userlogin.php' style='float:right'>
                Add to cart</a>
                </div>

              ";
              
            
          }
          else
          {
            echo "
                <div id='single_product'>
                
                <img src='$pro_image' width='180' height='180'>
                <h4>$pro_title</h4>
                <p><b>Price : $pro_price</b></p>
                <a class='btn btn-outline-info' href='details.php?pro_id=$pro_id'>Deatils </a>
                <a class='btn btn-primary' href='index.php?add_cart=$pro_id&userid=$userid' style='float:right'>
                Add to cart</a>
                </div>

              ";
          }
        }
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
                echo "<h2 style='padding:20px;margin-top:150px'>No products available in this category</h2>";
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

               if(!isset($_SESSION['login'])){
                $_SESSION['pleaselogin']=true;

              echo "
              <div id='single_product'>
                
             
                <img src='$pro_image' width='180' height='180'>
                <h4>$pro_title</h4>
                <p><b>Price : $pro_price</b></p>
            <a class='btn btn-outline-info' href='details.php?pro_id=$pro_id'>Deatils </a>
                <a class='btn btn-primary' href='login&registration/userlogin.php' style='float:right'>
                Add to cart</a>
                </div>";
              }
              else
              {
                  echo "
              <div id='single_product'>
                
             
                <img src='$pro_image' width='180' height='180'>
                <h4>$pro_title</h4>
                <p><b>Price : $pro_price</b></p>
            <a class='btn btn-outline-info' href='details.php?pro_id=$pro_id'>Deatils </a>
                <a class='btn btn-primary' href='index.php?add_cart=$pro_id&userid=$userid' style='float:right'>
                Add to cart</a>
                </div>";

              }
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
                echo "<h2 style='padding:20px; margin-top:150px'>No products available in this brands</h2>";
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

              if(!isset($_SESSION['login'])){


               $_SESSION['pleaselogin']=true;

              echo "
              <div id='single_product'>
                
      
                <img src='$pro_image' width='180' height='180'>
                <h4>$pro_title</h4>
                <p><b>Price : $pro_price</b></p>
                <a class='btn btn-outline-info' href='details.php?pro_id=$pro_id'>Deatils </a>
                <a class='btn btn-primary' href='login&registration/userlogin.php' style='float:right'>
                Add to cart</a>
                </div>";
              }
              else
              {
                echo "
              <div id='single_product'>
                
      
                <img src='$pro_image' width='180' height='180'>
                <h4>$pro_title</h4>
                <p><b>Price : $pro_price</b></p>
                <a class='btn btn-outline-info' href='details.php?pro_id=$pro_id'>Deatils </a>
                <a class='btn btn-primary' href='index.php?add_cart=$pro_id&userid=$userid' style='float:right'>
                Add to cart</a>
                </div>";
              }
              }
            }

          
            }
        ?>


      </div>
    </div>

  </div>
</div>
<?php include("includes/footer.php");?>