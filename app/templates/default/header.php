<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in index.php?></title>
	<link href="<?php echo url::get_template_path();?>css/style.css" rel="stylesheet">
</head>

<body>
	<div id="header">
	  <div id="headercontent">

	    <div id="title">
		<?php
		if(isset($_SESSION['smvc_baby']) && $_SESSION['smvc_baby'] == true){
                  define('DB_NAME','BabyBlog');
	          echo '<h1><a href="#">木木成长日记 </a></h1>';
	          echo '<p> 大家好，我叫木木，希望和大家交朋友～～ </p>';
		}else {
    		  define('DB_NAME','ShawnBlog');
	    	  echo '<h1><a href="#">'."Shawn's Blog". "</a></h1>";
	    	  echo '<p>God helps those who help themselves</p>';
	        }
		?>
	    </div>

	    <!-- #### Top menu #### -->
	    	    
	    <div id="babypage">
        <a href="<?php echo DIR.'baby'?>"> <img src="<?php echo url::get_template_path();?>css/images/baby.png" align="top"> </span></a>
	    </div>
	    
	    <div id="topmenu">
	      <ul>
		      <li><a href="<?php echo DIR.''?>"><span>Blog</span></a></li>	
		      <li><a href="#"><span>About</span></a></li>	
		      <li><a href="#"><span>Contact</span></a></li>	
		      <?php 
		        if(Session::get('loggin') == true) 
		          echo "<li><a href='".DIR."admin/logout'><span>Logout</span></a></li>";
		        else
		          echo "<li><a href='".DIR."admin/login'><span>Login</span></a></li>";
		      ?>
		      
	      </ul>	
	    </div>


	  </div>
  </div>
  
  <!-- #### Start of the main content #### -->
  <div id="container">


