<?php
if(!empty($_POST['mail'])){
    
    require_once'inc/db.php';
    $req = $pdo -> prepare("INSERT INTO newsletter SET mail = ?");
    $req->execute([$_POST['mail']]);   
}


?>


<div class="footer">
   	 <div class="container">
   	 	<div class="newsletter">
			<h3>Newsletter</h3>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
			<form action="" method="post">
			  <input type="text" name="mail" onfocus="this.value='';" onblur="if (this.value == '') {this.value ='';}">
			  <input type="submit" value="S'INSCRIRE">
			</form>
		</div>
   		<div class="cssmenu">
		   <ul>

			<li><a href="contact.php">Contact</a></li>
		  </ul>
		</div>
		<ul class="social">
			<li><a href=""> <i class="instagram"> </i> </a></li>
			<li><a href=""><i class="fb"> </i> </a></li>
			<li><a href=""><i class="tw"> </i> </a></li>
	    </ul>
	    <div class="clearfix"></div>
	    <div class="copy">
           <p> &copy; 2017 Coq'o Vin. All Rights Reserved</p>
	    </div>
   	</div>
   </div>
</body>
</html>		