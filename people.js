/* 
    Created on : Jun 5, 2015, 4:55:43 PM
    Author     : Vijayakumar <vijayakumar at www.sedfed.com>
*/

$(document).ready(function()
{
    $(".grpTtl").html("My Relations");
 var mywrd="ns";
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#advsrchresult").html(xmlhttp.responseText);
    
           }
          }
            xmlhttp.open("POST","viewcnct.php?me="+mywrd,true);
            xmlhttp.send();
});
$(document).ready(function()
{
    $('.filtrInp').keyup(function(e)
    {
       var key=e.keycode || e.which;
       if(key===13)
       {
           srchppl();
       }
    });
});
var b=0;
var pre;
function slide_down_wind(event)
{
   
   
    if(b>930)
    {
        b=930;
    }
    var chk=b-pre;
    
    $("#slide_btn").css({'position':'relative','margin-top':event.pageY-50+'px'});
    var tot=event.pageY/100;
    if(tot>3)
    {
         b=b+7;
        
        $("#topFiltrPplOut").css({'position':'absolute','margin-top':-b+'px'});
   
    }
    if(tot<3)
    {
      b=b-7; 
     
         $("#topFiltrPplOut").css({'position':'absolute','margin-top':-b+'px'});
   
    }
     pre=b;
}

function filterTheater(){
   if($('#topFiltrPplOut').css('left')==='0px'){
        $('#topFiltrPplOut').animate({'left':'-500px'},'slow');
    $('#proceedBars').fadeOut();
    }
    else{
        $('#topFiltrPplOut').animate({'left':'0px'},'slow');
    $('#proceedBars').fadeIn();
    }
    
}
function closefiltr()
{
   
      $('#topFiltrPplOut').animate({'left':'-500px'},'slow');
    $('#proceedBars').fadeOut();
}
function addRelOther(){
    if($('#addRelType').val()==='other'){
        $('#classGroup').hide();
        $('#orGroup').fadeIn();
    }
    if($('#addRelType').val()==='classmate'){
        $('#orGroup').hide();
         $('#classGroup').fadeIn();
        
    }
}


function sort_people_by(type)
{
    var dt=0;
    var array=new Array();
    var nya=new Array();
    var users=new Array();
      var tot_ppl=$("#tot_srch_rslt_cnt").val();
  
      for(dt=1;dt<=tot_ppl;dt++)
      {
          users[dt]=$("#trgtdiv"+dt+"").html();
           
      }
      if(type==="Name")
      {
      for(dt=1;dt<=tot_ppl;dt++)
      {
               
                    var cname=$("#hfname"+dt+"").val();
                    cname=cname.toLowerCase();
                   array[dt]=cname;
                       nya[dt]=cname;
                       
      }
      $("#advsrchresult").html('');
      
      array.sort();
      var i=0;
      for(dt=0;dt<tot_ppl;dt++)
      {
          for(i=1;i<=tot_ppl;i++)
          {
              if(nya[i]===array[dt] && $("#trgtdiv"+i+"").html!=="")
              {
                  
                  $("#advsrchresult").append('<font id="trgtdiv'+i+'">'+users[i]+'</font>');
                  users[i]="";
              }
          }
              
               
      }
          
      }
      
if(type==="Age")
{
    var age=new Array();
    var chk_age=new Array();
    for(dt=1;dt<=tot_ppl;dt++)
      {
               
                    var c_age=$("#hage"+dt+"").val();
              
                   age[dt]=c_age;
                       chk_age[dt]=c_age;
                       
               
      }
      $("#advsrchresult").html('');
      
      age.sort();
      var i=0;
      for(dt=0;dt<tot_ppl;dt++)
      {
          for(i=1;i<=tot_ppl;i++)
          {
              if(chk_age[i]===age[dt] && $("#trgtdiv"+i+"").html!=="")
              {
                  
                  $("#advsrchresult").append('<font id="trgtdiv'+i+'">'+users[i]+'</font>');
                  users[i]="";
              }
          }
              
               
      }
}
if(type==="Verified")
{
    var vrf=new Array();
    var chk_vrf=new Array();
    for(dt=1;dt<=tot_ppl;dt++)
      {
               
                    var c_vrf=$("#verified_time"+dt+"").val();
              
                   vrf[dt]=c_vrf;
                       chk_vrf[dt]=c_vrf;
                       
               
      }
      $("#advsrchresult").html('');
      
      vrf.sort();
      var i=0;
      for(dt=tot_ppl;dt>=0;dt--)
      {
          for(i=1;i<=tot_ppl;i++)
          {
              if(chk_vrf[i]===vrf[dt] && $("#trgtdiv"+i+"").html!=="")
              {
                  
                  $("#advsrchresult").append('<font id="trgtdiv'+i+'">'+users[i]+'</font>');
                  users[i]="";
              }
          }
              
               
      }
}

 $("#advsrchresult").append('<input type="hidden" value="'+tot_ppl+'" id="tot_srch_rslt_cnt" />');
 filteruser();
}
function addRelOtherAcc(){
    if($('#addRelTypeAcc').val()==='other'){
        $('#classGroupAcc').hide();
        $('#orGroupAcc').fadeIn();
    }
    if($('#addRelTypeAcc').val()==='classmate'){
        $('#orGroupAcc').hide();
         $('#classGroupAcc').fadeIn();
        
    }
}


function srchppl()
{
$("#switch_tiles").val(5);
var name=$("#nmsrch").val();
if(document.getElementById("mlsrch").checked===true)
{
    $("#mlsrch").val("boy");
   var male=$("#mlsrch").val(); 
}else
{
    $("#mlsrch").val("");
    var male=$("#mlsrch").val();
}
if(document.getElementById("fmlsrch").checked===true)
{
    $("#fmlsrch").val("girl");
   var female=$("#fmlsrch").val(); 
}else
{
    $("#fmlsrch").val("");
    var female=$("#fmlsrch").val();
}

var agefrm=$("#agfrmsrch").val();
var ageto=$("#agetosrch").val();
var plclvng=$("#plccrlvngsrch").val();
var bldgrp=$("#bldsrch").val();
var scl=$("#sclsrch").val();
var clg=$("#clgsrch").val();
var cmpny=$("#cmpnysrch").val();
var mob=$("#mobsrch").val();
var email=$("#emailsrch").val();
var vrf=$("#vrfsrch").val();

var nvrf=$("#notvrfsrch").val();

var bday=$("#bdaysrch").val();
var bmnth=$("#bmnthsrch").val();
var byear=$("#byearsrch").val();
var relig=$("#religsrch").val();
var stdin=$("#stdinsrch").val();
var stdfrm=$("#stdinfrmsrch").val();
var stdto=$("#stdintosrch").val();
var clgin=$("#clgstdinsrch").val();
var clgfrm=$("#clgstdfrmsrch").val();
var clgto=$("#clgstdtosrch").val();
var workin=$("#workplcsrch").val();
var relname=$("#relsnamesrch").val();
var fther=$("#fthernmsrch").val();
var mther=$("#mthernmsrch").val();
var bther=$("#bthernmsrch").val();
var sther=$("#sthernmsrch").val();
var nicknm=$("#nicknmsrch").val();
var vhcl=$("#vhclsrch").val();
var lang=$("#langsrch").val();
var formdata=new FormData();
var rels=$("#relsrch").val();
 formdata.append("nmsrch",name);
 formdata.append("mlsrch",male);
 formdata.append("fmlsrch",female);
 formdata.append("agfrmsrch",agefrm);
 formdata.append("agetosrch",ageto);
 formdata.append("plccrlvngsrch",plclvng);
 formdata.append("bldsrch",bldgrp);
 formdata.append("sclsrch",scl);
 formdata.append("clgsrch",clg);
 formdata.append("cmpnysrch",cmpny);
formdata.append("mobsrch",mob);
formdata.append("email",email);
 formdata.append("vrfsrch",vrf);
 formdata.append("notvrfsrch",nvrf);
formdata.append("bdaysrch",bday);
 formdata.append("bmnthsrch",bmnth);
formdata.append("byearsrch",byear);
 formdata.append("religsrch",relig);
formdata.append("stdinsrch",stdin);
 formdata.append("stdinfrmsrch",stdfrm);
 formdata.append("stdintosrch",stdto);
formdata.append("clgstdinsrch",clgin);
formdata.append("relsname",relname);
 formdata.append("clgstdfrmsrch",clgfrm);
 formdata.append("clgstdtosrch",clgto);
 formdata.append("workplcsrch",workin);
 formdata.append("relsnamesrch",rels);
 formdata.append("fther",fther);
 formdata.append("mther",mther);
 formdata.append("bther",bther);
 formdata.append("sther",sther);
 formdata.append("vhcl",vhcl);
 formdata.append("lang",lang);
 formdata.append("nicknm",nicknm);

   var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              $("#advsrchresult").html(xmlhttp.responseText);
    
           }else{

            }
          }
             xmlhttp.open("POST","advsrchppl.php",true);
            xmlhttp.send(formdata);
}
function filteruser(a)
{
  var n=0;
  
$("#switch_tiles").val(6);
  var tot_cnt=$("#tot_srch_rslt_cnt").val();
var sh_vrf=0;
var verf=3;

if(document.getElementById("vrfsrch").checked===true || document.getElementById("notvrfsrch").checked===true)
{
    sh_vrf=1;
   if(document.getElementById("vrfsrch").checked===true)
   {
       verf=1;
   }else
   {
       verf=0;
   }
   
}

    for(n=1;n<=tot_cnt;n++)
  {
//alert(n);    
var langs=$("#langsrch").val();
langs=langs.toLowerCase();
var agefrm=$("#agefrmsrch").val();
var ageto=$("#agetosrch").val();
var plclvngme=$("#plccrlvngsrch").val();
var bldgrp=$("#bldsrch").val();
var scl=$("#sclsrch").val();
var religin=$("#religsrch").val();
religin=religin.toLowerCase();
var clg=$("#clgsrch").val();
clg=clg.toLowerCase();
var clg_std=$("#clgstdinsrch").val();
clg_std=clg_std.toLowerCase();
var cmpny=$("#cmpnysrch").val();
cmpny=cmpny.toLowerCase();
var mob=$("#mobsrch").val();
var email=$("#emailsrch").val();
email=email.toLowerCase();
var rels=$("#relsrch").val();
var fname=$("#nmsrch").val();
var std_in=$("#stdinsrch").val();
std_in=std_in.toLowerCase();
var scl=$("#sclsrch").val();
var fthernm=$("#fthernmsrch").val();
var mthernm=$("#mthernmsrch").val();
fthernm=fthernm.toLowerCase();
mthernm=mthernm.toLowerCase();
var bday=$("#bdaysrch").val();
var bmnth=$("#bmnthsrch").val();
var byear=$("#byearsrch").val();
var clg_frm_yr=$("#clgstdfrmsrch").val();
var clg_to_yr=$("#clgstdtosrch").val();
clg_frm_yr=clg_frm_yr.toLowerCase();
var vhcl=$("#vhclsrch").val();
vhcl=vhcl.toLowerCase();

var lang=$("#langsrch").val();
lang=lang.toLowerCase();

clg_to_yr=clg_to_yr.toLowerCase();

var scl_frm_yr=$("#stdinfrmsrch").val();
var scl_to_yr=$("#stdintosrch").val();
scl_frm_yr=scl_frm_yr.toLowerCase();
scl_to_yr=scl_to_yr.toLowerCase();
var nick_name=$("#nicknmsrch").val();
nick_name=nick_name.toLowerCase();
scl=scl.toLowerCase();
//results
var cage=$("#hage"+n+"").val();
cage=cage-1+1;
agefrm=agefrm-1+1;
ageto=ageto-1+1;
var crel=$("#hrels"+n+"").val();
var c_verify=$("#verified_time"+n+"").val();
c_verify=c_verify-1+1;
var c_email=$("#email"+n+"").val();
c_email=c_email.toLowerCase();
var c_relig=$("#relgion"+n+"").val();
c_relig=c_relig.toLowerCase();
var c_cmpny=$("#hcmpny"+n+"").val();
var c_plc_lvng=$("#hliving_in"+n+"").val();
var cname=$("#hfname"+n+"").val();
var h_clg=$("#hclg"+n+"").val();
var c_day=$("#hbday"+n+"").val();
var c_clg_std=$('#college'+n+'').val();
c_clg_std=c_clg_std.toLowerCase();
var c_mnth=$("#hbmnth"+n+"").val();
var c_year=$("#hbyear"+n+"").val();
//alert("lo");
var c_car_vhcl=$("#vhcl1"+n+"").val();
var c_bike_vhcl=$("#vhcl2"+n+"").val();
c_car_vhcl=c_car_vhcl.toLowerCase();
c_bike_vhcl=c_bike_vhcl.toLowerCase();
//alert(c_car_vhcl);
var c_scl_frm_yr=$("#sclfrmyr"+n+"").val();
var c_scl_to_yr=$("#scl_toyr"+n+"").val();
c_scl_frm_yr=c_scl_frm_yr.toLowerCase();
c_scl_to_yr=c_scl_to_yr.toLowerCase();
var c_nicknm=$("#hnick_name"+n+"").val();
c_nicknm=c_nicknm.toLowerCase();

var c_mob=$("#h_mob_no"+n+"").val();
var c_email=$("#hemail"+n+"").val();

h_clg=h_clg.toLowerCase();
cname=cname.toLowerCase();
c_cmpny=c_cmpny.toLowerCase();
c_plc_lvng=c_plc_lvng.toLowerCase();

var cbld=$("#bld"+n+"").val();
var cscl=$("#scl"+n+"").val();
var c_std=$("#scl"+n+"").val();
cscl=cscl.toLowerCase();
c_std=c_std.toLowerCase();
var chscl=$("#hscl"+n+"").val();
chscl=chscl.toLowerCase();
var c_clg_frm_yr=$("#hclgfromyr"+n+"").val();
var c_clg_to_yr=$("#hclgtoyr"+n+"").val();
var c_mthernm=$("#mother_name"+n+"").val();
var c_fthernm=$("#father_name"+n+"").val();
var c_langs=$("#hlangs"+n+"").val();
c_langs=c_langs.toLowerCase();
c_fthernm=c_fthernm.toLowerCase();
c_mthernm=c_mthernm.toLowerCase();

var his_name=cname.indexOf(fname);

var pl_living=c_plc_lvng.indexOf(plclvngme);
var scl_nm=cscl.indexOf(scl);
var hsc_nm=chscl.indexOf(scl);
var h_clg=h_clg.indexOf(clg);
var h_cmpny=c_cmpny.indexOf(cmpny);
var h_mob=c_mob.indexOf(mob);
var h_email=c_email.indexOf(email);
var h_nick_nm=c_nicknm.indexOf(nick_name);
var h_std_in=c_std.indexOf(std_in);
var h_day=c_day.indexOf(bday);
var h_lang=c_langs.indexOf(langs);
var h_mnth=c_mnth.indexOf(bmnth);
var h_year=c_year.indexOf(byear);
var h_relig=c_relig.indexOf(religin);
var h_scl_frm_yr=c_scl_frm_yr.indexOf(scl_frm_yr);
var h_scl_to_ur=c_scl_to_yr.indexOf(scl_to_yr);
var h_clg_std=c_clg_std.indexOf(clg_std);
var h_fthernm=c_fthernm.indexOf(fthernm);
var h_mthernm=c_mthernm.indexOf(mthernm);
var h_car=c_car_vhcl.indexOf(vhcl);


var h_bike=c_bike_vhcl.indexOf(vhcl);
var h_clg_frm_yr=c_clg_frm_yr.indexOf(clg_frm_yr);
var h_clg_to_yr=c_clg_to_yr.indexOf(clg_to_yr);
if(fname!=="")
{
    
        if(his_name>-1)
        {
           
            $("#trgtdiv"+n+"").fadeIn();
        }else
        {
            $("#trgtdiv"+n+"").hide();
            continue;
        }
    
}
if(langs!=="")
{
    if(h_lang>-1)
    {
        
            $("#trgtdiv"+n+"").fadeIn();
    }else
    {
         $("#trgtdiv"+n+"").hide();
            continue;
    }
}
if(vhcl!=="")
{
    if(h_car>-1 || h_bike>-1)
    {
            $("#trgtdiv"+n+"").fadeIn();    
    }else
    {
        $("#trgtdiv"+n+"").hide();
            continue;
    }
}
if(fthernm!=="")
{
    //alert(h_fthernm);
    if(h_fthernm>-1)
    {
          $("#trgtdiv"+n+"").fadeIn();
    }else
    {
        $("#trgtdiv"+n+"").hide();
            continue;
    }
}
if(mthernm!=="")
{
    if(h_mthernm>-1)
    {
          $("#trgtdiv"+n+"").fadeIn();
    }else
    {
        $("#trgtdiv"+n+"").hide();
            continue;
    } 
}
if(clg_frm_yr!=="")
{
    if(h_clg_frm_yr>-1)
    {
           $("#trgtdiv"+n+"").fadeIn();
    }else
    {
         $("#trgtdiv"+n+"").hide();
            continue;
    }
}
if(clg_to_yr!=="")
{
    if(h_clg_to_yr>-1)
    {
          $("#trgtdiv"+n+"").fadeIn();
    }else
    {
        $("#trgtdiv"+n+"").hide();
            continue;
    }
}
if(clg_std!=="")
{
    if(h_clg_std>-1)
    {
        $("#trgtdiv"+n+"").fadeIn();
    }else
    {
        $("#trgtdiv"+n+"").hide();
            continue;
    }
}
if(scl_frm_yr!=="")
{
    if(h_scl_frm_yr>-1)
    {
            $("#trgtdiv"+n+"").fadeIn();   
    }else
    {
         $("#trgtdiv"+n+"").hide();
            continue;
    }
}
if(scl_to_yr!=="")
{
    if(h_scl_to_ur>-1)
    {
        $("#trgtdiv"+n+"").fadeIn(); 
    }else
    {
        $("#trgtdiv"+n+"").hide();
            continue;
    }
}
if(std_in!=="")
{
   
    if(h_std_in>-1)
    {
           
            $("#trgtdiv"+n+"").fadeIn();
    }else
    {
         $("#trgtdiv"+n+"").hide();
            continue;
    }
}

if(religin!=="")
{
    if(h_relig>-1)
    {
        
            $("#trgtdiv"+n+"").fadeIn();
    }else
    {
        $("#trgtdiv"+n+"").hide();
            continue;
    }
}
if(bday!=="")
{
    if(h_day>-1)
    {
        $("#trgtdiv"+n+"").fadeIn();
    }else
    {
         $("#trgtdiv"+n+"").hide();
            continue;
    }
}
if(bmnth!=="")
{
    if(h_mnth>-1)
    {
         $("#trgtdiv"+n+"").fadeIn();
    }else
    {
        $("#trgtdiv"+n+"").hide();
            continue;
    }
}
if(byear!=="")
{
    if(h_year>-1)
    {
         $("#trgtdiv"+n+"").fadeIn();
    }else
    {
        $("#trgtdiv"+n+"").hide();
            continue;
    }
}

if(sh_vrf===1)
{
    if(verf===1)
    {
    if(c_verify>=5)
    {
     $("#trgtdiv"+n+"").fadeIn();   
    }else
    {
        $("#trgtdiv"+n+"").hide();
            continue;
    }    
    }else
    {
    if(c_verify<=5)
    {
     $("#trgtdiv"+n+"").fadeIn();   
    }else
    {
        $("#trgtdiv"+n+"").hide();
            continue;
    }    
    }
    
}
if(nick_name!=="")
{
    if(h_nick_nm>-1)
    {
     $("#trgtdiv"+n+"").fadeIn();   
    }else
    {
        $("#trgtdiv"+n+"").hide();
        continue;
    }
}
if(email!=="")
{
    if(h_email>-1)
    {
        $("#trgtdiv"+n+"").fadeIn();
    }else
    {
        $("#trgtdiv"+n+"").hide();
        continue;
    }
}
if(mob!=="")
{
    if(h_mob>-1)
    {
        $("#trgtdiv"+n+"").fadeIn();
    }else
    {
        $("#trgtdiv"+n+"").hide();
        continue;
    }
}

if(cmpny!=="")
{
    if(h_cmpny>-1)
    {
     $("#trgtdiv"+n+"").fadeIn();   
    }else
    {
        $("#trgtdiv"+n+"").hide();
        continue;
    }
}
if(clg!=="")
{
    if(h_clg>-1)
    {
        $("#trgtdiv"+n+"").fadeIn();
    }else
    {
        $("#trgtdiv"+n+"").hide();
        continue;
    }
}
if(scl!=="")
{
if(scl_nm>-1 || hsc_nm>-1)
{
    $("#trgtdiv"+n+"").fadeIn();
}else
{
    $("#trgtdiv"+n+"").hide();
    continue;
}
    
}
if(plclvngme!=="")
{
    if(pl_living>-1)
    {
         $("#trgtdiv"+n+"").fadeIn();
    }else
    {
        
         $("#trgtdiv"+n+"").hide();
         continue;
    }
}
if(bldgrp!=="")
{
                if(bldgrp!==cbld)
                {
 
                      $("#trgtdiv"+n+"").hide();
                      continue;

                }else
                {
                    $("#trgtdiv"+n+"").fadeIn();
                }    
}


if(agefrm!==0 || ageto!==0)
{
    
                        if(cage>=agefrm )
                       {
                         if(ageto!=="")
                         {
                           if((cage>ageto && ageto!==0))
                           {
                               
                             $("#trgtdiv"+n+"").hide();
                             continue;
                           }else
                           {
                               $("#trgtdiv"+n+"").fadeIn();
                           }
                         }
                       }else
                       {
                           
                     $("#trgtdiv"+n+"").hide();
                     continue;
                       }


  }
  
  if(rels!=="")
{
  if(rels!==crel)
{
  $("#trgtdiv"+n+"").hide();
  continue;
}else
{
    $("#trgtdiv"+n+"").fadeIn();
}
}else
{
}

if(plclvngme!=="")
{


}

  
  if(document.getElementById("mlsrch").checked===true)
  {
     
      var cmale=$("#hsex"+n+"").val();
      if(cmale==="Male")
      {
          $("#trgtdiv"+n+"").fadeIn();
      }else
      {
         
           $("#trgtdiv"+n+"").hide();
           continue;
      }
  }
  if(document.getElementById("fmlsrch").checked===true)
  {
      var cfmale=$("#hsex"+n+"").val();
      if(cfmale!=="Male")
      {
          $("#trgtdiv"+n+"").fadeIn();
      }else
      {
           $("#trgtdiv"+n+"").hide();
           continue;
      }
      
      
  }

        

  }
}


function addtorels(u,n,its_id)
{
    
  $("#targetReqst").html(n);
  $(".thtrPrcd").html("Send Request");
         
    $('#TheaterNewRel').fadeIn();
      
  $("#nowuser").val(u);
 
  $("#change_btn").val(its_id);

}
function addrelsprcs()
{
       var chng_id=$("#change_btn").val();
  
  $(".thtrPrcd").html("Sending Request...");
         
    var uname=$("#nowuser").val();
    
     var myn=$("#mysavenm").val();
     
    var type=$("#addRelType").val();
 
    var req_cont="uname="+uname+"&myname="+myn+"&type="+type;
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
 
             $(".thtrPrcd").html(xmlhttp.responseText);
            $(chng_id).html(xmlhttp.responseText);
           }
          };
            xmlhttp.open("POST","sendreqst.php?"+req_cont,true);
            xmlhttp.send();
}
function setviewtype(a,uid)
{
    var n=0;
    var nid="#vtype"+a;
    
 var wchfun=$("#switch_tiles").val()-1+1;
 
       switch (wchfun)
       {
              
              case 1:
	    showmycnct();
	    break;
              case 2:
	    seerequest();
	    break;
              case 3:
	    seesentreqst();
	    break;
              case 4:
	    relsofrels();
	    break;
              case 5:
	    srchppl();
	    break;
              case 6:
	    filteruser();
	    break;
              case 7:
	    showhisrels();
	    break; 
              case 8:
	     var f=$("#for_cmn_rels_f").val();
	    var u=$("#for_cmn_rels_u").val();
	    
	    showcmnrels(u,f);
	    break;
         
              default:
	    showmycnct();
	    break;
	    
       }
      
    $(nid).css({"border":"1px solid navy"});
    for(n=1;n<=4;n++)
    {
       var  id="#vtype"+n;
        if(id!==nid)
        {
    $(id).css({"border":"1px solid transparent"});   
        }else
        {
        }
    }
   
    var tp_cont="userid="+uid+"&type="+a;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
             
           }
          };
            xmlhttp.open("POST","setviewtype.php?"+tp_cont,true);
            xmlhttp.send();
}
function seesentreqst()
{
    var ns="ns";
   $(".grpTtl").html("Sent Requests");
       var tp_cont="myword="+ns;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#advsrchresult").html(xmlhttp.responseText);
   
           }else{
 
            }
          }
            xmlhttp.open("POST","seesentreqst.php?"+tp_cont,true);
            xmlhttp.send();
}
function seerequest()
{
    $(".grpTtl").html("Requests to you");
    var ns="ns";
   var tp_cont="myword="+ns;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#advsrchresult").html(xmlhttp.responseText);
   
           }
          };
            xmlhttp.open("POST","seereqst.php?"+tp_cont,true);
            xmlhttp.send();
}

function TheaterNewRelAccept(u,tp,tm,nm,fn,ac,its_id)
{
    $("#TheaterNewRelAccept").fadeIn();
    $("#targetReqstAcc").html(fn);
    $("#reqstdnm").html(fn);
    $("#reqstdtp").html(tp);
    $("#reqTime").html(tm);
    $("#reqnm").html(nm);
    $("#requstedusrnm").val(u);
    $("#change_btn").val(its_id);
    if(ac===1)
    {
        $("#hdshowgrmr").html("has ");
        $("#thtrmytitl").html("Update "+fn+" detail");
    }else
    {
        $("#hdshowgrmr").html("will be saved ");
        $("#thtrmytitl").html("Accept "+fn+"");
    }
    $("#curbtnid").val(id);
}
function acceptreq(u)
{
        var idf=$("#change_btn").val();
    var myid=$("#curbtnid").val();
    var usrnm=$("#requstedusrnm").val();
    var myname=$("#reqmyname").val();
    var type=$("#addRelTypeAcc").val();
   var req_cont="usrnm="+usrnm+"&myname="+myname+"&type="+type+"&myid="+myid;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
            $("#accreqrslt").html(xmlhttp.responseText);
            $(idf).html("Accepted");
           }else{
              
            }
          }
            xmlhttp.open("POST","acceptreq.php?"+req_cont,true);
            xmlhttp.send();
}
function cancelreq(u,id)
{
    var my="username="+u;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
            $("#"+id+"").html(xmlhttp.responseText);
           
           }else{
             
            }
          }
            xmlhttp.open("POST","cancelreq.php?"+my,true);
            xmlhttp.send();
}
function showmycnct()
{
    $(".grpTtl").html("My Relations");
 var mywrd="ns";
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#advsrchresult").html(xmlhttp.responseText);
    
           }else{
             
            }
          }
            xmlhttp.open("POST","viewcnct.php?me="+mywrd,true);
            xmlhttp.send();    
}
function srchpplfn(val)
{
    var df="ns";
    var mys="mypass="+df+"&cont="+val;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#advsrchresult").html(xmlhttp.responseText);
    
           }else{
             
            }
          }
            xmlhttp.open("POST","srchfn.php?"+mys,true);
            xmlhttp.send();
}
$(document).ready(function()
{
$(".fltrCatItm").click(function()
{
  var id=this.id;
  var n=1;
  for(n=0;n<=6;n++)
  {
   var nid="menuitemppl"+n;
   if(nid!==id)
   {
  $("#"+nid+"").css({"background-color":"white"});
       
   }else
   {
       $("#"+id+"").css({"background-color":"whitesmoke"});
  
   }
  }
  
});
});
function relsofrels()
{
    var df="ns";
     $(".grpTtl").html("Relations of your Relations ");
    var mys="mypass="+df;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#advsrchresult").html(xmlhttp.responseText);
    
           }else{
             
            }
          }
            xmlhttp.open("POST","relsofrels.php?"+mys,true);
            xmlhttp.send();
}
function showhisrels(username,fn)
{
      $(".grpTtl").html("Relations of "+fn);

$("#switch_tiles").val(7);
    var mys="mypass="+username;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#advsrchresult").html(xmlhttp.responseText);
    
           }else{
             
            }
          }
            xmlhttp.open("POST","viewcnctrels.php?"+mys,true);
            xmlhttp.send();   
}
function cmntomyrels()
{
    
    $("#switch_tiles").val(8);
    var ns="ns";
     $(".grpTtl").html(" See Common Relations of your Relations ");
    var mys="mypass="+ns;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#advsrchresult").html(xmlhttp.responseText);
    
           }else{
             
            }
          }
            xmlhttp.open("POST","cmntomyrels.php?"+mys,true);
            xmlhttp.send();  
}
function showcmnrels(u,f)
{
       
    $("#for_cmn_rels_u").val(u);
    $("#for_cmn_rels_f").val(f);
$("#switch_tiles").val(8);
      $(".grpTtl").html(" Common Relations to you and "+f);
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#advsrchresult").html(xmlhttp.responseText);
    
           }
          };
            xmlhttp.open("POST","showcmnrels.php?q="+u,true);
            xmlhttp.send();
}
