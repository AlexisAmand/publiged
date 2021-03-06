<?php

include ('config.php');

require_once 'vendor/autoload.php';

/* récupération de l'article */

$sqlArticle = "SELECT * FROM articles where publication = '1' AND ref='{$_GET['id']}'";
$reqArticle = $pdo->prepare($sqlArticle);
$reqArticle->execute();

/* Affichage du pdf */

while ($data = $reqArticle->fetch(PDO::FETCH_ASSOC)) {
	$mpdf = new \Mpdf\Mpdf();

	$stylesheet = file_get_contents('style/style.css');

	$mpdf->WriteHTML($stylesheet, 1 );

	$mpdf->WriteHTML("<h1>".$data['titre']."</h1>".$data['article'], 2 );

	$mpdf->Output ();
}

?>