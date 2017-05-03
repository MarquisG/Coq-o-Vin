<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Panel Admin</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <script src="js/modernizr.custom.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<body>
    
    
    <?php 
    
    session_start();
    if (isset($_SESSION['admin'])) {
        ?>
    
    <?php

    require_once '../inc/db.php';
    $req = $pdo->prepare('SELECT * FROM vin' );
    $req->execute();
    $vin = $req->fetchAll();
    

    
    
?>
    
  <div id="main-wrapper">
    <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1>Panel Admin</h1></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
      </div>   
    </div>
    <div class="template-page-wrapper">
<div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">

          <li><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
          <li><a href="users.php"><i class="fa fa-users"></i>Utilisateurs</a></li>
          <li  class="active"><a href="shop.php"><i class="fa fa-cog"></i>Shop</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Deconnexion</a></li>
        </ul>
      </div>

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">

          <h1>Gérer les Ventes</h1><br><br>


          <div class="row">
            <div class="col-md-12">

             
              <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nom</th>
                      <th>Milesime</th>
                      <th>Categorie</th>
                      <th>Couleur</th>
                      <th>Quantité</th>
                      <th>Domaine</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                      <?php foreach($vin as $result): 
                      
                        $req = $pdo->prepare('SELECT nom_domaine FROM domaine WHERE id_domaine = ?' );
                        $req->execute([$result->id_domaine]);
                        $domaine = $req->fetch();   
                      ?>
                      <tr>
                      <td><?=$result->id_vin ?></td>
                      <td><?=$result->nom_vin ?></td>
                      <td><?=$result->milesime ?></td>
                      <td><?=$result->couleur ?></td>
                      <td><?=$result->categorie ?></td>
                      <td><?=$result->quantite ?></td>
                      <td><?=$domaine->nom_domaine ?></td>
 
                                         
                          
                      <td>
                        <!-- Split button -->
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Action</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="">Supprimer</a></li>
                            <li><a href="">Editer</a></li>
                          </ul>
                        </div>
                      </td>
                    </tr>
                      <?php endforeach; ?>
                      <tr>
                          <td>+</td>
                          <td>
                            <form action="./fonction.php" method="get">
                                <input type="text" name="new" size=100%/> 
                                <input name="querry" value="add" hidden/>
                                <input name="pos" value="<?php echo sizeof($entree_pos)+1; ?>" hidden/>
                                <input name="table" value="entree" hidden/>
                                
                              
                          </td>
                          <td>
                              <input type="submit" value="Ajouter" class="btn btn-default" />
                          </td>
                          </form>
                    <td></td>
                    <td></td>
                      </tr>
        
                  </tbody>
                </table>
              </div>  
                              
            </div>
          </div>
        </div>
      </div>
        
        
                    
            <div class="modal-popup blur-effect" id="popup">
                <div class="popup-content">
                    <div>
                        <form action="./fonction.php" method="get" > 
                        <input class="input" type="text" name="label" value=""/>
                        <input name="querry" value="update" hidden/>
                        <input name="id" value="" hidden/>
                        <input name="table" value="" hidden/>
                        <input type="submit" class="btn-info input" value="Valider" />
                        </form>
                        <div class="popup close"></div>
                    </div>
                </div>
            </div> 
        <div class="overlay"></div>
        
        
        

      <!-- Modal -->
      <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Êtes vous sur de vouloir vous deconnecter ?</h4>
            </div>
            <div class="modal-footer">
              <a href="logout.php" class="btn btn-primary">Oui</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">Non</button>
            </div>
          </div>
        </div>
      </div>

      <footer class="templatemo-footer">
        <div class="templatemo-copyright">
          <p> &copy; 2017 Coq'o Vin. All Rights Reserved</p>
        </div>
      </footer>
    </div>
</div>
    

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/templatemo_script.js"></script>
    

    <!-- Le script qui crée la popup -->
		<script src="js/popup.js"></script>

		<!-- Pour l'effet blur -->
		<!-- by @derSchepp https://github.com/Schepp/CSS-Filters-Polyfill -->
		<script>
			// this is important for IEs
			var polyfilter_scriptpath = '/js/';
		</script>
		<script src="js/cssParser.js"></script>
		<script src="js/css-filters-polyfill.js"></script>
    
    
    
      <?php } 
    else {
        
        header ('location: sign-in.php');
    }
    ?>
 
  </body>
</html>