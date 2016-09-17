function typingel(a)
{
    var p="You can suggest about your Laptop to People";
    var q="You can suggest about your Mobile to People";
    var r="You can suggest about your Bike to People";
     var s="You can suggest about your Car to People";
    var inp=$(a).val();
    $('#rh-srch').val(inp);
    
    if(a==="#tx1" || a==="#tx2")
    {
    $("#whatsrch").html(p);
     $("#whatsrch").css('color','crimson'  );
    $('#rh-srch').css('color','navy');
    }
     if(a==="#tx3" || a==="#tx5")
    {
    $("#whatsrch").html(q);
     $("#whatsrch").css('color','crimson'  );
    $('#rh-srch').css('color','navy');
    }
     if(a==="#tx6" || a==="#tx7" )
    {
    $("#whatsrch").html(r);
     $("#whatsrch").css('color','crimson'  );
    $('#rh-srch').css('color','navy');
    }
    if(a==="#tx8" || a==="#tx9")
    
    {
    $("#whatsrch").html(s);
     $("#whatsrch").css('color','crimson'  );
    $('#rh-srch').css('color','navy');
    }
    
    
    
    
}
var old=0;
var ji=0;
function addnew(a)
{
         var tbl=document.getElementsByTagName('table')[0];
           var tr1=document.createElement('tr');
           var tr2=document.createElement('tr');
            old=old+1;
            ji=ji-1;
               tr1.setAttribute('id',old);
               tr2.setAttribute('id',ji);
        if(a===1){
             var school="<td><font>School </font></td><td><input type=\"text\" id=\"tx1\" name=\"\" placeholder=\"Name of School\"></td> ";
             var splc="<td><font>Place </font></td><td><input type=\"text\" id=\"tx1\" name=\"\" placeholder=\"Place of the School\" ></td>";
         }else
         {  var school="<td><font>College </font></td><td><input type=\"text\" id=\"tx1\" name=\"\" placeholder=\"Name of College\"></td> ";
            var splc="<td><font>Place </font></td><td><input type=\"text\" id=\"tx1\" name=\"\" placeholder=\"Place of the College\" ></td>";
        
         }
         tbl.appendChild(tr1);
             tbl.appendChild(tr2);
            document.getElementById(old).innerHTML=school;
             document.getElementById(ji).innerHTML=splc;
}
