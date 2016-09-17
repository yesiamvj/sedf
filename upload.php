<?php
    if ( 0 < $_FILES['userImage']['error'] ) {
        echo 'Error: ' . $_FILES['file']['userImage'] . '<br>';
    }
    else {
    	$fname=$_FILES['userImage']['tmp_name'];
    	
    move_uploaded_file( $_FILES['userImage']['tmp_name'],'uploads/' . $_FILES['userImage']['name']);

   
   

   
   }

?>