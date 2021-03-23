
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<?= $this->session->flashdata('message'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sub Category List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sub Category List</li>
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
                    <th>Name Sub Category </th>
                    <th>Setting </th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $no = 1;
                    foreach ($subcategory as $key=>$subcategory): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $subcategory['nama_sub_category'] ?></td>
                    <td> 
                          <a class="btn btn-danger btn-sm hapus" href="">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                          <a class="btn btn-primary btn-sm" href="" data-id="<?= $subcategory['id'] ?>" data-toggle="modal" data-target="#modal-lu<?= $subcategory['id'] ?>">
                              <i class="fas fa-edit">
                              </i>
                              Update
                          </a>
               </td>
                    
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
              <h4 class="modal-title">Add Sub Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>  
            <div class="modal-body">
                <form action="<?= base_url('category/save_subcategory') ?>" class="form-horizontal" method="post">
                    <div class="card-body">
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Sub Category</label>
                                      <input type="hidden" name="id_category" value="<?= $this->uri->segment(4); ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Sub Category" required>
                                      <input type="hidden" name="admin" value="<?= $this->uri->segment(3); ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Sub Category" required>
                                      <input type="text" name="subcategory" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Sub Category" required>
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
<?php foreach ($subcategory1 as $key => $subcategory) : ?>
      <div class="modal fade" id="modal-lu<?= $subcategory['id'] ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('category/update_subcategory') ?>" class="form-horizontal" method="post">
                    <div class="card-body">
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Category</label>
                                      <input type="hidden" name="id_subcategory" value="<?= $subcategory['id'] ?>" id="">
                                      <input type="hidden" name="id_category" value="<?= $subcategory['id_category'] ?>" id="">
                                      <input type="hidden" name="admin" value="<?= $admin['id'] ?>" id="">
                                      <input type="text" name="subcategory" value=<?= $subcategory['nama_sub_category'] ?> class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Category" required>
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
<script>
    $(".bootstrap-switch-handle-on").text('ACTIVE');
</script>