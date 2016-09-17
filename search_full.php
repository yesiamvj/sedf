
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
     require 'mysqli_connect.php';
    $search_cont= mysqli_real_escape_string($dbc,trim($_REQUEST['my']));
   
     $n=0;
     $category=$_REQUEST['catgry'];
     
   
     switch ($category)
     {
         case "Name":
             $q1="select first_name as f ,nativeplace as np,user_id as u,sex as s,age as ag from basic where first_name regexp '$search_cont' or nick_name regexp '$search_cont' order by first_name and nick_name ";
             $q2="";
             $q3="";
             break;
         case "Mobile No":
             
              $q1="select user_id as u from users where mobno regexp '$search_cont'  order by mobno ";
             $q2="mobile";
             $q3="";
            break;
         case "SedFed ID":
             $q1="select first_name as f ,nativeplace as np,user_id as u,sex as s,age as ag from basic where user_id regexp '$search_cont'  order by user_id ";
             $q2="";
             $q3="";
             break;
         case "Email":
                $q1="select user_id as u from users where email regexp '$search_cont'  order by email ";
             $q2="email";
             $q3="";
              break;
        case "Place":
        $q1="select first_name as f ,nativeplace as np,user_id as u,sex as s,age as ag from basic where nativeplace regexp '$search_cont'  order by nativeplace ";
       $q2="";
       $q3="";
       break;
    case "School / College":
        $q1="select user_id as u from scl_detail where scl regexp '$search_cont'";
       $q2="select clg as c from college where clg regexp '$search_cont'";
       $q3="highscl";
       break;
            
         case "Poster Name":
             $q1="select user_id as u from basic where first_name regexp '$search_cont' ";
              $q2="postername";
              $q3="post";
              break;
         case "Post Caption":
                $q1="select user_id as u from postforall where post_caption regexp '$search_cont' ";
                $q2="";
                $q3="";
                break;
              case "Post Caption":
              $q1="select user_id as u from postforall where post_id regexp '$search_cont' ";
              $q2="";
              $q3="";
              break;
              case "Sender Name":
              $q1="select user_id as u from postforall where post_id regexp '$search_cont' ";
              $q2="";
              $q3="";
              break;
              case "Message Text":
              $q1="select user_id as u from postforall where post_id regexp '$search_cont' ";
              $q2="";
              $q3="";
              break;
               case "Flash Message":
       $q1="select user_id as u,flash as f,time as t from flash_news where flash regexp '$search_cont'  order by flash_id desc";
       $q2="";
       $q3="";
       break;
         case "Flash ID":
                $q1="select user_id as u,flash as f,time as t from flash_news where flash_id regexp '$search_cont'  order by flash_id desc";
              $q2="";
              $q3="";
              break;
       
         case "Name of Person":
                 $q1="select user_id as u ,sex as s ,age as ag,first_name as f,nativeplace as np from basic where first_name regexp '$search_cont' ";
              $q2="";
              $q3="";
              break;
                case "Group/Page ID":
                $q1="select user_id as u ,sex as s ,age as ag,first_name as f,nativeplace as np from basic where first_name regexp '$search_cont' limit 10";
              $q2="";
              $q3="";
            
              
               case "Group/Page ID":
                $q1="select user_id as u ,sex as s ,age as ag,first_name as f,nativeplace as np from basic where first_name regexp '$search_cont' limit 10";
              $q2="";
              $q3="";
      default:
        $q1="select first_name as f ,nativeplace as np,user_id as u,sex as s,age as ag from basic where first_name regexp '$search_cont' or nick_name regexp '$search_cont' order by first_name and nick_name ";
             $q2="";
             $q3="";
             break;
        
             
     }

     
      if($category!="Poster Name" && $category!=="Post Caption" && $category!=="Post ID" && $category!=="Sender Name" && $category!=="Message Text" && $category!=="Flash Message" && $category!=="Flash ID" && $category!=="Name of Person" && $category!=="Group/Page Name" && $category!=="Group/Page ID")
     {      
        
     if($q2=='')
     {
        
           $r1=  mysqli_query($dbc, $q1);
    if($r1)
    {
       
        if(mysqli_num_rows($r1)>0)
        {
          
            while($row= mysqli_fetch_array($r1,MYSQLI_ASSOC))
            {
                $n=$n+1;
                $people_id=$row['u'];
                $people_name=$row['f'];
                $sex=$row['s'];
                $native=$row['np'];
                $age=$row['ag'];
                if($sex=="girl")
                {
                    $sex="Female";
                }else
                {
                    $sex="Male";
                }
               
                  $quq="select username as u from users where user_id=$people_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
                  $vrf="Not Verified";
                $q4="select veryfied_times as f from verify where user_id=$people_id";
                $r4=  mysqli_query($dbc, $q4);
                if($r4)
                {
	    
	      if(mysqli_num_rows($r4)>4)
	      {
	             $vrf="Veified";
	      }
                }
                $q4="select user_id as u from my_verify where user_id=$people_id";
                $r4=mysqli_query($dbc,$q4);
                if($r4)
                {
	      if(mysqli_num_rows($r4)>0)
	      {
	             $vrf="Verified";
	      }
                }
                 $quq="select username as u from users where user_id=$people_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                echo ' <a href="../'.$ppl_usrename.'" ><div class="SF_SrchResultItmPpl">
                          <div class="SrchPplThme"></div>
                          <div class="SrchResPplFace">
                              <img class="img_SrchReslt" src="'.$p_pic.'" />
                          </div>
                          <div class="SrchResPplDets">
                              <div class="SrchPplNme">
                                  '.$people_name.'
                              </div>
                              <div class="SrchPplExtra">
                                '.$age.'   <span class="Srchdivider">|</span> '.$sex.' <span class="Srchdivider">|</span> '.$vrf.'
                              </div>
                          </div>
                      </div></a>';
            }
        }
    }  else {
         
    }
     }else
     {
          if($q2=="mobile")
         {
             if(strlen($search_cont)>8)
             {
                 $r1=  mysqli_query($dbc, $q1);
             }else
             {
                 $q1="select user_id from users where user_id=0";
                 $r1=  mysqli_query($dbc, $q1);
             }
         }  else {
           
             $r1=  mysqli_query($dbc, $q1);
         }
       
         if($r1)
         {
            
             if(mysqli_num_rows($r1)>0)
             {
                 while($rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
                 {
                     $people_id=$rows['u'];
                      $n=$n+1;
                   
                          $q2="select first_name as f ,nativeplace as np,user_id as u,sex as s,age as ag from basic where user_id =$people_id  order by user_id ";
           
                     
                     $r2=  mysqli_query($dbc, $q2);
                     if($r2)
                     {
                         $row=  mysqli_fetch_array($r2,MYSQLI_ASSOC);
                               $people_name=$row['f'];
                $sex=$row['s'];
                $native=$row['np'];
                $age=$row['ag'];
                if($sex=="girl")
                {
                    $sex="Female";
                }else
                {
                    $sex="Male";
                }
                $quq="select username as u from users where user_id=$people_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
                $q4="select veryfied_times as f from verify where user_id=$people_id";
                $r4=  mysqli_query($dbc, $q4);
                if($r4)
                {
	      $vrf="Not Verified";
	      if(mysqli_num_rows($r4)>4)
	      {
	             $vrf="Verified";
	      }
                }
                $q4="select user_id as u from my_verify where user_id=$people_id";
                $r4=mysqli_query($dbc,$q4);
                if($r4)
                {
	      if(mysqli_num_rows($r4)>0)
	      {
	             $vrf="Verified";
	      }
                }
          
                echo ' <a href="../'.$ppl_usrename.'" ><div class="SF_SrchResultItmPpl">
                          <div class="SrchPplThme"></div>
                          <div class="SrchResPplFace">
                              <img class="img_SrchReslt" src="'.$p_pic.'" />
                          </div>
                          <div class="SrchResPplDets">
                              <div class="SrchPplNme">
                                  '.$people_name.'
                              </div>
                              <div class="SrchPplExtra">
                                '.$age.'   <span class="Srchdivider">|</span> '.$sex.' <span class="Srchdivider">|</span> '.$vrf.'
                              </div>
                          </div>
                      </div></a>';
                         
                     }
                 }
                 
                 if($q3!=="")
                 {
                     $q2="select user_id as u from hsc_detail where hsc_name regexp '$search_cont'  ";
                     $r2=  mysqli_query($dbc, $q2);
                     if($r2)
                     {
                         if(mysqli_num_rows($r2)>0)
                         {
                             while($rows=  mysqli_fetch_array($r2,MYSQLI_ASSOC))
                             {
                                  $n=$n+1;
                                 $people_id=$rows['u'];
                                  $q1="select first_name as f ,nativeplace as np,user_id as u,sex as s,age as ag from basic where user_id='$people_id' ";
                                  $r4=mysqli_query($dbc,$q1);
                                  if($r4)
                                  {
                                      if(mysqli_num_rows($r4)>0)
                                      {
                                          $row=  mysqli_fetch_array($r4,MYSQLI_ASSOC);
                                          
                $people_name=$row['f'];
                $sex=$row['s'];
                $age=$row['ag'];
                $native=$row['np'];
                if($sex=="girl")
                {
                    $sex="Female";
                }else
                {
                    $sex="Male";
                }
              
                    $q4="select veryfied_times as f from verify where user_id=$people_id";
                $r4=  mysqli_query($dbc, $q4);
                if($r4)
                {
	      $vrf="Not Verified";
	      if(mysqli_num_rows($r4)>4)
	      {
	             $vrf="Verified";
	      }
                }
                $q4="select user_id as u from my_verify where user_id=$people_id";
                $r4=mysqli_query($dbc,$q4);
                if($r4)
                {
	      if(mysqli_num_rows($r4)>0)
	      {
	             $vrf="Verified";
	      }
                }
            $quq="select username as u from users where user_id=$people_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
                echo ' <a href="../'.$ppl_usrename.'" ><div class="SF_SrchResultItmPpl">
                          <div class="SrchPplThme"></div>
                          <div class="SrchResPplFace">
                              <img class="img_SrchReslt" src="'.$p_pic.'" />
                          </div>
                          <div class="SrchResPplDets">
                              <div class="SrchPplNme">
                                  '.$people_name.'
                              </div>
                              <div class="SrchPplExtra">
                                '.$age.'   <span class="Srchdivider">|</span> '.$sex.' <span class="Srchdivider">|</span> '.$vrf.'
                              </div>
                          </div>
                      </div></a>';
                         
                                          
                                      }
                                  }
      
                                
                             }
                         }
                     }
                      
                       $q2="select user_id as u from college where clg regexp '$search_cont' ";
                     $r2=  mysqli_query($dbc, $q2);
                     if($r2)
                     {
                         if(mysqli_num_rows($r2)>0)
                         {
                             while($rows=  mysqli_fetch_array($r2,MYSQLI_ASSOC))
                             {
                                  $n=$n+1;
                                 $people_id=$rows['u'];
                                  $q1="select first_name as f ,nativeplace as np,user_id as u,sex as s,age as ag from basic where user_id='$people_id' ";
                                  $r4=mysqli_query($dbc,$q1);
                                  if($r4)
                                  {
                                      if(mysqli_num_rows($r4)>0)
                                      {
                                          $row=  mysqli_fetch_array($r4,MYSQLI_ASSOC);
                                          
                $people_name=$row['f'];
                $sex=$row['s'];
                $age=$row['ag'];
                $native=$row['np'];
                if($sex=="girl")
                {
                    $sex="Female";
                }else
                {
                    $sex="Male";
                }
                  $quq="select username as u from users where user_id=$people_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
                     $q4="select veryfied_times as f from verify where user_id=$people_id";
                $r4=  mysqli_query($dbc, $q4);
                if($r4)
                {
	      $vrf="Not Verified";
	      if(mysqli_num_rows($r4)>4)
	      {
	             $vrf="Verified";
	      }
                }
                $q4="select user_id as u from my_verify where user_id=$people_id";
                $r4=mysqli_query($dbc,$q4);
                if($r4)
                {
	      if(mysqli_num_rows($r4)>0)
	      {
	             $vrf="Verified";
	      }
                }
            $quq="select username as u from users where user_id=$people_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                echo ' <a href="../'.$ppl_usrename.'" ><div class="SF_SrchResultItmPpl">
                          <div class="SrchPplThme"></div>
                          <div class="SrchResPplFace">
                              <img class="img_SrchReslt" src="'.$p_pic.'" />
                          </div>
                          <div class="SrchResPplDets">
                              <div class="SrchPplNme">
                                  '.$people_name.'
                              </div>
                              <div class="SrchPplExtra">
                                '.$age.'   <span class="Srchdivider">|</span> '.$sex.' <span class="Srchdivider">|</span> '.$vrf.'
                              </div>
                          </div>
                      </div></a>';
                                          
                                      }
                                  }
      
                                
                             }
                         }
                     }
                    
                 }
             }  else {
                   if($q3!=="")
                 {
                   
                     $q2="select user_id as u from hsc_detail where hsc_name regexp '$search_cont'  ";
                     $r2=  mysqli_query($dbc, $q2);
                     if($r2)
                     {
                         if(mysqli_num_rows($r2)>0)
                         {
                             while($rows=  mysqli_fetch_array($r2,MYSQLI_ASSOC))
                             {
                                  $n=$n+1;
                                 $people_id=$rows['u'];
                                  $q1="select first_name as f ,nativeplace as np,user_id as u,sex as s,age as ag from basic where user_id='$people_id' ";
                                  $r4=mysqli_query($dbc,$q1);
                                  if($r4)
                                  {
                                      if(mysqli_num_rows($r4)>0)
                                      {
                                          $row=  mysqli_fetch_array($r4,MYSQLI_ASSOC);
                                          
                $people_name=$row['f'];
                $sex=$row['s'];
                $age=$row['ag'];
                $native=$row['np'];
                if($sex=="girl")
                {
                    $sex="Female";
                }else
                {
                    $sex="Male";
                }
                 $quq="select username as u from users where user_id=$people_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
                   $q4="select veryfied_times as f from verify where user_id=$people_id";
                $r4=  mysqli_query($dbc, $q4);
                if($r4)
                {
	      $vrf="Not Verified";
	      if(mysqli_num_rows($r4)>4)
	      {
	             $vrf="Verified";
	      }
                }
                $q4="select user_id as u from my_verify where user_id=$people_id";
                $r4=mysqli_query($dbc,$q4);
                if($r4)
                {
	      if(mysqli_num_rows($r4)>0)
	      {
	             $vrf="Verified";
	      }
                }
            $quq="select username as u from users where user_id=$people_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                echo ' <a href="../'.$ppl_usrename.'" ><div class="SF_SrchResultItmPpl">
                          <div class="SrchPplThme"></div>
                          <div class="SrchResPplFace">
                              <img class="img_SrchReslt" src="'.$p_pic.'" />
                          </div>
                          <div class="SrchResPplDets">
                              <div class="SrchPplNme">
                                  '.$people_name.'
                              </div>
                              <div class="SrchPplExtra">
                                '.$age.'   <span class="Srchdivider">|</span> '.$sex.' <span class="Srchdivider">|</span> '.$vrf.'
                              </div>
                          </div>
                      </div></a>';        
                                      }
                                  }
      
                                
                             }
                         }
                     }
                     
                       $q2="select user_id as u from college where clg regexp '$search_cont'  ";
                     $r2=  mysqli_query($dbc, $q2);
                     if($r2)
                     {
                         if(mysqli_num_rows($r2)>0)
                         {
                             while($rows=  mysqli_fetch_array($r2,MYSQLI_ASSOC))
                             {
                                  $n=$n+1;
                                 $people_id=$rows['u'];
                                  $q1="select first_name as f ,nativeplace as np,user_id as u,sex as s,age as ag from basic where user_id='$people_id' ";
                                  $r4=mysqli_query($dbc,$q1);
                                  if($r4)
                                  {
                                      if(mysqli_num_rows($r4)>0)
                                      {
                                          $row=  mysqli_fetch_array($r4,MYSQLI_ASSOC);
                                          
                $people_name=$row['f'];
                $sex=$row['s'];
                $age=$row['ag'];
                $native=$row['np'];
                if($sex=="girl")
                {
                    $sex="Female";
                }else
                {
                    $sex="Male";
                }
                 $quq="select username as u from users where user_id=$people_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
       $q4="select veryfied_times as f from verify where user_id=$people_id";
                $r4=  mysqli_query($dbc, $q4);
                if($r4)
                {
	      $vrf="Not Verified";
	      if(mysqli_num_rows($r4)>4)
	      {
	             $vrf="Verified";
	      }
                }
                $q4="select user_id as u from my_verify where user_id=$people_id";
                $r4=mysqli_query($dbc,$q4);
                if($r4)
                {
	      if(mysqli_num_rows($r4)>0)
	      {
	             $vrf="Verified";
	      }
                }
            $quq="select username as u from users where user_id=$people_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                echo ' <a href="../'.$ppl_usrename.'" ><div class="SF_SrchResultItmPpl">
                          <div class="SrchPplThme"></div>
                          <div class="SrchResPplFace">
                              <img class="img_SrchReslt" src="'.$p_pic.'" />
                          </div>
                          <div class="SrchResPplDets">
                              <div class="SrchPplNme">
                                  '.$people_name.'
                              </div>
                              <div class="SrchPplExtra">
                                '.$age.'   <span class="Srchdivider">|</span> '.$sex.' <span class="Srchdivider">|</span> '.$vrf.'
                              </div>
                          </div>
                      </div></a>';
                                                                          
                                      }
                                  }
      
                                
                             }
                         }
                     }
                    
                 }
             }
         }else
         {
             
         }
     }
       
     }
   
      
     if($category=="Poster Name")
     {
         
         $r=mysqli_query($dbc, $q1);
         if($r)
         {
            
             if(mysqli_num_rows($r)>0)
             {
                
                 while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
                 {
                     $poster_user_id=$row['u'];
              
                     $q1="select post_id as p,post_caption as pc,post_time as t from postforall where user_id=$poster_user_id ";
                 
                     $r1=  mysqli_query($dbc, $q1);
                     if($r1)
                     {
                         if(mysqli_num_rows($r1)>0)
                         {
                             while($rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
                             {
                                 $n=$n+1;
                                 $post_id=$rows['p'];
                                 $pos_caption=$rows['pc'];
                                 $post_time=$rows['t'];
                                 $qa="select first_name as f,sex as s from basic where user_id=$poster_user_id";
                                 $ra=  mysqli_query($dbc, $qa);
                                 if($ra)
                                 {
                                     if(mysqli_num_rows($ra)>0)
                                     {
                                         $et=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                         $sex=$et['s'];
                                         $people_name=$et['f'];
                                     }else
                                     {
                                         $sex="Male";
                                           $people_name="";
                                     }
                                 }
               
                           $quq="select username as u from users where user_id=$poster_user_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
                
                                    echo ' <div class="SF_SrchResultItmPpl">
                          <div class="SrchPplThme"></div>
                          <div class="SrchResPplFace">
                              <img class="img_SrchReslt" src="'.$p_pic.'" />
                          </div>
                          <div class="SrchResPplDets">
                             <a href="../'.$ppl_usrename.'" > <div class="SrchPplNme">
                                  '.$people_name.'\'s Post
                              </div></a>
                              <div class="SrchPplExtra">
                                  Post No : '.$post_id.' <span class="Srchdivider">|</span> '.$post_time.'
                              </div>
                          </div>
                      </div>';
                                 
                                 
                             }
                         }
                     }else
                     {
                         
                         echo mysqli_error($dbc);
                     }
                 }
             }
         }else
         {
             //echo mysqli_error($dbc);
             
         }
     }
     if($category=="Post Caption")
     {
         
            $q1="select post_id as p ,user_id as u,post_caption as pc,post_time as t from postforall where post_caption regexp '$search_cont' ";
            $r=  mysqli_query($dbc, $q1);
            if($r)
            {
	  if(mysqli_num_rows($r)>0)
	  {
	         while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	         {
	                $n=$n+1;
	                $user_id=$row['u'];
	                $post_id=$row['p'];
	                $poster_user_id=$row['u'];
	                $pos_caption=$row['pc'];
	                $post_time=$row['t'];
	             $qa="select first_name as f,sex as s from basic where user_id=$poster_user_id";
                                 $ra=  mysqli_query($dbc, $qa);
                                 if($ra)
                                 {
                                     if(mysqli_num_rows($ra)>0)
                                     {
                                         $et=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                         $sex=$et['s'];
                                         $people_name=$et['f'];
                                     }else
                                     {
                                         $sex="Male";
                                           $people_name="";
                                     }
                                 }
                  $quq="select username as u from users where user_id=$poster_user_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
                     
                
                   echo ' <div class="SF_SrchResultItmPpl">
                          <div class="SrchPplThme"></div>
                          <div class="SrchResPplFace">
                              <img class="img_SrchReslt" src="'.$p_pic.'" />
                          </div>
                          <div class="SrchResPplDets">
                             <a href="../'.$ppl_usrename.'" > <div class="SrchPplNme">
                                  '.$people_name.'\'s Post
                              </div></a>
                              <div class="SrchPplExtra">
                                  Post No : '.$post_id.' <span class="Srchdivider">|</span> '.$post_time.'
                              </div>
                          </div>
                      </div>';
                                 
	         }
	  }
            }
	  
     }
     
     if($category=="Post ID")
     {
               $q1="select post_id as p ,user_id as u,post_caption as pc,post_time as t from postforall where post_id regexp '$search_cont' ";
            $r=  mysqli_query($dbc, $q1);
            if($r)
            {
	  if(mysqli_num_rows($r)>0)
	  {
	         while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	         {
	                $n=$n+1;
	                $post_id=$row['p'];
	                $poster_user_id=$row['u'];
	                $pos_caption=$row['pc'];
	                $post_time=$row['t'];
	             $qa="select first_name as f,sex as s from basic where user_id=$poster_user_id";
                                 $ra=  mysqli_query($dbc, $qa);
                                 if($ra)
                                 {
                                     if(mysqli_num_rows($ra)>0)
                                     {
                                         $et=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                         $sex=$et['s'];
                                         $people_name=$et['f'];
                                     }else
                                     {
                                         $sex="Male";
                                           $people_name="";
                                     }
                                 }
              
                      $quq="select username as u from users where user_id=$poster_user_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                
                                echo ' <div class="SF_SrchResultItmPpl">
                          <div class="SrchPplThme"></div>
                          <div class="SrchResPplFace">
                              <img class="img_SrchReslt" src="'.$p_pic.'" />
                          </div>
                          <div class="SrchResPplDets">
                              <a href="../'.$ppl_usrename.'" ><div class="SrchPplNme">
                                  '.$people_name.'\'s Post
                              </div></a>
                              <div class="SrchPplExtra">
                                  Post No : '.$post_id.' <span class="Srchdivider">|</span> '.$post_time.'
                              </div>
                          </div>
                      </div>';
                                 
	         }
	  }
            }
	
     }
     
     if($category=="Sender Name")
     {
            $q="select user_id as u from basic where first_name regexp '$search_cont'";
            $r=  mysqli_query($dbc, $q);
            if($r)
            {
	  if(mysqli_num_rows($r)>0)
	  {
	         while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	         {
	                $n=$n+1;
	                $people_id=$row['u'];
	                $q1="select sender_id as s,msg as m ,time as t,day as d from messages where user_id=$user_id and sender_id=$people_id order by msg_id desc";
	                $r1=  mysqli_query($dbc, $q1);
	                if($r1)
	                {
		      if(mysqli_num_rows($r1)>0)
		      {
		             while($rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
		             {
			   $time=$rows['t'];
			   $msg=$rows['m'];
			   $day=$rows['d'];
			   $msg_date="$msg $day";
                 $q2="select first_name as f ,nativeplace as np,user_id as u,sex as s from basic where user_id =$people_id ";
           
                     $r2=  mysqli_query($dbc, $q2);
                     if($r2)
                     {
                         $row=  mysqli_fetch_array($r2,MYSQLI_ASSOC);
                               $people_name=$row['f'];
                $sex=$row['s'];
                $native=$row['np'];
                if($sex=="girl")
                {
                    $sex="Female";
                }else
                {
                    $sex="Male";
                }
            
                      $quq="select username as u from users where user_id=$people_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
                     
                
                echo '   <div class="SF_SrchResultItmFlash">
                          <div class="SrchPplThme"></div>
                         
                          <div class="SrchResPplDets">
	                <a href="../'.$ppl_usrename.'" /> <div class="SrchPplNme">
                                  '.$people_name.'
                              </div></a>
                              
                              <div class="SrchMsgCont">
                                '.$msg.'
                              </div>
                          </div>
                          <div class="SrchMsgTime">  '.$msg_date.'</div>
                      </div>';
                         
                     }
		             }
		      }
	                }
	         }
	  }
            }
     }
  
      if($category=="Message Text")
      {
            $q1="select sender_id as s,msg as m ,time as t,day as d from messages where user_id=$user_id and msg regexp '$search_cont' order by msg_id desc ";
	                $r1=  mysqli_query($dbc, $q1);
	                if($r1)
	                {
		      if(mysqli_num_rows($r1)>0)
		      {
		             while($rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
		             {
			   $n=$n+1;
			   $people_id=$rows['s'];
			   $time=$rows['t'];
			   $day=$rows['d'];
			   $msg_date="$time $day";
			   $msg=$rows['m'];
			   if(strlen($msg)>20)
			   {
			          $msg=substr($msg,0,20);
			          $msg="$msg...";
			   }
                 $q2="select first_name as f ,nativeplace as np,user_id as u,sex as s from basic where user_id =$people_id ";
           
                     $r2=  mysqli_query($dbc, $q2);
                     if($r2)
                     {
                         $row=  mysqli_fetch_array($r2,MYSQLI_ASSOC);
                               $people_name=$row['f'];
                $sex=$row['s'];
                $native=$row['np'];
                if($sex=="girl")
                {
                    $sex="Female";
                }else
                {
                    $sex="Male";
                }
              
                      $quq="select username as u from users where user_id=$people_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
               echo '   <div class="SF_SrchResultItmFlash">
                          <div class="SrchPplThme"></div>
                         
                          <div class="SrchResPplDets">
                            <a href="../'.$ppl_usrename.'" >  <div class="SrchPplNme">
                                  '.$people_name.'
                              </div></a>
                              
                              <div class="SrchMsgCont">
                                '.$msg.'
                              </div>
                          </div>
                          <div class="SrchMsgTime">  '.$msg_date.'</div>
                      </div>';
                         
                     }
		             }
		      }
	                }
      }
      
        if($category=="Flash Message")
      {
             
          
             $r=  mysqli_query($dbc, $q1);
             
             if($r)
             {
	   if(mysqli_num_rows($r)>0)
	   {
	   while ($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
	   {
	          $n=$n+1;
	          $people_id=$row['u'];
	          $flash=$row['f'];
	          $time=$row['t'];
        $q2="select first_name as f ,nativeplace as np,user_id as u,sex as s from basic where user_id =$people_id ";
           
                     $r2=  mysqli_query($dbc, $q2);
                     if($r2)
                     {
                         $row=  mysqli_fetch_array($r2,MYSQLI_ASSOC);
                               $people_name=$row['f'];
                $sex=$row['s'];
                $native=$row['np'];
                if($sex=="girl")
                {
                    $sex="Female";
                }else
                {
                    $sex="Male";
                }
               
 $quq="select username as u from users where user_id=$people_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';    
	echo '   <div class="SF_SrchResultItmFlash">
                          <div class="SrchPplThme"></div>
                         
                          <div class="SrchResPplDets">
                              <a href="../'.$ppl_usrename.'" ><div class="SrchPplNme">
                                  '.$people_name.'
                              </div></a>
                              
                              <div class="SrchMsgCont">
                                '.$flash.'
                              </div>
                          </div>
                          <div class="SrchMsgTime">  '.$time.'</div>
                      </div>';
                         
                     }
	   }       
	   }
	   
             }
      }
      
      if($category=="Flash ID")
      {
              $r=  mysqli_query($dbc, $q1);
             if($r)
             {
	   if(mysqli_num_rows($r)>0)
	   {
	   while ($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
	   {
	          $n=$n+1;
	          $people_id=$row['u'];
	          $flash=$row['f'];
	          $time=$row['t'];
        $q2="select first_name as f ,nativeplace as np,user_id as u,sex as s from basic where user_id =$people_id order by first_name desc";
           
                     $r2=  mysqli_query($dbc, $q2);
                     if($r2)
                     {
                         $row=  mysqli_fetch_array($r2,MYSQLI_ASSOC);
                               $people_name=$row['f'];
                $sex=$row['s'];
                $native=$row['np'];
                if($sex=="girl")
                {
                    $sex="Female";
                }else
                {
                    $sex="Male";
                }
               
                     $quq="select username as u from users where user_id=$people_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';   
                            echo '   <div class="SF_SrchResultItmFlash">
                          <div class="SrchPplThme"></div>
                         
                          <div class="SrchResPplDets">
                             <a href="../'.$ppl_usrename.'" > <div class="SrchPplNme">
                                  '.$people_name.'
                              </div></a>
                              
                              <div class="SrchMsgCont">
                                '.$flash.'
                              </div>
                          </div>
                          <div class="SrchMsgTime">  '.$time.'</div>
                      </div>';
   
                     }
	   }       
	   }
	   
             }
      
      }
      
      if($category=="Name of Person")
      {
             $r=  mysqli_query($dbc, $q1);
             if($r)
             {
	   if(mysqli_num_rows($r)>0)
	   {
	   while ($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
	   {
	         
	          $people_id=$row['u'];
	 $people_name=$row['f'];
                $sex=$row['s'];
                $native=$row['np'];
                if($sex=="girl")
                {
                    $sex="Female";
                }else
                {
                    $sex="Male";
                }
           
        $q2="select flash as f,time as t,public as p,user_id as u from flash_news where user_id =$people_id ";
           
                     $r2=  mysqli_query($dbc, $q2);
                     if($r2)
                     {
	           if(mysqli_num_rows($r2)>0)
	           {
		  $iam_cnct=0;
	        while($rowz=  mysqli_fetch_array($r2,MYSQLI_ASSOC))
	        {
	                $n=$n+1;
	          $public=$rowz['p'];
	          $flash=$rowz['f'];
	          $time=$rowz['t'];
	          if($public==1)
	          {
		$iam_cnct=1;   
	          }else
	          {
		$qa="select cu_id as c from contacts wehre user_id=$user_id and cu_id=$people_id";
		$ra=mysqli_query($dbc,$qa);
		if($ra)
		{
		      
		       if(mysqli_num_rows($ra)>0)
		       {
		        $iam_cnct=1;      
		       }
		}
	          }
             
	 $quq="select username as u from users where user_id=$people_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';   
	          if($iam_cnct==1 || $user_id==$people_id)
	          {
            echo '   <div class="SF_SrchResultItmFlash">
                          <div class="SrchPplThme"></div>
                         
                          <div class="SrchResPplDets">
                          <a href="../'.$ppl_usrename.'" >    <div class="SrchPplNme">
                                  '.$people_name.'
                              </div></a>
                              
                              <div class="SrchMsgCont">
                                '.$flash.'
                              </div>
                          </div>
                          <div class="SrchMsgTime">  '.$time.'</div>
                      </div>';
   
                         	
	          }
               
                    
	        } 
	           }
                        
	                
                     }
	   }       
	   }
	   
             }
      }
    echo '<input type="hidden" value="'.$n.'"id="tot_srch_cnt" />';
}