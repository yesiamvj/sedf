/* 
    Created on : May 27, 2015, 12:24:41 PM
    Author     : Vijayakumar <vijayakumar at www.sedfed.com>
*/
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

function createNewFolder(noOfFiles){
     var noOfFiles=$('#data-fileCount').text().trim();
   noOfFiles=noOfFiles-1+1;
     var newNme=$('#NewFoldInpTxt').val();
    
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
          
            var newNme=$('#NewFoldInpTxt').val();
            var lastFileId='#fileHolder'+noOfFiles;
            var newNo=noOfFiles+1;
         
            //var newFileChkId='file'+newNoOfFiles;
            $(lastFileId).after('<div class="folderContainer" id="fileHolder'+newNo+'" ><input type="checkbox" class="fileCheck" id="file'+newNo+'" onchange="imSelectd(3)"/><img class="img-folder" src="icons/sf-storage-folder.png" alt="folder"/><div class="folderName" id="file'+newNo+'Name">'+newNme+'</div></div>');
     $('#data-fileCount').text(newNo);
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
        
    $("#testresult").html(xmlhttp.responseText);

            }else{
    
            }
          }
            xmlhttp.open("GET","createfolder.php?q="+newNme,true);
            xmlhttp.send();
       }
       else{
           
           alert('File name already exists.Please choose different name');
          
       }
    }
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
            xmlhttp.open("POST","setfoldpass.php?"+conts,true);
            xmlhttp.send();

          }
          var t=0;
function setpass(a)
{
 
  $(a).slideToggle();
  $(".upbtn").css({"background-color":"whitesmoke"});
}
function checkpass()
{
  var pwd=$("#pvtFoldPassInp").val();
var userid=$("#useridvals").val();
  var fname=$("#fldrnm").val();
        var conts="passwd="+pwd+"&foldernm="+fname+"&prfuserid="+userid;
             var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
              $("#folderfiles").html(xmlhttp.responseText);
           }else{
      
            }
          }
            xmlhttp.open("POST","checkfoldpass.php?"+conts,true);
            xmlhttp.send();
$('#pvtFolderPass').slideUp();
}
function uploadfiles(fnm)
{
var n=0;

  var fileid="#brfiles";
   
  var len=$(fileid).prop('files').length;
  if(len>0)
  {
    $(".Ldricn").show();
  $(".Ldricn").attr('src','icons/LoaderIcon.gif'); 
  }
 
  for(n=1;n<=len;n++)
  {
   var file_data = $(fileid).prop('files')[n];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    form_data.append('fname',fnm);              
    $.ajax({
                url: 'uploadfiles.php',  
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
                   $("#tresult").html(php_script_response);
                   
                     }
     }); 
  }
   
}
function viewfiles(fnm,userid)
{
  alert(userid);
  var my_cont="fn="+fnm+"&prfuserid="+userid;
             var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
              $("#folderfiles").html(xmlhttp.responseText);
           }else{
      
            }
          }
            xmlhttp.open("POST","viewfiles.php?"+my_cont,true);
            xmlhttp.send();
}


function openfolder(fn,pw)
{
  var userid=$("#useridvals").val();
  if(pw=="da39a3ee5e6b4b0d3255bfef95601890afd80709")
  {
     var fname="<div class=\"fileSomeActions\"><div id=\"foldname\"><img height=\"25\" width=\"25\" src=\"icons/sf-storage-folder.png\" alt=\"$fname\"/>  "+fn+"</div><br/> \
  <div id=\"bfilebtn\"><div id=\"uploadfl\" onclick=document.getElementById(\"brfiles\").click(); >Add Files</div>&nbsp;&nbsp;<input type=\"file\" id=\"brfiles\" style=\"display:none;\" multiple=\"multiple\" name=\"myownfile[]\" /><div id=\"adfilebtn\" onclick=\"uploadfiles('"+fn+"')\" >Upload to Folder</div><img class=\"Ldricn\" style=\"display:none;\" src=\"\" width=\"25\" height=\"25\" /><div id=\"pwresult\" >View files</div><div id=\"setpwdiv\" >Download All</div><div id=\"copybtn\">Copy</div><div id=\"pastebtn\">Paste</div><div id=\"setpwdiv\" class=\"upbtn\" onclick=\"setpass(\'.setpassdiv\')\">Set Password</div><div class=\"setpassdiv\" ><br/><input type=\"hidden\" id=\"oldpass\" value=\"\" placeholder=\"Current Passwod\" />&nbsp;&nbsp;&nbsp;<input type=\"password\" placeholder=\"New password\" value=\"\" id=\"newpass\" />&nbsp;&nbsp;&nbsp;<div id=\"cpbtn\" onclick=\"setpassprcs()\">Create Password</div><span class=\"pwresult\"></span></div></div>";
  $("#folderfiles").html(fname);
  $("#fldrnm").val(fn);
  viewfiles(fn,userid);
}else
{
  $("#fldrnm").val(fn);
  $("#pwttl").html("Enter Password for "+fn+" folder.");
  $('#pvtFolderPass').fadeIn();
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
function copyfiles(fn)
{
  var dt=0;
  var totval=$("#totckval").val();
      
  for(dt=1;dt<=totval;dt++)
  {
    var id="med"+dt;
    var ph=$("#copyfilesdiv").html();
    if(document.getElementById(id).checked===true)
    {
      
      var media=document.getElementById(id).value;
    

      var nh="<li id=\"cp"+dt+"\">"+media+"</li>";
      
      var now=$("#copyfilesdiv").html(ph+nh);
    }

  }
  $("#totfilcnt").val(dt);
}
function pastefiles(fn)
{
  
  var nt=0;
  var tval=$("#totfilcnt").val();
  
  for(nt=1;nt<=tval;nt++)
  {
    var id="#cp"+nt;
    var medi=$(id).html();
    alert(medi);
    var c_cont="media="+medi+"&fname="+fn;
  
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
            
              $("#tresult").html(xmlhttp.responseText);
           }else{
      
            }
          }
            xmlhttp.open("POST","copyfiles.php?"+c_cont,true);
            xmlhttp.send();
    
  }

}
function renamefolder(txtid,ckid)
{
  var f=0;

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
      alert(newname);
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {

              $("#tresult").html(xmlhttp.responseText);
           }else{
      
            }
          }
            xmlhttp.open("POST","renamefolder.php?"+re_cont,true);
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
function openpublicfoleder()
{
  
 var userid=$("#useridvals").val();
  var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
                 $("#folderfiles").html(xmlhttp.responseText);
           }else{
      
            }
          }
            xmlhttp.open("POST","publicfolder.php?viewerid="+userid,true);
            xmlhttp.send();

}
function upldpubfold()
{
  var fileid="#pffile";
   var nm=0;
  var len=$(fileid).prop('files').length;
  if(len>0)
  {
    $(".Ldricn").show();
  $(".Ldricn").attr('src','icons/LoaderIcon.gif'); 

  for(nm=1;nm<=len;nm++)
  {
    alert(nm);
   var file_data = $(fileid).prop('files')[nm];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
              
    $.ajax({
                url: 'uploadpffiles.php',  
                dataType: 'text',  
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,                         
                type: 'post',
                success: function(php_script_response){
                  
              $("#tresult").html(php_script_response);
                     }
     }); 
  }
  openpublicfoleder();
  }else
  {
    alert("Please Select Files to Upload");
  }
 
}

function copyfrompf()
{
   var dt=0;
  var totval=$("#totckval").val();
  
   for(dt=1;dt<=totval;dt++)
  {
    var id="med"+dt;
    if(document.getElementById(id).checked===true)
    {
       var media=document.getElementById(id).value;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
                alert(xmlhttp.responseText);
           }else{
      
            }
          }
            xmlhttp.open("POST","copypublicfolder.php?mediaid="+media,true);
            xmlhttp.send();

    }

  }
  $("#totfilcnt").val(dt);
}
function dwncnt(a)
{
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
                
           }else{
      
            }
          }
            xmlhttp.open("POST","incpfdwncnt.php?mediaid="+a,true);
            xmlhttp.send();
  
}
function pastefrmpf(a)
{

   var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
                alert(xmlhttp.responseText);
           }else{
      
            }
          }
            xmlhttp.open("POST","pastefrmpf.php?fnm="+a,true);
            xmlhttp.send();
  

}

function showpublicfoleder(a)
{

  var pstimg='<a href="../../users/a/"><div class="folderName" id="file1Name" > \
                              <img class="img-folder" src="icons/sf-storage-folder.png" alt="folder"/>  \
     Posts Images and albums\
                              </div></a>';
            var pstvideos='<div class="folderName" id="file1Name"> \
            <img class="img-folder" src="icons/sf-storage-folder.png" alt="folder"/>  \
                Post & Status Videos\
            </div>';
             var pstaudios=' <div class="folderName" id="file1Name">\
            <img class="img-folder" src="icons/sf-storage-folder.png" alt="folder"/>  \
                Post & Status Audios\
            </div>';
             var pstpdfs=' <div class="folderName" id="file1Name">\
            <img class="img-folder" src="icons/sf-storage-folder.png" alt="folder"/>  \
            \
                Post Pdfs\
            </div>';
             var pstfiles='<div class="folderName" id="file1Name">\
            <img class="img-folder" src="icons/sf-storage-folder.png" alt="folder"/>  \
                Post  Files\
          </div>';
                              
                              $("#folderconts").html(pstimg+pstvideos+pstaudios+pstpdfs+pstfiles);
}

