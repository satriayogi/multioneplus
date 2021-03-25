<?php 
  class Product_model extends CI_Model{
     public function readcategory(){
         $this->db->select('*');
         $this->db->from('category');
         $this->db->order_by('id','DESC');
         $query = $this->db->get();
         return $query->result_array();
     }
     public function read_product(){
         $this->db->select('*');
         $this->db->from('product');
         $this->db->join('gambar','product.id=gambar.id_product');
         $this->db->join('category','product.id_category=category.id');
         $query = $this->db->get();
         return $query->result_array();
        }
        public function save_product(){
            $uri = $this->uri->segment(3);
            $nama_product = $this->input->post('nama_product');
            $category = $this->input->post('category');
            $keterangan = $this->input->post('keterangan');
            $quantity = $this->input->post('quantity');
            $price = $this->input->post('price');
            $warna = $this->input->post('warna');
            // var_dump($warna);die;
        $gambar1 =  $_FILES['gambar1']['name'];
        $gambar2 =  $_FILES['gambar2']['name'];
        $gambar3 =  $_FILES['gambar3']['name'];
        $gambar4 =  $_FILES['gambar4']['name'];
        // var_dump($gambar1);die;
        // $config['upload_path'] = ''.base_url().'assets/admin/img';
        // $config['allowed_types'] = 'jpg|png|jpeg';
        // $this->load->library('upload',$config);
        // $this->upload->do_upload('mainpage');
        // $res = $this->upload->data();
        // file upload image
        $config['upload_path'] = './assets/admin/img/product/'; //path folder
	    $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = false; //nama yang terupload nantinya

	    $this->load->library('upload',$config);
	    for ($i=0; $i <=3 ; $i++) { 
	    	if(!empty($_FILES['gambar'.$i]['name'])){
	    		if(!$this->upload->do_upload('gambar'.$i))
	    			$this->upload->display_errors();	
	    		else
	    			echo "Foto berhasil di upload";
	    	}
	    }
// end uploads
        $data2 = [
            'nama_product' =>$nama_product,
            'id_category' =>$category,
            'keterangan' =>$keterangan,
            'harga' =>$price,
            'stok' =>$quantity,
            'status' => 99
        ];
        $this->db->insert('product',$data2);
        $id = $this->db->insert_id();
        $result = array();
        foreach ($warna as $key => $value) {
            $result[] = array(
                'id_product' => $id,
                'id_stylecolor' =>  $warna[$key]
            );
        }
        $this->db->insert_batch('warna',$result);
        $data=[
            'id_product' =>$id,
            'gambar' =>$gambar1,
            'gambar2' =>$gambar2,
            'gambar3' =>$gambar3,
            'gambar4' =>$gambar4,
        ];
        $this->db->insert('gambar',$data);

        // $data3=[
        //     'id_product'=>$id,
        //     'birumuda'=>$birumuda,
        //     'birulangit' => $birulangit,
        //     'coklat'=>$coklat,
        //     'abu-abu'=>$abu,
        //     'putih'=>$putih,
        // ];
        // $this->db->insert('warna',$data3);
        
            // $jumlahgambar = count($_FILES['gambar']['name']);
            // for ($i=0; $i <= $jumlahgambar ; $i++) { 
                
            //     if(!empty($_FILES['gambar']['name'][$i])){
                    
            // // Define new $_FILES array - $_FILES['file']
            // $_FILES['file']['name'] = $_FILES['gambar']['name'][$i];
            // $_FILES['file']['type'] = $_FILES['gambar']['type'][$i];
            // $_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
            // $_FILES['file']['error'] = $_FILES['gambar']['error'][$i];
            // $_FILES['file']['size'] = $_FILES['gambar']['size'][$i];
            
            // // Set preference
            // $config['upload_path'] = './assets/admin/img'; 
            // $config['allowed_types'] = 'jpg|jpeg|png|gif';
            // $config['max_size'] = '5000'; // max_size in kb
            // // $config['file_name'] = $_FILES['gambar']['name'][$i];
            
            // //Load upload library
            // $this->load->library('upload',$config); 
            
            // // File upload
            // if($this->upload->do_upload('file')){
            //     // Get data about the file
            //     $uploadData = $this->upload->data();
            //     $data['gambar'] = $uploadData['file_name'];
            //     $data['id_product']=$id;
                
            //     // Initialize array
            //     // $data['filenames'][] = $filename;
            // }
            // $this->db->insert('gambar',$data);
        // }
    
    // }

     }
     public function delete_product(){
         $uri = $this->uri->segment(4);
        //  var_dump($uri);die;
         $this->db->delete('gambar',['id_product'=>$uri]);
         $this->db->delete('product',['id'=>$uri]);

     }
     public function read_productrow(){
         $uri = $this->uri->segment(4);
         $this->db->select("*");
         $this->db->from("product");
         $this->db->join("gambar","product.id=gambar.id_product");
         $this->db->order_by('product.id','DESC');
         $this->db->where("product.id='$uri'");
         $query = $this->db->get();
         return $query->row_array();

     }
     public function update_product(){
         $nama = $this->input->post('nama_product');
         $category = $this->input->post('category');
         $keterangan = $this->input->post('keterangan');
         $quantity = $this->input->post('quantity');
         $price = $this->input->post('price');
         $gambar1 =$_FILES['gambar1']['name'];
         $gambar2 = $_FILES['gambar2']['name'];
         $gambar3 = $_FILES['gambar3']['name'];
         $gambar4 = $_FILES['gambar4']['name'];
         $id = $this->input->post('id');
         $gambar1value = $this->input->post('gambar11');
         $gambar2value = $this->input->post('gambar12');
         $gambar3value = $this->input->post('gambar13');
         $gambar4value = $this->input->post('gambar14');
         $warna = $this->input->post('warna');
         $diskon = $this->input->post('discount');
         
         $config['upload_path'] = './assets/admin/img/product/'; //path folder
         $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
         $config['encrypt_name'] = false; //nama yang terupload nantinya
 
         $this->load->library('upload',$config);
         for ($i=0; $i <=3 ; $i++) { 
             if(!empty($_FILES['gambar'.$i]['name'])){
                 if(!$this->upload->do_upload('gambar'.$i))
                     $this->upload->display_errors();	
                 else
                     echo "Foto berhasil di upload";
             }
         }

         $this->db->query("UPDATE product SET
         nama_product = '$nama',
         id_category = '$category',
         keterangan = '$keterangan',
         harga = '$price',
         discount = '$diskon',
         stok = '$quantity'
         WHERE id='$id'
         ");
         $this->db->delete('warna',['id_product'=>$id]);
         $result=array();
         foreach ($warna as $key => $value) {
             $result[] = array(
                 'id_product'=>$id,
                 'id_stylecolor'=>$warna[$key]
             );
         }
         $this->db->insert_batch('warna',$result);

        //  $this->db->query("UPDATE gambar SET
        //  gambar = '$gambar1',
        //  gambar2 = '$gambar2',
        //  gambar3 = '$gambar3'
        //  WHERE id_product= '$id'
        //  ");
        if ($gambar1 == null && $gambar2==null && $gambar3==null && $gambar4 == null){
            // var_dump('masuk');die;
            $this->db->query("UPDATE gambar SET
            gambar = '$gambar1value',
            gambar2 = '$gambar2value',
            gambar3 = '$gambar3value',
            gambar4 = '$gambar4value'
            WHERE id_product= '$id'
            ");
            // var_dump($gambar3value);die;
         }
         if ($gambar1 == null ) {
            // var_dump('masuk');die;
            $this->db->query("UPDATE gambar SET
            gambar = '$gambar1value',
            gambar2 = '$gambar2',
            gambar3 = '$gambar3',
            gambar4 = '$gambar4'
            WHERE id_product= '$id'
            ");
         }
         if ($gambar2 == null) {
            // var_dump('masuk');die;
            $this->db->query("UPDATE gambar SET
            gambar = '$gambar1',
            gambar2 = '$gambar2value',
            gambar3 = '$gambar3',
            gambar4 = '$gambar4value'
            WHERE id_product= '$id'
            ");
         }
         if ($gambar3 == null) {
            //  var_dump('masuk');die;
            $this->db->query("UPDATE gambar SET
            gambar = '$gambar1',
            gambar2 = '$gambar2',
            gambar3 = '$gambar3value',
            gambar4 = '$gambar4'
            WHERE id_product= '$id'
            ");
         }
         if ($gambar4 == null) {
        //   var_dump('masuk');die;
            $this->db->query("UPDATE gambar SET
            gambar = '$gambar1',
            gambar2 = '$gambar2',
            gambar3 = '$gambar3',
            gambar4 = '$gambar4value'
            WHERE id_product= '$id'
            ");
         }if ($gambar1 == null && $gambar2 == null) {
            //  var_dump("masuk");die;
            $this->db->query("UPDATE gambar SET
            gambar = '$gambar1value',
            gambar2 = '$gambar2value',
            gambar3 = '$gambar3'
            gambar4 = '$gambar4'
            WHERE id_product= '$id'
            ");
         }if ($gambar1 == null && $gambar3 == null) {
            //  var_dump('masuk');die;
             $this->db->query("UPDATE gambar SET
            gambar = '$gambar1value',
            gambar2 = '$gambar2',
            gambar3 = '$gambar3value'
            gambar4 = '$gambar4'
            WHERE id_product= '$id'
            ");
            // var_dump("masuk");die;
         }
         if ($gambar2 == null && $gambar3 == null) {
            //  var_dump('masuk');die;
              $this->db->query("UPDATE gambar SET
             gambar = '$gambar1',
             gambar2 = '$gambar2value',
             gambar3 = '$gambar3value',
             gambar4 = '$gambar4'
             WHERE id_product= '$id'
             ");
             // var_dump($gambar3value);die;
            }
            if ($gambar2 == null && $gambar4 == null) {
                // var_dump('masuk');die;
                $this->db->query("UPDATE gambar SET
            gambar = '$gambar1',
            gambar2 = '$gambar2value',
            gambar3 = '$gambar3',
            gambar4 = '$gambar4value'
            WHERE id_product= '$id'
            ");
            // var_dump($gambar3value);die;
         }
         if ($gambar3 == null && $gambar4 == null) {
            $this->db->query("UPDATE gambar SET
            gambar = '$gambar1',
            gambar2 = '$gambar2',
            gambar3 = '$gambar3value',
            gambar4 = '$gambar4value'
            WHERE id_product= '$id'
            ");
            // var_dump('masuk');die;
         }
         if ($gambar1 == null && $gambar4 == null) {
            $this->db->query("UPDATE gambar SET
            gambar = '$gambar1value',
            gambar2 = '$gambar2',
            gambar3 = '$gambar3',
            gambar4 = '$gambar4value'
            WHERE id_product= '$id'
            ");
            // var_dump('masuk');die;
         }
         if ($gambar1 == null && $gambar2 == null && $gambar3 == null ) {
            $this->db->query("UPDATE gambar SET
            gambar = '$gambar1value',
            gambar2 = '$gambar2value',
            gambar3 = '$gambar3value',
            gambar4 = '$gambar4'
            WHERE id_product= '$id'
            ");
         }
         if ($gambar1 == null && $gambar2 == null && $gambar4 == null) {
            $this->db->query("UPDATE gambar SET
            gambar = '$gambar1value',
            gambar2 = '$gambar2value',
            gambar3 = '$gambar3',
            gambar4 = '$gambar4value'
            WHERE id_product= '$id'
            ");
         }
         if ($gambar1 == null && $gambar3 == null && $gambar4 == null) {
        //    var_dump('masuk');die;
            $this->db->query("UPDATE gambar SET
            gambar = '$gambar1value',
            gambar2 = '$gambar2',
            gambar3 = '$gambar3value',
            gambar4 = '$gambar4value'
            WHERE id_product= '$id'
            ");
         }
         if ($gambar2 == null && $gambar3 == null && $gambar4 == null) {
            $this->db->query("UPDATE gambar SET
            gambar = '$gambar1',
            gambar2 = '$gambar2value',
            gambar3 = '$gambar3value',
            gambar4 = '$gambar4value'
            WHERE id_product= '$id'
            ");
         }
          $this->session->set_flashdata('message','<script>Swal.fire({ position: "center",
            icon: "success",
            title: "Your product has been Updated",
            showConfirmButton: false,
            timer: 2000
        })</script>');
        redirect('product/index');
     }
     public function save_color(){
         $namawarna = $this->input->post('nama_warna');
         $stylewarma = $this->input->post('style_warna');
         $admin = $this->input->post('admin');
         $data = [
             'nama_warna'=>$namawarna,
             'warna'=>$stylewarma
         ];
         $this->db->insert('style_warna',$data);
         $this->session->set_flashdata('message','<script>Swal.fire({ position: "center",
            icon: "success",
            title: "Your Color has been Saved",
            showConfirmButton: false,
            timer: 2000
        })</script>');
        redirect('product/color_list/',$admin);
     }
     public function color_list(){
         return $this->db->get('style_warna')->result_array();
         
     }
     public function update_color(){
         $nama_warna = $this->input->post('nama_warna');
         $style_warna = $this->input->post('style_warna');
         $admin = $this->input->post('admin');
         $id_warna = $this->input->post('id');
         $this->db->query("UPDATE style_warna SET
         nama_warna = '$nama_warna',
         warna = '$style_warna'
         WHERE id='$id_warna'
         ");
         $this->session->set_flashdata('message','<script>Swal.fire({ position: "center",
            icon: "success",
            title: "Your Color has been Updated",
            showConfirmButton: false,
            timer: 2000
        })</script>');
        redirect('product/color_list/'.$admin);
     }
 }

?>