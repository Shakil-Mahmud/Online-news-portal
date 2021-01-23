<?php

	if (isset($_POST['signupSubmit'])) {
		require 'dbConnection.php';

		require 'notifications.php';

		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$confirmPassword = $_POST['confirmPassword'];

		if(empty($name) || empty($email) || empty($password) || empty($confirmPassword)){
			array_push($errors, "empty field.");
			//header("Location: signupForm.php?");
			echo "empty field<br>";			
			exit();
		}
		if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			array_push($errors, "Invalid email");
			//header("Location: signupForm.php?");
			echo "invalid email<br>";			
			exit();
		}
		if (!preg_match("/^[a-zA-z ]+$/", $name)) {
			array_push($errors, "Invalid name");
			//header("Location: signupForm.php?");
			echo "invalid name<br>";			
			exit();
		}
		if($password!=$confirmPassword) {
			array_push($errors, "Password do not match");
			//header("Location: signupForm.php?");
			echo "password do not match<br>";			
			exit();
		}
		else{
			$sql = "select email from user where email = ? LIMIT 1";
			$stmt = mysqli_stmt_init($conn);

			if(!mysqli_stmt_prepare($stmt, $sql)){
			array_push($errors, "statement preparetion error.");
			//header("Location: signupForm.php?");
			echo "statement prepration error<br>";			
			exit();				
			}
			else{
				mysqli_stmt_bind_param($stmt, "s", $email);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt) >0){
					array_push($errors, "This email already exists.");
			//header("Location: signupForm.php?");
			echo "this email already exist<br>";			
					exit();
				}
				else{
					echo "<br> inserting<br>";
					$sql = "INSERT INTO user (name, email, password) VALUES(?,?,?)";
					$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $sql)){
			//header("Location: signupForm.php?");
						echo "smt prepraretion error while inserting<br>";			
						exit();
					}
					else{
						$hashpwd = password_hash($password, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt,"sss",$name, $email, $hashpwd);
						mysqli_stmt_execute($stmt);
						array_push($sucess, "Your account hass been sucessfully created.");
						echo "inserted";
						header("Location: loginForm.php");
					}
				}
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
	else{
		header("Location: signupForm.php");
	}
?>
