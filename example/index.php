<?php include 'koneksi.php' ?>
<!doctype html>
<html>
<head>
    <title>Data Kecamatan</title>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/ajax_kota.js"></script>
</head>
<body>
<table>
    <tr>
        <td>Pilih Provinsi</td>
        <td>:</td>
        <td>
            <select name="prop" id="prop" onchange="ajaxkota(this.value)">
                <option value="">Pilih Provinsi</option>
                <?php 
                $queryProvinsi = @mysql_query("SELECT * FROM info_daerah where kabkota=0 and kecamatan=0 and kelurahan=0 order by nama");
                while ($dataProvinsi = @mysql_fetch_array($queryProvinsi)){
                    echo '<option value="'.$dataProvinsi['propinsi'].'">'.$dataProvinsi['nama'].'</option>';
                }
                ?>
            <select>
        </td>
    </tr>
    <tr>
        <td>Pilih Kota/Kab</td>
        <td>:</td>
        <td>
            <select name="kota" id="kota" onchange="ajaxkec(this.value)">
                <option value="">Pilih Kota</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Pilih Kec</td>
        <td>:</td>
        <td>
            <select name="kec" id="kec" onchange="ajaxkel(this.value)">
                <option value="">Pilih Kecamatan</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Pilih Kelurahan/Desa</td>
        <td>:</td>
        <td>
            <select name="kel" id="kel">
                <option value="">Pilih Kelurahan/Desa</option>
            </select>
        </td>
    </tr>
</table>
</body>
</html>