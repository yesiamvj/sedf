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
   <link type="text/css" href="reg4.css" rel="stylesheet" />
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
                  <li >Personal</li>
                  <li id="curstep">Favorites</li>
                  <li>Annoying</li>
                  <li>About</li>
                  <li id="lststep">Status</li>
              </ul>
          </div>
          <div id="r-inps">
              <div id="r-itbls" >
                   <form method="post" action="reg4prcs.php" >
     <table >
         <tr>
             <td>
                 <h1>Favorites</h1>
             </td>
         </tr>
<tr>
	<td><font>Number</font>
	</td>
	<td>
            <select name="numb" value=(this.value) >
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
	</td><td id="bv"></td>
</tr>

	<td><font>Letter </font> 
	</td>
        <td>
            <input   type="text" name="l" id="tx2" Placeholder="Favorite Letter" oninput="typingel(\'#tx2\')">
	</td><td id="ab"></td>


<tr>
	<td><font>Color </font>
	</td>
	<td>
<input  type="text" name="c" id="tx3" Placeholder="Favorite color" oninput="typingel(\'#tx3\')">
	</td><td id="bc"></td>
</tr>
<tr>
	<td><font>Actor </font>
	</td>
	<td>
		<input type="text" name="a" id="tx4" Placeholder="Favorite Actor" oninput="typingel(\'#tx4\')">
	</td><td id="cb"></td>
</tr>
<tr>
	<td><font>Actress   </font>	</td>
	<td>
	<input type="text" id="tx5" name="act" placeholder="Favorite Actress" oninput="typingel()">
	</td>
	<td id="dt"></td>
</tr>
<tr>
	<td>
            <font>Movie  </font>
	</td>
	<td>
            <input type="text" name="m" id="tx6" placeholder="Favorite Movie">
	
	</td><td id="e"></td>
</tr>
<tr>
	<td><font>Song or Album</font>
	</td>
	<td id="gh">
            <input type="text" name="sora" placeholder="Favorite Song or Album"  id="tx7" oninput="typingel()"/>
	</td><td id="nw"></td>
</tr>
<tr>
    <td><a href="reg5.php" >
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
