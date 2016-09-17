/* 
    Created on : Jun 2, 2015, 4:23:02 PM
    Author     : Vijayakumar <vijayakumar at www.sedfed.com>
*/
$(document).ready(function()
	{
		$("#rmvao").hide();
	});
function thtrInput(src,trgt){
    $(trgt).val($(src).val());
    if($(src).val()=="Unmarried"|| $(src).val()=="Single"  || $(src).val()=="Divorced")
    {
    
    	$("#rmvtmp").hide();
    }else
    {
    	$("#rmvtmp").show();
    }//inp_thtrRelSts
    if($(src).val()=="Married" || $(src).val()=="In love" )
    {
    
    	$("#rmvao").hide();
    }else
    {
    	$("#rmvao").show();
    }
}
function yearSelect(tgtid){
    var i=1951;
   $(tgtid).html('');
    for(i=1951;i<2012;i++){
        
        var preVal=$(tgtid).html();
        $(tgtid).html(preVal+'<option>'+i+'</option>');
    }
}
function dateSelect(tgtid){
     var i=1;
   $(tgtid).html('');
    for(i=1;i<31;i++){
        
        var preVal=$(tgtid).html();
        $(tgtid).html(preVal+'<option>'+i+'</option>');
    }
}
function ageInp(){
  
    var tgttxt=''+$('#inpTh_Date').val()+' '+ $('#inpTh_Mon').val()+' '+ $('#Th_ageYear').val();
    $('#inp_Age').val(2015-$('#Th_ageYear').val());
    $('#inp_DOB').val(tgttxt);
}
function relstsChnge(slct){
    $(slct).val();
}
function stsClrChnge(){
    $('#inp_thsts').css({'color':$('#th_stsclrinp').val()});
    $('#inp_status').css({'color':$('#th_stsclrinp').val()});
   
}
function openchngpic()
{
	
	$("#chngeurpic").fadeIn();
	var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              $("#chngpicdiv").html(xmlhttp.responseText);
           }else{
      
            }
          }
            xmlhttp.open("POST","picedit.html",true);
            xmlhttp.send();
}
function updtedu(uid)
{

	var predeg=$("#inp_thDegFnsh").val();
	var curdeg=$("#inp_thDegCur").val();
	var xmlhttp = new XMLHttpRequest();
	var deg_cont="predegs="+predeg+"&curdegs="+curdeg;
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

           }else{
      
            }
          }
            xmlhttp.open("POST","updtdeg.php?"+deg_cont,true);
            xmlhttp.send();


}
function updtmynm()
{
	
	var curname=$("#inp_thName").val();
	var xmlhttp = new XMLHttpRequest();
	var name_cont="fnm="+curname;
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

           }else{
      
            }
          }
            xmlhttp.open("POST","updtcurname.php?"+name_cont,true);
            xmlhttp.send();

}
function updtnicknm()
{
	
	var curname=$("#inp_NickName").val();
	var xmlhttp = new XMLHttpRequest();
	var name_cont="nicknm="+curname;
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

           }else{
      
            }
          }
            xmlhttp.open("POST","updtnicknm.php?"+name_cont,true);
            xmlhttp.send();

}
function updatdob()
{
	var day=$("#inpTh_Date").val();
	var mon=$("#inpTh_Mon").val();
	var year=$("#myyear").val();
	var myage=2015-year;
	$('#myages').html("Age : "+myage);
	var xmlhttp = new XMLHttpRequest();
	var dob_cont="d="+day+"&m="+mon+"&y="+year+"&a="+myage;
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

           }else{
      
            }
          }
            xmlhttp.open("POST","updtdob.php?"+dob_cont,true);
            xmlhttp.send();
}
function updtrship()
{
	var stat=$("#thRelSlct").val();
	var orrel=$("#inp_thtrRelSts").val();
	var withrl=$("#inp_thtrRelWith").val();
	var rel_cont="status="+stat+"&orany="+orrel+"&withrel="+withrl;
		var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

           }else{
      
            }
          }
            xmlhttp.open("POST","updtrelstat.php?"+rel_cont,true);
            xmlhttp.send();
}
function updtloc(a)
{
	var iama
	if(a==1)
	{
 iama=$("#inp_thIamA").val();
	}
	if(a==2)
	{
		 iama=$("#inp_thLocate").val();
	}

	
	var loc_cont="iamas="+iama+"&ab="+a;
	var xmlhttp = new XMLHttpRequest();

	    xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

           }else{
      
            }
          };
            xmlhttp.open("POST","updtcurloc.php?"+loc_cont,true);
            xmlhttp.send();


}
function updt_nationality(dffg)
{
       
       var nat=$("#my_national").val();
       var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
	  //alert(xmlhttp.responseText);
          }
   };
            xmlhttp.open("POST","updt_nationalty.php?q="+dffg,true);
            xmlhttp.send();
}
function updtstsimg(pic)
{
      
	  var r=new FileReader();
	  r.onload=(function(e)
	  {
	         $("#for_new_sts_img").html('<img src="'+e.target.result+'" style="max-width:200px;"/>');
	  });
	    r.readAsDataURL(pic.files[0]);
	
}
       


function updtstsimgs()
{
     var inc_post=0;
     if(document.getElementById("inclde_post").checked===true)
     {
         inc_post=1;
     }
     var fili="#stsimg";
	  var fil_data = $(fili).prop('files')[0];   
	
	    var for_data = new FormData(); 
	   if($(fili).prop('files').length===0)
	  	 {
	  	 	 for_data.append('cks', 1);
	  	 }else
	  	 {
	  	 	 for_data.append('file', fil_data);
	  	 	  for_data.append('cks', 2); 
	  	 }
     for_data.append('ck',1);
     for_data.append('inc_posts',inc_post);
    $.ajax({
                url: 'updtstatus.php',  
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: for_data,                         
                type: 'post',
                success: function(php_script_response){
                  $("#ThStatus").fadeOut();
	 alertBigTt("Success");
                     }
     });
}

function updtmysts()
{
    var cmp=0;
    
     $("#status_result").html("Updating...");
     var inc_post=0;
     if(document.getElementById("inclde_post").checked===true)
     {
         inc_post=1;
     }
	var st_war=$("#inp_thsts").val();
	var fileid="#stsaydfl";
	  var file_data = $(fileid).prop('files')[0]; 
	 var my="sak";
         var color=$("#th_stsclrinp").val();
	  var form_data= new FormData()
	  	 if($(fileid).prop('files').length==0)
	  	 {
	  	 	 form_data.append('ck', "1");
	  	 }else
	  	 {
	  	 	 form_data.append('file', file_data);
	  	 	  form_data.append('ck', "2"); 
	  	 }
	    
     form_data.append('status',st_war);     
     form_data.append('stsclr',color);
     form_data.append('inc_postt',inc_post);
    $.ajax({
                url: 'updtmysts.php',  
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
                  $("#status_result").html("Updated");
                   updtstsimgs();
	 
                     }
     });

if(cmp===1)
{
   
}
	
}
function updtmycurmood()
{
	var mood=$("#thMoodSlct").val();
	var moodwrd=$("#inp_thtrMood").val();
	var moodwith=$("#inp_thtrMoodWith").val();
	var mod_cont="mood="+mood+"&mdwrd="+moodwrd+"&moodwith="+moodwith;
		var xmlhttp = new XMLHttpRequest();

	    xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
	  alertTt("Success");
	  $("#thtrMood").fadeOut();
           }else{
      
            }
          }
            xmlhttp.open("POST","updtcurmood.php?"+mod_cont,true);
            xmlhttp.send();
}
function updtcuposi()
{
	
	var posi=$("#thPosSlct").val();
	var orany=$("#inp_thtrPosSts").val();
	var nmoforg=$("#inp_thtrPosWith").val();
	var posi_cont="posis="+posi+"&orany="+orany+"&namoforg="+nmoforg;
	var xmlhttp = new XMLHttpRequest();
   xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
	  alertTt("Success");
	  $("#thtrCurpos").fadeOut();
           }else{
      
            }
          }
            xmlhttp.open("POST","updtcurposi.php?"+posi_cont,true);
            xmlhttp.send();

}
function updtmyloctn()
{
	
	var cur_locn=$("#inp_thcurLocate").val();
	var xmlhttp = new XMLHttpRequest();
   xmlhttp.onreadystatechange = function() {
        
            if(xmlhttp.readyState===4 && xmlhttp.status===200)
            {
	    alertTt("Success");
	  $("#thtrMood").fadeOut();
           }
          };
            xmlhttp.open("POST","updtcurlocn.php?curloc="+cur_locn,true);
            xmlhttp.send();

}
var np=1;

function addclg()
{
	np=np+1;
	var ccnt=$("#mtotclgcnt").val();
	if(np==2)
	{

	for(np=1;np<=ccnt;np++)
	{

	}

	}
				if(ccnt<np)
				{
						var prehtml=$("#totcont").html();

	var newhtml=" <div class=\"myEduItem\">\
				<div class=\"myEduSubTtl\">\
				<div class=\"myEduSubHead\"><input class=\"txtBxx\" id=\"from"+np+"\" type=\"text\" value=\"\" placeholder=\"From\"/> -  <input class=\"txtBxx\" id=\"to"+np+"\" type=\"text\" value=\"\" placeholder=\"To\" /> </div><span class=\"divider\"  style=\"color:darkgrey\">|</span><div class=\"myEduSubHead\" > <input class=\"txtBxxTtl\" type=\"text\" id=\"branch"+np+"\" value=\"\" placeholder=\"branch / course\"/> </div> <span class=\"divider\"  style=\"color:darkgrey\">  |</span><div class=\"myEduSubHead\" > <input class=\"txtBxxTtl\" type=\"text\" value=\"\" id=\"titdis"+np+"\" placeholder=\"Title or Discription\"/></div>\
				</div>\
				<div class=\"myEduAns\" >\
				<input class=\"txtBxx\" type=\"text\" id=\"clg"+np+"\" value=\"\" placeholder=\"Name of College\"/>\
				<div class=\"myOrgLocate\"><input class=\"txtBxxTtl\" type=\"text\"  id=\"clgplc"+np+"\" value=\"\" placeholder=\"Location\" style=\"color:black\"/> </div>\
				</div>\
				</div>";       
				$("#mtotclgcnt").val(np);    
                          $("#tot_clg_cont").append(newhtml);                
$("#maxaadval").val(np);

				}

}
var dt=1;
function addhsc()
{
       
	dt=dt+1;
	var scc=$("#mtothsccnt").val();
	
	if(dt==2)
	{

	for(dt=1;dt<=scc;dt++)
	{

	}

	}
	if(scc<dt)
	{
	
			
	var newhtm="<div class=\"myEduSubTtl\">\
    <div class=\"myEduSubHead\"> <input class=\"txtBxx\" id=\"hscfrom"+dt+"\" type=\"text\" value=\"\" placeholder=\"From\" /> - <input class=\"txtBxx\" type=\"text\" id=\"hscto"+dt+"\" value=\"\" placeholder=\"To\"/> </div>  <span class=\"divider\"  style=\"color:darkgrey\">|</span> <div class=\"myEduSubHead\"><input class=\"txtBxxTtl\" type=\"text\" id=\"hscbrnch"+dt+"\" value=\"\" placeholder=\"branch / course\"/> </div>  <span class=\"divider\"  style=\"color:darkgrey\">|</span> <div class=\"myEduSubHead\"><input class=\"txtBxxTtl\" type=\"text\" id=\"hscdis"+dt+"\" value=\"\" placeholder=\"Title or description\"/> </div>\
           </div>\
           <div class=\"myEduAns\">\
           <input class=\"txtBxx\" type=\"text\" id=\"hscnm"+dt+"\" value=\"\" placeholder=\"Name of High School\"/>\
           <div class=\"myOrgLocate\"><input class=\"txtBxxTtl\" type=\"text\" id=\"hscplc"+dt+"\" value=\"\" placeholder=\"Location\" style=\"color:black\"/> </div>\
           </div><br/>";
           $("#tothsccont").append(newhtm);
         
           $("#maxaadval").val(dt);
           $("#mtothsccnt").val(dt);
	
       }

}
var ns=1;

function addscl()
{
	var st=$("#mtotsclcnt").val();
	ns=ns+1;
	if(ns==2)
	{

	for(ns=1;ns<=st;ns++)
	{

	}

	}
if(st<ns)
{
	$("#mtotsclcnt").val(ns);

	var prehtm=$("#totsclcont").html();
	var newhtm=" <div class=\"myEduItem\">\
                                    <div class=\"myEduSubTtl\">\
                                        <div class=\"myEduSubHead\"><input class=\"txtBxx\" type=\"text\" id=\"sclfrom"+ns+"\" value=\"\" placeholder=\"From\" />  -  <input class=\"txtBxx\" type=\"text\" id=\"sclto"+ns+"\" value=\"\" placeholder=\"To\"/> </div> <span class=\"divider\"  style=\"color:darkgrey\">|</span> <div class=\"myEduSubHead\"><input class=\"txtBxxTtl\" type=\"text\" id=\"sclcrs"+ns+"\" value=\"\" placeholder=\"branch / course\"/></div> <span class=\"divider\"  style=\"color:darkgrey\">|</span> <div class=\"myEduSubHead\"><input class=\"txtBxxTtl\" id=\"sclgrp"+ns+"\" type=\"text\" value=\"\" placeholder=\"Title or description\"/></div>\
                                    </div>\
                                    <div class=\"myEduAns\">\
                                        <input class=\"txtBxx\" id=\"sclnm"+ns+"\" type=\"text\" value=\"\" placeholder=\"Name of School\"/>\
                                        <div class=\"myOrgLocate\"><input class=\"txtBxxTtl\" type=\"text\" id=\"sclplc"+ns+"\" value=\"\" placeholder=\"Location\" style=\"color:black\" /> </div>\
                                    </div>\
                                </div>";
                                $("#totsclcont").append(newhtm);
                                $("#maxaadval").val(ns);
}

}
function updateedu()
{
	var n=0;
	
	var df=$("#maxaadval").val();

	var st=$("#mtotsclcnt").val();
	for(n=1;n<=df;n++)
	{
		
		var clgfrmyr=$("#from"+n+"").val();
		var clgtoyr=$("#to"+n+"").val();
		var clgcrs=$("#branch"+n+"").val();
		var clgdiscr=$("#titdis"+n+"").val();
		var clgname=$("#clg"+n+"").val();//l
		var clgplc=$("#clgplc"+n+"").val();
		var cempty=0;
		var clgtotcnt=$("#mtotclgcnt").val();
		if(clgfrmyr=="" && clgtoyr=="" && clgcrs=="" && clgdiscr=="" && clgname=="" && clgplc=="")
		{
			cempty=1;	
		}else{
			cempty=0;
		}

		
		var hscfrmyr=$("#hscfrom"+n+"").val();
		var hsctoyr=$("#hscto"+n+"").val();
		var hsccrs=$("#hscbrnch"+n+"").val();
		var hscdiscr=$("#hscdis"+n+"").val();
		var hscname=$("#hscnm"+n+"").val();
		var hscplc=$("#hscplc"+n+"").val();
		var hsccnt=$("#mtothsccnt").val();
		var hempty=0;
		if(hscfrmyr=="" && hsctoyr=="" && hsccrs=="" && hscdiscr=="" && hscname=="" && hscplc=="")
		{
			hempty=1;	
		}else{
			hempty=0;
		}


		var scfrmyr=$("#sclfrom"+n+"").val();

		var sctoyr=$("#sclto"+n+"").val();
		var sccrs=$("#sclcrs"+n+"").val();
		var scdiscr=$("#sclgrp"+n+"").val();
		var scname=$("#sclnm"+n+"").val();//l
		var scplc=$("#sclplc"+n+"").val();
		var sclcnt=$("#mtotsclcnt").val();
		var sempty=0;
		if(scfrmyr=="" && sctoyr=="" && sccrs=="" && scdiscr=="" && scname=="" && scplc=="")
		{
			sempty=1;	
		}else{
			sempty=0;
		}

//st cont //cur//home
		var edu_cont="clgfrmyr="+clgfrmyr+"&hscfrmyr="+hscfrmyr+"&scfrmyr="+scfrmyr+"&clgtoyr="+clgtoyr+"&hsctoyr="+hsctoyr+"&sctoyr="+sctoyr+"&clgccrs="+clgcrs+"&hsccrs="+hsccrs+"&sccrs="+sccrs+"&clgdiscr="+clgdiscr+"&hscdiscr="+hscdiscr+"&scdiscr="+scdiscr+"&clgname="+clgname+"&hscname="+hscname+"&scname="+scname+"&clgplc="+clgplc+"&hscplc="+hscplc+"&sclplc="+scplc+"&cnt="+n+"&clgct="+clgtotcnt+"&hscct="+hsccnt+"&sclct="+sclcnt+"&cempty="+cempty+"&hempty="+hempty+"&sempty="+sempty;
   		var xmlhttp = new XMLHttpRequest();
   xmlhttp.onreadystatechange = function() {
           if(xmlhttp.readyState===4 && xmlhttp.status===200)
            {
	  window.location.assign('ppl_location.php');
           }else{
      
            }
          }
            xmlhttp.open("POST","updtedudet.php?"+edu_cont,true);
            xmlhttp.send();

	}


}
var sf=1;
function addbrthr()
{
	sf=sf+1;
	var bt=$("#mtotbrcnt").val();
	if(sf==2)
	{
		for(sf=1;sf<=bt;sf++)
		{

		}
	}
	if(bt<sf)
	{

	var preht=$("#totbrthrcont").html();
	var nhtm="<br/><div class=\"myEduAns\">\
    <div class=\"myEduSubHead\" style=\" color: navy\"> <input class=\"txtBxx\" id=\"brthrnm"+sf+"\" type=\"text\" value=\"\" style=\"width:250px;\" placeholder=\"Name\" /> </div><span class=\"divider\" style=\"color:darkgrey\">|</span> <div class=\"myEduSubHead\"><input class=\"txtBxx\" type=\"text\" id=\"brthrage"+sf+"\" value=\"\" placeholder=\"Age\"/> </div> <span class=\"divider\"  style=\"color:darkgrey\">|</span> <div class=\"myEduSubHead\"><input class=\"txtBxx\" id=\"degree"+sf+"\" type=\"text\" value=\"\" placeholder=\"Education\"/></div><span class=\"divider\" style=\"color:darkgrey\">|</span><div class=\"myEduSubHead\"><input type=\"text\" class=\"txtBxxOc\" id=\"occpn"+sf+"\" value=\"\" placeholder=\"occupation\"/></div>\
    </div>";
    $("#totbrthrcont").html(preht+nhtm);
    $("#totfamcont").val(sf);
    $("#mtotbrcnt").val(sf);

	}
}
var sis=1;
function addsist()
{
	sis=sis+1;
	var st=$("#mtotsiscnt").val();
	if(sis==2)
	{
		for(sis=1;sis<=st;sis++)
		{

		}
	}
	if(st<sis)
	{
		var preht=$("#totsiscont").html();
	var newht="<br/><div class=\"myEduAns\">\
                                        <div class=\"myEduSubHead\" style=\" color: navy\"> <input class=\"txtBxx\" id=\"sisnm"+sis+"\" type=\"text\" value=\"\" style=\"width:250px;\" placeholder=\"Name\"/> </div><span class=\"divider\"  style=\"color:darkgrey\">|</span> <div class=\"myEduSubHead\"><input class=\"txtBxx\" id=\"sisage"+sis+"\" type=\"text\" value=\"\" placeholder=\"Age\"/></div> <span class=\"divider\"  style=\"color:darkgrey\">|</span> <div class=\"myEduSubHead\"> <input class=\"txtBxx\" id=\"sisedu"+sis+"\" type=\"text\" value=\"\" placeholder=\"Education\" /> </div><span class=\"divider\"  style=\"color:darkgrey\">|</span><div class=\"myEduSubHead\"><input type=\"text\" class=\"txtBxxOc\" id=\"sisocp"+sis+"\" value=\"\" placeholder=\"occupation\" /> </div>\
                                    </div>";
                                    $("#totsiscont").html(preht+newht);
                                    $("#totfamcont").val(sis);
                                 
                                    $("#mtotsiscnt").val(sis);

	}
	
}

function updtfml()
{
	var fml=0;
	var fthernm=$("#fthrnm").val();
	var ftherage=$("#fthrage").val();
	var ftheredu=$("#fthredu").val();
	var ftherocupt=$("#fthrocup").val();


	var mthernm=$("#mthernm").val();
	var mtherage=$("#mtherage").val();
	var mtheredu=$("#mtheredu").val();
	var mtherocup=$("#mthrocup").val();

	var tfm=$("#totfamcont").val();
	var brcnt=$("#mtotbrcnt").val();
	var siscnt=$("#mtotsiscnt").val();
	var bempty;
	var sempty;
	var xmlhttp = new XMLHttpRequest();
	for(fml=1;fml<=tfm;fml++)
	{
		
		var brthrnm=$("#brthrnm"+fml+"").val();
		var brthrage=$("#brthrage"+fml+"").val();
		var brthredu=$("#degree"+fml+"").val();
		var brthrocupt=$("#occpn"+fml+"").val();

		if(brthrnm=="" && brthrage=="" && brthredu=="" && brthrocupt=="")
		{
			bempty=1;
		}else
		{
			bempty=0;
		}

		var sisnm=$("#sisnm"+fml+"").val();
		var sisage=$("#sisage"+fml+"").val();
		var sisedu=$("#sisedu"+fml+"").val();
		var sisocupt=$("#sisocp"+fml+"").val();
		if(sisnm=="" && sisage=="" && sisedu=="" && sisocupt=="")
		{
			sempty=1;
		}else
		{
			sempty=0;
		}
  xmlhttp.onreadystatechange = function() {
           if(xmlhttp.readyState===4 && xmlhttp.status===200)
            {
	  window.location.assign('ppl_location.php');
           }else{

            }
          }

		var fam_cont="fathernm="+fthernm+"&ftherage="+ftherage+"&ftheredu="+ftheredu+"&ftherocupt="+ftherocupt+"&mthernm="+mthernm+"&mtherage="+mtherage+"&mtheredu="+mtheredu+"&mtherocup="+mtherocup+"&brthrnm="+brthrnm+"&brthrage="+brthrage+"&brthredu="+brthredu+"&brthrocupt="+brthrocupt+"&sisnm="+sisnm+"&sisage="+sisage+"&sisedu="+sisedu+"&sisocupt="+sisocupt+"&brcnt="+brcnt+"&siscnt="+siscnt+"&bempty="+bempty+"&cnts="+fml+"&sempty="+sempty;

	 xmlhttp.open("POST","updtfamdet.php?"+fam_cont,true);
            xmlhttp.send();
 
           
	}



}
function updtlocations()
{
	var cloc=$("#clocm").val();
	var clocfrm=$("#clocfrm").val();
	var clocto=$("#cloctom").val();

	var ploc=$("#plocm").val();
	var plocfr=$("#plocfrm").val();
	var plocto=$("#ploctom").val();

	var nloc=$("#nlocm").val();
	var nlocfr=$("#nlocfrm").val();
	var nlocto=$("#nloctom").val();
	var locs_cont="cloc="+cloc+"&clocfr="+clocfrm+"&clocto="+clocto+"&ploc="+ploc+"&plocfr="+plocfr+"&plocto="+plocto+"&nloc="+nloc+"&nlocfr="+nlocfr+"&nlocto="+nlocto;

		var xmlhttp = new XMLHttpRequest();
   xmlhttp.onreadystatechange = function() {
           if(xmlhttp.readyState===4 && xmlhttp.status===200)
            {
	  window.location.assign('aboutme.php');
           }else{
      
            }
          }
            xmlhttp.open("POST","updtlocs.php?"+locs_cont,true);
            xmlhttp.send();
	}
function updtabtme()
{
	var bggrop=$("#bggrp").val();
	
	var lanknwn=$("#slang").val();
	var relig=$("#relg").val();
	var eca=$("#eca").val();
	var psq=$("#physique").val();
	var mentl=$("#mental").val();
	var polt=$("#politic").val();
	var income=$("#mi").val();
	var abtme=$("#abtme").val();
var for_data=new FormData();
for_data.append('bgroup',bggrop);
	var abtme_cont="blood="+bggrop+"&lang="+lanknwn+"&relgion="+relig+"&eca="+eca+"&physic="+psq+"&mental="+mentl+"&politic="+polt+"&mnthinc="+income+"&abtme="+abtme;
	var xmlhttp = new XMLHttpRequest();
   xmlhttp.onreadystatechange = function() {
           if(xmlhttp.readyState===4 && xmlhttp.status===200)
            {
	  window.location.assign('my_favs.php');
           }else{
      
            }
          }
            xmlhttp.open("POST","updtabtme.php?"+abtme_cont,true);
            xmlhttp.send(for_data);
}
function updtfavdet()
{
	var f1=$("#f1").val();
	var f2=$("#f2").val();
	var f3=$("#f3").val();
	var f4=$("#f4").val();
	var f5=$("#f5").val();
	var f6=$("#f6").val();
	var f7=$("#f7").val();
	var f8=$("#f8").val();
	var f9=$("#f8").val();
	var f10=$("#f10").val();
	var f11=$("#f11").val();
	var f12=$("#f12").val();
	var f13=$("#f13").val();
	var f14=$("#f14").val();
	var f15=$("#f15").val();
	var f16=$("#f16").val();
	var f17=$("#f17").val();
	var f18=$("#f18").val();
	var f19=$("#f19").val();
	var f20=$("#f20").val();

	var fr1=$("#fr1").val();
	var fr2=$("#fr2").val();
	var fr3=$("#fr3").val();
	var fr4=$("#fr4").val();
	var fr5=$("#fr5").val();
	var fr6=$("#fr6").val();
	var fr7=$("#fr7").val();
	var fr8=$("#fr8").val();
	var fr9=$("#fr8").val();
	var fr10=$("#fr10").val();
	var fr11=$("#fr11").val();
	var fr12=$("#fr12").val();
	var fr13=$("#fr13").val();
	var fr14=$("#fr14").val();
	var fr15=$("#fr15").val();
	var fr16=$("#fr16").val();
	var fr17=$("#fr17").val();
	var fr18=$("#fr18").val();
	var fr19=$("#fr19").val();
	var fr20=$("#fr20").val();
	 var for_data = new FormData(); 
	  
     for_data.append('f1',f1);                       
    for_data.append('f2',f2);                       
    for_data.append('f3',f3);                       
    for_data.append('f4',f4);                       
    for_data.append('f5',f5);                       
    for_data.append('f6',f6);                       
    for_data.append('f7',f7);                       
    for_data.append('f8',f8);                       
    for_data.append('f9',f9);                       
    for_data.append('f10',f10);                       
    for_data.append('f11',f11);                       
    for_data.append('f12',f12);                       
    for_data.append('f13',f13);                       
    for_data.append('f14',f14);                       
    for_data.append('f15',f15);                       
    for_data.append('f16',f16);                       
    for_data.append('f17',f17);                       
    for_data.append('f18',f18);                       
    for_data.append('f19',f19);                       
    for_data.append('f20',f20);

    for_data.append('fr1',fr1);                       
    for_data.append('fr2',fr2);                       
    for_data.append('fr3',fr3);                       
    for_data.append('fr4',fr4);                       
    for_data.append('fr5',fr5);                       
    for_data.append('fr6',fr6);                       
    for_data.append('fr7',fr7);                       
    for_data.append('fr8',fr8);                       
    for_data.append('fr9',fr9);                       
    for_data.append('fr10',fr10);                       
    for_data.append('fr11',fr11);                       
    for_data.append('fr12',fr12);                       
    for_data.append('fr13',fr13);                       
    for_data.append('fr14',fr14);                       
    for_data.append('fr15',fr15);                       
    for_data.append('fr16',fr16);                       
    for_data.append('fr17',fr17);                       
    for_data.append('fr18',fr18);                       
    for_data.append('fr19',fr19);                       
    for_data.append('fr20',fr20);                       
    
    $.ajax({
                url: 'updtfavdet.php',  
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: for_data,                         
                type: 'post',
                success: function(php_script_response){
                    window.location.assign('my_annoy.php');
                     }
     });
}
function updtanndet()
{
	var f1=$("#a1").val();
	var f2=$("#a2").val();
	var f3=$("#a3").val();
	var f4=$("#a4").val();
	var f5=$("#a5").val();
	var f6=$("#a6").val();
	var f7=$("#a7").val();
	var f8=$("#a8").val();
	var f9=$("#a8").val();
	var f10=$("#a10").val();
	var f11=$("#a11").val();
	var f12=$("#a12").val();
	var f13=$("#a13").val();
	var f14=$("#a14").val();
	var f15=$("#a15").val();
	var f16=$("#a16").val();
	var f17=$("#a17").val();
	var f18=$("#a18").val();
	var f19=$("#a19").val();
	var f20=$("#a20").val();

	var fr1=$("#ar1").val();
	var fr2=$("#ar2").val();
	var fr3=$("#ar3").val();
	var fr4=$("#ar4").val();
	var fr5=$("#ar5").val();
	var fr6=$("#ar6").val();
	var fr7=$("#ar7").val();
	var fr8=$("#ar8").val();
	var fr9=$("#ar8").val();
	var fr10=$("#ar10").val();
	var fr11=$("#ar11").val();
	var fr12=$("#ar12").val();
	var fr13=$("#ar13").val();
	var fr14=$("#ar14").val();
	var fr15=$("#ar15").val();
	var fr16=$("#ar16").val();
	var fr17=$("#ar17").val();
	var fr18=$("#ar18").val();
	var fr19=$("#ar19").val();
	var fr20=$("#ar20").val();
	 var for_data = new FormData(); 
	  
     for_data.append('f1',f1);                       
    for_data.append('f2',f2);                       
    for_data.append('f3',f3);                       
    for_data.append('f4',f4);                       
    for_data.append('f5',f5);                       
    for_data.append('f6',f6);                       
    for_data.append('f7',f7);                       
    for_data.append('f8',f8);                       
    for_data.append('f9',f9);                       
    for_data.append('f10',f10);                       
    for_data.append('f11',f11);                       
    for_data.append('f12',f12);                       
    for_data.append('f13',f13);                       
    for_data.append('f14',f14);                       
    for_data.append('f15',f15);                       
    for_data.append('f16',f16);                       
    for_data.append('f17',f17);                       
    for_data.append('f18',f18);                       
    for_data.append('f19',f19);                       
    for_data.append('f20',f20);

    for_data.append('fr1',fr1);                       
    for_data.append('fr2',fr2);                       
    for_data.append('fr3',fr3);                       
    for_data.append('fr4',fr4);                       
    for_data.append('fr5',fr5);                       
    for_data.append('fr6',fr6);                       
    for_data.append('fr7',fr7);                       
    for_data.append('fr8',fr8);                       
    for_data.append('fr9',fr9);                       
    for_data.append('fr10',fr10);                       
    for_data.append('fr11',fr11);                       
    for_data.append('fr12',fr12);                       
    for_data.append('fr13',fr13);                       
    for_data.append('fr14',fr14);                       
    for_data.append('fr15',fr15);                       
    for_data.append('fr16',fr16);                       
    for_data.append('fr17',fr17);                       
    for_data.append('fr18',fr18);                       
    for_data.append('fr19',fr19);                       
    for_data.append('fr20',fr20);                       
    
    $.ajax({
                url: 'updtanndet.php',  
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: for_data,                         
                type: 'post',
                success: function(php_script_response){
                    window.location.assign('gadgets.php');
                     }
     });
}
function updtabt(id)
{
	var a1=$("#ab1").val();
	var a2=$("#ab2").val();
	var a3=$("#ab3").val();
	var a4=$("#ab4").val();
	var a5=$("#ab5").val();
	var a6=$("#ab6").val();
	var a7=$("#ab7").val();
	var a8=$("#ab8").val();
	var a9=$("#ab9").val();
	var a10=$("#ab10").val();
	var a11=$("#ab11").val();
	var a12=$("#ab12").val();
	var a13=$("#ab13").val();
	var a14=$("#ab14").val();

	var abtthink=$("#ab2").val();
	var tinkedusrnm=$("#thinkusrnm").val();

					for_data=new FormData();
						for_data.append('thikednm',tinkedusrnm);
						for_data.append('thinks',abtthink);
					for_data.append('a1',a1);
					for_data.append('a2',a2);
					for_data.append('a3',a3);
					for_data.append('a4',a4);
					for_data.append('a5',a5);
					for_data.append('a6',a6);
					for_data.append('a7',a7);
					for_data.append('a8',a8);
					for_data.append('a9',a9);
					for_data.append('a10',a10);
					for_data.append('a11',a11);
					for_data.append('a12',a12);
					for_data.append('a13',a13);
					for_data.append('a14',a14);

					
    $.ajax({
                url: 'updtabt.php',  
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: for_data,                         
                type: 'post',
                success: function(php_script_response){
                   window.location.assign('../'+id);
                     }
     });


}
function updatvhcl()
{
	//alert("ok");
	var mob_os=$("#mob_os").val();
	var mob_no=$("#mob_no").val();
	var mbrand=$("#mbrand").val();
	var sim=$("#sim").val();

	var lbrand=$("#lbrand").val();
	var lcolor=$("#lcolor").val();
	var lmodel_no=$("#lmodel_no").val();
	var los1=$("#los1").val();
	var los2=$("#los2").val();

	var bikebrand=$("#bikebrand").val();
	var bikeno=$("#bikeno").val();
	var bikecolor=$("#bikecolor").val();

	var carbrand=$("#carbrand").val();
	var carno=$("#carno").val();
	var carcolor=$("#carcolor").val();
	var for_data=new FormData();
	var vhcl_cont="mob_os="+mob_os+"&mob_no="+mob_no+"&mbrand="+mbrand+"&sim="+sim+"&lbrand="+lbrand+"&lmodel_no="+lmodel_no+"&lcolor="+lcolor+"&los1="+los1+"&los2="+los2+"&bikebrand="+bikebrand+"&bikeno="+bikeno+"&bikecolor="+bikecolor+"&carbrand="+carbrand+"&carno="+carno+"&carcolor="+carcolor;

var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
            	window.location.assign('about_things.php');

           }else{
      
            }
          }
            xmlhttp.open("POST","updatvhcl.php?"+vhcl_cont,true);
            xmlhttp.send();
}
function updtcnct(goto)
{
	
	    var mob_no=$("#mymobno").val();
	
	var email=$("#myemail").val();
	var website=$("#mywebsite").val();
	var for_data=new FormData();

	for_data.append('mobno',mob_no);
	for_data.append('email',email);
	for_data.append('website',website);

	var xmlhttp = new XMLHttpRequest();
	    xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

             window.location.assign(goto);
           }
          }
            xmlhttp.open("POST","updtcnctdet.php",true);
            xmlhttp.send(for_data);
}
function openchengepic()
{
 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#chngppic").html(xmlhttp.responseText);
    
           }
          }
            xmlhttp.open("POST","../../web/chngpropic.php?",true);
            xmlhttp.send();
}
function change_wall_pic()
{
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#chngppic").html(xmlhttp.responseText);
             $('#chngppic').fadeIn();
           }else{
             
            }
          }
            xmlhttp.open("POST","change_wpic_edit_prof.php",true);
            xmlhttp.send();
}
$(document).ready(function()
{
    $(".chng_my_pics").click(function()
    {
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#chngppic").html(xmlhttp.responseText);
             $('#chngppic').fadeIn();
           }else{
             
            }
          }
            xmlhttp.open("POST","change_pic_edit_prof.php",true);
            xmlhttp.send();
    });
    
});
function updtppic()
{
    
        $("#wchwantchng").val("1");
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#targetdiv").html(xmlhttp.responseText);
    
           }else{
             
            }
          }
            xmlhttp.open("POST","img_crop_edit_prof.php",true);
            xmlhttp.send();
    
  
}
function openchngwallpic()
{
    $("#wchwantchng").val('2');
    
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#targetdiv").html(xmlhttp.responseText);
    
           }else{
             
            }
          }
            xmlhttp.open("POST","img_crop_edit_prof.php",true);
            xmlhttp.send();
}
function showmy_pre_pics()
{
    $("#targetdiv").html("Loading Please wait...");
    
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#targetdiv").html(xmlhttp.responseText);
            
           }else{
            }
          }
            xmlhttp.open("POST","showmyprepics.php?",true);
            xmlhttp.send();
}
function set_selected_pic(as,nm)
{
    var mes=0;
    if(nm==="me")
    {
        mes=1;
    }
    var conts="q="+as+"&mes="+mes;
             $("#targetdiv").html("<img src=\"icons/LoaderIcon.gif\" /><br/>Please wait ...");
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#targetdiv").html(xmlhttp.responseText);
             
           
           }else{
            }
          }
            xmlhttp.open("POST","set_slctd_pic.php?"+conts,true);
            xmlhttp.send();
}
function showmy_pre_wall_pics()
{
      $("#targetdiv").html("Loading Please wait...");
    
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#targetdiv").html(xmlhttp.responseText);
            
           }else{
            }
          }
            xmlhttp.open("POST","showmy_pre_wall_pics.php?",true);
            xmlhttp.send();
}
function set_selected_wall_pic(as,c)
{
    var me=0;
    if(c==="me")
    {
        me=1;
    }
    var cont="q="+as+"&mes="+me;
     $("#targetdiv").html("<img src=\"icons/LoaderIcon.gif\" /><br/>Please wait ...");
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#targetdiv").html(xmlhttp.responseText);
             
           
           }else{
            }
          }
            xmlhttp.open("POST","set_slctd_wall_pic.php?"+cont,true);
            xmlhttp.send();
}
function changeback_pic()
{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#targetdiv").html(xmlhttp.responseText);
           
           }else{
            }
          }
            xmlhttp.open("POST","set_slctd_wall_pic.php?"+cont,true);
            xmlhttp.send();
}
function changeback_pic(c)
{
   var fileid="#for_back_img";
     var file_data = $(fileid).prop('files')[0]; 
     var fmd=new FormData();
     fmd.append('file',file_data);
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#updtbgpic").html(xmlhttp.responseText);
           
           }else{
            }
          }
            xmlhttp.open("POST","chng_back_img.php?",true);
            xmlhttp.send(fmd);
}
function chng_bgm()
{
         var filei="#for_bgm_updt";
     var file_dat = $(filei).prop('files')[0]; 
     var fmds=new FormData();
     fmds.append('file',file_dat);
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#updtbgm").html(xmlhttp.responseText);
           
           }else{
            }
          }
            xmlhttp.open("POST","chng_bgm.php",true);
            xmlhttp.send(fmds);
}

function change_prof_privacy(type,who_see)
{
       var cont="type="+type+"&who_see="+who_see;
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
            // alert(xmlhttp.responseText);
           
           }
          }
            xmlhttp.open("POST","chng_prf_prvcy.php?"+cont,true);
            xmlhttp.send();      
}