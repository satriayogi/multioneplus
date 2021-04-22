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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

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
       <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 " style="z-index:1;">
       <div class="container">
  <a class="navbar-brand" href="#"><img src="https://www.multioneplus.com/template/s150319001001/images/logo-mutil-plus-one2.png" style="width: 173px;height: 65px;" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-end p-4" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">About MOP <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>list_product/index">Shop</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <li class="nav-item mr-3">
        <a class="nav-link" href="<?= base_url('checkout/index') ?>" style="background-color:#f7f5f6; border-radius:5px;"><img src="<?= base_url() ?>assets/customer/img/shopping chart.png" style="width:30px;height:30px;" alt="">
        <!-- <php
                $id_customer = $customer['id'];
                $ha = $this->db->query("SELECT COUNT(id_customer) as jumlah FROM keranjang WHERE id_customer='$id_customer'")->row_array();
          echo  $ha['jumlah'];
?> -->
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>

    </ul>
  </div>
       </div>
</nav>
              <!-- Online Store Start HERE -->
              <style>
           html {
  scroll-behavior: smooth;
}

       </style>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height:600px; margin-top:-50px; z-index:0">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://media3.s-nbcnews.com/j/newscms/2020_51/3436769/201218-2020mask-bd-2x1_5b62d42228236c7f0b66f597cfcb43f2.fit-760w.jpg" style="height:600px;" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://www.siteking.co.uk/pub/media/catalog/product/cache/e14ec8f6239ab753e845631f95efd80b/v/a/valve-main_1.jpg" class="d-block w-100" style="height:600px;" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://c.files.bbci.co.uk/62E7/production/_116491352_screenshot2021-01-12at16.03.54.png" class="d-block w-100" style="height:600px;" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
       <section class="online-store" id="online-store">
        <div class=products>
            <div class="category" style="margin-top: 20px;">
                <ul>
                    <li><a href="<?= base_url('product_customer/list_product') ?>"> ALL</a></li>
                    <?php
                    foreach ($category as $category1):
                        ?>
                        <li><a href="<?= base_url('product_customer/category_product/'.$category1['id']) ?>"><?= $category1['nama_category'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
              </div>
              <style>
              .img-product{
                transition: all .4s ease-in-out;
              }
              .img-product:hover{
                  cursor: pointer;
                  transform: scale(1.1);

              }
              </style>
              <div class="row row-cols-1 row-cols-md-4" >
                <?php foreach ($list_product as $value):?>
                    <?php 
                        $id = $value['id'];
                        // $id_category = $value['id_category'];
                       
?>
                        <?php 
                        $query = $this->db->get_where('gambar',['id_product'=>$id])->row_array();

                        ?>
  <div class="col mb-3">
    <div class="card" style="background-color:#f7f5f6; border:none">
    <a href="<?= base_url('product_customer/detail_product/'.$customer['id'].'/'.$id) ?>"> <img src="<?= base_url() ?>assets/admin/img/product/<?= $query['gambar'] ?>" class="card-img-top img-product" alt="<?= base_url() ?>assets/admin/img/product/<?= $query['gambar'] ?>"></a>
      <div class="card-body">
        <h5 class="card-title">   <h3> <?php  $category = $this->db->query("SELECT * FROM category JOIN category_product WHERE category_product.id_product='$id' AND category_product.id_category=category.id")->result_array();
                        foreach ($category as $category) {
                            echo $category['nama_category'].' ';
                        } ?></h3></h5>
        <p class="card-text"><h5> <?= $value['keterangan']; ?> </h5></p>
        <p class="card-text mx-auto"><h5 style="text-align:center; color:#24ae5c; font-weight:600;"> Rp.<?= $value['harga']; ?> </h5></p>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
            <!-- <ul class="product-display">
                <php foreach ($list_product as $value):?>
                <li>
                    <form action="<= base_url('product_customer/add_transaksi') ?>" method="post">
                    <div class="product-display-each">
                        <h1 style="padding-top:5px;">
                    <php 
                        $id = $value['id'];
                        // $id_category = $value['id_category'];
                       
?>
                    </h1>
                        <php 
                        $query = $this->db->get_where('gambar',['id_product'=>$id])->row_array();

                        ?>
                        <a href="<= base_url('product_customer/detail_product/'.$customer['id'].'/'.$id) ?>"><img src="<?= base_url() ?>assets/admin/img/product/<?= $query['gambar'] ?>" alt="" style="width: 80%; height:200px; margin-top: 40px;"></a>
                        <div class="product-title" >
                            <h3> <php  $category = $this->db->query("SELECT * FROM category JOIN category_product WHERE category_product.id_product='$id' AND category_product.id_category=category.id")->result_array();
                        foreach ($category as $category) {
                            echo $category['nama_category'].' ';
                        } ?></h3>
                            <h5> <= $value['keterangan']; ?> </h5>
                            <span class="price">Rp <= $value['harga'] ?></span>
                            <input type="hidden" name="id_customer" value="<= $customer['id'] ?>">
                            <input type="hidden" name="id_product" value="< $value['id'] ?>">
                            <input type="hidden" name="pcs" value="1">
                            <input type="hidden" name="harga" value="<= $value['harga'] ?>">
                            <input type="hidden" name="catatan">
                            <input type="hidden" name="total" value="<= $value['harga'] ?>">
                                   </div>
                        </div>
                    </form>
                    </li>
                <php endforeach; ?>
            </ul> -->
        </div>
       </section>
       <div class="clear"></div>
 <!-- Footer -->
 <footer id="sticky-footer" class="py-5 text-white-50" style=" background-color:#445555;  margin-bottom:-5px;">
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