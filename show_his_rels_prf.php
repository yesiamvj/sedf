<?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {
   
                      $cu_id=$_REQUEST['user_id'];
                      $type=$_REQUEST['type'];
                 
                      require 'mysqli_connect.php';
                      switch ($type)
                      {
                          case 1:
                              $type="Friends";
                              break;
                          case 2:
                              $type="Enemies";
                              break;
                          case 3:
                              $type="Classmate";
                              break;
                          case 4:
                              $type="Unknown";
                              break;
                          default :
                              $type="Friends";
                              break;
                              
                      }
                   
                      $user_id=$_SESSION['user_id'];
		$viewer_id=$user_id;	             
	           $q2="select my_relation as r from profile_sets where user_id=$cu_id";
	           $r2=  mysqli_query($dbc, $q2);
	           if($r2)
	           {
		 if(mysqli_num_rows($r2)>0)
		 {
		        $row=  mysqli_fetch_array($r2,MYSQLI_ASSOC);
		        $rels_prvc=$row['r'];
		 }  else {
		       $rels_prvc=0; 
		 }
	           }

	           $show_rels=0;
		  if($rels_prvc==0)
		      {
		      $show_rels=1;
		             
		      }
		        if($rels_prvc==1)
		      {
		       $q="select cu_id as c from contacts where user_id=$cu_id and cu_id=$viewer_id";
		       $r=  mysqli_query($dbc, $q);
		       if(mysqli_num_rows($r)>0)
		       {
		              $show_rels=1;
		       }
		      }
		      
		           if($rels_prvc==2)
		      {
		             $q="select cu_id as c from contacts where user_id=$cu_id";
		             $r=  mysqli_query($dbc, $q);
		             if($r)
		             {
			   if(mysqli_num_rows($r)>0)
			   {
			          while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
			          {
				$cuser_id=$row['c'];
				$q1="select cu_id as cu from contacts where user_id=$cuser_id ";
				$r1=  mysqli_query($dbc, $q1);
				if($r1)
				{
				       if(mysqli_num_rows($r1)>0)
				       {
				              while($rows=  mysqli_fetch_array($r1,MYSQLI_ASSOC))
				              {
					    $rels_of_rels=$rows['cu'];
					    if($viewer_id==$rels_of_rels)
					    {
					           $show_rels=1;
					    }
				              }
					    
				       }
				}
				
			          }
			   }
		             }
		      }
		      if($show_rels==1 || $cu_id==$_SESSION['user_id'])
		      {
		                $q3="select cu_id as s,c_name as c from contacts where user_id=$cu_id and type='$type'";
                  
                      $r3=  mysqli_query($dbc,$q3);
                      if($r3)
                      {
                          if(mysqli_num_rows($r3)>0)
                          {
                              while($row3=  mysqli_fetch_array($r3,MYSQLI_ASSOC))
                              {
                                  $rels_id=$row3['s'];
                                  $c_name=$row3['c'];
		

                                        $q="select req_id as r from requests where user_id=$user_id and reqstd_userid=$rels_id";
                            $r=mysqli_query($dbc,$q);
                            if($r)
                            {
                                $req=0;
                                if(mysqli_num_rows($r)>0)
                                {
                                    $req=1;
                                }
	           }
                                  $my_cnct=0;
                                  $iam=0;
                                  if($rels_id==$user_id)
                                  {
                                      $iam=1;
                                  }
                                  $qu="select username as u from users where user_id=$rels_id";
                                  $ru=mysqli_query($dbc,$qu);
                                  if($ru)
                                  {
                                      $rt=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
                                      $rels_username=$rt['u'];
                                  }
                                 $qa="select cu_id as c,c_name as cnm from contacts where user_id=$user_id and cu_id=$rels_id";
                                 $ra=mysqli_query($dbc,$qa);
                                 if($ra)
                                 {
                                     if(mysqli_num_rows($ra)>0)
                                     {
                                         $my_cnct=1;
                                         $rop=  mysqli_fetch_array($ra,MYSQLI_ASSOC);
                                         $relation_name=$rop['cnm'];
                                     }else
                                     {
                                         $qs="select first_name as f from basic where user_id=$rels_id";
                                         $rs=mysqli_query($dbc,$qs);
                                         if($rs)
                                         {
                                             if(mysqli_num_rows($rs)>0)
                                             {
                                                 $et=  mysqli_fetch_array($rs,MYSQLI_ASSOC);
                                                 $relation_name=$et['f'];
                                             }
                                         }
                                     }
                                 }
	    
                                       $quq="select username as u from users where user_id=$rels_id";
                $ru=  mysqli_query($dbc,$quq);
                if($ru)
                {
	      $rp=  mysqli_fetch_array($ru,MYSQLI_ASSOC);
	      $ppl_usrename=$rp['u'];
                }
                 $p_pic='../'.$ppl_usrename.'/ppic5.jpg';
                                 
                                  echo'<div class="wholePeopleItm">
                   <table  >
                  <tr class="PVI_Itm"  >
                  
                
                          <td class="PVI_Face" > <img src="'.$p_pic.'" style="max-height:50px;max-width:50px;" /> </td>
                   <td class="PVI_Name" >
                         <a href="../'.$rels_username.'">'.$relation_name.' </a>
                      </td> 
                      <td class="PVI_Action" >';
                                  if($my_cnct==1)
                                  {
                                      echo' <img src="../web/icons/photo.png" />';
                                  }else
                                  {
                                      if($iam==1)
                                      {
                                          
                                      }  else {
		           if($req==1)
		           {
		echo '<span onclick="add_rels_in_show_frds('.$rels_id.',\''.$relation_name.'\')">Update Request</span>';
                                      	 
		           }  else {
		echo '<span onclick="add_rels_in_show_frds('.$rels_id.',\''.$relation_name.'\')">Add</span>';
                                      	 
		           }
                                          
                                      }
                                  }
                     
                      echo'</td>
                      
                  </tr>
                  
                 
              </table>
              </div>';
                                  
                                  
                                  
                              }
                          }
                      }
		      }
                   
   }
   
   ?>