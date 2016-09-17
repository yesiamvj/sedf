<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{echo'
<html>

	<link rel="stylesheet" href="../web/'.$_SESSION['css'].'chngppiccss.css"/>
<body>
	<div id="chngppicbt" ><input type="file" id="profpicchnge" style="display: none" />
                              <div id="changepicwind" onclick="$(\'#chngppic\').fadeOut();"></div><div id="chngpichold"><div id="chngbrdr">
                              <div id="chngpicttl">Change your profile Picture</div><div id="chngppicclsctn" onclick="$(\'#chngppic\').fadeOut();">X</div>
                              <div id="menubarofpic">
                              <span id="uploadfrombt" class="menuitem" onclick="updtppic()">Upload Profile Picture</span>
                              <span id="uploadfrombtn" class="menuitem" >Choose from Albums</span>
                              '; echo'</div>
                               <div id="targetdiv">
                               </div>
                               </div></div>
</body>
</html>';
}
?>