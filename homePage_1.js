/* 
    Created on : Jun 22, 2015, 11:19:43 AM
    Author     : Vijayakumar <vijayakumar at www.sedfed.com>
*/
function showPageStatus(){
    $('#pageLoadedStatus').animate({'width':'100%'});
    $('#SedFedVersion2Load').delay(300).fadeOut(1000);
}
function proceedForgotPass(){
    $('#SFFP_Content').text('New Password has been sent to your Email...Follow the steps mentioned in the Email');
}
function toggleLoginWindow(){
   // alert('');
    if($('#logins').css('left')==='0px'){
       // alert('');
        $('#logins').animate({'left':'100%'});
    }
    else{
        //alert('');
          $('#logins').animate({'left':'0px'});
    }
    // $('#SF_QuickSignUpWindow').animate({'left':'-2000px'});
    //toggleSignUpWindow();
}
function toggleSignUpWindow(){
    if($('#bottomSigntoggleBtn').text()==='Sign In'){
        $('#bottomSigntoggleBtn').text('Quick Sign Up');
    }
    else{
         $('#bottomSigntoggleBtn').text('Sign In');
    }
     if($('#logins').css('left')!=='2000px'){
     // alert('');
         $('#SF_QuickSignUpWindow').animate({'left':'0px'});
        $('#logins').animate({'left':'2000px'});
      
    }
    else{
        //alert($('#logins').css('left'));
          $('#logins').animate({'left':'0px'});
          $('#SF_QuickSignUpWindow').animate({'left':'-2000px'});
    }
   // $('#logins').animate({'left':'100%'});
    //toggleLoginWindow();
}
function pageBglike(){
    if($('#SF_BG_LikeBtn').text().trim()==='Like'){
        $('#SF_BG_LikeBtn').text('Liked');
        $('#SF_BG_LikeNo').text($('#SF_BG_LikeNo').text()-1+2);
    }
    else{
        $('#SF_BG_LikeBtn').text('Like');  
        $('#SF_BG_LikeNo').text($('#SF_BG_LikeNo').text()-2+1);
    }
}
function pageBgUnlike(){
    if($('#SF_BG_UnLikeBtn').text().trim()==='Unlike'){
        $('#SF_BG_UnLikeBtn').text('Unliked');
        $('#SF_BG_UnLikeNo').text($('#SF_BG_UnLikeNo').text()-1+2);
    }
    else{
        $('#SF_BG_UnLikeBtn').text('Unlike');  
        $('#SF_BG_UnLikeNo').text($('#SF_BG_UnLikeNo').text()-2+1);
    }
}