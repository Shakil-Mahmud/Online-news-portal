<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>
<body>
	<?php include 'includes/header.php'; ?>
	<?php include 'includes/navbar.php'; ?>
	<div class="container">
	<form action="login.php" method="post">
		<table>
			<tr>
				<th>email</th>
				<th><input type="email" name="email" required></th>
			</tr>
			<tr>
				<th>Password</th>
				<th><input type="password" name="password"></th>
			</tr>
			<tr>
				<th colspan="2"><input type="submit" name="loginSubmit"></th>
			</tr>

		</table>
		<p>Don't have any account?</p>
		<a href="signupForm.php">Sign Up</a>
	</form>
	</div>
</body>
</html>