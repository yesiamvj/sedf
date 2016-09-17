var click=0;

     function clicktoaddppl(userid,username)
     { 
         click=click+1;
       var mycnt=0;
        var  totcnt=$("#chkalrdclkd").val();
         
        
         var qcmsg=$('#forqcmsgval').val();
         if(qcmsg==="10")
         {
          for(mycnt=1;mycnt<=totcnt;mycnt++)
         {
            var hkcuserid="#qcmsg"+mycnt;
           var mtocuid=$(hkcuserid).val();
            if(mtocuid===userid)
            {
            var qms=1;
             
           }
         }
         
        
            if(qms!==1)
            {
            
                var mp="<div class=\"qck"+userid+"\">"+username+"<span id=\"remvusrbtn\" onclick=\"$('.qck"+userid+"').remove();\" class=\"GrpMemDel\">X</span><input type=\"hidden\" value=\""+userid+"\" id=\"qcmsg"+mycnt+"\" /> </div>";
                $(".qckRecipsHold").slideDown();
            $("#qckMsgResp").append(mp);
              $("#selectedppldiv").append(mp);
              
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
               var myshar=$("#for_share_people").val();
               var usersname=$(userscls).val();
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
                          $("#qckMsgResp").append(lcn);
                  $("#selectedppldiv").append(lcn);
                  
            $("#chkalrdclkd").val(cntt);
             
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