
       <!-- Online Store Start HERE -->
       <style>
           html {
  scroll-behavior: smooth;
}

       </style>
       <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height:600px; margin-top:-50px; z-index:0">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://media3.s-nbcnews.com/j/newscms/2020_51/3436769/201218-2020mask-bd-2x1_5b62d42228236c7f0b66f597cfcb43f2.fit-760w.jpg" style="height:600px;" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://www.siteking.co.uk/pub/media/catalog/product/cache/e14ec8f6239ab753e845631f95efd80b/v/a/valve-main_1.jpg" class="d-block w-100" style="height:600px;" alt="...">
    </div>
    <div class="carousel-item">
      <img src="https://c.files.bbci.co.uk/62E7/production/_116491352_screenshot2021-01-12at16.03.54.png" class="d-block w-100" style="height:600px;" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
       <section class="online-store" id="online-store">
        <div class=products>
            <div class="category" style="margin-top: 20px;">
                <ul>
                    <li><a href="<?= base_url('product_customer/list_product') ?>"> ALL</a></li>
                    <?php
                    foreach ($category as $category1):
                        ?>
                        <li><a href="<?= base_url('product_customer/category_product/'.$category1['id']) ?>"><?= $category1['nama_category'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
              </div>
              <style>
              .img-product{
                transition: all .4s ease-in-out;
              }
              .img-product:hover{
                  cursor: pointer;
                  transform: scale(1.1);

              }
              </style>
              <div class="row row-cols-1 row-cols-md-4" >
                <?php foreach ($list_product as $value):?>
                    <?php 
                        $id = $value['id'];
                        // $id_category = $value['id_category'];
                       
?>
                        <?php 
                        $query = $this->db->get_where('gambar',['id_product'=>$id])->row_array();

                        ?>
  <div class="col mb-3">
    <div class="card" style="background-color:#f7f5f6; border:none">
    <a href="<?= base_url('product_customer/detail_product/'.$id) ?>"> <img src="<?= base_url() ?>assets/admin/img/product/<?= $query['gambar'] ?>" class="card-img-top img-product" alt="<?= base_url() ?>assets/admin/img/product/<?= $query['gambar'] ?>"></a>
      <div class="card-body">
        <h5 class="card-title">   <h3 style="text-align:center;"> <?php  $category = $this->db->query("SELECT * FROM category JOIN category_product WHERE category_product.id_product='$id' AND category_product.id_category=category.id")->result_array();
                        foreach ($category as $category) {
                            echo $category['nama_category'].' ';
                        } ?></h3></h5>
        <p class="card-text"><h5 style="text-align:center;"> <?= $value['keterangan']; ?> </h5></p>
        <p class="card-text mx-auto"><h5 style="text-align:center; color:#24ae5c; font-weight:600;"> Rp.<?= $value['harga']; ?> </h5></p>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>
            <!-- <ul class="product-display">
                <php foreach ($list_product as $value):?>
                <li>
                    <form action="<= base_url('product_customer/add_transaksi') ?>" method="post">
                    <div class="product-display-each">
                        <h1 style="padding-top:5px;">
                    <php 
                        $id = $value['id'];
                        // $id_category = $value['id_category'];
                       
?>
                    </h1>
                        <php 
                        $query = $this->db->get_where('gambar',['id_product'=>$id])->row_array();

                        ?>
                        <a href="<= base_url('product_customer/detail_product/'.$customer['id'].'/'.$id) ?>"><img src="<?= base_url() ?>assets/admin/img/product/<?= $query['gambar'] ?>" alt="" style="width: 80%; height:200px; margin-top: 40px;"></a>
                        <div class="product-title" >
                            <h3> <php  $category = $this->db->query("SELECT * FROM category JOIN category_product WHERE category_product.id_product='$id' AND category_product.id_category=category.id")->result_array();
                        foreach ($category as $category) {
                            echo $category['nama_category'].' ';
                        } ?></h3>
                            <h5> <= $value['keterangan']; ?> </h5>
                            <span class="price">Rp <= $value['harga'] ?></span>
                            <input type="hidden" name="id_customer" value="<= $customer['id'] ?>">
                            <input type="hidden" name="id_product" value="<= $value['id'] ?>">
                            <input type="hidden" name="pcs" value="1">
                            <input type="hidden" name="harga" value="<= $value['harga'] ?>">
                            <input type="hidden" name="catatan">
                            <input type="hidden" name="total" value="<= $value['harga'] ?>">
                            </div>
                        </div>
                    </form>
                    </li>
                <php endforeach; ?>
            </ul> -->
        </div>
       </section>

       <div class="clear"></div>
 <!-- Footer -->
 <footer id="sticky-footer" class="py-5 text-white-50" style=" background-color:#445555;  margin-bottom:-5px; height:200px;">
        <div class="container subfooter">
            <div class="address">
                <img src="<?= base_url() ?>assets/customer/img/logo-mutil-plus-one1 (1).png" alt="" class="footer-img">
                <div class="company-addres1">
                    <p class="company">PT. MULTI ONE PLUS</p>
                    <p class="company-address">Jl.Barokah, Kp Parungdengdek, No.09 Kelurahan Wanaherang, Kec. Gunung Putri, Kab.Bogor Provinsi, Jawa Barat</p>
                </div>
            </div>

        </div>
        <p class="copyright" style="width: 90%;">&copy; 2020 PT MULTI ONE PLUS, Proudly created by <a href=""> MIACOMPANY.ID </a></p>
    </footer>

</body>
</html>