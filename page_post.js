/* 
    Created on : Aug 10, 2015, 5:48:49 PM
    Author     : Vijayakumar M
*/
/* For Creating New Post */
function CrNwPostSetClrChnge(catgry,srce,dests,mod){
    var clrval=$(srce).val();
    $(dests).css({'background-color':clrval});
    if(catgry==='caption'){
        if(mod==='c'){
             $('#NpPostCaptionContTxt').css({color:clrval});
        }
       else{
           $('#NpPostCaptionContTxt').css({'background-color':clrval});
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
function NpAdvSptxtinput(src1,desti,destii,sts){
   
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
        if($('#NpAdv-Caption-Formt').val().length<1){
          
             $('#NpAdv-Editor-inp').val($('#NpPostCaptionContTxt').val());
            $('#NpAdvPreview-Main').html($('#NpAdv-Editor-inp').val());
        }
        
         
}
function NpAdvDoneCustom(){
    $('#NpPostCaptionContTxt').val($('#NpAdv-Editor-inp').val());
    $('#NpAdv-holder').slideUp();
}
function NpAdvOpenwindowForAdv(){
     $('#NpAdv-holder').slideDown();
     
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
    
    $('#NewPostPreCap').html($('#NpPostCaptionContTxt').val());
    $('#NewPostEditorCont').toggle();
    
    $('#NewPostPreview').toggle();
}
function NewPostRetEdit(){
     $('#NewPostEditorCont').toggle();
    
    $('#NewPostPreview').toggle();
    
}
    /* The uploader form */
    $(function () {
        $(":file").change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
            else{
               
            }
        });
    });

    function imageIsLoaded(e) {
        
        
    
        var dfgh=e.target.result.indexOf("image");
        
        if(dfgh>0)
        {
            $('#justAddedCont').show();
           $('#NewPostImgAdded').attr('src', e.target.result);
           $('#postPreviewImg').attr('src', e.target.result);
            $("#myImg").show();
        }
        else{
            $('#postPreviewImg'.hide());
            $('#NewPostVideo').attr('src',e.target.result).show();
             
        }
    };
    $(document).ready(function(){
        
            $("#myImg").hide();
         
    });

/* for help window */
function openHelpWidow(divid){
    $(divid).slideDown();
}
function f(wtf){
    alert(wtf);
}
function nowupload()
{
  
  var allrel=0;
var me=0;
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
if(document.getElementById("include_me").checked===true)
  {
     me=1;
  }
 
  
   if(document.getElementById("allrlns").checked===true)
  {
       allrel=1;
  }
var show_to_user=0;
var hide_to_user=0;
  if(document.getElementById("hide_to_user").checked===true)
  {
      hide_to_user=1;
  }
   if(document.getElementById("show_to_user").checked===true)
  {
       show_to_user=1;
  }
 
  var fmdt=new FormData();
 
  var bgclr=$("#NpSetPC-txtBGclrinp").val();
   
  
  var txtclr=$("#NpSetPC-txtclrinp").val();
 fmdt.append('cap_bg_clr',bgclr);
 fmdt.append('txt_clr',txtclr);
 
    var post_feelnow=$("#NpFeelWhileInp").val();
    var post_whilefeel=$("#NpFeelByInp").val();
    var post_location=$("#NpLocateInp").val();
  
    var post_caption=$("#NpAdv-Editor-inp").val();
  fmdt.append('post_caption',post_caption);
 
        var totlusrcnt=$("#chkalrdclkd").val();
   var usrcnt=0;
   var showonlyto=0;
   var hideto=0;
      for(usrcnt=1;usrcnt<=totlusrcnt;usrcnt++)
    {
        var usrcls="#withuserid"+usrcnt;
    
        var mywithuserid=$(usrcls).val();
       
        var showid="#show_only"+usrcnt;
     
        var hidid="#hide_to"+usrcnt;
       
        var myhiddenuserid=$(hidid).val();
        if(show_to_user===1)
        {

        var myshowuserid=$(showid).val();
    
        }else{

        var myshowuserid=0;
   
        }
        if(hide_to_user===1)
        {
            myhiddenuserid=$(hidid).val();
        }else{
          myhiddenuserid=0;
        }
    
    var post_contents="withusers="+'sd'+"&showuser="+show_to_user+"&hideuser="+hide_to_user+"&p_caption="+post_caption+"&postfeel="+post_feelnow+"&postwhilefeel="+post_whilefeel+"&post_location="+post_location+"&allpeople="+0+"&allrelation="+allrel+"&friends="+0+"&family="+1+"&special="+1+"&secret="+1+"&enemy="+1+"&inclme="+me+"&showonluusers="+myshowuserid+"&withusers="+mywithuserid+"&hiddenusers="+myhiddenuserid+"&usrcont="+usrcnt+"&likes="+like+"&unlikes="+unlike+"&rating="+rate+"&download="+dwnld+"&comment="+cmnt+"&share="+share+"&cap_bg_clr="+bgclr+"&txt_clr="+txtclr+"&wp_brdr_color="+"1"+"&wp_txt_bg_clr="+"1";
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
               
            }
        }
        xmlhttp.open("post", "../web/upload_page_postcon.php?"+post_contents, true);
        xmlhttp.send(fmdt);
        }
    
    
    
      
}
function clear_imgs(pic)
{
       var q1=pic.files[0].name.indexOf('/');
       var q2=pic.files[0].name.indexOf("'");
       var q3=pic.files[0].name.indexOf('""');
       var q4=pic.files[0].name.indexOf('\\');
       var q5=pic.files[0].name.indexOf('//');
  
       if(q1>-1 || q2>-1 || q3>-1 || q4>-1 || q5>-1)
       {
               
              $(pic).val('');
       }else
       {
             
       if(pic.files[0].type.indexOf('video')>-1)
      {
            $("#tumb_nail_img").fadeIn();
            $("#thumb_nail_id").fadeIn();
      }
       $("#comp_images").html('<input type="hidden" id="compressed_img1" value="hgh">');
       $("#tot_img_prev_cnt").val(1);
       $("#commonFileName").html(pic.files[0].name);
       }
    
}
function publishmypost()
{
        nowupload();
      $(".CNPH_finalCont").fadeIn();
    $(".CNPH_ProgressBar").html('<img src=\'../web/icons/LoaderIcon.gif\' />');
 
 
    upload_files();
}
function upload_files()
{
       var file_cnt=$("#tot_img_prev_cnt").val();
 var mn=0;
  var fmd=new FormData();
  
  var filid='#my_common_file';
  var thumb_nail=$("#thumb_nail_id").prop('files')[0];
   for(mn=0;mn<file_cnt;mn++)
 {     
       
      var src=$("#compressed_img"+mn).val();
     if(src.indexOf('image')>0)
     {
      fmd.append('img_src',src);
            
     }else
     {
            fmd.append('img_src','');
      
     }
   
       var myfile;
      if(mn===0)
      {
               myfile=$(filid).prop('files')[0];
   
      }else
      {
             myfile='';
  
      }
      fmd.append('img_name','');
      fmd.append('thumb_nail',thumb_nail);
  
   fmd.append('myfiles',myfile);
  
   var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(e) {
         
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
               $('.CNPH_ProgressBar').html(xmlhttp.responseText);
               $("#tot_img_prev_cnt").val("1");
               $("#new_post_hold").fadeOut();
            }
        };
        xmlhttp.open("post", "../web/upload_page_post.php?", true);
        xmlhttp.send(fmd); 
   
 }
}
function open_add_ppl_wind(bv)
{
       $('#selectedppldiv').html('');
       $("#which_ppl_u_want").val(bv);
          var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function(e) {
         
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
               $("#add_peole_wind").html(xmlhttp.responseText);
            }
        }
        xmlhttp.open("post", "../web/add_ppl_post.php?", true);
        xmlhttp.send(); 
   
}
var b=0;
function countme(img)
{
       b=b+1;
       $(img).attr('id','img_no'+b);
       var src=$(img).attr('src');
      $("#tot_img_prev_cnt").val(b);
      var finalImgSize=(src.length*7.4)/10024;
        finalImgSize=finalImgSize.toString().substring(0,6);
        var pre=$("#for_tot_file_size").val();
        pre=pre+1-1;
        var now=finalImgSize+1-1;
        var sum=pre+now;
        $("#for_tot_file_size").val(sum);
        
      $('#NPCQ_FileSize').text('File Size : '+sum+' Kb');
       
}
