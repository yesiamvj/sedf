<?php session_start();
if(empty($_GET['username']))
{
  header("location:strg.php");
}else
{
$use_name=$_GET['username'];
 require '../web/mysqli_connect.php';
 $q="select user_id as u from users where username='$use_name'";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
      $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
      $user_id=$row['u'];
      }

     $uname="select first_name as fname from basic where user_id=$user_id";
    $runnm=mysqli_query($dbc,$uname);
             if($runnm)
             {
                 if(mysqli_num_rows($runnm)>0)
                 {
                     $rownm=mysqli_fetch_array($runnm);
                     $user_name=$rownm['fname'];
                 }else
                 {
                     $selemail="SELECT email as em from users where user_id=$user_id";
                     $rinemail=mysqli_query($dbc,$selemail);
                     if($rinemail)
                     {
                         $rowemail=mysqli_fetch_array($rinemail);
                         $user_name=$rowemail['em'];
                     }
                 }
             
}
$iam=0;
if(isset($_SESSION['user_id']) || isset($_SESSION['user_name']))
{
    if($_SESSION['user_id']==$user_id)
    {
    $iam=1;     
    }  else {
    $iam=2;    
    }
   
}

echo '
<!DOCTYPE html>
<html>
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
       <!-- <meta http-equiv="Content-Language" content="en-US" />
       <!-- <meta http-equiv="Author" content="Vijayakumar for SedFed" /> -->  
    <title> </title>
    <link rel="stylesheet" href="../web/myStorage.css"/>
    
    
    
   <script src="../web/angular.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="../web/cpstorage.js" type="text/javascript"></script>
  </head>
  
  <body>
  <input type="hidden" value="1" id="prevent_click"/>
                   
      <div id="content-full">
          <div id="pageLoadStatus"></div>
          <div id="Topest">
                <div id="title_bar">
                    <font id="sedfed" >'.$user_name.'</font>
                    <input type="hidden" value="'.$user_id.'" id="useridvals"/>
              <div id="searchbar" >
                  <form>
                      <input id="srchbar" type="text" autofocus/>
                      <input id="proceedsrch" type="submit" value="Search"/>
                  </form>
              </div>
             <div id="logout">
                  <button id="logoutbtn">Logout</button>
              </div>
            </div>
          <div id="Mytitle_bar">
              <font id="MysedfedUserName" >'.$user_name.'</font>
                    </div>
      </div>
          <div id="innerPageCont">
                 <div id="howThisPersonStuffs" >
                       <div id="innerHTP">
                            <a href="files.php">  <div  class="hTP-holders">
                                <img src="../web/icons/prof-posts.png" alt="Like This Person" /><span id="meLikes">&nbsp;&nbsp; Files</span> 
                        </div>
                                </a> 
                        <a href="storage.php">
                        <div  class="hTP-holders">
                            <img src="../web/icons/prof-files.png" alt="Like This Person" /><span id="meRates">&nbsp;&nbsp; Storage</span>
                        </div>
                            </a> 
                        <a href="photos.php"> 
                            <div  class="hTP-holders">
                            <img src="../web/icons/prof-images.png" alt="Like This Person" /><span id="meUnlikes">&nbsp;&nbsp; Photos</span>
                        </div>
                            </a>
                        <a href="photos.php">
                        <div  class="hTP-holders">
                            <img src="../web/icons/prof-video.png" alt="Like This Person" /><span id="meComments">&nbsp;&nbsp; Videos</span>
                        </div>
                            </a> 
                          ';
                           if($iam==2 || $iam==1)
                           {
                               echo' <a href="../'.$_SESSION['user_name'].'/storage.php"> <div  class="hTP-holders">
                            <img src="../web/icons/prof-files.png" alt="My " /><span id="meShares">&nbsp;&nbsp; My Storage</span>
                        </div>
                            </a> ';
                           }
                       
                       echo' </div>
                        
                        
                    </div>
              <div class="storageOutHolder">
                  <div class="storageInrHolder">
                      <div class="Title_Storage">
                          '.$user_name.'\'s Storage
                      </div>
                      <div class="fileLocationUrl">
                          www.sedfed.com/'.$use_name.'/storage
                      </div>
                      <div id="data-fileCount" style="display: none">
                          5 <!-- this div is used to hold how many files -->
                      </div>';
if($iam==1)
{
      echo' <div class="fileSomeActions" id="for_menubar_cont">
                          <div class="fileActItem" onclick="expSomeAct(\'new\')" id="btn-FSAnf" >New Folder</div>
                          <div class="fileActItem" onclick="doRename(\''.$user_id.'\',this.id)" id="btn-FSArenme">Rename</div>
                         
                        
                          <div class="fileActItem" onclick="$(\'#fordeltFoldrText\').fadeToggle();" >Delete</div>
                        <div class="fileActItem"onclick="gotoback(\''.$user_id.'\')"> Refresh</div>
                        
                          <div id="forRenameText" class="expAct" style="display: none">
                              New name for Selected folder<input type="text" class="renameInp" placeholder="Type new name" id="renameInpTxt"/><button class="sf-btn" onclick="doRename()" >Rename</button>
                          </div>   
                          <div id="forNewFoldrText" class="expAct" style="display: none">
                              Name for New folder<input type="text" class="renameInp" placeholder="Type new folder name" id="NewFoldInpTxt" /><button class="sf-btn" onclick="createNewFolder()">Create New Folder</button>
                          </div>   
                              <div id="fordeltFoldrText" class="expAct" style="display: none">
                             Delete Folder <input type="text" class="renameInp" placeholder="Type folder name to delete" id="deleteFoldInpTxt" /><button class="sf-btn" onclick="DeleteFolder()">Delete</button>
                          </div>   
                          
                      </div>';
}
                       
                      echo'
                      <div class="StorageCont" id="folderconts" >
                          <div class="folderContainer" id="fileHolder1" onclick="showpublicfoleder(\''.$use_name.'\')">
                              
                              <img class="img-folder" src="../web/icons/sf-storage-folder.png" alt="folder"/>  
                              <div class="folderName" id="file1Name">
                                  Public Folder
                              </div>
                          </div>
                        ';
                          
                          $q="SELECT folder_name as fname,passwd as p from myfolders where user_id=$user_id";
                          $r=mysqli_query($dbc,$q);
                          if($r)
                          {
                            if(mysqli_num_rows($r)>0)
                            {
                              $cnts=0;
                              while($rows=mysqli_fetch_array($r,MYSQLI_ASSOC))
                              {
                                $folders=$rows['fname'];
                                $cnts=$cnts+1;
                                $passwrd=$rows['p'];
                                echo'<div class="folderContainer" id="fileHolder'.$folders.'" onclick="openfolder(\''.$folders.'\',\''.$passwrd.'\')">
                              <input type="hidden"  class="fileCheck" id="file'.$cnts.'" value="'.$folders.'" onclick="renamefolder(1,this.id)"/>
                              <img class="img-folder" src="../web/icons/sf-storage-folder.png" alt="'.$folders.'"/>  
                              <div class="folderName" id="fileName'.$cnts.'" onclick="$(\'#pvtFolderPass\').slideUp();">'.$folders.'</div>
                             
                          </div>';
                              }
                              echo'<input type="hidden" id="totnofol" value="'.$cnts.'">';
                            }else
                            {
                            
                            }
                          }
                         echo' <div id="copyfilesdiv" ></div><input type="hidden" id="totfilcnt" value=""><div class="fileContainer">
                              <div class="fileItem" id="fileHolder5" onclick="//download the file" title="Click to download" >
                              </div>
                          </div>
                      </div><div id="folderfiles"></div><div id="tresult"></div>
                  </div>
                  
              </div>
              <div class="win-pass-outer" id="pvtFolderPass" style="display: none;" >
                 
                  <div class="win-pass-in">
                       <div class="win-pass-ttl">
                      Access Private Folder
                      <div class="closeXwin" onclick="$(\'#pvtFolderPass\').slideUp();" >
                          X
                      </div>
                  </div>
                      <div class="win-pass-cont">
                          <div class="win-pass-hint">
                              You will get a Notification when you access the folder
                          </div>
                          <div class="win_pass_mcont">
                              <span id="pwttl">Enter Private Folder Password</span>
                              <br/>
                              <input id="pvtFoldPassInp" class="passWordInp" type="password" />
                          </div>
                      </div>
                      <div class="win-pass-ok" onclick="checkpass(\''.$user_id.'\')">
                          Proceed
                      </div>
                  </div>
                  
                  <input type="hidden" id="fldrnm" value="">
              </div>     
              <div class="win-pass-outer" id="securedFolderPass" style="display: none;" >
                 
                  <div class="win-pass-in">
                       <div class="win-pass-ttl">
                      Access Secured Folder
                      <div class="closeXwin" onclick="$(\'#securedFolderPass\').slideUp();" >
                          X
                      </div>
                  </div>
                      <div class="win-pass-cont">
                          <div class="win-pass-hint">
                              You will get a Notification when you access the folder
                          </div>
                          <div class="win_pass_mcont">
                              Enter Secured Folder Password
                              <br/>
                              <input id="secFoldPassInp" class="passWordInp" type="password" />
                          </div>
                      </div>
                      <div class="win-pass-ok">
                          Proceed
                      </div>
                  </div>
              </div>     
          </div>
      </div>
     <div id="for_rmv_files"></div>
     <input type="hidden" value="0" id="tot_rmv_file_cnt" /> 
     <input type="hidden" value="1" id="my_cut_val" />
  </body>
</html>';
}

?>
