/* 
    Created on : Jun 18, 2015, 11:39:16 AM
    Author     : Vijayakumar <vijayakumar at www.sedfed.com>
*/
var t=0;
function clickminico(cnt)
{
    t=t+1;
    if(t>1)
    {
        t=0;
    }
    var id="#ChatWind"+cnt;
    $(id).fadeToggle();
    var icid="#ChatIcon"+cnt;
    if(t==1)
    {

    $(icid).css({"top":"430px"});
    }else
    {

    $(icid).css({"top":"430px"});
    }
}
var ct=0;
function aio_ajax3(result_tp,req1,req1_val,req2,req2_val,trgt_url,result_plc)
{
       ct=ct+1;
       if(ct>1)
       {
             // dfg.abort();
       }
       var fmdt=new FormData();
       fmdt.append(req1,req1_val);
       fmdt.append(req2,req2_val);
       var dfg=$.ajax({
                url: trgt_url,  
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: fmdt,                         
                type: 'post',
                success: function(php_script_response){
	if(result_tp===4)
	{
	       eval(result_plc);
	}
	 if(result_tp===2)
	 {
	   $(result_plc).append(php_script_response);
                     
	 }
	 if(result_tp===0)
	 {
	    $(result_plc).html(php_script_response);
                     
	 }
	 
                     }
	    
     }); 
}
function MaxChatWindow(windid){
    var  oldWidth=$(windid).css('width');
    var  oldHeight=$(windid).css('height');
    $(windid).animate({'height':'+=50','width':'+=25'});
  
     $(windid+' .CW_Conv_InCont').animate({'font-size':'+=1'});
     $(windid+' .CW_Conv_OutCont').animate({'font-size':'+=1'});
}
function MinChatWindow(windid,its_id){
    var  oldWidth=$(windid).css('width');
    var  oldHeight=$(windid).css('height');
    $(windid).animate({'height':'-=50','width':'-=25'});
   
    $(windid+' .CW_Conv_OutCont').animate({'font-size':'-=1'});
    $(windid+' .CW_Conv_InCont').animate({'font-size':'-=1'});//newMsgBGv'.$my_id.'
}
function chatWindMsgInp(holderid,previewId,newMsgTxt,newMsgInp,attchId){
    $(holderid).css({'background-color':'white'});
    $(previewId).fadeIn();
    $(newMsgTxt).text($(newMsgInp).val());
    $(attchId).slideDown();
}
function chatWinInpBlur(holderid,previewId,newMsgInp){
    $(holderid).css({'background-color':'transparent'});
    if($(newMsgInp).val()===""){
        $(previewId).slideUp();
    }
}

function newMsgClr(idnum,m,myid){
     if(m===1)
    {
        $("#mymsgcont"+myid+"").css({"color":""+idnum+""});
    }else
    {
       $("#newMsgBGv"+myid+"").css({"background-color":""+idnum+""});

          $('#newMsgArws'+myid+'').css({'border-left-color':''+idnum+''});
    } 
  
    
}
function smiley(){
    $('#jjj').animate({'margin-left':'150px'},'slow').animate({'margin-left':'0px'},'slow');
}

function showSmiley(windId){
    $('#CopyRSmiley').fadeToggle();
    if($(windId).css('display')==='none'){
        $(windId).css({'display':'inline-block'}).fadeIn();
    }
    else{
        $(windId).fadeOut();
    }
    
}
var sm=0;
function addSmiley(userid,idnum,imgsrc,imgnme){
    sm=sm+1;
    $('#my_add_smily'+userid).append('<div class="CW_MMed_Itm" id="selectedsml'+userid+'"><img class="sf_msg_smiley" id="'+userid+'slctdsml'+sm+'" onmouseover="smiley()" src="icons/smileys/'+imgsrc+'" alt="'+imgsrc+'" /></div>');
    $("#totsmlcnt"+userid+"").val(sm);
   }

var f=0;
        
        


function sendmessage(uid,clrid,bgclr,filid,msg)
{
    $("#mymsgcont"+uid+"").html('Sending...');
    var len=$(filid).prop('files').length;
    
     var file_data = $(filid).prop('files')[0];
     var len=$(filid).prop('files').length;

   var bgcolr=$(bgclr).val();
     var fd=new FormData();
     fd.append('msg',$(msg).val());
    
     fd.append('clr',$(clrid).val());
      
       
     fd.append('user',uid);
     
     fd.append('bgclr',bgcolr);
     var totsmc= $("#totsmlcnt"+uid+"").val();
    
     var n=0;
     for(n=1;n<=totsmc;n++)
     {
         var valc="";
     var sml=$('#'+uid+'slctdsml'+n+'').attr('src');
   
    
     fd.append('cnt',n);
     var t=0;
     if(len>0 && n===1)
     {
         for(t=0;t<len;t++)
         {
             
             var file_data=$(filid).prop('files')[t];
             fd.append('file',file_data);
             fd.append('file_cnt',t);
               var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
               
                $(msg).focus();
               showtohim(uid,valc);
                $(msg).val('');
                $(filid).val('');
                $("#mymsgcont"+uid+"").html('');
                $("#totsmlcnt"+uid+"").val('1');
      $('#my_add_smily'+uid).html('');
     eval(xmlhttp.responseText);
      
      sm=0;
            }
        }
        xmlhttp.open("post", "../web/sendmessage.php", true);
        xmlhttp.send(fd); 
         }
    
     }else
     {
            
          fd.append('smil',sml);
          fd.append('file_cnt',0);
       
           var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
	 
                $(msg).focus();
                
               showtohim(uid,valc);
               
                $(msg).val('');
                $(filid).val('');
                $("#mymsgcont"+uid+"").html('');
                $("#totsmlcnt"+uid+"").val('1');
               
                 eval(xmlhttp.responseText);
      $('#my_add_smily'+uid).html('');
      sm=0;
            }
        }
        xmlhttp.open("post", "../web/sendmessage.php", true);
        xmlhttp.send(fd); 
     }
    
     }
     
}
var n=0;



function showtohim(id,val)
{
        var cont="q="+id+"&msg="+val;
      $("#mymsgcont"+id+"").html(val);
     
        aio_ajax3(0,'q',id,'msg',val,'showtohim.php','');
}
function whathetyped(id)
{
       var m_url="../web/whathetyped.php?q="+id;
     
        aio_ajax3(0,'','','','',m_url,"#hiscurtyped"+id+"");
}

function deletemsg(m_id,delt_this)
{
   
        var m_url="../web/deletemsg.php?q="+m_id;
        aio_ajax3(4,'','','','',m_url,'$('+delt_this+').remove();');
}
function showpre_msgs(c,my_ids)
{
     $("#for_rmv_dh_mr_msgs"+my_ids+"").html('');
   $("#for_rmv_dh_mr_msgs"+my_ids+"").remove();
    var ct="q="+c+"&his_id="+my_ids;
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
              $('#full_conv_hold'+my_ids+'').append(xmlhttp.responseText);
            }
        }
        xmlhttp.open("post", "../web/showpre_msgs.php?"+ct, true);
        xmlhttp.send(); 
        aio_ajax3(2,'q',c,'his_id',my_ids,'../web/showpre_msgs.php','#full_conv_hold'+my_ids+'');
}
function putfile_value(useid,mid,fil)
{
  
  var len=fil.files.length;
  var f=0;
  for(f=0;f<len;f++)
  {
         var fil_name=fil.files[f].name;
    $("#mymsgcont"+mid+"").append(fil_name+"<br/>");        
  }
 
}
function sendgrpmessage(gid,clr_inp,bg_clr,msg_fl,g_msg,itsid)
{
    var usrid=itsid;
    var check=0;
   if(document.getElementById("CWNM_SecChk"+usrid+"").checked===true)
   {
       check=1;
   }
   
    $("#mymsgcont"+usrid+"").html('Sending...');
     var len=$(msg_fl).prop('files').length;
     

   var bgcolr=$(bg_clr).val();
     var fmdt=new FormData();
     fmdt.append('msg',$(g_msg).val());
    
     fmdt.append('clr',$(clr_inp).val());
      
       fmdt.append('shw_name',check);
     fmdt.append('user',gid);
     
     fmdt.append('bgclr',bgcolr);
     var g_totsmc= $("#totsmlcnt"+usrid+"").val();
    
     var n=0;
     
     for(n=1;n<=g_totsmc;n++)
     {
         var valc="";
     var sml=$('#'+usrid+'slctdsml'+n+'').attr('src');
 
    
     fmdt.append('cnt',n);
     var t=0;
     if(len>0 && n===1)
     { 
         for(t=0;t<len;t++)
         {
             var file_dat=$(msg_fl).prop('files')[t];
             fmdt.append('file',file_dat);
             fmdt.append('file_cnt',t);
               var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
             
                $(g_msg).focus();
             
                $(g_msg).val('');
                $(msg_fl).val('');
                $("#mymsgcont"+usrid+"").html('');
                $("#totsmlcnt"+usrid+"").val('1');
                 
      $('#my_add_smily'+usrid).html('');
    var wind_id=itsid;
       if(wind_id.indexOf('group')>-1)
       {
              
              lg(gid);
       }
       if(wind_id.indexOf('team')>-1)
       {
              
              lc(gid);
       }
     sm=0;
            }else
            {
               
            }
        }
        xmlhttp.open("post", "../web/send_grp_msg.php", true);
        xmlhttp.send(fmdt); 
         }
    
     }else
     {
          fmdt.append('smil',sml);
            fmdt.append('file_cnt',0);
           var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
               
                $(g_msg).focus();
                $(g_msg).val('');
                $(msg_fl).val('');
                $("#mymsgcont"+usrid+"").html('');
                $("#totsmlcnt"+usrid+"").val('1');
             
      $('#my_add_smily'+usrid).html('');
       var wind_id=itsid;
       if(wind_id.indexOf('group')>-1)
       {
              lg(gid);
       }
       if(wind_id.indexOf('team')>-1)
       {
              lc(gid);
       }
       
      
      sm=0;
            }
        };
        xmlhttp.open("post", "../web/send_grp_msg.php", true);
        xmlhttp.send(fmdt); 
     }
    
     }
     
}
function showpre_grp_msgs(g_msg_id,its_i,apnd_id,grp_id,my_id)
{
    $(its_i).remove();
   
        var m_url="../web/show_more_grp_msgs.php?q="+g_msg_id;
        aio_ajax3(0,'grp_id',grp_id,'my_id',my_id,m_url,apnd_id);
}
function delete_gr_msg(msg_id)
{
   
        aio_ajax3(0,'q',msg_id,'','','../web/delt_grp_msg.php',"#CWNewMsgUse"+msg_id+"");
}
function lg(grp_id)
{
  var window_id='group'+grp_id;
    var chkvl=$("#on_live_grp_convrse"+window_id).val();
   
     if(chkvl==="1")
    {
           
           var fmdt= new FormData();
    fmdt.append('q',grp_id);
    fmdt.append('cnt',window_id);
      $.ajax({
                url: '../web/live_grp_chat_convrs.php',  
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: fmdt,                         
                type: 'post',
                success: function(php_script_response){
	 //alert(php_script_response+ "grp id is "+grp_id);
	   $("#forlivegrpconv"+window_id).prepend(php_script_response);
                     }
	    
     }); 
               
           
    }else
    {
     
    }


}
function lc(grp_id)
{
       
      var window_id='team'+grp_id;
    var chkvl=$("#on_live_grp_convrse"+window_id).val();
     if(chkvl==="0")
    {
    }else
    {
    var fmdt= new FormData();
    fmdt.append('q',grp_id);
    fmdt.append('cnt',window_id);
      $.ajax({
                url: '../web/live_team_chat_convrs.php',  
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: fmdt,                         
                type: 'post',
                success: function(php_script_response){
	 
	   $("#forlivegrpconv"+window_id).prepend(php_script_response);
	   
                     }
	    
     }); 
               
            
    }


}


function open_msg_smiley(cnt,cu_id)
{
    if($('#sml_load'+cu_id).val()==="0")
    {
    var fd=new FormData();
    fd.append('cnt',cnt);
    fd.append('cu_id',cu_id)
     $.ajax({
                url: '../web/msg_smiley.php',  
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: fd,                         
                type: 'post',
                success: function(php_script_response){
                    $('#sml_load'+cu_id).val(1);
                   $('#for_load_smileys'+cu_id).html(php_script_response);
                     }
     });    
    }else
    {
         $('#for_load_smileys'+cu_id).fadeToggle();
    }
    
  
}