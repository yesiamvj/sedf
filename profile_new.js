/* 
    Created on : May 19, 2015, 8:19:49 PM
    Author     : Vijayakumar <vijayakumar at www.sedfed.com>
*/

var lastScrollTop = 0;
function meOnWallppr(){
    var imgSize=$('#img-wallpaper').width();
   
        
        $('#img-wallpaper').animate({'left':'0px'},'slow');
        $('#sf-wallpprHoldr').animate({'left':'-460px'},'slow');
    
}
function setWallpaper(){
   $('#sf-wallpprHoldr').animate({'left':'0px'});
    var imgSize=$('#img-wallpaper').width();
    imgSize=imgSize-1;
    imgSize=imgSize+100;
    imgSize='-'+imgSize+'px';
    
    $('#img-wallpaper').animate({'left':imgSize},'fast');
    
}
function meOnProfile(){
    
}
function showComPeople(event,src){
    $('#commonNameIn').html($(src).html());
    $('#whoAreCommonNames').show().css({'top':event.pageY+5,'left':event.pageX-15});
}
function expandMyMore(showt,tiltarr){
    $(showt).slideToggle();
    //alert($(tiltarr).css('transform'));
    if($(tiltarr).css('transform')==='matrix(1, 0, 0, 1, 0, 0)'){
        $(tiltarr).css({'transform':'rotate(90deg)'});
    }
    else{
        $(tiltarr).css({'transform':'rotate(0deg)'});
    }
}
function showMyFace(){
   if($('#myProfilePicOnWall img').css('max-height')==='150px'){
       $('#myProfilePicOnWall img').animate({'max-height':'450px','max-width':'450px','opacity':'1'},'slow');
   }
   else{
       $('#myProfilePicOnWall img').animate({'max-height':'150px','max-width':'150px','opacity':'0.5'},'slow');
   }
    
}
function showAvlothana(){
    $('#howThisPerson').toggle();
   
    /*var tiltarr='#img-avlothana';
    if($(tiltarr).css('transform')==='matrix(1, 0, 0, 1, 0, 0)'){
       $(tiltarr).css({'transform':'rotate(0deg)'});
    }
    else{
        
         $(tiltarr).css({'transform':'rotate(90deg)'});
    } */
}
function showMyExtra(showt,event){
   
    $(showt).toggle().css({'top':event.clientY-35});
    
}
function showMyExtraTip(showt,event){
    $(showt).show().css({'top':event.pageY-35});
}


function proposeMe(src,tarhtml,loverid,type){
  
  
  var xmlhttp = new XMLHttpRequest();
  var love_cont="lover="+loverid+"&type="+type;
      xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
              $("#TtPropCont").html(xmlhttp.responseText);
           }else{
      
            }
          }
            xmlhttp.open("POST","../web/proposeme.php?"+love_cont,true);
            xmlhttp.send();
    $('#TtPropCont').html(tarhtml).css({'line-height':'1.5'});
    $('.instantAlert').html(xmlhttp.responseText).show().animate({'margin-left':'0px'},'slow').animate({'opacity':'0'},10000);

}
function addToRelation(){
    var imgsrc=$('#img-makeRelation').attr('src');
 //   $('#img-makeRelation').attr({'src':'icons/prof-waiting.png'});
    if(imgsrc==='icons/prof-waiting.png'){
         $('#img-makeRelation').attr({'src':'icons/notif-add-ppl.png'});
         $('#hYT-relSts').text('No relation');
          $('#hYT-Tt-AddRelTtl').text('Add to Relation');
         $('#hyt-cont').text('Click to send a Request');
        
    }
    else{
         $('#img-makeRelation').attr({'src':'icons/prof-waiting.png'});
          $('#hYT-relSts').text($('#data-relSts').text());
          $('#hYT-Tt-AddRelTtl').text('Request Sent');
         $('#hyt-cont').text('Please wait till he accepts your Request');
         
    }
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
                 // postRated(i,101); ///pay atttenetion when finish
                  break;
             }
             else{
                 //postRated(i,101);
                  $(srcid).attr({'src':'icons/post-Qrated-'+i+'.png'});
                  break;
             }
           
             
         }
         
    }
    }  
}
$(function(){
    $(window).on('scroll',function(){
        
        
       var qua= $('#myProfilePicOnWall img').css('opacity');
       qua=qua-0.11+0.2;
       $('#myProfilePicOnWall img').css({'opacity':qua});
     
      
    });
});

$(document).ready(
      function(){
          var elementPosition = $('#fgy').offset();
          var elementPositionProf = $('#profileImge_Static').offset();
          var elementPositionName = $('#profileImge_Static').offset();
          var DetTtl_Edu =$('#DetTtl_Edu').offset();
          var DetTtl_Family =$('#DetTtl_Family').offset();
          var DetTtl_Locate =$('#DetTtl_Locate').offset();
          var DetTtl_Rels =$('#DetTtl_Rels').offset();
          
          var DetTtl_about =$('#DetTtl_about').offset();
        //  $('#img_focusProf').css({'min-height':'150px','min-width':'150px'});
          

$(window).scroll(function(){
        if($(window).scrollTop() > elementPosition.top+275){
           
            //fgy means wallpaper
            //$('#fgy').css({'position':'fixed','top':'0','height':'15%','width':'71.5%','left':'15%'});
            $('#fgy').css({'position':'fixed','top':'-42.5%','width':'70%','left':'15.75%','z-index':'100','box-shadow':' 0px 0px 10px #808080'});
         //disabled   $('#fgy').css({'position':'fixed','top':'0','height':'15%','width':'100%','left':'0%'});
           
            //$('.myFocusProfile_UserName').css({'position':'fixed','top':'4%','left':'35%'});
            $('.myFocusProfileDetails').css({'margin-top':'25%'});
             $('#currentInfo').css({'margin-top':'65%'});
        } else {
           
            $('#fgy').css({'position':'absolute','top':'0','height':'55%','width':'70.1%','left':'15.75%','z-index':'0','box-shadow':'none'});
            $('.myFocusProfileDetails').css({'margin-top':'40%'});
            $('.bg1 h2').css({'margin-top':'100px'});
           // $('.myFocusProfile_UserName').css({'position':'absolute','top':'45%','left':'35%'});
            $('#currentInfo').css({'margin-top':'75%'});
        }
        if($(window).scrollTop() > elementPositionName.top+75){
             $('#title_bar').slideUp().css({'position':'absolute'});
            //fgy means wallpaper
            //$('#fgy').css({'position':'fixed','top':'0','height':'15%','width':'71.5%','left':'15%'});
            
         //disabled   $('#fgy').css({'position':'fixed','top':'0','height':'15%','width':'100%','left':'0%'});
           
            $('.myFocusProfile_UserName').css({'position':'fixed','top':'2.5%','left':'39%'});
          //  $('.myFocusProfileDetails').css({'margin-top':'25%'});
          //   $('#currentInfo').css({'margin-top':'65%'});
        } else {
           // $('#fgy').css({'position':'absolute','top':'0','height':'55%','width':'71.5%','left':'15%'});
          //  $('.myFocusProfileDetails').css({'margin-top':'37%'});
             $('#title_bar').css({'position':'fixed'}).slideDown();
            $('.myFocusProfile_UserName').css({'position':'absolute','top':'45%','left':'35%'});
         //   $('#currentInfo').css({'margin-top':'75%'});
        }
        
        if($(window).scrollTop() > elementPositionProf.top-0){
            $('#img_focusProf').css({'position':'fixed','top':'0%'});
           $('#img_focusProf').css({'max-height':'-=5px','max-width':'-=5px','min-height':'125px','min-width':'125px'});
           // $('#profileImge_Static').css({'position':'fixed','top':'0','left':'2%'});
          //  $('#img_focusProf').css({'max-height':'125px','max-width':'125px'});
          
        } else {
            $('#img_focusProf').css({'position':'absolute','top':'11%','max-height':'200px','max-width':'200px'});
          /*  var height=$('#img_focusProf').css('height');
            height=height.replace('px','');
            height=height-1+1;
            //alert(height-1);
            if(height<200){
                 $('#img_focusProf').css({'min-height':'+=5px','min-width':'+=5px','max-height':'200px','max-width':'200px'});
            }
            */
        }
       
        putStaticTtl('#DetTtl_Edu','#DetTtl_Edu',DetTtl_Edu);
        putStaticTtl('#DetTtl_Edu','#DetTtl_Family',DetTtl_Family);
        putStaticTtl('#DetTtl_Family','#DetTtl_Locate',DetTtl_Locate);
        putStaticTtl('#DetTtl_Locate','#DetTtl_Rels',DetTtl_Rels);
        putStaticTtl('#DetTtl_Rels','#DetTtl_about',DetTtl_about);
       
        function putStaticTtl(prev,next,offsetEl){
            if($(window).scrollTop() > offsetEl.top+430){
            $(prev).css({'position':'static','width':'102%'});
            $(next).css({'position':'fixed','top':'12%','width':'67%'});
            $(next+' .profTypeTitleImg').css({'position':'absolute','right':'13px','margin-top':'-30px'});
        }
        else{
             $(next).css({'position':'static','width':'102%'});
             $(next+' .profTypeTitleImg').css({'position':'static','margin-top':'0px'});
        }
        }
        
        
        
        
        
        
        
        
        
        
        
         var st = $(this).scrollTop();
   if (st > lastScrollTop){
       // downscroll code
        var height=$('#img_focusProf').css('height');
            height=height.replace('px','');
            height=height-1+1;
          //  alert(height-1);
          if($('#img_focusProf').css('position')==='fixed'){
               if(height>125){
              // alert( $('#img_focusProf').css('min-height'));
               //  $('#img_focusProf').css({'max-height':'-=5px','max-width':'-=5px','min-height':'250px','min-width':'250px'});
            }
          }
           
       
   } else {
      // upscroll code
      var height=$('#img_focusProf').css('height');
            height=height.replace('px','');
            height=height-1+1;
           
          //  alert(height-1);
          
           if($('#img_focusProf').css('position')==='fixed'){
                  if(height<250){
               
               //  $('#img_focusProf').css({'min-height':'+=5px','min-width':'+=5px','max-height':'125px','max-width':'125px'});
            }
           }
         
            
   }
   lastScrollTop = st;
        
    
    
});
      })
        ;
        
function verifyppl(userid)
{
var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

                $("#iAmExist").show();
                $("#doVerify").hide();
                alert(xmlhttp.responseText);
           }else{
      
            }
          }
            xmlhttp.open("POST","../web/verifyppl.php?q="+userid,true);
            xmlhttp.send();
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
                 // postRated(i,101); ///pay atttenetion when finish
                  break;
             }
             else{
                 //postRated(i,101);
                  $(srcid).attr({'src':'icons/post-Qrated-'+i+'.png'});
                  break;
             }
           
             
         }
         
    }
    }  
}
$(function(){
    $(window).on('scroll',function(){
        
        
       var qua= $('#myProfilePicOnWall img').css('opacity');
       qua=qua-0.11+0.2;
       $('#myProfilePicOnWall img').css({'opacity':qua});
     
      
    });
});
function likeperson(a)
{

}
function addrelinprf(u,f)
{
       
       
    $("#targetReqst").html(f);
      $('#TheaterNewRel').fadeIn();
}
function add_rels_in_show_frds(username,f_name)
{
  
    var mys="first_name="+f_name+"&user_name="+username;
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#for_add_mem_in_showfrds").html(xmlhttp.responseText);
    
           }else{
             
            }
          }
            xmlhttp.open("POST","../web/new_request.php?"+mys,true);
            xmlhttp.send();
}
function addrelsinprfprcs(u,mn,tp,fn)
{
    
    var myname=$(mn).val();
 
    var type=$(tp).val();
  
    var mys="myname="+myname+"&uid="+u+"&type="+type+"&fn="+fn;
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $(".thtrPrcd").html(xmlhttp.responseText);
             
    $("#TheaterNewRel").fadeOut();
    
           }
          };
            xmlhttp.open("POST","../web/addrelsinprf.php?"+mys,true);
            xmlhttp.send();
}
function rmvcnctppl(uid,a)
{
    if(a===0)
    {
         $("#img-makeRelation").html("Add");
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
              
             $("#rmvcnct").html(xmlhttp.responseText);
    $('#TheaterNewRel').fadeOut(2000);

           }else{
             
            }
          }
            xmlhttp.open("POST","../web/rmvcnct.php?userid="+uid,true);
            xmlhttp.send(); 
    }
    if(a==1)
    {
          $("#img-makeRelation").html("Add");
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#rmvcnct").html(xmlhttp.responseText);
    $('#TheaterNewRel').fadeOut(2000);
           }else{
             
            }
          }
            xmlhttp.open("POST","../web/rmvreq.php?userid="+uid,true);
            xmlhttp.send();
    }
       
}


function openchengepic()
{
 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#chngppic").html(xmlhttp.responseText);
    
           }else{
             
            }
          }
            xmlhttp.open("POST","../web/chngpropic.php?",true);
            xmlhttp.send();
}
$(document).ready(function()
{
    $("#chngppicbtn").click(function()
    {
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#chngppic").html(xmlhttp.responseText);
             $('#chngppic').fadeIn();
           }else{
             
            }
          }
            xmlhttp.open("POST","../web/chngpropic.php",true);
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
            xmlhttp.open("POST","../web/myimgcrop.php?",true);
            xmlhttp.send();
    
  
}
function likethisperson(u)
{
    
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
  
             $("#forllktst").html(xmlhttp.responseText);
           }else{
             
            }
          };
            xmlhttp.open("POST","../web/likeperson.php?q="+u,true);
            xmlhttp.send();
    
}

function showwholiked(u)
{
     $("#wholiked").html("Loading...");
     $("#wholiked").fadeIn();
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
        
             $("#wholiked").html(xmlhttp.responseText);
           }else{
             
            }
          }
            xmlhttp.open("POST","../web/showwholiked.php?q="+u,true);
            xmlhttp.send();
}


function upldmyimg()
{
    
     var options =
        {
            imageBox: '.imageBox',
            thumbBox: '.thumbBox',
            spinner: '.spinner',
            imgSrc: 'avatar.png'
        }
        var reader = new FileReader();
      
            reader.onload = function(e) {
                options.imgSrc = e.target.result;
              
                cropper = new cropbox(options);
            }
            reader.readAsDataURL(this.files[0]);
            this.files = [];
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
            xmlhttp.open("POST","../web/myimgcrop.php?",true);
            xmlhttp.send();
}

//view_cmn_rels_prof.php
function show_my_common_rels(type,cnct)
{

         var conts="type="+type+"&q="+cnct;
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
            if(type==="Friends")
            {
             $(".for_cmn_frds").html(xmlhttp.responseText);
            }
            if(type==="Classmate")
            {
                 $(".for_cmn_cls").html(xmlhttp.responseText);
            }
            if(type==="Unknown")
            {
                 $(".for_cmn_un").html(xmlhttp.responseText);
            }
            if(type==="Enemies")
            {
                 $(".for_cmn_enm").html(xmlhttp.responseText);
            }
            
    
           }else{
             
            }
          }
            xmlhttp.open("POST","../web/view_cmn_rels_prof.php?"+conts,true);
            xmlhttp.send();
         
}
function report_fk_if(repotd_id)
{
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#reportFake").html(xmlhttp.responseText);
    
           }else{
             
            }
          }
            xmlhttp.open("POST","../web/report_fk_id.php?his_id="+repotd_id,true);
            xmlhttp.send();
}
function show_his_rels_prf(user_id,type)
{
   $('#peopleViewerWindow').fadeIn();
    if(type===1)
   {
       $("#frds_type_view").html("Friends");
   }
   if(type===2)
   {
       $("#frds_type_view").html("Enemies");
       
   }
    if(type===3)
   {
       $("#frds_type_view").html("Classmates");
       
   }
    if(type===4)
   {
       $("#frds_type_view").html("Unknown");
       
   }
   
   var conts="user_id="+user_id+"&type="+type;
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#wholePeopleItm").html(xmlhttp.responseText);
    
           }else{
             
            }
          }
            xmlhttp.open("POST","../web/show_his_rels_prf.php?"+conts,true);
            xmlhttp.send();
  
   
}
function likeperson(user_id,type,sum_id,img_src,img_icn,icn_src)
{
       var sum=$(sum_id).text();
       sum=sum-1+1;
       if(img_src.indexOf("ed")>0)
       {
             
      
              
       }else
       {
              $(sum_id).text(sum+1);
              $(img_icn).attr('src',icn_src);
       }
       var cont="profiler_id="+user_id+"&type="+type;
   var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
           
           }
          }
            xmlhttp.open("POST","../web/update_person_status.php?"+cont,true);
            xmlhttp.send();
}

function open_prof_pic_change()
{
       var cont="prof="+"in_prf";
          $('#chngppic').fadeIn();
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#chngppic").html(xmlhttp.responseText);
             $('#chngppic').fadeIn();
           }
          }
            xmlhttp.open("POST","../web/change_pic_edit_prof.php?"+cont,true);
            xmlhttp.send();  
}
function openchengepic()
{
         $('#chngppic').fadeIn();
 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#chngppic").html(xmlhttp.responseText);
    
           }else{
             
            }
          }
            xmlhttp.open("POST","../web/chngpropic.php?",true);
            xmlhttp.send();
}
function updtppic()
{
    
        $("#wchwantchng").val("1");
        var cont="prof="+"in_prof";
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#targetdiv").html(xmlhttp.responseText);
    
           }else{
             
            }
          }
            xmlhttp.open("POST","../web/img_crop_edit_prof.php?"+cont,true);
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
            xmlhttp.open("POST","../web/set_slctd_pic.php?"+conts,true);
            xmlhttp.send();
}
var n=0;
var pre=0;

function open_chat_wind(uid)
{
      
       $("#on_live_convrse").val("1");
   
     n=n+1;
    
        var tid=uid;
        
         
           var now="<div id=\"chatwinusr\" class=\"usrcw"+tid+"\"></div><input type=\"hidden\" value=\""+tid+"\" id=\"myonusrcnt"+n+"\" />";
       
     $("#forchatwindow").append(now); 
           var chkhd=$(".usrcw"+tid+"").html();
          
           if(chkhd!=="" )
           {
               $(".usrcw"+tid+"").fadeIn();
           }else
           {
                
           pre=tid;
           var msg_cont="id="+tid+"&cnt="+n;
         var xmlhttp = new XMLHttpRequest();
   
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                
                 $(".usrcw"+tid+"").html(xmlhttp.responseText);

             
            }
        }
         xmlhttp.open("GET","../web/chatwind.php?"+msg_cont,true);
    xmlhttp.send();
           }
      
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
            xmlhttp.open("POST","../web/showmyprepics.php?",true);
            xmlhttp.send();
}

function show_his_post(uid)
{
      
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $("#for_posts").html(xmlhttp.responseText);
            
           }
          };
            xmlhttp.open("POST","../web/people_post.php?q="+uid,true);
            xmlhttp.send();
}