/* 
    Created on : May 27, 2015, 12:24:41 PM
    Author     : Vijayakumar <vijayakumar at www.sedfed.com>
*/
var dt=0;
$(document).ready(function()
  {
    $("#pvtFoldPassInp").keyup(function(event)
      {
        var key=event.keycode || event.which;
        if(key==13)
        {
          checkpass();
        }
      });
  });

function selectAllFiles(noOfFiles){
 var t=0;
    var tval=$("#totnofol").val();
 
   for(t=1;t<=tval;t++){
       var id='file'+t;
      
       document.getElementById(id).checked=true;
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
    
    var allcheckbx=0;
    var noOfFiles=$('#data-fileCount').text().trim();
   noOfFiles=noOfFiles-1+1;
     for(i=1;i<=noOfFiles;i++){
       var id='file'+i;
      var holderId='#fileHolder'+i;
       if(document.getElementById(id).checked===true){
           
          allcheckbx=allcheckbx+0;
           
            
       }
       else{
           
            allcheckbx=allcheckbx+1;
           
            
       }
   
    }
    if(allcheckbx>0){
        document.getElementById('doSelectAll').checked=false;
    }
    else{
        document.getElementById('doSelectAll').checked=true;
    }
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
function renamethisfolder(trgtnm,newname,id)
{
     var re_cont="fname="+trgtnm+"&newname="+newname;
      $(id).css({"border":"0px"});
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
                
             
             $("#tresult").html(xmlhttp.responseText);
           }else{
       
            }
          }
            xmlhttp.open("POST","../web/renamefolder.php?"+re_cont,true);
            xmlhttp.send();
}
var f=0;
function doRename(ui,its){
     f=f+1;
    
     if(f>1)
     {
         f=0;
     }
     
  var toval=$("#totnofol").val();
     if(f===1)
     {
         $("#"+its+"").html('Done');
         $("#"+its+"").css({"background-color":"whitesmoke"});
         $("#"+its+"").css({"color":"navy"});
         $("#prevent_click").val('0');
         
  //alert(toval);
  var m=0;
            for(m=1;m<=toval;m++)
            {
                var fold_name=$("#fileName"+m+"").html();
                $("#fileName"+m+"").html('<input type="text" class="name'+m+'" id="renamed'+fold_name+'" onblur="renamethisfolder(\''+fold_name+'\',this.value,\'#renamed'+fold_name+'\')" value="'+fold_name+'">');
            }
   
     }else
     {
         $("#"+its+"").html('Rename');
          $("#"+its+"").css({"background-color":"white"});
         $("#"+its+"").css({"color":"navy"});
         for(m=1;m<=toval;m++)
        {
            var fold_name=$(".name"+m+"").val();
            
            $("#fileName"+m+"").html(fold_name);
        }
        $("#prevent_click").val('1');
     }
  
}
$(document).ready(function()
{
       $('#NewFoldInpTxt').keyup(function(e)
       {
              var key=e.which || e.keycode;
              if(key===13)
              {
	    createNewFolder();
              }
       });
});
function createNewFolder(){
   var newNme=$("#NewFoldInpTxt").val();
   
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
       
        $(".StorageCont").append(xmlhttp.responseText);
            }else{
    
            }
          }
            xmlhttp.open("GET","../web/createfolder.php?q="+newNme,true);
            xmlhttp.send();
    
}
          function setpassprcs()
          {
            var newpass=$("#newpass").val();
            var oldpass=$("#oldpass").val();
      
            
       var folname=$("#fldrnm").val();
            var conts="npass="+newpass+"&foldernm="+folname+"&opass="+oldpass;
             var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
        
 $(".pwresult").html(xmlhttp.responseText);

            }else{
  
            }
          }
            xmlhttp.open("POST","../web/setfoldpass.php?"+conts,true);
            xmlhttp.send();

          }
          var t=0;
function setpass(a)
{
 
  $(a).slideToggle();
  $(".upbtn").css({"background-color":"whitesmoke"});
}
function checkpass(userid)
{
  var userid=$("#useridvals").val();
  
  var pwd=$("#pvtFoldPassInp").val();

  var fname=$("#fldrnm").val();
        var conts="passwd="+pwd+"&foldernm="+fname+"&prfuserid="+userid;
             var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
              $(".StorageCont").html(xmlhttp.responseText);
           }else{
      
            }
          }
            xmlhttp.open("POST","../web/checkfoldpass.php?"+conts,true);
            xmlhttp.send();

}
function uploadfiles(fnm)
{
var n=0;
$('.UpLdProgCont').html('<div class=\'UPLD_Ttl\'><img src="../web/icons/LoaderIcon.gif" ></div>Uploading Your files to '+fnm+' folder');
  var fileibd="#brfiles";
   
  var len=$(fileibd).prop('files').length;
  
 var tot_rmv=$("#tot_rmv_file_cnt").val();
 var t=0;
 var my=0;
  for(n=0;n<len;n++)
  {
      var rmv=0;
      var sr=0;
      $("#my_cut_val").val(n);
   var file_data = $(fileibd).prop('files')[n];  
   if(tot_rmv>0)
   {
       
   for(t=1;t<=tot_rmv;t++)
   {
      
       var rmv_fl=$("#rmv_this"+t+"").val();
       var chk=$("#my_cut_val").val();
       
       if(chk===rmv_fl)
       {
           var rmv=1;
           
       }else
       {
       }
   }    
   }
   if(rmv===0)
   {
       my=my+1;
    var form_data = new FormData();                  
    form_data.append('filed', file_data);
    form_data.append('fname',fnm);              
    $.ajax({
                url: '../web/uploadfiles.php',  
                dataType: 'text',  
                cache: false,
                contentType:false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
                    dt=0;
                   $('.UpLdProgCont').html('<div class=\'UPLD_Ttl\'>Success</div>Your Files has been Uploaded<div id="close_btn_file" onclick="$(\'.UploadProgOut\').fadeOut();">Close</div>')
                     }
     });   
   }
     
  }
   if(my==0)
   {
        $('.UploadProgOut').fadeOut();
       $('.UpLdProgCont').html('');
       
   }
}
function viewfiles(fnm,userid)
{
  var my_cont="fn="+fnm+"&prfuserid="+userid;
             var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
              $(".StorageCont").html(xmlhttp.responseText);
           }else{
      
            }
          }
            xmlhttp.open("POST","../web/viewfiles.php?"+my_cont,true);
            xmlhttp.send();
}

function openfolder(fn,pw)
{
    if($("#prevent_click").val()==="1")
    {
   if(pw=="da39a3ee5e6b4b0d3255bfef95601890afd80709")
  {
       
    var userid=$("#useridvals").val();
  
  
  $("#fldrnm").val(fn);
 
   viewfiles(fn,userid);
}else
{
  $("#fldrnm").val(fn);
  $("#pwttl").html("Enter Password for "+fn+" folder.");
  $('#pvtFolderPass').slideDown();
}
    }
 

}
function doDelete(noOfFiles){
     var noOfFiles=$('#data-fileCount').text().trim();
   noOfFiles=noOfFiles-1+1;
    for(i=1;i<=noOfFiles;i++){
       var id='file'+i;
        var holderId='#fileHolder'+i;
       if(document.getElementById(id).checked===true){
           if(confirm('You cannot undo this action')===true){
                $(holderId).remove();
           }
          
          
       }
       else{
           
       }
       
   }
}
function copyfiles(fn,uid)
{
  var dt=0;
  var x=0;
  var totval=$("#totckval").val();
      
  for(dt=1;dt<=totval;dt++)
  {
    var id="med"+dt;
    if(document.getElementById(id).checked===true)
    {
        x=x+1;
      var size=$("#"+id+"").attr('class');
      var media=document.getElementById(id).value;
    
    var conts="media="+media+"&size="+size;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
            
              $(".copy_item").html(xmlhttp.responseText);
           }else{
      
            }
          }
            xmlhttp.open("POST","../web/copyfiles.php?"+conts,true);
            xmlhttp.send();
    }

  }
  if(x!==0)
  {
      alert("Go to your Storage and paste it..");
  }else
  {
      alert("Please Select files to copy");
  }
  
 // $("#totfilcnt").val(dt);
}
function pastefiles(fn)
{
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
            
              $(".paste_item").html(xmlhttp.responseText);
           }
          }
            xmlhttp.open("POST","../web/pastefiles.php?q="+fn,true);
            xmlhttp.send();
    
}
function renamefolder(txtid,ckid)
{
  var f=0;
//fileName
  var tval=$("#totnofol").val();
  var ids="#"+txtid;
  var newname=$(ids).val();
  if(document.getElementById(ckid).checked===true)
  {
    for(f=1;f<=tval;f++)
  {
    var id="file"+f;
    if(id==ckid)
    {
      document.getElementById(id).disabled=false;
    }else
    {
      document.getElementById(id).disabled=true;
    }
    var trgtnm=$("#"+ckid+"").val();
      
      var re_cont="fname="+trgtnm+"&newname="+newname;
      
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              $("#tresult").html(xmlhttp.responseText);
             
           }else{
       
            }
          }
            xmlhttp.open("POST","../web/renamefolder.php?"+re_cont,true);
            xmlhttp.send();
    
  }
  }else
  {
    for(f=1;f<=tval;f++)
  {
    var id="file"+f;
    if(id==ckid)
    {
      document.getElementById(id).disabled=false;
    }else
    {
      document.getElementById(id).disabled=false;
    }
    
  }
  }
  
  
}
function whodwnld(userid)
{
  alert(userid);
}

function showpublicfoleder(a)
{

  var pstimg='<a href="../'+a+'/photos.php"><div class="folderName" id="file1Name" > \
                              <img class="img-folder" src="../web/icons/sf-storage-folder.png" alt="folder"/>  \
     Posts Images and albums\
                              </div></a>';
            var pstvideos='<a href="../'+a+'/videos.php"><div class="folderName" id="file1Name"> \
            <img class="img-folder" src="../web/icons/sf-storage-folder.png" alt="folder"/>  \
                Post & Status Videos\
            </div></a>';
             var pstaudios=' <a href="../'+a+'/videos.php"><div class="folderName" id="file1Name">\
            <img class="img-folder" src="../web/icons/sf-storage-folder.png" alt="folder"/>  \
                Post & Status Audios\
            </div></a>';
             var pstpdfs='<a href="../'+a+'/files.php"> <div class="folderName" id="file1Name">\
            <img class="img-folder" src="../web/icons/sf-storage-folder.png" alt="folder"/>  \
            \
                Post Pdfs\
            </div></a>';

             var pstfiles='<a href="../'+a+'/files.php"><div class="folderName" id="file1Name">\
            <img class="img-folder" src="../web/icons/sf-storage-folder.png" alt="folder"/>  \
                Post  Files\
          </div></a>';
                              
                              $("#folderconts").html(pstimg+pstvideos+pstaudios+pstpdfs+pstfiles);
}
function showpostimages(a)
{
 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              $("#imagesContainer").html(xmlhttp.responseText);
          
           }else{
    
            }
          }
            xmlhttp.open("POST","../web/showmyphotos.php?q="+a,true);
            xmlhttp.send();
}
function gotoback(ui)
{
    
    $("#for_menubar_cont").fadeIn();
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              $(".StorageCont").html(xmlhttp.responseText);
          
           }else{
    
            }
          }
            xmlhttp.open("POST","../web/gotoback.php?q="+ui,true);
            xmlhttp.send();
     
}

function filesto_upload(df,fld_nm)
{
    
  $('.UploadProgOut').html('<div class="UpLdProgCont">\
              <div class="UPLD_Ttl">Files  Upload To '+fld_nm+' Folder</div>\
              <div class="UPLD_Cont">\
                          </div>\
              <div class="Upld_Prcd" onclick="uploadfiles(\''+fld_nm+'\')"  >\
                  Upload Now\
              </div>\
              <div class="Upld_Prcd" onclick="$(\'.UploadProgOut\').fadeOut()" style="background-color: crimson;" >\
                  Cancel\
              </div>\
          </div>');  
    $('.UploadProgOut').fadeIn();
   var fid="#brfiles";
   
  var lens=df.files.length;
  
  for(n=0;n<lens;n++)
  {  
  var name=df.files[n].name;
  if(n==0)
  {
      $('.UPLD_Cont').html('');
      $("#for_rmv_files").html('');
  }
  $('.UPLD_Cont').append('<div class="Upld_Itm" id="removeme'+n+'">\
                      '+name+' <span class="Upld_Cancl" onclick="remove_slctd_file('+n+',\'#removeme'+n+'\')">X</span>\
                  </div>');
   
    }
}

function remove_slctd_file(rmv,me)
{
    dt=dt+1;
    $(me).remove();
    $("#tot_rmv_file_cnt").val(dt);
    $("#for_rmv_files").append('<input type="hidden" value="'+rmv+'" id="rmv_this'+dt+'"/>');
}
function DeleteFolder()
{
  var f_nm=$('#deleteFoldInpTxt').val();
   var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              alert(xmlhttp.responseText);
          
           }else{
    
            }
          }
            xmlhttp.open("POST","../web/deletefolder.php?q="+f_nm,true);
            xmlhttp.send(); 
}
function deletefiles()
{
    var totval=$("#totckval").val();
      var me=confirm("Are you sure  delete ");
      if(me===true)
      {
              
  for(dt=1;dt<=totval;dt++)
  {
    var id="med"+dt;
    if(document.getElementById(id).checked===true)
    {
      var size=$("#"+id+"").attr('class');
      var media=document.getElementById(id).value;
   $(".my_file"+media+"").fadeOut();
    var conts="media="+media+"&size="+size;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
            
              $("#tresult").html(xmlhttp.responseText);
           }else{
      
            }
          }
            xmlhttp.open("POST","../web/deletefiles.php?"+conts,true);
            xmlhttp.send();
    }

  }
      }else
      {
          
      }
  
}