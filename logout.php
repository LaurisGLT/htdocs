<?php
	include('common/functions.php');
	if(isset($_SESSION['userData'])){
		unset($_SESSION['userData']);
		header("location:login.php");
	}
?>