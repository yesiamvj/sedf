/* 
    Created on : Aug 3, 2015, 11:07:25 PM
    Author     : Vijayakumar M
*/
function makeTestNotif(){
    $('#siteNotifBar').slideDown();
    $('#siteNotifBar').fadeIn().delay(2000).slideUp(2900);
}
function makeTestfloatNotif(){
    $('#floatedNotifBar').css({'left':'-4000px'}).show();
    $('#floatedNotif_1').css({'margin-left':'2500px'});
    $('#floatedNotifBar').animate({'left':'0px'},'slow');
    $('#floatedNotif_1').fadeIn().delay(175).animate({'margin-left':'0px'},'slow').delay(1575).animate({'margin-left':'2500px'},'slow');;
   
     $('#floatedNotifBar').delay(2200).animate({'left':'-5000px'},'slow');
    
    
}