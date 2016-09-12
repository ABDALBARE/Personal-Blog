<?php
include("../includes/database.php");
?>
<?php

function flag_error($fieldname, $errstr) {
     global $fields_with_errors, $errors;
     $fields_with_errors[$fieldname] = 1;
     $errors[$fieldname] = $errstr;
}

function has_error ($fieldname) {
     global $fields_with_errors;
     if (isset($fields_with_errors[$fieldname])) {
        return true;
     } else {
      return false;
     }
}

$errors = array();
// Get Submitted variables
if(isset($_POST['submit'])){
		$post_title = mysql_real_escape_string($_POST['post_title']);
		$post_cat = mysql_real_escape_string($_POST['cat']);
		$post_author = mysql_real_escape_string($_POST['post_author']);
		$post_keywords = mysql_real_escape_string($_POST['post_keywords']);
		/* get the image file*/
		$post_image = $_FILES['post_image']['name'];
		$post_image_tmp = $_FILES['post_image']['tmp_name'];
		$post_content = mysql_real_escape_string($_POST['post_content']);
		
     // error checking
     if ( trim($post_title) == '') {
          flag_error ('post_title', 'Please enter post title.');
     }
     if ($post_cat==0) {
          flag_error ('cat', 'Please select post category.');
      }
     if ( trim($post_author) == '') {
          flag_error ('post_author', 'Please enter an author name.'); 
        } /*  elseif (eregi('[^a-z0-9]', $post_author)) {
          flag_error ('post_author', 'Author name is not valid.');
        }  */
     if (trim($post_keywords) == '') {
          flag_error ('post_keywords', 'Please enter a post keyword.');
        }		
     if (trim($post_image) == '') {
          flag_error ('post_image', 'Please choose a photo.');
        }
     if (trim($post_content) == '') {
          flag_error ('post_content', 'Please enter post <br/>content. ');
        }
	if (count ($errors) == 0){
		// SUCCESS!
		
		move_uploaded_file($post_image_tmp,"../images/$post_image");
		$insert_posts = "insert into posts(category_id,post_title,post_date,post_author,post_keywords,post_image,post_content) values('$post_cat','$post_title',sysdate(),'$post_author','$post_keywords','$post_image','$post_content') ";
		$run_posts = mysql_query($insert_posts);
		 echo"<script>alert('Post Has Been Published')</script>";
		echo "<script>window.open('insert_post.php','_self')</script>";
		
	}


}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert New Post</title>
<link rel="stylesheet" href="../styles/insert_post.css" media="all">
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
	tinymce.init({selector:'textarea'});
</script>
</head>

<body>
	<form action="insert_post.php" method="post" enctype="multipart/form-data">
    	<table width="800" align="center" border="2">
        	<tr>
            	<td colspan="2" align="center" bgcolor="#003366"><h1>Insert New Post </h1>
                </td>
            </tr>
            
           	<tr>
            	<td class="text">Post Title: </td>
                <td class="putHere"><input type="text" name="post_title" 
                value="<?php if (isset($post_title)) print($post_title);?>"/>
                
                <?php if (has_error('post_title')) print('<span class="error">*'.$errors['post_title'].'</span>'); ?>                                        
                </td>
            </tr>
            
           	<tr>
            	<td class="text">Post Category: </td>
                <td>
                	<select name="cat">
                    	<option>Select a category:</option>
                    	<?php
								$get_cats="select * from categories";
								$run_cats=mysql_query($get_cats);
				
								while($cats_row=mysql_fetch_array($run_cats)){
								$cat_id=$cats_row['cat_id'];
								$cat_title=$cats_row['cat_title'];
								echo "<option value='$cat_id'>$cat_title</option>";
					
							}
						?>
                    </select> 
                     <?php if (has_error('cat')) print('<span class="error">*'.$errors['cat'].'</span>'); ?>
                </td>
            </tr>
            
          	<tr>
            	<td class="text">Post Author: </td>
                <td><input type="text" name="post_author"            
                 value="<?php if (isset($post_author)) print($post_author);?>"/>
               
                <?php if (has_error('post_author')) print('<span class="error">*'.$errors['post_author'].'</span>'); ?>
                </td>
            </tr>
             
         	<tr>
            	<td class="text">Post Keyword: </td>
                <td><input type="text" name="post_keywords"                
                 value="<?php if (isset($post_keywords)) print($post_keywords);?>"/>
                
                <?php if (has_error('post_keywords')) print('<span class="error">*'.$errors['post_keywords'].'</span>'); ?>
                </td>
            </tr>
            
           	<tr>
            	<td class="text">Post Image: </td>
                <td><input type="file" name="post_image"                  
                value=""/>
                
                <?php if (has_error('post_image')) print('<span class="error">*'.$errors['post_image'].'</span>'); ?></td>
            </tr>   
            
           	<tr>
            	<td class="text">Post Content:
			<?php if (has_error('post_content')) print"<br/>".('<span class="error">*'.$errors['post_content'].'</span>'); ?>
                 </td>
               <td> <textarea name="post_content" rows="8" cols="40"/>
                <?php if (isset($post_content)) print($post_content);?>
               </textarea>
               </td>
            </tr>          
            
           	<tr>
                <td colspan="2" align="center" bgcolor="#003366"><input type="submit" name="submit" value="Publish Now" /></td>
            </tr>
        </table>
    </form>

</body>
</html>

 




