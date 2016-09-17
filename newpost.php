

<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
   
}
else{
    $my=$_REQUEST['q'];
    $user_name=$_SESSION['user_name'];
     $today = date("g:i a ,F j, Y"); 
    require 'mysqli_connect.php';
    $q="select post_id as p from post_permision order by post_id desc";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
        $pos_id=$row['p'];
        $pos_id=$pos_id+1;
    }
    if(empty($my))
    {
        echo '
<input type="hidden" id="tot_img_prev_cnt" value="" />
        
         <div id="isThisBack">
                    
                </div>
            <div id="createNewPostHolder">
               <input type="hidden" id="hiddenimgcnt" value="">
                <div id="decBackgroundForNewPost">
                    <div id="windowCreateNewPost">
                        <div id="winNPtitle_bar">
                            <div id="winNpTtle"><img src="icons/presentation-titl.png" style="max-width: 20px;max-height: 20px;float:left"/>&nbsp;&nbsp; Create New Post <div id="winNpClose" onclick="$(\'#createNewPostHolder\').hide();$(\'#isThisBack\').hide()">X</div></div>  
                        </div>
                         
                        <div id="NpAdv-holder" style="display: none;">
                            <div id="NpAdvTitleBar">Advanced Post <div id="NpAdvHelp"><span onclick="openHelpWidow(\'#NpAdvhelpWindow\')">? &nbsp;&nbsp; help</span> <div id="closeForNpAdv" onclick="$(\'#NpAdv-holder\').slideUp();">X</div></div></div>
                            <div id="NpAdvOuter">
                                    <div id="NpAdv-Caption">
                                        <div id="NpAdv-Editor-ttl">Post Caption</div><div style="padding:10px;" id="post_cap_pre"></div>
                                        <textarea style="display:none;" id="NpAdv-Editor-inp" placeholder="About This Post" oninput="$(\'#NpPostCaptionContTxt\').val(this.value);"></textarea>
                                        <textarea id="NpAdv-Caption-Formt" style="display: none;" oninput="$(\'#NpAdvPreview-Main\').html($(\'#NpAdv-Caption-Formt\').val());"></textarea>
                                       <!-- <div id="NpAdv-Editor-fSwitch" onclick="NAdvChngeFormat(\'#NpAdv-Editor-inp\',\'#NpAdv-Caption-Formt\',\'#NpAdv-Editor-fSwitch\')">Formatted Text</div> -->
                                    </div>
                                    <div id="NpAdv-Editor">
                                        <div id="NpAdv-Editor-ttl">Advanced Settings</div>
                                        <div id="NpAdvEditor-Outer">
                                            <div id="NpAdvEd-Ttl">Text to Customize</div>
                                            <div id="NpAdvEd-item"><input type="text" id="NpAdvEdTgtTxtinp" placeholder="Specific Text" oninput="NpAdvSptxtinput(\'#NpAdvEdTgtTxtinp\',\'#NpAdv-Editor-inp\',\'#NpAdv-Caption-Formt\',\'#NpAdv-Editor-fSwitch\')" /></div>
                                            <div id="NpAdvEd-item">Color For Specified Text<div style="background-color:navy;color:white;" id="NpSetST-txtclr" class="NpSetEdit" onclick="document.getElementById(\'NpSetST-txtclrinp\').click()">Edit<input onchange="NpAdvSTchangeThis(\'#NpSetST-txtclrinp\',\'#NpSetST-txtclr\',\'clr\')" id="NpSetST-txtclrinp" type="color"  class="clrinput" value="#400080"/></div></div>
                                            <div id="NpAdvEd-item">Background Color<div style="background-color: white;" id="NpSetST-txtBGclr" class="NpSetEdit" onclick="document.getElementById(\'NpSetST-txtBGclrinp\').click()">Edit<input onchange="NpAdvSTchangeThis(\'#NpSetST-txtBGclrinp\',\'#NpSetST-txtBGclr\',\'bgclr\')" id="NpSetST-txtBGclrinp" type="color" class="clrinput" value="#ffffff"/></div></div>     
                                            <div id="NpAdvEd-item">Decorations</div>
                                            <div id="NpAdvEd-Decors">
                                                <table>
                                                    <tr>
                                                        <td> <div id="NpAdvEd-DecorItem"><input type="checkbox" id="NpAdvEd-bold" onchange="DecorNewPost(\'NpAdvEd-bold\',\'font-weight:bold\',\'font-weight:normal\')"/>Bold</div></td><td> <div id="NpAdvEd-DecorItem"><input type="checkbox" id="NpAdvEd-india" onchange="DecorNewPost(\'NpAdvEd-india\',\'font-style:italic\',\'font-style:normal\')"/>Italic</div></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div id="NpAdvEd-DecorItem" >
                                                                <input type="checkbox" id="NpAdvEd-line" />
                                                            Line</div>
                                                        </td>
                                                        <td>
                                                            <div id="NpAdvEd-DecorItem">
                                                                <select id="NpAdvEd-DecLine" onchange="DecorNewPost(\'NpAdvEd-line\',$(\'#NpAdvEd-DecLine\').val(),\'text-decoration:none\')">
                                                                    <option value="text-decoration:underline">Under Line</option>
                                                                    <option value="text-decoration:overline">Over Line</option>
                                                                    <option value="text-decoration:line-through">Strike</option>
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                     </table>
                                                    
                                                <div id="NpAdvEd-DecorItem"><input type="checkbox" id="NpAdvEd-DTxtSz" onchange="DecorTemp(\'NpAdvEd-DTxtSz\',$(\'#NpAdvEd-DecSize\').val(),\'font-size:14px\')" />Text Size <input id="NpAdvEd-DecSize" onchange="DecorTemp(\'NpAdvEd-DTxtSz\',$(\'#NpAdvEd-DecSize\').val(),\'font-size:14px\')"  type="number" style="width:50px;"/></div>
                                                    
                                                    
                                                <div id="NpAdvEd-DecorItem"><input type="checkbox" id="NpAdvEd-Dec-TxtShdw" onchange="NpAdvEd_TxtShdw(\'NpAdvEd-Dec-TxtShdw\',\'none\',\'initial\')"/>Text Shadow </div>
                                                <div id="NpAdvEd-Decor-TxtShdw" style="display: none" >
                                                             <table>
                                                    <tr>
                                                        <td> <div id="NpAdvEd-DecorTxtSdw-Item">Horizontal<input id="NAED-txtSh-hz" type="number" onchange="NpAdvEd_TxtShdw(\'NpAdvEd-Dec-TxtShdw\',$(\'#NAED-txtSh-hz\').val(),\'hz\')"/></div></td><td> <div id="NpAdvEd-DecorTxtSdw-Item">Vertical<input id="NAED-txtSh-vr" type="number" onchange="NpAdvEd_TxtShdw(\'NpAdvEd-Dec-TxtShdw\',$(\'#NAED-txtSh-hz\').val(),\'hz\')"/></div></td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td> <div id="NpAdvEd-DecorTxtSdw-Item">Blur<input id="NAED-txtSh-int" type="number" onchange="NpAdvEd_TxtShdw(\'NpAdvEd-Dec-TxtShdw\',$(\'#NAED-txtSh-hz\').val(),\'hz\')"/></div></td><td> <div id="NpAdvEd-DecorTxtSdw-Item">Color<div style="background-color: white;" id="NpAdv-txtShdwClr" class="NpSetEdit" onclick="document.getElementById(\'NpAdv-txtShdwClrinp\').click()">Edit<input onchange="NpAdvEd_TxtShdw(\'NpAdvEd-Dec-TxtShdw\',$(\'#NAED-txtSh-hz\').val(),\'clr\')" id="NpAdv-txtShdwClrinp" type="color" class="clrinput"/></div></div></td>
                                                    </tr>
                                                    
                                                     </table>
                                                          
                                                       
                                                         </div>
                                                <div id="NpAdvEd-DecorItem"><input type="checkbox" id="NpAdvEd-bord-chk" onchange="NpAdvEd_Border(\'initial\',\'none\',\'none\')"/>Box and Border </div>
                                               <div id="NpAdvEd-Decor-BxShdw"  style="display: none">
                                                             <table>
                                                    <tr>
                                                        <td colspan="2"> <div id="NpAdvEd-DecorTxtSdw-Item">Border Size</div></td><td><input id="NpAdvEd-Decor-Bord-size" type="number" onchange="NpAdvEd_Border(\'change\',\'none\',\'none\')"/></div></td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td colspan="2"> <div id="NpAdvEd-DecorTxtSdw-Item">Box Style</div></td>
                                                        <td> <div><select id="NpAdvEd-BordStyle" onchange="NpAdvEd_Border(\'change\',\'none\',\'none\')">
                                                                    <option value="solid">Simple</option>
                                                                    <option value="dotted">Dotted</option>
                                                                    <option value="dashed">Dashed</option>
                                                                    <option value="double">Double</option>
                                                                    <option value="groove">Groove</option>
                                                                    <option value="ridge">Ridge</option>
                                                                    <option value="inset">Inset</option>
                                                                    <option value="outset">Outset</option>
                                                                </select></div>  </td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td > <div id="NpAdvEd-DecorTxtSdw-Item">Top Border Color</div></td><td> <div style="background-color:navy;color:white;" id="NpAdv-BodrT" class="NpSetEdit" onclick="document.getElementById(\'NpAdv-BodrTinp\').click()">Edit<input onchange="NpAdvEd_Border(\'clr\',\'#NpAdv-BodrT\',\'#NpAdv-BodrTinp\')"  id="NpAdv-BodrTinp" type="color" class="clrinput"/></div></div></td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td > <div id="NpAdvEd-DecorTxtSdw-Item">Right  Border Color</div></td><td> <div style="background-color:navy;color:white;" id="NpAdv-BodrR" class="NpSetEdit" onclick="document.getElementById(\'NpAdv-BodrRinp\').click()">Edit<input onchange="NpAdvEd_Border(\'clr\',\'#NpAdv-BodrR\',\'#NpAdv-BodrRinp\')" id="NpAdv-BodrRinp" type="color" class="clrinput"/></div></div></td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td > <div id="NpAdvEd-DecorTxtSdw-Item">Bottom Border Color</div></td><td> <div style="background-color:navy;color:white;" id="NpAdv-BodrB" class="NpSetEdit" onclick="document.getElementById(\'NpAdv-BodrBinp\').click()">Edit<input onchange="NpAdvEd_Border(\'clr\',\'#NpAdv-BodrB\',\'#NpAdv-BodrBinp\')" id="NpAdv-BodrBinp" type="color" class="clrinput"/></div></div></td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td > <div id="NpAdvEd-DecorTxtSdw-Item">Left Border Color&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td><td> <div style="background-color:navy;color:white;" id="NpAdv-BodrL" class="NpSetEdit" onclick="document.getElementById(\'NpAdv-BodrLinp\').click()">Edit<input onchange="NpAdvEd_Border(\'clr\',\'#NpAdv-BodrL\',\'#NpAdv-BodrLinp\')" id="NpAdv-BodrLinp" type="color" class="clrinput"/></div></div></td>
                                                    </tr>
                                                     <tr>
                                                        <td colspan="2"> <div id="NpAdvEd-DecorTxtSdw-Item">Border Radius</div></td><td><input id="NpAdvEd-Decor-Bord-rad" type="number" onchange="NpAdvEd_Border(\'change\',\'none\',\'none\')"/></div></td>
                                                    </tr>
                                                    
                                                     </table>
                                                          
                                                       
                                                         </div>
                                                          <div id="NpAdvEd-DecorItem"><input type="checkbox" id="NpAdvEd-Dec-BoxShdw" onchange="NpAdvEd_BoxShdw(\'NpAdvEd-Dec-BoxShdw\',\'none\',\'initial\')"/>Box Shadow </div>
                                                         <div id="NpAdvEd-Decor-BoxShdw" style="display: none">
                                                             <table>
                                                    <tr>
                                                        <td> <div id="NpAdvEd-DecorTxtSdw-Item">Horizontal<input id="NAED-BoxSh-hz" type="number" onchange="NpAdvEd_BoxShdw(\'NpAdvEd-Dec-BoxShdw\',$(\'#NAED-BoxSh-hz\').val(),\'hz\')"/></div></td><td> <div id="NpAdvEd-DecorTxtSdw-Item">Vertical<input id="NAED-BoxSh-vr" type="number" onchange="NpAdvEd_BoxShdw(\'NpAdvEd-Dec-BoxShdw\',$(\'#NAED-BoxSh-hz\').val(),\'hz\')"/></div></td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td> <div id="NpAdvEd-DecorTxtSdw-Item">Intensity<input id="NAED-BoxSh-int" type="number" onchange="NpAdvEd_BoxShdw(\'NpAdvEd-Dec-BoxShdw\',$(\'#NAED-BoxSh-hz\').val(),\'hz\')"/></div></td><td> <div id="NpAdvEd-DecorTxtSdw-Item">Size<input id="NAED-BoxSh-Blur" type="number" onchange="NpAdvEd_BoxShdw(\'NpAdvEd-Dec-BoxShdw\',$(\'#NAED-BoxSh-hz\').val(),\'hz\')"/></div></td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td> <div id="NpAdvEd-DecorTxtSdw-Item">Color &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="background-color: white;" id="NpAdv-BoxShdwClr" class="NpSetEdit" onclick="document.getElementById(\'NpAdv-BoxShdwClrinp\').click()">Edit<input onchange="NpAdvEd_BoxShdw(\'NpAdvEd-Dec-BoxShdw\',$(\'#NAED-BoxSh-hz\').val(),\'clr\')" id="NpAdv-BoxShdwClrinp" type="color" class="clrinput"/></div></div></td>
                                                    </tr>
                                                    
                                                     </table>
                                                          
                                                       
                                                         </div>
                        <font style="color:white">SedFed</font> 
                                               
                                            </div>
                                            
                    <div id="NpAdvEdDone" onclick="NpAdvEd_applyAll()">Apply</div>
                                        </div>
                                        
                                    </div>
                           
                                    <div id="NpAdvPreview" >
                                        <div id="NpAdv-Editor-ttl" >Preview</div>
                                        <div id="NpAdvPreview-Main"></div>
                                    </div>
                            </div>
                            <div id="NpAdvDoneBar" onclick="NpAdvDoneCustom()">Done Customizing</div>
                            <div id="NpAdvhelpWindow">
                                <div id="helpWinTitle">? &nbsp;&nbsp;Help &nbsp;&nbsp;- &nbsp;&nbsp;Advanced Post Caption<div id="closeHelpWindow" onclick="$(\'#NpAdvhelpWindow\').slideUp()">X</div></div>
                                <div id="HelpWindowInCont">
                                    <div id="helpInnerTitle">Step 1 :</div>
                                    <div id="helpContentItem">Complete your Post Caption in  Post Caption > Text box</div>
                                
                                    <div id="helpInnerTitle">Step 2 :</div>
                                    <div id="helpContentItem">Type the text that you want to highlight in <br> Advanced Settings > Text to Customize > Specific Text</div>
                                    <div id="helpInnerTitle">Step 3 :</div>
                                    <div id="helpContentItem">Select the Tools Checkboxes to Enable or Disable the Effects</div>
                                    <div id="helpInnerTitle">Step 5 :</div>
                                    <div id="helpContentItem">You can alter the values for the effects with provided controls for Highlighted Text</div>
                                    <div id="helpInnerTitle">Step 6 :</div>
                                    <div id="helpContentItem">After finalizing effects click Apply button </div>
                                    <div id="helpInnerTitle">Step 7 :</div>
                                    <div id="helpContentItem">After applying you can start from step 2 for next word </div>
                                    <div id="helpInnerTitle">Step 8 :</div>
                                    <div id="helpContentItem">After applying all words click done customizing to return to Main window </div>
                                    
                                    <div id="helpInnerTitle">Hint :</div>
                                    <div id="helpContentItem">Don\'t modify post caption during applying effects if you don\'t know what you are doing</div>
                                    <div id="helpContentItem">You can preview how your post will appear in Preview Window Anytime</div>
                                    <div id="helpContentItem">This window is only for post caption customizing and you can add files after</div>
                                    <div id="helpContentItem">If you know HTML you can use it but only < font > tags</div>
                                    
                                </div>
                            </div>
                                </div>
                        
                        <div id="winNPholder">
                            <div id="winNP-OutContainer">
                                <div id="winNP-PostContainer">
                                    <div id="NewPostEditorCont">
                                    <div id="winNp-postUser">
                                        <div id="NpPostUser">'.$user_name.'<div id="NpPostId">Post ID  |&nbsp&nbsp&nbsp '.$pos_id.'</div><div id="NppostTime">'.$today.'</div></div>
                                    </div>
                                    <div id="NpPostCaptionCont">
                                        <textarea id="NpPostCaptionContTxt" oninput="$(\'#NpAdv-Editor-inp\').val(this.value);"  placeholder="About This Post ..."></textarea>
                                        
                                    </div>
                                    <div id="NppostAdditionals">
                                        <div id="NpFeelExpDiv" class="NpP_A_Exp_Item" onclick="NewPostExpand(\'#NpFeelCont\',\'#NpFeelExpDiv\')"><img id="NewPostFeelingicon" src="icons/test-smiley.png" /> Feeling</div>
                                         <div id="NpLocExpDiv" class="NpP_A_Exp_Item" onclick="NewPostExpand(\'#NpLocateCont\',\'#NpLocExpDiv\')"><img id="NewPostFeelingicon" src="icons/location.png"/>Location</div>
                                          <div id="NpWithExpDiv" class="NpP_A_Exp_Item" onclick="clkchkbox(3)"><img id="NewPostFeelingiconp" onclick="clkchkbox(3)" src="icons/with_people.png"/>People</div>
                                          <div id="selected_with_ppl"></div>
                                        <div class="NpP_A_FeelCont" id="NpFeelCont" style="display: none;">
                                            <div id="NpP_A_Item">While Posting <input id="NpFeelWhileInp" type="text" placeholder="What do you feel now..."/> </div>
                                            <div id="NpP_A_Item">By Posting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="NpFeelByInp" type="text" placeholder="Feeling by posting this..."/></div>
                                        </div>
                                          <div class="NpP_A_FeelCont" id="NpLocateCont" style="display: none;">
                                            <div id="NpP_A_Item">Where ?<input id="NpLocateInp" type="text" placeholder="In Location"/> </div>
                                          </div>
                                          <div class="NpP_A_FeelCont" id="NpWithCont" style="display: none;">
                                            <div id="NpP_A_Item">With ?<input id="NpLocateInp" type="text" placeholder="add people"/> </div>
                                          </div>
                                        
                                       
                                        
                                        
                                    </div>
                                    <div id="NpPostMediaContainer">
                                    <div id="uploadimagesdiv" style="max-height:100px;overflow:auto;">
                                                </div>
                                        <div id="justAddedCont" style="display: none">

                                            <div id="NP_justAddInner">
                                            
                                                 
                                            
                                            </div>
                                                
                                       
                                            </div>
                                        <div id="NpPostAddMedia">
                                     
                                           <form id="uploadform" action="uploadpost.php" method="post"
                                    enctype="multipart/form-data" target="uploadframe" onsubmit="secpos(event);return true;">
                                           <input type="file" id="myfile"  multiple="multiple" onchange="myfileupload(this)" >
                                           <input type="submit" id="mysubmit" value="" style="display:none;">
                                       ';
        
    require_once  'mysqli_connect.php';
        $q2="select post_id as pid from postforall order by post_id desc";
$r=mysqli_query($dbc,$q2);
if($r)
{
    $row=mysqli_fetch_array($r);
    $post_id=$row['pid'];
    $post_id=$post_id;
}else{
    $post_id=1;
}
   echo"<input type=\"hidden\" name=\"postidval\" id=\"totlpostcnt\" value=\"$post_id\">";

        echo '
               
            <div id="NpAddMediaBtn" onclick="$(\'#myfile\').click();">Add Any File</div>
            
                                            </div>
                                    </div>
                                    <div id="NewPostWhoCares">
                                        
                                        <div id="NPWCaudi" class="NPwhoCareItem" onclick="NPaudiExpnd(\'#NPWCaudi\',\'#NPWCaudiCont\')"><img src="icons/target-audis.png" height="25px"/> Audience</div>
                                        
                                            <div id="NPWCresponse" class="NPwhoCareItem" onclick="NPaudiExpnd(\'#NPWCresponse\',\'#NPWCrespCont\')"><img src="icons/response-audis.png" height="25px"/> Response</div>
                                            <div id="NPWCaudiCont" style="display: none">
                                                <div class="NPWCAitem">
                                                    <input type="checkbox" checked id="incme" /> Me
                                                </div>
                                                <div class="NPWCAitem">
                                                    <input type="checkbox" name="ap" value="allppl" id="allppls" checked="checked" /> All People
                                                </div>
                                                <div class="NPWCAitem">
                                                    <input type="checkbox" name="ar" value="allrel" id="allrlns" checked="checked"/> All Relations
                                                </div>
                                                <div class="NPWCAitem">
                                                    <input type="checkbox" id="frds" checked="checked"/> Friends
                                                </div>
                                                <div class="NPWCAitem">
                                                    <input type="checkbox" id="fam" checked="checked"/> Family
                                                </div>
                                                <div class="NPWCAitem">
                                                    <input type="checkbox" id="spl" checked="checked"/> Special
                                                </div>
                                                <div class="NPWCAitem">
                                                    <input type="checkbox" id="sec" checked="checked"/> Secret
                                                </div>
                                                <div class="NPWCAitem">
                                                    <input type="checkbox" id="enem" checked="checked"/> Enemy
                                                </div>
                                                <div class="NPWCAitem">
                                                    <input type="checkbox" id="pplslct1" onclick="clkchkbox(1)"/> Show to
                                                </div>
                                                <div class="NPWCAitem">
                                                    <input type="checkbox" id="pplslct2" onclick="clkchkbox(2)"/> Hide To
                                                </div>
                                            </div>
                                            <div class="NPWCaudiInps" id="NPWCaudiInpSho" style="display: none">
                                                Show only to <input type="text"  placeholder="These people can see this Post"/>
                                            </div>
                         <div class="NPWCaudiInps" id="NPWCaudiInpHid" style="display: none">
                                                Hide to &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="These people can\'t see this Post"/>
                                            </div>
                                            <div id="NPWCrespCont" style="background-color: whitesmoke;display: none" >
                                                <div id="NPWC-innerResp">
                                                                         
                                                    <input type="checkbox" checked id="resp1"/>  <img   class="NPSlikeicon" src="icons/post-sf-like.png" alt="like"/> 
                                                    <input type="checkbox" checked id="resp2"/> <img  id="Np-unlikeIcon" class="NPSlikeicon" src="icons/post-sf-unlike.png" alt="like"/> 

                                                    <input type="checkbox" checked id="resp3"/>  <img     class="NPSlikeicon" src="icons/post-sf-emptyRate.png" alt="like"/>



                                                    <input type="checkbox" checked id="resp4"/>     <img src="icons/post-media-download.png"  class="NPSlikeicon"/>&nbsp;&nbsp;
                                                    <input type="checkbox" checked id="resp5"/>   <img class="NPSlikeicon" src="icons/post-sf-comment.png" alt="like"/>
                                                    <input type="checkbox" checked id="resp6"/>    <img class="NPSlikeicon"   src="icons/post-sf-share.png" alt="like" width="23px" height="23px"/>
                            
                       
                                                </div>
                                            </div>
                                    </div>
                                   
                                    
                           
                                       
                                           
                                    <div id="NpPostSubmit" onclick="NewPostPreview()">Preview</div>
                                </div>
                                     <!-- for new post preview -->
                                     <input type="hidden" value="" id="for_tot_file_size" />
                                    <div id="NewPostPreview" style="display: none">
                                     
                            
                                        <div id="postUser" >
                                                    <span id="postUserName" style="cursor: pointer;" > at  '.$user_name.'</span>
                                                        <span id="for_show_location"></span>
                                                    <div id="postTime" style="display: inline"  >Sat&nbsp;'.$today.'</div>
                                                    <div style="display: inline" id="SedFedPostID" ><b>|</b>&nbsp;'.$post_id.'</div>
                                                </div>
                                        
                                         <div id="NewPostPreCap" class="postCaption"  ></div>
                      
                                         <div id="NewPostMediaCont" class="mediacontentprev" style="background-color: whitesmoke">

                                          </div>
                                             <div id="aboutThisPost">
                                                        <span id="forPostLike"><img  id="sf-likeIcon" class="response1" src="icons/post-sf-like.png" alt="like"/> 
                                                        <img  id="sf-unlikeIcon"  class="response2" src="icons/post-sf-unlike.png" alt="like"/> </span>
                                                        <span id="forPostRate" class="response3">
                                                            <img    id="sf-rateIcon"  class="rated1" src="icons/post-sf-emptyRate.png" alt="like"/> 
                                                            <img   id="sf-rateIcon"  class="rated2" src="icons/post-sf-emptyRate.png" alt="like"/>
                                                            <img    id="sf-rateIcon"   class="rated3" src="icons/post-sf-emptyRate.png" alt="like"/>
                                                            <img    id="sf-rateIcon"  class="rated4" src="icons/post-sf-emptyRate.png" alt="like"/>
                                                            <img  id="sf-rateIcon"  class="rated5" src="icons/post-sf-emptyRate.png" alt="like"/></span>
                                                        <span id="forPostViews">0 Views</span>
                                                        <span id="forShare">
                                                            <a href="icons/post-testimg.jpg" target="_blank"> <img src="icons/post-media-download.png" class="response4"  id="sf-CommentIcon"/></a>&nbsp;&nbsp;
                                                            <img id="sf-CommentIcon" class="response5"  src="icons/post-sf-comment.png" alt="like"/>
                                                            <img id="sf-shareIcon" class="response6"    src="icons/post-sf-share.png" alt="like"/></span>
                                                       
                                             </div>
                                              <div id="JICHolderOut">
         <div class="" id="holder" style="position: absolute;opacity: 0;left:-200%;" >
       
       </div>
      <div class="holder" id="holder_result">
      </div>
      <div class="NPQP_Ttl"> Image Quality </div>
        <div class="NP_ImgQSlideHold">
       
          <input type="range" min="0" max="100" value="65"  oninput="$(\'#jpeg_encode_quality\').val($(\'#NPC_QSildeinp\').val());"  id="NPC_QSildeinp"/>
         <input id="jpeg_encode_quality" value="65" type="text">  % </div> <div id="controls-wrapper">
             
             <span class="NPQP_Tip" id=\'NPCQ_FileSize\' > File Size :  </span><span class="NPQP_Rtip"> Less Quality , Faster Upload </span>
          </div> 
          <div onclick="nowcompress();$(\'#for_tot_file_size\').val(\'0\');" class="compress_btn">Compress</div>
          <!--
       <div id="buttons-wrapper">
              <a class="btn btn-large btn-primary" id="jpeg_encode_button" onclick="doCompressBtnAct()">Compress</a>&nbsp;
              <a class="btn btn-large btn-success" id="jpeg_upload_button"  >Upload</a>
            </div> -->
      <div class="col" id="right-col" style="display:none;" >
        <fieldset>
          <legend>Console output</legend>
          <div id="console_out">Filename:IMG_20150328_090650.jpg<br>Filesize:652.962890625 Kb<br>Type:image/jpeg<br>Image loaded<br>Quality &gt;&gt;71<br>process start...<br>process finished...<br>Processed in: 249ms<br>Quality &gt;&gt;16<br>process start...<br>process finished...<br>Processed in: 162ms<br>Quality &gt;&gt;5<br>process start...<br>process finished...<br>Processed in: 172ms<br>Quality &gt;&gt;4<br>process start...<br>process finished...<br>Processed in: 143ms<br></div>
        </fieldset>
      </div>
      
   
 

    </div>
                                             <div id="NpPostPreview" onclick="NewPostRetEdit()">Edit</div>
                                             <div id="pbarbdr" style="display:none;"><div id="pbar"  ></div></div><br/>
                                             <div id="NpPostSubmit" class="subtpost" onclick="publishmypost()">Publish</div>
                       <div id="completepost" style="display:none;"></div>
                       <div id="for_test"></div>

                                  </div>
                                </div>
                            </div>
                        </div>
                        
                                
                            </div>
                                <div id="winNpPostSettings">
                            Post Settings
                            <div id="NpPostSettingsCont">
                                
                                <div id="NpSpostColor">Post Caption </div>
                                <div id="NpSETpostCat">Text Color <div style="background-color: navy;color:white;" id="NpSetPC-txtclr" class="NpSetEdit" onclick="document.getElementById(\'NpSetPC-txtclrinp\').click()">Edit<input onchange="CrNwPostSetClrChnge(\'caption\',\'#NpSetPC-txtclrinp\',\'#NpSetPC-txtclr\',\'c\')" id="NpSetPC-txtclrinp" type="color" class="clrinput"/></div></div>
                                <div id="NpSETpostCat">Background Color <div style="background-color: white;" id="NpSetPC-txtBGclr" class="NpSetEdit" onclick="document.getElementById(\'NpSetPC-txtBGclrinp\').click()">Edit<input onchange="CrNwPostSetClrChnge(\'caption\',\'#NpSetPC-txtBGclrinp\',\'#NpSetPC-txtBGclr\',\'bg\')" id="NpSetPC-txtBGclrinp" type="color" class="clrinput"/></div></div>
                                <div id="NpSpostColor">Whole Post </div>
                                <div id="NpSETpostCat">Border Color <div style="background-color: crimson;color:white;" id="NpSetWP-txtBclr" class="NpSetEdit" onclick="document.getElementById(\'NpSetWP-txtBclrinp\').click()">Edit<input onchange="CrNwPostSetClrChnge(\'whole\',\'#NpSetWP-txtBclrinp\',\'#NpSetWP-txtBclr\',\'c\')" id="NpSetWP-txtBclrinp" type="color" class="clrinput"/></div></div>
                               <div id="NpSETpostCat">Background Color <div style="background-color: white;" id="NpSetWP-txtBGclr" class="NpSetEdit" onclick="alert(event.target); document.getElementById(\'NpSetWP-txtBGclrinp\').click()" >Edit<input onchange="CrNwPostSetClrChnge(\'whole\',\'#NpSetWP-txtBGclrinp\',\'#NpSetWP-txtBGclr\',\'bg\')" id="NpSetWP-txtBGclrinp" type="color" class="clrinput"/></div></div>
                              
                               <div id="NpAdvanced" onclick="NpAdvOpenwindowForAdv()">Advanced Post Caption</div>
                                
                                <!--
                                <div id="NpSETpostCat">Text Color <div style="background-color:navy;color:white;" id="NpSetST-txtclr" class="NpSetEdit" onclick="document.getElementById(\'NpSetST-txtclrinp\').click()">Edit<input onchange="CrNwPostSetClrChnge(\'selectd\',\'#NpSetST-txtclrinp\',\'#NpSetST-txtclr\',\'c\')" id="NpSetST-txtclrinp" type="color" class="clrinput"/></div></div>
                                <div id="NpSETpostCat">Background Color <div style="background-color: white;" id="NpSetST-txtBGclr" class="NpSetEdit" onclick="document.getElementById(\'NpSetST-txtBGclrinp\').click()">Edit<input onchange="CrNwPostSetClrChnge(\'selectd\',\'#NpSetST-txtBGclrinp\',\'#NpSetST-txtBGclr\',\'bg\')" id="NpSetST-txtBGclrinp" type="color" class="clrinput"/></div></div>
                                <div id="NpSETpostCat">Decoration <div id="NpSetpostCatOps">-->
                                    
                                    </div>
                                   
                                    </div>
                        </div>
                     </div>
                     </form>
    </body>
</html>';
    }else{
         $myn=$_REQUEST['q'];
         echo ''.$myn.'';
      

}
}
?>
