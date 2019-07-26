<?php

/* ------------------------------------------------------- */
/* Test sur la langue utilisée par le navigateur           */
/* selon le cas, il faut inclure le fichier qui correspond */
/* ------------------------------------------------------- */

$language = explode(',' , $_SERVER['HTTP_ACCEPT_LANGUAGE']);

switch($language[0])
	{
	case 'fr':
		include('langues/'.$language[0].'.php');
		break;
	case 'en':
		include('langues/'.$language[0].'.php');
		break;
	default:
		include('langues/'.$language[0].'.php');
		break;
	}

?>