    

function nowcompress()
{
    var m=0;
    var k=0;
   var n=$('.MultiFile-preview').length;
   $("#tot_img_prev_cnt").val(n);
    $("#comp_images").html('');
for(k=0;k<n;k++)
{
     
      var src= $('.MultiFile-preview:eq('+k+')').attr('src');
      $('.MultiFile-preview:eq('+k+')').attr('id','img_no'+k+'');
      $("#comp_images").append('<input type="hidden" name="com_img_src[]" value="'+src+'" id="compressed_img'+k+'" />');
    
   if(src.indexOf('image')>0)
 {
        
        $('#jpeg_encode_quality').val($('#NPC_QSildeinp').val());
         
    var encodeQuality = document.getElementById('jpeg_encode_quality');
     var output_format = "jpg";
        var source_image = document.getElementById('img_no'+k+'');
        var result_image = document.getElementById('compressed_img'+k+'');
       
        if (source_image.src === "") {
            alert("You must load an image first!");
          
        }
        var quality = parseInt(encodeQuality.value);
     
       /* console.log("Quality >>" + quality);

        console.log("process start..."); */
       
      result_image.value = jic.compress(source_image,quality,output_format).src;
     
         var finalImgSize=(result_image.value.length*7.4)/10024;
        finalImgSize=finalImgSize.toString().substring(0,6);
        var pre=$("#for_tot_file_size").val();
        pre=pre+1-1;
        var now=finalImgSize+1-1;
        var sum=pre+now;
        $("#for_tot_file_size").val(sum);
        
      $('#NPCQ_FileSize').text('File Size : '+sum+' Kb');
       
        result_image.onload = function(){
        	var image_width=$(result_image).width(),
            image_height=$(result_image).height();
       	        /*
	        if(image_width > image_height){
	        	result_image.style.width="320px";
	        }else{
	        	result_image.style.height="300px";
	        } */
	       result_image.style.display = "block";


        }
        
       
 }else
 {
        n=0;
        break;
 }
}


}

 function doCompressBtnAct() {
        $('#jpeg_encode_quality').val($('#NPC_QSildeinp').val());
         var encodeButton = document.getElementById('jpeg_encode_button');
    var encodeQuality = document.getElementById('jpeg_encode_quality');
     var output_format = "jpg";
        var source_image = document.getElementById('source_image');
        var result_image = document.getElementById('result_image');
        if (source_image.src === "") {
            alert("You must load an image first!");
            return false;
        }else
        {
            alert('s');
        }

        var quality = parseInt(encodeQuality.value);
        
       /* console.log("Quality >>" + quality);

        console.log("process start..."); */
        var time_start = new Date().getTime();
        
        result_image.src = jic.compress(source_image,quality,output_format).src;
        var finalImgSize=(result_image.src.length*7.4)/10024;
        finalImgSize=finalImgSize.toString().substring(0,6);
         result_image.onload = function(){
        	var image_width=$(result_image).width(),
            image_height=$(result_image).height();
       	        /*
	        if(image_width > image_height){
	        	result_image.style.width="320px";
	        }else{
	        	result_image.style.height="300px";
	        } */
	       result_image.style.display = "block";


        }
        var duration = new Date().getTime() - time_start;
        
        


        console.log("process finished...");
        console.log('Processed in: ' + duration + 'ms');
    
    
    }
    
$(function() {

    //Console logging (html)
   
    if (!window.console)
        console = {};
     
    var console_out = document.getElementById('console_out');
    var output_format = "jpg";

    console.log = function(message) {
        console_out.innerHTML += message + '<br />';
        console_out.scrollTop = console_out.scrollHeight;
    };
	
   
   
 
    /** DRAG AND DROP STUFF WITH FILE API **/
    var holder = document.getElementById('holder');
   
    /*
    holder.ondragover = function() {
        this.className = 'is_hover';
        return false;
    }; 
     alert('ok');
    holder.ondragend = function() {
        this.className = '';
        return false;
    };
    holder.ondrop = function(e) {
        this.className = '';
        e.preventDefault();
        document.getElementById("holder_helper").removeChild(document.getElementById("holder_helper_title"));
        
        var file = e.dataTransfer.files[0], 
        reader = new FileReader();

        reader.onload = function(event) {
            var i = document.getElementById("source_image");
           	 	i.src = event.target.result;
           	 	i.onload = function(){
           	 		image_width=$(i).width(),
	                image_height=$(i).height();
	
	                if(image_width > image_height){
	                	i.style.width="320px";
	                }else{
	                	i.style.height="300px";
	                }
	                i.style.display = "block";
           	 	}
                
        };
        
        if(file.type=="image/png"){
            output_format = "png";
        }


        reader.readAsDataURL(file);
        
        return false;
    };
    */
   
    var encodeButton = document.getElementById('jpeg_encode_button');
    var encodeQuality = document.getElementById('jpeg_encode_quality');

    //HANDLE COMPRESS BUTTON
    
    
    
    //HANDLE UPLOAD BUTTON
    var uploadButton = document.getElementById("jpeg_upload_button");
    uploadButton.addEventListener('click', function(e) {
        var result_image = document.getElementById('result_image');
        if (result_image.src == "") {
            alert("You must load an image and compress it first!");
            return false;
        }
        var callback= function(response){
        	console.log("image uploaded successfully! :)");
        	console.log(response);        	
        }
        
        jic.upload(result_image, 'upload.php', 'file', 'new.'+output_format,callback);
        
       
    }, false);

/*** END OF DRAG & DROP STUFF WITH FILE API **/

});


