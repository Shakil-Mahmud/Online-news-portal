<?php

  if(isset($_POST['loginSubmit'])){
    require 'dbConnection.php';

    if(empty($_POST['password']) || empty($_POST['email'])){
      echo "empty field";
      exit();
    }
    else{
      $password = $_POST['password'];
      $email = $_POST['email'];
      $sql = "select * from admin where email = ?;";
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
            header("Location: dashboard.php");
          }
        }
      }
    }

  }
/*  else{
    header("Location: index.php");
    exit();
  } */
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

   <link rel="stylesheet" type="text/css" href="css/index.css">
   <title>News Portal | Admin Panel</title>

</head>

<body>
<div class="container">
</div>
<div class="container bd">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
          <h1>Online News Portal</h1>
          <h2 class="formTitle">Admin Login</h2>
    </div>
    <div class="col-sm-4"></div>
  </div>
  <form class="form-horizontal" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-6">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
      </div>
      <div class="col-sm-4"></div>      
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="password">Password:</label>
      <div class="col-sm-6">          
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
      </div>
      <div class="col-sm-4"></div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" name="loginSubmit">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>
</body>
</html>