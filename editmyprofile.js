/* 
    Created on : Jun 2, 2015, 4:23:02 PM
    Author     : Vijayakumar <vijayakumar at www.sedfed.com>
*/
function thtrInput(src,trgt){
    $(trgt).val($(src).val());
}
function yearSelect(tgtid){
    var i=1951;
   $(tgtid).html('');
    for(i=1951;i<2012;i++){
        
        var preVal=$(tgtid).html();
        $(tgtid).html(preVal+'<option>'+i+'</option>');
    }
}
function dateSelect(tgtid){
     var i=1;
   $(tgtid).html('');
    for(i=1;i<31;i++){
        
        var preVal=$(tgtid).html();
        $(tgtid).html(preVal+'<option>'+i+'</option>');
    }
}
function ageInp(){
  
    var tgttxt=''+$('#inpTh_Date').val()+' '+ $('#inpTh_Mon').val()+' '+ $('#Th_ageYear').val();
    $('#inp_Age').val(2015-$('#Th_ageYear').val());
    $('#inp_DOB').val(tgttxt);
}
function relstsChnge(slct){
    $(slct).val();
}
function stsClrChnge(){
    $('#inp_thsts').css({'color':$('#th_stsclrinp').val()});
    $('#inp_status').css({'color':$('#th_stsclrinp').val()});
   
}