<?php

    if(session_status()==PHP_SESSION_NONE){
    session_start();
    }
    if(!isset($_GET['id'])){
        header('Location: index.php');
        
    }
    require_once 'inc/db.php';

    $req = $pdo->prepare('SELECT * FROM domaine WHERE id_domaine = ?');
    $req->execute([$_GET['id']]);
    $domaine = $req->fetch();

    $req = $pdo->prepare('SELECT * FROM carnet WHERE id_domaine = ?');
    $req->execute([$_GET['id']]);
    $carnet = $req->fetchAll();

?>

<?php require 'inc/header.php';?>

   <div class="men">
   	 <div class="container">

         <h1><?=$domaine->nom_domaine ?></h1>
         <p><?=$domaine->description_domaine ?></p><br><br>  
         <h2>Carnet de bord</h2><br>
         <?php if(!empty($carnet)): ?>
        <?php foreach($carnet as $result): ?>
            <div class="facts">
                              <ul class="tab_list">
                                <li><h2><?=$result->nom_carnet ?></h2><h4><?=$result->date_carnet ?></h4></li><br>
                                <li><?=$result->description_carnet ?></li>
                              </ul>  
                            </div> 
        <?php endforeach; ?>
         <?php else: ?>
         <h3>Aucunes note n'a été ajoutées par ce domaine</h3>
         <?php endif; ?>
    
         </div>
   </div>

<?php require 'inc/footer.php';?>
