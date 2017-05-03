<h1>Gérer votre domaine</h1>

<?php 
        require_once 'db.php';

        if(!empty($_POST) && !empty($_POST['nom']) && !empty($_POST['description'])){
            $pdo->prepare('UPDATE domaine SET nom_domaine = ?, description_domaine = ? WHERE id_user = ?')->execute([$_POST['nom'], $_POST['description'], $user->id_user]);
        }

        $req = $pdo->prepare('SELECT * FROM domaine WHERE id_user = ?');
        $req->execute([$user->id_user]);
        $domaine = $req->fetch();

        
?>

<br>
<div class="register-grid">
                 <form action="" method="post">
					 <div>
						<h3>Nom du domaine</h3>
						<input type="text" name="nom" value="<?=$domaine->nom_domaine ?>">
					 </div><br>
					 <div>
                         <h3>Description du domaine</h3>
						<textarea name="description"  rows="12" cols="100"><?=$domaine->description_domaine ?></textarea>
					 </div>
                     <div>
                        <h3>Image</h3>
                     </div>
                                   <form>
                                       <input type="submit" value="Envoyer">
                                     
                                   </form>                   

                     </form>
			 </div>