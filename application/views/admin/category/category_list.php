
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
            <div class="card col-md-11 mx-auto">
              <!-- /.card-header -->
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>No.</th>
                    <th>Name</th>
                    <th>Sub Category</th>
                    <th>Setting </th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $no = 1;
                    foreach ($category as $category): ?>
                  <tr>
                    <td> <a href="<?= base_url('category/sub_category/'.$admin['id'].'/'.$category['id']) ?>"><?= '#'.$no++;?></a> </td>
                    <td><?= $category['nama_category'] ?></td>
                    <td><?php
                    $ad = $category['id'];
                    $query = $this->db->query("SELECT * FROM sub_category JOIN category where sub_category.id_category='$ad' AND sub_category.id_category=category.id")->result_array();
                    foreach ($query as $key => $value) {
                      echo $value['nama_sub_category'].',';
                    }
                    ?>
                    </td>
                    <td> 
                          <a class="btn btn-danger btn-sm hapus" href="<?= base_url('category/delete_category/'.$category['id']) ?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                          <a class="btn btn-primary btn-sm" href="" data-id="<?= $category['id'] ?>" data-toggle="modal" data-target="#modal-update<?= $category['id'] ?>">
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
              <h4 class="modal-title">Add Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('category/save_category') ?>" class="form-horizontal" method="post">
                    <div class="card-body">
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Category</label>
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
      <!-- /.modal Edit-->
  <!-- /.content-wrapper -->
  <?php  foreach ($category1 as $key => $category):
  ?>
  <div class="modal fade" id="modal-update<?= $category['id'] ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('category/update_category') ?>" class="form-horizontal" method="post">
                    <div class="card-body">
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Category</label>
                                      <input type="hidden" name="id_category" value="<?= $category['id'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Category" required>
                                      <input type="hidden" name="admin" value="<?= $admin['id'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Category" required>
                                      <input type="text" name="category" value="<?= $category['nama_category'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Category" required>
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
<!-- 
      <div class="modal fade" id="modal-lu">
        <div class="modal-dialog modal-lu">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<= base_url('admin/category/save_category') " class="form-horizontal" method="post">
                    <div class="card-body">
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Category</label>
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
           /.modal-content -->
        <!-- </div> -->
        <!-- /.modal-dialog -->
      <!-- </div> -->
       <!-- -->
         
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