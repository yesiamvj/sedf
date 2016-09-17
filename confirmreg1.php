
<html>
    
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta http-equiv="Content-Language" content="en-US" />
        
        <meta http-equiv="Author" content="Sakthikanth for SedFed" /> 
    <title>| SedFed - Registration  </title>
   <link type="text/css" href="reg1.css" rel="stylesheet" />
   <script src="regis1.js"  type="text/javascript">   </script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
    <script src="angular.min.js" type="text/javascript">  </script>  
    <link type="text/css" href="register1.1.css" rel="stylesheet" />
       <script>
function showHint(str,a) {
    var usv=$("#tx1").val();
    var sgt=usv.indexOf(" ");
    if (str.length === 0 || sgt===0) {
        var wrn="<img src=\"ex.png\" width=\"25\" height=\"25\">";
        
        document.getElementById("next").disabled=true;
        $("#txtHint").html(wrn);
         
         $("#nk").html(wrn);
        
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) 
            {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "getuser.php?q=" + str, true);
        xmlhttp.send();
    }
  }
 
</script> 
<script type="text/javascript">
    /* The uploader form */
    $(function () {
        $(":file").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
            else{
                alert("choose an image file");
            }
        });
    });
    function imageIsLoaded(e) {
        $('#myImg').attr('src', e.target.result);
        var dfgh=e.target.result.indexOf("image");
        if(dfgh>0)
        {
           
            $("#myImg").show();
        }
        else{
            $("#myImg").hide();
            alert("Please choose an image file");
        }
    };
    $(document).ready(function(){
            $("#myImg").hide();
    });
</script>

  </head>
  <?php session_start();
  if(empty($_SESSION['user_id']))
  {
      header("location:index.html");
  }
  else
  {
      
  echo '
  <body ng-app="">
      
      <div id="content-full">
          <div title="A Colorful Communication" id="title_bar" >
              <font id="sedfed">SedFed</font>
      </div>
           <font id="rwlcmemsg">
              Hi , Please Complete your Basic Details to your Account
          </font>
  
          <div id="r-inps">
              <div id="r-itbls" >
                  <form method="post" action="reg1prcs.php" enctype="multipart/form-data"enctype="multipart/form-data" >
                        
             <table >
<tr>
	<td><font>Username</font> 
	</td>
	<td>
            <input oninput="showHint(this.value,1)" autofocus  type="text" name="us" ng-model="uname"  id="tx1" Placeholder="Pick a username">
	</td><td id="txtHint"></td>
</tr>
<tr>
	<td><font>Your Name</font> 
	</td>
	<td>
            <input  type="text" ng-model="fsname" name="fname" oninput="imag(2)"   id="tx2"   Placeholder=" What\'s Your Name?">
	</td><td id="bc"></td>
</tr>
<tr>
	<td><font> Otherwise Known as </font>
	</td>
	<td>
            <input oninput="imag(3)" type="text" name="lname" id="tx3" ng-model="fname"  Placeholder="Another name">
	</td><td id="cd"></td>
</tr>
<tr>
	<td><font>Native Place </font>
	</td>
	<td>
            <script src="reg2.js" type="text/javascript"></script>
            <input oninput="imag(4)" type="text" name="np" id="tx4" ng-model="natv"  Placeholder="Native place">
	</td><td id="ef"></td>
</tr>
<tr>
	<td><font>Date of Birth </font>	</td>
	<td>
            <select onchange="imag(5)" name="year" id="yr"  value=(this.value)>
            <script src="register.js" type="text/javascript"></script>';
                
	
	
	for($i=1959;$i<=2015;$i++)
	{

		if($i==1959)
		{
			echo "<option value=\"Year\">Year</option>";
		}else{

		echo'
	 <option value="'.$i.'">'.$i.'</option>';
	}
	}
	
echo '	</select>
	<select name="month" id="mnth" onchange="imag(5)" value=this.value>
		<option>Month</option>

     <option>January</option>

     
       <option>February</option>
       <option>March</option>
       <option>April</option>
       <option>May</option>
       <option>June</option>
       <option>July</option>
       <option>August</option>
       <option>September</option>
       <option>Octobar</option>
       <option>November</option>
       <option>December</option>
	</select>
            <select name="day" id="days" onchange="imag(5)">';
                
	
	
	for($i=0;$i<=31;$i++)
	{

		if($i==0)
		{
			echo "<font><option>Day</option></font>";
		}else{

		echo '
	 <div id="sa"><option value="'.$i.'" id="'.$i.'" >'.$i.'</option></div>';
	}
	}
	echo'
	</select>
         	</td><td id="gh"></td>
</tr>
<tr>
<td>
<font>Choose a Profile Picture</font>

</td>
<td >
 <input  id="file" type="file" name="upload" style="display:none" />
                <input id="fb" type="button" value="Pick a picture to your profile"  onclick="document.getElementById(\'file\').click();" title="Pick a Profile Picture" /></td>
                <td id="pic"><img src="" id="myImg"/></td></tr>
<tr>
	<td>
            
  <font>Sex </font>
	</td>
	<td>
            <input type="button" value="Male" id="rotbtn" onclick="imag(6)"><input id="ml" type="radio" onclick="imag(6)"  name="sexi" value=""  >';
            echo'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            echo'
	
            <input type="button" value="Female" id="rotbtn" onclick="imag(7)"><input id="fml" type="radio" onclick="imag(7)" name="sexi" value=""  >
	
	</td><td id="e"></td>
</tr>
<tr>
	<td>
	</td>
	<td id="gh">
		<input id="next" disabled   type="submit" value="Continue" onclick="subt()"> &nbsp;&nbsp;&nbsp;<span id="nk"></span>
	</td>
</tr>

</table>
            </form>
              </div>
          </div>
          <div id="helps">
              <div id="forusrnme">
                   <div id="mheads">Instructions</div>
                   <font style="color:navy">&nbsp;&nbsp;&nbsp;&nbsp;These details are very important</font><br/><br/> 
                  <div id="heads">For Logging in</div>
                  <div id="content-hlp">
              Username<br/>
              <input type="text" id="rh-srch" value="{{uname}}" disabled placeholder="username"/><br/><br/>
              
              <input type="password" id="rh-pwd" disabled placeholder="password"/><br/><br/>
              <button  disabled="disabled">Login</button></div><br/><br/><br/>
              <div id="heads">For Search</div>
              <div id="content-hlp" style="text-align: center">
                  <span id="gs">People can search you </span><br/>
              <input id="th-trch" type="text" disabled placeholder="Search people" value="{{fsname}}"/><br/><br/>
              <button  disabled="disabled">Search</button></div>
              <div id="fn-ins">
                  <span id="whatsrch" >
                  </span><br/>
                  <span ng-bind="fsname +\' ( \' + fname +\' )\'"></span><br/>
                      
              </div>
                
              
              </div>
          </div>
         
  
      
  </body>';
  }
  
                            ?>
</html>
