<?php  require_once 'inc/functions.php'; 

 if(session_status()==PHP_SESSION_NONE){
    session_start();
    }
$prix = 0;

if(!empty($_SESSION['item'])){

        $items = $_SESSION['item'];            
        foreach($items as $result){     
            $prix = $prix + $result->prix;    
        }
        $_SESSION['prix']=$prix;
        $frais = 10 * sizeof($items);
}

?>


<DOCTYPE HTML>
<html>
<head>
<title>Coq'o Vin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/component.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Dorsa' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<!-- start menu -->
<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
<script src="js/jquery.easydropdown.js"></script>
<script src="js/simpleCart.min.js"> </script>
    <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
            </script>	
</head>
<body>
	<div class="banner">
   	  <div class="container top">
   	  	<div class="header_top">
   	  	   <div class="header_top_left">
	  	      <div class="box_11"><a href="checkout.php">
                  <?php if(isset($_SESSION["item"])): ?>
                    <h4><p>Panier: <?=$prix ?>€ (  <?=sizeof($_SESSION["item"]) ?>items)</p><img src="images/bag.png" alt=""/><div class="clearfix"> </div></h4>
                  <?php else: ?>
                    <h4><p>Panier: <?=$prix ?>€ ( 0 items)</p><img src="images/bag.png" alt=""/><div class="clearfix"> </div></h4>
                  
                  <?php endif; ?>
                  
		      </a></div>
	          <?php if(empty($_SESSION['item'])){ ?><p class="empty"><a href="javascript:;" class="simpleCart_empty">Panier Vide</a></p><?php } ?>
	          <div class="clearfix"> </div>
	       </div>
           <div class="header_top_right">

               <?php if(!logged()): ?>
			 <ul class="header_user_info">
			  <a class="login" href="login.php">
				<i class="user"> </i> 
				<li class="user_desc">S'identifier</li>
			  </a>
			  <div class="clearfix"> </div>
		     </ul>
               <?php else: ?>
               
               <ul class="header_user_info">
			  <a class="login" href="account.php">
				<i class="user"> </i> 
				<li class="user_desc"><?php echo $_SESSION['auth']->prenom . " " . $_SESSION['auth']->nom ?></li>
			  </a>
			  <div class="clearfix"> </div>
		     </ul>
               <p class="empty"><a href="logout.php" class="simpleCart_empty">Se déconnecter</a></p>
               <?php endif; ?>
               

                    
                    

		            <div class="clearfix"> </div>
			 </div>
		     <div class="clearfix"> </div>
	    </div>
   	  <div class="header_bottom">
	   <div class="logo">
		  <h1><a href="index.php"><span class="m_1">COQ'O VIN</span></a></h1>
	   </div>
	   <div class="menu">
	     <ul class="megamenu skyblue">

				
				<li><a class="color10" href="shop.php">Boutique</a></li>
				<li><a class="color3" href="brands.php">Les Domaines</a></li>
				<li><a class="color7" href="contact.php">Contact</a></li>
				<div class="clearfix"> </div>
			</ul>
			</div>
	        <div class="clearfix"> </div>
	    </div>
	  </div>
   </div>