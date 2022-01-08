<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>The Shop Project</title>
		<link rel="stylesheet" href="<?=base_url?>assets/css/style.css" /> 
	</head>
	<body>
		<div id="container">
			<!-- HEADER -->
			<header id="header">
				<div id="logo">
					<img src="<?=base_url?>assets/img/camiseta.png" alt="t-shirt-logo" />
					<a href="index.php">
						The Shop
					</a>
				</div>
			</header>
			<!-- MENU -->
			<?php $categories = Utils::showCategories();?>
			<nav id="menu">
				<ul>
					<li>
						<a href="<?=base_url?>">home</a>
					</li>
					<?php while($cat = $categories->fetch_object()):?>
						<li>
							<a href="<?=base_url?>/category/show&id=<?=$cat->id?>"><?=$cat->name?></a>
						</li>
					<?php endwhile; ?>
				</ul>

			</nav>

			<div id="content">