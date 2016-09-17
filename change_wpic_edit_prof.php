<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{echo'
<html>

	<link rel="stylesheet" href="'.$_SESSION['css'].'chngppiccss.css"/>
<body>
	<div id="chngppicbt" ><input type="file" id="profpicchnge" style="display: none" />
                              <div id="changepicwind"></div><div id="chngpichold"><div id="chngbrdr">
                              <div id="chngpicttl">Change your Wall Picture</div><div id="chngppiccctn" onclick="$(\'#chngppic\').fadeOut();">X</div>
                              <div id="menubarofpic">
                              <span id="uploadfrombt" class="menuitem" onclick="openchngwallpic()">Upload from computer</span>
                              <span id="uploadfrombtn" class="menuitem" onclick="showmy_pre_wall_pics()" >Choose from Albums</span>
                              </div>
                               <div id="targetdiv">
                               </div>
                               </div></div>
</body>
</html>';
}
?>