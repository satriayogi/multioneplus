<?php
class slideshow_model extends CI_Model{

    public function slideshow(){
        $this->db->select("*");
        $this->db->from("slideshow");
        $this->db->order_by("slideshow.id",'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function save_slideshow(){
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $gambar = $_FILES['gambar']['name'];
        $alt = $this->input->post('alt');
        $url = $this->input->post('url');
        $namebutton = $this->input->post('namebutton');
        $position = $this->input->post('position');
        // upload image
        $config['upload_path'] = './assets/admin/img/slideshow/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        // $config['max_size'] = 900;
        $config['encrypt_name'] = false; //nama yang terupload nantinya

        $this->load->library('upload',$config);
        if (!$this->upload->do_upload('gambar')) {
           echo $this->upload->display_errors();
        }else{
            $this->upload->data();
            echo "berhasil";
        }
        $data = [
            'gambar' => $gambar,
            'title' => $title,
            'isi'=> $content,
            'alt' => $alt,
            'url' =>$url,
            'name_button' =>$namebutton,
            'position' =>$position
        ];
        $this->db->insert('slideshow',$data);
        $this->session->set_flashdata('message','<script>Swal.fire({ position: "center",
            icon: "success",
            title: "Your Slideshow has been saved",
            showConfirmButton: false,
            timer: 2000
        })</script>');
        redirect('slideshow/index');

    }
    public function update_slideshow(){
        $id = $this->input->post('id');
        $title = $this->input->post('title');
        $content = $this->input->post('content');
        $gambar = $this->input->post('gambar1');
        $image = $_FILES['gambar']['name'];
        $alt = $this->input->post('alt');
        $url = $this->input->post('url');
        $name_button = $this->input->post('namebutton');
        $position = $this->input->post('position');

        if ($image == null) {
         
            $this->db->query("UPDATE slideshow SET
            title = '$title',
            isi ='$content',
            gambar ='$gambar',
            alt = '$alt',
            url ='$url',
            name_button ='$name_button',
            position ='$position'
            WHERE id='$id'
            ");
            $this->session->set_flashdata('message','<script>Swal.fire({ position: "center",
                icon: "success",
                title: "Your Slideshow has been Update",
                showConfirmButton: false,
                timer: 2000
            })</script>');
            redirect('slideshow/index');
        }else{
               // upload image
        $config['upload_path'] = './assets/admin/img/slideshow/'; //path folder
        $config['allowed_types'] = 'jpg|png|jpeg'; //type yang dapat diakses bisa anda sesuaikan
        // $config['max_size'] = 900;
        $config['encrypt_name'] = false; //nama yang terupload nantinya

        $this->load->library('upload',$config);
        if (!$this->upload->do_upload('gambar')) {
           echo $this->upload->display_errors();
        }else{
            $this->upload->data();
            echo "berhasil";
        }
        $this->db->query("UPDATE slideshow SET
        title = '$title',
        isi ='$content',
        gambar ='$image',
        alt = '$alt',
        url ='$url',
        name_button ='$name_button',
        position ='$position'
        WHERE id='$id'
        ");
        $this->session->set_flashdata('message','<script>Swal.fire({ position: "center",
            icon: "success",
            title: "Your Slideshow has been Update",
            showConfirmButton: false,
            timer: 2000
        })</script>');
        redirect('slideshow/index');    
        }
    }
}


?>