<?php require 'inc/header.php';?>

   <div class="men">
   	 <div class="container">

    
<?php
         if(session_status()==PHP_SESSION_NONE){
    session_start();
    }
         session_unset();
         header('Location: index.php');
?>
         </div>
   </div>

<?php require 'inc/footer.php';?>
