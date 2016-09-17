/* 
    Created on : Jun 14, 2015, 8:22:24 AM
    Author     : Vijayakumar <vijayakumar at www.sedfed.com>
*/

function setTbTTip(event,txt){
    
    $('#TaskBTt').fadeIn().css({'top':event.pageY-10});
    $('#tT_Tb_Txt').text(txt);
}
function expndNotfc(imgcont,postcap){
    $(postcap).slideDown();
    $(imgcont).fadeIn();
}
function hideNotfc(imgcont,postcap){
    $(imgcont).fadeOut();
     $(postcap).slideUp();
    
}
$(document).ready(function()
	{
		var myword="ns";

		$('#viewrelreq').click(function() 
			{
		aio_ajax(0,'myword',myword,'','','fornotifseereq.php','#relreq_cont');		
     
			});
	});

function addrelsinnotif(u)
{
  $("#saveme"+u+"").html("Saving");
         
    
     var myn=$("#mysavenmnt"+u+"").val();
     
    var type=$("#addRelTypent"+u+"").val();
 
    var req_cont="usrnm="+u+"&myname="+myn+"&type="+type;
     var urll="acceptreq.php?"+req_cont;
    aio_ajax2(0,'','','','',urll,"#adreqrslt"+u+"");
   $("#saveme"+u+"").html("Saved");
         
}

function shownewmsg()
{
       aio_ajax2(0,'','','','','shounseenmsg.php',"#Notif_Msg_Cont");
	 
}

function quickpost()
{
    var wrd=$("#qckpostwrd").val();
    aio_ajax2(0,'postc',wrd,'myw','ns','qckpost.php',"#qckpost");
     
}
var qc=0;

function sendqcmsg()
{
    $("#sendqckmsg").html("Sending...");
    var msg=$("#myqcmsgcont").val();
    var allrel;
    if(document.getElementById("allrelqc").checked===true)
    {
        allrel=1;
    }else
    {
        allrel=0;
    }
    var m=1;
    var tc=$("#chkalrdclkd").val();
    for(m=1;m<=tc;m++)
    {
        var uid="#qcmsg"+m;
        var users=$(uid).val();
        var fd=new FormData();
        fd.append('msg',msg);
        fd.append('allrel',allrel);
        fd.append('users',users);
         fd.append('myw',"ns");
         fd.append('cnt',m);
        
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
 
             $("#sendqckmsg").html(xmlhttp.responseText);
             
           }else{

            }
          };
            xmlhttp.open("POST","sendqckmsg.php",true);
            xmlhttp.send(fd);
    }
}

function sendnotification()
{
    $("#sendqcknot").html("Sending...");
    var notif=$("#notifcontqck").val();
    var allrels;
    if(document.getElementById("allrelnotif").checked===true)
    {
        allrels=1;
    }else
    {
        allrels=0;
    }
    var mn=1;
    var cnt=0;
    var tot=$("#chkalrdclkd").val();
    for(mn=1;mn<=tot;mn++)
    {
        var uids="#qcnot"+mn;
        var user=$(uids).val();
       
        //alert(user);
         if(user>0)
        {
            
           if(cnt===0)
           {
               cnt=1;
           }else
           {
               cnt=2;
           }
        }
        var fds=new FormData();
        fds.append('msg',notif);
        fds.append('allrel',allrels);
        fds.append('users',user);
         fds.append('myw',"ns");
         fds.append('cnt',cnt);
     
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
 
             alertTt("Success");
              $("#sendqcknot").html("Notification Sent");
           }else{

            }
          };
         
            xmlhttp.open("POST","sendqcknotif.php",true);
             
         
            xmlhttp.send(fds);
    }
}
function reachus(v)
{
    $('#sendfdb').html("Sending...");
    var textc=$(v).val();
    var myw="ns";
   var fdsd=new FormData();
    fdsd.append('feat',textc);
    fdsd.append('myw',myw);
    aio_ajax(0,'feat',textc,'myw',myw,'sendfeedback.php','#sendfdb');
       
    
}
function profileviews()
{
    $('#Main_Notif_Profile_Views').fadeIn();
     $('#Notif_ProfView_Cont').html("Loading Please wait...");
            aio_ajax2(0,'','','','','profileviews.php','#Notif_ProfView_Cont');
     
    
}
function shoesecalert()
{
    $('#Main_Notif_Security_Alert').fadeIn();
    
             $("#Notif_SecAl_Cont").html("Loading Please wait...");
             aio_ajax(0,'','','','','showsecalert.php','#Notif_SecAl_Cont');
   
}
function showcolor()
{
   if($(".MNF_like_itm").css('background-color')==="rgb(240,248,255)")
   {
       
       $(".MNF_like_itm").fadeOut().fadeIn().delay(2000).css({'background-color':"white"});
   }else
   {
       
           $(".MNF_like_itm").fadeOut().fadeIn().delay(2000).css({'background-color':"white"});
  
   }
}
function showmoresecalert(id,what,vals)
{
    var fd=new FormData();
    fd.append('id',id);
    fd.append('ct',what);
    var totcnt=$("#for_of_str_wrn_acc").val();
    fd.append('tcnt',totcnt);
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
              //alert(xmlhttp.responseText);  
             $(id).append(xmlhttp.responseText);
             
           }else{

            }
          }
            xmlhttp.open("POST","showmoresecalert.php",true);
            xmlhttp.send(fd);
            
    $('#for_ovrflwwrnpass').remove();
}


function showmorestracc(idb)
{
    var fdsc=new FormData();
    fdsc.append('id',idb);
    var totcnt=$("#my_ovf_str_acc").val();
    fdsc.append('tcnt',totcnt);
    aio_ajax(2,'','','','','showmorestracc.php',idb);
    
            
    $('#for_ovf_str_acc').remove();
    
}
function showmorewrnlog(idc)
{
    var totcnt=$("#my_ovf_wrn_acc").val();
    fdc.append('tcnt',totcnt);
    aio_ajax(2,'tcnt',totcnt,'','','showmorewrnacc.php',idc);
            
    $('#for_ovf_wrn_acc').remove();
}

function showmyproposals()
{
    $("#Main_Notif_Propose").fadeToggle();
    
     $('#forproposalsld').html("<div style=\"padding:390px;margin-top:50px;\">Loading Please wait...</div>");
    aio_ajax(0,'','','','','showmyproposals.php','#forproposalsld');        
     
}

function accptprps(u,id,regid,m)
{
    
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
   
             $(id).html(xmlhttp.responseText);
             
           }else{

            }
          }
    if(m==="1")
    {
        
            xmlhttp.open("POST","accptprps.php?q="+u,true);
    }
    if(m==="2")
    {
        
            xmlhttp.open("POST","rejctprps.php?q="+u,true);
    }
            xmlhttp.send(); 
}

function show_more_who_likes(last_id,me)
{
       $(me).remove();
       aio_ajax(3,'last_id',last_id,'','','../web/show_more_who_likes.php','#Notif_Like_Cont');        
     
       
}
function show_more_who_unlike(last_id,me)
{
       $(me).remove();
       aio_ajax(3,'last_id',last_id,'','','../web/show_more_who_unlike.php','#Notif_unLike_Cont');        
     
}
function show_more_who_cmnt(last_id,me)
{
        $(me).remove();
       aio_ajax(3,'last_id',last_id,'','','../web/show_more_who_cmnt.php','#Notif_Cmnt_Cont');        
     
}
function show_more_who_rate(last_id,me)
{
       $(me).remove();
       aio_ajax(3,'last_id',last_id,'','','../web/show_more_who_rate.php','#Notif_Rate_Cont');        
      
}

function shownotifpeople(nid,my_n)
{
    
    $("#notifpplcont"+my_n+"").html("Loading Please wait...");
            
    $("#shownotifpplls"+my_n+"").fadeIn();
     $("#Notif_Like_Cont").html("<div style=\"padding:50px;color:navy;\">Loading Plese wait...</div>");
     aio_ajax(0,'q',nid,'','','shownotifppl.php',"#shownotifpplls"+my_n+"");
 
}

function showwholikes()
{
    $('#Main_Notif_Post_Gift_Like').fadeToggle();
     $("#Notif_Like_Cont").html("Loading Please wait...");
 aio_ajax(0,'','','','','showwholikes.php',"#Notif_Like_Cont");            
   
}


function showhwmanyunlik()
{
    $('#Main_Notif_Post_Gift_Unlike').fadeToggle();
     $("#Notif_unLike_Cont").html("<div style=\"padding:50px;color:navy;\">Loading Plese wait...</div>");
   aio_ajax(0,'','','','','showhwmnyunlikes.php',"#Notif_unLike_Cont");          
      
}

function whorates()
{
   $('#Main_Notif_Post_Gift_Rate').fadeToggle(); 
    $("#Notif_Rate_Cont").html("<div style=\"padding:50px;color:navy;\">Loading Plese wait...</div>");
      aio_ajax(0,'','','','','show_who_rates.php',"#Notif_Rate_Cont");       
    
}


function showwhocmnt()
{
   $('#Main_Notif_Post_Gift_Comment').fadeToggle(); 
   $("#Notif_Cmnt_Cont").html("<div style=\"padding:50px;color:navy;\">Loading Plese wait...</div>");
    aio_ajax(0,'','','','','show_who_cmnt.php',"#Notif_Cmnt_Cont");         
     
}


function showwhodwn()
{
  $('#Main_Notif_Post_Gift_Comment').fadeToggle();
  aio_ajax(0,'','','','','show_who_dwn.php',"#Notif_Cmnt_Cont");
  
 }
 var t=0;
 function putcommentlike(w,cmid,chngid)
 {
     t=t+1;
     if(t>1)
     {
         t=0;
     }
     if(w===1)
     {
             if(t===1)
     {
         $(chngid).html("Liked");
     }else
     {
         $(chngid).html("Like");
     } 
     }else
     {
     if(t===1)
     {
         $(chngid).html("Unlike");
     }else
     {
         $(chngid).html("Unliked");
     }
     }

     aio_ajax(0,'what',w,'cmtid',cmid,'put_cmnt_like.php');
      
 }
 
 function showoverall()
 {
    $('#Main_Notif_Post_Gift_OA').fadeToggle(); 
    aio_ajax(0,'','','','','show_ovr_all.php',"#ovrall_cont");
    
 }



function iamseennot(notif_id,bgclr)
{
    $(bgclr).css({"background-color":"whitesmoke"});
    aio_ajax(0,'q',notif_id,'','','show_new_notif.php');
     
}
function showmorenotifs()
{
    var maxv=$("#max_notif_id").val();
 
   $("#for_mv_max_not").remove();
   $("#remv_pre_shmr").remove();
   aio_ajax(2,'q',maxv,'','','show_more_notif.php','#for_new_notif');
    
}
function showmore_prf_view()
{
    var mx_pv=$("#max_prf_view").val();
    $("#shr_mr_prf_vw").remove();
    $("#for_rmv_max_val_prf").remove();
    aio_ajax(2,'q',mx_pv,'','','show_more__prv_vw.php','#Notif_ProfView_Cont');
      
}

function add_qck_msg_ppl()
{
    
       
      
    aio_ajax(0,'q','qcmsg','','','add_members.php','#for_add_members');  
         $("#selectppldiv").fadeIn();
         
}
