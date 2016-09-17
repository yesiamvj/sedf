var click=0;

 
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
            
                 var  cmyppl="<li class=\"grp_ad_mem"+userid+"\"> "+username+" "+" "+"<button id=\"remvusrbtn\" onclick=\"$(\'.grp_ad_mem"+userid+"\').remove();\">X</button><input type=\"number\" value=\""+userid+"\""+" id=\"grp_added_mems"+mycnt+"\" /> </li>";
                   
                   
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