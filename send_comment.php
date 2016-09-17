
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{
       $user_id=$_SESSION['user_id'];
       echo '
<input type="hidden" id="tot_cmnt_smiley'.$tot_cnt.'" value="1"/>
                        <div class="commentContentFull'.$cnt.'" id="commentContentFull">
                            <span id="commentTitle" class="commentTitle'.$tot_cnt.'" title="Click to view All Comments" onclick="viewprecmnt(\'.previousComments'.$tot_cnt.'\','.$post_id.','.$tot_cnt.')">Comments &nbsp;&nbsp;&nbsp;<img style="width: 10px;height:10px;" src="icons/expnd-dwn.png" alt="down"/></span><span id="refresh_cmnt'.$cnt.'" onclick="refresh_cmnt('.$post_id.',\'.previousComments'.$tot_cnt.'\',\''.$tot_cnt.'\')">New</span>
                                <form method="post">
                                    <input class="'.$tot_cnt.'sf-commentInput" id="sf-commentInput" type="text" placeholder="What do you think?" />
                                    <div style="display: inline-block">
                                        <input type="color" id="colorComment" class="'.$tot_cnt.'colorComment" onchange="colortyped(\'.'.$cnt.'colorComment\',\'.sf-commentInput'.$cnt.'\')"/>
                                    <input type="button" onmouseover="mouseOnColorCmnt(1)" onmouseout="mouseOutColorCmnt(1)" onclick="$(\'.'.$cnt.'colorComment\').click();" id="colorCmntIcon" value="A"/>
                                    <input type="file" name="uploadme'.$cnt.'" id="attachCmnt'.$tot_cnt.'" class="attachCmnt" style="display:none" />
                                    
                                     <div id="forCmntTtArrowUtil" class="forCmntTtArrowUtil"></div>
                                    <div id="toolTipCmntUtils" class="toolTipCmntUtils">Add a color to your comment</div>
                                    
                                    </div>
                                     <div class="for_cmnt_smiley" style="display:none;" id="for_show_smiley'.$tot_cnt.'"></div>
                                   
                                    <div id="forCommentAdds" class="forCommentAdds'.$tot_cnt.'">
                                        <ol>
                                            <li ><img onclick="show_smileys(\''.$tot_cnt.'\',\''.$post_id.'\',\'#for_show_smiley'.$tot_cnt.'\')" onmouseover="mouseOnCmntAttch(1)" onmouseout="mouseOnCmntAttch(3)" id="smileyHead'.$cnt.'" class="smileyHead" src="icons/test-smiley.png" alt="smiley"/></li>
                                            <li><img onclick="document.getElementById(\'attachCmnt'.$cnt.'\').click();" onmouseover="mouseOnCmntAttch(2)" onmouseout="mouseOnCmntAttch(3)" id="smileyHead'.$cnt.'" class="smileyHead" src="icons/test-atch.png" alt="smiley"/></li>
                                        </ol>
                                        <div id="forCmntArrow" class="forCmntArrow"></div>
                                        <div id="forCmntTtArrow" class="forCmntTtArrow"></div>
                                        <div id="toolTipCmntAdd" class="toolTipCmntAdd"> Add an Attachment</div>
                                    </div>
                                    
                                    <div style="display: inline">
                                    <input onmouseover="mouseOnColorCmnt(2)" onmouseout="mouseOutColorCmnt(2)" type="button" onclick="showOptions(\'.forCommentAdds'.$tot_cnt.'\')" id="attachCmntIcon" value="A"/>
                                    <input id="submitCmnt" type="button" onclick="uploadcomment('.$post_id.',0,0,'.$tot_cnt.')" value="Comment"/>
                                    </div>
                                </form>
                                <div><span id="smiley_cls_btn_cmnt'.$tot_cnt.'" style="display:none;" onclick="$(\'#smiley_preview'.$tot_cnt.'\').html(\'\');">X</span><div id="smiley_preview'.$tot_cnt.'"></div></div>
                               <div id="totlprevcmnts" class="totlprevcmnts'.$cnt.'"> <div class="for_new_cmnt'.$cnt.'"></div>
                            <div id="previousComments" class="previousComments'.$tot_cnt.'">
                            
                                </div>
                                
                                </div>
                                
                            </div>
                          ';
}
?>
                           