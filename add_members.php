
    <?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $chk=$_REQUEST['q'];
    if($chk=="56")
    {
           echo '<script src="../web/grp_page_add_mems.js"></script>';
    
    }else
    {
           echo '<script src="../web/add_grp_chat_mems.js"></script>';
    
           echo '<script src="../web/qck_msg_add_ppl.js"></script>';   
    }
       
    
     echo '
<link rel="stylesheet" href="../web/'.$_SESSION['css'].'srch_user_css_page.css"/>
              <input type="hidden" id="for_share_people" value="23" />
             <input type="hidden" id="chkalrdclkd" value="1">                          
             
              <div id="selectppldiv">
              <div id="selectpplspan">
              Search & Select People
              <span onclick="//$(\'#selectppldiv\').fadeOut()">X</span>
              </div>
              <br/><div id="srchboxcontdiv">
              <input type="text" id="searchid" oninput="srchpople(this.value)" class="srchppl" placeholder="Search & Select People" ><br/></div>
              <div id="searchedpplconst"><div id="searchedppl"></div>
              </div>
              <div id="addpplbtn" onclick="$(\'#selectppldiv\').fadeOut();">Add</div>
              <div id="selectedppldiv"></div>
              </div>
 ';
}
?>