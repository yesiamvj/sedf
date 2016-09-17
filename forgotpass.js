function frgtpass()
{
    var chckval=$("#forgotbtn").val();
    if(chckval==="Forgot Your Password ?")
    {
    var emailtx="<p id=\"fgthint\">Forgot Your Password ?</p><input type=\"text\" id=\"frgtemail\" placeholder=\"Enter your Email / Username to send password\"><br/><input type=\"button\" value=\"Send\" id=\"frgtbtn\" onclick=\"sendemail()\" />";
    $("#frgtpass").html(emailtx);
   $("#forgotbtn").val("Done");
    }else
    {
        $("#frgtpass").html("");
        $("#txtHint").html("");
   $("#forgotbtn").val("Forgot Your Password ?");
    }
    
}
function sendemail()
{
    var name=$("#frgtemail").val();
    var emil=$('#sf_uplader_emil').val();
    
    
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "forgotpass.php?q=" + email, true);
        xmlhttp.send();
}
function upload_sf_bg_pic()
{
       $('#SFUC_BGimg').fadeOut();
       $('#BackPic').fadeIn();
       var emil=$("#sf_uplader_emil").val();
       var   uploader=$("#sf_uploader").val();
       var about=$("#sf_about_this_pic").val();
       var fmdt=new FormData();
       fmdt.append('email',emil);
        fmdt.append('uploader',uploader);
        fmdt.append('about',about);
        fmdt.append('files',$('#sf_bg_pic').prop('files')[0]);
        
        
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
             $('#BackPic').fadeOut();
             alertTt(xmlhttp.responseText);
            }
        };
        xmlhttp.open("POST", "upload_sf_bgpic.php?", true);
        xmlhttp.send(fmdt); 
}

function upload_html_file(html)
{
       
       var fmdt=new FormData();
       fmdt.append('files',$(html).prop('files')[0]);
          var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
             
             alert(xmlhttp.responseText);
            }
        };
        xmlhttp.open("POST", "upload_html.php?", true);
        xmlhttp.send(fmdt); 
}