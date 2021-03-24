
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <?= $this->session->flashdata('message'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Customer List</li>
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
                    <th>No.</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>sub-district</th>
                    <th>No. Home</th>
                    <th>Code Pos</th>
                    <th>Date of Birth</th>
                    <th>No. Telephone</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; foreach ($customer_list as $key => $value):?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $value['nama'] ?></td>
                    <td><?= $value['username'] ?></td>
                    <td> <?= $value['email'] ?></td>
                    <td> <?= $value['jenis_kelamin'] ?></td>
                    <td> <?= $value['alamat'] ?></td>
                    <td> <?= $value['kota'] ?></td>
                    <td> <?= $value['kec'] ?></td>
                    <td> <?= $value['no_rmh'] ?></td>
                    <td> <?= $value['kodepos'] ?></td>
                    <td> <?= $value['tanggal_lahir'] ?></td>
                    <td> <?= $value['no_tlp'] ?></td>
                    <td> 
                      <form action="<?= base_url('customer/update_status') ?>" method="post" id="cek" >
                      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                        <!-- <input type="checkbox" name="my-checkbox" <php if ($value['status'] == 1) {echo 'checked ';} ?> data-bootstrap-switch data-off-color="danger" data-on-color="success" onchange=''> -->
                      
                      <?php 
                      if ($value['status']==1) {
                        echo '<input type="hidden" name="status" value="99">
                        <input type="hidden" name="id" value="'.$value['id'].'">
                        <input type="hidden" name="admin" value="'.$admin['id'].'">
                        <button type="submit" class="btn btn-success w-100">Active</button>
                        ';
                      }else{
                        echo ' <input type="hidden" name="status" value="1">
                        <input type="hidden" name="id" value="'.$value['id'].'">
                        <input type="hidden" name="admin" value="'.$admin['id'].'">
                        <button type="submit" class="btn btn-danger w-100">Non Active</button>';
                      }
                      ?>
                      
                     
                      </form>
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