<?php session_start();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
{
	header("location:index.php");
}else
{
    $user_id=$_SESSION['user_id'];
    require 'mysqli_connect.php';
    echo'<!DOCTYPE html>
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
    <link rel="stylesheet" href="lin.css"/>
    <link rel="stylesheet" href="messages.css"/>
   <script src="angular.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/javascript"></script>
   <script src="loggedinPage.js" type="text/javascript"></script>
  </head>
  
  <body>
      <div class="sf_tradeMark" >
          SedFed
      </div>
      <div id="content-full">
          <div id="pageLoadStatus"></div>
            <div id="Topest">
                
                <div id="title_bar"  onmouseover="mouseOntitleBar(1)" onmouseout="mouseOntitleBar(0)">
                
                    <font id="sedfed" onclick="myNameClicked()">Vijayakumar</font>
              <div id="searchbar" >
                  <form>
                      <input id="srchbar" type="text" autofocus/>
                      <input id="proceedsrch" type="submit" value="Search"/>
                  </form>
              </div>
              <div id="notes" style="display:inline-block;">
                  
                  
              </div>
              <div id="logout">
                  <button id="logoutbtn">Logout</button>
              </div>
              
            </div>
      </div>
            <div id="innerPageCont">
                <div id="pageTitle">Messages</div>
                <div class="msgTab">
                    <div class="msgTabsTtls">
                         <div class="nonFocTabTtl" id="msgTabTtl" style="margin-left: 0px;" > All Messages </div>
                         <div class="nonFocTabTtl"  style="margin-left: 130px;" > Inbox </div>
                        
                         <div class="nonFocTabTtl"  style="margin-left: 210px;//z-index: 13;" > Sent </div>
                         <div class="nonFocTabTtl"  style="margin-left: 290px;" > Group </div>
                         <div class="nonFocTabTtl"  style="margin-left: 380px;//z-index: 13;" > Important </div>
                         <div class="nonFocTabTtl"  style="margin-left: 500px;//z-index: 13;" > Hidden </div>
                         <div class="nonFocTabTtl"  style="margin-left: 600px;//z-index: 13;" > Secret </div>
                         <div class="nonFocTabTtl"  style="margin-left: 700px;//z-index: 13;" > Deleted </div>
                       
                    </div>
                   
                    
                        <div class="msgTabIn">
                            
                            <div class="tabControl">
                                 <div  class="tabContItm" style="cursor: pointer" >
                                    View as
                                </div>
                                <div  class="tabContItm">
                                    Sort by
                                    <select>
                                        <option> Time </option>
                                        <option> Sender Name </option>
                                        <option> Messages Count </option>
                                        
                                    </select>
                                    <div id="desc" class="arrows" title="decending"></div>
                                    <div id="asc" class="arrows" title="ascending"></div>
                                </div>
                                <div  class="tabContItm" style="cursor: pointer" onclick="$(\'#filtrs\').slideToggle()" >
                                    Filters
                                </div>
                                <div  class="tabContItm" style="cursor: pointer" onclick="$(\'#moreMsgControls\').slideToggle()" >
                                    More
                                </div>
                                <div  class="tabContItm" style="float: right;">
                                    Search
                                    
                                    <input type="text" placeholder="Search messages" />
                                   
                                </div>
                                
                            </div>
                            <div id="filtrs" style="display: none;" >
                                   
                                    <div class="filtrMItm">
                                        <input type="checkbox" /> Has Attachment 
                                        <select>
                                            <option>Image</option>
                                            <option>Audio</option>
                                            <option>Video</option>
                                            <option>PDF Docs</option>
                                            <option>Other Files</option>
                                        </select>
                                        <input type="text" placeholder="File Name" style="width: 200px;" />
                                    </div>
                                   
                                    <div class="filtrMItm">
                                        <input type="checkbox" /> Date
                                        <input type="text" placeholder="dd/mm/yyyy"/>
                                    </div>
                                <button>Filter</button>
                                    </div>
                            <div id="moreMsgControls" style="display: none;" >
                                <div class="msgControlItm" >
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
                                
                            </div>
                            <div id="MsgViews" style="//display: none;" >
                                <div class="msgControlItm" >
                                    Conversation
                                </div>
                                <div class="msgControlItm" >
                                    Text List
                                </div>
                                <div class="msgControlItm" >
                                    With faces
                                </div>
                               <br/> <br/>
                                
                            </div>
                            <div class="tabContHold">';
    $q="select msg_id as mid,sender_id as s,senter_seen as sn,time as t,msg as ms,msg_clr as mc,bg_color as bg,day as d from messages where user_id=$user_id  order by msg_id desc limit 10";
   
    $r=mysqli_query($dbc,$q);
    if($r)
    {
        if(mysqli_num_rows($r)>0)
        {
            $n=0;
            $m=0;
            while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
            {
                $n=$n+1;
                 $sender_id=$row['s'];
                 $msg=$row['ms'];
                 $msg_clr=$row['mc'];
                 $msg_bg=$row['bg'];
                 $msg_time=$row['t'];
                 $msg_id=$row['mid'];
                 $senter_seen=$row['sn'];
                 if($n==1)
                 {
                     $pre=0;
                 }
                 $day=$row['d'];
                if($n>0)
                {
                    if($pre!=$sender_id)
                    {
                        $m=$m+1;
                        $q1="select c_name as c from contacts where user_id=$user_id and cu_id=$sender_id";
                        $r1=mysqli_query($dbc,$q1);
                        if($r1)
                        {
                            if(mysqli_num_rows($r1)>0)
                            {
                                $rt=mysqli_fetch_array($r1,MYSQLI_ASSOC);
                                $c_name=$rt['c'];
                            }else
                            {
                                $q2="select first_name as f from basic where user_id=$sender_id";
                                $r2=mysqli_query($dbc,$q2);
                                if($r2)
                                {
                                    $rop=  mysqli_fetch_array($r2,MYSQLI_ASSOC);
                                    $c_name=$rop['f'];
                                }
                            }
                        }
                        $q3="select p_pic as p from small_pics where user_id=$user_id";
                        $r3=mysqli_query($dbc,$q3);
                        if($r3)
                        {
                            if(mysqli_num_rows($r3)>0)
                            {
                                $roi=  mysqli_fetch_array($r3,MYSQLI_ASSOC);
                                $p_pic=$roi['p'];
                            }else
                            {
                                $p_pic="icons/male.png";
                            }
                        }
                        echo'   <div class="MsgHolder" >
                                    <input class="msgCheck" type="checkbox" onchange="$(\'#moreMsgControls\').slideDown()" />
                                    <div class="pplTheme" style="background-color:blue" >
                                        sedfed
                                    </div>
                                    <div class="MsgHoldin" style="background-color:'.$msg_bg.';color:'.$msg_clr.';">
                                    <div class="msgFaceHold">
                                             <img class="msgFace" src="'.$p_pic.'" alt="'.$c_name.'"/>
                                        </div>
                                        <div class="msgHeaders">
                                            <div class="msgSender">'.$c_name.'</div>
                                            <div class="msgSenderDets">
                                                <span class="divider"> | </span>
                                            </div>
                                            <div class="msgDets"> 
                                                <div class="msgDetItm">'.$msg_time.' , '.$day.'</div>
                                            </div>
                                        </div>
                                        <div class="msgContent" style="padding-left:20px;">
                                           '.$msg.'
                                        </div>
                                    </div>
                                </div>
                            
                            ';
                    }
                }
               
                $pre=$sender_id;
            }
            if($m<10)
            {
                
            }else
            {
               echo'<div><input type="hidden" value="'.$msg_id.'" id="max_msg_id" /><div>Show More Messages</div></div>';
            }
        }
    }else
    {
        echo mysqli_error($dbc);
    }
                                
                              
                            
                            
                            
                        echo'</div></div>
                   
                </div>
            </div>
      </div>
       
  </body>
</html>
';
}