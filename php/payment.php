<!--A Design by W3layouts
   Author: W3layout
   Author URL: http://w3layouts.com
   License: Creative Commons Attribution 3.0 Unported
   License URL: http://creativecommons.org/licenses/by/3.0/
   -->
   <?php
      session_start();
      if(isset($_POST["Nombre"])){
         $_SESSION["nombres"]= $_POST["Nombre"];
         $_SESSION["direccion"]= $_POST["Direccion"];
         $_SESSION["telefono"]= $_POST["Telefono"];
         $_SESSION["ciudad"]= $_POST["Ciudad"];
      }
      
      $i=0;
      $con=mysqli_connect("localhost", "root", "", "botargas");
    // Check connection
    if (mysqli_connect_errno()) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    
    if(isset($_POST["nombre"])){
       if(isset($_POST["number"]) && isset($_POST["security-code"])&& isset($_POST["expiration-month-and-year"])){
         $idproductos= $_SESSION['productos'];
         $div= explode(",", $idproductos);
         for($i=0;$i<=$_SESSION['count']; $i++){
            $canti = mysqli_query($con,"SELECT cantidad FROM producto where id_producto='$div[$i]';");
            $rowc = mysqli_fetch_array($canti);
            if(isset($rowc['cantidad'])){
               $cant=$rowc['cantidad'];
            $cantn=$cant-1;
            $modificar = mysqli_query($con,"UPDATE `producto` SET `cantidad`='$cantn' where id_producto='$div[$i]';");
            }
         }
      $name= $_POST["nombre"];
      $code= $_POST["security-code"];
      $expiration= $_POST["expiration-month-and-year"];
      $number= $_POST["number"];
      $id_user=$_SESSION["id_user"];
      $nombre=$_SESSION["nombres"];
      $direccion=$_SESSION["direccion"];
      $telefono=$_SESSION["telefono"];
      $ciudad=$_SESSION["ciudad"];
      
      $monto=$_SESSION["monto"];
      $SQL = "INSERT INTO historial (id_usuario, id_producto, telefono, direccion, ciudad, nombretarj, cvv, fechaex, ntarj, monto) VALUES ('$id_user', '$idproductos','$telefono','$direccion','$ciudad','$name', '$code', '$expiration', '$number', '$monto')";
      $historial = mysqli_query($con, $SQL);
      $vaciarcarrito = mysqli_query($con,"DELETE FROM carrito where id_usuario='$id_user';");
      $_SESSION['comprahecha']=1;
      echo "<script>window.location.href='../index.php'</script>";
      }
   }
      $nom=$_SESSION["nombre"];
      $bienvenida= "$nom";                       
   ?> 
<!DOCTYPE html>
<html lang="zxx">
   <head>
      <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="../images/logo/dora.jpg"/>

      <title>Dora la VendeDora</title>
      <!--meta tags -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="keywords" content="Toys Shop Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
         Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
      <script>
         addEventListener("load", function () {
         	setTimeout(hideURLbar, 0);
         }, false);
         
         function hideURLbar() {
         	window.scrollTo(0, 1);
         }
      </script>
      <!--//meta tags ends here-->
      <!--booststrap-->
      <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
      <!--//booststrap end-->
      <!-- font-awesome icons -->
      <link href="../css/fontawesome-all.min.css" rel="stylesheet" type="text/css" media="all">
      <!-- //font-awesome icons -->
      <!--Shoping cart-->
      <link rel="stylesheet" href="../css/shop.css" type="text/css" />
      <!--//Shoping cart-->
      <!--checkout-->
      <link rel="stylesheet" type="text/css" href="../css/checkout.css">
      <!--//checkout-->
      <link href="../css/easy-responsive-tabs.css" rel='stylesheet' type='text/css' />
      <!--stylesheets-->
      <link href="../css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//stylesheets-->
      <link href="//fonts.googleapis.com/css?family=Sunflower:500,700" rel="stylesheet">
      <link href="//fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
   </head>
   <body>
  
      <!--headder-->
      <div class="header-outs" id="home">
         <div class="header-bar">
            <div class="container-fluid">
               <div class="hedder-up row">
                  <div class="col-lg-6 col-md-4 logo-head">
                     <h1><a class="navbar-brand" href="index.php">Dora la VendeDora</a></h1>
                  </div>
                  <div class="col-lg-6 col-md-3 right-side-cart">
                     <div class="cart-icons">
                     <ul>
                           <?php
                                    echo  "<li>" . $bienvenida . "</li>";
                                    echo "<li class='toyscart toyscart2 cart cart box_1' type='button' action='checkout.php' method='post'>";
                                    echo "<form action='checkout.php'method='post' class='last'>";
                                      
                                       echo "<button class='top_toys_cart' type='submit' name='submit' value=''>";
                                       echo "<span style='padding-right:3px; padding-top: 3px; display:inline-block;' >
                                       <img src='../images/mochila.png'></img>
                                       </span>";
                                       echo "</button>";
                                    echo "</form>";
                                 echo "</li>";
                        
                                    echo "<li><a class='nav-link' href='logout.php' id='navbar1' role='button' aria-haspopup='true' aria-expanded='false'> Log out</a></li>";
                                 ?>
                           </ul>
                     </div>
                  </div>
               </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light">
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                  <ul class="navbar-nav ">
                     <li class="nav-item">
                        <a class="nav-link" href="../index.php">Principal </a>
                     </li>
                     <li class="nav-item active">
                        <a class="nav-link" href="shop.php" id="navbar1" role="button" aria-haspopup="true" aria-expanded="false">
                        Productos<span class="sr-only">(current)</span>
                        </a>
                     </li>
                  </ul>
               </div>
            </nav>
         </div>
      <!--//headder-->


      <!-- banner -->
      <div class="inner_page-banner one-img">
      </div>
      
      <!-- top Products -->
      <section class="checkout py-lg-4 py-md-3 py-sm-3 py-3">
         <div class="container py-lg-5 py-md-4 py-sm-4 py-3">
            <div class="ads-grid_shop">
               <div class="shop_inner_inf">
                  <div class="privacy about">
                     <h3>Saque la<span> cartera</span></h3>
                     <!--/tabs-->
                     <div class="responsive_tabs">
                        <div id="horizontalTab">
                           <ul class="resp-tabs-list">
                              <li>Credito/Debito</li>
                           </ul>
                           <div class="resp-tabs-container">
                              <!--/tab_one-->
                              <div class="tab1">
                                 <div class="pay_info">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                       <section class="creditly-wrapper wthree, w3_agileits_wrapper">
                                          <div class="credit-card-wrapper">
                                             <div class="first-row form-group">
                                                <div class="controls">
                                                   <label class="control-label">Nombre en la Tarjeta</label>
                                                   <input class="billing-address-name form-control" type="text" name="nombre" placeholder="Juanita Banana" required="">
                                                </div>
                                                <div class="w3_agileits_card_number_grids">
                                                   <div class="w3_agileits_card_number_grid_left">
                                                      <div class="controls">
                                                         <label class="control-label">Número</label>
                                                         <input class="number credit-card-number form-control" type="text" name="number" inputmode="numeric" autocomplete="cc-number" required="" value="<?php echo $_SESSION["tarje"] ?>"
                                                            autocompletetype="cc-number" x-autocompletetype="cc-number" placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;">
                                                      </div>
                                                   </div>
                                                   <div class="w3_agileits_card_number_grid_right">
                                                      <div class="controls">
                                                         <label class="control-label">CVV</label>
                                                         <input class="security-code form-control" Â· inputmode="numeric" type="text" name="security-code" placeholder="&#149;&#149;&#149;" required="">
                                                      </div>
                                                   </div>
                                                   <div class="clear"> </div>
                                                </div>
                                                <div class="controls">
                                                   <label class="control-label">Fecha de expiración</label>
                                                   <input class="expiration-month-and-year form-control" type="text" name="expiration-month-and-year" placeholder="MM / YY" required="">
                                                </div>
                                             </div>
                                             <button class="btn btn-primary submit" type="submit" value="Proceed Payment" ><span>Pagar </span></button>
                                          </div>
                                       </section>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!--//tabs-->
                  </div>
               </div>
               <!-- //payment -->
               <div class="clearfix"></div>
            </div>
         </div>
      </section>
   

      <!-- footer -->
      <footer class="py-lg-4 py-md-3 py-sm-3 py-3 text-center">
         <div class="copy-agile-right">
            <p> 
               © 2022 Dora la Vendedora. All Rights Reserved | Design mostly by <a href="http://www.W3Layouts.com" target="_blank">W3Layouts</a>
            </p>
         </div>
      </footer>
      <!-- //footer -->


      <!--js working-->
      <script src='../js/jquery-2.2.3.min.js'></script>
      <!--//js working-->
      <!-- cart-js -->
      <script src="../js/minicart.js"></script>
      <script>
         toys.render();
         
         toys.cart.on('toys_checkout', function (evt) {
         	var items, len, i;
         
         	if (this.subtotal() > 0) {
         		items = this.items();
         
         		for (i = 0, len = items.length; i < len; i++) {}
         	}
         });
      </script>
      <!--// cart-js -->
      <!-- easy-responsive-tabs -->
      <script src="../js/easy-responsive-tabs.js"></script>
      <script>
         $(document).ready(function () {
         	$('#horizontalTab').easyResponsiveTabs({
         		type: 'default', //Types: default, vertical, accordion           
         		width: 'auto', //auto or any width like 600px
         		fit: true, // 100% fit in a container
         		closed: 'accordion', // Start closed if in accordion view
         		activate: function (event) { // Callback function if tab is switched
         			var $tab = $(this);
         			var $info = $('#tabInfo');
         			var $name = $('span', $info);
         			$name.text($tab.text());
         			$info.show();
         		}
         	});
         	$('#verticalTab').easyResponsiveTabs({
         		type: 'vertical',
         		width: 'auto',
         		fit: true
         	});
         });
      </script>
      <!-- credit-card -->
      <script src="../js/creditly.js"></script>
      <link rel="stylesheet" href="css/creditly.css" type="text/css" media="all" />
      <script>
         $(function () {
         	var creditly = Creditly.initialize(
         		'.creditly-wrapper .expiration-month-and-year',
         		'.creditly-wrapper .credit-card-number',
         		'.creditly-wrapper .security-code',
         		'.creditly-wrapper .card-type');
         
         	$(".creditly-card-form .submit").click(function (e) {
         		e.preventDefault();
         		var output = creditly.validate();
         		if (output) {
         			// Your validated credit card output
         			console.log(output);
         		}
         	});
         });
      </script>
      <!-- //credit-card -->
      <!-- start-smoth-scrolling -->
      <script src="../js/move-top.js"></script>
      <script src="../js/easing.js"></script>
      <script>
         jQuery(document).ready(function ($) {
         	$(".scroll").click(function (event) {
         		event.preventDefault();
         		$('html,body').animate({
         			scrollTop: $(this.hash).offset().top
         		}, 900);
         	});
         });
      </script>
      <!-- start-smoth-scrolling -->
      <!-- here stars scrolling icon -->
      <script>
         $(document).ready(function () {
         
         	var defaults = {
         		containerID: 'toTop', // fading element id
         		containerHoverID: 'toTopHover', // fading element hover id
         		scrollSpeed: 1200,
         		easingType: 'linear'
         	};
         	$().UItoTop({
         		easingType: 'easeOutQuart'
         	});
         
         });
      </script>
      <!-- //here ends scrolling icon -->
      <!--bootstrap working-->
      <script src="../js/bootstrap.min.js"></script>
      <!-- //bootstrap working-->
      <!--ALERTS-->
      <script>
         var close = document.getElementsByClassName("closebtn");
         var i;

         for (i = 0; i < close.length; i++) {
         close[i].onclick = function(){
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function(){ div.style.display = "none"; }, 600);
         }
         }
      </script>
   </body>
</html>