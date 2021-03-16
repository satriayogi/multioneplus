<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Product</li>
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
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="<?= base_url('admin/product/save_product') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Name Product</label>
                              <input type="text" name="nama_product" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Name Product">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                  <label>Minimal</label>
                  <select class="form-control select" name="category" style="width: 100%;">
                  <?php foreach ($category as $category) :?>
                            <option value="<?= $category['id'] ?>"><?= $category['nama_category'];?></option>
                            <?php endforeach; ?>
                  </select>
                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                          <label for="exampleInputPassword1">Keterangan</label>
                          <input type="text" name="keterangan" class="form-control col-md-9" id="exampleInputPassword1" placeholder="Keterangan">
                        </div>
                        <div class="form-group col-md-6">
                    <label for="exampleInputFile">Image 1</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="gambar[]" class="custom-file-input" id="exampleInputFile" multiple="multiple">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>

                    </div>
                    <div class="row">
    <div class="col-md-6">

        <div class="form-group">
            <label for="exampleInputPassword1">Quantity</label>
            <input type="text" name="quantity" class="form-control col-md-9" id="exampleInputPassword1" placeholder="Quantity Product">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group ">
                    <label for="exampleInputFile">Image 2</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="gambar[]" class="custom-file-input" id="exampleInputFile" multiple="multiple">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                            
                            </div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Price</label>
                                    <input type="text" name="price" class="form-control col-md-9" id="exampleInputPassword1" placeholder="Price">
                                  </div>
                            </div>
                            <div class="col-md-6">
        <div class="form-group ">
                    <label for="exampleInputFile">Image 3</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="gambar[]" class="custom-file-input" id="exampleInputFile" multiple="multiple">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                            
                            </div>
                        </div>
                        </div>
                        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="<?= base_url('admin/product/index') ?>" class="btn btn-danger float-right">Cancel</a> 
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
 