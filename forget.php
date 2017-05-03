<?php require 'inc/header.php';?>

   <div class="men">
   	 <div class="container">

    
<?php

if(logged()){ header('Location: index.php'); }

 if(session_status()==PHP_SESSION_NONE){
    session_start();
    }
    if(!empty($_POST) && !empty($_POST['mail'])){
        require_once 'inc/db.php';
        require_once 'inc/functions.php';
        $req = $pdo->prepare('SELECT * FROM users WHERE mail = ? AND confirmed_at IS NOT NULL' );
        $req->execute([$_POST['mail']]);
        $user = $req->fetch();
        if($user) {
            $reset_token = str_random(60);
            $pdo->prepare('UPDATE users SET reset_token = ?, reset_at = NOW() WHERE id_user = ?')->execute([$reset_token, $user->id_user]);
            mail($_POST['mail'],'Réinitialisation de votre mot de passe',"Afin de réinitialiser votre mot de passe, merci de cliquer sur ce lien\n\nhttp://localhost/template/coqovin/Comptes/reset.php?id={$user->id_user}&token=$reset_token");
            header('Location: login.php');
            exit();
        }
    }
?>
         
         <form action="" method="post"> 
		   <div class="register-top-grid">
			<h2>Mot de passe oublié</h2>
			 <div>
				<span>Email<label>*</label></span>
				<input type="text" name="mail"> 
			 </div>     
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
