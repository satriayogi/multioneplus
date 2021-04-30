<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="<?= base_url() ?>assets/customer/css/keranjang-MOP.css">
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-server-JxcoOpQw8TxjcCBt8mgspLwu"></script>
<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
    <title>Keranjang </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<style>
    
/*footer START*/

.footer{
    height: 110px;
    background-color: #445555;
    width: 100%;
  }
  .footer-img{
    width: 150px;
    float: left;
    display: inline-block;
  }
  .subfooter{
    width: 100%;
    margin: auto;
    margin-top: 1%;
  }
  .address{
  width: 80%;
  height: 40px;
  float: left;
  }
  .company-addres1{
    display: inline-block;
    margin-left: 35px ;
  }
  
  .company {
    color: #dadddd;
  }
  .company-address{
    color: #5d6c6c;
    font-size: 12px;
    width: 55%;
  }
  .img-footer{
    width: 100%;
    display: inline-block;
  }
  .copyright {
    width: 80%;
    margin-bottom: 1%;
    text-align: end;
    color: #dadddd;
    font-size: 12px;
    padding-top: 9px;
  }
  .copyright a{
    color: #148b4d;
    text-decoration: none;
  }

  /*footer END*/
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5">
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
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="<?= base_url() ?>assets/customer/img/profile.png" style="width:30px;height:30px;" alt="">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?= base_url('profile/index') ?>">Profile</a>
          <a class="dropdown-item" href="<?= base_url('transaksi_customer/riwayat_transaksi') ?>">Riwayat Transaksi</a>
          <a class="dropdown-item" href="#">Change Password</a>
          <a class="dropdown-item" href="<?= base_url('loginc/logout_customer') ?>">Logout</a>
        </div>
      </li>
    </ul>
  </div>
       </div>
</nav>
    <section>
        <!-- Data Pemebeli -->
        
        <form action="<?= base_url()?>buy/finish" id="payment-form" method="post">
        <input type="hidden" name="result_type" id="result-type" value="">
      <input type="hidden" name="result_data" id="result-data" value="">
        <div class="alamat">
            <h2>Alamat Penerima</h2>
            <a href="" style="padding: 5px;
border-radius: 10px;
border: none;
width: 20%;
background: #1ba95d;
color: white;
margin-left: 20px;"> Edit Alamat</a>
         </div>
         
         <input type="hidden" name="id_customer" value="<?= $customer['id'] ?>" id="id_customer">
         <input type="hidden" name="nama_customer" value="<?= $customer['nama'] ?>" id="nama_customer">
         <input type="hidden" name="no_tlp" id="no_tlp" value="<?= $customer['no_tlp'] ?>">
         <input type="hidden" name="email" id="email" value="<?= $customer['email'] ?>">
        <table>
            <tr>
                <td> Nama </td>
                <td> Satria</td>
            </tr>
            <tr> 
               <td>No Telepon</td> 
                <td> 0812 1234 1234</td>
            </tr>
            <tr>
                <td> Alamat </td>
                <td> <textarea name="alamat" id="alamat" cols="30" rows="3" required></textarea></td>
            </tr>
            <tr>
                <td> Kode Pos </td>
                <td> <input type="text" name="kodepos" id="kodepos" placeholder="enter codepost" required></td>
            </tr>
            <tr> 
               <td>Provinsi</td> 
                <td> <select  id="provinsi" class="option-provinsi">
                        <option disabled selected>-- Choose Province --</option>
                        </select></td>
            </tr>
            <tr>
                <td>Kota</td>
                <td> <select  id="kota" class="option-kota">
                        <option disabled selected>-- Choose Province --</option>
                        </select></td>
            </tr>
            <tr>
                <td>Jasa Ekspedisi</td>
                <td>
                    <select id="kurir" class="option-kota">
                    <option disabled selected>-- Choose Courier --</option>
                    <option data-kurir="jne">JNE</option>
                    <option data-kurir="pos">POS Indonesia</option>
                    <option data-kurir="tiki">TIKI</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jasa Paket</td>
                <td> <select  id="ekspedisi" class="option-kota">
                    <option disabled selected>-- Choose City --</option></td>
            </tr>
        </table>


        <!-- Keranjang -->
        <div class="keranjang">
            <h2> Keranjang</h2>

            <!-- NAMA DAN DETAIL PRODUK START -->
            <?php 
            $id_customer = $customer['id'];
            $query = $this->db->query("SELECT *,keranjang.id FROM keranjang,product  WHERE keranjang.id_customer='$id_customer' AND product.id=keranjang.id_product")->result_array(); 
            
            foreach ($query as $key => $value) :
            ?>
            <div class="keranjang-flex">
                <div class="foto-produk">
                <?php
                        $id_product = $value['id_product'];
                        $gambar = $this->db->query("SELECT * FROM gambar WHERE gambar.id_product='$id_product'")->row_array();
                        ?>
                        <?php
                        $id_product = $value['id_product'];
                        $colorstyle = $value['warna']; 
                        $query2 = $this->db->query("SELECT *,warna.id FROM warna JOIN style_warna WHERE id_product='$id_product' AND style_warna.warna='$colorstyle' AND warna.id_stylecolor=style_warna.id ")->row_array();
                         ?>
                        <input type="hidden" name="id_product[]" id="id_product" value="<?= $value['id_product'] ?>">
                        <input type="hidden" name="id_keranjang[]" id="id_product" value="<?= $value['id'] ?>">
                        <input type="hidden" name="harga[]" id="harga" value="<?= $value['harga'] ?>" id="">
                        <input type="hidden" name="qty1[]" id="qty1" value="<?= $value['pcs'] ?>" id="">
                        <input type="text" name="stok[]" id="stok" value="<?= $query2['stok'] - $value['pcs'] ?>" id="">
                        <input type="text" name="idwarna[]" id="stok" value="<?= $query2['id'] ?>" id="">
                        <input type="hidden" name="totalproduct[]" id="totalproduct" value="<?= $value['total'] ?>" id="">
                            <img src="<?= base_url() ?>assets/admin/img/product/<?= $gambar['gambar'] ?>" width="100%" alt="">
                </div>

                <div class="detail-keranjang">
                    <div class="detail-produk">
                    <h3> <?= $value['nama_product'] ?></h3>
                    <span> Pembelian:<a href="<?= base_url('transaksi_customer/minkeranjang/'.$customer['id'].'/'.$value['id']) ?>" style="background-color: #e2e2e2; text-decoration:none; margin-right:4px;
    padding: 5px;
    border: none ;
    border-radius: 5px;"> - </a>  <?= $value['pcs'] ?> <a href="<?= base_url('transaksi_customer/pluskeranjang/'.$customer['id'].'/'.$value['id']) ?>" style="background-color: #e2e2e2; text-decoration:none;
    padding: 5px;
    border: none ;
    border-radius: 5px;"> + </a> Pieces 
                        | Sisa Produk: 10</span>
                        <div class="change-color">
                       
                     <div class="color" style="background: <?= $value['warna'] ?>;">  </div> 
                     
                     <input type="text" name="warna[]" id="warna" value="<?= $value['warna'] ?>" id="">
                     <input type="hidden" name="id_warna[]" id="warna" value="<?= $query2['id_stylecolor'] ?>" id="">
                    </div><br>
                    <textarea name="catatan[]" id="" cols="40" rows="3"><?= $value['catatan'] ?></textarea>
                    </div>
                    <div class="total-produk">
                    <span>Total Belanja</span>
                    <h3> Rp <?= number_format($value['total'], 0, ',','.'); ?></h3>
                    <a href="<?= base_url('transaksi_customer/hapus_keranjang/'.$value['id'].'/'.$value['id_product'].'/'.$value['id_customer']) ?>" style="background-color: #e2e2e2;
    padding: 5px;
    border: none ;
    border-radius: 5px; color:black;"> <i class="fas fa-trash"></i> </a></div>
                    </div>

            </div>
            <?php endforeach; ?>
            <!-- NAMA DAN DETAIL PRODUK END -->
                <?php 
                $axc = $this->db->query("SELECT SUM(pcs) as qty_jumlah from keranjang WHERE id_customer='$id_customer'")->row_array();
                ?>
            
            <input type="hidden" name="qty" id="qty" value="<?= $axc['qty_jumlah'] ?>">
<!-- Checkout -->
<div class="checkout">
                <table>
                    <tr>
                        <td> Kode Kupon:</td> <td><input type="text" name="diskontext" id="diskontext">  <button style="width: 30px; height: 100%; background-color: #1ba95d; border: none;color: white;" type="button" id="diskon" >+</button></td>
                    </tr>
                    <?php $id_customer = $customer['id'];
                        $asd = $this->db->query("SELECT SUM(total) as jumlah from keranjang WHERE id_customer='$id_customer'")->row_array();
                        $axc = $this->db->query("SELECT SUM(pcs) as qty_jumlah from keranjang WHERE id_customer='$id_customer'")->row_array();
                        ?>   
                    <tr>
                        <td> Total Belanja:</td> <td> Rp <?= $asd['jumlah'] ?></td>
                    </tr>
                    <tr>
                        <td>Total PCS:</td> <td><?= $axc['qty_jumlah'] ?></td>
                    </tr>
                    <tr>
                        <td>Ongkos Kirim</td> <td><p id="ongkirharga">0</p>
                            <input type="hidden"  name="hargaongkir" id="hargaongkir" value="0">
                            <input type="hidden" name="ongkir" id="ongkos">
                            
                        <input type="hidden" name="total_product" id="total_product"  value="<?= $asd['jumlah'] ?>">
                        <input type="hidden" name="qty" id="qty" value="<?= $axc['qty_jumlah'] ?>"></td>
                        <input type="hidden" name="pcs" value="<?= $axc['qty_jumlah']; ?>" id="">
                    </tr>
                    <!-- <tr>
                        <td>Biaya Penanganan</td> <td>13.000</td>
                    </tr> -->
                    <tr>
                        <td>Discount</td> <td style="color: green;"> <p id="diskont">Rp. 0</p>
                        <input type="hidden" name="discount" id="discount1" value="0" style="width:77.5%;"> 
                    </td>
                    </tr>
                    <tr>
                        <td> Total </td> <td> <h2 id="total">Rp <?= $asd['jumlah'] ?></h2> </td>
                        <input type="hidden" name="" id="total" value="0">
                    </tr>
                    <tr></tr>
                </table> 
                <input type="hidden" name="provinsi" id="provinsi1">
            <input type="hidden" name="kota" id="kota1">
            <input type="hidden" name="ekpedisi" id="ekpedisi1">
            <input type="hidden" name="kurirr" id="kurirr">
            <input type="hidden" name="totalseluruh" id="totseluruh">
                <button class="button-checkout" id="pay-button"> Checkout</button> 
            </div>
        </div>
        </form>
        </div>
    </section>
    <!-- Footer -->
<footer id="sticky-footer" class="py-5 text-white-50" style=" background-color:#445555;  margin-bottom:-10px;">
        <div class="container subfooter" style="margin-top: 0%;">
            <div class="address">
                <img src="<?= base_url() ?>assets/customer/img/logo-mutil-plus-one1 (1).png" alt="" class="footer-img">
                <div class="company-addres1" style="margin-left: 15px;">
                    <p class="company" style="margin-bottom:0px;">PT. MULTI ONE PLUS</p>
                    <p class="company-address">Jl.Barokah, Kp Parungdengdek, No.09 Kelurahan Wanaherang, Kec. Gunung Putri, Kab.Bogor Provinsi, Jawa Barat</p>
                </div>
            </div>

        </div>
        <p class="copyright">&copy; 2020 PT MULTI ONE PLUS, Proudly created by <a href=""> MIACOMPANY.ID </a></p>
    </footer>
<!-- end baru -->
</body>
</html>
<script>
$('#pay-button').click(function (event) {
    event.preventDefault();
    // $(this).attr("disabled", "disabled");
    // var totalseluruh = $("#totseluruh").val();
    var nama_customer = $("#nama_customer").val();
    var no_tlp = $("#no_tlp").val();
    var email = $("#email").val();
    var alamat = $("#alamat").val();
    var kodepos = $("#kodepos").val();
    var kota1 = $("#kota1").val();
    var hargaongkir = $("#hargaongkir").val();
    var totalseluruh  = $("#totseluruh").val();
    var total_product = $("#total_product").val();
    // baru
    var discount = $("#discount1").val();
    var id_customer = $("#id_customer").val();
    var provinsi1 = $("#provinsi1").val();
    var ekpedisi1 = $("#ekpedisi1").val();
    var kurirr = $("#kurirr").val();
    // produk
    var product = $("#id_product").val();
    var hargaproduct= $("#harga").val();
    var qty1 = $("#qty1").val();
    var totalproduct = $("#totalproduct").val();

    // warna
    var warna = $("#warna").val();
    // console.log(totalproduct);
  $.ajax({
    type:'POST',
    url: '<?= base_url()?>buy/token',
    data:{
        nama_customer:nama_customer,
        no_tlp:no_tlp,
        email:email,
        alamat:alamat,
        kodepos:kodepos,
        kota1:kota1,
        hargaongkir:hargaongkir,
        totalseluruh:totalseluruh,
        total_product:total_product,
        discount:discount,
        id_customer:id_customer,
        provinsi1:provinsi1,
        ekpedisi1:ekpedisi1,
        kurirr:kurirr,
        product:product,
        hargaproduct:hargaproduct,
        qty1:qty1,
        totalproduct:totalproduct,
        warna:warna,
    },
    cache: false,

    success: function(data) {
      //location = data;

      console.log('token = '+data);
      
      var resultType = document.getElementById('result-type');
      var resultData = document.getElementById('result-data');

      function changeResult(type,data){
        $("#result-type").val(type);
        $("#result-data").val(data.order_id);
        //resultType.innerHTML = type;
        //resultData.innerHTML = JSON.stringify(data);
      }

      snap.pay(data, {
        onSuccess: function(result){
          changeResult('success', result);
          console.log(result.status_message);
          console.log(result);
          $("#payment-form").submit();
        },
        onPending: function(result){
          changeResult('pending', result);
          console.log(result.status_message);
          $("#payment-form").submit();
        },
        onError: function(result){
          changeResult('error', result);
          console.log(result.status_message);
          $("#payment-form").submit();
        }
      });
    }
  });
});
</script>
<script>
    $(document).ready(function(){
        var pro=$("#provinsi");
            $.getJSON('provinsi',function(data){
                $.each(data,function(i,field){
                    // console.log(field.province);
                    pro.append('<option data-id="'+field.province_id+'" data-name="'+field.province+'">'+field.province+'</option>');
                })
            });
            $("#provinsi").on("change",function(e){
                e.preventDefault();
                var option = $(this.options[this.selectedIndex]);
                    var provinsi = option.attr('data-name');
                    var provinsi_id = option.attr('data-id');
                    var provalue = $("#provinsi1");
                // $("#kurir").val("");
                if (option === 0) {
                    alert("null");
                }else{
                    $("#kota").prop("disabled",false);
                    $("#kota option:gt(0)").remove();
                    getKota(provinsi_id);
                    provalue.val(provinsi);
                    // console.log(option);
                }
            });
            function getKota(getpro){
                var kota=$("#kota");
                $.getJSON('city/'+getpro,function(data){
                    $.each(data,function(i,field){
                        console.log(field.city_name);
                        kota.append('<option data-id="'+field.city_id+'" data-name="'+field.city_name+'" value="'+field.city_id+'">'+field.city_name+'</option>');
                    })
                })
            }
            $("#kota").on("change",function(e){
                // alert("masuk");
                e.preventDefault();
                var option = $(this.options[this.selectedIndex]);
                var kota = option.attr("data-name");
                var kota_id = option.attr("data-id");
                var kota1 = $("#kota1");
                var qty = $("#qty").val();
                var provinsi = $("#provinsi").val();
                if (option === 0) {
                    alert(null);
                }else{
                    console.log(option,qty);
                    kota1.val(kota);
                    getKur(kota_id);
                    // getOngkir(kota_id,qty);
                }

            });
            function getKur(kota_id){
            $("#kurir").on("change",function(e){
                e.preventDefault();
                var option = $(this.options[this.selectedIndex]);
                var kurir = option.attr("data-kurir");
                var kota = option.attr("value");
                var kurirr = $("#kurirr");
                var qty = $("#qty").val();
                if (option === 0) {
                    alert(null);
                }else{
                    kurirr.val(kurir);
                $("#ekspedisi option:gt(0)").remove();
                getOngkir(kota_id,qty,kurir);
                }
            });
            }
            function getOngkir(option,qty,kurir){
                var ongkir = $("#ongkir");
                var ekspedisi = $("#ekspedisi");
                var i="";
                var j="";
                var x="";
                $.getJSON("tarif/"+option+"/"+qty+"/"+kurir,function(data){
                    $.each(data,function(i,field){
                        for(i in field.costs){
                            var ka= field.costs[i];
                            for(j in ka.cost){
                                x += '<option data-name="'+ka.service+'" data-harga="'+ka.cost[j].value+'"> <label> nama Ekspedisi :'+ka.description+'('+ka.service+') <br> harga : '+ka.cost[j].value+' <br> estimasi :'+ka.cost[j].etd+' </label></option>';
                            }
                        }
                        ekspedisi.append(x);
                    });
                });
            }
            $("#ekspedisi").on("change",function(e){
                e.preventDefault();
                var ongkir =$("#ongkos");
                var ongkiir= $("#ongkirharga");
                var hargaongkir = $("#hargaongkir");
                var hargaongkir1 = $("#hargaongkir1");
                var option = $(this.options[this.selectedIndex]);
                var service = option.attr('data-name');
                var harga = option.attr('data-harga');
                var total = $("#totalharga").val();
                var subtotal = $("#subtotal").val();
                var penanganan = $("#penanganan").val();
                var ekpedisi = $("#ekpedisi1");
                var totalproduct = $("#total_product").val();
                var totalkeseluruhan = $("#total");
    var totalseluruh = $("#totseluruh");
                ongkir.val(service);
                hargaongkir1.val(harga);
                hargaongkir.val(harga);
                ekpedisi.val(service);
                ongkiir.text(harga);
                // console.log(service,harga);
                var hasil = parseInt(harga) + parseInt(totalproduct) ;
                console.log(hasil);
                totalkeseluruhan.text("Rp "+hasil);
                totalseluruh.val(hasil);

            });
    });
</script>
<script>
    $("#diskon").on("click",function(){
    var diskontext = $("#diskontext").val();
    var diskon =$("#discount");
    var totalkeseluruhan = $("#total");
    var totalseluruh = $("#totseluruh");
    var totalproduct = $("#total_product").val();
    var hargaongkir = $("#hargaongkir").val();
    var discount1 = $("#discount1");
        // console.log(hargaongkir);
        if (hargaongkir === "0") {
            alert("Cek untuk pemilihan ekpedisi");
        }else{
            // alert(kode_diskon);
        $.ajax({
            method:'POST',
            url:"<?= base_url() ?>discount/json_diskon/",
            chache:false,
            dataType:'json',
            data:{diskontext:diskontext},
            success:function (data){
                console.log(data);
                diskon.val(data.potongan);
                hasil = parseInt(data.potongan) / 100 * parseInt(totalproduct);
                jumlah = totalproduct - hasil + parseInt(hargaongkir);
                console.log(jumlah);
                totalseluruh.val(jumlah);
                discount1.val(hasil);
                totalkeseluruhan.text("Rp ",jumlah);
            }
            // console.log(url);
        });

        }
    });
</script>

<script>
    $("#diskontext").keypress(function(e){
    if (e.keyCode === 13) {
        e.preventDefault();
        $("#diskon").click();
        
    }
    // alert("asda");
    });
</script>
<script>
    $("#diskon").on("click",function(){
    var diskontext = $("#diskontext").val();
    var diskon =$("#discount");
    var totalkeseluruhan = $("#total");
    var totalseluruh = $("#totseluruh");
    var totalproduct = $("#total_product").val();
    var hargaongkir = $("#hargaongkir").val();
    var discount1 = $("#discount1");
    var discountt = $("#diskont");
        // console.log(hargaongkir);
        if (hargaongkir === "0") {
            alert("Cek untuk pemilihan ekpedisi");
        }else{
            // alert(kode_diskon);
        $.ajax({
            method:'POST',
            url:"<?= base_url() ?>discount/json_diskon/",
            chache:false,
            dataType:'json',
            data:{diskontext:diskontext},
            success:function (data){
                console.log(data);
                diskon.val(data.potongan);
                hasil = parseInt(data.potongan) / 100 * parseInt(totalproduct);
                jumlah = totalproduct - hasil + parseInt(hargaongkir);
                console.log(jumlah);
                totalseluruh.val(jumlah);
                discount1.val(hasil);
                totalkeseluruhan.text("Rp "+jumlah);
                discountt.text("Rp "+hasil);
            }
            // console.log(url);
        });

        }
    });
</script>

<script>
    $("#diskontext").keypress(function(e){
    if (e.keyCode === 13) {
        e.preventDefault();
        $("#diskon").click();
        
    }
    // alert("asda");
    });
</script>