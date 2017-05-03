<?php  require_once 'inc/functions.php'; ?>

<?php if(!logged()){

    if(!empty($_POST) && !empty($_POST['mail']) && !empty($_POST['password'])){
        require_once 'inc/db.php';
        $req = $pdo->prepare('SELECT * FROM users WHERE mail=:mail AND confirmed_at IS NOT NULL' );
        $req->execute(['mail' => $_POST['mail']]);
        $user = $req->fetch();

        if(isset($user->mdp)) {
        if(password_verify($_POST['password'], $user->mdp)){
            if(session_status()==PHP_SESSION_NONE){
                session_start();
            }
            $_SESSION['auth']=$user;
            var_dump($_SESSION['auth']);
            header('Location: index.php');
            exit();
        }else{
            $errors['mdp']="Identifiant ou mot de passe incorrect";
        }
        }
        else{
            $errors['mdp']="Identifiant ou mot de passe incorrect 2";
        }
    }
?>



<?php require 'inc/header.php';?>

   <div class="account-in">
   	 <div class="container">
         
         
                 <?php if(!empty($errors)):?>
        <div class="alert alert-danger">
            <ul>
            <?php foreach($errors as $error): ?>
                <li> <?=$error; ?></li>
            <?php endforeach ; ?>
            </ul>
        </div>
        <?php endif; ?>
   	   <h3>Compte</h3>
		<div class="col-md-7 account-top">
		  <form action="" method="post">
			<div> 	
				<span>Email*</span>
				<input type="text" name="mail"> 
			</div>
			<div> 
				<span class="pass">Mot de Passe*</span>
				<input type="password" name="password">
			</div>
              <p><a href="forget.php" class="simpleCart_empty">Mot de passe oublié ?</a></p><br>
				<input type="submit" value="Se connecter"> 
              
		   </form>
		</div>
		<div class="col-md-5 left-account ">

			<a href="register.php" class="create">Créer un compte</a>
			<div class="clearfix"> </div>
		</div>
	    <div class="clearfix"> </div>
	  </div>
   </div>

<?php require 'inc/footer.php';?>
</body>
</html>		
<?php 
}
else{
    header('Location: index.php');
}

?>