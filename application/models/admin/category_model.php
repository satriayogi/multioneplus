<?php 
class Category_model extends CI_Model{
    public function viewadmin(){
        return $this->db->get_where('sys_user',['username'=>$this->session->userdata('username')]);
    }
    public function save_category(){
        $uri = $this->uri->segment(3);
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
        redirect('category/index/'.$uri);
    }
    public function read_category(){
        $this->db->select("*");
        $this->db->from("category");
        $this->db->order_by('id','DESC');
        $query= $this->db->get();
       return $query->result_array();
    }
    public function delete_category(){
        $uri = $this->uri->segment(3);
        $this->db->delete('category',['id'=>$uri]);
        $this->db->delete('sub_category',['id_category'=>$uri]);
        redirect('category/index');
    }
    public function save_subcategory(){
        $category = $this->input->post('id_category');
        $admin = $this->input->post('admin');
        $subcategory = $this->input->post('subcategory');
        $data =[
            'id_category'=>$category,
            'nama_sub_category'=>$subcategory,
            'status' =>1
        ];
        $this->db->insert('sub_category',$data);
        $this->session->set_flashdata('message','<script>Swal.fire({ position: "center",
            icon: "success",
            title: "Your Category has been saved",
            showConfirmButton: false,
            timer: 2000
        })</script>');
        redirect('category/sub_category/'.$admin.'/'.$category);
    }
    public function read_subcategory(){
        $uri = $this->uri->segment(4);
        $this->db->select("*");
        $this->db->from("category");
        $this->db->join("sub_category","sub_category.id_category=category.id");
        $this->db->where("sub_category.id_category='$uri'");
        $this->db->order_by("sub_category.id","DESC");
        $query = $this->db->get();
        return $query->result_array();
    }
    public function update_category(){
        $id_category = $this->input->post('id_category');
        $category = $this->input->post('category');
        $admin = $this->input->post('admin');
        // $id_category = $this->input->post('id_category');
        $this->db->query("UPDATE category SET
        nama_category = '$category'
        WHERE id='$id_category'
        ");
        $this->session->set_flashdata('message','<script>Swal.fire({ position: "center",
            icon: "success",
            title: "Your Category has been saved",
            showConfirmButton: false,
            timer: 2000
        })</script>');
        redirect('category/index/'.$admin);
    }
    public function update_subcategory(){
        $admin = $this->input->post('admin');
        $id_subcategory = $this->input->post('id_subcategory');
        $id_category = $this->input->post('id_category');
        $nama_subcategory = $this->input->post('subcategory');
        $this->db->query("UPDATE sub_category SET
        nama_sub_category = '$nama_subcategory'
        WHERE id='$id_subcategory'
        ");
        $this->session->set_flashdata('message','<script>Swal.fire({ position: "center",
            icon: "success",
            title: "Your Category has been saved",
            showConfirmButton: false,
            timer: 2000
        })</script>');
        redirect('category/sub_category/'.$admin.'/'.$id_category);
    }
}

?>