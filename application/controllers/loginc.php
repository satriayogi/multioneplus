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
                if ($customer['status'] ==1) {
                    
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
                $this->session->set_flashdata('message','<script>Swal.fire({icon: "error",title: "Oops...",text: "account has not been verified "})</script>');
                redirect('loginc/customer');
                
            }
        }else{
            $this->session->set_flashdata('message','<script>Swal.fire({icon: "error",title: "Oops...",text: "account has not been verified"})</script>');
            redirect('loginc/customer');

        }
        }
    }
    public function verify(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        
        $customer = $this->db->get_where('customer',['email'=>$email])->row_array();
        if ($customer) {
            $customer_token = $this->db->get_where('customer_token',['token'=>$token])->row_array();
            if ($customer_token) {
                if (time() - $customer_token['create_date'] < (60*60*24)) {
                    $this->db->set('status',1);
                    $this->db->where('email',$email);
                    $this->db->update('customer');
                   $this->db->delete('customer_token',['email'=>$email]);
                   $this->session->set_flashdata('message','<script>Swal.fire({position: "center",icon: "success",title: "Your work has been saved",showConfirmButton: false,
                    timer: 1500
                  })</script>');
               redirect('loginc/customer');
                }else{
                    $this->db->delete('customer',['email'=>$email]);
                    $this->db->delete('customer_token',['email'=>$email]);
                    $this->session->set_flashdata('message','<script>Swal.fire({icon: "error",title: "Oops...",text: "Account Activate failed! token expired"})</script>');
                redirect('loginc/customer');

                }
            }else{
                $this->session->set_flashdata('message','<script>Swal.fire({icon: "error",title: "Oops...",text: "Account Activate failed! Wrong token "})</script>');
            redirect('loginc/customer');
            }
            
        }else{
            $this->session->set_flashdata('message','<script>Swal.fire({icon: "error",title: "Oops...",text: "Account Activate failed "})</script>');
        redirect('loginc/customer');
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