
       <!-- Online Store Start HERE -->
       <style>
           html {
  scroll-behavior: smooth;
  
}
.carousel-inner img {
    width: 100%;
    height: 100%;
  }
       </style>
       <div class="container">
       <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" style="background-color:green;"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1" style="background-color:green;"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2" style="background-color:green;"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?= base_url() ?>assets/customer/img/banner.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?= base_url() ?>assets/customer/img/banner.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?= base_url() ?>assets/customer/img/banner.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" style="background-color:green;" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" style="background-color:green;" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
       <section class="online-store" id="online-store">
        <div class=products>
            <div class="category" style="margin-top: 20px;">
                <ul>
                    <li><a href="<?= base_url('list_product/index') ?>"> ALL</a></li>
                    <?php
                    foreach ($category as $category1):
                        ?>
                        <li><a href="<?= base_url('list_product/category_product/'.$category1['id']) ?>"><?= $category1['nama_category'] ?></a></li>
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
  <a href="<?= base_url('product_customer/detail_product/'.$id) ?>">
    <div class="card" style="background-color: #f7f5f6;border: none; height: 300px;">
    <a href="<?= base_url('product_customer/detail_product/'.$id) ?>"> <img src="<?= base_url() ?>assets/admin/img/product/<?= $query['gambar'] ?>" class="card-img-top img-product"  style="width: 200px;
    transition: all .4s ease-in-out;
    display: block;
    margin: 0 auto;" alt="<?= base_url() ?>assets/admin/img/product/<?= $query['gambar'] ?>"></a>
    </div>
      <div class="card-body">
      <a href="<?= base_url('product_customer/detail_product/'.$id) ?>" style="color:#000; text-decoration:none"> <h5 class="card-title">   <h5 style=" text-align: left;
    font-size: 20px;
    color: grey;"> <?php  $category = $this->db->query("SELECT * FROM category JOIN category_product WHERE category_product.id_product='$id' AND category_product.id_category=category.id")->result_array();
                        foreach ($category as $category) {
                            echo $category['nama_category'].' ';
                        } ?></h5></h5></a>
       <a href="<?= base_url('product_customer/detail_product/'.$id) ?>" style="text-decoration:none">  <p class="card-text mx-auto"><h5 style=" color:#24ae5c; font-weight:600;"> Rp.<?= $value['harga']; ?> </h5></p></a>
      </div>
      </a>
  </div>
  <?php endforeach; ?>
</div>
         
        </div>
       </section>
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
<script>
let currentSlide = 0;
const slides = document.querySelectorAll(".slide")
const dots = document.querySelectorAll('.dot')

const init = (n) => {
  slides.forEach((slide, index) => {
    slide.style.display = "none"
    dots.forEach((dot, index) => {
      dot.classList.remove("activee")
    })
  })
  slides[n].style.display = "block"
  dots[n].classList.add("activee")
}
document.addEventListener("DOMContentLoaded", init(currentSlide))
const next = () => {
  currentSlide >= slides.length - 1 ? currentSlide = 0 : currentSlide++
  init(currentSlide)
}

const prev = () => {
  currentSlide <= 0 ? currentSlide = slides.length - 1 : currentSlide--
  init(currentSlide)
}

document.querySelector(".next").addEventListener('click', next)

document.querySelector(".prev").addEventListener('click', prev)


setInterval(() => {
  next()
}, 5000);

dots.forEach((dot, i) => {
  dot.addEventListener("click", () => {
    console.log(currentSlide)
    init(i)
    currentSlide = i
  })
})
</script>