<?php
require ('../content/fonctions.php');
include ('../config.php');
include('../langues/admin.php');
?>


<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo ADM_RUB_TITRE_0; ?></title>

  <!-- Custom fonts for this template-->
  <link href="css/fontawesome/css/all.min.css" rel="stylesheet" type="text/css"> 
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  
  <!-- TinyMCE 5.0.1 -->
  <script src="../js/tinymce/tinymce.min.js"></script>
  
<script>
    tinymce.init({
        /* ajouter un tableau dans tinymce */
        /*plugins: "table", */
        tools: "inserttable",
        /* ajouter une image
        plugins: "image", */
        /* par dÃ©faut */
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
        plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons template paste textcolor"
        ],
        selector: 'textarea',
        language: "fr_FR",
        style_formats: [
        { title: 'Bold text', inline: 'b' },
        { title: 'Red text', inline: 'span', styles: { color: '#ff0000' } },
        { title: 'Red header', block: 'h1', styles: { color: '#ff0000' } },
        { title: 'Example 1', inline: 'span', classes: 'example1' },
        { title: 'Example 2', inline: 'span', classes: 'example2' },
        { title: 'Table styles' },
        { title: 'Table row 1', selector: 'tr', classes: 'tablerow1' }
        ]
    });
</script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <?php include('include/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Alexis A.</span>
                <img class="img-profile rounded-circle" src="img/avatar.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  <?php echo PROFIL; ?>
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  <?php echo SETTINGS; ?>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  <?php echo LOGOUT; ?>
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

                <!-- Begin Page Content -->
        <div class="container-fluid">
		          
          <div class="card shadow mb-4">
               <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary"><?php echo ADM_RUB_TITRE_1; ?></h6>
               </div>
               <div class="card-body">
                  	<?php

	if (! empty ( $_POST ['texte'] ) and ! empty ( $_POST ['titre'] ) and ! empty ( $_POST ['categorie'] )) {
		// echo $_POST ['texte'] . "<br />";
		// echo $_POST ['titre'] . "<br />";
		// echo $_POST ['categorie'] . "<br />";
		$datearticle = date ( "Y-m-d", time () );

		/*
		 * TODO: Pour l'instant, l'auteur de l'article est 1
		 * quand la connexion à l'admin sera ok
		 * il faudra récupérer le n° de l'auteur
		 */

		$auteur = "1";

		$sqlAjoutArticle = "INSERT INTO articles(titre, article, auteur, date, id_cat) values (:p1, :p2, :p3, :p4, :p5)";

		$AjoutArticle = $pdo->prepare ( $sqlAjoutArticle );

		$AjoutArticle->bindparam ( ':p1', $_POST ['titre'] );
		$AjoutArticle->bindparam ( ':p2', $_POST ['texte'] );
		$AjoutArticle->bindparam ( ':p3', $auteur );
		$AjoutArticle->bindparam ( ':p4', $datearticle );
		$AjoutArticle->bindparam ( ':p5', $_POST ['categorie'] );

		$AjoutArticle->execute ();
		?>
		
		<div class="alert alert-success" role="alert">
		<?php echo ADM_ARTICLE_SEND; ?>
		</div>
		
		<?php
	} 
	else 
	{
?>

<p>Ce formulaire utilise des ressources en ligne</p>

<form method="POST" action="ajout-article.php">

	<div class="form-group">
		<label for="TitreArticle"><?php echo ADM_ARTICLE_EDIT_TITLE; ?></label>
	    <input class="form-control" id="TitreArticle" name='titre'>
	</div>

	<?php 
	$cat = $pdo->query ( "select * from categories" );
	?>
	
	<div class="form-group">
		<label for="TitreArticle"><?php echo ADM_ARTICLE_EDIT_CAT; ?></label>
		<select name='categorie' class="custom-select">
		<option selected><?php echo ADM_ARTICLE_CAT_LIST;?></option>

		<?php 
		while ( $rowcat = $cat->fetch () ) 
		{
			echo "<option value='" . $rowcat ['ref'] . "'>" . $rowcat ['nom'] . "</option>";
		}
		?>
		</select>
	</div>

	 <div class="form-group">
	    <label for="TitreArticle"><?php echo ADM_ARTICLE_EDIT_CONTENT; ?></label>
	    <textarea name="texte"></textarea>
	 </div>
	
	<input type="submit" class="btn btn-primary" value="<?php echo SEND; ?>">
</form>

 <?php  } ?>
	
               </div>
          </div>
              

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?php echo LOGOUT_TITLE; ?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><?php echo LOGOUT_TEXT; ?></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo LOGOUT_CANCEL; ?></button>
          <a class="btn btn-primary" href="login.html"><?php echo LOGOUT_OK; ?></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Ce script contient l'initialisation du plugin datatables de jquery -->
  <script src="js/demo/datatables-demo.js"></script>
 
</body>

</html>