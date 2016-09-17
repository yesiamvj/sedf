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
   <link type="text/css" href="reg2.css" rel="stylesheet" />
   <link type="text/css" href="register3.css" rel="stylesheet" />
   <script src="regis2.js"  type="text/javascript">   </script>
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
                  <li id="curstep">Current</li>
                  <li>Personal</li>
                  <li>Favorites</li>
                  <li>Annoying</li>
                  <li>About</li>
                  <li id="lststep">Status</li>
              </ul>
          </div>
          <div id="r-inps">
              <div id="r-itbls" >
                  <form method="post" action="reg2prcs.php" >
             <table>
<tr>
	<td>
           	<font>Position</font> 
	</td>
	<td>
            <select onchange="position()" name="pos" id="posi" value=(this.value)>
                         <option value="Studying">Studying</option>
			<option value="Working">Working</option>
		</select>		
	</td><td id="a"></td>
</tr>
</table>
<table>

<tr id="adpos">
    
</tr>
<tr id="adposplc">
    
  
</tr>
<tr id="adjbtn">
    
  
</tr>
</table>     
   <table>  
<tr>
	<td>
		<font>Current Place </font>
	</td>
	<td>
            <input type="text" name="a" oninput="typingel(\'#tx1\')" id="tx1" Placeholder="Where\'re you now?">
	</td><td id="b"></td>
</tr>
<tr>
	<td>
		<font>School</font>
	</td>
	<td>
            <input oninput="typingel(\'#tx2\')" ng-model="ght" type="text" name="b" id="tx2" Placeholder="Name of School">
	</td><td id="c"></td>
</tr>
<tr>
	<td>
		<font>State</font>
	</td>
	<td>
            <select name="distlist" id="districtlist" >
	<option>Select Your State</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
<option value="Daman and Diu">Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Orissa">Orissa</option>
<option value="Pondicherry">Pondicherry</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Tripura">Tripura</option>
<option value="Uttaranchal">Uttaranchal</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="West Bengal">West Bengal</option>
</select>
	</td><td id="d"></td>
</tr>
<tr>
	<td>
		<font>District </font>
	</td>
	<td>
            <input oninput="typingel(\'#tx3\')" type="text"  name="dist" id="tx3" Placeholder="Your District">
	
		</td><td id="e"></td>
</tr>
<tr>
	<td>
		<font>Year of the School </font>
	</td>
	<td>
		<font>From </font><select name="from1yr" onmouseover="opt()" >';
       
       
      for($i=1949;$i<=2020;$i++)
       {
        if($i==1949)
          {echo '<option value="">Year</option>';
   }else{
       echo '<option value="'.$i.'">'.$i.'</option>';
     }
   }
     echo '
     </select>
     <select name="from1mnth" onmouseover="opt()">
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
       
     </select><br/><br/>
     <font>To </font><select name="to1yr" onmouseover="opt()">';
       
       
       for($i=1949;$i<=2020;$i++)
       {
        if($i==1949)
          {echo '<option value="">Year</option>';
   }else{

   	
       echo '<option value="'.$i.'">'.$i.'</option>';
     }
   }
     echo '
     </select>
       <select name="to1mnth" value=(this.value) onmouseover="opt()">
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
	</td><td id="nw"></td>
</tr>
<tr>
	<td>
		<font>High School</font>
	</td>
	<td>
            <input  type="text" oninput="typingel(\'#tx8\')" name="hiscl" id="tx8"   placeholder="Name of School" >
           </td><td id="ej"></td>
</tr>
<tr>
	<td>
		<font>State</font>
	</td>
	<td>
            <input  type="text" name="stathiscl" id="tx9" oninput="typingel(\'#tx9\')" Placeholder="State of school">
	</td><td id="fg"></td>
</tr>
<tr>
	<td>
		<font>District </font>
	</td>
	<td>
            <input  type="text" oninput="typingel(\'#tx3\')"  name="hiscldist" id="tx5" Placeholder="Place of the school">
	</td><td id="h"></td>
</tr>
<tr>
	<td>
		<font>Year of the School </font>
	</td>
	<td>
		<font>From </font><select name="hisclyr1" onmouseover="opt()">';
       
       
      for($i=1949;$i<=2020;$i++)
       {
        if($i==1949)
          {echo '<option value="">Year</option>';
   }else{
       echo '<option value="'.$i.'">'.$i.'</option>';
     }
   }
     echo '
     </select>
     <select name="hisclmnth1" onmouseover="opt()">
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
       
     </select><br/><br/>
     <font>To </font><select name="hisclyr2" onmouseover="opt()">';
       
       
       for($i=1949;$i<=2020;$i++)
       {
        if($i==1949)
          {echo '<option value="">Year</option>';
   }else{
       echo '<option value="'.$i.'">'.$i.'</option>';
     }
   }
     echo '
     </select>
       <select name="hisclmnth2" onmouseover="opt()">
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
	</td><td id="nw"></td>
        
</tr>
<tr>
	<td>
		<font>College </font>
	</td>
	<td>
		<input type="text" name="c1" id="tx6" oninput="typingel(\'#tx6\')"  Placeholder="Name of the College">
	</td><td id="j"></td>
</tr>
<tr>
	<td>
		<font>Department </font>
	</td>
	<td>
		<input  type="text" name="d1" id="tx7" oninput="typingel(\'#tx7\')"  Placeholder="Course" >
	</td><td id="k"></td>
</tr>
<tr>
	<td>
		<font>State </font>
	</td>
	<td>
		<input type="text" name="sc" id="tx1" Placeholder="State of the College">
	</td><td id="l"></td>
</tr>
<tr>
	<td>
		<font>District </font>
	</td>
	<td>
            <input oninput="typingel(\'#tx1\')" type="text" name="dc" id="tx1" Placeholder="Place of the school">
	</td><td id="m"></td>
</tr>
<tr>
	<td>
		<font>Year </font>
	</td>
	<td>
		<font>From </font><select name="y1" onmouseover="opt()">';
       
       
      for($i=1949;$i<=2020;$i++)
       {
        if($i==1949)
          {echo '<option value="">Year</option>';
   }else{
       echo '<option value="'.$i.'">'.$i.'</option>';
     }
   }
     echo '
     </select>
     <select name="m1" onmouseover="opt()">
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
       <option>October</option>
       <option>November</option>
       <option>December</option>
       
     </select><br/><br/>
     <font>To </font><select name="y2" onmouseover="opt()">';
       
       
       for($i=1949;$i<=2020;$i++)
       {
        if($i==1949)
          {echo '<option value="">Year</option>';
   }else{
       echo '<option value="'.$i.'">'.$i.'</option>';
     }
   }
     echo '
     </select>
       <select name="m2" onmouseover="opt()">
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
       <option>October</option>
       <option>November</option>
       <option>December</option>
       
     </select>
	</td><td id="nw"></td>
</tr>

<tr>
<td>
	<font>Status </font>
</td>
	<td>
		<font>Married</font><input id="rd"  type="radio" name="fm" value="Married"  >
	
		<font>UnMarried</font><input id="rd"  type="radio" name="fm" value="Unmarried"  >
	</td><td id="o"></td>
</tr>
  </table>
<table>
    
</table>
 
 <table>
<tr>
    <td>
        <input class="addn" id="addn" type="button" value="Add School" onclick="addnew(1)">

    </td>
    <td id="rigt" align="right">
     

<input class="addn" id="addn" type="button" value="Add College" onclick="addnew(2)">
</td>
</tr>


<tr id="last" height="70">
    <td align="left"><a href="reg3.php" >
        <input id="next" type="button" value="Skip">
        </a>
    </td>
    
	<td align="center">
		<input id="next" type="submit" value="Next">
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
                     <span id="welcmsf"> Welcome To SedFed</span><br/><br/><br/><br/><div id="curins">
                     <p bgcolor="red">People Can post to Your College</p><hr/>
                  <span id="whatsrch">You can edit your privacy setting for specific People</span><br/><hr/></div>
                  </div>
               
              
              
              </div>
          </div>
          
     
      
  </body>';
                }
     ?>
</html>
