/* 
    Created on : Aug 1, 2015, 9:40:24 PM
    Author     : Vijayakumar M
*/


function show_more_post(post_id,tot_cnt)
{
       
       var cont="post_id="+post_id+"&tot_cnt="+tot_cnt;
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
	 $('.TheWhatsUpCenterCont').append(xmlhttp.responseText);
               
               
              }
        };
        xmlhttp.open("post", "../web/show_more_posts.php?"+cont, true);
        xmlhttp.send();
}

function pinItOnTop(curPostId){
    var pinnedCont="<a href=\"#ThisPostId_"+curPostId+"\"><div class=\"PagePinItm\" id=\"pin_id_"+curPostId+"\" >"+curPostId+"</div></a>";
    var olderPin=$('#pin_id_'+curPostId).text();
    
    if(olderPin.length!==curPostId.length){
        $('#pagepinnerid').append(pinnedCont);
    }
    else{
         $('#pin_id_'+curPostId).fadeOut().fadeIn();
    }
    $('#PagePinnerTitle').slideDown();
}
function hidePostResponders(){
    $('.ThePostPreviousResponders').animate({'left':'-1000px'});
    $('.ThePostSafetyLayerForResponders').animate({'left':'-1000px'});
}

function showPostRespPane(curPost){
    
     var otherPostIdwithPane=".ThePostRespDetHold:not(#PostResponsePane_PID_"+curPost+")";
    var thisPostIdwithPane=".ThePostRespDetHold#PostResponsePane_PID_"+curPost;
    var otherPostIdwithRespPane=".ThePostPreviousResponders:not(#Post_Likers_PID_"+curPost+")";
    //$(otherPostIdwithPane).hide();
   // $(otherPostIdwithRespPane).animate({'left':'-1000px'});
    $(thisPostIdwithPane).slideDown();
   
    
    
}

function showPostLikers(curPost){
    
    var thisPostIdwithRespPane=".ThePostPreviousResponders#Post_Likers_PID_"+curPost;
    if($(thisPostIdwithRespPane).css('left')==='-1000px'){
        var otherPostIdwithRespPane=".ThePostPreviousResponders:not(#Post_Likers_PID_"+curPost+")";
     $(otherPostIdwithRespPane).animate({'left':'-1000px'});
    var thisPostIdwithPane=".ThePostRespDetHold#PostResponsePane_PID_"+curPost;
    var postRespCountPaneWidth=$(thisPostIdwithPane).css('width');
    $(thisPostIdwithRespPane).slideToggle();
     $('.ThePostSafetyLayerForResponders').animate({'left':'0px'});
    }
    else{
       $(thisPostIdwithRespPane).slideToggle();
         $('.ThePostSafetyLayerForResponders').animate({'left':'-1000px'});
    }
   
    
}
function showPostRaters(curPost){
    
    var thisPostIdwithRespPane=".ThePostPreviousResponders#Post_Raters_PID_"+curPost;
    if($(thisPostIdwithRespPane).css('left')==='-1000px'){
        var otherPostIdwithRespPane=".ThePostPreviousResponders:not(#Post_Raters_PID_"+curPost+")";
     $(otherPostIdwithRespPane).animate({'left':'-1000px'});
    var thisPostIdwithPane=".ThePostRespDetHold#PostResponsePane_PID_"+curPost;
    var postRespCountPaneWidth=$(thisPostIdwithPane).css('width');
   $(thisPostIdwithRespPane).slideToggle();
     $('.ThePostSafetyLayerForResponders').animate({'left':'0px'});
    }
    else{
      $(thisPostIdwithRespPane).slideToggle();
         $('.ThePostSafetyLayerForResponders').animate({'left':'-1000px'});
    }
   
    
}
function showPostCommenters(curPost){
    
    var thisPostIdwithRespPane=".ThePostPreviousResponders#Post_Commenters_PID_"+curPost;
    if($(thisPostIdwithRespPane).css('left')==='-1000px'){
        var otherPostIdwithRespPane=".ThePostPreviousResponders:not(#Post_Commenters_PID_"+curPost+")";
     $(otherPostIdwithRespPane).animate({'left':'-1000px'});
    var thisPostIdwithPane=".ThePostRespDetHold#PostResponsePane_PID_"+curPost;
    var postRespCountPaneWidth=$(thisPostIdwithPane).css('width');
    $(thisPostIdwithRespPane).slideToggle();
     $('.ThePostSafetyLayerForResponders').animate({'left':'0px'});
    }
    else{
       $(thisPostIdwithRespPane).slideToggle();
         $('.ThePostSafetyLayerForResponders').animate({'left':'-1000px'});
    }
   
    
}
function showPostSharers(curPost){
    
    var thisPostIdwithRespPane=".ThePostPreviousResponders#Post_Sharers_PID_"+curPost;
    if($(thisPostIdwithRespPane).css('left')==='-1000px'){
        var otherPostIdwithRespPane=".ThePostPreviousResponders:not(#Post_Sharers_PID_"+curPost+")";
     $(otherPostIdwithRespPane).animate({'left':'-1000px'});
    var thisPostIdwithPane=".ThePostRespDetHold#PostResponsePane_PID_"+curPost;
    var postRespCountPaneWidth=$(thisPostIdwithPane).css('width');
    $(thisPostIdwithRespPane).animate({'left':postRespCountPaneWidth});
     $('.ThePostSafetyLayerForResponders').animate({'left':'0px'});
    }
    else{
        $(thisPostIdwithRespPane).animate({'left':'-1000px'});
         $('.ThePostSafetyLayerForResponders').animate({'left':'-1000px'});
    }
   
    
}

var pre;
 function postRated(clk,id,postid,cnt){
var qrt=0;
    var myr=$('#my_rate_cnt'+cnt).val();
    myr=myr-1+2;
    $('#cur_rate_cnt'+cnt).html(myr);
    for(rat=1;rat<=clk;rat++)
    {
           var rtimgid;
        rtimgid="#"+cnt+"rated"+rat;
       
        $(rtimgid).attr('src','icons/post-Qrated-'+clk+'.png');
        
    }
    var rat;
     for(rat=clk+1;rat<=5;rat++)
    {
        rtimgid="#"+cnt+"rated"+rat;
        
        $(rtimgid).attr('src','icons/post-sf-emptyRate.png');

      }
        aio_ajax2(0,'postid',postid,'rate',clk,'../web/rate.php','');
       


   
}
function uploadcomment(postid,smiley,no,cnt)
{
      
    var teid="#"+cnt+"sf-commentInput";
    var cmnt=$(teid).val();
    var clrid="#"+cnt+"colorComment";
    var color=$(clrid).val();
    var update_id="#previousComments"+cnt;
  
       
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
                url: '../web/postcomment.php',  
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
                    var ids="#previousComments"+cnt;
	    $(fileid).val('');
                    $(ids).slideDown();
                    refresh_cmnt(postid,update_id,cnt);
                   
                     }
     });
  

}

function put_cmnt(post_id,media)
{
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                
              }
        }
        xmlhttp.open("post", "../web/commentlike.php?like="+postid, true);
        xmlhttp.send();
}
function share_thispost(post_id,cnt)
{
      aio_ajax2(1,'post_id',post_id,'my','ns','../web/share_any_post.php','');
}
function commentlike(a,dests,postid,cnt)
{
     if(a===1)
    {
        var chk=$("#my_like_cnt").text();
        
        var imgid="#"+dests;
        var rmvun="#"+cnt+"sf-unlikeIcon"+postid;
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                $(imgid).attr('src','icons/post-sf-liked.png');
                $(rmvun).attr('src','icons/post-sf-unlike.png');
                
              
              }
        }
        xmlhttp.open("post", "../web/commentlike.php?like="+postid, true);
        xmlhttp.send();
        }
    
     if(a==0)
    {

        var img2id="#"+dests;
        var rmvimg="#"+cnt+"sf-likeIcon"+postid;
    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                 $(img2id).attr('src','icons/post-sf-unliked.png');
                 $(rmvimg).attr('src','icons/post-sf-like.png');
              }
        }
        xmlhttp.open("post", "../web/commentlike.php?unlike="+postid, true);
        xmlhttp.send();
   }
}
function commentpostRated(clk,id,commentid,cnt)
{
       var rat=0;

    var rtimgid;
    for(rat=1;rat<=clk;rat++)
    {
        rtimgid="#"+commentid+"rte"+rat+cnt;
        $(rtimgid).attr('src','icons/post-Qrated-'+clk+'.png');

    }
     for(rat=clk+1;rat<=5;rat++)
    {
        rtimgid="#"+commentid+"rte"+rat+cnt;
        $(rtimgid).attr('src','icons/post-sf-emptyRate.png');
    }
        var rt_cnt="commetid="+commentid+"&rate="+clk;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {   
              }
        }
        xmlhttp.open("post", "../web/commentrate.php?"+rt_cnt, true);
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

 for(dn=1;dn<=totval;dn++)
{
    var fid="file"+dn;
document.getElementById(fid).click();

}

              $("#likeresult").html(xmlhttp.responseText);
            }else{
            
            }
        }
       
    xmlhttp.open("GET","../web/download.php?"+dwn_cont,true);
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
       
    xmlhttp.open("GET","../web/nextpost.php?"+nx_ct,true);
    xmlhttp.send();
  

}
var nxt;
var pre;



function chkseenmsg()
{
    
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                $("#likeresult").html(xmlhttp.responseText);
            }
        }
        xmlhttp.open("post", "../web/chkseenmsg.php", true);
        xmlhttp.send(); 
        
}

  
   /* setInterval(function()
    {
          chkseenmsg();
    },3000);
     
*/

function checkonline()
{
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
               $(".Online_Live_In").html(xmlhttp.responseText);
            }
        }
        xmlhttp.open("post", "../web/checkonline.php", true);
        xmlhttp.send(); 
}



   
    
    function updatelogintime()
    {
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
           
            }
        }
        xmlhttp.open("GET", "../web/updatlogintim.php", true);
        xmlhttp.send();
    }
    
  /*  setInterval(function(){
        updatelogintime();
    },2000);
   
    */
 
function show_smileys(totl_cnt,post_id,its_id)
{
   
    var cont="cnt="+totl_cnt+"&post_id="+post_id;
    aio_ajax2(0,'cnt',totl_cnt,'post_id',post_id,'../web/smiley_cmnt.php',its_id);
       $(its_id).fadeToggle();
}
function refresh_cmnt(post_id,updt_id,cnt)
{
  
  var sum= $('.cmcnt'+cnt).text();
  sum=sum-1+1;
  
     aio_ajax2(3,'p',post_id,'my',cnt,'../web/cmnt_refresh.php',updt_id);
      
}

function add_to_post_fav(post_id)
{
       aio_ajax2(0,'','','q',post_id,'../web/add_to_post_fav.php','');
      
}

function report_this_post(post_id)
{
        aio_ajax2(0,'','','q',post_id,'../web/report_post.php','');
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
               
           }else{

            }
          }
            xmlhttp.open("POST","../web/report_post.php?q="+post_id,true);
            xmlhttp.send();
           
}

     var fn=0;
     var pre_a;
     var s=0;
function Likedone(a,dests,postid,cnt,which,me,pers_like)
{
   
                   
   if(a===1)
    {
           
           $(me).hide();
                    $("#like_"+which+"_icon_"+cnt).show();
	   var chk=$("#my_like_cnt").val();
	   if(chk==="1")
	   {
	          
	   }else
	   {
	          $("#my_like_cnt").text();
	   }
        
	      var curunLike=$('.like_cnt'+cnt).text()-1+1;
             
              $('#mainLikecnt_'+cnt).text(pers_like-1+2);
	       $('.like_cnt'+cnt).text(curunLike+1);
                    
        aio_ajax2(0,'post_id',postid,'like_or_inlike',a,'../web/like.php','');
        
        }
    
     if(a===0)
    {
              var curLike=$('.unlike_cnt'+cnt).text()-1+1;
	       $('.unlike_cnt'+cnt).text(curLike+1);
               $(me).hide();
                    $("#un_"+which+"_like"+cnt).show();
             
             $('#mainunLikecnt_'+cnt).text(pers_like-1+2);
         aio_ajax2(0,'post_id',postid,'like_or_inlike',a,'../web/like.php','');
       
   }
}

 function ViewComment(id,cnt,postid){
    $(id).slideToggle();
    $('#commentTitle'+cnt).click();
   
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
        };
       
    xmlhttp.open("GET","../web/viewcmnt.php?"+cmnt_cont,true);
    xmlhttp.send();

        
}

function showOptions(thisid){
       $(thisid).fadeToggle();
      /*$('#forCmntTtArrowUtil').css({'display':'none'});
        $('#toolTipCmntUtils').css({'display':'none'});
    var cursts=$(thisid).css('display');
    if(cursts!=='none'){
        $(thisid).css({'display':'inline-block'});
    }
    else{
        $(thisid).css({'display':'none'});
    }
    */
}
function auot_refr()
{
       if(typeof(EventSource)!=="undefined"){
              var sorc=new EventSource("../web/liveconvrs.php?q="+276+"&cnt="+3+"");
              sorc.onmessage=function(e){
	    $("#forliveconv"+276+"").prepend(""+e.data+"");
              };
       }else
       {
              $("#result").html("not support");
       }
}

function shiftFloatFocusPostImg(curPostId,floatItmNo){
        var floatImgId="#PFloatImg"+floatItmNo+"_"+curPostId;
        var curPostFocusImg="#curPostFocusImg_PID_"+curPostId;
        var floatSrc=$(floatImgId).attr('src');
        var curImgSrc=$(curPostFocusImg).attr('src');
        $(floatImgId).attr({'src':curImgSrc});
        $(curPostFocusImg).attr({'src':floatSrc});
}

function add_to_post_fav(post_id)
{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
                alertBigTt("Added");
           
           }
          };
            xmlhttp.open("POST","../web/add_to_post_fav.php?q="+post_id,true);
            xmlhttp.send();
}

 var dn=0;
function downloadpost(cnt,postid)
{
  dn=dn+1;
   
var dwn_cont="postid="+postid+"&change="+dn+"&cont="+cnt;
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                
               $("#dwnresult").html(xmlhttp.responseText);
                var did="#totlcnt"+cnt;
    var totval=$(did).val();

 for(dn=1;dn<=totval;dn++)
{
    var fid="file"+dn;
document.getElementById(fid).click();

}

              $("#likeresult").html(xmlhttp.responseText);
            }else{
            
            }
        }
       
    xmlhttp.open("GET","../web/download.php?"+dwn_cont,true);
    xmlhttp.send();
    

 var did="#totlcnt"+cnt;
    var totval=$(did).val();

 for(dn=1;dn<=totval;dn++)
{
    var fid="file"+dn;
document.getElementById(fid).click();

}


}
function show_more_comments(cmnt_id,cnt,post_id)
{
       var cont="cmnt_id="+cmnt_id+"&cnt="+cnt+"&postid="+post_id;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
	  $("#show_more_cmnt_btn").remove();
                $("#previousComments"+cnt+"").append(xmlhttp.responseText);
           }else{

            }
          }
            xmlhttp.open("POST","../web/show_more_cmnts.php?"+cont,true);
            xmlhttp.send();
}
var lik=0;
var ulik=0;

function showCommentsFunc(){
       $('#TheWhatsUpAuditorium .ThePostToppper').slideToggle();

       $('#TheWhatsUpAuditorium .ThePostArrow').toggle();
       $('#TheWhatsUpAuditorium .commentContentFull').slideToggle();
       }
 
     function showCommentsFunc(){
                                        $('#TheWhatsUpAuditorium .ThePostToppper').slideToggle();
                                       
                                        $('#TheWhatsUpAuditorium .ThePostArrow').toggle();
                                        $('#TheWhatsUpAuditorium .commentContentFull').slideToggle();
                                    }
		  
function makeTheaterSemiFullScreen(){
                              
                                if($('#isThtrFull').val()==='0'){
                                      
                                $('.ThePostToppper').animate({'top':'-25%'});
                                $('.ThePostArrow').hide();
                                $('.ThePostStatusHolder').animate({'bottom':'-25%'});
                                $('.ThePostRespDetHold').animate({'left':'-50%'});
                                $('#isThtrFull').val('1');
                                }
                                else{
                                   
                                $('.ThePostToppper').animate({'top':'0px'});
                                 $('.ThePostArrow').slideDown();
                                $('.ThePostStatusHolder').animate({'bottom':'0px'});
                                $('.ThePostRespDetHold').animate({'left':'0px'});
                                 $('#isThtrFull').val('0');
                                }
                              
                            }
	           
	           

function  makeTheaterImgZoomIn(post_id){
    
 $('#TheWhatsUpAuditorium .ThePostMediaHolder img').animate({'max-height':'+=100px','max-width':'+=100px'});
}

function  makeTheaterImgZoomOut(post_id){
 $('#TheWhatsUpAuditorium .ThePostMediaHolder img').animate({'max-height':'-=100px','max-width':'-=100px'});
}
function  makeTheaterImgZoomClr(post_id){
 $('#TheWhatsUpAuditorium .ThePostMediaHolder img').animate({'max-height':'95%','max-width':'80%'});
}
  function makeTheaterToolsVisible(){
                            $('.theaterPostDrivers').fadeIn();
                            $('.theaterPostDriverSafetyLayer').fadeOut().delay(300).fadeIn();
                        }
function hideTheaterTools(){
     $('.theaterPostDrivers').fadeOut();
    $('.theaterPostDriverSafetyLayer').fadeOut();
}  
var nxt=0;
var pre=0;
var preclk=0;
var bg=0;
var big_one;
function big_post_one(req1,req1_val,req2,req2_val,req3,req3_val,addr,result)
{
      
       bg=bg+1;
       if(bg>1)
       {
          big_one.abort();    
       }
          var fmdt=new FormData();
      fmdt.append(req1,req1_val);
     fmdt.append(req2,req2_val);
     fmdt.append(req3,req3_val);
       big_one=$.ajax({
                url: addr,  
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: fmdt,                         
                type: 'post',
                success: function(php_script_response){
                    $(result).html(php_script_response);
	
                     }
	    
     });
}
function showBigScreen(postId,totMedCont,curMedCont,nextPostId,tot_post_cnt){
       var targetPID=postId;
      
       big_post_one('post_id',targetPID,'med_n',curMedCont,'tot_cont',tot_post_cnt,'../web/bigpost.php','#trgt_div');
         
}
function showNextBigScreen(postId,totMedCont,curMedCont,nextPostId,t_p){
       
       var targetPID=postId;
       var targetMedCont;
       
       if(totMedCont>curMedCont){
             targetPID=postId;
             targetMedCont=curMedCont-1+2;
       }
       else{
              targetPID=nextPostId;
              targetMedCont=1;
       }
        big_post_one('post_id',targetPID,'med_n',targetMedCont,'tot_cont',t_p,'../web/bigpost.php','#trgt_div');
      
}
function showPrevBigScreen(postId,totMedCont,curMedCont,prevPostId,t_p){
       var targetPID=postId;
       var targetMedCont;
       var res=totMedCont-curMedCont;
       if(res==0 || curMedCont>1){
             targetPID=postId;
             targetMedCont=curMedCont-1;
       }
       else{
              targetPID=prevPostId;
              targetMedCont=1;
       }
      if(curMedCont==1){
             targetPID=prevPostId;
              targetMedCont=1;
      }
        big_post_one('post_id',targetPID,'med_n',targetMedCont,'tot_cont',t_p,'../web/bigpost.php','#trgt_div');
      
           
}