<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="style.css" />
</head>

<body>
	<div class="wrapper">
    	<div id="header">
        </div><!--header ends here-->
        <div class="left"><h2 style="margin-bottom: 75px; font-weight:lighter;">Manage content</h2>
            <p><a href="index.php">Admin Panel</a></p>
        	<p><a href="index.php?insert_post">Insert New Post</a></p>
            <p><a href="index.php?view_posts">View all posts</a></p>
<!--
             <p><a href="index.php?insert_cat">Insert New Category</a></p> 
             <p><a href="index.php?view_cats">View all Categories</a></p> 
             <p><a href="index.php?view_comments">View all Comments</a></p> 
             <p><a href="index.php?logout">Admin Logout</a></p> 
-->
        </div><!--left ends here-->
        
        <div class="right">
        	<!-- <span style="padding:10px;"> <strong style="color:#000;">To do Tasks:</strong> <p style="color:red;padding-left:10px;"> Pending Comments(0)</p></span>
	        	-->
			  <?php 
				if(isset($_GET['insert_post'])){
					include("insert_post.php");
				}
				if(isset($_GET['view_posts'])){
					include("view_posts.php");
				}
				if(isset($_GET['edit_post'])){
					include("edit_post.php");
				}				
			   ?>
        </div>
    </div><!--wraper ends here-->
</body>
</html>

