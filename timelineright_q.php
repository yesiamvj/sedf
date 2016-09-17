<?php session_commit();
   require_once '../web/mysqli_connect.php';
   
    $q="select cu_id from contacts where user_id=$owner_id";
    $r= mysqli_query($dbc, $q);
    $totalNumRel=0;
    if($r){
    if(mysqli_num_rows($r)>0){
        while($rowsx=mysqli_fetch_array($r,MYSQLI_ASSOC)){
            $cu_id=$rowsx['cu_id'];
            $q2="select c_id,c_name from contacts where cu_id=$cu_id and user_id=$viewer_id";
            $r2= mysqli_query($dbc, $q2);
            
            if($r2){
                $rows2= mysqli_fetch_array($r2,MYSQLI_ASSOC);
                if(mysqli_num_rows($r2)>0){
                    $totalNumRel=$totalNumRel+1;
                   // $contUsrId=$cu_id;
                    //$contName=$rows2['c_name'];
                  //  printcommonRels($contUsrId,$contName);
            }
           
            }
            
        }
        
    } else{
                $totalNumRel=0;
                
            }
    }
    
    
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
                    $contUsrId=$page_id;
                    
                   
            }
            else{
                $totalNumRel=0;
                
            }
            }
                }
                
            }
            
            
        }
        
    } 
    
    }
    
    $totalNumRelll=0;
    $q="select page_id from page_status where followers=$owner_id";
    $r= mysqli_query($dbc, $q);
    
    if($r)
        {
     
    if(mysqli_num_rows($r)>0){
        while($rows=mysqli_fetch_array($r,MYSQLI_ASSOC)){
            $page_id=$rows['page_id'];
            $qt="select page_name from pages where page_id=$page_id and groups=0";
            $rt=  mysqli_query($dbc,$qt);
            if($rt)
                {
                if(mysqli_num_rows($rt)>0)
                    {
                    $rowt=  mysqli_fetch_array($rt);
                    $contName=$rowt['page_name'];
                    $q2="select page_id from page_status where page_id=$page_id and followers=$viewer_id";
            $r2= mysqli_query($dbc, $q2);
            
            if($r2){
                $rows2= mysqli_fetch_array($r2,MYSQLI_ASSOC);
                if(mysqli_num_rows($r2)>0)
                    {
                    $totalNumRelll=$totalNumRel+1;
                    $contUsrId=$page_id;
                    
                   
            }
            else{
                $totalNumRel=0;
                
            }
            }
                }
              
            }
            
            
        }
        
    } 
    
    }
    
    
    $totalNumgrp=0;
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
                    $contUsrId=$group_id;
                    
                    //printcommonRels($contUsrId,$contName);
            }
            else{
                $totalNumRel=0;
                
            }
            }
                }
               
            }
            
            
        }
        
    } 
    
    }
   
    
?>