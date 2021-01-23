<!DOCTYPE html>
<html>
<head lang="en">
	<title>newspaper</title>
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<?php include 'includes/header.php'; ?>
	<?php include 'includes/navbar.php'; ?>
	<div>
	</div>

	<div class="container">
		<div class="row">
			<?php 
				include 'dbConnection.php' ;
				include 'includes/sidebar.php';
			?>
			<div class="col-sm-9">
				<div>
					<?php 
					$sql = 'select * from post where active=1';
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
  			  // output data of each row
						while($row = mysqli_fetch_assoc($result)) {
							echo '
							<div class="card sm-4 frontCard">
							<img class="card-img-top" src="admin/img/'.$row["picture"].'" alt="">
							<div class="card-body">
							<a href="post.php?pid='.htmlentities($row['id']).'" ><h2 class="card-title">'. htmlentities($row["title"]).'</h2></a>
							</div>
							<div class="card-footer text-muted">
							Posted on today
							</div>
							</div>';
						}
					} else {
						echo "0 results";
					}
					?>

				</div>
			</div>
		</div>
	</div>


	<div>
		<!-- Most read-->
	</div>



	<div>
		<section></section>
	</div>



	<div>
		<footer></footer>
	</div>

</body>
</html>