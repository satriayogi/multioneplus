
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Discount</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Discount</li>
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
                    <th>Nomor</th>
                    <th>Name Product</th>
                    <th>Discount</th>
                    <th>Code Discount</th>
                    <th>Setting</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no = 1;
                  foreach ($discount_list as $discount) :?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $discount['nama_product'] ?></td>
                    <td><?= $discount['potongan'] ?></td>
                    <td><?= $discount['kode_discount'] ?></td>
                    <td>  <a class="btn btn-danger btn-sm hapus" href="<?= base_url('discount/delete_discount/'.$discount['id_product']) ?>">
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
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus"></i> Add Discount</button>
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
  <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Discount</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('discount/save_discount') ?>" class="form-horizontal" name="randform" method="post">
                    <div class="card-body">
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Product</label>
                                      <select class="form-control select2" style="width: 75%;" name="product">
                    <?php foreach ($product as $product) :?>
                    
                    <option value="<?= $product['id'] ?>"><?= $product['nama_product']; ?></option>
                    <?php endforeach; ?>
                  </select>
                                    </div>
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Potongan</label>
                                      <input type="text" class="form-control col-md-9" id="exampleInputEmail1" name="potongan" placeholder="Masukkan Jumlah potongan tanpa menggunakan persen"> <h3>%</h3>
                                    </div>
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Discount</label>
                                      <input type="text" readonly name="randomfield" value="" class="form-control col-md-7 mr-2" id="exampleInputEmail1" > <button class="btn btn-warning" type="button" onClick="randomString();">Random</button>
                                    </div>
                                    <script language="javascript" type="text/javascript">
                                    function randomString() {
                                      var chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";
                                      var string_length = 15;
                                      var randomstring = '';
                                      for (var i=0; i<string_length; i++) {
                                        var rnum = Math.floor(Math.random() * chars.length);
                                        randomstring += chars.substring(rnum,rnum+1);
                                      }
                                      document.randform.randomfield.value = randomstring;
                                    }
                                    </script>
                                   
</div>
            </div>
            <div class="modal-footer justify-content-between">
              <a href="" class="btn btn-default" data-dismiss="modal">Close</a> 
              <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
       
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