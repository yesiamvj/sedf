function create_my_blog()
{
       var news=$("#newBlogUpdateInp").val();
       var color=$("#NB_C").val();
       var bg_color=$("#NB_BGC").val();
       var fmdt=new FormData();
       fmdt.append('blog_news',news);
       fmdt.append('color',color);
       fmdt.append('bgcolor',bg_color);
              var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        
            if (xmlhttp.readyState===4 && xmlhttp.status===200) {
              $("#tot_blog_cont").prepend(xmlhttp.responseText);
           }else{
      
            }
          }
            xmlhttp.open("POST","../web/create_blog_news.php",true);
            xmlhttp.send(fmdt);
}
