<?php 
class Category_model extends CI_Model{
    public function viewadmin(){
        return $this->db->get_where('sys_user',['username'=>$this->session->userdata('username')]);
    }
    public function save_category(){
        $uri = $this->uri->segment(4);
        $data= [
            'nama_category'=>$this->input->post('category'),
        ];
        $this->db->insert('category',$data);
        $this->session->set_flashdata('message','<script>Swal.fire({ position: "center",
            icon: "success",
            title: "Your Category has been saved",
            showConfirmButton: false,
            timer: 2000
        })</script>');
        redirect('admin/category/index/'.$uri);
    }
    public function read_category(){
       return $this->db->get('category')->result_array();
    }
    public function delete_category(){
        $uri = $this->uri->segment(4);
        $this->db->delete('category',['id'=>$uri]);
        redirect('admin/category/index');
    }
    
}

?>