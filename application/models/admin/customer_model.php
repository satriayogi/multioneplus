<?php 
class Customer_model extends CI_Model{
    public function customer_list(){
        return $this->db->get('customer')->result_array();
    }
    public function update_status(){
        $status = $this->input->post('status');
        $id = $this->input->post('id');
        $admin = $this->input->post('admin');
        $this->db->query("UPDATE customer SET
        status = '$status'
        WHERE id='$id'
         ");
         $this->session->set_flashdata('message','<script>Swal.fire({ position: "center",
            icon: "success",
            title: "Your Success Update Customer",
            showConfirmButton: false,
            timer: 2000
        })</script>');
         redirect('customer/index/'.$admin);
    }
}



?>