<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>PeachyGlow - Product Listing Page</title>

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

    <a href="cart.php">
          <i class='bx bx-cart' id="cart-icon"></i>
        </a>
        <!-- =====CART JAVASCRIPT===== -->
      <!-- <div class="cart">
        <h2 class="cart-title">Your Cart</h2> -->

        <!--=== CONTENT ===== -->
        <!-- <div class="cart-content"> -->
        

        <!-- </div> -->

        <!--===== TOTAL   ===============-->
        <!-- <div class="total">
            <div class="total-title">Total:</div>
            <div class="total-price-cart">$0</div>
        </div> -->
        <!--========= BUY BUTTON  ==================-->
        <!-- <a href="cart.php"> -->
        <!-- <button type="button" class="btn-buy">Buy Now</button> -->
        <!-- </a> -->
        
        <!-- ========CART CLOSE =============== -->
        <!-- <i class='bx bx-x' id="cart-close"></i> -->
    <!-- </div> -->

      </div>
    </div>


          <!--//////////////////// TOP ITEMS /////////////////////////////-->

    <div class="wrapper-search">
      <!--//////////////////// CATEGORY ITEAMS /////////////////////////////-->
      <div id="buttons">
        <button class="button-value" onclick="filterProduct('all')">All</button>
        <button class="button-value" onclick="filterProduct('2')">
          Body
        </button>
        <button class="button-value" onclick="filterProduct('1')">
          Face
        </button>
        <button class="button-value" onclick="filterProduct('3')">
          Hair
        </button>
        <button class="button-value" onclick="filterProduct('4')">
          Perfume
        </button>
      </div>
      <!--//////////////////// Search button /////////////////////////////-->
      <div id="search-container">
        <input
          type="search"
          id="search-input"
          placeholder="Search product name here.."
        />
        <button id="search">Search</button>
      </div>
      
    </div>
    
    
    <!-- All Products -->
    <section class="section all-products" id="products">
      <div class="top container">
        <h1>Our Products</h1>
        <form>
          <select id="selector">
            <option value="1">Defualt Sorting</option>
            <option value="2">Sort By High Price</option>
            <option value="3">Sort By Low Price</option>
          </select>
          <span><i class="bx bx-chevron-down"></i></span>
        </form>
      </div>
      <div class="product-center container" id="productContainer">

      <?php
        
        $kw = @$_POST['kw'];

        $sql = "SELECT * FROM `product` WHERE `p_name` like '%{$kw}%' OR `p_detail` like '%{$kw}%'";
        $rs = mysqli_query ($conn, $sql);
        while ($data = mysqli_fetch_array($rs)) {

            ?>

        <div class="product-item" data-category="<?=$data['cat_id']?>">
          <div class="overlay">
          <?php
              $p = $data['p_id'].".".$data['p_ext'];
          ?>
            <a href="productDetails.php?pid=<?=$data['p_id'];?>" class="product-thumb">
              <img  src="../imgs_product/<?=$p;?>" alt="" id="product-img"  />
            </a>
            <span class="discount">20%</span>
          </div>
          <div class="product-info">
            <span><?=$data['p_brand']?></span>
            <a id="product-title" href="productDetails.php?pid=<?=$data['p_id'];?>"><?=$data['p_name']?> </a>
            <h4 id="product-price">$<?=$data['p_price']?>.00</h4>
          </div>
          <ul class="icons">
            <li><a href="cart.php?id=<?=$data['p_id'];?>"><i class="bx bx-cart add-cart"></a></i></li>
          </ul>
        </div>


        <?php
          }
        ?> 
       
    </section>
    <section class="pagination">
      <div class="container">
        <a href="../all-products/product.php">
        <div id="buttons">
        <button class="button-value">Back to Top</button>
        </div>
        </a>
        <!-- <span>1</span> <span>2</span> <span>3</span> <span>4</span><span>5</span><span>6</span><span>7</span>
        <span><i class="bx bx-right-arrow-alt"></i></span> -->
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
                        <li><a href="#">Men’s Shopping</a></li>
                        <li><a href="#">Women’s Shopping</a></li>
                        <li><a href="#">Kid's Shopping</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Homepage</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Contact Us</a></li>
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