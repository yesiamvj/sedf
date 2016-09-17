<?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {
       require 'mysqli_connect.php';
         $user_id=$_SESSION['user_id'];
         echo '  <div class="NPT_QuickPostHolder" id="newAlbumPost"  >
              <div class="NPT_QPTtl" style="background-color:darkblue">
                  MeMe Photo <div class="closeNPTS" onclick="$(\'#for_meme\').hide();" >X</div>
              </div>
             <form method="post" id="upload_form" onsubmit="alertTt(\'Success\');$(\'#for_meme\').hide();" action="post_mime_image.php" enctype="multipart/form-data" target="published_meme_post">
               
               <div class="NPT_QPCont">
                    
                   <div class="NPT_memeSelHold">
                       <div class="NPT_QPTip">
                           Step 1 : Add an image file  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="file" id="meme_image" name="image_file" onchange="preview_pic(this)"/>
                  </div>
                        
                   </div>
                    <div class="NPT_QPTip">
                           Step 2 : Put your Titles
                  </div>
                   <input type="text" name="top_meme" class="NA_albumNameInp" oninput="$(\'#memeTopTtlCNPH\').text($(\'#inp_memeTope\').val());"  placeholder=" Top text " />
                  <br/>
                   <input type="text" name="btm_meme" class="NA_albumNameInp" placeholder=" Bottom Text " oninput="$(\'#memeBotmTtlCNPH\').text($(\'#inp_memeBotm\').val());"  />
                 
              </div>
              <div class="imageMmeTopTtl" id="memeTopTtlCNPH" >
                 Top Title
             </div>
              
              <div class="imageMmeHolder" style="color: silver" >
                 Add an image
              </div> 
              <script>
                  function preview_pic(pic)
                  {
                      if(pic.files[0].type==="image/png" || pic.files[0].type==="image/jpeg" || pic.files[0].type==="image/jpg" || pic.files[0].type==="image/gif"){
                           var r=new FileReader();
                      r.onload=(function(e)
                      {
                       $(\'.imageMmeHolder\').html(\'<img src=\'+e.target.result+\'>\');   
                      });
                      r.readAsDataURL(pic.files[0]);
                      }
                      else{
                          alert(\'please upload an image file\');
                      }
                     
                  }
                  </script>
              <div class="imageMmeTopTtl" id="memeBotmTtlCNPH">
                 Bottom Title
             </div>
            
              <div class="QPSuuB">
               
	 <input type="submit" value="Post" class="NPT_PostSubmit" id="memeSubmittt" />
              </div>
              
          </div></form><iframe src="" width="0" height="0" name="published_meme_post"/>';
   }