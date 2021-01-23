<?php
	include 'includes/header.php';
	include 'includes/navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php ?></title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
</head>
<body>
	<?php 
		include 'dbConnection.php' ;
		$pid = $_GET['pid'];

		$sql = 'select * from post where id=?';
		$result = mysqli_query($conn, $sql);
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				echo "stmt preparetion error";
				exit();
			}
			else{
				mysqli_stmt_bind_param($stmt,"s",$pid);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if($row = mysqli_fetch_assoc($result)){


			echo '
			<div class="card sm-4 frontCard">
				<img class="card-img-top" src="admin/img/'.$row["picture"].'" alt="">
				<div class="card-body">
					<h2 class="card-title">'. htmlentities($row["title"]).'</h2>
						'. htmlentities($row["description"]).'
				</div>
			</div>';
			}
		}
	?>
</body>
</html>