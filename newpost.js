/* 
    Created on : May 21, 2015, 7:23:11 PM
    Author     : Vijayakumar M <vijayakumar for www.sedfed.com>
*/
/* For Creating New Post */

function nowupload()
{
  
  var usrcnt=0;
var allrel=0;
var allppl=0;
var friends=0;
var special=0;
var family=0;
var secret=0;
var showonlyto=0;
var hideto=0;
var enemy=0;
var inme=0;
var like=0;
var unlike=0;
var rate=0;
var dwnld=0;
var cmnt=0;
var share=0;

if(document.getElementById("resp1").checked===true)
{
    like=1;
}else
{
    like=0;
}
if(document.getElementById("resp2").checked===true)
{
    unlike=1;
}else
{
    unlike=0;
}
if(document.getElementById("resp3").checked===true)
{
    rate=1;
}else
{
    rate=0;
}
if(document.getElementById("resp4").checked===true)
{
    dwnld=1;

}else
{
    dwnld=0;
}
if(document.getElementById("resp5").checked===true)
{
    cmnt=1;
}else
{
    cmnt=0;
}
if(document.getElementById("resp6").checked===true)
{
    share=1;
}else
{
    share=0;
}
if(document.getElementById("incme").checked===true)
  {
     inme=1;
  }else
  {
     inme=0;
  }
 if(document.getElementById("enem").checked===true)
  {
     enemy=1;
  }else
  {
     enemy=0;
  }
  if(document.getElementById("pplslct1").checked===true)
  {
       showonlyto=1;
  }else
  {
     showonlyto=0;
  }
   if(document.getElementById("pplslct2").checked===true)
  {
       hideto=1;
  }else
  {
      hideto=0;
  }
   if(document.getElementById("frds").checked===true)
  {
       friends=1;
  }else
  {
      friends=0;
  }
   if(document.getElementById("fam").checked===true)
  {
       family=1;
  }else
  {
      family=0;
  }
   if(document.getElementById("sec").checked===true)
  {
       secret=1;
  }else
  {
      secret=0;
  }
   if(document.getElementById("spl").checked===true)
  {
       special=1;
  }else
  {
      special=0;
  }
   if(document.getElementById("allppls").checked===true)
  {
       allppl=1;
  }else
  {
      allppl=0;
  }
   if(document.getElementById("allrlns").checked===true)
  {
       allrel=1;
  }else
  {
       allrel=0;
  }
  var fmdt=new FormData();
 
  var bgclr=$("#NpSetPC-txtBGclrinp").val();
   
  
  var txtclr=$("#NpSetPC-txtclrinp").val();
  var wp_brdr_clr=$("#NpSetWP-txtBclrinp").val();
  var wp_bg_clr=$("#NpSetWP-txtBGclrinp").val();
 fmdt.append('cap_bg_clr',bgclr);
 fmdt.append('txt_clr',txtclr);
 fmdt.append('wp_brdr_color',wp_brdr_clr);
 fmdt.append('wp_txt_bg_clr',wp_bg_clr);
 
    var post_feelnow=$("#NpFeelWhileInp").val();
    var post_whilefeel=$("#NpFeelByInp").val();
    var post_location=$("#NpLocateInp").val();
    var useridcnt=$("#withpplcnt").val();
    var post_caption=$("#NewPostPreCap").html();
    if(post_caption.indexOf("<font")>0 || post_caption.indexOf("</font>"))
   var newp_cap=post_caption;
   var precap;
  while(newp_cap.indexOf("#")>0)
  {
    
   newp_cap=newp_cap.replace("#","");
  
  }
  
        var totlusrcnt=$("#chkalrdclkd").val();
   
   var myusers=$("#withpeoplediv").html();
      for(usrcnt=1;usrcnt<=totlusrcnt;usrcnt++)
    {
        var usrcls="#withuserid"+usrcnt;
    
        var mywithuserid=$(usrcls).val();

   
        var showid="#showuserid"+usrcnt;
     
        var hidid="#hiddeuserid"+usrcnt;
       
        var myhiddenuserid=$(hidid).val();
        if(showonlyto==1)
        {

        var myshowuserid=$(showid).val();
   
        }else{

        var myshowuserid=0;
   
        }
        if(hideto==1)
        {
            myhiddenuserid=$(hidid).val();
        }else{
          myhiddenuserid=0;
        }
        var file_id="";
      
    var post_contents="withusers="+myusers+"&showuser="+showonlyto+"&hideuser="+hideto+"&p_caption="+newp_cap+"&postfeel="+post_feelnow+"&postwhilefeel="+post_whilefeel+"&post_location="+post_location+"&allpeople="+allppl+"&allrelation="+allrel+"&friends="+friends+"&family="+family+"&special="+special+"&secret="+secret+"&enemy="+enemy+"&inclme="+inme+"&showonluusers="+myshowuserid+"&withusers="+mywithuserid+"&hiddenusers="+myhiddenuserid+"&usrcont="+usrcnt+"&likes="+like+"&unlikes="+unlike+"&rating="+rate+"&download="+dwnld+"&comment="+cmnt+"&share="+share+"&cap_bg_clr="+bgclr+"&txt_clr="+txtclr+"&wp_brdr_color="+wp_brdr_clr+"&wp_txt_bg_clr="+wp_bg_clr;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                alert(xmlhttp.responseText);
            }
        }
        xmlhttp.open("post", "uploadpostcon.php?"+post_contents, true);
        xmlhttp.send(fmdt);
        }
    
    
    
      
}

function publishmypost()
{
    
  nowupload();
  $(".subtpost").hide();
 var file_cnt=$("#myfile").prop('files').length;
 var mn=0;
  var fmd=new FormData();
  var file;
  var filid='#myfile';
  
 for(mn=0;mn<file_cnt;mn++)
 {
   file = $(filid).prop('files')[mn];   
  var types=$(filid).prop('files')[mn].name;
  if(types.indexOf('.png')>0 || types.indexOf('.gif')>0 || types.indexOf('.ico')>0 || types.indexOf('.jpg')>0 || types.indexOf('.jpeg')>0)
  {
         if(mn==0)
         {
                $("#for_tot_file_size").val('0');     
         }
      var src=$("#compimg"+(mn+1)+"").attr('src');

      fmd.append('img_src',src);
      fmd.append('img_name',types);
  }else
  {
         fmd.append('img_src','');
      fmd.append('img_name','');
   fmd.append('myfiles',file);
  alert(types);;
      
  }
   var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(e) {
         
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
               $("#for_test").html(xmlhttp.responseText);
            }
        }
        xmlhttp.open("post", "uploadpost.php?", true);
        xmlhttp.send(fmd); 
   
 }
   
}
function CrNwPostSetClrChnge(catgry,srce,dests,mod){
    var clrval=$(srce).val();
    $(dests).css({'background-color':clrval});
    if(catgry==='caption'){
        if(mod==='c'){
             $('#NpPostCaptionContTxt').css({color:clrval,'border':'none'});
        }
       else{
           $('#NpPostCaptionContTxt').css({'background-color':clrval,'border':'none'});
       }
    }
    if(catgry==='selectd'){
         var tgt=$('#NpAdvEdTgtTxtinp').val();
        tgt='#AdSpTxT-'+tgt;
                //alert(tgt);
        if(mod==='c'){
           
          
            $(tgt).css({'color':clrval});
        }
        else{
           
            $(tgt).css({'background-color':clrval});
        }
    }
    else{
        if(catgry==='whole'){
            if(mod==='c'){
                 $('#winNP-OutContainer').css({'border-color':clrval});
            }
           else{
                $('#createNewPostHolder').css({'background-color':clrval});
           }
        }
    }
}
/* advanced post */
function NpAdvChngeFormat(src1,src2,btntxt){
   // var normCap=$(src1).val();
   // var formatCap=$(src2).val();
    var btntext=$(btntxt).text();
   $('#NpAdv-Editor-inp').toggle();
   $('#NpAdv-Caption-Formt').toggle();
   //$(src1).val(formatCap);
   //$(src2).val(normCap);
   if(btntext==='Formatted Text'){
    $(btntxt).text('Normal Text');
  }
  else{
      $(btntxt).text('Formatted Text');
  }
   
}
function NpAdvSptxtinput(src1,desti,destii,sts)
{
   
    var tgt=$(src1).val();
    if(tgt!==''){
        
    
         var dests=$(desti).val();
    var desttxt=dests.replace(tgt,'<font style="color:red;" id="AdSpTxT-'+tgt+'" >'+tgt+'</font>');
        $(destii).val(desttxt);
    $('#NpAdvPreview-Main').html($(destii).val());
   
  
    }
    else{
        return;
    }
    
}
function NpAdvSTchangeThis(inp,targ,typee){
    if(typee==='clr'){
        
        var clrval=$(inp).val(); //get color value 
      
         var tgtid=$('#NpAdvEdTgtTxtinp').val(); //get specific text
        tgtid='AdSpTxT-'+tgtid; //prepare for id finding
       var formatText=$('#NpAdv-Caption-Formt').val(); //get formatted text
      
       var forId='" '+'id="'+tgtid+'"';//full id for replace
     
       var thisAim='color:'+clrval+';'; //color attribute to be added
      
       var finalVal=thisAim+forId; // text to be replaced
      
       formatText=formatText.replace(forId,finalVal); //replace function
       $('#NpAdv-Caption-Formt').val(formatText); // replace in formatted text
        $('#NpAdvPreview-Main').html($('#NpAdv-Caption-Formt').val()); //update preview
       
        
    }
    else{
        var clrval=$(inp).val(); //get color value 
      
         var tgtid=$('#NpAdvEdTgtTxtinp').val(); //get specific text
        tgtid='AdSpTxT-'+tgtid; //prepare for id finding
       var formatText=$('#NpAdv-Caption-Formt').val(); //get formatted text
      
       var forId='" '+'id="'+tgtid+'"';//full id for replace
     
       var thisAim='background-color:'+clrval+';'; //color attribute to be added
      
       var finalVal=thisAim+forId; // text to be replaced
      
       formatText=formatText.replace(forId,finalVal); //replace function
       $('#NpAdv-Caption-Formt').val(formatText); // replace in formatted text
        $('#NpAdvPreview-Main').html($('#NpAdv-Caption-Formt').val()); //update preview
    }
    
}
function DecorNewPost(inp,steil,disSteil){
   
      
         var tgtid=$('#NpAdvEdTgtTxtinp').val(); //get specific text
        tgtid='AdSpTxT-'+tgtid; //prepare for id finding
       var formatText=$('#NpAdv-Caption-Formt').val(); //get formatted text
      var thisAim;
       var forId='" '+'id="'+tgtid+'"';//full id for replace
       if(document.getElementById(inp).checked===true){
            thisAim=steil+';';
       }
       else{
            thisAim=disSteil+';';
       }
        // attribute to be added
      
       var finalVal=thisAim+forId; // text to be replaced
      
       formatText=formatText.replace(forId,finalVal); //replace function
       $('#NpAdv-Caption-Formt').val(formatText); // replace in formatted text
        $('#NpAdvPreview-Main').html($('#NpAdv-Caption-Formt').val()); //update preview
}
function DecorTemp(inp,steil,disSteil){
    var fval=steil-1+15;
    fval=fval+'px';
    DecorNewPost('NpAdvEd-DTxtSz','font-size:'+fval,'font-size:14px');
}
function NpAdvEd_TxtShdw(enble,value,mode){
   
    var tgtid=$('#NpAdvEdTgtTxtinp').val(); //get specific text
        tgtid='AdSpTxT-'+tgtid; //prepare for id finding
       var formatText=$('#NpAdv-Caption-Formt').val(); //get formatted text
      var thisAim;
       var forId='" '+'id="'+tgtid+'"';
    if(mode==='initial'){
         //full id for replace
       if(document.getElementById(enble).checked===true){
           $('#NpAdvEd-Decor-TxtShdw').slideDown();
            thisAim='text-shadow:0px 0px 1px ;';
            $('#NAED-txtSh-hz').val(0);
            $('#NAED-txtSh-vr').val(0);
            $('#NAED-txtSh-int').val(1);
             $('#NpAdv-txtShdwClrinp').val($('#'+tgtid).css('color'));
            $('#NpAdv-txtShdwClr').css({'background-color':$('#'+tgtid).css('color')});
            //alert($('#NAED-txtSh-hz').val());
       }
       else{
           $('#NpAdvEd-Decor-TxtShdw').slideUp();
            thisAim='text-shadow:none;';
             $('#NAED-txtSh-hz').val(0);
            $('#NAED-txtSh-vr').val(0);
            $('#NAED-txtSh-int').val(0);
            $('#NpAdv-txtShdwClrinp').val($('#'+tgtid).css('color'));
            $('#NpAdv-txtShdwClr').css({'background-color':$('#'+tgtid).css('color')});
       }
        // attribute to be added
      var finalVal=thisAim+forId; // text to be replaced
      
       formatText=formatText.replace(forId,finalVal); //replace function
       $('#NpAdv-Caption-Formt').val(formatText); // replace in formatted text
        $('#NpAdvPreview-Main').html($('#NpAdv-Caption-Formt').val()); //update preview
      
    }
    else{
        if(mode==='clr'){
            $('#NpAdv-txtShdwClr').css({'background-color':$('#NpAdv-txtShdwClrinp').val()});
        }
            thisAim='text-shadow:'+$('#NAED-txtSh-hz').val()+'px '+$('#NAED-txtSh-vr').val()+'px '+$('#NAED-txtSh-int').val()+'px '+ $('#NpAdv-txtShdwClrinp').val()+';';
        
        var finalVal=thisAim+forId; // text to be replaced
      
       formatText=formatText.replace(forId,finalVal); //replace function
       $('#NpAdv-Caption-Formt').val(formatText); // replace in formatted text
        $('#NpAdvPreview-Main').html($('#NpAdv-Caption-Formt').val()); //update preview
    }
    
     
}
function NpAdvEd_Border(modee,destee,sours){
    
     var tgtid=$('#NpAdvEdTgtTxtinp').val(); //get specific text
        tgtid='AdSpTxT-'+tgtid; //prepare for id finding
       var formatText=$('#NpAdv-Caption-Formt').val(); //get formatted text
      var thisAim;
       var forId='" '+'id="'+tgtid+'"';
    if(modee==='initial'){
         //full id for replace
       if(document.getElementById('NpAdvEd-bord-chk').checked===true){
           $('#NpAdvEd-Decor-BxShdw').slideDown();
          thisAim='border:1px solid '+$('#'+tgtid).css('color')+';';
          $('#NpAdvEd-Decor-Bord-size').val(1);
          $('#NpAdvEd-BordStyle').val('solid');
          $('#NpAdv-BodrT').css({'background-color':$('#'+tgtid).css('color')});
          $('#NpAdv-BodrR').css({'background-color':$('#'+tgtid).css('color')});
          $('#NpAdv-BodrB').css({'background-color':$('#'+tgtid).css('color')});
          $('#NpAdv-BodrL').css({'background-color':$('#'+tgtid).css('color')});
       }
       else{
            $('#NpAdvEd-Decor-BxShdw').slideUp();
            thisAim='border:none;';
       }
        // attribute to be added
      var finalVal=thisAim+forId; // text to be replaced
      
       formatText=formatText.replace(forId,finalVal); //replace function
       $('#NpAdv-Caption-Formt').val(formatText); // replace in formatted text
        $('#NpAdvPreview-Main').html($('#NpAdv-Caption-Formt').val()); //update preview
      
    }
    else{
        if(modee==='clr'){
               $(destee).css({'background-color':$(sours).val()});
           }
           thisAim='border:'+ $('#NpAdvEd-BordStyle').val()+' '+$('#NpAdvEd-Decor-Bord-size').val()+'px ;border-radius : '+$('#NpAdvEd-Decor-Bord-rad').val()+'px ;'+'border-color:'+$('#NpAdv-BodrTinp').val()+' '+$('#NpAdv-BodrRinp').val()+' '+$('#NpAdv-BodrBinp').val()+' '+$('#NpAdv-BodrLinp').val()+' ;';
           
        var finalVal=thisAim+forId; // text to be replaced
      
       formatText=formatText.replace(forId,finalVal); //replace function
       $('#NpAdv-Caption-Formt').val(formatText); // replace in formatted text
        $('#NpAdvPreview-Main').html($('#NpAdv-Caption-Formt').val()); //update preview
    }
    
}
function NpAdvEd_BoxShdw(enble,value,mode){
   
    var tgtid=$('#NpAdvEdTgtTxtinp').val(); //get specific text
        tgtid='AdSpTxT-'+tgtid; //prepare for id finding
       var formatText=$('#NpAdv-Caption-Formt').val(); //get formatted text
      var thisAim;
       var forId='" '+'id="'+tgtid+'"';
    if(mode==='initial'){
         //full id for replace
       if(document.getElementById(enble).checked===true){
           $('#NpAdvEd-Decor-BoxShdw').slideDown();
            thisAim='box-shadow:0px 0px 1px 0px;';
            $('#NAED-BoxSh-hz').val(0);
            $('#NAED-BoxSh-vr').val(0);
            $('#NAED-BoxSh-int').val(1);
            $('#NAED-BoxSh-Blur').val(0);
             $('#NpAdv-BoxShdwClrinp').val($('#'+tgtid).css('color'));
            $('#NpAdv-BoxShdwClr').css({'background-color':$('#'+tgtid).css('color')});
            //alert($('#NAED-txtSh-hz').val());
       }
       else{
            $('#NpAdvEd-Decor-BoxShdw').slideUp();
            thisAim='box-shadow:none;';
             $('#NAED-BoxSh-hz').val(0);
            $('#NAED-BoxSh-vr').val(0);
            $('#NAED-BoxSh-int').val(0);
            $('#NpAdv-BoxShdwClrinp').val($('#'+tgtid).css('color'));
            $('#NpAdv-BoxShdwClr').css({'background-color':$('#'+tgtid).css('color')});
       }
        // attribute to be added
      var finalVal=thisAim+forId; // text to be replaced
      
       formatText=formatText.replace(forId,finalVal); //replace function
       $('#NpAdv-Caption-Formt').val(formatText); // replace in formatted text
        $('#NpAdvPreview-Main').html($('#NpAdv-Caption-Formt').val()); //update preview
      
    }
    else{
        if(mode==='clr'){
            $('#NpAdv-BoxShdwClr').css({'background-color':$('#NpAdv-BoxShdwClrinp').val()});
        }
            thisAim='box-shadow:'+$('#NAED-BoxSh-hz').val()+'px '+$('#NAED-BoxSh-vr').val()+'px '+$('#NAED-BoxSh-int').val()+'px '+$('#NAED-BoxSh-Blur').val()+'px '+ $('#NpAdv-BoxShdwClrinp').val()+';';
        
        var finalVal=thisAim+forId; // text to be replaced
      
       formatText=formatText.replace(forId,finalVal); //replace function
       $('#NpAdv-Caption-Formt').val(formatText); // replace in formatted text
        $('#NpAdvPreview-Main').html($('#NpAdv-Caption-Formt').val()); //update preview
    }
    
     
}
function NpAdvEd_applyAll(){
   
     var tgt=$('#NpAdvEdTgtTxtinp').val();
      var thisAim;
       var tgtid=$('#NpAdvEdTgtTxtinp').val(); //get specific text
        tgtid='AdSpTxT-'+tgtid; //prepare for id finding
       var formatText=$('#NpAdv-Caption-Formt').val(); //get formatted text
       //f(formatText);
     
       var forId='" '+'id="'+tgtid+'"';
    if(tgt!==''){
         
         var dests=$('#NpAdv-Editor-inp').val();
         //f(tgt);
    var desttxt=dests.replace(tgt,'<font style="" id="AdSpTxT-'+tgt+'" >'+tgt+'</font>');
        $('#NpAdv-Caption-Formt').val(desttxt);
    $('#NpAdvPreview-Main').html($('#NpAdv-Caption-Formt').val());
  
    }
    else{
        
    }
    thisAim='color:'+$('#NpSetST-txtclrinp').val()+';';
     
    thisAim=thisAim+'background-color:'+$('#NpSetST-txtBGclrinp').val()+';';
   
    if(document.getElementById('NpAdvEd-bold').checked===true){
        
        thisAim=thisAim+'font-weight:bold;';
       
    }
    else{
        
    }
    if(document.getElementById('NpAdvEd-india').checked===true){
         thisAim=thisAim+'font-style:italic;';
    }
    else{
        
    }
    if(document.getElementById('NpAdvEd-line').checked===true){
        thisAim=thisAim+$('#NpAdvEd-DecLine').val()+';';
    }
    else{
        
    }
    if(document.getElementById('NpAdvEd-DTxtSz').checked===true){
        var steil=$('#NpAdvEd-DecSize').val();
         var fval=steil-1+15;
    fval=fval+'px;';
    
        thisAim=thisAim+'font-size:'+fval;
    }
    else{
        
    }
    if(document.getElementById('NpAdvEd-Dec-TxtShdw').checked===true){
        thisAim=thisAim+'text-shadow:'+$('#NAED-txtSh-hz').val()+'px '+$('#NAED-txtSh-vr').val()+'px '+$('#NAED-txtSh-int').val()+'px '+ $('#NpAdv-txtShdwClrinp').val()+';';
                   
    }
    else{
        
    }
    if(document.getElementById('NpAdvEd-bord-chk').checked===true){
         
        thisAim=thisAim+'border:'+ $('#NpAdvEd-BordStyle').val()+' '+$('#NpAdvEd-Decor-Bord-size').val()+'px ;border-radius : '+$('#NpAdvEd-Decor-Bord-rad').val()+'px ;'+'border-color:'+$('#NpAdv-BodrTinp').val()+' '+$('#NpAdv-BodrRinp').val()+' '+$('#NpAdv-BodrBinp').val()+' '+$('#NpAdv-BodrLinp').val()+' ;';
       
    }
    else{
        
    }
    if(document.getElementById('NpAdvEd-Dec-BoxShdw').checked===true){
        
        thisAim=thisAim+'box-shadow:'+$('#NAED-BoxSh-hz').val()+'px '+$('#NAED-BoxSh-vr').val()+'px '+$('#NAED-BoxSh-int').val()+'px '+$('#NAED-BoxSh-Blur').val()+'px '+ $('#NpAdv-BoxShdwClrinp').val()+';';
    }
    else{
        
    }
    
    var finalVal=thisAim+forId; // text to be replaced
      
       formatText=formatText.replace(forId,finalVal); //replace function
       //f(formatText);
       
       $('#NpAdv-Caption-Formt').val(formatText); // replace in formatted text
        $('#NpAdvPreview-Main').html($('#NpAdv-Caption-Formt').val()); //update preview
        $('#NpAdv-Editor-inp').val($('#NpAdv-Caption-Formt').val());
}
function NpAdvDoneCustom(){
    //$('#NpPostCaptionContTxt').val($('#NpAdv-Editor-inp').val());
    $('#NpAdv-holder').slideUp();
}
function NpAdvOpenwindowForAdv(){
     $('#NpAdv-holder').slideDown();
     $("#post_cap_pre").text($('#NpPostCaptionContTxt').val());
      $('#NpAdv-Editor-inp').val($('#NpPostCaptionContTxt').val());
       $('#NpAdvPreview-Main').html($('#NpAdv-Editor-inp').val()); 
      $('#NpAdv-Caption-Formt').val(''); 
}
function NewPostExpand(sup,bgc){
    if(sup==='#NpFeelCont'){
        
        $('#NpLocateCont').hide();
        $('#NpWithCont').hide();
         
           $('#NpLocExpDiv').css({'background-color':'white'});
      $('#NpWithExpDiv').css({'background-color':'white'});
      $(sup).slideToggle();
      if($(sup).css('height')==='1px'){
        $(bgc).css({'background-color':'whitesmoke'});
    }
    else{
        $(bgc).css({'background-color':'white'});
    }
    }
    if(sup==='#NpLocateCont'){
         
        $('#NpFeelCont').hide();
        $('#NpWithCont').hide();
         $('#NpFeelExpDiv').css({'background-color':'white'});
      $('#NpWithExpDiv').css({'background-color':'white'});
       $(sup).slideToggle();
      if($(sup).css('height')==='1px'){
        $(bgc).css({'background-color':'whitesmoke'});
    }
    else{
        $(bgc).css({'background-color':'white'});
    }
    }
    if(sup==='#NpWithCont'){
         
        $('#NpFeelCont').hide();
     $('#NpLocateCont').hide();
      $('#NpFeelExpDiv').css({'background-color':'white'});
      $('#NpLocExpDiv').css({'background-color':'white'});
      $(sup).slideToggle();
      if($(sup).css('height')==='1px'){
        $(bgc).css({'background-color':'whitesmoke'});
    }
    else{
        $(bgc).css({'background-color':'white'});
    }
    }
    
    
}

function NPaudiExpnd(bgc,sup){
    if(bgc==='#NPWCaudi'){
         
        $('#NPWCrespCont').hide();
       
         $('#NPWCresponse').css({'background-color':'white'});
     
       $(sup).slideToggle();
      if($(sup).css('height')==='1px'){
        $(bgc).css({'background-color':'whitesmoke'});
    }
    else{
        $(bgc).css({'background-color':'white'});
    }
    }
    if(bgc==='#NPWCresponse'){
         
        $('#NPWCaudiCont').hide();
     
      $('#NPWCaudi').css({'background-color':'white'});
      
      $(sup).slideToggle();
      if($(sup).css('height')==='1px'){
        $(bgc).css({'background-color':'whitesmoke'});
    }
    else{
        $(bgc).css({'background-color':'white'});
    }
    }
}


function NewPostPreview(){
    
       
    $("#winNpPostSettings").fadeOut();
    $("#JICHolderOut").fadeIn();
    alert($("#NpLocateInp").val());
    $("#for_show_location").text($("#NpLocateInp").val());
    $('#NewPostPreCap').html($('#NpAdv-Editor-inp').val());
    $('#NewPostEditorCont').toggle();
    var nt=0;
    $('#NewPostPreview').toggle();
     for(nt=1;nt<=6;nt++)
    {
        var imgid="resp"+nt;
        if(document.getElementById(imgid).checked===true)
        {
         
            
        }else{
             $(".response"+nt+"").hide();
        }
    }
     
}
function NewPostRetEdit(){
    $("#JICHolderOut").fadeOut();
      $("#winNpPostSettings").fadeIn();
      
     $('#NewPostEditorCont').toggle();
    
    $('#NewPostPreview').toggle();
  
    
}
   
/* for help window */
function openHelpWidow(divid){
    $(divid).slideDown();
}
function f(wtf){
    alert(wtf);
}
function secpos(event)
{
  
  if($('#myfile').val()) {
      $("#NpPostSubmit").hide();
      
            $(this).ajaxForm({ 
            
                beforeSubmit: function() {
                   
                  $("#progress-bar").width('0%');
                  
  
  $("#completepost").show();
                },
                uploadProgress: function (event, position, total, percentComplete){ 
                  $("#pbar").fadeIn();
                  
                    $("#pbar").width(percentComplete + '%');// $("#completepost").html("Success");
                    $("#completepost").html('Publishing ' + percentComplete +' %');
                },
                success:function (){
              $("#completepost").html('Success');
            
                },
            
            }); 
            return true; 
        }
}

