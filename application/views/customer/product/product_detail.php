<link rel="stylesheet" href="<?= base_url() ?>assets/customer/css/product-details.css">
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
                <img src="<?= base_url() ?>assets/admin/img/product/<?= $quer['gambar'] ?>" id="img1" alt="" >
            </div>

            </div>
                <!-- ** use ul - li-->
            <ul class="image-option">
                <li>
                <div class="product-img-2" id="product-img-2">
                    <img src="<?= base_url() ?>assets/admin/img/product/<?= $quer['gambar2'] ?>" id="img4" alt="">
                </div>
                </li>
                <li>
                <div class="product-img-2" id="product-img-3">
                    <img src="<?= base_url() ?>assets/admin/img/product/<?= $quer['gambar3'] ?>" id="img2" alt="" >
                </div>
                </li>
                <li>
                <div  class="product-img-2" id="product-img-4">
                    <img src="<?= base_url() ?>assets/admin/img/product/<?= $quer['gambar4'] ?>" id="img3" alt="">
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
                .warn{
                    width: 60px;
  height: 30px;
  border-radius: 20px;
  display: inline-block;
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
                    <li id="cek<?= $value['id'] ?>"  class="cek<?= $value['id'] ?>">
                    <a href="<?= base_url('product_customer/detail_product/'.$value['id_product'].'/'.$value['id']) ?>" id="light-green" class="warn <?php $uri1 = $this->uri->segment(4);
                    $id_stylec = $value['id'];
                    if ($uri1 == $id_stylec) {
                        echo 'wirni';
                        
                    }
 ?>" style="background-color:<?= $value['warna'] ?>"></a>
                    <!-- <button  name="warni" class="warn<?= $value['id']; ?>  <?php if($key==0){echo 'wirni';}else{echo 'wirnibord';} ?>" style="background-color:<?= $value['warna'] ?>" > </button> -->
                        <!-- <input type="radio" name="warna[]"  value="<?= $value['warna'] ?>" id="cekbox<?= $value['id']; ?>" style="width: 55px;
                        height: 50px;
                        position: absolute;
                        margin-left: -57px;
                        margin-top: -7px; opacity:1;">
                        </li> -->
                    <script>
                    
                        // $(".warn").css('border','none');

                        // $('.cek<?= $value['id']; ?>').click(function(){
                        //     if ($('#cekbox<?= $value['id'] ?>').is(':checked')) {
                        //         alert('asd');
                        //         // $(".warn<?= $value['id']; ?>").css('border','none');
                        //         // $(".warn<?= $value['id']; ?>").addClass('wirni');
                        //         // $(".warn<?= $value['id']; ?>").removeClass('wirnibord');
                        //     }else{
                        //         // $(".warn<?= $value['id']; ?>").removeClass('wirni');
                        //         // $(".warn<?= $value['id']; ?>").addClass('wirnibord');
                        //         alert('tidak');

                        //     }
                        // })
                        // $(".cek<?= $value['id']; ?>").on('change',function(){
                        //     if ($(cekbox<?= $value['id'] ?>).is(':checked')) {
                        //         // alert('asd');
                        //         $(".warn<?= $value['id']; ?>").addClass('wirni');
                        //         $(".warn<?= $value['id']; ?>").removeClass('wirnibord');
                        //     }else{
                        //         // alert('tidak');
                        //         $(".warn<?= $value['id']; ?>").removeClass('wirni');
                        //         $(".warn<?= $value['id']; ?>").addClass('wirnibord');
                        //         // $(".warn<?= $value['id']; ?>").css('border','none');

                        //     }
                        // })
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
<input type="hidden" name="warni_warni" value="<?php 
$id_product3 = $this->uri->segment(3);
$ahk = $this->db->query("SELECT * FROM warna JOIN style_warna WHERE warna.id_product='$id_product3' AND warna.id_stylecolor=style_warna.id")->row_array();
echo $ahk['warna'];
?>
" id="">
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
                        <span style="font-size:30px; margin-left:20px;">STOK <?php 
                        $id_productD = $product_detail['id'];
                        $productD = $this->db->query("SELECT * FROM product,warna,style_warna WHERE product.id='$id_productD' AND warna.id_product=product.id AND warna.id_stylecolor=style_warna.id")->row_array();
                        echo $productD['stok'];
                        ?></span>
                    </div>
                    <span>Stock <?= $productD['stok'] ?></span>
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
    <?php 
    $uri =  $this->uri->segment(3);
    $komen = $this->db->query("SELECT * FROM komentar JOIN customer where komentar.id_product='$uri' and komentar.id_customer=customer.id")->row_array();
    if ($komen['id_product'] == null) :
    ?>
    <?php else: ?>
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
        <?php endif; ?>
        
</div>
</section>

<!-- Footer -->
 <footer id="sticky-footer" class="py-5 text-white-50" style=" background-color:#445555;  margin-bottom:-5px;  height:207px;">
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