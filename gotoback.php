<?php

if(empty($_REQUEST['q']))
{
    header("location:index.php");
}else
{
    $user_id=$_REQUEST['q'];
    require 'mysqli_connect.php';
    $q="select username as u from users where user_id=$user_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        $row=  mysqli_fetch_array($r,MYSQLI_ASSOC);
        $use_name=$row['u'];
    }
    echo ' <div class="folderContaine" id="fileHolder1" onclick="showpublicfoleder(\''.$use_name.'\')">
                              
                              <img class="img-folder" src="../web/icons/sf-storage-folder.png" alt="folder"/>  
                              <div class="folderName" id="file1Name">
                                  Public Folder
                              </div>
                          </div>';
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
                              <img class="img-folder" src="../web/icons/sf-storage-folder.png" alt="'.$folders.'"/>  
                              <div class="folderName" id="fileName'.$cnts.'" onclick="$(\'#pvtFolderPass\').slideUp();">'.$folders.'</div>
                             
                          </div>';
                              }
                              echo'<input type="hidden" id="totnofol" value="'.$cnts.'">';
                            }else
                            {
                            
                            }
                          }
}
?>