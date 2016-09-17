/* 
    Created on : Mar 21, 2015, 7:23:11 PM
    Author     : Vijayakumar M <vijayakumar for www.sedfed.com>
*/

function auot_refr()
{
       alert("s");
       
}
var cntfile=0;
  var gy=0;
  var rota=0;
 $(document).ready(function()
 {
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
        
          // $('#forcrtgrp').html(xmlhttp.responseText);

            }else{
                
            }
        }
       
    xmlhttp.open("GET","create_team.php",true);
    xmlhttp.send();
 });

$(document).ready(function()
{
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
        
             // $('#forcrtgrp').html(xmlhttp.responseText);

            }else{
                
            }
        }
       
    xmlhttp.open("GET","grpmsg.php",true);
    xmlhttp.send();
});
function rotateimage(a)
{
    rota=rota+90;
    var imgids="#"+a;
    $(imgids).css({"transform": "rotate("+rota+"deg)"});
}
function clkchkbox(a)
{ 

   if(a==1)
   {
    
     $("#selectppldiv").show();
    var curuser=$("#selectedpeople").html();
      $("#selectedppldiv").html(curuser);
   
     $("#wchpplwant").val("1");
     $("#selectpplspan").html("Search & Select People for say your Feelings<button id=\"selectpplclsbtn\" onclick=\"hideselectppldiv()\">X</button>");
          
 }else{
   if(a==2)
   {
     $("#selectppldiv").show();

        $("#selectpplspan").html("Search & Select People to remove People from selected list<button id=\"selectpplclsbtn\" onclick=\"hideselectppldiv()\">X</button>");
          $("#wchpplwant").val("2") ;
          var hidcuruser=$("#hiddenpeople").html();
      $("#selectedppldiv").html(hidcuruser);
    
     
 }else{
        if(a==3)
        {
           $("#selectppldiv").show();
          $("#selectpplspan").html(" Post with these people...<button id=\"selectpplclsbtn\" onclick=\"hideselectppldiv()\">X</button>");
          $("#wchpplwant").val("3") ;
          var withcuruser=$("#withpeoplediv").html();
      $("#selectedppldiv").html(withcuruser);
    
      
        }
    }  
 }
}
    
 function show_poster_details(poster_id,cnt,its_id)
 {
     $(its_id).fadeIn();
      $(its_id).html("Loading Please wait...");
     var det_cont="p="+poster_id+"&cnt="+cnt;
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
        
              $(its_id).html(xmlhttp.responseText);
            
            }else{
                
            }
        }
       
    xmlhttp.open("GET","poster_details.php?"+det_cont,true);
    xmlhttp.send();
 }
    
function hideselectppldiv(){
    $("#selectppldiv").fadeOut();
    
}
var fg=0;
function myfileupload(a)
{
var chk=0;
cntfile=0;
   for(fg=0;fg<a.files.length;fg++)
   {
       if(fg===0)
       {
            $('#justAddedCont').html('');
            $("#uploadimagesdiv").html('');
            $("#NewPostMediaCont").html('');
       }
     var filename = a.files[fg].name;
     var filetype=a.files[fg].type;
     
     if(filetype.indexOf("mage")>0)
     {
         
            chk=1;
            
     if (a.files && a.files[fg]) {
        gy=0;

                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(a.files[fg]);
                $("#NewPostMediaCont").html("");
            }
            else{
                alert("Please Choose a file to Upload ");
                
            } 
     }else{
       
       
         $('#justAddedCont').fadeIn();
        
           if(filetype.indexOf("udio")>0 )
           {
               chk=2;
                $('#justAddedCont').append('<div id="NpItsOtherFiles">\
                                                     <div id="JustAddFileDetail">\
                                                         <img id="NpJAvidicon" src="icons/audio-pre.png" /><div id="NPJAfType"></div> \
                                                           '+filename+'</div>\
                                                    <span id="myvideofile" style="display:none;"></span>\
                                                 </div>');
           }
     var vid1=filename.indexOf(".flv");
     var vid2=filetype.indexOf("ideo/");
   
     if(vid2>0 || vid2>0)
     {
         chk=3;
          $('#justAddedCont').append('<div id="NpItsOtherFiles">\
                                                     <div id="JustAddFileDetail">\
                                                         <img id="NpJAvidicon" src="icons/video-pre.png" /><div id="NPJAfType"></div> \
                                                           '+filename+'</div>\
                                                    <span id="myvideofile" style="display:none;"></span>\
                                                 </div>');
     }
     
            var pdf=filename.indexOf("pplication/pdf");
            if(pdf>0)
            {
                chk=4;
                 $('#justAddedCont').append('<div id="NpItsOtherFiles">\
                                                     <div id="JustAddFileDetail">\
                                                         <img id="NpJAvidicon" src="icons/pdf.png" /><div id="NPJAfType"></div> \
                                                           '+filename+'</div>\
                                                    <span id="myvideofile" style="display:none;"></span>\
                                                 </div>');
            }
     
       
          if(chk!==1 && chk!==2 && chk!==3 && chk!==4)
          {
              $('#justAddedCont').append('<div id="NpItsOtherFiles">\
                                                     <div id="JustAddFileDetail">\
                                                         <img id="NpJAvidicon" src="icons/ufile.png" /><div id="NPJAfType"></div> \
                                                           '+filename+'</div>\
                                                    <span id="myvideofile" style="display:none;"></span>\
                                                 </div>');
          }
         
     }
           
   }
     $("#tot_img_prev_cnt").val(cntfile);
  
}

    function imageIsLoaded(e) {
      
   
       var dfgh=e.target.result.indexOf("image");
        if(dfgh>0)
        {
            cntfile=cntfile+1;
           
         $("#tot_img_prev_cnt").val(cntfile);
            $("#uploadimagesdiv").append("&nbsp;&nbsp;&nbsp;<img src=\""+e.target.result+"\" id=\"srcimg"+cntfile+"\" class=\"NewPostJustAddedImg\"  &nbsp;&nbsp;&nbsp;>");
            $("#NewPostMediaCont").append("&nbsp;&nbsp;&nbsp;<img src=\""+e.target.result+"\" id=\"compimg"+cntfile+"\" class=\"\"  &nbsp;&nbsp;&nbsp;>");
            nowcompress();
        }
        
     
    }




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
function hideWhoThey(a)
{
    $(a).hide();
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
    var ajx=new XMLHttpRequest();
    ajx.onreadystatechange=function()
    {
        if(ajx.readyState===4 && ajx.readyState===200)
        {
            $("")
        }
    }

        ;
    
}

function closecmnt(a)
{
    var id="#forqckcmnt"+a;
    $(id).css({"opacity":"1"});
}
function viewprecmnt(a,postid,cnt)
{
    
         $(a).slideDown();

var cmnt_cont="postid="+postid+"&cnt="+cnt;

    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
        
              $(a).html(xmlhttp.responseText);

            }else{
                
            }
        }
       
    xmlhttp.open("GET","viewcmnt.php?"+cmnt_cont,true);
    xmlhttp.send();

        
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
function closetip(what,id){
    $(what).slideUp();
    $(id).slideUp();
}
function ViewContent(what){
    
          
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                document.getElementById("newpost").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","newpost.php?q="+"" ,true);
        xmlhttp.send();
}
function ViewComment(id){
    $(id).slideDown();
    
}
function mouseOnCmntAttch(whichh){
    if(whichh===2){
        $('#toolTipCmntAdd').show();
        $('#forCmntTtArrow').show();
        $('#toolTipCmntAdd').text(' Audio , Video , Picture .,');
    }
    if(whichh===1){
         $('#toolTipCmntAdd').show();
        $('#forCmntTtArrow').show();
        $('#toolTipCmntAdd').text(' Add a Smiley ');
    }
    if(whichh===3){
        $('#toolTipCmntAdd').hide();
        $('#forCmntTtArrow').hide();
    }
    
}
function showOptions(thisid){
      $('#forCmntTtArrowUtil').css({'display':'none'});
        $('#toolTipCmntUtils').css({'display':'none'});
    var cursts=$(thisid).css('display');
    if(cursts==='none'){
        $(thisid).css({'display':'inline-block'});
    }
    else{
        $(thisid).css({'display':'none'});
    }
}
function previewMedia(what,cnt,imgs){
    //postImagePreview
var btnid="postnextbtn"+cnt;
document.getElementById(btnid).click();
    $('#postContentMain').css({'z-index':'100'});
     $('#decBackground').slideDown();
      $(what).slideDown().css({'z-index':'120'});
    var cmntHeight=$('#details').height();
    if(cmntHeight>450){
        $('#details').css({'overflow-y':'scroll'});
    }
    else{
        $('#details').css({'overflow-y':'hidden'});
    }
}
function FullpreviewMedia(what){
    $(what).slideDown().css({'z-index':'130'});
}
function whoAreThey(what,divid,titl,postid,cnt){
    var myid="#postDetails"+cnt;
    $(myid).slideDown();
        
                        $(divid).slideDown(); 
                      

                            var myid="#usrsnames"+cnt;
                            var show_cnt="postid="+postid+"&like="+what;
                                var xmlhttp = new XMLHttpRequest();
                            
                        if(what==="like")
                        {
                            $(titl).html("These People Like this");
                             show_cnt="postid="+postid+"&like="+what;
                                 xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                
                                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {  
                                    $(myid).html(xmlhttp.responseText);
                                      }
                                }
                                xmlhttp.open("post", "showppl.php?"+show_cnt, true);
                                xmlhttp.send();

                        }
                        if(what==="unlike")
                        {
                            $(titl).html("These People Hate this");

                                xmlhttp.onreadystatechange = function() {
                                
                                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {  
                                    $(myid).html(xmlhttp.responseText);
                                      }
                                }
                                xmlhttp.open("post", "showppl.php?"+show_cnt, true);
                                xmlhttp.send();
                        }
                        if(what==="rate")
                        {
                            $(titl).html("These People Rated this");
                             show_cnt="postid="+postid+"&like="+what;
                                 xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                
                                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {  
                                    $(myid).html(xmlhttp.responseText);
                                      }
                                }
                                xmlhttp.open("post", "showppl.php?"+show_cnt, true);
                                xmlhttp.send();
                        }
                        if(what==="download")
                        {
                            $(titl).html("These People downloaded this");
                            show_cnt="postid="+postid+"&like="+what;
                                 xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                
                                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {  
                                    $(myid).html(xmlhttp.responseText);
                                      }
                                }
                                xmlhttp.open("post", "showppl.php?"+show_cnt, true);
                                xmlhttp.send();
                        }
                        if(what==="comment")
                        {
                            $(titl).html("These People commented this");
                            show_cnt="postid="+postid+"&like="+what;
                                 xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                
                                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {  
                                    $(myid).html(xmlhttp.responseText);
                                      }
                                }
                                xmlhttp.open("post", "showppl.php?"+show_cnt, true);
                                xmlhttp.send();
                        }
                        if(what==="share")
                        {
                            $(titl).html("These People Shared this");
                                    xmlhttp = new XMLHttpRequest();
                                xmlhttp.onreadystatechange = function() {
                                
                                    if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {  
                                    $(myid).html(xmlhttp.responseText);
                                      }
                                }
                                xmlhttp.open("post", "showppl.php?"+show_cnt, true);
                                xmlhttp.send();
                        }

}
function mouseOnPostDetCmnt(catogory,setvs,setcont,curcount,event){
    whoAreThey(catogory);
    mouseOnPostDet1(setvs,setcont,curcount,event);
}
function sftooltip(whatiscont){
   
}
var fn=0;
var s=0;
var pre_a;
function Likedone(a,dests,postid,cnt)
{
    fn=fn+1;
    var imgid="."+dests;
    if(fn>1)
    {
        fn=0;
    }
    s=s+1;
        if(s>1)
        {
            s=0;
        }
    if(a!==pre_a)
    {
       if(a===1)
       {
                if($(imgid).attr('src')==="icons/post-sf-liked.png")
                    {
                            fn=0;
                    }else
                    {
                        fn=1;
                    }
           
       }else
       {
                if($(imgid).attr('src')==="icons/post-sf-unliked.png")
                    {
                            s=0;
                    }else
                    {
                        s=1;
                    }
           
       }
            
    }
    pre_a=a;
                   
   if(a===1)
    {
        
        var lcont="like="+postid+"&cnt="+fn;
        var xmlhttp = new XMLHttpRequest();
        
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                if(fn===1)
                {
                    if($(imgid).attr('src')==="icons/post-sf-liked.png")
                    {
                        $(imgid).attr('src','icons/post-sf-like.png');
                    
                    }else
                    {
                        $(imgid).attr('src','icons/post-sf-liked.png');
                    
                    }
                    
                        
                }else
                {
                $(imgid).attr('src','icons/post-sf-like.png');
                    
                }
              }
        }
        xmlhttp.open("post", "like.php?"+lcont, true);
        xmlhttp.send();
        }
    
     if(a===0)
    {
        
        var img2id="."+dests;
        var ucont="unlike="+postid+"&ucnt="+s;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                
                if($(img2id).attr('src')==="icons/post-sf-unliked.png")
                {
                $(imgid).attr('src','icons/post-sf-unlike.png');
                    
                }else
                {
                $(imgid).attr('src','icons/post-sf-unliked.png');
                    
                }
              }
        }
        xmlhttp.open("post", "like.php?"+ucont, true);
        xmlhttp.send();
   }
}

function colortyped(here,there){
    var cmnttxtcolor=$(here).val();
    $(there).css({'color':cmnttxtcolor});
}
function fileinserted(where){
    var tgh=$('#sf-commentInput').val()+'file';
    $('#sf-commentInput').val(tgh);
}
function mouseOnColorCmnt(plce){
    if(plce===1){
        $('#forCmntTtArrowUtil').css({'display':'inline-block','margin-left':'8px'});
        $('#toolTipCmntUtils').css({'display':'block'}).text(' Add a Color to Your Comment');
    }
    else{
         $('#forCmntTtArrowUtil').css({'display':'inline-block','margin-left':'48px'});
        $('#toolTipCmntUtils').css({'display':'block'}).text(' Attach a File or Smiley ');
    }
}
function mouseOutColorCmnt(plce){
    if(plce===1){
        $('#forCmntTtArrowUtil').css({'display':'none'});
        $('#toolTipCmntUtils').css({'display':'none'});
    }
    else{
        $('#forCmntTtArrowUtil').css({'display':'none'});
        $('#toolTipCmntUtils').css({'display':'none'});
    }
}
function mouseOnPostCap(id,event){
    
    $(id).css({'position':'absolute','left':event.clientX-5+'px'}).show();
    
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
function mouseOnPostDet1(makevs,setcont,curcount,event,postid,rate){
   var curpos=event.clientX-0+'px';
    mouseOnPostDet(makevs,setcont,curcount,curpos,postid,rate);
}
function mouseOnPostDet(makevs,setcont,curcount,curpos,postid,rate){
    $(makevs).fadeIn();
    $(makevs).css({'left':curpos});

   
            var rt_cnt="postid="+postid+"&rate_cnt="+rate;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {  
              $(setcont).text(xmlhttp.responseText);
              }
        }
        xmlhttp.open("post", "show_cur_rate.php?"+rt_cnt, true);
        xmlhttp.send();
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
var nt=0;

function NewPostPreview(){
    
    $('#NewPostPreCap').html($('#NpPostCaptionContTxt').val());
    $('#NewPostEditorCont').toggle();
    
    $('#NewPostPreview').toggle();
   
}
function NewPostRetEdit(){
     $('#NeswPostEditorCont').toggle();
    
    $('#NewPostPreview').toggle();
    
}
   
    $(document).ready(function(){
        
            $("#myImg").hide();
         
    });

/* for help window */
function openHelpWidow(divid){
    $(divid).slideDown();
}

var qrt=0;
var pre=0;
var preclk=0;
 function postRated(clk,id,postid,cnt){

    
    if(clk==33)
    { if(pre!==cnt)
        {
            qrt=1;
          
        }

           qrt=qrt+1;
         qrt=preclk+1;
            
       preclk=qrt;
       
        pre=cnt;
        if(qrt>5)
        {
            qrt=1;
            preclk=1;
        }
    
         var rat=0;
    var rtimgid;


    for(rat=1;rat<=qrt;rat++)
    {
        rtimgid="."+cnt+"rated"+rat;
        
        rtpimgid="."+cnt+"rate"+rat;
        $(rtimgid).attr('src','icons/post-Qrated-'+qrt+'.png');
        
        $(rtpimgid).attr('src','icons/post-Qrated-'+qrt+'.png');
    }
     for(rat=qrt+1;rat<=5;rat++)
    {
        rtimgid="."+cnt+"rated"+rat;
         rtpimgid="."+cnt+"rate"+rat;
        
        $(rtimgid).attr('src','icons/post-sf-emptyRate.png');

        $(rtpimgid).attr('src','icons/post-sf-emptyRate.png');
    }
        var rt_cnt="postid="+postid+"&rate="+qrt;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {  
             
              }
        }
        xmlhttp.open("post", "rate.php?"+rt_cnt, true);
        xmlhttp.send();


    }else
    {
             var rat=0;

             preclk=clk;
    var rtimgid;
    for(rat=1;rat<=clk;rat++)
    {
        rtimgid="."+cnt+"rated"+rat;
        rtpimgid="."+cnt+"rate"+rat;
        $(rtimgid).attr('src','icons/post-Qrated-'+clk+'.png');

        $(rtpimgid).attr('src','icons/post-Qrated-'+clk+'.png');
    }
     for(rat=clk+1;rat<=5;rat++)
    {
        rtimgid="."+cnt+"rated"+rat;
         rtpimgid="."+cnt+"rate"+rat;
        
        $(rtimgid).attr('src','icons/post-sf-emptyRate.png');

        $(rtpimgid).attr('src','icons/post-sf-emptyRate.png');
    }
        var rt_cnt="postid="+postid+"&rate="+clk;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {   
                
              }
        }
        xmlhttp.open("post", "rate.php?"+rt_cnt, true);
        xmlhttp.send();
        
    }

   
   
}
function uploadcomment(postid,smiley,no,cnt)
{
    var teid="."+cnt+"sf-commentInput";
    var cmnt=$(teid).val();
    var clrid="."+cnt+"colorComment";
    var color=$(clrid).val();
    var update_id=".previousComments"+cnt;
  
       
    var client=new XMLHttpRequest();
    var fileid="#attachCmnt"+cnt;

     var file_data = $(fileid).prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    form_data.append('smiley',smiley);
      form_data.append('comment',cmnt);
      form_data.append('clr',color); 
    
      form_data.append('postid',postid);                          
    $.ajax({
                url: 'postcomment.php',  
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
                    var ids=".previousComments"+cnt;
                    $(ids).slideDown();
                    refresh_cmnt(postid,update_id,cnt);
                   
                     }
     });
  

}


function commentlike(a,dests,postid,cnt)
{
        if(a==1)
    {
        
        var imgid="."+dests;
        var rmvun="."+cnt+"sf-unlikeIcon"+postid;
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                $(imgid).attr('src','icons/post-sf-liked.png');
                $(rmvun).attr('src','icons/post-sf-unlike.png');
                
              
              }
        }
        xmlhttp.open("post", "commentlike.php?like="+postid, true);
        xmlhttp.send();
        }
    
     if(a==0)
    {

        var img2id="."+dests;
        var rmvimg="."+cnt+"sf-likeIcon"+postid;
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                 $(img2id).attr('src','icons/post-sf-unliked.png');
                 $(rmvimg).attr('src','icons/post-sf-like.png');
              }
        }
        xmlhttp.open("post", "commentlike.php?unlike="+postid, true);
        xmlhttp.send();
   }
}
function commentpostRated(clk,id,commentid,cnt)
{
       var rat=0;

    var rtimgid;
    for(rat=1;rat<=clk;rat++)
    {
        rtimgid="."+commentid+"rte"+rat+cnt;
        $(rtimgid).attr('src','icons/post-Qrated-'+clk+'.png');

    }
     for(rat=clk+1;rat<=5;rat++)
    {
        rtimgid="."+commentid+"rte"+rat+cnt;
        $(rtimgid).attr('src','icons/post-sf-emptyRate.png');
    }
        var rt_cnt="commetid="+commentid+"&rate="+clk;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {   
              }
        }
        xmlhttp.open("post", "commentrate.php?"+rt_cnt, true);
        xmlhttp.send();
        
}
 var dn=0;
function downloadpost(cnt,postid)
{
  dn=dn+1;
   
 var idmedia="PostPreviewMediaContent"+cnt;
var dwn_cont="postid="+postid+"&change="+dn+"&cont="+cnt
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                
               document.getElementById("likeresult").innerHTML=xmlhttp.responseText;
                var did="#totlcnt"+cnt;
    var totval=$(did).val();
alert(totval);
 for(dn=1;dn<=totval;dn++)
{
    var fid="file"+dn;
document.getElementById(fid).click();

}

              $("#likeresult").html(xmlhttp.responseText);
            }else{
            
            }
        }
       
    xmlhttp.open("GET","download.php?"+dwn_cont,true);
    xmlhttp.send();
    

 var did="#totlcnt"+cnt;
    var totval=$(did).val();

 for(dn=1;dn<=totval;dn++)
{
    var fid="file"+dn;
document.getElementById(fid).click();

}


}
var nx=0;
function nextpost(a,cnt,postid,its_id,tot_num_post)
{


var nx_ct="postid="+postid+"&cnt="+1+"&change="+a+"&cont="+tot_num_post;
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                if(a==0)
                {
                    
              $(its_id).prepend(xmlhttp.responseText);
                    
                }else
                {
              $(its_id).append(xmlhttp.responseText);
                    
                }
            }else{
                
            }
        }
       
    xmlhttp.open("GET","nextpost.php?"+nx_ct,true);
    xmlhttp.send();
  

}
var nxt;
var pre;
function nextcontent(a,div,postid,cnt)
{
    var idmedia="PostPreviewMediaContent"+cnt;
     document.getElementById(idmedia).innerHTML='<img src="icons/LoaderIcon.gif">';
              
        $('#postContentMain').css({'z-index':'100'});
     $('#decBackground').slideDown();
      $(div).slideDown().css({'z-index':'120'});
    var cmntHeight=$('#details').height();
    if(cmntHeight>450){
        $('#details').css({'overflow-y':'scroll'});
    }
    else{
        $('#details').css({'overflow-y':'hidden'});
    }

var totval=$("#totlcnt"+cnt+"").val();

if(a===0)
{
   nxt=nxt-1; 
   
}else{
    nxt=nxt+1; 
   }
if(pre!==cnt)
{
    nxt=1;
   
}
 pre=cnt;
 if(nxt>totval)
{
   
    nxt=totval;
}
 
if(nxt===0)
   {
    nxt=1;
   }
   if(a==="i1")
   {
       nxt=1;
       
   }
   if(a==="i2")
   {
       nxt=2;
       
   }
   if(a==="i3")
   {
       nxt=3;
   
       
   }
   if(a==="i4")
   {
       nxt=4;
   }    
    var next_cont="postid="+postid+"&cnt="+cnt+"&next="+nxt;
     
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
              $("#"+idmedia).html(xmlhttp.responseText);
              pre=cnt;
              
            }else{
           
            }
        }
       
    xmlhttp.open("GET","nextcontent.php?"+next_cont,true);
    xmlhttp.send();
}
function viewraters(raters,cnt,postid,that)
{
  
    
    var vr_cont="postid="+postid+"&rater="+raters;
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                $(that).slideToggle();
               $(that).html(xmlhttp.responseText);
              
            }else{
         
            }
        }
       
    xmlhttp.open("post","viewraters.php?"+vr_cont,true);
    xmlhttp.send();
    
}

function seemyposts()
{
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
               $("#TheWhatsUp").html(xmlhttp.responseText);
              
            }else{
         
            }
        }
       
    xmlhttp.open("post","myposts.php?",true);
    xmlhttp.send();
}

function chkseenmsg()
{
    //alert("fd");
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                $("#likeresult").html(xmlhttp.responseText);
            }
        }
        xmlhttp.open("post", "chkseenmsg.php", true);
        xmlhttp.send(); 
        
}

  
    setInterval(function()
    {
          chkseenmsg();
    },3000);
     


function checkonline()
{
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
               $(".Online_Live_In").html(xmlhttp.responseText);
            }
        }
        xmlhttp.open("post", "checkonline.php", true);
        xmlhttp.send(); 
}



   
    
    function updatelogintime()
    {
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
           
            }
        }
        xmlhttp.open("GET", "updatlogintim.php", true);
        xmlhttp.send();
    }
    
    setInterval(function(){
        updatelogintime();
    },2000);
   
    
    

$(document).ready(function()
{
      
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            
              $("#foronline").html(xmlhttp.responseText);
          
            }else{
                
            }
        }
         xmlhttp.open("GET","online.php",true);
    xmlhttp.send();

});

 $(document).ready(function()
{
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
 
           $("#fortaskbar").html(xmlhttp.responseText);
             
           }else{

            }
          }
            xmlhttp.open("POST","taskbar.php",true);
            xmlhttp.send();
});

function open_share_window(cnt,postid)
{
    
    var cont="cnt="+cnt+"&post_id="+postid;
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
 
           $("#for_share_widow").html(xmlhttp.responseText);
             
           }else{

            }
          }
            xmlhttp.open("POST","post_share_window.php?"+cont,true);
            xmlhttp.send();
}
function show_smileys(totl_cnt,post_id,its_id)
{
   
    var cont="cnt="+totl_cnt+"&post_id="+post_id;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
                
           $(its_id).html(xmlhttp.responseText);
           $(its_id).fadeToggle();
           }else{

            }
          }
            xmlhttp.open("POST","smiley_cmnt.php?"+cont,true);
            xmlhttp.send();
}
function refresh_cmnt(post_id,updt_id,cnt)
{
   
    var cont="p="+post_id+"&my="+cnt ;
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
                
           $(updt_id).prepend(xmlhttp.responseText);
           }else{

            }
          }
            xmlhttp.open("POST","cmnt_refresh.php?"+cont,true);
            xmlhttp.send();
}

function add_to_post_fav(post_id)
{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
                alert(xmlhttp.responseText);
           }else{

            }
          }
            xmlhttp.open("POST","add_to_post_fav.php?q="+post_id,true);
            xmlhttp.send();
}
function report_this_post(post_id)
{
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
                alert(xmlhttp.responseText);
           }else{

            }
          }
            xmlhttp.open("POST","report_post.php?q="+post_id,true);
            xmlhttp.send();
           
}
function like_thispage(page_id,btn)
{
       
           var cont="what="+1+"&admin="+3+"&page_id="+page_id+"&mylike="+0+"&myunlike="+0;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
                alert(xmlhttp.responseText);
                $(btn).html("Liked");
           }else{

            }
          }
            xmlhttp.open("POST","page_like.php?"+cont,true);
            xmlhttp.send();
}