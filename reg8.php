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
   <link type="text/css" href="reg4.2.css" rel="stylesheet" />
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
                  <li >Personal</li>
                  <li >Favorites</li>
                  <li>Annoying</li>
                  <li id="curstep">About</li>
                  <li id="lststep">Status</li>
              </ul>
          </div>
          <div id="r-inps">
              <div id="r-itbls" >
                   <form method="post" action="reg8prcs.php" >   
     <table>
          <tr>
             <td>
                 <h1>About</h1>
             </td>
         </tr>
       
<tr>
	<td><font>Family</font>
	</td>
	<td>
<input  type="text" name="fam" id="tx1" oninput="typingel(\'#tx1\')" Placeholder="About Your Family">
	</td><td id="bv"></td>
</tr>

	<td><font>Friendship</font> 
	</td>
        <td>
            <input   type="text" name="frnd" id="tx2" oninput="typingel(\'#tx2\')" Placeholder="About Friendship">
	</td><td id="ab"></td>


<tr>
	<td><font>Love </font>
	</td>
	<td>
<input  type="text" name="love" id="tx3" oninput="typingel(\'#tx3\')" Placeholder="About Love">
	</td><td id="bc"></td>
</tr>
<tr>
	<td><font>Studies<font>
	</td>
	<td>
	<input  type="text" name="std" id="tx4" oninput="typingel(\'#tx4\')" Placeholder="About Studies">
	</td>
        <td id="cb"></td>
</tr>
<tr>
	<td><font>Politics </font>	</td>
	<td>
            <input type="text" id="tx5" name="pol" oninput="typingel(\'#tx5\')" placeholder="About Politics">
	</td>
	<td id="dt"></td>
</tr>
<tr>
	<td>
            <font>Life  </font>
	</td>
	<td>
            <input type="text" id="tx6" name="life" oninput="typingel(\'#tx6\')" placeholder="About Life">
	
	</td><td id="e"></td>
</tr>

<tr>
    <td><font>God</font>
	</td>
	<td id="gh">
            <input type="text" name="god" placeholder="About God"  id="tx7" oninput="typingel(\'#tx7\')"/>
	</td><td id="nw"></td>
</tr>
<tr>
	  <td><a href="reg9.php" >
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
              
      </div>
    </body>';
                      }
                      ?>
</html>
