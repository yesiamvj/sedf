function typingel(a)
{
    var inp=$(a).val();
    $('#rh-srch').val(inp);
}
var old=0;
var ji=0;
function addnew(a)
{
         var tbl=document.getElementsByTagName('table')[2];
           var tr1=document.createElement('tr');
           var tr2=document.createElement('tr');
            old=old+1;
            ji=ji-1;
               tr1.setAttribute('id',old);
               tr2.setAttribute('id',ji);
        if(a===1)
         {
             var school="<td><font>School </font></td><td><input type=\"text\" id=\"tx1\" name=\"schl[]\" value=\"\" placeholder=\"Name of School\"></td> ";
             var splc="<td><font>Place </font></td><td><input type=\"text\" id=\"tx1\" name=\"schlplc[]\" value=\"\" placeholder=\"Place of the School\" ></td>";
         }else
         {  var school="<td><font>College </font></td><td><input type=\"text\" id=\"tx1\" name=\"clg[]\" value=\"\" placeholder=\"Name of College\"></td> ";
            var splc="<td><font>Place </font></td><td><input type=\"text\" id=\"tx1\" name=\"clgplc[]\" value=\"\" placeholder=\"Place of the College\" ></td>";
        
         }
     
         tbl.appendChild(tr1);
             tbl.appendChild(tr2);
            document.getElementById(old).innerHTML=school;
             document.getElementById(ji).innerHTML=splc;
}
function position()
{
    
    var posis=$("#posi").val();
    if(posis==="Working")
    {
        var job="<td id=\"adwrk\"><font>Job</font></td><td><input type=\"text\" id=\"tx7\" name=\"job[]\" placeholder=\"Name of your Job\" ></td>";
        var jp="<td id=\"adwrk\"><font>Place</font></td><td><input type=\"text\" id=\"tx7\" name=\"jobplc[]\" placeholder=\"Place of  Working\" > </td>";
        var tps="<td><input type=\"button\" value=\"Add Job\" id=\"adjobbtn\" onclick=\"addjobs(1)\"></td>";                                                                                                                                            
        $("#adpos").html(job);
        $("#adposplc").html(jp);
        $("#adjbtn").html(tps);
    }
    else
    {
        var job="";
        var jp="";
        var tbl=document.getElementsByTagName('table')[1];
    
         $("#adpos").html(job);
        $("#adposplc").html(jp);
        $("#adjbtn").html("");
    
    }
    
}
function addjobs(a)
{
    var tbl=document.getElementsByTagName('table')[0];
           var tr1=document.createElement('tr');
           var tr2=document.createElement('tr');
            old=old+1;
            ji=ji-1;
               tr1.setAttribute('id',old);
               tr2.setAttribute('id',ji);
        if(a===1)
         {
             var school="<td><font>Job </font></td><td><input type=\"text\" id=\"tx1\" name=\"job[]\" value=\"\" placeholder=\"Name of your Job\"></td> ";
             var splc="<td><font>Place </font></td><td><input type=\"text\" id=\"tx1\" name=\"jobplc[]\" value=\"\" placeholder=\"Place of Working\" ></td>";
         }else
         {  var school="<td><font>College </font></td><td><input type=\"text\" id=\"tx1\" name=\"clg[]\" value=\"\" placeholder=\"Name of College\"></td> ";
            var splc="<td><font>Place </font></td><td><input type=\"text\" id=\"tx1\" name=\"clgplc[]\" value=\"\" placeholder=\"Place of the College\" ></td>";
        
         }
     
         tbl.appendChild(tr1);
             tbl.appendChild(tr2);
            document.getElementById(old).innerHTML=school;
             document.getElementById(ji).innerHTML=splc;    
         
}