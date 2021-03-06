<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MultiOnePlus</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
 
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/customer/css/online-store-2.css">
</head>
<body>
  <?=
  $this->session->flashdata('message');
  
  ?>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 " style="z-index:1;">
        <div class="container">
   <a class="navbar-brand" href="<?= base_url('list_product/index') ?> "><img src="https://www.multioneplus.com/template/s150319001001/images/logo-mutil-plus-one2.png" style="width: 173px;height: 65px;" alt=""></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse justify-content-end p-4" id="navbarNavDropdown">
     <ul class="navbar-nav">
       <li class="nav-item active">
         <a class="nav-link" href="<?= base_url("about/index") ?>">About MOP <span class="sr-only">(current)</span></a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="<?= base_url() ?>list_product/index">Shop</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="<?= base_url('kontak/index') ?>">Contact</a>
       </li>
       <li class="nav-item mr-3">
        <a class="nav-link" href="<?= base_url('checkout/index') ?>" style="background-color:#f7f5f6; border-radius:5px;"><img src="<?= base_url() ?>assets/customer/img/shopping chart.png" style="width:30px;height:30px;" alt="">
        <?php
                $id_customer = $customer['id'];
                $ha = $this->db->query("SELECT COUNT(id_customer) as jumlah FROM keranjang WHERE id_customer='$id_customer'")->row_array();
          echo  $ha['jumlah'];
?>
        </a>
      </li>
      <?php 
        if ($customer['id'] == null) :
      ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('loginc/customer') ?>">Login</a>
      </li>
      <?php else: ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="<?= base_url() ?>assets/customer/img/profile.png" style="width:30px;height:30px;" alt="">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?= base_url('profile/index') ?>">Profile</a>
          <a class="dropdown-item" href="<?= base_url('transaksi_customer/noti') ?>">Riwayat Transaksi</a>
          <a class="dropdown-item" href="#">Change Password</a>
          <a class="dropdown-item" href="<?= base_url('loginc/logout_customer') ?>">Logout</a>
        </div>
      </li>
      <?php endif; ?>
 
     </ul>
   </div>
        </div>
 </nav>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= base_url() ?>assets/customer/img/contact-illustration.png" alt="">
        </div>
        <div class="col-md-5">
            <h1>Kontak <b> Kami.</b></h1>
            <form action="<?= base_url('kontak/save_kontak') ?>" method="post">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Nama</label>
                        <input type="text" name="nama" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Email</label>
                        <input type="text" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">No Handphone</label>
                        <input type="text" name="nohp" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder">
                      </div>
                      <div class="form-group">
                        <label for="formGroupExampleInput2">Pesan</label>
                        <textarea name="pesan" id="" cols="20" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success float-right" >Kirim</button>
                    </div>
            </form>
        </div>
    </div>
</div>




 <!-- Footer -->
 <footer id="sticky-footer" class="py-5 text-white-50" style=" background-color:#445555;  margin-bottom:-5px;  height:200px;">
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