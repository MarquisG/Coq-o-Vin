<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Panel Admin</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/main.css">

</head>
<body>
    <?php 
    
    session_start();
    if (isset($_SESSION['admin'])) {
        ?>
    
    
    
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

          <li  class="active"><a href="index.php"><i class="fa fa-home"></i>Home</a></li>
          <li><a href="users.php"><i class="fa fa-users"></i>Utilisateurs</a></li>
          <li><a href="shop.php"><i class="fa fa-cog"></i>Shop</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Deconnexion</a></li>
        </ul>
      </div>

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">

          <h1>Home</h1>
          <p></p>
            
          <div class="img">
            
              <a href="preferences.php"><img src="img/pref.png" /></a>
         

          </div>    
            
            
            
                      <div class="img">
                          <a href="menus.php"><img src="img/menu.png" /></a>
                        

          </div>
            
            
            
        </div>
      </div>
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

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/templatemo_script.js"></script>
  
    <?php } 
    else {
        header ('location: sign-in.php');
    }
    ?>
</body>
</html>