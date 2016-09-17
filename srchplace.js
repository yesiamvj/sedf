
var ctyu=0;
var click=0;
var myppl;
var mynewhtml;
var myprehtml;
var mycnt;
var totcnt;
var chkcuuserid;
var tockuid;
var ex=0;
var i=0;
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
     function clicktoaddppl(userid,username)
     { 
         click=click+1;
         totcnt=$("#chkalrdclkd").val();
         var addornot=0;
         var myshare=0;
        var pplshare= $('.pplshare').val();
         for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
            chkcuuserid="#withuserid"+mycnt;
            tockuid=$(chkcuuserid).val();
            if(tockuid==userid)
            {
                myadd=1;
                
            }
         }

         var mynewtotlcnt=mycnt;
      
         var wchppluwant=$("#wchpplwant").val();
         if(pplshare=="5")
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
              alert("its already added");
            }

            
            

         }else{
          
         }
        
            if(wchppluwant==="3")
            {
            if(myadd!==1)
            {
              var withprehtml=$("#withpeoplediv").html();
           
                  myppl="<li class=\"with"+userid+"\"><span id=\"withppl"+mynewtotlcnt+"\"> "+username+"</span> "+"<button id=\"remvusrbtn\" onclick=\"removewithuser("+userid+")\">X</button><input type=\"hidden\" value=\""+userid+"\""+" id=\"withuserid"+mynewtotlcnt+"\" /> </li>";
                   
                  mynewhtml=withprehtml+ myppl;
              
                   
                  var withuseres=$("#withpeoplediv").html(mynewhtml);
                   var unslctdusrs=$("#selectedppldiv").html(mynewhtml);
            }else{
              alert("its already added");
            }
                }else{
                  
                }
             

if(wchppluwant==="1")
              {
       for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
            chkcuuserid="#showuserid"+mycnt;
            tockuid=$(chkcuuserid).val();
            if(tockuid==userid)
            {
               var showmyadd=1;
                
            }
         }
         if(showmyadd!==1)
         {
           $("#selectedppldiv").html("");
                 myprehtml=$("#selectedpeople").html();
                   myppl="<li class=\""+userid+"\"> "+username+" "+" "+"<button id=\"remvusrbtn\" onclick=\"removeuser("+userid+")\">X</button><input type=\"hidden\" value=\""+userid+"\""+" id=\"showuserid"+mynewtotlcnt+"\" /> </li>";
                   
                  mynewhtml=myprehtml+ myppl;
              
                var usersselctd=$("#selectedpeople").html(mynewhtml);
                  $("#selectedppldiv").html(mynewhtml);
           
         }else{
          alert("already added");
         }
                   }




  if(wchppluwant==="2")
              {
          for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
            chkcuuserid="#hiddeuserid"+mycnt;
            tockuid=$(chkcuuserid).val();
            if(tockuid==userid)
            {
                addornot=1;
                
            }
         }
            if(addornot!==1)
            {
              var hidprehtml=$("#hiddenpeople").html();
           
                  myppl="<li class=\""+userid+"\"> "+username+" "+" "+"<button id=\"remvusrbtn\" onclick=\"removeuser("+userid+")\">X</button><input type=\"hidden\" value=\""+userid+"\""+" id=\"hiddeuserid"+mynewtotlcnt+"\" /> </li>";
                   
                  mynewhtml=hidprehtml+ myppl;
              
                   
                  var hiduseres=$("#hiddenpeople").html(mynewhtml);
                   var unslctdusrs=$("#selectedppldiv").html(mynewhtml);
            
            }else{
              alert("already added");
            }
                      
                }
            
              
                  
       
        if(click>totcnt)
        {
          $("#chkalrdclkd").val(click);
          $("#withpplcnt").val(click);
          alert("putted high due to cnt is"+cnt+"clk is "+click);
        }else{
            $("#chkalrdclkd").val(mynewtotlcnt);
            $("#withpplcnt").val(mynewtotlcnt);
          alert("putted low due to cnt is"+cnt+"clk is "+click);
        }
               
     }
      
       function srchpople(srch)
          {
          n=0;
  
 ex=0;
 asd=0;
     $("#searchedppl").animate({'margin-top':""+0+"px"},'slow');
          
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("searchedppl").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "srchpeople.php?q=" + srch, true);
        xmlhttp.send();
    }
    
   var n=0;
 


  var margin=0;
/*function overflow()
{
    var g=0;
    var srchhint=$("#searchid").val();
    var finallistcnt=$("#fincnt").val();
   if(finallistcnt>8 || finallistcnt===8)
   {
      
       $("#8").val("See more "+(finallistcnt-7)+" results ");
       
      $("#8").css({"background-color":"whitesmoke","color":"red"});
    }
    for(g=9;g<=finallistcnt;g++)
    {
        var hidebtnid="#"+g;
        $(hidebtnid).hide();
        
    }
}*/
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
               var maxscrl=(finallistcnt*36.5)-(9*36.5);
               var finallistcnt=$("#fincnt").val();
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
         if(n>finallistcnt || n==finallistcnt)
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
      if(ex==finallistcnt)
      {
          margin=0;
           ex=0;
           asd=0;
                $("#searchedppl").animate({'margin-top':""+margin+""},'fast');
          
      }else{
           if(asd>5 || n>5)
           {
             
                   margin=margin-36.5;
              $("#searchedppl").animate({'margin-top':""+margin+"px"},'fast');
          
           }else{
                 $("#searchedppl").animate({'margin-top':"0px"},'fast');
          
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
               if(myshar=="5")
               {
            
              for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  useridadd="#shareuserid"+cntt;
                  checks= $(useridadd).val();
                  if(checks==usersid)
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
                  useridadd="#showuserid"+cntt;
                  checks= $(useridadd).val();
                  if(checks==usersid)
                  {
                      var showctyu=1;
                  }else{
                      
                  }
                }
                if(showctyu!==1 || ap==1)
                {
                    var mywanthtml=$("#selectedpeople").html();
                        var ppl="<li class=\""+usersid+"\"> "+usersname+"<button id=\"remvusrbtn\" onclick=\"removeuser("+usersid+")\">X</button><input type=\"hidden\" value=\""+usersid+"\" id=\"showuserid"+cntt+"\" />  </li>";
                        newhtml=mywanthtml+ppl;
                  $("#selectedppldiv").html(newhtml);
                  $("#selectedpeople").html(newhtml);
                  
                }else{
                  alert("already added");
                }
                      
                      }

           
          if(wantedpplval==="3")
              {
                for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  useridadd="#withuserid"+cntt;
                  checks= $(useridadd).val();
                  if(checks==usersid)
                  {
                      var ctyuj=1;
                  }else{
                      
                  }
                }
      if(ctyuj!==1 || ap==1)
      {
          
        var myunwanthtml=$("#withpeoplediv").html();
           
              var ppl="<li class=\"with"+usersid+"\"><span id=\"withppl"+cntt+"\">"+usersname+"</span><button id=\"remvusrbtn\" onclick=\"removewithuser("+usersid+")\">X</button><input type=\"hidden\" value=\""+usersid+"\" id=\"withuserid"+cntt+"\" />  </li>";
                        newhtml=myunwanthtml+ppl;
                  $("#selectedppldiv").html(newhtml);
                   $("#withpeoplediv").html(newhtml);

            
      }else{
        
      }
                
                  
                }else{
                }





       if(wantedpplval==="2")
       {
       for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  useridadd="#hiddeuserid"+cntt;
                  checks= $(useridadd).val();
                  if(checks==usersid)
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
                  alert("already added");
                 }
                  
                      }
             
                   
                  if(ap>cntt)
                  {
                    $("#chkalrdclkd").val(ap);  
                    $("#withpplcnt").val(ap);

                  }else{
                     $("#chkalrdclkd").val(cntt); 
                     $("#withpplcnt").val(cntt);
                  }
                
               
 
             
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
                         $("#searchedppl").animate({'margin-top':"0"},'fast');
                         }else{
                             if(n<1)
                             {
                                 $("#searchedppl").animate({'margin-top':"0"},'fast');
                        
                             }else{
                                 $("#searchedppl").animate({'margin-top':""+(-maxscrl)+""},'fast');
                  
                             }
                        
                         }
                }
                else{
                    n=n;
                    finallistcnt=$("#fincnt").val();
                    if(n<finallistcnt || n==finallistcnt)
                     {
                         if(down==2)
                         {
                             dfg=dfg+1;
                             dwnscrl=(-maxscrl)+(dfg*36);
                            
                                 if(maxscrl<330 )
                                 {
                                      $("#searchedppl").animate({'margin-top':"0"},'fast');
                         
                                 }else{
                                     if(n<6)
                                     {
                                        $("#searchedppl").animate({'margin-top':"0"},'fast');
                           
                                     }else{
                                        $("#searchedppl").animate({'margin-top':""+dwnscrl+""},'fast');
                    
                                     }
                                    
                                 }
                            
                                 
                         }else{
                              margin=margin+36.5;
                         if(maxscrl<330  || n<8)
                         {
                        
                         $("#searchedppl").animate({'margin-top':"0"},'fast');
               
                         }else{
                         $("#searchedppl").animate({'margin-top':""+margin+""},'fast');
                
                         }
                         }
                        
                         
                         
                     }else{
                         $("#searchedppl").animate({'margin-top':"0"},'fast');
               
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

              
      