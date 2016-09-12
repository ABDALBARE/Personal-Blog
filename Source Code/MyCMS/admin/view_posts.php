<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
	th,tr,td,table{
		padding:0;
		margin: 0;
		color: #000;
	}
	th{
		border-left:2px solid #000;
		background:#990;
	}
	h2{
		padding: 4px;
	}
	td{
		text-align:center;
		border-bottom: 1px dotted #999;
	}
	table a{
		text-decoration:none;
	}
	table a:hover{
		text-decoration:underline;
		color:#990;
	}
</style>
</head>

<body>
	<table align="center"  width="780" >
    	<tr>
        	<td colspan="7" align="center"bgcolor="#003366"><h2 style="color:#FFFFFF;font-size:2em">View all Posts Here</h2></td>
        </tr>
    	<tr>
        	<th>Post ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Image</th>
            <th>Comments</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
          
          <?php
		  	include("../includes/database.php");
			$get_posts = "select*from posts";
			$run_posts = mysql_query($get_posts);
			while($row_posts = mysql_fetch_array($run_posts)){
				$post_id=$row_posts['post_id'];
				$post_title=$row_posts['post_title'];
				$post_author=$row_posts['post_author'];
				$post_image=$row_posts['post_image'];
				
		
		  ?>
                
        <tr>
        	<td><?php echo $post_id;?></td>
            <td><?php echo $post_title;?></td>
            <td><?php echo $post_author;?></td>
            <td><img src="../images/<?php echo $post_image;?>" width="60" height="50"/></td>
            <td><?php
					$get_comments = "select*from comments where post_id='$post_id'";
					$run_comments = mysql_query($get_comments);
					$count = mysql_num_rows($run_comments);
					echo"$count"; 
				?> 
             </td>
            <td><a href="index.php?edit_post=<?php echo $post_id;?>">Edit</a></td>
            <td><a href="delete_post.php?delete_post=<?php echo $post_id;?>">Delete</a></td>
        </tr>
        <?php } ?>
        
    </table>
</body>
</html>