<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Register</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
	<link href="./../css/register.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="register">
		<h1>Register (Faculty Only)</h1>
		<form action="./../actions/register_faculty_action.php" method="post" autocomplete="off">
			<label for="username">
				<i class="fas fa-user"></i>
			</label>
			<input type="text" name="username" placeholder="Username" id="username" required>
			<label for="password">
				<i class="fas fa-lock"></i>
			</label>

			<input type="password" name="password" placeholder="Password" id="password" required>

			<label for="email">
				<i class="fas fa-envelope"></i>
			</label>
			<input type="email" name="email" placeholder="Email" id="email" required>

			<label for="department">
				<i class="fas fa-building"></i>
			</label>
			<select name="department" id="department" required>
				<option value="" disabled selected>Select Department</option>
				<?php
				include '../functions/select_dpt_fxn.php';
				echo getDepartments();
				?>
			</select>

			<input type="submit" value="Register">
		</form>
		<a href="login.php">Already have an account? Login</a>
	</div>
</body>

</html>