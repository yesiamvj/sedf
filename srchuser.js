
function removeuser(a)
{
    
    var ruid="."+a;
    $(ruid).html("");
    
}

function removewithuser(a)
{
    
    var ruid=".with"+a;
    $(ruid).html("");
    
}
function removeshareuser(a)
{
    var ruid=".share"+a;
    $(ruid).html("");
}
function removeshareplac(a)
{
    var ruid=".place"+a;
    $(ruid).html("");
}
     function clicktoaddppl(userid,username)
     { 
         click=click+1;
        var  madd=0; 
var ctyu=0;
var click=0;
var myppl;
var mynewhtml;
var myprehtml;
var mycnt=0;
var totcnt;
var chkcuuserid;
var tockuid;
var ex=0;
var i=0;
         totcnt=$("#chkalrdclkd").val();
         var addornot=0;
         var myshare=0;
        var pplshare= $('.pplshare').val();
        
        //for team 1add mem
        
        
        var team1=$("#team1ppl").val();
        if(team1==="team1")
        {
       for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
            var team1_id="#team1"+mycnt;
            var team2_id="#team2"+mycnt;
           var team1_userid=$(team1_id).val();
           var team2_userid=$(team2_id).val();
            if(team1_userid===userid || team2_userid===userid)
            {
            var added_team1=1;
             
           }else{
               
           }
         }
         
        
            if(added_team1!==1)
            {
            
                var team1_mem="<div id=\"qckRecipItm\" class=\"team1"+userid+"\">"+username+"<span id=\"remvusrbtn\" onclick=\"$('.team1"+userid+"').remove();\" class=\"GrpMemDel\">X</span><input type=\"hidden\" value=\""+userid+"\" id=\"team1"+mycnt+"\" /> </div>";
               
            $("#team1_members").append(team1_mem);
              $("#selectedppldiv").append(team1_mem);
              
            $("#chkalrdclkd").val(mycnt);
            }else{
          
            }

        }
        // grp add
       var grp_val=$('.pplshare').val();
       if(grp_val==="8")
       {
       for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
            var group_id="#groups"+mycnt;
           group_id=$(group_id).val();
            if(group_id===userid)
            {
            var mygrp=1;
             
           }else{
               
           }
         }
         
        
            if(mygrp!==1)
            {
            
                var group="<div id=\"qckRecipItm\" class=\"grp_added"+userid+"\">"+username+"<span id=\"remvusrbtn\" onclick=\"$('.grp_added"+userid+"').remove();\" class=\"GrpMemDel\">X</span><input type=\"hidden\" value=\""+userid+"\" id=\"groups"+mycnt+"\" /> </div>";
               
            $(".selctdgrp_div").append(group);
              $("#selectedppldiv").append(group);
              
            $("#chkalrdclkd").val(mycnt);
            
             }
       }
       
        // fro team 2 add mem
        var team2=$("#team1ppl").val();
        if(team1==="team2")
        {
         for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
             var team1_ida="#team1"+mycnt;
            var team2_id="#team2"+mycnt;
            var team1_userid=$(team1_ida).val();
           var team2_userid=$(team2_id).val();
            if(team2_userid===userid || team1_userid===userid)
            {
            var added_team2=1;
             
           }else{
               
           }
         }
         
        
            if(added_team2!==1)
            {
            
                var team1_mem="<div id=\"qckRecipItm\" class=\"team2"+userid+"\">"+username+"<span id=\"remvusrbtn\" onclick=\"$('.team2"+userid+"').remove();\" class=\"GrpMemDel\">X</span><input type=\"hidden\" value=\""+userid+"\" id=\"team2"+mycnt+"\" /> </div>";
               
            $("#team2_members").append(team1_mem);
              $("#selectedppldiv").append(team1_mem);
              
            $("#chkalrdclkd").val(mycnt);
            }else{
          
            }

        }
        //for qcknotif
        var qcknt=$("#forqcknotifval").val();
         if(qcknt==="11")
         {
          for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
            var hkcuser="#qcnot"+mycnt;
           var mtocu=$(hkcuser).val();
            if(mtocu===userid)
            {
            var qmsa=1;
             
           }else{
               
           }
         }
         
        
            if(qmsa!==1)
            {
            
                var mpn="<div id=\"qckRecipItm\" class=\"qcknot"+userid+"\">"+username+"<span id=\"remvusrbtn\" onclick=\"$('.qcknot"+userid+"').remove();\" class=\"GrpMemDel\">X</span><input type=\"hidden\" value=\""+userid+"\" id=\"qcnot"+mycnt+"\" /> </div>";
                $("#forqcknotifppl").slideDown();
            $("#forqcknotifppl").append(mpn);
              $("#selectedppldiv").append(mpn);
              
            $("#chkalrdclkd").val(mycnt);
            }else{
          
            }

         }
         

        
        
         var qcmsg=$('#forqcmsgval').val();
          //qckRecipsHold
         if(qcmsg==="10")
         {
          for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
            var hkcuserid="#qcmsg"+mycnt;
           var mtocuid=$(hkcuserid).val();
            if(mtocuid===userid)
            {
            var qms=1;
             
           }else{
               
           }
         }
         
        
            if(qms!==1)
            {
            
                var mp="<div class=\"qck"+userid+"\">"+username+"<span id=\"remvusrbtn\" onclick=\"$('.qck"+userid+"').remove();\" class=\"GrpMemDel\">X</span><input type=\"hidden\" value=\""+userid+"\" id=\"qcmsg"+mycnt+"\" /> </div>";
                $(".qckRecipsHold").slideDown();
            $(".qckRecipsHold").append(mp);
              $("#selectedppldiv").append(mp);
              
            $("#chkalrdclkd").val(mycnt);
            }else{
          
            }

         }
         


        var grpadd=$('#grpaddppl').val();
        if(grpadd==="8")
        {
           
            $("#group_add_ppl").fadeIn();
            $("#slctdgrpppl").show();
            
          for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
            var hkcuuserid="#grpppl"+mycnt;
           var mtockuid=$(hkcuuserid).val();
            if(mtockuid===userid)
            {
            var mygrpppl=1;
             
           }else{
           }
         }
         
        
            if(mygrpppl!==1)
            {
            
                var   mpl="<div id=\"GrpMembItm\" class=\"grplist"+userid+"\">"+username+"<span id=\"remvusrbtn\" onclick=\"$('.grplist"+userid+"').remove();\" class=\"GrpMemDel\">X</span><input type=\"hidden\" value=\""+userid+"\" id=\"grpppl"+mycnt+"\" /> </div>";
                
            $("#slctdgrpppl").append(mpl);
              $("#selectedppldiv").append(mpl);
              
            $("#chkalrdclkd").val(mycnt);
            }else{
          
            }

            
        }
         if(pplshare==="7")
         {
        for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
            chkcuuserid="#shareplace"+mycnt;
            tockuid=$(chkcuuserid).val();
            if(tockuid===username)
            {
            var myshareplc=1;
             
           }else{
           }
         }
         
            if(myshareplc!==1)
            {
           
                var   mppl="<li class=\"placeshr"+userid+"\">"+username+"<button id=\"remvusrbtn\" onclick=\"$('.placeshr"+userid+"').remove();\">X</button><input type=\"hidden\" value=\""+username+"\" id=\"shareplace"+mycnt+"\" /> </li>";
                 
            $(".slctdshrplc").append(mppl);
              $("#selectedppldiv").append(mppl);
            }else{
          
            }

            
            

         }else{
     
         }
        
      
         var wchppluwant=$("#wchpplwant").val();
         if(pplshare==="5")
         {
        for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
            chkcuuserid="#shareuserid"+mycnt;
            tockuid=$(chkcuuserid).val();
            if(tockuid==userid)
            {
             myshare=1;
           }
         }
            if(myshare!==1)
            {
            var withprehtml=$(".slctdshrppl").html();
           
                  myppl="<li class=\"share"+userid+"\">"+username+"<button id=\"remvusrbtn\" onclick=\"removeshareuser("+userid+")\">X</button><input type=\"hidden\" value=\""+userid+"\" id=\"shareuserid"+mycnt+"\" /> </li>";
                  mynewhtml=withprehtml+ myppl;
                  var withuseres=$(".slctdshrppl").html(mynewhtml);
                   var unslctdusrs=$("#selectedppldiv").html(mynewhtml);
            }else{
            }

            
            

         }else{
          
         }
        
            if(wchppluwant==="3")
            {
         for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
           var tykcuuserid="#withuserid"+mycnt;
            var mychecck=$(tykcuuserid).val();
            if(mychecck===userid)
            {
               madd=1;
                
            }
         }
            if(madd!==1)
            {
           
                 var  tmyppl="<li class=\"with"+userid+"\">"+username+""+"<button id=\"remvusrbtn\" onclick=\"removewithuser("+userid+")\">X</button><input type=\"hidden\" value=\""+userid+"\""+" id=\"withuserid"+mycnt+"\" /> </li>";
                   $("#selected_with_ppl").append(tmyppl);
                     $("#selectedppldiv").append(tmyppl);
            }else{
            
            }
              $("#chkalrdclkd").val(mycnt);
                }else{
                  
                }
             

if(wchppluwant==="1")

              {
       for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
            var dchkcuuserid="#showuserid"+mycnt;
            var tckuid=$(dchkcuuserid).val();
            if(tckuid===userid)
            {
               var showmyadd=1;
                
            }
         }
         if(showmyadd!==1)
         {
                  var sf_myppl="<li class=\""+userid+"\"> "+username+"<button id=\"remvusrbtn\" onclick=\"removeuser("+userid+")\">X</button><input type=\"hidden\" value=\""+userid+"\""+" id=\"showuserid"+mycnt+"\" /> </li>";
                   
                  
             $("#selectedpeople").append(sf_myppl);
                  $("#selectedppldiv").append(sf_myppl);
           
         }
         $("#chkalrdclkd").val(mycnt);
            
                   }




  if(wchppluwant==="2")
              {
                  
          for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
            var chcuuserid="#hiddeuserid"+mycnt;
            var ctockuid=$(chcuuserid).val();
            if(ctockuid===userid)
            {
                addornot=1;
                
            }
         }
            if(addornot!==1)
            {
            
                 var  cmyppl="<li class=\""+userid+"\"> "+username+" "+" "+"<button id=\"remvusrbtn\" onclick=\"removeuser("+userid+")\">X</button><input type=\"hidden\" value=\""+userid+"\""+" id=\"hiddeuserid"+mycnt+"\" /> </li>";
                   
                   
               $("#hiddenpeople").append(cmyppl);
                 $("#selectedppldiv").append(cmyppl);
            
            }else{
            }
                      
                }
            $("#chkalrdclkd").val(mycnt);
            $("#withpplcnt").val(mycnt);
     }
      
       function srchpople(srch)
          {
	
          n=0;
 ex=0;
           asd=0;
            
          var chkvals=$('.pplshare').val();
     $("#searchedppl").css({'margin-top':""+0+"px"},'slow');
          
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                $("#searchedppl").html(xmlhttp.responseText);
            }
        }
        if(chkvals==="7")
        {
           
            xmlhttp.open("GET", "srchplace.php?q=" + srch, true);
      
        }else{
         if(chkvals==="8")
         {
          xmlhttp.open("GET", "srchgroup.php?q=" + srch, true);
   
         }else
         {
          xmlhttp.open("GET", "srchpeople.php?q=" + srch, true);
   
         }
          
        }
        
        xmlhttp.send();
    }
   var n=0;
 


  var margin=0;
  
          function selectppls()
          {
              
              var wchppluwant=$("#wchpplwant").val();
              if(wchppluwant==="1")
              {
                  var slctdusrs=$("#selectedppldiv").html();
                  $("#wantedppldiv").html(slctdusrs);
                  $("#selectppldiv").hide();
                  $("#someppldiv").slideDown();
                
              }
              if(wchppluwant==="2")
              {
                  
                   var unslctdusrs=$("#selectedppldiv").html();
                  $("#unwantedppldiv").html(unslctdusrs);
                $("#selectppldiv").hide();
                  $("#exceptppldiv").slideDown();
              }
                  
      
          }
         
            //for select search result
              var preuserid;
               var ap=0;
               var cntt=0;
               var asd=0;
               var down=0;
               var dfg=0;
               var finallistcnt=$("#fincnt").val();
               
               var maxscrl=(finallistcnt*36.5)-(9*36.5);
               var dwnscrl=-maxscrl;
 
              $(document).ready(function(){

    $("#searchid").keydown(function(event){
           
        var x = event.which || event.keyCode;
   
        var sft;
    
    if(x===40)  //for down key
        {
           
             asd=asd+1;
             ex=ex+1;
          finallistcnt=$("#fincnt").val();
         if(n>=finallistcnt  )
        {
            
            n=1;
           
            var pcssn=finallistcnt;
        }
        else{
             
             n=n+1;
             var pcssn=n-1;
        }
        var hilituser="#"+n;
        var hilitbtn="."+n;
        var dltprecssu="#"+pcssn;
        var dltprebtn="."+pcssn;
           $(hilituser).css({"background-color":"#ef0000","color":"white"});
      if(ex===finallistcnt )
      {
          margin=0;
           ex=0;
           asd=0;
                $("#searchedppl").css({'margin-top':""+margin+""},'fast');
          
      }else{
           if(asd>=7 || n>=7)
           {
             
                   margin=margin-36.5;
              $("#searchedppl").css({'margin-top':""+margin+"px"},'fast');
          
           }else{
                 $("#searchedppl").css({'margin-top':"0px"},'fast');
          
           }
       }
           var usename=$(hilituser).val();
            $(hilitbtn).css({"color":"white"});
        $(dltprecssu).css({"background-color":"white","color":"navy"});
       $(dltprebtn).css({"color":"navy"});
        }
        else{
           
            var cnt=0;
            if(x===13)//for enter key
            {
                ap=ap+1;
      var totlcnt=$("#chkalrdclkd").val();
                n=n;
                var hituserid="."+n;
                 mycont=$("#chkalrdclkd").val()
  
               var userscls="."+n;
               var usersid="#usersid"+n;
               usersid=$(usersid).val();
               
               var usersname=$(userscls).val();
               var wantedpplval=$("#wchpplwant").val();
               
               var newhtml;
               var checks;
               var useridadd;
               var ctyu=0;
          
               var myshar=$('.pplshare').val();
                var grpadd=$('#grpaddppl').val();
                //for team1add mem
                var grp_vals=$('.pplshare').val();
                if(grp_vals==="8")
                {
              for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  var grps_id="#groups"+cntt;
                   grps_id=$(grps_id).val();
                  if(grps_id===usersid )
                  {
                      var mygrps=1;
                  }
              }
                if(mygrps!==1)
                {
                        var grp="<div id=\"qckRecipItm\" class=\"grp_added"+usersid+"\"> "+usersname+"<span id=\"remvusrbtn\" onclick=\"$('.grp_added"+usersid+"').remove();\" class=\"GrpMemDel\">X</span><input type=\"hidden\" value=\""+usersid+"\" id=\"groups"+totlcnt+"\" />  </div>";
                         
                        $(".selctdgrp_div").append(grp);
                  $("#selectedppldiv").append(grp);
                  
            $("#chkalrdclkd").val(newt);
        }
                }
        var team1_chk=$("#team1ppl").val();
        if(team1_chk==="team1")
        {
             for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  var team1_ids="#team1"+cntt;
                  var team2_ids="#team2"+cntt;
                  var team2_users=$(team2_ids).val();
                 var team1_users= $(team1_ids).val();
                  if(team1_users===usersid || team2_users===usersid)
                  {
                      var addenteam1_users=1;
                  }
                }
                if(addenteam1_users!==1)
                {
                        var team_mems="<div id=\"qckRecipItm\" class=\"team1"+usersid+"\"> "+usersname+"<span id=\"remvusrbtn\" onclick=\"$('.team1"+usersid+"').remove();\" class=\"GrpMemDel\">X</span><input type=\"hidden\" value=\""+usersid+"\" id=\"team1"+totlcnt+"\" />  </div>";
                    
                  
                          $("#team1_members").append(team_mems);
                  $("#selectedppldiv").append(team_mems);
                  
            $("#chkalrdclkd").val(newt);
        }
        }
        // for team 2 add mem
         var team2_chk=$("#team1ppl").val();
        if(team2_chk==="team2")
        {
             for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  var team1_ids="#team1"+cntt;
                  var team2_ids="#team2"+cntt;
                  var team1_users=$(team1_ids).val();
                 var team2_users= $(team2_ids).val();
                  if(team2_users===usersid || team1_users===usersid)
                  {
                      var addenteam2_users=1;
                  }
                }
                if(addenteam2_users!==1)
                {
                        var team2_mems="<div id=\"qckRecipItm\" class=\"team2"+usersid+"\"> "+usersname+"<span id=\"remvusrbtn\" onclick=\"$('.team2"+usersid+"').remove();\" class=\"GrpMemDel\">X</span><input type=\"hidden\" value=\""+usersid+"\" id=\"team2"+totlcnt+"\" />  </div>";
                    
                  
                          $("#team2_members").append(team2_mems);
                  $("#selectedppldiv").append(team2_mems);
                  
            $("#chkalrdclkd").val(newt);
        }
        }
                //for notif
                var qcknot=$('#forqcknotifval').val();
               
        if(qcknot==="11")
        {
            
           
              for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  var serida="#qcnot"+cntt;
                 var nchec= $(serida).val();
                  if(nchec===usersid)
                  {
                      var adn=1;
                  }
                }
                if(adn!==1)
                {
                        var lcn="<div id=\"qckRecipItm\" class=\"qcknot"+usersid+"\"> "+usersname+"<span id=\"remvusrbtn\" onclick=\"$('.qcknot"+usersid+"').remove();\" class=\"GrpMemDel\">X</span><input type=\"hidden\" value=\""+usersid+"\" id=\"qcnot"+totlcnt+"\" />  </div>";
                    
                    $("#forqcknotifppl").slideDown();
                          $("#forqcknotifppl").append(lcn);
                  $("#selectedppldiv").append(lcn);
                  
            $("#chkalrdclkd").val(totlcnt);
             
                }
        }
       //for qcmsg
        var qcsmsg=$('#forqcmsgval').val();
        if(qcsmsg==="10")
        {
              $("#slctdgrpppl").show();
           
              for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  var seridadd="#qcmsg"+cntt;
                 var nchecks= $(seridadd).val();
                  if(nchecks===usersid)
                  {
                      var addgrp=1;
                  }
                }
                if(addgrp!==1)
                {
                        var lcn="<div  class=\"qck"+usersid+"\"> "+usersname+"<span id=\"remvusrbtn\" onclick=\"$('.qck"+usersid+"').remove();\" class=\"GrpMemDel\">X</span><input type=\"hidden\" value=\""+usersid+"\" id=\"qcmsg"+totlcnt+"\" />  </div>";
                    
                    $(".qckRecipsHold").slideDown();
                          $(".qckRecipsHold").append(lcn);
                  $("#selectedppldiv").append(lcn);
                  
            $("#chkalrdclkd").val(newt);
             
                }
        }
       
       //for group
       
       if(grpadd==="8")
       {
           $("#group_add_ppl").fadeIn();
              $("#slctdgrpppl").show();
           
              for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  var seridadd="#grpppl"+cntt;
                 var nchecks= $(seridadd).val();
                  if(nchecks===usersid)
                  {
                      var addgrp=1;
                  }
                }
                if(addgrp!==1)
                {
                    var mwantht=$("#slctdgrpppl").html();
                        var lc="<div id=\"GrpMembItm\" class=\"grplist"+usersid+"\"> "+usersname+"<span id=\"remvusrbtn\" onclick=\"$('.grplist"+usersid+"').remove();\" class=\"GrpMemDel\">X</span><input type=\"hidden\" value=\""+usersid+"\" id=\"grpppl"+totlcnt+"\" />  </div>";
                       var newt=mwantht+lc;
                          $("#slctdgrpppl").html(newt);
                  $("#selectedppldiv").html(newt);
                  
            $("#chkalrdclkd").val(newt);
             
                }
       }
       //for share
       
                 if(myshar==="7")
               {
              for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  useridadd="#shareplace"+cntt;
                  checks= $(useridadd).val();
                  if(checks===usersid)
                  {
                      var shareplac=1;
                  }
                }
                if(shareplac!==1)
                {
                        var pplc="<li class=\"placeshr"+usersid+"\"> "+usersname+"<button id=\"remvusrbtn\" onclick=\"$(\".placeshr'"+usersid+"\").remove();\" >X</button><input type=\"hidden\" value=\""+usersid+"\" id=\"shareplace"+cntt+"\" />  </li>";
                  $("#selectedppldiv").append(pplc);
                  $(".slctdshrplc").append(pplc);
                }
               }
               if(myshar==="5")
               {
            
              for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  useridadd="#shareuserid"+cntt;
                  checks= $(useridadd).val();
                  if(checks===usersid)
                  {
                      var sharechk=1;
                  }
                }
                if(sharechk!==1)
                {
                    var mywanthtm=$("#selectedppldiv").html();
                        var ppls="<li class=\"share"+usersid+"\"> "+usersname+"<button id=\"remvusrbtn\" onclick=\"removeshareuser("+usersid+")\">X</button><input type=\"hidden\" value=\""+usersid+"\" id=\"shareuserid"+cntt+"\" />  </li>";
                       var newhtm=mywanthtm+ppls;
                  $("#selectedppldiv").html(newhtm);
                  $(".slctdshrppl").html(newhtm);
                }
               }
                if(wantedpplval==="1")
                      {
              for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  var seridadd="#showuserid"+cntt;
                  var mychecks= $(seridadd).val();
                  if(mychecks===usersid)
                  {
                      var showctyu=1;
                  }else{
                      
                  }
                }
                if(showctyu!==1)
                {
                        var ppl="<li class=\""+usersid+"\"> "+usersname+"<button id=\"remvusrbtn\" onclick=\"removeuser("+usersid+")\">X</button><input type=\"hidden\" value=\""+usersid+"\" id=\"showuserid"+cntt+"\" />  </li>";
                      
                  $("#selectedppldiv").append(ppl);
                  $("#selectedpeople").append(ppl);
                  
                }
                $("#chkalrdclkd").val(cntt);
        
                      
                      }

          if(wantedpplval==="3")
              {
                 
                for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  var show_useridadd="#withuserid"+cntt;
                  var my_checks= $(show_useridadd).val();
                  if(my_checks===usersid)
                  {
                      var ctyuj=1;
                  }else{
                      
                  }
                }
      if(ctyuj!==1)
      {
           
              var ppl="<li class=\"with"+usersid+"\">"+usersname+"<button id=\"remvusrbtn\" onclick=\"removewithuser("+usersid+")\">X</button><input type=\"hidden\" value=\""+usersid+"\" id=\"withuserid"+cntt+"\" />  </li>";
                  $("#selectedppldiv").append(ppl);
                   $("#selected_with_ppl").append(ppl);

            
      }
        $("#chkalrdclkd").val(cntt);
                
                  
                }else{
                }





       if(wantedpplval==="2")
       {
       for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  useridadd="#hiddeuserid"+cntt;
                  checks= $(useridadd).val();
                  if(checks===usersid)
                  {
                      ctyu=1;
                  }else{
                      
                  }
                }
             if(ctyu!==1 || ap==1)
             {

                         var myunwanthtml=$("#hiddenpeople").html();
                        var ppl="<li class=\""+usersid+"\"> "+usersname+"<button id=\"remvusrbtn\" onclick=\"removeuser("+usersid+")\">X</button><input type=\"hidden\" value=\""+usersid+"\" id=\"hiddeuserid"+cntt+"\" />  </li>";
                        newhtml=myunwanthtml+ppl;
                  $("#selectedppldiv").html(newhtml);
                   $("#hiddenpeople").html(newhtml);
                 }else{
                     
                 }
                  
                      }
             
                   $("#chkalrdclkd").val(cntt);  
                    $("#withpplcnt").val(cntt);
                            preuserid=usersid;
              
            }
              
            if(x==38) // for (^) key
            {
                var dltprecss="#"+n;
                var dltprecssbn="."+n;
                finallistcnt=$("#fincnt").val();
                 
                 n=n-1;
                if(n<1)
                {
                    if(n<0)
                    {
                        n=finallistcnt;
                    }
                          
                     margin=0;
                     down=2;
                     dfg=0;
                     maxscrl=(finallistcnt*36.5)-(7*36.5);
                 
                         if(maxscrl<330)
                         {
                         $("#searchedppl").css({'margin-top':"0"},'fast');
                         }else{
                             if(n<1)
                             {
                                 $("#searchedppl").css({'margin-top':"0"},'fast');
                        
                             }else{
                                 $("#searchedppl").css({'margin-top':""+(-maxscrl)+""},'fast');
                  
                             }
                        
                         }
                }
                else{
                    n=n;
                    finallistcnt=$("#fincnt").val();
                    if(n<finallistcnt || n===finallistcnt)
                     {
                         if(down==2)
                         {
                             dfg=dfg+1;
                             dwnscrl=(-maxscrl)+(dfg*36);
                            
                                 if(maxscrl<330 )
                                 {
                                      $("#searchedppl").css({'margin-top':"0"},'fast');
                         
                                 }else{
                                     if(n<6)
                                     {
                                        $("#searchedppl").css({'margin-top':"0"},'fast');
                           
                                     }else{
                                        $("#searchedppl").css({'margin-top':""+dwnscrl+""},'fast');
                    
                                     }
                                    
                                 }
                            
                                 
                         }else{
                              margin=margin+36.5;
                         if(maxscrl<330  || n<8)
                         {
                        
                         $("#searchedppl").css({'margin-top':"0"},'fast');
               
                         }else{
                         $("#searchedppl").css({'margin-top':""+margin+""},'fast');
                
                         }
                         }
                        
                         
                         
                     }else{
                         $("#searchedppl").css({'margin-top':"0"},'fast');
               
                     }
         
                }
               
                var frwrdcssn=n;
        var hilituser="#"+frwrdcssn;
        var hilitbtnrev="."+frwrdcssn;
      $(hilituser).css({"background-color":"#ef0000","color":"white"});
       $(hilitbtnrev).css({"color":"white"});
         
      $(dltprecss).css({"background-color":"white","color":"navy"});
      $(dltprecssbn).css({"color":"navy"});
            }
        }
     
    });
});

 function colorthisusr(a)
{
    var id="#"+a;
    var mid="."+a;
    var tot=$("#fincnt").val();
   
    var k=0;
    for(k=1;k<=tot;k++)
    {
        var nid="#"+k;
        var bid="."+k;
        if(nid!==id)
        {
            
    $(nid).css({"background-color":"white"});
    
    $(nid).css({"color":"navy"});
    $(bid).css({"color":"navy"});
        }else
        {
            
    $(id).css({"background-color":"#ef0000"});
    
    $(id).css({"color":"white"});
        $(mid).css({"color":"white"});
         n=k;
    
        }
    }
}
      