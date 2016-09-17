function typingel(a)
{
    var dt="People can view this details on your Profile";
    var inp=$(a).val();
    $('#rh-srch').val(inp);
    $("#whatsrch").html(dt);
     $("#whatsrch").css('color','red');
}
var old=0;
function addnew(a)
{
            if(a===3)
            {
               var tbl=document.getElementsByTagName('table')[0];
           var tr1=document.createElement('tr');
            old=old+1;
                tr1.setAttribute('id',old);
              var school="<td><input type=\"text\" id=\"ct\" name=\"ctgry_ann[]\" placeholder=\"Category\"></td><td><input type=\"text\" id=\"tx1\" name=\"ann[]\" placeholder=\"Annoying\"></td> ";
            tbl.appendChild(tr1);
            document.getElementById(old).innerHTML=school;  
            }
            else
            {
                 var tbl=document.getElementsByTagName('table')[0];
           var tr1=document.createElement('tr');
            old=old+1;
                tr1.setAttribute('id',old);
              var school="<td><input type=\"text\" id=\"ct\" name=\"ctgry_fav[]\" placeholder=\"Category\"></td><td><input type=\"text\" id=\"tx1\" name=\"fav[]\" placeholder=\"Favorite\"></td> ";
            tbl.appendChild(tr1);
            document.getElementById(old).innerHTML=school;
            }
 }
 function addabt(a)
{
    if(a===3)
            {
                var tbl=document.getElementsByTagName('table')[0];
           var tr1=document.createElement('tr');
            old=old+1;
                tr1.setAttribute('id',old);
              var school="<td><input type=\"text\" id=\"ct\" name=\"ctgry_abt[]\" placeholder=\"Category\"></td><td><input type=\"text\" id=\"tx1\" name=\"abt[]\" placeholder=\"About\"></td> ";
            tbl.appendChild(tr1);
            document.getElementById(old).innerHTML=school;  
            }
            else
            {
                 var tbl=document.getElementsByTagName('table')[0];
           var tr1=document.createElement('tr');
            old=old+1;
                tr1.setAttribute('id',old);
              var school="<td><input type=\"text\" id=\"ct\" name=\"ctgry_fav[][]\" placeholder=\"Category\"></td><td><input type=\"text\" id=\"tx1\" name=\"fav[]\" placeholder=\"Favorite\"></td> ";
            tbl.appendChild(tr1);
            document.getElementById(old).innerHTML=school;
            }
 }