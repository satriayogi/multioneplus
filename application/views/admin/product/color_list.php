
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<?= $this->session->flashdata('message'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Color List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Color List</li>
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
                    <th>No </th>
                    <th>Nama Warna</th>
                    <th>Style</th>
                    <th>Setting</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no=1;
                  foreach ($color_list as $key => $value):?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $value['nama_warna'] ?></td>
                    <td><?= $value['warna'] ?></td>
                    <td>  <a class="btn btn-danger btn-sm hapus" href="">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                          <a class="btn btn-primary btn-sm" href=""  data-toggle="modal" data-target="#modal-update<?= $value['id'] ?>">
                              <i class="fas fa-edit">
                              </i>
                              Update
                          </a></td>
                  </tr>
                  <?php endforeach ?>
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus"></i> Add Product</a>
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
              <h4 class="modal-title">Add Color</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('product/save_color') ?>" class="form-horizontal" method="post">
                    <div class="card-body">
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Name Color</label>
                                      <input type="text" name="nama_warna" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Name Color" required>
                                      <input type="hidden" name="admin" value="<?= $admin['id'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Name Color" required>
                                    </div>
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Style Color</label>
                                      <input type="text" name="style_warna" class="form-control col-md-9" id="exampleInputEmail1" placeholder="enter a color with the example #83e4db or Name Color" required>
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
      <!-- /.modal Edit-->
 <!-- /.content-wrapper -->
 <?php foreach ($color_list as $key => $value) :?>
 <div class="modal fade" id="modal-update<?= $value['id'] ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Color</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('product/update_color') ?>" class="form-horizontal" method="post">
                    <div class="card-body">
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Name Color</label>
                                      <input type="text" name="nama_warna" value="<?= $value['nama_warna'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Name Color" required>
                                      <input type="hidden" name="admin" value="<?= $admin['id'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Name Color" required>
                                      <input type="hidden" name="id" value="<?= $value['id'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Name Color" required>
                                    </div>
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Style Color</label>
                                      <input type="text" name="style_warna" value="<?= $value['warna'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="enter a color with the example #83e4db" required>
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
      <?php endforeach; ?>
      <!-- /.modal Edit-->




  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
  $(".hapus").on("click",function(e){
e.preventDefault();
const href = $(this).attr('href');
// alert(href);
// console.log()
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    document.location.href= href;
    // alert(href);
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Your file has been delete',
      showConfirmButton: false,
      timer: 1500
    }
    )
  }
});
  });
// $('#ahref').on("click",function(e){
//   e.preventDefault();

// });
</script>