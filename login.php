<?php
	if(isset($_POST['loginSubmit'])){
		require 'dbConnection.php';

		$password = $_POST['password'];
		$email = $_POST['email'];

		if(empty($email) || empty($password)){
			echo "empty field";
			exit();
		}
		else{
		
			$sql = "select * from user where email = ?;";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				echo "stmt preparetion error";
				exit();
			}
			else{
				mysqli_stmt_bind_param($stmt,"s",$email);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if($row = mysqli_fetch_assoc($result)){
					$pwdCheck = password_verify($password, $row['password']);
					if($pwdCheck == false){
						echo 'password do not match <br>';
						exit();
					}
					else if($pwdCheck == true) {
						session_start();
						$_SESSION['name'] = $row['name'];
						$_SESSION['email'] = $row['email'];
						echo "<h1>Log in sucessfully</h1>";
						header("Location: index.php");
					}
				}
			}
		}

	}
	else{
		header("Location: login.php");
		exit();
	}
?>