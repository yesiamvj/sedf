function createnewgroup()
{
     $('#forcrtgrp').fadeIn();
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
        
              $('#forcrtgrp').html(xmlhttp.responseText);
        
            }else{
                
            }
        }
       
    xmlhttp.open("GET","grpmsg.php",true);
    xmlhttp.send();
}

function creategrp()
{
       var allowsec=0;
  $('#forcrtgrp').fadeIn();
  $("#createbtn").html("Creating");
    var n=0;
 
    var grpname=$("#NewGrpNme").val();
    var grptheme=$("#NewGrpTheme").val();
grptheme=grptheme.substring(1,grptheme.length);
    var pub;
    var priv;
    var totc=$("#chkalrdclkd").val();
   if(document.getElementById("publico").checked===true)
   {
        pub=1;


   }else
   {
       pub=0;
   }
    if(document.getElementById("privateo").checked===true)
   {
       priv=1;
   }else
   {
       priv=0;
   }

   var als;
   var nals;




    if(document.getElementById("allowsec").checked===true)
   {
       als=1;
   }else
   {
       als=0;
   }

     if(document.getElementById("notallowsec").checked===true)
   {
       nals=1;
   }else
   {
       nals=0;
   }
   var grp_cont;
    var xmlhttp = new XMLHttpRequest();
      
    for(n=1;n<=totc;n++)
    {
   
          var id="#grp_chat_add"+n;
       
        var users=$(id).val();
   
         var fileid="#grppic";
  
     var file_data = $(fileid).prop('files')[0]; 
  var len=$(fileid).prop('files').length;
 
     var forms = new FormData(); 
          forms.append('filem',file_data);
         forms.append('grpname',grpname);
         forms.append('allowsec',als);
         forms.append('nals',nals);
         forms.append('publicg',pub);
         forms.append('privateg',priv);
         forms.append('myn',n);
         forms.append('userid',users);
      
         forms.append('grptheme',grptheme);

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                $(fileid).val('');
                  $("#CreateNewGroup").fadeOut();
           
              alertTt(xmlhttp.responseText);
               $("#createbtn").html("Created");
            
            }
        }
       
    xmlhttp.open("POST","crtgrppecs.php?q="+"ns",true);
    xmlhttp.send(forms);
        
    }
   
}
function preview_gpic(pic)
{
       if(pic.files[0].type==="image/jpeg" || pic.files[0].type==="image/png" || pic.files[0].type==="image/jpg" ||  pic.files[0].type==="image/ico")
       {
       var reader=new FileReader();
       reader.onload=function(e)
       {
             $("#grppicprev").html('<img src="'+e.target.result+'" style="max-width:100px;max-height:100px;" />'); 
       };
       reader.readAsDataURL(pic.files[0]);        
       }
      
}
function show_add_mems(dc)
{
       $("#grp_addmems").fadeIn();
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
        
              $('#for_addppl_dvi').html(xmlhttp.responseText);
        
            }else{
                
            }
        }
       
    xmlhttp.open("POST","add_members.php?q="+dc,true);
    xmlhttp.send();   
}

function check_team_name(team,ids)
{
       
      var cont="myw="+"ns"+"&team="+team;
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
              $(ids).html(xmlhttp.responseText);
            }
        };
        xmlhttp.open("post", "check_team_name.php?"+cont, true);
        xmlhttp.send(); 
   
}