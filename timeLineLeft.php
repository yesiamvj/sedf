<?php

    include '../web/verificationStats.php';
    include '../web/timelineleft-q.php';
    
        if($verify_status==="yes"){
            $verify_status="<span style='color:green'>Verified person</span>";
        }
        else{
             $verify_status="<span style='color:silver'>Unverified person</span>";
        }
         
                      
      echo '   
        
            <div class="MP_LeftPane">
                <div class="verificationDets">
                    '.$verify_status.'
                </div>
                <div class="primaryDetailHold">
                    
                    <div class="PrimaryItm">
                        <div class="PI_Cnt">'.$totrel_cont.'</div>
                        <div class="PI_Name">Relations</div>
                    </div>
                    <div class="PrimaryItm">
                        <div class="PI_Cnt">'.$totalPostCnt.'</div>
                        <div class="PI_Name">Posts</div>
                    </div>
                    <div class="PrimaryItm">
                        <div class="PI_Cnt">'.$pv_count.'</div>
                        <div class="PI_Name">Views</div>
                    </div>
                </div>
                       <div class="primaryDetailHold" id="person_dets" >
                    <div class="PrimaryItm">
                        
                        <div class="PI_Ans">
                           '.$sex.'
                        </div>
                    </div>
                    <div class="PrimaryItm">
                        
                        <div class="PI_Ans">
                           '.$day.' '.$month.' '.$year.'
                        </div> 
                    </div>
                    <div class="PrimaryItm">
                       
                        <div class="PI_Ans">
                           '.$nativeplace.'
                        </div>
                    </div>
                   
                </div>
                    <div class="primaryDetailHold" id="sedfed_dets" >
                    <div class="PrimaryItm">
                        <div class="PI_Que">
                            Username
                        </div>
                        <div class="PI_Ans">
                            '.$owner_username.'
                        </div>
                    </div>
                    <div class="PrimaryItm">
                        <div class="PI_Que">
                            User Id
                        </div>
                        <div class="PI_Ans">
                           '.$owner_id.'
                        </div>
                    </div>
                    <div class="PrimaryItm">
                        <div class="PI_Que">
                            Joined On
                        </div>
                        <div class="PI_Ans">
                           Jul 15
                        </div>
                    </div>
                   
                </div>
                    <div class="primaryDetailHold" id="personal_dets" >
                    <div class="PrimaryItm">
                        <div class="PI_Que">
                            Mobile
                        </div>
                        <div class="PI_Ans">
                            '.$mobile_no.'
                        </div>
                    </div>
                    <div class="PrimaryItm">
                        <div class="PI_Que">
                            Email
                        </div>
                        <div class="PI_Ans">
                           '.$email_id.'
                        </div>
                    </div>
                    <div class="PrimaryItm">
                        <div class="PI_Que">
                            website
                        </div>
                        <div class="PI_Ans">
                            <a href="http://'.$website.'">'.$website.'
                            </a>
                                
                        </div>
                    </div>
                   
                </div>
                    <div class="primaryDetailHold" id="_dets" >
                    <div class="PrimaryItm">
                        <div class="PI_Que">
                           (c) 2015 sedfed 
                        </div>
                       
                    </div>
                    
                    <div class="PrimaryItm">
                        <div class="PI_Que">
                            All rights reserved
                        </div>
                       
                    </div>
                </div>
                    <br/><br/>
                <div class="PrimaryItm">
                        <div class="PI_Que">
                           sedfed Timeline [ version 1.0 ]
                        </div>
                       
                    </div>
            </div>';
?>