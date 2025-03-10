<?php
    session_start();
    
    if (strlen($_SESSION['login'])==0) {
      // echo "<script>alert('Please Login first before you buy the product!');</script>";
      $_SESSION['error'] = 'Please Login first before you buy the product!';
      header('location: login.php');
      
  }
  else{

    include("connect/connect.php");
    
    
    // if(isset($_GET['id'])) {
    //   $_SESSION['buyid'][$id] = $data['p_id'];
    //   $_SESSION['buyname'][$id] = $data['p_name'];
    //   $_SESSION['buyprice'][$id] = $data['p_price'];
    //   $_SESSION['buydetail'][$id] = $data['p_detail'];
    //   $_SESSION['propiture'][$id] = $p;
    //   @$_SESSION['buyqty'][$id]++;
    // }
  

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Box icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"
    />
    <!-- Custom StyleSheet -->
    <link rel="stylesheet" href="./css/styles.css" />
    <title>Your Order History</title>
  </head>
  <body>
    <!-- Navigation -->
    <div class="top-nav">
      <div class="container d-flex">
        <span>Free Shipping On All Thailand Orders $50+</span>
        
      </div>
    </div>
    <div class="navigation">
      <div class="nav-center container d-flex">
        <a href="../glowing-master/index.php" class="logo"><h1>TheMOON</h1></a>
  
          <ul class="nav-list d-flex">
            <li class="nav-item">
              <a href="../glowing-master/index.php" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="../glowing-master/index.php" class="nav-link">Collection</a>
            </li>
            <li class="nav-item">
              <a href="product.php" class="nav-link">Shop</a>
            </li>
            <li class="nav-item">
              <a href="../glowing-master/index.php" class="nav-link">Promotion</a>
            </li>
            <li class="nav-item">
              <a href="../glowing-master/index.php" class="nav-link">Blog</a>
            </li>
            <li class="nav-item">
              <a href="#contact" class="nav-link">Contact</a>
            </li>
          </ul>
            <a href="cart.php" class="icon">
              <i class="bx bx-cart"></i>
              <span class="d-flex"></span>
            </a>
          </li>
        </ul>

        
      </div>
    </div>

    <!-- Cart Items -->
    <div class="container cart">
      <table>
        <tr>
          <th>No.</th>
          <th>Order ID</th>
          <th>Order Date</th>
          <th>Status</th>
          <th>Order Details</th> 
        </tr>
        <?php
            $sql = "SELECT * FROM `orders`
            INNER JOIN customer ON orders.member_id = customer.c_id
            WHERE customer.c_id = '".$_SESSION['user_login']."'";
            $i = 0;
            $result = mysqli_query($conn,$sql);
            while ($row = mysqli_fetch_assoc($result)){
              $i++;
          
        ?>
        <tr>
          <td><?=$i;?></td>
          <td><?=$row['oid'];?></td>
          <td><?=$row['odate'];?></td>
          <td><p><?=$row['status'];?></p></td>
          <td>
            <a class="checkout btn" style="background-color: rgb(49, 143, 102);"
                href="order-history-details.php?det=<?=$row['oid'];?>">See more</a>
          </td>
        </tr>
        <?php
            }
        ?> 
      </table>
      <div class="total-price">
        
        <!-- <a href="#" class="checkout btn">Proceed To Checkout</a> -->
      </div>
      <div class="container">
        <a href="../glowing-master/index.php" style="background-color: #0292b4!important;" class="checkout btn"
              onmouseover="this.style.opacity='0.8';
                          this.style.boxShadow='rgba(0, 0, 0, 0.10) 0px 54px 55px, rgba(0, 0, 0, 0.10) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px';"
              onmouseout="this.style.opacity='1';
                          this.style.color ='White'; 
                          this.style.boxShadow='rgba(0, 0, 0, 0.15) 0px 5px 10px';">BACK TO HOMEPAGE</a>
  
        <!-- <a href="update-cart.php" style="background-color: #1355b5!important; margin:0 15px 0 15px !important;" class="checkout btn"> -->
            <!-- <button type="submit" name="update">UPDATE CART</button> -->
            <!-- <input type="submit" name="update" value="Update shopping cart"> -->
        <!-- </a> -->
        <!-- </form> -->
       
        </div>
    </div>

    <!-- Latest Products -->
    
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

    <!-- Custom Script -->
    <script src="./js/index.js"></script>
  </body>
</html>
<?php
}
?>