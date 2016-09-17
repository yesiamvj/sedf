function update_acc(new_name,which)
{
   
      var fmdt=new FormData();
      fmdt.append('new_name',$(new_name).val());
      fmdt.append('which',which);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
            alert(xmlhttp.responseText);
           }
          }
            xmlhttp.open("POST","set_my_acc_prcs.php?",true);
            xmlhttp.send(fmdt);
}
function change_password_open(pass1,pass2)
{
        var fmdt=new FormData();
        fmdt.append('pass1',$(pass1).val());
        fmdt.append('pass2',$(pass2).val());
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
            $("#ThWinSetPassword").html(xmlhttp.responseText).fadeIn();
           }
          }
            xmlhttp.open("POST","check_change_pass.php",true);
            xmlhttp.send(fmdt);
        
}
function reset_pass_hold()
{
       var rest='<div class="ThWin_Set_In">\
                  <div class="ThWinSetTtl"> Change Password <div class="closeThWin" onclick="$(\'#ThWinSetPassword\').fadeOut();" >X</div> </div>\
                  <div class="ThWinSetCont">\
                     Current  Password 1<input id="SAC_pass1"  type="password" placeholder="Type your Password 1"/><img class="passEye" onclick="showPassInp(\'#SAC_pass1\')" src="icons/chatwin/view_type.png"/> <br/><br/>\
                      Current  Password 2 <input id="SAC_pass2"  type="password" placeholder="Type your Password 2"/> <img class="passEye" onclick="showPassInp(\'#SAC_pass2\')" src="icons/chatwin/view_type.png"/>\
                  </div>\
                  <div class="ThWinPrcdBtn" onclick="change_password_open(\'#SAC_pass1\',\'#SAC_pass2\')">\
                      Proceed\
                  </div>\
              </div>';
        $("#ThWinSetPassword").html(rest).fadeIn();
}
function open_update_login_screen_pass()
{
      
       var rst=' <div class="ThWin_Set_In">\
                  <div class="ThWinSetTtl"> Lock Screen Password <div class="closeThWin" onclick="$(\'#ThWinSetLockPass\').fadeOut();" >X</div> </div>\
                  <div class="ThWinSetCont">\
	 Current for Lock Screen <input id="cur_pass1"  type="text" placeholder="Type your Password"/>\
	 Password for Lock Screen <input id="cur_pass2"  type="text" placeholder="Type your Password"/>\
	 </div>\
                  <div class="ThWinPrcdBtn" onclick="updare_lock_pass(\'#cur_pass1\',\'#cur_pass2\')">\
                      Update\
                  </div>\
              </div>\
          </div> ';
       $("#ThWinSetLockPass").html(rst).fadeIn();
  }
  
  function updare_lock_pass(pass1,pass2)
  {
         var fmdt=new FormData();
        fmdt.append('pass1',$(pass1).val());
        fmdt.append('pass2',$(pass2).val());
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
            $("#ThWinSetLockPass").html(xmlhttp.responseText).fadeIn();
           }
          }
            xmlhttp.open("POST","update_lock_pass.php",true);
            xmlhttp.send(fmdt);
  }
  function check_pre_email(mails)
{
      
       var mail=mails.indexOf("@");
       var dot=mails.indexOf(".");
       var mean=dot-mail;
       
      if(mean>2 && mail>-1 && dot>-1)
      {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                $("#result_email").html(xmlhttp.responseText);
            }
        }
      
          xmlhttp.open("POST", "check_email.php?q=" + mails, true);
   
        xmlhttp.send();     
      }else
      {
         $("#result_email").html('<font color="crimson">Enter valid email</font>');   
      }
        
}
function check_mobile_no(mobno)
{
       if(mobno.length>9 && !isNaN(mobno))
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                $("#result_mob").html(xmlhttp.responseText);
            }
        }
      
          xmlhttp.open("POST", "check_mobno.php?q=" +mobno, true);
   
        xmlhttp.send();      
       }else
       {
              $("#result_mob").html('<font color="crimson">Invalid</font>');
       }
          
}
   function showPassInp(id){
                        if($(id).attr('type')==='password'){
                            $(id).attr({'type':'text'});
                        }
                        else{
                            $(id).attr({'type':'password'});
                        }
                      }
                      