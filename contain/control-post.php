<?php						
						
	error_reporting(0);
	
//p_sites_manage_site	
	If ($_POST['status']!=''){$sql = "SELECT * FROM tb_domain WHERE st_dom LIKE '".$_POST['status']."'";
	}elseif($_POST['url']!=''){$sql = "SELECT * FROM tb_domain WHERE nm_dom LIKE '".$_POST['url']."'";
	}elseif($_POST['status']=='' Or $_POST['url']==''){$sql = "SELECT * FROM tb_domain WHERE kd_kary LIKE '".$_SESSION['kode']."'";}
	else{$sql = "SELECT * FROM tb_domain";}

	//Detail
	//echo $_POST['dom_nm'];
	
	
	
?>