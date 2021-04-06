<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/customer/css/transaksi_checkout.css">

</head>
<body>
    


<!-- baru -->
 <!-- Navigation -->
 <section class="nav-section">
    <div class="full-container navigation">
      <div class="container">
        <img src="https://www.multioneplus.com/template/s150319001001/images/logo-mutil-plus-one2.png" alt="logo">
        <ul class="nav">
          <li><a href=""> About MOP</a></li>
          <li><a href=""> Shop </a></li>
          <li><a href=""> Contact</a></li>
        </ul>
      </div>
    </div>
    <div class="container border-cont">
        <!-- <div class="border-container"> -->
        <form action="" method="post">
            <div class="title-table">
                <span>your shopping cart</span>
                <img src="img/logo-mutil-plus-one2.png" alt="">
            </div>
            <table class="table-container">
                <tr>
                    <th>Name:</th>
                    <th>No Telephone:</th>
                    <th>Alamat:</th>
                    <th>Kode Pos:</th>
                    <th>Provinsi:</th>
                    <th>Kota:</th>
                    <th>Ekspedisi:</th>
                </tr>
                <tr class="customer">
                    <td>
                        <span><?= $customer['nama'] ?></span> 
                        <input type="hidden" name="" id=""></td>
                    <td>
                        <span><?= $customer['no_tlp'] ?></span> 
                        <input type="hidden" name="" id=""></td>
                    <td>
                        <span><?= $customer['alamat'] ?></span> 
                        <input type="hidden" name="" id=""></td>
                    <td>
                        <span><?= $customer['kodepos'] ?></span> 
                        <input type="hidden" name="" id=""></td>
                    <td>
                        <select name="provinsi" id="provinsi" class="option-provinsi">
                        <option disabled selected>-- Choose Province --</option>
                        </select> </td>
                    <td>
                    <select name="kota" id="kota" class="option-kota">
                    <option disabled selected>-- Choose City --</option>
                </select>
                    <td>
                    <select name="ekspedisi" id="ekspedisi" class="option-kota">
                    <option disabled selected>-- Choose City --</option>
                </tr>
                
                <tr>
                    <th colspan="2">Nama Product</th>
                    <th colspan="2">Gambar Product</th>
                    <th>Warna Product</th>
                    <th >Harga Product</th>
                    <th>Jumlah Product</th>
                </tr>
                <?php
                $id_customer = $customer['id'];
                $query = $this->db->query("SELECT * FROM product JOIN keranjang   WHERE id_customer='$id_customer' AND product.id=keranjang.id_product ")->result_array(); 
                foreach ($query as $key => $value) :
                ?>
                <tr class="product">
                    <td colspan="2">
                        <span><?= $value['nama_product'] ?></span>
                        <input type="hidden" name="" id=""></td>
                    <td colspan="2">
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
                        <input type="hidden" name="" id=""></td>
                   <?php endforeach; ?>
                        <td>
                        <span><?= $value['harga'] ?></span>
                        <input type="hidden" name="" id=""></td>
                    <td>
                        <span><?= $value['total'] ?></span>
                        <input type="hidden" name="" id=""></td>
                </tr>
                    <?php endforeach; ?>
                <div class="transaksi">
                    <tr class="kupon">
                        <td colspan="6"> <span>Kode Kupon:</span> </td>
                        <td><input type="text" id="diskontext"  name=""> <button type="button" id="diskon">+</button></td>
                    </tr>
                    <tr class="tot-product">
                        <td colspan="6"><span>Total Product :</span> </td>
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
                        <td colspan="6"><span>Ongkis Kirim :</span></td>
                        <td>
                            <input type="text"  name="hargaongkir" id="hargaongkir">
                            <input type="hidden" name="ongkir" id="ongkos">
                            <input type="hidden" name="qty" id="qty" value="<?= $axc['qty_jumlah'] ?>">
                        </td>
                    </tr>
                    <tr class="pajak">
                        <td colspan="6"><span>Biaya Penanganan :</span></td>
                        <td>
                        </td>
                    </tr>
                    <tr class="diskon">
                        <td colspan="6"><span>Discount :</span></td>
                        <td><input type="text" name="discount" id="discount" value="0"> %
                        </td>
                    </tr>
                    <tr class="total">
                        <td colspan="6"><span>Total :</span></td>
                        <td><input type="text" name="total" id="total" value="0">
                        </td>
                    </tr>
                    <tr class="bayar">
                        <td colspan="7"><button>Buy!</button></td>
                    </tr>
                </div>
            </table>
    
        </form>
    <!-- </div> -->
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
                var option = $(this.options[this.selectedIndex]);
                var service = option.attr('data-name');
                var harga = option.attr('data-harga');
                var total = $("#totalharga").val();
                var subtotal = $("#subtotal").val();
                var penanganan = $("#penanganan").val();
                var totalproduct = $("#total_product").val();
                var totalkeseluruhan = $("#total");
                ongkir.val(service);
                hargaongkir.val(harga);
                // console.log(service,harga);
                var hasil = parseInt(harga ) + parseInt(totalproduct) ;
                // console.log(hasil);
                totalkeseluruhan.val(hasil);

            });
    });
</script>
<script>
    var kode_diskon = $("#diskontext");
    var diskon =$("#discount");
    var totalkeseluruhan = $("#total");
    var totalproduct = $("#total_product").val();
    $("#diskon").on("click",function(){
        $.ajax({
            method:'POST',
            url:"<?= base_url() ?>discount/json_diskon/",
            chache:false,
            dataType:'json',
            data:"diskon="+kode_diskon,
            success:function (data){
                diskon.val(data.potongan);
                hasil = parseInt(data.potongan) / 100 * parseInt(totalproduct);
                jumlah = totalproduct - hasil ;
                console.log(jumlah);
                totalkeseluruhan.val(jumlah);
            }
        });
    });
</script>