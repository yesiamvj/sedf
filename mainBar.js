/* 
    Created on : Jun 19, 2015, 8:18:26 PM
    Author     : Vijayakumar <vijayakumar at www.sedfed.com>
*/


$(document).ready(function()
{
       $('#SF_inpBigSrch').keyup(function(e)
       {
              var df=e.which || e.keycode;
              if(df===13)
              {
	    search_full();
              }
       });
});
function r(cnt){
      
                 $("#newrelsreqs").html(cnt);
                 $("#for_new_rels").html(cnt);
}
function m(cnt){
      
    $('#Notif_MsgCont').html(cnt);
}
function nf(cnt){
 
      $("#unreadnotif").html(cnt);
                $("#Notif_BulbCount").html(cnt);
}
function aio_ajax2(want_alert,req1,req1_val,req2,req2_val,addr,result)
{
       
      
       var fmdt=new FormData();
      fmdt.append(req1,req1_val);
     fmdt.append(req2,req2_val);
    
            jqXHR=$.ajax({
                url: addr,  
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: fmdt,                         
                type: 'post',
                success: function(php_script_response){
	      if(want_alert===3)
	      {
	             $(result).prepend(php_script_response);
	      }
	      if(want_alert===2)
	      {
	             $(result).append(php_script_response);
	      }
	      if(want_alert===0)
	      {
	            
	             $(result).html(php_script_response);
	      }
                    
	 if(want_alert===1)
	 {
	        alertTt(php_script_response);
	 }
                     }
	    
     });
    
}
function gf(lkc,ukc,rtc,cmt,cnt){
     
           $("#likecount").html(lkc);
                   
               $("#likecountttl").html("New "+lkc);
               $("#unlikecouutn").html(ukc);
                   $("#unlikecnt_ttl").html("New "+ukc);
                     $("#ratecount").html(rtc);
                   $("#rtcnt_ttl").html("New "+rtc);
                    $("#cmtcount").html(cmt);
                   $("#cmt_cnt_ttl").html("New "+cmt);
     $("#Notif_GiftCount").html(cnt);
}
function z(re,me,nfi,lkc,ukc,rtc,cmt,gif,cuid,msgcnt,g_cnt,g_id,ocid){
      // alert();
       //ajStAr_ActiveChats();
       
      r(re);
       m(me);
       nf(nfi);
       gf(lkc,ukc,rtc,cmt,gif);
      
       ajStAr_ActiveChats(cuid,msgcnt,"acp");
       ajStAr_ActiveChats(g_id,g_cnt,"gcp");
       ajStAr_ActiveChats(ocid,"_0_","ocl");
    
     
}
function joingrp(grp_id,btn_id)
{
       
       aio_ajax2(0,'q',grp_id,'','','../web/join_grp.php',btn_id);

}
function ajStAr_ActiveChats(cuid,msgcnt,type){
    
    var MsgCntAr=new Array();
    var CuIdAr=new Array();
       var textFid=cuid;
       var textCount=msgcnt;
      textFid=textFid.substring(1,textFid.length);
      textCount=textCount.substring(1,textCount.length);
      //alert();
       while(textFid.indexOf('_')>-1){
              textFid=textFid.replace('_',',');
              
       }
     while(textCount.indexOf('_')>-1){
          textCount=textCount.replace('_',',');
     }
    // alert();
       CuIdAr=textFid.split(",");
       MsgCntAr=textCount.split(",");
       
       if(type==="acp"){
           for(var i=0;i<CuIdAr.length;i++){
             
           acp(MsgCntAr[i],CuIdAr[i]);
          
           
       }
       }
       if(type==="gcp"){
          // alert();
           for(var i=0;i<CuIdAr.length;i++){
           gcp(MsgCntAr[i],CuIdAr[i]);
       }
       }
       if(type==="ocl"){
           for(var i=0;i<CuIdAr.length;i++){
           ocl(CuIdAr[i]);
       }
       }
       
}

var  jqXHR;
function lock_my_screen()
{
       aio_ajax(0,'myword','ns','','','../web/lock_my_screen.php','');
        $('#SedFedLockScreenOut').fadeToggle(1000);
                       
}
var pre_ajax;
var mn=0;
function aio_refresh()
{
     
      qc=qc+1;
      if(qc>1)
      {
      // qck_refresh.abort();   
      }
      var onists=$('#setonoffval').val();
    
      var fmdt=new FormData();
      fmdt.append('i',onists);
      fmdt.append('rnad',Math.random());
            var qck_refresh=$.ajax({
                url: "../web/zf.php",  
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: fmdt,                         
                type: 'post',
                success: function(php_script_response){
	
	eval(php_script_response);
                 
                     }
	    
     }); 
}

setInterval(aio_refresh,5000);


function shownotifs()
{
   $('#Main_Notif_Bulbs').fadeToggle();
   $('#for_new_notif').html("<div style=\"padding:50px;color:navy;\">Loading Please wait...</div>");
             aio_ajax(0,'myw','ns','','','shownotifs.php','#for_new_notif');
   
}
function aio_ajax(want_alert,req1,req1_val,req2,req2_val,addr,result)
{
      
       mn=mn+1;
      if(mn>1)
      {
           
             jqXHR.abort();
      }
       var fmdt=new FormData();
      fmdt.append(req1,req1_val);
     fmdt.append(req2,req2_val);
    
            jqXHR=$.ajax({
                url: addr,  
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: fmdt,                         
                type: 'post',
                success: function(php_script_response){
	   
	      if(want_alert===0)
	      {
	            
	              $(result).html(php_script_response);
	      }else
	      {
	             if(want_alert===3)
	             {
		   $(result).append(php_script_response);
	             }
	             
	      }
                   
	 if(want_alert===1)
	 {
	        alertTt(php_script_response);
	 }
	 
	 
                     }
	    
     });
    
}
function meOnMainBar(event,Ttcont){
    $('#MainBarTtTxt').text(Ttcont);
    $('#MainBarToolTip').css({'top':event.clientY}).fadeIn();
}
function meOutMainBar(){
    $('#MainBarToolTip').fadeOut();
}
 function checkPass(){
       var pass=$("#lock_pass").val();
       var cur=$("#SF_LS_password").val();
       
    if(cur===pass){
           
        
         lock_my_screen();
         return true;
    }
    else{
        return false;
    }
   
}
function checkLockPass(){
    if(checkPass===true){
        $('#SF_LS_AlertTxt').text('Password to Unlock');
    }
    else{
        $('#SF_LS_AlertTxt').text('Wrong Password');
    }
}
function doStst(){
    $('#LiveUpload').css({'background-color':'green'}).animate({'width':'100%'},'slow');
}
function SrchCatSelected(chkid,Ttid){
    if(document.getElementById(chkid).checked===true){
        $(Ttid).fadeIn().delay(3000).fadeOut(4000);
        document.getElementById('Chk_SrchPpl').checked=false;
        document.getElementById('Chk_SrchPost').checked=false;
        document.getElementById('Chk_SrchFlash').checked=false;
        document.getElementById('Chk_SrchMsg').checked=false;
        document.getElementById('Chk_SrchNotif').checked=false;
        document.getElementById(chkid).checked=true;
    }
    else{
         $(Ttid).hide();
    }
}
function showPageLoadStatus(){
    $('#SF_pageLiveLoadedStatus').animate({'width':'500px'},'slow').delay(1000).fadeOut();
    $('#SedFed_PageStatus').fadeIn().delay(500).fadeOut();
   
}
function BigSrchTypeSelcted(slctid){
       
    var type=$(slctid).val();
    if(type==="People")
    {
           $('#srchthis').val("Name");
           
    }
    if(type==="Posts")
    {
           $('#srchthis').val("Poster Name");
    }
    if(type==="Messages")
    {
             $('#srchthis').val("Sender Name");
    }
    if(type==="FlashNews")
    {
           
           $('#srchthis').val("Flash Message");
    }
    if(type==="Pages")
    {
           
           $('#srchthis').val("Group/Page Name");
    }
  
   $('.BigSearchTypeFilters').hide();
   $('#BST_'+$(slctid).val()).fadeIn();
    
}
function srchInp(){
                  }
                  
         var n=0;          
 function searchsedfed(search)
 {
     n=0;
  
                          $('.SFTB_srchInp').val($('#SF_inpBigSrch').val());
                      if($('#SF_inpBigSrch').val()===''){
                          $('#SF_SearchSugg').slideUp();
                          
                      }
                      else{
                          $('#SF_SearchSugg').slideDown();
                      }
                      
                      
                       var to_srch=$("#srchthis").val();
     
    
                      if(to_srch==="Mobile No")
	     {
	           
	            if(search.length>8)
	            {
		  
		   $("#mob_no_tip").fadeOut(); 
	            }else
	            {
		  
		   $("#mob_no_tip").fadeIn(); 
	            }
	           
	     }else
	     {
	            $("#mob_no_tip").fadeOut(); 
	     }
       aio_ajax(0,'catgry',to_srch,'my',search,'../web/search_sedfed.php','#srch_result_cont');              
                      var tot_rslt=$("#tot_srch_cnt").val();
if(tot_rslt>9)
{
       $("#for_show_all_result").fadeIn();
}else
{
        $("#for_show_all_result").fadeOut();
}
                      
                      

               
 }
    
  
 $(document).ready(function(){
   

    $(".search_sedfed").keydown(function(event){
         
        var x = event.which || event.keyCode;
     
        var sft;
        var s=0;
          var preuserid;
               var ap=0;
               var cntt=0;
               var asd=0;
               var down=0;
               var dfg=0;
               var ex=0;
               var finallistcnt=$("#tot_srch_cnt").val();
               
              
    
    if(x===40)  //for down key
        {
           
             asd=asd+1;
             ex=ex+1;
         
         if(n>=finallistcnt)
        {
            
            n=1;
           
            var pcssn=finallistcnt;
        }
        else{
             
             n=n+1;
             var pcssn=n-1;
        }
        var hilituser="#srched"+n;
        var dltprecssu="#srched"+pcssn;
          var usernam="#srched_user"+n;
          	
          if(n>5)
          {

	for(s=1;s<=5;s++)
	{
	       var hide_user="#srched"+s;
	       $(hide_user).fadeOut();
	}
          }else
          {
	for(s=1;s<=5;s++)
	{
	       var hide_user="#srched"+s;
	       $(hide_user).fadeIn();
	}
          }
           $(hilituser).css({"background-color":"lightcyan","color":"white"});
         
        $(dltprecssu).css({"background-color":"white","color":"navy"});
        }
        else{
           
            var cnt=0;
            if(x===13)//for enter key
            {
                var hituserid="."+n;
                
               var userscls="."+n;
               var usersid="#usersid"+n;
               var profile="ppl_profile"+n;
             document.getElementById(profile).click();
               usersid=$(usersid).val();
               
               var usersname=$(userscls).val();
               var wantedpplval=$("#wchpplwant").val();
               
             
            }
              
            if(x==38) // for (^) key
            {
                var dltprecss="#srched"+n;
                var dltprecssbn="."+n;
                 
                 n=n-1;
                if(n<1)
                {
                    if(n<0)
                    {
                        n=finallistcnt;
                    }
                   
                       
                }
                
           if(n<=5)
           {
	 for(s=1;s<=5;s++)
	{
	       var hide_user="#srched"+s;
	       $(hide_user).fadeIn();
	}
           }
           if(n<1)
           {
	 for(s=1;s<=5;s++)
	{
	       var hide_user="#srched"+s;
	       $(hide_user).fadeOut();
	} 

	
	if(finallistcnt>5)
	{
	  for(s=finallistcnt;s>=6;s--)
	{
	       var hide_user="#srched"+s;
	       $(hide_user).fadeIn();
	}       
	}else
	{
	        for(s=finallistcnt;s>=0;s--)
	{
	       var hide_user="#srched"+s;
	       $(hide_user).show();
	} 
	}
           }
               
        var hilituser="#srched"+n;
        var username="#srched_user"+n;
      $(hilituser).css({"background-color":"lightcyan","color":"white"});
       
      $(dltprecss).css({"background-color":"white","color":"navy"});
            }
        }
     
    });
});

function focus_this_srch(ids,ns)
{
   n=ns;
     
    var tot=$("#tot_srch_cnt").val();
   
    var k=0;
    for(k=1;k<=tot;k++)
    {
        var nid="#srched"+k;
      
        if(nid!==ids)
        {
            
    $(nid).css({"background-color":"white"});
    

        }else
        {
            
    $(nid).css({"background-color":"lightcyan","color":"white"});
    
    
         
        }
    }
}

function search_full()
{
     
       $("#SedFed_SearchTheater").fadeIn();
       var cont=$("#SF_inpBigSrch").val();
        var to_srch=$("#srchthis").val();
     
                      
                       
        aio_ajax(0,'catgry',to_srch,'my',cont,'../web/search_sedfed.php','.SF_ThSrchResults');               
                      
       
}
function open_create_flash()
{
      
                     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#CreateNewFlash").html(xmlhttp.responseText).fadeIn();
           }
          };
            xmlhttp.open("POST","create_flash.php?",true);
            xmlhttp.send();
}

function flash_my_news()
{
       var news=$(".ThWinFlashInp").val();
       var allppl=0;
       
       if(document.getElementById("allppl").checked===true)
       {
       allppl=1;       
       }
          
       aio_ajax(0,'news',news,'allppl',allppl,'publish_flash.php','#CreateNewFlash');
        
}


function show_next_flash(which)
{
       var cur_flash=$("#cur_flsh_id").val();
    $("#for_next_flash").fadeOut();
       aio_ajax(0,'flash_id',cur_flash,'q',which,'next_flash.php','#for_next_flash');
       $("#cur_flsh_id").remove();
             
}

function open_crt_grp_chat()
{
       aio_ajax(0,'','','q','ns','grpmsg.php','#for_grp_and_team_creat');
          
}

function upload_adv_post()
{
       var post_caption=$("#NPASU_TextEditor").val();
       var cont="myw="+"ns"+"&postc="+post_caption;
       aio_ajax(0,'myw','ns','postc',post_caption,'qckpost.php','');
        
       
}
function show_next_step_post()
{
      var post_caption=$("#NPASU_TextEditor").val();
        aio_ajax(0,'myw','ns','postc',post_caption,'show_next_step_post.php','#next_setp_post');
        $("#NPASU_TextEditor").val('');
            
}
function simple_post()
{
       
          var post_caption=$("#simple_post_cap").val();
          
       aio_ajax(0,'myw','ns','postc',post_caption,'qckpost.php','');
       $('#newSimplePost').fadeOut();
       
}

function open_meme()
{
       
        $('#newPostTypeSelecterPopUp').hide(750);
        aio_ajax(0,'','','','','meme.php','#for_meme');
       
       
}

 
 function speedup_my_images(ql)
 {
     
     aio_ajax(0,'qlt',ql,'ns','ns','set_sppedup_qlty.php','');
          
     var dt=confirm("Are you sure Refresh and speed up this page?");
     if(dt===true)
     {
         window.location.href='globe.php';
     }
  
 }
 
 function select_post_pers_view()
 {
     var allppl=0;
     if(document.getElementById("all_ppl").checked===true)
     {
         allppl=1;
     }
    
     aio_ajax(0,'qlt',allppl,'','','slct_post_pers_view.php','');
       var dt=confirm("Are you sure Refresh Page?");
     if(dt===true)
     {
         window.location.href='globe.php';
     }
 }
 function resizePostUp(){
     var postSize=$('#postSizeDecider').val();
   
     $('.TheWhatsUp').animate({'width':postSize+'%'});
   
 }
 function normTheme(){
     $('.TheWhatsUp').attr({'id':'norm'});
 }
 function compactTheme(){
      $('.TheWhatsUp').attr({'id':'compact'});
 }