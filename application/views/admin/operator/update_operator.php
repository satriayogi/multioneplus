<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Operator</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Operator</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10 mx-auto">
            <!-- left column -->
          <div class="card card-green">
              <div class="card-header">
                <h3 class="card-title">Update Operator</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('admin/operator/update_operator') ?>" method="post">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nama</label>
                              <input type="text" name="nama" value="<?= $operator['nama'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Name" required>
                              <input type="hidden" name="id" value="<?= $operator['id_sys_user'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Name" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group ">
                              <label for="exampleInputPassword1">Email</label>
                              <input type="text" name="email" value=<?= $operator['email'] ?> class="form-control col-md-9" id="exampleInputPassword1" placeholder="Email" required>
                            </div>
                            
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">Alamat</label>
                            <input type="text" name="alamat" value=<?= $operator['alamat'] ?> class="form-control col-md-9" id="exampleInputPassword1" placeholder="Alamat" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="exampleInputPassword1">No Telephone</label>
                            <input type="text" name="no_tlp" value=<?= $operator['no_tlp'] ?> class="form-control col-md-9" id="exampleInputPassword1" placeholder="No Telephone" required>
                          </div>
                          
                        </div>
                        <div class="row">
    <div class="col-md-6">
      
        <div class="form-group">
            <label for="exampleInputPassword1">Username</label>
            <input type="text" name="username" value=<?= $operator['username'] ?> class="form-control col-md-9" id="exampleInputPassword1" placeholder="Username" required>
            <?= form_error('username', '<small class="text-danger">', '</small>') ?>
          </div>
        </div>
      <div class="col-md-6">
        <div class="form-group ">
          
          <div class="form-group">
            <label for="exampleInputPassword1">Role</label>
            <div class="row">
              <div class="col-md-4">
                                        <div class="form-check">
                                          <input class="form-check-input" type="hidden" name="operator" value="0">
                                          <input class="form-check-input" type="checkbox" name="operator" value="1" <?php if ($operator['operator'] == 1) {
                                              echo 'checked';
                                          } ?>>
                                            <label class="form-check-label">Operator</label>
                                          </div>
                                        </div>
                                      <div class="col-md-4">
                                        <div class="form-check">
                                          <input class="form-check-input" type="hidden" name="product" value="0">
                                            <input class="form-check-input" type="checkbox" name="product" value="1" <?php if ($operator['product'] == 1) {
                                              echo 'checked';
                                          } ?>>
                                            <label class="form-check-label">Product</label>
                                        </div>
                                      </div>

                                    </div>
                                <div class="row">
                                    <div class="col-md-4">
                                      <div class="form-check">
                                            <input class="form-check-input" type="hidden" name="category" value="0">
                                            <input class="form-check-input" type="checkbox" name="category" value="1" <?php if ($operator['category'] == 1) {
                                              echo 'checked';
                                          } ?>>
                                            <label class="form-check-label">Category</label>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-check">
                                          <input class="form-check-input" type="hidden" name="laporan" value="0">
                                          <input class="form-check-input" type="checkbox" name="laporan" value="1" <?php if ($operator['laporan'] == 1) {
                                              echo 'checked';
                                          } ?>>
                                            <label class="form-check-label">Laporan</label>
                                          </div>
                                        </div>
                                        
                                      </div>
                                    </div>
                                  </div>
                                </div>
                    </div>
                        <div class="row">
                          <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" value=<?= $operator['password'] ?> class="form-control col-md-9" id="exampleInputPassword1" placeholder="Password" required>
                                  </div>
                                </div>
                        </div>
                      </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="<?= base_url('admin/operator/index') ?>" class="btn btn-danger float-right">Cancel</a>
                  <button type="submit" class="btn btn-primary float-right mr-2">Submit</button>
                </div>
              </form>
            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

           
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->