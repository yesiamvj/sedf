<?php session_start();

 if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
     header("location:index.php");
 }
 else{
     $user_id=$_SESSION['user_id'];
     $cnt=$_REQUEST['cnt'];
     $post_id=$_REQUEST['post_id'];
echo'   
    <link rel="stylesheet" href="'.$_SESSION['css'].'post_share.css"/>  <script src="post_share.js" type="text/javascript"></script>
     
    <div id="add_people_div"> </div>
    <div class="post_share_out"><div id="postExtraWindow'.$cnt.'" class="postExtraWindow" >
                                <div id="xWindowTtle'.$cnt.'" class="xWindowTtle">Share This Post <div class="closeXwindow" onclick="$(\'#for_share_widow\').fadeOut();$(\'.post_share_out\').fadeOut();"> X </div></div>
                                <div id="xWindowHint'.$cnt.'" class="xWindowHint">Share This Post with : <div id="xWindowDetails">Post ID :| '.$post_id.' </div></div>
                                <div id="holderXwindow'.$cnt.'" class="holderXwindow">
                                <div id="incontXwin'.$cnt.'" class="incontXwin">
                                    
                                    <div id="x-listItem'.$cnt.'" class="x-listItem">
                                    <div id="x-win-share-list'.$cnt.'" class="x-win-share-list" onclick="x_win_share(\'x-win-share-chk-friends'.$cnt.'\',\'#x-win-share-cntnr-fr'.$cnt.'\')">
                                        <input id="x-win-share-chk-friends'.$cnt.'" class="x-win-share-chk-friends" type="checkbox"  name="friends"  />
                                        <div id="x-win-share-frTxt'.$cnt.'" class="x-win-share-frTxt" >Friends </div>
                                        <img src="icons/expnd-dwn.png"/>
                                    </div> 
                                     <div id="x-win-share-cntnr-fr'.$cnt.'"  style="display: none" class="x-win-share-cntnr">
                                            <form><input type="hidden" value="" class="pplshare">
                                                <input type="text" id="room'.$cnt.'" onclick="showtoshare(5,'.$post_id.')" placeholder="Name of the Person You want to share"/>
                                                <div class="slctdshrppl"></div>
                                         </form>
                                        </div> 
                                    </div>
                                    <div id="x-listItem'.$cnt.'" class="x-listItem">
                                    <div id="x-win-share-list'.$cnt.'" class="x-win-share-list" onclick="x_win_share(\'x-win-share-chk-group'.$cnt.'\',\'#x-win-share-cntnr-gr'.$cnt.'\')">
                                       <input id="x-win-share-chk-group'.$cnt.'" class="x-win-share-chk-group" type="checkbox" name="friends" />
                                        <div id="x-win-share-frTxt'.$cnt.'" class="x-win-share-frTxt" >Group</div>
                                        <img src="icons/expnd-dwn.png"/>    
                                    </div>
                                        <div id="x-win-share-cntnr-gr'.$cnt.'"   style="display: none" class="x-win-share-cntnr">
                                         
                                            <form>
                                                <input type="text" id="groups'.$cnt.'" onclick="showtoshare(8,'.$post_id.')" placeholder="Name of the Group You want to share"/>
                                                       <div class="selctdgrp_div" ></div>
                                            </form>
                                        </div> 
                                     
                                    </div>
                                    <div id="x-listItem'.$cnt.'" class="x-listItem">
                                    <!--<div id="x-win-share-list'.$cnt.'" class="x-win-share-list" onclick="x_win_share(\'x-win-share-chk-room'.$cnt.'\',\'#x-win-share-cntnr-rm'.$cnt.'\')">
                                        <input id="x-win-share-chk-room'.$cnt.'" class="x-win-share-chk-room" type="checkbox" name="friends" />
                                        <div id="x-win-share-frTxt'.$cnt.'" class="x-win-share-frTxt">Room</div>
                                         <img src="icons/expnd-dwn.png"/>   
                                    </div> -->
                                        <div id="x-win-share-cntnr-rm'.$cnt.'" style="display: none" class="x-win-share-cntnr">
                                            <div id="x-win-share-cnt-fr-tgt-123'.$cnt.'" class="x-win-share-cnt-fr-target"><span id="removeShareTgt" onclick="$(\'#x-win-share-cnt-fr-tgt-123\').slideUp().remove();">X</span></div>
                                         <div id="x-win-share-cnt-fr-tgt-145'.$cnt.'" class="x-win-share-cnt-fr-target"><span id="removeShareTgt" onclick="$(\'#x-win-share-cnt-fr-tgt-145\').slideUp().remove();">X</span></div>
                                         
                                            <form>
                                                <input type="text" id="room'.$cnt.'" placeholder="Name of the Room You want to share"/>
                                            </form>
                                        </div> 
                                    </div>
                                    <div id="x-listItem'.$cnt.'" class="x-listItem">
                                    <div id="x-win-share-list'.$cnt.'" class="x-win-share-list" onclick="x_win_share(\'x-win-share-chk-specific'.$cnt.'\',\'#x-win-share-cntnr-sp'.$cnt.'\')">
                                        <input id="x-win-share-chk-specific'.$cnt.'" class="x-win-share-chk-specific" type="checkbox" name="friends" />
                                        <div id="x-win-share-frTxt'.$cnt.'" class="x-win-share-frTxt" >Specific</div>
                                         <img src="icons/expnd-dwn.png"/>    
                                    </div>
                                        <div id="x-win-share-cntnr-sp'.$cnt.'" class="x-win-share-cntnr-sp" style="display: none" class="x-win-share-cntnr">
                                            
                                            <div id="x-win-otherShares'.$cnt.'" class="x-win-otherShares">
                                                <div id="shareConsts'.$cnt.'" class="shareConsts">
                                     <div id="x-win-share-list-all'.$cnt.'" class="x-win-share-list-all" onclick="x_win_share(\'x-win-share-chk-all'.$cnt.'\',\'#x-win-share-cntnr-all'.$cnt.'\')">
                                        <input id="x-win-share-chk-all'.$cnt.'"  type="checkbox" />
                                        <div id="x-win-share-allTxt'.$cnt.'" class="x-win-share-allTxt">All People</div>
                                        
                                    </div> 
                                                  
                                    <div id="x-win-share-list-nb'.$cnt.'" class="x-win-share-list-nb" onclick="x_win_share(\'x-win-share-chk-nBoard\',\'#x-win-share-cntnr-nBoard\')">
                                        <input id="x-win-share-chk-nBoard'.$cnt.'" class="x-win-share-chk-nBoard" type="checkbox" name="nBoard" />
                                        <div id="x-win-share-allTxt'.$cnt.'" class="x-win-share-allTxt" >NoticeBoard</div>      
                               </div>
                                                </div>
                                                <div id="x-listItem'.$cnt.'" class="x-listItem">
                                    <div id="x-win-share-list'.$cnt.'" class="x-win-share-list" onclick="x_win_share(\'x-win-share-chk-plce'.$cnt.'\',\'#x-win-share-cntnr-plce'.$cnt.'\')">
                                        <input id="x-win-share-chk-plce'.$cnt.'" class="x-win-share-chk-plce" type="checkbox" name="place"  />
                                        <div id="x-win-share-frTxt" class="x-win-share-frTxt">Place </div>
                                        <img src="icons/expnd-dwn.png"/>
                                    </div> 
                                     <div id="x-win-share-cntnr-plce'.$cnt.'" class="x-win-share-cntnr-plce" style="display: none" class="x-win-share-cntnr">
                                           <form>
                                                <input type="text" placeholder="People ina" onclick="showtoshare(7,'.$post_id.')"/>
                                                <div class="slctdshrplc"></div>
                                            </form>
                                        </div> 
                                    </div>
                                    <div id="x-listItem'.$cnt.'" class="x-listItem">
                                    <div id="x-win-share-list'.$cnt.'" class="x-win-share-list" onclick="x_win_share(\'x-win-share-chk-speople'.$cnt.'\',\'#x-win-share-cntnr-speople'.$cnt.'\')">
                                       <input id="x-win-share-chk-speople'.$cnt.'" class="x-win-share-chk-speople" type="checkbox" name="speople" />
                                        <div id="x-win-share-frTxt'.$cnt.'" class="x-win-share-frTxt">Specific People</div>
                                        <img src="icons/expnd-dwn.png"/>    
                                    </div>
                                        <div id="x-win-share-cntnr-speople'.$cnt.'"  style="display: none" class="x-win-share-cntnr">
                                        <!--    <div id="x-win-share-cnt-speople-tgt-123'.$cnt.'" class="x-win-share-cnt-fr-target">Sakthikanth<span id="removeShareTgt" onclick="$(\'#x-win-share-cnt-speople-tgt-123\').slideUp().remove();">X</span></div>
                                         <div id="x-win-share-cnt-speople-tgt-145'.$cnt.'" class="x-win-share-cnt-fr-target">Kirubakaran<span id="removeShareTgt" onclick="$(\'#x-win-share-cnt-speople-tgt-145\').slideUp().remove();">X</span></div>
                                         
                                            <form>
                                                <input type="text" id="grpname'.$cnt.'" placeholder="Name of the Group You want to share"/>
                                            </form>-->
                                         <div id="xWinShareSpeople'.$cnt.'" class="xWinShareSpeople">
                                             <div id="xWinShareSpItem'.$cnt.'" class="xWinShareSpItem">
                                                 <input type="checkbox" id="male'.$cnt.'"/>
                                                 <div id="xWinShreSpITtle'.$cnt.'">Male</div>
                                             </div>
                                             <div id="xWinShareSpItem'.$cnt.'" class="xWinShareSpItem" style="display: inline-block">
                                                 <input type="checkbox" id="female'.$cnt.'"/>
                                                 <div id="xWinShreSpITtle'.$cnt.'" class="xWinShreSpITtle">Female</div>
                                             </div>
                                             <div id="xWinShareSpItem'.$cnt.'" class="xWinShareSpItem" style="display: inline-block">
                                                 <input type="checkbox" id="age'.$cnt.'"/>
                                                 <div id="xWinShreSpITtle'.$cnt.'" class="xWinShreSpITtle">Age Between  <input type="number" id="xWinShmnAge'.$cnt.'" class="xWinShmnAge"/> to <input id="xWinShmxAge'.$cnt.'" class="xWinShmxAge" type="number"/></div>
                                                
                                             </div>
                                            
                                             <div id="xWinShareSpItem'.$cnt.'" class="xWinShareSpItem" style="display: inline-block">
                                                 <input type="checkbox" id="statu'.$cnt.'"/>
                                                         <div id="xWinShreSpITtle'.$cnt.'" class="xWinShreSpITtle">Status <span id="xWinShareSps">
                                                      <select id="statuoption'.$cnt.'">
                                                         <option>Married</option>
                                                         <option>Unmarried</option>
                                                     </select>
                                                     </span>
                                                    
                                                      
                                                 </div>
                                             </div>
                                             <div id="xWinShareSpItem'.$cnt.'" class="xWinShareSpItem" style="display: inline-block">
                                                 <input type="checkbox" id="position'.$cnt.'"/>
                                                         <div id="xWinShreSpITtle" class="xWinShreSpITtle">Position<span id="xWinShareSps">
                                                      <select id="positionoption'.$cnt.'">
                                                         <option>Student</option>
                                                         <option>Worker</option>
                                                     </select>
                                                     </span>
                                                 
                                                 </div>
                                             </div>
                                             <div id="xWinShareSpItem'.$cnt.'" class="xWinShareSpItem" style="display: inline-block">
                                                 <input type="checkbox" id="mood'.$cnt.'"/>
                                                         <div id="xWinShreSpITtle">Mood<span id="xWinShareSps">
                                                      <select id="moodoption'.$cnt.'">
                                                         <option>Happy</option>
                                                         <option>Sad</option>
                                                     </select>
                                                     </span>
                                                 
                                                 </div>
                                             </div>
                                         </div>
                                        </div> 
                                    </div>
                                                
                                    </div>
                                        </div>
                               </div>
                                    
                                </div>
                            </div>
                                <div id="xWindowSubmit'.$cnt.'" class="xWindowSubmit" onclick="sharepost('.$post_id.','.$cnt.')">Share</div>
                        </div></div>';

 }
?>