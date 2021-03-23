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
              <form action="<?= base_url('product/update_product') ?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Name Product</label>
                              <input type="text" name="nama_product" value="<?= $edit['nama_product'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Name Product">
                              <input type="hidden" name="id" value="<?= $edit['id_product'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Name Product">
                            </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                  <label>Category</label>
                  <select class="form-control select" name="category" style="width: 100%;">
                  <option value="<?= $edit['id_category'] ?>" disabled selected style="background-color:#A9A9A9"><?php $id_category = $edit['id_category'];
                  $query = $this->db->query("SELECT * FROM product JOIN category Where category.id='$id_category' AND category.id=product.id_category")->row_array();
                  echo $query['nama_category'];
                  ?></option>
                  <?php foreach ($category as $category) :?>
                            <option value="<?= $category['id'] ?>"><?= $category['nama_category'];?></option>
                            <?php endforeach; ?>
                  </select>
                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 " >
                          <label for="exampleInputPassword1">Keterangan</label>
                          <input type="text" name="keterangan" value="<?= $edit['keterangan'] ?>" class="form-control col-md-9" id="exampleInputPassword1" placeholder="Keterangan">
                        </div>
                        <div class="col-md-6">

<div class="form-group">
    <label for="exampleInputPassword1">Quantity</label>
    <input type="text" name="quantity" value="<?= $edit['stok'] ?>" class="form-control col-md-9" id="exampleInputPassword1" placeholder="Quantity Product">
</div>
</div>
                  </div>
                        
                  <div class="row">
                    <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Price</label>
                                    <input type="text" name="price" value="<?= $edit['harga'] ?>" class="form-control col-md-9" id="exampleInputPassword1" placeholder="Price">
                                  </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Discount</label>
                                <input type="text" name="discount" value="<?= $edit['discount'] ?>" class="form-control col-md-9" id="exampleInputPassword1" placeholder="Discount">
                            </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for=""> Pilih Warna</label> <br>
                        <div class="form-check form-check-inline">
                          <input type="hidden" name="birumuda" value="99">
                          <input class="form-check-input birumuda" name="birumuda" value="1" <?php if ($edit['birulangit']==1) {
                            echo 'checked';
                          }  ?> type="checkbox" id="inlineCheckbox1" value="option1" style="color:'83e4db';width:25px;height:25px;">
                          <label class="form-check-label" id="labelbirumuda" for="inlineCheckbox1" style="color:'83e4db';">Light Green</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input type="hidden" name="coklat" value="99">
                        <input class="form-check-input" value="1" name="coklat" type="checkbox" id="inlineCheckbox2" value="option2" style="width:25px;height:25px;"<?php if ($edit['coklat']==1) {
                            echo 'checked';
                          }  ?>>
                        <label class="form-check-label" for="inlineCheckbox2" style="color:'603913';">Brown</label>
                      </div>
                      <div class="form-check form-check-inline">
                          <input type="hidden" name="putih" value="99">
                          <input class="form-check-input" value="1" name="putih" type="checkbox" id="inlineCheckbox1" value="option1" style="width:25px;height:25px;"<?php if ($edit['putih']==1) {
                            echo 'checked';
                          }  ?>>
                          <label class="form-check-label" for="inlineCheckbox1" style="color:'bfe5fa';">White</label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input type="hidden" name="abuabu" value="99">
                        <input class="form-check-input" value="1" name="abuabu" type="checkbox" id="inlineCheckbox2" value="option2" style="width:25px;height:25px;"<?php if ($edit['abu-abu']==1) {
                            echo 'checked';
                          }  ?>>
                        <label class="form-check-label" for="inlineCheckbox2" style="color:'84888a';">Grey</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input type="hidden" name="birulangit" value="99">
                        <input class="form-check-input" value="1" name="birulangit" type="checkbox" id="inlineCheckbox2" value="option2" style="width:25px;height:25px;" <?php if ($edit['birulangit']==1) {
                            echo 'checked';
                          }  ?>>
                        <label class="form-check-label" for="inlineCheckbox2">Blue Sky</label>
                      </div>
                      </div>
                    </div>
                      <div class="col-md-6">
                          <div class="form-group ">
                                      <label for="exampleInputFile">Image </label>
                                      <div class="row">
                                        <div class="col-md-4">
                                          <img src="<?= base_url() ?>assets/admin/img/product/<?= $edit['gambar'] ?>" alt="Image 1" id="img1"  class="rounded d-block" style="width:50%;">
                                          <div class="input-group">
                                            <div class="custom-file col-md-8">
                                              <input type="file" name="gambar1" onchange="preview()" id="img11"  style="margin-bottom: 92%;
                      opacity: 0;
                      z-index: 99;
                      height: 344%;
                      margin-left: -8%;">
                                            </div>
                                            <input type="hidden" name="gambar11" value="<?= $edit['gambar'] ?>" id="">
                                            <input type="hidden" name="gambar12" value="<?= $edit['gambar2'] ?>" id="">
                                            <input type="hidden" name="gambar13" value="<?= $edit['gambar3'] ?>" id="">
                                          <!-- look image use javascript -->
                                          <!-- end javascript -->
                  
                                          <label for="" id="ada" style="margin-left: 8%;
                      color: black;
                      margin-top: 1%;
                      position: absolute;
                      height: 55%;"> <?= $edit['gambar'] ?></label>
                                          </div>
                                          <script>
                                         function preview() {
                      img1.src=URL.createObjectURL(event.target.files[0]);
                      const asa = document.getElementById("ada");
                      asa.innerHTML=img11.value;
                  }
                                          </script>
                  
                                        </div>
                                        <div class="col-md-4">
                                          <img src="<?= base_url('assets/admin/img/product/'.$edit['gambar2']) ?>" alt="Image 2" id="img2" class="rounded d-block " style="width:50%;">
                                          <div class="input-group">
                                            <div class="custom-file col-md-8">
                                              <input type="file" name="gambar2"  value="<?= $edit['gambar2'] ?>" id="img12" onchange="preview2()" style="margin-bottom: 92%;
                      opacity: 0;
                      z-index: 99;
                      height: 344%;
                      margin-left: -8%;">
                                            </div>
                                            <!-- look image use javascript -->
                                          <!-- end javascript -->
                                            <label for="" id="aja" style="margin-left: 8%;
                      color: black;
                      margin-top: 1%;
                      position: absolute;
                      height: 55%;"> <?= $edit['gambar2'] ?></label>
                                          </div>
                                          <script>
                                         function preview2() {
                      img2.src=URL.createObjectURL(event.target.files[0]);
                      const asa = document.getElementById("aja");
                      asa.innerHTML=img12.value;
                  }
                                          </script>
                  
                                        </div>
                                        <div class="col-md-4">
                                          <img src="<?= base_url('assets/admin/img/product/'.$edit['gambar3']) ?>" alt="Image 3" id="img3" class="rounded d-block" style="width:50%;">
                                          <div class="input-group">
                                            <div class="custom-file col-md-8">
                                              <input type="file" name="gambar3" value="<?= $edit['gambar3'] ?>" id="img13" onchange="preview3()" style="margin-bottom: 92%;
                      opacity: 0;
                      z-index: 99;
                      height: 344%;
                      margin-left: -8%;">
                                            </div>
                                            <!-- look image use javascript -->
                                          <!-- end javascript -->
                                          <label for="" id="asa" style="margin-left: 8%;
                      color: black;
                      margin-top: 1%;
                      position: absolute;
                      height: 55%;"> <?= $edit['gambar3'] ?></label>
                                          <script>
                                         function preview3() {
                      img3.src=URL.createObjectURL(event.target.files[0]);
                      const asa = document.getElementById("asa");
                      asa.innerHTML=img13.value;
                  }
                                          </script>
                                          </div>
                  
                                        </div>
                                        
                    </div>
                    </div>
                    
                            </div>
                        </div>
                    </div>
                       
                        
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="<?= base_url('product/index') ?>" class="btn btn-danger float-right">Cancel</a> 
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
 