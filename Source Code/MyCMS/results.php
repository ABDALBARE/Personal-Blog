<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>A new Platform</title>
<link rel="stylesheet" href="styles/style.css" media="all">
	 <title>Log In</title>
</head>

<body>
<div class="container">

	<div class ="head">
    	<img id="logo" src='images/logo.png'/>
        <img id="banner"src='images/banner.jpg'/>
	</div> <!--head ends here-->
    
		<!--navbar starts here-->
    	 <?php include("includes/nav_bar.php");?>
  		<!--navbar ends here-->
    
      <!--post _area starts here-->
	
<div class="post_area">
<div class="post_head">
    	<p>Popular Posts</p>
    </div>
    	<?php
		if(isset($_GET['search'])){
			$get_query = $_GET['search_query'];
			$get_posts = "select*from posts where post_keywords like '%$get_query%'";
			
			if($get_query==''){
				echo"<script>alert('Please write a keyword')</script>";
			}
			else{
			$run_posts = mysql_query($get_posts);
			while($row_post=mysql_fetch_array($run_posts)){
				$post_id=$row_post['post_id'];
				$post_title=$row_post['post_title'];
				$post_date=$row_post['post_date'];
				$post_author=$row_post['post_author'];
				$post_image=$row_post['post_image'];
				$post_content = substr($row_post['post_content'],0,300);
			
			
			echo("
			    <div class=\"img_content\">
			    	<img src=\"images/$post_image\"/>
		    	</div>
				<div class=\"content\">
					<h3 class=\"headline\">$post_title</h3>
					<em class=\"adrs\">Posted By: $post_author</em>&nbsp;
					<em class=\"emp\">$post_date &nbsp; </em>
				<div class=\"post_content\">
					$post_content
				</div>
				<a href=\"details.php?post=$post_id\">Read More</a>	
					
				</div>
			");
			
			}
		}
	}
	
	

		?> 
</div><!--post-area ends here-->
  	  <!--post-area ends here-->
    
<!--
   	 <div class="middle_content">
   	 something hkjl ll;;;
   	 </div> <!--middle_content ends here-->
   
   	<!--sidebar starts here-->
    	<?php include("includes/side_bar.php");?>
    <!--sidebar ends here-->
    
    <div class="footer_area">
    	<h4>&copy; All Rights Reserved 2015 -taufiqur.ruet@gmail.com</h4>
    </div><!--footer_area ends here-->

</div> <!--div class container ends here-->
</body>
</html>
