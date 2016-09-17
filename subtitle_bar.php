<?php session_commit();
$user_name=$_SESSION['user_name'];
echo '
    <div id="Mytitle_bar">

                      <font id="MysedfedUserName" >'.$user_name.'</font>

                    </div>   
<div class="secondaryNavTtlBar">
 
                         <a href="../web/show_rels_of_pers.php?user='.$user_id.'"><div class="secNavToolItm">
                             Relations
                         </div></a>
	        
                         <a href="../web/people_post.php?user='.$user_id.'"><div class="secNavToolItm" onclick="show_his_post('.$user_id.')">
                             Posts
                         </div></a>
                         <a href="storage.php"><div class="secNavToolItm">
                             Storage
                         </div></a>
                         <a href="photos.php"><div class="secNavToolItm">
                             Photos
                         </div></a>
                         <a href="videos.php"><div class="secNavToolItm">
                             Videos
                         </div></a>
	        <a href="files.php"><div class="secNavToolItm">
                             Files
                         </div></a>
                         <a href="wall.php?user='.$user_id.'"><div class="secNavToolItm">
                             Wishes
                         </div></a>
	         <a href="blog.php?username='.$user_name.'"><div class="secNavToolItm">
                             Blog
                         </div></a>
                         
                        
                    </div>
                    </div>';
?>