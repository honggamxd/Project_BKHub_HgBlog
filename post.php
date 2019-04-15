<?php 
	include ('database_connect.php');
 	include ('header.php'); 
	$iduser = $_SESSION['iduser'];
	$listcate = getCategories();
	$post = getPostById();
	$user = getUserById();
	$values = getCommentByPost();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$curdate = date('Y-m-d');
	$curtime = date('H:i:s');
	
?>
<?php 
	$idpost = isset($_GET['id'])? $_GET['id'] : null;
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$cmt = isset($_POST['comment']) ? $_POST['comment']:null;
			global $conn;
			$sql = "INSERT INTO hgblog.comments(contentcmt, user_id, post_id, date, time) VALUE ('$cmt','$iduser','$idpost','$curdate', '$curtime')";
			$result = mysqli_query($conn,$sql);
			var_dump($result);
			if($result) {	
			header('Location: post.php?id='.$idpost);
				//header('location: post.php?id=.$idpost');
			}
		
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

<section id="header" class="header-one">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
          <div class="header-thumb">
              <h1 class="wow fadeIn" data-wow-delay="1.6s">Post</h1>
              <h3 class="wow fadeInUp" data-wow-delay="1.9s">"Yesterday is History,</h3>
				<h3 class="wow fadeInUp" data-wow-delay="1.9s">Tomorrow is a Mystery,</h3>
				<h3 class="wow fadeInUp" data-wow-delay="1.9s">But, Today is a Gift"</h3>
          </div>
			</div>

		</div>
	</div>		
</section>
<!-- Single Post section
================================================== -->
<section id="single-post">
   <div class="container">
      <div class="row">

         <div class="wow fadeInUp col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10" data-wow-delay="2.3s">
         	  <div class="blog-thumb">
         		   
         		   <h1><?php echo $post["title"]; ?></h1>
         			    <div class="post-format">
						        
						        <span><i class="fa fa-date"></i> <?php echo $post["datetime"]; ?></span>
					       </div>
                           <img src="<?php echo $post["imgpost"]; ?>" class="img-responsive post-image" alt="Blog">
         		   <p><?php echo $post["content"]; ?></p>
               
               

               <div class="blog-comment">
                 <h3 class="wow fadeInUp" data-wow-delay="1.9s">COMMENTS</h3>
                 <?php  foreach ($values as $key => $value) { ?>
                    <div class="media">
                        <div class="media-object pull-left">
                            <img src="<?php echo $value["imguser"]; ?>" style="width:80px;height:80px;" class="img-responsive" alt="blog">
                       </div>
                      <div class="media-body">
                        <h4 class="media-heading"><?php echo $value["username"]; ?></h4>
                        <h5><?php echo $value["date"]; ?> at <?php echo $value["time"]; ?> </h5>
                        <p><?php echo $value["contentcmt"]; ?></p>
                      </div>
                    </div>
                    <?php } ?>
                    
               </div>

               <div class="blog-comment-form">
               <div class="media-object pull-left">
                            <img src="<?php echo $imguser; ?>" style="width:80px;height:80px;" class="img-responsive" alt="blog">
                       </div>
                       <br />
                  <h3></h3>
                    <form action="post.php?id=<?php echo $idpost ?>" method="post">
                      <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="comment" rows="5" placeholder="Enter Comment">
                </div>
                      	<button name="submit" type="submit" class="form-control" >Submit a comment"</button>
                   </form>
               </div>
         	  </div>
		    </div>

      </div>
   </div>
</section>
<!-- Footer section
================================================== -->


<?php include ('footer.php'); ?>