<?php
	ob_start();
	unset($_SESSION['autUser']);
	header('Location: ../');
	
	ob_end_flush();
?>