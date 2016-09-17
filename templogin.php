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
    <title>| SedFed - Registration  </title>
   <link type="text/css" href="templogin.css" rel="stylesheet" />
   <script src="angular.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="registerinit.js" type="text/javascript">     
   </script>
  </head>
  
  <body ng-app="">
      <script type="text/javascript">
     
      
       function srchpople(srch)
          {
           
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
  
$(document).ready(function(){
    $("#searchid").keydown(function(){
        var x = event.which || event.keyCode;
   var fincount=$("#fincnt").val();
        var t="#"+n;
        if(x===40)
        {
         if(n==fincount)
        {
            n=1;
            
            var fg=fincount;
        }
        else{
             n=n+1;
             var fg=n-1;
        }
       
        
        var t="#"+n;
        var uid="."+n;
           
        var dcs="#"+fg;
         
        
        
        var usersid=$(uid).val();
      $(t).css("background-color","red");
      $(dcs).css("background-color","white");
      
        }else{
            if(x===13)
            {
               
                n=n;
                var sg="#"+n;
               var dftb=$(sg).val();
               var uid="."+n;
               var usersid=$(uid).val();
                 alert(dftb +"'s user id is "+usersid);
                $("#result").slideUp(500);
            }
            if(x==38)
            {
                n=n-1;
                if(n<0)
                {
                    n=fincount;
                }
                else{
                    n=n;
                }
                
                var fg=n;
        var dcs="#"+fg;
        
      $(dcs).css("background-color","red");
      $(t).css("background-color","white");
      
            }
        }
     
    });
});
          </script>
          <div id="title_bar"><span>SedFed</span>
          <div id="srch-cont">
<input type="text" class="search" id="searchid" oninput="srchpople(this.value)" placeholder="Search for people" />
<div id="result">
</div>
          </div>
          </div>
          <?php
          $cars = array("Sakthi", "Saakthi", "Aab");
sort($cars);

$clength = count($cars);
for($x = 0; $x <  $clength; $x++) {
     echo "$cars[$x]"; echo "$clength";
     echo "<br>";
}


Imagick::setImageCompression ;
Imagick::setImageCompressionQuality ;
Imagick::stripImage ;
Imagick::thumbnailImage; 
Imagick::writeImage;
$image = 'sakthi.png'; 
    $directory = 'C:\xampp\htdocs\sf2.0\team'; 
    $image_location = $directory . "/" . $image; 
    $thumb_destination = $directory . "/uploads" . $image; 
    $compression_type = Imagick::COMPRESSION_PNG; 
   
    $im = new Imagick($image_location); 
    $thumbnail = $im->clone; 

    $thumbnail->setImageCompression($compression_type); 
    $thumbnail->setImageCompressionQuality(40); 
    $thumbnail->stripImage(); 
    $thumbnail->thumbnailImage(100,null); 
    $thumbnail->writeImage($thumb_destination); 
?>
      </body>
      
      </html>