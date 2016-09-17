/* 
    Created on : Jul 28, 2015, 12:16:14 AM
    Author     : Vijayakumar M
*/

function likepage(user,what,page_id)
{
       var mylike=$("#like_status").val();
       var myunlike=$("#unlike_status").val();
       
        var cont="what="+what+"&admin="+user+"&page_id="+page_id+"&mylike="+mylike+"&myunlike="+myunlike;
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
            if(what===1)
            {
	  var chk=$("#like_status").val();
	  var tot_lk=$("#pageLikes").html();       
	  tot_lk=tot_lk-1+1;
	  if(chk==="1")
	  {
	         tot_lk=tot_lk-1;
	         $("#pageLikes").html(tot_lk);
	         $("#likeBtn").html("Like");
	         $("#like_status").val("0");
	         
	  }else
	  {
	         tot_lk=tot_lk+1;
	         $("#pageLikes").html(tot_lk);
	          $("#likeBtn").html("Liked");
	           $("#like_status").val("1");
	        
	  }
	  
            }else
            {
	  var chk_u=$("#unlike_status").val();
	  var tot_ul=$('#pageHates').html();
	  tot_ul=tot_ul-1+1;
	  if(chk_u==="1")
	  {
	           tot_ul=tot_ul-1;
	           $('#pageHates').html(tot_ul);
	            $("#hateBtn").html("Hate");
	            $("#unlike_status").val("0");
	  }else
	  {
	         tot_ul=tot_ul+1;
	           $('#pageHates').html(tot_ul);
	            $("#hateBtn").html("Hated");
	            $("#unlike_status").val("1");
	  }
	 
            }
           }
          }
            xmlhttp.open("POST","../web/page_like.php?"+cont,true);
            xmlhttp.send();
}

function rate_page(rate,page_id)
{
       var t=0;
       for(t=1;t<=rate;t++)
       {
               $('#rate'+t+'').attr('src','../web/icons/post-Qrated-'+rate+'.png');
       
       }
       for(t=rate+1;t<=5;t++)
       {
               $('#rate'+t+'').attr('src','../web/icons/post-sf-emptyRate.png');
       
       }
       var cont="rate="+rate+"&page_id="+page_id;
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
               
           }
          }
            xmlhttp.open("POST","../web/rate_page.php?"+cont,true);
            xmlhttp.send();
       
}
function follow_this_page(page_id,myflw)
{
       
       var cont="page_id="+page_id+"&myflw="+myflw;
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
                var chk_flw=$("#follw_value").val();
                
                var flw_cnt=$("#flo_cnt").html();
                flw_cnt=flw_cnt-1+1;
                if(chk_flw==="1")
                {
	      $("#for_or_not").html("Follow");
	      chk_flw=$("#follw_value").val("0");
	      flw_cnt=flw_cnt-1;
	      $("#flo_cnt").html(flw_cnt);
                }else
                {
	       $("#for_or_not").html("Following");
	     $("#follw_value").val("1");
	       flw_cnt=flw_cnt+1;
	      $("#flo_cnt").html(flw_cnt);
                }
                
           }
          }
            xmlhttp.open("POST","../web/follow_page.php?"+cont,true);
            xmlhttp.send();  
}
function open_create_post(page_id)
{
      
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
	 
                $("#for_page_post").html(xmlhttp.responseText);
                 alert($('#for_page_post').html());
           }
          };
            xmlhttp.open("POST","../web/page_post.php",true);
            xmlhttp.send();      
}
function clkchkbox(a)
{ 

   if(a===1)
   {
    
     $("#selectppldiv").fadeIn();
    var curuser=$("#selectedpeople").html();
      $("#selectedppldiv").html(curuser);
   
     $("#wchpplwant").val("1");
     $("#selectpplspan").html("Search & Select People for say your Feelings<button id=\"selectpplclsbtn\" onclick=\"hideselectppldiv()\">X</button>");
          
 }else{
   if(a==2)
   {
     $("#selectppldiv").show();

        $("#selectpplspan").html("Search & Select People to remove People from selected list<button id=\"selectpplclsbtn\" onclick=\"hideselectppldiv()\">X</button>");
          $("#wchpplwant").val("2") ;
          var hidcuruser=$("#hiddenpeople").html();
      $("#selectedppldiv").html(hidcuruser);
    
     
 }else{
        if(a==3)
        {
           $("#selectppldiv").fadeIn();
          $("#selectpplspan").html(" Post with these people...<button id=\"selectpplclsbtn\" onclick=\"hideselectppldiv()\">X</button>");
          $("#wchpplwant").val("3") ;
          var withcuruser=$("#withpeoplediv").html();
      $("#selectedppldiv").html(withcuruser);
    
      
        }
    }  
 }
}
    
 function show_poster_details(poster_id,cnt,its_id)
 {
     $(its_id).fadeIn();
      $(its_id).html("Loading Please wait...");
     var det_cont="p="+poster_id+"&cnt="+cnt;
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
        
              $(its_id).html(xmlhttp.responseText);
            
            }else{
                
            }
        }
       
    xmlhttp.open("GET","poster_details.php?"+det_cont,true);
    xmlhttp.send();
 }
    
function hideselectppldiv(){
    $("#selectppldiv").fadeOut();
    
}
var fg=0;
function myfileupload(a)
{
var chk=0;
cntfile=0;
   for(fg=0;fg<a.files.length;fg++)
   {
       if(fg===0)
       {
            $('#justAddedCont').html('');
            $("#uploadimagesdiv").html('');
            $("#NewPostMediaCont").html('');
       }
     var filename = a.files[fg].name;
     var filetype=a.files[fg].type;
     
     if(filetype.indexOf("mage")>0)
     {
         
            chk=1;
            
     if (a.files && a.files[fg]) {
        gy=0;

                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(a.files[fg]);
                $("#NewPostMediaCont").html("");
            }
            else{
                alert("Please Choose a file to Upload ");
                
            } 
     }else{
       
       
         $('#justAddedCont').fadeIn();
        
           if(filetype.indexOf("udio")>0 )
           {
               chk=2;
                $('#justAddedCont').append('<div id="NpItsOtherFiles">\
                                                     <div id="JustAddFileDetail">\
                                                         <img id="NpJAvidicon" src="icons/audio-pre.png" /><div id="NPJAfType"></div> \
                                                           '+filename+'</div>\
                                                    <span id="myvideofile" style="display:none;"></span>\
                                                 </div>');
           }
     var vid1=filename.indexOf(".flv");
     var vid2=filetype.indexOf("ideo/");
   
     if(vid2>0 || vid2>0)
     {
         chk=3;
          $('#justAddedCont').append('<div id="NpItsOtherFiles">\
                                                     <div id="JustAddFileDetail">\
                                                         <img id="NpJAvidicon" src="icons/video-pre.png" /><div id="NPJAfType"></div> \
                                                           '+filename+'</div>\
                                                    <span id="myvideofile" style="display:none;"></span>\
                                                 </div>');
     }
     
            var pdf=filename.indexOf("pplication/pdf");
            if(pdf>0)
            {
                chk=4;
                 $('#justAddedCont').append('<div id="NpItsOtherFiles">\
                                                     <div id="JustAddFileDetail">\
                                                         <img id="NpJAvidicon" src="icons/pdf.png" /><div id="NPJAfType"></div> \
                                                           '+filename+'</div>\
                                                    <span id="myvideofile" style="display:none;"></span>\
                                                 </div>');
            }
     
       
          if(chk!==1 && chk!==2 && chk!==3 && chk!==4)
          {
              $('#justAddedCont').append('<div id="NpItsOtherFiles">\
                                                     <div id="JustAddFileDetail">\
                                                         <img id="NpJAvidicon" src="icons/ufile.png" /><div id="NPJAfType"></div> \
                                                           '+filename+'</div>\
                                                    <span id="myvideofile" style="display:none;"></span>\
                                                 </div>');
          }
         
     }
           
   }
     $("#tot_img_prev_cnt").val(cntfile);
  
}

    function imageIsLoaded(e) {
      
   
       var dfgh=e.target.result.indexOf("image");
        if(dfgh>0)
        {
            cntfile=cntfile+1;
           
         $("#tot_img_prev_cnt").val(cntfile);
            $("#uploadimagesdiv").append("&nbsp;&nbsp;&nbsp;<img src=\""+e.target.result+"\" id=\"srcimg"+cntfile+"\" class=\"NewPostJustAddedImg\"  &nbsp;&nbsp;&nbsp;>");
            $("#NewPostMediaCont").append("&nbsp;&nbsp;&nbsp;<img src=\""+e.target.result+"\" id=\"compimg"+cntfile+"\" class=\"postImagePreview_multi_img\"  &nbsp;&nbsp;&nbsp;>");
            nowcompress();
        }
        
     
    }

function open_update_page(page_id)
{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
        
             $("#for_update_page").html(xmlhttp.responseText);
            
            }else{
                
            }
        }
       
    xmlhttp.open("GET","poster_details.php?"+det_cont,true);
    xmlhttp.send();
}

function updatepage(page_id)
{
      
       var pagename=$('#pageName').val();
       var color=$('#myOrgThme').val();
       
       var txt_clr=$('#myTextClr').val();
      
       var abt_page=$('#about_page').val();
       var who_can_post=$('#who_can_post').val();
       var alloe_name=$('#allow_myname').val();
       var website=$('#page_website').val();
       var slogan=$('#slogan').val();
       var aim=$('#aim_page').val();
       var page_for=$('#page_for').val();
       var app_style=$('#app_style').val();
       var page_pic=$('#page_pic').prop('files')[0];
       var wall_pic=$('#page_wall_pic').prop('files')[0];
       var fmdt=new FormData();
       fmdt.append('page_name',pagename);
       fmdt.append('title_bar_clr',color);
       fmdt.append('txt_clr',txt_clr);
       fmdt.append('abt_page',abt_page);
       fmdt.append('who_can_post',who_can_post);
       fmdt.append('allow_name',alloe_name);
       fmdt.append('website',website);
       fmdt.append('slogan',slogan);
       fmdt.append('aim',aim);
       fmdt.append('page_for',page_for);
       fmdt.append('app_style',app_style);
       fmdt.append('page_pic',page_pic);
       fmdt.append('wall_pic',wall_pic);
       
       fmdt.append('page_id',page_id);
       
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
            alert(xmlhttp.responseText).fadeIn();
           }
          }
            xmlhttp.open("POST","updatepage_prcs.php?",true);
            xmlhttp.send(fmdt);
}
function put_page_pic(pic,fors)
{
      
       var r=new FileReader();
       r.onload=(function(e)
       {
            
       if(fors===1)
       {
            
              $('.pageProfPic').html('<img src='+e.target.result+' />').fadeIn();
         
              $('.emptyPageProfPic').fadeOut();
       }else
       {
              style=""
              //$('.pageWallPic').html('<img src='+e.target.result+' />').fadeIn();
                   $('.emptyPageWallPic').css({'background-image': 'url("'+e.target.result+'")'});
       }
       });
       r.readAsDataURL(pic.files[0]);
}

function show_group_members(page_id)
{
       
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
           $(".PGM_Inner").html(xmlhttp.responseText).fadeIn();
           }
          }
            xmlhttp.open("POST","../web/show_grp_mems.php?page_id="+page_id,true);
            xmlhttp.send();
}

function add_group_members(page_id)
{
      
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
               
          $("#for_add_members").html(xmlhttp.responseText).fadeIn();
           }
          };
            xmlhttp.open("POST","../web/add_grp_members.php?page_id="+page_id,true);
            xmlhttp.send();
}
function add_mems_to_group()
{
       var page_id=$("#group_id").val();
       var  totcnt=$("#chkalrdclkd").val();
        var t=0;
        var fmdt=new FormData();
      
        for(t=1;t<=totcnt;t++)
        {
               var user="#grp_added_mems"+t;
               
              
               var users=$(user).val();
               fmdt.append('users',users);
               
               fmdt.append('page_id',page_id);
              
                var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
               
          $("#selectppldiv").fadeOut();
          show_group_members(page_id);
           }
          };
            xmlhttp.open("POST","../web/add_grp_members_prcs.php?",true);
            xmlhttp.send(fmdt); 
        }
      
}
function remove_mem(page_id,mem_id)
{
       var cont="page_id="+page_id+"&mem_id="+mem_id;
                var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
               $("#mem_jold"+mem_id+"").remove();
       
           }
          }
            xmlhttp.open("POST","../web/remove_grp_members.php?"+cont,true);
            xmlhttp.send(); 
}