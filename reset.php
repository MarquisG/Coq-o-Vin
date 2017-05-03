<?php require 'inc/header.php';?>

   <div class="men">
   	 <div class="container">

    
<?php

if(logged()){ header('Location: index.php'); }

if(isset($_GET['id']) && ($_GET['token'])){
    require 'inc/db.php';
    $req = $pdo->prepare('SELECT * FROM users WHERE id_user = ? AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE)');
    $req->execute([$_GET['id'], $_GET['token']]);
    $user = $req->fetch();
    if($user){
        if(!empty($_POST)){
            if(!empty($_POST['password']) && $_POST['password'] == $_POST['password_confirm']){
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $pdo->prepare('UPDATE users SET mdp = ?, reset_at = NULL, reset_token = NULL')->execute([$password]);
                header('Location: login.php');
                exit();
            }
        }
    }
}else{
    header('Location: login.php');
    exit();
}
?>
         
 <form action="" method="post"> 
		   <div class="register-top-grid">
			<h2>Nouveau Mot de Passe</h2>
			 <div>
				<span>Mot de Passe<label>*</label></span>
				<input type="password" name="password"> 
			 </div>   
               <div>
				<span>Confirmer le Mot de Passe<label>*</label></span>
				<input type="password" name="password_confirm"> 
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
