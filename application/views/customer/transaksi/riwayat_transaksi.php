<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
 <link rel="stylesheet" href="fontawesome-free-5.15.3-web/css/all.css">
 <link rel="stylesheet" href="<?= base_url() ?>assets/customer/css/online-store-2.css">
  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.css"/>
  <script src="https://unpkg.com/clipboard@2/dist/clipboard.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- sweetalert -->
  <script src="<?= base_url(); ?>/assets/admin/dist/js/sweetalert2.all.min.js"></script>
<script src="<?= base_url(); ?>/assets/admin/dist/js/sweetalert2.min.js"></script>
<link rel="stylesheet" href="<?= base_url(); ?>/assets/admin/dist/js/sweetalert2.min.css">
<!-- end sweet aler -->
</head>
<body>
<?= $this->session->flashdata("pesan"); ?>
     <!-- Navigation -->
     <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 " style="z-index:1;">
        <div class="container">
   <a class="navbar-brand" href="<?= base_url('list_product/index') ?>"><img src="https://www.multioneplus.com/template/s150319001001/images/logo-mutil-plus-one2.png" style="width: 173px;height: 65px;" alt=""></a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse justify-content-end p-4" id="navbarNavDropdown">
     <ul class="navbar-nav">
       <li class="nav-item active">
         <a class="nav-link" href="<?= base_url("about/index") ?>">About MOP <span class="sr-only">(current)</span></a>
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
      <?php 
        if ($customer['id'] == null) :
      ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('loginc/customer') ?>">Login</a>
      </li>
      <?php else: ?>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="<?= base_url() ?>assets/customer/img/profile.png" style="width:30px;height:30px;" alt="">
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?= base_url('profile/index') ?>">Profile</a>
          <a class="dropdown-item" href="<?= base_url('transaksi_customer/noti') ?>">Riwayat Transaksi</a>
          <a class="dropdown-item" href="#">Change Password</a>
          <a class="dropdown-item" href="<?= base_url('loginc/logout_customer') ?>">Logout</a>
        </div>
      </li>
      <?php endif; ?>
 
     </ul>
   </div>
        </div>
 </nav>
 <!-- end nav -->
 <!-- style -->
 <style>
 
@media (min-width: 992px) { 
.table{
  font-size:15px;
}
}
@media (min-width: 768px) { 
  .table{
    font-size:13px;
    
  }
 }
 </style>
<!-- table section -->
<div class="container">
<div class="table-responsive">
<table class="table" id="myTable" >
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID Order</th>
        <th scope="col">No Resi</th>
        <th scope="col">Alamat</th>
        <th scope="col">Opsi Pengiriman</th>
        <th scope="col">Jenis Pengiriman</th>
        <th scope="col">diskon</th>
        <th scope="col">Total</th>
        <th scope="col">Status</th>
        <th scope="col">Status Pembayaran</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        $id_customer = $customer['id'];
        $query = $this->db->query("SELECT * FROM transaksi WHERE id_customer='$id_customer'")->result_array();
        $no =1;
        foreach ($query as $key => $value):?>
      <tr style="text-align:center;">
        <th scope="row"><?= $no++; ?></th>
        <td><?= $value['id_order']; ?></td>
        <td>
          <style>
        #nores{
          border:none;

        }
        </style>
        <?php if ($value['no_resi'] == null):?>
          <?php else: ?>
        <input type="text" name="asd" id="nores<?= $value['no_resi'] ?>"  value="<?= $value['no_resi'] ?>" style="margin-bottom:2px;" >
        <button class="cekres text-info" style="border:none; background:transparent" id="nores<?= $value['no_resi'] ?>" data-id="<?= $value['id'] ?>" data-clipboard-target="#nores<?= $value['no_resi'] ?>"> <h4>cek</h4>  </button>
<?php endif; ?>     
      </td>
      <script>
          new ClipboardJS('.cekres');
          $(".cekres").on("click",function(){
            var id= $(this).data('id');
            // alert(id);
            $.ajax({
              url:'<?= base_url() ?>transaksi_customer/json_cek/',
        data:{id:id},
        method: 'post',
        dataType:'json',
              success: (data)=>{
  //  console.log(data.courier);             
                if (data.courier == "jne") {
Swal.fire({
  title: 'Langsung Paste Aja yah ;)',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Cus Langsung ke link Ekspedisi'
}).then((result) => {
  if (result.value) {
    // location.href= 'https://www.jne.co.id/id/tracking/trace';
    // alert(href);
   window.open('https://www.jne.co.id/id/tracking/trace');
  }
});
                }
                if (data.courier == "pos") {
                  Swal.fire({
  title: 'Langsung Paste Aja yah ;)',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Cus Langsung ke link Ekspedisi'
}).then((result) => {
  if (result.value) {
    // location.href= 'https://www.jne.co.id/id/tracking/trace';
    // alert(href);
   window.open('https://www.posindonesia.co.id/id/tracking');
  }
});
                }
                if (data.courier == "tiki") {
                  Swal.fire({
  title: 'Langsung Paste Aja yah ;)',
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Cus Langsung ke link Ekspedisi'
}).then((result) => {
  if (result.value) {
    // location.href= 'https://www.jne.co.id/id/tracking/trace';
    // alert(href);
   window.open('https://tiki.id/id/tracking');
  }
});
                }
              }
            });
          })
//           $(".cekres").on("click",function(e){
// e.preventDefault();
// // alert(href);
// // console.log()
// Swal.fire({
//   title: 'Langsung Paste Aja yah ;)',
//   icon: 'warning',
//   showCancelButton: true,
//   confirmButtonColor: '#3085d6',
//   cancelButtonColor: '#d33',
//   confirmButtonText: 'Cus Langsung ke link Ekspedisi'
// }).then((result) => {
//   if (result.value) {
//     // location.href= 'https://www.jne.co.id/id/tracking/trace';
//     // alert(href);
//    window.open('https://www.jne.co.id/id/tracking/trace');
//   }
// });
//   });
        // $("#nores<?= $value['no_resi'] ?>").on('click',function(){
          
          
          // alert("masuk");
            // var id = $("#nores<?= $value['no_resi'] ?>").val();
          // alert(id);
          // id.focus();
          // id.select();
          // document.execCommand("copy", false);
        // $.ajax({
        //   type: "POST",
        //   url: "<?= base_url() ?>transaksi_customer/json_cek",
        //   data: {id:id},
        //   dataType: "json",
        //   success: function (data) {
            
        //   }
        // });
        // })



// function myFunction() {
//   // e.preventDefault();
//   var copyText<?= $value['id'] ?> = document.getElementById("nores<?= $value['id'] ?>").value;
//   alert(copyText<?= $value['id'] ?>);
//   copyText<?= $value['id'] ?>.select();
//   copyText<?= $value['id'] ?>.setSelectionRange(0, 99999);
//   document.execCommand("copy");
  
//   var tooltip = document.getElementById("myTooltip");
//   tooltip.innerHTML = "Copied: " + copyText.value;

// }

// function outFunc() {
//   var tooltip = document.getElementById("myTooltip");
//   tooltip.innerHTML = "Copy to clipboard";
// }

</script>
        <td><?= $value['alamat']; ?></td>
        <td><?= $value['courier'] ?></td>
        <td><?= $value['ekspedisi'] ?></td>
        <td><?= $value['discount'] ?></td>
        <td><?= $value['total'] ?></td>
        <td><?php 
        if ($value['status'] == 0) {
          echo 'pending';
        }elseif($value['status'] == 1){
          echo 'Sedang Di Kirim';
        }elseif($value['status'] == 2){
          echo 'sudah sampai';
        }
        
        ?></td>
        <td><?= $value['status_pembayaran'] ?></td>
        <td> <a href="<?= base_url('transaksi_customer/detail_transaksi/'.$value['id']) ?>" class="btn btn-primary" style="margin-bottom:5px;">Detail Transaksi</a> 
         <?php if ($value['no_resi'] == null):?>
         <?php else: ?>
          <?php if($value['status'] == 2): ?>
            <?php else: ?>
         <a href="<?= base_url('transaksi_customer/update_status/'.$value['id']) ?>" class="btn btn-warning"> Transaksi Selesai</a>
          <?php endif; ?>
          <?php endif; ?>
          </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
          </div>
  </div>
 <!-- Footer -->
 <footer id="sticky-footer" class="py-5 text-white-50" style=" background-color:#445555;  margin-bottom:0px; position:absolute; width:100%; margin-top:375px;">
    <div class="container subfooter">
        <div class="address">
            <img src="<?= base_url() ?>assets/customer/img/logo-mutil-plus-one1 (1).png" alt="" class="footer-img" style="width:100px;height:50px">
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
<!-- ratting -->
<!-- <script>
$(document).ready(function(){
$.ajax({
  type: "POST",
  url: "<?= base_url() ?>transaksi_customer/ratting_json",
  data: "data",
  dataType: "dataType",
  success: function (response) {
    
  }
});
});
</script> -->
<!-- datatable -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.24/datatables.min.js"></script>
<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
</script>