<?php

require 'config/config.php';
require 'config/database.php';
$db = new Database();
$con = $db->conectar();

$id = isset($_GET['id']) ? $_GET['id'] : '';
$token = isset($_GET['token']) ? $_GET['token'] : '';


$token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

$sql = $con->prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1");
$sql->execute([$id]);

if($sql->fetchColumn() > 0) {
    $sql = $con->prepare("SELECT nombre, descripcion, precio   FROM productos WHERE id=? AND activo=1 
    LIMIT 1");
    $sql->execute([$id]);  
    $row = $sql->fetch(PDO::FETCH_ASSOC);
    $nombre = $row['nombre'];
    $descripcion = $row['descripcion'];
    $precio = $row['precio'];
    
   

}

?>

<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Funkostore</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- TOP HEADER -->
		<div id="top-header">
			<div class="container">
				<ul class="header-links pull-left">
					<li><a href="#"><i class="fa fa-phone"></i> 4492300708</a></li>
					<li><a href="#"><i class="fa fa-envelope-o"></i> funkostore@gmail.com</a></li>
					<li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i>FunkoStore</a></li></a></li>
					<li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></i>FunkoStore</a></li>
				</ul>
				<ul class="header-links pull-right">
					<li><a href="#"><i class="fa fa-dollar"></i> MXN</a></li>
				
				</ul>
			</div>
		</div>
		<!-- /TOP HEADER -->

		<!-- MAIN HEADER -->
		<div id="header">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- LOGO -->
					<div class="col-md-3">
						<div class="header-logo">
							<a href="#" class="logo">
								<img src="./img/logo.png" alt="">
							</a>
						</div>
					</div>
					<!-- /LOGO -->


						</div>
					</div>
					<!-- /ACCOUNT -->
				</div>
				<!-- row -->
			</div>
			<!-- container -->
		</div>
		<!-- /MAIN HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<nav id="navigation">
		<!-- container -->
		<div class="container">
			<!-- responsive-nav -->
			<div id="responsive-nav">
			
			</div>
			<!-- /responsive-nav -->
		</div>
		<!-- /container -->
	</nav>
	<!-- /NAVIGATION -->

	<!-- BREADCRUMB -->
	<div id="breadcrumb" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
					<h3 class="breadcrumb-header">Comprar</h3>
					<ul class="breadcrumb-tree">
						<li><a href="index.php">Inicio</a></li>
						<li class="active">Comprar</li>
					</ul>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /BREADCRUMB -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<div class="col-md-7">
					<!-- Billing Details -->

					<!-- /Billing Details -->



					<!-- Order Details -->
					<main>
        <div class="container">
            <div class="row">
                <div class="center" >
                
                </div>
                
                <div class="col-md-6 order-md-2">
                    <h2><?php echo $nombre; ?> </h2>
                    <h2><?php echo MONEDA . number_format($precio, 2,'.', ','); ?> </h2>
                    <p class="lead">
                        <?php echo $descripcion; ?>

                    </p>

                    <div class="d-grid gap-3 col-10 mx-auto">
                       
                </div>
           
            </div>        
        </div>
    </main>
					<!-- /Order Details -->
					<!-- Shiping Details -->
					<div class="shiping-details">
						<div class="section-title">

							<head>
								<meta name="viewport" content="width=device-width, initial-scale=1">
							</head>

							<body>

								<script
									src="https://www.paypal.com/sdk/js?client-id=Afx3si29JWWQbhYOYJB2JmxzjzN9p20KYr_Yqxdhu72ioUzJXMjwyhrcEYAGzxzLuFM_UQeAeWFCArOy&currency=MXN"></script>

								<div id="paypal-button-container"></div>
								<script>
									paypal.Buttons({


										createOrder: (data, actions) => {
											return actions.order.create({
												purchase_units: [{
													amount: {
														value: '100.00'
													}


												}]
											});
										},




										onApprove: (data, actions) => {
											return actions.order.capture().then(function (orderData) {
												// Successful capture! For dev/demo purposes:
												console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
												const transaction = orderData.purchase_units[0].payments.captures[0];
												alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
												// When ready to go live, remove the alert and show a success message within this page. For example:
												// const element = document.getElementById('paypal-button-container');
												// element.innerHTML = '<h3>Thank you for your payment!</h3>';
												// Or go to another URL:  actions.redirect('thank_you.html');
											});
										}
									}).render('#paypal-button-container');
								</script>
							</body>
						</div>
						<div class="input-checkbox">
							<input type="checkbox" id="shiping-address">
							<label for="shiping-address">

								Enviar a una dirección diferente
							</label>
							<div class="caption">
								<div class="form-group">
									<input class="input" type="text" name="first-name" placeholder="First Name">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="last-name" placeholder="Last Name">
								</div>
								<div class="form-group">
									<input class="input" type="email" name="email" placeholder="Email">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="address" placeholder="Address">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="city" placeholder="City">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="country" placeholder="Country">
								</div>
								<div class="form-group">
									<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
								</div>
								<div class="form-group">
									<input class="input" type="tel" name="tel" placeholder="Telephone">
								</div>
							</div>
						</div>
					</div>
					<!-- /Shiping Details -->

					<!-- Order notes -->
					<div class="order-notes">
						<textarea class="input" placeholder="Notas"></textarea>
					</div>
					<!-- /Order notes -->
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- NEWSLETTER -->
	<div id="newsletter" class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12">
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /NEWSLETTER -->

	<!-- FOOTER -->
	<footer id="footer">
		<!-- top footer -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Contáctanos</h3>
							<p>Contáctanos para dudas, aclaraciones, etc.</p>
							<ul class="footer-links">
								<li><a href="#"><i class="fa fa-phone"></i>4492300708</a></li>
								<li><a href="#"><i class="fa fa-envelope-o"></i>funkostore@gmail.com</a></li>
								<li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i>FunkoStore</a>
								</li></a></li>
								<li><a href="#"><i class="fa fa-twitter-square"
											aria-hidden="true"></i></i>FunkoStore</a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Categorías</h3>
							<ul class="footer-links">
								<option value="0">Todas las categorias </option>
								<option value="1">Animación</option>
								<option value="1">Anime</option>
								<option value="3">Comic</option>
								<option value="4">Deportes</option>
								<option value="5">Horror</option>
								<option value="6">Iconos</option>
								<option value="7">Música</option>
								<option value="8">Película</option>
								<option value="9">Televisión</option>
								<option value="10">Videojuego</option>
							</ul>
						</div>
					</div>
					<div class="clearfix visible-xs"></div>
					<div class="col-md-3 col-xs-6">
						<div class="footer">
							<h3 class="footer-title">Servicios</h3>
							<ul class="footer-links">
								<li><a href="#">Carrito</a></li>
								<li><a href="#">Lista de deseos</a></li>
								<li><a href="#">Ayuda</a></li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /top footer -->

		<!-- bottom footer -->
		<div id="bottom-footer" class="section">
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12 text-center">
						<ul class="footer-payments">
							<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
							<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
							<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bottom footer -->
	</footer>
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/slick.min.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.zoom.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>