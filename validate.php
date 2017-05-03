<?php require 'inc/header.php';?>

   <div class="men">
   	 <div class="container">
  
<?php
         if(logged()){            
            $user = $_SESSION['auth'];
            require_once 'inc/db.php';
            $req = $pdo->prepare('SELECT * FROM adresse WHERE id_user = ?' );
            $req->execute([$user->id_user]);
            $adresse = $req->fetch();
             ?>

         		   <div class="register-top-grid">
			<h1>Information de Livraison</h1>
            <form action="pay.php" method="post">      
			 <div>
				<span>Prénom<label>*</label></span>
				<input type="text" name="prenom" value="<?=$user->prenom ?>"> 
			 </div>
			 <div>
				<span>Nom<label>*</label></span>
				<input type="text" name="nom" value="<?=$user->nom ?>"> 
			 </div>
               
               
               <div>
				 <span>Adresse<label>*</label></span>
				 <input type="text" name="adresse" value="<?=$adresse->adresse ?>"> 
			 </div>
               <div>
				 <span>Ville<label>*</label></span>
				 <input type="text" name="ville" value="<?=$adresse->ville ?>"> 
			 </div>
               <div>
				 <span>Code Postal<label>*</label></span>
				 <input type="text" name="cp" value="<?=$adresse->cp ?>"> 
			 </div>
               <div>
				 <span>Pays<label>*</label></span>
				 <input type="text" name="pays" value="<?=$adresse->pays ?>"> 
			 </div>
               
               
			 </div>
                       
           <div class="register-but">
		   <form>
			   <input type="submit" value="Payer"> 
		   </form>
		</div>
            </form>
            
         
         
         
         <?php
         }
         else{
             header('Location: login.php');
         }
         
         
?>
         </div>
   </div>

<?php require 'inc/footer.php';?>
