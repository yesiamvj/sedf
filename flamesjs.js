
var t1="";
var t2="";

var t3="";
function dothis(){
   
    
    var name1=$('#name1').val();
    at(name1);
   // name1=trim(name1);
    
   // alert(name1);
    var name2=$('#name2').val();
   // name2=trim(name2);
    at(name2);
    //alert(name2);
    //var name1ar= name1.toArray();
   // var nam1len=name1.length()>name2.length() ? name1.length() : name2.length();
    var n1len=name1.length;
    var n2len=name2.length;
    
    at(n1len);
    at(n2len);
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
    at("selected name is "+hnme);
    at("select count is "+hnme.length);
    var matchcount=0,unmatchcount=0;
    for(j=0;j<hnme.length;j++){
        var lettr=hnme.charAt(j);
        at("<h5>looking for " + lettr +"<h5>");
        for(k=0;k<lnme.length;k++){
            var lettr2=lnme.charAt(k);
            at("looking at "+ lettr2);
            
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
     while(flames.length>1){
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
            letrpos=letrpos-1;
            eraseIt(letrpos);
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
    $('#main').append("<br><br>"+status);
}




