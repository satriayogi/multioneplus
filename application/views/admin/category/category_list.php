
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<?= $this->session->flashdata('message'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category List</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

   

            <div class="card col-md-10 mx-auto">
              
              <!-- /.card-header -->
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th colspan="2">Name</th>
                    <th>Setting </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach ($category as $category): ?>
                  <tr>
                    <td><?= $no++;?></td>
                    <td colspan="2"><?= $category['nama_category'] ?></td>
                    <td> 
                          <a class="btn btn-info btn-sm" href="#">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm" href="#">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a></td>
                    
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus"></i> Add item</button>
              </div>
            </div>
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
  <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/category/save_category') ?>" class="form-horizontal" method="post">
                    <div class="card-body">
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Category</label>
                                      <input type="text" name="category" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Category" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                  <a href="" class="btn btn-default" data-dismiss="modal">Close</a>
                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->