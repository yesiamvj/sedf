
<?php session_start();
if(empty($_SESSION['user_id']) && empty($_SESSION['user_name']) && empty($_REQUEST['prfuserid']))
{
	header("location:index.php");
}else
{
  $m=0;
  if(empty($_SESSION['user_id']))
  {
    $user_id=$_REQUEST['prfuserid'];
  }else
  {
    
    if(isset($_SESSION['user_id']) && isset($_REQUEST['prfuserid']))
    {

      if($_SESSION['user_id']==$_REQUEST['prfuserid'])
      {
        $m=$m+1;
        $user_id=$_SESSION['user_id'];
        
      }else
      {
        $user_id=$_REQUEST['prfuserid'];
      }
    }
  }
	
	require 'mysqli_connect.php';
	
	$fname=$_REQUEST['fn'];
        
       
    if($m==1)
        {
        echo'<input type="file" id="brfiles" onchange="filesto_upload(this,\''.$fname.'\')" multiple="multiple" style="display: none;" ><div class="UploadProgOut" style="display:none">
          <div class="UpLdProgCont">
              <div class="UPLD_Ttl">Files To Upload</div>
              <div class="UPLD_Cont">
                  
              </div>
              <div class="Upld_Prcd" onclick="uploadfiles(\''.$fname.'\')"  >
                  Upload Now
              </div>
              <div class="Upld_Prcd" onclick="$(\'.UploadProgOut\').fadeOut()" style="background-color: crimson;" >
                  Cancel
              </div>
          </div>
      </div>';
          echo'<div id="foldname">'.$fname.'</div>';
          
          echo'
  <div class="pfmenubar" ><div id="menuitem" onclick="$(\'#brfiles\').click();">Add Files</div>
  <div id="menuitem" class="upldfls" style="display:none;" >Upload to Folder<img src="" class="Ldricn" style="position:absolute;display:none;"  width="25" height="25" /></div>';
          
             $q="select media as m,size as s from copied_files where user_id=$user_id";
        $r=mysqli_query($dbc,$q);
        if($r)
        {
            $cp=0;
            if(mysqli_num_rows($r)>0)
            {
                
                echo'<div class="copied_files" style="position:absolute;display:none;">';
                while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
                {
                        $cp=$cp+1;
                    $media=$row['m'];
                    $size=$row['s'];
                    echo '<div class="copied_items">'.substr($media,2,  strlen($media)).'  '.$size.'</div>';
                }
                echo'</div>';
            }
        }
                  echo'<div id="menuitem" onclick="copyfiles(\''.$fname.'\',\''.$user_id.'\')" title="You can paste these files later from your Folders">Copy to your folder</div>'
                  . '<div id="menuitem" onclick="$(\'#setpassdivs\').fadeToggle();">Update Password</div>';
                  if($cp>0)
                  {
                      echo'<div id="menuitem" class="paste_item" onmouseover="$(\'.copied_files\').fadeIn();" onmouseout="$(\'.copied_files\').fadeOut();" onclick="pastefiles(\''.$fname.'\')">Paste '.$cp.' files</div>';
                  }
                          echo ''
                  . '<div id="menuitem"  onclick="gotoback(\''.$user_id.'\')">Back</div>'
                                  . '<div id="menuitem" class="delete_item"  onclick="deletefiles(\''.$user_id.'\')">Delete</div>'
                  . '<div id="menuitem"   onclick="openfolder(\''.$fname.'\',\'da39a3ee5e6b4b0d3255bfef95601890afd80709\')">Refresh</div>';
  
echo'</div>
<div id="setpassdivs" style="display:none;"><input type="password" id="oldpass" placeholder="Current Password" />&nbsp;&nbsp;&nbsp;<input type="password" placeholder="New Password" id="newpass" />&nbsp;&nbsp;&nbsp;<div id="menuitem" onclick="setpassprcs()">Change</div><span class="pwresult"></span></div>';
echo'
<script type="text/javascript">
$(document).ready(function()
{
    $("#for_menubar_cont").fadeOut();
});
</script>';
   }  else {
   if(!empty($_SESSION['user_name']) && !empty($_SESSION['user_name']))
   {
         echo'<div id="foldname">'.$fname.'</div>';
          
          echo'
  <div class="pfmenubar" >
  '
                  . '<div id="menuitem" class="copy_item" onclick="copyfiles(\''.$fname.'\',\''.$user_id.'\')" title="You can paste these files later from your Folders">Copy to your folder</div>'
                  . ''
                  . '<div id="menuitem"  onclick="gotoback(\''.$user_id.'\')">Back</div>'
                  . ''
                  . '<div id="menuitem"   onclick="openfolder(\''.$fname.'\',\'da39a3ee5e6b4b0d3255bfef95601890afd80709\')">Refresh</div>';
  
echo'</div>
';
echo'
<script type="text/javascript">
$(document).ready(function()
{
    $("#for_menubar_cont").fadeOut();
});
</script>';
   }else
   {
       echo'<div id="foldname">'.$fname.'</div>';
          
          echo'
  <div class="pfmenubar" >';
                  
                          echo '
                   <div id="menuitem"  onclick="gotoback(\''.$user_id.'\')">Back</div></div>';
   }
   }

		


  $q1="SELECT folder_id as fid from myfolders where user_id=$user_id and folder_name='$fname'";
  
  $r1=mysqli_query($dbc,$q1);
  if($r1)
  {
  	$rt=mysqli_fetch_array($r1,MYSQLI_ASSOC);
  	$folder_id=$rt['fid'];
  	$q2="SELECT media as m,fc_id as fid,time as t ,size as s from folder_contents where folder_id=$folder_id order by fc_id desc";
  	$r2=mysqli_query($dbc,$q2);
  	if($r2)
  	{
  		if(mysqli_num_rows($r2)>0)
  		{
                    echo'<div id="files_container">';
        $cnt=0;
        while($rows=mysqli_fetch_array($r2,MYSQLI_ASSOC))
        {
          $files=$rows['m'];
         
          $orig_file=  strpos($files, "storage");
          $orig_file=  substr($files, $orig_file,  strlen($files));
          $med_id=$rows['fid'];
          $size=$rows['s'];
          $cnt=$cnt+1;
			$time=$rows['t'];
			$size=$size/1024;
			
			$size=substr($size,0,4);
			$size="$size KB";
			if($size>1000)
			{
				$size=$size/1000;
				$size="$size MB";
			}
			$file=substr($files,3,strlen($files));
			
          $ck=0;
          
          $file_name=$file;
          if(strlen($file)>40)
          {
              $file=substr($file,0,40);
              $file="$file...";
          }
                $f1_format=substr($file_name,strlen($file_name)-3,strlen($file_name));

      if($f1_format=="png" || $f1_format=="jpg" || $f1_format=="gif" || $f1_format=="ico")
      {
        $ico="icons/photo.png";
        $ck=1;
      }
      if($f1_format=="mp3" || $f1_format=="wav" || $f1_format=="mid")
      {
        $ico="icons/music.png";
        $ck=2;
      }
      if($f1_format=="mp4" || $f1_format=="3gp" || $f1_format=="mkv")
      {
        $ico="icons/video.png";
        $ck=3;
      }
      if($f1_format=="pdf")
      {
        $ico="icons/pdf.png";
        $ck=4;
      }
      if($f1_format=="ptx")
      {
        $ico="icons/fileformat/ptx.png";
        $ck=5;
      }
      if($f1_format=="txt")
      {
        $ico="icons/fileformat/txt.png";
        $ck=6;
      }

        
        if($ck!==1 && $ck!==2 && $ck!==3 && $ck!==4 && $ck!==5 && $ck!==6 )
        {
          $ico="icons/ufile.png";
        }
        echo'<div id="filesoffolder" class="my_file'.$med_id.'"><input type="checkbox" class="'.$size.'" value="'.$med_id.'" id="med'.$cnt.'"><a href="'.$files.'" download="SedFed/'.$file_name.'"><img src="../web/'.$ico.'" width="25" alt="'.$ico.' " height="25"> '.$file.''
                . '.<span id="tims"><font color="black">'.$size.'</font> '.$time.'</span>'
                . '<a href="'.$orig_file.'" download="SedFed/'.$file_name.'"><span id="dwnld_icn">'
                . '<img src="../web/icons/post-media-download.png" width="25" height="25">'
                . '</span></a></div>'
                
                . '</a>';
        echo''; 
        }
        echo'<input type="hidden" value="'.$cnt.'" id="totckval"/>';
        
        echo'</div>';
  		}else{
if($m!==0)
{
    echo "<br/>This folder is empty";
    
}else
{
      echo "<div class=\"folder_name\">This folder is empty</div>";
    
}
  		}
  	}else
  	{
  		echo "not run";
  	}
  }
  else
  	{
  		echo "not run st";
  	}
		
	
}

?>