<?php session_start();

 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
     header("location:index.php");
 }
 else{
  
     echo '

<script type="text/javascript" src="shr_slct_usr.js"></script>
<link rel="stylesheet" href="'.$_SESSION['css'].'srch_user_css_page.css"/>
              <input type="hidden" id="for_share_people" value="23" />
             <input type="hidden" id="chkalrdclkd" value="1">                          
    
              <div id="selectppldiv">
              <div id="selectpplspan">
              Search & Select People
              <button id="selectpplclsbtn" onclick="$(\'#selectppldiv\').fadeOut()">X</button>
              </div>
              <br/><div id="srchboxcontdiv">
              <input type="text" id="searchid" oninput="srchpople(this.value)" class="srchppl" placeholder="Search & Select People" ><br/></div>
              <div id="searchedpplconst"><div id="searchedppl"></div>
              </div>
              <input type="button" value="OK" id="addpplbtn" onclick="hideselectppldiv()">
              <div id="selectedppldiv"></div>
              </div>
 ';
 }
 ?>