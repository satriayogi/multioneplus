<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="<?= base_url() ?>assets/customer/css/transaksi.css">
<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
    <style>
    tr td{
        text-align:center;
    }
    </style>
</head>
<body>
<section class="nav-section">
    <div class="full-container navigation">
      <div class="container">
        <img src="<?= base_url() ?>assets/customer/img/logo-mutil-plus-one2.png" alt="logo">
        <ul class="nav">
          <li><a href=""> About MOP</a></li>
          <li><a href=""> Shop </a></li>
          <li><a href=""> Contact</a></li>
        </ul>
      </div>
    </div>
  <div class="container">
    <div class="title-table">
      <span>your shopping cart</span>
      <img src="<?= base_url() ?>assets/customer/img/logo-mutil-plus-one2.png" alt="">
    </div>
    <table class="customer">
      <thead>
<tr>
  <th>No. </th>
  <th>Image</th>
  <th>Description</th>
  <th>Color</th>
  <th>Price</th>
  <th>Amount</th>
  <th>total</th>
  <th>action</th>
</tr>
</thead>
<tbody >
  <form action="<?= base_url('transaksi_customer/updatekeranjang') ?>" method="post">
  <?php
    $no = 1;
    foreach ($keranjang as $value):?>
<tr>
<td><?= $no++; ?></td>
<td class="gambar-masker"> <?php 
    $id_product = $value['id_product'];
    $query = $this->db->query("SELECT * FROM gambar where id_product='$id_product' ")->row_array();
    echo '<img src="'.base_url('assets/admin/img/product/'.$query['gambar']).'" style="width:100px;height:100px;" alt="">';
    ?>
    </td>
<td>
<?= $value['catatan']; ?>
</td>
<td><?= $customer['id'] ?></td>
<td><input type="text" name="harga" readonly disabled id="harga" value="<?=number_format($value['harga'], 0, ',','.'); ?>"></td>
<td>
  <a href="<?= base_url('transaksi_customer/minkeranjang/'.$customer['id'].'/'.$value['id']) ?>" class="button-min"> <i class="fas fa-minus"></i> </a><input type="text" name="pcs" id="pcs" style="text-align:center;" readonly disabled value="<?= $value['pcs'] ?>">
    <input type="hidden" name="id_keranjang" id="" value="<?= $value['id'] ?>">
    <input type="hidden" name="id_product" id="" value="<?= $this->uri->segment(3); ?>">
    <input type="hidden" name="id_customer" id="" value="<?= $this->uri->segment(4); ?>">
  <a href="<?= base_url('transaksi_customer/pluskeranjang/'.$customer['id'].'/'.$value['id']) ?>" class="button-plus"> <i class="fas fa-plus"></i></a>
</td>
<td><input type="text" name="total" readonly disabled id="tot" value="<?= number_format($value['total'], 0, ',','.'); ?>"></td>
  <td><a href="<?= base_url('transaksi_customer/hapus_keranjang/'.$value['id'].'/'.$value['id_product'].'/'.$value['id_customer']) ?>"> <i class="fas fa-trash"></i> </a></td>
</tr> 
<?php endforeach; ?>
<tr class="total">
  <td colspan="6" style="text-align:end">total paid</td>
  <td >RP. <?php $customer = $customer['id']; $qu = $this->db->query("SELECT SUM(total) as jumlah from keranjang WHERE id_customer='$customer'")->row_array(); ?> 
    <?= number_format($qu['jumlah'], 0, ',','.'); ?></td>
  <td ></td>
</tr>
<td colspan="8">
  <div class="tombol-keranjang">
    <a href="" class="btn-chart">Shopping Again</a>
    <a href="<?= base_url('checkout/index')?>" class="btn-checkout"> checkout</a>
  </div>
</td>
<tr>
</tr>
</tbody>
</form>
</table>
</div>
</section>
<!-- Footer -->
<footer class="footer">
  <div class="container subfooter">
      <div class="address">
          <img src="img/logo-mutil-plus-one1 (1).png" alt="" class="footer-img">
          <div class="company-addres1">
              <p class="company">PT. MULTI ONE PLUS</p>
              <p class="company-address">Jl.Barokah, Kp Parungdengdek, No.09 Kelurahan Wanaherang, Kec. Gunung Putri, Kab.Bogor Provinsi, Jawa Barat</p>
          </div>
      </div>

  </div>
  <p class="copyright">&copy; 2020 PT MULTI ONE PLUS, Proudly created by <a href=""> MIACOMPANY.ID </a></p>
</footer>
</body>
</html>