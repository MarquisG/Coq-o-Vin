<?php require 'inc/header.php';?>

   <div class="men">
   	 <div class="container">

    
<?php
$user_id = $_GET['id'];
$token = $_GET['token'];
require 'inc/db.php';
$req = $pdo -> prepare('SELECT * FROM users WHERE id_user=?');
$req->execute([$user_id]);
$user=$req->fetch();
if(session_status()==PHP_SESSION_NONE){
    session_start();
    }

if($user &&$user->confirmation_token == $token){
    $pdo->prepare('UPDATE users SET confirmation_token = NULL, confirmed_at=NOW() WHERE id_user=?')-> execute([$user_id]);
    
    ?>
        <div class="alert alert-success">
            <p>Votre compte a bien été validé</p>
        </div>
    <?php
    
    $_SESSION['auth']=$user;
}else {
    
        ?>
        <div class="alert alert-danger">
            <p>Ce lien n'est plus valide</p>
        </div>
    <?php
    
}
?>
         </div>
   </div>

<?php require 'inc/footer.php';?>
