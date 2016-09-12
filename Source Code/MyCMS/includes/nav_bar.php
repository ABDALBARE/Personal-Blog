<div class="navbar">
   <ul id="menu">
  
        		<li> <a href="index.php">Home</a></li>
	  <?php
		 	include("includes/database.php");
			$get_cats="select * from categories";
			$run_cats=mysql_query($get_cats);
				
			while($cats_row=mysql_fetch_array($run_cats)){
				$cats_id=$cats_row['cat_id'];
				$cats_title=$cats_row['cat_title'];
				echo"<li><a href='index.php?cat=$cats_id'>$cats_title</a></li>";
					
			}
	  ?>
 

  </ul> 
         
         <div id="form">
         	<form action="results.php" method="get" enctype="multipart/form-data">
            	<input type="text" name="search_query" />
                <input type="submit" name="search" value="Search Now" />
            </form>
         </div>     
    	
  </div><!--nav bar ends here-->        