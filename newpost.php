<?php 
	include ('database_connect.php');
 	include ('header.php'); 
 	$name = $_SESSION['name'];
	$imguser = $_SESSION['imguser'];
	//$user = getUserById();
	//$post = getPostById();
	
?>

<?php 
$errors = array();
if( $_SERVER['REQUEST_METHOD'] == 'POST'){
	
		createPost($_FILES);			
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
                <a href="index.php">HgBlog - New Post</a>
              </div>

              <div class="navicon">
              <a class="nav-link dropdown-toggle" href="about.php" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name; ?></span>
                <img class="img-profile rounded-circle" src="<?php echo $imguser; ?>" style="width:50px;height:50px;">
              </a>
                <div class="menu-container">

                  <div class="circle dark inline">
                    <i class="icon ion-navicon"></i>
                  </div>

                  <div class="list-menu">
                    <i class="icon ion-close-round close-iframe"></i>
                    <div class="intro-inner">
                      <ul id="nav-menu">
                        <li><a href="management_post.php">Management Post</a></li>
                        <li><a href="newpost.php">Creat new Post</a></li>
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
              		 <h1 class="wow fadeIn" data-wow-delay="0.6s">New Post</h1>
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
          <h4 class="mt-4 mb-3"> New Post </h4>
         
          <div class="form-group">
           <div class="form-group">
            <label for="name">Title</label>
            <input type="text" class="form-control" id="name"  placeholder="Enter Title" name="title" >
          </div>
          <div class="form-group">
            <label for="name">Content</label>
            <input type="text" class="form-control" id="email"  placeholder="Enter Content" name="content" >
          </div>
          <div class="form-group">
            <label for="name">Datetime</label>
            <input type="datetime" class="form-control" name="datetime" >
          </div>
          <div class="form-group">
            <label for="name">Category</label>
            <input type="text" class="form-control" name="category" >
          </div>
          <div class="form-group">
            <label for="name">Image</label>
            <input type="file" class="form-control" id="image"  placeholder="Upload image" name="image" >
          </div>
          <button type="submit" class="btn btn-primary">Create</button>
    </form>
	
      </div>
         	</div>
            </div>
            </section>


<!-- Footer section
================================================== -->
<?php include('footer.php')?>