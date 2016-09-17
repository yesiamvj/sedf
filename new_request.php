<?php session_start();

$name=$_REQUEST['first_name'];
$user_id=$_REQUEST['user_name'];
  
                            
echo '<div class="theaterTexts" id="TheaterNewRel" >
                                           <div class="thtrTxtIn">
                                               <div class="thtrTtl">
                                                   New Relation <div class="thtrTxtClose" onclick="$(\'#TheaterNewRel\').fadeOut()" >X</div>
                                               </div>
                                               <div class="thtrCont">
                                                   <div class="reqSendIn">
                                                       Add  &nbsp;&nbsp; <span id="targetReqst"  >'.$name.' '.$user_id.'</span> to my relations as
                                                       <select id="addRelType'.$user_id.'" onchange="addRelOther()" >
                                                        <option>Friends</option>
                                                        <option>Family</option>
                                                        <option>Enemy</option>
                                                        <option>Special</option>
                                                        <option>Unknown</option>
                                <option value="classmate" >Classmates</option>
                                <option value="other" >Other</option>
                            </select> 
                                                       <input type="hidden" value="" id="nowuser" />
                                                           
                                                       <div class="othrGrps" id="classGroup"  >
                                                           &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            In  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <input class="inp_th" id="mysavesnm'.$user_id.'" type="text" placeholder="Save this person name as " />
                                                       </div>          
                                                       
                        </div>
                                                   <div class="thtrPrcd" onclick="addrelsinprfprcs(\''.$user_id.'\',\'#mysavesnm'.$user_id.'\',\'#addRelType'.$user_id.'\',\''.$name.'\')">
                                                       Send Request
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
';
   ?>