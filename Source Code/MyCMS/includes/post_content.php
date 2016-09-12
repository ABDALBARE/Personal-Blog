
<div class="post_area">
<div class="post_head">
    	<p>Popular Posts</p>
    </div>
    	<?php
		if(!isset($_GET['cat'])){
			$get_posts = "select*from posts order by rand() LIMIT 0,5";
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
	
	if(isset($_GET['cat'])){
			   $cat_id = $_GET['cat'];
			$get_posts = "select*from posts where category_id='$cat_id'";
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
					<em class=\"emp\">$post_date &nbsp; Comments(2) </em>
				<div class=\"post_content\">
					$post_content
				</div>
				<a href=\"details.php?post=$post_id\">Read More</a>
				
					
				</div>
			");
			
			}
	}

				
			
		?> 
		
</div><!--post-area ends here-->