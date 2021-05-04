<?php 
class Register_model extends CI_Model{
    public function save_register(){
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data=[
            'nama'=>$nama,
            'email'=>$email,
            'username'=>$username,
            'password'=>password_hash($password,PASSWORD_DEFAULT),
            'status'=>1
        ];
        $this->db->insert('customer',$data);
        $this->session->set_flashdata('message','<script>Swal.fire({ position: "center",
            icon: "success",
            title: "Your Success Register",
            showConfirmButton: false,
            timer: 2000
        })</script>');
        redirect('loginc/customer');
    } 
}


?>