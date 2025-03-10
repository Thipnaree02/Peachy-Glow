<?php
  error_reporting(E_NOTICE);
	@session_start();
  if (strlen($_SESSION['login'])==0) {
    // echo "<script>alert('Please Login first before you buy the product!');</script>";
    $_SESSION['error'] = 'Please Login first before you buy the product!';
    header('location: login.php');
    
}

// if(isset($_POST['ordersubmit'])) 
// {
	
// if(strlen($_SESSION['login'])==0)
//     {   
// header('location:login.php');
// }
else{

	include("connect/connect.php");
	$sql = "select * from product where p_id='{$_GET['id']}' ";
	$rs = mysqli_query($conn, $sql) ;
	$data = mysqli_fetch_array($rs);
	$id = $_GET['id'] ;
  $p = $data['p_id'].".".$data['p_ext'];
	
	if(isset($_GET['id'])) {
		$_SESSION['buyid'][$id] = $data['p_id'];
		$_SESSION['buyname'][$id] = $data['p_name'];
		$_SESSION['buyprice'][$id] = $data['p_price'];
		$_SESSION['buydetail'][$id] = $data['p_detail'];
		$_SESSION['propiture'][$id] = $p;
		@$_SESSION['buyqty'][$id]++;
	}
}
  // if(isset($_POST['update'])){
	// 	if(!empty($_SESSION['cart'])){
	// 	foreach($_POST['buyqty'] as $key => $val){
	// 		if($val==0){
	// 			unset($_SESSION['cart'][$key]);
	// 		}else{
	// 			$_SESSION['cart'][$key]['buyqty']=$val;

	// 		}
	// 	}
	// 		echo "<script>alert('Your Cart hasbeen Updated');</script>";
	// 	}
	// } 
?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>PeachyGlow - About Page</title>


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

        

    <!-- Cart Items -->
    <div class="container cart">
      <table>
        <tr>
          <th>No.</th>
          <th>Product</th>
          <th>Unit Price</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>


        <?php
              if(!empty($_SESSION['buyid'])) {
                foreach($_SESSION['buyid'] as $pid) {
                  @$i++;
                  $sum[$pid] = $_SESSION['buyprice'][$pid] * $_SESSION['buyqty'][$pid] ;
                  @$total += $sum[$pid] ;
              ?>
        <tr>



          <td><?=$i;?></td>
          <td>
            <div class="cart-info">
            <img src="../imgs_product/<?=$_SESSION['propiture'][$pid];?>" width="120">
              <!-- <img src="./images/product-02.jpg" alt="" /> -->
              <div>
                <br/>
                <a style="color:black!important;" href="productDetails.php?pid=<?=$data['p_id'];?>"><?=$_SESSION['buyname'][$pid];?></a> <br/>
                <a href="clear2.php?id=<?=$pid;?>">remove</a>
              </div>
            </div>
          </td>
          <td>
            <span>$<?=$_SESSION['buyprice'][$pid];?>.00</span>
          </td>
          <!-- <form method="post"> -->
          <td>
            <?=$_SESSION['buyqty'][$pid];?>
            <!-- Line add number readme -->
          </td>
          <td>$<?=number_format($sum[$pid],0);?>.00</td>
        </tr>
        <?php } // end foreach ?>
      </table>
      <div class="total-price">
        <table>
          <tr>
            <td><b>Cart Subtotal:</b></td>
            <td><b>$<?=number_format($total,0);?>.00</b></td>
          </tr>
          <?php 
      } else {
      ?>
        
        <tr>
          <td colspan="3" height="60" align="center">
          
          <h3>Your Cart is currently Empty &#129402;</h3> 
            
          </td>
        </tr>
        <tr>
          <!-- <td colspan="3" height="60" align="center"> -->
          <img src="images/empty-cart.png" width="350" height="307" alt="cart-empty">
          <!-- </td> -->
        </tr>
        
        
      <?php } // end if ?>
        </table>
        <?php
        if(empty($_SESSION['buyid'])) {
        ?>
              <a href="#" class="checkout btn" onClick="alert('There is no product in your cart.');" 
              onmouseover="this.style.opacity='0.8';
                          this.style.boxShadow='rgba(0, 0, 0, 0.10) 0px 54px 55px, rgba(0, 0, 0, 0.10) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px';"
              onmouseout="this.style.opacity='1';
                          this.style.color ='White'; 
                          this.style.boxShadow='rgba(0, 0, 0, 0.15) 0px 5px 10px';">Proceed To Checkout</a>
        <?php } else { ?>
              <a href="proceed-checkout.php" class="checkout btn"
                  onmouseover="this.style.opacity='0.8';
                              this.style.boxShadow='rgba(0, 0, 0, 0.10) 0px 54px 55px, rgba(0, 0, 0, 0.10) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px';"
                  onmouseout="this.style.opacity='1';
                              this.style.color ='White'; 
                              this.style.boxShadow='rgba(0, 0, 0, 0.15) 0px 5px 10px';">Proceed To Checkout</a>
        <?php } ?>
        
        
        
      </div>
      <div class="container">
        <!-- =================Style CSS with this.style================ -->
      <a href="../all-products/product.php" style="background-color: #0292b4!important;" class="checkout btn"
        onmouseover="this.style.opacity='0.8';
                    
                    this.style.boxShadow='rgba(0, 0, 0, 0.10) 0px 54px 55px, rgba(0, 0, 0, 0.10) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px';"
        onmouseout="this.style.opacity='1';
                    this.style.color ='White'; 
                    this.style.boxShadow='rgba(0, 0, 0, 0.15) 0px 5px 10px';">COUNTINUE SHOPPING</a>

      <a href="order-history.php" style="background-color: #1355b5!important; margin:0 15px 0 15px !important;" class="checkout btn"
        onmouseover="this.style.opacity='0.8';
                      this.style.boxShadow='rgba(0, 0, 0, 0.10) 0px 54px 55px, rgba(0, 0, 0, 0.10) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px';"
        onmouseout="this.style.opacity='1';
                    this.style.color ='White'; 
                    this.style.boxShadow='rgba(0, 0, 0, 0.15) 0px 5px 10px';">ORDER HISTORY</a>
      <!-- </form> -->
      <a href="clear.php" style="background-color: #b51313!important;" class="checkout btn"
        onmouseover="this.style.opacity='0.8';
                      this.style.boxShadow='rgba(0, 0, 0, 0.10) 0px 54px 55px, rgba(0, 0, 0, 0.10) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px';"
        onmouseout="this.style.opacity='1';
                    this.style.color ='White'; 
                    this.style.boxShadow='rgba(0, 0, 0, 0.15) 0px 5px 10px';">CLEAR ALL</a>
      </div>
      
    </div>

    <!-- Latest Products -->
    <section class="section featured">
      <div class="top container">
        <h1>Latest Products</h1>
        <a href="../all-products/product.php" class="view-more">View more</a>
      </div>
      <div class="product-center container">
      <?php
        
        $kw = @$_POST['kw'];

        $sql = "SELECT * FROM `product` WHERE `p_name` like '%{$kw}%' OR `p_detail` like '%{$kw}%'";
        $sql = "SELECT * FROM `product` WHERE `p_id` IN (33,37,42,43) ";
        $rs = mysqli_query ($conn, $sql);
        while ($data = mysqli_fetch_array($rs)) {

            ?>
        <div class="product-item">
          <div class="overlay">
          <?php
              $p = $data['p_id'].".".$data['p_ext'];
            ?>
            <a href="" class="product-thumb">
              <img src="../imgs_product/<?=$p;?>" alt="" />
            </a>
            <span class="discount">10%</span>
          </div>
          <div class="product-info">
            <span><?=$data['p_brand']?></span>
            <a href="productDetails.php?pid=<?=$data['p_id'];?>"><?=$data['p_name']?></a>
            <h4>$<?=$data['p_price']?></h4>
          </div>
          <ul class="icons">
              <a href="cart.php?id=<?=$data['p_id'];?>"> 
                <li><i class="bx bx-cart"></i></li>
              </a>
            
          </ul>
        </div>
        <?php
          }
        ?> 
      </div>
    </section>

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
                        <li><a href="index.php">Clear up acne Shopping</a></li>
                        <li><a href="index.php">Hyperpigmentation Shopping</a></li>
                        <li><a href="index.php">Bright Shopping</a></li>
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