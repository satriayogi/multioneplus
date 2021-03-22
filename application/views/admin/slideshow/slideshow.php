
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<?= $this->session->flashdata('message'); ?>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Slideshow</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">SlideShow</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Create dynamic slideshows of images</h3>
              </div>
              <!-- /.card-header -->

          <div class="col-md-7 mx-auto">
            <div class="card" >
              
              <!-- /.card-header -->
              <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                  <?php 
                  $no=1;
                  foreach ($slide as $key=>$slide1) :
                  ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?= $no++; ?>" <?php if ($key == 0) {
                      echo 'class="active"';
                    } ?>></li>
                    <?php endforeach; ?>
                  </ol>
                  <div class="carousel-inner">
                  <?php foreach ($slide as $key=>$slide2) :?>
                    <div class="carousel-item <?php if ($key == 0) {
                      echo 'active';
                    } ?>">
                    <style>
                        .slide-banner{
                          width:78%;
                          height: auto;
                          position: absolute;
                          margin-top: -40%;
                          margin-left: 13%;
                        }
                        .slide-banner2{
                          
                           width:60%;
                        }
                        .slide-title{
                          font-size:37px;
                        }
                        .slide-content{
                          font-size:23px;
                        }
                        @media only screen and (max-width: 767px){
                          .slide-banner{
                          width:78%;
                          height: auto;
                          position: absolute;
                          margin-top: -42%;
                          margin-left: 13%;
                        }
                        .slide-banner2{
                          
                           width:60%;
                        }
                        .slide-title{
                          font-size:15px;
                        }
                        .slide-content{
                          font-size:12px;
                          margin-top:-14px;
                        }
                        .logo{
                          width:30px;
                          margin-top:-1%;
                          height:20px;
                        }
                        .button-link{
                          margin-top:-15%;
                          font-size:12px;
                        }
      
    }
                    </style>
                      <img class="d-block w-100" src="<?= base_url('assets/admin/img/slideshow/'.$slide2['gambar']) ?>" alt="<?= $slide2['alt'] ?>">
                      <div class="slide-banner" >
    <div class="slide-banner2" style="float:<?= $slide2['position'] ?>;" >

      <img src="<?= base_url('assets/admin/img/logo ig mop.png') ?>" class="logo" alt="">
      <p class="slide-title" ><?= $slide2['title'] ?><p>
      <p class="slide-content"><?= $slide2['isi'] ?></p>
      <button class="btn btn-success button-link"><?= $slide2['name_button'] ?></button>
    </div>
                      </div>
                    </div>
                  <?php endforeach; ?>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-left text-success"></i>
                    </span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-custom-icon" aria-hidden="true">
                      <i class="fas fa-chevron-right text-success"></i>
                    </span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
      
        <!-- END ACCORDION & CAROUSEL-->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Image</th>
                    <th>title</th>
                    <th>Alternative Tag</th>
                    <th>URL</th>
                    <th>Name Button</th>
                    <th>Position</th>
                    <th>Setting</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1;
                  foreach ($slide as $slideshow) :?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td> <?= $slideshow['gambar'] ?> </td>
                    <td><?= $slideshow['title'] ?></td>
                    <td> <?= $slideshow['alt'] ?></td>
                    <td> <?= $slideshow['url'] ?></td>
                    <td> <?= $slideshow['name_button'] ?></td>
                    <td> <?= $slideshow['position'] ?></td>
                    <td> <a class="btn btn-info btn-sm" href="javascript:;" data-id="<?= $slideshow['id'] ?>" id="update" data-toggle="modal" data-target="#modal-edit<?= $slideshow['id'] ?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <a class="btn btn-danger btn-sm hapus" href=" <?= base_url('slideshow/hapus_slide/'.$admin['id'].'/'.$slideshow['id']) ?>">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a></td>
                  </tr>
                  <?php endforeach; ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
                <!-- add slideshow -->
                <div class="card-footer clearfix">
                <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus"></i> Add item</button>
              </div>
              <!-- end slideshow -->
            </div>
            <!-- /.card -->

            
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
              <h4 class="modal-title">Add Slideshow</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('slideshow/save_slideshow') ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Title</label>
                                      <input type="text" name="title" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Title slide" required>
                                    </div>
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Contents</label>
                                      <input type="text" name="content" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Content Slide" required>
                                    </div>
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Image</label>
                                      <img src="<?= base_url('assets/admin/img/image.png') ?>" class="rounded" alt="" id="img2" style="width:200px;height:150px;">
                                      <input type="file" name="gambar" class="" id="img12" onchange="preview2()" style="margin-left: -26%;
    z-index: 99;
    opacity: 0;
    width: 26%;">
    <label for="" style="    margin-left: -18%;
    margin-top: 16%;">Click Me!</label>
                                      <script>
                       function preview2() {
    img2.src=URL.createObjectURL(event.target.files[0]);
    const asa = document.getElementById("img12");
    asa.innerHTML=img12.value;
}
                        </script>
                                    </div>
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Name Image</label>
                                      <input type="text" name="alt" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Name image" required>
                                    </div>
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Url</label>
                                      <input type="text" name="url" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Url for link" required>
                                    </div>
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Name Button</label>
                                      <input type="text" name="namebutton" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Url for link" required>
                                    </div>
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Position</label>
                                      <select name="position" id="" class="form-control col-md-9">
                                      <option value="left">Left</option>
                                      <option value="center">Center</option>
                                      <option value="right">Right</option>
                                      </select>
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
      <?php foreach ($slide as $key => $slide3):?>
  <div class="modal fade" id="modal-edit<?= $slide3['id'] ?>">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Slideshow</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('slideshow/update_slideshow') ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Title</label>
                                      <input type="text" name="title" value="<?= $slide3['title'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Title slide" required>
                                      <input type="hidden" name="id" value="<?= $slide3['id'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Title slide" required>
                                    </div>
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Contents</label>
                                      <input type="text" name="content" value="<?= $slide3['isi'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Content Slide" required>
                                    </div>
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Image</label>
                                      <img src="<?= base_url('assets/admin/img/slideshow/'.$slide3['gambar']) ?>" class="rounded"  id="img<?= $slide3['id'] ?>" style="width:200px;height:150px;">
                                      <input type="hidden" name="gambar1" value="<?= $slide3['gambar'] ?>">
                                      <input type="file" name="gambar" class="" id="img12" onchange="preview<?= $slide3['id'] ?>()" style="margin-left: -26%;
    z-index: 99;
    opacity: 0;
    width: 26%;">
    <label for="" style="    margin-left: -18%;
    margin-top: 16%;">Click Me!</label>
                                      <script>
                       function preview<?= $slide3['id'] ?>() {
    img<?= $slide3['id'] ?>.src=URL.createObjectURL(event.target.files[0]);
    const asa = document.getElementById("img12"); 
    asa.innerHTML=img12.value;
}
                        </script>
                                    </div>
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Name Image</label>
                                      <input type="text" name="alt" value="<?= $slide3['alt'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Name image" required>
                                    </div>
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Url</label>
                                      <input type="text" name="url" value="<?= $slide3['url'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Url for link" required>
                                    </div>
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Name Button</label>
                                      <input type="text" name="namebutton" value="<?= $slide3['name_button'] ?>" class="form-control col-md-9" id="exampleInputEmail1" placeholder="Enter Url for link" required>
                                    </div>
                                    <div class="form-group row">
                                      <label for="exampleInputEmail1" id="exampleInputEmail1" class="col-sm-2 col-form-label">Position</label>
                                      <select name="position" id="" class="form-control col-md-9">
                                      <option value="left">Left</option>
                                      <option value="center">Center</option>
                                      <option value="right">Right</option>
                                      </select>
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
      <!-- /.modal Edit -->
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