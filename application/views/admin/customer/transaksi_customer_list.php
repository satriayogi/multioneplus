
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Transaction</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Transaction </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
            <div class="card col-md-11 mx-auto">
              
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>ID Order</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>No Handphone</th>
                    <th>Ekspedisi</th>
                    <th>No Resi</th>
                    <th>Courier</th>
                    <th>Ongkir</th>
                    <th>Discount</th>
                    <th>Total product</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Setting</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($transaksi as $key => $value):?>
                  <tr id="pembayaran">
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['id_order'] ?></td>
                    <td><?= $value['nama'] ?></td>
                    <td><?= $value['email'] ?></td>
                    <td><?= $value['no_tlp'] ?></td>
                    <td><?= $value['ekspedisi'] ?></td>
                    <td><?= $value['no_resi'] ?></td>
                    <td><?= $value['courier'] ?></td>
                    <td><?= $value['harga_kurir'] ?></td>
                    <td><?= $value['discount'] ?></td>
                    <td>
                      <?php 
                      $id_transaksi = $value['id'];
                      $query = $this->db->query("SELECT SUM(total_product) as jumlah from detail_transaksi WHERE id_transaksi='$id_transaksi'")->row_array();
                      echo $query['jumlah'];
                      ?>
                    </td>
                    <td ><?= $value['total'] ?></td>
                    <td><?= $value['status_pembayaran'] ?></td>
                    <td>
                    <?php 
                    if ($value['no_resi'] == null):?>
                    <button type="button" class="btn btn-primary w-100 mb-1" data-toggle="modal" data-target="#exampleModal<?= $value['id'] ?>">Resi <i class="fa fa-book"></i> </button>  
                    <a href="<?= base_url('transaction/print/'.$value['id']) ?>" target="_blank" class="btn btn-warning w-100"> Print <i class="fas fa-print"></i></a>
                    <?php else: ?>
                    <button type="button" class="btn btn-primary w-100 mb-1" data-toggle="modal" data-target="#exampleModal<?= $value['id'] ?>">Update Resi <i class="fa fa-book"></i> </button>  
                    <?php endif; ?>
                     </td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Modal -->
  <?php foreach ($transaksi as $key1 => $value1):?>
<div class="modal fade" id="exampleModal<?= $value1['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('transaksi/update_transaksi') ?>" method="post">
        <div class="modal-body">
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">No resi</label>
            <input type="text" name="noresi" id="" class="form-control col-sm-10">
            <input type="hidden" name="id"  class="form-control col-sm-10" value="<?= $value1['id'] ?>">
            <input type="hidden" name="order_id" id="dta-id" class="form-control col-sm-10" value="<?= $value1['id_order'] ?>">
            <input type="hidden" name="id_customer" id="" class="form-control col-sm-10" value="<?= $value1['id_customer'] ?>">
            <input type="hidden" name="id_order" id="" class="form-control col-sm-10" value="<?= $value1['id_order'] ?>">
            <input type="hidden" name="kodepos" id="" class="form-control col-sm-10" value="<?= $value1['kodepos'] ?>">
            <input type="hidden" name="provinsi" id="" class="form-control col-sm-10" value="<?= $value1['provinsi'] ?>">
            <input type="hidden" name="kota" id="" class="form-control col-sm-10" value="<?= $value1['kota'] ?>">
            <input type="hidden" name="ekspedisi" id="" class="form-control col-sm-10" value="<?= $value1['ekspedisi'] ?>">
            <input type="hidden" name="courier" id="" class="form-control col-sm-10" value="<?= $value1['courier'] ?>">
            <input type="hidden" name="jenis_paket" id="" class="form-control col-sm-10" value="<?= $value1['jenis_paket'] ?>">
            <input type="hidden" name="harga_kurir" id="" class="form-control col-sm-10" value="<?= $value1['harga_kurir'] ?>">
            <input type="hidden" name="discount" id="" class="form-control col-sm-10" value="<?= $value1['discount'] ?>">
            <input type="hidden" name="total" id="" class="form-control col-sm-10" value="<?= $value1['total'] ?>">
            <input type="hidden" name="alamat" id="" class="form-control col-sm-10" value="<?= $value1['alamat'] ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Modal -->
<div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="getdat modal-body">
      <table class="table">
  <thead>
    <tr>
      <th scope="col">id Order</th>
      <th scope="col">Tipe Pembayaran</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody id="pemb">
   
    
  </tbody>
</table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- <script>
     $(document).ready(function(){
      $(".example").on("click",function(){
        // alert("masuk");
        var order_id = $(this).attr('data-id');
        //  alert(order_id);
         var arr = ['asd','aswqe'];
         console.log(arr);
         $.ajax({
           type: "GET",
           url: "<?= base_url() ?>transaction/process",
           dataType: "json",
           data: {order_id:order_id},
           success: data => {
             console.log(data);
             $.each(data,function(status_message,va_numbers){
               if (data.transaction_status == "settlement") {
                 $("#pemb").html( "<tr><td>"+data.order_id+"</td><td>"+data.payment_type+"</td><td> <div style='width: 80%;height: 26px;background-color: yellow;margin: auto;text-align: center;'>"+data.transaction_status+"</div></td></tr>");
                 
               }else if(data.transaction_status == "expire")
              $("#pemb").html( "<tr><td>"+data.order_id+"</td><td>"+data.payment_type+"</td><td><div style='width: 80%;height: 26px;background-color: red;margin: auto;text-align: center;'>"+data.transaction_status+"</div></td></tr>");
               
              });
              //  for(var i = 0; i<data.length;i++){
                //    console.log(data.status_message);
                //  }
           }
           
          });
       });


     });
        </script> -->

<!-- jQuery -->
   