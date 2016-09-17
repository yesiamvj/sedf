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
   <link type="text/css" href="reg6.css" rel="stylesheet" />
   <link type="text/css" href="register3.css" rel="stylesheet" />
   <script src="regis6.js"  type="text/javascript">   </script>
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
                  <li>Personal</li>
                  <li id="curstep">Favorites</li>
                  <li>Annoying</li>
                  <li>About</li>
                  <li id="lststep">Status</li>
              </ul>
          </div>
          <div id="r-inps">
              <div id="r-itbls" >
                   <form method="post" action="reg6prcs.php" >
     <table>
          <tr>
             <td>
                 <h1>Favorites</h1>
             </td>
         </tr>
       
<tr>
	<td><font>Author</font>
	</td>
	<td>
<input type="text" name="authr" id="tx1" Placeholder="Favorite Author" oninput="typingel(\'#tx1\')">
	</td><td id="bv"></td>
</tr>

	<td><font>TV show </font> 
	</td>
        <td>
            <input   type="text" name="tvsh" id="tx2" Placeholder="Favorite Show" oninput="typingel(\'#tx3\')">
	</td><td id="ab"></td>


<tr>
	<td><font>Cartoon </font>
	</td>
	<td>
<input  type="text" name="cn" id="tx3" Placeholder="Favorite Cartoon" oninput="typingel(\'#tx3\')">
	</td><td id="bc"></td>
</tr>
<tr>
	<td><font>Music Director </font>
	</td>
	<td>
	<input  type="text" name="mscdir" id="tx4" Placeholder="Favorite Music Director" oninput="typingel(\'#tx4\')">
	</td>
        <td id="cb"></td>
</tr>
<tr>
	<td><font>Film Director </font>	</td>
	<td>
	<input type="text" id="tx5" name="flmdir" placeholder="Favorite Film Director">
	</td>
	<td id="dt"></td>
</tr>
<tr>
	<td>
            <font>Comedy Actor  </font>
	</td>
	<td>
		<input type="text" name="cmdyact" id="tx6" placeholder="Favorite Comedy Actor">
	
	</td>
        <td id="e">
            
        </td>
</tr>



     </table>
                       
      
<input class="addn" id="addn" type="button" value="Add Favorite" onclick="addnew(2)"><br/><br/>
<table>
    <tr>
	  <td><a href="reg4.1.php" >
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
