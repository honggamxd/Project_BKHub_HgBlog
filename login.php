<?php include('database_connect.php')?>
<?php 
	
	$errors = array();
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$email = isset($_POST['email']) ? $_POST['email']:null;
		$password = isset($_POST['password']) ? $_POST['password']:null;
		if(empty($email)){
			array_push($errors, "Email Address");
		}
		if(empty($password)){
			array_push($errors, "Password");
		}
		if(empty($errors)){
			global $conn;
			$sql = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
			$result = mysqli_query($conn,$sql);
			if(mysqli_num_rows($result)== 1){
				$value = mysqli_fetch_assoc($result);
				$_SESSION['iduser']=$value['iduser'];
				$_SESSION['name']=$value['username'];
				$_SESSION['imguser']=$value['imguser'];
				
				
				$sqll = "SELECT * FROM hgblog.users WHERE role ='admin' AND iduser =".$value['iduser'];
				$result1 = mysqli_query($conn,$sqll);	
				if(mysqli_num_rows($result1))
					header('location:management_post.php');
				else header('location:index.php');
			}
			else{
			$mess1 = "Email or password correct";
			}
		}
	}
	
 ?>
 <html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HgBlog - Login</title>

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
                <h1 class="h4 text-gray-900 mb-4">Welcome HgBlog! Login</h1>
              </div>
              <?php if(count($errors)) {?>
            <?php foreach($errors as $error) {?>
              <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
              </div>
            <?php } ?>
          <?php } ?>
          <?php if(isset($mess1)) {?>
            <div class="alert alert-success" role="alert">
              <?php echo $mess1;?>
            </div>
          <?php } ?>
              <form class="user" method="post" action="">
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                  </div>
               
                <button type="submit"  class="btn btn-primary btn-user btn-block">Login</button>
                <hr>
                <a href="register.php" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Create an Account!
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
