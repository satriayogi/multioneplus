<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/customer/css/transaksi_checkout.css">
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-0IdvJ2XlaIh88B3K"></script>
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
        <form action="<?= base_url("transaksi_customer/save_transaksi") ?>" method="post">
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
                    <th>Ekspedisi:</th>
                </tr>
                <tr class="customer">
                    <td>
                        <span><?= $customer['nama'] ?></span> 
                        <input type="hidden" name="id_customer" value="<?= $customer['id'] ?>" id=""></td>
                    <td>
                        <span><?= $customer['no_tlp'] ?></span> 
                        <input type="hidden" name="" id=""></td>
                    <td>
                    <textarea name="alamat" id="" cols="20" rows="5"></textarea>
                    </td>
                    <td>
                        <input type="text" name="kodepos" id="" placeholder="enter codepost"></td>
                    <td>
                        <select name="provinsi" id="provinsi" class="option-provinsi">
                        <option disabled selected>-- Choose Province --</option>
                        </select> </td>
                    <td>
                    <select name="kota" id="kota" class="option-kota">
                    <option disabled selected>-- Choose City --</option>
                </select>
</td>
<td>
<select name="kurir" id="kurir" class="option-kota">
                    <option disabled selected>-- Choose Courier --</option>
                    <option >JNE</option>
                    <option >SiCepat</option>
                    <option >J&T</option>
                </select>
</td>
                    <td>
                    <select name="ekspedisi" id="ekspedisi" class="option-kota">
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
                        <input type="hidden" name="id_product" id="" value="<?= $value['id_product'] ?>">
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
                        <span><?= $value2['warna']; ?></span>
                        <input type="hidden" name="warna[]" value="<?= $value['warna'] ?>" id="">
                   <?php endforeach; ?>
                        </td>
                        <td>
                        <span><?= $value['harga'] ?></span>
                        <input type="hidden" name="harga" value="<?= $value['harga'] ?>" id=""></td>
                    <td>
                    <a href="<?= base_url('transaksi_customer/minkeranjang/'.$customer['id'].'/'.$value['id']) ?>" class="button-min"> <i class="fas fa-minus"></i> </a> <span style="padding-left:35px;">  <?= $value['pcs'] ?></span> 
                    <a href="<?= base_url('transaksi_customer/pluskeranjang/'.$customer['id'].'/'.$value['id']) ?>" class="button-plus" style="float:right;"> <i class="fas fa-plus"></i></a>
                        <input type="hidden" name="" id=""></td>
                    <td>
                        <span><?= $value['total'] ?></span>
                        <input type="hidden" name="" id=""></td>
                    <td>
                        <a href="<?= base_url('transaksi_customer/hapus_keranjang/'.$value['id'].'/'.$value['id_product'].'/'.$value['id_customer']) ?>"> <i class="fas fa-trash"></i> </a></td>
                  
                </tr>
                    <?php endforeach; ?>
               
            </table>
            <table style="float:right; margin-right: -10%;">
            <div class="transaksi">
                    <tr class="kupon">
                        <td colspan="7"> <span>Kode Kupon:</span> </td>
                        <td><input type="text" id="diskontext"  name=""> <button type="button" id="diskon">+</button></td>
                    </tr>
                    <tr class="tot-product">
                        <td colspan="7"><span>Total Product :</span> </td>
                        <td>
                        <?php $id_customer = $customer['id'];
                        $asd = $this->db->query("SELECT SUM(total) as jumlah from keranjang WHERE id_customer='$id_customer'")->row_array();
                        $axc = $this->db->query("SELECT SUM(pcs) as qty_jumlah from keranjang WHERE id_customer='$id_customer'")->row_array();
                        ?>    
                        
                        <input type="text" id="" readonly disabled value="<?= number_format($asd['jumlah'], 0, ',','.'); ?>">
                        <input type="hidden" name="total-product" id="total_product" readonly disabled value="<?= $asd['jumlah'] ?>">
                    </td>
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
                        <td><input type="text" name="discount" id="discount" value="0"> %
                        </td>
                    </tr>
                    <tr class="total">
                        <td colspan="7"><span>Total :</span></td>
                        <td><input type="text" name="total" id="total" value="0">
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
                        <button id="pay-button" type="submit" style=" width: 130px;
  padding: 10px 20px 10px;
  border-radius: 3px;
  margin-left: 5px;
  background-color: #19a95b;
  border:none;
  color: white;
  font-weight: 600;">Checkout</button>

            </div>
    
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
    $(document).ready(function(){
        var pro=$("#provinsi");
            $.getJSON('provinsi',function(data){
                $.each(data,function(i,field){
                    // console.log(field.province);
                    pro.append('<option value="'+field.province_id+'">'+field.province+'</option>');
                })
            });
            $("#provinsi").on("change",function(e){
                e.preventDefault();
                var option = $("option:selected",this).val();
                $("#kurir").val("");
                if (option === 0) {
                    alert("null");
                }else{
                    $("#kota").prop("disabled",false);
                    getKota(option);
                    // console.log(option);
                }
            });
            function getKota(getpro){
                var kota=$("#kota");
                $.getJSON('city/'+getpro,function(data){
                    $.each(data,function(i,field){
                        // console.log(field.city_name);
                        kota.append('<option value="'+field.city_id+'">'+field.city_name+'</option>');
                    })
                })
            }
            $("#kota").on("change",function(e){
                // alert("masuk");
                e.preventDefault();
                var option = $("option:selected",this).val();
                var qty = $("#qty").val();
                var provinsi = $("#provinsi").val();
                if (option === 0) {
                    alert(null);
                }else{
                    console.log(option,qty);
                    getOngkir(option,qty);
                }

            });
            function getOngkir(option,qty){
                var ongkir = $("#ongkir");
                var ekspedisi = $("#ekspedisi");
                var i="";
                var j="";
                var x="";
                $.getJSON("tarif/"+option+"/"+qty,function(data){
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
                var totalproduct = $("#total_product").val();
                var totalkeseluruhan = $("#total");
                ongkir.val(service);
                hargaongkir1.val(harga);
                hargaongkir.val(harga);
                // console.log(service,harga);
                var hasil = parseInt(harga ) + parseInt(totalproduct) ;
                // console.log(hasil);
                totalkeseluruhan.val(hasil);

            });
    });
</script>
<script>
    $("#diskon").on("click",function(){
    var kode_diskon = $("#diskontext").val();
    var diskon =$("#discount");
    var totalkeseluruhan = $("#total");
    var totalproduct = $("#total_product").val();
    var hargaongkir = $("#hargaongkir").val();
        // console.log(hargaongkir);
        if (hargaongkir === "0") {
            alert("Cek untuk pemilihan ekpedisi");
        }else{
            // alert(kode_diskon);
        $.ajax({
            method:'POST',
            url:"<?= base_url() ?>discount/json_diskon/"+kode_diskon,
            chache:false,
            dataType:'json',
            // data:"diskon="+kode_diskon,
            success:function (data){
                // console.log(data);
                diskon.val(data.potongan);
                hasil = parseInt(data.potongan) / 100 * parseInt(totalproduct);
                jumlah = totalproduct - hasil + parseInt(hargaongkir);
                console.log(jumlah);
                totalkeseluruhan.val(jumlah);
            }
            // console.log(url);
        });

        }
    });
</script>







<!-- midtrans -->
<!-- <script type="text/javascript">
  
  $('#pay-button').click(function (event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");
  $.ajax({
    url: '<?= base_url()?>/checkout/token',
    cache: false,

    success: function(data) {
      //location = data;

      console.log('token = '+data);
      
      var resultType = document.getElementById('result-type');
      var resultData = document.getElementById('result-data');

      function changeResult(type,data){
        $("#result-type").val(type);
        $("#result-data").val(JSON.stringify(data));
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

</script> -->
<!-- end midtrans -->