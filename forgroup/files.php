<!DOCTYPE html>
<?php session_start();
if(empty($_GET['page']))
{
  header("location:strtfiles.php");
}else
{
 
require '../web/mysqli_connect.php';
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
        
 }  else {
        include '../web/title_bar.php';       
 }
  $page_name=$_GET['page'];
   $q="SELECT page_id as p,user_id as u from pages where page_name='$page_name'";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
      $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
      $user_id=$row['u'];
      $page_id=$row['p'];
      if(empty($user_id))
      {
        header("location:files.php");
      }else
      {
   
  }
}

$uname="select first_name as fname from basic where user_id=$user_id";
 $runnm=mysqli_query($dbc,$uname);
 if($runnm)
 {
     if(mysqli_num_rows($runnm)>0)
     {
         $rownm=mysqli_fetch_array($runnm);
         $f_name=$rownm['fname'];
     }else{
         $selemail="select email as em from users where user_id=$user_id";
         $rinemail=mysqli_query($dbc,$selemail);
         if($rinemail)
         {
             $rowemail=mysqli_fetch_array($rinemail);
             $f_name=$rowemail['em'];
         }
     }
 }
 $q="select page_pic as m from pages where page_id=$page_id";
$r=mysqli_query($dbc,$q);
if($r)
{
    if(mysqli_num_rows($r)>0)
    {
        $ry=  mysqli_fetch_array($r,MYSQLI_ASSOC);
        $p_pic=$ry['m'];
       
        #$p_pic=  substr($p_pic, $cut,  strlen($p_pic));
    }else
    {
        $p_pic="";
    }
}

echo'
<html>
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta http-equiv="Content-Language" content="en-US" />
       <!-- <meta http-equiv="Author" content="Vijayakumar for SedFed" /> -->  
    <title> </title>
    <link rel="stylesheet" href="../web/photos.css"/>
   <script src="../web/angular.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="../web/photos.js" type="text/javascript"></script>
  </head>
  
  <body>
      <div id="content-full">
         ';
  if(empty($_SESSION['user_id']) && empty($_SESSION['user_name']))
	    {
	           
	            $q="select prof_Theme as thm,theme_txt_color as theme_txt_color from settings_profile where user_id=$user_id";
           $r=  mysqli_query($dbc, $q);
           if($r)
           {
	 if(mysqli_num_rows($r)>0)
	 {
	      $roed=  mysqli_fetch_array($r,MYSQLI_ASSOC);
	      $theme=$roed['thm'];
	      $theme_txt_color=$roed['theme_txt_color'];
	 }else
	 {
	        $theme="#008b8b";
	        $theme_txt_color="#ffffff";
	        
	        
	 }
		       
           }
	           echo '  <div id="Topest" >
                
                <div id="title_bar" style="background-color:'.$theme.'";color:'.$theme_txt_color.' >
                
                    <font id="sedfed" >'.$f_name.'</font>
         
              
              <div id="logout">
                  <button id="logoutbtn">Logout</button>
              </div>
              
            </div>
              
          <div id="Mytitle_bar">

                      <font id="MysedfedUserName" >'.$f_name.'</font>

                    </div>
      </div>
         ';
	    }
	     echo '     
          <div id="Mytitle_bar">

                      <font id="MysedfedUserName" >'.$f_name.'</font>

                    </div>';
echo '
              
               <div id="howThisPersonStuffs" >
                     <div id="innerHTP">
                            <a href="files.php">  <div  class="hTP-holders">
                                <img src="../web/icons/ufile.png" alt="Like This Person" /><span id="meLikes">&nbsp;&nbsp; Files</span> 
                        </div>
                                </a> 
                      
                        <a href="photos.php"> 
                            <div  class="hTP-holders">
                            <img src="../web/icons/prof-images.png" alt="Like This Person" /><span id="meUnlikes">&nbsp;&nbsp; Photos</span>
                        </div>
                            </a>
                        <a href="videos.php">
                        <div  class="hTP-holders">
                            <img src="../web/icons/prof-video.png" alt="Like This Person" /><span id="meComments">&nbsp;&nbsp; Videos</span>
                        </div>
                            </a> 
                         
                        </div>
                        
                        
                    </div>
          <div class="storageOutHolder">
                  <div class="storageInrHolder">
                      <div class="Title_Storage">
                  <div id="whose_storage">
                         <img src="'.$p_pic.'" style="max-width:50px;max-height:50px;"/><span id="photo_user">'.$page_name.'\'s Files</span>
                             </div>
                      </div>
                 <div class="fileLocationUrl">
                          www.sedfed.com/'.$page_name.'/Files
                      </div> 
                      <div id="data-fileCount" style="display: none">
                          5 <!-- this div is used to hold how many files -->
                      </div>
                      <div class="fileSomeActions">
                         
                      </div>
                      <div class="StorageCont">
                          <div class="folderContainer" id="fileHolder1" onclick="showpostpdfs(\''.$user_id.'\','.$page_id.')" >
                              <input type="checkbox" class="fileCheck" id="file1" onchange="imSelectd()"/>
                              <img class="img-folder" src="../web/icons/sf-storage-folder.png" alt="folder"/>  
                              <div class="folderName"  id="file1Name">
                                 Post Pdfs
                              </div>
                          </div>
                          <div class="folderContainer" id="fileHolder2" onclick="showpostfiles(\''.$user_id.'\','.$page_id.')" >
                              <input type="checkbox" class="fileCheck" id="file2" onchange="imSelectd()"/>
                              <img class="img-folder" src="../web/icons/sf-storage-folder.png" alt="folder"/>  
                              <div class="folderName" id="file2Name">
                                  Post Files
                              </div>
                          </div>
                       
                         
                          
                      
                          
                          <div class="imagesContainer" id="imagesContainer">
                              
                               
                          </div>
                         
                      </div>
                  </div>
                  
              </div>
          
          
          <!--image threater starts -->
          
        <div class="imageViewerOut" id="imageViewer" style="display: none">
            
              <div id="closeImgPreview" onclick="closeImageViewer()" >
                  X
              </div>
            <div id="aboutImgPreview"  onmouseover="$(\'#abtImgOut\').show(200)" onclick="$(\'#abtImgOut\').toggle(200)" >
                  <div>...</div>
              </div>
              <div id="dwnldImg"  >
                  <img src="../web/icons/post-media-download.png" class="hyticos" />
              </div>
            <div id="abtImgOut" style="display: none" >
                <div id="abtImgIn">
                    <div class="abtItm">Like <span class="respCount" id="mlike">56</span> </div>
                    <div class="abtItm">Unlike <span class="respCount" id="munlike">78</span></div>
                    <div class="abtItm">Share <span class="respCount" id="mshare">67</span></div>
                    <div class="abtItm">Show as Post</div>
                </div>
            </div>
              <div class="imageViewerIn">
                  <div class="iVToolsOut" onclick="changeFocusImg(\'prev\')" >
                      
                          <div class="iVT-item" >
                              <img id="photos-prev" src="../web/icons/photos_prev.png" onmouseover="$(\'#prevImgPre\').fadeIn(1000)" onmouseout="$(\'#prevImgPre\').fadeOut(1000)" />
                          </div>
                     
                  </div>
                  <div class="photoSmallPreview" id="prevImgPre" >
                      <img  class="photosGetReady" id="photos-prev_rdy"  />
                  </div> 
                   
                  <div class="imageCont" id="focusImageOut" >
                      <div id="everPrev"></div>
                      <div id="everNext"></div>
                      <div class="imgNameM" id="imgNameM" ><marquee id="curFocusImgName" >sabari</marquee></div>
                      <img class="currentImage" id="curImgInFocus" alt="" />
                  </div>
                  
                  
                  <div class="photoSmallPreview" id="nextImgPre" onmouseover="">
                      <img class="photosGetReady" id="photos-next_rdy"/>
                  </div> 
                  <div class="iVToolsOut" id="photos_prevOut"  onclick="changeFocusImg(\'next\')" >
                     
                          <div class="iVT-item">
                              <img id="photos-next" src="../web/icons/photos_next.png" onmouseover="$(\'#nextImgPre\').fadeIn(1000)" onmouseout="$(\'#nextImgPre\').fadeOut(1000)"/>
                          </div>
                      </div>
                  
              </div>
          </div>
          
      </div>
     
      
  </body>
</html>
';
}
?>