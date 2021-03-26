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
</head>
<body>


    <section>
        <!-- Detail Product -->
        <div class="full-container">
            <div class="container">
                <div class="product-details">
                    <div class="side-by-side product-img">
                          <!-- Product Image -->
                        <div class="product-img-1">
                            <img src="<?= base_url() ?>assets/customer/img/masker-master.png" alt="">
                        </div>
                          <!-- ** use ul - li-->
                        <ul class="image-option">
                          <li>
                            <div class="product-img-2" id="product-img-2">
                                <img src="<?= base_url() ?>assets/customer/img/masker-4.png" alt="">
                            </div>
                          </li>
                          <li>
                            <div class="product-img-2" id="product-img-3">
                                <img src="<?= base_url() ?>assets/customer/img/masker-5.png" alt="">
                            </div>
                          </li>
                          <li>
                            <div  class="product-img-2" id="product-img-4">
                                <img src="<?= base_url() ?>assets/customer/img/masker-6.png" alt="">
                            </div>
                          </li>
                        </ul>
                    </div>
                    <!-- Product Desc -->
                    <div class="side-by-side product-desc">
                        <h2 id="product-name">
                            5 Pleats Mask MOP
                        </h2>
                        <h4>
                            5 Pleats Mask isi 30 pcs
                        </h4>
                        <div id="product-details">
                            <h5> Kelebihan</h5>
                            <ul>
                                <li> Waterproof </li>
                                <li> Mudah di Bersihkan </li>
                                <li> Cocok untuk MC, Marketing, Olah Raga </li>
                                <li> Non medical </li>
                            </ul>
                        </div>

                        <div class="choose-colors">
                            <ul>
                              <li><button id="light-green"> </button> 
                              <input type="checkbox" name="" id="" style="width: 55px;
                                height: 50px;
                                position: absolute;
                                margin-left: -57px;
                                margin-top: -7px; opacity:0;">
                            </li>
                              <li><button id="brown"></button>
                              <input type="checkbox" name="" id="" style="width: 55px;
                                height: 50px;
                                position: absolute;
                                margin-left: -57px;
                                margin-top: -7px; opacity:0;">
                            </li>
                            </li>
                              <li><button id="light-blue"></button>
                              <input type="checkbox" name="" id="" style="width: 55px;
                                height: 50px;
                                position: absolute;
                                margin-left: -57px;
                                margin-top: -7px; opacity:0;">
                            </li>
                              <li><button id="light-grey"></button>
                              <input type="checkbox" name="" id="" style="width: 55px;
                                height: 50px;
                                position: absolute;
                                margin-left: -57px;
                                margin-top: -7px; opacity:0;">
                            </li>
                              <li><button id="white"></button>
                              <input type="checkbox" name="" id="" style="width: 55px;
                                height: 50px;
                                position: absolute;
                                margin-left: -57px;
                                margin-top: -7px; opacity:0;">
                            </li>
                            </ul>
                        </div>

                        <div class="pembelian">
                            <div class="stok">
                                <button type="button" class="min" id="minus"> <i class="fa fa-minus" id="minus" style="color:white;position: absolute;margin-left: -6px;margin-top: -14px;"  ></i> </button>

                                <input type="text" name="stok" value="1" id="stok" class="inputan">
                                <button type="button" class="plus" id="plus"><i class="fa fa-plus" id="plus" style="color:white;position: absolute;margin-left: -6.5px;
margin-top: -16px;"></i></button>
                                    <script>
                                       const min = document.getElementById('minus');
                                           const stok = document.getElementById('stok');
                                        const plus = document.getElementById('plus');
                                       min.addEventListener('click',e=>{
                                           e.preventDefault();
                                        //    alert('cek');
                                        // console.log(stok.value);
                                           const hasil = Number(stok.value) || 1;
                                           stok.value = hasil - 1;
                                       });
                                       plus.addEventListener('click',e =>{
                                        e.preventDefault();
                                        // console.log(stok.value);
                                        const hasil = Number(stok.value) || 0;
                                        stok.value = hasil + 1;
                                       });
                                       
                                    </script>
                                    <span style="font-size:30px; margin-left:20px;">STOCK 31</span>
                            </div>
                            <span>Stock 31</span>
                            <span>Max Pembelian 31</span>
                            <h4> <img src="https://image.flaticon.com/icons/png/512/61/61456.png"> Tambah Catatan</h4>
                            <textarea name="" id="" cols="30" rows="10"></textarea> <br>
                            <a href="" class="button"> + Keranjang</a>
                            <a href="" class="button"> Beli Sekarang</a>
                        </div>
                    </div>
                </div>


                    <!-- User Commentar -->
                <div class="customer-comment">
                    <div class="commentar">
                    <h2>Ulasan ( <span id="total-comment"> </span> ) </h2>
                            <div class="cust-comment">
                                <div id="cust-image"></div>
                                <ul id="customer-comment-list">
                                    <li id="cust-name"> Yendi Amal </li>
                                    <li id="cust-comment"> Sukaaa, ini keren banget. packaging rapi. pengiriman cepat. Recommended seller deh.  </li>
                                    <li id="cust-rating"> <img src="https://lh3.googleusercontent.com/proxy/UBwpWZJsW4H8ZnohWly11YAzDn-gSFMl3cAXowFkqCjE34iCccB-kTlurr1P6TXqHlpPldbIOPwbOerfNGyrfGWSvNpYelwxiROWWXn7oP7Cf7gRO04FiXjNtC9tellS" alt=""> </li>
                                </ul>
                            </div>
                    </div>
                    <div class="commentar-column">
                        <h2> Komentar </h2>
                        <input name="commentar" id="commentar"></input>
                        <a href="" class="button-submit"> Komentari </a>
                    </div>
                </div>
        </div>
    </section>

</body>
</html>
