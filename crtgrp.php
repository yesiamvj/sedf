<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) || empty($_REQUEST['q']))
{
    header("location:index.php");
}else
{
    
echo '
<html>
    <title>Create Group</title>
    
    
  </head>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="crtgrp.js" type="text/javascript"></script>
   <body>
       <div id="crtgrp"> </div><div id="crtgrpclsbtn" onclick="$(\'#forgroup\').fadeOut();">X</div>
       <div id="crtgrpttl"><div id="innrttl">Create your Group</div>
           <div id="crtgrpcont">
               <div>
              <input type="text" placeholder="Group Name" id="grpnm" />
               </div>
               <div id="grpdisc">
                   <div id="grpdiscwrd">Group Discription </div>
                   <select id="crtgrpdiscopt">
                       <option>Education</option>
                       <option>Entertainment</option>
                       <option>Industrial</option>
                       <option>College</option>
                       <option>School</option>
                       <option>Asking Questions</option>
                       <option>Friends</option>
                       <option>Classmates</option>
                       <option>Advertisement</option>
                       <option>Life</option>
                   </select>
               </div>
               <div id="inviteppl">
                   <div id="invtplspan">Invite your People</div>
                   <div id="invtpplcont" onclick="clkchk(\'ppl1\')"><input id="ppl1" type="checkbox" value="All friends">All Contacts</div>
                   <div id="invtpplcont" onclick="clkchk(\'ppl2\')"><input id="ppl2" type="checkbox" value="All friends">Friends</div>
                   <div id="invtpplcont" onclick="clkchk(\'ppl3\')"><input id="ppl3" type="checkbox" value="All Classmates">Classmates</div>
                   <div id="invtpplcont" onclick="clkchk(\'ppl4\')"><input id="ppl4" type="checkbox" value="All Special">Special</div>
                   <div id="invtpplcont" onclick="clkchk(\'ppl5\')"><input id="ppl5" type="checkbox" value="All Family">Family</div>
                   <div id="invtpplcont" onclick="clkchk(\'ppl6\')"><input id="ppl6" type="checkbox" value="All Enemy">Enemy</div>
               </div>
               <input type="hidden" value=""id="grpaddppl" />
               <div><div  onclick="$(\'#selectppldiv\').fadeIn();$(\'#grpaddppl\').val(\'8\');"  id="srchpplinp"><b>+</b> Add People</div></div>
               <div id="slctdgrpppl" style="display: none;"></div>
               <div id="createbtn" onclick="creategrp()">Create</div>
               
           </div>
       </div> 
   </body>
  
</html>';
}
?>