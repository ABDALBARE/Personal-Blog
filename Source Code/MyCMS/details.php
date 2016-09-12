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
    
	<!--nav bar starts here-->
		  <?php include("includes/nav_bar.php");?>
	 <!--nav bar ends here-->
    
    <div class="post_area">
    	<div class="post_head">
    	<p>Detailed Post</p>
    </div>
   	<?php
		if(isset($_GET['post'])){
				$post_id = $_GET['post'];

			$get_posts = "select*from posts where post_id={$post_id}";
			$run_posts = mysql_query($get_posts);
			while($row_post=mysql_fetch_array($run_posts)){
				$post_title=$row_post['post_title'];
				$post_date=$row_post['post_date'];
				$post_author=$row_post['post_author'];
				$post_image=$row_post['post_image'];
				$post_content = $row_post['post_content'];
			
			
			echo("
				   <h3 class=\"headline\">$post_title</h3>
					<em class=\"adrs\">Posted By: $post_author</em>&nbsp;
					<em class=\"emp\">$post_date &nbsp; </em>
			    	<img src=\"images/$post_image\" style=\"height: 450px; width: 100%;\"/>
				<div class=\"detail_post_content\" style=\"background: #FFFFFF; padding: 7px;margin-top: 5px;\">
					$post_content
				</div>	
					
			");
			
			}
		}
    ?> 
      <?php include("includes/comment_form.php");?>
    </div><!--post-area ends here-->
    
<!--
        <div class="middle_content">
    something hkjl ll;;;
    </div> <!--middle_content ends here-->
    
    <!--sidebar starts here-->
    	<?php include("includes/side_bar.php");?>
    <!--sidebar ends here-->
    
    <div class="footer_area">
    <h5>&copy; All Rights Reserved 2015 -taufiqur.ruet@gmail.com</h5>
    </div><!--footer_area ends here-->

</div> <!--div class container ends here-->
</body>
</html>
