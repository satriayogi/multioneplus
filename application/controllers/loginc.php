<?php 
class Loginc extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    
    public function customer(){
        $this->form_validation->set_rules('username','Username or Email','required');
        $this->form_validation->set_rules('password','Password','required');
        if ($this->form_validation->run() == false) {
            $this->load->view('customer/auth/login');
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->db->select("*");
            $this->db->from("customer");
            $this->db->where('username',$username)
            ->or_where('email',$username);
            $customer= $this->db->get()->row_array();
            if ($customer) {
                if ($customer['status'] == 1) {
                    if (password_verify($password,$customer['password'])) {
                        $data = [
                            'username'=>$customer['username'],
                            'email'=>$customer['email'],
                            'id'=>$customer['id']
                        ];
                        
                        $this->session->set_userdata($data);
                        redirect('list_product/index');
                    }else{
                        $this->session->set_flashdata('message','<script>Swal.fire({icon: "error",title: "Oops...",text: "sorry the password you entered is wrong"})</script>');
                    redirect('loginc/customer');
                }
            }else{
                    $this->session->set_flashdata('message','<script>Swal.fire({icon: "error",title: "Oops...",text: "sorry username or email is  not registered"})</script>');
                redirect('loginc/customer');
                
            }
        }else{
                $this->session->set_flashdata('message','<script>Swal.fire({icon: "error",title: "Oops...",text: "the password you entered is wrong "})</script>');
            redirect('loginc/customer');

            }
        }
    }
    public function logout_customer()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('list_product/index');
    }
}



?>