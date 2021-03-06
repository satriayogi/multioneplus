
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<?= $this->session->flashdata('message'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product List</li>
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
                    <th>Category</th>
                    <th>Keterangan</th>
                    <th>Image</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Setting</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $no=1;
                   foreach ($product as $product):?>
                  <tr>
                    <td><?= $product['nama_product'] ?></td>
                    <td>
                    <?php 
                    $id = $product['id_product'];
                    $query = $this->db->query("SELECT * FROM category JOIN category_product WHERE category_product.id_product='$id' AND category_product.id_category=category.id")->result_array();
                    foreach ($query as  $category) {
                      echo $category['nama_category'].',';
                    }
                    ?>
                    </td>
                    <td><?= $product['keterangan'] ?></td>
                    <td>
                    <div class="col-md-15">

                      <img src="<?= base_url('assets/admin/img/product/'.$product['gambar']) ?>" class="rounded mx-auto d-block" height="130px" width="200px" alt="">
                    </div> 
                  </td>
                  <td>
                    <table class="table table-borderless">
                      
                      <?php
                    $id_product = $product['id_product'];
                    $stok = $this->db->query("SELECT * FROM product,warna,style_warna WHERE product.id='$id' AND warna.id_product=product.id AND warna.id_stylecolor=style_warna.id")->result_array();
                    foreach ($stok as $key5 => $value5) :
                      ?>
                      
                      <tr>
                        <td><div class="birumuda" style="width:20px;height:20px; background-color:<?= $value5['warna'] ?>; margin-right:3px;"></div></td>
                        <td><?= $value5['stok'] ?></td>
                      </tr>
                      <?php endforeach; ?>
                    </table> 
                  </td>
                    <td> <?= $product['harga'] ?></td>
                    <td> <?= $product['discount'] ?></td>
                    
                    <td>
                          <a class="btn btn-info btn-sm" href="<?= base_url('product/edit_product/'.$admin['id'].'/'.$product['id_product']) ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm hapus" href="<?= base_url('product/delete_product/'.$admin['id'].'/'.$product['id_product']) ?>">
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
                <a href="<?= base_url('product/add_product/'.$admin['id']) ?>" class="btn btn-success float-right"><i class="fas fa-plus"></i> Add Product</a>
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