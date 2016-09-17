<!DOCTYPE html>
<?php session_commit();

{
       if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
       {
              
       }else
       {
              include '../web/title_bar.php';
       }
    
 
require_once '../web/mysqli_connect.php';
   $q="SELECT user_id as u from users where username='$user_name'";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
      $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
      $user_id=$row['u'];
      if(empty($user_id))
      {
        header("location:photos.php");
      }else
      {
    $nowuser=$_SESSION['my_photos'];
    if($user_name!==$nowuser)
    {
        $_SESSION['my_photos']=$user_name;
$url='../'.$user_name.'/photos.php?username='.urlencode($user_name);
           
    header("location:$url");

    }
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
   <script src="../web/jquery.min.js" type="text/javascript"></script>
   <script src="../web/photos.js" type="text/javascript"></script>
  </head>
  
  <body>
      <div id="content-full">
          <div id="Topest">
                
              
          <div id="Mytitle_bar">

                      <font id="MysedfedUserName" >'.$f_name.'</font>

                    </div>
      </div>
         
              
                 <div id="howThisPersonStuffs" >
                  <a href="../web/people_post.php?user='.$user_id.'"><div class="secNavToolItm">
                             Posts
                         </div></a>
                         <a href="../web/show_rels_of_pers.php?user='.$user_id.'"><div class="secNavToolItm">
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
                          <a href="people_post.php"><div class="secNavToolItm">
                             Posts
                         </div></a>
                          <a href="blog.php"><div class="secNavToolItm">
                             Blog
                         </div></a>
                        </div>
                        
                        
                    </div>
          <div class="storageOutHolder">
                  <div class="storageInrHolder">
                      ';
$p_pic='../'.$user_name.'/ppic25.jpg';
echo'<div class="Title_Storage">
                                <div id="whose_storage">
                         <img src="'.$p_pic.'" style="max-width:50px;max-height:50px;"/><span id="photo_user">'.$f_name.'\'s Photos</span>
                             </div>
</div>
                 <div class="fileLocationUrl">
                          www.sedfed.com/'.$user_name.'/photos
                      </div> 
                      <div id="data-fileCount" style="display: none">
                          5 <!-- this div is used to hold how many files -->
                      </div>
                      <div class="fileSomeActions">
                         
                      </div>
                      <div class="StorageCont">
                          <div class="folderContainer" id="fileHolder1" onclick="showpostimages(\''.$user_id.'\',\'prf\')">
                              <input type="checkbox" class="fileCheck" id="file1" onchange="imSelectd()"/>
                              <img class="img-folder" src="../web/icons/sf-storage-folder.png" alt="folder"/>  
                              <div class="folderName"  id="file1Name">
                                 Post Images
                              </div>
                          </div>
                          <div class="folderContainer" id="fileHolder2" onclick="show_prof_pics(\''.$user_id.'\',\'profile\')">
                              <input type="checkbox" class="fileCheck" id="file2" onchange="imSelectd()"/>
                              <img class="img-folder" src="../web/icons/sf-storage-folder.png" alt="folder"/>  
                              <div class="folderName" id="file2Name">
                                  Profile Pictures
                              </div>
                          </div>
                          <div class="folderContainer" id="fileHolder3"onclick="show_my_wall_pics(\''.$user_id.'\',\'profile\')" >
                              <input type="checkbox" class="fileCheck" id="file3" onchange="imSelectd()"/>
                              <img class="img-folder" src="../web/icons/sf-storage-folder.png" alt="folder"/>  
                              <div class="folderName" id="file3Name"> 
                                  Wallpapers
                              </div>
                             
                          </div>
                          <div class="folderContainer" id="fileHolder4" onclick="showmystsimgs(\''.$user_id.'\')" >
                              <input type="checkbox" class="fileCheck" id="file4" onchange="imSelectd()"/>
                              <img class="img-folder" src="../web/icons/sf-storage-folder.png" alt="folder"/>  
                              <div class="folderName" id="file4Name"> 
                                  Status Image
                              </div>
                             
                          </div>
                          
                        <!--  <div class="ToolTipOuter" id="testTt" style="display: none" >
                              <div class="TtFileArrow"></div>
                          <div class="ToolTipImg">
                              sabari.jpg <br/>
                              <div class="TtfileSize"> 1.8 MB </div>
                          </div>
                          </div> -->
                          
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
            <div id="aboutImgPreview"  onmouseover="show_post_dets()" onclick="$(\'#abtImgOut\').toggle(200)" >
                  <div>...</div>
              </div>
              <div id="dwnldImg"  >
                  <img src="../web/icons/post-media-download.png" class="hyticos" />
              </div>
            <div id="abtImgOut" style="display: none" >
                <div id="abtImgIn">
                    <div class="abtItm" id="like_cnt">Like <span class="respCount" id="mlike"></span> </div>
                    <div class="abtItm" id="unlike_cnt">Unlike <span class="respCount" id="munlike"></span></div>
                    <div class="abtItm" id="cmnt_cnt">Comment <span class="respCount" id="mshare"></span></div>
                    <div class="abtItm" id="rate_cnt">Rate</div>
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
                      <img class="currentImage" title="" id="curImgInFocus" alt="" />
                      <input type="hidden" value="" id="cur_post_id" /> 
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
     <div id="sts_rslt" style="display:none;"></div>
      
  </body>
</html>
';
}
?>