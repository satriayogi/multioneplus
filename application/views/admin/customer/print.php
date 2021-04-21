<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>
@page {
    /* dimensions for the whole page */
    size: A5;
    
    margin: 0;
}

html {
    /* off-white, so body edge is visible in browser */
    background: #eee;
}

body {
    /* A5 dimensions */
    height: 210mm;
    width: 148.5mm;

    margin: 0;
}
.kotak{
    border:1px solid black;
    width:70%;
}
td{
    padding:10px;
}
</style>
</head>
<body>
<div class="kotak">
<img src="<?= base_url() ?>assets/customer/img/logo-mutil-plus-one2.png" style="width:100px;height:50px; margin:auto;" alt="">
<table>
<?php 
$id = $print['id'];
?>
<tr>
<td>Nama :</td>
<td><?php 
$id_customer = $print['id_customer'];
$customer = $this->db->query("SELECT * FROM customer where id='$id_customer'")->row_array();
echo $customer['nama'];
?></td>
<td>Pengirim:</td>
<td>Miacompany</td>
</tr>
<tr>
<td>Alamat:</td>
<td><?= $print['alamat'] ?></td>
<td>asal kota:</td>
<td> Tanggerang Selatan</td>
</tr>
<tr>
<td>Kota:</td>
<td><?= $print['kota'] ?></td>
<td>Paket:</td>
<td><?= $print['courier'] ?></td>
</tr>
<tr>
<td>Kode Pos:</td>
<td><?= $print['kodepos'] ?></td>
<td>Jenis Paket:</td>
<td><?= $print['ekspedisi'] ?></td>
</tr>

</table>
</div>
</body>
</html>
<script>
window.print();
</script>