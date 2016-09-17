 <?php
	               
	              
       	                 $q="select req_id as r from requests where user_id=$viewer_id and reqstd_userid=$owner_id";
                            $r=mysqli_query($dbc,$q);
                            if($r)
                            {
                                $req="Add";
                                if(mysqli_num_rows($r)>0)
                                {
                                    $req="Request Sent";
                                }
                            }
		            $q="select req_id as r from requests where user_id=$viewer_id and reqstd_userid=$owner_id";
                            $r=mysqli_query($dbc,$q);
                            if($r)
                            {
                                $req=0;
                                if(mysqli_num_rows($r)>0)
                                {
                                    $req=1;
                                }
                            }
                            $q="select c_id as c from contacts where user_id=$viewer_id and cu_id=$owner_id";
                            $r=mysqli_query($dbc,$q);
                            if($r)
                            {
                                $mycnct=0;
                                if(mysqli_num_rows($r)>0)
                                {
                                    $mycnct=1;
                                }
                            }
	           $reqs="Add";
	            $q="select req_id as r from requests where user_id=$viewer_id and reqstd_userid=$owner_id and accept=0 and cancel=0";
                            $r=mysqli_query($dbc,$q);
                            if($r)
                            {
                                
                                if(mysqli_num_rows($r)>0)
                                {
                                    $reqs="Request Sent";
                                }
                            }
	           
	           $q="select req_id as r from requests where reqstd_userid=$viewer_id and user_id=$owner_id and accept=0 and cancel=0";
                            $r=mysqli_query($dbc,$q);
                            if($r)
                            {
                                
                                if(mysqli_num_rows($r)>0)
                                {
                                    $reqs="Accept Request";
                                }
                            }
	           
	             $q="select c_name  as c,type as tp from contacts where user_id=$viewer_id and cu_id=$owner_id";
                                $r=mysqli_query($dbc,$q);
                                if($r)
                                {
                                   if(mysqli_num_rows($r)>0)
		 {
		     $rd=  mysqli_fetch_array($r,MYSQLI_ASSOC);
		     $reqs=$rd['tp'];
		 }
                                }
                                
			         echo '<div class="hideOnAvlo" onclick="addrelinprf(\''.$owner_id.'\',\''.$f_name.'\')" onmouseover="//showMyExtraTip(\'#hYT-Tt-AddRel\',event)" onmouseout="$(\'#hYT-Tt-AddRel\').hide()" id="img-makeRelation" src="../web/icons/notif-add-ppl.png" alt="contact" onclick="addToRelation()" onmouseover="showMyExtraTip(\'#hYT-Tt-AddRel\',event)" onmouseout="$(\'#hYT-Tt-AddRel\').hide()">'.$reqs.'</div>
		               ';
                                                  ?>