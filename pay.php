<?php require 'inc/header.php';?>

   <div class="men">
   	 <div class="container">
  
<?php
         
         if(!empty($_POST) && isset($_POST['crypto']) && isset($_POST['ncarte'])){
             
             unset($_SESSION['item']);
             header('Location: index.php');
         }
         
         
         
         
         if(logged()){            
            $user = $_SESSION['auth'];
            require_once 'inc/db.php';
            $req = $pdo->prepare('SELECT * FROM adresse WHERE id_user = ?' );
            $req->execute([$user->id_user]);
            $adresse = $req->fetch();
             ?>
         
         
         <div class="register-top-grid">
			 <h1>Information de Paiement</h1>
            <form action="pay.php" method="post">      
			 <div>
				<span>Numéro Carte<label>*</label></span>
				<input type="text" name="ncarte"> 
			 </div>
			 <div>
				<span>Cryptogramme<label>*</label></span>
				<input type="text" name="crypto"> 
			 </div>

               <div>
				 <span>Date d'expiration<label>*</label></span>
				 <select>
						 <option>01</option>
						 <option>02</option>
						 <option>03</option>
						 <option>04</option>
						 <option>05</option>
						 <option>06</option>
						 <option>07</option>
						 <option>08</option>
						 <option>09</option>
						 <option>10</option>
						 <option>11</option>
						 <option>12</option>
					   </select>
                   <select>
						 <option>2017</option>
						 <option>2018</option>
						 <option>2019</option>
						 <option>2020</option>
						 <option>2021</option>
					   </select>
			 </div>
            <div class="clearfix"></div>
		 </div>
         <br><br><br><br><br><br><br><br><br><br><br> 
           
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
			 <div class="register-but">
		   <form>
			   <input type="submit" value="Payer"> 
		   </form>
		</div> 
			</div>
            
             </form>
         
         
         <?php
         }
         else{
             header('Location: login.php');
         }
         
         
?>
         </div>
   </div>

<?php require 'inc/footer.php';?>
