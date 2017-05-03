<?php
require_once 'inc/functions.php';
if(session_status()==PHP_SESSION_NONE){
    session_start();
    }

if(!empty($_POST)){
    $errors = array();
    require_once'inc/db.php';
    
    
    
    if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Votre email n'est pas valide";
    }else{
        $req = $pdo -> prepare('SELECT id_user FROM users WHERE mail =?');
        $req -> execute([$_POST['email']]);
        $user = $req->fetch();
        if($user){
            $errors['email']='Cet email est déjà utilisé pour un autre compte';
        }
    }
    
    if(empty($_POST['prenom']) || empty($_POST['nom']) || empty($_POST['date_naissance']) || empty($_POST['adresse']) || empty($_POST['ville']) || empty($_POST['cp']) || empty($_POST['pays'])){
        $errors['gen'] = "Vous n'avez pas remplis tous les champs";
    }
    
    
     if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
        $errors['password'] = "Vous devez entrer un mot de passe valide";
    }
    
    if(empty($errors)){
        
        $req = $pdo -> prepare("INSERT INTO users SET prenom = ?, nom = ?, date_inscription = ? , date_naissance = ?, tel = ?, mail = ?, mdp = ?, role = ?, confirmation_token=?");
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $token = str_random(60);
        $req->execute([$_POST['prenom'],$_POST['nom'],date("Y-m-d"),$_POST['date_naissance'],$_POST['tel'],$_POST['email'],$password,"user",$token]);
        $user_id = $pdo->lastInsertId();
        
        $req = $pdo -> prepare("INSERT INTO adresse SET adresse = ?, cp = ?, ville = ? , pays = ?, id_user = ?");
        $req->execute([$_POST['adresse'],$_POST['cp'],$_POST['ville'],$_POST['pays'],$user_id]);
        
        
        mail($_POST['email'],'Confirmez vorte compte',"Afin de valider votre compte, merci de cliquer sur ce lien\n\nhttp://localhost/web/coqovin/template/confirm.php?id=$user_id&token=$token");
        $_SESSION['flash']['success']='Un email vous a été envoyé pour valider votre compte';
        header('Location: login.php');
        exit();
        
    }
}

?>




<?php require 'inc/header.php';?>

    <div class="account-in">
   	  <div class="container">
          
          
        <?php if(!empty($errors)):?>
        <div class="alert alert-danger">
            <p> Vous n'avez pas rempli le formulaire correctement</p>
            <ul>
            <?php foreach($errors as $error): ?>
                <li> <?=$error; ?></li>
            <?php endforeach ; ?>
            </ul>
        </div>
        <?php endif; ?>
          
   	     <form action="" method="post"> 
		   <div class="register-top-grid">
			<h2>INFORMATIONS PERSONNELS</h2>
			 <div>
				<span>Prénom<label>*</label></span>
				<input type="text" name="prenom"> 
			 </div>
			 <div>
				<span>Nom<label>*</label></span>
				<input type="text" name="nom"> 
			 </div>
			 <div>
				 <span>Email<label>*</label></span>
				 <input type="text" name="email"> 
			 </div>
               
               <div>
				 <span>Date de naissance<label>*</label></span>
				 <input type="date" name="date_naissance"> 
			 </div>
               
               <div>
				 <span>Téléphone<label></label></span>
				 <input type="text" name="tel"> 
			 </div>
               
               
			 <div class="clearfix"> </div>
               
			   <a class="news-letter" href="#">
				 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>S'inscrire aux Newsletter</label>
			   </a>
               <h2>ADRESSE</h2>
               
               <div>
				 <span>Adresse<label>*</label></span>
				 <input type="text" name="adresse"> 
			 </div>
               <div>
				 <span>Ville<label>*</label></span>
				 <input type="text" name="ville"> 
			 </div>
               <div>
				 <span>Code Postal<label>*</label></span>
				 <input type="text" name="cp"> 
			 </div>
               <div>
				 <span>Pays<label>*</label></span>
				 <input type="text" name="pays"> 
			 </div>
               
               
			 </div>
             
		     <div class="register-bottom-grid">
				    <h2>INFORMATIONS DU COMPTE</h2>
					 <div>
						<span>Mot de Passe<label>*</label></span>
						<input type="password" name="password">
					 </div>
					 <div>
						<span>Confirmer le Mot de Pasee<label>*</label></span>
						<input type="password" name="password_confirm">
					 </div>
					 <div class="clearfix"> </div>
			 </div>
             
             <div class="clearfix"> </div>
		<div class="register-but">
		   <form>
			   <input type="submit" value="Envoyer">
			   <div class="clearfix"> </div>
		   </form>
		</div>
             
		  </form>

	   </div>
   </div>

<?php require 'inc/footer.php';?>