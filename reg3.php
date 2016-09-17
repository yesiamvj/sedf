<html>
        
      <?php session_start();
                 
                if(empty($_SESSION['email']))
                {
                    header("location:register.html");
                }
                else
                {
                    require 'mysqli_connect.php';
                    $email=$_SESSION['email'];
                    $q="select user_id as u from users where email=' $email'";
                    $rq=mysqli_query($dbc,$q);
                    if($rq)
                    {
                        $row=mysqli_fetch_array($rq,MYSQLI_ASSOC);
                        $user_id=$row['u'];
                        
                    }
                    else
                    {
                        echo"no user_id";
                    }
                    $sn="select first_name as fn from basic where user_id=$user_id";
                    $rsn=mysqli_query($dbc,$sn);
                    if($rsn)
                    {
                        $rows=mysqli_fetch_array($rsn,MYSQLI_ASSOC);
                        $name=$rows['fn'];
                    }
                    else{
                        $name="no name selected";
                    }
         echo'
                    
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta http-equiv="Content-Language" content="en-US" />
        
        <meta http-equiv="Author" content="Sakthikanth for SedFed" /> 
    <title>| SedFed - Registration  </title>
   <link type="text/css" href="reg3.css" rel="stylesheet" />
    <link type="text/css" href="register3.css" rel="stylesheet" />
   <script src="regis3.js"  type="text/javascript">   </script>
<script src="jquery-1.11.2.min.js" type="text/javascript"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
    <script src="angular.min.js" type="text/javascript">     
   </script>
  </head>

  <body ng-app="">
      
      <div id="content-full">
          <div title="A Colorful Communication" id="title_bar" >
              <font id="sedfed">SedFed</font>
      </div>
           <font id="rwlcmemsg">
              Hi , Please Complete Some Steps to Create your New Account
          </font><br/><br/>
   <div id="steps">
              <ul id="stps">
                  <li >Initialization</li>
                  <li >Basic</li>
                  <li >Current</li>
                  <li id="curstep">Personal</li>
                  <li>Favorites</li>
                  <li>Annoying</li>
                  <li>About</li>
                  <li id="lststep">Status</li>
              </ul>
          </div>
          <div id="r-inps">
              <div id="r-itbls" >
                   <form method="post" action="reg3prcs.php" >
             
<table>
    <tr>
        <td><h1>Personal</h1></td>
    </tr>
<tr>
	<td><font>Mother\'s Name </font>
	</td>
	<td>
<input type="text" name="mname" id="tx1" oninput="typingel(\'#tx1\')" Placeholder="Mom\'s name">
	</td><td id="bv"></td>
</tr>

	<td><font>Father\'s Name </font> 
	</td>
        <td>
            <input   type="text" name="fname" id="tx1" oninput="typingel(\'#tx1\')" Placeholder="Daddy\'s Name">
	</td><td id="ab"></td>


<tr>
	<td><font>Brother\'s Name </font>
	</td>
	<td>
<input  type="text" name="bname" id="tx2" oninput="typingel(\'#tx2\')" Placeholder="Brother\'s name">
	</td><td id="bc"></td>
</tr>
<tr>
	<td><font>Sister\'s Name </font>
	</td>
	<td>
		<input type="text" name="sname" id="tx3" oninput="typingel(\'#tx3\')" Placeholder="Sister\'s Name">
	</td><td id="cb"></td>
</tr>
<tr>
    <td><font>Address   </font></td>
	<td>
	<input type="text" id="tx4" name="address" oninput="typingel(\'#tx4\')" placeholder="Permanent Address">
	</td>
	<td id="dt"></td>
</tr>
<tr>
	<td>
  <font>Languages Known  </font>
	</td>
	<td>
		<input type="text" id="tx4" name="language" placeholder="Known Languages">
	
	</td><td id="e"></td>
</tr>
<tr>
	<td><font>Blood Group</font>
	</td>
	<td id="gh">
            <select name="bggrp" value=(this.value)>
                <option value="O+">O +ve</option>
                <option value="O-">O -ve</option>
                <option value="A+">A +ve</option>
			<option value="A +ve">A -ve</option>
			<option value="B -ve">B +ve</option>
			<option value="B +ve">B -ve</option>
			<option value="AB +ve">AB +ve</option>
			<option value="AB -ve">AB -ve</option>
                        <option value="A1 +ve">A1 +ve</option>
                        <option value="A1 -ve">A1 -ve</option>
                        <option value="A2 +ve">A2 +ve</option>
                        <option value="A2 -ve">A2 -ve</option>
                        <option value="A2B +ve">A2B +ve</option>
                        <option value="A2B -ve">A2B -ve</option>
                        <option value="B1 +ve">B1 +ve</option>
                        
			
		</select>
	</td><td id="nw"></td>
</tr>
<tr>
	  <td><a href="reg7.php" >
        <input id="next" type="button" value="Skip">
        </a>
    </td> 
	<td align="right">
	<input type="submit" id="next" value="Next">
		
		</td>
</tr>

     </table>
   </form>
              </div>
          </div>
          <div id="helps">
              <div id="forusrnme">
                   <div id="mheads">Instructions</div>
                   <font style="color:navy">&nbsp;&nbsp;&nbsp;&nbsp;These details are your personal</font> 
                  
                        <div id="heads">For View Profile</div><br/>
              <div id="content-hlp" style="text-align: center">
              <h3>Hi</h3>
                  <span id="accname"><h2>'.$name.'</h2></span>
                     <span id="welcmsf"> Welcome To SedFed</span><br/><br/><br/><br/><div id="curins"><hr/>
                  <span id="whatsrch">You can edit your privacy setting for specific People</span><br/><hr/></div>
                  </div>
               
              
              
              </div>
          </div>
          
  </body>';
                           }
  ?>
</html>
