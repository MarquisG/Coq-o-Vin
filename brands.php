<?php require 'inc/header.php';?>

<?php

    require_once 'inc/db.php';
    $req = $pdo->prepare('SELECT * FROM domaine' );
    $req->execute();
    $domaine = $req->fetchAll();

    $count = $req->rowCount();
    ?>

   <div class="men">
   	<div class="container">
      <div class="col-md-9 single_top">
      	 <h1 class="page-heading product-listing">
			Domaines
		    <span class="heading-counter"><?=$count ?> Domaines</span>
         </h1>
         <div class="product-count">Résultats 1 - <?=$count ?> sur <?=$count ?> items</div>
         
		<?php foreach($domaine as $result): ?>	
          
          <?php 
          $req = $pdo->prepare('SELECT id_vin FROM vin WHERE id_domaine = ?' );
          $req->execute([$result->id_domaine]);
          ?>
		  <div class="brand_box">
	         <div class="left-side col-xs-12 col-sm-3">
				 <img src="images/domaine/<?=$result->id_domaine ?>.jpg" alt=""/>
			 </div>
		     <div class="middle-side col-xs-12 col-sm-5">
		     	<h4><a href="domaine.php?id=<?=$result->id_domaine ?>"><?=$result->nom_domaine ?></a></h4>
		     	<p><?php echo substr($result->description_domaine, 0, 120)?>...</p>
			 </div>
			 <div class="right-side col-xs-12 col-sm-4">
			 	<p><a href=""><?=$req->rowCount() ?> Produits</a></p>
			    <a href="" class="btn btn1 btn-primary btn-normal btn-inline " target="_self">Voir les Produits</a>         
			 </div>
			 <div class="clearfix"> </div>
		  </div>
          
          <?php endforeach; ?>

		</div>

     <div class="clearfix"> </div>
	</div>
   </div>

<?php require 'inc/footer.php';?>