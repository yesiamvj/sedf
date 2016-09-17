/* 
    Created on : Aug 1, 2015, 9:40:24 PM
    Author     : Vijayakumar M
*/

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
    $(otherPostIdwithPane).hide();
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
    $(thisPostIdwithRespPane).animate({'left':postRespCountPaneWidth});
     $('.ThePostSafetyLayerForResponders').animate({'left':'0px'});
    }
    else{
        $(thisPostIdwithRespPane).animate({'left':'-1000px'});
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
    $(thisPostIdwithRespPane).animate({'left':postRespCountPaneWidth});
     $('.ThePostSafetyLayerForResponders').animate({'left':'0px'});
    }
    else{
        $(thisPostIdwithRespPane).animate({'left':'-1000px'});
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
    $(thisPostIdwithRespPane).animate({'left':postRespCountPaneWidth});
     $('.ThePostSafetyLayerForResponders').animate({'left':'0px'});
    }
    else{
        $(thisPostIdwithRespPane).animate({'left':'-1000px'});
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
function shiftFloatFocusPostImg(curPostId,floatItmNo){
        var floatImgId="#PFloatImg"+floatItmNo+"_"+curPostId;
        var curPostFocusImg="#curPostFocusImg_PID_"+curPostId;
        var floatSrc=$(floatImgId).attr('src');
        var curImgSrc=$(curPostFocusImg).attr('src');
        $(floatImgId).attr({'src':curImgSrc});
        $(curPostFocusImg).attr({'src':floatSrc});
}