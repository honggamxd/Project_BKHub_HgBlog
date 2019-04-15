<?php include('database_connect.php')?>
<?php 
	
	$errors = array();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$username = isset($_POST['username']) ? $_POST['username']:null;
		$email = isset($_POST['email']) ? $_POST['email']:null;
		$password1 = isset($_POST['pass1']) ? $_POST['pass1']:null;
		$password2 = isset($_POST['pass2']) ? $_POST['pass2']:null;
		if(empty($username)){
			array_push($errors, "Name");
		}
		if(empty($email)){
			array_push($errors, "Email Address");
		}
		if(empty($password1)){
			array_push($errors, "Password");
		}
		if(empty($password2)|| ($password1 != $password2) ){
			array_push($errors, "Repeat Password ");
		}
		//check email
		global $conn;
		$sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
		$result = mysqli_query($conn,$sql);
		$user = mysqli_fetch_assoc($result);
		if($user['email'] == $email){
			array_push($errors, "Email exits");
		}
		if(empty($errors)){
			global $conn;
			$sql = "INSERT INTO users(username,email,password,role) VALUE ('$username','$email','$password1','user')";
			$result = mysqli_query($conn,$sql);
			if($result) {	
				header('location: login.php');
			}
		}
	}
	
 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HgBlog - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
        
          <div class="col-lg-5 d-none d-lg-block bg-register-image"> <img src="images/portfolio-img1.jpg"> </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                <?php if(count($errors)) {?>
            <?php foreach($errors as $error) {?>
              <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
              </div>
            <?php } ?>
          <?php } ?>
              </div>
              <form class="user" method="post" action="">
                <div class="form-group">
              
                    <input type="text" class="form-control form-control-user" name="username" id="exampleFirstName" placeholder="Name">
                 
                  
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" placeholder="Email Address">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="pass1" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="pass2" id="exampleRepeatPassword" placeholder="Repeat">
                  </div>
                </div>
                <button type="submit"  class="btn btn-primary btn-user btn-block">Register Account</button>
                <hr>
                <a href="login.php" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Already have an account? Login!
                </a>
               
              </form>
              
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  

</body>

</html>
