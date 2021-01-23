<?php
include 'dbConnection.php';
if(isset($_POST['submit']) and !empty($_POST['pid']) ){
	$pid = (int)$_POST['pid'];
	$sql = 'DELETE FROM post WHERE id="$pid"';
	if ($conn->query($sql) === TRUE) {
 	   echo "Record Deleted successfully.";
	} 
	else {
    	echo "Error updating record: " . $conn->error;
	}
}
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

			<div >
				<form method="post">
					<label>Enter Post id:</label>
					<input type="text" name="pid">
					<input type="submit" name="submit">
				</form>
			</div>

			<?php 
			include 'dbConnection.php';
			$sql = 'select * from post where active=1';
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
  			  // output data of each row
				echo '<h1 style="padding-left: 10%">All active post</h1>';
				while($row = mysqli_fetch_assoc($result)) {

					echo '
					<div class="card sm-4 frontCard">
					<div class="card-body">
					<ul style="list-style: none;">
					<li>
					<label class="card-title">Post id: '. htmlentities($row["id"]).'</label>		
					<h2 class="card-title">'. htmlentities($row["title"]).'</h2>
					</li>
					</ul>

					</div>
					</div>';
				}
			} else {
				echo "0 results";
			}
			?>
		</body>
		</html>