<?php 

class Product extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('admin/operator_model','operator');
        $this->load->model('admin/product_model','product');
        if (!$this->session->userdata('username')) {
            redirect('admin/login');
        }
}
    public function index(){
        $data['admin']= $this->operator->viewadmin()->row_array();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/product/product_list',$data);
        $this->load->view('admin/footer');
    }
    public function product_list_detail(){
        $data['admin'] = $this->operator->viewadmin()->row_array();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/product/product_list_detail');
        $this->load->view('admin/footer');
    }
    public function add_product(){
        $data['admin'] = $this->operator->viewadmin()->row_array();
        $data['category'] = $this->product->readcategory();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/product/add_product',$data);
        $this->load->view('admin/footer');
    }
    public function save_product(){
        $uri = $this->uri->segment(4);
        $nama_product = $this->input->post('nama_product');
        $category = $this->input->post('category');
        $keterangan = $this->input->post('keterangan');
        $quantity = $this->input->post('quantity');
       //  $gambar = $this->input->post('gambar');
        $price = $this->input->post('price');
        // $config['upload_path'] = ''.base_url().'assets/admin/img';
        // $config['allowed_types'] = 'jpg|png|jpeg';
        // $this->load->library('upload',$config);
        // $this->upload->do_upload('mainpage');
        // $res = $this->upload->data();
        $data2 = [
            'nama_product' =>$nama_product,
            'id_category' =>$category,
            'keterangan' =>$keterangan,
            'harga' =>$price
        ];
        $this->db->insert('product',$data2);
        $id = $this->db->insert_id();
        
            $jumlahgambar = count($_FILES['gambar']['name']);
            for ($i=0; $i <= $jumlahgambar ; $i++) { 
                
                if(!empty($_FILES['gambar']['name'][$i])){
                    
            // Define new $_FILES array - $_FILES['file']
            $_FILES['file']['name'] = $_FILES['gambar']['name'][$i];
            $_FILES['file']['type'] = $_FILES['gambar']['type'][$i];
            $_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
            $_FILES['file']['error'] = $_FILES['gambar']['error'][$i];
            $_FILES['file']['size'] = $_FILES['gambar']['size'][$i];
            
            // Set preference
            $config['upload_path'] = './assets/admin/img'; 
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = '5000'; // max_size in kb
            // $config['file_name'] = $_FILES['gambar']['name'][$i];
            
            //Load upload library
            $this->load->library('upload',$config); 
            
            // File upload
            if($this->upload->do_upload('file')){
                // Get data about the file
                $uploadData = $this->upload->data();
                $data['gambar'] = $uploadData['file_name'];
                $data['id_product']=$id;
                
                // Initialize array
                // $data['filenames'][] = $filename;
            }
            $this->db->insert('gambar',$data);
        }
        
  
    }



    //         $config['upload_path'] = ''.base_url().'assets/admin/img';
    //     $config['allowed_types'] = 'jpg|png|jpeg';
    //     $jumlahgambar = count($_FILES['gambar']['name']);
    //    for ($i=0; $i <= $jumlahgambar; $i++ ){
    //        if(!empty($_FILES['gambar']['name'][$i])){
    //            $_FILES['file']['name'] = $_FILES['gambar']['name'][$i];
    //            $_FILES['file']['type'] = $_FILES['gambar']['type'][$i];
    //            $_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
    //            $_FILES['file']['error'] = $_FILES['gambar']['error'][$i];
    //            $_FILES['file']['size'] = $_FILES['gambar']['size'][$i];
    //            if($this->upload->do_upload('file')){
    //                $uploadData = $this->upload->data();
    //                    $data['image'] = $uploadData['file_name'];
    //                    foreach ($id as $k) {
    //                        $data['id_product'] = $k;  
    //                    }
    //                 }
    //                 var_dump($data);die;
    //         //    $this->db->insert('gambar',$data);
    //        }
    //        redirect('admin/product/index/',$uri);
    //    }
    

    // $config['upload_path']          = './assets/admin/img/';
    // $config['allowed_types']        = 'gif|jpg|png';
	// 	$config['max_size']             = 1050;
	// 	$config['encrypt_name'] 		= true;
	// 	$this->load->library('upload',$config);
    //     $this->upload->initialize($config);
	// 	// $keterangan_berkas = $this->input->post('keterangan_berkas');
	// 	$jumlah_berkas = count($_FILES['gambar']['name']);
    //     // var_dump($jumlah_berkas);die;
	// 	for($i=1; $i <= $jumlah_berkas; $i++){
    //         // echo $i;
    //         if(!empty($_FILES['gambar']['name'][$i])){
	//     		if(!$this->upload->do_upload('gambar'.$i)){
    //                 $this->upload->display_errors();	
    //             }else{
	//     			echo "Foto berhasil di upload";
    //                 // $data['id_product'] = $id[$i];
    //             }
    //         //     $uploadData = $this->upload->data();
    //         //     $data['gambar'] = $uploadData['file_name'];
    //         // var_dump($data);die;
    //         }
    //                 // $data['id_product'] = $id[$i];  
                    
	// 				// $this->db->insert('gambar',$data);
	// 	}
    }
}

