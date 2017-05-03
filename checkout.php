<?php

 if(session_status()==PHP_SESSION_NONE){
    session_start();
    }

if(!empty($_GET['action'])) {
            if($_GET['action']="remove"){
                unset($_SESSION['item'][$_GET['id']]);
            }
        }
?>


<?php require 'inc/header.php';?>




   <div class="account-in">
   	 <div class="container">
		  <div class="check_box">	 
              
              
              <?php


    if(!empty($_SESSION['item'])){
        
        
        
        $items = $_SESSION['item'];            
        
?>
		<div class="col-md-9 cart-items">
			 <h1>Mon Panier (<?=sizeof($items) ?>)</h1>
                
                <?php foreach($items as $result):         
        
            ?>
            
            
			 <div class="cart-header">
				 <a class="close1" href="?action=remove&id=<?=array_search($result, $items) ?>"> </a>
				   <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							 <img src="images/vin/<?=$result->id_vin ?>.jpg" class="img-responsive" alt=""/>
						</div>
					   <div class="cart-item-info">
						<h3><a href="single.php?id=<?=$result->id_vin ?>"><?=$result->nom_vin ?></a><span><?=$result->milesime ?></span></h3>
						<ul class="qty">
							<li><p>Qty : 1</p></li>
						</ul> 
					   </div>
					   <div class="clearfix"></div>
				    </div>
			 </div>
            
            <?php endforeach; ?>
            
		 </div>
		 <div class="col-md-3 cart-total">
			 <div class="price-details">
				 <h3>Détails du prix</h3>
				 <span>Total</span>
				 <span class="total1"><?=$prix ?>€</span>
				 <span>Remise</span>
				 <span class="total1">---</span>
				 <span>Frais de Port</span>
				 <span class="total1"><?=$frais ?>€</span>
				 <div class="clearfix"></div>				 
			 </div>	
			 <ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>	
			   <li class="last_price"><span><?=$prix+$frais ?>€</span></li>
			   <div class="clearfix"> </div>
			 </ul>
			 <div class="clearfix"></div>
			 <a class="order" href="validate.php">Valider la Commande</a>
			</div>
			<div class="clearfix"></div>
              
              <?php
        }
        else{ ?>
         <div class="col-md">   
        <h1>Votre Pannier est vide</h1>
              </div>
        <?php } ?>
        
              
	     </div>
	  </div>
   </div>


<?php require 'inc/footer.php';?>


  