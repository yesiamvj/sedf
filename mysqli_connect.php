<?php
            
    DEFINE ('DB_USER', 'u423230104_root');
    DEFINE ('DB_PASSWORD', 'vijiscnt7.');
    DEFINE ('DB_HOST', 'mysql.hostinger.in');
    DEFINE ('DB_NAME', 'u423230104_vijay');
        
       
        
     $dbc = @mysqli_connect(DB_HOST,DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to
 MySQL: '. mysqli_connect_error());
   
?>


