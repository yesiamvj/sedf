/* 
    Created on : Mar 21, 2015, 7:23:11 PM
    Author     : Vijayakumar M <vijayakumar for www.sedfed.com>
*/
var mg=0;
var ng;
function hideviewppl(m)
{
    if(m==1)
    {
        $("#someppldiv").hide();
    }
    if(m==2)
    {
        $("#exceptppldiv").hide();
    }
}
function viewppl(a)
{
    mg=mg+1;
    if(mg>1)
    {
        mg=0;
    }
    if(ng!==a)
    {
        mg=1;
    }
    if(mg==1)
    {
   if(a==1)
   {
       $("#someppldiv").slideDown(500);
   }
   if(a==2)
   {
      $("#exceptppldiv").slideDown(500);  
   }
   }else{
   if(a==1)
   {
       $("#someppldiv").slideUp(500);
   }
   if(a==2)
   {
      $("#exceptppldiv").slideUp(500);  
   } 
   }
   ng=a;
}
$(document).ready(function(){
    $("#colorstatus").change(function(){
        
        $("#myfeelingwords").css({"color":(this.value)});
    });
});
var n=0;
var k=0;
var cmt=0;
var dft=0;
function remember()
{ 
  var chkboxid="remeberchkbox";
     if(document.getElementById(chkboxid).checked===true)
     {
               document.getElementById(chkboxid).checked=false;
     }
     else{
                document.getElementById(chkboxid).checked=true;
         }
}
    /* The uploader form */
    $(function () {
        $("#bgmfile").change(function () {
          
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = audioIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
            else{
                alert("choose an audio file");
            }
        });
    });
    function audioIsLoaded(e) {
        $('#bgm').attr('src', e.target.result);
        var dfgh=e.target.result.indexOf("audio");
        if(dfgh>0)
        {
           
            $("#bgm").show();
        }
        else{
            $("#bgm").hide();
            alert("Please choose an audio file");
        }
    };
    $(document).ready(function(){
            $("#bgm").hide();
    });
   $(document).ready(function () {
   
    
        $("#smilyimgfile").change(function () {
          
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
            else{
                alert("choose an image file");
            }
        });
    });
    var sg=0;
    var sr=0;
    function imageIsLoaded(e) {
        sg=sg+1;
        if(sg>1)
        {
            sg=0;
        }
        
   var dt=$("#updatingstatus").html();
   var newstatus=dt;
   
  
   if(sg==1)
   {
       if(e.target.result.indexOf("image")>0)
        {
             $("#imgcnt").val(sg);
          var smilyandstatus=newstatus+"<img src=\""+e.target.result+"\" id=\""+sg+"\" class=\"addedimg\"> "; 
        $("#updatingstatus").html(smilyandstatus);
     
        }else{
            alert("Choose an Image file");
        }
        
    }
    };
    var dh=0;
      var ty=0;
function typemystatus(a)
{
   $("#myfeelingwords").html(a);
   
}
$(document).ready(function(){
    n=n+1;
  $("body").keydown(function(event){
        var key= event.which || event.keycode;
   
        if(key===7)
        {
            cmt=cmt+1;
            if(cmt>1)
            {
                cmt=0;
            }
            if(cmt==1)
            {
            $("#commentContentFull").slideDown(500);
        }else{
            $("#commentContentFull").slideUp(500);
        }
        }
        //userCmntFull
         if(key==8)
        {

            $("#previousComments").slideDown(500);
        }else{
            
        }
        
     if(key==7)
     {
         
         $("#likebtn2").attr('src','icons/post-sf-liked.png');
         $("#unlikebtn2").attr('src','icons/post-sf-unlike.png');
     }
     else{
         if(key==8)
     {
          $("#unlikebtn2").attr('src','icons/post-sf-unliked.png');
          $("#likebtn2").attr('src','icons/post-sf-like.png');
     }
 }
 var ipt=0;
 if(key==82)
 {
    k=k+1;
   if(dft!==7)
   {
     
    var imgid;
    var delt=0;
    if(k>5)
    {
        k=0;
       
        var delimgar=new Array();
        var delimgid;
        delimgar[0]="icons/post-sf-emptyRate.png";
        for(delt=1;delt<=5;delt++)
        {
            delimgid="#pstrated"+delt;
        $(delimgid).attr('src',delimgar[0]);
    }
    }
    for(ipt=1;ipt<=k;ipt++)
    {
        imgid="#pstrated"+ipt;
     
        var rates = new Array();
rates[0]="icons/post-sf-emptyRate.png";
rates[k] = "icons/post-rated-"+k+".png";
    $(imgid).attr('src',rates[k]);
     }
        
 }
 }
      
    })
});
function mouseOnBody(sts){
     if(sts===0){
         $('#title_bar').css({'box-shadow':'1px -10px 30px 15px navy'});
    }
   else{
        $('#title_bar').css({'box-shadow':'1px -5px 2px 5px navy'});
   }
}
function mouseOntitleBar(statee){
    if(statee===1){
         $('#title_bar').css({'box-shadow':'1px -10px 30px 15px navy'});
    }
   else{
        $('#title_bar').css({'box-shadow':'1px -5px 2px 5px navy'});
   }
   
}
function mouseOnWU(sts){
    if(sts===1){
         $('#main-profile').css({'box-shadow': '0px 0px 9px 2px navy'});
    }
   else{
        $('#main-profile').css({'box-shadow': '0px 0px 79px 5px navy'});
   }
}
function myNameClicked(){
    $('#main-profile').toggle(sho(),hid());
    function sho(){
          //$('#main-profile').animate({left:'-300px'},'slow');
        $('#main-profile').css({left:'-300px'});
      
    }
    function hid(){
        $('#main-profile').animate({left:'0px'},'slow');
    }
}
function hideWhoThey(){
    $('#postDetails').blur();
}
function mouseOnProfile(sts){
    if(sts===1){
        $('#whatsOnDown').css({'display':'block',left:'0px'});
         $('#whatsOnTop').css({'display':'block',left:'0px'});
         $('#main-profile').css({'z-index':'2000',left:'0px'});
         
    }
    
    else{
         $('#whatsOnDown').css({'display':'none'});
          $('#whatsOnTop').css({'display':'none'});
         $('#main-profile').css({'z-index':'10'});
         var hidests=$('#p-op-hide').css('border-top-width');
          hidests=hidests.substring(1,0);
         if(hidests!=='0'){
             $('#main-profile').css({left:'-180px'});
         }
         else{
            // alert(hidests);
         }
         
    }
   
}
function whatsOnDown(){
    
    $('#main-profile').animate({'top':'-350px'},'slow');
  
}
function whatsOnTop(){
    $('#main-profile').animate({'top':'0px'},'slow');
}
function expandMenu(what){
    $(what).slideToggle();
    
}
function setProfBar(whattoDoo){
    if(whattoDoo==='hidenseek'){
        $('ul#about_mp>li#p-op-hide').css({ 'background-color':'crimson','border':'solid crimson','border-width':'2px 5px 2px 5px',color:'white'});
        $('ul#about_mp>li#p-op-neverHide').css({ 'background-color':'transparent','border':'solid transparent','border-width':' 0px 5px 0px 0px',color:'navy'});
        
         
    }
    else{
       $('ul#about_mp>li#p-op-neverHide').css({ 'background-color':'crimson','border':'solid crimson','border-width':' 1px 5px 0px 5px',color:'white'});
        $('ul#about_mp>li#p-op-hide').css({ 'background-color':'transparent','border':'solid whitesmoke','border-width':' 0px 5px 0px 0px',color:'navy'});
    }
}
function expandMenu(what,ico){
    $(what).slideToggle();
   if($(ico).css('transform')==='matrix(0, 1, -1, 0, 0, 0)')
   {
        $(ico).css({transform:'rotate(360deg)'});
   }
   else{
        $(ico).css({transform:'rotate(90deg)'});
   }
   
    
}
function applyProfTheme(thisCols){
    var themeColor=$(thisCols).css('background-color');
    
    var themeLetColor=$(thisCols).css('color');
    var curThmeColor=$('#main-profile').css('background-color');
    if(themeColor===curThmeColor){
        
        
   // alert(themeColor);
    $('#main-profile').css({'background-color':themeLetColor});
    $('#main-profile').css({'color':themeColor});
    $('li>a').css({'color':themeColor});
    $('ul>li:hover').css({'background-color':themeColor});
    }
    else{
        
   // alert(themeColor);
    $('#main-profile').css({'background-color':themeColor});
    $('#main-profile').css({'color':themeLetColor});
    $('li>a').css({'color':themeLetColor});
    $('ul>li:hover').css({'background-color':themeColor});
    }
   
    
    
    
}
function cusThmeChnge(sourcee,destee,mode){
    if(mode==='bc'){
         var coll=$(sourcee).val();
    $(destee).css({'background-color':coll});
    $('#main-profile').css({'background-color':coll});
    $('ul>li>a:hover').css({'background-color':'navy','color':'white'});
    }
    else{
        var coll=$(sourcee).val();
    $(destee).css({'background-color':coll});
    $('#main-profile').css({'color':coll});
    $('li>a').css({'color':coll});
    
    }
    
}
function customProfTheme(){
    $('#prof-custom-Theme').show();
    $('#cusThmeBCR').css({'background-color':'whitesmoke',color:'grey','border':'1px solid grey'});
     $('#cusThmeBC').css({'background-color':'navy',color:'grey','border':'1px solid grey'});
    
}
function closeCusThmeWin(){
    $('#prof-custom-Theme').hide();
    $('#main-profile').css({'background-color':'whitesmoke','color':'navy'});
     $('li>a').css({'color':'navy'});
     
}
function CusThmeOk(){
    $('#prof-custom-Theme').hide();
}
function closetip(what){
    $(what).slideUp();
    $('#decBackground').slideUp();
}
function ViewContent(what){
    $(what).slideToggle();
   
}

function ViewComment(id){
    $(id).slideToggle();
    
}
function mouseOnCmntAttch(whichh){
    if(whichh===2){
        $('#toolTipCmntAdd').show();
        $('#forCmntTtArrow').show();
        $('#toolTipCmntAdd').text(' Audio , Video , Picture .,');
    }
    if(whichh===1){
         $('#toolTipCmntAdd').show();
        $('#forCmntTtArrow').show();
        $('#toolTipCmntAdd').text(' Add a Smiley ');
    }
    if(whichh===3){
        $('#toolTipCmntAdd').hide();
        $('#forCmntTtArrow').hide();
    }
    
}
function showOptions(thisid){
      $('#forCmntTtArrowUtil').css({'display':'none'});
        $('#toolTipCmntUtils').css({'display':'none'});
    var cursts=$(thisid).css('display');
    if(cursts==='none'){
        $(thisid).css({'display':'inline-block'});
    }
    else{
        $(thisid).css({'display':'none'});
    }
}
function previewMedia(what){
    $('#postContentMain').css({'z-index':'100'});
     $('#decBackground').slideDown();
      $(what).slideDown().css({'z-index':'120'});
    var cmntHeight=$('#details').height();
    if(cmntHeight>450){
        $('#details').css({'overflow-y':'scroll'});
    }
    else{
        $('#details').css({'overflow-y':'hidden'});
    }
}
function FullpreviewMedia(what){
    $(what).slideDown().css({'z-index':'130'});
}
function whoAreThey(catogory){
    $('#postDetails').show();
          var cursts=$(catogory).css('display');
        
         
    if(cursts==='none'){
        $('#postRatings').css({'display':'none'});
         $('#postCommenters').css({'display':'none'});
         $('#postLikers').css({'display':'none'});
         $('#postShares').css({'display':'none'});
        $(catogory).css({'display':'inline-block'});
    }
    else{
        $('#postRatings').css({'display':'none'});
         $('#postCommenters').css({'display':'none'});
         $('#postLikers').css({'display':'none'});
          $('#postShares').css({'display':'none'});
        $(catogory).css({'display':'none'});
    }
}
function mouseOnPostDetCmnt(catogory,setvs,setcont,curcount,event){
    whoAreThey(catogory);
    mouseOnPostDet1(setvs,setcont,curcount,event);
}
function sftooltip(whatiscont){
   
}
function Likedone(binari,county,dests){
    if(binari===1){
       var curentt=$(dests).attr('src');
       if(curentt==='icons/post-sf-like.png'){
           county=county+1;
           $('#likeCount').text(county);
            $(dests).attr({'src':'icons/post-sf-liked.png'});
       }
       else{
            $('#likeCount').text(county);
           $(dests).attr({'src':'icons/post-sf-like.png'});
       }
    }
    else{
        var curentt=$(dests).attr('src');
       if(curentt==='icons/post-sf-unlike.png'){
           county=county+1;
           $('#unlikeCount').text(county);
            $(dests).attr({'src':'icons/post-sf-unliked.png'});
       }
       else{
           
           $('#unlikeCount').text(county);
           $(dests).attr({'src':'icons/post-sf-unlike.png'});
       }
    }
}
function postRated(i,county,forqp){
    var t;
    if(i===0){
      //  $(forqp).attr({'src':'icons/post-sf-emptyRate.png'});
        for(t=1;t<=5;t++){
            itemid='#rated'+t;
        itemsrc='icons/post-sf-emptyRate.png';
        $(itemid).attr({'src':itemsrc});
        }
    }
    else{
    var itemsrc='icons/post-rated-'+i+'.png';
    $(forqp).attr({'src':'icons/post-Qrated-'+i+'.png'});
    for(t=1;t<=5;t++){
    if(t<=i){
        $('#rateCount').text(county);
        var itemid='#rated'+t;
    $(itemid).attr({'src':itemsrc});
    }
    else{
        itemid='#rated'+t;
        itemsrc='icons/post-sf-emptyRate.png';
        $(itemid).attr({'src':itemsrc});
        //$(forqp).attr({'src':itemsrc});
        
    }
    }
    }
}
function colortyped(here,there){
    var cmnttxtcolor=$(here).val();
    $(there).css({'color':cmnttxtcolor});
}
function fileinserted(where){
    var tgh=$('#sf-commentInput').val()+'file';
    $('#sf-commentInput').val(tgh);
}
function mouseOnColorCmnt(plce){
    if(plce===1){
        $('#forCmntTtArrowUtil').css({'display':'inline-block','margin-left':'8px'});
        $('#toolTipCmntUtils').css({'display':'block'}).text(' Add a Color to Your Comment');
    }
    else{
         $('#forCmntTtArrowUtil').css({'display':'inline-block','margin-left':'48px'});
        $('#toolTipCmntUtils').css({'display':'block'}).text(' Attach a File or Smiley ');
    }
}
function mouseOutColorCmnt(plce){
    if(plce===1){
        $('#forCmntTtArrowUtil').css({'display':'none'});
        $('#toolTipCmntUtils').css({'display':'none'});
    }
    else{
        $('#forCmntTtArrowUtil').css({'display':'none'});
        $('#toolTipCmntUtils').css({'display':'none'});
    }
}
//postContentMain

function mouseOnPostCap(event){
    
    $('#QuickPostAccess').css({'position':'absolute','left':event.clientX-220+'px'}).show();
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
                  postRated(i,101); ///pay atttenetion when finish
                  break;
             }
             else{
                 postRated(i,101);
                  $(srcid).attr({'src':'icons/post-Qrated-'+i+'.png'});
                  break;
             }
           
             
         }
         
    }
    }  
}
function mouseOnPostDet1(makevs,setcont,curcount,event){
    curpos=event.clientX-215+'px';
    mouseOnPostDet(makevs,setcont,curcount,curpos);
}
function mouseOnPostDet(makevs,setcont,curcount,curpos){
    $(makevs).show();
    $(makevs).css({'left':curpos});

    $(setcont).text(curcount);
}
function mouseOnPostContent(showt1,showt2){
   
    var sts=$(showt1).css('display');
    if(sts==='none'){
      
        $(showt2).css({'padding-right':'14px','margin-top':'5px'}).show();
    }
    else{
         
          $(showt1).css({'padding-right':'18px','margin-top':'5px'}).show();
    }
   
}
function mouseOutPostContent(showt1,showt2){
    var sts=$(showt1).css('display');
    if(sts==='none'){
      
        $(showt2).css({'padding-right':'25px','margin-top':'5px'}).show();
    }
    else{
         
          $(showt1).css({'padding-right':'25px','margin-top':'5px'}).show();
    }
   
}
function mouseOnQPface(fullname,deste,makew,incop,showt){
    $(deste).text(fullname);
    $(incop).css({'opacity':'0.2'});
    $(showt).show();
    $(makew).css({'background-color':'white'});
}
function mouseOutQPface(decop){
    $(decop).css({'opacity':'0'});
    
}
function mouseOnQPsf(incop){
    $(incop).css({'opacity':0.85});
}
function mouseOutQPsf(decop){
    $(incop).css({'opacity':0.2});
}
function mouseOnQPDet(doth,showt){
    for(x=0;x<=4;x++){
        $(doth+x).show();    
    }
    
}
function mouseOutQPDet(doth){
     for(x=0;x<=4;x++){
        $(doth+x).hide();
    }
}
function mouseOnSFTag(showt){
    $(showt).show();
}
function mouseOutSFTag(halfname,deste,hidet1,hidet2){
   // $(deste).text(halfname);
    //$(hidet1).css({'background-color':'whitesmoke'});
    $(hidet1).hide();
    //$(hidet2).hide();
}
function mouseOnPostMainDet(showt,shmar,deste,cont){
    $(showt).css({'display':'inline-block','margin-left':shmar});
    $(deste).text(cont);
}
function showMorePostDet(hidet,showt){
    $(hidet).hide();
    $(showt).show();
}