
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
                    <th>Courier</th>
                    <th>Ongkir</th>
                    <th>Discount</th>
                    <th>Total product</th>
                    <th>Total</th>
                    <th>Setting</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach ($transaksi as $key => $value):?>
                  <tr>
                    <td><?= $value['id'] ?></td>
                    <td><?= $value['id_order'] ?></td>
                    <td><?= $value['nama'] ?></td>
                    <td><?= $value['email'] ?></td>
                    <td><?= $value['no_tlp'] ?></td>
                    <td><?= $value['ekspedisi'] ?></td>
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
                    <td><?= $value['total'] ?></td>
                    <td>
                    <button type="submit" class="btn btn-primary w-100 mb-1" data-toggle="modal" data-target="#exampleModal<?= $no++;  ?>">Resi <i class="fa fa-book"></i> </button>  
                    <button type="submit" class="btn btn-warning w-100">Print <i class="fas fa-print"></i> </button>  </td>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>