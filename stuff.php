

<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{
         $user_id=$_SESSION['user_id'];
         require 'mysqli_connect.php';
         $q3="select first_name as f from basic where user_id=$user_id";
	 $r3=  mysqli_query($dbc, $q3);
	 if($r3)
	 {
	        if(mysqli_num_rows($r3)>0)
	        {
	               $rt=  mysqli_fetch_array($r3,MYSQLI_ASSOC);
	               $my_name=$rt['f'];
	        }else
	        {
	               $my_name="";
	        }
	 }
	     $q="select update_pics as p from profile_pics where user_id=$user_id order by pic_id desc limit 1";
                      $r=mysqli_query($dbc,$q);
                      if($r)
                      {
                          
                          if(mysqli_num_rows($r)>0)
                          {
                              $rpw=mysqli_fetch_array($r,MYSQLI_ASSOC);
                              $ppics=$rpw['p'];
                              
                              
                          }  else {
                               $ppics="icons/male.png"; 
                          }
                      }
	      $q="select lock_pass as lp,locked as lk from person_config where user_id=$user_id";
	       $r=  mysqli_query($dbc,$q);
	       if($r)
	       {
	              if(mysqli_num_rows($r)>0)
	              {
		    $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
		    $password=$row['lp'];
		    $locked=$row['lk'];
	              }  else {
		$locked=0;    
	              }
	       }else
	       {
	              $password="";
	       }   
         echo '
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="mainBar.js" type="text/javascript"></script>
    <link rel="stylesheet" href="'.$_SESSION['css'].'mainBar.css"/> <div class="myAccountLeftWindow" id="MYACCOUNTLEFTPANEEE" >
          <div class="MALW_sedfed_Ttl_Bar">
              sedfed
          </div>
          <div class="MALW_sedfed_SubTtl_Bar">
             <a href="../'.$_SESSION['user_name'].'"> <div class="MALW_SubTtl_Itm">
                  Profile
              </div></a>
              <!--<a href=""><div class="MALW_SubTtl_Itm">
                  Diary
              </div> -->
              <a href="people.php"><div class="MALW_SubTtl_Itm">
                  People
              </div></a>
             <a href="my_messages.php"> <div class="MALW_SubTtl_Itm">
                  Messages
              </div></a>
              <a href="../'.$_SESSION['user_name'].'/storage.php"><div class="MALW_SubTtl_Itm">
                  My Storage
              </div></a>
             <a href="../settings.php"><div class="MALW_SubTtl_Itm">
                  Settings
              </div></a>
              
              <div class="MALW_SubTtl_Itm">
                  Help
              </div>
             
          </div>
          <div class="MALW_sedfed_content">
              <div class="MALW_Profile">
                  <img src="'.$ppics.'" class="img_MALW_profPic" />
                  <div class="MALW_ProfileDets">
                     <div class="MALW_sedfed_userFullName">
                         '.$my_name.'
                      </div>
                      <div class="MALW_sedfed_userSignature">
                          <span class="sf_dollar" >$</span> '.$_SESSION['user_name'].'
                          <div class="MALW_sedfed_userId">
                         User ID : '.$user_id.'
                      </div>
                      </div>
                      
                  </div>
              </div>
          </div>';
         
         $q="select page_id as gid,page_name as pnm ,page_pic as page_pic from pages where user_id=$user_id and groups=1";
         $r=  mysqli_query($dbc, $q);
         if($r)
         {
                if(mysqli_num_rows($r)>0)
                {
	      echo ' <div class="MALW_MyGroups">
              <div class="MALW_grpTtl">
                  My Groups
              </div>';
                
	      while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	      {
	             $group_id=$row['gid'];
	             $group_name=$row['pnm'];
	             $page_pic=$row['page_pic'];
	     echo '       
             <a href="../'.$group_name.'">
               <div class="MALW_GrpItm">
                  <img class="img_MALW_grpPic" src="'.$page_pic.'" />
                  <div class="MALW_GrpName">
                      '.$group_name.'
                  </div>
              </div>
                   </a>
             
         ';
		    
	      }
	      echo ' </div>';#end of grp_div
                }
 else {
                    echo 'JEHEBWGBHBJHRGBJHJH';
 }
         }
         else{
             echo 'KJHEFJHBFHBRHFBHRBFHB';
         }
          $q="select page_id as gid,page_name as pnm ,page_pic as page_pic from pages where user_id=$user_id and groups=0";
         $r=  mysqli_query($dbc, $q);
         if($r)
         {
                if(mysqli_num_rows($r)>0)
                {
	      echo ' <div class="MALW_MyGroups">
              <div class="MALW_grpTtl">
                  My Pages
              </div>';
                
	      while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	      {
	             $group_id=$row['gid'];
	             $group_name=$row['pnm'];
	             $page_pic=$row['page_pic'];
	     echo '       
             <a href="../'.$group_name.'">
               <div class="MALW_GrpItm">
                  <img class="img_MALW_grpPic" src="'.$page_pic.'" />
                  <div class="MALW_GrpName">
                      '.$group_name.'
                  </div>
              </div>
                   </a>
             
         ';
		    
	      }
	      echo ' </div>';#end of grp_div
                }
         }
         echo '
         
        
          <div class="MALW_createNewSomeOut">
              <div class="MALW_CNS_InnerTtl">
                  Do Something..
              </div>
              <div class="MALW_ItmTtl">
                  For Me & Relations
              </div>
              <div class="MALW_CNS_Itm" onclick="show_next_step_post()">
                  Create New Post
              </div>
             
              <div class="MALW_CNS_Itm" onclick="open_create_flash()" >
                  Create Flash news
              </div>
              <a href="start_profile.php"><div class="MALW_CNS_Itm">
                  Update / Edit profile
              </div></a>
               <div class="MALW_ItmTtl">
                  For My Crew / Company
              </div>
              <a href="create_grp_page.php"><div class="MALW_CNS_Itm" onclick="open_create_new_group()">
                  Create Group
              </div></a>
              <a href="createpage.php"><div class="MALW_CNS_Itm">
                  Create Page
              </div></a>
              <div class="MALW_ItmTtl">
                  For Messaging
              </div>
               <div class="MALW_CNS_Itm" onclick="open_crt_grp_chat()">
                  New Group Chat
              </div>
               <div class="MALW_CNS_Itm" onclick="open_crt_team_chat()">
                  New Team Chat
              </div>
               <div class="MALW_CNS_Itm">
                  New Stranger Chat
              </div>
             
          </div>';
         echo '
     
           <div id="CreateNewFlash"></div>
         <div id="for_grp_and_team_creat"></div>';
}
?>