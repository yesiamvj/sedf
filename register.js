  var inptype;
  var mailok,mobok,mobno,focel;
      function typingel(inptype,t){
       var v=" people can search you by your "+ t;
       var u=" people can add you by your " + t ;
       $('#whatsrch').text(v);
       $('#howadd').text(u);
        var c=$(inptype).val();
        elactive(c);  
        if(t==="email"){
           
             $('#tipmail').html('<ul id="tipbox"><li>Username</li><li>Passwords</li><li>Confirmation Messages</li> </ul>will be sent to your email<br/> now and in future too').fadeIn(1300).css({'display':'inline-block'});
        }
        else{
            
        }
      }
      function elactive(c){
           $('#rh-usrnme').val(c).css({'color':'red'});
           $('#rh-srch').val(c).css({'color':'red'});
            $('#rh-contmail').val(c).css({'color':'red'});
      }
      function pwdtype(tgt){
          var valu=$(tgt).val();
          $('#rh-pwd').val(valu).css({'color':'red'});       
      }
      function elonfocus(focel){
         
          if(focel==='1'){
               $('#tippass1').css({'display':'none'});
           $('#tipmob').css({'display':'none'});
            $('#tippass2').css({'display':'none'});
           
          }
          if(focel==='2'){
              $('#tipmail').css({'display':'none'});
           $('#tippass1').css({'display':'none'});
            $('#tippass2').css({'display':'none'});
          $('#tipmob').html('<ul id="tipbox"><li>Login alerts</li><li>Messages</li><li>Notifications</li><li>Updates</li></ul> will be sent to your mobile').fadeIn(1300).css({'display':'inline-block'});
          
          }
         if(focel==='3'){
               $('#tipmail').css({'display':'none'});
           $('#tipmob').css({'display':'none'});
            $('#tippass2').css({'display':'none'});
          $('#tippass1').html('You can choose</br> Two passwords <br/> For Your Account <br/> You can use any one </br> password to login (i.e) </br>Password 1 or Password 2').fadeIn(1300).css({'display':'inline-block'});
          }
          if(focel==='4'){
               $('#tipmail').css({'display':'none'});
           $('#tipmob').css({'display':'none'});
            $('#tippass1').css({'display':'none'});
          $('#tippass2').html('Password 2  </br> is a optional password.<br/>Need not match password 1.<br/>If you leave blank,</br> You can login your account </br>without password').fadeIn(1300).css({'display':'inline-block'});
          }
          if(focel==="clr"){
               $('#tipmail').css({'display':'none'});
           $('#tipmob').css({'display':'none'});
            $('#tippass1').css({'display':'none'});
            $('#tippass2').css({'display':'none'});
          }
          else{
              
          }
      }
      function checkmaill(){
            mailok=0;
            var emailid=$('#r-txtemail').val();
         var n=emailid.indexOf('@');
         var b=emailid.indexOf('.');
         var g=b-n;
          if(g>2){
            $('#mailhint').html('<font id="ok">Ok</font>');
            mailok=1;
            return true;
        }
        else{
            $('#mailhint').text('! Invalid');
            mailok=0;
            return false;
        }
      }
      function checkmobno(){
          
         var mobno=$('#r-txtmobno').val();
          if(!isNaN(mobno)){
            var moblen=mobno.length;
            if(moblen>9){
                 $('#mobhint').html('<font id="ok">Ok</font>');
                mobok=1;
                return true;
            }
            else{
                $('#mobhint').text('! Atleast 9 numbers needed');
                mobok=0;
                return false;
            }
        }
        else{
            $('#mobhint').text('! Please Enter Numbers');
            mobok=0;
            return false;
        }
      }
      function checkpasses(){ 
          var pass1len=$('#r-txtpass1').val().length;
          var pass2len=$('#r-txtpass2').val().length;
          if( pass1len<=0 || pass2len<=0){
              return (confirm("It seems like you left the Password Field Blank.\n\n(i.e) Anyone can login to your account without any Password") );
          }
          else{
            
              return true;
          }
      }
      function accpt(){
          elonfocus("clr");
         checkmaill();
         checkmobno();
        if(checkmaill() && checkmobno() && checkpasses()){
           document.getElementById('chkbx').checked=true;
              document.getElementById('r-submit').disabled=false;   
        }
        else{
             document.getElementById('r-submit').disabled=true;
              document.getElementById('chkbx').checked=false;
        }
        return true;
          
      }
      function sm(){
          if(checkmaill()){
              alert("SedFed 2.0 - The Official User Version ");
          }
          else{
              alert("Please Fill Out all the fields");
          }
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
                $("#mailhint").html(xmlhttp.responseText);
            }
        }
      
          xmlhttp.open("POST", "check_email.php?q=" + mails, true);
   
        xmlhttp.send();     
      }else
      {
         $("#mailhint").html('Enter valid email');   
      }
        
}
function check_mobile_no(mobno)
{
       if(mobno.length>9 && !isNaN(mobno))
       {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                $("#mobhint").html(xmlhttp.responseText);
            }
        }
      
          xmlhttp.open("POST", "check_mobno.php?q=" +mobno, true);
   
        xmlhttp.send();      
       }else
       {
              $("#mobhint").html('Invalid');
       }
          
}
 
       function userNameInput(){


               var dgi=$('#usernameInp').val();
           $('#usernameLive').text($('#usernameInp').val());
           if(dgi.indexOf('/')>0 || dgi.indexOf('/')===0){
               alert('Special Characters are Not allowed ');
               $('#usernameInp').val('')
           }

           if(dgi.indexOf('.')>0 || dgi.indexOf('.')===0){
               alert('Special Characters are Not allowed ');
               $('#usernameInp').val('')
           }
           if(dgi.indexOf('\'')>0 || dgi.indexOf('\'')===0){
               alert('Special Characters are Not allowed ');
               $('#usernameInp').val('')
           }


            var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                $(".availTip").html(xmlhttp.responseText);
            }
        }
      
          xmlhttp.open("POST", "check_username.php?q="+dgi, true);
   
        xmlhttp.send(); 

       }
       
function super_step_prcs()
{
     
       var username=$("#usernameInp").val();
       var color=$("#themeColor").val();
       var txt_color=$("#themeTextColor").val();
       var fmdt=new FormData();
       fmdt.append('myusername',username);
       fmdt.append('theme_color',color);
       fmdt.append('theme_txt_color',txt_color);
       
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                
             $("#register_result").html(xmlhttp.responseText).show();
            }
        }
      
          xmlhttp.open("POST", "super_step_prcs.php?", true);
           xmlhttp.send(fmdt); 
}