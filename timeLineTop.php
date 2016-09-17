<?php
    $user_id=$_SESSION['user_id'];
    $user_name=$_SESSION['user_name'];
    $full_name=$_SESSION['myfullname'];
     //$user_name=$_GET['username'];
     
     $f_name=$owner_username;
     $viewer_id=$user_id;
      $q="SELECT user_id as u from users where username='$owner_username'";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
      
     if(mysqli_num_rows($r)>0)
      {
         $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
     
          
            $owner_id=$row['u'];
            
            $qs="select first_name as fn from basic where user_id=$owner_id";
            $rs=  mysqli_query($dbc, $qs);
            if($rs)
            {
	  if(mysqli_num_rows($rs)>0)
	  {
	         $ro=  mysqli_fetch_array($rs,MYSQLI_ASSOC);
	         $owner_fname=$ro['fn'];
	  }
            }
   
      }else
      {
    echo '<script>window.location.href=\'home.php\'</script>';
      }
			
      $today = date("g:i a ,F j, Y"); 
      $iam=0;
      if($owner_id!==$viewer_id)
      {
          $iam=1;
       
      }
    }else
    {
        header("location:home.php");
    }
    
       $sm=0;
   
    require_once '../web/mysqli_connect.php';
    $today = date("g:i a ,F j, Y"); 
    		 
      $q="insert into history(profile_view,user_id,time,seen)values($viewer_id,$owner_id,'$today',0)";
       $r=mysqli_query($dbc,$q);
       if($r)
       {
              
       }  else {
echo mysqli_error($dbc);              
}
     $sun="select nick_name as nname,first_name as fs  from basic where user_id=$owner_id";
        $rsun=mysqli_query($dbc,$sun);
        if($rsun){
             if(mysqli_num_rows($rsun)>0)
            {
                $rowfn=mysqli_fetch_array($rsun,MYSQLI_ASSOC);
                $owner_nickname=$rowfn['nname'];
                $owner_fname=$rowfn['fs'];
                
             
            }else{
              $owner_nickname="";
              $owner_fname="";
            }
        }
    echo '  
   <script src="../web/jquery.min.js" type="text/javascript"></script>
    <script src="../web/profile_new.js" type="text/javascript"></script>
     <link type="text/css" href="../web/ppl_thtr.css" rel="stylesheet" />
  
 <div class="secondaryNavTtlBar">
                      <a href="../web/people_post.php?user='.$owner_id.'"><div class="secNavToolItm">
                             Posts
                         </div></a>
                         <a href="../web/show_rels_of_pers.php?user='.$owner_id.'"><div class="secNavToolItm">
                             Relations
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
                              <a href="wall.php"><div class="secNavToolItm">
                             Wishes
                         </div></a>
                         
                          <a href="blog.php"><div class="secNavToolItm">
                             Blog
                         </div></a>
	        
                          <a href="profile.php?username='.$owner_username.'"><div class="secNavToolItm">
                             About
                         </div></a>
	        
                        
	       
                         
                        
                    </div>
                            
<div class="mainProfileHold">
                <div class="MP_WallPic" style="background-image: url(\'../'.$owner_username.'/wpic75.jpg\')" >
                    <img src="../'.$owner_username.'/ppic75.jpg" class="profileImageOnMP" />
                   
                </div>
                 <div class="MP_MyName">
                        <span class="myRealName">'.$owner_fname.'</span>   
                        <span class="myNickName">'.$owner_nickname.'</span>
                        <span class="mySignature"><span class="sf_dollarSign" >$</span>'.$owner_username.'</span>
                        <span class="myImpActs">
	       ';
    if($_SESSION['user_id']!=$owner_id)
	       {
            echo '
                        <button class="myLinkToRel" onclick="addrelinprf(\''.$owner_id.'\',\''.$f_name.'\')">';
	       
                                include '../web/add_rels_in_prlf.php';

                        echo ' </button>  <button class="myLinkToRel" id="sendMsgBtn" onclick="$(\'#chat_user_window\').fadeToggle();" >
                            Message
                        </button>';
	       
	         echo'  <div class="theaterTexts" id="TheaterNewRel" style="display: none;" >
                                           <div class="thtrTxtIn">
                                               <div class="thtrTtl">
                                                   Need Relation ?<div class="thtrTxtClose" onclick="$(\'#TheaterNewRel\').fadeOut();" >X</div>
                                               </div>
                                              
                                               <div class="thtrCont"> ';
                                if($req==1 || $mycnct==1)
                                {
                                    if($mycnct==1)
                                    {
                                         echo'<div id="rmvcnct" style="cursor:pointer;" onclick="rmvcnctppl(\''.$user_id.'\',0)">Remove Contact</div>';
                            
                                    }else
                                    {
                                        if($req==1)
                                        {
                                             echo'<div id="rmvcnct" style="cursor:pointer;" onclick="rmvcnctppl(\''.$user_id.'\',1)">Delete Request</div>';
                            
                                        }
                                    }
                                 
                                    
                                  
                                 }
                                echo'
                                                   <div class="reqSendIn">';
                                                    if($req==1)
                                                    {
                                                        echo 'Update';
                                                    }else
                                                    {
                                                        echo 'Add';
                                                    }
                                                    echo'&nbsp;&nbsp; <span id="targetReqst"  >'.$owner_fname.' </span> to my relations as
                                                       <select id="addRelType" onchange="addRelOther()" >
                                                        <option>Friends</option>
                                                        <option>Family</option>
                                                        <option>Enemy</option>
                                                        <option>Special</option>
                                                        <option>Unknown</option>
                                <option value="classmate" >Classmates</option>
                                <option value="other" >Other</option>
                            </select> 
                                                       <input type="hidden" value="" id="nowuser" />
                                                       <div  class="othrGrps" id="orGroup" style="display: none;">
                                                           &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            Or  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <input class="inp_th" type="text" placeholder="Other Group" />
                                                       </div>          
                                                       <div class="othrGrps" id="classGroup"  >
                                                           &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            as  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <input class="inp_th" id="mysavesnm" type="text" placeholder="Save this person name as " />
                                                       </div>          
                                                       
                        </div>
                                                   <div class="thtrPrcd"  onclick="addrelsinprfprcs(\''.$owner_id.'\',\'#mysavesnm\',\'#addRelType\',\''.$owner_fname.'\')" >
                                                     ';  
                                                    if($req==1 || $mycnct==1)
                                                     {
                                                         echo'Update Details';
                                                     }else
                                                     {
                                                         echo'Send Request';
                                                     }
                                                  echo' </div>
                                               </div>
                                           </div>
                                       </div>';
	      
		     
    }else
    {
        echo '<a href="../web/start_profile.php"><button class="myLinkToRel">Edit Profile</button></a>';
    }
	      
                        echo '
                          
                        </span>
                    </div>';
 $q="select position as p,orany as orn,nmoforg as org from cur_position where user_id=$owner_id";
$r=mysqli_query($dbc,$q);
if($r)
{
  if(!empty($row=mysqli_fetch_array($r,MYSQLI_ASSOC)))
  {
       $org=$row['org'];
    
    if(isset($row['orn'])){
        $position=$row['orn'];
    }
   if(isset($row['p'])){
       $position=$row['p'];
    }
    
    
    
  }else
  {
    $position="";
    
    $org="";
  
  }
}
                        echo '
                <div class="MP_Position">
                    '.$position.' - '.$org.'
                </div>
                   </div>';
?>