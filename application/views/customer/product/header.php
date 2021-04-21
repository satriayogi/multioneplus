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
li {
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
.dropdown li a{
  text-decoration:none;
  display:block
}
.nav li a{
  text-decoration:none;
}
  
    </style>
</head>
<body>
       <!-- Navigation -->
     <section class="nav-section">
        <div class="full-container navigation">
          <div class="container">
            <img src="https://www.multioneplus.com/template/s150319001001/images/logo-mutil-plus-one2.png" alt="logo">
            <ul class="nav">
              <li><a href=""> About MOP</a></li>
              <li><a href=""> Shop </a></li>
              <li><a href=""> Contact </a></li>
              <li style="margin-right:-25px;"><a href="<?= base_url('checkout/index') ?>"> <img src="<?= base_url() ?>assets/customer/img/shopping chart.png" style="width:30px;height:30px;" alt=""></a></li>
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
                <?php
                $id_customer = $customer['id'];
                $ha = $this->db->query("SELECT COUNT(id_customer) as jumlah FROM keranjang WHERE id_customer='$id_customer'")->row_array();
          echo  $ha['jumlah'];
?>
              </span> <img src="<?= base_url() ?>assets/customer/img/profile.png" style="width:30px;height:30px;" alt=""></a>
              <ul class="dropdown">
              <li> <a href="asds"> Profile</a></li>
              <li> <a href="asd"> Change Password </a> </li>
              <li> <a href="<?= base_url('login/logout_customer') ?>"> Logout </a></li>
              </ul>
              </li>
            </ul>
          </div>
        </div>
       </section>