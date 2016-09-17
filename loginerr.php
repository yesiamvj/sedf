
<!DOCTYPE html>
<html>
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta http-equiv="Content-Language" content="en-US" />
        <meta http-equiv="Author" content="Vijayakumar for SedFed" />   
    <title>|    SedFed - A Colorful Communication</title>
    <link type="text/css" href="indexold.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="forgotpass.js" type="text/javascript"> </script>    
   <link type="text/css" href="templogin.css" rel="stylesheet" />
   
  </head>
  
  <body>
      <script type="text/javascript">
     
      
       function srchpople(srch)
          {
          n=0;
  $("#result").slideDown(1000);
 
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("result").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "srchpeople.php?q=" + srch, true);
        xmlhttp.send();
    }
   var n=0;
 

function usrnm(usr)
{
    $("#searchid").val(usr);
}
          </script>
          <script type="text/javascript">
              $(document).ready(function(){
      $("#result").slideUp(0);
      $("body").click(function(){
          
          $("#result").slideUp(500);
      });
  });
  
function overflow()
{
    var g=0;
    var srchhint=$("#searchid").val();
    var finallistcnt=$("#fincnt").val();
  
   if(finallistcnt>6)
   {
       $("#8").val("See More results in '"+srchhint+"'");
       
      $("#8").css({"background-color":"whitesmoke","color":"red"});
    }
    for(g=9;g<=finallistcnt;g++)
    {
        var hidebtnid="#"+g;
        $(hidebtnid).hide();
        
    }
}
          </script>
          
          <script type="text/javascript">  //for select search result
              
              $(document).ready(function(){
    $("#searchid").keydown(function(event){
        var x = event.which || event.keyCode;
   var finallistcnt=$("#fincnt").val();
        
        $("#result").slideDown(500);
        if(x===40)//for down key
        {
            
         if(n==8 || n>8 || n>finallistcnt || n==finallistcnt)
        {
            n=0;
            var pcssn=finallistcnt;
            
        }
        else{
             
             n=n+1;
             var pcssn=n-1;
        }
        var hilituser="#"+n;
        var dltprecssu="#"+pcssn;
       
       if(hilituser==="#8")
       {
            $(hilituser).css({"background-color":"whitesmoke","color":"red"});
       }else{
           $(hilituser).css({"background-color":"#ef0000","color":"white"});
       }
      
      $(dltprecssu).css({"background-color":"white","color":"navy"});
        }
        else{
            if(x===13)//for enter key
            {
                n=n;
                var hituserid="#"+n;
                if(n==8)
                {
                    var srchusrnm=$("#searchid").val();
                }
                else
                {
                    var srchusrnm=$(hituserid).val();
                }
               
               var userscls="."+n;
               var usersname=$(userscls).val();
               $("#searchid").val(srchusrnm);
                 alert(srchusrnm +"'s user id is "+usersname);
                 
                $("#result").slideUp(500);
            }
            if(x==38) // for (^) key
            {
                var dltprecss="#"+n; 
                n=n-1;
                if(n<0)
                {
                    
                   
                     if(finallistcnt>8)
                     {
                         n=8;
                     }
                     else{
                         n=finallistcnt;
                     }
                }
                else{
                    n=n;
                }
               
                var frwrdcssn=n;
        var hilituser="#"+frwrdcssn;
        
      $(hilituser).css({"background-color":"#ef0000","color":"white"});
      
      $(dltprecss).css({"background-color":"white","color":"navy"});
      
            }
        }
     
    });
});

              </script>
      
      <div id="content-full"  >
          <div title="A Colorful Communication" id="title_bar" >
              <font id="sedfed">SedFed</font>
      </div>    
          <div id="userdets"  >
              <div id="searchbar" >
                  <br/> <div id="bs"> <a href="register.html">  <button id="regs">Create New Account</button></a></div>
                  
                  <font id="wlcmemsg">  Welcome to <font id="sed">S</font><font id="ed">ed</font><font id="fed">F</font><font id="ed">ed</font> - A Colorful Communication </font>
                  <div id="srch-cont">
<input type="text" class="search" id="searchid" oninput="srchpople(this.value)" placeholder="Search for people" />
<div id="result">
</div>
      </div>
             <div id="logins"  >
                 <div id="navs">
                     <br/>
                     <button id="lgin"> Sign In </button>
                   </div>
                 <br/><font id="cption2">
                 Already Registered?</font>
                 <div id="inps">
                     <form autocomplete="on" action="checklogin.php" method="post">
                        <br/> <font id="cption"> Username </font><br/>
                         <input autocomplete="on" type="text" id="usrnme" name="username" autofocus placeholder="  Email  /  Mobile  /  Username " title="SedFed Username"/> <br/>
                        <br/> <font id="cption"> Password</font><br/> 
                        <input type="password" name="password" id="pswd" placeholder="Password" title="One of your optional Password"/> 
                         <div id="lgn"> <input type="submit" value="Login" id="lbtn" /></div>
                     </form>
                 </div>
                 <span>Incorrect username or bad Password...Try again.</span>
                 <br/>
                 <div id="frgtpass"></div><br/><span id="txtHint"></span>
                 &nbsp;&nbsp;&nbsp;&nbsp;<input type="button" id="forgotbtn" value="Forgot Your Password ?" onclick="frgtpass()"/> 
      
      </div>
          <div id="footr">
              <button id="about_us" ><a href="aboutus.html">about us</a></button>
         <font id="fotr">Just a Social Network</font>
         <font id="fot"><i id="vrs"> SedFed 2.0 </i></font></div>
          </div>
          
      </div>
      
     </body>
</html>
