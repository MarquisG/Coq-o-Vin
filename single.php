<?php
     if(session_status()==PHP_SESSION_NONE){
    session_start();
    }
    if(!isset($_GET['id'])){
        header('Location: index.php');
        
    }
    require_once 'inc/db.php';

if(!empty($_POST) && !empty($_POST['commentaire']) && !empty($_POST['note']) && !empty($_POST['titre'])){
    
     $req = $pdo -> prepare("INSERT INTO avis SET titre_commentaire = ?, commentaire = ?, note = ? , id_user = ?, id_vin = ?");

        $req->execute([$_POST['titre'],$_POST['commentaire'],$_POST['note'],$_SESSION['auth']->id_user,$_GET['id']]);
    
}
    $req = $pdo->prepare('SELECT * FROM vin WHERE id_vin = ?');
    $req->execute([$_GET['id']]);
    $vin = $req->fetch();

    $req = $pdo->prepare('SELECT * FROM avis WHERE id_vin = ?');
    $req->execute([$_GET['id']]);
    $avis = $req->fetchAll();


if(!empty($_GET['action'])) {
    if($_GET['action']=="add"){
        
        $req = $pdo->prepare('SELECT * FROM vin WHERE id_vin = ?' );
        $req->execute([$_GET['id']]);
        $product = $req->fetch();
        
        if(!empty($_SESSION['item'])){
            $items = $_SESSION['item'];
            array_push($items, $product);
            $_SESSION['item'] = $items;
            
        }
        else{
            $_SESSION['item'][0] = $product;
        }
        
    }
   
}


    

?>



<?php require 'inc/header.php';?>


   <div class="men">
   	<div class="container">
      <div class="col-md single_top">
      	<div class="single_left">
      	  <div class="labout span_1_of_a1">
			<div class="flexslider">
					 <ul class="slides">
						<li data-thumb="images/vin1.jpg">
							<img src="images/vin1.jpg" />
						</li>
						<li data-thumb="images/vin1.jpg">
							<img src="images/vin1.jpg" />
						</li>
						<li data-thumb="images/vin1.jpg">
							<img src="images/vin1.jpg" />
						</li>
						<li data-thumb="images/vin1.jpg">
							<img src="images/vin1.jpg" />
						</li>
					 </ul>
				  </div>
		          <div class="clearfix"></div>	
	    </div>
		<div class="cont1 span_2_of_a1 simpleCart_shelfItem">
				<h1><?=$vin->nom_vin ?></h1>
				<p class="availability">Disponibilité: <span class="color"><?php if($vin->quantite != 0){ ?>En stock<?php }else{ ?>Rupture<?php } ?></span></p>
			    <div class="price_single">
				  <span class="amount item_price actual"><?=$vin->prix ?>€</span>
				</div>
				<h2 class="quick">Description rapide:</h2>
				<p class="quick_desc"><?=substr($vin->description, 0, 200) ?>...</p>

				<ul class="size">
					<h3>Milésime</h3>
					<li><a href="#"><?=$vin->milesime ?></a></li>
				</ul>
				<div class="quantity_box">
					<ul class="product-qty">
					   <span>Quantité:</span>
					   <select>
						 <option>1</option>
						 <option>2</option>
						 <option>3</option>
						 <option>4</option>
						 <option>5</option>
						 <option>6</option>
					   </select>
				    </ul>
				    <ul class="single_social">
						<li><a href="#"><i class="fb1"> </i> </a></li>
						<li><a href="#"><i class="tw1"> </i> </a></li>
						<li><a href="#"><i class="g1"> </i> </a></li>
						<li><a href="#"><i class="linked"> </i> </a></li>
		   		    </ul>
		   		    <div class="clearfix"></div>
	   		    </div>
			    <a href="?id=<?=$vin->id_vin ?>&action=add" class="btn btn-primary btn-normal btn-inline btn_form button item_add item_1" target="_self">Ajouter au panier</a>
			</div>
		    <div class="clearfix"> </div>
		</div>
        <div class="sap_tabs">	
	       <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
			  <ul class="resp-tabs-list">
			  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Description</span></li>
				  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Avis</span></li>
			  </ul>				  	 
			  <div class="resp-tabs-container">
			    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
					<div class="facts">
					  <ul class="tab_list">
                          <p class="quick_desc"><?=$vin->description ?></p>
					  </ul>           
			        </div>
			     </div>	
			      <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
                      <?php foreach($avis as $result): ?>
			        <div class="facts">
					  <ul class="tab_list">
					  	<li><h2><?=$result->note ?>/5</h2><h3><?=$result->titre_commentaire ?></h3></li>
					  	<li><?=$result->commentaire ?></li>
					  </ul>  
					</div> 
                      <?php endforeach; ?>
                      <div class="facts">
					  <ul class="tab_list">
                      
                        <?php if(!logged()): ?>
                      <h2>Vous devez vous conntecter pour laisser un avis</h2>
                      <a href="login.php" class="btn btn-primary btn-normal btn-inline btn_form button item_add item_1" target="_self">Se Connecter</a>
                      <?php else: ?>
                          <h2>Laisser un commentaire</h2>
                      <div class="register-grid">
					  	<form action="" method="post">	
                            <div>
                            <span>Note</span>*<br>
                            <select name="note">
                             <option>1</option>
                             <option>2</option>
                             <option>3</option>
                             <option>4</option>
                             <option>5</option>
                           </select>
                            </div><br>
                            <div>
                            <span>Titre</span>*<br>
                            <input type="text" name="titre"> 
                            </div><br>
                            <div>
                            <span class="pass">Commentaire</span>*<br>
                            <textarea name="commentaire" rows="4" cols="50"></textarea>
                        			</div><br>
                            <div class="register-but">
                           <form>
                               <input type="submit" value="Envoyer">
                               <div class="clearfix"> </div>
                           </form>
                        </div>

                       </form>
                          </div>
	
                        <?php endif; ?>
                          </ul>  
					</div>
			     </div>	
			  </div>
		    </div>
		  </div>	
		</div>

     <div class="clearfix"> </div>
	</div>
   </div>

<?php require 'inc/footer.php';?>

<!-- FlexSlider -->
<script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>
	