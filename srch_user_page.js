
function removeuser(a)
{
    
    var ruid="."+a;
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
        
        //for team 1add mem
        
         var wchppluwant=$("#wchpplwant").val();
        
      
      
        

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


// for_add_grp_members
       var grp_chl=$("#grp_add_members").val();
       if(grp_chl==="5")
       {
              
         for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
            var chcuuserid="#grp_added_mems"+mycnt;
            var ctockuid=$(chcuuserid).val();
            if(ctockuid===userid)
            {
                addornot=1;
                
            }
         }
            if(addornot!==1)
            {
            
                 var  cmyppl="<li class=\"grp_ad_mem"+userid+"\"> "+username+" "+" "+"<button id=\"remvusrbtn\" onclick=\"$(\'.grp_ad_mem"+userid+"\').remove();\">X</button><input type=\"hidden\" value=\""+userid+"\""+" id=\"grp_added_mems"+mycnt+"\" /> </li>";
                   
                   
                 $("#selectedppldiv").append(cmyppl);
            
            }      

       }
  var grp_add_val=$("#for_grp_page_add_mems").val();
                if(grp_add_val==="2")
                {
	      
         for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
            var chcuuserid="#grp_added"+mycnt;
            var ctockuid=$(chcuuserid).val();
            if(ctockuid===userid)
            {
                addornot=1;
                
            }
         }
            if(addornot!==1)
            {
            
                 var  cmyppl="<li class=\"grp_ad"+userid+"\"> "+username+" "+" "+"<button id=\"remvusrbtn\" onclick=\"$(\'.grp_ad"+userid+"\').remove();\">X</button><input type=\"hidden\" value=\""+userid+"\""+" id=\"grp_added"+mycnt+"\" /> </li>";
                   
                   
               $("#group_added_members").append(cmyppl);
                 $("#selectedppldiv").append(cmyppl);
            
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
            
     $("#searchedppl").css({'margin-top':""+0+"px"},'slow');
          
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
	 
                $("#searchedppl").html(xmlhttp.responseText);
            }
        }
       xmlhttp.open("GET", "../web/srchpeople.php?q=" + srch, true);
   
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

    $("#searchid").keyup(function(event){
        var x = event.which || event.keyCode;
     
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
           $(hilituser).css({"background-color":"lightcyan","color":"white"});
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
            if(x==13)//for enter key
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
                
                // grp_members_add
                var grp_chk=$("#grp_add_members").val();
       if(grp_chk==="5")
       {
              for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  var seridadd="#grp_added_mems"+cntt;
                  var mychecks= $(seridadd).val();
                  if(mychecks===usersid)
                  {
                      var showctyu=1;
                  }
              }
                if(showctyu!==1)
                {
                        var ppl="<li class=\"grp_ad_mem"+usersid+"\"> "+usersname+"<button id=\"remvusrbtn\" onclick=\"$(\'.grp_ad_mem"+usersid+"\').remove();\">X</button><input type=\"hidden\" value=\""+usersid+"\" id=\"grp_added_mems"+cntt+"\" />  </li>";
	        $("#selectedppldiv").append(ppl);
                  
                }
                $("#chkalrdclkd").val(cntt);
        
       }
       // grp_invites_add
        var grp_add_val=$("#for_grp_page_add_mems").val();
        if(grp_add_val==="2")
        {
               for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  var seridadd="#grp_added"+cntt;
                  var mychecks= $(seridadd).val();
                  if(mychecks===usersid)
                  {
                      var showctyu=1;
                  }
                }
                if(showctyu!==1)
                {
                        var ppl="<li class=\"grp_ad"+usersid+"\"> "+usersname+"<button id=\"remvusrbtn\" onclick=\"$(\'.grp_ad"+usersid+"\').remove();\">X</button><input type=\"hidden\" value=\""+usersid+"\" id=\"grp_added"+cntt+"\" />  </li>";
                      
                  $("#group_added_members").append(ppl);
                  $("#selectedppldiv").append(ppl);
                  
                }
                $("#chkalrdclkd").val(cntt);
        
                      
              
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
      $(hilituser).css({"background-color":"lightcyan","color":"white"});
         
      $(dltprecss).css({"background-color":"white","color":"navy"});
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
            
    $(id).css({"background-color":"lightcyan"});
    
    $(id).css({"color":"white"});
        $(mid).css({"color":"white"});
         n=k;
    
        }
    }
}
      