<h1>Register</h1>

<?php 
if(isset($_SESSION['register']) && $_SESSION['register'] == 'completed'): ?>

	<strong class="alert-green">Registration completed successfully!</strong>

<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>

	<strong class="alert-red">Registration failed! Fill all fields with valid data</strong>

<?php endif; ?>
<?php Utils::deleteSession('register');?>

<form action="<?=base_url?>user/save" method="POST">

	<label for="name">Name</label>
	<input type="text" name="name" required />

	<label for="surname">Surname</label>
	<input type="text" name="surname" required />

	<label for="email">Email</label>
	<input type="email" name="email" required />

	<label for="password">Password</label>
	<input type="password" name="password" required />

	<input type="submit" value="Register" />
</form>