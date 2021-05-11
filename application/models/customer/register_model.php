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
            'status'=>0
        ];
        // menyiapkan token
        $token = base64_encode(random_bytes(32));
        $data2=[
            'email'=>$email,
            'token'=>$token,
            'create_date'=>time()
        ];
        $this->db->insert('customer_token',$data2);
        $this->db->insert('customer',$data);
        $this->_sendmail($token,'verify');
        $this->session->set_flashdata('message','<script>Swal.fire({ position: "center",
            icon: "success",
            title: "Your Success Register",
            showConfirmButton: false,
            timer: 2000
        })</script>');
        redirect('loginc/customer');
    } 
    private function _sendmail($token, $type){
        $email = $this->input->post('email');

        $this->load->library('phpmailer_lib');
    $mail = $this->phpmailer_lib->load();
        //Server settings
        $mail->SMTPDebug = 1;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'multioneplus.store';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'info@multioneplus.store';                     // SMTP username
        $mail->Password   = 'PnY97F(eXCRH';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->SetFrom('info@multioneplus.store', 'multioneplus');
        
        $mail->addAddress(''.$email.'');               // Name is optional
        $mail->addReplyTo(''.$email.'');
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        if ($type == 'verify') {
            $mail->Subject = 'Account Verification';
           $mail->Body    = 'Click this link to verify you account: <a href="'.base_url().'loginc/verify?email='.$email.'&token='.urlencode($token).'">Activate</a>';
        }
        $send = $mail->send();
        if($send){ // Jika Email berhasil dikirim
            echo ' berhasil';
        }else{ // Jika Email Gagal dikirim
         echo 'eror';
        }
//     // end send to email
    }
}


?>