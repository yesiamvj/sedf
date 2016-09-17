
$(document).ready(function(){
    $("#next").load(function(){
        document.getElementById("next").disabled=true;
    });
});
$(document).ready(function(){
    $("button").load(function(){
        document.getElementsByTagName("button").disabled=true;
    });
});

function subt()
{
   
    var usn=$("#tx1").val();
    var fsn=$("#tx2").val();
    var lsn=$("#tx3").val();
    var ntvp=$("#tx4").val();
    var year=$("#yr").val();
    var month=$("#mnth").val();
    var day=$("#days").val();
    var mal=$("#ml").val();
    var fmal=$("#fml").val();
    var p=usn.indexOf(' ');
    var q=fsn.indexOf(' ');   
    var r=lsn.indexOf(' ');
    var s=ntvp.indexOf(' ');
     var ok=$("#ena").val();
   var wrn="<img src=\"ex.png\" width=\"25\" height=\"25\">";
    var rit="<img src=\"rt.png\" width=\"25\" height=\"25\">";
    
    
    if(p===0 || usn==="" || q===0 || fsn==="" || r===0 || lsn==="" || ok==="d" || s===0 || ntvp==="" || year==="Year" || month==="Month" || day==="Day" || day==="sa"  )
       {
           
        
        document.getElementById("next").disabled=true;
         $("#nk").html(wrn);
   

if(p===0 || usn===""  )
{
    $("#ab").html(wrn);
}
else
{
    $("#ab").html(rit);
  }
  if(p===0 || usn===""  )
{
    $("#ab").html(wrn);
}
else
{
    $("#ab").html(rit);
  }
  if(p===0 || usn===""  )
{
    $("#ab").html(wrn);
}
else
{
    $("#ab").html(rit);
  }
  if(q===0 || fsn===""  )
{
    $("#bc").html(wrn);
}
else
{
    $("#bc").html(rit);
  }
  if(r===0 || lsn===""  )
{
    $("#cd").html(wrn);
}
else
{
    $("#cd").html(rit);
  }
  if(s===0 || ntvp===""  )
{
    $("#ef").html(wrn);
}
else
{
    $("#ef").html(rit);
  }
  if(year==="Year" || month==="Month" || day==="Day" )
{
    $("#gh").html(wrn);
}
else
{
    $("#gh").html(rit);
  }
  
}
else{
    document.getElementById("next").disabled=false;
    $("#nk").html(rit);
}    
}
   
function imag(a)
{
    var ok=$("#ena").val();
    
    var usn=$("#tx1").val();
    var fsn=$("#tx2").val();
    var lsn=$("#tx3").val();
    var ntvp=$("#tx4").val();
    var year=$("#yr").val();
    var month=$("#mnth").val();
    var day=$("#days").val();
    var mal=$("#ml").val();
    var fmal=$("#fml").val();
    var p=usn.indexOf(' ');
    var q=fsn.indexOf(' ');   
    var r=lsn.indexOf(' ');
    var s=ntvp.indexOf(' ');
  
    var wrn="<img src=\"ex.png\" width=\"25\" height=\"25\">";
    var rit="<img src=\"rt.png\" width=\"25\" height=\"25\">";
    if(a===21)
    {
         document.getElementById("next").disabled=true;
         $("#nw").html(wrn);
    }
    if(a===6)
    {
        var b="boy";
        
        $("#ml").val(b);
        
      var sd=  $("#ml").val();
      
        document.getElementById("ml").checked=true;
    }
    else{
        $("#fml").val("");
        var sd=  $("#ml").val();
       
    }
     if(a===7)
    {
        var g="girl";
        
        $("#fml").val(g);
        
     
       var fd= $("#fml").val();
        document.getElementById("fml").checked=true;
    }
    else{
       $("#fml").val("");
       var fd= $("#fml").val();
    }
   
    
    
    if(p===0 || usn==="" || q===0 || fsn==="" || r===0 || lsn==="" || s===0 || ok==="d" || ntvp==="" || year==="Year" || month==="Month" || day==="Day" || day==="sa"  || ( sd==="" && fd===""))  
     {
         document.getElementById("next").disabled=true;
         $("#nk").html(wrn);
        
  if(a===1)
  {
     if(p===0 || usn===""  )
{
    $("#ab").html(wrn);
}
else
{
    $("#ab").html(rit);
  }   
  }
    if(a===2)
  {
  if(q===0 || fsn===""  )
{
    $("#bc").html(wrn);
}
else
{
    $("#bc").html(rit);
  }    
  }
    if(a===3)
  {
  if(r===0 || lsn===""  )
{
    $("#cd").html(wrn);
}
else
{
    $("#cd").html(rit);
  }    
  }
    if(a===4)
  {
  if(s===0 || ntvp===""  )
{
    $("#ef").html(wrn);
}
else
{
    $("#ef").html(rit);
  }    
  }
    if(a===5)
  {
  if(year==="Year" || month==="Month" || day==="Day")
{
    $("#gh").html(wrn);
}
else
{
    $("#gh").html(rit);
  }    
  }

  
    
}
else{
    document.getElementById("next").disabled=false;
     $("#nk").html(rit);
     
  if(a===1)
  {
     if(p===0 || usn===""  )
{
    $("#ab").html(wrn);
}
else
{
    $("#ab").html(rit);
  }   
  }
    if(a===2)
  {
  if(q===0 || fsn===""  )
{
    $("#bc").html(wrn);
}
else
{
    $("#bc").html(rit);
  }    
  }
    if(a===3)
  {
  if(r===0 || lsn===""  )
{
    $("#cd").html(wrn);
}
else
{
    $("#cd").html(rit);
  }    
  }
    if(a===4)
  {
  if(s===0 || ntvp===""  )
{
    $("#ef").html(wrn);
}
else
{
    $("#ef").html(rit);
  }    
  }
   
  
  if(year==="Year" || month==="Month" || day==="Day")
{
    $("#gh").html(wrn);
}
else
{
    $("#gh").html(rit);
  }    
  

  
  
  
  
}
}

