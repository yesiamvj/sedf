function createnewpage(page_id)
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
            window.location.href='../'+pagename+'';
          
           }
          }
            xmlhttp.open("POST","createpage_prcs.php?",true);
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
              
              //$('.pageWallPic').html('<img src='+e.target.result+' />').fadeIn();
                   $('.emptyPageWallPic').css({'background-image': 'url("'+e.target.result+'")'});
       }
       });
       r.readAsDataURL(pic.files[0]);
}

function createnewgroup(page_id)
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
             
         $("#result_div").html(xmlhttp.responseText);
            alertTt("Success");
           }
          };
            xmlhttp.open("POST","creategroup_prcs.php?",true);
            xmlhttp.send(fmdt);
}
function open_add_members()
{
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
           $("#for_add_members").html(xmlhttp.responseText).fadeIn();
           }
          }
            xmlhttp.open("POST","add_members.php?q="+56,true);
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
        if(a===3)
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

function check_pagename(user)
{
         var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if(xmlhttp.readyState===4 && xmlhttp.status===200) {
           $("#username_relst").html(xmlhttp.responseText).fadeIn();
           }
          }
            xmlhttp.open("POST","check_page_name.php?q="+user,true);
            xmlhttp.send();   
}

function updategroup(page_id)
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
               
          $('#updt_grp_result').html(xmlhttp.responseText);
          
           
           }
          }
            xmlhttp.open("POST","update_group_prcs.php?",true);
            xmlhttp.send(fmdt);
}