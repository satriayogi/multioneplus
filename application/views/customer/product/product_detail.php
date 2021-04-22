<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>

<link rel="stylesheet" href="<?= base_url() ?>assets/customer/css/product-details.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- css ratting star
-->

<style>

.button-submit:active{
                width: 16%;
                float: right;
                height: 98px;
                display: inline-block;
                font-size: 25px;
                font-weight: bold;
                text-align: center;
                padding-top: 0px;
                background: #f6921e;
                color: white;
                font-family: 'montserrat';
                text-decoration: none;
                font-weight: 400;
                border-radius: 10px;
                border: none;

            }
            button:hover{
                cursor:pointer;
            }

                .star-rating {
font-size: 0;
white-space: nowrap;
display: inline-block;
/* width: 250px; remove this */
height: 50px;
overflow: hidden;
position: relative;
background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
background-size: contain;
}
.star-rating i {
opacity: 0;
position: absolute;
left: 0;
top: 0;
height: 100%;
/* width: 20%; remove this */
z-index: 1;
background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
background-size: contain;
}
.star-rating input {
-moz-appearance: none;
-webkit-appearance: none;
opacity: 0;
display: inline-block;
/* width: 20%; remove this */
height: 100%;
margin: 0;
padding: 0;
z-index: 2;
position: relative;
}
.star-rating input:hover + i,
.star-rating input:checked + i {
opacity: 1;
}
.star-rating i ~ i {
width: 40%;
}
.star-rating i ~ i ~ i {
width: 60%;
}
.star-rating i ~ i ~ i ~ i {
width: 80%;
}
.star-rating i ~ i ~ i ~ i ~ i {
width: 100%;
}
::after,
::before {
height: 100%;
padding: 0;
margin: 0;
box-sizing: border-box;
text-align: center;
vertical-align: middle;
}

.star-rating.star-5 {width: 250px;}
.star-rating.star-5 input,
.star-rating.star-5 i {width: 20%;}
.star-rating.star-5 i ~ i {width: 40%;}
.star-rating.star-5 i ~ i ~ i {width: 60%;}
.star-rating.star-5 i ~ i ~ i ~ i {width: 80%;}
.star-rating.star-5 i ~ i ~ i ~ i ~i {width: 100%;}

.star-rating.star-3 {width: 150px;}
.star-rating.star-3 input,
.star-rating.star-3 i {width: 33.33%;}
.star-rating.star-3 i ~ i {width: 66.66%;}
.star-rating.star-3 i ~ i ~ i {width: 100%;}

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
<img src="<?= base_url() ?>assets/customer/img/logo-mutil-plus-one2.png" alt="logo">
<ul class="nav">
    <li><a href=""> About MOP</a></li>
    <li><a href="<?= base_url('list_product/index') ?>"> Shop </a></li>
    <li><a href=""> Contact</a></li>
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
<!-- <div class="icon">
              <img src="<?= base_url() ?>assets/customer/img/shopping chart.png" alt="">
              <img src="<?= base_url() ?>assets/customer/img/profile.png" alt="">
            </div> -->
</div>
</div>
<!-- Detail Product -->
<section class="product-section">
<div class="full-container">
<div class="container">
    <div class="product-details">
        <div class="side-by-side product-img">
                <!-- Product Image -->
                <?php 
                $product = $product_detail['id'];
                $quer = $this->db->query("SELECT * FROM product JOIN gambar Where product.id='$product' AND product.id=gambar.id_product")->row_array();
                
                ?>
            <div>
                <div class="product-img-1">
                <img src="<?= base_url() ?>assets/admin/img/product/<?= $quer['gambar'] ?>" id="img1" alt="" style="width:371px; height:367px;">
            </div>

            </div>
                <!-- ** use ul - li-->
            <ul class="image-option">
                <li>
                <div class="product-img-2" id="product-img-2">
                    <img src="<?= base_url() ?>assets/admin/img/product/<?= $quer['gambar2'] ?>" id="img4" style="width:157px;height:157px;" alt="">
                </div>
                </li>
                <li>
                <div class="product-img-2" id="product-img-3">
                    <img src="<?= base_url() ?>assets/admin/img/product/<?= $quer['gambar3'] ?>" id="img2" alt="" style="width:157px;height:157px;">
                </div>
                </li>
                <li>
                <div  class="product-img-2" id="product-img-4">
                    <img src="<?= base_url() ?>assets/admin/img/product/<?= $quer['gambar4'] ?>" id="img3" alt="" style="width:157px;height:157px;">
                </div>
                </li>
            </ul>
        </div>
        <!-- jQuery -->
        <script>
            // console.log(n);
            $('#product-img-3').on('click', function (e) {
                e.preventDefault();
                var n= 2;
                n++;
                var image_element = $("#img2").attr('src');
                console.log(image_element);
$('#img1').attr('src',image_element);


})
            $('#product-img-2').on('click', function (e) {
                e.preventDefault();
                var n= 2;
                n++;
var image_element = $("#img4").attr('src');
console.log(image_element);
$('#img1').attr('src',image_element);


})
$('#product-img-4').on('click', function (e) {
e.preventDefault();
var n= 2;
n++;
var image_element = $("#img3").attr('src');
console.log(image_element);
$('#img1').attr('src',image_element);


})
</script>
<!-- Product Desc -->
<div class="side-by-side product-desc">
<h2>
<?= $product_detail['nama_product']; ?>
</h2>
<h4>
<?php
                $category = $product_detail['id'];
                $query = $this->db->query("SELECT * FROM product,category,category_product WHERE category_product.id_product='$category' AND product.id=category_product.id_product AND category.id=category_product.id_category")->result_array();
                foreach ($query as $category) :
                ?>
    <?= $category['nama_category']; ?>
                <?php endforeach; ?>
                <!-- 5 Pleats Mask isi 30 pcs -->
            </h4>
            <span> <b>RP.</b> <?= $product_detail['harga'] ?></span>
            <div id="product-details">
                <h5> Kelebihan</h5>
                <?= $product_detail['keterangan'] ?>
                <!-- <ul>
                    <li> Waterproof </li>
                    <li> Mudah di Bersihkan </li>
                    <li> Cocok untuk MC, Marketing, Olah Raga </li>
                    <li> Non medical </li>
                </ul> -->
            </div>
            <style>
                .wirni{
                    border:3px solid black;
                }
                .wirni:active{
                    border:3px solid black; 
                    width: 50px;
                    height: 20px;

                    }
                .wirnibord{
                    border:none;
                }
                .wirnibord:active{
                    border:none;
                    width: 50px;
                    height: 20px;
                }
            </style>
            <div class="choose-colors">
                <form action="<?= base_url('product_customer/add_transaksi') ?>" method="post">
                    <!-- <span>Pilih Warna</span> -->
                    <input type="hidden" name="harga" readonly id= "harga" value="<?= $product_detail['harga'] ?>">
                    <input type="hidden" name="product" value="<?= $product_detail['id'] ?>">
                    <input type="hidden" name="customer" value="<?= $customer['id'] ?>">
                <h1>Pilih Warna: <br></h1>

                <ul>
                    <?php 
                    $id = $product_detail['id'];
                    $no = 1;
                    $e=1;
                    $warna = $this->db->query("SELECT * FROM warna JOIN style_warna WHERE warna.id_product='$id' AND warna.id_stylecolor=style_warna.id")->result_array();
                    foreach ($warna as $key=>$value) :
                    ?> 
                    <li id="cek<?= $value['id'] ?>"  class="cek<?= $value['id'] ?>"><button id="light-green" class="warn<?= $value['id']; ?>  <?php if($key==0){echo 'wirni';}else{echo 'wirnibord';} ?>" style="background-color:<?= $value['warna'] ?>" > </button>
                        <input type="checkbox" name="warna[]" <?php if($key==0){echo 'checked="checked" ';} ?> value="<?= $value['warna'] ?>" id="cekbox<?= $value['id']; ?>" style="width: 55px;
                        height: 50px;
                        position: absolute;
                        margin-left: -57px;
                        margin-top: -7px; opacity:0;">
                        </li>
                    <script>
                        // $(".warn").css('border','none');
                        $(".cek<?= $value['id']; ?>").on('change',function(){
                            if ($(cekbox<?= $value['id'] ?>).is(':checked')) {
                                // alert('asd');
                                $(".warn<?= $value['id']; ?>").addClass('wirni');
                                $(".warn<?= $value['id']; ?>").removeClass('wirnibord');
                            }else{
                                // alert('tidak');
                                $(".warn<?= $value['id']; ?>").removeClass('wirni');
                                $(".warn<?= $value['id']; ?>").addClass('wirnibord');
                                // $(".warn<?= $value['id']; ?>").css('border','none');

                            }
                        })
                    </script>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="pembelian">
            <div class="stok">
                <style>
                    .stok{
                        width: 100%;
                        margin-bottom: 15px;
                    }
                    .stok .min{
                        width: 30px;
height: 30px;
border:0px;
border-radius: 50%;
background-color: #455455;
padding-top: 15px;

}
.stok .min:active{
width:28px;
height:28px;
}
.stok .plus{
width: 30px;
height: 30px;
border:0px;
border-radius: 50%;
background-color: #455455;
padding-top: 15px;
}
.stok .plus:active{
width: 28px;
height: 28px;
}
.stok .inputan{
width: 145px;
height: 30px;
border-top: 0px;
border-left: 0px;
text-align: center;
font-size: 30px;
border-right: 0px;
}
.stok .inputan:focus{
height: 30px;
outline: none;
text-align: center;
}
</style>
<button type="button" class="min" id="minus"> <i class="fa fa-minus" id="minus" style="color:white;position: absolute;margin-left: -6px;margin-top: -14px;"  ></i> </button>

<input type="text" name="stok" value="1" id="stok" class="inputan">
<button type="button" class="plus" id="plus"><i class="fa fa-plus" id="plus" style="color:white;position: absolute;margin-left: -6.5px;
margin-top: -16px;"></i></button>

<input type="hidden" name="total" value="<?= $product_detail['harga'] ?>" id="total">
                        <script>
                            const min = document.getElementById('minus');
                            const stok = document.getElementById('stok');
                            const plus = document.getElementById('plus');
                        const harga = document.getElementById('harga').value;
                        const total = document.getElementById('total');
                            min.addEventListener('click',e=>{
                                e.preventDefault();
                                //    alert('cek');
                                // console.log(stok.value);
                                const hasil = Number(stok.value) || 1;
                                stok.value = hasil - 1;
                                const jumlah = harga * stok.value;
                        total.value = jumlah;
                            });
                            plus.addEventListener('click',e =>{
                                e.preventDefault();
                            // console.log(stok.value);
                            const hasil = Number(stok.value) || 0;
                            stok.value = hasil + 1;
                            const jumlah = harga * stok.value;
                        total.value = jumlah;
                        });
                        // const stok = document.getElementById('stok').value;
                        
                        </script>
                        <span style="font-size:30px; margin-left:20px;">STOK <?= $product_detail['stok'] ?></span>
                    </div>
                    <span>Stock <?= $product_detail['stok'] ?></span>
                <span>Max Pembelian 31</span>
                <h4> <img src="https://image.flaticon.com/icons/png/512/61/61456.png"> Tambah Catatan</h4>
                <textarea name="catatan" id="" cols="30" rows="10"></textarea> <br>
                <button class="button" style="border:none;" name="keranjang"> + Keranjang</button>
                <button class="button" style="border:none;" name="beli"> Beli Sekarang</button>
            </div>
        </div>
    </div>
    </form>
    <style>
    .scroll{
        height:500px;
        overflow:scroll;
        overflow-x:hidden;
    }
    </style>
    <!-- User Commentar -->
    <div class="scroll">
    <div class="customer-comment">
    <h2>Ulasan ( <span id="total-comment"> </span> )</h2>
    <?php 
    $id = $product_detail['id'];
    $komen = $this->db->query("SELECT * FROM komentar JOIN customer where komentar.id_product='$id' and komentar.id_customer=customer.id")->result_array();
    foreach ($komen as $key => $value):
    ?>
    <br>
        <div class="commentar" style="width:99%; margin:auto;">
                <div class="cust-comment">
                    <div>
                        <div id="cust-image"></div>
                    </div>
                    <style>
                        .ratting{
                            width:40px !important;
                            height:40px;
                        }
                        </style>
                    <ul id="customer-comment-list">
                        <li id="cust-name"> <?= $value['nama'] ?> </li>
                        <li id="cust-comment"> <?= $value['komen'] ?>  </li>
                        <li id="cust-rating"> 
                        <?php
                        if ($value['ratting'] == 1){
                            echo ' <img src="'. base_url() .'assets/customer/img/rating-star_star-1.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-2.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-2.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-2.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-2.png" class="ratting" alt=""> ';
                        }
                        ?>
                        <?php
                        if ($value['ratting'] == 2){
                            echo ' <img src="'. base_url() .'assets/customer/img/rating-star_star-1.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-1.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-2.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-2.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-2.png" class="ratting" alt=""> ';
                        }
                        ?>
                        <?php
                        if ($value['ratting'] == 3){
                            echo ' <img src="'. base_url() .'assets/customer/img/rating-star_star-1.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-1.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-1.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-2.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-2.png" class="ratting" alt=""> ';
                        }
                        ?>
                        <?php
                        if ($value['ratting'] == 4){
                            echo ' <img src="'. base_url() .'assets/customer/img/rating-star_star-1.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-1.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-1.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-1.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-2.png" class="ratting" alt=""> ';
                        }
                        ?>
                        <?php
                        if ($value['ratting'] == 5){
                            echo ' <img src="'. base_url() .'assets/customer/img/rating-star_star-1.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-1.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-1.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-1.png" class="ratting" alt=""> 
                            <img src="'. base_url() .'assets/customer/img/rating-star_star-1.png" class="ratting" alt=""> ';
                        }
                        ?>
                        </li>
                    </ul>
                </div>
        </div>
        <?php endforeach; ?>
        </div>
        </div>
        <div class="commentar-column">
            <form action="<?= base_url() ?>komentar/save_komentar" method="post">
            <h2> Komentar </h2>
            <input type="text" name="komen" id="komen" />
            <input type="hidden" name="product" id="product" value="<?= $product_detail['id'] ?>" />
            <input type="hidden" name="customer" id="customer" value="<?= $customer['id'] ?>" />
            
            <button class="button-submit" type="submit">Komentari</button>
            <span class="star-rating star-5">
<input type="radio" name="rating" value="1"><i></i>
<input type="radio" name="rating" value="2"><i></i>
<input type="radio" name="rating" value="3"><i></i>
<input type="radio" name="rating" value="4"><i></i>
<input type="radio" name="rating" value="5"><i></i>
</span>
            </form>
    </div>
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
