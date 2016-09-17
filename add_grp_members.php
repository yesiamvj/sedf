
    
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_REQUEST['page_id']))
{
    header("location:home.php");
}else
{
    $page_id=$_REQUEST['page_id'];
    
       echo '
<script type="text/javascript" src="srch_user_page.js"></script>
<link rel="stylesheet" href="../web/'.$_SESSION[].''.$_SESSION[].'srch_user_css_page.css"/>
<input type="hidden" id="tot_img_prev_cnt" value="" />
        <input type="hidden" value="" id="fortopscroll">
                                            <input type="hidden" value="" id="wchpplwant">
                    <input type="hidden" id="imgcnt" value="">
             <input type="hidden" id="chkalrdclkd" value="1">               <input type="hidden" id="withpplcnt" value="1">                          
             <input type="hidden" id="grp_add_members" value="5">
               <div id="selectppldiv">
              <div id="selectpplspan">
              Search & Select People
              <button id="selectpplclsbtn" onclick="$(\'#selectppldiv\').fadeOut()">X</button>
              </div>
              <br/><div id="srchboxcontdiv">
              <input type="text" id="searchid" oninput="srchpople(this.value)" class="srchppl" placeholder="Search & Select People" ><br/></div>
              <div id="searchedpplconst"><div id="searchedppl"></div>
              </div>
              <input type="hidden" value="'.$page_id.'" id="group_id"/>
              <input type="button" value="Add Group Members" id="addpplbtn" onclick="add_mems_to_group()">
              <div id="selectedppldiv"></div>
              </div>
  
       ';
}
?>