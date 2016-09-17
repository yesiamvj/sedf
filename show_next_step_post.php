
<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    $post_caption=$_REQUEST['postc'];
    require 'mysqli_connect.php';
      $q="select med_img as p from small_pics where user_id=$user_id ";
                      $r=mysqli_query($dbc,$q);
                      if($r)
                      {
                          
                          if(mysqli_num_rows($r)>0)
                          {
                              $rpw=mysqli_fetch_array($r,MYSQLI_ASSOC);
                              $ppics=$rpw['p'];
                             
                              
                          }  else {
                              if($sex=="girl")
                              {
                                  
                          $ppics="../web/icons/female.png"; 
                              }else
                              {
                                   $ppics="../web/icons/male.png";
                              }   
                          }
                      }
    echo '<!DOCTYPE html>

<html>
    <head>
    
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta http-equiv="Content-Language" content="en-US" />
       <!-- <meta http-equiv="Author" content="Vijayakumar for SedFed" /> -->  
    <title>Create New Group - SedFed</title>
   
    <link rel="stylesheet" href="createNewPost.css"/>
     
   <script src="J%20I%20C%20-%20a%20Javascript%20Image%20Compressor_files/JIC.js" type="text/javascript"></script>
<script src="J%20I%20C%20-%20a%20Javascript%20Image%20Compressor_files/demo.js" type="text/javascript"></script>
<script src="J%20I%20C%20-%20a%20Javascript%20Image%20Compressor_files/jquery.js" type="text/javascript"></script> 

   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="createNewPost.js" type="text/javascript"></script>
   <script src="jquery.MultiFile.js" type="text/javascript"></script>
   <script src="jquery.form.js" type="text/javascript"></script>
   <script src="jquery.MetaData.js" type="text/javascript"></script>
  </head>
    <body>
        <div class="contentFull">
        
            <div class="CreateNewPostBackG">
            <input type="hidden" value="1" id="which_ppl_u_want"/>
            <div class="CreateNewPostHolder">
                <div class="CNPH_Ttl">Create a new Post <div class="CNPH_S1Ttl">
                        Step 1
                    </div>
                    <div class="closeCreateNewPost" onclick="$(\'.CreateNewPostBackG\').slideUp(1000)" >X</div>
                </div>
                <div class="CNPH_TopHint"> 
                    <div id="CNPH_TAB1" class="curTabCNPH" >
                        Post Caption
                    </div>
                    <div class="CNPH_TopHintItm" id="CNPH_TAB2" >
                        Decoration
                    </div>
                    <div class="CNPH_TopHintItm" id="CNPH_TAB3" >
                        Add files
                    </div>
                  
                    <div class="CNPH_TopHintItm" id="CNPH_TAB4">
                       Audience
                    </div>
                    <div class="CNPH_TopHintItm" id="CNPH_TAB5" >
                       Publish
                    </div>
                    
                </div>
                
                <div id="add_peole_wind"></div>
                <div class="CNPH_StepOneHolder" style="//display: none" >
                    
                    <div class="CNPH_S1_Cont">
                         
                        <img class="img_CNPH_ProfImg" src="'.$ppics.'" alt="'.$ppics.'"/>
                      
                        <textarea placeholder="Hey , What\'s Up ?" id="NpPostCaptionContTxt" value="'.$post_caption.'" >'.$post_caption.'</textarea>
                     
                        <div class="CNPH_CapColors">
                            <div class="CNPH_CapColorItm" id="NpSetPC-txtclr" onclick="document.getElementById(\'NpSetPC-txtclrinp\').click()" >
                                Color
                            </div>
                            <input onchange="CrNwPostSetClrChnge(\'caption\',\'#NpSetPC-txtclrinp\',\'#NpSetPC-txtclr\',\'c\')" id="NpSetPC-txtclrinp" type="color" style="display: none;"/>
                            <div class="CNPH_CapColorItm" id="NpSetPC-txtBGclr" onclick="document.getElementById(\'NpSetPC-txtBGclrinp\').click()">
                                Background Color
                            </div>
                            <input onchange="CrNwPostSetClrChnge(\'caption\',\'#NpSetPC-txtBGclrinp\',\'#NpSetPC-txtBGclr\',\'bg\')" id="NpSetPC-txtBGclrinp" type="color" style="display: none;"/>
                        </div>
                          <div class="CNPH_CapTip">
                            Use \' $ \'  symbol to Tag or specify a person . You can use \' # \' Tags .
                        </div>
                         <div id="NppostAdditionals">
                                        <div id="NpFeelExpDiv" class="NpP_A_Exp_Item" onclick="NewPostExpand(\'#NpFeelCont\',\'#NpFeelExpDiv\')"><img id="NewPostFeelingicon" src="icons/test-smiley.png" /> Action</div>
                                         <div id="NpLocExpDiv" class="NpP_A_Exp_Item" onclick="NewPostExpand(\'#NpLocateCont\',\'#NpLocExpDiv\')"><img id="NewPostFeelingicon" src="icons/location.png"/>Location</div>
                                          <div id="NpWithExpDiv" class="NpP_A_Exp_Item" onclick="NewPostExpand(\'#NpWithCont\',\'#NpWithExpDiv\')"><img id="NewPostFeelingiconp" src="icons/with_people.png"/>People</div>
                                        <div class="NpP_A_FeelCont" id="NpFeelCont" style="display: none;">
                                            <div id="NpP_A_Item">While Posting <input id="NpFeelWhileInp" type="text" placeholder="What do you feeling/Doing now..."/> </div>
                                            <div id="NpP_A_Item">By Posting &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input id="NpFeelByInp" type="text" placeholder="Feeling/Doing by posting this..."/></div>
                                        </div>
                                          <div class="NpP_A_FeelCont" id="NpLocateCont" style="display: none;">
                                            <div id="NpP_A_Item">Where ?<input id="NpLocateInp" type="text" placeholder="In Location"/> </div>
                                          </div>
                                          <div class="NpP_A_FeelCont" id="NpWithCont" style="display: none;">
                                            <div id="NpP_A_Item">With ?<input id="NpLocateInp" type="text" onclick="open_add_ppl_wind(1)" placeholder="add people"/> </div>
		          <div id="with_ppl_div"></div>
                                          </div>
                                        
                                       
                                        
                                        
                                    </div>  <br/>
                    </div>
	   <input type="hidden" value="1" id="my_cur_val" />
                    <input id="tot_img_prev_cnt" type="hidden" value="1"/>
                    <div class="CNPH_Drivers">
                       
                        <div class="CNPH_PrcdBtnNext" onclick="step2ofNP();swichNextTab(\'2\',\'#NpAdv-holder\',\'.CNPH_StepOneHolder\')" >
                                    Next 
                         </div>
                    </div>
                   
                </div>
                <script>
                    function step2ofNP(){
                        NpAdvOpenwindowForAdv();
                        $(\'#NpAdvEdTgtTxtinp\').val(\'\');
                        
                    }
                </script>
                 <div id="NpAdv-holder" style="display: none;">
                            
                            <div id="NpAdvOuter">
                                <div class="heplll" onclick="$(\'#NpAdvhelpWindow\').slideDown();" style="cursor: pointer;float: right" >? help</div> 
                                    <div id="NpAdv-Caption">
                                        <div id="NpAdv-Editor-ttl">Post Caption</div>
                                        <textarea id="NpAdv-Editor-inp" placeholder="About This Post" oninput="$(\'#NpAdvPreview-Main\').html($(\'#NpAdv-Editor-inp\').val());"></textarea>
                                        <textarea id="NpAdv-Caption-Formt" style="display: none;" oninput="$(\'#NpAdvPreview-Main\').html($(\'#NpAdv-Caption-Formt\').val());"></textarea>
                                        <div id="NpAdv-Editor-fSwitch" onclick="NpAdvChngeFormat(\'#NpAdv-Editor-inp\',\'#NpAdv-Caption-Formt\',\'#NpAdv-Editor-fSwitch\')">Formatted Text</div>
                                    </div>
                                    <div id="NpAdv-Editor">
                                        <div id="NpAdv-Editor-ttl">Decorations</div>
                                        <div id="NpAdvEditor-Outer">
                                            <div id="NpAdvEd-Ttl">Text to Customize</div>
                                            <div id="NpAdvEd-item"><input type="text" id="NpAdvEdTgtTxtinp" placeholder="Specific Text" oninput="NpAdvSptxtinput(\'#NpAdvEdTgtTxtinp\',\'#NpAdv-Editor-inp\',\'#NpAdv-Caption-Formt\',\'#NpAdv-Editor-fSwitch\')" /></div>
                                            <div id="NpAdvEd-item">Color For Specified Text<div style="background-color:navy;color:white;" id="NpSetST-txtclr" class="NpSetEdit" onclick="document.getElementById(\'NpSetST-txtclrinp\').click()">Edit<input onchange="NpAdvSTchangeThis(\'#NpSetST-txtclrinp\',\'#NpSetST-txtclr\',\'clr\')" id="NpSetST-txtclrinp" type="color" style="display: none;" value="#400080"/></div></div>
                                            <div id="NpAdvEd-item">Background Color<div style="background-color: white;" id="NpSetST-txtBGclr" class="NpSetEdit" onclick="document.getElementById(\'NpSetST-txtBGclrinp\').click()">Edit<input onchange="NpAdvSTchangeThis(\'#NpSetST-txtBGclrinp\',\'#NpSetST-txtBGclr\',\'bgclr\')" id="NpSetST-txtBGclrinp" type="color" style="display: none;" value="#ffffff"/></div></div>     
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
                                                        
                                                        <td> <div id="NpAdvEd-DecorTxtSdw-Item">Blur<input id="NAED-txtSh-int" type="number" onchange="NpAdvEd_TxtShdw(\'NpAdvEd-Dec-TxtShdw\',$(\'#NAED-txtSh-hz\').val(),\'hz\')"/></div></td><td> <div id="NpAdvEd-DecorTxtSdw-Item">Color<div style="background-color: white;" id="NpAdv-txtShdwClr" class="NpSetEdit" onclick="document.getElementById(\'NpAdv-txtShdwClrinp\').click()">Edit<input onchange="NpAdvEd_TxtShdw(\'NpAdvEd-Dec-TxtShdw\',$(\'#NAED-txtSh-hz\').val(),\'clr\')" id="NpAdv-txtShdwClrinp" type="color" style="display: none;"/></div></div></td>
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
                                                        
                                                        <td > <div id="NpAdvEd-DecorTxtSdw-Item">Top Border Color</div></td><td> <div style="background-color:navy;color:white;" id="NpAdv-BodrT" class="NpSetEdit" onclick="document.getElementById(\'NpAdv-BodrTinp\').click()">Edit<input onchange="NpAdvEd_Border(\'clr\',\'#NpAdv-BodrT\',\'#NpAdv-BodrTinp\')"  id="NpAdv-BodrTinp" type="color" style="display: none;"/></div></div></td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td > <div id="NpAdvEd-DecorTxtSdw-Item">Right  Border Color</div></td><td> <div style="background-color:navy;color:white;" id="NpAdv-BodrR" class="NpSetEdit" onclick="document.getElementById(\'NpAdv-BodrRinp\').click()">Edit<input onchange="NpAdvEd_Border(\'clr\',\'#NpAdv-BodrR\',\'#NpAdv-BodrRinp\')" id="NpAdv-BodrRinp" type="color" style="display: none;"/></div></div></td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td > <div id="NpAdvEd-DecorTxtSdw-Item">Bottom Border Color</div></td><td> <div style="background-color:navy;color:white;" id="NpAdv-BodrB" class="NpSetEdit" onclick="document.getElementById(\'NpAdv-BodrBinp\').click()">Edit<input onchange="NpAdvEd_Border(\'clr\',\'#NpAdv-BodrB\',\'#NpAdv-BodrBinp\')" id="NpAdv-BodrBinp" type="color" style="display: none;"/></div></div></td>
                                                    </tr>
                                                    <tr>
                                                        
                                                        <td > <div id="NpAdvEd-DecorTxtSdw-Item">Left Border Color&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div></td><td> <div style="background-color:navy;color:white;" id="NpAdv-BodrL" class="NpSetEdit" onclick="document.getElementById(\'NpAdv-BodrLinp\').click()">Edit<input onchange="NpAdvEd_Border(\'clr\',\'#NpAdv-BodrL\',\'#NpAdv-BodrLinp\')" id="NpAdv-BodrLinp" type="color" style="display: none;"/></div></div></td>
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
                                                        
                                                        <td> <div id="NpAdvEd-DecorTxtSdw-Item">Color &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div style="background-color: white;" id="NpAdv-BoxShdwClr" class="NpSetEdit" onclick="document.getElementById(\'NpAdv-BoxShdwClrinp\').click()">Edit<input onchange="NpAdvEd_BoxShdw(\'NpAdvEd-Dec-BoxShdw\',$(\'#NAED-BoxSh-hz\').val(),\'clr\')" id="NpAdv-BoxShdwClrinp" type="color" style="display: none;"/></div></div></td>
                                                    </tr>
                                                    
                                                     </table>
                                                          
                                                       
                                                         </div>
                        <font style="color:white">SedFed</font> 
                                               
                                            </div>
                                            
                    <div id="NpAdvEdDone" onclick="NpAdvEd_applyAll()">Apply</div>
                                        </div>
                                        
                                    </div>
                           
                                    <div id="NpAdvPreview">
                                        <div id="NpAdv-Editor-ttl">Preview</div>
                                        <div id="NpAdvPreview-Main"></div>
                                    </div>
                            </div>
                             <div class="CNPH_Drivers">
                         <div class="CNPH_PrcdBtnPrev" onclick="swichprevTab(\'1\',\'.CNPH_StepOneHolder\',\'#NpAdv-holder\')" >
                                Back
                         </div>
                         <div class="CNPH_PrcdBtnPrev" onclick="swichNextTab(\'3\',\'.CNPH_S2_Cont\',\'#NpAdv-holder\')" >
                                Skip
                         </div>
                         <div class="CNPH_PrcdBtnNext" onclick="swichNextTab(\'3\',\'.CNPH_S2_Cont\',\'#NpAdv-holder\');$(\'#NpPostCaptionContTxt\').val($(\'#NpAdv-Editor-inp\').val());" >
                                    Next 
                         </div>
                    </div>
                            
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
                                <div class="CNPH_S2_Cont" style="display: none;" >
                                  
                                    
                                    <div id="fileSelectionArea">
                                          <div class="CNPH_S2_Tip">
                                       Images , Audio , Video , PDF , Etc.,
                                    </div>
                                    <div class="CNPH_Add_Btn" onclick="ImgUploadPrc()" >
                                        <img class="ico_clipa" src="icons/prof-images.png" />
                                        <div class="CNPH_ItmName">
                                            Images
                                        </div>
                                    </div>
                                    <script>
                                        function ImgUploadPrc(){
                                            $(\'#whatFileToUpload\').val(\'1\');
                                            $(\'.CNPH_Add_Btn\').slideUp();
                                            $(\'#fileSelectionArea\').slideUp();
                                            $(\'#imgUploadDiv\').slideDown();
                                        }
                                    </script>
                                     <input type="file" id="my_common_file" onchange="clear_imgs(this)" style="width:0px;height:0px;"/>
                                   
                                    <div class="CNPH_Add_Btn" onclick="$(\'.videoThumbnailHolder\').slideDown();" >
                                        <img class="ico_clipa" src="icons/video76.png" />
                                        <div class="CNPH_ItmName">
                                            Video
                                        </div>
                                    </div>
		  <div class="CNPH_Add_Btn"  onclick="$(\'#my_common_file\').click();">
                                        <img class="ico_clipa" src="icons/audio-pre.png"  />
                                         <div class="CNPH_ItmName">
                                           Audio
                                        </div>
                                    </div>
                                    <div class="CNPH_Add_Btn"  onclick="$(\'#my_common_file\').click();">
                                        <img class="ico_clipa" src="icons/pdf19.png" />
                                         <div class="CNPH_ItmName">
                                            Any Other File
                                        </div>
                                    </div>
                                    <script>
                                        function commonFileInput(){
                                            
                                            $(\'#commonFileInput\').click();
                                            $(\'.videoThumbnailHolder\').slideUp();
                                        }
                                    </script>
                                    
                                    <input type="hidden" id="whatFileToUpload" value="10" />
    
                                   
                                    <input type="file" id="myfile" onchange="$(\'#commonFileName\').text($(\'#commonFileInput\').val())" style="position:fixed;top: -5000px;width: 0px;height: 0px;" name="commonFile" id="commonFileInput" />
                                    
                                    <div class="videoThumbnailHolder" style="display: none" >
                                        
                                        <div class="CNPH_VTH_Tip" >
                                            Select an video file 
                                        </div>
                                        <div class="CNPH_Video_File" onclick="$(\'#my_common_file\').click();">
                                            Browse
                                        </div>
                                        <div class="CNPH_VTH_Tip"  id="tumb_nail_img" style="display:none;">
                                            Select an image file to display on video before video playing , loading & when pausing [thumbnail].
                                        </div>
                                        <br/>
		      <div>
                                        <input type="file"  id="thumb_nail_id" style="display:none"  accept="gif|jpg|png|jpeg"/>
                                    </div>
		        </div>
                                    
                                    <div class="fileAllPrevTip">
                                        File to upload
                                    </div>
                                    <div class="fileAllPreview" id="commonFileName" >
                                        <span style="color: silver" >
                                              Select any type and file and go to next step
                                        </span>
                                    </div>
                                </div>
                                     <div id="imgUploadDiv" style="display: none" >
                                         <div class="imgUploadTtl"> Images </div>
                                         <div class="fileAllPrevTip">
                                             Files to upload <div class="returnTypeFor" onclick="returnToSelectionDiv()" >Return to selection</div>
                                    </div>
                                         <script>
                                             function returnToSelectionDiv(){
                                                   $(\'#whatFileToUpload\').val(\'10\');
                                                   $(\'#imgUploadDiv\').hide();
                                                   $(\'#fileSelectionArea\').fadeIn();
                                            $(\'.CNPH_Add_Btn\').slideDown();
                                            
                                            
                                             }
                                         </script>
                                        <input id="imageUploadFiler" style="//position: absolute;top: -5500px;"  multiple type="file" accept="gif|jpg|png|jpeg"   class="multi with-preview"/>
                                         <div class="CNPH_S3_Ttl">
                                        Speed up your upload 
                                    </div>
                                    <div class="CNPH_S3_Tip">
                                        Lesser Quality Faster Upload
                                    </div>
		  <input type="hidden" value="50" id="NPC_QSildeinp" />
		  <input type="hidden" value="50" id="jpeg_encode_quality" />
                                        <div class="CNPH_S3_CompScaler">
                                       Compression Quality     <input type="range" onchange="$(\'#NPC_QSildeinp\').val(this.value)" id="imgCompressScale" />
                                        </div>
                                        <button class="compressImgBtn" onclick="$(\'#for_tot_file_size\').val(\'0\');nowcompress();">
                                            Compress
                                        </button><span id="NPCQ_FileSize"></span>
                                     </div>
                                    <div class="CNPH_Drivers">
                         <div class="CNPH_PrcdBtnPrev" onclick="swichprevTab(\'2\',\'#NpAdv-holder\',\'.CNPH_S2_Cont\')"  >
                                Back
                         </div>
                         <div class="CNPH_PrcdBtnPrev" onclick="swichNextTab(\'4\',\'.CNPH_S3_Cont\',\'.CNPH_S2_Cont\')">
                                Skip
                         </div>
                         <div class="CNPH_PrcdBtnNext" onclick="swichNextTab(\'4\',\'.CNPH_S3_Cont\',\'.CNPH_S2_Cont\')">
                                    Next 
                         </div>
                    </div>
                                </div>
                                <div class="CNPH_S3_Cont" style="display: none" >
                                    
                                              <div id="NewPostWhoCares">
                                        
                                        <div id="NPWCaudi" class="NPwhoCareItem" onclick="//NPaudiExpnd(\'#NPWCaudi\',\'#NPWCaudiCont\')"><img src="icons/target-audis.png" height="25px"/> Audience</div>
                                        <div class="CNPH_S33_Ttl">
                                        Who can see this post ?
                                    </div>
                                           <input type="hidden" id="chkalrdclkd" value="1"/>
                                            <div id="NPWCaudiCont" style="text-align: center;//display: none">
                                                <div class="NPWCAitem">
                                                    <input type="checkbox" checked id="include_me"/> Me
                                                </div>
                                                <div class="NPWCAitem">
                                                    <input type="checkbox" checked="checked" id="allrlns"/> All Relations
                                                </div>
                                                <div class="NPWCAitem">
                                                    <input type="checkbox" id="show_to_user" onclick="open_add_ppl_wind(2);$(\'#NPWCaudiInpSho\').slideToggle();"/> Show to
                                                </div>
		          
                                                <div class="NPWCAitem">
                                                    <input type="checkbox" id="hide_to_user"  onclick="open_add_ppl_wind(3);$(\'#NPWCaudiInpHid\').slideToggle();"/> Hide To
                                                </div>
		              
                                            </div>
		          <input type="hidden" id="for_tot_file_size" value="0"/>
                                            <div class="NPWCaudiInps" id="NPWCaudiInpSho" style="display: none">
                                                Show only to <input type="text" onclick="open_add_ppl_wind(2);" placeholder="These people can see this Post"/>
                                            <div id="show_members"></div></div>    
                                            <div class="NPWCaudiInps" id="NPWCaudiInpHid" style="display: none">
                                                Hide to &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="These people can\'t see this Post"/>
                                            <div id="hide_members"></div></div>
                                         <div id="NPWCresponse" class="NPwhoCareItem" onclick="open_add_ppl_wind(3);"><img src="icons/response-audis.png" height="25px"/> Response</div>
                                          <div class="CNPH_S33_Ttl">
                                        What can people do to this post ?
                                    </div>   
                                         <div id="NPWCrespCont"  >
                                                <div id="NPWC-innerResp">
                                                                         
                                                    <input type="checkbox" id="resp1" checked/>  <img   class="NPSlikeicon" src="icons/post-sf-like.png" alt="like"/> 
                                                    <input type="checkbox" id="resp2" checked/><img  id="Np-unlikeIcon" class="NPSlikeicon" src="icons/post-sf-unlike.png" alt="like"/> 

                                                    <input type="checkbox" id="resp3" checked/>    <img     class="NPSlikeicon" src="icons/post-sf-emptyRate.png" alt="like"/>



                                                    <input type="checkbox" id="resp4" checked/>     <img src="icons/post-media-download.png"  class="NPSlikeicon"/>&nbsp;&nbsp;
                                                    <input type="checkbox" id="resp5" checked/>   <img class="NPSlikeicon" src="icons/post-sf-comment.png" alt="like"/>
                                                    <input type="checkbox" id="resp6" checked/>    <img class="NPSlikeicon"   src="icons/post-sf-share.png" alt="like" width="23px" height="23px"/>
                            
                       
                                                </div>
                                            </div>
                                    </div>
                                    <div class="CNPH_Drivers">
                         <div class="CNPH_PrcdBtnPrev" onclick="swichprevTab(\'3\',\'.CNPH_S2_Cont\',\'.CNPH_S3_Cont\')"  >
                                Back
                         </div>
                         <div class="postUploadBtn" onclick="swichNextTab(\'5\',\'.CNPH_finalCont\',\'.CNPH_S3_Cont\');publishmypost()" >
                                        Publish
                                    </div>
                    </div>
                                   
                                </div>
                                <script>
                                    function swichNextTab(gy,tgtId,prevId){
		  
                                       $(prevId).slideUp();
                                    $(tgtId).slideDown();
                                    var hdj=gy-2+1;
                                    $(\'#CNPH_TAB\'+hdj).attr({\'class\':\'CNPH_TopHintItm\'});
                                    
                                   var hdjj=gy-2+2;
                                    $(\'#CNPH_TAB\'+hdjj).attr({\'class\':\'curTabCNPH\'});
                                    $(\'.CNPH_S1Ttl\').fadeOut().text(\'Step \'+gy).fadeIn();
                                    }
                                    function swichprevTab(gy,tgtId,prevId){
                                       $(prevId).slideUp();
                                    $(tgtId).slideDown();
                                    var hdj=gy-2+3;
                                         $(\'#CNPH_TAB\'+hdj).attr({\'class\':\'CNPH_TopHintItm\'});
                                          var hdjj=gy;
                                    $(\'#CNPH_TAB\'+hdjj).attr({\'class\':\'curTabCNPH\'});
                                     $(\'.CNPH_S1Ttl\').fadeOut().text(\'Step \'+gy).fadeIn();
                                    }
                                </script>
                                <div class="CNPH_finalCont" style="display: none;" >
                                    <div class="CNPH_FocusTxt">
                                        Processing
                                    </div>
                                    <div class="CNPH_ProgressBar">
                                        <div class="CNPH_ProgressRange"> 
                                            <div id="trueRangeOfPostUpload"></div><div class="CNPH_PB_Percent" ></div>
                                        </div> 
                                    
                                    </div>
                                    <div class="CNPH_FinalTip">
                                        Please wait while uploading ...
                                    </div>
                                    
                                </div>
            </div>
            </div>
            <div id="comp_images" style="display:none;"></div>
        </div>
    </body>
</html>
';
}