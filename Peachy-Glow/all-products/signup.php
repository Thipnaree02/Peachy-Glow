<?php 

    session_start();
    require_once 'connect/db.php';

?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>PeachyGlow - Login</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <img src="assets/images/logo.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.php" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#men">Clear up acne</a></li>
                            <li class="scroll-to-section"><a href="#women">Hyperpigmentation</a></li>
                            <li class="scroll-to-section"><a href="#kids">Bright</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Pages</a>
                                <ul>
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="products.php">Products</a></li>
                                    <li><a href="cart.php">Products Cart</a></li>
                                    <li><a href="checkout.php">Checkout Products</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                </ul>
                            </li>
                            <li class="scroll-to-section"><a href="index.php">Explore</a></li>
                            <form class="form-inline my-2 my-lg-0">
                            <li class="submenu">
                                <a href="javascript:;"><i class="fa fa-user"></i></a>
                                <ul>
                                    <li><a href="login.php"></span>Login</a></li>
                                    <li><a href="login.php"></span>Logout</a></li>
                                </ul>
                  </form>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Apply for membership PeachyGlow!</h2>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- Login -->
    <div class="container">
      <div class="login-form">
        <form action="signup_db.php" method="post">

          <h1>Sign Up</h1>
          <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
            <?php } ?>
            <?php if(isset($_SESSION['warning'])) { ?>
                <div class="alert alert-warning" role="alert">
                    <?php 
                        echo $_SESSION['warning'];
                        unset($_SESSION['warning']);
                    ?>
                </div>
            <?php } ?>
          <p>
            Please fill in this form to create an account. or
            <a href="login.php">Login</a>
          </p>

          <label for="fname">Fullname</label>
          <input type="text" placeholder="Enter your fullname..." name="c_name" required />

          <label for="gender">Gender</label>
          <div class="dateob" for="gender">
            <input type="radio" name="gender" value="Male" id=""> Male
            <input type="radio" name="gender" value="Female"  id=""> Female
          </div>
          

          <label for="date">Date of Birth</label>
          <input type="date" name="bday" required />

          <label for="address">Address</label>
          <textarea type="text" placeholder="Enter your real address. It's easy when shipping..." name="address" required ></textarea>

          <label for="phone">Phone Number</label>
          <input type="text" placeholder="Enter your phone number..." name="phone" required />

          <label for="email">Email</label>
          <input type="text" placeholder="Enter your email..." name="email" required />

          <label for="psw">Password</label>
          <input
            type="password"
            placeholder="Enter your password..."
            name="password"
            id="passwordField"
            required
          />

          <label for="psw-repeat">Repeat Password</label>
          <input
            type="password"
            placeholder="Confirm your password..."
            name="c_password"
            id="repeatPasswordField"
            required
          />
          
          <div id="passwordMatchMessage" style="color: green; display: none; margin-bottom: 15px;">Passwords match!</div>
          <div id="passwordWarning" style="color: red; display: none; margin-bottom: 15px;">Passwords do not match!</div>
          <label>
            <input
              type="checkbox"
              name="showPassword"
              id="showPasswordCheckbox"
              style="margin-bottom: 15px"
            />
            Show Password
          </label>

          <p>
            By creating an account you agree to our
            <a href="#">Terms & Privacy</a>.
          </p>

          <div class="buttons">
            <a href="../glowing-master/index.php">
              <button type="button" class="cancelbtn">Cancel</button>
            </a>
            
            <button type="submit" name="signup" class="signupbtn">Sign Up</button>
          </div>
        </form>
      </div>
    </div>


        <!-- ***** Footer Start ***** -->
        <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="first-item">
                        <div class="logo">
                            <img src="assets/images/white-logo.png" alt="hexashop ecommerce templatemo">
                        </div>
                        <ul>
                            <li><a href="#">Faculty of Accounting and Management, Mahasarakham University, Khamriang Subdistrict, Kantharawichai District, Maha Sarakham 44150, Thailand</a></li>
                            <li><a href="#">65010914602@msu.ac.th<br>
                                            65010914606@msu.ac.th<br>
                                            65010914608@msu.ac.th<br>
                                            65010914626@msu.ac.th</a></li>
                            <li><a href="#">043-754-321</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <h4>Shopping &amp; Categories</h4>
                    <ul>
                        <li><a href="#men">Clear up acne Shopping</a></li>
                        <li><a href="#women">Hyperpigmentation Shopping</a></li>
                        <li><a href="#kids">Bright Shopping</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Help &amp; Information</h4>
                    <ul>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Shipping</a></li>
                        <li><a href="#">Tracking ID</a></li>
                    </ul>
                </div>
                <div class="col-lg-12">
                    <div class="under-footer">
                        <p>Copyright © 2022 HexaShop Co., Ltd. All Rights Reserved. 
                        
                        <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a></p>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>
</html>