<?php 
	include ('database_connect.php');
 	include ('header.php'); 
 	$name = $_SESSION['name'];
	$imguser = $_SESSION['imguser'];
	$iduser = $_SESSION['iduser'];
	$user = getUserById();
	$posts = getPost(); 
	$listcate = getCategories();
	
	
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name; ?></span>
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

<section id="header" class="header-one">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8">
          <div class="header-thumb">
              <h1 class="wow fadeIn" data-wow-delay="1.6s">HOME</h1>
              <h3 class="wow fadeInUp" data-wow-delay="1.9s">"Yesterday is History,</h3>
				<h3 class="wow fadeInUp" data-wow-delay="1.9s">Tomorrow is a Mystery,</h3>
				<h3 class="wow fadeInUp" data-wow-delay="1.9s">But, Today is a Gift"</h3>
          </div>
			</div>

		</div>
	</div>		
</section>

<!-- Portfolio section
================================================== -->
<section id="portfolio">
   <div class="container">
      <div class="row">

         <div class="col-md-12 col-sm-12">
            
               <!-- iso section -->
               <div class="iso-section wow fadeInUp" data-wow-delay="2.6s">
                  <ul class="filter-wrapper clearfix">
                  <li><a href="#" data-filter="*" class="selected opc-main-bg">All</a></li>
                  <?php  foreach ($listcate as $key => $cate) { ?>
                           <li><a href="#" class="opc-main-bg" data-filter=".<?php echo $cate["namecate"] ?>"><?php echo $cate["namecate"] ?></a></li>
                           <?php }?>
             
                        </ul>

                        <!-- iso box section -->
                        <div class="iso-box-section wow fadeInUp" data-wow-delay="1s">
                           <div class="iso-box-wrapper col4-iso-box">
							<?php  foreach ($posts as $key => $post) { ?>
                              <div class="iso-box <?php echo $post["namecate"] ?> branding col-md-4 col-sm-6">
                                 <div class="portfolio-thumb">
                                    <img src="<?php echo $post["imgpost"] ?>" style="width:500px;height:500px;" class="img-responsive" alt="Portfolio">
                                       <div class="portfolio-overlay">
                                          <div class="portfolio-item">
                                                <a href="<?php echo BASE_URL.'post.php?id='.$post['idpost'] ?>"><i class="fa fa-link"></i></a>
                                                <h2><?php echo $post["title"] ?></h2>
                                             </div>
                                       </div>
                                 </div>
                              </div>
                              <?php } ?>


                            
                            </div>
                        </div>

               </div>

         </div>

      </div>
   </div>
   
</section>

<!-- Footer section
================================================== -->


<?php include ('footer.php'); ?>