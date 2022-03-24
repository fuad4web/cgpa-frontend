<?php 
    include '../core/init.php';
    $getFromG->logout();
    if($getFromU->loggedIn() === false) {
		header('Location: '.BASE_URL.'');
	}
?>
