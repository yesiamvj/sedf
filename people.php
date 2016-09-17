<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
    header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    require 'mysqli_connect.php';
    $q="select first_name as f from basic where user_id=$user_id";
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $row=mysqli_fetch_array($r,MYSQLI_ASSOC);
            $myfname=$row['f'];
        }else
        {
            $myfname=$_SESSION['user_name'];
        }
    }
     include 'title_bar.php';
    echo '

<!DOCTYPE html>
<html>
  <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="robots" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
        <meta name="description" content="Welcome to SedFed - SedFed is a Free Social Network based on New Generation People for Colorful Communication" />
        <meta name="keywords" content="SedFed1,Social Network,File sharing,Colorful communication,New social network,Indian Social Network,Tamilan Social Network,SedFed,www.sedfed.com,SedFed,SedFed,SedFed,Everything for communication as Social network,ALL" />
     <!--   <meta http-equiv="Content-Language" content="en-US" />
        <meta http-equiv="Author" content="Vijayakumar for SedFed" /> -->  
    <title>People </title>
    <link rel="stylesheet" href="'.$_SESSION['css'].'people_rels.css"/>
   <script src="angular.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="people.js" type="text/javascript"></script>
  </head>
  
  <body>
      <div id="content-full" >
            ';
   
    echo '
            <div id="innerPageCont" >
                <div id="pageTitle">People around me</div>
                <!--<div class="slide_path" onclick="slide_down_wind(event)"><div id="slide_btn" "></div></div> -->
                <div id="topFiltrPplOut" >
                
                    <div id="tfiltrPplTtl">
                        Filter People
                    </div>
                    <div id="tfiltrPplIn" >
                        <div class="filtrItm">
                            <input class="filtrInp" id="nmsrch" style="color:crimson" oninput="filteruser()" type="text" placeholder="Name of the Person" />
                        </div>
                        <div class="filtrItm">
                            <input class="filtrChecks" id="mlsrch" value="boy" onclick="srchppl()" onchange="filteruser" type="checkbox"  /> Male
                            <input class="filtrChecks" id="fmlsrch" value="girl" onclick="srchppl()" onchange="filteruser" type="checkbox"  /> Female
                        </div>
                        <input type="hidden" value="" id="requstedusrnm" />
                        <div class="filtrItm" id="filtrAge">
                           Age <input id="agefrmsrch" class="filtrInp" oninput="filteruser()" type="text" placeholder="From" />
                           Between
                            <input class="filtrInp" id="agetosrch" oninput="filteruser()" type="text" placeholder="To" />
                        </div>
                        <div class="filtrItm" id="fltrRel" >
                            <select id="relsrch"  onchange="filteruser()">
                            <option></option>
                             <option>Single</option>
                              <option>In love</option>
                             <option>Married</option>
                             <option>Unmarried</option>
                             <option>Divorced</option>
                            </select>
                          <!-- &nbsp;  Or &nbsp;<input class="filtrInp" type="text" placeholder="Other Relationship Status" /> -->
                        </div>
                        <div class="filtrItm" id="plcsrch">
                            <input class="filtrInp" style="color:maroon" oninput="filteruser()" id="plccrlvngsrch" type="text" placeholder="Place Living in" />
                        </div>
                        <div class="filtrItm" id="fltrBGr" >
                            Blood Group <select id="bldsrch" onchange="filteruser()">
                           <option></option>
                        <option value="O +ve">O +ve</option>
                      <option value="O -ve">O -ve</option>
                      <option value="A +ve">A +ve</option>
                      <option value="A -ve">A -ve</option>
                      <option value="B -ve">B +ve</option>
                      <option value="B +ve">B -ve</option>
                      <option value="AB +ve">AB +ve</option>
                      <option value="AB -ve">AB -ve</option>
                      <option value="A1 +ve">A1 +ve</option>
                      <option value="A1 -ve">A1 -ve</option>
                      <option value="A2 +ve">A2 +ve</option>
                      <option value="A2 -ve">A2 -ve</option>
                      <option value="A2B +ve">A2B +ve</option>
                      <option value="A2B -ve">A2B -ve</option>
                      <option value="B1 +ve">B1 +ve</option>
                            </select>
                        </div>
                        <div class="fltrItmTtl">
                            School / High School
                        </div>
                          <div class="filtrItm">
                            <input class="filtrInp" id="sclsrch" oninput="filteruser()" type="text" placeholder="Studying in" />
                        </div>
                        <div class="fltrItmTtl">
                            College
                        </div>
                        <div class="filtrItm">
                            <input class="filtrInp" id="clgsrch" oninput="filteruser()" type="text" placeholder="Studying in" />
                        </div>
                        <div class="fltrItmTtl">
                            Company / Organization
                        </div>
                        <div class="filtrItm">
                            <input class="filtrInp" id="cmpnysrch" oninput="filteruser()" type="text" placeholder="Working In" />
                        </div>
                        <div class="fltrItmTtl">
                            Very Close ? 
                        </div>
                        <div class="filtrItm">
                            <input class="filtrInp" id="mobsrch" oninput="filteruser()" type="text" placeholder="Mobile" />
                        </div>
                        <div class="filtrItm">
                            <input class="filtrInp" id="emailsrch" oninput="filteruser()" type="text" placeholder="Email" />
                        </div>
                       
                        <div class="proceeds" id="proceedBars" >
                            <div class="advFiltr" onclick="srchppl()">
                             Search
                        </div>
                            
                            <div class="advFiltr" onclick="filteruser()" >
                           Filter People
                        </div>
                             
                        </div>
                         
                         <div id="AdvSrchHoldr"  >
                                <div id="advSrchTtl">
                                    Advanced Filters
                                </div>
                            <div class="filtrItm">
                                <input class="filtrInp" id="nicknmsrch" oninput="filteruser()" type="text" placeholder="Nickname" />
                            </div>
                              <div class="filtrItm">
                                <input class="filtrChecks" onchange="filteruser()" onclick="$(\'#notvrfsrch\').val(0);$(\'#vrfsrch\').val(1);" id="vrfsrch" type="radio" name="myvrf" /> Verified
                                <input class="filtrChecks" onchange="filteruser()" onclick="$(\'#notvrfsrch\').val(1);$(\'#vrfsrch\').val(0);" id="notvrfsrch" type="radio" name="myvrf"  /> Not Verified
                             </div>
                              <div class="filtrItm" id="filtrBorn">
                                    Birthday <input class="filtrInp" oninput="filteruser()" id="bdaysrch" type="text" placeholder="dd" />
                                    
                                     <input class="filtrInp" id="bmnthsrch" oninput="filteruser()" type="text" placeholder="mm" />
                                     <input class="filtrInp" id="byearsrch" oninput="filteruser()" type="text" placeholder="yyyy" />
                                </div>
                                <div class="filtrItm">
                                <input class="filtrInp" oninput="filteruser()" type="text" id="religsrch" placeholder="Religion" />
                                </div>
                             <div class="fltrItmTtl">
                            School / High School
                        </div>
                          <div class="filtrItm">
                            <input class="filtrInp" id="stdinsrch" type="text" oninput="filteruser()" placeholder="Studying in" />
                            <input type="text" id="stdinfrmsrch" class="timeInp" oninput="filteruser()" placeholder="From"/> Between 
                            <input type="text" id="stdintosrch" class="timeInp" oninput="filteruser()" placeholder="To"/>
                        </div>
                        <div class="fltrItmTtl">
                            College
                        </div>
                        <div class="filtrItm">
                            <input class="filtrInp" id="clgstdinsrch" oninput="filteruser()" type="text" placeholder="Studying in" />
                            <input type="text" class="timeInp" oninput="filteruser()" id="clgstdfrmsrch" placeholder="From"/> Between 
                            <input type="text" class="timeInp" oninput="filteruser()" id="clgstdtosrch" placeholder="To"/>
                        </div>
                       
                            <div class="fltrItmTtl">
                            Relation to
                            </div>
                             <div class="filtrItm">
                                <input class="filtrInp" oninput="filteruser()" id="relsnamesrch" type="text" placeholder="Relation\'s Name" />
                            </div>
                             <div class="fltrItmTtl" onclick="$(\'#fltrFmly\').slideToggle();" style="cursor: pointer">
                            Know family details ?
                            </div>
                             <div id="fltrFmly" class="filtrItm" style="display: none" >
                                <input class="filtrInp" id="fthernmsrch" oninput="filteruser()" type="text" placeholder="Father\'s Name" />
                                <br/><br/>
                                <input class="filtrInp" id="mthernmsrch" oninput="filteruser()" type="text" placeholder="Mother\'s Name" />
                                <br/><br/>
                            
                            </div>
                             <div class="fltrItmTtl" onclick="$(\'#fltrMore\').fadeToggle();" style="cursor: pointer">
                           More
                            </div>
                             <br/><br/>
                             <div id="fltrMore" class="filtrItm" style="display: none" >
                                <input class="filtrInp" id="vhclsrch" oninput="filteruser()" type="text" placeholder="Vehile Reg.No" />
                                <br/><br/>
                                <input class="filtrInp" id="langsrch" oninput="filteruser()" type="text" placeholder="Language" />
                                <br/><br/>
                                <div class="mostFilt" style="cursor: pointer">
                                    Mostly Searched People
                                </div>
                               
                                
                            </div>
                            </div>  
                        <div class="advFiltrBtn" onclick="$(\'#AdvSrchHoldr\').slideToggle()">
                        Try advanced search for best results
                    </div>
                        
                    </div>
                   
                </div>
            </div>
                <div id="inrPage">
                    <div class="filtrPplOut">
                        <div class="fltrTtl">
                            Categories
                            <div class="fltrCatItm" id="menuitemppl0" style="color:crimson;position: absolute;margin:0px 300px;" onclick="filterTheater()">
                                        Advanced Search
                                </div>
                            <div class="serchPplOut">
                                
                                <input type="text"  oninput="srchpplfn(this.value)"  placeholder="Name of the Person"/>
                            </div>
                        </div>
	       <input type="hidden" value="1" id="switch_tiles"/>
                        <div class="fltrCatItm" id="menuitemppl1" onclick="showmycnct();$(\'#switch_tiles\').val(1);">
                            My Relations
                        </div>
                         <div class="fltrCatItm" id="menuitemppl2" onclick="seerequest();$(\'#switch_tiles\').val(2);">
                            Requests
                        </div>
                        <div class="fltrCatItm" id="menuitemppl3" onclick="seesentreqst();$(\'#switch_tiles\').val(3);">
                           Sent Requests
                        </div>
                        <div class="fltrCatItm" id="menuitemppl4" onclick="relsofrels();$(\'#switch_tiles\').val(4);" >
                            Relations of Relations
                        </div>
                        <div class="fltrCatItm"  id="menuitemppl5" onclick="cmntomyrels()">
                            Common to Relations
                        </div>
                        <div class="fltrCatItm" id="menuitemppl6" style="color:crimson" onclick="filterTheater()">
                            Filter People
                        </div>
                        <div class="bigTipOut" id="allRels" style="display: none;" >
                            <div class="bigTipIn">
                                <div class="closeBigTip" onclick="$(\'#allRels\').fadeOut();">
                                        X
                                    </div>
                                <div class="bigTipItm" ">
                                    Relations of all my relations
                                   
                                </div>
                                <div class="bigTipItm">
                                    Relation of specific Person
                                    <input type="text" placeholder="Name of your Relation" />
                                    <button class="prcdBtn" >Proceed</button>
                                </div>
                            </div>7
                        </div>
	       <input type="hidden" valuue="" id="for_cmn_rels_f" />
	       <input type="hidden" value="" id="for_cmn_rels_u" />
                        <div class="bigTipOut" id="allComs" style="display: none;" >
                           
                                <div class="closeBigTip" onclick="$(\'#allComs\').fadeOut();">
                                        X
                                    </div>
                                <div class="bigTipItm">
                                    Common to all my relations
                                   
                                </div>
                                <div class="bigTipItm">
                                    Common to specific Person
                                    <input type="text" id="myrelsname" placeholder="Name of your Relation" />
                                    <button class="prcdBtn" onclick="relsofrels()" >Proceed</button>
                                </div>
                           
                        </div>
                        
                    </div>
                     <div class="pplGrpOut">
                    <div class="pplGrpIn">
                        <div class="grpTtl">
                            Relations of My Relations  <div class="CurviewTyp">Smart View</div>
                        </div>
                        <div class="pplToolsOut" onclick="closefiltr()">
                            <div class="pplToolsIn">
                               
                                
                                
                                <div class="viewItm" onclick="$(\'#pplView\').slideToggle()" >
                                    View Type 
                                </div>
                                
                                <div class="toolItm">
                                     Sort by 
                                     <select onchange="sort_people_by(this.value)">
                                         <option>Name</option>
                                         <option>Age</option>
                                         <option>Verified</option>
                                     </select>
                                    
                                </div>
                            </div>
                            <div id="pplView" class="pplViewType" style="display: none;" >
                                <div class="viewItm" id="vtype1" onclick="setviewtype(1,'.$user_id.')">
                                    Names Only
                                </div>
                             
                                <div class="viewItm" id="vtype3" onclick="setviewtype(3,'.$user_id.')">
                                    Smart Tiles
                                </div>
                                <div class="viewItm" id="vtype4" onclick="setviewtype(4,'.$user_id.')">
                                    Expanded Tiles
                                </div>
                                <span style="color: grey"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Smart view by default</span>
                            </div>
                        </div>
                       <!--adv ppl srchdiv --> <div id="advsrchresult">
                       
                        </div>
                        <!-- all title inside this div should be this style -->
                       
                        
                  
                    </div>
                    </div>
                    <div class="theaterTexts" id="TheaterNewRel" style="display: none;" >
                                           <div class="thtrTxtIn">
                                               <div class="thtrTtl">
                                                   New Relation <div class="thtrTxtClose" onclick="$(\'#TheaterNewRel\').fadeOut()" >X</div>
                                               </div>
                                               <div class="thtrCont">
                                                   <div class="reqSendIn">
                                                       Add  &nbsp;&nbsp; <span id="targetReqst"  >Vijayakumar </span> to my relations as
                                                       <select id="addRelType" onchange="addRelOther()" >
                                                        <option>Friends</option>
                                                        <option>Family</option>
                                                        <option>Enemy</option>
                                                        <option>Special</option>
                                                        <option>Unknown</option>
                                <option value="classmate" >Classmates</option>
                                <option value="other" >Other</option>
                            </select> 
                                                       <input type="hidden" value="" id="nowuser" />
                                                       <div  class="othrGrps" id="orGroup" style="display: none;">
                                                           &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            Or  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <input class="inp_th" type="text" placeholder="Other Group" />
                                                       </div>          
                                                       <div class="othrGrps" id="classGroup"  >
                                                           &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            In  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <input class="inp_th" id="mysavenm" type="text" placeholder="Save this person name as " />
                                                       </div>          
                                                       
                        </div>
                                                   <div class="thtrPrcd" onclick="addrelsprcs();$(\'#TheaterNewRel\').fadeOut();">
                                                       Send Request
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
		     <input type="hidden" value="" id="change_btn" />
                    <div class="theaterTexts" id="TheaterNewRelAccept" style="display: none;" >
                                           <div class="thtrTxtIn">
                                               <div class="thtrTtl">
                                                  <span id="thtrmytitl"> Accept </span> Request <span  class="ThjustTip" ></span> <div class="thtrTxtClose" onclick="$(\'#TheaterNewRelAccept\').fadeOut()" >X</div>
                                               </div>
                                               <div class="reqTimeHold"> <span id="reqstdnm"></span> wanted you as <span id="reqstdtp"></span><br/><span >He <span id="hdshowgrmr"></span> you as <span id="reqnm"></span></span></div>
                            
                                               <div class="thtrCont">
                                                   <div class="reqSendIn">
                                                       Add   <span id="targetReqstAcc"  > </span> to my relations as <select id="addRelTypeAcc" onchange="addRelOtherAcc()" >
                             <option>Friends</option>
                                                        <option>Family</option>
                                                        <option>Enemy</option>
                                                        <option>Special</option>
                                                        <option>Unknown</option>
                                <option value="classmate" >Classmates</option>
                                <option value="other" >Other</option>
                            </select> 
                            <div class="reqTimeHold">Requested On <span id="reqTime"></span> </div>                       
                                                       
                             <div class="othrGrps" id="classGroupAcc"  >
                                                           &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            In  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            <input class="inp_th" id="reqmyname" type="text" placeholder="Save this person name as " />
                                                       </div>
                            <div class="thtrPrcd" id="accreqrslt"  onclick="acceptreq()">
                                                       Accept Request
                                                   </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                 
                    
                </div>
               ';
    include 'online.php';
    echo '
            </div>
     
  </body>
</html>';
}
    ?>
