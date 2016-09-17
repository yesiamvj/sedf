
    <?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $which=$_REQUEST['q'];
    
     echo '
            <script src="../web/add_ppl_for_post.js"></script>
<link rel="stylesheet" href="../web/'.$_SESSION['css'].'srch_user_css_page.css"/>
            
              <div id="selectppldiv">
              <div id="selectpplspan">
              Search & Select People
              <span id="selectpplclsbtn" onclick="$(\'#selectppldiv\').fadeOut()">X</span>
              </div>
              <br/><div id="srchboxcontdiv">
              <input type="text" id="searchid" oninput="srchpople(this.value)" class="srchppl" placeholder="Search & Select People" ><br/></div>
              <div id="searchedpplconst"><div id="searchedppl"></div>
              </div>
              <input type="button" value="Add" id="addpplbtn" onclick="$(\'#selectppldiv\').fadeOut();">
              <div id="selectedppldiv"></div>
              </div>
 ';
}
?>