  <?php session_start(); 
  if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
     header("location:index.php");
 }
 else
{
        $user_id=$_SESSION['user_id'];
        require 'mysqli_connect.php';
        $pass1=  mysqli_real_escape_string($dbc,trim($_REQUEST['pass1']));
        
        $pass2=  mysqli_real_escape_string($dbc,trim($_REQUEST['pass2']));
        $pas1=  sha1($pass1);
        $pas2=  sha1($pass2);
        $id1=rand(1111,9999);
        $id2=rand(1111,9999);
        $me1=sha1('sakthi');
        $me2=sha1('kanth');
        $q1="select user_id as u from users where user_id=$user_id and pass1='$pas1' and pass2='$pas2'";
        $q2="select user_id as u from users where user_id=$user_id and pass2='$pas1' and pass1='$pas2'";
        $r1=  mysqli_query($dbc, $q1);
        $r2=  mysqli_query($dbc, $q2);
        if($r1 || $r2)
        {
               if(mysqli_num_rows($r1)>0 || mysqli_num_rows($r2)>0)
               {
	     echo ' <div class="ThWin_Set_In">
                  <div class="ThWinSetTtl"> Enter New Password <div class="closeThWin" onclick="$(\'#ThWinSetPassword\').fadeOut();" >X</div> </div>
                  <div class="ThWinSetCont">
                    
                     New  Password 1<input id="SAC_1pass'.$id1.'"  type="password" placeholder="Type your Password 1"/><img class="passEye" onclick="showPassInp(\'#SAC_1pass'.$id1.'\')" src="icons/chatwin/view_type.png"/> <br/><br/>
                      New  Password 2 <input id="SAC_2pass'.$id2.'"  type="password" placeholder="Type your Password 2"/> <img class="passEye" onclick="showPassInp(\'#SAC_2pass'.$id2.'\')" src="icons/chatwin/view_type.png"/>
                  </div>
                  <script>
	function change_password(pass1,pass2)
              {
        var fmdt=new FormData();
        var pass1=$(\'#SAC_1pass'.$id1.'\').val();
               var pass2=$(\'#SAC_2pass'.$id2.'\').val();
        fmdt.append(\'npass1\',pass1);
        fmdt.append(\'npass2\',pass2);
        fmdt.append(\'opass1\',\''.$pas1.'\');
               fmdt.append(\'me\',\'ns\');
               fmdt.append(\'opass2\',\''.$pas2.'\');
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
          $(\'#ThWinSetPassword\').html(xmlhttp.responseText).fadeIn();
           }
          }
            xmlhttp.open("POST","check_password.php",true);
            xmlhttp.send(fmdt);
        
              }
	     
	     
                      
                      </script>
                  <div class="ThWinPrcdBtn" onclick="change_password(\'#SAC_pass'.$id1.'\',\'#SAC_pass'.$id2.'\')">
                      Proceed
                  </div>
              </div>';
               }else
               {
	     echo '<div>Wrong Password <button onclick="reset_pass_hold()">Try Again</button></div>';
               }
        }
       
}
