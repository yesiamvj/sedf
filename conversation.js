

function msgImgShow(id){
    if($(id).css('max-height')==='100px'){
         $(id).animate({'max-height':'300px','max-width':'300px'},'slow');
    }
    else{
         $(id).animate({'max-height':'100px','max-width':'100px'},'slow');
    }
   
}
