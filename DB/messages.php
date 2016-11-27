<?php 


    
    $_SESSION['FileTypeMessage'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $file_type = $_SESSION['FileTypeMessage'];




function updateStudent($success, $fail){
	 printf('<div class="pull-right box-title"><span class="text-olive">%s</span></div>', $_SESSION[$success]); 
	 $_SESSION[$success]=null; 
	 printf('<div class="pull-right box-title"><span class="text-red pull-right" >%s</span></div>',$_SESSION[$fail]); 
	 $_SESSION[$fail]=null;
}

function updateMessageWhite($success, $fail){
	 printf('<div class="pull-right box-title"><span class="text-white">%s</span></div>', $_SESSION[$success]); 
	 $_SESSION[$success]=null; 
	 printf('<div class="pull-right box-title"><span class="text-red pull-right" >%s</span></div>',$_SESSION[$fail]); 
	 $_SESSION[$fail]=null;
}



 ?>