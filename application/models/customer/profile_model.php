<?php 
class Profile_model extends CI_Model{
    public function save_profile(){
        $nama = $this->input->post('nama');
        $username= $this->input->post('username');
        $notlp =$this->input->post('notlp');
        $email = $this->input->post('email');
        $id = $this->input->post('id');
        $tgl_lahir = $this->input->post('trip-start');
        $gambar = $_FILES['gambar']['name'];
        $config['upload_path'] = './assets/customer/img/profile/'; //path folder
	    $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = false; //nama yang terupload nantinya
        $this->load->library('upload',$config);
        if(!empty($_FILES['gambar']['name'])){
            if(!$this->upload->do_upload('gambar'))
                $this->upload->display_errors();	
            else
                echo "Foto berhasil di upload";
        }
        $data = [
            'nama'=>$nama,
            'username'=>$username,
            'no_tlp'=>$notlp,
            'email' =>$email,
            'tanggal_lahir'=>$tgl_lahir,
            'gambar'=>$gambar
        ];
        $this->db->where('id',$id);
        $this->db->update('customer',$data);
        redirect('profile/index');
    }
}

?>