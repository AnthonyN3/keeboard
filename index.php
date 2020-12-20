<?php
session_start();
?>

<!DOCTYPE HTML>
<!--
	Snapshot by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>KEEBARD</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
		<div class="page-wrap">

			<!-- Nav -->
			<nav id="nav">
				<ul>
					<li><a href="index.php" class="active"><span class="icon fa-home"></span></a></li>
					<li><a href="store.php"><span class="icon fas fa-tags"></span></a></li>
					<li><a href="signin.php"><span class="icon fas fa-user"></span></a></li>
					<li><a href="cart.php"><span class="icon fa-shopping-cart"></span></a></li>
				</ul>
			</nav>

			<!-- Main -->
			<section id="main">

				<!-- Banner -->
				<section id="banner">
					<div class="inner">
						<h1>KEEBOARD</h1>
						<p>High Quality Mechanical Keyboards & Accessories!</a></p>
						<ul class="actions">
							<li><a href="#galleries" class="button alt scrolly big">Continue</a></li>
						</ul>
					</div>
				</section>

				<!-- Gallery -->
				<section id="galleries">

					<!-- Photo Galleries -->
					<div class="gallery">
						<header class="special">
							<h2>Featured Products</h2>
						</header>
						<div class="content">
							<?php
								require_once 'php/database.php';
								$result = $connection->query("SELECT * FROM products WHERE 1 LIMIT 8");
								$num_rows = $result->num_rows;
								
								for($i = 0 ; $i < $num_rows ; ++$i)
								{
									$row = $result->fetch_assoc();
									echo "
										<div class=\"media\">
										<a href={$row['image']} class=\"poptrox\"><img src={$row['image']} alt=\"\" title={$row['pname']} /></a>
										</div>
									";
								}
							?>
						</div>
						<footer>
							<a href="store.php" class="button big">Go To Store</a>
						</footer>
					</div>
				</section>

				<!-- Contact -->
				<section id="contact" style="text-align: center;">
					<!-- Social -->
						<div class="social">
							<h3>About Us</h3>
							<p>Hello KEEBoard enthusiast! We are a E-commerce site that sells high quality keyboards, macropads, and deskpads. We are planning to sell more than just the current products we have and are working on developing more keyboard accessories such as custom switches, keycaps and wristwrest. So stay tuned and keep typing! </p>
							<p>So what exactly is a mechanical keyboard? Well. <br> Mechanical keyboards are notable for their distinct key-feel. Mechanical keyboards provide much more direct feedback to the user. While a membrane key cap presses down on a thin membrane layer, to a conductive circuit underneath, a mechanical keyboard has spring-loaded switches instead. These register the key pressed – often with a distinct click, unique to mechanical keyboards. A unique element is their use of spring-loaded switches – these come in several different feels.</p>
							<h3>Follow Me</h3>
							<ul class="icons">
								<li><a href="." class="icon fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="." class="icon fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="." class="icon fa-instagram"><span class="label">Instagram</span></a></li>
							</ul>
						</div>
				</section>

				<!-- Footer -->
				<footer id="footer">
					<div class="copyright">
						&copy; Untitled Design: <a href="https://templated.co/">TEMPLATED</a>. Images: <a href="https://unsplash.com/">Unsplash</a>.
					</div>
				</footer>
			</section>
		</div>
		

		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery.poptrox.min.js"></script>
		<script src="assets/js/jquery.scrolly.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<script src="assets/js/main.js"></script>

	</body>
</html>