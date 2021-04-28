<!-- design By Adminlte.io -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Multi One Plus</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
            <img src="<?= base_url() ?>assets/customer/img/logo-mutil-plus-one2.png" style="width:200px; height:100px;" alt="">
          <small class="float-right">Date: <?= date('j F Y'); ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Multi One Plus</strong><br>
          Piazza The Mozia, Jl. BSD Boulevard Utara, Lengkong Kulon, Pagedangan<br>
          Tangerang, Banten 15810<br>
          Phone: (804) 123-5432<br>
          Email: multioneplus.official@miacompany.id
        </address>
      </div>
      <!-- /.col -->
      <?php 
$id_customer = $print['id_customer'];
$customer = $this->db->query("SELECT * FROM customer where id='$id_customer'")->row_array();
// echo $customer['nama'];
?>
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong><?= $customer['nama'] ?></strong><br>
          <?= $print['alamat'] ?>,<?= $print['kodepos'] ?><br>
          <?= $print['kota'] ?><br>
          Phone: <?= $customer['no_tlp'] ?><br>
          Email: <?= $customer['email'] ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Opsi Pengiriman</b><br>
        <br>
        <b>Order ID:</b> <?= $print['id_order'] ?><br>
        <b>Pengirim:</b> <?= $print['courier'] ?><br>
        <b>Jenis Pengiriman:</b> <?= $print['ekspedisi'] ?>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>nama</th>
            <th>Category</th>
            <th>pcs</th>
            <th>Harga</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
              <?php
                $id = $print['id'];
                $detail_transaksi = $this->db->query("SELECT * FROM detail_transaksi,transaksi,product WHERE transaksi.id='$id' AND transaksi.id=detail_transaksi.id_transaksi AND product.id=detail_transaksi.id_product ")->result_array();
              foreach ($detail_transaksi as $key => $value):
              ?>
          <tr>
            <td><?= $value['nama_product'] ?></td>
            <td>
                <?php 
                    $id_product = $value['id_product'];
                    $category = $this->db->query("SELECT * FROM product,category_product,category WHERE product.id='$id_product' AND product.id=category_product.id_product AND category.id=category_product.id_category ")->result_array();
                    foreach ($category as $key1 => $value1) {
                        echo $value1['nama_category'],', ';
                    }
?>
            </td>
            <td><?= $value['pcs'] ?></td>
            <td>Rp. <?= number_format($value['harga'], 0, ',','.'); ?></td>
            <td>Rp. <?= number_format($value['total_product'],0,',','.') ?></td>
          </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <!-- <p class="lead">Payment Methods:</p>
        <img src="<?= base_url() ?>assets/admin/dist/img/credit/visa.png" alt="Visa">
        <img src="<?= base_url() ?>assets/admin/dist/img/credit/mastercard.png" alt="Mastercard">
        <img src="<?= base_url() ?>assets/admin/dist/img/credit/american-express.png" alt="American Express">
        <img src="<?= base_url() ?>assets/admin/dist/img/credit/paypal2.png" alt="Paypal">

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
          jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p> -->
      </div>
      <!-- /.col -->
      <div class="col-6">
        <!-- <p class="lead">Amount Due 2/22/2014</p> -->

        <div class="table-responsive">
          <table class="table">
              <?php
              $id_transaksi= $print['id'];
               $asd = $this->db->query("SELECT SUM(total_product) as jumlah from detail_transaksi WHERE id_transaksi='$id_transaksi'")->row_array();
               $axc = $this->db->query("SELECT SUM(pcs) as qty_jumlah from detail_transaksi WHERE id_transaksi='$id_transaksi'")->row_array();
              ?>
            <tr>
              <th style="width:50%">Total Product:</th>
              <td>Rp. <?= number_format($asd['jumlah'],0,',','.') ?></td>
            </tr>
            <tr>
              <th>Total PCS</th>
              <td><?= $axc['qty_jumlah'] ?></td>
            </tr>
            <tr>
              <th>Discount:</th>
              <td>Rp. <?= number_format($print['discount'],0,',','.') ?></td>
            </tr>
            <tr>
              <th>Ongkos Kirim:</th>
              <td>Rp. <?= number_format($print['harga_kurir'],0,',','.') ?></td>
            </tr>
            <tr>
              <th>Total:</th>
              <td>Rp. <?= number_format($print['total'],0,',','.') ?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>







<!-- <!DOCTYPE html>
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
<img src="<= base_url() ?>assets/customer/img/logo-mutil-plus-one2.png" style="width:100px;height:50px; margin:auto; text-align:center;" alt="">
<table>
<php 
$id = $print['id'];
?>
<tr>
<td>Nama :</td>
<td><php 
$id_customer = $print['id_customer'];
$customer = $this->db->query("SELECT * FROM customer where id='$id_customer'")->row_array();
echo $customer['nama'];
?></td>
<td>Pengirim:</td>
<td>Miacompany</td>
</tr>
<tr>
<td>Alamat:</td>
<td><= $print['alamat'] ?></td>
<td>asal kota:</td>
<td> Tanggerang Selatan</td>
</tr>
<tr>
<td>Kota:</td>
<td><= $print['kota'] ?></td>
<td>Paket:</td>
<td><= $print['courier'] ?></td>
</tr>
<tr>
<td>Kode Pos:</td>
<td><= $print['kodepos'] ?></td>
<td>Jenis Paket:</td>
<td><= $print['ekspedisi'] ?></td>
</tr>

</table>
</div>
</body>
</html>
<script>
window.print();
</script> -->