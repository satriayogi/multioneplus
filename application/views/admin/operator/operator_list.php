
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<?= $this->session->flashdata('message'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Operator List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Operator List</li>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Nomor Telephone</th>
                    <th>Status</th>
                    <th>Setting</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($operator_list as $operator) : ?>
                  <tr>
                    <td><?= $operator['nama']; ?></td>
                    <td><?= $operator['email'] ?></td>
                    <td><?= $operator['alamat']; ?></td>
                    <td><?= $operator['no_tlp']; ?></td>
                    <td><?= $operator['status']; ?></td>
                    <td>
                          <a class="btn btn-info btn-sm" href="<?= base_url('operator/edit_operator/'.$operator['id']) ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm hapus" href="<?= base_url('operator/delete_operator/'.$operator['id']) ?>">
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
                <a href="<?= base_url('operator/add_operator') ?>" class="btn btn-success float-right"> <i class="fas fa-plus"></i> Add Product</a>
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