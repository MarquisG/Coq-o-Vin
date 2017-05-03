<?php
    require_once 'inc/db.php';

    $req = $pdo->prepare('SELECT id_domaine FROM domaine WHERE id_user = ?');
    $req->execute([$user->id_user]);
    $domaine = $req->fetch();

    if(!empty($_POST) && !empty($_POST['nom']) && !empty($_POST['milesime']) && !empty($_POST['categorie']) && !empty($_POST['volume']) && !empty($_POST['prix']) && !empty($_POST['quantite']) && !empty($_POST['description'])){
        $req = $pdo -> prepare("INSERT INTO vin SET nom_vin = ?, milesime = ?, categorie = ? , volume = ?, prix = ?, quantite = ?, id_domaine = ?, description = ?");
        $req->execute([$_POST['nom'],$_POST['milesime'],$_POST['categorie'],$_POST['volume'],$_POST['prix'],$_POST['quantite'],$domaine->id_domaine,$_POST['description']]);
    }

    
   
    $req = $pdo->prepare('SELECT * FROM vin WHERE id_domaine = ?' );
    $req->execute([$domaine->id_domaine]);
    $vin = $req->fetchAll();
?>



<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<ul>
                        <?php foreach($vin as $result): ?>
                        <li class="simpleCart_shelfItem">
							<a class="cbp-vm-image" href="#">
							 <div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<div class="mask1"><img src="images/vin/1/1.jpg" alt="image" class="img-responsive zoom-img"></div>
									<div class="mask">
			                       		<div class="info">Editer</div>
					                 </div>
					                 <div class="product_container">
									   <h4><?=$result->nom_vin ?> <?=$result->milesime ?></h4>
									   <div class="price mount item_price"><?=$result->prix ?>€</div>
									 </div>		
								  </div>
			                     </div>
		                      </div>
		                    </a>
						</li>
                        <?php endforeach; ?>                        
					</ul>
				</div>  
<br>
<h2>Ajouter un produit</h2>
<br>

   	     <form action="" method="post"> 
		   <div class="register-top-grid">
			 <div>
				<span>Nom du vin<label>*</label></span>
				<input type="text" name="nom"> 
			 </div>
			 <div>
				<span>Milesime<label>*</label></span>
				<input type="text" name="milesime"> 
			 </div>
			 <div>
				 <span>Categorie<label>*</label></span>
				 <input type="text" name="categorie"> 
			 </div>
               
               <div>
				 <span>Volume<label>*</label></span>
				 <input type="text" name="volume"> 
			 </div>
               
               <div>
				 <span>Prix<label></label></span>
				 <input type="text" name="prix"> 
			 </div>
               <div>
				 <span>Quantité<label></label></span>
				 <input type="text" name="quantite"> 
			 </div>
 
               <div>
                   <span>Description<label></label></span>
               <textarea cols="100" rows="12" name="description"></textarea>
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


