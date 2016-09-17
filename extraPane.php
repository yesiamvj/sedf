<?php session_commit();
if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']) )
{
    header("location:index.php");
  
}else
{
    echo '
        <link rel="stylesheet" href="'.$_SESSION['css'].'extraPane.css"/>
        <div class="sf_extraPane">
             <div class="exPaneOut">
            <div class="exPaneTtl">
                Relations
            </div>
            <div class="exPaneCont">';
    
         $user_id=$_SESSION['user_id'];
         require_once 'mysqli_connect.php';
$qe="SELECT cu_id as c,c_name as cnm from contacts where user_id=$user_id ";
        $re=mysqli_query($dbc,$qe);
        if($re)
        {
          $totcnt=0;
          if(mysqli_num_rows($re)>0)
          {
            
            while($rowg=mysqli_fetch_array($re,MYSQLI_ASSOC))
            {

             $his_id=$rowg['c'];
             $cu_id=$his_id;
              $c_name=$rowg['cnm'];
              $q3="select p_pic as p from small_pics where user_id=$cu_id";
              $r3=  mysqli_query($dbc,$q3);
              if($r3)
              {
                  if(mysqli_num_rows($r3)>0)
                  {
                      $ry=mysqli_fetch_array($r3,MYSQLI_ASSOC);
                      $p_pic=$ry['p'];
                  }else
                  {
                      $p_pic="icons/male.png";
                  }
                  echo '<a href="../'.$cu_id.'" target="_blank" "> <div class="exPaneItm">
                    <img src="'.$p_pic.'"/>
                </div></a>';
              }

        }
          }
        }
        echo '
            </div></div>
            <div class="exPaneOut">
            <div class="exPaneTtl">
                Groups
            </div>
            <div class="exPaneCont">
            
               ';
               $q="select page_id as gid,page_name as pnm ,page_pic as page_pic from pages where user_id=$user_id and groups=1";
         $r=  mysqli_query($dbc, $q);
         if($r)
         {
                if(mysqli_num_rows($r)>0)
                {
	     
                
	      while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	      {
	             $group_id=$row['gid'];
	             $group_name=$row['pnm'];
	             $page_pic=$row['page_pic'];
	     echo '       
             <a href="../'.$group_name.'">
                <div class="exPaneItm" title="'.$group_name.'" >
                    <img src="'.$page_pic.'"/>
                </div>
                   </a>
             
         ';
		    
	      }
	      
                }
         }
         echo '
            </div>
        </div>
         <div class="exPaneOut">
            <div class="exPaneTtl">
                Pages
            </div>
            <div class="exPaneCont">';
                  $q="select page_id as gid,page_name as pnm ,page_pic as page_pic from pages where user_id=$user_id and groups=0";
         $r=  mysqli_query($dbc, $q);
         if($r)
         {
                if(mysqli_num_rows($r)>0)
                {
	     
                
	      while($row=  mysqli_fetch_array($r,MYSQLI_ASSOC))
	      {
	             $group_id=$row['gid'];
	             $group_name=$row['pnm'];
	             $page_pic=$row['page_pic'];
	     echo '       
             <a href="../'.$group_name.'">
               <div class="exPaneItm" title="'.$group_name.'" >
                    <img src="'.$page_pic.'"/>
                </div>
                   </a>
             
         ';
		    
	      }
	     
                }
         }
        echo '
            </div>
        </div>
        <div class="exPaneActs">
        <a href="create_grp_page.php"  target="_blank" >
            <div class="EPA_Itm" style="color: darkmagenta" > 
                Create a Group
            </div>
            </a>
             <a href="createpage.php" target="_blank" >
            <div class="EPA_Itm" style="color:darkorange" >
                Create a Page
            </div>
            </a>
             <a href="people.php"  target="_blank" >
            <div class="EPA_Itm" style="color: green" >
                Find  people
            </div>
            </a>
        </div>
        </div>';
}
?>