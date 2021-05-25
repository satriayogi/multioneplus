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
                              <label for="exampleInputEmail1">Jenis Product</label>
                              <input type="hidden" name="id" value="<?= $edit['id_product'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Name Product">
                              <input type="text" name="nama_product" value="<?= $edit['nama_product'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Name Product">
                            </div>
                        </div>
                        <div class="col-md-5">
                        <div class="form-group">
                  <label>category </label><div class="select2-purple">
                  
                    <select class="select2" multiple="multiple" name="category[]" data-placeholder="Select a State" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <?php foreach ($editcategory as  $editcategory):
                    $idcategory1 = $editcategory['id_category'];
                   ?>       
                            <option value="<?= $editcategory['id'];?>" selected="selected"><?= $editcategory['nama_category'];?></option>
                            <?php endforeach; ?>
                  <?php foreach ($category as $category) :?>
                            <option value="<?= $category['id'];?>"><?= $category['nama_category'];?></option>
                            <?php endforeach; ?>
                  </select>
                </div>
                </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6 " >
                          <label for="exampleInputPassword1">Keterangan</label>
                          <!-- <input type="text" name="keterangan" class="form-control col-md-9" id="exampleInputPassword1" placeholder="Keterangan"> -->
                          <textarea name="keterangan" id="" class="form-control col-md-9"><?= $edit['keterangan'] ?></textarea>
                        </div>
                        <div class="col-md-6">

<!-- <div class="form-group">
    <label for="exampleInputPassword1">Quantity</label>
    <input type="text" name="quantity" class="form-control col-md-9" id="exampleInputPassword1" placeholder="Quantity Product">
</div> -->
                    <div class="col-md-12" id="stok3">
                      <div id="wil" >
                      <?php foreach ($stok as  $value1): ?>
                        <div class="form-row">
                          <div class="col-md-5" >
                            <label for=""> Pilih Warna</label> <br>
                            <select class="form-control select2" name="warna[]" style="width: 100%;">
                                <!-- <option selected="selected" value="<?= $value1['id'] ?>"><?= $value1['id'] ?></option> -->
                              <?php foreach ($color_list as $key => $value) :?>
                                <option  <?php if ($value1['id'] == $value['id']) {
                                  echo 'selected="selected"';
                                } ?> value="<?= $value['id'] ?>"><?= $value['nama_warna'] ?></option>
                                <?php endforeach; ?>
                              </select>
                            </div>
                            <div class="col-md-3">
                              <label for="">Quantity</label>
                              <input type="text" name="quantity[]" id="" value="<?= $value1['stok'] ?>" class="col-md-6 form-control">
                            </div>
                            <div class="col-md-1">
                              <label for=""> </label>
                              <button type="button" class="btn btn-primary mt-1" id="tambah_tambah">+</button>
                          </div>
                        </div>
                        <?php endforeach; ?>
                      </div>
                      
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
                                <input type="text" name="discount" class="form-control col-md-9" id="exampleInputPassword1" placeholder="Discount">
                            </div>
                    </div>
                    
                  </div>
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group ">
                                      <label for="exampleInputFile">Image </label>
                                      <div class="row">
                                        <div class="col-md-4">
                                        <?php if ($edit['gambar'] == null):?>
                                          <img src="<?= base_url() ?>assets/admin/img/image.png" alt="Image 1" id="img1" class="rounded d-block " style="width:50%;">
                                        <?php else: ?>
                                          <img src="<?= base_url() ?>assets/admin/img/product/<?= $edit['gambar'] ?>" alt="Image 1" id="img1"  class="rounded d-block" style="width:50%;">
                                          <?php endif; ?>
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
                                        <?php if ($edit['gambar2'] == null):?>
                                          <img src="<?= base_url() ?>assets/admin/img/image.png" alt="Image 1" id="img2" class="rounded d-block " style="width:50%;">
                                        <?php else: ?>
                                          <img src="<?= base_url('assets/admin/img/product/'.$edit['gambar2']) ?>" alt="Image 2" id="img2" class="rounded d-block " style="width:50%;">
                                          <?php endif; ?>
                                          <div class="input-group">
                                            <div class="custom-file col-md-8">
                                              <input type="file" name="gambar2"   id="img12" onchange="preview2()" style="margin-bottom: 92%;
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
                                        <?php if ($edit['gambar3'] == null):?>
                                          <img src="<?= base_url() ?>assets/admin/img/image.png" alt="Image 1" id="img3" class="rounded d-block " style="width:50%;">
                                        <?php else: ?>
                                          <img src="<?= base_url('assets/admin/img/product/'.$edit['gambar3']) ?>" alt="Image 3" id="img3" class="rounded d-block" style="width:50%;">
                                          <?php endif; ?>
                                          <div class="input-group">
                                            <div class="custom-file col-md-8">
                                              <input type="file" name="gambar3"  id="img13" onchange="preview3()" style="margin-bottom: 92%;
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
                                        <?php if ($edit['gambar4'] == null):?>
                                          <img src="<?= base_url() ?>assets/admin/img/image.png" alt="Image 1" id="img4" class="rounded d-block " style="width:50%;">
                                        <?php else: ?>
                                          <img src="<?= base_url('assets/admin/img/product/'.$edit['gambar4']) ?>" alt="Image 3" id="img4" class="rounded d-block" style="width:50%;">
                                         <?php endif; ?>
                                          <div class="input-group">
                                            <div class="custom-file col-md-8">
                                              <input type="file" name="gambar4" id="img13" onchange="preview4()" style="margin-bottom: 92%;
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
<!-- jQuery -->
<script src="<?= base_url() ?>assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script>
    var i = 1;
    i++;
    var qty= '<div id="hap'+i+'"> <div class="form-row" ><div class="form-group col-md-5" ><label for="" > Pilih Warna</label> <br><select class="form-control select2" name="warna[]" style="width: 100%;"><?php foreach ($color_list as $key => $value) :?><option selected="selected" value="<?= $value['id'] ?>"><?= $value['nama_warna'] ?></option><?php endforeach; ?></select></div><div class="form-group col-md-3" id="hap'+i+'"><label for="">Quantity</label><input type="text" name="quantity[]" id="" class="col-md-6 form-control"></div><div class="form-group col-md-1"><label for=""> </label><button type="button" class="btn btn-primary mt-1 hapus" id="'+i+'">-</button></div></div>';
  $("#tambah_tambah").on("click",function(e){
    e.preventDefault();
    $("#stok3").append(qty);
  });
  $("#stok3").on("click",".hapus",function(e){
    e.preventDefault();
    var buttonhapus =$(this).attr("id");
    console.log("delete",buttonhapus);
        $('#hap'+buttonhapus+'').remove();
  })
  </script>