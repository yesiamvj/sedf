/* 
    Created on : May 31, 2015, 11:59:18 AM
    Author     : Vijayakumar <vijayakumar at www.sedfed.com>
*/

function wishhim(user)
{
      
       var wishes=$("#newWishInp").val();
       var image=$("#wish_image").prop('files')[0];
       var day=$("#wish_day").val();
       var month=$("#inpTh_Mon").val();
       var year=$("#wish_year").val();
       var hour=$("#wish_hour").val();
       var min=$("#wish_min").val();
       var noon=$("#wish_noon").val();
       var fmdt=new FormData();
       fmdt.append('wish',wishes);
       fmdt.append('image',image);
       fmdt.append('day',day);
       fmdt.append('user',user);
       fmdt.append('hour',hour);
       fmdt.append('min',min);
       fmdt.append('noon',noon);
       fmdt.append('month',month);
       fmdt.append('year',year);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
        
          
           $("#createNewWish").fadeOut();
            }
        }
       
    xmlhttp.open("POST","../web/wish_ppl.php",true);
    xmlhttp.send(fmdt);       
}
function put_image(pic)
{
      
       var r=new FileReader();
       r.onload=(function(e)
       {
              $("#wish_image_div").html('<img src="'+e.target.result+'" style="max-width:100px;max-height:100px" />');
       });
       r.readAsDataURL(pic.files['0']);
}

function thank_wishes(wish_id)
{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
        
          
            }
        }
       
    xmlhttp.open("POST","../web/thank_wishes.php?wish_id="+wish_id,true);
    xmlhttp.send();   
}
function delete_wishes(wish_id)
{
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
        
           $("#gift_item"+wish_id+"").remove();

            }
        }
       
    xmlhttp.open("POST","../web/delete_wishes.php?wish_id="+wish_id,true);
    xmlhttp.send();    
}

function thank_all()
{
          var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
        
            }
        }
       
    xmlhttp.open("POST","../web/thank_all_wishes.php?my="+"ns",true);
    xmlhttp.send();    
}
       
       