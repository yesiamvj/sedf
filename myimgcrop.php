<?php session_start();
   if(empty($_SESSION['user_id']) || empty($_SESSION['user_name']))
   {
    header("location:index.php");
   }else
   {
   
                      $user_id=$_SESSION['user_id'];
                  echo'
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Crop Box</title>
    <link rel="stylesheet" href="../web/'.$_SESSION['css'].'imgcropcss.css" type="text/css" />
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
            top: 10%; left: 10%; right: 0; bottom: 0;
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

<script src="../../web/cropbox.js"></script>
<div class="container">
    <div class="imageBox"  >
        <div class="thumbBox"></div>
        <div class="spinner" style="display: none;background-color:white;">Upload Image...</div>
    </div>
    <div class="action">
        <input type="file" id="filemc"  style="float:left; width: 250px">
        <div  id="upldimg"> Upload Image</div><br/>
        <div id="swcrop" onclick="savewitcrp()">Save without Crop</div>
        <input type="button" id="btnCrop"   value="Change" style="float: right">
        <input type="button" id="btnZoomIn" class="inpitm" value="+" style="float: right">
        <input type="button" id="btnZoomOut" class="inpitm" value="-" style="float: right">
    </div>
    <div class="cropped">

    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" type="text/css"></script>
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
            alert("clk");
            var fmd = new FormData();
            var imgdt=$("#tempimgprev").attr("src");
            
            fmd.append(\'q\',imgdt);
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            	$(\'.cropped\').append(xmlhttp.responseText);
            }else{
            	
            }
        }
        xmlhttp.open("post", "../../web/convertimg.php", true);
        xmlhttp.send(fmd);
           

        })
        

}
        );
    
        
    
</script>

</body>
</html>';
}
?>