<?php
	$urlLink	=	$_GET['link'];
	switch($urlLink){
		case 'profile':include_once 'includes/users/index.php';
		break;
		
		case 'alerts':include_once 'includes/alerts/index.php';
		break;
		
		case 'my-account':include_once 'includes/my-account/index.php';
		break;
		
		case 'log-off':include_once 'logoff.php';
	}
?>