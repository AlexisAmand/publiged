<?php

/* fonction qui récupére le nom d'un auteur en partant de son numéro */

function RecupAuteurArticle($pdo2, $idAuteur) {
	$res_membres = $pdo2->prepare ( "select * from membres where id=:id" );
	$res_membres->bindValue ( "id", $idAuteur, PDO::PARAM_INT );
	$res_membres->execute ();
	
	while ( $data_membres = $res_membres->fetch(PDO::FETCH_ASSOC))
	{
		$idAuteur = $data_membres ['login'];
	}
	return $idAuteur;
}

/* fonction qui récupére le titre d'un article à partir de son numéro */

function RecupTitreArticle($pdo2, $a) {
	$res = $pdo2->prepare ( "SELECT * FROM articles WHERE ref = :ref" );
	$res->bindparam ( ':ref', $a );
	$res->execute ();

	while ( ($row = $res->fetch(PDO::FETCH_ASSOC)) ) {
		return $row ['titre'];
	}
}

/* fonction qui récupére le nom d'une catégorie en partant de son numéro */

function get_category_name($pdo2, $cn) {
	$req = $pdo2->query ( "select * from categories where ref ='" . $cn . "'" );
	
	while ( $row = $req->fetch(PDO::FETCH_ASSOC)) {
		return $row ['nom'];
	}
}

?>