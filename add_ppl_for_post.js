var click=0;

     function clicktoaddppl(userid,username)
     { 
         click=click+1;
       var mycnt=0;
        var  totcnt=$("#chkalrdclkd").val();
        var wchppluwant=$("#which_ppl_u_want").val();
          if(wchppluwant==="1")
            {
	  var madd=0;
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
           
                 var  tmyppl="<li class=\"with"+userid+"\">"+username+""+"<button id=\"remvusrbtn\" onclick=\"$('.with"+userid+"').remove()\">X</button><input type=\"hidden\" value=\""+userid+"\""+" name=\"with_users[]\" id=\"withuserid"+mycnt+"\" /> </li>";
                   $("#with_ppl_div").append(tmyppl);
                     $("#selectedppldiv").append(tmyppl);
            }
              $("#chkalrdclkd").val(mycnt);
                }
               
                if(wchppluwant==="2")
                {
	       var madd=0;
         for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
           var tykcuuserid="#show_only"+mycnt;
            var mychecck=$(tykcuuserid).val();
            if(mychecck===userid)
            {
               madd=1;
                
            }
         }
            if(madd!==1)
            {
           
                 var  tmyppl="<li class=\"show_only_rmv"+userid+"\">"+username+""+"<button id=\"remvusrbtn\" onclick=\"$('.show_only_rmv"+userid+"').remove()\">X</button><input type=\"hidden\" value=\""+userid+"\""+" name=\"show_only_user[]\" id=\"show_only"+mycnt+"\" /> </li>";
                   $("#show_members").append(tmyppl);
	 
                     $("#selectedppldiv").append(tmyppl);
            } 
                }
                
                    if(wchppluwant==="3")
                {
	       var madd=0;
         for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
           var tykcuuserid="#hide_to"+mycnt;
            var mychecck=$(tykcuuserid).val();
            if(mychecck===userid)
            {
               madd=1;
                
            }
         }
            if(madd!==1)
            {
           
                 var  tmyppl="<li class=\"hide_to_rmv"+userid+"\">"+username+""+"<button id=\"remvusrbtn\" onclick=\"$('.hide_to_rmv"+userid+"').remove()\">X</button><input type=\"hidden\" value=\""+userid+"\""+"  name=\"hidden_users[]\" id=\"hide_to"+mycnt+"\" /> </li>";
                   $("#hide_members").append(tmyppl);
                     $("#selectedppldiv").append(tmyppl);
            } 
                }
        $("#chkalrdclkd").val(mycnt);
     }
 var n=0;
       function srchpople(srch)
          {
          n=0;
 ex=0;
           asd=0;
            
        
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                $("#searchedppl").html(xmlhttp.responseText);
            }
        }
      
          xmlhttp.open("POST", "../web/srchpeople.php?q=" + srch, true);
   
        xmlhttp.send();
    }
  
 


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
	       var hide_user="#"+s;
	       $(hide_user).fadeIn();
	}
          }
        
           $(hilituser).css({"background-color":"red","color":"white"});
         
         
        $(dltprecssu).css({"background-color":"red","color":"navy"});
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
               var wantedpplval=$("#which_ppl_u_want").val();
               var usersname=$(userscls).val();
               var checks=0;
               if(wantedpplval==="1")
              {
                 
                for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  var show_useridadd="#withuserid"+cntt;
                  var my_checks= $(show_useridadd).val();
                  if(my_checks===usersid)
                  {
                      checks=1;
                  }
                }
      if(checks!==1)
      {
           
              var ppl="<li class=\"with"+usersid+"\" style=\"display:inline;\">"+usersname+"<button id=\"remvusrbtn\" onclick=\"$('.with"+usersid+"').remove()\">X</button><input type=\"hidden\" value=\""+usersid+"\" name=\"with_users[]\" id=\"withuserid"+cntt+"\" />  </li>";
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
                  var show_useridadd="#show_only"+cntt;
                  var my_checks= $(show_useridadd).val();
                  if(my_checks===usersid)
                  {
                      checks=1;
                  }
                }
                if(checks!==1)
                {
	            var  tmyppl="<li class=\"show_only_rmv"+usersid+"\">"+usersname+""+"<button id=\"remvusrbtn\" onclick=\"$('.show_only_rmv"+userid+"').remove()\">X</button><input type=\"hidden\" value=\""+usersid+"\""+" name=\"show_only_user[]\" id=\"show_only"+cntt+"\" /> </li>";
                   $("#show_members").append(tmyppl);
	 
                     $("#selectedppldiv").append(tmyppl);
                }
           
                }
       
       if(wantedpplval==="3")
       {
              for(cntt=1;cntt<=totlcnt;cntt++)
              {
                  var show_useridadd="#hide_to"+cntt;
                  var my_checks= $(show_useridadd).val();
                  if(my_checks===usersid)
                  {
                      checks=1;
                  }
                }
                if(checks!==1)
                {
	       var  tmyppl="<li class=\"hide_to_rmv"+usersid+"\">"+usersname+""+"<button id=\"remvusrbtn\" onclick=\"$('.hide_to_rmv"+usersid+"').remove()\">X</button><input type=\"hidden\" value=\""+usersid+"\""+"  name=\"hidden_users[]\" id=\"hide_to"+cntt+"\" /> </li>";
                   $("#hide_members").append(tmyppl);
                     $("#selectedppldiv").append(tmyppl); 
                }
             
       }
                   $("#chkalrdclkd").val(cntt);  
            
             
            }
              
            if(x===38) // for (^) key
            {
                var dltprecss="#"+n;
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
       
       $(hilituser).css({"background-color":"red","color":"white"});
       
      $(dltprecss).css({"background-color":"white","color":"navy"});
      
      
            }
        }
     
    });
});