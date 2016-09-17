$(document).ready(function()
{
       show_allmessages();
});
function show_inbox()
{
      
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $(".tabContHold").html(xmlhttp.responseText).fadeIn();
           }
          };
            xmlhttp.open("POST","show_inbox.php?",true);
            xmlhttp.send();
}
function show_more_inbox_msgs(last_id)
{
      
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
               $("#show_more_inbox_msg").remove();
             $(".tabContHold").append(xmlhttp.responseText).fadeIn();
           }
          }
            xmlhttp.open("POST","show_more_inbox_msgs.php?last_id="+last_id,true);
            xmlhttp.send();
}
function show_sent_messages()
{
       
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $(".tabContHold").html(xmlhttp.responseText).fadeIn();
           }
          }
            xmlhttp.open("POST","show_sent_msgs.php?",true);
            xmlhttp.send();
}
function show_more_sent_msgs(last_id)
{
       
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
               $("#show_more_sent").remove();
             $(".tabContHold").append(xmlhttp.responseText).fadeIn();
           }
          }
            xmlhttp.open("POST","show_more_sent_msgs.php?last_id="+last_id,true);
            xmlhttp.send();
}
function show_deleted_msgs()
{
       
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
             $(".tabContHold").html(xmlhttp.responseText).fadeIn();
           }
          }
            xmlhttp.open("POST","show_deleted_msgs.php?",true);
            xmlhttp.send();
}
function show_more_delt_msgs()
{
       
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
               $("#show_more_delt").remove();
             $(".tabContHold").append(xmlhttp.responseText).fadeIn();
           }
          }
            xmlhttp.open("POST","show_more_delt_msgs.php?",true);
            xmlhttp.send();
}
function show_allmessages()
{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
              $(".tabContHold").html(xmlhttp.responseText).fadeIn();
           }
          }
            xmlhttp.open("POST","show_allmessages.php?",true);
            xmlhttp.send(); 
}
function show_more_all_msgs(last_id)
{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
              $(".tabContHold").append(xmlhttp.responseText).fadeIn();
           }
          }
            xmlhttp.open("POST","show_more_all_messages.php?last_id="+last_id,true);
            xmlhttp.send(); 
}