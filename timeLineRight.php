<?php session_commit();

 include '../web/timelineright_q.php';

 
  function printcommonRels($contUsrId,$contName){
         if($contName!=="~")
         {
                $lnks=' <a href="http://sedfed.com/'.$contUsrId.'">';
                $lnke='</a>';
         }  else {
                 $lnks=' ';
                $lnke='';
         }
        echo '<div class="MP_RP_Itm">
                           '.$lnks.'
                                     <img src="../'.$contUsrId.'/ppic25.jpg" title="'.$contName.'" />
                            '.$lnke.'
                        </div>';
    }
    
    
    echo '<div class="MP_RightPane">';
        
    
    echo '
                    <div class="MP_RP_Window">
                    <div class="MP_RPTtl">
                        Common Relations <div class="MP_RP_Cnt">'.$totalNumRel.'</div>
                    </div>
                    <div class="MP_RightPaneCont">';
    
    
   
    $q="select cu_id from contacts where user_id=$owner_id";
    $r= mysqli_query($dbc, $q);
    $totalNumRel=0;
    if($r){
     
    if(mysqli_num_rows($r)>0){
        while($rows=mysqli_fetch_array($r,MYSQLI_ASSOC)){
            $cu_id=$rows['cu_id'];
            $q2="select c_id,c_name from contacts where cu_id=$viewer_id and user_id=$cu_id";
            $r2= mysqli_query($dbc, $q2);
            
            if($r2){
                $rows2= mysqli_fetch_array($r2,MYSQLI_ASSOC);
                if(mysqli_num_rows($r2)>0){
                    $totalNumRel=$totalNumRel+1;
                    $contUsrId=$cu_id;
                    $contName=$rows2['c_name'];
                    printcommonRels($contUsrId,$contName);
            }
            else{
                $totalNumRel=0;
                 echo '  <div class="MP_RP_Itm"> Empty </div> ';
            }
            }
            
        }
        
    }
    
    }
    
    
    
    echo '                    
                        
                    </div>
                    </div>';
                   
    
    
    
    echo '
                    <div class="MP_RP_Window">
                    <div class="MP_RPTtl">
                        Common Groups <div class="MP_RP_Cnt">'.$totalNumRell.'</div>
                    </div>
                    <div class="MP_RightPaneCont">';
    
    
   
    $q="select page_id from page_status where followers=$owner_id";
    $r= mysqli_query($dbc, $q);
    $totalNumRell=0;
    if($r){
     
    if(mysqli_num_rows($r)>0){
        while($rows=mysqli_fetch_array($r,MYSQLI_ASSOC)){
            $page_id=$rows['page_id'];
            $qt="select page_name from pages where page_id=$page_id and groups=1";
            $rt=  mysqli_query($dbc,$qt);
            if($rt){
                if(mysqli_num_rows($rt)>0){
                    $rowt=  mysqli_fetch_array($rt);
                    $contName=$rowt['page_name'];
                    $q2="select page_id from page_status where page_id=$page_id and followers=$viewer_id";
            $r2= mysqli_query($dbc, $q2);
            
            if($r2){
                $rows2= mysqli_fetch_array($r2,MYSQLI_ASSOC);
                if(mysqli_num_rows($r2)>0){
                    $totalNumRell=$totalNumRel+1;
                    $contUsrId=$contName;
                    
                    printcommonRels($contUsrId,$contName);
            }
            else{
                $totalNumRel=0;
                 echo '  <div class="MP_RP_Itm"> Empty </div> ';
            }
            }
                }
                else{
                    $totalNumRell=0;
                     echo '  <div class="MP_RP_Itm"> Empty </div> ';
                }
            }
            
            
        }
        
    }
    
    }
    
    
    
    echo '                    
                        
                    </div>
                    </div>';
                   
    
     
    
    echo '
                    <div class="MP_RP_Window">
                    <div class="MP_RPTtl">
                        Common Pages <div class="MP_RP_Cnt">'.$totalNumRelll.'</div>
                    </div>
                    <div class="MP_RightPaneCont">';
    
    
   
    $q="select page_id from page_status where followers=$owner_id";
    $r= mysqli_query($dbc, $q);
    $totalNumRelll=0;
    if($r){
     
    if(mysqli_num_rows($r)>0){
        while($rows=mysqli_fetch_array($r,MYSQLI_ASSOC)){
            $page_id=$rows['page_id'];
            $qt="select page_name from pages where page_id=$page_id and groups=0";
            $rt=  mysqli_query($dbc,$qt);
            if($rt){
                if(mysqli_num_rows($rt)>0){
                    $rowt=  mysqli_fetch_array($rt);
                    $contName=$rowt['page_name'];
                    $q2="select page_id from page_status where page_id=$page_id and followers=$viewer_id";
            $r2= mysqli_query($dbc, $q2);
            
            if($r2){
                $rows2= mysqli_fetch_array($r2,MYSQLI_ASSOC);
                if(mysqli_num_rows($r2)>0){
                    $totalNumRelll=$totalNumRel+1;
                    $contUsrId=$contName;                   
                    printcommonRels($contUsrId,$contName);
            }
            else{
                $totalNumRelll=0;
                 echo '  <div class="MP_RP_Itm"> Empty </div> ';
            }
            }
                }
                else{
                    $totalNumRelll=0;
                     echo '  <div class="MP_RP_Itm"> Empty </div> ';
                }
            }
            
            
        }
        
    }
    
    }
    
    
    
    echo '                    
                        
                    </div>
                    </div>';
                   
    
      echo '
                    <div class="MP_RP_Window">
                    <div class="MP_RPTtl">
                        Common Group Chats<div class="MP_RP_Cnt">'.$totalNumgrp.'</div>
                    </div>
                    <div class="MP_RightPaneCont">';
          
                  $q="select group_id as g from group_members where members_id=$owner_id";
    $r= mysqli_query($dbc, $q);
   
    if($r)
        {
     
    if(mysqli_num_rows($r)>0)
        {
        while($rows=mysqli_fetch_array($r,MYSQLI_ASSOC)){
            $group_id=$rows['g'];
            $qt="select group_name as gn from groups where group_id=$group_id and battle=0";
            $rt=  mysqli_query($dbc,$qt);
            if($rt)
                {
                if(mysqli_num_rows($rt)>0)
                    {
                    $rowst=  mysqli_fetch_array($rt);
                    $contName=$rowst['gn'];
                    $q2="select group_id as gid from groups where group_id=$group_id and members_id=$viewer_id";
            $r2= mysqli_query($dbc, $q2);
            
            if($r2){
                $rows2= mysqli_fetch_array($r2,MYSQLI_ASSOC);
                if(mysqli_num_rows($r2)>0)
                    {
                    $totalNumgrp=$totalNumgrp+1;
                    $contUsrId='~';
                    
                    printcommonRels($contUsrId,$contName);
            }
            else{
                $totalNumRel=0;
                 //echo '  <div class="MP_RP_Itm"> Empty </div> ';
            }
            }
                }
                else{
                    $totalNumRelll=0;
                    // echo '  <div class="MP_RP_Itm"> Empty </div> ';
                }
            }
            
            
        }
        
    }
        
    echo '                    
                        
                    </div>
                    </div>';
                   
    
    
     
    
          
          
          
          
         
          
            
    
    }
    
    
      
      echo '
                    <div class="MP_RP_Window">
                    <div class="MP_RPTtl">
                        Common Team Chats<div class="MP_RP_Cnt">'.$totalNumgrp.'</div>
                    </div>
                    <div class="MP_RightPaneCont">';
          
                  $q="select group_id as g from group_members where members_id=$owner_id";
    $r= mysqli_query($dbc, $q);
   
    if($r)
        {
     
    if(mysqli_num_rows($r)>0)
        {
        while($rows=mysqli_fetch_array($r,MYSQLI_ASSOC)){
            $group_id=$rows['g'];
            $qt="select group_name as gn from groups where group_id=$group_id and battle=1";
            $rt=  mysqli_query($dbc,$qt);
            if($rt)
                {
                if(mysqli_num_rows($rt)>0)
                    {
                    $rowst=  mysqli_fetch_array($rt);
                    $contName=$rowst['gn'];
                    $q2="select group_id as gid from groups where group_id=$group_id and members_id=$viewer_id";
            $r2= mysqli_query($dbc, $q2);
            
            if($r2){
                $rows2= mysqli_fetch_array($r2,MYSQLI_ASSOC);
                if(mysqli_num_rows($r2)>0)
                    {
                    $totalNumgrp=$totalNumgrp+1;
                    $contUsrId='~';
                    
                    printcommonRels($contUsrId,$contName);
            }
            else{
                $totalNumRel=0;
                 //echo '  <div class="MP_RP_Itm"> Empty </div> ';
            }
            }
                }
                else{
                    $totalNumRelll=0;
                    // echo '  <div class="MP_RP_Itm"> Empty </div> ';
                }
            }
            
            
        }
        
    }
        
    echo '                    
                        
                    </div>
                    </div>';
                   
    
    
    
 
          
          
          
          
         
          
            
    
    }
    
    
      
    echo '                    
                        
                    </div>
                    </div>';
    
    //
   echo      '</div>';
        

?>