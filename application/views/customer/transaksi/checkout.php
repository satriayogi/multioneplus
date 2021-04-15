<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/customer/css/transaksi_checkout.css">
    <script type="text/javascript"
    src="https://app.midtrans.com/snap/snap.js"
            data-client-key="Mid-client-9OwE4jwH-GGHDT3x"></script>
<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
<style>
    .footer{
    height: 100px;
    background-color: #445555;
    width: 100%; 
  bottom: 0;
  left: 0;
  }
  .subfooter{
    width: 100%;
    margin: auto;
    margin-top: 1%;
  }
    .product td{
  padding-top: 5px;
  text-align:center;
}
.address {
    width: 80%;
    height: 40px;
    margin-left: 10%;
    float: left;
    padding-top: 25px;
}
.subfooter {
    width: 100%;
    margin: auto;
        margin-top: auto;
    margin-top: 20%;
}
.tot-pcs {
    text-align: end;
}
/* @media screen and (min-width:1086px){
    .table-container{
      width: 100%;
    }
    .table-checkout{
      width: 100%;
    }

  } */
  @media screen and (min-width:992px){
    footer{
        height: 110px;
        background-color: #445555;
        width: 100%;
        bottom: 0;
      }
      .table-container{
        width: 80%;
      }
      .table-checkout{
        width: 50%;
      }
    }
</style>
</head>
<body>
    


<!-- baru -->
 <!-- Navigation -->
 <section class="nav-section">
    <div class="full-container navigation">
      <div class="container">
        <img src="<?=  base_url() ?>assets/customer/img/logo-mutil-plus-one2.png" alt="logo">
        <ul class="nav">
          <li><a href=""> About MOP</a></li>
          <li><a href=""> Shop </a></li>
          <li><a href=""> Contact</a></li>
        </ul>
      </div>
    </div>
    <div class="container border-cont">
        <!-- <div class="border-container"> -->
        <form action="<?= base_url()?>buy/finish" id="payment-form" method="post">
        <input type="hidden" name="result_type" id="result-type" value="">
      <input type="hidden" name="result_data" id="result-data" value="">
            <div class="title-table">
                <span>your shopping cart</span>
                <img src="<?=  base_url() ?>assets/customer/img/logo-mutil-plus-one2.png" alt="">
            </div>
            <table class="table-container">
                <tr>
                    <th>Name:</th>
                    <th>No Telephone:</th>
                    <th>Alamat:</th>
                    <th>Kode Pos:</th>
                    <th>Provinsi:</th>
                    <th>Kota:</th>
                    <th>Courier:</th>
                    <th colspan="2">Ekspedisi:</th>
                </tr>
                <tr class="customer">
                    <td>
                        <span><?= $customer['nama'] ?></span> 
                        <input type="hidden" name="id_customer" value="<?= $customer['id'] ?>" id="id_customer"></td>
                        <input type="hidden" name="nama_customer" value="<?= $customer['nama'] ?>" id="nama_customer"></td>
                    <td>
                        <span><?= $customer['no_tlp'] ?></span> 
                        <input type="hidden" name="no_tlp" id="no_tlp" value="<?= $customer['no_tlp'] ?>"></td>
                        <input type="hidden" name="email" id="email" value="<?= $customer['email'] ?>"></td>
                    <td>
                    <textarea name="alamat" id="alamat" cols="20" rows="5"></textarea>
                    </td>
                    <td>
                        <input type="text" name="kodepos" id="kodepos" placeholder="enter codepost"></td>
                    <td>
                        <select  id="provinsi" class="option-provinsi">
                        <option disabled selected>-- Choose Province --</option>
                        </select> </td>
                    <td>
                    <select  id="kota" class="option-kota">
                    <option disabled selected>-- Choose City --</option>
                </select>
</td>
<td>
<select id="kurir" class="option-kota">
                    <option disabled selected>-- Choose Courier --</option>
                    <option data-kurir="jne">JNE</option>
                    <option data-kurir="pos">POS Indonesia</option>
                    <option data-kurir="tiki">TIKI</option>
                </select>
</td>
                    <td>
                    <select  id="ekspedisi" class="option-kota">
                    <option disabled selected>-- Choose City --</option>
                </tr>
</td>
                <tr>
                    <th colspan="2"> Nama Product</th>
                    <th>Gambar Product</th>
                    <th>Warna Product</th>
                    <th>Harga Product</th>
                    <th>Jumlah Product</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                <?php
                $id_customer = $customer['id'];
                $query = $this->db->query("SELECT * FROM product JOIN keranjang   WHERE id_customer='$id_customer' AND product.id=keranjang.id_product ")->result_array(); 
                foreach ($query as $key => $value) :
                ?>
                <tr class="product">
                    <td colspan="2">
                        <span><?= $value['nama_product'] ?></span>
                        <input type="hidden" name="id_product[]" id="id_product" value="<?= $value['id_product'] ?>">
                        <input type="hidden" name="id_keranjang[]" id="id_product" value="<?= $value['id'] ?>">
                    </td>
                    <td>
                        <?php
                        $id_product = $value['id_product'];
                        $gambar = $this->db->query("SELECT * FROM gambar WHERE gambar.id_product='$id_product'")->row_array();
                        ?>
                        <img src="<?= base_url("assets/admin/img/product/".$gambar['gambar']) ?>" alt="" style="width:100px;heihgt:100px; padding:0px;"> </td>
                    <td>
                        <?php 
                        $id_keranjang = $value['id'];
                        $query2 = $this->db->query("SELECT * FROM keranjang JOIN keranjang_warna WHERE keranjang_warna.id_keranjang='$id_keranjang' AND keranjang.id=keranjang_warna.id_keranjang")->result_array();
                        foreach ($query2 as $key => $value2) :?>
                        <style>
                            .kotak-warna{
                                width:20px;
                                height:20px; 
                                display:inline-block;
                            }
                        </style>
                        <span> <div class="kotak-warna" style="background-color:<?= $value2['warna'] ?>; "></div> </span>
                        <!-- <input type="checkbox" name="warna[]" id=""> -->
                        <input type="hidden" name="warna[]" id="warna" value="<?= $value2['warna'] ?>" id="">
                   <?php endforeach; ?>
                        </td>
                        <td>
                        <span><?= $value['harga'] ?></span>
                        <input type="hidden" name="harga[]" id="harga" value="<?= $value['harga'] ?>" id=""></td>
                    <td>
                    <a href="<?= base_url('transaksi_customer/minkeranjang/'.$customer['id'].'/'.$value['id']) ?>" class="button-min"> <i class="fas fa-minus"></i> </a> <span style="padding-left:35px;">  <?= $value['pcs'] ?></span> 
                    <a href="<?= base_url('transaksi_customer/pluskeranjang/'.$customer['id'].'/'.$value['id']) ?>" class="button-plus" style="float:right;"> <i class="fas fa-plus"></i></a>
                        <input type="hidden" name="qty1[]" id="qty1" value="<?= $value['pcs'] ?>" id=""></td>
                    <td>
                        <span><?= $value['total'] ?></span>
                        <input type="hidden" name="totalproduct[]" id="totalproduct" value="<?= $value['total'] ?>" id=""></td>
                    <td>
                        <a href="<?= base_url('transaksi_customer/hapus_keranjang/'.$value['id'].'/'.$value['id_product'].'/'.$value['id_customer']) ?>"> <i class="fas fa-trash"></i> </a></td>
                  
                </tr>
                    <?php endforeach; ?>
               
            </table>
            <table style="float:right; margin-right: -10%;" class="table-checkout">
            <div class="transaksi">
                    <tr class="kupon">
                        <td colspan="7"> <span>Kode Kupon:</span> </td>
                        <td><input type="text" id="diskontext"  name="diskontext" style="width:44.7%"> <button type="button" id="diskon" style="width:40px;">+</button></td>
                    </tr>
                    <tr class="tot-product">
                        <td colspan="7"><span>Total Product :</span> </td>
                        <td>
                        <?php $id_customer = $customer['id'];
                        $asd = $this->db->query("SELECT SUM(total) as jumlah from keranjang WHERE id_customer='$id_customer'")->row_array();
                        $axc = $this->db->query("SELECT SUM(pcs) as qty_jumlah from keranjang WHERE id_customer='$id_customer'")->row_array();
                        ?>    
                        
                        <input type="text" id="" readonly disabled value="<?= number_format($asd['jumlah'], 0, ',','.'); ?>">
                        <input type="hidden" name="total_product" id="total_product"  value="<?= $asd['jumlah'] ?>">
                    </td>
                    <tr class="tot-pcs">
                    <td colspan="7"><span>Total PCS :</span></td>
                    <td>
                    <input type="text" name="pcs" value="<?= $axc['qty_jumlah']; ?>" id="">
                    </td>
                    </tr>
                    </tr>
                    <tr class="ongkir">
                        <td colspan="7"><span>Ongkis Kirim :</span></td>
                        <td>
                            <input type="text"  name="hargaongkir1" id="hargaongkir1" value="0">
                            <input type="hidden"  name="hargaongkir" id="hargaongkir" value="0">
                            <input type="hidden" name="ongkir" id="ongkos">
                            <input type="hidden" name="qty" id="qty" value="<?= $axc['qty_jumlah'] ?>">
                        </td>
                    </tr>
                    <tr class="pajak">
                        <td colspan="7"><span>Biaya Penanganan :</span></td>
                        <td>
                        </td>
                    </tr>
                    <tr class="diskon">
                        <td colspan="7"><span>Discount :</span></td>
                        <td><input type="text" name="" id="discount" value="0" style="width:51.2%;"> %
                        <td><input type="hidden" name="discount" id="discount1" value="0" style="width:77.5%;"> 
                        </td>
                    </tr>
                    <tr class="total">
                        <td colspan="7"><span>Total :</span></td>
                        <td><input type="text" name="" id="total" value="0">
                        </td>
                    </tr>
                    <tr class="bayar">
                    </tr>
                </div>
            </table>
            <div class="chart" style="float:right; margin-top:5px; margin-bottom:20px; margin-right: -10%;">
                        <a href="" class="btn-chart1" style="width: 50px;
  text-decoration: none;
  padding: 10px;
  border-radius: 3px;
  background-color: #f1f1f1;
  color: black;
  font-weight: 600;">Buy Again</a> 

                        <button type="button" id="pay-button" style=" width: 130px;
  padding: 10px 20px 10px;
  border-radius: 3px;
  margin-left: 5px;
  background-color: #19a95b;
  border:none;
  color: white;
  font-weight: 600;">Checkout</button>
            </div>
            <input type="hidden" name="provinsi" id="provinsi1">
            <input type="hidden" name="kota" id="kota1">
            <input type="hidden" name="ekpedisi" id="ekpedisi1">
            <input type="hidden" name="kurirr" id="kurirr">
            <input type="hidden" name="totalseluruh" id="totseluruh">
            <!-- <input type="hidden" name="totalseluruh" id="totseluruh" value=""> -->
    
        </form>
    <!-- </div> -->
</div>
</section>
<!-- Footer -->
<div class="footer">
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
                        </div>
<!-- end baru -->





</body>
</html>
<script>
$('#pay-button').click(function (event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");
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
                // console.log(service,harga);
                var hasil = parseInt(harga ) + parseInt(totalproduct) ;
                // console.log(hasil);
                totalkeseluruhan.val(hasil);
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
                totalkeseluruhan.val(jumlah);
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