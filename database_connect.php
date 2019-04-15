<?php 
	session_start();
	
	$conn = mysqli_connect("localhost", "root" , "123456", "hgblog");
	if(!$conn) {
		 die('Lỗi kết nối database');
		 }
	
	define ('ROOT_PATH', realpath(dirname(__FILE__)));
	define('BASE_URL', 'http://localhost/HgBlog/');
	
	
	function getUserById(){
		$id = $_SESSION['iduser'];
		if($id) {	
			global $conn;
			$sql = "SELECT * FROM users WHERE users.iduser = ". $id ;
			$result = mysqli_query($conn, $sql);
			$post = mysqli_fetch_assoc($result);
			return $post;	
			}
		else {
			pageNotfound();
		}
	}
	function getPost(){
		global $conn;
		$sql =  "SELECT posts.*, categories.namecate  FROM posts INNER JOIN categories ON posts.cate_id = categories.idcategory"; 
		$result = mysqli_query($conn, $sql);
		$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $posts;
	}
	function getCategories(){
		global $conn;
		$sql = "SELECT * FROM hgblog.categories";
		$result = mysqli_query($conn, $sql);
		$listcate = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $listcate;
	}
	
	function getCommentByPost() {
		$id = $_GET['id'];
		if($id) {	
		global $conn;
		$sql = "SELECT comments.*, users.username, users.imguser  FROM comments INNER JOIN users ON comments.user_id = users.iduser WHERE comments.post_id = ". $id ;
		$result = mysqli_query($conn, $sql);
		$value = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $value;	
		}
		else {
			pageNotfound();
		}
	}
	
	function getPostById(){
		$id = $_GET['id'];
		if($id) {	
		global $conn;
		$sql = "SELECT * FROM posts WHERE posts.idpost = ". $id ;
		$result = mysqli_query($conn, $sql);
		$post = mysqli_fetch_assoc($result);
		return $post;	
		}
		else {
			pageNotfound();
		}

	}
	
	function updateUser($id, $file = array() ){
		$id = $_SESSION['iduser'];
		$name = isset($_POST['name']) ? $_POST['name']:null;
		$email = isset($_POST['email']) ? $_POST['email']:null;
		$pass = isset($_POST['password']) ? $_POST['password']:null;
		
		if(isset($file['image'])){
			$image = $file['image'];
			$img_name = $image['name'];
			$img_tmp = $image['tmp_name'];
		
			//$test = move_uploaded_file($img_tmp, "/images/".$img_name) ;
		} else {
			
			array_push($errors, 'Image not found');
		}
		$img = "images/".$img_name;
		global $conn;
		$sql = "UPDATE hgblog.users SET username ='$name',email='$email', password ='$pass', imguser='$img' WHERE iduser='$id' ";
			$result = mysqli_query($conn,$sql);
			if($result) 
				header('location: '.BASE_URL.'about.php');
	}
	
	function updatePost($id, $file = array() ){
		$id = $_GET['id'];
		$title = isset($_POST['title']) ? $_POST['title']:null;
		$content = isset($_POST['content']) ? $_POST['content']:null;
		$datetime = isset($_POST['datetime']) ? $_POST['datetime']:null;
		if(isset($file['image'])){
			$image = $file['image'];
			$img_name = $image['name'];
			$img_tmp = $image['tmp_name'];
		
			//$test = move_uploaded_file($img_tmp, "/images/".$img_name) ;
		} else {
			
			array_push($errors, 'Image not found');
		}
		$img = "images/".$img_name;
		global $conn;
		$sql = "UPDATE hgblog.posts SET title ='$title',content='$content', datetime ='$datetime', imgpost='$img' WHERE idpost='$id' ";
			$result = mysqli_query($conn,$sql);
			if($result) 
				header('location: '.BASE_URL.'management_post.php');
	}
	
	function createPost($file = array() ){
		$title = isset($_POST['title']) ? $_POST['title']:null;
		$content = isset($_POST['content']) ? $_POST['content']:null;
		$datetime = isset($_POST['datetime']) ? $_POST['datetime']:null;
		$idcate = isset($_POST['category']) ? $_POST['category']:null;
		if(isset($file['image'])){
			$image = $file['image'];
			$img_name = $image['name'];
			$img_tmp = $image['tmp_name'];
		
			//$test = move_uploaded_file($img_tmp, "/images/".$img_name) ;
		} else {
			
			array_push($errors, 'Image not found');
		}
		$img = "images/".$img_name;
		global $conn;
		$sql = "INSERT INTO hgblog.posts(title,content,datetime,imgpost,cate_id) VALUE ('$title','$content','$datetime','$img','$idcate') ";
			$result = mysqli_query($conn,$sql);
			if($result) 
				header('location: '.BASE_URL.'management_post.php');
	}
	

?>