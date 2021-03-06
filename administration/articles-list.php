<?php

/* basé sur le template SB Admin 2 for Bootstrap 4 */
/* Copyright 2013-2019 Blackrock Digital LLC. Code released under the MIT license. */
/* Adapté par Alexis AMAND pour le projet PubliGED */

require ('fonctions.php');
include ('../config.php');
include ('../langues/admin/fr.php');
include ('../class/class.php');

$article = new articles();
$BaseDeDonnees = new BasesDeDonnees;

if(isset($_GET['id']) and isset($_GET['action']))
  {
  switch ($_GET['action']) 
    {
      case 'publish':
        $sql = $pdo->prepare("UPDATE articles SET publication = '1' WHERE ref=:ref");	
        $sql->bindparam ( ':ref', $_GET['id'] );
				$req = $sql->execute ();
        $msg = "<div class='alert alert-success' role='alert'>"
				      ."<i class='fas fa-check'></i>".ARTICLE_NB.$_GET['id'].ARTICLE_PUBLISHED
				      ."</div>";
        break;
      case 'unpublish':
        $sql = $pdo->prepare("UPDATE articles SET publication = '0' WHERE ref=:ref");	
        $sql->bindparam ( ':ref', $_GET['id'] );
				$req = $sql->execute ();
        $msg = "<div class='alert alert-success' role='alert'>"
				      ."<i class='fas fa-check'></i>".ARTICLE_NB.$_GET['id'].ARTICLE_UNPUBLISHED
				      ."</div>";
        break;
      case 'delete':
        $sql = $pdo->prepare('DELETE FROM articles WHERE ref=:ref');	
        $sql->bindparam ( ':ref', $_GET['id'] );
				$req = $sql->execute ();
        $msg = "<div class='alert alert-success' role='alert'>"
				      ."<i class='fas fa-check'></i>".ARTICLE_NB.$_GET['id'].ARTICLE_DELETED
				      ."</div>";
        break;
      default:
        # code...
        break;
    }
  }

?>

<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  
  <title><?php echo BCK_TITLE." - ".ASIDE_ADMIN_1; ?></title>

  <?php include("include/header.inc.php"); ?>

  <!-- CSS de datatables via npm -->
  <link href="../node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">

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
          
          	<!-- Affichage du lien "voir le site" -->
         	<li class="nav-item">
			    <a class="nav-link" href="../index.php" target="_blank"><?php echo SEE_SITE; ?></a>
			    </li>

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Rechercher..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

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

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"><?php echo ASIDE_ADMIN_1; ?></h1>
          <p class="mb-4"><?php echo ADM_ARTICLE_MODIF_INTRO; ?></p>

          <?php 
          if(isset($msg))
            {
            echo $msg;
            }
          ?>
          
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><?php echo ADM_ARTICLE_LIST; ?></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              
              <?php
              
              $nb_a = "SELECT * FROM articles ORDER BY date DESC";
              $res_nb_a = $pdo->prepare ( $nb_a );
              $res_nb_a->execute ();
              
              ?>
              
                <table class="table table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th><?php echo ADM_ARTICLE_TITLE; ?></th>
                      <th><?php echo ADM_ARTICLE_AUTHOR; ?></th>
                      <th><?php echo ADM_ARTICLE_CAT; ?></th>
                      <th><?php echo "date"; ?></th>
                      <th style="width: 3.5em;"><?php echo ADM_ART_EDIT; ?></th>
                      <th style="width: 3.5em;"><?php echo ADM_ART_SUPPR; ?></th>
                      <th style="width: 3.5em;"><?php echo ADM_ART_PUBLISH; ?></th>
                    </tr>
                  </thead>
                 
                  <tfoot>
                  <tr>
                      <th>#</th>
                      <th><?php echo ADM_ARTICLE_TITLE; ?></th>
                      <th><?php echo ADM_ARTICLE_AUTHOR; ?></th>
                      <th><?php echo ADM_ARTICLE_CAT; ?></th>
                      <th><?php echo "date"; ?></th>
                      <th style="width: 3.5em;"><?php echo ADM_ART_EDIT; ?></th>
                      <th style="width: 3.5em;"><?php echo ADM_ART_SUPPR; ?></th>
                      <th style="width: 3.5em;"><?php echo ADM_ART_PUBLISH; ?></th>
                    </tr>
                  </tfoot>  
                  <tbody>
                   
                  	<?php
                  	
                  	foreach ($BaseDeDonnees->ListeTitreArticle($pdo) as $value) {
                  		echo "<tr>";
                  		echo "<td>".$value['ref']."</td>";
                  		echo "<td>".$value['titre']."</td>";
                  		echo "<td>".RecupAuteurArticle($pdo, $value['auteur'])."</td>";
                  		echo "<td>".get_category_name($pdo, $value['id_cat'])."</td>";
                      echo "<td>".$value['date']."</td>";
                  		echo '<td class="text-center"><a href="article-edit.php?id='.$value['ref'].'" data-toggle="tooltip" data-placement="left" title="Editer"><i class="far fa-edit text-success"></i></a></td>';
                  		                  		                  		
                  		echo '<td class="text-center"><a href="article-del.php?id='.$value['ref'].'" class="truc" data-toggle="modal" data-target="#SupprArticle" data-whatever="'.$value['ref'].'"><i class="far fa-trash-alt text-danger"></i></a></td>';
                  		                		             		
                  		/* TODO : ajouter une colonne qui permet de publier ou dépublier un article
                  		 * via un booleen dans la table des articles. L'icone change en fonction du ppublié ou non */
                      
                      if ($value['publication'] == '0')
                        {
                        echo '<td class="text-center"><a href="#" data-toggle="modal" data-target="#PublishArticle" title="Publier" class="truc" data-whatever="'.$value['ref'].'"><i class="far fa-star text-warning"></i></i></a></td>';
                        }
                  		else
                        {
                  		  echo '<td class="text-center"><a href="#" data-toggle="modal" data-target="#UnPublishArticle" title="Publier" class="truc" data-whatever="'.$value['ref'].'"><i class="fas fa-star text-warning"></i></a></td>';
                        }

                  		echo "</tr>";

                  	}
                  	                 
                    ?> 
                                  
                  </tbody>
                </table>
              </div>
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
            <span><?php include('include/footer.inc'); ?></span>
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
  
  <!-- Modal qui confirme la volonté de supprimer un article -->
  
  <div class="modal fade" id="SupprArticle" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel"><?php echo SUPPR_ARTICLE_MODAL_TITLE; ?></h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><p class="ConfirmText">&nbsp;</p></div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo SUPPR_ARTICLE_MODAL_NO; ?></button>
          <a class="btn btn-primary truc" href="#"><?php echo SUPPR_ARTICLE_MODAL_YES; ?></a>
        </div>
      </div>
    </div>
  </div>

    <!-- Modal qui confirme la volonté de publier un article -->
  
    <div class="modal fade" id="PublishArticle" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="logoutModalLabel"><?php echo SUPPR_ARTICLE_MODAL_TITLE; ?></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body"><p class="ConfirmText">&nbsp;</p></div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo SUPPR_ARTICLE_MODAL_NO; ?></button>
            <a class="btn btn-primary truc" href="#"><?php echo SUPPR_ARTICLE_MODAL_YES; ?></a>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal qui confirme la volonté de dépublier un article -->
  
    <div class="modal fade" id="UnPublishArticle" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="logoutModalLabel"><?php echo SUPPR_ARTICLE_MODAL_TITLE; ?></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body"><p class="ConfirmText">&nbsp;</p></div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo SUPPR_ARTICLE_MODAL_NO; ?></button>
            <a class="btn btn-primary truc" href="#"><?php echo SUPPR_ARTICLE_MODAL_YES; ?></a>
          </div>
        </div>
      </div>
    </div>
  
  <!-- Logout Modal-->
  
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="logoutModalLabel"><?php echo LOGOUT_TITLE; ?></h5>
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

  <!-- Bootstrap core JavaScript -->
  <script src="../node_modules/jquery/dist/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- jQuery Easing Plugin via npm -->
  <script src="../node_modules/jquery.easing/jquery.easing.min.js"></script>

  <!-- JS de sb-admin -->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- JS de datatables avec npm -->
  <script src="../node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="../node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>

  <!-- JS de datatables perso -->
  <script src="js/demo/datatables-demo.js"></script>
  
  <script>
  $(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
  </script>

  <!-- JS pour la modale qui confirme la suppression d'un article -->
  
  <script>
  $('#SupprArticle').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var titre = button.data('whatever') // Extract info from data-* attributes
  var modal = $(this)
  modal.find('.ConfirmText').text("<?php echo SUPPR_ARTICLE_MODAL_TEXT; ?>" + titre) 
  modal.find(".truc").attr("href", "articles-list.php?action=delete&id=" + titre);		
  })
  </script>

  <!-- JS pour la modale qui confirme la publication d'un article -->
  
  <script>
  $('#PublishArticle').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var titre = button.data('whatever') // Extract info from data-* attributes
  var modal = $(this)
  modal.find('.ConfirmText').text("<?php echo PUB_ARTICLE_MODAL_TEXT; ?>" + titre) 
  modal.find(".truc").attr("href", "articles-list.php?action=publish&id=" + titre);		
  })
  </script>
 
  <!-- JS pour la modale qui confirme la dépublication d'un article -->
  
  <script>
  $('#UnPublishArticle').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var titre = button.data('whatever') // Extract info from data-* attributes
  var modal = $(this)
  modal.find('.ConfirmText').text("<?php echo UNPUB_ARTICLE_MODAL_TEXT; ?>" + titre) 
  modal.find(".truc").attr("href", "articles-list.php?action=unpublish&id=" + titre);		
  })
  </script>

</body>
</html>