<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
  header("location:index.php");
}else
{
$user_id=$_SESSION['user_id'];
$user_name=$_SESSION['user_name'];
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
    <link rel="stylesheet" href="myStorage.css"/>
    
    
    
   <script src="angular.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="mystorage.js" type="text/javascript"></script>
  </head>
  
  <body>
        <input type="hidden" value="'.$user_id.'" id="useridvals"/>
            
      <div id="content-full">
          <div id="pageLoadStatus"></div>
          <div id="Topest">
                <div id="title_bar">
                    <font id="sedfed" >'.$user_name.'</font>
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
                            <a href="loggedin.html">  <div  class="hTP-holders">
                                <img src="icons/prof-posts.png" alt="Like This Person" /><span id="meLikes">&nbsp;&nbsp; Posts</span> 
                        </div>
                                </a> 
                        <a href="storage.php">
                        <div  class="hTP-holders">
                            <img src="icons/prof-files.png" alt="Like This Person" /><span id="meRates">&nbsp;&nbsp; Storage</span>
                        </div>
                            </a> 
                        <a href="photos.php"> 
                            <div  class="hTP-holders">
                            <img src="icons/prof-images.png" alt="Like This Person" /><span id="meUnlikes">&nbsp;&nbsp; Photos</span>
                        </div>
                            </a>
                        <a href="photos.php">
                        <div  class="hTP-holders">
                            <img src="icons/prof-video.png" alt="Like This Person" /><span id="meComments">&nbsp;&nbsp; Videos</span>
                        </div>
                            </a> 
                           <a href="wall.ph">
                        <div  class="hTP-holders">
                           
                            <img src="icons/prof-giftbox.png" alt="Like This Person" /><span id="meShares">&nbsp;&nbsp; Wishes</span>
                        </div>
                            </a> 
                        </div>
                        
                        
                    </div>
              <div class="storageOutHolder">
                  <div class="storageInrHolder">
                      <div class="Title_Storage">
                          '.$user_name.'\'s Storage
                      </div>
                      <div class="fileLocationUrl">
                          www.sedfed.com/'.$user_name.'/
                      </div>
                      <div id="data-fileCount" style="display: none">
                          5 <!-- this div is used to hold how many files -->
                      </div>
                      <div class="fileSomeActions">
                          <div class="fileActItem" onclick="expSomeAct(\'new\')" id="btn-FSAnf" >New Folder</div>
                          <div class="fileActItem" onclick="expSomeAct(\'old\')" id="btn-FSArenme">Rename</div>
                      

                          <div class="fileActItem" onclick="doDelete()" >Delete</div>
                           
                          <div class="fileActItem"> <input id="doSelectAll" type="checkbox" onchange="selectAllFiles()" />Select All</div>
                          
                          <div class="fileActItem"> <input id="doSelectInv" type="checkbox" onchange="iselectAllFiles()" />Invert Selection</div>
                          <div id="forRenameText" class="expAct" style="display: none">
                              New name for Selected folder<input type="text" class="renameInp" placeholder="Type new name" id="renameInpTxt"/><button class="sf-btn" onclick="renamefolder(\'#renameInpTxt,\'renameInpTxt\')" >Rename</button>
                          </div>   
                          <div id="forNewFoldrText" class="expAct" style="display: none">
                              Name for New folder<input type="text" class="renameInp" placeholder="Type new folder name" id="NewFoldInpTxt" /><button class="sf-btn" onclick="createNewFolder()">Create New Folder</button>
                          </div>   
                          
                      </div>
                      <div class="StorageCont" id="folderconts">
                          <div class="folderContainer" id="fileHolder1" onclick="showpublicfoleder(\''.$user_id.'\')">
                              
                              <img class="img-folder" src="icons/sf-storage-folder.png" alt="folder"/>  
                              <div class="folderName" id="file1Name">
                                  Public Folder
                              </div>
                          </div>
                        ';
                          require 'mysqli_connect.php';
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
                                echo'<div class="folderContainer" id="fileHolder'.$cnts.'" onclick="openfolder(\''.$folders.'\',\''.$passwrd.'\')">
                              <input type="checkbox" class="fileCheck" id="file'.$cnts.'" value="'.$folders.'" onclick="renamefolder(1,this.id)"/>
                              <img class="img-folder" src="icons/sf-storage-folder.png" alt="folder"/>  
                              <div class="folderName" id="file3Name"> 
                                  '.$folders.'
                              </div>
                             
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
                      <div class="win-pass-ok" onclick="checkpass()">
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
      <div id="refresh" >
          <a href="http://localhost:8383/SedFed-2/storage.html">Refresh</a>
      </div>
     
  </body>
</html>';
}
?>
