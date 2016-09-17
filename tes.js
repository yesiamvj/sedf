
var pre=0;

function pass(str)
{
    pre=pre+1;
  
  $("#txtHint").css('background-color','green');
    if (str.length === 0) {
        
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                
            }
        }
        xmlhttp.open("GET", "testfind.php?q=" + str, true);
        xmlhttp.send();
    }
 
 
 
}

 function change(str)
 {
   
    if (str.length === 0) {
        
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("newHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "test2list.php?q=" + str, true);
        xmlhttp.send();
    }
 
 
 }
 
 $(document).ready(function(){
    $("#ew").keydown(function(){
        $("div").animate({width: '500px' });
            
       
    });
});