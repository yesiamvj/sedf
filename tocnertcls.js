/* 
    Created on : Mar 21, 2015, 7:23:11 PM
    Author     : Vijayakumar M <vijayakumar for www.sedfed.com>
*/
function mouseOnBody(sts){
     if(sts===0){
         $('#title_bar').css({'box-shadow':'1px -10px 30px 15px navy'});
    }
   else{
        $('#title_bar').css({'box-shadow':'1px -5px 2px 5px navy'});
   }
}
function mouseOntitleBar(statee){
    if(statee===1){
         $('#title_bar').css({'box-shadow':'1px -10px 30px 15px navy'});
    }
   else{
        $('#title_bar').css({'box-shadow':'1px -5px 2px 5px navy'});
   }
   
}
function mouseOnWU(sts){
    if(sts===1){
         $('#main-profile').css({'box-shadow': '0px 0px 9px 2px navy'});
    }
   else{
        $('#main-profile').css({'box-shadow': '0px 0px 79px 5px navy'});
   }
}
function myNameClicked(){
    $('#main-profile').toggle(sho(),hid());
    function sho(){
          //$('#main-profile').animate({left:'-300px'},'slow');
        $('#main-profile').css({left:'-300px'});
      
    }
    function hid(){
        $('#main-profile').animate({left:'0px'},'slow');
    }
}
function hideWhoThey(){
    $('#postDetails').blur();
}
function mouseOnProfile(sts){
    if(sts===1){
        $('#whatsOnDown').css({'display':'block',left:'0px'});
         $('#whatsOnTop').css({'display':'block',left:'0px'});
         $('#main-profile').css({'z-index':'2000',left:'0px'});
         
    }
    
    else{
         $('#whatsOnDown').css({'display':'none'});
          $('#whatsOnTop').css({'display':'none'});
         $('#main-profile').css({'z-index':'10'});
         var hidests=$('#p-op-hide').css('border-top-width');
          hidests=hidests.substring(1,0);
         if(hidests!=='0'){
             $('#main-profile').css({left:'-180px'});
         }
         else{
            // alert(hidests);
         }
         
    }
   
}
function whatsOnDown(){
    $('#main-profile').animate({'top':'-300px'},'slow');
  
}
function whatsOnTop(){
    $('#main-profile').animate({'top':'0px'},'slow');
}
function expandMenu(what){
    $(what).slideToggle();
    
}
function setProfBar(whattoDoo){
    if(whattoDoo==='hidenseek'){
        $('ul#about_mp>li#p-op-hide').css({ 'background-color':'crimson','border':'solid crimson','border-width':'2px 5px 2px 5px',color:'white'});
        $('ul#about_mp>li#p-op-neverHide').css({ 'background-color':'transparent','border':'solid transparent','border-width':' 0px 5px 0px 0px',color:'navy'});
        
         
    }
    else{
       $('ul#about_mp>li#p-op-neverHide').css({ 'background-color':'crimson','border':'solid crimson','border-width':' 1px 5px 0px 5px',color:'white'});
        $('ul#about_mp>li#p-op-hide').css({ 'background-color':'transparent','border':'solid whitesmoke','border-width':' 0px 5px 0px 0px',color:'navy'});
    }
}
function expandMenu(what,ico){
    $(what).slideToggle();
   if($(ico).css('transform')==='matrix(0, 1, -1, 0, 0, 0)')
   {
        $(ico).css({transform:'rotate(360deg)'});
   }
   else{
        $(ico).css({transform:'rotate(90deg)'});
   }
   
    
}
function applyProfTheme(thisCols){
    var themeColor=$(thisCols).css('background-color');
    
    var themeLetColor=$(thisCols).css('color');
    var curThmeColor=$('#main-profile').css('background-color');
    if(themeColor===curThmeColor){
        
        
   // alert(themeColor);
    $('#main-profile').css({'background-color':themeLetColor});
    $('#main-profile').css({'color':themeColor});
    $('li>a').css({'color':themeColor});
    $('ul>li:hover').css({'background-color':themeColor});
    }
    else{
        
   // alert(themeColor);
    $('#main-profile').css({'background-color':themeColor});
    $('#main-profile').css({'color':themeLetColor});
    $('li>a').css({'color':themeLetColor});
    $('ul>li:hover').css({'background-color':themeColor});
    }
   
    
    
    
}
function cusThmeChnge(sourcee,destee,mode){
    if(mode==='bc'){
         var coll=$(sourcee).val();
    $(destee).css({'background-color':coll});
    $('#main-profile').css({'background-color':coll});
    $('ul>li>a:hover').css({'background-color':'navy','color':'white'});
    }
    else{
        var coll=$(sourcee).val();
    $(destee).css({'background-color':coll});
    $('#main-profile').css({'color':coll});
    $('li>a').css({'color':coll});
    
    }
    
}
function customProfTheme(){
    $('#prof-custom-Theme').show();
    $('#cusThmeBCR').css({'background-color':'whitesmoke',color:'grey','border':'1px solid grey'});
     $('#cusThmeBC').css({'background-color':'navy',color:'grey','border':'1px solid grey'});
    
}
function closeCusThmeWin(){
    $('#prof-custom-Theme').hide();
    $('#main-profile').css({'background-color':'whitesmoke','color':'navy'});
     $('li>a').css({'color':'navy'});
     
}
function CusThmeOk(){
    $('#prof-custom-Theme').hide();
}
function closetip(what){
    $(what).slideUp();
    $('#decBackground').slideUp();
}
function ViewContent(what){
    $(what).slideToggle();
}
function ViewComment(id){
    $(id).slideToggle();
    
}
function mouseOnCmntAttch(whichh){
    if(whichh===2){
        $('.toolTipCmntAdd').show();
        $('.forCmntTtArrow').show();
        $('.toolTipCmntAdd').text(' Audio , Video , Picture .,');
    }
    if(whichh===1){
         $('.toolTipCmntAdd').show();
        $('.forCmntTtArrow').show();
        $('.toolTipCmntAdd').text(' Add a Smiley ');
    }
    if(whichh===3){
        $('.toolTipCmntAdd').hide();
        $('.forCmntTtArrow').hide();
    }
    
}
function showOptions(thisid){
      $('.forCmntTtArrowUtil').css({'display':'none'});
        $('.toolTipCmntUtils').css({'display':'none'});
    var cursts=$(thisid).css('display');
    if(cursts==='none'){
        $(thisid).css({'display':'inline-block'});
    }
    else{
        $(thisid).css({'display':'none'});
    }
}
function previewMedia(what){
    $('.postContentMain').css({'z-index':'100'});
     $('.decBackground').slideDown();
      $(what).slideDown().css({'z-index':'120'});
    var cmntHeight=$('.details').height();
    if(cmntHeight>450){
        $('.details').css({'overflow-y':'scroll'});
    }
    else{
        $('.details').css({'overflow-y':'hidden'});
    }
}
function FullpreviewMedia(what){
    $(what).slideDown().css({'z-index':'130'});
}
function whoAreThey(catogory){
    $('#postDetails').show();
          var cursts=$(catogory).css('display');
        
         
    if(cursts==='none'){
        $('.postRatings').css({'display':'none'});
         $('.postCommenters').css({'display':'none'});
         $('.postLikers').css({'display':'none'});
         $('.postShares').css({'display':'none'});
        $(catogory).css({'display':'inline-block'});
    }
    else{
        $('.postRatings').css({'display':'none'});
         $('.postCommenters').css({'display':'none'});
         $('.postLikers').css({'display':'none'});
          $('.postShares').css({'display':'none'});
        $(catogory).css({'display':'none'});
    }
}
function mouseOnPostDetCmnt(catogory,setvs,setcont,curcount,event){
    whoAreThey(catogory);
    mouseOnPostDet1(setvs,setcont,curcount,event);
}
function sftooltip(whatiscont){
   
}
function Likedone(binari,county,dests){
    if(binari===1){
       var curentt=$(dests).attr('src');
       if(curentt==='icons/post-sf-like.png'){
           county=county+1;
           $('.likeCount').text(county);
            $(dests).attr({'src':'icons/post-sf-liked.png'});
       }
       else{
            $('.likeCount').text(county);
           $(dests).attr({'src':'icons/post-sf-like.png'});
       }
    }
    else{
        var curentt=$(dests).attr('src');
       if(curentt==='icons/post-sf-unlike.png'){
           county=county+1;
           $('.unlikeCount').text(county);
            $(dests).attr({'src':'icons/post-sf-unliked.png'});
       }
       else{
           
           $('.unlikeCount').text(county);
           $(dests).attr({'src':'icons/post-sf-unlike.png'});
       }
    }
}
function postRated(i,county,forqp){
    var t;
    if(i===0){
      //  $(forqp).attr({'src':'icons/post-sf-emptyRate.png'});
        for(t=1;t<=5;t++){
            itemid='.rated'+t;
        itemsrc='icons/post-sf-emptyRate.png';
        $(itemid).attr({'src':itemsrc});
        }
    }
    else{
    var itemsrc='icons/post-rated-'+i+'.png';
    $(forqp).attr({'src':'icons/post-Qrated-'+i+'.png'});
    for(t=1;t<=5;t++){
    if(t<=i){
        $('.rateCount').text(county);
        var itemid='.rated'+t;
    $(itemid).attr({'src':itemsrc});
    }
    else{
        itemid='.rated'+t;
        itemsrc='icons/post-sf-emptyRate.png';
        $(itemid).attr({'src':itemsrc});
        //$(forqp).attr({'src':itemsrc});
        
    }
    }
    }
}
function colortyped(here,there){
    var cmnttxtcolor=$(here).val();
    $(there).css({'color':cmnttxtcolor});
}
function fileinserted(where){
    var tgh=$('.sf-commentInput').val()+'file';
    $('.sf-commentInput').val(tgh);
}
function mouseOnColorCmnt(plce){
    if(plce===1){
        $('.forCmntTtArrowUtil').css({'display':'inline-block','margin-left':'8px'});
        $('.toolTipCmntUtils').css({'display':'block'}).text(' Add a Color to Your Comment');
    }
    else{
         $('.forCmntTtArrowUtil').css({'display':'inline-block','margin-left':'48px'});
        $('.toolTipCmntUtils').css({'display':'block'}).text(' Attach a File or Smiley ');
    }
}
function mouseOutColorCmnt(plce){
    if(plce===1){
        $('.forCmntTtArrowUtil').css({'display':'none'});
        $('.toolTipCmntUtils').css({'display':'none'});
    }
    else{
        $('.forCmntTtArrowUtil').css({'display':'none'});
        $('.toolTipCmntUtils').css({'display':'none'});
    }
}
function mouseOnPostCap(event){
    
    $('.QuickPostAccess').css({'position':'absolute','left':event.clientX-220+'px'}).show();
}
function quickpostRateclk(srcid){
    var itemsrc;
    var prsntSrc=$(srcid).attr('src');
    if(prsntSrc==='icons/post-sf-emptyRate.png'){
         $(srcid).attr({'src':'icons/post-Qrated-1.png'});
        postRated(1,101);
       
    }
    else{
          for(i=0;i<=5;i++){
         itemsrc='icons/post-Qrated-'+i+'.png';
         if(itemsrc===prsntSrc){
            var i=i+1;
             if(i===6){
                 i=0;
                  $(srcid).attr({'src':'icons/post-sf-emptyRate.png'}); 
                  postRated(i,101); ///pay atttenetion when finish
                  break;
             }
             else{
                 postRated(i,101);
                  $(srcid).attr({'src':'icons/post-Qrated-'+i+'.png'});
                  break;
             }
           
             
         }
         
    }
    }  
}
function mouseOnPostDet1(makevs,setcont,curcount,event){
    curpos=event.clientX-215+'px';
    mouseOnPostDet(makevs,setcont,curcount,curpos);
}
function mouseOnPostDet(makevs,setcont,curcount,curpos){
    $(makevs).show();
    $(makevs).css({'left':curpos});

    $(setcont).text(curcount);
}
function mouseOnPostContent(showt1,showt2){
    var sts=$(showt1).css('display');
    if(sts==='none'){
      
        $(showt2).css({'padding-right':'14px','margin-top':'5px'}).show();
    }
    else{
         
          $(showt1).css({'padding-right':'18px','margin-top':'5px'}).show();
    }
   
}
function mouseOutPostContent(showt1,showt2){
    var sts=$(showt1).css('display');
    if(sts==='none'){
      
        $(showt2).css({'padding-right':'25px','margin-top':'5px'}).show();
    }
    else{
          $(showt1).css({'padding-right':'25px','margin-top':'5px'}).show();
    }
   
}
function mouseOnQPface(fullname,deste,makew,incop,showt){
    $(deste).text(fullname);
    $(incop).css({'opacity':'0.2'});
    $(showt).show();
    $(makew).css({'background-color':'white'});
}
function mouseOutQPface(decop){
    $(decop).css({'opacity':'0'});
    
}
function mouseOnQPsf(incop){
    $(incop).css({'opacity':0.85});
}
function mouseOutQPsf(decop){
    $(incop).css({'opacity':0.2});
}
function mouseOnQPDet(doth,showt){
    for(x=0;x<=4;x++){
        $(doth+x).show();    
    }
    
}
function mouseOutQPDet(doth){
     for(x=0;x<=4;x++){
        $(doth+x).hide();
    }
}
function mouseOnSFTag(showt){
    $(showt).show();
}
function mouseOutSFTag(halfname,deste,hidet1,hidet2){
   // $(deste).text(halfname);
    //$(hidet1).css({'background-color':'whitesmoke'});
    $(hidet1).hide();
    //$(hidet2).hide();
}
function mouseOnPostMainDet(showt,event,deste,cont){
  //alert(event.clientX);
   curpos=event.clientX-190+'px';
    $(showt).css({'display':'inline-block','left':curpos});
    $(deste).text(cont);
    
}
function showMorePostDet(hidet,showt){
    $(hidet).hide();
    $(showt).show();
}
function showSmeThngPost(thist,hidet){
    $(hidet).hide();
   var sts=$(thist).css('display');
  // alert(sts);
   if(sts==='none'){
        $(thist).css({'display':'inline-block','z-index':'100'});
   }
   else{
        $(thist).css({'display':'none'});
   }
  
}
function x_win_share(thist,thatt){
    
    if(document.getElementById(thist).checked===true){
                                        document.getElementById(thist).checked=false;
                                        $(thatt).slideUp();
                                    }
                                    else{
                                         document.getElementById(thist).checked=true;
                                         $(thatt).slideDown();
                                    }
                                    
}
/* For Creating New Post */
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
                alert("choose an image file");
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