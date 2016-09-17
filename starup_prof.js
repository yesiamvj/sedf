
function chng_bgm()
{
         var filei="#for_bgm_updt";
     var file_dat = $(filei).prop('files')[0]; 
     var fmds=new FormData();
     fmds.append('file',file_dat);
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#updtbgm").html(xmlhttp.responseText);
           alertTt(xmlhttp.responseText);
           }else{
            }
          }
            xmlhttp.open("POST","chng_bgm.php",true);
            xmlhttp.send(fmds);
}
function preview_my_pic(pic,its_id)
{
       var r=new FileReader();
       var fmdt=new FormData();
       r.onload=(function(e)
       {
              if(its_id=="emptyWallPic")
              {
              $(its_id).css({"background-image":"url("+e.target.result+")"});
      
              }else
              {
	     $(its_id).html('<img src="'+e.target.result+'" style="max-width:100px;"/>');
	    fmdt.append('p_pic',$("#my_prof_pic").prop('files')[0]); 
	    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
         $(its_id).html(xmlhttp.responseText);  
           }else{
            }
          }
            xmlhttp.open("POST","updt_prof_pic.php",true);
            xmlhttp.send(fmdt);
              }
           });
       r.readAsDataURL(pic.files[0]);
}
function openchengepic()
{
         $('#chngppic').fadeIn();
 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#chngppic").html(xmlhttp.responseText).fadeIn();
    
           }else{
             
            }
          }
            xmlhttp.open("POST","../../web/chngpropic.php?",true);
            xmlhttp.send();
}
function change_wall_pic()
{
         $('#chngppic').fadeIn();
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#chngppic").html(xmlhttp.responseText);
             $('#chngppic').fadeIn();
           }else{
             
            }
          }
            xmlhttp.open("POST","change_wpic_edit_prof.php",true);
            xmlhttp.send();
}
function open_change_prof_pic()
{
         $('#chngppic').fadeIn();
          var cont="prof="+"not_in_prof";
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#chngppic").html(xmlhttp.responseText);
             $('#chngppic').fadeIn();
           }else{
             
            }
          }
            xmlhttp.open("POST","change_pic_edit_prof.php?"+cont,true);
            xmlhttp.send();  
}

function updtppic()
{
    
        $("#wchwantchng").val("1");
         var cont="prof="+"not_in_in_prof";
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#targetdiv").html(xmlhttp.responseText);
             
           }else{
             
            }
          }
            xmlhttp.open("POST","img_crop_edit_prof.php?"+cont,true);
            xmlhttp.send();
    
  
}
function openchngwallpic()
{
    $("#wchwantchng").val('2');
    var cont="prof="+"not_in_in_prof";
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#targetdiv").html(xmlhttp.responseText);
    
           }else{
             
            }
          };
            xmlhttp.open("POST","img_crop_edit_prof.php?"+cont,true);
            xmlhttp.send();
}
function showmy_pre_pics()
{
    $("#targetdiv").html("Loading Please wait...");
    
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#targetdiv").html(xmlhttp.responseText);
            
           }else{
            }
          }
            xmlhttp.open("POST","showmyprepics.php?",true);
            xmlhttp.send();
}
function set_selected_pic(as,nm)
{
    var mes=0;
    if(nm==="me")
    {
        mes=1;
    }
    var conts="q="+as+"&mes="+mes;
             $("#targetdiv").html("<img src=\"icons/LoaderIcon.gif\" /><br/>Please wait ...");
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#targetdiv").html(xmlhttp.responseText);
             
           
           }else{
            }
          }
            xmlhttp.open("POST","set_slctd_pic.php?"+conts,true);
            xmlhttp.send();
}
function showmy_pre_wall_pics()
{
      $("#targetdiv").html("Loading Please wait...");
    
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#targetdiv").html(xmlhttp.responseText);
            
           }else{
            }
          }
            xmlhttp.open("POST","showmy_pre_wall_pics.php?",true);
            xmlhttp.send();
}
function set_selected_wall_pic(as,c)
{
    var me=0;
    if(c==="me")
    {
        me=1;
    }
    var cont="q="+as+"&mes="+me;
     $("#targetdiv").html("<img src=\"icons/LoaderIcon.gif\" /><br/>Please wait ...");
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#targetdiv").html(xmlhttp.responseText);
             
           
           }else{
            }
          }
            xmlhttp.open("POST","set_slctd_wall_pic.php?"+cont,true);
            xmlhttp.send();
}
function makeDOB(){
    var tgg=$('#inpTh_Date').val()+" "+$('#inpTh_Mon').val()+" "+$('#myyear').val();
    $('#inp_DOB').val(tgg);
    $('#ThAge').fadeOut()
}