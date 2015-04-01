<?PHP
		include("connect.php");
		session_start();
		//error_reporting(0);
		$user=$_POST['username'];
		$pass=$_POST['password'];
		$_SESSION['username']=$user;
		
		
		//Mencari Di Tabel Karyawan Dan Tabel Bagian
		$sql="SELECT count(kd_kary) FROM tb_kary WHERE us_kary='$user' AND ps_kary='$pass'";
		$sqlq=mysql_query($sql);
		$hasil=mysql_fetch_array($sqlq);
		
		//Mencari Di Tabel Customer Dan Tabel Bagian
		$sqlc="SELECT count(kd_cust) FROM tb_cust WHERE us_cust='$user' AND ps_cust='$pass'";
		$sql_c=mysql_query($sqlc);
		$hasil_c=mysql_fetch_array($sql_c);
		
		if($hasil[0]==1)
		{
			$sq="SELECT tb_kary.kd_kary, tb_kary.nm_kary, tb_bag.nm_bag FROM tb_kary, tb_bag WHERE tb_kary.kd_bag=tb_bag.kd_bag AND tb_kary.us_kary='".$_SESSION['username']."'";
			$sqq=mysql_query($sq);
			$hasilx=mysql_fetch_array($sqq);
			$_SESSION['kode']=$hasilx[0];
			$_SESSION['username']=$hasilx[1];
			$_SESSION['nm_bag']=$hasilx[2];
			
			if($_SESSION['nm_bag']=="Customer"){header("location:act.php?p=p_cust");}
			else{header("location:act.php?p=p_profil");}
			
			
			
		}
		elseif($hasil_c[0]==1)
		{
			
			

			
				$sqb="SELECT tb_cust.kd_cust, tb_cust.nm_cust, tb_bag.nm_bag FROM tb_cust, tb_bag WHERE tb_cust.kd_bag=tb_bag.kd_bag AND tb_cust.us_cust='".$_SESSION['username']."'";
				$sqqb=mysql_query($sqb);
				$hasilxz=mysql_fetch_array($sqqb);
				$_SESSION['kode']=$hasilxz[0];
				$_SESSION['username']=$hasilxz[1];
				$_SESSION['nm_bag']=$hasilxz[2];
				
				if($_SESSION['nm_bag']=="Customer"){header("location:act.php?p=p_order");}
				else{header("location:act.php?p=p_profil");}
				
			
			
		 
		}else{header("location:index.php");} 
?>