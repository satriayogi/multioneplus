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
                        <?php 
                        $id_product = $edit['id_product'];
                        // echo $id;
                        $style = $this->db->query("SELECT * FROM style_warna")->result_array();
                        foreach ($style as $key => $style) :                        // $warna = $this->db->query("SELECT * FROM style_warna,warna,product WHERE product.id='$id' AND warna.id_product=product.id AND style_warna.id=warna.id_stylecolor")->result_array();
                        // foreach ($warna as $key => $warna) {
                        //   echo $warna['warna'];
                        // }
                        ?>
                        <input class="form-check-input birumuda" name="warna[]" type="checkbox" id="inlineCheckbox1" value="<?= $style['id'] ?>" <?php
                        $id = $style['id'];
                        $warna = $this->db->query("SELECT * FROM warna,style_warna WHERE warna.id_product='$id_product' AND style_warna.id='$id' AND warna.id_stylecolor=style_warna.id")->row_array();
                        if ($warna['id_product']==$id_product) {
                          echo 'checked ';
                        }else{
                          
                        }
                        ?>style=";width:25px;height:25px;">
                          <label class="form-check-label" id="labelbirumuda" for="inlineCheckbox1" style="margin-right:3px;"><?= $style['nama_warna']?>
                          </label>
                          <?php endforeach ?>
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
                                            <input type="hidden" name="gambar14" value="<?= $edit['gambar4'] ?>" id="">
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
                                        <div class="col-md-4">
                                          <img src="<?= base_url('assets/admin/img/product/'.$edit['gambar4']) ?>" alt="Image 3" id="img4" class="rounded d-block" style="width:50%;">
                                          <div class="input-group">
                                            <div class="custom-file col-md-8">
                                              <input type="file" name="gambar4" value="<?= $edit['gambar4'] ?>" id="img13" onchange="preview4()" style="margin-bottom: 92%;
                      opacity: 0;
                      z-index: 99;
                      height: 344%;
                      margin-left: -8%;">
                                            </div>
                                            <!-- look image use javascript -->
                                          <!-- end javascript -->
                                          <label for="" id="ala" style="margin-left: 8%;
                      color: black;
                      margin-top: 1%;
                      position: absolute;
                      height: 55%;"> <?= $edit['gambar4'] ?></label>
                                          <script>
                                         function preview4() {
                      img4.src=URL.createObjectURL(event.target.files[0]);
                      const asa = document.getElementById("ala");
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
 