 <div class="sidebar">
    <div class="post_head">
    	<p>Recent Posts</p>
    </div>
    	<?php
			$get_posts = "select*from posts order by 1 desc LIMIT 0,5";
			$run_posts = mysql_query($get_posts);
			while($row_post=mysql_fetch_array($run_posts)){
				$post_id=$row_post['post_id'];
				$post_title=$row_post['post_title'];
				$post_image=$row_post['post_image'];
			
			
			echo("
			
				<div class=\"content\">
					<h3 class=\"headline\">$post_title</h3>
					
				</div>
				<a href=\"details.php?post=$post_id\">
				 <div class=\"img_content\">
			    	<img src=\"images/$post_image\"/>
		    	</div>
			</a>	
			");
			
			}
			
		?> 
</div><!--sidebar ends here-->