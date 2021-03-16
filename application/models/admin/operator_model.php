<?php 

class operator_model extends CI_Model{
    public function viewadmin(){
        return $this->db->get_where('sys_user',['username'=>$this->session->userdata('username')]);
    }
    public function save_operator(){
        $data = [
            'nama'=>$this->input->post('nama'),
            'email'=>$this->input->post('email'),
            'alamat'=>$this->input->post('alamat'),
            'no_tlp'=>$this->input->post('no_tlp'),
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password'),
            'status'=>1,
        ];
        $this->db->insert('sys_user',$data);
        $id = $this->db->insert_id();
        $data2= [
            'id_sys_user'=>$id,
            'operator' =>$this->input->post('operator'),
            'product' =>$this->input->post('product'),
            'category' =>$this->input->post('category'),
            'laporan' =>$this->input->post('laporan'),
        ];
        $this->db->insert('role_sys_user',$data2);
        $this->session->set_flashdata('message','<script>Swal.fire({ position: "center",
            icon: "success",
            title: "Your Operator has been saved",
            showConfirmButton: false,
            timer: 2000
        })</script>');
        redirect('admin/operator/index');
    }
    public function read_operator(){
        return $this->db->get('sys_user')->result_array();
    }
    public function edit_operator(){
        $uri = $this->uri->segment(4);
        $this->db->select('*');
        $this->db->from('sys_user');
        $this->db->join('role_sys_user','sys_user.id=role_sys_user.id_sys_user');
        $this->db->where("sys_user.id='$uri'");
        $query=$this->db->get();
        return $query->row_array();
        // var_dump($query);die;
    }
    public function delete_operator(){
        $uri = $this->uri->segment(4);
    $this->db->delete('sys_user',['id'=>$uri]);
    $this->db->delete('role_sys_user',['id_sys_user'=>$uri]);
    redirect('admin/operator/index');
    }
    public function update_operator(){
        $uri = $this->input->post('id');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $no_tlp = $this->input->post('no_tlp');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $operator = $this->input->post('operator');
        $product = $this->input->post('product');
        $category = $this->input->post('category');
        $laporan = $this->input->post('laporan');
        $this->db->query("UPDATE sys_user SET 
        nama = '$nama',
        email = '$email',
        alamat = '$alamat',
        no_tlp = '$no_tlp',
        username = '$username',
        password = '$password'
        WHERE id='$uri'
        ");
        $this->db->query("UPDATE role_sys_user SET
        operator = '$operator',
        product = '$product',
        category = '$category',
        laporan = '$laporan'
        WHERE id_sys_user='$uri'
        ");
        $this->session->set_flashdata('message',' <script>Swal.fire({ position: "center",
            icon: "success",
            title: "Your Operator has been updated",
            showConfirmButton: false,
            timer: 2000
          })</script>');
        redirect('admin/operator/index');
    }
}

?>