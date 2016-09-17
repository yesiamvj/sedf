<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{
       $prof=$_REQUEST['prof'];
       if($prof=="in_prf")
       {
              echo '<link rel="stylesheet" href="../web/'.$_SESSION['css'].'chngppiccss.css"/>';
       }else
       {
               echo '<link rel="stylesheet" href="'.$_SESSION['css'].'chngppiccss.css"/>';
       }
       echo'
<html>

	
<body>
	<div id="chngppicbt" ><input type="file" id="profpicchnge"  />
                              <div id="changepicwind"></div><div id="chngpichold"><div id="chngbrdr">
                              <div id="chngpicttl">Change your profile Picture</div><div id="chngppicclsctn" onclick="$(\'#chngppic\').fadeOut();">X</div>
                              <div id="menubarofpic">
                              <span id="uploadfrombt" class="menuitem" onclick="updtppic()">Upload Profile Picture</span>
                              <span id="uploadfrombtn" class="menuitem" onclick="showmy_pre_pics()" >Choose from Albums</span>
                              </div>
                               <div id="targetdiv">
                               </div>
                               </div></div>
</body>
</html>';
}
?>