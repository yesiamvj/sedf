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
	  $("#CreateNewBattle").fadeOut();
             alertBigTt(xmlhttp.responseText);
             }
        };
        
        xmlhttp.open("post", "create_team_prcs.php?", true);
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
       var team_nm1=$("#Team1NameInp").val();
   
    var team_nm2=$("#Team2NameInp").val();
    if(team_nm1!==team_nm2)
    {
            var cont="myw="+"ns"+"&team="+team;
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
              $(ids).html(xmlhttp.responseText);
            }
        }
        xmlhttp.open("post", "check_team_name.php?"+cont, true);
        xmlhttp.send(); 
    }else
    {
            $(ids).html('Same name can not ne allowed');
    }
   
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
         $('#TeamOneHoldr').slideToggle();
         
    }
   else{
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
function alertTt(notifText){
                $('.insNotifCont').text(notifText);
                
                $('.insNotifItmHold').show(100).delay(2000).hide(500);
            }
            function alertBigTt(Ttl,Ack){
	  alert();
                $('.sf_ACCH_Ttl').text(Ttl);
                $('.sf_ACCH_acknow').text(Ack);
                $('.sf-actionCompleteConfirmHold').slideDown(100).delay(2000).slideUp(500);
            }