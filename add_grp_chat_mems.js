var click=0;

     function clicktoaddppl(userid,username)
     { 
         click=click+1;
       var mycnt=0;
        var  totcnt=$("#chkalrdclkd").val();
          var wchppluwant=$("#grpaddppl").val();
         if(wchppluwant==="45")
         {
        for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
           var  chkcuuserid="#grp_chat_add"+mycnt;
           var  tockuid=$(chkcuuserid).val();
           var myshare;
            if(tockuid===userid)
            {
             myshare=1;
           }
         }
            if(myshare!==1)
            {
                 var  myppl="<li class=\"grpp_add_rmv"+userid+"\">"+username+"<button id=\"remvusrbtn\" onclick=\"$('.grpp_add_rmv"+userid+"').remove();\">X</button><input type=\"hidden\" value=\""+userid+"\" id=\"grp_chat_add"+mycnt+"\" /> </li>";
           
                  $("#selectedppldiv").append(myppl);
	  $("#group_add_ppl").fadeIn();
                  $("#slctdgrpppl").append(myppl);
            }

         }
        $("#chkalrdclkd").val(mycnt);
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
      
          xmlhttp.open("POST", "srchpeople.php?q=" + srch, true);
   
        xmlhttp.send();
    }
   var n=0;
 


  var margin=0;
  
            //for select search result
              var preuserid;
               var ap=0;
               var cntt=0;
               var asd=0;
               var down=0;
               var dfg=0;
   
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
      
  
 $(document).ready(function(){
   

    $("#searchid").keydown(function(event){
         
        var x = event.which || event.keyCode;
     
        var s=0;
               var ap=0;
               var cntt=0;
               var asd=0;
               var ex=0;
               var finallistcnt=$("#fincnt").val();
               
              
    
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
         var hilituser="#"+n;
      
        var dltprecssu="#"+pcssn;
        var dltprebtn="."+pcssn;
     
          if(n>5)
          {

	for(s=1;s<=5;s++)
	{
	       var hide_user="#"+s;
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
       $(dltprebtn).css({"color":"navy"});
         }
        else{
           
            var cnt=0;
            if(x===13)//for enter key
            {
               var totlcnt=$("#chkalrdclkd").val();
               
              
               var userscls="."+n;
               var usersid="#usersid"+n;
               usersid=$(usersid).val();
               var myshar=$("#grpaddppl").val();
               var usersname=$(userscls).val();
               var checks=0;
               if(myshar==="45")
               {
            
              for(cntt=1;cntt<=totlcnt;cntt++)
              {
                 var  useridadd="#grp_chat_add"+cntt;
                  checks= $(useridadd).val();
                  if(checks===usersid)
                  {
                      var sharechk=1;
                  }
                }
                if(sharechk!==1)
                {
                         var ppls="<li class=\"grpp_add_rmv"+usersid+"\"> "+usersname+"<button id=\"remvusrbtn\" onclick=\"$('.grpp_add_rmv"+usersid+"').remove();\">X</button><input type=\"hidden\" value=\""+usersid+"\" id=\"grp_chat_add"+cntt+"\" />  </li>";
                
                  $("#selectedppldiv").append(ppls);
	 $("#group_add_ppl").fadeIn();
                  $("#slctdgrpppl").append(ppls);
                }
               }
               
       
                   $("#chkalrdclkd").val(cntt);  
            
             
            }
              
            if(x===38) // for (^) key
            {
                var dltprecss="#"+n;
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
	       var hide_user="#"+s;
	       $(hide_user).fadeIn();
	}
           }
           if(n<1)
           {
	 for(s=1;s<=5;s++)
	{
	       var hide_user="#"+s;
	       $(hide_user).fadeOut();
	} 

	
	if(finallistcnt>5)
	{
	  for(s=finallistcnt;s>=6;s--)
	{
	       var hide_user="#"+s;
	       $(hide_user).fadeIn();
	}       
	}else
	{
	        for(s=finallistcnt;s>=0;s--)
	{
	       var hide_user="#"+s;
	       $(hide_user).show();
	} 
	}
           }
               
        var hilituser="#"+n;
       
       $(hilituser).css({"background-color":"lightcyan","color":"white"});
       
      $(dltprecss).css({"background-color":"white","color":"navy"});
      
      
            }
        }
     
    });
});