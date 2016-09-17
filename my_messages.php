<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
}else
{
       $user_id=$_SESSION['user_id'];
       require 'mysqli_connect.php';
             $selemail="select first_name as em from basic where user_id=$user_id";
                                                             $rinemail=mysqli_query($dbc,$selemail);
                                                             if($rinemail)
                                                             {
                                                                 $rowemail=mysqli_fetch_array($rinemail);
                                                                 $my_name=$rowemail['em'];
                                                             }
			          if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
 {
        
 }  else {
        include '../web/title_bar.php';       
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
    <title>Messages </title>
    <link rel="stylesheet" href="'.$_SESSION['css'].'messages.css"/>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   
<script src="my_messages.js" type="text/javascript"></script>
     </head>
  
  <body>
      <div class="sf_tradeMark" >
          SedFed
      </div>
      <div id="content-full">
          <div id="pageLoadStatus"></div>
            <div id="Topest">
                
      </div>
            <div id="innerPageCont">
                
                <div class="msgTab">
                    <div class="msgTabsTtls">
                        <div class="masgTabItm" onclick="show_allmessages()"> All messages </div>
                        <div class="masgTabItm" onclick="show_inbox()"> Inbox </div>
                        <div class="masgTabItm" onclick="show_sent_messages()"> Sent </div>
                        <div class="masgTabItm" onclick="show_deleted_msgs()"> Deleted </div>
                        
                       
                    </div>
                   
                    
                        <div class="msgTabIn">
                            
                          
                            
                          
                            <div id="moreMsgControls" style="display: none;" >
                               <!-- <div class="msgControlItm" >
                                    <input type="checkbox" /> Select all
                                </div>
                                <div class="msgControlItm">
                                    <input type="checkbox" /> Invert Selection
                                </div>
                                <div class="msgControlItm">
                                   Delete
                                </div>
                                <div class="msgControlItm">
                                    Mark as Important
                                </div>
                                <div class="msgControlItm">
                                    Mark as Read
                                </div>
                                <div class="msgControlItm">
                                    Forward
                                </div>
                                <div class="msgControlItm">
                                    Download Files
                                </div>
                                -->
                            </div>
                            <div id="MsgViews" style="display: none;margin-left: 50px;" >
                                <div class="msgControlItm" >
                                    Conversation
                                </div>
                                <div class="msgControlItm" >
                                    Messages List
                                </div>
                                
                               <br/> <br/>
                                
                            </div>
                            <div class="tabContHold">
                               
                                
                           
                                <div class="MsgHolder">
                                 
                                    
                                    <div class="MsgHoldin">
                                        
                                    </div>
                                </div>
                              
                                
                                
                            </div>
                            
                            
                            
                            
                        </div>
                   
                </div>
                <div class="theaterTextsOut" id="forwardMsg" style="display: none;" >
                    <div class="theaterTextsIn">
                        <div class="closeTheater" onclick="$(\'#forwardMsg\').fadeOut()" >
                            X
                        </div>
                        <div class="th_Ttl">Forward Message</div>
                        <div class="th_Cont">
                            Forward this message to <input class="th_inp" type="text" placeholder="Name of the Person" />
                        </div>
                        <div class="th_proceed">
                            <div class="th_prcdbtn">
                                forward
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
       
  </body>
</html>
';
}