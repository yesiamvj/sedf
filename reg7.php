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
   <link type="text/css" href="reg7.css" rel="stylesheet" />
   <script src="regis7.js"  type="text/javascript">   </script>
   <link type="text/css" href="register3.css" rel="stylesheet" />
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
                   <form method="post" action="reg7prcs.php" >
     
     <table>
         <tr>
             <td><h1>Personal</h1></td>
         </tr>      
       
<tr>
	<td><font>Laptop Brand</font>
	</td>
        <td>
            <select id="lap" name="numb" value=(this.value)>
    <option value="">Select Brand</option>
    <option value="Acer">Acer</option>
    
    <option value="Advent"><a href="http://en.wikipedia.org/wiki/Advent_Computers" title="Advent Computers" class="mw-redirect">Advent</a> </option>
<option value="Apple"><a href="http://en.wikipedia.org/wiki/Apple_Inc." title="Apple Inc.">Apple</a>  - <a href="http://en.wikipedia.org/wiki/MacBook" title="MacBook">MacBook</a>, <a href="http://en.wikipedia.org/wiki/MacBook_Air" title="MacBook Air">MacBook Air</a>, <a href="http://en.wikipedia.org/wiki/MacBook_Pro" title="MacBook Pro">MacBook Pro</a></option>
<option value="Asus">Asus</option>
<option value="Clevol"><a href="http://en.wikipedia.org/wiki/Clevo" title="Clevo">Clevo</a> </option>
<option value="Dell">Dell</option>
<option value="Doel"><a href="http://en.wikipedia.org/wiki/Doel_%28computer%29" title="Doel (computer)">Doel</a> </option>
<option value="Falcon"><a href="http://en.wikipedia.org/wiki/Falcon_Northwest" title="Falcon Northwest">Falcon Northwest</a>  - DRX, TLX</option>
<option value="Founder"><a href="http://en.wikipedia.org/wiki/Founder_Technology" title="Founder Technology">Founder</a></option>
<option value="Fujitsu"><a href="http://en.wikipedia.org/wiki/Fujitsu" title="Fujitsu">Fujitsu</a>  - <a href="http://en.wikipedia.org/wiki/LifeBook" title="LifeBook" class="mw-redirect">LifeBook</a>, Styoptionstic</option>
<option value="Getac"><a href="http://en.wikipedia.org/wiki/Getac" title="Getac">Getac</a> </option>
<option value="Gegabyte Technology"><a href="http://en.wikipedia.org/wiki/Gigabyte_Technology" title="Gigabyte Technology">Gigabyte Technology</a> </option>
<option value="Gradiente"><a href="http://en.wikipedia.org/wiki/Gradiente" title="Gradiente" class="mw-redirect">Gradiente</a> </option>
<option value="Gruntig"><a href="http://en.wikipedia.org/wiki/Grundig" title="Grundig">Grundig</a> </option>
<option value="Hasee"><a href="http://en.wikipedia.org/wiki/Hasee" title="Hasee">Hasee</a> </option>

<option value="HCL"><a href="http://en.wikipedia.org/wiki/Hindustan_Computers_Ltd." title="Hindustan Computers Ltd." class="mw-redirect">HCL</a> </option>
<option value="HP">HP</option>
<option value="Itautec"><a href="http://en.wikipedia.org/wiki/Itautec" title="Itautec">Itautec</a>  - Itautec, Infoway</option>
<option value="KonAar"><a href="http://en.wikipedia.org/wiki/Kon%C4%8Dar_Group" title="Končar Group" class="mw-redirect">Končar</a>.</option>
<option value="Lanix"><a href="http://en.wikipedia.org/wiki/Lanix" title="Lanix">Lanix</a>  - Lanix Portatiles, Neuron</option>
<option value="Lemote"><a href="http://en.wikipedia.org/wiki/Lemote" title="Lemote">Lemote</a> </option>
<option value="Lenovo"> Lenovo</option>
<option value="LG"><a href="http://en.wikipedia.org/wiki/LG_Electronics" title="LG Electronics">LG</a>  - <a href="http://en.wikipedia.org/wiki/Xnote" title="Xnote" class="mw-redirect">Xnote</a></option>
<option value="Main Gear"><a href="http://en.wikipedia.org/wiki/Maingear" title="Maingear">Maingear</a> </option>
<option value="MDG"><a href="http://en.wikipedia.org/wiki/MDG_Computers" title="MDG Computers">MDG Computers</a> </option>
<option value="Medion"><a href="http://en.wikipedia.org/wiki/Medion" title="Medion">Medion</a>  - Akoya</option>
<option value="Meebox"><a href="http://en.wikipedia.org/wiki/Meebox" title="Meebox">Meebox</a>  - Meebox, Slate</option>
<option value="Microstar"><a href="http://en.wikipedia.org/wiki/Micro-Star_International" title="Micro-Star International">Micro-Star International</a>  - Megabook, <a href="http://en.wikipedia.org/wiki/MSI_Wind_Netbook" title="MSI Wind Netbook">Wind</a></option>
<option value="NEC"><a href="http://en.wikipedia.org/wiki/NEC_Corporation" title="NEC Corporation" class="mw-redirect">NEC</a>  - VERSA, LaVie</option>
<option value="Ooptionvetti=Ooptionbook"><a href="http://en.wikipedia.org/wiki/Ooptionvetti" title="Ooptionvetti">Ooptionvetti</a>  - Ooptionbook</option>
<option value="Onkyo-SOTEC"><a href="http://en.wikipedia.org/wiki/Onkyo" title="Onkyo">Onkyo</a>  - SOTEC</option>
<option value="Origin-PC"><a href="http://en.wikipedia.org/wiki/Origin_PC" title="Origin PC">Origin PC</a> </option>
<option value="Positivo"><a href="http://en.wikipedia.org/wiki/Panasonic" title="Panasonic">Panasonic</a>  - <a href="http://en.wikipedia.org/wiki/Toughbook" title="Toughbook">Toughbook</a>, Sateloptionte, Let\'s Note<sup id="cite_ref-2" class="reference"><a href="#cite_note-2"><span>[</span>2<span>]</span></a></sup></option>
<option value="Razer-BLade"><a href="http://en.wikipedia.org/wiki/Positivo_Inform%C3%A1tica" title="Positivo Informática">Positivo Informática</a>  - Positivo, Platinum, Aureum, Unique, Premium</option>
<option value="Samsung"><a href="http://en.wikipedia.org/wiki/Razer_USA" title="Razer USA" class="mw-redirect">Razer</a>  - Blade</option>
<option value="Sharp-Mebius"><a href="http://en.wikipedia.org/wiki/Samsung_Electronics" title="Samsung Electronics">Samsung Electronics</a>  - <a href="http://en.wikipedia.org/wiki/Samsung_Ativ" title="Samsung Ativ">ATIV</a></option>
<option value="Siragon,C.A"><a href="http://en.wikipedia.org/wiki/Sharp_Corporation" title="Sharp Corporation">Sharp</a>  - Mebius</option>
<option value="System 76"><a href="http://en.wikipedia.org/wiki/Siragon,_C.A." title="Siragon, C.A." class="mw-redirect">Siragon, C.A.</a> </option>
<option value="Tongfang"><a href="http://en.wikipedia.org/wiki/System76" title="System76">System76</a> </option>
<option value="TriGem-Averatec"><a href="http://en.wikipedia.org/wiki/Tongfang" title="Tongfang" class="mw-redirect">Tongfang</a> </option>
<option value="Toshiba"><a href="http://en.wikipedia.org/wiki/TG_Sambo" title="TG Sambo" class="mw-redirect">TriGem</a>  - <a href="http://en.wikipedia.org/wiki/Averatec" title="Averatec">Averatec</a></option>
<option value="Vestel"><a href="http://en.wikipedia.org/wiki/Toshiba" title="Toshiba">Toshiba</a>  - <a href="http://en.wikipedia.org/wiki/Dynabook" title="Dynabook">Dynabook</a>, <a href="http://en.wikipedia.org/wiki/Toshiba_Portege" title="Toshiba Portege" class="mw-redirect">Portege</a>, <a href="http://en.wikipedia.org/wiki/Toshiba_Tecra" title="Toshiba Tecra">Tecra</a>, <a href="http://en.wikipedia.org/wiki/Toshiba_Sateloptionte" title="Toshiba Sateloptionte">Sateloptionte</a>, <a href="http://en.wikipedia.org/wiki/Qosmio" title="Qosmio" class="mw-redirect">Qosmio</a>, <a href="http://en.wikipedia.org/wiki/Libretto_%28notebook%29" title="Libretto (notebook)" class="mw-redirect">Libretto</a></option>
<option value="VIA"><a href="http://en.wikipedia.org/wiki/Vestel" title="Vestel">Vestel</a> </option>
<option value="VIZIO"><a href="http://en.wikipedia.org/wiki/VIA_Technologies" title="VIA Technologies">VIA</a>  - <a href="http://en.wikipedia.org/wiki/NanoBook" title="NanoBook">NanoBook</a>, <a href="http://en.wikipedia.org/wiki/VIA_pc-1_Initiative" title="VIA pc-1 Initiative">pc-1 Initiative</a></option>


<option value="BenQ"><a href="http://en.wikipedia.org/wiki/BenQ" title="BenQ">BenQ</a>  </option>
<option value="Compaq"><a href="http://en.wikipedia.org/wiki/Compaq" title="Compaq">Compaq</a>  </option>
<option value="HTC"><a href="http://en.wikipedia.org/wiki/High_Tech_Computer_Corporation" title="High Tech Computer Corporation" class="mw-redirect">HTC</a>  - <a href="http://en.wikipedia.org/wiki/HTC_Shift" title="HTC Shift">HTC Shift</a></option>
<option value="Hyundai"><a href="http://en.wikipedia.org/wiki/Hyundai" title="Hyundai">Hyundai</a> </option>
<option value="Vision-EMC"><a href="http://en.wikipedia.org/wiki/Phioptionps" title="Phioptionps">Vision</a>  -EMC</option>
<option value="Sony"><a href="http://en.wikipedia.org/wiki/Sony" title="Sony">Sony</a>  -  - <a href="http://en.wikipedia.org/wiki/VAIO" title="VAIO" class="mw-redirect">VAIO</a></option>
<option value="Zepto"><a href="http://en.wikipedia.org/wiki/Zepto_Computers" title="Zepto Computers">Zepto</a></option>
</select>
	
	</td><td id="bv"></td>
</tr>
<tr>
    <td><font>Laptop model</font></td>
    <td><input type="text" id="tx1" name="l" placeholder="Model number" oninput="typingel(\'#tx1\')" ></td>
    
</tr>

	<td><font>Operating system </font> 
	</td>
        <td>
            <input  type="text" name="c" id="tx2" oninput="typingel(\'#tx2\')" Placeholder="OS of the Computer">
	</td><td id="ab"></td>


<tr>
	<td><font>Mobile Brand </font>
	</td>
	<td>
<input  type="text" name="a" id="tx3" Placeholder="Mobile Brand" oninput="typingel(\'#tx3\')">
	</td><td id="bc"></td>
</tr>
<tr>
	<td><font>Operating-system </font>
	</td>
	<td>
	<input type="text" name="act" id="tx4" Placeholder="OS of Mobile" oninput="typingel(\'#tx4\')">
	</td>
        <td id="cb"></td>
</tr>
<tr>
    <td><font>Network </font></td>
	<td>
	<input type="text" id="tx5" name="m" placeholder="Sim Name" oninput="typingel(\'#tx5\')">
	</td>
	<td id="dt"></td>
</tr>
<tr>
	<td>
            <font>Bike  </font>
	</td>
	<td>
		<input type="text" name="sora" id="tx6" placeholder="Bike Model" oninput="typingel(\'#tx6\')">
	
	</td><td id="e"></td>
</tr>

<tr>
    <td><font>Bike Number</font>
	</td>
	<td id="gh">
            <input type="text" name="d" placeholder="Bike Number" oninput="typingel(\'#tx7\')" id="tx7"/>
	</td><td id="nw"></td>
</tr>
<tr>
    <td><font>Car</font>
	</td>
	<td id="gh">
            <input type="text" name="v" placeholder="Car Brand"  id="tx8" oninput="typingel(\'#tx8\')"/>
	</td><td id="nw"></td>
</tr>
<tr>
    <td><font>Car Number</font>
	</td>
	<td id="gh">
            <input type="text" name="cno" placeholder="Car Number" oninput="typingel(\'#tx8\')"  id="tx9"/>
	</td><td id="nw"></td>
</tr>
<tr>
    <td><a href="reg4.php" >
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
