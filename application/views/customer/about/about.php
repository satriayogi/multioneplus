<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url() ?>assets/customer/css/online-store-2.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store | Multi One Plus</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/customer/css/product-details.css"> -->
    <style>
          .product-display-each img:hover{
    transform: scale(1.1);
    cursor: pointer;
}
.product-title{
margin: 15% auto;
}
.products .product-display li {
    background: #f7f5f6;
    width: 100%;
    max-width: 20%;
    margin: 0 50px 120px 0px;
    text-align: center;
    height: 440px;
    display: inline-block;
    vertical-align: top;
}
/* dropdowncss */
/* li {
 display: block;
 transition-duration: 0.5s;
}

li:hover {
  cursor: pointer;
}

.dropdown {
  visibility: hidden;
  opacity: 0;
  position: absolute;
  transition: all 0.5s ease;
  margin-top: 1rem;
  right:25%;
  text-align:left;
  background-color:white;
  display: none;
}

ul li:hover > .dropdown,
ul li .dropdown:hover {
  visibility: visible;
  opacity: 1;
  display: block;
}

ul li .dropdown li {
  clear: both;
    width: 100%;
    float: right;
}
/* .dropdown li:hover{
  background-color:#d0d0d0;
} */
/* .dropdown li a{
  text-decoration:none;
  display:block
}
.nav li a{
  text-decoration:none;
} */
    </style>
</head>
<body>
       <!-- Navigation -->
     <!-- <section class="nav-section">
        <div class="full-container navigation">
          <div class="container">
            <img src="https://www.multioneplus.com/template/s150319001001/images/logo-mutil-plus-one2.png" alt="logo">
            <ul class="nav">
              <li><a href=""> About MOP</a></li>
              <li><a href=""> Shop </a></li>
              <li><a href=""> Contact </a></li>
              <li style="margin-right:-25px;"><a href="<= base_url('checkout/index') ?>"> <img src="<= base_url() ?>assets/customer/img/shopping chart.png" style="width:30px;height:30px;" alt=""></a></li>
          <style>
            .total-icon{
              width: 17px !important;
              height: 17px;
              border: 1px solid #1ba95d;
              border-radius: 50%;
              position: absolute;
              margin-left: -12px;
              margin-top: -4px;
              text-align: center;
              background-color: white;
            }
          </style>
              <li><a href=""> <span class="total-icon">
                <php
                $id_customer = $customer['id'];
                $ha = $this->db->query("SELECT COUNT(id_customer) as jumlah FROM keranjang WHERE id_customer='$id_customer'")->row_array();
          echo  $ha['jumlah'];
?>
              </span> <img src="<= base_url() ?>assets/customer/img/profile.png" style="width:30px;height:30px;" alt=""></a>
              <ul class="dropdown">
              <li> <a href="asds"> Profile</a></li>
              <li> <a href="asd"> Change Password </a> </li>
              <li> <a href="<= base_url('login/logout_customer') ?>"> Logout </a></li>
              </ul>
              </li>
            </ul>
          </div>
        </div>
       </section> -->
       
       <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5" style="z-index:1;">
       <div class="container">
  <a class="navbar-brand" href="<?= base_url('list_product/index') ?>"><img src="https://www.multioneplus.com/template/s150319001001/images/logo-mutil-plus-one2.png" style="width: 173px;height: 65px;" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end p-4" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('customer/about/index') ?>">About MOP <span class="sr-only">(current)</span></a>
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
      $id_customer = $customer['id'];
        if ($id_customer == null) :
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
          <a class="dropdown-item" href="<?= base_url('transaksi_customer/riwayat_transaksi') ?>">Riwayat Transaksi</a>
          <a class="dropdown-item" href="#">Change Password  </a>
          <a class="dropdown-item" href="<?= base_url('loginc/logout_customer') ?>">Logout</a>
        </div>
      </li>
      <?php endif; ?>
    </ul>
  </div>
       </div>
</nav>
<div class="container">


<div class="w-100">
        <h2 class="w-100 text-center text-success font-weight-bold">MULTI ONE PLUS</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <img src="<?= base_url() ?>assets/customer/img/1 (1).png" style="width: 100%;" alt="">
                <img src="<?= base_url() ?>assets/customer/img/Group 4.png" style="width: 100%;" alt="">
            </div>
            <style>
                .visi{
                    font-size: 20px;
                }
            </style>
            <div class="col-md-8">
                <h4 class="font-weight-bold">Vision</h4>
                <p class="visi col-md-9">
                    Leading to be competitive, inovative Medical Devices manufacturer. Reach consumers throughout Indonesia by creating
                    safe and best quality products which complies international quality standards and play an active role in 
                    expanding national health facilities
                </p>
                <style>
                    .misi-list li{
                        flex:3;
                        list-style: none;
                        display: inline-block;
                        width:160px;
                        text-align: center;
                        margin-right:50px;
                        vertical-align: top;

                    }

                    .image-list{
                        width: auto;
                        border:1px solid black;
                        border-radius:5px;
                        height: 147px;
                    }
                </style>
                <h4 class="font-weight-bold">Mision</h4>
                <p class="misi">
                    <ul class="misi-list">
                        <li>
                            <div class="image-list">
                                <img src="<?= base_url() ?>assets/customer/img/icon/icon1.png" alt="">
                            </div>
                            <h5 class="text-success font-weight-bold">STANDARD</h5>
                            <p>
                                Developing products complies international standards
                            </p>
                        </li>
                        <li>
                            <div class="image-list">
                                <img src="<?= base_url() ?>assets/customer/img/icon/icon2.png" alt="">
                            </div>
                            <h5 class="text-success font-weight-bold">QUALITY</h5>
                            <p>
                                Ensuring safe and quality Medical Device products
                            </p>
                        </li>
                        <li>
                            <div class="image-list">
                                <img src="<?= base_url() ?>assets/customer/img/icon/icon3.png" alt="">
                            </div>
                            <h5 class="text-success font-weight-bold">AVAILABILITY</h5>
                            <p>
                                Provide product availability
                            </p>
                        </li>
                        <li>
                            <div class="image-list">
                                <img src="<?= base_url() ?>assets/customer/img/icon/icon4.png" alt="">
                            </div>
                            <h5 class="text-success font-weight-bold">EFECTIVE AND EFFRICIENCY</h5>
                            <p>
                                Providing affordable, effective and efficient consumer services and access throughout Indonesia
                            </p>
                        </li>
                        <li>
                            <div class="image-list">
                                <img src="<?= base_url() ?>assets/customer/img/icon/icon5.png" alt="">
                            </div>
                            <h5 class="text-success font-weight-bold">CONTRIBUTION</h5>
                            <p>
                                Contributing in supporting the needs of national Medical Device facilites
                            </p>
                        </li>
                    </ul>
                </p>
            </div>
        </div>
        </div>
<!-- Footer -->
<footer id="sticky-footer" class="py-5 text-white-50" style=" background-color:#445555;  margin-bottom:-5px;  height:207px;">
    <div class="container subfooter">
        <div class="address">
            <img src="<?= base_url() ?>assets/customer/img/logo-mutil-plus-one1 (1).png" alt="" class="footer-img">
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