/* 
    Created on : Jun 9, 2015, 11:57:36 PM
    Author     : Vijayakumar <vijayakumar at www.sedfed.com>
*/
function newMsgInput(){
   
    $('#newMsgPreview').fadeIn();
    $('#newMsgCurTxt').text($('#newMsgInp').val());
}
function newMsgInpBlur(){
    if($('#newMsgInp').val()===""){
        $('#newMsgPreview').fadeOut();
    }
}
function newMsgClr(){
     $('#newMsgPreview').fadeIn();
    $('#newMsgBGhold').css({'background-color':$('#newMsgBGClrinp').val()});
    $('#newMsgBG').css({'background-color':$('#newMsgBGClrinp').val()});
    $('#newMsgArw').css({'border-left-color':$('#newMsgBGClrinp').val()});
    $('#newMsgCurTxt').css({'color':$('#newMsgClrinp').val()});
    $('#newMsgInp').css({'color':$('#newMsgClrinp').val()});
    
}
function smiley(){
    $('#jjj').animate({'margin-left':'150px'},'slow').animate({'margin-left':'0px'},'slow');
}
function showSmiley(){
    $('#CopyRSmiley').fadeToggle();
    if($('#smileyWindow').css('display')==='none'){
        $('#smileyWindow').css({'display':'inline-block'}).fadeIn();
    }
    else{
        $('#smileyWindow').fadeOut();
    }
    
}
function addSmiley(imgsrc,imgnme){
    $('#newMsgMedia').append('<img class="sf_msg_smiley" onmouseover="smiley()" src="icons/smileys/'+imgsrc+'" alt="'+imgsrc+'" />');
}