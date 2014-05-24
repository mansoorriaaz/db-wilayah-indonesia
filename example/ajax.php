<?php
if (!empty($_GET['q']))
{
	if (ctype_digit($_GET['q']))
	{
		include 'koneksi.php';
		$query = @mysql_query("SELECT * FROM info_daerah where propinsi=$_GET[q] and kecamatan=0 and kelurahan=0 and kabkota!=0 order by nama");
		echo"<option selected value=''>Pilih Kota/Kab</option>";
		while($d = @mysql_fetch_array($query))
		{
			echo "<option value='$d[kabkota]&prop=$_GET[q]'>$d[nama]</option>";
		}
	}
}

if (empty($_GET['kel']))
{
	if (!empty($_GET['kec']) and !empty($_GET['prop']))
	{
		if (ctype_digit($_GET['kec']) and ctype_digit($_GET['prop']))
		{
			include 'koneksi.php';
			$query = @mysql_query("SELECT * FROM info_daerah where propinsi=$_GET[prop] and kecamatan!=0 and kelurahan=0 and kabkota=$_GET[kec] order by nama");
			echo"<option selected value=''>Pilih Kecamatan</option>";
			while($d = @mysql_fetch_array($query))
			{
				echo "<option value='$d[kecamatan]&kec=$d[kabkota]&prop=$d[propinsi]''>$d[nama]</option>";
			}
		}
	}
}
else
{
	if (!empty($_GET['kec']) and !empty($_GET['prop']))
	{
		if (ctype_digit($_GET['kec']) and ctype_digit($_GET['prop']))
		{
			include 'koneksi.php';
			$query = @mysql_query("SELECT * FROM info_daerah where propinsi=$_GET[prop] and kecamatan=$_GET[kel] and kelurahan!=0 and kabkota=$_GET[kec] order by nama");
			echo"<option selected value=''>Pilih Kelurahan/Desa</option>";
			while($d = @mysql_fetch_array($query))
			{
				echo "<option value='$d[kode]'>$d[nama]</option>";
			}
		}
	}
}
?>
