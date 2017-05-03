<?php
if(!logged()){
    header('Location: index.php');
}

if(!empty($_POST['password'])){
    if($_POST['password'] == $_POST['password_confirm']){
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        require_once 'inc/db.php';
        $pdo->prepare('UPDATE users SET mdp = ? WHERE id_user = ?')->execute([$password, $user->id_user]);
    }
}

?>
         <div class="register-top-grid">
			<h2>INFORMATIONS PERSONNELS</h2>
			 <div>
				<span>Prénom<label>*</label></span>
				<p><?= $user->prenom ?></p>
			 </div>
			 <div>
				<span>Nom<label>*</label></span>
				<p><?= $user->nom ?></p>
			 </div>
			 <div>
				 <span>Email<label>*</label></span>
				 <p><?= $user->mail ?></p>
			 </div>
               
               <div>
				 <span>Date de naissance<label>*</label></span>
				 <p><?= $user->date_naissance ?></p>
			 </div>
               
               <div>
				 <span>Téléphone<label></label></span>
				 <p><?= $user->tel ?></p> 
			 </div>
               
               
			 <div class="clearfix"> </div>
               
			   <a class="news-letter" href="#">
				 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>S'inscrire aux Newsletter</label>
			   </a>

               
               
			 </div>
             
		     <div class="register-bottom-grid">
				    <h2>INFORMATIONS DU COMPTE</h2>
                 <form action="" method="post">
					 <div>
						<span>Changer Votre Mot de Passe<label>*</label></span>
						<input type="password" name="password">
					 </div>
					 <div>
						<span>Confirmer le Nouveau Mot de Pasee<label>*</label></span>
						<input type="password" name="password_confirm">
					 </div>
                                   <form>
                                       <input type="submit" value="Envoyer">
                                     
                                   </form>                   

                     </form>
			 </div>