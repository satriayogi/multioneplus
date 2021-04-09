<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url(); ?>assets/customer/css/transaksi_checkout.css">
<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript"
    src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-0IdvJ2XlaIh88B3K"></script>
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
    </style>
</head>
<body>
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
                    <th>Courier:</th>
                    <th>Ekspedisi:</th>
                </tr>
                <?php
                $id_customer = $customer['id'];
                $this->db->select("*");
                $this->db->from("customer");
                $this->db->join("transaksi","customer.id=transaksi.id_customer");
                $this->db->where("transaksi.id_customer='$id_customer'");
                $query = $this->db->get()->row_array();

                ?>
                <tr class="customer">
                    <td>
                        <span><?= $query['nama'] ?></span> 
                        <!-- <input type="hidden" name="" id=""></td> -->
</td>
                    <td>
                        <span><?= $query['no_tlp'] ?></span> 
                        <!-- <input type="hidden" name="" id=""></td> -->
</td>
                    <td>
                        <span><?=  $query['alamat']?></span> 
                        <!-- <input type="hidden" name="" id=""></td> -->
</td>
                    <td>
                        <span><?= $query['kodepos'] ?></span> 
                        <!-- <input type="hidden" name="" id=""></td> -->
</td>
                        <td>
                        <span><?= $query['provinsi'] ?></span> 
                        <!-- <select name="provinsi" id="">
                            <option value="">5</option>
                            <option value="">7</option>
</select>  -->
                    </td>
                        <td>
                        <span><?= $query['kota']; ?></span> 
                        <!-- <select name="kota" id="">
                            <option value="">2</option>
                            <option value="">3</option>
                        </select> -->
</td>
                        <td>
                        <span><?= $query['courier']; ?></span> 
                        <!-- <select name="kota" id="">
                            <option value="">2</option>
                            <option value="">3</option>
                        </select> -->
</td>
                        <td>
                        <span><?= $query['ekspedisi'] ?></span> 
                        <!-- <select name="ekspedisi" id="">
                            <option value="">1</option>
                            <option value="">2</option>
                        </select> -->
</td>
                    </tr>
                
                <tr>
                    <th colspan="2"> Nama Product</th>
                    <th colspan="2">Gambar Product</th>
                    <th>Warna Product</th>
                    <th >Harga Product</th>
                    <th>Jumlah Product</th>
                    <th>Total</th>
                </tr>
                <?php 
                $id_transaksi = $query['id'];
                $query1 = $this->db->query("SELECT * FROM detail_transaksi,product,transaksi WHERE detail_transaksi.id_transaksi='$id_transaksi' AND detail_transaksi.id_transaksi=transaksi.id AND detail_transaksi.id_product=product.id")->result_array();
                
                $axc = $this->db->query("SELECT SUM(detail_transaksi.total_product) as jumlah from detail_transaksi JOIN transaksi WHERE transaksi.id_customer='$id_customer' AND transaksi.id=detail_transaksi.id_transaksi")->row_array();
                foreach ($query1 as $key => $value) :
                ?>
                <tr class="product">
                    <td colspan="2">
                        <span><?= $value['nama_product'] ?></span>
                        <!-- <input type="hidden" name="" id=""></td> -->
                </td>
                    <td colspan="2"><img src="<?php 
                        $id_product = $value['id_product'];
                        $gamb = $this->db->get_where("gambar",['id_product'=>$id_product])->row_array();
                        echo base_url().'/assets/admin/img/product/'.$gamb['gambar'];
                        ?>" alt="" style="width:100px;heihgt:100px; padding:0px;">
                        <!-- <input type="hidden" name="" id=""></td> -->
                </td>
                        <td>
                        <span>warna</span>
                        <!-- <input type="hidden" name="" id=""></td> -->
                </td>
                        <td>
                        <span><?= $value['harga'] ?></span>
                        <!-- <input type="hidden" name="" id=""></td> -->
                </td>
                        <td>
                        <span><?= $value['pcs'] ?></span>
                </td>
                        <td>
                        <span><?= $value['total_product'] ?></span>
                </td>
                        <!-- <input type="hidden" name="" id=""></td> -->
                </tr>
                <?php endforeach; ?>
            </table>
            
            <table style="float:right; margin-right: 0%; margin-top:5px;">
            <div class="transaksi">
                <tr class="kupon">
                    <td colspan="5"> <span>Discount:</span> </td>
                    <td>
                       <span><?= $query['discount'] ?>%</span> 
                        <!-- <input type="text"> <button>+</button> -->
                    </td>
                </tr>
                <tr class="tot-product">
                    <td colspan="5"><span>Total Product :</span> </td>
                    <td>
                        <span><?= $axc['jumlah'] ?></span>
                        <!-- <input type="text"> -->
                    </td>
                </tr>
                <tr class="ongkir">
                    <td colspan="5"><span>Ongkis Kirim :</span></td>
                    <td>
                        <span><?= $query['harga_kurir'] ?></span>
                        <!-- <input type="text" name="" id=""> -->
                    </td>
                </tr>
                <tr class="pajak">
                    <td colspan="5"><span>Biaya Penanganan :</span></td>
                    <td>
                        <!-- <input type="text" name="" id=""> -->
                </td>
                </tr>
                <tr class="total">
                    <td colspan="5"><span>Total :</span></td>
                    <td>
                        <span><?= $query['total'] ?></span>
                        <!-- <input type="text" name="" id=""> -->
                    </td>
                </tr>
                <tr class="bayar">
                    <td colspan="7">
                        <button>Edit </button>
                        <button type="button" id="pay-button">Buy!</button>
                    </td>
                </tr>
            </div>
                </table>
    
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
</body>
</html>


<!-- midtrans -->
<script type="text/javascript">
  
  $('#pay-button').click(function (event) {
    event.preventDefault();
    $(this).attr("disabled", "disabled");
  $.ajax({
    url: '<?= base_url()?>/buy/token',
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

</script>
<!-- end midtrans -->