<?php 
	include("includes/database.php");
	/*get a comment posted by form*/
	if(isset($_POST['submit'])){
		$post_id = (int)$_GET['post'];
		$comment_name = $_POST['comment_name'];
		$comment_email = $_POST['comment_email'];
		$comment = $_POST['comment'];
		$stauts = "approved";
		if($comment_name=='' OR $comment_email=='' OR $comment==''){
			echo"<script>alert('Please fill in all blanks!')</script>";
		}
		else{
			$query_comment = "insert into comments(post_id,comment_name,comment_email,comment_text,status) 		 
			                  values('$post_id','$comment_name','$comment_email','$comment','$stauts')";
			$run_query = mysql_query($query_comment);
			echo"<script>alert('Your comment is published !')</script>";
	    }
	
	}
	/*show previous comments*/
	$get_commetns = "select*from comments where post_id='$post_id' AND status='approved'";
	$run_comments = mysql_query($get_commetns);
	while($row_comments=mysql_fetch_array($run_comments)){
		$comment_name=$row_comments['comment_name'];
		$comment_text=$row_comments['comment_text'];
		echo"<br/><p style=\"background:#CCC;padding: 10px; color: #FF0000; border: 1px solid #DDD;\">$comment_name<i> says-----------------------</i></p>";
		echo"<p style=\"background:#FFFFFF;padding: 10px;\">$comment_text</p>";
	}

?>

<div class="comment">
      	<form method="post" action="details.php?post=<?php echo $post_id; ?>">
        	<h2> Comments So Far
            <?php
				/*count comments*/
				$get_commetns = "select*from comments where post_id='$post_id' AND status='approved'";
				$run_comments = mysql_query($get_commetns);
				$count = mysql_num_rows($run_comments);
				echo"(".$count .")";
			?>
            
            </h2>
        	<table>
            	<tr>
                	<td>Your Name</td>
                    <td><input type="text" name="comment_name"  /></td>
                </tr>
            	<tr>
                	<td>Your Email</td>
                    <td><input type="email" name="comment_email"  /></td>
                </tr>            	
               	<tr>
                	<td>Your Comment</td>
                    <td><textarea name="comment" cols="50" rows="12"  ></textarea></td>
                </tr>        
            </table>
            <input type="submit" name="submit" value="Post Comment" />
        </form>
      </div>
    	<!--comment ends here-->
 
 
