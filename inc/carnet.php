<?php
        require_once 'db.php';

        $req = $pdo->prepare('SELECT id_domaine FROM domaine WHERE id_user = ?');
        $req->execute([$user->id_user]);
        $domaine = $req->fetch();

        if(!empty($_POST) && !empty($_POST['titre']) && !empty($_POST['description'])){
            
            $req = $pdo -> prepare("INSERT INTO carnet SET nom_carnet = ?, description_carnet = ?, date_carnet = NOW(), id_domaine = ?");
            $req->execute([$_POST['titre'],$_POST['description'],$domaine->id_domaine]);
            
        }

        $req = $pdo->prepare('SELECT * FROM carnet WHERE id_domaine = ?' );
        $req->execute([$domaine->id_domaine]);
        $carnet = $req->fetchAll();

?>


<h2>Carnet de bord</h2>

<?php foreach($carnet as $result): ?>
    <div class="facts">
					  <ul class="tab_list">
					  	<li><h2><?=$result->nom_carnet ?></h2><h4><?=$result->date_carnet ?></h4></li><br>
					  	<li><?=$result->description_carnet ?></li>
					  </ul>  
					</div> 
<?php endforeach; ?>

<br>
<div class="register-grid">
                 <form action="" method="post">
					 <div>
						<h3>Titre</h3>
						<input type="text" name="titre">
					 </div><br>
					 <div>
                         <h3>Description</h3>
						<textarea name="description"  rows="12" cols="100"></textarea>
					 </div><br>
                                   <form>
                                       <input type="submit" value="Envoyer">
                                     
                                   </form>                   

                     </form>
			 </div>