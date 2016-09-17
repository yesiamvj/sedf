var click=0;

     function clicktoaddppl(userid,username)
     { 
         click=click+1;
       var mycnt=0;
        var  totcnt=$("#chkalrdclkd").val();
        
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
        
         var team2=$("#team1ppl").val();
         
         
        if(team2==="team2")
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