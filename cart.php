<?php
session_start();

if(!isset($_SESSION['id']))
{
	echo "test";
	header("Location: signin.php");
	exit();
}

$subtotal = 0;

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
					<li><a href="index.php"><span class="icon fa-home"></span></a></li>
					<li><a href="store.php"><span class="icon fas fa-tags"></span></a></li>
					<li><a href="signin.php"><span class="icon fas fa-user"></span></a></li>
					<li><a href="cart.php" class="active"><span class="icon fa-shopping-cart"></span></a></li>
				</ul>
			</nav>

			<!-- Main -->
			<section id="main">

				<div class="inner">
					<header>
						<h1>Shopping Cart</h1>
					</header>
				</div>

				<section id="galleries">
					<div class="gallery">
						<div class="content" style="text-align: center;">
							
								
								<?php
									require_once 'php/database.php';
									$result = $connection->query("SELECT * FROM carts WHERE user_id={$_SESSION['id']}");
									$num_rows = $result->num_rows;

									for($i = 0 ; $i < $num_rows ; ++$i)
									{
										$row = $result->fetch_assoc();
										$result2 = $connection->query("SELECT * FROM products WHERE id={$row['product_id']}");
										$item = $result2->fetch_assoc();
										
										$total = $row['quantity'] * $item['price'];
										$subtotal = $subtotal + $total;
									
										echo "
											<div class=\"media\">
											<img style=\"width: 50%;\" src={$item['image']} alt=\"\"/>
											<h3>{$item['pname']}</h3>
											<form method=\"POST\" action=\"php/remove.php\">
												<label>Price: \${$item['price']}</label>
												<label>Qtty: {$row['quantity']}</label>
												<label>Total: \$$total </label>
												
												<input type=\"hidden\" name=\"cart_id\" id=\"cart_id\" value={$row['id']} >
											<br><input value=\"remove\" type=\"submit\" />
											</form> </div>
										";
									}
								?>
						</div>
						
						<footer>
							<h1>Subtotal: $<?php echo $subtotal; ?></h1>
							<a href="php/purchase.php" class="button big">Purchase</a>
						</footer>

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