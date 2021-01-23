<?php
session_start();
require 'notifications.php'
?>

	<header>
		<div class="container-fluid">

			<div class="row">
				<div class="col-sm-4">
					<a href="index.php"><img src="img/logo2.png" placeholder = "logo"></a>
				</div>
				<!-- sign / username -->
				<div class="col-sm-8">
					<?php 
					if(isset($_SESSION['email'])){
						?>
						<ul class="">
							<li class=""><a href="#"><?php echo $_SESSION['name']; ?></a></li>
							<li class=""><a href="logout.php">Log out</a></li>
						</ul>
						<?php
					}
					else{
						?>
						<ul class="">
							<li class=""><a href="signupForm.php"><b>Sign up</b></a></li>
							<li class=""><a href="loginForm.php"><b>login</a></b></li>
						</ul>
					<?php } ?>
				</div>
			</div>
		</div>
	</header>

