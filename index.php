<?php 
		include 'connect.php';
		session_start();
		$_SESSION['username'];
		$_SESSION['kode'];
		$_SESSION['kd_bag'];
		if($_SESSION['username']="kosong" OR $_SESSION['kode']="kosong" and $_SESSION['kd_bag']="kosong"){
		header("location:home_list_sites_home.php");
		session_destroy();		
		include 'home_header.php'; 
		}else{header("Location:act.php?p=p_profil");
		}	?>

