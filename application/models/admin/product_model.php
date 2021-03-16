<?php 
 
 class Product_model extends CI_Model{
     public function readcategory(){
         return $this->db->get('category')->result_array();
     }
     public function read_product(){
         return $this->db->get('product')->result_array();
     }
     public function save_product(){
        $uri = $this->uri->segment(4);
        $nama_product = $this->input->post('nama_product');
        $category = $this->input->post('category');
        $keterangan = $this->input->post('keterangan');
        $quantity = $this->input->post('quantity');
       //  $gambar = $this->input->post('gambar');
        $price = $this->input->post('price');
        $gambar1 =  $_FILES['gambar1']['name'];
        $gambar2 =  $_FILES['gambar2']['name'];
        $gambar3 =  $_FILES['gambar3']['name'];
        // var_dump($gambar1);die;
        // $config['upload_path'] = ''.base_url().'assets/admin/img';
        // $config['allowed_types'] = 'jpg|png|jpeg';
        // $this->load->library('upload',$config);
        // $this->upload->do_upload('mainpage');
        // $res = $this->upload->data();
        // file upload image
        $config['upload_path'] = './assets/admin/img/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

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
        $data=[
            'id_product' =>$id,
            'gambar' =>$gambar1,
            'gambar2' =>$gambar2,
            'gambar3' =>$gambar3,
        ];
        $this->db->insert('gambar',$data);
        
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
     public function delete_product($uri){
         $this->db->delete('gambar',['id_product'=>$uri]);
         $this->db->delete('product',['id'=>$uri]);

     }
     public function read_productrow(){
         $uri = $this->uri->segment(4);
         $this->db->select("*");
         $this->db->from("product");
         $this->db->join("gambar","product.id=gambar.id_product");
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
         $gambar2 = $_FILES['gambar1']['name'];
         $gambar3 = $_FILES['gambar1']['name'];
         $id = $this->input->post('id');

         $config['upload_path'] = './assets/admin/img/'; //path folder
         $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
         $config['encrypt_name'] = TRUE; //nama yang terupload nantinya
 
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
         stok = '$quantity'
         WHERE id='$id'
         ");
         $this->db->query("UPDATE gambar SET
         gambar = '$gambar1',
         gambar2 = '$gambar2',
         gambar3 = '$gambar3'
         WHERE id_product= '$id'
         ");
          $this->session->set_flashdata('message','<script>Swal.fire({ position: "center",
            icon: "success",
            title: "Your product has been Updated",
            showConfirmButton: false,
            timer: 2000
        })</script>');
        redirect('admin/product/index');
     }
 }

?>