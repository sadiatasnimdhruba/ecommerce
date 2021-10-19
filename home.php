<?php

session_start();

$conn=mysqli_connect('localhost','root','dhruba0004','ecommerce');
$sql="SELECT * fROM categories";
$result=mysqli_query($conn,$sql);


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>An ecommerce website</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
     <link href="styles/style.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>


svg.intro {
  
  max-width: 1200px;
  position: absolute;
  top: 43%;
  left: 43%;
  transform: translate(-50%, -50%);
 
}
svg.intro .text {
  display: none;
}
svg.intro.go .text {
  font-family: Arial, sans-serif;
  font-size: 10px;
  font-weight: bold;
  display: block;
}

svg.intro.go .text-stroke {
  fill: none;
  stroke: #098699;
  stroke-width: 2.8px;
  stroke-dashoffset: -900;
  stroke-dasharray: 900;
  stroke-linecap: butt;
  stroke-linejoin: round;
  -webkit-animation: dash 2.5s ease-in-out forwards;
          animation: dash 2.5s ease-in-out forwards;
}
svg.intro.go .text-stroke:nth-child(2) {
  -webkit-animation-delay: 0.3s;
          animation-delay: 0.3s;
}
svg.intro.go .text-stroke:nth-child(3) {
  -webkit-animation-delay: 0.9s;
          animation-delay: 0.9s;
}
svg.intro.go .text-stroke-2 {
  stroke: #080047;
  -webkit-animation-delay: 1.2s;
          animation-delay: 1.2s;
}
svg.intro.go .text-stroke:nth-child(4) {
  -webkit-animation-delay: 1.3s;
          animation-delay: 1.3s;
}
svg.intro.go .text-stroke:nth-child(5) {
  -webkit-animation-delay: 1.8s;
          animation-delay: 1.8s;
}

svg.intro.go .text-stroke:nth-child(6) {
  -webkit-animation-delay: 2.2s;
          animation-delay: 2.2s;
}

svg.intro.go .text-stroke:nth-child(7) {
  -webkit-animation-delay: 2.7s;
          animation-delay: 2.7s;
}
svg.intro.go .text-stroke:nth-child(8) {
  -webkit-animation-delay: 3.2s;
          animation-delay: 3.2s;
}

@-webkit-keyframes dash {
  100% {
    stroke-dashoffset: 0;
  }
}

@keyframes dash {
  100% {
    stroke-dashoffset: 0;
  }
}
.reload {
  position: absolute;
  bottom: 15px;
  right: 15px;
  background: #fff;
  border: none;
  border-radius: 20px;
  outline: none !important;
  font-size: 11px;
  line-height: 1.5;
  padding: 8px 12px;
  text-transform: uppercase;
  z-index: 10;
  cursor: pointer;
  box-shadow: 0 6px 7px #350e4c;
  transition: all 0.1s cubic-bezier(0.67, 0.13, 0.1, 0.81);
}
.reload:hover {
  box-shadow: 0 4px 4px #350e4c;
  transform: translateY(1px);
}
.reload:active {
  box-shadow: 0 1px 2px #244B94;
  transform: translateY(2px);
}
.reload svg {
  vertical-align: middle;
  position: relative;
  top: -2px;
}
header.masthead {
    padding-top: 45rem;
   
   background:  url(images/header-background.png);
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: scroll;
    background-size: cover;
    
}
footer{
  background-color: #672b2b;
  text-align: center;
  border-top: 0.2rem solid#000;
}
.service-item {
    text-align: center;
    background-color: #f1f1ff;
    padding: 30px 25px;
    margin-bottom: 30px;
    -webkit-box-shadow: 0px 0px 10px 2px rgb(0 0 0 / 10%);
    box-shadow: 0px 0px 10px 2px rgb(0 0 0 / 10%);
    -webkit-transition: .25s ease-out;
    transition: .25s ease-out;
    }
.alert
{
  margin:20px;
  width:70%;
}

.form-control
{
 background-color: #f4f4f4;
     border: 1.5px solid #474a4b;


  }
  hr
  {
    color: #0d0f1a;
    padding: 1.2px;
  }

  label{
      background-color: #e5e5e5;
    color: #1c0000;
    border-radius: 5px;
    font-weight: bold;
    padding: 5px;
    margin: 10px 0;
}

.social-icons .social-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 3.00rem;
    width: 3.00rem;
    background-color: #022c65;
    color: #fff;
    border-radius: 100%;
    font-size: 1.5rem;
    margin-right: 1.5rem;
    text-decoration: none;
}
.contact-box
{
    box-shadow: 0px 0px 10px 2px rgb(0 0 0 / 30%);
    border-radius: 3px;
    padding:20px;
    margin: 4%;
    background-color: var(--boxbackground-color);
}

.sub1
{
    color:#022c65;
    font-size:20px;
}
  </style>
  <body>

              <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #2d2d2d!important">
      <div class="container">
        <div class="col-lg-1">
       <img class="navbar-brand" src="images/l1.png" width="100" height="70">
    <br>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
    <div class="collapse navbar-collapse col-lg-5" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-end">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="#about">About Us</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php">Our categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#partner">Our partners</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact</a>
        </li>

        
        
      </ul>
    


    </div>
    <div class="col-lg-4">
       <form class="form-group" action="results.php" enctype="multipart/form-data">
        <div class="row">
          <div class="col-lg-6">
      <input class="form-control" type="text" placeholder="Search" name="user_query" aria-label="Search"></div>
      <div class="col-lg-6">
      <input class="btn btn-outline-success" name="search" type="submit" value="Search">
      </div></div>
    </form>
    </div>
    <div class="col-lg-2">
      <a class="btn btn-outline-info" href="login&registration/userlogin.php">Login</a>
      <a class="btn btn-outline-info" href="login&registration/registration.php">Register</a>

    </div>
  
</div>

</nav>

       <header class="masthead">
        <div class="row">
              <div class="col-md-9">
                <?php if(isset($_SESSION['send'])){?>
          <div class="alert alert-success" id="contact">
            <strong>Your Message sent successfully</strong>.
          </div>
        <?php }?>
              </div>
            </div>

                     <svg class="intro" viewbox="0 0 200 86">
  <text text-anchor="start" x="10" y="30" class="text text-stroke" clip-path="url(#text1)">FOOD DELIVERY SERVICE</text>
  <text text-anchor="start" x="10" y="45" class="text text-stroke" style="font-size: 7.5px;" clip-path="url(#text2)">WELCOME TO OUR FOOD NETWORK</text>
  <text text-anchor="start" x="10" y="65" class="text text-stroke" style="font-size: 4px;" clip-path="url(#text3)">This is a ecommerce website. We provide products to your home in a shortest</text>
  <text text-anchor="start" x="10" y="70" class="text text-stroke" style="font-size: 4px;" clip-path="url(#text4)"> possible time and cheaper rate. Our goal is to deliver
 the best product to our customer.
  </text>
  
  
  <text text-anchor="start" x="10" y="30" class="text text-stroke text-stroke-2" clip-path="url(#text1)">ECOMMERCE WEBSITE</text>
  <text text-anchor="start" x="10" y="45" class="text text-stroke text-stroke-2" style="font-size: 7.5px;" clip-path="url(#text2)">WELCOME TO OUR NETWORK</text>
  <text text-anchor="start" x="10" y="65" class="text text-stroke text-stroke-2" style="font-size: 4px;stroke: #000;" clip-path="url(#text3)">This is a ecommerce website. We provide products to your home in a shortest</text>
 <text text-anchor="start" x="10" y="70" class="text text-stroke text-stroke-2" style="font-size: 4px;stroke: #000;" clip-path="url(#text4)"> ppossible time and cheaper rate. Our goal is to deliver
 the best product to our customer.</text>

 
  <defs>
    <clipPath id="text1">
      <text text-anchor="start" x="10" y="30" class="text">ECOMMERCE WEBSITE</text>
    </clipPath>
    <clipPath id="text2">
      <text text-anchor="start" x="10" y="45" class="text" style="font-size: 7.5px;">WELCOME TO OUR NETWORK</text>
    </clipPath>
    <clipPath id="text3">
             <text text-anchor="start" x="10" y="65" class="text" style="font-size: 4px;">This is a ecommerce website. We provide products to your home in a shortest</text>
    </clipPath>
    <clipPath id="text4">
             <text text-anchor="start" x="10" y="70" class="text" style="font-size: 4px;"> possible time and cheaper rate. Our goal is to deliver
 the best product to our customer.</text>
    </clipPath>
 

  </defs>
</svg>

<div>
  <button class="reload">
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="16px" height="16px" viewBox="0 0 92.33 92.33" style="enable-background:new 0 0 92.33 92.33;" xml:space="preserve">
<g>
  <path d="M70.598,16.753c-1.722-1.24-4.113-0.852-5.349,0.866c-1.242,1.716-0.853,4.113,0.865,5.35   c13.613,9.818,18.021,27.857,10.482,42.89c-4.082,8.138-11.088,14.202-19.726,17.066c-8.636,2.871-17.877,2.2-26.013-1.879   c-8.134-4.083-14.197-11.088-17.066-19.722c-2.866-8.642-2.197-17.877,1.886-26.014c4.958-9.89,14.458-16.779,25.413-18.429   c0.074-0.008,0.137-0.036,0.211-0.053l0.157,7.571c0.021,0.839,0.542,1.585,1.321,1.889c0.782,0.305,1.672,0.11,2.25-0.496   l10.904-11.379c0.794-0.828,0.764-2.142-0.062-2.933L44.492,0.577c-0.606-0.582-1.499-0.739-2.267-0.399   c-0.251,0.108-0.476,0.269-0.662,0.462c-0.372,0.389-0.585,0.919-0.579,1.479l0.151,7.212c-0.385-0.063-0.78-0.087-1.188-0.027   c-13.418,2.021-25.052,10.46-31.125,22.571C-1.499,52.451,6.85,77.584,27.424,87.901c5.989,3.005,12.362,4.429,18.646,4.429   c15.306,0,30.065-8.439,37.382-23.028C92.688,50.884,87.284,28.782,70.598,16.753z" fill="#404853"/></svg>
</button>
</div>

<div>

</div>
            
        </header>

            <?php if(isset($_SESSION['success'])){?>
          <div class="alert alert-success">
            <strong>Successfully ordered!</strong> Check a confirmation message to your email.
            
          </div>
        <?php }?>
           

          <?php if(isset($_SESSION['error'])){?>
          <div class="alert alert-warning">
            <strong>Failed order!</strong> Something wrong.
          </div>
        <?php }?>

  <div class="container ri" id="about">
    <div class="mb-5" id="about" style="margin-top:90px;">
      <h2 class="text-center"> About Us </h2>
          <p class="under text-center">------------------<i class="fa fa-star"></i>------------------</p>
          <br><br>
          <div class="row">
            <div class="col-md-4">
              <div class="service-item">
                <img src="images/best.jpg" width="230px" height="230px" style="border-radius: 50%;">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="service-item">
                 <img src="images/price.jpg" width="230px" height="230px" style="border-radius: 50%;">
                 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="service-item">
                <img src="images/fastdelivery.png" width="230px" height="230px">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type</p>
              </div>
            </div>

          </div>
          <div id="cat">
          <h2 class="text-center"> Our Product Categories </h2>
          <p class="under text-center">---------------------<i class="fa fa-star"></i>---------------------</p>
          <br><br>
          <div class="row">
            <?php 
                 while($row=mysqli_fetch_assoc($result))
                 {?>
          <div class="col-md-4">
            <div class="service-item">
         
                   <a href="food_item.php?id=<?php echo $row['id']; ?>"><img src="<?php echo $row['cat_image']; ?>" class="img-responsive" width="250px" height="250px">
             
          
            <h3><?php echo $row['cat_title']; ?></h3></a>
           
              </div>
          </div>
        <?php  }
        ?>
        <br>
    </div>

</div>
<br>
<div class="container" id="partner">
    <hr class="w-50 mx-auto">
    <h2 class="text-center mb-3">Our Partners</h2>
    <p class="under text-center">---------------------<i class="fa fa-star"></i>---------------------</p><br>
    <div class="row">
      <div class="col col-sm-6 col-lg-6">
        <img src="images/paypal.jpg" alt="">
      </div>
      <div class="col col-sm-6 col-lg-6">
        <img src="images/rocket.jpg" alt="">
      </div>
      <div class="col col-sm-6 col-lg-6">
        <img src="images/nogod.jpg" height="250" alt="">
      </div>
      <div class="col col-sm-6 col-lg-6">
        <img src="images/bkash.jpg" height="250" alt="">
      </div>
     
    </div>
  </div><br><br>
      <div id="contact">
        <h2 class="text-center">Contact Info</h2>
         <p class="under text-center">-------------<i class="fa fa-star"></i>-------------</p>
        <h3>Let's Get In Touch!</h3>
        <br>
        <br>
                <div class="col-lg-7  col-md-12" style="margin-left:25%;">
            <!--Google map-->
<div id="map-container" class="z-depth-1-half map-container mb-5" style="height: 400px"></div>
</div>
</div><br><br>



          <div class="row">
            <div class="col-lg-3 contact-box">

             <span class="sub1" style="margin-left: 40%;"><i class="fa fa-phone-square fa-4x"></i><br>
                <span style="margin-left: 22%;">Mobile number</span></span><br><br>
            <span style="margin-left:35px; color:var(--secondary-color);">+8801775375309</span><br>
            <span style="margin-left:35px; color:var(--secondary-color);">+8801303051468</span>
        </div>

            <div class="col-lg-3 contact-box">
              <span class="sub1" style="margin-left: 40%;"><i class="fa fa-envelope fa-4x"></i><br> <span style="margin-left: 43%;">Email</span></span><br><br>
               <span style="margin-left:30px; color:var(--secondary-color);">sadiadhruba@gmail.com</span><br>
            <span style="margin-left:30px; color:var(--secondary-color);">sadiatasnim@iut-dhaka.edu</span>
            </div>
            <div class="col-lg-3 contact-box">
              <span class="sub1" style="margin-left: 40%;" ><i class="fa fa-home fa-4x"></i>  
              <span style="margin-left: 35%;">Address</span></span><br><br>
               <span style="margin-left:35px; color:var(--secondary-color);">  Gazipur,Bangladesh</span><br>
            <small style="margin-left:35px; color:var(--secondary-color);">Islamic University of technology</small>
            </div>
        </div>
            <br><br>
        


            <form  action="contact.php" method="POST">
                <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                    <label>Full Name</label>
                    <input required type="text" name="fullname" class="form-control" placeholder="Enter your fullname">
                </div>
                    <div class="form-group">
                    <label>Mail</label>
                    <input required type="mail" name="mail" class="form-control" placeholder="Enter your email address">
                </div>
                <div class="form-group">
                    <label>Phone number</label>
                    <input required type="text" name="phone" class="form-control" placeholder="Enter your phone number">
                </div>
            </div>

                <div class="col-md-7">
                 <div class="form-group">
                    <label>Message</label>
                    <textarea required class="form-control" name="text" rows="8" cols="30" placeholder="Write a message"></textarea>
                </div><br>
                <div class="pull-right">
                    <button class="btn btn-success p-2" type="submit">Send</button>
                </div>
            </div>
        
            
            </div>
            </form><br><br>
             <div class="social-icons">
                        <a class="social-icon" href="https://www.linkedin.com/in/sadia-tasnim-dhruba-2a70a31a8"><i class="fa fa-linkedin"></i></a>
                        <a class="social-icon" href="https://github.com/sadiatasnimdhruba"><i class="fa fa-github"></i></a>
                        <a class="social-icon" href="https://instagram.com/sadia_tasnim_dhruba?igshid=16bu8laa3n5fr"><i class="fa fa-instagram "></i></a>
                        <a class="social-icon" href="https://www.facebook.com/sadiatasnim.dhruba"><i class="fa fa-facebook-f"></i></a>
                    </div>

            <br><br><br><br><br><br>
    

    </div>
</div>



  
</div>
</div>

</div>
<script src="https://maps.google.com/maps/api/js"></script>
<script>

   function regular_map() {
    var var_location = new google.maps.LatLng(24.757769, 90.399626);

    var var_mapoptions = {
      center: var_location,
      zoom: 15
    };

    var var_map = new google.maps.Map(document.getElementById("map-container"),
      var_mapoptions);

    var var_marker = new google.maps.Marker({
      position: var_location,
      map: var_map,
      title:"Boundary Road"
    });
  }


  google.maps.event.addDomListener(window, 'load', regular_map);



  $(function() {
  $('.intro').addClass('go');

  $('.reload').click(function() {
    $('.intro').removeClass('go').delay(200).queue(function(next) {
      $('.intro').addClass('go');
      next();
    });

  });
})
</script>

<?php include('includes/footer.php'); ?>
<?php unset($_SESSION['success']); ?>
<?php unset($_SESSION['error']); ?>
<?php unset($_SESSION['send']); ?>