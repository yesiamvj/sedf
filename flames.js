
var t1="";
var t2="";

var t3="";
function dothis(){
    changey();
    $('#wht').html("");
    imgtype();
   $('#main').text("");
   $('#result').text("");
    var title="<i style='color:red'>Log of Flames Calculation</i><br/><br>";
    $('#main').append(title);
    var name1=$('#name1').val();
    at("Name of first person "+name1);
    name1=name1.trim();
   // name1=trim(name1);
    
   // alert(name1);
    var name2=$('#name2').val();
    name2=name2.trim();
    
    
   // name2=trim(name2);
    at("<br>Name of Second person "+name2);
    //alert(name2);
    //var name1ar= name1.toArray();
   // var nam1len=name1.length()>name2.length() ? name1.length() : name2.length();
    var n1len=name1.length;
    var n2len=name2.length;
    
    //at(n1len);
   // at(n2len);
    var ncount;
    var lnme;
    var hnme;
    var name="vijay";
    name=name.replace("i","");
    //alert("repales " +name +"lenth of name is "+name.length);
    if(n1len>n2len){
        ncount=n1len;
        lnme=name2;
        hnme=name1;
    }
    else{
        ncount=n2len;
        lnme=name1;
        hnme=name2;
    }
    at("<br>selected name for matching is "+hnme);
    at("selected matching count is "+hnme.length);
    var matchcount=0;
    var notmatched;
    for(j=0;j<hnme.length;j++){
        var lettr=hnme.charAt(j);
        at("<span id='look'>looking for " + lettr +" of "+hnme+" in "+lnme+" <span>");
        for(k=0;k<lnme.length;k++){
            var lettr2=lnme.charAt(k);
            
            at("Checking match for "+lettr+" and "+ lettr2);
            
            if(lettr===lettr2){
                matchcount=matchcount+1;
                at("<br><font style='color:blue'>match found at "+lettr2+"</font>");
                lnme=lnme.replace(lettr,1);
                at("<i style='color:grey'>match count is <i>" + matchcount);
                at("<i style='color:grey'>replaced name is <i>" +lnme);
                hnme=hnme.replace(lettr2,2);
                
                at("<i style='color:grey'>replaced second name is<i> " + hnme + "<br>");
               break;
            }
            else{
                at("<font style='color:red'>no match</font>")
            }
        }
    }
    var unm1=name1.length-matchcount;
    var unm2=name2.length-matchcount;
    at("<br><br>unmatched letters in name1 is " + unm1);
     at("unmatched letters in name2 is " + unm2 + "<br><br>");
     var maincount=unm1+unm2;
     var tempflames="";
     at("<b style='color:green'>flames is calculated for the count of "+ maincount +"</b>");
     var flames="flames";
     var letrpos=0;
     if(name1===name2){
         notmatched=false;
         $('#result').append("This is you");
     }
     else{
        notmatched=true;
     }
     while((flames.length>1)&notmatched){
        letrpos=maincount;
        
        if(maincount>flames.length-1){
            letrpos=maincount;
            if(letrpos>(flames.length-1)){
                
                at("The main count is "+maincount+" so we minus");
                 letrpos=(letrpos-1)-flames.length;
                   at(" minused count is " +letrpos);
                   while(letrpos>(flames.length-1)){
                        at("Still the main count is " +letrpos);
                letrpos=letrpos-flames.length;
                    at("minused count is "+letrpos);
               
            }
                // letrpos=letrpos-1;
            }
            
           
            eraseIt(letrpos);
           
        }
        
        else{
              if(letrpos===0){
            $('#result').append("This is you");
            
            $('#thisisf').html('<img id="idimg" style="max-width: 350px;max-height:350px;" src="icons/flam/gif/u (30).gif"/>');
            break;
        }
            letrpos=letrpos-1;
            eraseIt(letrpos);
        }
         
             }
             var cname1=name1.charAt(0).toUpperCase();
            name1=cname1+name1.substring(1,name1.length);
             var cname2=name2.charAt(0).toUpperCase();
            name2=cname2+name2.substring(1,name2.length);
             var tel="#result";
             var tel2="#main";
             $('#main').hide().slideDown(1000);
            if(flames.length===1){
                $('#pls').append('');
                switch(flames){
                        case "f":
                        $(tel).html(name1 + " and " + name2 + " may be <span style='color:darkblue'>Friends</span>");
                        $(tel).append("<div><br><img id=\"imgsm\" src=\"icons/flam/friend.png\" alt=\"friendship\"/>");
                        
                        $(tel2).append(name1 + " and " + name2 + " may be <span style='color:darkblue'>Friends");
                        break;
                        case "l":
                        $(tel).append(name1 + " and " + name2 + " may  <span style='color:darkblue'>Love  each other ");
                        $(tel).append("<div><br><img id=\"imgsm\" src=\"icons/flam/love.png\" alt=\"love\"/>");
                        $(tel2).append(name1 + " and " + name2 + " may  <span style='color:darkblue'>Love  each other ");
                        break;
                          case "a":
                        $(tel).append(name1 + " and " + name2 + " may <span style='color:darkblue'>have Affection on each other ");
                        $(tel).append("<div><br><img id=\"imgsm\" src=\"icons/flam/affection.png\" alt=\"affection\"/>");
                        $(tel2).append(name1 + " and " + name2 + " may <span style='color:darkblue'>have Affection on each other ");
                        break;
                          case "m":
                        $(tel).append(name1 + " and " + name2 + " may be <span style='color:darkblue'>Married or in Future");
                        $(tel).append("<div><br><img id=\"imgsm\" src=\"icons/flam/marry.png\" alt=\"Marriage\"/>");
                        $(tel2).append(name1 + " and " + name2 + " may be <span style='color:darkblue'>Married or in Future");
                        break;
                          case "e":
                        $(tel).append(name1 + " and " + name2 + " may be <span style='color:darkblue'>Enemies or They hate each other ");
                        $(tel).append("<div><br><img id=\"imgsm\" src=\"icons/flam/enemy.png\" alt=\"enemy\"/>");
                        $(tel2).append(name1 + " and " + name2 + " may be <span style='color:darkblue'>Enemies or They hate each other ");
                        break;
                          case "s":
                        $(tel).append(name1 + " and " + name2 + " may be <span style='color:darkblue'>Siblings [ Brother or Sister ]");
                        $(tel).append("<div><br><img id=\"imgsm\" src=\"icons/flam/sib.png\" alt=\"siblings\"/>");
                        $(tel2).append(name1 + " and " + name2 + " may be <span style='color:darkblue'>Siblings [ Brother or Sister ]");
                        break;
                }
            }
             //while(isIt(flames)===true);
             function eraseIt(letrpos){
                 var target=flames.charAt(letrpos);
                 at("The letter "+target+" from flames is gonna be erased which is at the position "+letrpos);
                    flames=flames.replace(target,"");
                    var curnum=letrpos-1;
                    for(i=0;i<flames.length;i++){
                       
                       curnum=curnum+1; 
                        if(curnum>flames.length-1){
                            at("The count "+curnum+" is bigger then flames length "+flames+" and length is "+ flames.length);
                            curnum=0;  
                        }
                        
                        var curltr=flames.charAt(curnum);
                         at(curnum +" is  current position and current letter is "+curltr +" is to be added to temp-flames") ;
                       // at(curltr);
                       
                        tempflames=tempflames+curltr;
                        at("At this position tempflames is " +tempflames)
                                //
                        
                    }
                    flames=tempflames;
                    tempflames="";
                    at("Tempflames is equaled to flames and the flames is now  "+flames + " and the temp-flames is emptied for next round and temp-flames is "+tempflames);
                   // at("the temp flames is "+tempflames)
                    
                }
    
}

var exista=0;
function isIt(flames){
    if(flames.length>0){
        return true;
    }
    else{
        return false;
    }
   /* for(i=0;i<6;i++){
        var letter=flames.charAt(i);
        if(letter==="1"){
            exista=exista+1;
        }
        else{
            
        }
    }
    if(exista<5){
        return false;
       
    }
    else{
        return false;
    }
    */
}
function at(status){
    $('#main').append(status+"<br>");
}
function resett(){
    $('#main').text("");
   $('#result').text("");
   $('#name1').text("");
   $('#name2').text("");
   $('#name1').focus();
   changey();
}

function changet(thist){
    imgtype();
    
    //changey();
   // alert("yes");
  
    if(ishide()){
       if(thist==="#name1"){
       $('#result').text($('#name1').val()+" and "+ $('#name2').val());
   }
   else{
        $('#result').text($('#name1').val()+" and "+ $('#name2').val());
   }
   }
   else{
       $('#result').text("");
   }
   
    
       
 
   
    
}
function hidet(chk,thist){
    
    if(document.getElementById(chk).checked===true){
        $(thist).attr({'type':'password'});
        changet('#name1');
        
    }
    else{
         $(thist).attr({'type':'text'});
         
    }
    
}
function ishide(){
    if( document.getElementById('chk1').checked===true || document.getElementById('chk2').checked===true){
       return false;
    }
    else{
        return true;
    }
}
function ini(){
    document.getElementById('chk1').checked=false;
    document.getElementById('chk2').checked=false;
}
function imgtype(){
    var name1=$('#name1').val();
    var lstltr=name1.charAt(name1.length-1);
   if(lstltr==="a" || lstltr==="e" || lstltr==="i" || lstltr==="o"||lstltr==="u"){
       $('#imgs').html('&nbsp;&nbsp;<img  style="width:30px;height:30px;" src="icons/flam/female.png"/>');
   }
   else{
       $('#imgs').html('&nbsp;&nbsp;<img  style="width:30px;height:30px;" src="icons/flam/male.png"/>');
         
   }
   if(name1.length===0){
       $('#imgs').html("");
       $('#wht').html('<img style="width:50px;height:50px" src="icons/flam/what.png"/>');
       changey();
   }
   var name2=$('#name2').val();
    var lstltr2=name2.charAt(name2.length-1);
   if(lstltr2==="a" || lstltr2==="e" || lstltr2==="i" || lstltr2==="o"||lstltr2==="u"){
       $('#imgs2').html('&nbsp;&nbsp;<img  style="width:30px;height:30px;" src="icons/flam/female.png"/>');
   }
   else{
       $('#imgs2').html('&nbsp;&nbsp;<img  style="width:30px;height:30px;" src="icons/flam/male.png"/>');
       
   }
   if(name2.length===0){
       $('#imgs2').html("");
       $('#wht').html('<img style="width:50px;height:50px" src="icons/flam/what.png"/>');
       //changey();
   }
}
function changey(thi){
    if($('#name1').val().length===0 && $('#name2').val().length===0){
        
        $('#thisisf').html('<b>please wait <br><br><img id="idimg" style="max-width: 350px;max-height:350px;" src="icons/flam/gif/u (30).gif"/>');
    }
    
    else{
        var num=Math.random()*1000;
    num=Math.round(num);
    var ch=Math.round(Math.random()*10);
    ch=(ch/(Math.random()*10))%2;
    ch=Math.round(ch);
    var th=Math.random()*100;
    th=Math.round(th);
    if(ch===1){
        while(th>53){
        th=th-50;
    }
    if(ch===0){
        ch=1;
    }
    $('#thisisf').html('<img id="idimg" style="max-width: 300px;max-height:250px;" src="icons/flam/gif/u ('+th+').gif"/>');
    }
    else{
        while(num>736){
        num=num-700;
    }
    
    $('#thisisf').html('<img id="idimg" style="max-width: 300px;max-height:250px;" src="icons/flam/ji/u ('+num+').png"/>');
    }
    }
   
    
    
}

