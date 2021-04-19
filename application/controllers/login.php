<?php 
class Login extends CI_Controller{
    public function index(){
        $this->load->view('admin/auth/login');
    }
    public function validlogin(){
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');
        if ($this->form_validation->run() != false) {
            $this->_login();
        }else{
            $this->load->view('login/index');
        }
    }
    public function _login(){
        $this->load->model('admin/auth_model','auth');
        $username =  $this->input->post('username');
        $password = $this->input->post('password');
    //    $adminlogin= $this->operator->adminlogin($username,$password);
       $operator = $this->db->get_where('sys_user',['username'=>$username])->row_array();
       if($operator){
        if ($password == $operator['password']) {
            $data =[
                'username'=>$username,
                'id' =>$operator['id'],
            ];
            // $this->OperatorModel->update_login($operator['id']);
            $this->session->set_userdata($data);
            redirect('admin/index');
        }else {
            $this->session->set_flashdata('message',' <script>Swal.fire({icon: "error",title: "Oops...",text: " username you entered is wrong"})</script>');
            redirect('login/index');
        }
    }else{
        
        $this->session->set_flashdata('message','<script>Swal.fire({icon: "error",title: "Oops...",text: " username you entered is wrong"})</script>');
        redirect('login/index');
    }
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
                            'email'=>$customer['email']
                        ];
                        
                        $this->session->set_userdata($data);
                        redirect('product_customer/list_product');
                    }else{
                        $this->session->set_flashdata('message','<script>Swal.fire({icon: "error",title: "Oops...",text: "sorry the password you entered is wrong"})</script>');
                    redirect('login/customer');
                }
            }else{
                    $this->session->set_flashdata('message','<script>Swal.fire({icon: "error",title: "Oops...",text: "sorry username or email is  not registered"})</script>');
                redirect('login/customer');
                
            }
        }else{
                $this->session->set_flashdata('message','<script>Swal.fire({icon: "error",title: "Oops...",text: "the password you entered is wrong "})</script>');
            redirect('login/customer');

            }
        }
    }
}


?>