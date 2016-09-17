function typingel(a)
{
    var dt="People can view this details on your Profile";
    var inp=$(a).val();
    $('#rh-srch').val(inp);
    $("#whatsrch").html(dt);
     $("#whatsrch").css('color','red');
}
$(document).ready(function(){
    $("button").click(function(){
        $("h3").hide();
    });
});