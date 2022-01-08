<!-- ASIDE -->
<aside id="aside">

	<div id="cart" class="block-aside">
		<h3>My Cart</h3>
		<ul>
			<?php $stats = Utils::cartStats(); ?>
			<li>
				<a href="<?=base_url?>cart/index">Products (<?=$stats['count']?>)</a>
			</li>
			<li>
				<a href="<?=base_url?>cart/index">Total: £<?=$stats['total']?></a>
			</li>
			<li>
				<a href="<?=base_url?>cart/index">Go to Cart</a>
			</li>
		</ul>
	</div>

	<div id="login" class="block-aside">

	<?php if(!isset($_SESSION['identity'])):?>
		<h3>Log In</h3>
		<form action="<?=base_url;?>user/login" method="POST">
			<label for="email">Email</label>
			<input type="email" name="email" />
			<label for="password">Password</label>
			<input type="password" name="password" />
			<input type="submit" name="submit" value="submit" />
		</form>
	<?php else:?>
		<h3>
			<?=$_SESSION['identity']->name;?> <?=$_SESSION['identity']->surname;?>
		</h3>
	<?php endif;?>
		<ul>
			<?php if(isset($_SESSION['admin'])):?>
				<br>
				<li>
					<a href="<?=base_url?>category/index">Manage Categories</a>
				</li>
				<li>
					<a href="<?=base_url?>product/management">Manage Products</a>
				</li>
				<li>
					<a href="#">Manage Orders</a>
				</li>
				<br>
				<hr>
				<br>
			<?php endif; ?>
			
			<?php if(isset($_SESSION['identity'])): ?>
				<li>
					<a href="#">My orders</a>
				</li>
				<li>
					<a href="<?=base_url?>user/logout">Log out</a>
				</li>
			<?php else: ?>
				<li>
					<a href="<?=base_url?>user/register">Sign up</a>
				</li>
			<?php endif; ?>
		</ul>
	</div>
</aside>

<!-- MAIN -->
<div id="main">