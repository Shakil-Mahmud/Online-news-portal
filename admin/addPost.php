<?php
	include 'dbConnection.php';
	if(isset($_POST['submit'])){
		$title = $_POST['title'];
		$category = $_POST['category'];
		$description = $_POST['description'];
		$active = 1;
		$picture = $_POST['picture'];
		$sql = "insert into post(title, category,picture , description, active)
				values('$title', '$category', '$picture', '$description', '$active') ";
		$result = mysqli_query($conn, $sql);
		if ($result){
		    echo "New record created successfully";
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}

	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add post</title>
	<link rel="stylesheet" type="text/css" href="css/adpost.css">
</head>
<body>
	<div class="title">
		<h1>Create a new post</h1>
	</div>
	<div class="box">
		<form method="post">
			<ul>
				<li class="">
					<label><h2>Post title</h2></label>
					<input type="text" name="title" required>
				</li>
				<li class="">
					<label><h2>Select Catagory</h2></label>
					<select name="category">
						<?php
						$sql = 'select * from category';
						$ret = mysqli_query($conn, $sql);
						while($result=mysqli_fetch_array($ret))
						{    
							?>
							<option value="<?php echo htmlentities($result['name']);?>"><?php echo htmlentities($result['name']);?></option>
						<?php } ?>
						?>
					</select>
				</li>
				<li class="">
					<label><h2>Post picture</h2></label>
					<input type="text" name="picture" required>
				</li>

				<li class="">
					<label><h2>Post description</h2></label>
                    <textarea class="" name="description" required></textarea>
				</li>

				<li>
					<input type="submit" name="submit">
				</li>
			</ul>
		</form>
	</div>	

</body>
</html>