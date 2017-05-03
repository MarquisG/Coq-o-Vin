<?php require 'inc/header.php';?>

<?php $user=$_SESSION['auth'];

if(!logged()){
    header('Location: index.php');
}
?>

   <div class="men">
   	 <div class="container">
         
         
                 <div class="sap_tabs">	
	       <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			  <ul class="resp-tabs-list">
			  	  <?php if($user->role == "user" || $user->role == "admin" || $user->role == "domaine"): ?>
                    <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Gestion de Compte</span></li>
                  <?php endif; ?>
				   <?php if($user->role == "user"): ?>
                    <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Vos commandes</span></li>
                  <?php endif; ?>
				   <?php if($user->role == "domaine"): ?>
                    <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Vos articles</span></li>
                  <?php endif; ?>
				   <?php if($user->role == "domaine"): ?>
                    <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Votre domaine</span></li>
                  <?php endif; ?>
                  <?php if($user->role == "domaine"): ?>
                    <li class="resp-tab-item" aria-controls="tab_item-3" role="tab"><span>Carnet de bord</span></li>
                  <?php endif; ?>
				  
			  </ul>				  	 
			  <div class="resp-tabs-container">
			    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
					<div class="facts">
					  <ul class="tab_list">
                          <?php
                             if($user->role == "user" || $user->role == "admin" || $user->role == "domaine"){
                                require '/inc/user.php';
                             }
                          ?>
					  </ul>           
			        </div>
			     </div>	
                  <?php if($user->role == "user"): ?>
			      <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
					<div class="facts">
					  <ul class="tab_list">
                          <?php require '/inc/commandes.php'; ?>
					  </ul>           
			        </div>
			     </div>	
                  <?php endif; ?>
			      <?php if($user->role == "domaine"): ?>
			      <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
					<div class="facts">
					  <ul class="tab_list">
                          <?php require '/inc/articles.php'; ?>
					  </ul>           
			        </div>
			     </div>	
                  <?php endif; ?>               
                  <?php if($user->role == "domaine"): ?>
			      <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
					<div class="facts">
					  <ul class="tab_list">
                          <?php require '/inc/domaine.php'; ?>
					  </ul>           
			        </div>
			     </div>	
                  <?php endif; ?>
                  <?php if($user->role == "domaine"): ?>
			      <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-3">
					<div class="facts">
					  <ul class="tab_list">
                          <?php require '/inc/carnet.php'; ?>
					  </ul>           
			        </div>
			     </div>	
                  <?php endif; ?>

			  </div>
		    </div>
		  </div>	
         


    </div>
   </div>

<?php require 'inc/footer.php';?>
