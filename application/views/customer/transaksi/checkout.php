<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
</head>
<body>
    <form action="" method="post">
        <div class="alamat">
            <div class="alamat">
               <label for="" class="label"> alamat </label><textarea name="alamat" id="" class="text-alamat"></textarea>
            </div>
            <div class="provinsi">
               <label for=""> provinsi </label><select name="provinsi" id="provinsi" class="option-provinsi">
                   <option disabled selected>-- Choose Province --</option>
               </select>
            </div>
            <div class="kota">
                <label for=""> Kota </label><select name="kota" id="kota" class="option-kota">
                    <option disabled selected>-- Choose City --</option>
                </select>
            </div>
            <!-- <div class="kode-pos">
                <label for="">Choose Courier</label><input type="text" name="kurir" id="kurir" class="kode-post"> -->
            </div>
            <div class="kode-pos">
                <label for="">Kode Pos</label><input type="text" name="kode_pos" id="" class="kode-post">
            </div>
            <div class="ekspedisi">
                <label for="">Pilih ekspedisi</label><select name="ekspedisi" id="ekspedisi" class="option-kota">
                    <option disabled selected>-- Choose City --</option>
            </div>
            <button>Ubah Alamat</button>
        </div>
        <div class="produk">
           <img src="img/masker-6.png" alt="test gambar"><br>
           <span for="">Nama Product</span><br>
           <span for="">Warna Product</span><br>
           <span for="">Harga Product</span><br>
           <span for="">Jumlah Product  </span>
           <input type="hidden" name="asd" id="qty" value="3">
            <!-- jangan di hapus -->
            <!-- <input type="text" name="nama_product" id=""> 
            <input type="text" name="warna-product" id="">
            <input type="text" name="harga" id="">
            <input type="text" name="jumlah" id=""> -->
        </div>
        <div class="transaksi">
            <div class="kupon">
                <label for=""> Kode Kupon </label> <input type="text" name="kode_kupon" id=""> <button type="button" >Cek</button>
            </div>
            <div class="total-keseluruhan">
                <span>Subtotal Product</span><span>Rp. <input type="text" name="subtotal" id="subtotal" value="100000"></span><br>
                <span>Total Ongkir</span><span id="ongkir">Rp. <input type="text" name="ongkir" id="ongkos"></span><br>
                <input type="text" name="hargaongkir" id="hargaongkir">
                <span>Biaya Penanganan</span><span>Rp. <input type="text" name="penanganan" id="penanganan"> </span><br>
                <span>Total</span><span>Rp. <input type="text" name="totalharga" id="totalharga" > </span>
                
                <!-- jangan di hapus -->
                <!-- <input type="text" name="total_product" id="">
                <input type="text" name="total_ongkir" id="">
                <input type="text" name="total_penanganan" id="">
                <input type="text" name="total_keseluruhan" id=""> -->
            </div>
<div class="bayar">
    <button>Checkout</button>
</div>
        </div>
    </form>
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
                ongkir.val(service);
                hargaongkir.val(harga);
                // console.log(service,harga);
                var jumlah = parseInt(harga) + parseInt(subtotal) ;
                console.log(jumlah);
            });
    });
</script>