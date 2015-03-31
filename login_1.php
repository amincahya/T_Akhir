<?PHP
		include("connect.php");
		session_start();
		//error_reporting(0);
		$user=$_POST['username'];
		$pass=$_POST['password'];
		$_SESSION['username']=$user;
		
		$sql="SELECT count(kd_kary) FROM tb_kary WHERE us_kary='$user' AND ps_kary='$pass'";
		$sqlq=mysql_query($sql);
		$hasil=mysql_fetch_array($sqlq);
		
		if($hasil[0]==1)
		{
			$sq="SELECT tb_kary.kd_kary, tb_bag.nm_bag FROM tb_kary, tb_bag WHERE tb_kary.kd_bag=tb_bag.kd_bag AND tb_kary.us_kary='".$_SESSION['username']."'";
			$sqq=mysql_query($sq);
			$hasilx=mysql_fetch_array($sqq);
			$_SESSION['kd_kary']=$hasilx[0];
			$_SESSION['nm_bag']=$hasilx[1];
			header("location:act.php?p=p_profil");
		}
		else
		{
			header("location:index.php");
		}
?>