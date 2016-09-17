/* 
    Created on : Jun 16, 2015, 7:04:37 PM
    Author     : Vijayakumar <vijayakumar at www.sedfed.com>
*/
function ocl(cu_id){
  //alert(cu_id);
    $('.OLPN_Itm').fadeOut().fadeIn().css({'color':'grey','background-color':'whitesmoke'});
    $('#offclkcuser'+cu_id+'').fadeIn().css({'color':'green','background-color':'white'});
}
function changeCurOnlineSts(){
  
    if($('#ON_Txt').text()==='I\'m Online'){
        $('#ON_Txt').hide().text('I\'m Offline').css({'color':'crimson'}).fadeIn();
        $('#ON_Nxt').text('to Online');
        $('#OnTopStatus').text('Offline');
        $('#Online_Status').css({'background-color':'crimson',' box-shadow': '-5px 5px 5px -4px crimson'});
         
    }
    else{
         $('#ON_Txt').hide().text('I\'m Online').css({'color':'green'}).fadeIn();
          $('#ON_Nxt').text('to Offline');
           $('#OnTopStatus').text('Online');
          $('#Online_Status').css({'background-color':'rgb(0,200,0)',' box-shadow': '-5px 5px 5px -4px green'});
    }
}
function showOnlinePpl(){
    $('#Offline_People').fadeOut();
    $('#AllPpl_People').fadeOut();
     $('#Online_People').fadeIn();
}
function showOfflinePpl(){
    $('#AllPpl_People').fadeOut();
     $('#Online_People').fadeOut();
      $('#Offline_People').fadeIn();
}
function showAllPpl(){
     $('#Online_People').fadeOut();
      $('#Offline_People').fadeOut();
       $('#AllPpl_People').fadeIn();
}
function NewGrpColorInp(src,tgt){
    $(tgt).css({'background-color':$(src).val()});
    $('#NewGrpNme').css({'color':$(src).val()});
}
function NewTeamColorInp(type){
    if(type==='Team1'){
    $('#NewTeam1ThmeHold').css({'background-color':$('#NewTeam1Theme').val()});
    $('#Team1NameInp').css({'color':$('#NewTeam1Theme').val()});
    $('.NewTeam1Name').css({'color':$('#NewTeam1Theme').val()});
    }
    else{
    $('#NewTeam2ThmeHold').css({'background-color':$('#NewTeam2Theme').val()});
    $('#Team2NameInp').css({'color':$('#NewTeam2Theme').val()});
    $('.NewTeam2Name').css({'color':$('#NewTeam2Theme').val()});
    }
}
function UpdTeamColorInp(type){
    if(type==='Team1'){
    $('#UpdTeam1ThmeHold').css({'background-color':$('#UpdTeam1Theme').val()});
    $('#UpdTeam1NameInp').css({'color':$('#UpdTeam1Theme').val()});
    $('.UpdTeam1Name').css({'color':$('#UpdTeam1Theme').val()});
    }
    else{
    $('#UpdTeam2ThmeHold').css({'background-color':$('#UpdTeam2Theme').val()});
    $('#UpdTeam2NameInp').css({'color':$('#UpdTeam2Theme').val()});
    $('.UpdTeam2Name').css({'color':$('#UpdTeam2Theme').val()});
    }
}
function TeamNameinp(type){
    if(type==='1'){
         $('.NewTeam1Name').text($('#Team1NameInp').val());
    }
    else{
         $('.NewTeam2Name').text($('#Team2NameInp').val());
    }
   
}
function ExpandNewTeam(type){
    if(type==='1'){
        $('#Team1Memb').slideToggle();
         $('#TeamOneHoldr').slideToggle();
         
    }
   else{
        $('#Team2Memb').slideToggle();
        $('#TeamTwoHoldr').slideToggle();
        
   }
}
function ExpandUpdTeam(type){
    if(type==='1'){
        $('#UpdTeam1Memb').slideToggle();
         $('#UpdTeamOneHoldr').slideToggle();
         
    }
   else{
        $('#UpdTeam2Memb').slideToggle();
        $('#UpdTeamTwoHoldr').slideToggle();
        
   }
}
function showMyGroups(){
    $('#OtherGroup_NameFace').hide();
    $('#Group_NameFace').fadeIn();
}
function showOtherGroups(){
     $('#Group_NameFace').hide();
    $('#OtherGroup_NameFace').fadeIn();
}
function GrpdoJoinAct(btnid){
    if($(btnid).text()==='Join'){
         $(btnid).text('Request Sent');
    }
    else{
         $(btnid).text('Join');
    }
   
}
 var n=0;
 var pre;
 var k=0;
function openwind(a)
{
    $("#on_live_convrse").val("1");
   
     n=n+1;
     
     var chk=$('#chat_clkd').html();
     if(chk.indexOf(a)>-1)
     {
        
               $("#usrcw"+a).fadeIn();
               $('#on_lives_convrse'+a).val('1');
         
     }else
     {
         $('#chat_clkd').append(','+a+',');
       var tid=a;
        
        
           var now="<div class=\"chatwinusr\" id=\"usrcw"+a+"\"></div><input type=\"hidden\" value=\""+tid+"\" id=\"myonusrcnt"+n+"\" />";
       
     $("#forchatwindow").append(now); 
              pre=tid;
             
            aio_ajax2(0,'id',tid,'cnt',n,'../web/chatwind.php','#usrcw'+tid+'');
       
      
     }
            
      
}
function gcp(pane_text,cu_id)
{
   //alert(pane_text);
     if(pane_text==="0")
       {
      $("#active_user_group"+cu_id).fadeOut();
       $('.group_active_chats').fadeOut();
      if(cu_id==="0")
      {
             $('.group_active_chats').fadeOut();
      }
              $('#active_user_group'+cu_id).fadeOut();
       }else
       {
              $('#active_user_group'+cu_id).fadeIn();
              $("#for_each_usr_cnt"+cu_id).fadeIn();
       $("#active_msg_cnt"+cu_id).html(pane_text);
       }   
}
function acp(cu_id,pane_text)
{
 
       if(pane_text==="0")
       {
      $("#for_each_usr_cnt"+cu_id).fadeOut();
      if(cu_id==="0")
      {
             $('.active_chat_users').fadeOut();
      }
              $('#active_user'+cu_id).fadeOut();
       }else
       {
            $("#active_msg_cnt"+cu_id).html(pane_text);
              $('#active_user'+cu_id).fadeIn();
              $("#for_each_usr_cnt"+cu_id).fadeIn();
      
       }
                               
}


var on=0;
var pres;





 $(document).ready(function()
    {
        var onp=0;
        $('.OTE_OState').click(function()
            {
                onp=onp+1;
                if(onp>1)
                {
                    onp=0;
                }
                if(onp==1)
                {
                    
                    $("#setonoffval").val('0');
                }else
                {
                    $("#setonoffval").val('1');
                }
                
            });
    });


function srchonlineppl(ppl)
{
         
    var ct="q="+"1"+"&id="+"3";
    if(ppl.length>0)
    {
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                $('#fortotonl').html(xmlhttp.responseText);
            }
        }
        xmlhttp.open("post", "../web/search_online_ppl.php?ppls="+ppl, true);
        xmlhttp.send();   
    }else
    {
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
        
              $('#fortotonl').html(xmlhttp.responseText);

            }else{
                
            }
        }
       
    xmlhttp.open("GET","../web/show_all_ppl.php",true);
    xmlhttp.send();
    }
     
}
function show_my_ppl(tid)
{
    
         $(".Online_Tab_Itm").attr('id','k');
     $(tid).attr('id','CurOnlineTab');
        $(".Online_Tool_Hold").fadeIn();
           var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
        
              $('#fortotonl').html(xmlhttp.responseText);

            }else{
                
            }
        };
       
    xmlhttp.open("GET","../web/show_all_ppl.php",true);
    xmlhttp.send();
}

var ct=0;
function opengroup_chat(grp_id)
{
    
    ct=ct+1;
       var gid="grp"+grp_id;
        
           var nowv="<div id=\"usrcw"+gid+"\"></div><input type=\"hidden\" value=\""+gid+"\" />";
            
     $("#forchatwindow").append(nowv); 
     
           var chkd=$("#usrcw"+gid).html();
          
           if(chkd!=="" )
           {
               $("#usrcw"+gid).fadeIn();
               
                var window_id='group'+grp_id;
                $("#on_live_grp_convrse"+window_id).val("1");
           }else
           {
                
        
           
         
   
        aio_ajax2(0,"id",grp_id,"cnt",ct,"../web/chat_wind_grp.php","#usrcw"+gid+"");
       
                    

       
    
           }
}
function open_team_chat(gp_id,btl_id)
{
      
    ct=ct+1;
       var gid="team"+btl_id;
      
           var nowv="<div id=\"usrcw"+gid+"\"></div><input type=\"hidden\" value=\""+gid+"\" />";
            
     $("#forchatwindow").append(nowv); 
     
     
           var chkd=$("#usrcw"+gid+"").html();
          
           if(chkd!=="" )
           {
               $("#usrcw"+gid+"").fadeIn();
               
                var window_id='team'+gp_id;
   $("#on_live_grp_convrse"+window_id).val("1");
           }else
           {
                
            aio_ajax2(0,"id",gp_id,"cnt",btl_id,"../web/chat_wind_team.php","#usrcw"+gid+"");
       
         
           }
}

function show_other_teams()
{
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            $('#teams_hold').html(xmlhttp.responseText);
            
            }
        }
        xmlhttp.open("post", "../web/show_other_teams.php?q="+"ns", true);
        xmlhttp.send();       
}
function preview_gpic(pic)
{
   
       if(pic.files[0].type=="image/jpeg")
       {
         
       var reader=new FileReader();
       reader.onload=function(e)
       {
             $("#grppicprev").html('<img src="'+e.target.result+'" style="max-width:100px;max-height:100px;" />'); 
       }
       reader.readAsDataURL(pic.files[0]);        
       }
      
}
function create_team()
{
    
    var battle_nm=$("#NewBattleNme").val();
   
    var batl_vsbl=0;
    if(document.getElementById("batl_visible").checked===true)
    {
        batl_vsbl=1;
    }
    var secrt=0;
    if(document.getElementById("allow_secret").checked===true)
    {
        secrt=1;
    }
  
    var team_nm1=$("#Team1NameInp").val();
    var team1_thm=$("#NewTeam1Theme").val();
    var team2_thm=$("#NewTeam2Theme").val();
    var team_nm2=$("#Team2NameInp").val();
    var n=0;
 var totmem=$("#chkalrdclkd").val();
 for(n=1;n<=totmem;n++)
 {
     var team1_mems=$("#team1"+n+"").val();
     var team2_mems=$("#team2"+n+"").val();
    
      var fmdt=new FormData();
      fmdt.append('batle_nm',battle_nm);
      fmdt.append('team_name1',team_nm1);
      fmdt.append('team_name2',team_nm2);
        var team1_pic="#team1_pic";
    
        var team1_img=$(team1_pic).prop('files')[0];
    
    var team2_pic="#team2_pic";
    var team2_img=$(team2_pic).prop('files')[0];
    fmdt.append('team1_pic',team1_img);
    fmdt.append('team2_pic',team2_img);
    fmdt.append('team1_theme',team1_thm);
    fmdt.append('team2_theme',team2_thm);
    fmdt.append('sec_msg',secrt);
    fmdt.append('nals',2);
    fmdt.append('myn',n);
    fmdt.append('visible',batl_vsbl);
    fmdt.append('team1_users',team1_mems);
    fmdt.append('team2_users',team2_mems);
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
          
             $('#forcrtgrp').fadeOut();
            }
        }
        xmlhttp.open("post", "../web/create_team_prcs.php?", true);
        xmlhttp.send(fmdt); 
 }
    
}
var my=0;
function show_team_pic(sd,src,file)
{
    
    if(sd===1)
    {
        my=1;
        var reader=new FileReader();
         var reader = new FileReader();
                reader.onload = imageIsLoade;
                reader.readAsDataURL(file.files[0]);
                
               
    }else
    {
        my=2;
          var reader=new FileReader();
         var reader = new FileReader();
                reader.onload = imageIsLoade;
               reader.readAsDataURL(file.files[0]);
    }
}
function imageIsLoade(e)
{
     
    if(my===1)
    {
        $("#team1_pict").html('<img src="'+e.target.result+'"  width="200" height="200"/>');
    }
    if(my===2)
    {
            $("#team2_pict").html('<img src="'+e.target.result+'"  width="200" height="200"/>');
   
    }
}

function check_team_name(team,ids)
{
     
        aio_ajax3(0,'myw','ns','team',team,'../web/check_team_name.php',ids);
}

function open_crt_team_chat()
{
    $('#forcrtgrp').fadeIn();
     
    aio_ajax3(0,'','','','','../web/create_team.php','#forcrtgrp');
}
function aio_chat_refresh()
{
     
      var fmdt=new FormData();
            $.ajax({
                url: '../web/grp_team_refrsh_chat.php',  
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
function showmyteams(ids)
{
             $(".Online_Tab_Itm").attr('id','k');
    // $(ids).attr('id','CurOnlineTab');
      $(".Online_Tool_Hold").fadeOut();
   
        aio_ajax3(0,'q','ns','','','../web/show_my_teams.php','#fortotonl');
}

function showpre_team_msgs(batl_id,its_i,apnd_id,grp_id,my_id,l_msg_id)
{
    $(its_i).remove();
    var fmd=new FormData();
    fmd.append('batl_id',batl_id);
    fmd.append('grp_id',grp_id);
    fmd.append('my_id',my_id);
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
              $(apnd_id).append(xmlhttp.responseText);
            }
        }
        xmlhttp.open("post", "../web/show_more_team_msgs.php?q="+l_msg_id, true);
        xmlhttp.send(fmd); 
}
function open_create_team()
{
    createnewteam();
    $('#forcrtgrp').fadeIn();
}
function open_update_team(batle_id)
{
    $('#forcrtgrp').fadeIn();
     
        aio_ajax3(0,'q',batle_id,'','','../web/update_team.php','#forcrtgrp');
    
}
function update_team_now(batl_id)
{
    
    var battle_nm=$("#NewBattleNme").val();
   
    var batl_vsbl=1;
    if(document.getElementById("batl_visible").checked===true)
    {
        batl_vsbl=0;
    }
    var secrt=0;
    if(document.getElementById("allow_secret").checked===true)
    {
        secrt=1;
    }
  
    var team_nm1=$("#Team1NameInp").val();
    var team1_thm=$("#NewTeam1Theme").val();
    var team2_thm=$("#NewTeam2Theme").val();
    var team_nm2=$("#Team2NameInp").val();
    var n=0;
    
 var totmem=$("#chkalrdclkd").val();
 for(n=1;n<=totmem;n++)
 {
     var team1_mems=$("#team1"+n+"").val();
     var team2_mems=$("#team2"+n+"").val();
    var remvd_usr=$("#rmvuser"+n+"").val();
      var fmdt=new FormData();
      fmdt.append('batle_nm',battle_nm);
      fmdt.append('team_name1',team_nm1);
      fmdt.append('team_name2',team_nm2);
      fmdt.append('remvd_usr',remvd_usr);
      fmdt.append('battle_id',batl_id);
        var team1_pic="#team1_pic";
    
        var team1_img=$(team1_pic).prop('files')[0];
    
    var team2_pic="#team2_pic";
    var team2_img=$(team2_pic).prop('files')[0];
   
    var team2_rmvd=$("#rmvuser2_team"+n+"").val();
   var tot_rmv_cnt=$("#tot_delt_vals").val();
   var t=0;
   for(t=1;t<=totmem;t++)
   {
        var team1_rmvd=$("#rmvuser1_team"+t+"").val();
        var chk=$("#team1"+n+"").val();
    if(team1_rmvd===chk)
    {
        $("#rmvuser1_team"+n+"").val('');
     
    }
    
       
    }
        
   
   for(t=1;t<=totmem;t++)
   {
        var team2_rmvd=$("#rmvuser2_team"+t+"").val();
        var chk2=$("#team2"+n+"").val();
    if(team2_rmvd===chk2)
    {
        $("#rmvuser2_team"+n+"").val('');
     
    }
    
     
    }
        
   
  
     
    var dlt_tem1_mem=$("#rmvuser1_team"+n+"").val();
   
    var dlt_tem2_mem=$("#rmvuser2_team"+n+"").val();
  
    fmdt.append('dlt_tem1_mem',dlt_tem1_mem);
    fmdt.append('dlt_tem2_mem',dlt_tem2_mem);
    fmdt.append('team1_pic',team1_img);
    fmdt.append('team2_pic',team2_img);
    fmdt.append('team1_theme',team1_thm);
    fmdt.append('team2_theme',team2_thm);
    fmdt.append('sec_msg',secrt);
    fmdt.append('nals',2);
    fmdt.append('myn',n);
    fmdt.append('visible',batl_vsbl);
    fmdt.append('team1_users',team1_mems);
    fmdt.append('team2_users',team2_mems);
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                
            
               $('#forcrtgrp').fadeOut();
                showmyteams();
            }
        }
        xmlhttp.open("post", "../web/update_team_prcs.php?", true);
        xmlhttp.send(fmdt); 
 }
    
}

var rmv=0;

function removedusers(user_id,team,me)
{
    rmv=rmv+1;
   
    var rmvv=".team1"+user_id;
    $(rmvv).remove();
    if(team===1)
    {
    $('#rmvd_user_team1').append('<input type="text" value="'+user_id+'" id="rmvuser1_team'+rmv+'" />');
   
    }else
    {
    $('#rmvd_user_team2').append('<input type="text" value="'+user_id+'" id="rmvuser2_team'+rmv+'" />');
    
    }
    $("#tot_delt_vals").val(rmv);
    
}
function show_tem_mems(team_id,show_id,rslt_id)
{
    $(show_id).fadeIn();
  
        aio_ajax3(0,'q',team_id,'','','../web/show_team_members.php',rslt_id);
}
function open_update_group(grp_id,tot_mems)
{
    $('#forcrtgrp').fadeIn();
    $("#chkalrdclkd").val(tot_mems);
  
        aio_ajax2(0,'q',grp_id,'','','../web/update_group.php','#forcrtgrp');
}
var dt=0;
function removedusersgroup(user_id,remv_id,grps_id)
{
    dt=dt+1;
 
    $(remv_id).remove();
    $("#remvd_usrs_grp"+grps_id+"").append('<input type="hidden" value="'+user_id+'" id="remvd_usr_grp'+dt+'" ?>');
    $("#tot_remv_grp_usr").val(dt);
}
function update_grp_now(grp_id)
{
    dt=0;
    var n=0;
 
    var grpname=$("#NewGrpNme").val();
    var grptheme=$("#NewGrpTheme").val();
grptheme=grptheme.substring(1,grptheme.length);
    var pub=0;
    var priv;
    var totc=$("#chkalrdclkd").val();
      
   if(document.getElementById("privateo").checked===true)
   {
        pub=1;


   }
    
   var secret_msg=0;
 




    if(document.getElementById("allowsec").checked===true)
   {
       secret_msg=1;
   }
     
    var xmlhttp = new XMLHttpRequest();
      
    for(n=1;n<=totc;n++)
    {
      
          var id="#grp_chat_add"+n;
       
        var users=$(id).val();
   
         var fileid="#grppic";
  var d=0;
  
  var remv_usr=$("#remvd_usr_grp"+n+"").val();
  for(d=1;d<=totc;d++)
  {
      var cur_id="#grpppl"+d;
      var cur_user=$(cur_id).val();
      if(cur_user===remv_usr)
      {
          $("#remvd_usr_grp"+n+"").val('');
      }
  }
  var remv_user=$("#remvd_usr_grp"+n+"").val();
     var file_data = $(fileid).prop('files')[0]; 
  var len=$(fileid).prop('files').length;
     var forms = new FormData(); 
          forms.append('filem',file_data);
         forms.append('grpname',grpname);
         forms.append('allowsec',secret_msg);
       //  forms.append('nals',nals);
         forms.append('publicg',pub);
        // forms.append('privateg',priv);
         forms.append('myn',n);
         forms.append('remv_user',remv_user);
         forms.append('userid',users);
        forms.append('grptheme',grptheme);
         forms.append('grp_id',grp_id);
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                $(fileid).val('');

           $('#forcrtgrp').fadeOut();
            
                show_my_groups();
            }else{
                
            }
        }
       
    xmlhttp.open("POST","../web/update_grp_prcs.php?q="+"ns",true);
    xmlhttp.send(forms);
        
    }
   
}
function previre_gpic(src)
{
      
    var reader=new FileReader();
    reader.onload=putimage;
    reader.readAsDataURL(src.files[0]);
}
function putimage(e)
{
    $("#grppicprev").html('<img src="'+e.target.result+'" style="max-width:150px;hax-heght:150px;" />');
}
function show_to_join_group()
{
    
        aio_ajax2(0,'q','ns','','','../web/show_other_groups.php','#my_grps_hold');
}
function show_my_groups(ids)
{
    // $(".Online_Tab_Itm").attr('id','');
    // $(ids).attr('id','CurOnlineTab');
     $(".Online_Tool_Hold").fadeOut();
        
        aio_ajax3(0,'q','ns','','','../web/show_my_groups.php','#fortotonl');
}
function open_create_group()
{
    
    aio_ajax3(0,'','','','','../web/grpmsg.php','#forcrtgrp');
}
function leave_from_topic(batl_id)
{
     var chk=confirm("Are you Sure Leave from this Team");
       if(chk==true)
       {
    aio_ajax3(4,'batl_id',batl_id,'','','../web/delete_grp_mems.php','showmyteams();');
       }
        
}
function leave_from_group(group_id)
{
    var chk=confirm("Are you Sure Leave from this Group");
       if(chk===true)
       {
        if(chk===true)
       {
        
    aio_ajax3(0,'batl_id',group_id,'','','../web/remove_grp_mems.php','show_my_groups();');
       }    
       }
}
