<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>The Shop Project</title>
		<link rel="stylesheet" href="assets/css/style.css" /> 
	</head>
	<body>
		<div id="container">
			<!-- HEADER -->
			<header id="header">
				<div id="logo">
					<img src="assets/img/camiseta.png" alt="t-shirt-logo" />
					<a href="index.php">
						The Shop
					</a>
				</div>
			</header>
			<!-- MENU -->
			<nav id="menu">
				<ul>
					<li>
						<a href="#">home</a>
					</li>
					<li>
						<a href="#">category 1</a>
					</li>
					<li>
						<a href="#">category 2</a>
					</li>
					<li>
						<a href="#">category 3</a>
					</li>
					<li>
						<a href="#">category 4</a>
					</li>
					<li>
						<a href="#">about</a>
					</li>
				</ul>

			</nav>
			
			<div id="content">
			
				<!-- ASIDE -->
				<aside id="aside">
					<div id="login" class="block-aside">
						<h3>Log In</h3>
						<form action="#" method="POST">
							<label for="email">Email</label>
							<input type="email" name="email" />
							<label for="password">Password</label>
							<input type="password" name="password" />
							<input type="submit" name="submit" value="submit" />
						</form>
						<ul>
							<li>
								<a href="#">My orders</a>
							</li>
							<li>
								<a href="#">Manage Orders</a>
							</li>
							<li>
								<a href="#">Manage Categories</a>
							</li>
						</ul>
					</div>
				</aside>

				<!-- MAIN -->
				<div id="main">
					<h1>Trending Products</h1>
					<div class="product">
						<img src="assets/img/camiseta.png" />
						<h2>T-shirt TITLE</h2>
						<p>descripcion del producto etc...</p>
						<a href="#" class="button">BUY</a>
					</div>
					<div class="product">
						<img src="assets/img/camiseta.png" />
						<h2>T-shirt TITLE</h2>
						<p>descripcion del producto etc...</p>
						<a href="#" class="button">BUY</a>
					</div>
					<div class="product">
						<img src="assets/img/camiseta.png" />
						<h2>T-shirt TITLE</h2>
						<p>descripcion del producto etc...</p>
						<a href="#" class="button">BUY</a>
					</div>
					<div class="product">
						<img src="assets/img/camiseta.png" />
						<h2>T-shirt TITLE</h2>
						<p>descripcion del producto etc...</p>
						<a href="#" class="button">BUY</a>
					</div>
				</div>
			</div>

			<!-- FOOTER -->
			<footer id="footer">
				<p>Developed by Ian Noz &copy; <?=date('Y')?></p>
			</footer>
		</div>
	</body>
