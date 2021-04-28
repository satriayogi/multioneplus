<?php 

class Contact_model extends CI_Model{

    public function save_kontak(){
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $nohp = $this->input->post('nohp');
        $pesan = $this->input->post('pesan');
        $data=[
            'nama'=>$nama,
            'email'=>$email,
            'nohp'=>$nohp,
            'pesan'=>$pesan
        ];
        $this->db->insert('message',$data);
        $this->session->set_flashdata('message','<script>alert("your message has been sent")</script>');
        redirect('kontak/index');
    }
    public function list_contact(){
        return $this->db->get('message')->result_array();
    }
}


?>