
function x_win_share(thist,thatt){
    
    if(document.getElementById(thist).checked===true){
                                        document.getElementById(thist).checked=false;
                                        $(thatt).slideUp();
                                    }
                                    else{
                                         document.getElementById(thist).checked=true;
                                         $(thatt).slideDown();
                                    }
                                    
}
function sharepost(postid,cnt)
{
           
    //x-win-share-chk-friends
    var cy=0;
      var ageto=$("#xWinShmxAge"+cnt+"").val();
        var agefrom=$("#xWinShmnAge"+cnt+"").val();
  

    var gid="x-win-share-chk-group"+cnt;
    var roomid="x-win-share-chk-room"+cnt;
    var specificid="x-win-share-chk-specific"+cnt;
    var allpep="x-win-share-chk-all"+cnt;
    var nboard="x-win-share-chk-nBoard"+cnt;
    var maleid="male"+cnt;
    var femaleid="female"+cnt;
    var ageid="age"+cnt;
    var statusid="statu"+cnt;
    var posid="position"+cnt;
    var moodid="mood"+cnt;
    var friends;
    var groups;
    var room;
    var allppl;
    var allrel=0;
    var noticebrd;
    var specifics;
    var male;
    var female;
    var age;
    var status;
    var position;
    var mood;
    var shrplace;
    var frdcnt=$("#chkalrdclkd").val();
  
 
     var plcid="x-win-share-chk-plce"+cnt;
     var shrfrds="x-win-share-chk-friends"+cnt;

                       if(document.getElementById(plcid).checked===true)
                       {
                            shrplace=1;
                       }else
                       {
                            shrplace=0;
                       }
                       
                       
                       if(document.getElementById(shrfrds).checked===true)
                       {
                            friends=1;
                       }else
                       {
                            friends=0;
                       }
                        
    if(document.getElementById(gid).checked===true)
    {
        groups=1;
    }else{
        groups=0;
    }


    room=0;

    if(document.getElementById(specificid).checked===true)
    {
        specifics=1;
        if(document.getElementById(allpep).checked===true)
        {
            allppl=1;

        }else{
            allppl=0;
        }

                    if(document.getElementById(moodid).checked===true)
                       {
                            var moodvalid="#moodoption"+cnt;
                            var mood=$(moodvalid).val();
                       }else
                       {
                            mood=0;
                       }


    if(document.getElementById(nboard).checked===true)
    {
        noticebrd=1;
    }else{
        noticebrd=0;
    }

    if(document.getElementById(maleid).checked===true)
    {
        
        male=1;
    }else{
        male=0;
    }
    

    if(document.getElementById(femaleid).checked===true)
    {
         female=1;
    }else{
        female=0;
    }
   
   
      if(document.getElementById(statusid).checked===true)
    {
        status=$("#statuoption"+cnt+"").val();
    }else{
        status=0;
    
    }
    
      if(document.getElementById(posid).checked===true)
    {
         position=$("#positionoption"+cnt+"").val();
    }else{

        position=0;
    }

    
      

    }else{
        specifics=0;
        female=0;
        male=0;
        mood=0;
        position=0;
        status=0;
        noticebrd=0;
        allppl=0;
    }
   if(frdcnt>0)
   {
          
   }else
   {
        frdcnt=2;  
   }
                        for(cy=1;cy<=frdcnt;cy++)
                        {
	              

                                var shrid="#shareuserid"+cy;
                                var grpid="#groups"+cy;
                                 var shridplc="#shareplace"+cy;
                                   var chk_plc=0;
                                 if(shrplace===1)
                                 {
                                    var shrusersplc=$(shridplc).val();
                                  
                                   if(shrusersplc.length>0)
                                   {
                                    chk_plc=1;   
                                   }
                                    
                                }else{
                                    var shrusersplc=0;
                                }
                                var chk_shruser=0;
                                if(friends===1)
                                {
                                    var shrusers=$(shrid).val();
                                    
                                    if(shrusers>0)
                                    {
                                        chk_shruser=1;
                                    }
                                
                                }else{
                                    var shrusers=0;
                                }
                                var chk_grp=0;
                                if(groups===1)
                                {
                                    var groups_id=$(grpid).val();
                                    
                                    if(groups_id>0)
                                    {
                                        chk_grp=1;
                                    }
                                }else
                                {
                                    var groups=0;
                                }
	               
                                    if((groups===0 || chk_grp===0) && shrplace===0 && specifics===0 && allppl===0 && (chk_shruser===0 || friends===0) && allrel===0 && position===0 && mood===0 && status===0 && agefrom==="" && ageto==="" && noticebrd===0 && chk_grp===0 && chk_plc===0)
                                    {
                                       
                                    }else
                                    {
		          var sum= $('.share_cnt'+cnt).text();
  
  sum=sum-1+1;
  if(cy==1)
  {
  $('.share_cnt'+cnt).text(sum+1);
         
  }
                                         $(".xWindowSubmit").html("Sharing...Please wait");
                                         
                                    var share_contents="postid="+postid+"&specificppl="+shrusers+"&place="+shrusersplc+"&group="+groups+"&mal="+male+"&femal="+female+"&room="+room+"&allpeople="+allppl+"&allrelation="+allrel+"&specificoption="+specifics+"&agesfrom="+agefrom+"&agesto="+ageto+"&stat="+status+"&posi="+position+"&moods="+mood+"&notboard="+noticebrd+"&group_id="+groups_id+"&cnt="+cy;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
              $(".xWindowSubmit").html(xmlhttp.responseText);
            }
        }
        xmlhttp.open("post", "sharepost.php?"+share_contents, true);
        xmlhttp.send();  
                                    }
       

                        }
                                //
 
        
}
function showtoshare(b,postid)
{
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
              $("#add_people_div").html(xmlhttp.responseText);
            }
        }
        xmlhttp.open("post", "add_members_share.php?", true);
        xmlhttp.send();  
    
}
