


<?php
    if(session_status()==PHP_SESSION_NONE){
    session_start();
    }
    require_once 'inc/db.php';
    $req = $pdo->prepare('SELECT * FROM vin' );
    $req->execute();
    $vin = $req->fetchAll();


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
    	<div class="col-md-4 sidebar_men">
    	  <h3>Domaine</h3>
    	  <ul class="product-categories color">
            <li class="cat-item cat-item-42"><a href="#">Graves</a> <span class="count">(14)</span></li>

		 </ul>
		  <h3>Type</h3>
    	  <ul class="product-categories color"><li class="cat-item cat-item-42"><a href="#">Rouge</a> <span class="count">(14)</span></li>

		  </ul>
		  <h3>Milesime</h3>
    	  <ul class="product-categories color"><li class="cat-item cat-item-42"><a href="#">2017</a> <span class="count">(14)</span></li>
			<li class="cat-item cat-item-60"><a href="#">2016</a> <span class="count">(2)</span></li>

		  </ul>
		  <h3>Prix</h3>
    	  <ul class="product-categories"><li class="cat-item cat-item-42"><a href="#">200€-300€</a> <span class="count">(14)</span></li>
			<li class="cat-item cat-item-60"><a href="#">300€-400€</a> <span class="count">(2)</span></li>

		  </ul>
		</div>
    	<div class="col-md-8 mens_right">
    		<div class="dreamcrub">
			   	<ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.html" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="home">&nbsp;
                        Liste des vins&nbsp;
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.html">Retour</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			   <div class="mens-toolbar">
                 <div class="sort">
               	   <div class="sort-by">
		            <label>Trier par</label>
		            <select>
		                            <option value="">
		                    Pertinence                </option>
		                            <option value="">
		                    Nom                </option>
		                            <option value="">
		                    Prix                </option>
		            </select>
		            <a href=""><img src="images/arrow2.gif" alt="" class="v-middle"></a>
                   </div>
    		     </div>
    	        <ul class="women_pagenation dc_paginationA dc_paginationA06">
			     <li><a href="#" class="previous">Page : </a></li>
			     <li class="active"><a href="#">1</a></li>
			     <li><a href="#">2</a></li>
		  	    </ul>
                <div class="clearfix"></div>		
		        </div>
    		<div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid">
					<div class="cbp-vm-options">
						<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
						<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
					</div>
					<div class="pages">   
        	 <div class="limiter visible-desktop">
               <label>Afficher</label>
                  <select>
                            <option value="" selected="selected">
                    9                </option>
                            <option value="">
                    15                </option>
                            <option value="">
                    30                </option>
                  </select> par page        
               </div>
       	   </div>
					<div class="clearfix"></div>
					<ul>
                        
                        
                        
                        <?php foreach($vin as $result): 
                        if($result->quantite != 0):
                        ?>
                        
					  <li class="simpleCart_shelfItem">
							<a class="cbp-vm-image" href="single.php?id=<?=$result->id_vin ?>">
							 <div class="view view-first">
					   		  <div class="inner_content clearfix">
								<div class="product_image">
									<div class="mask1"><img src="images/vin/1.jpg" alt="image" class="img-responsive zoom-img"></div>
									<div class="mask">
			                       		<div class="info">Voir</div>
					                 </div>
					                 <div class="product_container">
									   <h4><?=$result->nom_vin ?> <?=$result->milesime ?></h4>
									   <p><?=$result->categorie ?></p>
									   <div class="price mount item_price"><?=$result->prix ?>€</div>
									   <a class="button item_add cbp-vm-icon cbp-vm-add" href="?action=add&id=<?=$result->id_vin ?>">Ajouter au panier</a>
									 </div>		
								  </div>
			                     </div>
		                      </div>
		                    </a>
						</li>
						
                        <?php 
                        endif;
                        endforeach; ?>

					</ul>
				</div>
				<script src="js/cbpViewModeSwitch.js" type="text/javascript"></script>
                <script src="js/classie.js" type="text/javascript"></script>
    	</div>
    </div>
   </div>

<?php require 'inc/footer.php';?>