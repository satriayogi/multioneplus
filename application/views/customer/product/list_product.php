       <!-- Online Store Start HERE -->
       <style>
           html {
  scroll-behavior: smooth;
}

       </style>
       <div class="full-banner">
           <div class="text-banner">
               <h2> Daily Mask</h2>
               <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus non dolores praesentium magnam! Modi sint sapiente aperiam cum explicabo aliquid magni, quisquam consequuntur ad, veritatis quis laborum recusandae eaque illum.</p>
               <button> <a href="#online-store"> Beli Sekarang</a></button>
           </div>
       </div>
       <section class="online-store" id="online-store">
        <div class=products>
            <div class="category">
                <ul>
                    <li><a href="<?= base_url('product_customer/list_product') ?>"> ALL</a></li>
                    <?php
                    foreach ($category as $category1):
                        ?>
                        <li><a href="<?= base_url('product_customer/category_product/'.$category1['id']) ?>"><?= $category1['nama_category'] ?></a></li>
                    <?php endforeach; ?>
                </ul>
              </div>
            <ul class="product-display">
                <?php foreach ($list_product as $value):?>
                <li>
                    <form action="<?= base_url('product_customer/add_transaksi') ?>" method="post">
                    <div class="product-display-each">
                        <h1 style="padding-top:5px;">
                    <?php 
                        $id = $value['id'];
                        // $id_category = $value['id_category'];
                       
?>
                    </h1>
                        <?php 
                        $query = $this->db->get_where('gambar',['id_product'=>$id])->row_array();

                        ?>
                        <a href="<?= base_url('product_customer/detail_product/'.$customer['id'].'/'.$id) ?>"><img src="<?= base_url() ?>assets/admin/img/product/<?= $query['gambar'] ?>" alt="" style="width: 80%; height:200px; margin-top: 40px;"></a>
                        <div class="product-title" >
                            <h3> <?php  $category = $this->db->query("SELECT * FROM category JOIN category_product WHERE category_product.id_product='$id' AND category_product.id_category=category.id")->result_array();
                        foreach ($category as $category) {
                            echo $category['nama_category'].' ';
                        } ?></h3>
                            <h5> <?= $value['keterangan']; ?> </h5>
                            <span class="price">Rp <?= $value['harga'] ?></span>
                            <input type="hidden" name="id_customer" value="<?= $customer['id'] ?>">
                            <input type="hidden" name="id_product" value="<?= $value['id'] ?>">
                            <input type="hidden" name="pcs" value="1">
                            <input type="hidden" name="harga" value="<?= $value['harga'] ?>">
                            <input type="hidden" name="catatan">
                            <input type="hidden" name="total" value="<?= $value['harga'] ?>">
                                <!-- <button type="submit" name="keranjang"><img src=") ?>assets/customer/img/add-to-cart.png" alt="" style="width: 20px;"></button> -->
                                <a href="<?= base_url('product_customer/detail_product/'.$customer['id'].'/'.$id) ?>"><img src="<?= base_url() ?>assets/customer/img/add-to-cart.png" alt="" style="width: 20px;"></a>
                            </div>
                        </div>
                    </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
       </section>

       <div class="clear"></div>


   
 <!-- Footer -->
 <footer class="footer">
        <div class="container subfooter">
            <div class="address">
                <img src="<?= base_url() ?>assets/customer/img/logo-mutil-plus-one1 (1).png" alt="" class="footer-img">
                <div class="company-addres1">
                    <p class="company">PT. MULTI ONE PLUS</p>
                    <p class="company-address">Jl.Barokah, Kp Parungdengdek, No.09 Kelurahan Wanaherang, Kec. Gunung Putri, Kab.Bogor Provinsi, Jawa Barat</p>
                </div>
            </div>

        </div>
        <p class="copyright">&copy; 2020 PT MULTI ONE PLUS, Proudly created by <a href=""> MIACOMPANY.ID </a></p>
    </footer>

</body>
</html>