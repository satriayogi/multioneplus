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
                    <option value="">-- Choose City --</option>
                </select>
            </div>
            <!-- <div class="kode-pos">
                <label for="">Choose Courier</label><input type="text" name="kurir" id="kurir" class="kode-post"> -->
            </div>
            <div class="kode-pos">
                <label for="">Kode Pos</label><input type="text" name="kode_pos" id="" class="kode-post">
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
                <label for=""> Kode Kupon </label> <input type="text" name="kode_kupon" id=""> <button>Cek</button>
            </div>
            <div class="total-keseluruhan">
                <span>Subtotal Product</span><span>Rp. 100.000</span><br>
                <span>Total Ongkir</span><span id="ongkir">Rp. </span><br>
                <span>Biaya Penanganan</span><span>Rp. 5.000</span><br>
                <span>Total</span><span>Rp. 115.000</span>
                
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
                if (option === 0) {
                    alert(null);
                }else{
                    getOngkir(option);
                    // console.log(option);
                }

            });
            function getOngkir(getkota){
                var ongkir =$("#ongkir");
                $.getJSON('tarif')
            }

    });
</script>