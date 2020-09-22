<?php
require ('content/fonctions.php');
include ('config.php');
include ('include/langue.php');
include ('class/class.php');

$GLOBALS['InfoPage'] = PageTop($pdo);

require_once 'vendor/autoload.php';
?>

<!DOCTYPE html>

<html lang="fr">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1.0">

	<title><?php echo $InfoPage->titre(); ?></title>
	<meta name="description" content="<?php echo $InfoPage->description; ?>">
	
	<?php /* TODO: Cette CSS sera générée automatiquement en fonction des préférences de l'utilisateur; */ ?>
		
	<link href="templates/bootstrap/css/bootstrap.perso.css" rel="stylesheet">
		
	<!-- Obligatoire - importe les css de Font Awesome et Leaflet -->
	
	<link href="templates/css/commons.css" rel="stylesheet">
	
	<!-- Perso -->
	
	<link href="templates/css/style.css" rel="stylesheet">
	<link rel="icon" type="image/gif" href="img/icon.jpg" />

	<!-- Bootstrap 4.4.1 -->
	
	<script src="templates/bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Jquery 3.4.1 -->

	<script src="js/jquery-3.4.1.min.js"></script>
	
	<!-- librairie datatables 1.10.20 pour tableaux bootstrap 4 -->
	
  	<script src="js/datatables/datatables/js/jquery.datatables.min.js"></script>
  	<script src="js/datatables/datatables/js/dataTables.bootstrap4.min.js "></script>

  	<!-- Ce script contient l'initialisation du plugin datatables de jquery -->
  	
  	<script src="administration/js/demo/datatables-demo.js"></script>
  	
	<!-- OpenStreetMap et Leaflet 1.6 -->
	
	<script src="js/leaflet/leaflet.js"></script>
	
	<!-- TinyMCE 5.1.5 -->
	
	<script src="js/tinymce/tinymce.min.js"></script>
	
	<!-- Divers Javascript -->
	
	<script src="js/scripts.js"></script>

</head>

<body>

<div class="container fixed-top">

	<div class="col-md-12">
	
		<?php include ('include/pillmenu.inc'); ?>
	
	</div>

</div>

<header style="background-image: url('img/fond03.jpg');height: 250px;background-size: cover;position: relative;background-color: #212529;opacity: 0.7;">

	<?php include('include/header.inc');?>
 							
</header>	

<div class="container">

	<div class="row" style="margin-top: 10px;">

		<div class="col-md-12">

			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php?page=blog" title="Accueil"><?php echo HERE;?></a></li>
				<li class="breadcrumb-item"><a href=""><?php echo $InfoPage->rubrique; ?></a></li>
				<li class="breadcrumb-item active"><?php echo $InfoPage->titre; ?></li>
			</ol>

		</div>

	</div>

	<section class="row">
           
        	<?php $InfoPage->AfficherAside($pdo); ?>
              	
    		<?php $InfoPage->AfficherContenu($pdo); ?>		
    	
	</section>

	<footer class="row">

		<div class="col-md-12 text-center">
    	
    		<?php $InfoPage->AfficherFooter(); ?>
                	        
        </div>

	</footer>

</div>

</body>
</html>