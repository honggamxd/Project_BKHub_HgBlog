<?php 
	include ('database_connect.php');
 	include ('header.php');  
	$user = getUserById();
	
?>

<?php 
$errors = array();
if( $_SERVER['REQUEST_METHOD'] == 'POST'){
	//var_dump($_FILES); die();
	//$user = getUserById($id);
	$id = $user["iduser"];
		updateUser($id, $_FILES);			
}
?>


<!-- Navigation section
================================================== -->
<div class="nav-container">
   <nav class="nav-inner transparent">

      <div class="navbar">
         <div class="container">
            <div class="row">

              <div class="brand">
                <a href="index.php">HgBlog</a>
              </div>

              <div class="navicon">
              <a class="nav-link dropdown-toggle" href="about.php" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user['username']; ?></span>
                <img class="img-profile rounded-circle" src="<?php echo $user['imguser']; ?>" style="width:50px;height:50px;">
              </a>
                <div class="menu-container">

                  <div class="circle dark inline">
                    <i class="icon ion-navicon"></i>
                  </div>

                  <div class="list-menu">
                    <i class="icon ion-close-round close-iframe"></i>
                    <div class="intro-inner">
                      <ul id="nav-menu">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">Profile</a></li>
                        <li><a href="login.php">Logout</a></li>
                      </ul>
                    </div>
                  </div>

                </div>
              </div>

            </div>
         </div>
      </div>

   </nav>
</div>

<!-- Header section
================================================== -->
<section id="header" class="header-three">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
            	<div class="header-thumb">
              		 <h1 class="wow fadeIn" data-wow-delay="0.6s">Profile</h1>
              		 <h3 class="wow fadeInUp" data-wow-delay="1.9s">"Yesterday is History,</h3>
				<h3 class="wow fadeInUp" data-wow-delay="1.9s">Tomorrow is a Mystery,</h3>
				<h3 class="wow fadeInUp" data-wow-delay="1.9s">But, Today is a Gift"</h3>
           		</div>
			</div>

		</div>
	</div>		
</section>


<!-- About section
================================================== -->
<section id="about">
   <div class="container">
      <div class="row">

        
         <div class="col-md-8" >
      
      <form class="col-lg-6 offset-lg-3" method="POST" action="" enctype="multipart/form-data"  >
          <h4 class="mt-4 mb-3"> Edit </h4>
          <?php if(count($errors)) {?>
            <?php foreach($errors as $error) {?>
              <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
              </div>
            <?php } ?>
          <?php } ?>
          <?php if(isset($mess)) {?>
            <div class="alert alert-success" role="alert">
              <?php echo $mess;
			  
			  //header('location: admin/user.php'); ?>
            </div>
          <?php } ?>
         
          <div class="form-group">
           <input type="hidden" name="id" value="<?php echo $user['iduser'] ?> >
           <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name"  placeholder="Enter Name" name="name" value="<?php echo $user['username'] ?>">
          </div>
          <div class="form-group">
            <label for="name">Email</label>
            <input type="email" class="form-control" id="email"  placeholder="Enter email" name="email" value="<?php echo $user['email'] ?>">
          </div>
          <div class="form-group">
            <label for="name">Password</label>
            <input type="password" class="form-control" id="password"  placeholder="Enter password" name="password" value="<?php echo $user['password'] ?>">
          </div>

          <div class="form-group">
            <label for="name">Image</label>
            <input type="file" class="form-control" id="image"  placeholder="Upload image" name="image" value="<?php $user['imguser'] ?>">
          </div>
          <button type="submit" class="btn btn-primary">Update</button>
    </form>
	
      </div>
         	</div>
            </div>
            </div>
            </section>


<!-- Footer section
================================================== -->
<?php include('footer.php')?>