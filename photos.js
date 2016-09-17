/* 
    Created on : May 29, 2015, 11:14:45 AM
    Author     : Vijayakumar <vijayakumar at www.sedfed.com>
*/


function selectAllFiles(noOfFiles){
   // alert(1);
   var noOfFiles=$('#data-fileCount').text().trim();
   noOfFiles=noOfFiles-1+1;
   
   document.getElementById('doSelectInv').checked=false;
  if(document.getElementById('doSelectAll').checked===true){
      for(i=1;i<=noOfFiles;i++){
       var id='file'+i;
        var holderId='#fileHolder'+i;
       document.getElementById(id).checked=true;
        $(holderId).css({'background-color':'white'});
   }
  }
  else{
      for(i=1;i<=noOfFiles;i++){
       var id='file'+i;
        var holderId='#fileHolder'+i;
       document.getElementById(id).checked=false;
        $(holderId).css({'background-color':'transparent'});
   }
  }
   
}
function iselectAllFiles(noOfFiles){
    var noOfFiles=$('#data-fileCount').text().trim();
   noOfFiles=noOfFiles-1+1;
  document.getElementById('doSelectAll').checked=false;
  if(document.getElementById('doSelectInv').checked===true){
      for(i=1;i<=noOfFiles;i++){
       var id='file'+i;
      var holderId='#fileHolder'+i;
       if(document.getElementById(id).checked===true){
           
            document.getElementById(id).checked=false;
           $(holderId).css({'background-color':'transparent'});
            
       }
       else{
           
            document.getElementById(id).checked=true;
            $(holderId).css({'background-color':'white'});
            
       }
   }
  }
  else{
      for(i=1;i<=noOfFiles;i++){
       var id='file'+i;
      var holderId='#fileHolder'+i;
       if(document.getElementById(id).checked===true){
            document.getElementById(id).checked=false;
         $(holderId).css({'background-color':'transparent'});
       }
       else{
            document.getElementById(id).checked=true;
             $(holderId).css({'background-color':'white'});
       }
   }
  }
   
}
function imSelectd(noOfFiles){
     var noOfFiles=$('#data-fileCount').text().trim();
   noOfFiles=noOfFiles-1+1;
    for(i=1;i<=noOfFiles;i++){
       var id='file'+i;
      var holderId='#fileHolder'+i;
       if(document.getElementById(id).checked===true){
           
          
           $(holderId).css({'background-color':'white'});
            
       }
       else{
           
            
            $(holderId).css({'background-color':'transparent'});
            
       }
   }
        
}
function expSomeAct(mode){
    if(mode==='new'){
        $('#btn-FSAnf').css({'background-color':'whitesmoke','color':'navy'});
        $('#btn-FSArenme').css({'background-color':'white','color':'navy'});
        
         $('#forRenameText').hide();
        $('#forNewFoldrText').slideToggle();
       
    }
    else{
        $('#btn-FSAnf').css({'background-color':'white','color':'navy'});
        $('#btn-FSArenme').css({'background-color':'whitesmoke','color':'navy'});
         $('#forRenameText').slideToggle();
        $('#forNewFoldrText').hide();
    }
}
function doRename(noOfFiles){
     var noOfFiles=$('#data-fileCount').text().trim();
   noOfFiles=noOfFiles-1+1;
    var newNme=$('#renameInpTxt').val();
    
    var existc=0;
    newNme=newNme.trim();
    if(newNme===''){
        alert('Blank names cannot be accepted');
    }
    else{
         for(i=1;i<=noOfFiles;i++){
       var id='file'+i;
       var fileName='#'+id+'Name';
       var fileNameTxt=$(fileName).text();
       fileNameTxt=fileNameTxt.trim();
       if(fileNameTxt===newNme){
           existc=existc+1;   
       }
       
       else{
            existc=existc+0; 
       }
   }
       if(existc===0){
            var newNme=$('#renameInpTxt').val();
    for(i=1;i<=noOfFiles;i++){
       var id='file'+i;
       var fileName='#'+id+'Name';
       if(document.getElementById(id).checked===true){
            $(fileName).text(newNme);
            break;
       }
       
   }
       }
       else{
           
           alert('File name already exists.Please choose different name');
          
       }
    }
   
       
   
  
   
}

function showDetails(event,id){
    $(id).show().css({'top':event.pageY,'left':event.pageX});
}
function changeFocusImg(mode){
    var prevImg='#photos-prev_rdy';
    var curImg='#curImgInFocus';
    var nextImg='#photos-next_rdy';  
   
    var curImg='#curImgInFocus';
     var curNo=$(curImg).attr('alt');
      
   var curId='#sf_Img_'+curNo;
    var prevNo=curNo-1;
    var prevId='#sf_Img_'+prevNo;
    var nextNo=curNo-1+2;
   
     var nextId='#sf_Img_'+nextNo;
   var prevprevNo=curNo-2;
   var prevprevId='#sf_Img_'+prevprevNo;
   var nextnextNo=curNo-1+3;
   var nextnextId='#sf_Img_'+nextnextNo;
    if(mode==='prev'){
         var curNameId='#imgName'+prevNo;
        $(curImg).hide().attr({'src':$(prevId).attr('src'),'alt':prevNo}).fadeIn();
         
        $(nextImg).attr({'src':$(curId).attr('src')});
        $(prevImg).attr({'src':$(prevprevId).attr('src')});
        $('#curFocusImgName').text($(curNameId).text());
       
        var cur_post="#next_post_img"+prevNo;
      var post_id=$(cur_post).val();
       $("#cur_post_id").val(post_id);
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              $("#sts_rslt").html(xmlhttp.responseText);
          
           }else{
      
            }
          }
            xmlhttp.open("POST","../web/show_post_status_photos.php?q="+post_id,true);
            xmlhttp.send();
        
    }
    else{
      var curNameId='#imgName'+nextNo;
        $(curImg).hide().attr({'src':$(nextId).attr('src'),'alt':nextNo}).fadeIn();
        $(nextImg).attr({'src':$(nextnextId).attr('src')});
        $(prevImg).attr({'src':$(curId).attr('src')});
          $('#curFocusImgName').text($(curNameId).text());
           var cur_post="#next_post_img"+nextNo;
      var post_id=$(cur_post).val();
       $("#cur_post_id").val(post_id);
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              $("#sts_rslt").html(xmlhttp.responseText);
          
           }else{
      
            }
          }
            xmlhttp.open("POST","../web/show_post_status_photos.php?q="+post_id,true);
            xmlhttp.send();
    }
    
     
}
function openSFImgViewer(itemno){
     
     $('#title_bar').slideUp();
     $('#Mytitle_bar').animate({'top':'0px'});
     
    var curNameId='#imgName'+itemno;
    var cur_post=$("#next_post_img"+itemno+"").val();
    $("#cur_post_id").val(cur_post);
    
    var prevImg='#photos-prev_rdy';
    var curImg='#curImgInFocus';
    var nextImg='#photos-next_rdy';  
    var curId='#sf_Img_'+itemno;
    var prevNo=itemno-1;
    var nextNo=itemno-1+2;
    var prevId='#sf_Img_'+prevNo;
    var nextId='#sf_Img_'+nextNo;
    $(curImg).attr({'src':$(curId).attr('src'),'alt':$(curId).attr('alt')});
     $(nextImg).attr({'src':$(nextId).attr('src')});
        $(prevImg).attr({'src':$(prevId).attr('src')});
        $('#curFocusImgName').text($(curNameId).text());
    $('#imageViewer').fadeIn();
    
}
function closeImageViewer(){
    $('#imageViewer').slideUp();
    $('#title_bar').slideDown();
     $('#Mytitle_bar').animate({'top':'42px'});
     $('#abtImgOut').hide();
}
function showpostimages(userid,pg_id)
{
  
       var ct="page_id="+pg_id+"&userid="+userid;
          
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
	
              $("#imagesContainer").html(xmlhttp.responseText);
          
           }
          }
          
            xmlhttp.open("POST","../web/showmyphotos.php?"+ct,true);
            xmlhttp.send();
}
function showmystsimgs(a)
{
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              $("#imagesContainer").html(xmlhttp.responseText);
          
           }else{
    
            }
          }
            xmlhttp.open("POST","../web/showmystsimgs.php?q="+a,true);
            xmlhttp.send();
}
function showpostvideos(a,page_id)
{
  var cont="q="+a+"&page_id="+page_id;
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              $("#imagesContainer").html(xmlhttp.responseText);
          
           }
          };
          if(page_id==="videos")
          {
	xmlhttp.open("POST","../web/showmypstvid.php?"+cont,true);
            
          }else
          {
	xmlhttp.open("POST","../web/show_page_videos.php?"+cont,true);
            
          }
            xmlhttp.send();
}

function showstsvideos(a)
{
  
 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              $("#imagesContainer").html(xmlhttp.responseText);
        
          
           }else{

            }
          }
            xmlhttp.open("POST","../web/showstsvid.php?q="+a,true);
            xmlhttp.send();
}
function showpostaudios(a,page_id)
{
var cont="q="+a+"&page_id="+page_id;
 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              $("#imagesContainer").html(xmlhttp.responseText);
        
          
           }
          }
          if(page_id==="audio")
          {
	xmlhttp.open("POST","../web/showpostaudios.php?"+cont,true);
            
          }else
          {
	xmlhttp.open("POST","../web/show_page_audios.php?"+cont,true);
            
          }
            xmlhttp.send();
}
function showstsaudios(a)
{

 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              $("#imagesContainer").html(xmlhttp.responseText);
        
          
           }else{

            }
          }
            xmlhttp.open("POST","../web/showstsaudios.php?q="+a,true);
            xmlhttp.send();  
}
function showpostpdfs(a,page_id)
{
       var cont="page_id="+page_id+"&q="+a;
   var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              $("#imagesContainer").html(xmlhttp.responseText);
        
          
           }else{

            }
          }
          if(page_id!=="pdf")
          {
	xmlhttp.open("POST","../web/show_page_pdfs.php?"+cont,true);
            
          }else
          {
	xmlhttp.open("POST","../web/showpostpdfs.php?"+cont,true);
            
          }
            xmlhttp.send(); 
}
function showpostfiles(a,page_id)
{

       var cont="q="+a+"&page_id="+page_id;
   var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              $("#imagesContainer").html(xmlhttp.responseText);
        
          
           }else{

            }
          }
          if(page_id==="file")
          {
	   xmlhttp.open("POST","../web/showpostfiles.php?"+cont,true);
          
          }else
          {
	   xmlhttp.open("POST","../web/show_page_files.php?"+cont,true);
          
          }
            xmlhttp.send();
}
function show_prof_pics(userid,page_id)
{
       
    var cont="q="+userid+"&page_id="+page_id;
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              $("#imagesContainer").html(xmlhttp.responseText);
        
          
           }
          }
           if(page_id==="profile")
          {
	  xmlhttp.open("POST","../web/show_prof_pics.php?"+cont,true);
           
          }else
          {
	  xmlhttp.open("POST","../web/show_page_prof_pic.php?"+cont,true);
           
          }
            xmlhttp.send();
}
function show_post_dets()
{
    $('#abtImgOut').show(200);
    var alt=$("#cur_post_id").val();
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              $("#sts_rslt").html(xmlhttp.responseText);
          
           }else{
      
            }
          }
            xmlhttp.open("POST","../web/show_post_status_photos.php?q="+alt,true);
            xmlhttp.send();
}
function show_my_wall_pics(alt,page_id)
{
    
    var cont="q="+alt+"&page_id="+page_id;
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

               $("#imagesContainer").html(xmlhttp.responseText);
        
           }
          }
          if(page_id==="profile")
          {
	 xmlhttp.open("POST","../web/show_post_wall_pics.php?"+cont,true);
           
          }else
          {
	 xmlhttp.open("POST","../web/show_page_wall_pic.php?"+cont,true);
           
          }
            xmlhttp.send();
}