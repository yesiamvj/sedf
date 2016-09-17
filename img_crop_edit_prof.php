<?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {
          $for_dir=$_REQUEST['prof'];
          
	echo '<link rel="stylesheet" href="../web/'.$_SESSION['css'].'imgcropcss.css" type="text/css" />
	<input type="hidden" value="in_prfl" id="for_prfl" />
	           <script src="../web/cropbox_edit_prof.js"></script>';
          
                      $user_id=$_SESSION['user_id'];
                  echo'
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Crop Box</title>
    
    <style>
    .thumbBox
    {
        width: 0px;
        border:20px;
        opacity: 0.9;
        background-color: blue;
        border:20px solid blue;
        height: 10px;
    }
        .container
        {
            position: absolute;
            top: 15%; left: 10%; right: 0; bottom: 0;
        }
        .action
        {
            width: 400px;
            height: 60px;
            margin: 10px 0;
        }
        .cropped>img
        {
            margin-right: 10px;
            
            max-width: 100%;
            max-height: 100%;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="imageBox"  >
        <div class="thumbBox"></div>
        <div class="spinner" style="display: none;background-color:white;">Select an Image from computer...</div>
    </div>
    <div class="action">
        <input type="file" id="filemc"  onchange="show_upload_btn(this)"  style="float:left; width: 250px">
        <div  id="upldimg"> Select image</div><br/>
        <div id="swcrop" style="display:none;" onclick="savewitcrp()">Upload without Crop</div>
        <input type="button" id="btnCrop" style="display:none;"  value="Crop & Upload" >
        <input type="button" id="btnZoomIn" class="inpitm" value="+" style="float: right">
        <input type="button" id="btnZoomOut" class="inpitm" value="-" style="float: right">
    </div>
    <div class="cropped">

    </div>
</div>
<script type="text/javascript">
    $(document).ready(function()
        {
         
        var options =
        {
            imageBox: \'.imageBox\',
            thumbBox: \'.thumbBox\',
            spinner: \'.spinner\',
            imgSrc: \'\'
        }
       
        var cropper = new cropbox(options);
        document.querySelector(\'#filemc\').addEventListener(\'change\', function(){
         document.querySelector(\'.cropped\').innerHTML= \'<img src="../../web/icons/LoaderIcon.gif"><br/>Loading Please wait..\';
            var reader = new FileReader();
            reader.onload = function(e) {
           
                 options.imgSrc = e.target.result;
            document.querySelector(\'.cropped\').innerHTML= \'<img id="tempimgprev" src="\'+e.target.result+\'">\';
         
                cropper = new cropbox(options);
            }
            reader.readAsDataURL(this.files[0]);
            this.files = [];
          
        })
        document.querySelector(\'#btnCrop\').addEventListener(\'click\', function(){
            var img = cropper.getDataURL();
            document.querySelector(\'.cropped\').innerHTML= \'<img src="\'+img+\'">\';
        })
        document.querySelector(\'#btnZoomIn\').addEventListener(\'click\', function(){
            cropper.zoomIn();
        })
        document.querySelector(\'#btnZoomOut\').addEventListener(\'click\', function(){
            cropper.zoomOut();
        })
        document.querySelector(\'#upldimg\').addEventListener(\'click\', function(){
            document.getElementById("filemc").click();
        })
         document.querySelector(\'#swcrop\').addEventListener(\'click\', function(){
          
            var fmd = new FormData();
            var imgdt=$("#tempimgprev").attr("src");
            var ckwn=$("#wchwantchng").val();
           
            fmd.append(\'q\',imgdt);
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            	$(\'.cropped\').html(xmlhttp.responseText);
	$(\'#chngppic\').fadeOut();
            }else{
            	
            }
        }
         if(ckwn==="1")
        {
            ';
	 if($for_dir=="in_prof")
	 {
	          echo '
        xmlhttp.open("post", "../web/set_ppic_edit_prof.php", true);';
	 }else
	 {
	        echo '
        xmlhttp.open("post", "../web/set_ppic_edit_prof.php", true);';
	 }
	 echo '
        }
        if(ckwn==="2")
        {
            
        xmlhttp.open("post", "../web/set_wpic_edit_prof.php", true);
        }
        xmlhttp.send(fmd);
           

        })
        

}
        );
    
        
    
</script>

</body>
</html>';
}
?>