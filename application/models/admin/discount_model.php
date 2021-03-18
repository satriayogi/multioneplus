<?php 

class Discount_model extends CI_Model{
    public function save_discount(){
        $product = $this->input->post('product');
        $potongan = $this->input->post('potongan');
        $discount = $this->input->post('randomfield');
        $data = [
            'id_product' => $product,
            'kode_discount' => $discount,
            'potongan' => $potongan,
        ];
        $this->db->insert('discount',$data);
        $this->session->set_flashdata('message',' <script>Swal.fire({ position: "center",
            icon: "success",
            title: "Your Discount has been Saved",
            showConfirmButton: false,
            timer: 2000
          })</script>');
          redirect('discount/index');
    }
    public function discount_list(){
        $this->db->select("*");
        $this->db->from("discount");
        $this->db->join("product","product.id=discount.id_product");
        $this->db->order_by('discount.id','DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function delete_discount(){
        $uri = $this->uri->segment(3);
        // var_dump($uri);die;
        $this->db->delete('discount',['id_product'=>$uri]);
        redirect('discount/index');
    }
}
 


?>